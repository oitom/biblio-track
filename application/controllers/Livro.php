<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Livro extends MY_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Livro_model');
    $this->validarSessao();
  }

  public function index($offset = null)
  {
    $this->load->helper('url');
    $this->load->library('pagination');
    
    $cidade = $this->session->userdata('user_cidade');
    $dados_clima = $this->obterDadosClima($cidade);
    
    $resultCategorias = $this->Livro_model->getLivroByCategoria();
    $dados_categoria = $this->formataLivrosPorCategoria($resultCategorias);

    $categoria =  $this->input->get('categoria');
    $filtro =  $this->input->get('filtro');
    $config = $this->configPaginacao();

    $config['base_url'] = base_url('livro/meus-livros');
    $config['total_rows'] = $this->Livro_model->count_livros_filtrados($filtro, $categoria);
    $config['per_page'] = PER_PAGE;
    $config['uri_segment'] = 3;
    $config['suffix'] = '?' . http_build_query(['filtro' => $filtro, 'categoria' => $categoria]);

    $this->pagination->initialize($config);
    $data['items'] = $this->Livro_model->getLivroByFiltro($filtro, $categoria, $config['per_page'], $offset);
    
    $data = array(
      "clima"=> $dados_clima, 
      "categorias" => $dados_categoria,
      "items"=> $data['items'],
      'total'=> $config['total_rows'],
      'total_geral'=> $this->Livro_model->count_livros_usuario(),
    );
		$this->loadView('livro/meus-livros', $data);
  }

  public function livro($livro_id=null)
  {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('titulo', 'Titulo', 'required', ['required' => 'O campo {field} é obrigatório.']);
    $this->form_validation->set_rules('descricao', 'Descricao', 'required', ['required' => 'O campo {field} é obrigatório.']);
    $this->form_validation->set_rules('autor', 'Autor', 'required', ['required' => 'O campo {field} é obrigatório.']);
    $this->form_validation->set_rules('n_paginas', 'Número de páginas', 'required', ['required' => 'O campo {field} é obrigatório.']);
    $this->form_validation->set_rules('categoria', 'Categoria', 'required', ['required' => 'O campo {field} é obrigatório.']);

    $data['errors'] = null;
    $acao_realizada = false;

    if(!empty($livro_id)) {
      $acao = "editar";
      $dados = $this->Livro_model->getLivroById($livro_id);

      if(!$dados) {
        redirect('biblioTrack/error_404');
      }
      
      if($dados["usuario_id"] !=  $this->session->userdata('user_id')) {
        redirect('biblioTrack/error_403');
      }
    }
    else {
      $livro_id = "";
      $acao = "adicionar";
      $dados = $this->getLivrosCadastro();
    }

    if ($this->form_validation->run() === FALSE) {
      $data['errors'] = validation_errors();
    
    } else {
      $dados = $this->getDadosPost();
      if ($this->input->server('REQUEST_METHOD') === 'POST') {
        $config['upload_path']   =  FCPATH . '/public/assets/upload/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
        $config['max_size']      = 1024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('capa')) {
          $upload_data = $this->upload->data();
          $dados['capa'] = $upload_data['file_name'];
        } else {
          $error = $this->upload->display_errors();
          $data['errors'] =  $error;

          if($acao == "adicionar")
            $dados['capa'] = "capa_padrao.png";
          else
            $dados['capa'] = $this->Livro_model->getLivroById($livro_id)["capa"];

          if(!empty($this->input->post('capa-externa')))
            $dados['capa'] = $this->input->post('capa-externa');
          
        }
        
        if($data['errors'] == null || $data['errors'] == "<p>Nenhum arquivo foi selecionado.</p>") {
          if($acao == "editar") { 
            $livro = $this->Livro_model->update_livro($livro_id, $dados);
          }
          else {
            $livro = $this->Livro_model->inserir_livro($dados);
            $livro_id = $livro;
          }
          $data['errors'] = null; 
          $acao_realizada = true;
        }
      }
    }

    $body = array(
      'acao' => $acao, 
      'acao_realizada'=> $acao_realizada, 
      'livro_id'=> $livro_id, 
      'dados'=> $dados, 
      'opcoes_categorias' => $this->getOpcoesCategorias(),
      'erro' => $data['errors']
    );
    $this->loadView('livro/livro', $body);
  }

  public function excluir($livro_id)
  {
    $this->Livro_model->excluirLivro($livro_id);
    redirect('livro/meus-livros');
  }

  private function formataLivrosPorCategoria($dados)
  {
    $result = array(
      "lendo"=> 0,
      "quero ler"=> 0,
      "ja li"=> 0,
    );

    if($dados) {
      foreach ($dados as $res) {
        $result[$res->categoria] = $res->quantidade;
      }
    }
    return $result;
  }

  private function getLivrosCadastro()
  {
    return array(
      "titulo" => "",
      "descricao" => "",
      "autor" => "",
      "n_paginas" => "",
      "categoria" => "",
      'capa' => 'capa_padrao.png'
    );
  }

  private function getOpcoesCategorias()
  {
    return array(
      'quero ler' => 'Quero ler', 
      'lendo' => 'Lendo', 
      'ja li' => 'Já li'
    );
  }

  private function getDadosPost()
  {
    $dados = array(
      'usuario_id' => $this->session->userdata('user_id'),
      'titulo' => $this->input->post('titulo'),
      'descricao' => $this->input->post('descricao'),
      'autor' => $this->input->post('autor'),
      'n_paginas' => $this->input->post('n_paginas'),
      'categoria' => $this->input->post('categoria'),
      'data_cadastro' => date("Y-m-d"),
    );
    return $dados;
  }
}
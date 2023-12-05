<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Livro extends MY_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->model('Livro_model');

    $this->form_validation->set_rules('titulo', 'Titulo', 'required', ['required' => 'O campo {field} é obrigatório.']);
    $this->form_validation->set_rules('descricao', 'Descricao', 'required', ['required' => 'O campo {field} é obrigatório.']);
    $this->form_validation->set_rules('autor', 'Autor', 'required', ['required' => 'O campo {field} é obrigatório.']);
    $this->form_validation->set_rules('n_paginas', 'Número de páginas', 'required', ['required' => 'O campo {field} é obrigatório.']);
    $this->form_validation->set_rules('categoria', 'Categoria', 'required', ['required' => 'O campo {field} é obrigatório.']);
  }

  public function index($livro_id=null)
  {
    $acao_realizada = false;

    if(!empty($livro_id)) {
      $acao = "editar";
      $dados = $this->Livro_model->getLivroById($livro_id);
    }
    else {
      $livro_id = "";
      $acao = "adicionar";
      $dados = $this->getLivrosCadastro();
    }

    if ($this->form_validation->run() === FALSE) {
      $data['errors'] = validation_errors();
      $this->loadView('livro', array('acao' => $acao, 'acao_realizada'=> $acao_realizada, 'livro_id'=> $livro_id, 'dados'=> $dados, 'opcoes_categorias' => $this->getOpcoesCategorias(), "erro"=> $data['errors']));
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

          if($acao == "editar") { 
            $livro = $this->Livro_model->update_livro($livro_id, $dados);
          }
          else {
            $livro = $this->Livro_model->inserir_livro($dados);
            $livro_id = $livro;
          }
          
          if($livro) {
            $acao_realizada = true;
          }
    
          $this->loadView('livro', array('acao' => $acao, 'acao_realizada'=> $acao_realizada, 'livro_id'=> $livro_id, 'dados'=> $dados, 'opcoes_categorias' => $this->getOpcoesCategorias()));
        } else {
          $error = $this->upload->display_errors();
          $data['errors'] = $error;
          $dados['capa'] = "capa_padrao.png";
          $this->loadView('livro', array('acao' => $acao, 'acao_realizada'=> $acao_realizada, 'livro_id'=> $livro_id, 'dados'=> $dados, 'opcoes_categorias' => $this->getOpcoesCategorias(), "erro"=> $data['errors']));
        }
      }
    }
  }

  public function getLivrosCadastro()
  {
    return array(
      "titulo" => "",
      "descricao" => "",
      "autor" => "",
      "n_paginas" => "",
      "categoria" => "",
    );
  }

  public function getOpcoesCategorias()
  {
    return array(
      'quero ler' => 'Quero ler', 
      'lendo' => 'Lendo', 
      'ja li' => 'Já li'
    );
  }

  public function getDadosPost()
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
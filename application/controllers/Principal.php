<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends MY_Controller {
  public function __construct() 
  {
    parent::__construct();
    $this->validarSessao();
    $this->load->model('Livro_model');
  }
	
  public function index($offset = 0)
	{
    $this->load->helper('url');
    $this->load->library('pagination');
    
    // dados clima
    $cidade = $this->session->userdata('user_cidade');
    $dados_clima = $this->obterDadosClima($cidade);
    
    // dados card home 
    $resultCategorias = $this->Livro_model->getLivroByCategoria();
    $dados_categoria = $this->formataLivrosPorCategoria($resultCategorias);

    // dados listagem home
    $categoria =  $this->input->get('categoria');
    $filtro =  $this->input->get('filtro');
    $config = $this->configPaginacao();
    $config['base_url'] = base_url('principal/index');
    $config['total_rows'] = $this->Livro_model->count_filtered_books($filtro, $categoria);
    $config['per_page'] = 9;
    $config['uri_segment'] = 3;
    $config['suffix'] = '?' . http_build_query(['filtro' => $filtro, 'categoria' => $categoria]);


    $this->pagination->initialize($config);
    $data['items'] = $this->Livro_model->getLivroByFiltro($filtro, $categoria, $config['per_page'], $offset);
    
    $data = array(
      "clima"=> $dados_clima, 
      "categorias" => $dados_categoria,
      "items"=> $data['items']
    );
		$this->loadView('principal', $data);
	}

  public function formataLivrosPorCategoria($dados)
  {
    $result = array();

    if($dados) {
      foreach ($dados as $res) {
        $result[$res->categoria] = $res->quantidade;
      }
    }
    else {
      $result = array(
        "lendo"=> 0,
        "quero ler"=> 0,
        "ja li"=> 0,
      );
    }

    return $result;
  }

}

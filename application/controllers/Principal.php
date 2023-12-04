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
    
    $filtro =  $this->input->get('filtro');

    $cidade = $this->session->userdata('user_cidade');
    $dados_clima = $this->obterDadosClima($cidade);

    // Configuração da paginação
    $config = $this->configPaginacao();
    $config['base_url'] = base_url('principal/index');
    $config['total_rows'] = $this->Livro_model->count_filtered_books($filtro);
    $config['per_page'] = 9;
    $config['uri_segment'] = 3;
    $this->pagination->initialize($config);
    
    $data['items'] = $this->Livro_model->getLivroByFiltro($filtro, $config['per_page'], $offset);
		$this->loadView('principal', array("clima"=> $dados_clima, "items"=> $data['items']));
	}
}

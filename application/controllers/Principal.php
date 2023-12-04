<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends MY_Controller {
  public function __construct() 
  {
    parent::__construct();

    $this->validarSessao();
  }
	
  public function index()
	{

    $cidade = $this->session->userdata('user_cidade');
    $dados_clima = $this->obterDadosClima($cidade);

		$this->loadView('principal', array("clima"=> $dados_clima));
	}

}

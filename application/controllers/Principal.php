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
		$this->loadView('principal');
	}

}

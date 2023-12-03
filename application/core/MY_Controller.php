<?php

class MY_Controller extends CI_Controller {
    
    public function __construct() 
    {
        parent::__construct();
    }

    public function loadView($view, $header=null, $body=null, $footer=null) 
    {
        $this->load->view('layout/cabecalho', $header);
		$this->load->view($view, $body);
		$this->load->view('layout/rodape', $footer);
    }
}

<?php

class MY_Controller extends CI_Controller {
    
    public function __construct() 
    {
        parent::__construct();
    }

    public function montarView($view, $header=null, $body=null, $footer=null) 
    {
        $this->load->view('layout/header', $header);
		$this->load->view('layout/' .$view, $body);
		$this->load->view('layout/footer', $footer);
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EsqueciSenha extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
    }

    public function index() 
    {
        $this->loadView('esqueci-senha', array("senhaSolicitada"=> false));
    }

    public function senha_solicitada() 
    {
        $this->loadView('esqueci-senha', array("senhaSolicitada"=> true));
    }

}
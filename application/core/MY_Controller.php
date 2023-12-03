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

    public function validarSessao() 
    {
        // A sessão expirou ou o usuário não está autenticado, redirecione para a página de login
        if (!($user_id = $this->session->userdata('user_id')) || !($expire_time = $this->session->userdata('expire_time')) > time()) {
            // Destruir a sessão expirada
            $this->session->sess_destroy(); 
            redirect('/login');
        }
        return true;
    }

}

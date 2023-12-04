<?php

class MY_Controller extends CI_Controller {
    
  public function __construct() 
  {
    parent::__construct();
  }

  public function loadView($view, $body=null) 
  {
    $session_current = '';
    if(isset($this->session->userdata['session_hash']))
        $session_current = $this->session->userdata['session_hash'];
      
    $this->load->view('layout/cabecalho', array("header"=> array("session_current"=> $session_current)));
    $this->load->view($view, $body);
    $this->load->view('layout/rodape');
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

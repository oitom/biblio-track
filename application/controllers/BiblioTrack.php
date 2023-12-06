<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BiblioTrack extends MY_Controller {
  public function __construct() 
  {
    parent::__construct();
  }
	
  public function index()
	{
    $this->load->database();
    $tabela = 'usuarios';
    if (!$this->db->table_exists($tabela)) {
      $this->loadView('instalacao');
    } else {
      $this->loadView('login');
    }
	}

  public function login() 
  {
    $this->load->database();
    $tabela = 'usuarios';
   
    if (!$this->db->table_exists($tabela)) {
      $this->loadView('instalacao');
    } else {
      $this->load->library('form_validation');

      $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
      $this->form_validation->set_rules('password', 'Password', 'required');

      if ($this->form_validation->run() == false) {
        $data['errors'] = validation_errors();
      } else {
        $this->load->model('Usuario_model');
        $this->load->model('Endereco_model');

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->Usuario_model->getUserByEmail($email);
        $endereco = $this->Endereco_model->getEnderecoByUser($user->id);
        
        if ($user && $user->status == 'ativo' && password_verify($password, $user->senha)) {
          $session_data = array(
            'user_id' => $user->id,
            'user_nome' => $user->nome,
            'user_perfil' => $user->perfil,
            'user_email' => $user->email,
            'user_cep' => $endereco->cep,
            'user_cidade' => $endereco->cidade,
            'session_hash' => md5(uniqid(rand(), true)),
            'expire_time' => time() + 600,
          );
      
          $this->session->set_userdata($session_data);
          redirect('livro/meus-livros');
        } else {
          $this->session->sess_destroy();
          $data['errors'] = 'E-mail ou Senha inválidos!';
        }
      }
      
      $this->loadView('login', array("erro"=> $data['errors']));            
    }
  }

  public function sair() 
  {
    $this->session->sess_destroy(); 
    redirect('login');
  }

  public function error_404()
  {
    $this->loadView('404');
  }

  public function error_403()
  {
    $this->loadView('403');
  }
}

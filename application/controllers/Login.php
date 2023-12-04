<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct() {
        parent::__construct();

        // if($this->validarSessao()) {
        //     redirect('principal');
        // }
    }

    public function index() 
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $data['errors'] = validation_errors();
            $this->loadView('login', array("erro"=> $data['errors']));
        } else {
            $this->load->model('Usuario_model');
            $this->load->model('Endereco_model');

            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->Usuario_model->getUserByEmail($email);
            $endereco = $this->Endereco_model->getEnderecoByUser($user->id);
            
            // if ($user && password_verify($password, $user->senha)) {
            if ($user && $user->status == 'ativo' && password_verify($password, $user->senha)) {
                $session_data = array(
                    'user_id' => $user->id,
                    'user_nome' => $user->nome,
                    'user_perfil' => $user->perfil,
                    'user_email' => $user->email,
                    'user_cep' => $endereco->cep,
                    'user_cidade' => $endereco->cidade,
                    'session_hash' => md5(uniqid(rand(), true)),
                    'expire_time' => time() + 600, // Define o tempo de expiração para 10 minutos (600 segundos)
                );
            
                $this->session->set_userdata($session_data);
                redirect('principal');
            } else {
                // Autenticação falhou, redirecione para a página de login com mensagem de erro.
                $this->session->sess_destroy();
                $data['errors'] = 'E-mail ou Senha inválidos!';
                $this->loadView('login', array("erro"=> $data['errors']));
            }
        }            
    }

    public function sair() 
    {
        $this->session->sess_destroy(); 
        redirect('inicio');
    }

}
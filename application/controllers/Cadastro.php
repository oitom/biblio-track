<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index() 
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'required', ['required' => 'O campo {field} é obrigatório.']);
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|is_unique[usuarios.email]', ['required' => 'O campo {field} é obrigatório.', 'valid_email' => 'Por favor, insira um endereço de e-mail válido.', 'is_unique' => 'Este e-mail já está em uso.']);
        $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[8]', ['required' => 'O campo {field} é obrigatório.', 'min_length' => 'A senha deve ter pelo menos {param} caracteres.']);
        $this->form_validation->set_rules('confirma_senha', 'Confirme sua senha', 'required|matches[senha]', ['required' => 'O campo {field} é obrigatório.', 'matches' => 'As senhas não coincidem.']);

        if ($this->form_validation->run() === FALSE) {
            $data['errors'] = validation_errors();
            $this->loadView('cadastre-se', array("cadastroRealizado"=> false, "erro"=> $data['errors']));
        } else {
            $this->load->model('Usuario_model');
            
            $dados_usuario = array(
                'nome' => $this->input->post('nome'),
                'email' => $this->input->post('email'),
                'senha' => password_hash($this->input->post('senha'), PASSWORD_DEFAULT),
            );

            $insercao_sucesso = $this->Usuario_model->inserir_usuario($dados_usuario);
            if ($insercao_sucesso) {
                $this->loadView('cadastre-se', array("cadastroRealizado"=> true));
            }
            else {
                $data['errors'] = "Erro ao inserir usuário!";
                $this->loadView('cadastre-se', array("cadastroRealizado"=> false, "erro"=> $data['errors']));
            }
        }
    }

}
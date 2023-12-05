<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() 
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'required', ['required' => 'O campo {field} é obrigatório.']);
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|is_unique[usuarios.email]', ['required' => 'O campo {field} é obrigatório.', 'valid_email' => 'Por favor, insira um endereço de e-mail válido.', 'is_unique' => 'Este e-mail já está em uso.']);
        $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[8]', ['required' => 'O campo {field} é obrigatório.', 'min_length' => 'A senha deve ter pelo menos {param} caracteres.']);
        $this->form_validation->set_rules('confirma_senha', 'Confirme sua senha', 'required|matches[senha]', ['required' => 'O campo {field} é obrigatório.', 'matches' => 'As senhas não coincidem.']);
        $this->form_validation->set_rules('cep', 'Cep', 'required', ['required' => 'O campo {field} é obrigatório.']);
        $this->form_validation->set_rules('rua', 'Rua', 'required', ['required' => 'O campo {field} é obrigatório.']);
        $this->form_validation->set_rules('numero', 'Numero', 'required', ['required' => 'O campo {field} é obrigatório.']);
        $this->form_validation->set_rules('bairro', 'Bairo', 'required', ['required' => 'O campo {field} é obrigatório.']);
        $this->form_validation->set_rules('cidade', 'Cidade', 'required', ['required' => 'O campo {field} é obrigatório.']);
        $this->form_validation->set_rules('estado', 'Estado', 'required', ['required' => 'O campo {field} é obrigatório.']);

        if ($this->form_validation->run() === FALSE) {
            $data['errors'] = validation_errors();
            $this->loadView('cadastre-se', array("estados"=> $this->getEstado(), "cadastroRealizado"=> false, "erro"=> $data['errors']));
        } else {
            $this->load->model('Usuario_model');
            
            $dados_usuario = array(
                'nome' => $this->input->post('nome'),
                'email' => $this->input->post('email'),
                'senha' => password_hash($this->input->post('senha'), PASSWORD_DEFAULT),
            );

            $usuario_id = $this->Usuario_model->inserir_usuario($dados_usuario);
            if ($usuario_id) {
                $this->load->model('Endereco_model');
                $dados_endereco = array(
                    'usuario_id' => $usuario_id,
                    'cep' => $this->input->post('cep'),
                    'rua' => $this->input->post('rua'),
                    'numero' => $this->input->post('numero'),
                    'bairro' => $this->input->post('bairro'),
                    'complemento' => $this->input->post('complemento'),
                    'cidade' => $this->input->post('cidade'),
                    'estado' => $this->input->post('estado')
                );
                $endereco_id = $this->Endereco_model->inserir_endereco($dados_endereco);

                if ($endereco_id) {
                    $this->loadView('cadastre-se', array("estados"=> $this->getEstado(), "cadastroRealizado"=> true));
                }
                else {
                    $data['errors'] = "Erro ao inserir endereço do usuário!";
                    $this->loadView('cadastre-se', array("estados"=> $this->getEstado(), "cadastroRealizado"=> false, "erro"=> $data['errors']));
                }
            }
            else {
                $data['errors'] = "Erro ao inserir usuário!";
                $this->loadView('cadastre-se', array("estados"=> $this->getEstado(), "cadastroRealizado"=> false, "erro"=> $data['errors']));
            }
        }
    }
}
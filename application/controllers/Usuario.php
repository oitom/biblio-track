<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends MY_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->model('Usuario_model');
  }

  public function cadastro() 
  {
    $data['errors'] = null;
    $cadastro_realizado = false;

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
    } else {
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
          $data['errors'] = null;
          $cadastro_realizado = true;
        }
        else {
          $data['errors'] = "Erro ao inserir endereço do usuário!";
        }
      }
      else {
        $data['errors'] = "Erro ao inserir usuário!";
      }
    }
    $body = array(
      "estados"=> $this->getEstado(), 
      "cadastroRealizado"=> $cadastro_realizado, 
      "erro"=> $data['errors']
    );
    
    $this->loadView('usuario/cadastre-se', $body);
  }

  public function esqueci_senha() 
  {
    $this->loadView('usuario/esqueci-senha', array("senhaSolicitada"=> false));
  }

  public function senha_solicitada() 
  {
    $this->loadView('usuario/esqueci-senha', array("senhaSolicitada"=> true));
  }
}
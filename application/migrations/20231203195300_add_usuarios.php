<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Usuarios extends CI_Migration {

  public function up()
  {
    $data = array(
      array(
        'nome' => 'Administrador',
        'email' => 'admin@email.com',
        'senha' => password_hash('admin', PASSWORD_DEFAULT),
        'perfil' => 'admin',
        'status' => 'ativo'
      ),
      array(
        'nome' => 'João Silva',
        'email' => 'joao@email.com',
        'senha' => password_hash('joao', PASSWORD_DEFAULT),
        'perfil' => 'padrao',
        'status' => 'desativado'
      ),
    );
    $this->db->insert_batch('usuarios', $data);
  }

  public function down()
  {
    $this->db->where_in('email', array('admin@email.com', 'joao@email.com'));
    $this->db->delete('usuarios');
  }
}

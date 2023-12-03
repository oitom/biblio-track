<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Usuarios extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 5,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'nome' => array(
        'type' => 'VARCHAR',
        'constraint' => '50',
      ),
      'email' => array(
        'type' => 'VARCHAR',
        'constraint' => '50',
      ),
      'senha' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
      ),
      'perfil' => array(
        'type' => 'ENUM("padrao", "admin")',
        'default' => 'padrao',
      ),
      'status' => array(
        'type' => 'ENUM("ativo", "desativado")',
        'default' => 'ativo',
      ),
    ));

    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('usuarios');
  }

  public function down()
  {
    $this->dbforge->drop_table('usuarios');
  }
}
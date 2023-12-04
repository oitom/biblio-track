<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Livros extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 5,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'titulo' => array(
        'type' => 'VARCHAR',
        'constraint' => '50',
      ),
      'descricao' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
      ),
      'autor' => array(
        'type' => 'VARCHAR',
        'constraint' => '50',
      ),
      'n_paginas' => array(
        'type' => 'INT',
        'constraint' => '10',
      ),
      'capa' => array(
        'type' => 'VARCHAR',
        'constraint' => '30',
      ),
      'data_cadastro' => array(
        'type' => 'DATE',
      )
    ));

    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('livros');
  }

  public function down()
  {
    $this->dbforge->drop_table('livros');
  }
}
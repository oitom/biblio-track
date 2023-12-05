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
        'constraint' => '300',
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
        'constraint' => '300',
      ),
      'categoria' => array(
        'type' => 'ENUM("quero ler", "lendo", "ja li")',
        'default' => 'quero ler',
      ),
      'data_cadastro' => array(
        'type' => 'DATE'
      ),
      'usuario_id' => array(
        'type' => 'INT',
        'constraint' => 11,
      ),
    ));

    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('livros');

    $this->db->query('ALTER TABLE livros CHANGE COLUMN usuario_id usuario_id INT(5) UNSIGNED NOT NULL AFTER data_cadastro');
    $this->db->query('ALTER TABLE livros ADD CONSTRAINT fk_livros_usuario_id FOREIGN KEY (usuario_id) REFERENCES usuarios (id) ON UPDATE CASCADE ON DELETE CASCADE');
  }

  public function down()
  {
    $this->dbforge->drop_table('livros');
  }
}
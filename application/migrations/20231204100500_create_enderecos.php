<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Enderecos extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 5,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'usuario_id' => array(
        'type' => 'INT',
        'constraint' => 11,
      ),
      'cep' => array(
        'type' => 'VARCHAR',
        'constraint' => '10',
      ),
      'rua' => array(
        'type' => 'VARCHAR',
        'constraint' => '50',
      ),
      'numero' => array(
        'type' => 'VARCHAR',
        'constraint' => '10',
      ),
      'bairro' => array(
        'type' => 'VARCHAR',
        'constraint' => '20',
      ),
      'complemento' => array(
        'type' => 'VARCHAR',
        'constraint' => '30',
      ),
      'cidade' => array(
        'type' => 'VARCHAR',
        'constraint' => '40',
      ),
      'estado' => array(
        'type' => 'VARCHAR',
        'constraint' => '2',
      ),
    ));

    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('enderecos');

    $this->db->query('ALTER TABLE enderecos CHANGE COLUMN usuario_id usuario_id INT(5) UNSIGNED NOT NULL AFTER id');
    $this->db->query('ALTER TABLE enderecos ADD CONSTRAINT fk_usuario_id FOREIGN KEY (usuario_id) REFERENCES usuarios (id) ON UPDATE CASCADE ON DELETE CASCADE');
  }

  public function down()
  {
    $this->dbforge->drop_table('enderecos');
  }
}
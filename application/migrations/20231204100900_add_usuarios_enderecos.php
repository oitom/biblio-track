<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Usuarios_Enderecos extends CI_Migration {

  public function up()
  {
    $data = array(
      array(
        'usuario_id' => 1,
        'cep' => '12460-000',
        'rua' => 'Rua Antonio Miguel',
        'numero' => '123',
        'bairro' => 'Vila Madalena',
        'complemento' => '',
        'cidade' => 'Campos do Jordão',
        'estado' => 'SP'
      ),
      array(
        'usuario_id' => 2,
        'cep' => '12230-082',
        'rua' => 'Rua Matias Peres',
        'numero' => '331',
        'bairro' => 'Floradas',
        'complemento' => '',
        'cidade' => 'São José dos Campos',
        'estado' => 'SP'
      ),
    );
    $this->db->insert_batch('enderecos', $data);
  }

  public function down()
  {
    $this->db->where_in('usuario_id', array(1, 2));
    $this->db->delete('enderecos');
  }
}

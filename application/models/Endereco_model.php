<?php
class Endereco_model extends CI_Model {
  
  public function getEnderecoByUser($usuario_id) 
  {
    $this->db->where('usuario_id', $usuario_id);
    return $this->db->get('enderecos')->row();
  }

  public function inserir_endereco($dados_endereco) 
  {
    $this->db->insert('enderecos', $dados_endereco);

    if ($this->db->affected_rows() > 0) {
      return $this->db->insert_id();
    } else {
      return FALSE;
    }
  }
}
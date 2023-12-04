<?php
class Usuario_model extends CI_Model {
  public function getUserByEmail($email) 
  {
    $this->db->where('email', $email);
    return $this->db->get('usuarios')->row();
  }

  public function inserir_usuario($dados_usuario) 
  {
    $this->db->insert('usuarios', $dados_usuario);

    if ($this->db->affected_rows() > 0) {
      return $this->db->insert_id();
    } else {
      return FALSE;
    }
  }
}
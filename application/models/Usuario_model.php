<?php
class Usuario_model extends CI_Model {
  public function getUserByEmail($email) 
  {
    $this->db->where('email', $email);
    return $this->db->get('usuarios')->row();
  }

}
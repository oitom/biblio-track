<?php
class Livro_model extends CI_Model {
  public function getLivroByFiltro($filtro = null, $limit = null, $offset = null) 
  {
    if (!empty($filtro)) {
      $this->db->like('titulo', $filtro);
      $this->db->or_like('descricao', $filtro);
      $this->db->or_like('autor', $filtro);
    }

    $this->db->order_by('titulo', 'ASC');

    if ($limit !== null) {
      $this->db->limit($limit, $offset);
    }
    
    $query = $this->db->get('livros');
    return $query->result_array();
  }

  public function count_filtered_books($filtro = null)
  {
    if (!empty($filtro)) {
        $this->db->like('titulo', $filtro);
        $this->db->or_like('descricao', $filtro);
        $this->db->or_like('autor', $filtro);
    }
    return $this->db->count_all_results('livros');
  }
}
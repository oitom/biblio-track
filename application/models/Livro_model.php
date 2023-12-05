<?php
class Livro_model extends CI_Model {
  public function getLivroById($livro_id) 
  {
    $this->db->where('id', $livro_id);
    return $this->db->get('livros')->row_array();
  }

  public function getLivroByFiltro($filtro = null, $categoria = null, $limit = null, $offset = null) 
  {
    $usuario_id = $this->session->userdata('user_id');
    $this->db->where('usuario_id', $usuario_id);

    if (!empty($filtro)) {
      $this->db->group_start();
      $this->db->like('titulo', $filtro);
      $this->db->or_like('descricao', $filtro);
      $this->db->or_like('autor', $filtro);
      $this->db->group_end();
    }

    if (!empty($categoria)) {
      $this->db->where('categoria', $categoria);
    }

    $this->db->order_by('titulo', 'ASC');

    if ($limit !== null) {
      $this->db->limit($limit, $offset);
    }
    
    $query = $this->db->get('livros');
    return $query->result_array();
  }

  public function count_filtered_books($filtro = null, $categoria = null)
  {
    if (!empty($filtro)) {
      $this->db->group_start();
      $this->db->like('titulo', $filtro);
      $this->db->or_like('descricao', $filtro);
      $this->db->or_like('autor', $filtro);
      $this->db->group_end();
    }
    
    if (!empty($categoria)) {
      $this->db->where('categoria', $categoria);
    }
    
    return $this->db->count_all_results('livros');
  }

  public function getLivroByCategoria()
  {
    $usuario_id = $this->session->userdata('user_id');
    
    $this->db->select('categoria, COUNT(*) as quantidade');
    $this->db->from('livros');
    $this->db->where('usuario_id', $usuario_id);
    $this->db->group_by('categoria');

    $query = $this->db->get();
    
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return array(
      );
    }
  }

  public function inserir_livro($dados_livro) 
  {
    $this->db->insert('livros', $dados_livro);

    if ($this->db->affected_rows() > 0) {
      return $this->db->insert_id();
    } else {
      return FALSE;
    }
  }

  public function update_livro($livro_id, $dados_livro) 
  {
    $this->db->where('id', $livro_id);
    $this->db->update('livros', $dados_livro);

    return $this->db->affected_rows() > 0;
  }
}
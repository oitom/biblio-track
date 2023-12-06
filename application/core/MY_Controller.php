<?php

class MY_Controller extends CI_Controller {
    
  public function __construct() 
  {
    parent::__construct();
    $this->load->helper('url');
    // $this->load->library('uri');
  }

  public function loadView($view, $body=null) 
  {
    $session_data = '';
    if(isset($this->session->userdata['session_hash']))
      $session_data = $this->session->userdata;
    
    $titulo = $this->buscarTituloPagina();
    $this->load->view('layout/cabecalho', array("header"=> array("session_data"=> $session_data), "titulo"=> $titulo));
    $this->load->view($view, $body);
    $this->load->view('layout/rodape');
  }

  public function validarSessao() 
  {
    if (!($user_id = $this->session->userdata('user_id')) || !(($expire_time = $this->session->userdata('expire_time')) > time())) {
      $this->session->sess_destroy(); 
      redirect('/login');
    }
    return true;
  }

  public function getEstado() 
  {
    return array(
      'AC' => 'Acre',
      'AL' => 'Alagoas',
      'AP' => 'Amapá',
      'AM' => 'Amazonas',
      'BA' => 'Bahia',
      'CE' => 'Ceará',
      'DF' => 'Distrito Federal',
      'ES' => 'Espírito Santo',
      'GO' => 'Goiás',
      'MA' => 'Maranhão',
      'MT' => 'Mato Grosso',
      'MS' => 'Mato Grosso do Sul',
      'MG' => 'Minas Gerais',
      'PA' => 'Pará',
      'PB' => 'Paraíba',
      'PR' => 'Paraná',
      'PE' => 'Pernambuco',
      'PI' => 'Piauí',
      'RJ' => 'Rio de Janeiro',
      'RN' => 'Rio Grande do Norte',
      'RS' => 'Rio Grande do Sul',
      'RO' => 'Rondônia',
      'RR' => 'Roraima',
      'SC' => 'Santa Catarina',
      'SP' => 'São Paulo',
      'SE' => 'Sergipe',
      'TO' => 'Tocantins'
    );
  }

  public function obterDadosClima($cidade="") {
    $hoje = date("Ymd");
    $chaveAPI = '9d80612e';

    $url = "https://api.hgbrasil.com/weather?key={$chaveAPI}&city_name={$cidade}&date={$hoje}&array_limit=1&fields=only_results";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resposta = curl_exec($ch);
    curl_close($ch);
    $dados = json_decode($resposta, true);

    $dadosClima = array(
      "temperatura_atual"=> $dados["temp"],
      "descricao"=> $dados["description"],
      "cidade"=> $dados["city"],
      "temp_img"=> IMAGES . $dados["condition_slug"] .".svg",
      "temp_min"=> $dados["forecast"][0]["min"],
      "temp_max"=> $dados["forecast"][0]["max"],
    );
    return $dadosClima;
  }

  public function configPaginacao()
  {
    // Configuração da paginação
    $config['base_url'] = '';
    $config['total_rows'] = '';
    $config['per_page'] = 9;
    $config['uri_segment'] = 3;

    // Estilo da paginação com Bootstrap
    $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
    $config['full_tag_close'] = '</ul>';
    $config['first_link'] = FALSE;
    $config['last_link'] = FALSE;
    $config['first_tag_open'] = '<li class="page-item">';
    $config['first_tag_close'] = '</li>';
    $config['prev_link'] = '&laquo;';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '&raquo;';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li class="page-item">';
    $config['last_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close'] = '</span></li>';
    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';
    
    return $config;
  }

  public function buscarTituloPagina()
  {
    $segmento1 = $this->uri->segment(1);
    $segmento2 = $this->uri->segment(2);

    $titulo = 'Biblio Track';

    if ($segmento1 == "") {
      $titulo .= ' - Início';
    } 
    else if ($segmento2 != "" && !is_numeric($segmento2)) {
      $titulo .= " - " . ucwords(str_replace('-', ' ', $segmento2));
    }
    else {
      $titulo .= " - " . ucwords(str_replace('-', ' ', $segmento1));
    }
    return $titulo;
  }
}

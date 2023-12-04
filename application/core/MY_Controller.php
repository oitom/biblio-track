<?php

class MY_Controller extends CI_Controller {
    
  public function __construct() 
  {
    parent::__construct();
  }

  public function loadView($view, $body=null) 
  {
    $session_data = '';
    if(isset($this->session->userdata['session_hash']))
        $session_data = $this->session->userdata;
      
    $this->load->view('layout/cabecalho', array("header"=> array("session_data"=> $session_data)));
    $this->load->view($view, $body);
    $this->load->view('layout/rodape');
  }

  public function validarSessao() 
  {
    // A sessão expirou ou o usuário não está autenticado, redirecione para a página de login
    if (!($user_id = $this->session->userdata('user_id')) || !($expire_time = $this->session->userdata('expire_time')) > time()) {
      // Destruir a sessão expirada
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

}

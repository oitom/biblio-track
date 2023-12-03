<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() 
    {
        $this->loadView('cadastre-se');
    }

}
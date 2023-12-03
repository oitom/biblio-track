<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EsqueciSenha extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() 
    {
        $this->loadView('esqueci-senha');
    }

}
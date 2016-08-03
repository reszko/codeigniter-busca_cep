<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    /**
     * Carrega a view principal
     */
    public function index() {
        
        $this->load->view('home');
    }
    
    /**
     * Recebe o CEP via post e retorna os dados
     * consultados via JSON
     */
    public function consulta(){
    
        $cep = $this->input->post('cep');
        
        $this->load->library('curl');
        
        echo $this->curl->consulta($cep);
        
    }
}

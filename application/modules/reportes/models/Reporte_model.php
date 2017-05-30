<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reporte_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }


    public function create_servicio() {
        
    }

    public function update_servicio($service_id) {
        
    }

    public function delete_servicio($service_id) {
        
    }
}
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Servicio extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');

        checksavedlogin(); #defined in auth helper

        if (!is_loggedin()) {
            if (count($_POST) <= 0)
                $this->session->set_userdata('req_url', current_url());
            redirect(site_url('admin/auth'));
        }

        if (!is_admin()) {
            if (count($_POST) <= 0)
                $this->session->set_userdata('req_url', current_url());
            redirect(site_url('admin/auth'));
        }

        //$this->load->model('contact_model');
        //$this->load->model('admin/email_model');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    }

    function servicios( $param1 = '', $param2 = '', $param3 = '' ){
        if( $param1 == NULL || !preg_match( "/^(?:funerarios|realizados|apartados|create|update|delete)$/i", $param1 ) ){
            redirect(site_url('admin'));
        }

        switch($param1){
            case 'create':
            break;
            
            case 'update':
            break;

            case 'delete':
            break;
        }

        $page_data['service_type'] = $param1;
        $page_data['module_type']   = 'servicio';
        $page_data['page_name']     = 'servicio';
        $page_data['page_title'] = 'Servicios';

        $this->load->view('admin/index', $page_data);
    }
}
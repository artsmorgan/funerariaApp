<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {
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

        $this->load->model('reporte_model');
        //$this->load->model('admin/email_model');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    }

    function index() {

        $page_data['page_type'] = 'Reportes';
        $page_data['module_type']   = 'reportes';
        $page_data['page_name']     = 'reportes';
        $page_data['page_title'] = 'Reportes';
        $this->load->view('admin/index', $page_data);
    }

    
}
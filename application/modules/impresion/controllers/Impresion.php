<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Impresion extends CI_Controller {
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

        $this->load->model('impresion_model');
        //$this->load->model('admin/email_model');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    }

    function impresiones( $param1 = '', $param2 = '', $param3 = '' ){
        // echo $param1;
        if( $param1 == NULL || !preg_match( "/^(?:index|impresiones|index|create|update|delete)$/i", $param1 ) ){
            redirect(site_url('admin'));
        }

        switch($param1){
            case 'create':
                $service_type = $this->input->post('type');
                $this->servicio_model->create_servicio();
                $this->session->set_flashdata('flash_message', lang_key('data_created_successfuly'));
                redirect(site_url('servicio/servicios/' . $service_type));
            break;
        
            case 'update':
                $service_type = $this->input->post('type');
                $this->servicio_model->update_servicio($param2);
                $this->session->set_flashdata('flash_message', lang_key('data_updated_successfuly'));
                redirect(site_url('servicio/servicios/' . $service_type));
            break;

            case 'delete':
                $this->servicio_model->delete_servicio($param2);
                $this->session->set_flashdata('flash_message', lang_key('data_deleted_successfuly'));
                redirect(site_url('servicio/servicios/' . $param3));
            break;

            default:
                $page_data['service_type'] = $page_data['page_type'] = "Impresion Recibos";
                $page_data['module_type']   = 'impresion';
                $page_data['page_name']     = 'impresion';
                $page_data['page_title'] = 'impresion';

                $this->load->view('admin/index', $page_data);

        }
    }

    function service_details($param1 = '', $param2 = 'summary')
    {
        $page_data['service_id']    = $param1;
        $service_type               = get_db_field_by_id('service', 'type', $param1);
        $page_data['page_type']     = $service_type;
        $page_data['active_tab']    = $param2;
        $page_data['module_type']   = 'servicio';
        $page_data['page_name']     = 'servicio_detalles';
        $page_data['page_title']    = "Servicio detalles";
        
        $this->load->view('admin/index', $page_data);
    }
}
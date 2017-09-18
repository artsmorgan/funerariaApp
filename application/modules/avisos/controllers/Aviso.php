<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aviso extends CI_Controller {
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

        $this->load->model('avisos_model');
        //$this->load->model('admin/email_model');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    }

    function avisos( $param1 = '', $param2 = '', $param3 = '' ){
         // echo $param1;
        if( $param1 == NULL || !preg_match( "/^(?:index|aviso|3dias|expirados|cumpleanos)$/i", $param1 ) ){
            redirect(site_url('admin'));
        }

        switch($param1){
            case 'rutas':
                $page_data['page_type'] = 'Impresión rutas';
                $page_data['module_type']   = 'impresion';
                $page_data['page_name']     = 'impresion_rutas';
                $page_data['page_title'] = 'Impresión rutas';
                $this->load->view('admin/index', $page_data);
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
                $page_data['service_type'] = $page_data['page_type'] = "Avisos";
                $page_data['module_type']   = 'avisos';
                $page_data['page_name']     = 'avisos';
                $page_data['page_title'] = 'avisos';

                $this->load->view('admin/index', $page_data);

        }
    }

    function recibos($param1 = '', $param2 = '', $param3 = ''){
        $sql = "SELECT c.*, s.amount AS service_amount, s.balance AS service_balance, CONCAT(u.first_name, ' ', u.last_name) AS agent_name FROM bk_service AS s INNER JOIN bk_contact AS c ON c.contact_id = s.contact_id INNER JOIN bk_user AS u ON u.user_id = s.user_id ";
        $page_data['sql_params'] = array();
        $print = '';

        switch($param1){
            case 'ruta':
                $page_data['sql_params'][] =  $param2;
                $sql .= "WHERE c.route = ?";
            break;
        }

        $page_data['sql'] = $sql;
        $this->load->view('impresion/recibos', $page_data);
    }

    function actualizar_fecha_impresion_ruta($param){
        $this->impresion_model->update_print_date_by_route($param);
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
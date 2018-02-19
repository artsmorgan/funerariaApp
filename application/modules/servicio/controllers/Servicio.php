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

        $this->load->model('servicio_model');
        //$this->load->model('admin/email_model');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    }

    function servicios( $param1 = '', $param2 = '', $param3 = '' ){
        if( $param1 == NULL || !preg_match( "/^(?:funecredito|apartado|contrato|create|funeral|update|deleteContrato|deleteApartado|createContract|updateContract|createApartado|updateApartado|contractPay|apartadoPay|newAmountAdjustment|newAmountDiscount|createFuneral|updateFuneral)$/i", $param1 ) ){
            redirect(site_url('admin'));
        }

        switch($param1){
            case 'create':
                $service_type = $this->input->post('type');
                $this->servicio_model->createContract();
                $this->session->set_flashdata('flash_message', lang_key('data_created_successfuly') );
                redirect(site_url('servicio/servicios/' . $service_type));
            break;

            case 'createContract':

                $service_type = $this->input->post('type');
                // echo $service_type;
                $id = $this->servicio_model->createContract();
                // print_r($id);
                // die();
                $this->session->set_flashdata('flash_message', "Funeral Actualizado con Exito" );
                redirect(site_url('servicio/servicios/' . $service_type));
            break;

            case 'updateFuneral':

                $service_type = $this->input->post('type');
                // echo $service_type;
                $id = $this->servicio_model->updateFuneral();
                // print_r($id);
                // die();
                $this->session->set_flashdata('flash_message', lang_key('data_created_successfuly') );
                redirect(site_url('servicio/servicios/funeral'));
            break;

            case 'createFuneral':

                $service_type = $this->input->post('type');
                // echo $service_type;
                $id = $this->servicio_model->createFuneral();
                // print_r($id);
                // die();
                $this->session->set_flashdata('flash_message', lang_key('data_created_successfuly') );
                redirect(site_url('servicio/servicios/funeral'));
            break;

            case 'newAmountAdjustment':
                $service_type = $this->input->post('type');
                // echo $service_type;
                $id = $this->servicio_model->newAmountAdjustment();
                // print_r($id);
                // die();
                $this->session->set_flashdata('flash_message', lang_key('data_created_successfuly') );
                redirect(site_url('servicio/servicios/' . $service_type));
                break;

            case 'newAmountDiscount':
                $service_type = $this->input->post('type');
                // echo $service_type;
                $id = $this->servicio_model->newAmountDiscount();
                // print_r($id);
                // die();
                $this->session->set_flashdata('flash_message', lang_key('data_created_successfuly') );
                redirect(site_url('servicio/servicios/' . $service_type));
                break;    

            case 'createApartado':

                $service_type = $this->input->post('type');
                // echo $service_type;
                $id = $this->servicio_model->createApartado();
                // print_r($id);
                // die();
                $this->session->set_flashdata('flash_message', lang_key('data_created_successfuly') );
                redirect(site_url('servicio/servicios/' . $service_type));
            break;

            case 'contractPay':
                $service_type = $this->input->post('type');
                // echo $service_type;
                $id = $this->servicio_model->contractPay();
                // print_r($id);
                // die();
                $this->session->set_flashdata('flash_message', lang_key('data_created_successfuly') );
                redirect(site_url('servicio/servicios/contrato'));
            break;

             case 'apartadoPay':
                $service_type = $this->input->post('type');
                // echo $service_type;
                $id = $this->servicio_model->apartadoPay();
                // print_r($id);
                // die();
                $this->session->set_flashdata('flash_message', lang_key('data_created_successfuly') );
                redirect(site_url('servicio/servicios/apartado'));
            break;

            case 'updateContract':

                $service_type = $this->input->post('type');
                $id = $this->servicio_model->updateContract();
                $this->session->set_flashdata('flash_message', lang_key('data_updated_successfuly') );
                redirect(site_url('servicio/servicios/contrato'));
            break;

            case 'updateApartado':

                $service_type = $this->input->post('type');
                $id = $this->servicio_model->updateApartado();
                // print_r($id);die();
                $this->session->set_flashdata('flash_message', lang_key('data_updated_successfuly') );
                redirect(site_url('servicio/servicios/apartado'));
            break;
        
            case 'update':
                $service_type = $this->input->post('type');
                $this->servicio_model->update_servicio($param2);
                $this->session->set_flashdata('flash_message', lang_key('data_updated_successfuly'));
                redirect(site_url('servicio/servicios/' . $service_type));
            break;

            case 'deleteContrato':
                $this->servicio_model->delete_servicio_contrato($param2);
                $this->session->set_flashdata('flash_message', lang_key('data_deleted_successfuly'));
                redirect(site_url('servicio/servicios/contrato'));
            break;

            case 'deleteApartado':
                $this->servicio_model->delete_servicio_apartado($param2);
                $this->session->set_flashdata('flash_message', lang_key('data_deleted_successfuly'));
                redirect(site_url('servicio/servicios/apartado'));
            break;

            default:
                $page_data['service_type']  = $param1;
                $page_data['module_type']   = 'servicio';
                $page_data['page_name']     = 'servicio';
                $page_data['page_title']    = 'Servicios';
                
                switch($param1 ){
                    case 'contrato':
                        $page_data['page_type']= 'contrato';
                    break;
                    case 'funecredito':
                        $page_data['page_type']= 'funecrédito';
                    break;
                    case 'apartado':
                        $page_data['page_type']= 'servicio apartado';
                    break;                    
                    case 'funeral':
                        $page_data['page_type']= 'Funerales';
                    break;
                    default:
                        $page_data['page_type']= 'servicio';
                }
                // print_r($_SESSION); die();
                $this->load->view('admin/index', $page_data);

        }
    }

    function contratosCliente($param1 = ''){
        header('Content-Type: application/json');
        echo json_encode( $this->servicio_model->getUserContracts($param1) );
    }

    function service_details($param1 = '', $param2 = '', $param3 = 'summary')
    {
        $page_data['service_id']    = $param1;
        $service_type               = get_db_field_by_id('service', 'type', $param1);
        $page_data['page_type']     = $service_type;
        $page_data['active_tab']    = $param3;
        $page_data['module_type']   = 'servicio';
        $page_data['page_name']     = $param2 .'_detalle';
        $page_data['page_title']    = $param2 . " detalles";
        
        $this->load->view('admin/index', $page_data);
    }
}
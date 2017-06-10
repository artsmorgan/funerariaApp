<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicio_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function getUserContracts($user_id){
        $this->db->select('contract_number, monto_total, monto_abonado, monto_cuota');
        $this->db->where('contact_id', $user_id);
        $this->db->from('contratos_account');
        return $this->db->get()->result_array();
    }

    public function create_servicio() {
        $data['type'] = $this->input->post('type');
        $data['death_date'] = $this->input->post('death_date');
        $data['death_document'] = $this->input->post('death_document');
        $data['deceased_first_name'] = $this->input->post('deceased_first_name');
        $data['deceased_last_name1'] = $this->input->post('deceased_last_name1');
        $data['deceased_last_name2'] = $this->input->post('deceased_last_name2');
        $data['deceased_id_card'] = $this->input->post('deceased_id_card');
        $data['deceased_age'] = $this->input->post('deceased_age');
        $data['contact_id'] = $this->input->post('client_id') ? $this->input->post('client_id') : NULL;
        $data['relationship'] = $this->input->post('relationship');
        $data['payment_method'] = $this->input->post('payment_method');
        $data['amount'] = $this->input->post('amount');
        $data['balance'] = $this->input->post('balance');
        $data['coffin'] = $this->input->post('coffin');
        $data['bill'] = $this->input->post('bill');
        $data['veiling_room'] = $this->input->post('veiling_room');
        $data['veiling_site'] = $this->input->post('veiling_site');
        $data['transfers'] = $this->input->post('transfers');
        $data['forgetfulness'] = $this->input->post('forgetfulness');
        $data['pathology'] = $this->input->post('pathology');
        $data['technician'] = $this->input->post('technician');
        $data['flowers'] = $this->input->post('flowers');
        $data['cremation'] = $this->input->post('cremation');
        $data['morgue'] = $this->input->post('morgue');
        $data['transfer_address'] = $this->input->post('transfer_address');
        $data['driver'] = $this->input->post('driver');
        $data['float'] = $this->input->post('float');
        $data['transfer_hour'] = $this->input->post('transfer_hour');
        $data['vault_coffin'] = $this->input->post('vault_coffin');
        $data['candlestick'] = $this->input->post('candlestick');
        $data['pushcart'] = $this->input->post('pushcart');
        $data['curtain'] = $this->input->post('curtain');
        $data['transfer_observations'] = $this->input->post('transfer_observations');
        $data['arrangements'] = $this->input->post('arrangements');
        $data['pedestal'] = $this->input->post('pedestal');
        $data['lectern'] = $this->input->post('lectern');
        $data['carpet'] = $this->input->post('carpet');
        $data['service_date'] = $this->input->post('service_date');
        $data['service_hour'] = $this->input->post('service_hour');
        $data['church'] = $this->input->post('church');
        $data['cemetery'] = $this->input->post('cemetery');
        $data['service_float'] = $this->input->post('service_float');
        $data['service_driver'] = $this->input->post('service_driver');
        $data['decoration_float'] = $this->input->post('decoration_float');
        $data['decoration_driver'] = $this->input->post('decoration_driver');
        $data['service_observations'] = $this->input->post('service_observations');
        $data['contract_id'] = $this->input->post('contract_id');
        $data['user_id'] = $this->input->post('seller_id');
        $data['client_first_name'] = $this->input->post('client_first_name');
        $data['client_last_name1'] = $this->input->post('client_last_name1');
        $data['client_last_name2'] = $this->input->post('client_last_name2');
        $data['client_id_card'] = $this->input->post('client_id_card');
        $data['client_email'] = $this->input->post('client_email');
        $data['client_phone'] = $this->input->post('client_phone');
        $data['client_phone2'] = $this->input->post('client_phone2');
        $data['client_phone3'] = $this->input->post('client_phone3');

        $this->db->insert('service', $data);
        $id = $this->db->insert_id();

        if( $data['type'] == 'contrato' ){
            $this->servicio_model->create_contract($id);
        }

        if( !empty( $this->input->post('cuotaFunecredito') ) ){
            $this->servicio_model->create_funecredito($id);
        }
    }

    public function create_funecredito($service_id){
        $data['service_id'] = $service_id;
        $data['contact_id'] =  $this->input->post('client_id');
        $data['monto_total'] = $this->input->post('saldoFunecredito');
        $data['prima'] = $this->input->post('primaFunecredito');
        $data['monto_cuota'] = $this->input->post('cuotaFunecredito');
        $data['fecha_creacion'] = date('Y-m-d');
        $data['tiempo_servicio'] = $this->input->post('plazoFunecredito');

        $this->db->insert('funecredito_account', $data);
    }

    public function create_contract($service_id){
        $data['service_id'] = $service_id;
        $data['contact_id'] =  $this->input->post('client_id') ;
        $data['monto_total'] = $this->input->post('amount');
        $data['tiempo_contrato'] = $this->input->post('tiempo_contrato');
        $data['monto_cuota'] = $this->input->post('monto_cuota');
        $data['fecha_creacion'] = date('Y-m-d');
        $data['contract_number'] = $this->input->post('contract_id');

        $this->db->insert('contratos_account', $data);
    }

    public function update_servicio($service_id) {
        $data['type'] = $this->input->post('type');
        $data['death_date'] = $this->input->post('death_date');
        $data['death_document'] = $this->input->post('death_document');
        $data['deceased_first_name'] = $this->input->post('deceased_first_name');
        $data['deceased_last_name1'] = $this->input->post('deceased_last_name1');
        $data['deceased_last_name2'] = $this->input->post('deceased_last_name2');
        $data['deceased_id_card'] = $this->input->post('deceased_id_card');
        $data['deceased_age'] = $this->input->post('deceased_age');
        $data['contact_id'] = $this->input->post('client_id') ? $this->input->post('client_id') : NULL;
        $data['relationship'] = $this->input->post('relationship');
        $data['payment_method'] = $this->input->post('payment_method');
        $data['contract_id'] = $this->input->post('contract_id');
        $data['amount'] = $this->input->post('amount');
        $data['balance'] = $this->input->post('balance');
        $data['coffin'] = $this->input->post('coffin');
        $data['bill'] = $this->input->post('bill');
        $data['veiling_room'] = $this->input->post('veiling_room');
        $data['veiling_site'] = $this->input->post('veiling_site');
        $data['transfers'] = $this->input->post('transfers');
        $data['forgetfulness'] = $this->input->post('forgetfulness');
        $data['pathology'] = $this->input->post('pathology');
        $data['technician'] = $this->input->post('technician');
        $data['flowers'] = $this->input->post('flowers');
        $data['cremation'] = $this->input->post('cremation');
        $data['morgue'] = $this->input->post('morgue');
        $data['transfer_address'] = $this->input->post('transfer_address');
        $data['driver'] = $this->input->post('driver');
        $data['float'] = $this->input->post('float');
        $data['transfer_hour'] = $this->input->post('transfer_hour');
        $data['vault_coffin'] = $this->input->post('vault_coffin');
        $data['candlestick'] = $this->input->post('candlestick');
        $data['pushcart'] = $this->input->post('pushcart');
        $data['curtain'] = $this->input->post('curtain');
        $data['transfer_observations'] = $this->input->post('transfer_observations');
        $data['arrangements'] = $this->input->post('arrangements');
        $data['pedestal'] = $this->input->post('pedestal');
        $data['lectern'] = $this->input->post('lectern');
        $data['carpet'] = $this->input->post('carpet');
        $data['service_date'] = $this->input->post('service_date');
        $data['service_hour'] = $this->input->post('service_hour');
        $data['church'] = $this->input->post('church');
        $data['cemetery'] = $this->input->post('cemetery');
        $data['service_float'] = $this->input->post('service_float');
        $data['service_driver'] = $this->input->post('service_driver');
        $data['decoration_float'] = $this->input->post('decoration_float');
        $data['decoration_driver'] = $this->input->post('decoration_driver');
        $data['service_observations'] = $this->input->post('service_observations');
        $data['user_id'] = $this->input->post('seller_id');
        $data['client_first_name'] = $this->input->post('client_first_name');
        $data['client_last_name1'] = $this->input->post('client_last_name1');
        $data['client_last_name2'] = $this->input->post('client_last_name2');
        $data['client_id_card'] = $this->input->post('client_id_card');
        $data['client_email'] = $this->input->post('client_email');
        $data['client_phone'] = $this->input->post('client_phone');
        $data['client_phone2'] = $this->input->post('client_phone2');
        $data['client_phone3'] = $this->input->post('client_phone3');

        $this->db->where('service_id', $service_id);
        $this->db->update('service', $data);
    }

    public function delete_servicio($service_id) {
        $this->db->where('service_id', $service_id);
        $this->db->delete('service');

        $this->db->where('service_id', $service_id);
        $this->db->delete('contratos_account');
    }   
}
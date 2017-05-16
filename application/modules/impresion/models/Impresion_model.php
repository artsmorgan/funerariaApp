<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Impresion_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }


    public function create_servicio() {
        $data['type'] = $this->input->post('type');
        $data['death_date'] = $this->input->post('death_date');
        $data['death_document'] = $this->input->post('death_document');
        $data['deceased_name'] = $this->input->post('deceased_name');
        $data['deceased_id_card'] = $this->input->post('deceased_id_card');
        $data['deceased_age'] = $this->input->post('deceased_age');
        $data['contact_id'] = $this->input->post('client_id');
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

        $this->db->insert('service', $data);
    }

    public function update_servicio($service_id) {
        $data['type'] = $this->input->post('type');
        $data['death_date'] = $this->input->post('death_date');
        $data['death_document'] = $this->input->post('death_document');
        $data['deceased_name'] = $this->input->post('deceased_name');
        $data['deceased_id_card'] = $this->input->post('deceased_id_card');
        $data['deceased_age'] = $this->input->post('deceased_age');
        $data['contact_id'] = $this->input->post('client_id');
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

        $this->db->where('service_id', $service_id);
        $this->db->update('service', $data);
    }

    public function delete_servicio($service_id) {
        $this->db->where('service_id', $service_id);
        $this->db->delete('service');
    }
}
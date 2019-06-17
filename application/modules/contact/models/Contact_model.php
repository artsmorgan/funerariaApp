<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }
    
    // CONTACTS
    function create_contact() {
        $data['first_name']     = $this->input->post('first_name');
        $data['last_name']      = $this->input->post('last_name');
        $data['last_name2']      = $this->input->post('last_name2');
        $data['email']          = $this->input->post('email');
        $data['id_card']          = $this->input->post('id_card');
        $data['province']          = $this->input->post('province');
        $data['canton']          = $this->input->post('canton');
        $data['district']          = $this->input->post('district');
        $data['phone']          = $this->input->post('phone');
        $data['phone2']          = $this->input->post('phone2');
        $data['phone3']          = $this->input->post('phone3');
        $data['address']        = $this->input->post('address');
        $data['user_id']        = $this->input->post('seller_id');
        $data['route']        = $this->input->post('route');
        $data['amount']        = $this->input->post('amount');
        $data['balance']        = $this->input->post('balance');
        $data['localization1']        = $this->input->post('localization1');
        $data['localization2']        = $this->input->post('localization2');
        $data['localization3']        = $this->input->post('localization3');
        $data['fee']        = $this->input->post('fee');
        $data['incorporation_date'] = $this->input->post('incorporation_date');
        $data['month_payment']        = $this->input->post('month_payment');
        $data['year_payment']        = $this->input->post('year_payment');
        $data['category']        = $this->input->post('category');
        $data['advance_payment']        = $this->input->post('advance_payment');

        $this->db->insert('contact', $data);
    }
    
    function update_contact($contact_id  = '') {
        $data['first_name']     = $this->input->post('first_name');
        $data['last_name']      = $this->input->post('last_name');
        $data['last_name2']      = $this->input->post('last_name2');
        $data['email']          = $this->input->post('email');
        $data['id_card']          = $this->input->post('id_card');
        $data['province']          = $this->input->post('province');
        $data['canton']          = $this->input->post('canton');
        $data['district']          = $this->input->post('district');
        $data['phone']          = $this->input->post('phone');
        $data['phone2']          = $this->input->post('phone2');
        $data['phone3']          = $this->input->post('phone3');
        $data['address']        = $this->input->post('address');
        $data['user_id']        = $this->input->post('seller_id');
        $data['route']        = $this->input->post('route');
        $data['amount']        = $this->input->post('amount');
        $data['balance']        = $this->input->post('balance');
        $data['localization1']        = $this->input->post('localization1');
        $data['localization2']        = $this->input->post('localization2');
        $data['localization3']        = $this->input->post('localization3');
        $data['incorporation_date'] = $this->input->post('incorporation_date');
        $data['fee']        = $this->input->post('fee');
        $data['month_payment']        = $this->input->post('month_payment');
        $data['year_payment']        = $this->input->post('year_payment');
        $data['category']        = $this->input->post('category');
        $data['advance_payment']        = $this->input->post('advance_payment');

        $this->db->where('contact_id', $contact_id);
        $this->db->update('contact', $data);
    }
    
    function delete_contact($contact_id  = '') {
        $this->db->where('contact_id', $contact_id);
        $this->db->delete('contact');
    }
}
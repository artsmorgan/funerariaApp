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
        $data['type']           = $this->input->post('type');
        $data['first_name']     = $this->input->post('first_name');
        $data['last_name']      = $this->input->post('last_name');
        $data['company_name']   = $this->input->post('company_name');
        $data['email']          = $this->input->post('email');
        $data['phone']          = $this->input->post('phone');
        $data['mobile']         = $this->input->post('mobile');
        $data['website']        = $this->input->post('website');
        $data['skype_id']       = $this->input->post('skype_id');
        $data['address']        = $this->input->post('address');
        $data['country']        = $this->input->post('country');
        $data['city']           = $this->input->post('city');
        $data['state']          = $this->input->post('state');
        $data['zip_code']       = $this->input->post('zip_code');
        $data['bank_account']   = $this->input->post('bank_account');

        $this->db->insert('contact', $data);
    }
    
    function update_contact($contact_id  = '') {
        $data['type']           = $this->input->post('type');
        $data['first_name']     = $this->input->post('first_name');
        $data['last_name']      = $this->input->post('last_name');
        $data['company_name']   = $this->input->post('company_name');
        $data['email']          = $this->input->post('email');
        $data['phone']          = $this->input->post('phone');
        $data['mobile']         = $this->input->post('mobile');
        $data['website']        = $this->input->post('website');
        $data['skype_id']       = $this->input->post('skype_id');
        $data['address']        = $this->input->post('address');
        $data['country']        = $this->input->post('country');
        $data['city']           = $this->input->post('city');
        $data['state']          = $this->input->post('state');
        $data['zip_code']       = $this->input->post('zip_code');
        $data['bank_account']   = $this->input->post('bank_account');

        $this->db->where('contact_id', $contact_id);
        $this->db->update('contact', $data);
    }
    
    function delete_contact($contact_id  = '') {
        $this->db->where('contact_id', $contact_id);
        $this->db->delete('contact');
    }
}
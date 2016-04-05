<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    

    // system settings
    function update_system_settings()
    {
        $data['description'] = $this->input->post('system_title');
        $this->db->where('type', 'system_title');
        $this->db->update('settings', $data);
        
        $data['description'] = $this->input->post('text_align');
        $this->db->where('type', 'text_align');
        $this->db->update('settings', $data);
        
        $data['description'] = $this->input->post('language');
        $this->db->where('type', 'language');
        $this->db->update('settings', $data);
        
        $data['description'] = $this->input->post('system_currency_id');
        $this->db->where('type', 'system_currency_id');
        $this->db->update('settings', $data);

        $data['description'] = $this->input->post('currency_placing');
        $this->db->where('type', 'currency_placing');
        $this->db->update('settings', $data);

        $data['description'] = $this->input->post('financial_year_start');
        $this->db->where('type', 'financial_year_start');
        $this->db->update('settings', $data);

        $data['description'] = $this->input->post('system_email');
        $this->db->where('type', 'system_email');
        $this->db->update('settings', $data);
    }

    // EMAIL TEMPLATE SETTINGS
    function save_email_template($email_template_id) {
        $data['subject']    = $this->input->post('subject');
        $data['body']       = $this->input->post('body');

        $this->db->where('email_template_id', $email_template_id);
        $this->db->update('email_template', $data);
    }
    
    // VATS
    function create_vat() {
        $data['name']       = $this->input->post('name');
        $data['percentage'] = $this->input->post('percentage');

        $this->db->insert('vat', $data);
    }
    
    function update_vat($vat_id  = '') {
        $data['name']       = $this->input->post('name');
        $data['percentage'] = $this->input->post('percentage');

        $this->db->where('vat_id', $vat_id);
        $this->db->update('vat', $data);
    }
    
    function delete_vat($vat_id  = '') {
        $this->db->where('vat_id', $vat_id);
        $this->db->delete('vat');
    }
    
    // ADMINS
    function create_admin() {
        $data['first_name'] = $this->input->post('first_name');
        $data['last_name']  = $this->input->post('last_name');
        $data['email']      = $this->input->post('email');
        $data['role']      = $this->input->post('role');
        $data['password']   = sha1($this->input->post('password'));

        $this->db->insert('user', $data);
        $admin_id = $this->db->insert_id();
        
        // EMAIL NOTIFICATION
        $this->email_model->notify_email('new_admin_account_opening', $admin_id, $this->input->post('password'));
    }
    
    // NOTES
    function create_note() {
        $data['user_id']    = $this->session->userdata('user_id');

        $this->db->insert('note', $data);
        return $this->db->insert_id();
    }
    
    function update_note($note_id  = '') {
        $data['title']      = $this->input->post('title');
        $data['note']       = $this->input->post('note');

        $this->db->where('note_id', $note_id);
        $this->db->update('note', $data);
    }
    
    function delete_note($note_id  = '') {
        $this->db->where('note_id', $note_id);
        $this->db->delete('note');
    }
}
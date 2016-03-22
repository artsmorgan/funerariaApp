<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }
    
    // ACCOUNTS
    function create_account() {
        $data['type']           = $this->input->post('type');
        $data['title']          = $this->input->post('title');
        $data['account_number'] = $this->input->post('account_number');
        $data['balance']        = $this->input->post('balance');

        $this->db->insert('account', $data);
    }
    
    function update_account($account_id  = '') {
        $data['type']           = $this->input->post('type');
        $data['title']          = $this->input->post('title');
        $data['account_number'] = $this->input->post('account_number');
        $data['balance']        = $this->input->post('balance');

        $this->db->where('account_id', $account_id);
        $this->db->update('account', $data);
    }
    
    function delete_account($account_id  = '') {
        $this->db->where('account_id', $account_id);
        $this->db->delete('account');
    }
}
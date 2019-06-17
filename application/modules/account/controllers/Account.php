<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
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

        $this->load->model('account_model');
        $this->load->database();
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    }
    
    // VIEW ACCOUNT CREATION PAGE
    function account_add()
    {
        $page_data['module_type']   = 'account';
        $page_data['page_name']     = 'account_add';
        $page_data['page_title']    = lang_key('create_new_account');
        $this->load->view('admin/index', $page_data);
    }

    function account_pays()
    {
        $page_data['module_type']   = 'account';
        $page_data['page_name']     = 'account_pays';
        $page_data['page_title']    = lang_key('bill_account');
        $this->load->view('admin/index', $page_data);
    }

    function account_payments()
    {
        $page_data['module_type']   = 'account';
        $page_data['page_name']     = 'account_payments';
        $page_data['page_title']    = lang_key('pay_account');
        $this->load->view('admin/index', $page_data);
    }
    
    // MANAGE ACCOUNTS
    function accounts($param1 = '', $param2 = '')
    {
        if ($param1 == 'create') {
            $this->account_model->create_account();
            $this->session->set_flashdata('flash_message', lang_key('data_created_successfuly'));
            redirect(site_url('account/accounts'));
        }
        
        if ($param1 == 'update') {
            $this->account_model->update_account($param2);
            $this->session->set_flashdata('flash_message', lang_key('data_updated_successfuly'));
            redirect(site_url('account/accounts'));
        }
        
        if ($param1 == 'delete') {
            $this->account_model->delete_account($param2);
            $this->session->set_flashdata('flash_message', lang_key('data_deleted_successfuly'));
            redirect(site_url('account/accounts'));
        }
        
        $page_data['module_type']   = 'account';
        $page_data['page_name']     = 'account';
        $page_data['page_title']    = lang_key('manage_accounts');
        $this->load->view('admin/index', $page_data);
    }

    function view_ledger($account_id = '')
    {

        $page_data['module_type']   = 'account';
        $page_data['account_id']    = $account_id;
        $page_data['page_name']     = 'ledger_view';
        $page_data['page_title']    = lang_key('ledger');
        $this->load->view('admin/index', $page_data);
    }

    function print_ledger($account_id = '')
    {
        $page_data['account_id'] = $account_id;
        $this->load->view('account/ledger_print', $page_data);
    }
}
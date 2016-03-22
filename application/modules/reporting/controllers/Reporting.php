<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reporting extends CI_Controller {

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

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    }
    
    // MANAGE ACCOUNTS
    function account_statement()
    {
        if (isset($_POST['account_id']))
            $page_data['account_id'] = $this->input->post('account_id');
        else
            $page_data['account_id'] = 'all';
        
        if (isset($_POST['transaction_type']))
            $page_data['transaction_type'] = $this->input->post('transaction_type');
        else
            $page_data['transaction_type'] = 'all';
        
        if (isset($_POST['from_date']))
            $page_data['from_date'] = strtotime($this->input->post('from_date'));
        else
            $page_data['from_date'] = strtotime('-29 days', time());
        
        if (isset($_POST['to_date']))
            $page_data['to_date'] = strtotime($this->input->post('to_date'));
        else
            $page_data['to_date'] = strtotime(date("m/d/Y"));
        
        $page_data['module_type']   = 'reporting';
        $page_data['page_name']     = 'account_statement';
        $page_data['page_title']    = lang_key('manage_account_statements');
        $this->load->view('admin/index', $page_data);
    }
    
    // INCOME REPORT
    function income_report()
    {
        if (isset($_POST['date_range'])) {
            $date_range = $this->input->post('date_range');
            $date_range = explode(" - ", $date_range);

            $page_data['timestamp_start']   = strtotime($date_range[0]);
            $page_data['timestamp_end']     = strtotime($date_range[1]);
        } else {
            $page_data['timestamp_start']   = strtotime('-29 days', time());
            $page_data['timestamp_end']     = strtotime(date("m/d/Y"));
        }
        
        $page_data['module_type']   = 'reporting';
        $page_data['page_name']     = 'income_report';
        $page_data['page_title']    = lang_key('income_report');
        $this->load->view('admin/index', $page_data);
    }
    
    // EXPENSE REPORT
    function expense_report()
    {
        if (isset($_POST['date_range'])) {
            $date_range = $this->input->post('date_range');
            $date_range = explode(" - ", $date_range);

            $page_data['timestamp_start']   = strtotime($date_range[0]);
            $page_data['timestamp_end']     = strtotime($date_range[1]);
        } else {
            $page_data['timestamp_start']   = strtotime('-29 days', time());
            $page_data['timestamp_end']     = strtotime(date("m/d/Y"));
        }
        
        $page_data['module_type']   = 'reporting';
        $page_data['page_name']     = 'expense_report';
        $page_data['page_title']    = lang_key('expense_report');
        $this->load->view('admin/index', $page_data);
    }
    
    // INCOME EXPENSE COMPARISON
    function income_expense_comparison()
    {
        if (isset($_POST['date_range'])) {
            $date_range = $this->input->post('date_range');
            $date_range = explode(" - ", $date_range);

            $page_data['timestamp_start']   = strtotime($date_range[0]);
            $page_data['timestamp_end']     = strtotime($date_range[1]);
        } else {
            $page_data['timestamp_start']   = strtotime('-29 days', time());
            $page_data['timestamp_end']     = strtotime(date("m/d/Y"));
        }
        
        $page_data['module_type']   = 'reporting';
        $page_data['page_name']     = 'income_expense_comparison';
        $page_data['page_title']    = lang_key('income_expense_comparison_report');
        $this->load->view('admin/index', $page_data);
    }
}
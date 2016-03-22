<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Income_expense extends CI_Controller {

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

        $this->load->model('income_expense_model');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    }
    
    // MANAGE INCOME EXPENSE CATEGORIES
    function income_expense_category($param1 = '', $param2 = '')
    {
        if ($param1 == 'create') {
            $this->income_expense_model->create_income_expense_category();
            $this->session->set_flashdata('flash_message', lang_key('data_created_successfuly'));
            redirect(site_url('income_expense/income_expense_category'));
        }
        
        if ($param1 == 'update') {
            $this->income_expense_model->update_income_expense_category($param2);
            $this->session->set_flashdata('flash_message', lang_key('data_updated_successfuly'));
            redirect(site_url('income_expense/income_expense_category'));
        }
        
        if ($param1 == 'delete') {
            $this->income_expense_model->delete_income_expense_category($param2);
            $this->session->set_flashdata('flash_message', lang_key('data_deleted_successfuly'));
            redirect(site_url('income_expense/income_expense_category'));
        }
        
        $page_data['module_type']   = 'income_expense';
        $page_data['page_name']     = 'income_expense_category';
        $page_data['page_title']    = lang_key('manage_income_/_expense_categories');
        $this->load->view('admin/index', $page_data);
    }
    
    // MANAGE INCOMES
    function income($param1 = '', $param2 = '')
    {
        if ($param1 == 'create') {
            $this->income_expense_model->create_income();
            $this->session->set_flashdata('flash_message', lang_key('data_created_successfuly'));
            redirect(site_url('income_expense/income'));
        }
        
        if ($param1 == 'update') {
            $this->income_expense_model->update_income($param2);
            $this->session->set_flashdata('flash_message', lang_key('data_updated_successfuly'));
            redirect(site_url('income_expense/income'));
        }
        
        if ($param1 == 'delete') {
            $this->income_expense_model->delete_income($param2);
            $this->session->set_flashdata('flash_message', lang_key('data_deleted_successfuly'));
            redirect(site_url('income_expense/income'));
        }
        
        $page_data['module_type']   = 'income_expense';
        $page_data['page_name']     = 'income';
        $page_data['page_title']    = lang_key('manage_incomes');
        $this->load->view('admin/index', $page_data);
    }
    
    // MANAGE EXPENSES
    function expense($param1 = '', $param2 = '')
    {
        if ($param1 == 'create') {
            $this->income_expense_model->create_expense();
            $this->session->set_flashdata('flash_message', lang_key('data_created_successfuly'));
            redirect(site_url('income_expense/expense'));
        }
        
        if ($param1 == 'update') {
            $this->income_expense_model->update_expense($param2);
            $this->session->set_flashdata('flash_message', lang_key('data_updated_successfuly'));
            redirect(site_url('income_expense/expense'));
        }
        
        if ($param1 == 'delete') {
            $this->income_expense_model->delete_expense($param2);
            $this->session->set_flashdata('flash_message', lang_key('data_deleted_successfuly'));
            redirect(site_url('income_expense/expense'));
        }
        
        $page_data['module_type']   = 'income_expense';
        $page_data['page_name']     = 'expense';
        $page_data['page_title']    = lang_key('manage_expenses');
        $this->load->view('admin/index', $page_data);
    }
}
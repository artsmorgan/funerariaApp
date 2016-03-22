<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Income_expense_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }
    
    // INCOME EXPENSE CATEGORIES
    function create_income_expense_category() {
        $data['name'] = $this->input->post('name');

        $this->db->insert('income_expense_category', $data);
    }
    
    function update_income_expense_category($income_expense_category_id  = '') {
        $data['name'] = $this->input->post('name');

        $this->db->where('income_expense_category_id', $income_expense_category_id);
        $this->db->update('income_expense_category', $data);
    }
    
    function delete_income_expense_category($income_expense_category_id  = '') {
        $this->db->where('income_expense_category_id', $income_expense_category_id);
        $this->db->delete('income_expense_category');
    }
    
    // INCOMES
    function create_income() {
        $data['title']                      = $this->input->post('title');
        $data['description']                = $this->input->post('description');
        $data['income_expense_category_id'] = $this->input->post('income_expense_category_id');
        $data['amount']                     = $this->input->post('amount');
        $data['account_id']                 = $this->input->post('account_id');
        $data['date']                       = strtotime($this->input->post('date'));

        $this->db->insert('income', $data);
    }
    
    function update_income($income_id  = '') {
        $data['title']                      = $this->input->post('title');
        $data['description']                = $this->input->post('description');
        $data['income_expense_category_id'] = $this->input->post('income_expense_category_id');
        $data['amount']                     = $this->input->post('amount');
        $data['account_id']                 = $this->input->post('account_id');
        $data['date']                       = strtotime($this->input->post('date'));

        $this->db->where('income_id', $income_id);
        $this->db->update('income', $data);
    }
    
    function delete_income($income_id  = '') {
        $this->db->where('income_id', $income_id);
        $this->db->delete('income');
    }
    
    // EXPENSES
    function create_expense() {
        $data['title']                      = $this->input->post('title');
        $data['description']                = $this->input->post('description');
        $data['income_expense_category_id'] = $this->input->post('income_expense_category_id');
        $data['amount']                     = $this->input->post('amount');
        $data['account_id']                 = $this->input->post('account_id');
        $data['date']                       = strtotime($this->input->post('date'));

        $this->db->insert('expense', $data);
    }
    
    function update_expense($expense_id  = '') {
        $data['title']                      = $this->input->post('title');
        $data['description']                = $this->input->post('description');
        $data['income_expense_category_id'] = $this->input->post('income_expense_category_id');
        $data['amount']                     = $this->input->post('amount');
        $data['account_id']                 = $this->input->post('account_id');
        $data['date']                       = strtotime($this->input->post('date'));

        $this->db->where('expense_id', $expense_id);
        $this->db->update('expense', $data);
    }
    
    function delete_expense($expense_id  = '') {
        $this->db->where('expense_id', $expense_id);
        $this->db->delete('expense');
    }
}
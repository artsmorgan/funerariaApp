<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

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

        $this->load->model('contact_model');
        $this->load->model('admin/email_model');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    }
    
    // MANAGE CONTACTS
    function contacts($param1 = '', $param2 = '', $param3 = '')
    {
        if ($param1 == 'create') {
            $contact_type = $this->input->post('type');
            $this->contact_model->create_contact();
            $this->session->set_flashdata('flash_message', lang_key('data_created_successfuly'));
            //redirect(site_url('contact/contacts/' . $contact_type));
            redirect(site_url('contact/contacts/'));
        }
        
        if ($param1 == 'update') {
            $contact_type = $this->input->post('type');
            $this->contact_model->update_contact($param2);
            $this->session->set_flashdata('flash_message', lang_key('data_updated_successfuly'));
            redirect(site_url('contact/contacts/'));
        }
        
        if ($param1 == 'delete') {
            $this->contact_model->delete_contact($param2);
            $this->session->set_flashdata('flash_message', lang_key('data_deleted_successfuly'));
            redirect(site_url('contact/contacts/'));
        }
        
        $page_data['contact_type']  = $param1;
        $page_data['module_type']   = 'contact';
        $page_data['page_name']     = 'contact';
        if($param1 == 'customer')
            $page_data['page_title']    = lang_key('manage_customers');
        if($param1 == 'supplier')
            $page_data['page_title']    = lang_key('manage_suppliers');
        $this->load->view('admin/index', $page_data);
    }
    
    // CONTACT DETAILS
    function contact_details($param1 = '', $param2 = 'summary')
    {
        if ($param1 == 'send_email') {
            $contact_id     = $this->input->post('contact_id');
            $receiver_email = $this->input->post('email');
            $subject        = $this->input->post('subject');
            $message        = $this->input->post('message');
            
            // SEND EMAIL TO CONTACT
            $this->email_model->do_email($message, $subject, $receiver_email, NULL, '');
            
            $this->session->set_flashdata('flash_message', lang_key('email_sent_successfuly'));
            redirect(site_url('contact/contact_details/' . $contact_id . '/email'));
        }
        
        $page_data['contact_id']    = $param1;
        $contact_type               = get_db_field_by_id('contact', 'type', $param1);
        $page_data['contact_type']  = $contact_type;
        $page_data['active_tab']    = $param2;
        $page_data['module_type']   = 'contact';
        $page_data['page_name']     = 'contact_details';
        if($contact_type == 'customer')
            $page_data['page_title'] = lang_key('customer_details');
        if($contact_type == 'supplier')
            $page_data['page_title'] = lang_key('supplier_details');
        $this->load->view('admin/index', $page_data);
    }
}
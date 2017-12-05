<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {

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


        $this->load->model('auth_model');
        $this->load->model('admin_model');
        $this->load->model('email_model');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    }

    function index() {

        $page_data['page_name']     = 'dashboard';
        $page_data['page_title']    = lang_key('admin_dashboard');
        $this->load->view('index', $page_data);
    }


    // MANAGE ADMINS
    function vendedores($param1 = '', $param2 = '')
    {
        if ($param1 == 'create') {
            $this->admin_model->create_vend();
            $this->session->set_flashdata('flash_message', lang_key('data_created_successfuly'));
            redirect(site_url('admin/vendedores'));
        }

        if ($param1 == 'edit') {

            $this->admin_model->update_vend();
            $this->session->set_flashdata('flash_message', 'Usuario Actualizado con exito');
            redirect(site_url('admin/vendedores'));
        }

        if ($param1 == 'delete') {
            $this->admin_model->delete_vend();
            $this->session->set_flashdata('flash_message', lang_key('data_created_successfuly'));
            // redirect(site_url('admin/vendedores'));
            echo 'OK';
            return;
        }
        
        $page_data['page_name']     = 'vendedores';
        $page_data['page_title']    = lang_key('admin_list');
        $this->load->view('index', $page_data);
    }

    // MANAGE SYSTEM SETTINGS
    function system_settings($param1 = '')
    {
        if ($param1 == 'do_update') {
            $this->admin_model->update_system_settings();
            $this->load->database();
            $system_currency = $this->db->get_where('settings' , array('type' => 'system_currency_id'))->row()->description;
            $currency_placing = $this->db->get_where('settings' , array('type' => 'currency_placing'))->row()->description;

            $this->session->set_userdata('system_currency', $system_currency);
            $this->session->set_userdata('currency_placing', $currency_placing);
            $this->session->set_flashdata('flash_message', lang_key('settings_updated'));
            redirect(site_url('admin/system_settings'));
        }
        
        if ($param1 == 'upload_logo') {
            move_uploaded_file($_FILES['logo']['tmp_name'], 'uploads/logo.png');
            $this->session->set_flashdata('flash_message', lang_key('logo_updated'));
            redirect(site_url('admin/system_settings'));
        }

        $page_data['page_name']     = 'system_settings';
        $page_data['page_title']    = lang_key('system_settings');
        $this->load->view('admin/index', $page_data);
    }

    // EMAIL TEMPLATES
    function email_settings($param1 = 1, $param2 = '')
    {
        if ($param1 == 'do_update') {
            $this->admin_model->save_email_template($param2);
            $this->session->set_flashdata('flash_message', lang_key('email_template_updated'));
            redirect(site_url('admin/email_settings/' . $param2));
        }

        $page_data['current_email_template_id'] = $param1;
        $page_data['page_name']                 = 'email_settings';
        $page_data['page_title']                = lang_key('email_template_settings');
        $this->load->view('admin/index', $page_data);
    }

    // CHANGE PASSWORD
    function manage_profile($param1 = '', $param2 = '', $param3 = '')
    {
        if($param1 == 'edit_profile') {
            $data['first_name'] = $this->input->post('first_name');
            $data['last_name']  = $this->input->post('last_name');
            $data['email']      = $this->input->post('email');
            
            $this->db->update('user', $data, array('user_id' => $param2));
            
            $this->session->set_flashdata('flash_message', lang_key('profile_info_updated_successfuly'));
            redirect(site_url('admin/manage_profile'));
        }
        
        if ($param1 == 'change_password') {
            $current_password_input = sha1($this->input->post('password'));
            $new_password           = sha1($this->input->post('new_password'));
            $confirm_new_password   = sha1($this->input->post('confirm_new_password'));

            $current_password_db = $this->db->get_where('user', array('user_id' => $this->session->userdata('user_id')))->row()->password;

            if ($current_password_db == $current_password_input && $new_password == $confirm_new_password) {
                $this->db->where('user_id', $this->session->userdata('user_id'));
                $this->db->update('user', array('password' => $new_password));

                $this->session->set_flashdata('flash_message', lang_key('password_info_updated_successfuly'));
                redirect(site_url('admin/manage_profile'));
            } else {
                $this->session->set_flashdata('flash_message', lang_key('password_update_failed'));
                redirect(site_url('admin/manage_profile'));
            }
        }
        
        $page_data['page_name']     = 'manage_profile';
        $page_data['page_title']    = lang_key('manage_profile');
        $this->load->view('admin/index', $page_data);
    }
    
    // LANGUAGE SETTINGS
    function manage_language($param1 = '', $param2 = '', $param3 = '')
    {
        if ($param1 == 'edit_phrase') {
            $page_data['edit_profile'] = $param2;
        }
        
        if ($param1 == 'update_phrase') {
            $language = $param2;
            $total_phrase = $this->input->post('total_phrase');
            for ($i = 1; $i < $total_phrase; $i++) {
                //$data[$language]	=	$this->input->post('phrase').$i;
                $this->db->where('phrase_id', $i);
                $this->db->update('language', array($language => $this->input->post('phrase' . $i)));
            }
            redirect(site_url('admin/manage_language/edit_phrase/' . $language));
        }
        
        if ($param1 == 'do_update') {
            $language = $this->input->post('language');
            $data[$language] = $this->input->post('phrase');
            $this->db->where('phrase_id', $param2);
            $this->db->update('language', $data);
            $this->session->set_flashdata('flash_message', lang_key('settings_updated'));
            redirect(site_url('admin/manage_language'));
        }
        
        if ($param1 == 'add_phrase') {
            $data['phrase'] = $this->input->post('phrase');
            $this->db->insert('language', $data);
            $this->session->set_flashdata('flash_message', lang_key('settings_updated'));
            redirect(site_url('admin/manage_language'));
        }
        
        if ($param1 == 'add_language') {
            $language = $this->input->post('language');
            $this->load->dbforge();
            $fields = array(
                $language => array(
                    'type' => 'LONGTEXT'
                )
            );
            $this->dbforge->add_column('language', $fields);

            $this->session->set_flashdata('flash_message', lang_key('settings_updated'));
            redirect(site_url('admin/manage_language'));
        }
        
        if ($param1 == 'delete_language') {
            $language = $param2;
            $this->load->dbforge();
            $this->dbforge->drop_column('language', $language);
            $this->session->set_flashdata('flash_message', lang_key('settings_updated'));

            redirect(site_url('admin/manage_language'));
        }
        
        $page_data['page_name']     = 'manage_language';
        $page_data['page_title']    = lang_key('manage_language');
        $this->load->view('admin/index', $page_data);
    }
    
    function dump_language_file($lang = 'en')
    {
        $languages = $this->db->get('language')->result_array();
        $lang_array = array();

        foreach($languages as $row)
        {
            $lang_array[$row['phrase']] = $row[$lang]; // add each user id to the array
        }
        
        $this->load->library('yaml');
	    $yaml = $this->yaml->dump($lang_array);

	$this->load->helper('file');
	$file_name = $lang.'.yml';

	if ( ! write_file('./locals/'.$file_name, $yaml))
	{
            $this->session->set_flashdata('flash_message', lang_key('file_creation_failed'));
        }
	else
	{
            $this->session->set_flashdata('flash_message', lang_key('file_creation_success'));                    
        }
        
        redirect(site_url('admin/manage_language'));
        
    }
    
    // MANAGE VATS
    function vat($param1 = '', $param2 = '')
    {
        if ($param1 == 'create') {
            $this->admin_model->create_vat();
            $this->session->set_flashdata('flash_message', lang_key('data_created_successfuly'));
            redirect(site_url('admin/vat'));
        }
        
        if ($param1 == 'update') {
            $this->admin_model->update_vat($param2);
            $this->session->set_flashdata('flash_message', lang_key('data_updated_successfuly'));
            redirect(site_url('admin/vat'));
        }
        
        if ($param1 == 'delete') {
            $this->admin_model->delete_vat($param2);
            $this->session->set_flashdata('flash_message', lang_key('data_deleted_successfuly'));
            redirect(site_url('admin/vat'));
        }
        
        $page_data['page_name']     = 'vat';
        $page_data['page_title']    = lang_key('manage_vat_settings');
        $this->load->view('index', $page_data);
    }
    
    // MANAGE ADMINS
    function admins($param1 = '', $param2 = '')
    {
        if ($param1 == 'create') {
            $this->admin_model->create_admin();
            $this->session->set_flashdata('flash_message', lang_key('data_created_successfuly'));
            redirect(site_url('admin/admins'));
        }

        if ($param1 == 'edit') {

            $this->admin_model->update_admin($param2);
            $this->session->set_flashdata('flash_message', 'Usuario Actualizado con exito');
            redirect(site_url('admin/admins'));
        }

        if ($param1 == 'delete') {
            $this->admin_model->delete_admin();
            $this->session->set_flashdata('flash_message', lang_key('data_created_successfuly'));
            //redirect(site_url('admin/admins'));
            echo 'OK';
            return;
        }
        
        $page_data['page_name']     = 'admin';
        $page_data['page_title']    = lang_key('admin_list');
        $this->load->view('index', $page_data);
    }
    
    // MANAGE NOTES
    function note($param1 = '', $param2 = '')
    {
        if ($param1 == 'create') {
            $active_note_id = $this->admin_model->create_note();
            $this->session->set_flashdata('flash_message', lang_key('data_created_successfuly'));
            redirect(site_url('admin/note/' . $active_note_id));
        }
        
        if ($param1 == 'update') {
            $this->admin_model->update_note($param2);
            $this->session->set_flashdata('flash_message', lang_key('data_updated_successfuly'));
            redirect(site_url('admin/note/' . $param2));
        }
        
        if ($param1 == 'delete') {
            $this->admin_model->delete_note($param2);
            $this->session->set_flashdata('flash_message', lang_key('data_deleted_successfuly'));
            redirect(site_url('admin/note'));
        }
        
        $page_data['active_note_id']    = $param1;
        $page_data['page_name']         = 'note';
        $page_data['page_title']        = lang_key('manage_notes');
        $this->load->view('index', $page_data);
    }
    
    // EMAIL INVOICE
    function email_invoice($id = '', $invoice_type = '')
    {
        
        $this->load->helper(array('dompdf', 'file'));
        
        $page_data['id']    = $id;
        $html               = $this->load->view('inventory/' . $invoice_type . '_invoice_pdf', $page_data, true);
        
        $data = pdf_create($html, '', false);
        write_file('uploads/invoice.pdf', $data);
        
        if($invoice_type == 'sale')
            $receiver_id = $this->db->get_where('sale', array('sale_id' => $id))->row()->customer_id;
        if($invoice_type == 'purchase')
            $receiver_id = $this->db->get_where('purchase', array('purchase_id' => $id))->row()->supplier_id;
        
        $receiver_email = $this->db->get_where('contact' , array('contact_id' => $receiver_id))->row()->email;
        
        // send the invoice to receiver email
        $this->email_model->do_email('', lang_key($invoice_type) . ' ' . lang_key('invoice'), $receiver_email, NULL, base_url() . 'uploads/invoice.pdf');
        
        $this->session->set_flashdata('flash_message', lang_key('invoice_emailed_successfuly'));
        redirect(site_url('inventory/' . $invoice_type . '_invoice/' . $id));
    }
    
    
    function insert_english_language()
    {
        
        
        /*$lang = $this->db->get('language')->result_array();
        print_r($lang);
        
        foreach ($lang as $row)
        {
            $data['en'] =  ucwords(str_replace('_',' ',$row['phrase']));
            
            $this->db->update('language',$data,array('phrase_id'=> $row['phrase_id']));
        }
        die;*/
        
    }
}
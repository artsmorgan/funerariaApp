<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

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

        $this->load->model('inventory_model');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    }
    
    // MANAGE PRODUCT/SERVICE CATEGORIES
    function product_category($param1 = '', $param2 = '')
    {
        if ($param1 == 'create') {
            $this->inventory_model->create_product_category();
            $this->session->set_flashdata('flash_message', lang_key('data_created_successfuly'));
            redirect(site_url('inventory/product_category'));
        }
        
        if ($param1 == 'update') {
            $this->inventory_model->update_product_category($param2);
            $this->session->set_flashdata('flash_message', lang_key('data_updated_successfuly'));
            redirect(site_url('inventory/product_category'));
        }
        
        if ($param1 == 'delete') {
            $this->inventory_model->delete_product_category($param2);
            $this->session->set_flashdata('flash_message', lang_key('data_deleted_successfuly'));
            redirect(site_url('inventory/product_category'));
        }
        
        $page_data['module_type']   = 'inventory';
        $page_data['page_name']     = 'product_category';
        $page_data['page_title']    = lang_key('manage_product_/_service_categories');
        $this->load->view('admin/index', $page_data);
    }
    
    // MANAGE PRODUCTS/SERVICES
    function products($param1 = '', $param2 = '', $param3 = '')
    {
        if ($param1 == 'create') {
            $product_type = $this->input->post('type');
            $this->inventory_model->create_product();
            $this->session->set_flashdata('flash_message', lang_key('data_created_successfuly'));
            redirect(site_url('inventory/products/' . $product_type));
        }
        
        if ($param1 == 'update') {
            $product_type = $this->input->post('type');
            $this->inventory_model->update_product($param2);
            $this->session->set_flashdata('flash_message', lang_key('data_updated_successfuly'));
            redirect(site_url('inventory/products/' . $product_type));
        }
        
        if ($param1 == 'delete') {
            $this->inventory_model->delete_product($param2);
            $this->session->set_flashdata('flash_message', lang_key('data_deleted_successfuly'));
            redirect(site_url('inventory/products/' . $param3));
        }
        
        $page_data['product_type']  = $param1;
        $page_data['module_type']   = 'inventory';
        $page_data['page_name']     = 'product';
        if($param1 == 'product')
            $page_data['page_title']    = lang_key('manage_products');
        if($param1 == 'service')
            $page_data['page_title']    = lang_key('manage_services');
        $this->load->view('admin/index', $page_data);
    }
    
    // ADD PURCHASES
    function purchase_add()
    {
        $page_data['module_type']   = 'inventory';
        $page_data['page_name']     = 'purchase_add';
        $page_data['page_title']    = lang_key('add_new_purchase');
        $this->load->view('admin/index', $page_data);
    }
    
    // EDIT PURCHASES
    function purchase_edit($param1 = '')
    {
        $page_data['purchase_id']   = $param1;
        $page_data['module_type']   = 'inventory';
        $page_data['page_name']     = 'purchase_edit';
        $page_data['page_title']    = lang_key('edit_purchase');
        $this->load->view('admin/index', $page_data);
    }
    
    // ADD PURCHASES
    function purchase_invoice($param1 = '')
    {
        $page_data['purchase_id']   = $param1;
        $page_data['module_type']   = 'inventory';
        $page_data['page_name']     = 'purchase_invoice';
        $page_data['page_title']    = lang_key('purchase_invoice_details');
        $this->load->view('admin/index', $page_data);
    }

    // MANAGE PURCHASES
    function purchase($param1 = '', $param2 = '')
    {
        if ($param1 == 'create') {
            $this->inventory_model->create_purchase();
            $this->session->set_flashdata('flash_message', lang_key('data_created_successfuly'));
            redirect(site_url('inventory/purchase'));
        }
        
        if ($param1 == 'update') {
            $this->inventory_model->update_purchase($param2);
            $this->session->set_flashdata('flash_message', lang_key('data_updated_successfuly'));
            redirect(site_url('inventory/purchase'));
        }
        
        if ($param1 == 'delete') {
            $this->inventory_model->delete_purchase($param2);
            $this->session->set_flashdata('flash_message', lang_key('data_deleted_successfuly'));
            redirect(site_url('inventory/purchase'));
        }
        
        $page_data['module_type']   = 'inventory';
        $page_data['page_name']     = 'purchase';
        $page_data['page_title']    = lang_key('manage_purchases');
        $this->load->view('admin/index', $page_data);
    }

    // DECLARATION: GET THE PRODUCT INFORMATIONS FOR PURCHASE ON AJAX CALL
    function get_product_for_purchase($input_product_id, $total_number)
    {
        $product_info = $this->db->get_where('product', array('product_id' => $input_product_id))->row();

        echo
        '<tr id="entry_row_' . $total_number . '">
            <td id="serial_' . $total_number . '">' . $total_number . '</td>
            <td>' . $product_info->product_code . '</td>
            <td>' . $product_info->name . ' 
                <input type="hidden" name="product_id[]" value="' . $product_info->product_id . '"
                    id="single_entry_product_id_' . $total_number . '">
            </td>
            <td>
                <input type="number" name="quantity[]" class="form-control" value="1" min="1"
                    id="single_entry_quantity_' . $total_number . '"
                    onkeyup="calculate_single_entry_sum(' . $total_number . ')"
                    onclick="calculate_single_entry_sum(' . $total_number . ')">
            </td>
            <td>
                <input type="number" name="purchase_price[]" class="form-control" value="' . $product_info->price . '" min="1"
                    id="single_entry_purchase_price_' . $total_number . '"
                    onkeyup="calculate_single_entry_sum(' . $total_number . ')"
                    onclick="calculate_single_entry_sum(' . $total_number . ')">
            </td>
            <td id="single_entry_total_' . $total_number . '">' . $product_info->price . '</td>
            <td>
                <i class="entypo-trash tooltip-primary" data-toggle="tooltip"
                    data-original-title="' . lang_key('delete') . '"
                    onclick="delete_row(' . $total_number . ')"
                    id="delete_button_' . $total_number . '" style="cursor: pointer;"></i>
            </td>
        </tr>';
    }
    
    function get_grand_total_for_purchase($sub_total = '', $vat_id = '', $discount = '', $grand_total = 0)
    {
        if($vat_id != 0) {
            $vat_percentage = $this->db->get_where('vat', array('vat_id' => $vat_id))->row()->percentage;
            $grand_total = $sub_total + $sub_total * $vat_percentage / 100 - $discount;
        } else
            $grand_total = $sub_total - $discount;
        
        echo $grand_total;
    }
    
    // ADD SALES
    function sale_add()
    {
        $page_data['module_type']   = 'inventory';
        $page_data['page_name']     = 'sale_add';
        $page_data['page_title']    = lang_key('add_new_sale');
        $this->load->view('admin/index', $page_data);
    }
    
    // EDIT SALES
    function sale_edit($param1 = '')
    {
        $page_data['sale_id']       = $param1;
        $page_data['module_type']   = 'inventory';
        $page_data['page_name']     = 'sale_edit';
        $page_data['page_title']    = lang_key('edit_sale');
        $this->load->view('admin/index', $page_data);
    }
    
    // ADD SALES
    function sale_invoice($param1 = '')
    {
        $page_data['sale_id']       = $param1;
        $page_data['module_type']   = 'inventory';
        $page_data['page_name']     = 'sale_invoice';
        $page_data['page_title']    = lang_key('sale_invoice_details');
        $this->load->view('admin/index', $page_data);
    }

    // MANAGE SALES
    function sale($param1 = '', $param2 = '')
    {
        if ($param1 == 'create') {
            $this->inventory_model->create_sale();
            $this->session->set_flashdata('flash_message', lang_key('data_created_successfuly'));
            redirect(site_url('inventory/sale'));
        }
        
        if ($param1 == 'update') {
            $this->inventory_model->update_sale($param2);
            $this->session->set_flashdata('flash_message', lang_key('data_updated_successfuly'));
            redirect(site_url('inventory/sale'));
        }
        
        if ($param1 == 'delete') {
            $this->inventory_model->delete_sale($param2);
            $this->session->set_flashdata('flash_message', lang_key('data_deleted_successfuly'));
            redirect(site_url('inventory/sale'));
        }
        
        $page_data['module_type']   = 'inventory';
        $page_data['page_name']     = 'sale';
        $page_data['page_title']    = lang_key('manage_sales');
        $this->load->view('admin/index', $page_data);
    }

    // DECLARATION: GET THE PRODUCT INFORMATIONS FOR SALE ON AJAX CALL
    function get_product_for_sale($input_product_id, $total_number)
    {
        $product_info = $this->db->get_where('product', array('product_id' => $input_product_id))->row();

        echo
        '<tr id="entry_row_' . $total_number . '">
            <td id="serial_' . $total_number . '">' . $total_number . '</td>
            <td>' . $product_info->product_code . '</td>
            <td>' . $product_info->name . ' 
                <input type="hidden" name="product_id[]" value="' . $product_info->product_id . '"
                    id="single_entry_product_id_' . $total_number . '">
            </td>
            <td>
                <input type="number" name="quantity[]" class="form-control" value="1" min="1"
                    id="single_entry_quantity_' . $total_number . '"
                    onkeyup="calculate_single_entry_sum(' . $total_number . ')"
                    onclick="calculate_single_entry_sum(' . $total_number . ')">
            </td>
            <td>
                <input type="number" name="sale_price[]" class="form-control" value="' . $product_info->price . '" min="1"
                    id="single_entry_sale_price_' . $total_number . '"
                    onkeyup="calculate_single_entry_sum(' . $total_number . ')"
                    onclick="calculate_single_entry_sum(' . $total_number . ')">
            </td>
            <td id="single_entry_total_' . $total_number . '">' . $product_info->price . '</td>
            <td>
                <i class="entypo-trash tooltip-primary" data-toggle="tooltip"
                    data-original-title="' . lang_key('delete') . '"
                    onclick="delete_row(' . $total_number . ')"
                    id="delete_button_' . $total_number . '" style="cursor: pointer;"></i>
            </td>
        </tr>';
    }
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventory_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }
    
    // PRODUCT/SERVICE CATEGORIES
    function create_product_category() {
        $data['name'] = $this->input->post('name');

        $this->db->insert('product_category', $data);
    }
    
    function update_product_category($product_category_id  = '') {
        $data['name'] = $this->input->post('name');

        $this->db->where('product_category_id', $product_category_id);
        $this->db->update('product_category', $data);
    }
    
    function delete_product_category($product_category_id  = '') {
        $this->db->where('product_category_id', $product_category_id);
        $this->db->delete('product_category');
    }
    
    // PRODUCTS/SERVICES
    function create_product() {
        $data['type']                   = $this->input->post('type');
        $data['product_code']           = $this->input->post('product_code');
        $data['name']                   = $this->input->post('name');
        $data['product_category_id']    = $this->input->post('product_category_id');
        $data['price']                  = $this->input->post('price');
        $data['notes']                  = $this->input->post('notes');

        $this->db->insert('product', $data);
    }
    
    function update_product($product_id  = '') {
        $data['name']                   = $this->input->post('name');
        $data['product_category_id']    = $this->input->post('product_category_id');
        $data['price']                  = $this->input->post('price');
        $data['notes']                  = $this->input->post('notes');

        $this->db->where('product_id', $product_id);
        $this->db->update('product', $data);
    }
    
    function delete_product($product_id  = '') {
        $this->db->where('product_id', $product_id);
        $this->db->delete('product');
    }
    
    // PURCHASES
    function create_purchase() {
        $data['purchase_code']  = $this->input->post('purchase_code');
        $data['supplier_id']    = $this->input->post('supplier_id');
        $data['account_id']     = $this->input->post('account_id');
        $data['amount']         = $this->input->post('amount');
        $data['vat_id']         = $this->input->post('vat_id');
        $data['discount']       = $this->input->post('discount');
        $data['creation_date']  = strtotime(date('m/d/Y'));
        $data['due_date']       = strtotime($this->input->post('due_date'));

        $this->db->insert('purchase', $data);
        $purchase_id = $this->db->insert_id();
        
        // CREATE PURCHASE ITEM ENTRY FOR EACH ADDED PRODUCT/SERVICE
        $data2['purchase_id']   = $purchase_id;
        $product_ids            = $this->input->post('product_id');
        $quantities             = $this->input->post('quantity');
        $purchase_prices        = $this->input->post('purchase_price');
        
        for($i = 0; $i < count($product_ids); $i++)
        {
            $data2['product_id']        = $product_ids[$i];
            $data2['quantity']          = $quantities[$i];
            $data2['purchase_price']    = $purchase_prices[$i];
            
            $this->db->insert('purchase_item', $data2);
        }
    }
    
    function update_purchase($purchase_id  = '') {
        $data['supplier_id']    = $this->input->post('supplier_id');
        $data['account_id']     = $this->input->post('account_id');
        $data['amount']         = $this->input->post('amount');
        $data['vat_id']         = $this->input->post('vat_id');
        $data['discount']       = $this->input->post('discount');
        $data['due_date']       = strtotime($this->input->post('due_date'));

        $this->db->where('purchase_id', $purchase_id);
        $this->db->update('purchase', $data);
        
        // DELETE OLD PURCHASE ITEM ENTRIES FOR THIS PURCHASE
        $this->db->where('purchase_id', $purchase_id);
        $this->db->delete('purchase_item');
        
        // CREATE NEW PURCHASE ITEM ENTRY FOR EACH ADDED PRODUCT/SERVICE
        $data2['purchase_id']   = $purchase_id;
        $product_ids            = $this->input->post('product_id');
        $quantities             = $this->input->post('quantity');
        $purchase_prices        = $this->input->post('purchase_price');
        
        for($i = 0; $i < count($product_ids); $i++)
        {
            $data2['product_id']        = $product_ids[$i];
            $data2['quantity']          = $quantities[$i];
            $data2['purchase_price']    = $purchase_prices[$i];
            
            $this->db->insert('purchase_item', $data2);
        }
    }
    
    function delete_purchase($purchase_id  = '') {
        // DELETE ALL PURCHASE ITEM ENTRIES FOR THIS PURCHASE
        $this->db->where('purchase_id', $purchase_id);
        $this->db->delete('purchase_item');
        
        $this->db->where('purchase_id', $purchase_id);
        $this->db->delete('purchase');
    }
    
    // SALES
    function create_sale() {
        $data['sale_code']      = $this->input->post('sale_code');
        $data['customer_id']    = $this->input->post('customer_id');
        $data['account_id']     = $this->input->post('account_id');
        $data['amount']         = $this->input->post('amount');
        $data['vat_id']         = $this->input->post('vat_id');
        $data['discount']       = $this->input->post('discount');
        $data['creation_date']  = strtotime(date('m/d/Y'));
        $data['due_date']       = strtotime($this->input->post('due_date'));

        $this->db->insert('sale', $data);
        $sale_id = $this->db->insert_id();
        
        // CREATE SALE ITEM ENTRY FOR EACH ADDED PRODUCT/SERVICE
        $data2['sale_id']   = $sale_id;
        $product_ids        = $this->input->post('product_id');
        $quantities         = $this->input->post('quantity');
        $sale_prices        = $this->input->post('sale_price');
        
        for($i = 0; $i < count($product_ids); $i++)
        {
            $data2['product_id']    = $product_ids[$i];
            $data2['quantity']      = $quantities[$i];
            $data2['sale_price']    = $sale_prices[$i];
            
            $this->db->insert('sale_item', $data2);
        }
    }
    
    function update_sale($sale_id  = '') {
        $data['customer_id']    = $this->input->post('customer_id');
        $data['account_id']     = $this->input->post('account_id');
        $data['amount']         = $this->input->post('amount');
        $data['vat_id']         = $this->input->post('vat_id');
        $data['discount']       = $this->input->post('discount');
        $data['due_date']       = strtotime($this->input->post('due_date'));

        $this->db->where('sale_id', $sale_id);
        $this->db->update('sale', $data);
        
        // DELETE OLD SALE ITEM ENTRIES FOR THIS SALE
        $this->db->where('sale_id', $sale_id);
        $this->db->delete('sale_item');
        
        // CREATE NEW SALE ITEM ENTRY FOR EACH ADDED PRODUCT/SERVICE
        $data2['sale_id']   = $sale_id;
        $product_ids        = $this->input->post('product_id');
        $quantities         = $this->input->post('quantity');
        $sale_prices        = $this->input->post('sale_price');
        
        for($i = 0; $i < count($product_ids); $i++)
        {
            $data2['product_id']    = $product_ids[$i];
            $data2['quantity']      = $quantities[$i];
            $data2['sale_price']    = $sale_prices[$i];
            
            $this->db->insert('sale_item', $data2);
        }
    }
    
    function delete_sale($sale_id  = '') {
        // DELETE ALL SALE ITEM ENTRIES FOR THIS SALE
        $this->db->where('sale_id', $sale_id);
        $this->db->delete('sale_item');
        
        $this->db->where('sale_id', $sale_id);
        $this->db->delete('sale');
    }
}
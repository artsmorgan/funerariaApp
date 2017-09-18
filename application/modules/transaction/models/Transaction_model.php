<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaction_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    function add_transaction( $data ){
        $this->db->insert('transaccion', $data);
        return $this->db->insert_id();
    }

    function add_transaction_log( $data ){
        $this->db->insert('transaccion_log', $data);
        return $this->db->insert_id();
    }

    function get_contrato( $id ){
        $sql = "SELECT * FROM bk_contratos_account WHERE id = ?";

        return $this->db->query( $sql, array( $id ) )->row_array();
    }

    function update_contrato( $id, $data ){
        $this->db->where('id', $id);
        $this->db->update('contratos_account', $data);
    }

    function get_funecredito( $id ){
        $sql = "SELECT * FROM bk_funecredito_account WHERE id = ?";

        return $this->db->query( $sql, array( $id ) )->row_array();
    }

    function update_funecredito( $id, $data ){
        $this->db->where('id', $id);
        $this->db->update('funecredito_account', $data);
    }

    function get_apartado( $id ){
        $sql = "SELECT * FROM bk_apartados_account WHERE id = ?";

        return $this->db->query( $sql, array( $id ) )->row_array();
    }

    function update_apartado( $id, $data ){
        $this->db->where('id', $id);
        $this->db->update('apartados_account', $data);
    }
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aviso_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function update_print_date_by_route( $route ) {
        $sql = "UPDATE  bk_service AS s INNER JOIN bk_contact AS c ON s.contact_id = c.contact_id SET s.print_date = ?  WHERE c.route = ?";

        $this->db->query($sql, array( date('Y-m-d'), $route ) );
    }
}
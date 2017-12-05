<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * BusinessDirectory auth Controller
 *
 * This class handles user authentication related functionality
 *
 * @package     Auth
 * @subpackage  Auth
 * @author      sc mondal
 * @link        http://dbcinfotech.net
 */
class Install extends CI_Controller {

    public function index() {
        $this->load->view('install');
    }


}

/* End of file install.php */
/* Location: ./system/application/modules/install/controllers/install.php */
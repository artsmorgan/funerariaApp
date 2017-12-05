<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_model extends CI_Model {
	
    function __construct()
    {
        parent::__construct();
    }

    function notify_email($task = '' , $param2 = '' , $param3 = '' , $param4 = '' , $param5 = '')
    {
    	$email_sub = $this->db->get_where('email_template' , array('task' => $task))->row()->subject;
    	$email_msg = $this->db->get_where('email_template' , array('task' => $task))->row()->body;

        // EMAIL NOTIFICATION FOR NEW ADMIN ACCOUNT OPENNING BY ADMIN
        if ($task == 'new_admin_account_opening')
        {
            $admin_id       = $param2;
            $admin          = $this->db->get_where('user', array('user_id' => $admin_id))->row();
            $ADMIN_PASSWORD = $param3;
            $ADMIN_NAME     = $admin->first_name . ' ' . $admin->last_name;
            $ADMIN_EMAIL    = $admin->email;
            $SYSTEM_URL     = base_url();

            $email_msg  = str_replace('[ADMIN_NAME]', $ADMIN_NAME, $email_msg);
            $email_msg  = str_replace('[SYSTEM_URL]', $SYSTEM_URL, $email_msg);
            $email_msg  = str_replace('[ADMIN_EMAIL]', $ADMIN_EMAIL, $email_msg);
            $email_msg  = str_replace('[ADMIN_PASSWORD]', $ADMIN_PASSWORD, $email_msg);
            
            $email_to   = $ADMIN_EMAIL;
        }

        // email notification for reseting password
        if ($task == 'password_reset_confirmation')
        {
            $email          = $param2;
            $NEW_PASSWORD   = $param3;
            $user           = $this->db->get_where('user', array('email' => $email))->row();
            $NAME           = $user->first_name . ' ' . $user->last_name;
            $SYSTEM_URL     = base_url();

            $email_msg      = str_replace('[NAME]' , $NAME , $email_msg);
            $email_msg      = str_replace('[NEW_PASSWORD]' , $NEW_PASSWORD , $email_msg);
            $email_msg      = str_replace('[SYSTEM_URL]' , $SYSTEM_URL , $email_msg);

            $email_to       = $email;
        }
        
    	$this->do_email($email_msg, $email_sub, $email_to);
    }
	
    // CUSTOM EMAIL SENDER
    function do_email($msg=NULL, $sub=NULL, $to=NULL, $from=NULL, $attachment_url=NULL)
    {
        $config = array();
        $config['useragent']    = "CodeIgniter";
        $config['mailpath']     = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol']     = "smtp";
        $config['smtp_host']    = "localhost";
        $config['smtp_port']    = "25";
        $config['mailtype']     = 'html';
        $config['charset']      = 'utf-8';
        $config['newline']      = "\r\n";
        $config['wordwrap']     = TRUE;

        $this->load->library('email');

        $this->email->initialize($config);

        $system_name = $this->db->get_where('settings' , array('type' => 'system_title'))->row()->description;
        if ($from == NULL)
            $from = $this->db->get_where('settings' , array('type' => 'system_email'))->row()->description;
            //$from = $system_name . '@example.com';

        // attachment
        if ($attachment_url != NULL)
            $this->email->attach( $attachment_url );

        $this->email->from($from, $system_name);
        $this->email->from($from, $system_name);
        $this->email->to($to);
        $this->email->subject($sub);

        $this->email->message($msg);

        $this->email->send();

        //$this->email->print_debugger();
        //exit();
    }
}


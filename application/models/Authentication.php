<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Authentication extends CI_Model
{

    function __construct()
	{

		parent::__construct();
        $this->load->database();
        $this->load->helper('url');
		$this->load->helper('ui');
		
	}

    public function user_access($user_id)
    {
        if(empty($user_id))
        {
            $_SESSION['msg'] = message('error','Please login and continue');
            redirect('home/login');
        }
    }
    
}





?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	function __construct()
	{

		parent::__construct();
		$this->load->helper('url');
		$this->file_name = $this->uri->segment(2);
		//$this->load->dadabase();
		$this->load->model('Process');
		$this->load->database();
		$this->load->helper('form');
        //$this->load->model('Search_Model');
		$this->load->library('upload');
		$this->load->helper(array('form', 'url'));
		//$session_start();
		@session_start();
		
	}


	public function index()
	{
		
		$this->load->view('home');
		//echo base_url();
	}

	public function signup()
	{

		//echo '<pre>';print_r($_POST);echo '</pre>';
		$this->form_validation->set_rules('Username','Username','required|alpha');
		$this->form_validation->set_rules('emailid','emailid','required|valid_email');
		$this->form_validation->set_rules('Password','Password','required|min_length[6]');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, show the registration form again with errors
			//echo 'test';
            $this->load->view('signup');
        } else {
			//echo 'test1';
            //Get user input
            $data = array(
                'user_email' => $this->input->post('emailid'),
                'user_name' => $this->input->post('Username'),
                'user_password' => $this->input->post('Password')
            );

			//echo '<pre>';print_r($data);echo '</pre>';exit;
			$insert_data = $this->Process->data_insert('user_tb', $data);
			//echo $this->db->last_query();
            // Implement registration logic (save user data)
            //$this->auth_model->register($data);

            // Redirect user to the login page or show a success message
			if($insert_data)
			{
				redirect('home/login');
			}
            //redirect('login');
        }

		//$this->load->view('signup');
	}

	public function login()
	{


		$_SESSION['login_invalid']='';
		$this->form_validation->set_rules('Username', 'Username', 'required');
        $this->form_validation->set_rules('Password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, show the login form again with errors
            $this->load->view('login');
        } else {
            // Get user input
            $user_name = $this->input->post('Username');
            $user_pass = $this->input->post('Password');

            // Implement login logic (check credentials)
			$get_data = array('user_name'=>$user_name,'user_password'=>$user_pass);
            $user = $this->Process->data_get('user_tb', $get_data);
			$_SESSION['user_id'] = $user['row']->user_id;
			$_SESSION['user_name'] = $user['row']->user_name;

            if ($user['nrows'] > 0) {
                // User is authenticated, redirect to the dashboard or desired page
                redirect('Book_net/user_welcome');
            } else {
                // Authentication failed, show error message
                $_SESSION['login_invalid']= 'yes';
                $this->load->view('login');
				
				
            }
        }
		
	}


	function log_out()
	{
		session_destroy();
		redirect(base_url());
	}
}

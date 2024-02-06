<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book_net extends CI_Controller {

	function __construct()
	{

		parent::__construct();
		$this->load->helper('url');
		//$this->load->helper('access');
		$this->_user_id = $this->uri->segment(3);
		$this->function_name = $this->uri->segment(2);
		//$this->load->dadabase();
		$this->load->model('Process');

		$this->load->helper('form');
        //$this->load->model('Search_Model');
		$this->load->library('upload');
		$this->load->helper(array('form', 'url'));
		$this->load->model('Authentication');
		$this->Authentication->user_access($_SESSION['user_id']);
		$this->load->helper('ui');
		
		// $response = user_access($_SESSION['user_id']);
		// if($response==FALSE)
		// {
		// 	redirect('home/login');
		// }
		
	}


	public function user_welcome()
	{
		//echo $_SESSION['user_id'];
		
		$where_user= array('user_id'=>$_SESSION['user_id']);
		$user_info = $this->Process->data_get('user_tb',$where_user);
		
		$this->user_name = $user_info['row']->user_name;
		$this->user_email = $user_info['row']->user_email;
		
		//echo '<pre>';print_r($user_info['result_array']);echo '</pre>';
		$this->load->view('user_welcome');
	}

	public function book_list()
	{

		//echo '<pre>';print_r($_POST);echo '</pre>';
		if($this->input->post('submit')== 'GO' && $this->input->post('titleFilter')!= '')
		{
			//echo 'test';exit;
			$where_books =array('Title'=>$this->input->post('titleFilter'));
			$this->book_list = $books_info = $this->Process->data_get('books',$where_books);
			//echo '<pre>';print_r($this->book_list);echo '</pre>';exit;
			
			$this->book_Title = $books_info['row']->Title;
		}
		else
		{
			$where_books =array('BookID !='=>'0');
			$this->book_list = $books_info = $this->Process->data_get('books',$where_books);
		}
		
		$this->load->view('book_list');
		//echo '<pre>';print_r($books_info);echo '</pre>';
	}
	public function add_books()
	{

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('author', 'Author', 'required');
        $this->form_validation->set_rules('genre', 'Genre', 'required');
        $this->form_validation->set_rules('publicationYear', 'Publication Year', 'required');
        //$this->form_validation->set_rules('isbn', 'ISBN', 'required');
        $this->form_validation->set_rules('language', 'Language', 'required');
        $this->form_validation->set_rules('pages', 'Pages', 'required');
        //$this->form_validation->set_rules('publisher', 'Publisher', 'required');
        //$this->form_validation->set_rules('format', 'Format', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('rating', 'Rating', 'required');
        //$this->form_validation->set_rules('description', 'Description', 'required');
        //$this->form_validation->set_rules('availability', 'Availability', 'required');
        //$this->form_validation->set_rules('purchaseDate', 'Purchase Date', 'required');

        if ($this->form_validation->run() === FALSE) {
            // Form validation failed, show the form again with validation errors
            $this->load->view('add_books');
        } else {
            // Form validation passed, insert the book into the database
            $data = array(
				 'Title' => $this->input->post('title'),
                'Author' => $this->input->post('author'),
                'Genre' => $this->input->post('genre'),
                'PublicationYear' => $this->input->post('publicationYear'),
                //'ISBN' => $this->input->post('isbn'),
                'Language' => $this->input->post('language'),
                'Pages' => $this->input->post('pages'),
                //'Publisher' => $this->input->post('publisher'),
                //'Format' => $this->input->post('format'),
                'Price' => $this->input->post('price'),
                'Rating' => $this->input->post('rating')
                
            );

            $new_book_added = $this->Process->data_insert('books', $data);
			//echo $this->db->last_query();
			//exit;
			if($new_book_added) 
			{
				$_SESSION['msg'] = message('success','New Book Added');
				redirect('book_net/add_books');
			}


            // Redirect to the book list or any other desired page
            
        }
    }
		
	public function favorite_books()
	{
		//echo"fdwegfw";exit;
		//echo"<pre>";print_r($_POST);echo"</pre>";exit;
		if($this->input->post('book_id') != '') 
		{
			
			$data_books['user_id'] =$_SESSION['user_id'];
			$data_books['book_id'] = $this->input->post('book_id');
			$insert_data = $this->Process->data_insert('user_favorite_books', $data_books);

			if($insert_data)
			{
				$_SESSION['msg'] = message('success','Book Added Your Favorite List');
			}
			
			//$this->test= message('success','record insert');
    	}else
		{
			//$this->favorite_books_list

			$where_user = array('user_id'=> $_SESSION['user_id']);
			 $user_fvrt = $this->Process->data_get('user_favorite_books',$where_user);
			 if($user_fvrt['nrows'] > 0)
			 {
				foreach($user_fvrt['result_array'] as $key => $value)
				{
					$books_ids_arr[] = $value['book_id'];
				}
			 }
			 $book_id_imp = implode(',',$books_ids_arr);
			 $where_books_id = " BookID IN($book_id_imp)";
			//$user_book_id = $user_fvrt['row']->book_id;

			$this->favorite_books_list = $this->Process->data_get('books',$where_books_id);
			$this->load->view('book_list');

		}

		
	
	}

	public function user_management()
	{
		
		
			if($this->_user_id != '')
			{

			$where_user = array('user_id'=> $this->_user_id);
			$user_info = $this->Process->data_get('user_tb ',$where_user);
			$this->user_name = $user_info['row']->user_name;
			 $user_fvrt = $this->Process->data_get('user_favorite_books',$where_user);
			// echo '<pre>';print_r($this->db->last_query());echo '</pre>';exit;
			 if($user_fvrt['nrows'] > 0)
			 {
				foreach($user_fvrt['result_array'] as $key => $value)
				{
					$books_ids_arr[] = $value['book_id'];
				}
			 }else
			 {
				//echo'test';
				$books_ids_arr = 0;
			 }
			 if($books_ids_arr ==0)
			 {
				$book_id_imp = 0;
			 }else
			 {
				$book_id_imp = implode(',',$books_ids_arr);

			 }
			 
			//$user_book_id = $user_fvrt['row']->book_id;
			 $where_personal= "BookID IN($book_id_imp)";
			$this->favorite_books_list = $this->Process->data_get('books', $where_personal);
			//echo '<pre>';print_r($this->db->last_query());echo '</pre>';exit;
			
			//$this->load->view('book_list');

			}else{
			$where_user = array('user_id != '=> $_SESSION['user_id']);
			$this->users_personal_list = $users_personal_list = $this->Process->data_get('user_tb ',$where_user);
			// if($users_personal['nrows'] > 0)
			// {
			// 	foreach($users_personal['result_array'] as $key => $value)
			// 	{
			// 		$book_id_arr[] = $value['book_id'];
			// 		$this->user_list = $user_id_arr[] = $value['user_id'];
			// 	}
			// }

			//$multiple_users_books = implode(',',array_unique($book_id_arr));
			//$where_books_personal = " BookID IN($multiple_users_books)";
			//$this->db->like("BookID",$multiple_users_books,"");
			//$user_book_id = $user_fvrt['row']->book_id;
			//echo 'test';
			//$this->users_books_list = $this->Process->data_get('books',$where_books_personal);
			//echo $this->db->last_query();
			//echo '<pre>';print_r($this->users_books_list['result_array']);echo '</pre>';
			}
			$this->load->view('book_list');


		
	
	}
}

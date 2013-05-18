<?php

class Login extends Controller {
	
	function index()
	{
		//to login, you must be logged out
		$this->Userloginmodel->requirelogin(0);
		
		//load helpers and libs
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		//set error delimiters
		$this->form_validation->set_error_delimiters(DEFAULT_ERROR_DELIMITER_OPEN, DEFAULT_ERROR_DELIMITER_CLOSE);
		
		$this->form_validation->set_rules('email', 'Email', 'required|max_length[100]|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[100]|md5');
		
		//if the user hasn't entered login data yet
		if ($this->form_validation->run() == FALSE) 
		{
			$data['title'] = 'Login';
			$data['navbar_tab'] = 4;
			$data['title_show'] = 0;
			echo $this->load->view('default_header.php',$data,TRUE);
			echo $this->load->view('forms/form_login.php',$data,TRUE);
			echo $this->load->view('default_footer.php','',TRUE);
		}
		//the user has entered a username and password, so check it
		else
		{
			$this->load->database();
			
			//get the user's entry with the specified email
			$query = $this->db->get_where('usertable',array('useremail' => $_POST['email']));
			
			//if the email doesn't exist, cancel teh login
			if ($query->num_rows() == 0)
			{
				redirect('notice/loginfail');
				die();
			}
			
			//the entry exists, so retrieve it.
			$row = $query->row(); 
			
			//is the specified password wrong?
			if ($row->userpass != $_POST['password'])
			{
				redirect('notice/loginfail');
				die();
			}
			
			//set the cookies
			$this->load->helper('cookie');
			$cookie = array(
				'name'   => 'email',
				'value'  => $_POST['email'],
				'expire' => '0',
				'domain' => '.madewithclockwork.com',
				'path'   => '/',
				'prefix' => '',
			);

			set_cookie($cookie);
			
			$cookie = array(
				'name'   => 'password',
				'value'  => $_POST['password'],
				'expire' => '0',
				'domain' => '.madewithclockwork.com',
				'path'   => '/',
				'prefix' => '',
			);

			set_cookie($cookie);
			
			redirect('notice/loginsucceed');
			die();
		}
	}

}

/* End of file login.php */
/* Location: ./system/application/controllers/login.php */

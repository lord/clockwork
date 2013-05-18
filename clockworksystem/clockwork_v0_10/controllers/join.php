<?php

class Join extends Controller {
	
	function index()
	{
		//you must be logged out to create an account
		$this->Userloginmodel->requirelogin(0);
		
		//load libs and helpers
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		//set error delimiters
		$this->form_validation->set_error_delimiters(DEFAULT_ERROR_DELIMITER_OPEN, DEFAULT_ERROR_DELIMITER_CLOSE);
		
		//set form validation rules
		$this->form_validation->set_rules('email', 'Email', 'required|max_length[200]|valid_email|callback_email_check');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[retypepassword]|max_length[200]|md5');
		$this->form_validation->set_rules('retypepassword', 'Confirm Password', 'required');
		$this->form_validation->set_rules('agreed', 'Agreement to Terms', 'required');
		
		if ($this->form_validation->run() == FALSE) 
		{
			$data['title'] = 'Join';
			$data['navbar_tab'] = 3;
			$data['title_show'] = 0;
			echo $this->load->view('default_header.php',$data,TRUE);
			echo $this->load->view('forms/form_join.php',TRUE);
			echo $this->load->view('default_footer.php',TRUE);
		}
		else
		{
			$this->load->database();
			
			$data = array ('useremail' => $_POST['email'], 'userpass' => $_POST['password']);
			$this->db->insert('usertable',$data);

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
					
			//send the email! (not working right now) TODO
			/*$this->load->library('email');
			
			$config['mailtype'] = "text";
			$this->email->initialize($config);

			$this->email->reply_to('clockwork@madewithclockwork.com', 'Madewithclockwork');
			$this->email->to($_POST['email']); 

			$this->email->subject('Clockwork Account Created');
			$this->email->message('Thanks for signing up for Clockwork!  You can log into your account at http://www.madewithclockwork.com/login.  If you need any help or anything, feel free to contact us at clockwork@madewithclockwork.com.');	

			$this->email->send();*/

			redirect("notice/accountcreated");
			die();
		}
	}
	
	function email_check($str)
	{
		$this->load->database();
		$query = $this->db->query('SELECT userid FROM usertable WHERE useremail = '.$this->db->escape($str));
		if ($query->num_rows() > 0)
		{
			$this->form_validation->set_message('email_check', 'We already have an account with the %s that you provided.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}

/* End of file join.php */
/* Location: ./system/application/controllers/join.php */

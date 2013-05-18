<?php

class Account extends Controller {

	function __construct()
	{
		parent::Controller();
		
		$this->Userloginmodel->requirelogin(1);
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters(DEFAULT_ERROR_DELIMITER_OPEN, DEFAULT_ERROR_DELIMITER_CLOSE);
	}

	/* -------------------------------------
	 * index()
	 * 
	 * ARGUMENTS:
	 * 	none
	 * 
	 * DESCRIPTION:
	 * 	Displays a list of account control commands, as well as some account information
	 * 	
	 * NOTES:
     * ------------------------------------- */
     
	function index()
	{
		$data['title'] = 'Account';
		$data['navbar_tab'] = 2;
		echo $this->load->view('default_header.php',$data,TRUE);
		
		echo $this->load->view('static_account.php',TRUE);
		
		echo $this->load->view('default_footer.php',TRUE);
	}
         
    /* -------------------------------------
	 * password()
	 * 
	 * ARGUMENTS:
	 * 	none
	 * 
	 * DESCRIPTION:
	 * 	Changes the user's password
	 * 	
	 * NOTES:
     * ------------------------------------- */
	function password()
	{	
		//set form validation rules
		$this->form_validation->set_rules('password', 'Old Password', 'required|max_length[100]|md5');
		$this->form_validation->set_rules('newpassword', 'New Password', 'required|max_length[100]|md5');
		$this->form_validation->set_rules('newpasswordconfirm', 'Password Confirmation', 'required|max_length[100]|matches[newpassword]|md5');
		
		//if form hasn't been submitted, show the form.
		if ($this->form_validation->run() == FALSE) 
		{
			$data['title'] = 'Change Password';
			$data['navbar_tab'] = 2;
			echo $this->load->view('default_header.php',$data,TRUE);
			
			echo $this->load->view('forms/form_changepassword.php',TRUE);
			
			echo $this->load->view('default_footer.php',TRUE);
		}
		//if the form was submitted, process the data
		else
		{
			$this->load->database();
			
			//get the current user's db entry
			$query = $this->db->get_where( 'usertable', array('userid' => $this->Userloginmodel->userid() ));
			
			//is the "old password" correct?
			if ($query->row()->userpass!=$this->input->post("password"))
			{
				redirect("account");
				die();
			}
			
			//update the db with the new password.
			$data = array(
					'userpass' => $this->input->post("newpassword")
					);
			$this->db->where('userid',$this->Userloginmodel->userid());
			$query = $this->db->update('usertable',$data);
			
			//change the password cookie to the new password
			$this->load->helper('cookie');
				$cookie = array(
					'name'   => 'password',
					'value'  => $this->input->post("newpassword"),
					'expire' => '0',
					'domain' => '.madewithclockwork.com',
					'path'   => '/',
					'prefix' => '',
				);

				set_cookie($cookie);

			redirect("dashboard");
			die();
		}
	}
}

/* End of file account.php */
/* Location: ./system/application/controllers/account.php */

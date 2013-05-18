<?php

class Notice extends Controller {
	
	function index()
	{
		redirect("welcome");
		die();
	}

	function loginfail()
	{
		$data['notice_title'] = "Invalid email or password!";
		$data['notice_redirect'] = site_url("login");
		$this->load->view("default_notice",$data);
	}

	function loginsucceed()
	{
		$data['notice_title'] = "Login Successful";
		$data['notice_redirect'] = site_url("dashboard");
		$this->load->view("default_notice",$data);
	}

	function loginrequired()
	{
		$data['notice_title'] = "You must be logged in to do that!";
		$data['notice_redirect'] = site_url("login");
		$this->load->view("default_notice",$data);
	}

	function accountcreated()
	{
		$data['notice_title'] = "Your account has been created!";
		$data['notice_redirect'] = site_url("dashboard");
		$this->load->view("default_notice",$data);
	}

}

/* End of file login.php */
/* Location: ./system/application/controllers/login.php */

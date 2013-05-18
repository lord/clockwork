<?php

class Logout extends Controller {

	function __construct()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->load->helper('cookie');
		delete_cookie("email");
		delete_cookie("password");
		redirect("welcome");
		die();
	}
}

/* End of file logout.php */
/* Location: ./system/application/controllers/logout.php */

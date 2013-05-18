<?php

class Welcome extends Controller {

	function __construct()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->Userloginmodel->requirelogin(0);
		$data['title'] = 'Welcome';
		$data['page_hideconttable'] = 1;
		$data['navbar_dark'] = 0;
		$this->load->view('default_header.php',$data);
		$this->load->view('static_welcome.php');
		$this->load->view('default_footer.php');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */

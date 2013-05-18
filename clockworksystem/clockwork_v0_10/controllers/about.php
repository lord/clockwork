<?php

class About extends Controller {
	
	//the default "about" page.
	function index()
	{
		$data['title'] = 'FAQ';
		$data['navbar_dark'] = 0;
		$data['signupbar_show'] = 1;

		$this->load->view('default_header.php',$data);
		$this->load->view('static_about.php');
		$this->load->view('default_footer.php');
	}
	
	//the credits page - people who are cool are listed here.
	function credits()
	{
		$data['title'] = 'Credits';

		$this->load->view('default_header.php',$data);
		$this->load->view('static_about_credits.php');
		$this->load->view('default_footer.php');
	}
}

/* End of file about.php */
/* Location: ./system/application/controllers/about.php */

<?php

class Terms extends Controller {

	function __construct()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$data['title'] = 'Terms';

		$this->load->view('default_header.php',$data);
		$this->load->view('static_terms.php');
		$this->load->view('default_footer.php');
	}
}

/* End of file about.php */
/* Location: ./system/application/controllers/about.php */

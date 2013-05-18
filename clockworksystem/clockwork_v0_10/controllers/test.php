<?php

class Test extends Controller {

	function __construct()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$data['title'] = 'Test Page!';

		echo $this->load->view('default_header.php',$data,true);
		echo "test<h1>h1</h1>test<h2>h2</h2>test<h3>h3</h3>test<h4>h4</h4>test<h5>h5</h5>test<h6>h6</h6>test";
		echo $this->load->view('default_footer.php','',true);
	}
}

/* End of file about.php */
/* Location: ./system/application/controllers/about.php */

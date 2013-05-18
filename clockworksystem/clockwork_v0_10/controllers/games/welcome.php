<?php

class Welcome extends Controller {

	function __construct()
	{
		parent::Controller();	
	}
	
	function index($id=0)
	{
		show_404();
	}
}

/* End of file about.php */
/* Location: ./system/application/controllers/about.php */

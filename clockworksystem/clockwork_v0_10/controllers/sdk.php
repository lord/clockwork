<?php

class Sdk extends Controller {

	function __construct()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$data['title'] = 'SDK';
		$data['navbar_tab'] = 3;

		echo $this->load->view('default_header.php',$data,TRUE);
		
		?>
		
		<a href='http://media.madewithclockwork.com/ClockworkSDK_v_0_1_8.zip' class='doublespace'>Clockwork Game Maker SDK (v 0.1.8)</a></li>

		<p class='doublespace'>The Game Maker Software Development Kit includes instructions for installation.  See the README inside the .zip for more information.  This version should fix GameMaker 8.1 bugs, as well as the strange "invalid checksum" bug.</p>
		
		<p class='doublespace'>Latest update: April 22nd, 2011</p>

		<a href='http://media.madewithclockwork.com/ClockworkSDK_v_0_1_6.zip' class='doublespace'>Clockwork Game Maker SDK (v 0.1.6)</a></li>

		<p class='doublespace'>If the latest version of the SDK doesn't work for some reason, you can use this older version.</p>
		
		<p class='doublespace'>Latest update: Jan 15th, 2011</p>

		<?php

		echo $this->load->view('default_footer.php', '', TRUE);
	}
}

/* End of file about.php */
/* Location: ./system/application/controllers/about.php */

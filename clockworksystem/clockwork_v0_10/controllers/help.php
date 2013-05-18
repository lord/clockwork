<?php

class Help extends Controller {
	function index()
	{
		$data['title'] = 'Help Center';
		
		if ($this->Userloginmodel->isloggedin() == 0)
		{
			$data['navbar_dark'] = 0;
			$data['signupbar_show'] = 1;
		}
		else
		{
			$data['navbar_tab'] = 4;
		}

		$this->load->view('default_header.php',$data);
		$this->load->view('help/home.php');
		$this->load->view('default_footer.php');
	}

	function gettingstarted()
	{
		$data['title'] = 'Getting Started with Clockwork';
		if ($this->Userloginmodel->isloggedin() == 0)
		{
			$data['navbar_dark'] = 0;
			$data['signupbar_show'] = 1;
		}
		else
		{
			$data['navbar_tab'] = 4;
		}

		$this->load->view('default_header.php',$data);
		$this->load->view('help/gettingstarted.php');
		$this->load->view('default_footer.php');
	}

	function stats()
	{
		$data['title'] = 'Statistics';
		if ($this->Userloginmodel->isloggedin() == 0)
		{
			$data['navbar_dark'] = 0;
			$data['signupbar_show'] = 1;
		}
		else
		{
			$data['navbar_tab'] = 4;
		}

		$this->load->view('default_header.php',$data);
		$this->load->view('help/basicstats.php');
		$this->load->view('default_footer.php');
	}

	function errorreporting()
	{
		$data['title'] = 'Error Reporting';
		if ($this->Userloginmodel->isloggedin() == 0)
		{
			$data['navbar_dark'] = 0;
			$data['signupbar_show'] = 1;
		}
		else
		{
			$data['navbar_tab'] = 4;
		}

		$this->load->view('default_header.php',$data);
		$this->load->view('help/gettingstarted.php');
		$this->load->view('default_footer.php');
	}

	function highscores()
	{
		$data['title'] = 'Highscores';
		if ($this->Userloginmodel->isloggedin() == 0)
		{
			$data['navbar_dark'] = 0;
			$data['signupbar_show'] = 1;
		}
		else
		{
			$data['navbar_tab'] = 4;
		}

		$this->load->view('default_header.php',$data);
		$this->load->view('help/highscores.php');
		$this->load->view('default_footer.php');
	}
}

/* End of file help.php */
/* Location: ./system/application/controllers/help.php */

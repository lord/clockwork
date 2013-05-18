<?php

class Create extends Controller {

	//you must be logged in to create a game
	function __construct()
	{
		parent::Controller();
		$this->Userloginmodel->requirelogin(1);
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters(DEFAULT_ERROR_DELIMITER_OPEN, DEFAULT_ERROR_DELIMITER_CLOSE);
	}
	
	function index()
	{
		redirect("create/game");
		die();
	}

	function game()
	{
		
		$this->form_validation->set_rules('name', 'Name', 'required|max_length[50]');
		
		//the form hasn't been submitted, show the form
		if ($this->form_validation->run() == FALSE) 
		{
			$data['title'] = 'Create Game';
			$data['page_hideconttable'] = 0;
			echo $this->load->view('default_header.php',$data,true);
			
			echo $this->load->view('forms/form_creategame.php','',true);

			echo $this->load->view('default_footer.php',"",true);
		}
		//the form has been submitted, process the data
		else
		{
			$this->load->database();

			//generate a random api key and store in $password
			list($usec, $sec) = explode(' ', microtime());
			srand((float) $sec + ((float) $usec * 100000));
			$validchars = "0123456789abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
			$password  = "";
			$counter   = 0;
			while ($counter < 30) {
				$actChar = substr($validchars, rand(0, strlen($validchars)-1), 1);

				$password .= $actChar;
				$counter++;
			}
			
			//set the data for the new db entry
			$this->db->set( 'gamename', htmlspecialchars($_POST['name']) );
			$this->db->set( 'gameuser', $this->Userloginmodel->userid() );
			$this->db->set( 'gamekey', $password );
			
			//did the user enable highscores?
			if (isset($_POST['highscoresactive']))
			{
				$this->db->set('gamehighscoreson', '1');
			}
			else
			{
				$this->db->set('gamehighscoreson', '0');
			}
			
			//stats are always on
			$this->db->set('gamestatson', '1');
			
			//errors don't work yet, so always disable them.
			$this->db->set('gameerrorson', '0');
			
			//insert the db entry
			$this->db->insert('gametable');

			redirect("dashboard");
			die();
		}
	}
}

/* End of file create.php */
/* Location: ./system/application/controllers/create.php */

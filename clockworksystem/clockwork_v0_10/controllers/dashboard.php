<?php

class Dashboard extends Controller {
	
	/* -------------------------------------
	 * index()
	 * 
	 * ARGUMENTS:
	 * 	none
	 * 
	 * DESCRIPTION:
	 * 	Lists a users games
	 * 
	 * TODO: the page really should be reformatted for asthetics, and functionality.  Also, users with no games should be displayed a help screen, perhaps with a youtube video, so they have less trouble setting up their game.
     * ------------------------------------- */
	function index()
	{
		//the user must be logged in to view their games
		$this->Userloginmodel->requirelogin(1);
		$this->load->database();

		//load the header
		$data['title'] = 'Dashboard';
		$data['navbar_tab'] = 1;
		echo $this->load->view('default_header.php',$data,true);
		
		
		$query = $this->db->query("SELECT * FROM gametable WHERE gameuser = " . $this->db->escape($this->Userloginmodel->userid()));
		
		if ($query->num_rows() != 0)
		{
		echo "<table class='database'>";

		foreach ($query->result() as $row)
		{
			echo "<tr class='database'>";
			echo "<td class='database'>".$row->gameid."</td>";
			echo "<td class='database'>".$row->gamename."</td>";
			echo "<td class='database right'><a href='games/".$row->gameid."/settings'>Settings</a></td>";
			echo "</tr>";
		}
		echo "</table>";
		}
		else
		{
			echo "<p>You don't have any games right now.</p><p>New user? Check out <a href='".site_url("help/gettingstarted")."' target='_blank'>this helpful getting started guide.</a></p>";
		}
		echo "<a href='create/game' class='database-button'>New Game</a>";


		echo $this->load->view('default_footer.php',"",true);
	}
}

/* End of file dashboard.php */
/* Location: ./system/application/controllers/dashboard.php */

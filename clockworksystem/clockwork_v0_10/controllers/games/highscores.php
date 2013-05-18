<?php

class Highscores extends Controller {

	function __construct()
	{
		parent::Controller();	
	}
	
	function index($id=0,$tags="",$embedtags="")
	{
		//if $tags is "embed" then we display the embedded page instead, with $embedtags as the tag.
		if ($tags == "embed")
		{
			$this->embed($id,$embedtags);
			die();
		}
		
		$this->load->database();

		//select the game with the game id of $id
		$query = $this->db->query("SELECT * FROM gametable WHERE gameid = " . $this->db->escape($id));

		//if the query fails, exit.
		if ($query == FALSE)
		{
			redirect("dashboard");
			die();
		}

		//if there are no games with that id, exit.
		if ($query->num_rows() == 0)
		{
			redirect("dashboard");
			die();
		}
		
		$gamename = $query->row()->gamename;
		
		$querytext = "SELECT * FROM highscoretable WHERE highscoregame = " . $this->db->escape($id);
		
		//only search for tag if a tag is specified
		if ($tags !== "")
		{
			//we only want to select the ones with our specefied tag, which is : seperated.  Explode turns it into an array, which has % placed around it - that is the SQL LIKE statement wildcard to aid in the search.
			foreach (explode(":",$tags) as $tag)
			{
				//all tags in the highscoretags column end with a colon, so lets just add the colon after each tag.  This prevents "level" from matching "level_1", because "level:" isn't inside "level_1:"
				$querytext .= " AND highscoretags LIKE '%" . $this->db->escape_like_str($tag . ":") . "%'";
			}
		}

		$querytext .= " ORDER BY highscorescore DESC";
		//perform the query...
		$query = $this->db->query($querytext);
		
		$data['title'] = "Highscores";
		$data['navbar_dark'] = 0;
		echo $this->load->view('default_header.php',$data,true);
		
		echo "<table class='database'>";
		
		//we need to count the first, second place, third place, etc...
		$i = 0;
		foreach ($query->result() as $row)
		{
			$i++;
			echo "<tr>";
			echo "<td>".$i."</td>";
			echo "<td>".$row->highscoreplayer."</td>";
			echo "<td>".$row->highscorescore."</td>";
			echo "</tr>";
		}
		echo "</table>";

		if ($query->num_rows() == 0)
		{
			if ($tags == "")
			{
				echo "This game has no highscores.";
			}
			else
			{
				echo "This game has no highscores with the tags specified.";
			}
		}
		
		echo $this->load->view('default_footer.php','',true);
	}
	
	function embed($id,$tags="")
	{
		$this->load->database();

		//select the game with the game id of $id
		$query = $this->db->query("SELECT * FROM gametable WHERE gameid = " . $this->db->escape($id));

		//if the query fails, exit.
		if ($query == FALSE)
		{
			redirect("dashboard");
			die();
		}

		//if there are no games with that id, exit.
		if ($query->num_rows() == 0)
		{
			redirect("dashboard");
			die();
		}
		
		$querytext = "SELECT * FROM highscoretable WHERE highscoregame = " . $this->db->escape($id);
		
		//only search for tag if a tag is specified
		if ($tags !== "")
		{
		
			//we only want to select the ones with our specefied tag, which is : seperated.  Explode turns it into an array, so that we can put it into a SQL LIKE statement
			foreach (explode(":",$tags) as $tag)
			{
				//all tags in the highscoretags column end with a colon, so lets just add the colon after each tag.  This prevents "level" from matching "level_1", because "level:" isn't inside "level_1:"
				$querytext .= " AND highscoretags LIKE '%" . $this->db->escape_like_str($tag . ":") . "%'";
			}
		}

		$querytext .= " ORDER BY highscorescore DESC";
		//perform the query...
		$query = $this->db->query($querytext);
		
		echo "<table class='cwhighscoretable'>";
		
		//we need to count the first, second place, third place, etc...
		$i = 0;
		foreach ($query->result() as $row)
		{
			$i++;
			echo "<tr>";
			echo "<td>".$i."</td>";
			echo "<td>".$row->highscoreplayer."</td>";
			echo "<td>".$row->highscorescore."</td>";
			echo "</tr>";
		}
		echo "</table>";

		if ($query->num_rows() == 0)
		{
			if ($tags == "")
			{
				echo "This game has no highscores.";
			}
			else
			{
				echo "This game has no highscores with the tags specified.";
			}
		}
	}
}

/* End of file about.php */
/* Location: ./system/application/controllers/about.php */

<?php

class V0_1 extends Controller {

	//this function just remaps all incoming connections to the "index" function
	function _remap()
	{
		$this->index();
	}
	
	function index()
	{
		//give out xml header
		header("Content-Type: text/xml; charset=utf-8");
		
		//echo xml definition
		echo "<?xml version='1.0' encoding='UTF-8'?>";

		$segs = $this->uri->segment_array(); //array of segments
		$reqarray = array(); //array of key/value pairs of the segments; /game:12/ means $reqarray['game'] == '12'
		foreach ($segs as $seg)
		{
			if (strstr($seg,":"))
			{
				$segarray = explode(":",$seg,2); //temporary array of the two parts of the segment
				$reqarray[$segarray[0]] = $segarray[1];
			}
		}
		//if there is no specified action, we exit, giving 301 incomplete request
		if (!isset($reqarray['action']))
		{
			$this->throwerror("301","Incomplete Request","There is no action specified.");
		}

		//if there is no specified game, we exit, giving 301 incomplete request
		if (!isset($reqarray['game']))
		{
			$this->throwerror("301","Incomplete Request","There is no game specified.");
		}
		
		//load database
		$this->load->database();

		//select the game with the game id of $reqarray['game']
		$query = $this->db->query("SELECT * FROM gametable WHERE gameid = " . $this->db->escape($reqarray['game']));

		//if the query fails, throw a 202 error.
		if ($query == FALSE)
		{
			$this->throwerror("202","Database Error","Our databases are offline or malfunctioning.  Please contact support.");
		}

		//if there are no games with that id, throw a 304 error.
		if ($query->num_rows() == 0)
		{
			$this->throwerror("304","Game Not Found","There is no game with the specified ID.");
		}

		//put the query data into the object $this->game, to make it class-wide
		$this->game = $query->row_array();	

		switch (strtolower($reqarray['action']))
		{
			case "highscore_add":

				//check for missing arguments
				if (!isset($reqarray['score']) or !isset($reqarray['player']) or !isset($reqarray['token']))
					$this->throwerror("301","Incomplete Request","Some arguments are missing from the request.");

				//fill in optional perameters if they aren't filled in already
				if (!isset($reqarray['tags']))
					$reqarray['tags'] = "";
					
				if (!isset($reqarray['asc']))
					$reqarray['asc'] = "0";
				
				//replace %20s with spaces.
				$reqarray['player'] = str_replace("%20"," ",$reqarray['player']);
				
				//check the contents of the player name - it should only be spaces, numbers, and letters
				if ( preg_match('/^[a-zA-Z0-9\040]+$/', $reqarray['player']) == 0 ) {
					$this->throwerror("307","Invalid Field Format","The player name may only contain letters, numbers, and spaces.");
				}

				//check the checksum
				$this->checkchecksum();

				//check the token
				$this->checktoken($reqarray['game'],$reqarray['token']);
				
				//we need to know which place the player will get.
				//we are finding the quantity of highscores with a higher score than the current one.
				//if "asc" is 1, than we are finding the number with a lower score
				$this->db->select('highscoreid');
				$this->db->where("highscoregame", $reqarray['game']);
				
				if ($reqarray['asc'] == 1)
				{
					$this->db->where("highscorescore <", $reqarray['score']);
				}
				else
				{
					$this->db->where("highscorescore >", $reqarray['score']);
				}
				
				$query = $this->db->get('highscoretable');
				
				$playerplace = $query->num_rows();
				
				//perform the query (activerecord automatically escapes strings)
				$data = array(
					'highscorescore' => $reqarray['score'],
					'highscoreplayer' => $reqarray['player'],
					'highscoregame' => $reqarray['game'],
					'highscoreip' => $_SERVER['REMOTE_ADDR'],
					
					//tags are colon seperated, but we need to make it a colon after EVERY tag, for seaching for tags later, so just add a colon at the end.
					'highscoretags' => $reqarray['tags'] . ":" 
				);

				$this->db->insert('highscoretable', $data); 

				//did the query succeed?
				if ($query == TRUE)
				{
					//send the status codes and stuff
					echo "<apiresponse>\n";
					echo "<status>101</status>\n";
					echo "<title>Action Complete</title>\n";
					echo "<place>".$playerplace."</place>";
					echo "</apiresponse>\n";
				}
				else
				{
					//send the status codes and stuff
					echo "<apiresponse>\n";
					echo "<status>202</status>\n";
					echo "<title>Action Incomplete - DB Falure</title>\n";
					echo "</apiresponse>\n";
				}

				

				break;

			case "highscore_get":

				//"action" and "game" have already been checked, so no need to check for missing args

				//fill in optional peramiters if they aren't filled in already
				if (!isset($reqarray['place']))
					$reqarray['place'] = "1";

				if (!isset($reqarray['count']))
					$reqarray['count'] = "10";

				if (!isset($reqarray['tags']))
					$reqarray['tags'] = "";

				if (!isset($reqarray['asc']))
					$reqarray['asc'] = "0";

				//check the validity of count
				if (is_numeric($reqarray['count']) == FALSE)
				{
					$this->throwerror("307","Invalid Format","The count argument is not an integer.");
				}
				if ($reqarray['count']!=round($reqarray['count']))
				{
					$this->throwerror("307","Invalid Format","The count argument is not an integer.");
				}
				if ($reqarray['count']>100 OR $reqarray['count']<1)
				{
					$this->throwerror("307","Invalid Format","You cant request more than 100 or less than 1 highscore.");
				}

				//perform the query
				$querytext = "SELECT * FROM highscoretable WHERE highscoregame = " . $this->db->escape($reqarray['game']);
				
				//add a SQL LIKE statement if a tag is specified
				if ($reqarray['tags'] !== "")
				{
					//we only want to select the ones with our specefied tag, which is : seperated.  Explode turns it into an array, so that we can put it into a SQL LIKE statement
					foreach (explode(":",$reqarray['tags']) as $tag)
					{
						//all tags in the highscoretags column end with a colon, so lets just add the colon after each tag.  This prevents "level" from matching "level_1", because "level:" isn't inside "level_1:"
						$querytext .= " AND highscoretags LIKE '%" . $this->db->escape_like_str($tag . ":") . "%'";
					}
				}
				
				$querytext .= " ORDER BY highscorescore ";
				if ($reqarray['asc']=="0")
				{
					$querytext .= "DESC";
				}
				else
				{
					$querytext .= "ASC";
				}
				$querytext .= " LIMIT ".$reqarray['count'];
				$query = $this->db->query($querytext);

				if ($query->num_rows() > 0)
				{
					//we've got the information, lets give it to them
					echo "<apiresponse>\n";
					echo "<status>103</status>\n";
					echo "<title>Action Complete, Information Retrieved</title>\n";
					echo "<result>\n";

					$i=1;
					foreach ($query->result() as $row)
					{
						echo "<highscore>\n";
							echo "<score>\n";
								echo $row->highscorescore;
							echo "</score>\n";
							echo "<place>\n";
								echo $i;
							echo "</place>\n";
							echo "<name>\n";
								echo $row->highscoreplayer;
							echo "</name>\n";
						echo "</highscore>\n";
						$i += 1;
					}

					echo "</result>\n";
					echo "</apiresponse>\n";
				}
				else
				{
					//the result contains nothing, return 103
					echo "<apiresponse>\n";
					echo "<status>103</status>\n";
					echo "<title>Action Complete, No Information Found</title>\n";
					echo "</apiresponse>\n";
				}
				break;

			case "stat_add":
			
				//check for missing arguments ("action" and "game" have already been checked)
				if (!isset($reqarray['name']) or !isset($reqarray['token']) or !isset($reqarray['count']))
				{
					$this->throwerror("301","Incomplete Request","Some arguments are missing from the request.");
				}

				//check the checksum
				$this->checkchecksum();

				//check the token
				$this->checktoken($reqarray['game'],$reqarray['token']);

				//perform the query
				$querytext = "INSERT INTO eventtable (eventname,eventgame,eventcount) VALUES (";
				$querytext .= $this->db->escape($reqarray['name']).",".$this->db->escape($reqarray['game']).",".$this->db->escape($reqarray['count']).")";
				$query = $this->db->query($querytext);

				//did the query succeed?
				if ($query == TRUE)
				{
					//send the status codes and stuff
					echo "<apiresponse>\n";
					echo "<status>101</status>\n";
					echo "<title>Action Complete</title>\n";
					echo "</apiresponse>\n";
				}
				else
				{
					//send the status codes and stuff

					echo "<apiresponse>\n";
					echo "<status>202</status>\n";
					echo "<title>Action Incomplete - DB Falure</title>\n";
					echo "</apiresponse>\n";
				}
				
				break;

			case "error_add":
			
				//check for missing arguments ("action" and "game" have already been checked)
				if (!isset($reqarray['error']) or !isset($reqarray['token']))
				{
					$this->throwerror("301","Incomplete Request","Some arguments are missing from the request.");
				}

				//check the checksum
				$this->checkchecksum();

				//check the token
				$this->checktoken($reqarray['game'],$reqarray['token']);

				//fill in optional peramiters if they aren't filled in already
				if (!isset($reqarray['severity']))
					$reqarray['severity'] = "0.5";

				//perform the query
				$querytext = "INSERT INTO errortable (errortext,errorgame) VALUES (";
				$querytext .= $this->db->escape($reqarray['error']).",".$this->db->escape($reqarray['game']).")";
				$query = $this->db->query($querytext);

				//did the query succeed?
				if ($query == TRUE)
				{
					//send the status codes and stuff
					echo "<apiresponse>\n";
					echo "<status>101</status>\n";
					echo "<title>Action Complete</title>\n";
					echo "</apiresponse>\n";
				}
				else
				{
					//send the status codes and stuff
					echo "<apiresponse>\n";
					echo "<status>202</status>\n";
					echo "<title>Action Incomplete - DB Falure</title>\n";
					echo "</apiresponse>\n";
				}
				
				break;

			case "token_get":
			
				//no need to check for missing arguments, "action" and "game" are the only reqired ones.
				
				//generate token code (30 character)
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

				//create token
				$querytext = "INSERT INTO tokentable (tokengame,tokencode,tokentime,tokenip) VALUES";
				$querytext .= "(".$this->db->escape($reqarray['game']).",".$this->db->escape($password).",".$this->db->escape(time()).",".$this->db->escape($_SERVER['REMOTE_ADDR']).")";
				$this->db->query($querytext);

				echo "<apiresponse>\n";
				echo "<status>102</status>\n";
				echo "<title>Action Complete, Information Retrieved</title>\n";
				echo "<token>".$password."</token>\n";
				echo "</apiresponse>\n";
				
			
				break;

			default:
				$this->throwerror("301","Invalid Request","The action specified is not recognized.");
		}
	}

	//this function just gives an error code, the error and the reason
	function throwerror($status,$error = "",$reason = "")
	{
		echo "<apiresponse>\n";
		echo "<status>".$status."</status>\n";
		echo "<title>".$error."</title>\n";
		echo "<reason>".$reason."</reason>\n";
		echo "</apiresponse>\n";
		die();
	}

	//this function checks and requires a checksum
	function checkchecksum()
	{
		//this variable stores the given checksum, in lowercase
		$reqchecksum = strtolower($this->uri->segment($this->uri->total_segments()));

		//md5 checksums are 32 characters long
		if (strlen($reqchecksum) != 32)

		{
			$this->throwerror("301","Incomplete Request","The checksum is missing or incomplete - it should be 32 characters long.");
		}
		
		//check to make sure that the actual checksum matches the request's checksum - substr(blah) gives the request minus the checksum at the end, and then we add on the game's key.
		if ( md5(substr($this->uri->uri_string(),0,-32) . $this->game['gamekey']) != $reqchecksum )
		{
			$this->throwerror("302","Invalid Checksum","The checksum is invalid.");
		}
	}

	//this function checks the token, and deletes it, too.
	function checktoken($gameid,$tokencode)
	{
		//select the token with the right gameid, tokencode, within the last 42 seconds, from the current IP
		$querytext = "SELECT * FROM tokentable WHERE ";
		$querytext .= "tokengame = ".$this->db->escape($gameid)." AND tokencode = ".$this->db->escape($tokencode)." AND tokentime > " . time()-42 . " AND tokenip = ".$this->db->escape($_SERVER['REMOTE_ADDR']);
		$query = $this->db->query($querytext);

		//if there is at least one result, than we are good, otherwise, exit with an error code.
		if ($query->num_rows() == 0)
		{
			throwerror("303","Invalid Token","The token provided has expired, was from another IP, was already used, or was invalid.");
		}
		
		//otherwise, delete the remaining result
		$this->db->query( "DELETE FROM tokentable WHERE tokenid=".$this->db->escape($query->row()->tokenid) );
	}
}

/* End of file about.php */
/* Location: ./system/application/controllers/about.php */

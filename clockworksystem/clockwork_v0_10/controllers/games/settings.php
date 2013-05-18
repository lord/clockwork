<?php

class Settings extends Controller {

	// all of these pages require that the user is logged in, just put it in the constructor.
	function __construct()
	{
		parent::Controller();	

		$this->Userloginmodel->requirelogin(1);
		
		//database is loaded.  NOTE: NOTHING ELSE IN THIS CONTROLLER NEEDS TO LOAD THE DB, IT IS DONE HERE
		$this->load->database();

		//select the game with the game id of $id
		$query = $this->db->query("SELECT * FROM gametable WHERE gameid = " . $this->db->escape($this->uri->segment(2)));

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

		//put the query data into the object $this->game, to make it class-wide
		$this->game = $query->row_array();

		//only the developer can access this page, so if the game doesn't belong to the current user, exit.
		if ($this->Userloginmodel->userid() != $this->game["gameuser"])
		{
			redirect("dashboard");
			die();
		}
		
		//load some common libraries and helpers
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		
		//set default error delimiter
		$this->form_validation->set_error_delimiters(DEFAULT_ERROR_DELIMITER_OPEN, DEFAULT_ERROR_DELIMITER_CLOSE);
	}

	/* -------------------------------------
	 * index()
	 * 
	 * ARGUMENTS:
	 * 	$id: the ID of the game to be requested
	 * 
	 * DESCRIPTION:
	 * 	The dashboard of the game, or the "control panel", is the place that only the developer of the game can access, and it shows the active services, and links to change settings.
	 * 
	 * NOTES: 
     * ------------------------------------- */

	function index($id)
	{
		$data['title'] = $this->game["gamename"] . ' - Control Panel';
		$data['page_hideconttable'] = 0;
		echo $this->load->view('default_header.php',$data,true);
		?>
		<div id='controlpanel'>
			<table>
			<tr>
				<td>
					<div id='gameinfobox'>
						<p class='doublespace'>Name: <?php echo $this->game["gamename"]; ?> <a href='settings/rename'>(change)</a></p>
						<p class='doublespace'>Game ID: <?php echo $this->game["gameid"]; ?> <a href='settings/name'></a></p>
						<p class='doublespace'>Key: <span class='tinytext'><?php echo $this->game["gamekey"]; ?></span></p>
					</div>
				</td>
				<td>
					<div id='gamesettingsbox'>
						<div class='divider'>Stats</div>
						<a class='settingsquare' href='<?php site_url(); ?>/games/<?php echo $id; ?>/settings/stats'><img src='http://media.madewithclockwork.com/img/stats.png'><p>View Stats</p></a>
						<a class='settingsquare' href='<?php site_url(); ?>/games/<?php echo $id; ?>/settings/emptystats'><img src='http://external.madewithclockwork.com/0.1/img/icons/delete.png'><p>Delete All Stats</p></a>
						
						<?php if (0) { ?>
							<a class='settingsquare' href='<?php site_url(); ?>/games/<?php echo $id; ?>/settings/errors'><img src='http://external.madewithclockwork.com/0.1/img/icons/errors.png'><p>View Errors</p></a>
						<?php } ?>

						<?php if ($this->game["gamehighscoreson"] == 1) { ?>
							<div class='divider'>Highscores</div>
							<a class='settingsquare' href='<?php site_url(); ?>/games/<?php echo $id; ?>/settings/highscores'><img src='http://media.madewithclockwork.com/img/leaderboards.png'><p>Manage Highscores</p></a>
							<a class='settingsquare' href='<?php site_url(); ?>/games/<?php echo $id; ?>/highscores'><img src='http://media.madewithclockwork.com/img/leaderboards.png'><p>Public Highscore Table</p></a>
							<a class='settingsquare' href='<?php site_url(); ?>/games/<?php echo $id; ?>/settings/embedhighscores'><img src='http://media.madewithclockwork.com/img/leaderboards.png'><p>Embed Highscores</p></a>
							<a class='settingsquare' href='<?php site_url(); ?>/games/<?php echo $id; ?>/settings/emptyhighscores'><img src='http://external.madewithclockwork.com/0.1/img/icons/delete.png'><p>Delete All Highscores</p></a>
						<?php } ?>
						
						<div class='divider'>General</div>
						<a class='settingsquare' href='<?php site_url(); ?>/games/<?php echo $id; ?>/settings/services'><img src='http://external.madewithclockwork.com/0.1/img/3232placeholder.gif'><p>Change Services</p></a>						
						<a class='settingsquare' href='<?php site_url(); ?>/games/<?php echo $id; ?>/settings/delete'><img src='http://external.madewithclockwork.com/0.1/img/icons/delete.png'><p>Delete Game</p></a>
					</div>
				</td>
			</tr>
			</table>
		</div>
		
		<?php

		echo $this->load->view('default_footer.php',"",true);
	}
	
	
	/* -------------------------------------
	 * services()
	 * 
	 * ARGUMENTS:
	 * 	$id: the ID of the game requested
	 * 
	 * DESCRIPTION:
	 * 	Displays a bunch of checkboxes that enable or disable clockwork services.
	 * 
	 * NOTES:
	 * ------------------------------------- */
	function services($id)
	{
		//has the user filled out the form, and is it not faked by another site?
		if ($this->input->post("confirm") == $this->Userloginmodel->userid())
		{

			//errors are always off, since they don't work yet.
			$this->db->set("gameerrorson","0");
			
			//did the user choose to enable highscores
			if ($this->input->post("highscores") == FALSE)
			{
				$this->db->set("gamehighscoreson","0");
			}
			else
			{
				$this->db->set("gamehighscoreson","1");
			}

			$this->db->where("gameid",$this->game["gameid"]);
			$this->db->update('gametable');

			redirect("games/".$id."/settings");
			die();
		}
		else
		{
			//the user hasn't filled out the form, so display the service switcher form
			
			//echo the header
			$data['title'] = $this->game["gamename"] . ' - Service Settings';
			echo $this->load->view('default_header.php',$data,true);

			echo $this->load->view('forms/form_changeservices.php','',true);
			
			echo $this->load->view('default_footer.php','',true);
		}

	}
	
	
	/* -------------------------------------
	 * name()
	 * 
	 * ARGUMENTS:
	 * 	$id: the ID of the game requested
	 * 
	 * DESCRIPTION:
	 * 	Displays a form that changes the name of the game.
	 * 
	 * NOTES:
     * ------------------------------------- */
	function rename($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters(DEFAULT_ERROR_DELIMITER_OPEN, DEFAULT_ERROR_DELIMITER_CLOSE);
		
		$this->load->helper('form');

		$this->form_validation->set_rules('name', 'Name', 'required|max_length[50]');

		if ($this->form_validation->run() == FALSE) 
		{
			$data['title'] = $this->game["gamename"] . ' - Rename';
			echo $this->load->view('default_header.php',$data,true);

			//the back to control panel button
			echo "<a href='".site_url("games/".$id."/settings")."' class='back-button'>Back to &quot;".$this->game["gamename"]."&quot;</a>";

			echo $this->load->view('forms/form_renamegame.php','',true);
			
			echo $this->load->view('default_footer.php','',true);
		}
		else
		{
			$this->load->database();
			
			$this->db->query('UPDATE gametable SET gamename = '.$this->db->escape(htmlspecialchars($this->input->post('name'))).' WHERE gameid = '.$id);
			redirect(site_url("games/".$id."/settings"));
			die();
		}
	}

	/* -------------------------------------
	 * highscores()
	 * 
	 * ARGUMENTS:
	 * 	$id: The ID of the game to be accessed
	 * 	$tags: The tags that limit which highscores are shown.
	 * 
	 * DESCRIPTION:
	 * 	Lists a game's highscores, the ones with what is contained in $tags only.  $tags are a list of tags that are seperated by a colons.
	 * 
	 * NOTES:
     * ------------------------------------- */
	function highscores($id,$tags="")
	{
		$data['title'] = $this->game["gamename"] . ' - Manage Highscores';
		echo $this->load->view('default_header.php',$data,true);

		//echo the back to game settings button
		echo "<a href='".site_url("games/".$id."/settings")."' class='back-button'>Back to &quot;".$this->game["gamename"]."&quot;</a>";
		
		//is there a search term?
		if ($tags == "") {
			//echo out the search box
			echo "<a id='searchbutton' href='#' onClick=\"document.getElementById('searchbutton').style.display='none'; document.getElementById('searchform').style.display='block'\">Search by tag...</a>";
			echo "<form id='searchform' style='display:none;' name='searchform' action='' onSubmit=\"window.location='".current_url()."/' + document.searchform.search.value; return false;\">";
			echo "<h4>Search by Tag</h4>";
			echo "<input class='form' type='text' name='search'>";
			echo "<p class='formhint'>seperate each tag with colons, press enter to search.  <a href='http://wiki.madewithclockwork.com/wiki/Tags'>click here for help with tags</a>.</p>";
			echo "</form>";
		}
		else
		{
			//display the search term
			echo "Currently displaying highscores with the tags &quot;" . $tags . "&quot;.  ";
			echo "<a href='".site_url()."games/".$id."/settings/highscores'>Show all</a>";
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
		
		echo "<table class='database'>";
		
		//first row has titles:
		echo "<tr class='database'>";
		echo "<td class='database'>Place</td>";
		echo "<td class='database'>Player Name</td>";
		echo "<td class='database'>Score</td>";
		echo "<td class='database'>Tags</td>";
		echo "<td class='database'>Edit</td>";
		echo "</tr>";
		
		//we need to count the first, second place, third place, etc...
		$i = 0;
		foreach ($query->result() as $row)
		{
			$i++;
			echo "<tr class='database'>";
			echo "<td class='database'>".$i."</td>";
			echo "<td class='database'>".$row->highscoreplayer."</td>";
			echo "<td class='database'>".$row->highscorescore."</td>";
			echo "<td class='database'>".$row->highscoretags."</td>";
			echo "<td class='database'><a href='" .site_url("games/".$id."/settings/highscore/".$row->highscoreid). "'>Edit</a></td>";
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

		echo $this->load->view('default_footer.php',"",true);
	}
	
	/* -------------------------------------
	 * highscore()
	 * 
	 * ARGUMENTS:
	 * 	$id: The ID of the game to be accessed
	 * 	$hsid: The ID of the highscore to be accessed
	 * 
	 * DESCRIPTION:
	 * 	Shows information about a highscore, and a button to delete it.
	 * 
	 * NOTES:
     * ------------------------------------- */
     
	function highscore($id,$hsid)
	{
		$querytext = "SELECT * FROM highscoretable WHERE highscoregame = " . $this->db->escape($id) . " AND highscoreid = " . $this->db->escape($hsid);
		
		$query = $this->db->query($querytext);
		
		//if there are no highscores with this id, in this game, exit.
		if ($query->num_rows()==0)
		{
			redirect("games/".$id."/settings/highscores");
			die();
		}
	
		$this->load->library('form_validation');
		$this->load->helper('form');

		$this->form_validation->set_rules('verify', 'verify', 'required');

		if ($this->form_validation->run() == FALSE) 
		{
			$data['title'] = $this->game["gamename"] . ' - Edit Highscore';
			echo $this->load->view('default_header.php',$data,true);
		
			//echo the back to highscores button
			echo "<a href='".site_url("games/".$id."/settings/highscores")."' class='back-button'>Back to &quot;".$this->game["gamename"]."&quot; highscores</a>";
			
			$row = $query->row();
			
			echo form_open(uri_string());
			echo "<ul>";

			echo "<li>Game: ".$this->game["gamename"]."</li>";
			echo "<li>ID: ".$row->highscoreid."</li>";
			echo "<li>Name: ".$row->highscoreplayer."</li>";
			echo "<li>Score: ".$row->highscorescore."</li>";
			if ($row->highscoretags == ":")
			{
				echo "<li>Tags: (none)</li>";
			}
			else
			{
				echo "<li>Tags: ".$row->highscoretags."</li>";
			}
			echo "<li>Timestamp: ".$row->highscorecreated."</li>";
			echo "<input type='hidden' name='verify' value='verified'>";
			echo "<li><input type='submit' value='One Click Delete' class='form-button'></li>";

			echo "</ul>";
		
			echo $this->load->view('default_footer.php',"",true);
		}
		else
		{	
			$this->db->delete('highscoretable', array('highscoregame' => $id, 'highscoreid' => $hsid));
			redirect(site_url("games/".$id."/settings/highscores"));
			die();
		}
		
		
		
	}
	
	
	
	/* -------------------------------------
	 * embedhighscores()
	 * 
	 * ARGUMENTS:
	 * 	$id: the ID of the game to be embedded
	 * 
	 * DESCRIPTION:
	 * 	Shows HTML that embed a clockwork highscore table in a website.
	 * 
	 * NOTES:
	 * ------------------------------------- */
	function embedhighscores($id)
	{
		$data['title'] = $this->game["gamename"] . ' - Embed Highscores';
		echo $this->load->view('default_header.php',$data,true);

		echo "<a href='".site_url("games/".$id."/settings")."' class='back-button'>Back to &quot;".$this->game["gamename"]."&quot;</a>";
		
		echo "<p>Put the following code in your website to embed this game's highscores in that website:</p>";
		echo "<textarea class='form' readonly='true'><iframe src = \"http://www.madewithclockwork.com/games/".$id."/highscores/embed\" width=\"400\" height=\"300\"><p>Your browser does not support iframes.</p></iframe></textarea>";
		
		echo "<p>Your visitors will see this:</p>";
		echo "<iframe src = \"http://www.madewithclockwork.com/games/".$id."/highscores/embed\" width=\"400\" height=\"300\"><p>Your browser does not support iframes.</p></iframe>";
		
		echo $this->load->view('default_footer.php','',true);
	}
	/* -------------------------------------
	 * stats()
	 * 
	 * ARGUMENTS:
	 * 	$id: The ID of the game to be accessed.
	 *	$stat: The name of the stat to be accessed.
	 * 
	 * DESCRIPTION:
	 * 	Puts out a flot graph of the stat to be accessed.
	 * 
	 * NOTES:
         * ------------------------------------- */
	function stats($id,$stat="",$mode="total")
	{
		$data['title'] = $this->game["gamename"] . ' - Stats';

		echo $this->load->view('default_header.php',$data,true);

		//echo the back to game settings button
		echo "<a href='".site_url("games/".$id."/settings")."' class='back-button'>Back to &quot;".$this->game["gamename"]."&quot;</a>";

		$query = $this->db->query("SELECT eventname FROM eventtable WHERE eventgame = ".$this->db->escape($id)." GROUP BY eventname;");

		if ($query->num_rows() > 0)
		{
			echo "<form>\n<select ONCHANGE='location = this.options[this.selectedIndex].value;'>";

			echo "<option value='".site_url("games/".$id."/settings/stats/")."'>Choose one...</option>";

			foreach ($query->result() as $row)
			{
				echo "\n<option value='".site_url("games/".$id."/settings/stats/".$row->eventname)."'";

				//select it if it is the current page
				if ($row->eventname == $stat) {echo " selected";}

				echo ">";
				echo "\n".$row->eventname;
				echo "\n</option>";
			}

			echo "\n</select>";
			
			//only print the displaymodebox if a eventname is set
			if ($stat != "")
			{
				//encase the display mode chooser in a div
				echo "<div id='flot-graph-displaymodebox'>";
				//make the current display mode a black label, not a link
				if ($mode == "total" )
				{
					echo "<span>Total</span>";
					echo "<a href='".site_url("games/".$id."/settings/stats/".$stat."/average")."'>Average</a>";
				}
				else
				{
					echo "<a href='".site_url("games/".$id."/settings/stats/".$stat."/total")."'>Total</a>";
					echo "<span>Average</span>";
				}
				echo "</div>";
			}

			echo "\n</form>";
		}
		else
		{
			//there are no stats in the game
			echo "This game has no events.";
			echo $this->load->view('default_footer.php',"",true);
			die();
		}
		//if a stat is specified, show the graph, and export the data
		if ($stat != "")
		{
			//get the data, but do the sum of the count if the mode is total, and the average of the count if the mode is average
			if ($mode == "total")
			{
				$query = $this->db->query("SELECT SUM(eventcount), DATE(eventcreated) FROM eventtable WHERE eventname = ".$this->db->escape($stat)." AND eventgame = ".$this->db->escape($id)." GROUP BY DATE(eventcreated);");
			}
			else
			{
				$query = $this->db->query("SELECT AVG(eventcount), DATE(eventcreated) FROM eventtable WHERE eventname = ".$this->db->escape($stat)." AND eventgame = ".$this->db->escape($id)." GROUP BY DATE(eventcreated);");
			}

			if ($query->num_rows() == 0)
			{
				echo "This game has no events with the specified name.";

			} else {
				//the placeholder, required by flot.
				echo "<div id='flot-graph' style='width:900px;height:400px;'></div>";

				echo "<script>";
				
				//echo the settings
				echo $this->load->view("js_stats_flot_config.php",'',true);
				echo "data = [ [";

				$i = 0;
				foreach ($query->result_array() as $row)
				{
					//if it isn't the first one, echo a dividing comma
					if ($i != 0) { echo ","; }

					//it is either sum(eventcount) or avg(eventcount), $mode tells us which one
					if ($mode == "total")
					{
						echo "[".strtotime( $row['DATE(eventcreated)']." UTC" ) * 1000 .",".$row['SUM(eventcount)']."]";
					}
					else
					{
						echo "[".strtotime( $row['DATE(eventcreated)']." UTC" ) * 1000 .",".$row['AVG(eventcount)']."]";
					}
					

					$i+=1;
				}
				echo "] ];";
				?>

$.plot($("#flot-graph"),data,options);
			
function showTooltip(x, y, contents) {
        $('<div id="tooltip">' + contents + '</div>').css( {
            position: 'absolute',
            display: 'none',
            top: y-14,
            left: x+15,
	    height: '20px',
            border: '2px solid #f00',
	    '-moz-border-radius': '4px',
	    'border-radius': '4px',
            padding: '2px',
            'background-color': '#fff',
            opacity: 0.80,
	    'font-size': 'large',
	    color:'#f00'
        }).appendTo("body").fadeIn(200);
    }
 
    var previousPoint = null;
    $("#flot-graph").bind("plothover", function (event, pos, item) {
		if (item) {
			if (previousPoint != item.datapoint[0]) {	
				previousPoint = item.datapoint[0];
				
				$("#tooltip").remove();
									
				showTooltip(item.pageX, item.pageY,
							item.datapoint[1]);
			}
		}
		else
		{
			$("#tooltip").remove();
			previousPoint = null;      
		}
    });						
				
				<?php
				echo "</script>";

			}
		}

		echo $this->load->view('default_footer.php',"",true);
	}
	
	/* -------------------------------------
	 * emptystats()
	 * 
	 * ARGUMENTS:
	 * 	$id: the ID of the game requested
	 * 
	 * DESCRIPTION:
	 * 	Deletes all stats from a game, but the user must enter their password, first.
	 * 
	 * NOTES: this function is visible through a route only.
     * ------------------------------------- */
	function emptystats($id)
	{	
		$this->form_validation->set_error_delimiters(DEFAULT_ERROR_DELIMITER_OPEN, DEFAULT_ERROR_DELIMITER_CLOSE);
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[100]|md5');
		
		if ($this->form_validation->run() == FALSE) 
		{
			$data['title'] = "Deleting all statistics from ".$this->game["gamename"];
			echo $this->load->view('default_header.php',$data,TRUE);

			//echo the back to game settings button
			echo "<a href='".site_url("games/".$id."/settings")."' class='back-button'>Back to &quot;".$this->game["gamename"]."&quot;</a>";
			
			echo $this->load->view('forms/form_emptystats.php', '', true);
			
			echo $this->load->view('default_footer.php','',TRUE);
		}
		else
		{
			$this->load->database();
			$query = $this->db->query('SELECT * FROM usertable WHERE userid = '.$this->db->escape($this->Userloginmodel->userid()));
			
			if ($query->num_rows() == 0)
			{
				redirect('login');
				die();
			}
			
			$row = $query->row(); 
			
			if ($row->userpass != $_POST['password'])
			{
				header('Location: http://'.$_SERVER['HTTP_HOST'].$this->uri->uri_string());
				die();
			}
			
			$query = $this->db->query('DELETE FROM eventtable WHERE eventgame = '.$this->db->escape($id));

			redirect("games/".$id."/settings");
		}
	}
	
	/* -------------------------------------
	 * emptyhighscores()
	 * 
	 * ARGUMENTS:
	 * 	$id: the ID of the game requested
	 * 
	 * DESCRIPTION:
	 * 	Deletes all highscores from a game, but the user must enter their password, first.
	 * 
	 * NOTES: this function is visible through a route only.
     * ------------------------------------- */
	function emptyhighscores($id)
	{	
		$this->form_validation->set_error_delimiters(DEFAULT_ERROR_DELIMITER_OPEN, DEFAULT_ERROR_DELIMITER_CLOSE);
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[100]|md5');
		
		if ($this->form_validation->run() == FALSE) 
		{
			$data['title'] = "Deleting all highscores from ".$this->game["gamename"];
			echo $this->load->view('default_header.php',$data,TRUE);

			//echo the back to game settings button
			echo "<a href='".site_url("games/".$id."/settings")."' class='back-button'>Back to &quot;".$this->game["gamename"]."&quot;</a>";
			
			echo $this->load->view('forms/form_emptyhighscores.php', '', true);
			
			echo $this->load->view('default_footer.php','',TRUE);
		}
		else
		{
			$this->load->database();
			$query = $this->db->query('SELECT * FROM usertable WHERE userid = '.$this->db->escape($this->Userloginmodel->userid()));
			
			if ($query->num_rows() == 0)
			{
				redirect('login');
				die();
			}
			
			$row = $query->row(); 
			
			if ($row->userpass != $_POST['password'])
			{
				header('Location: http://'.$_SERVER['HTTP_HOST'].$this->uri->uri_string());
				die();
			}
			
			$query = $this->db->query('DELETE FROM highscoretable WHERE highscoregame = '.$this->db->escape($id));

			redirect("games/".$id."/settings");
		}
	}

	/* -------------------------------------
	 * delete($id)
	 * 
	 * ARGUMENTS:
	 * 	$id: the ID of the game requested
	 * 
	 * DESCRIPTION:
	 * 	Deletes a game, but the user must enter their password first, for security reasons.
	 * 
	 * NOTES: this function is visible through a route only.
     * ------------------------------------- */
	function delete($id)
	{	
		$this->form_validation->set_error_delimiters(DEFAULT_ERROR_DELIMITER_OPEN, DEFAULT_ERROR_DELIMITER_CLOSE);
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[100]|md5');
		
		if ($this->form_validation->run() == FALSE) 
		{
			$data['title'] = "Deleting ".$this->game["gamename"];
			echo $this->load->view('default_header.php',$data,TRUE);

			//echo the back to game settings button
			echo "<a href='".site_url("games/".$id."/settings")."' class='back-button'>Back to &quot;".$this->game["gamename"]."&quot;</a>";
			
			echo $this->load->view('forms/form_deletegame.php', '', true);
			
			echo $this->load->view('default_footer.php','',TRUE);
		}
		else
		{
			$this->load->database();
			$query = $this->db->query('SELECT * FROM usertable WHERE userid = '.$this->db->escape($this->Userloginmodel->userid()));
			
			if ($query->num_rows() == 0)
			{
				redirect('login');
				die();
			}
			
			$row = $query->row(); 
			
			if ($row->userpass != $_POST['password'])
			{
				header('Location: http://'.$_SERVER['HTTP_HOST'].$this->uri->uri_string());
				die();
			}
			$query = $this->db->query('DELETE FROM gametable WHERE gameid = '.$this->db->escape($id));

			redirect("games/".$id."/settings");
		}
	}
}

/* End of file games.php */

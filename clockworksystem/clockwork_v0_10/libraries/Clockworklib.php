<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Clockworklib {

    function some_function()
    {
    	//select the game with the game id of $id
		$query = $this->db->query("SELECT * FROM gametable WHERE gameid = " . $this->db->escape($id));

		//if the query fails, exit.
		if ($query == FALSE)
		{
			redirect("dashboard");
			die();
		}
    }
}

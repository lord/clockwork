<?php
class Userloginmodel extends Model {
	
	var $init = 0;
	var $loggedin = 0;
	var $userid = 0;

	function __construct()
	{
		// Call the Model constructor
		parent::Model();
		$init = 0;
		$loggedin = 0;
		$userid = 0;
	}
	function isloggedin()
	{
		if ($this->init == 0)
		{
			$this->load->database();

			if ($this->input->cookie('email') != false and $this->input->cookie('password') != false) 
			{

				$result = $this->db->get_where('usertable', array('useremail' => $this->input->cookie('email')));

				if ($result->num_rows() > 0)
				{
				    	$row = $result->row(); 

					if ($row->userpass == $this->input->cookie('password'))
					{
						$this->loggedin = 1;
						$this->userid = $row->userid;
					}
				}
			}
			$this->init = 1;
		}
		return $this->loggedin;
    	}
	function userid()
	{
		$this->isloggedin();
		return $this->userid;
	}
	function requirelogin($required)
	{
		if ($this->isloggedin() != $required)
		{
			if ($required == 1)
			{
				redirect("notice/loginrequired");
			} else {
				redirect("dashboard");
			}
			die();
		}
	}
}

/* end of userloginmodel.php */

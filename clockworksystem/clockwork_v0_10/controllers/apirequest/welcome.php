<?php

class Welcome extends Controller {

	//this function just remaps all incoming connections to the "index" function
	function _remap()
	{
		$this->index();
	}
	

	/* -------------------------------------
	 * index()
	 * 
	 * ARGUMENTS:
	 * 	none
	 * 
	 * DESCRIPTION:
	 * 	Finds api requests that haven't specified a version number, and gives an error.
	 * 
	 * NOTES:
         * ------------------------------------- */
	function index()
	{
		header("Content-Type: text/xml; charset=utf-8");

		echo "<?xml version='1.0' encoding='UTF-8'?>";
		?>
<apiresponse>
	<status>301</status>
	<title>Incomplete Request</title>
	<reason>No API version number is specified.</reason>
</apiresponse>

<?php
	}
}

/* End of file about.php */
/* Location: ./system/application/controllers/about.php */

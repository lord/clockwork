<?php if (!isset($page_hideconttable) or $page_hideconttable == 0) { ?>

</div>

<?php } ?>

<div id='footer'>
	<?php
	if ($this->Userloginmodel->isloggedin() == 1)
	{
		$emailgetquery = $this->db->get_where('usertable', array( 'userid' => $this->Userloginmodel->userid() ));
		echo "<p>You are logged in as " . $emailgetquery->row()->useremail . "</p>";
	}
	?>
	
	<p>
	  (February 2nd, 2012) We're working on Clockwork 2.0! You can <a href="https://trello.com/board/clockwork-tasks/4f091f953aae7a58073881c0">view the progress here</a>. Love, the admins.
	</p>
	
	<p><a href='<?php echo site_url("terms"); ?>'>Terms</a> | <a href='<?php echo site_url("privacy"); ?>'>Privacy</a></p>
	<p>Copyright 2010-2011</p>
<script type="text/javascript" charset="utf-8">
  Tender = {
    hideToggle: true,
    widgetToggles: $('#help-button')
  }
</script>
<script src="https://mwclockwork.tenderapp.com/tender_widget.js" type="text/javascript"></script>
</div>

</body>
</html>

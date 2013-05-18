<?php echo form_open(uri_string()); ?>
	<ul class='form'>
		<li>
			<b>WARNING: THIS WILL EMPTY &quot;<?php echo $this->game["gamename"]; ?>&quot; OF ALL STAT EVENTS.  THIS PROCESS IS NOT REVERSABLE.</b>	
			For security reasons, please enter your clockwork password below.
		</li>
		
		<li>
			<h4>Password</h4>
			<input class='form' type='password' name='password' value=''>
			<?php echo form_error('password'); ?>
		</li>
		
		<li>
			<input type='submit' value='Empty <?php echo $this->game["gamename"]; ?> of all events' class='form-button'>
		</li>
	</ul>
</form>

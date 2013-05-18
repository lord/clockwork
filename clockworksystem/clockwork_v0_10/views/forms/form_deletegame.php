<?php echo form_open(uri_string()); ?>
	<ul class='form'>
		<li>
			<b>WARNING: THIS WILL REMOVE &quot;<?php echo $this->game["gamename"]; ?>&quot; FROM THE CLOCKWORK SERVERS.</b>	
			For security reasons, please enter your clockwork password below.
		</li>
		
		<li>
			<h4>Password</h4>
			<input class='form' type='password' name='password' value=''>
			<?php echo form_error('password'); ?>
		</li>
		
		<li>
			<input type='submit' value='Delete <?php echo $this->game["gamename"]; ?>' class='form-button'>
		</li>
	</ul>
</form>

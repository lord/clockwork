<p class='massive'>Welcome to Clockwork.</p>
<?php echo form_open('join'); ?>
	<ul class='form'>
		<li>
			<h4>Email</h4>
			<input class='form' type='text' name='email' value='<?php echo set_value('email'); ?>'>
			<?php echo form_error('email'); ?>
			<p class='formhint'>We won't share it, we promise.</p>
		</li>
	
		<li>
			<h4>Password</h4>
			<input class='form' type='password' name='password' value=''>
			<?php echo form_error('password'); ?>
			<p class='formhint'>Please don't make it crappy.</p>
		</li>
	
		<li>
			<h4>Confirm Password</h4>
			<input class='form' type='password' name='retypepassword' value=''>
			<?php echo form_error('retypepassword'); ?>
		</li>
	
		<li>
			<h4>Terms</h4>
			<input name='agreed' type='checkbox' value='HELLYEA' class='form-checkbox' id='agreedcheckbox'>
			<label for='agreedcheckbox'>I have read, understand, and agree to Clockwork's <a href='terms'>Terms of Use</a> and <a href='privacy'>Privacy Policy</a></label>.
			<?php echo form_error('agreed'); ?>
		</li>
	
		<li>
			<input type='submit' value='Sign Up' class='form-button'>
		</li>
	</ul>
</form>

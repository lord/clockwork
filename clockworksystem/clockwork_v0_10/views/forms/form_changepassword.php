<?php echo form_open('account/password'); ?>
	<ul class='form'>
		<li>
		<h4>Old Password:</h4>
		<input class='form' type='password' name='password'>
		</li>
		
		<li>
		<h4>New Password:</h4>
		<input class='form' type='password' name='newpassword' value=''>
		</li>
		
		<li>
		<h4>Confirm New Password:</h4>
		<input class='form' type='password' name='newpasswordconfirm' value=''>
		</li>
		
		<li>
		<input type='submit' value='Change Password' class='form-button'>
		</li>
	</ul>
</form>

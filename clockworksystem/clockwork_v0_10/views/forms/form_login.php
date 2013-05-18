<p class='massive'>Welcome back.</p>
<?php echo form_open('login'); ?>
	<ul class='form'>
		<li>
			<h4>Email</h4>
			<input class='form' type='text' name='email' value='<?php echo set_value('email'); ?>'>
			<?php echo form_error('email'); ?>
		</li>
		
		<li>
			<h4>Password</h4>
			<input class='form' type='password' name='password' value=''>
			<?php echo form_error('password'); ?>
		</li>
		
		<li>
			<input type='submit' value='Login' class='form-button'>
		</li>
	</ul>
</form>

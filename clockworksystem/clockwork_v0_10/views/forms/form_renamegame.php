<?php echo form_open(uri_string()); ?>
	<ul class='form'>
		<li>
			<h4>New Name</h4>
			<input class='form' type='text' name='name' value='<?php $this->game["gamename"] ?>'>
			<?php echo form_error('name'); ?>
		</li>
		<li>
			<input class='form-button' type='submit' value='Rename'>
		</li>	
	</ul>
</form>

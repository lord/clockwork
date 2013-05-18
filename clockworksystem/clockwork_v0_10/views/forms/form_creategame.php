<?php echo form_open('create/game'); ?>
	<ul class='form'>
	<li>
		<h4>Name</h4>
		<input class='form' type='text' name='name' value='<?php echo set_value('name'); ?>'>
		<?php echo form_error('name'); ?>
	</li>
	
	<li>
		<h4>Enabled Services</h4>
		<ul>
			<li><input type='checkbox' name='highscoresactive' id='highscores-active' value='true'><label for='highscores-active'>Enable Highscores</label></li>
		</ul>
	</li>
	
	<li>
		<input class='form-button' type='submit' value='Create'>
	</li>
</form>

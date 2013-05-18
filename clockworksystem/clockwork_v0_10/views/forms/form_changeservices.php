<?php echo form_open(uri_string()); ?>
	<ul class='form'>
		<li>
			<input type='hidden' name='confirm' value='<?php echo $this->Userloginmodel->userid();?>'>
		</li>
		
		<li>
			<p>Unchecking a service causes all incoming data of that type to be ignored, and the control panel icons to be hidden, but existing data is not deleted.  When we bring more services to Clockwork, they will become available to enable here.</p>
		</li>
		
		<li>
			<ul>
				<li>
				<input id='highscores_checkbox' type='checkbox' name='highscores' value='yes' <?php if ($this->game["gamehighscoreson"]) echo "checked"; ?>>
				<label for='highscores_checkbox'>Highscores</label>
				</li>
			</ul>
		</li>
		
		<li>
			<input type='submit' class='form-button' value='Save' <?php if ($this->game["gamehighscoreson"]) echo "checked"; ?>>
		</li>
	</ul>
</form>

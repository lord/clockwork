<a href='<?php echo site_url("help"); ?>' class='back-button'>Back to the Help Center</a>
<object width="853" height="505"><param name="movie" value="http://www.youtube-nocookie.com/v/NCgb4xlAyPM?fs=1&amp;hl=en_US"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube-nocookie.com/v/NCgb4xlAyPM?fs=1&amp;hl=en_US" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="853" height="505"></embed></object>
<p>Getting started with Clockwork is really simple.  Follow the steps below, and your game will be Clockwork-enabled in no time at all!</p>
<h2>Step 1: Register your game</h2>
<p><a href='<?php echo site_url("create/game"); ?>' target="_blank">Click here to register your game</a>.  Registration is as simple as providing a name for your game, which you can always change later.</p>
<h2>Step 2: Download the SDK</h2>
<p><a href='<?php echo site_url("sdk"); ?>' target="_blank">Download the SDK here</a>.  Installation instructions are included in the file, in the file called README.txt.</p>
<h2>Step 3: Activate Clockwork within the game</h2>
<p>Open your game in Game Maker 7 or 8 Pro, and create a new object.  In the create event of the object, run a script with this code inside it:</p>

<blockquote class='code'>{
	global.cw_game_name = "Your game name here."; //This is the name of your game.  It doesn't need to match the name of the game in Clockwork
	global.cw_game_id = 000; //This is the game ID of your game.  You can find this by going to your Clockwork dashboard, and clicking on "settings" next to your game.  The game ID is in the box on the left.
	global.cw_game_key = "Your key here."; //This is the key of your game.  You can find this just below where you found the gameid.  Make sure you copy and paste it, because it must be exact.
	cw_start();
}</blockquote>
<p>Then, place the object within the first room of your game, so that it runs when the game starts.</p>
<h2>Step 4: Have a party</h2>
<p>Guess what?  Your done!  Basic stats are completly set up.  To enable error reporting, highscores, or custom stats, <a href='<?php echo site_url("help") ?>'>click here</a>.</p>

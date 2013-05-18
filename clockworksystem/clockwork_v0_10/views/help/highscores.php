<a href='<?php echo site_url("help"); ?>' class='back-button'>Back to the Help Center</a>

<p>This tutorial will explain how highscores work in Clockwork.  This page assumes that you already have read <a href='<?php echo site_url("help/gettingstarted"); ?>'>this tutorial</a>.</p>
<h2>Enabling Highscores</h2>
<p>To enable highscores, go to your game's setting page, and click on &quot;Change Services&quot;.  Check the box labeled Highscores, and press Save.</p>

<h2>Submitting Highscores</h2>
<p>To submit highscores, place the following code in your game where you want to submit a highscore.</p>
<blockquote class='code'>{
	cw_highscore_create(name,score,tags);
}</blockquote>
<p>Name is a string containing the player's name, and score is a number containing the player's score.  Tags is something still under development, so you can just put an empty string there for now ("").</p>

<h2>Retrieving Highscores</h2>
<p>To load highscores, put the following code into your game where you want to load the highscores.</p>

<blockquote class='code'>cw_highscore_get(count,tags,ascending);</blockquote>

<p>This function will retrieve the first <i>count</i> people.  Tags is something still under development, so you can just put an empty string there for now ("").  If ascending is 0, the highscores will be retrieved with the highest scores on top.  If ascending is 1, the highscores will be retrieved with the lowest scores on top, which is useful for racing games where the lowest time is the best.</p>
<p>After the highscores are loaded, use the following script to access the highscores:<p>

<blockquote class='code'>cw_highscore_player(place);
cw_highscore_score(place);</blockquote>

<p>Each of these functions returns the player name or score, respectively, of the person in <i>place</i>th place.  Don't forget that you must load them with cw_highscore_get first!</p>

<a href='<?php echo site_url("help"); ?>' class='back-button'>Back to the Help Center</a>

<p>This tutorial will explain how stats work in Clockwork.  This page assumes that you already have read <a href='<?php echo site_url("help/gettingstarted"); ?>'>this tutorial</a>.</p>

<h2>Accessing Stats</h2>
<p>When you run your clockwork-enabled game, there is code that automatically submits stats to clockwork.</p>
<p>You can view these stats by going to your dashboard, clicking on &quot;settings&quot; next to your game, and clicking on the button labeled &quot;View Stats&quot;.  Select the stat that you wish to view from the drop down menu.</p>

<h2>Total vs. Average</h2>
<p>When looking at the stats graph, you may notice two buttons in the top right corner: &quot;Total&quot; and &quot;Average&quot;.</p>
<p><b>Total</b> takes all of the numbers of a day, and adds them up.  That means that if your game was played 3 times on October 10th, the total value of October 10th would be 1+1+1, which is 3.  Total is useful for stats that count things.</p>
<p><b>Average</b> takes all of the numbers of a day, and takes of average of them.  That means that if there are three people who played your game on October 10th, two getting a FPS of 30 and one getting an FPS of 28, the average value of October 10th would be the average of 30, 30, and 28, which is about 29.33.</p>

<h2>Custom Stats</h2>
<p>Clockwork automatically submits FPS averages, and number of game starts.  You actually can submit your own values.  Just copy the code below into your game wherever you want to submit a stat.</p>
<blockquote class='code'>{
	cw_stat_create(statname,statcount);
}</blockquote>
<p>Statname should be the name of the stat you want to create, such as "chickens_killed" (no spaces allowed), and statcount should be the number of the stat.  For events, such as the game shutting down, the stat number should be 1.  For numbers, such as chickens killed, the stat number should be that number.</p>


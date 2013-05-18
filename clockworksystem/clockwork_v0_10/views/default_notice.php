<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>

<title><?php echo $notice_title; ?> | Clockwork</title>

<link rel="icon" type="image/gif" href="http://external.madewithclockwork.com/favicon.gif">
<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=UTF-8">
<meta name="resource-type" content="document">
<meta name="description" content="Free online stats and highscores for Game Maker 7 and 8">
<meta name="keywords" content="game maker, gamemaker, gm, game maker 7, game maker 8, free, online, highscores, statistics, stats, error reporting, errors, bug tracking, clockwork, clockworks, highscore, statistic, stat">
<meta name="distribution" content="global">

<style type="text/css">

@font-face {
	font-family: 'NobileRegular';
	src: url('http://external.madewithclockwork.com/0.1/fonts/nobile-webfont.eot');
	src: local('☺'), url('nobile-webfont.woff') format('woff'), url('nobile-webfont.ttf') format('truetype'), url('nobile-webfont.svg#webfontJRE3eIdv') format('svg');
	font-weight: normal;
	font-style: normal;
}

/************************* general *************************/
body {
	font-family:"Helvetica","Verdana","Arial",sans-serif;
	font-size:small;
}
a {
	text-decoration:none;
	color:#F00;
	outline:none;
}
a:link {
	text-decoration:none;
}
a:visited {
	text-decoration:none;
}
a:hover {
	text-decoration:underline;
}
a:active {
	color:#000;
}
table {
	border-collapse:collapse;
}
table,tr,td,div,img,h1,h2,h3,h4,h5,p,form,body {
	padding:0px;
	margin:0px;
}

p {
	display:block;
	text-shadow:#DDD 0px 1px 0px;
	line-height:2em;
}

h4.red {
	color:#F00;
	font-size:medium;
}

h1,h2,h3,h4,h5,h6 {
	font-family:"Arial","Helvetica",sans-serif;
}

#colorbar {
	width:100%;
	height:5px;
	background-color:#F00;
}
/****************=notice******************/
div.notice {
	border:1px solid #F00;
	width:860px;
	margin:100px auto 0 auto;
	padding:20px;
}
</style>
<meta http-equiv="refresh" content="5;<?php echo $notice_redirect; ?>">
</head>
<body>

<div id='colorbar'></div>

<div class='notice'>
	<h3><?php echo $notice_title; ?></h3>
	<p>You will be redirected in 5 seconds.  <a href='<?php echo $notice_redirect; ?>'>Click here if you don't want to wait.</a></p>
</div>
</body>
</html>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>

<title><?php echo $heading; ?> | Clockwork</title>

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

/************************* custom general *************************/

.spaced {
	padding:10px 0px 10px 0px;
}

span.tinytext {
	font-size:x-small;
}

.hspaced {
	padding:0px 10px 0px 10px;
}

img.top {
	vertical-align:top;
}

.red {
	color:#F00;
}

input.normal {
	height:auto;
	padding:5px;
	margin:3px;
}

img.inline {
	vertical-align:text-bottom;
	margin:5px;
}

.small {
	font-size:x-small;
	color:#333;
}

.right {
	text-align:right;
}

#colorbar {
	width:100%;
	height:5px;
	background-color:#F00;
}
#colorbarscrolling {
	width:100%;
	height:5px;
	background-color:#F00;
	position:fixed;
	filter: alpha(opacity=25);
	-khtml-opacity: 0.25;
	-moz-opacity: 0.25;
	opacity: 0.25;
	z-index:1;
}

/************************* headers *************************/

h4 {
	color:#F00;
	text-shadow:#FFC6C6 0px 1px 0px;
}

h3 {
	color:#000;
	font-size:large;
	display:block;
	width:100%;
	line-height:1em;
	font-size:20px;
	text-align:left;
	border-bottom:1px #CCC solid;
	padding:15px 0px 5px 0px;
	margin:0px 0px 10px 0px;
	text-shadow:#C6C6C6 0px 1px 0px;
}

/************************* navbar *************************/
#navbar {
	margin:0 auto 0 auto;
	width:900px;
	height:62px;
	background-color:#FFF;
	font-size:medium;
	font-family:Nobile,Helvetica,Verdana,Arial,sans-serif;
	line-height:1em;
}
#navbar table {
	height:62px;
}
#navbar td.logo {
	background-image:url('http://external.madewithclockwork.com/0.1/img/logoheader.png');
	background-position:left center;
	background-repeat:no-repeat;
	width:186px;
	height:62px;
}
#navbar td {
	height:62px;
}
#navbar a {
	padding:22px 10px 0px 10px;
	display:block;
	min-width:80px;
	height:40px;
	text-align:center;
}
#navbar a:hover {
	background-color:#F00;
	color:#FFF;
	text-decoration:none;
}

/************************* content *************************/
table.content {
	width:900px;
	margin:0 auto 0 auto;
	background-color:#FFF;
	line-height:1.5em;
	color:#333;
}
td.content {
	width:300px;
	padding:15px 0px 15px 0px;
	vertical-align:top;
}

div.content {
	width:900px;
	margin:0 auto 0 auto;
	background-color:#FFF;
	line-height:1.5em;
	color:#333;
}


/************************* footer *************************/

table.footer {
	margin:10px auto 20px auto;
	width:900px;
	border-top:1px solid #CCC;
	color:#CCC;
}

td.footer {
	padding:10px 0px 0px 0px;
	text-align:center;
}

a.footer:link,a.footer:visited,a.footer:active {
	color:#CCC;
}

a.footer:hover {
	color:#F00;
	text-decoration:none;
}

</style>
</head>
<body>

<div id='colorbarscrolling'></div>
<div id='colorbar'></div>


<div id='navbar'>

<table>
	<tr>
		<td class='logo'>
		</td>
		<td>
			<a href='http://www.madewithclockwork.com'>Home</a>
		</td>
	</tr>
</table>
</div>

<div class='content'>
	<h3><?php echo $heading; ?></h3>
	<p><?php echo $message; ?></p>

</div>

<table class='footer'>

	<tr class='footer'>
		<td class='footer'>
			Copyright 2010
		</td>
	</tr>
</table>
</body>
</html>


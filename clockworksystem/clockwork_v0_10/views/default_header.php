<?php
if (!isset($header)) {$header = "";}
if (!isset($title)) {$title = "";}
if (!isset($page_hideconttable)) {$page_hideconttable = 0;}
if (!isset($navbar_dark)) {$navbar_dark = 1;}
if (!isset($navbar_tab)) {$navbar_tab = 0;}
if (!isset($signupbar_show)) {$signupbar_show = 0;}
if (!isset($title_show)) {$title_show = 1;}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>

<title><?php if ($title != "Welcome") {echo $title." | Clockwork";}else{echo "Clockwork - Stats, Highscores, and more, for Game Maker";} ?></title>

<link rel="icon" type="image/gif" href="http://external.madewithclockwork.com/favicon.gif">
<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=UTF-8">
<meta name="resource-type" content="document">
<meta name="description" content="Free online stats and highscores for Game Maker 7 and 8">
<meta name="keywords" content="game maker, gamemaker, gm, game maker 7, game maker 8, free, online, highscores, statistics, stats, error reporting, errors, bug tracking, clockwork, clockworks, highscore, statistic, stat">
<meta name="distribution" content="global">

<style type="text/css">

/****************** @font-faces *****************************/
@font-face {
	font-family: 'BebasRegular';
	src: url('http://media.madewithclockwork.com/fonts/BEBAS___-webfont.eot');
	src: local('☺'), url('http://media.madewithclockwork.com/fonts/BEBAS___-webfont.woff') format('woff'), url('http://media.madewithclockwork.com/fonts/BEBAS___-webfont.ttf') format('truetype'), url('http://media.madewithclockwork.com/fonts/BEBAS___-webfont.svg#webfontOJIfwzl6') format('svg');
	font-weight: normal;
	font-style: normal;
}

@font-face {
    font-family: 'ArimoRegular';
    src: url('http://media.madewithclockwork.com/fonts/arimo/Arimo-Regular-Latin-webfont.eot?') format('eot'),
         url('http://media.madewithclockwork.com/fonts/arimo/Arimo-Regular-Latin-webfont.woff') format('woff'),
         url('http://media.madewithclockwork.com/fonts/arimo/Arimo-Regular-Latin-webfont.ttf') format('truetype'),
         url('http://media.madewithclockwork.com/fonts/arimo/Arimo-Regular-Latin-webfont.svg#webfontmKdN90PJ') format('svg');
    font-weight: normal;
    font-style: normal;

}

@font-face {
    font-family: 'ArimoItalic';
    src: url('http://media.madewithclockwork.com/fonts/arimo/Arimo-Italic-Latin-webfont.eot?') format('eot'),
         url('http://media.madewithclockwork.com/fonts/arimo/Arimo-Italic-Latin-webfont.woff') format('woff'),
         url('http://media.madewithclockwork.com/fonts/arimo/Arimo-Italic-Latin-webfont.ttf') format('truetype'),
         url('http://media.madewithclockwork.com/fonts/arimo/Arimo-Italic-Latin-webfont.svg#webfontd6ihir8u') format('svg');
    font-weight: normal;
    font-style: normal;

}

@font-face {
    font-family: 'ArimoBold';
    src: url('http://media.madewithclockwork.com/fonts/arimo/Arimo-Bold-Latin-webfont.eot?') format('eot'),
         url('http://media.madewithclockwork.com/fonts/arimo/Arimo-Bold-Latin-webfont.woff') format('woff'),
         url('http://media.madewithclockwork.com/fonts/arimo/Arimo-Bold-Latin-webfont.ttf') format('truetype'),
         url('http://media.madewithclockwork.com/fonts/arimo/Arimo-Bold-Latin-webfont.svg#webfontAy2ASbie') format('svg');
    font-weight: normal;
    font-style: normal;

}

@font-face {
    font-family: 'ArimoBoldItalic';
    src: url('http://media.madewithclockwork.com/fonts/arimo/Arimo-BoldItalic-Latin-webfont.eot?') format('eot'),
         url('http://media.madewithclockwork.com/fonts/arimo/Arimo-BoldItalic-Latin-webfont.woff') format('woff'),
         url('http://media.madewithclockwork.com/fonts/arimo/Arimo-BoldItalic-Latin-webfont.ttf') format('truetype'),
         url('http://media.madewithclockwork.com/fonts/arimo/Arimo-BoldItalic-Latin-webfont.svg#webfontU7fVeQ0g') format('svg');
    font-weight: normal;
    font-style: normal;

}

/************************* reset **************************/
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, font, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td {
	margin: 0;
	padding: 0;
	border: 0;
	outline: 0;
	font-size: 100%;
	vertical-align: baseline;
	background: transparent;
	font-weight:normal;
}
body {
	line-height: 1;
}
b {
	font-weight:bold;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}

/* remember to define focus styles! */
:focus {
	outline: 0;
}

/* remember to highlight inserts somehow! */
ins {
	text-decoration: none;
}
del {
	text-decoration: line-through;
}

/* tables still need 'cellspacing="0"' in the markup */
table {
	border-collapse: collapse;
	border-spacing: 0;
}

/************************* general *************************/
body {
	font-family:Helvetica,ArimoRegular,"Arial",sans-serif;
	font-size:small;
	background-color:#FFF;
}
a {
	text-decoration:none;
	color:#F00;
	outline:none;
}
a:visited {
	text-decoration:none;
}
a:hover {
	text-decoration:underline;
}
a:active {
	color:#900;
}
table {
	border-collapse:collapse;
}
* {
	padding:0px;
	margin:0px;
}
p {
	display:block;
}
h4.red {
	color:#F00;
	font-size:medium;
}
h1,h2,h3,h4,h5,h6 {
	font-family:"Helvetica","Verdana","Arial",sans-serif;
}
ol {
	padding-left:40px;
}
select {
	background-color:#F33;
	color:#000;
	border-width:0px;
}
/************************* custom general *************************/
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
.colorwhite {
	color:#FFF;
}
blockquote.code {
	padding:10px;
	background-color:#EEE;
	font-family:monospace;
	white-space:pre-wrap;
}
.doublespace {
	line-height:1.5em;
}
div.divider {
	font-size:x-small;
	color:#CCC;
	border-bottom:1px solid #CCC;
	clear:both;
	padding:5px 0px 5px 5px;
	margin:0px 5px 5px 5px;
}
/************************* headers *************************/
p.massive {
	color:#000;
	display:block;
	width:100%;
	line-height:1em;
	font-size:50px;
	text-align:left;
	margin:15px 0px 15px 0px;
	text-shadow:#CCC 0px 2px 0px;
}

h1 {
	color:#000;
	display:block;
	width:100%;
	line-height:1em;
	font-size:20px;
	text-align:left;
	border-bottom:1px #CCC solid;
	padding:15px 0px 4px 0px;
	margin:0px 0px 10px 0px;
	text-shadow:#CCC 0px 1px 1px;
	font-weight:normal;
	font-family:Helvetica,ArimoRegular;
}

h2 {
	color:#000;
	display:block;
	width:100%;
	line-height:1em;
	font-size:medium;
	text-align:left;
	border-bottom:1px #DDD solid;
	padding:10px 0px 4px 5px;
	margin:0px 0px 5px 0px;
	text-shadow:#C6C6C6 0px 1px 0px;
	font-family:ArimoRegular;
}

h3 {
	color:#333;
	display:block;
	width:100%;
	line-height:1em;
	font-size:small;
	text-align:left;
	border-bottom:1px #EEE solid;
	padding:10px 0px 4px 10px;
	margin:0px 0px 5px 0px;
	text-shadow:#C6C6C6 0px 1px 0px;
	font-family:ArimoRegular;
}

/**** h4 and p.formhint are under "form"  ******/



/************************* =navbar and =colorbar *************************/
#navbarcontainer{
	width:100%;
}
#navbar {
	margin:0 auto 0 auto;
	width:900px;
	height:40px;
	font-size:medium;
	line-height:1em;
	position:relative;
}
#navbar>ul {
	height:40px;
	background-image:url('http://external.madewithclockwork.com/0.1/img/logoheader.png');
	background-position:left center;
	background-repeat:no-repeat;
	width:100%;
	padding-left:186px;
}
#navbar>ul>li {
	list-style-type:none;
	float:left;
}
#navbar>ul>li>a {
	display:block;
	min-width:80px;
	height:30px;
	text-align:center;
	font-weight:bold;
	text-transform: uppercase;
	font-size:small;
	position:relative;
	
	padding:10px 8px 0px 10px
}
#navbar>ul>li>a:hover {
	text-decoration:none;
}

/*****drop down stuff******/

#navbar ul>li {
	position:relative;
}

#navbar li:hover>ul {
	display:block;
}

#navbar li>ul {
	position:absolute;
	top:40px;
	left:-1px;
	background-color:#999;
	display:none;
	z-index:1;
	min-width:200px;
	border:#666 1px solid;
	border-width:0px 1px 4px 1px;
}

#navbar li>ul:hover {
	display:block;
}

#navbar li>ul a {
	color:#FFF;
	display:block;
	min-width:80px;
	text-align:left;
	font-weight:bold;
	text-transform: uppercase;
	font-size:small;
	position:relative;
	
	padding:10px 10px 10px 10px;
}

#navbar li>ul a:hover {
	background-color:#F00;
	text-decoration:none;
}

<?php
	if ($navbar_dark == 1) {
?>
	#navbarcontainer {
		background-color:#666;
	}
	#navbar>ul>li>a {
		color:#FFF;
		text-shadow:#000 0px 1px 1px;
	}
	#navbar>ul>li>a:hover {
		background-color:#999;
	}
	#navbar>ul {
		background-image:url('http://media.madewithclockwork.com/logos/clockworkwhite.png');
	}
	#colorbar {
		display:none;
	}
	
	<?php
	/*highlight the currently active tab*/
	if ($navbar_tab !== 0)
	{
	?>
		#navbar>ul>li:nth-child(<?php echo $navbar_tab; ?>) a
		{
			color:#666;
			background-color:#FFF;
			text-shadow:none;
		}
		#navbar>ul>li:nth-child(<?php echo $navbar_tab; ?>) a:hover
		{
			color:#F00;
			background-color:#FFF;
		}
	<?php
	}
	?>

<?php
	} else {
?>
	#navbarcontainer {
		background-color:#FFF;
	}
	#navbar>ul>li>a {
		color:#F00;
	}
	#navbar>ul>li>a:hover {
		color:#600;
	}
	#navbar>ul {
		background-image:url('http://media.madewithclockwork.com/logos/clockworkred.png');
	}
	#colorbar {
		width:100%;
		height:5px;
		background-color:#F00;
	}
<?php
}
?>

/************************* =signupbar *************************/
#signupbar {
	background-color:#666;
	width:100%;
	height:40px;
	display: table;
	border-collapse:separate;
	
	font-size:medium;
	color:#FFF;
	
	text-shadow:#000 0px 1px 0px;
}
	#signupbar>div {
		display:table-cell;
		width:100%
		height:40px;
		vertical-align:middle;
	}
		#signupbar>div>div {
			width:900px;
			margin:0 auto 0 auto;
			
		}
		#signupbar a {
			background-color:#F00;
			padding:5px;
			color:#FFF;
		}
		#signupbar a:hover {
			background-color:#C00;
			text-decoration:none;
		}
/************************* =content *************************/

div.content {
	width:900px;
	margin:0 auto 0 auto;
	background-color:#FFF;
	color:#333;
}

/************************* =footer *************************/

#footer {
	margin:10px auto 20px auto;
	width:900px;
	border-top:1px solid #AAA;
	color:#777;
	padding:10px 0px 0px 0px;
	text-align:center;
	
	line-height:1.5em;
}

#footer a {
	color:#777;
	border-bottom:1px dashed #BBB;
}

#footer a:hover {
	color:#F00;
	text-decoration:none;
	border-bottom:1px solid #F00;
}

/************************* =back-button *************************/

a.back-button {
	font-family:"Arial","Helvetica",sans-serif;
	display:block;
	color:#F33;
	font-size:small;
	width:200px;
	border-bottom:#C00 1px dotted;
	margin:0px 0px 0px 0px;
	padding:5px;
	background-color:#FFF6F6;
	font-weight:bold;

	position:relative;
	bottom:10px;
}

a.back-button:hover {
	border-bottom:#F00 1px dotted;
	background-color:#FFEEEE;
	text-decoration:none;
}

/************************* =form class *************************/

ul.form>li {
	list-style-type:none;
	margin:15px 0px 15px 0px;
}

input.form,textarea.form {
	display:inline;
	border:#F99 1px solid;
	margin:0;
	padding:8px;
	color:#444;
	font-size:small;
	background-color:#FFF;
	width:175px;
	height:1.25em;
	
	-moz-border-radius: 5px;
	border-radius: 5px;
}

textarea.form{
	height:150px;
}

input.form:hover, input.form:focus, textarea.form:hover, textarea.form:focus {
	border:#F00 1px solid;
	color:#333;
}

textarea.form {
	width:882px
}

input.form-button,a.form-button {
	display:block;
	margin:0;
	padding:5px 17px 5px 17px;

	border:#F66 1px solid;
	-moz-border-radius: 5px;
	border-radius: 5px;

	color:#600;
	font-size:small;
	background-color:#FFF;
	height:2.25em;
}
input.form-button:hover, a.form-button:hover {
	background-color:#FFE3E3;
	text-decoration:none;
}
input.form-button:active, a.form-button:active {
	position:relative;
	top:2px;
}

a.form-button {
	display:inline;
}

input.form-checkbox {
	vertical-align:;
}

p.form-error {
	display:inline;
	margin:0px 0px 0px 4px;
	color:#F00;
	font-weight:bold;
}

h4 { /*used for form input titles*/
	color:#000;
	font-size:small;
	text-transform: lowercase;
	padding:0px 0px 4px 0px;
	
}

p.formhint { /*used for form hints*/
	color:#666;
	font-size:x-small;
	text-transform: lowercase;
	line-height:1em;
}



/************************* =frontdisplay *************************/

div.frontdisplay {
	height:350px;
	width:100%;
	background-color:#666;
	text-shadow:none;
	margin:0 0 20px 0;
}
div.frontdisplay-overlay {
	position:relative;
	height:350px;
	width:900px;
	margin:0 auto 0 auto;
}
div.frontdisplay .big-button {
	position:absolute;
	bottom:20px;
}

div.frontdisplay h6 {
	color:#FFF;
	font-size:50px;
	text-shadow:#000 0px 1px 1px;
	padding:32px 273px 20px 0px;
	font-family:Helvetica,ArimoRegular;
}

div.frontdisplay p {
	color:#FFF;
	text-shadow:#000 0px 1px 0px;
	font-size:16px;
	font-family:Helvetica,ArimoRegular;
	letter-spacing:0.03em;
	
	padding:0px 273px 0px 0px;
}

div.frontdisplay-overlay>div {
	position:absolute;
	right:0px;
	
	top:-25px;
	height:417px;
	width:258px;
	
	background-color:rgba(255,0,0,0.7);
	-moz-border-radius: 8px;
	     border-radius: 8px;

	display:table;
}

div.frontdisplay-overlay>div>div {
	display:table;
	height:350px;
	width:258px;
	margin:25px 0px 42px 0px;
}


div.frontdisplay-overlay ul {
	display:table-cell;
	vertical-align:middle;
}

div.frontdisplay-overlay li {
	color:#FFF;
	padding:10px 20px 10px 20px;
}

div.frontdisplay-overlay li.noun {
	font-style:italic;
	font-size:x-small;
}

div.frontdisplay-overlay li.def2 {
	font-weight:bold;
}

/************************* =homepage *************************/
#homepageservices {
	width:630px;
	float:left;
}
	#homepageservices li {
		width:50%;
		margin:0px 0px 20px 0px;
		float:left;
		min-height:30px;
	}
	
	#homepageservices li img {
		vertical-align:middle;
		float:left;
		margin:0px 8px 0px 0px;
	}
	#homepageservices li div {
		font-weight:bold;
	}

#homepagequotes {
	float:right;
	width:258px;
	margin-top:42px;
}

#homepagequotes>div {
	background:url('http://external.madewithclockwork.com/0.1/img/quote.gif') no-repeat top left;
	padding:10px 0px 20px 20px;
}
	#homepagequotes>div>div {
		background:url('http://external.madewithclockwork.com/0.1/img/endquote.gif') no-repeat right bottom;
		font-style:italic;
	}


/**************************=buttons**************************/
.big-button {
	font-size:x-large;
	font-weight:bold;
	display:block;
	position:relative;
	width:238px;
	text-align:center;
	padding:10px;
	color:#FFF;
	text-shadow: #666 0px 1px 1px;
	
	-moz-border-radius:5px;
	border-radius:5px;
	
	background-image: -webkit-gradient(
		linear,
		left bottom,
		left top,
		color-stop(0, rgb(190,0,0)),
		color-stop(1, rgb(255,0,0))
	);
	background-image: -moz-linear-gradient(
		center bottom,
		rgb(190,0,0) 0%,
		rgb(255,0,0) 100%
	);
	
	background-color:#F33;
}
.big-button:hover {
	text-decoration:none;
	background-color:#FDD;
	background-image:none;
	background-color:#F00
}
.big-button:active {
	color:#FFF;
	
	/*make the gradient backwards*/
	background-image: -webkit-gradient(
		linear,
		left bottom,
		left top,
		color-stop(0, rgb(255,0,0)),
		color-stop(1, rgb(190,0,0))
	);
	background-image: -moz-linear-gradient(
		center bottom,
		rgb(255,0,0) 0%,
		rgb(190,0,0) 100%
	);
	
	background-color:#600;
}

/************************* =faq *************************/

#faq p:nth-child(odd) {
	font-weight:bold;
}

#faq p:nth-child(even) {
	margin-bottom:1em;
}

/************************* =helpcentercategories *************************/

#helpcenter-home {
	
}

#helpcenter-home a {
	display:block;
	width:285px;
	margin:12px 12px 0px 0px;
	border:1px solid #FDD;
	float:left;
	line-height:1em;
	padding:5px 0px 5px 5px;
}
#helpcenter-home a:hover {
	text-decoration:none;
	border:1px solid #F00;
}

#helpcenter-home a img {
	vertical-align:middle;
}

#helpcenter-home a span {
	vertical-align:text-bottom;
}

/*each end div of the row should have no right-margin, so that it lines up with the page*/
#helpcenter-home > a:nth-child(3n+0) {
	margin-right:0;
}

/************************* data table *************************/

table.data {
	width:100%;
}
tr.data {
	border:1px solid #FF8000;
}
td.data {
	padding:10px 15px 10px 15px;
	height:36px;
}
td.databox {
	padding:0px 10px 0px 10px;
	width:20px;
	height:16px;
}

/************************* database tables *************************/
table.database {
	width:100%;
	border-collapse:seperate;
}
td.database-header {
	border:1px solid #CCC;
	padding:10px;
	font-weight: bold;
	text-align:center;
}
td.database {
	padding:10px;
}
tr.database:hover {
	background-color:#FEE;
}
a.database-button {
	display:block;
	text-align:center;
	padding:9px;
	border:1px solid #FFF;
}
a.database-button:hover {
	background-color:#FEE;
	border:1px solid #F00;
	text-decoration:none;
}

/************************* game control panel *************************/

#controlpanel {
	width:900px;
	margin-bottom:10px;
}

#controlpanel #gameinfobox {
	width:280px;
	border:1px solid #F00;
	padding:10px;
}

#controlpanel #gamesettingsbox {
	width:600px;
}

#controlpanel a.settingsquare {
	display:block;
	text-align:center;
	float:left;
	padding:5px 0px 5px 0px;
	margin:10px;
	width:75px;
	font-size:x-small;
}

#controlpanel a.settingsquare:hover {
	text-decoration:none;
}

#controlpanel a.settingsquare p {
	line-height:1.3em;
}

#controlpanel td {
	vertical-align:top;
}

/************************* =flot-graph *************************/
#flot-graph-displaymodebox {
	float:right;
}

	#flot-graph-displaymodebox span {
		padding:5px;
	}
	
	#flot-graph-displaymodebox a {
		padding:5px;
	}

	#flot-graph-displaymodebox a:hover {
		border:1px solid #F00;
		background-color:#FEE;
		padding:4px;
		text-decoration:none;
	}
	
	
#faq p {
	line-height:2em;
}

/******************************Clearboth is the most powerful tag, so it goes last!***********************************/
.clearboth {
	clear:both;
	float:none;
	border-width:0;
	width:0;
	height:0;
	padding:0;
	margin:0;
	display:block;
}

</style>
<!--[if IE]><script language='javascript' type='text/javascript' src='http://".$_SERVER['HTTP_HOST']."/js/excanvas.min.js'></script><![endif]-->
<script language='javascript' type='text/javascript' src='http://<?php echo $_SERVER['HTTP_HOST']; ?>/js/jquery.js'></script>
<script language='javascript' type='text/javascript' src='http://<?php echo $_SERVER['HTTP_HOST']; ?>/js/jquery.easing.js'></script>
<script language='javascript' type='text/javascript' src='http://<?php echo $_SERVER['HTTP_HOST']; ?>/js/jquery.flot.js'></script>
<?php echo $header; ?>

<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-18124581-1']);
  _gaq.push(['_setDomainName', '.madewithclockwork.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>
<body>

<div id='colorbar'></div>

<div id='navbarcontainer'>
	<div id='navbar'>
		<ul>
			<?php if ($this->Userloginmodel->isloggedin() == 0) {?>
				<li><a href='<?php echo site_url("welcome"); ?>'>Home</a></li>
				<li><a href='<?php echo site_url("about"); ?>'>FAQ</a></li>
				<li><a href='<?php echo site_url("join"); ?>'>Join</a></li>
				<li><a href='<?php echo site_url("login"); ?>'>Login</a></li>
			<?php } else { ?>
				<li><a href='<?php echo site_url("dashboard"); ?>'>Dashboard</a></li>
				<li><a href='<?php echo site_url("account"); ?>'>Account</a></li>
				<li><a href='<?php echo site_url("sdk"); ?>'>SDK</a></li>
				<li>
					<a href='http://help.madewithclockwork.com' target='_blank' id='help-button'>Help Center</a>
				</li>
				<li><a href='<?php echo site_url("logout"); ?>'>Logout</a></li>
			<?php } ?>
		</ul>
	</div>
</div>

<?php if ($signupbar_show == 1) { ?>
<div id='signupbar'>
	<div>
		<div>
			<span>Clockwork puts online highscores and statistics into your games. What are you waiting for?</span>
			<a href='<?php echo site_url("join"); ?>'>Sign Up</a>
		</div>
	</div>
</div>
<?php } ?>

<?php if ($page_hideconttable == 0) { ?>
<div class='content'>
	<?php if ($title_show == 1) { ?>
	<h1><?php echo $title; ?></h1>
	<?php } ?>
<?php } ?>

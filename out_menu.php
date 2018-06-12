<!doctype html>
<html>
<head>
	<title>HTML5 / CSS3 Drop-Down Navigation Menu</title>
	<style>
	h1{
   color: #F0F8FF;
   text-align:center;
   background-color: #FF4500;
   padding: 15px;
   text-decoration: bold;
}
.time{
	color: #0000FF;
   text-align:center;
   font-size: 1.5em;
}

	.note{
   color: #00CC00;
   text-align:center;
   font-size: 1.5em;
}
	#nav {
	position:fixed;
	width:20000px; 
	height:49px;
	padding-left:80px;
	padding-top:-100px;
	padding-bottom:0px;
	background-color: #00FF00;
		background-size: 180px 160px;
		
}

ul#navigation {
	margin:0px auto;
	position:relative;
	float:left;
	
}

ul#navigation li {
	display:inline;
	font-size:15px;
	font-weight:bold;
	margin:0;
	padding:0;
	float:left;
	position:relative;
	
}

ul#navigation li a {
	padding-left:85px;
	padding-right:15px;
	padding-top:15px;
	padding-bottom:15px;
	color:#FFFFFF;
	text-shadow:1px 1px 0px #fff;
	text-decoration:none;
	display:block;
	background: #00FF00;
	
	-webkit-transition:color 0.2s linear, background 0.2s linear;	
	-moz-transition:color 0.2s linear, background 0.2s linear;	
	-o-transition:color 0.2s linear, background 0.2s linear;	
	transition:color 0.2s linear, background 0.2s linear;	
}

ul#navigation li a:hover {
	background-color:#CCFFCC;
	color:#282828;
	
}

ul#navigation li a.first {
	border-left: 0 none;
}

ul#navigation li a.last {
	border-right: 0 none;
}

ul#navigation li:hover > a {
	background:#FF4500;
}



/* Drop-Down Navigation */
ul#navigation li:hover > ul
{
/*these 2 styles are very important, 
being the ones which make the drop-down to appear on hover */
	visibility:visible;
	opacity:1;
}

ul#navigation ul, ul#navigation ul li ul {
	list-style: none;
    margin: 0;
    padding: 0;    
/*the next 2 styles are very important, 
being the ones which make the drop-down to stay hidden */
    visibility:hidden;
    opacity:0;
    position: absolute;
    z-index: 99999;
	width:180px;
	background:#66FF33;
	box-shadow:1px 1px 3px #ccc;
/* css3 transitions for smooth hover effect */
	-webkit-transition:opacity 0.2s linear, visibility 0.2s linear; 
	-moz-transition:opacity 0.2s linear, visibility 0.2s linear; 
	-o-transition:opacity 0.2s linear, visibility 0.2s linear; 
	transition:opacity 0.2s linear, visibility 0.2s linear; 	
}

ul#navigation ul {
    top: 43px;
    left: 0px;
	
}

ul#navigation ul li ul {
    top: 0;
    left: 181px; /* strong related to width:180px; from above */
	
}

ul#navigation ul li {
	clear:both;
	width:100%;
	border:0 none;
	border-bottom:1px solid #c9c9c9;
}

ul#navigation ul li a {
	background:none;
	padding:7px 15px;
	color:#616161;
	text-shadow:1px 1px 0px #fff;
	text-decoration:none;
	display:inline-block;
	border:0 none;
	float:left;
	clear:both;
	width:150px;
}

	</style>
	
</head>
<p>
<?php
 ob_start();
   session_start();
   if(!isset($_SESSION["username"])||!isset($_SESSION["password"])){
	   header('Refresh: 0; URL = http://localhost/project/login.php');
   }
?>
<nav id="nav">
	<ul id="navigation">
	    <li><a href="out_menu.php">HOME</a></li>
		<li><a href="#" class="first">DELETE RECORDS &raquo;</a>
		<ul>
						<li><a href="deleteall.php">DELETE ALL PROFILES</a></li>
						<li><a href="deletecode.php">DELETE BY EMPLOYEE CODE</a></li>
						<li><a href="deletename.php">DELETE BY EMPLOYEE NAME</a></li>
					</ul></li>
		<li><a href="#">VIEW &raquo;</a>
			<ul>
				<li><a href="viewall.php">VIEW ALL PROFILES</a></li>
				<li><a href="viewcodeauth.php">VIEW BY EMPLOYEE CODE</a></li>
				<li><a href="viewname.php">VIEW BY EMPLOYEE NAME</a></li>					
				<li><a href="#">VIEW BY SALARY &raquo;</a><ul>
						<li><a href="htl.php">HIGH TO LOW</a></li>
						<li><a href="lth.php">LOW TO HIGH</a></li>
					</ul></li>
			</ul>
		</li>
		<li><a href="http://localhost/project/addprofile.php">ADD NEW RECORD</a></li>
		<li><a href="http://localhost/project/edit.php">EDIT OLD RECORDS</a></li>
		<li><a href="http://localhost/project/logout.php">SIGN OUT</a></li>
	</ul>
</nav>
</p>
<br><br>
<h1>Welcome To Simple Payroll System</h1>
<marquee behavior="scroll" direction="left" scrollamount="10"><h4><span class="note">
 Welcome  Admin now you are logged in.    </span></h4></marquee>
 <h4><span class="time"><?php  include "time.php";     ?></span>
</html>

<!DOCTYPE html>
<html>
<head>
<h1>Welcome To Simple Payroll System</h1>

<style>
.time{
	color: #0000FF;
   text-align:center;
   font-size: 1.5em;
}
body{
	background-color: #FFF8DC;
}
.note{
   color: #FF0000;
   text-align:center;
   font-size: 1.5em;
}
h1{
   color: #F0F8FF;
   text-align:center;
   background-color: #FF4500;
   padding: 15px;
   text-decoration: bold;
}

ul {
    list-style-type: none;
    margin-left:125px;
    padding: 5px;
    overflow: hidden;
}

li {
    float: left;
}

a:link, a:visited {
    display: block;
    width: 297px;
    font-weight: bold;
    color: #FFFFFF;
    background-color: #7CFC00;
    text-align: center;
    padding: 15px;
    text-transform: uppercase;
}

a:hover, a:active {
    background-color: #FF4500;
}
</style>
</head>
<body >

<ul>
  <li><a href="index.php">About</a></li>
  <!--<li><a href="#news">About</a></li>-->
  <li><a href="http://localhost/project/viewcode.php">view</a></li>
  <li><a href="http://localhost/project/login.php">Edit profiles</a></li>
</ul>

<marquee behavior="scroll" direction="left" scrollamount="10"><h4><span class="note">NOTE: Employees cannot be signed in, Only Administrator can be signed in</span></h4></marquee>
<h4><span class="time"><?php  include "time.php";     ?></span>

</body>


</html>

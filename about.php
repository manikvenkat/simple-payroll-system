<!DOCTYPE html>
<html>
<head>
<style type="text/css" media="screen">
#horizontalmenu ul{
	padding:1;
	margin:1;
	list-style:none;
}
#horizontalmenu li{
	float:left;
	position: relative;
	padding-right: 100;
	display: block;
	border: 4px solid #CC55FF;
	border-style: inset;
}
#horizontalmenu li:hover ul{
	display: block;
	background:red;
	height:auto;
	width:8em;
}
#horizontalmenu li ul li{
	clear:both;
	border-style: none;
}
</style>
</head>
<body>
<div id="horizontalmenu">
     <ul><li><a href="#">NEWS</a>
	 <ul><li><a href="#">National</a></li><li><a href="#">Sports</a></li></ul></li>
	 <li><a href="#">NEWS</a>
	 <ul><li><a href="#">National</a></li><li><a href="#">Sports</a></li></ul></li>
	 <li><a href="#">NEWS</a>
	 <ul><li><a href="#">National</a></li><li><a href="#">Sports</a></li></ul></li>
	 </ul>
</div>	 
</body>
</html>
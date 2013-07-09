<html>
<head>
<title>Estudiantes del Instante</title>

<style type="text/css">

body {
	margin: 0;
}



div.jmenu {
	height: 40px;
	background-color: #0D0385;
	
}

div.jmenu a {
	font-size: 12px;
	text-decoration: none;
	color: #555555;
}

div.jitem {
	padding: 10px;
	text-align:center;
	float:left;
	height: 20px;
	width: 50px;
	border-right: solid 1px;
	border-color: #999999;
}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">	
</head>


<body>

<div class="jmenu">
<div class="jitem">
<a href="./_m1">Noticias</a>
</div>
<div class="jitem">
<a href="./blog_t1_m1">Reflexiones</a>
</div><div class="jitem">
<a href="./events_m1">Eventos</a>
</div><div class="jitem">
<a href="./library_m1">Librer&iacute;a</a>
</div><div class="jitem">
<a href="./about_m1">Fundaci&oacute;n</a>
</div>
</div>

<?php

global $mobile;


if ($dodo == 'about') {
	$mobile = $mobile;
	$params = array("t2", "m1");
	require(dirname(__FILE__)."/site/blog.php");
}
else if ($dodo == 'blog') {
	$mobile = $mobile;
	require(dirname(__FILE__)."/site/blog.php");
}
else if ($dodo == 'events') {
	require(dirname(__FILE__)."/site/events.php");
}
else if ($dodo == 'library') {
	require(dirname(__FILE__)."/site/library.php");
}
else if ($dodo == 'about') {
	require(dirname(__FILE__)."/site/about.php");
}
else if ($dodo = 'porquerielabrisa') {
	$dodo = "library";
	global $Dododo;
	global $Porquerielabrisa;
	$Dododo = 1;
	$Porquerielabrisa = 1;

	require(dirname(__FILE__)."/site/library.php");
}


?>



</body>


</html>


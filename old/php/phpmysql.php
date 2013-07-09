<?php

$database1 = "edidb";
$database2 = "edidbz";

function db_conectar()
{
	global $database1, $database2;
	$l = @mysql_connect("edidbz.db.11331539.hostedresource.com", "edidbz", "Menso345@");

	mysql_select_db($database2, $l);
	return $l;
}


function db_query($q)
{
	$l = db_conectar();
	$r = mysql_query($q, $l);
	return $r;
}

function db_fetch($r)
{
	$a = array();
	while($b =  mysql_fetch_array($r, MYSQL_ASSOC)) {
		array_push($a, $b);
	}
	return $a;
}




?>
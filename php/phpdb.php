<?php


//if ($_SERVER["SERVER_NAME"] == "estudiantesdelinstante.net") {
if (1) {

$host = 'edidbz.db.11331539.hostedresource.com';
$user = 'edidbz';
$pass = 'Menso345@';
$db = 'edidbz';
}
else{

$host = 'server.celmedia.info';
$user = 'root';
$pass = 'cerebro';
$db = 'edidb';
}

/*
$host = 'server.celmedia.info';
$user = 'root';
$pass = 'cerebro';
$db = 'eidb';
*/

/*

$host = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'eidb';
//*/

function connect() {
	global $host, $user, $pass, $db;

	$link = mysql_connect($host, $user, $pass );
    //print $host." ".$user;
	mysql_select_db($db, $link);
	if (!$link) { die('Could not connect: ' . mysql_error()); }
	return $link;
}

function query($query) {
	$link = connect();
	//print mysql_error()."<br>";
    //print $query."<br>";
	$request = mysql_query($query, $link);
    //print_r($request);

	if (is_bool($request)) {
		if ($request) 
			return mysql_insert_id($link);
		return $request;
	}
	$array = array();
	//print mysqli_error($link);
	if (!$request) return $array;
	//print_r($request);
	//print("_");
	if (mysql_num_rows($request)) {
		while($row = mysql_fetch_array($request)) {
			$array[] = $row;
		}
	}
	return $array;
}
function query1($query) {
	$r = query($query);
	if (count($r)) return $r[0];
	return $r;
}

function affected()
{
	return mysql_affected_rows($link);

}

?>
<?php


/*
$host = 'edidbz.db.11331539.hostedresource.com';
$user = 'edidbz';
$pass = 'Menso345@';
$db = 'edidbz';
*/

$host = 'server.celmedia.info';
$user = 'root';
$pass = 'cerebro';
$db = 'edidb';


function connect() {
	global $host, $user, $pass, $db;

	$link = mysqli_connect($host, $user, $pass, $db );
	if (!$link) { die('Could not connect: ' . mysql_error()); }
	return $link;
}

function query($query) {
	$link = connect();
	$request = mysqli_query($link, $query);
	if (is_bool($request)) {
		if ($request) 
			return mysqli_insert_id($link);
		return $request;
	}
	$array = array();
	//print mysqli_error($link);
	if (!$request) return $array;
	//print_r($request);
	//print("_");
	if (mysqli_num_rows($request)) {
		while($row = mysqli_fetch_array($request)) {
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
	return mysqli_affected_rows($link);	

}

?>

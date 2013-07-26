<?php

function do_get_data() {


	global $do, $dodo;
	$q = "";
	if ($dodo) {
		$q = " WHERE idblog={$dodo}";
	}

	$query = "SELECT unix_timestamp(datec) t, datec created, idblog id, title, data
	 from ei_blog {$q} order by datec desc limit 10";
	$r = query($query);
	//print $query;
	
	$a = array();
	foreach ($r as $rr) {
	//	$rr["data"] = @file_get_contents(dirname(__FILE__)."/../blogs/".$rr["filename"]);
		//$rr["data"] =  dirname(__FILE__)."/../blogs/".$rr["filename"];
		$a[] = $rr;
	}
	
	//print json_encode($a);
	return $a;
	
}


?>
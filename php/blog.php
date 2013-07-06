<?php

function do_get_data() {


	global $do, $dodo;
	$q = "";
	if ($dodo) {
		$q = " WHERE id={$dodo}";
	}

	$query = "SELECT unix_timestamp(created) t, created, id, title, filename from blog {$q} order by created limit 10";
	$r = query($query);
	
	$a = array();
	foreach ($r as $rr) {
		$rr["data"] = @file_get_contents(dirname(__FILE__)."/../blogs/".$rr["filename"]);
		//$rr["data"] =  dirname(__FILE__)."/../blogs/".$rr["filename"];
		$a[] = $rr;
	}
	
	//print json_encode($a);
	return $a;
	
}


?>
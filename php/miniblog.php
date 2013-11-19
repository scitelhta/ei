<?php


function miniblog()
{

	$query = "SELECT idblog id, title from ei_blog where state=0 and length(title)>0 order by datec desc limit 6";
	$r = query($query);


	$a = array();
	if ($r) {
		foreach($r as $row) {
			$a[] = array("id"=>$row["id"], "title"=>html_entity_decode(($row["title"])));
		}
	}
	return $a;

}






?>
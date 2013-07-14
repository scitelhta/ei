<?php


function miniblog()
{

	$query = "SELECT id, title from edidb.blog where length(title)>0 order by created desc limit 6";
	$r = query($query);


	$a = array();
	foreach($r as $row) {
		$a[] = array("id"=>$row["id"], "title"=>html_entity_decode(utf8_encode($row["title"])));
	}
	return $a;

}






?>
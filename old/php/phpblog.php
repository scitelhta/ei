<?php


require_once(dirname(__FILE__)."/phpmysql.php");

function getblogpage($p, $psize, $ptype)
{
	if (!$psize)
		$psize = 10;

	$a = ($p * $psize);
	$b = 1 + $psize;//(($p + 1) * $psize) + 1;

	$ptypew = "";
	if ($ptype) {
		$ptypew = "WHERE ptype='{$ptype}' ";
	}
	
	$query = "select id, created, userid, title, filename, link from blog {$ptypew} order by created desc limit {$a}, {$b};";

	//print $query;
	
	$r = db_query($query);
	if (!$r) return array();
	return db_fetch($r);
}


function getblogid($p)
{
	$query = "select id, created, userid, title, filename, link from blog where id='{$p}';";
	$r = db_query($query);
	if (!$r) return array();
	return db_fetch($r);	

}

function get_blogcomments($bid, $complete)
{
	if ($complete) {
		$query = "select c.id as id, c.created as created, c.userid as userid, c.filename as filename from bcomments c where c.blogid='{$bid}';";
		//print $query;
		$r = db_query($query);
		if (!$r) return array();
		return db_fetch($r);
	}
	
	$queryc = "select count(*) as cnt from bcomments c where c.blogid='${bid}';";
	//print $queryc;
	
	$r = db_query($queryc);
	if (!$r) return 0;
	
	$a = db_fetch($r);
	//print_r(0 + $a[0]["cnt"]);
	
	return 0 + $a[0]["cnt"];
}

function blog_post($fecha, $uid, $file, $titulo,  $ptype, $alink)
{
	$query = "INSERT IGNORE INTO blog(created, userid, title, filename, ptype, link) VALUES ('{$fecha}', '{$uid}', '{$titulo}', '{$file}', '{$ptype}', '{$alink}');";
	
//	print($query);	
	
	
	$r = db_query($query);
	
	return $r;
	
}

?>

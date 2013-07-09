<?php

require_once(dirname(__FILE__)."/phpmysql.php");





function login_user($u, $p)
{
	$t = rand().rand().rand().rand().rand();
	$m = md5($t);
	$ip = $_SERVER["REMOTE_ADDR"];
	
	
	$r=db_query("SELECT id, login, password from users where login='".$u."';");	
	$ar=db_fetch($r);
	if ($ar) $a = $ar[0];
	else return "";
	$id=$a["id"];
	if (($a["login"] == $u) && ($a["password"] == $p)) {
		db_query("INSERT INTO tokens(id, loged, unlog, ip, id_user) values ('{$m}', now(), date_add(now(), interval 1 day), '{$ip}', '{$id}');");
		return $m;
	}
	return "";
}

function register_user($u, $n, $p, $e, $f)
{
	$t = rand().rand().rand().rand().rand();
	$m = md5($t);
	$ip = $_SERVER["REMOTE_ADDR"];
	
	$r=db_query("SELECT login, email from users where login='{$u}' or email='{$e}';");	
	$ar=db_fetch($r);
	if ($ar) return 1;

	$q = "INSERT IGNORE INTO users (id, login, name, password, born, email, utype) values('{$m}', '{$u}', '{$n}', '{$p}', '{$f}', '{$e}', 4);";
	db_query($q);
	
	$q = "UPDATE users set name='{$n}' where login='{$u}';";
	db_query($q);
	
	return 0;
}


function get_usersinfo($a)
{
	//return $a;
	
	
	foreach($a as $i => $ai) {
		$q = "SELECT ui.ukey as k, ui.uvalue as v from uinfo ui where ui.userid={$ai["id"]};";
		
		$rr = db_query($q);
		if (!$rr) continue;
		$aa = db_fetch($rr);
		
		foreach($aa as $aai) {
			$a[$i][$aai["k"]] = $aai["v"];
		}
	
		
		if (isset($a[$i]["fbid"])) {
		
			if (!isset($a[$i]["image_large"]))
				$a[$i]["image_large"] = "http://graph.facebook.com/{$a[$i]['fbid']}/picture?type=large";
			if (!isset($a[$i]["image_small"]))
				$a[$i]["image_small"] = "http://graph.facebook.com/{$a[$i]['fbid']}/picture?type=small";
			if (!isset($a[$i]["link"]))
				$a[$i]["link"] = "http://www.facebook.com/profile.php?id={$a[$i]['fbid']}";

		}
		
		if ((!isset($a[$i]["link"])) && isset($a[$i]["url"])) {
			$a[$i]["link"] = $a[$i]["url"];
		}
		if ((!isset($a[$i]["image"])) && isset($a[$i]["picture"])) {
			$a[$i]["image"] = $a[$i]["picture"];
		}	
	}
	return $a;

}

function user_gglogin($user, $token)
{
	$ulogin=(isset($user["id"])?$user["id"]:'');
	$uname=(isset($user["name"])?$user["name"]:'');
	$uemail=(isset($user["email"])?$user["email"]:'');
	$ugender=(isset($user["gender"])?$user["gender"][0]:'');
	$born=(isset($user["birthday"])?$user["birthday"][0]:'');
	
	$q = "INSERT IGNORE INTO users (login, name, email, password, utype, sex) values('{$ulogin}', '{$uname}', '{$uemail}', '', 6, '{$ugender}');";
	db_query($q);

	$q = "UPDATE users set name='{$uname}' where login='{$ulogin}';";
	db_query($q);


	$uid = get_useridbylogin($ulogin);
	
	
	$a = 0;
	$q = "INSERT IGNORE INTO uinfo (userid, ukey, uvalue) values ";
	if (isset($user["link"])) {
		$a = 1;
		$q = $q."('{$uid}', 'url', '{$user["link"]}')";
	}
	
	if ($token) {
		if ($a) $q = $q.",";
		$a = 1;
		$q = $q."('{$uid}', 'ggtoken', '{$token}')";
	}
	
	if (isset($user["picture"])) {
		if ($a) $q = $q.",";
		$a = 1;
		$q = $q."('{$uid}', 'picture', '{$user["picture"]}')";
	}
	if ($a) {
		$q = $q.";";
		db_query($q);
	}	
	
	//$f=fopen("C:\\temp\\phppp.txt","w");
	//$d = var_export($user, true);
	//fwrite($f, $d);
	//fwrite($f, $q);
	//fclose($f);



}


function get_useridbylogin($login)
{
	$q = "SELECT id FROM users WHERE login='{$login}';";
		
	$rr = db_query($q);
	if (!$rr) return "";
	$aa = db_fetch($rr);
	if (!$aa) return "";
	return $aa[0]["id"];
}



function set_userfb($ulogin, $uname)
{
	$q = "INSERT IGNORE INTO users (login, name, email, password, utype, sex) values('{$ulogin}', '{$uname}', '', '', 5, '');";
	db_query($q);
	$uid = get_useridbylogin($ulogin);
	
	$q = "UPDATE users set name='{$uname}' where login='{$ulogin}';";
	db_query($q);
	
	$q = "REPLACE INTO uinfo (userid, ukey, uvalue) values ('{$uid}', 'fbid', '{$ulogin}') ";
	$q = $q.", ('{$uid}', 'url', 'http://www.facebook.com/profile.php?id={$ulogin}')";
	
	$picture = get_fbuserPicture($ulogin);
	if ($picture) {
		$q = $q.",";
		
		$q = $q."('{$uid}', 'picture', '{$picture}')";
	}
	
		if (isset($user->link)) {
		$q = $q.",";
		$q = $q."('{$uid}', 'url', '{$user->link}')";
	}

	
	$q = $q.";";
	db_query($q);	
	
	//print $q;
	
}

function user_fblogin($user, $token, $userid)
{
	//$f=fopen("C:\\temp\\phppp.txt","w");

	
	$ulogin=(isset($user->id)?$user->id:$userid);
	$uname=(isset($user->name)?$user->name:'');
	$uemail=(isset($user->email)?$user->email:'');
	$ugender=(isset($user->gender)?$user->gender[0]:'');
	
	
	$q = "INSERT IGNORE INTO users (login, name, email, password, utype, sex) values('{$ulogin}', '{$uname}', '{$uemail}', '', 5, '{$ugender}');";
	db_query($q);

	$uid = get_useridbylogin($ulogin);
	
	$q = "UPDATE users set name='{$uname}', email='{$uemail}', sex='{$ugender}' where login='{$ulogin}';";
	db_query($q);

	$a = 0;
	$q = "REPLACE INTO uinfo (userid, ukey, uvalue) values ('{$uid}', 'fbid', '{$ulogin}'), ('{$uid}', 'fbtoken', '{$token}') ";

	if (isset($user->link)) {
		$q = $q.",";
		$q = $q."('{$uid}', 'url', '{$user->link}')";
	}else {
		$q = $q.",";
		$q = $q."('{$uid}', 'url', 'http://www.facebook.com/profile.php?id={$ulogin}')";
	}
	
	if (isset($user->location->name)) {
		$q = $q.",";
		
		$q = $q."('{$uid}', 'location', '{$user->location->name}')";
	}
	
	$picture = get_fbuserPicture($ulogin);
	if ($picture) {
		$q = $q.",";
		
		$q = $q."('{$uid}', 'picture', '{$picture}')";
	}
	
		if (isset($user->link)) {
		$q = $q.",";
		$q = $q."('{$uid}', 'url', '{$user->link}')";
	}

	
	$q = $q.";";
	db_query($q);
	
	
	//$d = var_export($user, true);
	//fwrite($f, $d);
	//fwrite($f, $q);
	//fclose($f);
	
	
	

}

function get_userbyid($id)
{
	$q = "SELECT u.id as id,u.login as login,u.name as name,u.born as born,u.email as email, u.sex as sex,u.utype as utype ".
	"FROM users u where u.id='{$id}';";
	
	$r = db_query($q);
	$a = db_fetch($r);
	if ($a) {
		$ra = get_usersinfo($a);
		return $ra[0];
	}
	return array();
}

function get_userbylogin($login)
{
	$q = "SELECT u.id as id,u.login as login,u.name as name,u.born as born,u.email as email, u.sex as sex,u.utype as utype ".
	"FROM users u where u.login='{$login}';";
	
	$r = db_query($q);
	$a = db_fetch($r);
	if ($a) {
		$ra = get_usersinfo($a);
		return $ra[0];
	}
	return array();
}

function get_user($token)
{

	$q = "SELECT u.id as id,u.login as login,u.name as name,u.born as born,u.email as email, u.sex as sex,u.utype as utype".
	" FROM users u, tokens t where u.id=t.id_user AND t.id='$token' and (now()>t.loged) and (now()<t.unlog);";

	$r = db_query($q);
	
	
	if (!$r) return array();
	$a = db_fetch($r);
	
	if (!$a) return $a;
	
	$ra = get_usersinfo($a);

	return $ra[0];
	
}

function get_events_months($o)
{

	

	$q = "SELECT count(*) as n,month( date_add(itime, INTERVAL -{$o} MINUTE)) as month, year( date_add(itime, INTERVAL -{$o} MINUTE)) as year FROM events group by month, year order by year, month";
	$r = db_query($q);
	if (!$r) return array();
	return db_fetch($r);
	
}

function get_events_next($y, $m, $d, $o, $c, $t)
{
	$limit = "";
	if (isset($c) && ($c)) {
		$limit = "LIMIT {$c}";
	}

	$tt = "";
	if ($t) $tt = "m";
	
	
	$q = "SELECT date_add(e.itime, INTERVAL -{$o} MINUTE) as itime, e.etime as etime, date_add(e.ftime, INTERVAL -{$o} MINUTE) as ftime, ".
	"day(e.itime) as day, UNIX_TIMESTAMP(e.itime) as uitime, UNIX_TIMESTAMP(e.ftime) as uftime, UNIX_TIMESTAMP(e.etime) as uetime, e.name as name, ".
	"e.etime as time, e.place as place, e.city as city, e.person as person,e.personad as personad,  e.url as url, e.id as id, e.guid as guid "	.
		"from {$tt}events e where (date_add(e.itime, INTERVAL -{$o} MINUTE) >= '{$y}-{$m}-{$d}') order by itime,ftime, day, name {$limit};";

	//print $q;
			
	$r = db_query($q);
	if (!$r) return array();
	return db_fetch($r);
}

function print_city_tags()
{
	$q = "SELECT city from events group by city";
	$r = db_query($q);
	if (!$r) return "";
	$e = db_fetch($r);
	$i = 0;
	foreach($e as $v) {
		if ($i) print ",";
		$pp = htmlentities($v["city"]);
		print "\"{$pp}\"";
		$i++;
	}
	return "";

}

function print_place_tags()
{
	$q = "SELECT place from events group by place";
	$r = db_query($q);
	if (!$r) return "";
	$e = db_fetch($r);
	$i = 0;
	foreach($e as $v) {
		if ($i) print ",";
		$pp = htmlentities($v["place"]);
		print "\"{$pp}\"";
		$i++;
	}
	return "";

}

function get_events_by_month($y, $m, $o)
{
	$yy = $y;
	$mm = 1 + $m;
	if ($mm > 12) {
		$mm = 1;
		$yy++;
	}	
	
	
	$q = "SELECT date_add(e.itime, INTERVAL -{$o} MINUTE) as itime, e.etime as etime, date_add(e.ftime, INTERVAL -{$o} MINUTE) as ftime, day(date_add(e.itime, INTERVAL -{$o} MINUTE)) as day, e.name as name,".
	"	e.place as place, e.city as city, e.person as person, e.personad as personad,  e.url as url ".
		"from events e where (date_add(e.itime, INTERVAL -{$o} MINUTE) >= '$y-$m-01') and (date_add(e.itime, INTERVAL -{$o} MINUTE) < '$yy-$mm-01') order by day, itime,ftime, name;";
/*	
	$a = array();
	$a["k"] = $q;
	print json_encode($a);
	exit();
	*/
	
	$r = db_query($q);
	if (!$r) return "";
	$e = db_fetch($r);
	
	return $e;
	
}

function query_insert($e, $t)
{

	$q = "INSERT INTO $t (";
	$i = 0; 
	foreach($e as $k => $v) {
		if ($i) $q = $q . ", ";
		$q = $q . $k;
		$i++;
	}
	$q = $q . ") VALUES (";
	$i = 0;
	foreach($e as $k => $v) {
		if ($i) $q = $q . ", ";
		if (strpos($v, 'date_add(')!==false) 
			$q = $q . $v;
		else
			$q = $q . "'{$v}'";
		$i++;
	}

	$q = $q . ");";
	
	return $q;
}


function set_event($e, $o)
{
	//print_r($e);
	


	
	$e["itime"] = "date_add('{$e["itime"]}', INTERVAL {$o} MINUTE)";
	$e["ftime"] = "date_add('{$e["ftime"]}', INTERVAL {$o} MINUTE)";
	
	$q = query_insert($e, "events");

	
	//print ($q);
	return db_query($q);


}

function new_mp3file($author, $title, $ext, $song)
{
	$t = rand().rand().rand().rand().rand();
	$m = md5($t);
	$ext = ereg_replace("[^A-Za-z0-9_]", "", $ext );
	$afile = "./upload/{$m}.{$ext}";
	
	//print_r($ext);
	//print_r( $afile);
	
	$q = "INSERT INTO uploaded (id, filename, uowner, utype, ufor, udate, utitle, aproved) VALUES('{$m}', '{$afile}', '{$author}', 'm', '{$song}', now(), '{$title}', 0);";
	//print $q;
	$r = db_query($q);
	if (!$r) return array();
	
	return $afile;

}

function get_mp3files($song, $sid)
{
	$ssid = "";
	if ($sid) $ssid = "m.id = '{$sid}' AND ";

	$q = "SELECT m.id, m.filename, m.uowner, m.udate, m.utitle FROM uploaded m WHERE {$ssid} m.utype = 'm' and m.ufor='{$song}' and m.aproved='1';";
	
	//print_r($q);
	
	$r = db_query($q);
	if (!$r) return array();	
	$e = db_fetch($r);
	
	return $e;
}

function get_pictures($gal)
{
	$q = "SELECT m.id, m.filename, m.utitle, m.udate FROM uploaded m WHERE m.utype = 'p' and m.ufor='{$gal}' and m.aproved='1';";
	
	//print_r($q);
	
	$r = db_query($q);
	if (!$r) return array();	
	$e = db_fetch($r);
	
	return $e;
}

function get_rss($art)
{
	$t = "";
	if ($art == "news") $t = "WHERE ptype='2' ";
	if ($art == "r") $t = "WHERE ptype='1'" ;
	

	$q = "SELECT id, UNIX_TIMESTAMP(created) as cdate, userid, title, filename, ptype FROM blog {$t} ORDER BY created";
	$r = db_query($q);
	if (!$r) return array();	
	$e = db_fetch($r);
	
	return $e;
}

?>
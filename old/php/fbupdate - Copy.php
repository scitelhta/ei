<?php

require_once(dirname(__FILE__)."/phpmysql.php");
require_once(dirname(__FILE__)."/phpapi.php");
require_once(dirname(__FILE__)."/phpblog.php");
require_once(dirname(__FILE__)."/auth/auth.php");




function eventos($last, $token)
{
	$qr = "";
	if ($last) $qr="&since={$last}";
	//https://graph.facebook.com/100000065026573/events?limit=600&access_token=AAAFZCjV0GMcgBAKmGBtPxPkDdtZBiWCVsXuWixNzTUZC1qXNRFlZBlC7xotoJSZAaOIX8sKkvJCp5oqab2kts1WZCJS2cqC7rH6mtbDlRSSwZDZD
	
	$next = "https://graph.facebook.com/100000065026573/events?limit=600&access_token={$token}{$qr}";
	//$next = "https://graph.facebook.com/110594545686574/events?limit=600&access_token={$token}{$qr}";
	$query1 = "INSERT IGNORE INTO events (itime, ftime, name, place, url, guid) VALUES ";
	$i = 0;
	while(1) {
		if (!$next) break;
		//print $next;
		//print "<br>";		
		$r = file_get_contents($next);
		print_r($r);
		$k = json_decode($r);
		if (isset($k->paging)) {
			$pagin = $k->paging;
			$next = $pagin->next;
		}		
		else $next = "";
		$k = $k->data;
		$l = count($k);
		//print($l);
		//print("<br>");
		if ($l < 1) break;
		foreach ($k as $a) {
			$itime = str_replace("T", " ", $a->start_time);
			$ftime = str_replace("T", " ", $a->end_time);
			$name = "";
			$location = "";
			if (isset($a->name)) $name = $a->name;
			if (isset($a->location)) $location = $a->location;
			$name = str_replace("'", " ", mysql_real_escape_string (htmlentities($name)));
			$location = str_replace("'", " ", mysql_real_escape_string (htmlentities($location)));
			
			$query2 = "('{$itime}', '{$ftime}', '{$name}', '{$location}', 'http://www.facebook.com/events/{$a->id}', '{$a->id}')";
			if ($i++) $query1 .= ", ";
			$query1 .= $query2;
		}
		
	}
	$query1 .= ";";
	//print($query1);
	$r = db_query($query1);
	
	
}


function myeventos($last, $token)
{
	$qr = "";
	if ($last) $qr="&since={$last}";
	////https://graph.facebook.com/100000065026573/events?limit=600&access_token=AAAFZCjV0GMcgBAKmGBtPxPkDdtZBiWCVsXuWixNzTUZC1qXNRFlZBlC7xotoJSZAaOIX8sKkvJCp5oqab2kts1WZCJS2cqC7rH6mtbDlRSSwZDZD
	//$next = "https://graph.facebook.com/100000065026573/events?limit=600&access_token={$token}{$qr}";
	//$next = "https://graph.facebook.com/110594545686574/events?limit=600&access_token={$token}{$qr}";

	//$next = "https://graph.facebook.com/100000065026573/events?limit=600&access_token={$token}{$qr}";
	$next = "https://graph.facebook.com/110594545686574/events?limit=600&access_token={$token}{$qr}";
	$query1 = "INSERT IGNORE INTO mevents (itime, ftime, name, place, url, guid) VALUES ";
	$i = 0;
	while(1) {
		if (!$next) break;
		print $next;
		
		print "<br>";		
		$r = file_get_contents($next);
		//print_r($r);
		
		//break;
		$k = json_decode($r);
		if (isset($k->paging)) {
			$pagin = $k->paging;
			$next = $pagin->next;
		}		
		else $next = "";
		$k = $k->data;
		$l = count($k);
		//print($l);
		//print("<br>");
		if ($l < 1) break;
		foreach ($k as $a) {
			$itime = str_replace("T", " ", $a->start_time);
			$ftime = str_replace("T", " ", $a->end_time);
			$name = "";
			$location = "";
			if (isset($a->name)) $name = $a->name;
			if (isset($a->location)) $location = $a->location;
				
			$convmap= array(0x0100, 0xFFFF, 0, 0xFFFF);
			$name1= mb_encode_numericentity($name, $convmap, 'UTF-8');
			print $name1;
			print "_";
			$name2= utf8_decode($name1);
			print $name2;
			print "..";
			$loc1= mb_encode_numericentity($location, $convmap, 'UTF-8');
			$loc2= utf8_decode($loc1);
						
			
			$name = str_replace("'", " ",  mysql_real_escape_string(htmlentities($name2)));
			$location = str_replace("'", " ",  mysql_real_escape_string(htmlentities($loc2)));
			
			$query2 = "('{$itime}', '{$ftime}', '{$name}', '{$location}', 'http://www.facebook.com/events/{$a->id}', '{$a->id}')";
			if ($i++) $query1 .= ", ";
			$query1 .= $query2;
			
			$rpfile=dirname(__FILE__)."/../eventss/{$a->id}.jpg";
			if (!file_exists($rpfile)) {
				$rpicture = file_get_contents("https://graph.facebook.com/{$a->id}/picture?type=large&access_token={$token}");
				file_put_contents($rpfile, $rpicture);
				print_r(dirname(__FILE__)."/../eventss/{$a->id}.jpg");
			}
		}
		
	}
	$query1 .= ";";
	print($query1);
	$r = db_query($query1);
	$e = mysql_error();
	print $e;
	
}

function estudiantes($last, $token)
{

	$qr = "";
	//if ($last) $qr="&since={$last}";
	

	$next = "https://graph.facebook.com/110594545686574/feed?access_token={$token}{$qr}";
	print $next;
	
	while(1) {
		if (!$next) break;
		$next .= "&limit=300";
		print $next;
		
		print "<br>";
		$r = file_get_contents($next);
		//$r = file_get_contents("C:\\temp\\fbgraph1.txt");
		print_r($r);
		print "<br>";
		//break;
		$k = json_decode($r);
		if (isset($k->paging)) {
			$pagin = $k->paging;
			$next = $pagin->next;
		}
		else $next = "";
		$k = $k->data;
		$l = count($k);
		print($l);
		
		//print("<br>");
		if ($l < 1) break;
		foreach ($k as $a) {
			$picture = "";
			$message = "";
			$link = "";
			$froma = $a->from;
			$from = $froma->id;
			if ($from != "100000065026573") continue;
			$time = "";
			$alink = "";
			$actions = $a->actions;
			foreach($actions as $action) {
				$alink = $action->link;
				break;
			}
			
			$id = $a->id;
			if (isset($a->message))
				$message = $a->message;
			if (isset($a->created_time))
				$time = $a->created_time;
			if (isset($a->picture))
				$picture = $a->picture;
			if (isset($a->link))
				$link = $a->link;
				
			$user = get_userbylogin($from);
			if (!$user) {
				set_userfb($from, $froma->name);
				$user = get_userbylogin($from);
			}
			print $user;
			if (!$user) continue;
				
			$time = substr(str_replace("T", " ", $time), 0, 19);
			$ffile = str_replace(":", "", str_replace("-", "", str_replace(" ", "", $time))). "_{$id}.php";
			$file = dirname(__FILE__)."/../site/blog/".$ffile;
			
			$hmsg = ($message);

			$ssya = "";
			$ssp = preg_split("/[\s,]+/", $hmsg);
			foreach ($ssp as $sss) {
				if ((strpos($sss, "://")!==FALSE) && (strpos($ssya, " ".$sss." ")===FALSE) ) {
					$ssya .= " ".$sss." ";
					$hmsg = str_replace($sss, "<a href='{$sss}'>{$sss}</a>", $hmsg);
				}
			}

			
			if ($picture) {
				$img = "<div style='float:left'><img src='{$picture}'/></div>";
				if ($link) {
					$img = "<a href='{$link}';>{$img}</a>";
				}
				$hmsg = $img. $hmsg;
			}
			else if ($link)  {
				if (strpos($hmsg, $link) === FALSE) {
					$hmsg .= "< br>"."<a href='{$link}'>{$link}</a>";
				}
			}
			if (!$hmsg) continue;
			
			if (!file_exists($file)) 
			{
				
				$fp = fopen($file, 'w');
				fwrite($fp, $hmsg);
				fclose($fp);
			}
				
			$s=trim(strip_tags(str_replace("<br", "\n", str_replace("<BR", "\n", $message))));
			$ssp = preg_split("/[\s,]+/", $s);

			$l = strlen($s);
			$lll = strpos($s, "\n");
			$ll = strpos($s, ".");
			$llw = strpos($s, "://");
			
			if ((($llw == FALSE ) || ($llw > $ll)) && ($ll > 0) && ($ll < $l)) $l = $ll;
			if (($lll > 0) && ($lll < $l)) $l = $lll;
			if ($l === FALSE) $l = strlen($s);
			if ($l > 64) $l = 64;
			
			$ll = strrpos(substr($s, 0, $l), " ");
			if (($l == 64) && ($ll > 2)) $l = $ll;
			$titulo = substr($s, 0, $l);
				
			
			blog_post($time, $user["id"], $ffile, $titulo, '1', $alink);
				

		}
		//if (!isset($k->paging)) break;
		//if ($l < 30) break;
	}
	
	$t = time();
	$query = "REPLACE INTO uinfo (userid, ukey, uvalue) select id, 'lastfbupdate', '{$t}'  from users where login='100000065026573';";
	$r = db_query($query);
	//print ($query);

}

function eventos2($eventos, $token)
{


	$i = 0;
	foreach($eventos as $e => $k)
	{
		if (!$k) continue;
		$next = "https://graph.facebook.com/{$e}?access_token={$token}";
		$r = file_get_contents($next);
		print_r($r);
		$a = json_decode($r);

		if (!isset($a->id)) continue;

		$itime = str_replace("T", " ", $a->start_time);
		$ftime = str_replace("T", " ", $a->end_time);
		$name = "";
		$location = "";
		if (isset($a->name)) $name = $a->name;
		if (isset($a->location)) $location = $a->location;
		
		$convmap= array(0x0100, 0xFFFF, 0, 0xFFFF);
		$name1= mb_encode_numericentity($name, $convmap, 'UTF-8');
		print $name1;
		print "_";
		$name2= utf8_decode($name1);
		print $name2;
		print "..";
		$loc1= mb_encode_numericentity($location, $convmap, 'UTF-8');
		$loc2= utf8_decode($loc1);
		
		$name = str_replace("'", " ", mysql_real_escape_string ($name2));
		$location = str_replace("'", " ", mysql_real_escape_string ($loc2));
		$query1 = "INSERT IGNORE INTO events (itime, ftime, name, place, url, guid) VALUES ";
		$i = 0;
			
		$query2 = "('{$itime}', '{$ftime}', '{$name}', '{$location}', 'http://www.facebook.com/events/{$a->id}', '{$a->id}')";
		if ($i++) $query1 .= ", ";
		$query1 .= $query2;		
		$query1 .= ";";
		print($query1);
		$r = db_query($query1);

	}

}


function prueba($last, $token)
{




	$qr = "";
	if ($last) $qr="&since={$last}";
	
	
	

	//$next = "https://graph.facebook.com/110594545686574/feed?access_token={$token}{$qr}";
	$next = "https://graph.facebook.com/223425221101722/feed?access_token={$token}{$qr}";
	$kk= array();
	while(1) {
		if (!$next) break;
		$next .= "&limit=300";
		//print $next;
		//print "<br>";
		$r = file_get_contents($next);
		//$r = file_get_contents("C:\\temp\\fbgraph1.txt");
		print_r($r);
		break;
		$k = json_decode($r);
		if (isset($k->paging)) {
			$pagin = $k->paging;
			$next = $pagin->next;
		}
		else $next = "";
		$k = $k->data;
		$l = count($k);
		//print($l);
		//print("<br>");
		if ($l < 1) break;
		foreach ($k as $a) {
			$message = "";

			if (isset($a->message))
				$message = $a->message;

			
			$hmsg = ($message);

			$ssp = preg_split("/[\s,]+/", $hmsg);
			foreach ($ssp as $sss) {
				if ((strpos($sss, "://")!==FALSE) && (strpos($sss, "facebook.com/events")!==FALSE) ) {
					$sspp = preg_split("/[\/]+/", $sss);
					foreach($sspp as $ssps) {
						if (is_numeric($ssps)) {
							$kk[$ssps]=1;
						}
					}
				
				}
			}
		

		}
		//if (!isset($k->paging)) break;
		//if ($l < 30) break;
	}
	
	$query = "SELECT guid FROM events";
	$r = db_query($query);
	$ar = db_fetch($r);
	foreach ($ar as $a) {
		$kk[$a["guid"]] = 0;
	}
	
	
	
	eventos2($kk, $token);


}

function fbupdate($key)
{
$message = isset($_REQUEST["message"])?$_REQUEST["message"]:"";
	if ($key && $message) {
		$xPost=array();
		$xPost['access_token'] = $key;
		$xPost['message'] = str_replace("\\n", "\n", $message);

		
		$ch = curl_init('https://graph.facebook.com/223425221101722/feed'); 
		//$ch = curl_init('https://graph.facebook.com/110594545686574/feed'); 
//		$ch = curl_init('https://graph.facebook.com/100000065026573/feed'); 
		curl_setopt($ch, CURLOPT_VERBOSE, 1); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_HEADER, 1); 
		curl_setopt($ch, CURLOPT_TIMEOUT, 120);
		curl_setopt($ch, CURLOPT_POST, 1); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xPost); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);  
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
		curl_setopt($ch, CURLOPT_CAINFO, NULL); 
		curl_setopt($ch, CURLOPT_CAPATH, NULL); 
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0); 

		$result = curl_exec($ch); 
		if (!$result) print curl_error($ch);
		else print_r($result);
		return;
	}
	if ($key) {
		$token = $key;
		$query = "INSERT INTO tokens (id, loged, unlog, ip, id_user) values ('".md5(rand())."', now(), date_add(now(), interval 100 day), '127.0.0.1', '1');";
		db_query($query);
		$query="UPDATE uinfo set uvalue='{$key}' where ukey='fbtoken' and userid in (SELECT id from users where login='100000065026573');";
				//$query = "INSERT INTO tokens (id, loged, unlog, ip, id_user) values ('".md5(rand())."', now(), date_add(now(), interval 100 day), '127.0.0.1', '1');";
		db_query($query);


		//print(mysql_error());
		//return;
	}
		else {
		$query = "SELECT i.uvalue as token FROM uinfo i, users u where u.login='100000065026573' and u.id=i.userid and i.ukey='fbtoken';";
		$r = db_query($query);
		if (!$r) return;
		$ar = db_fetch($r);
		if (!$ar) return;
		
		$t = $ar[0]["token"];
		
		$ar = 0;
		$last = 0;
		$query = "SELECT i.uvalue as lsat FROM uinfo i, users u where u.login='100000065026573' and u.id=i.userid and i.ukey='lastfbupdate';";
		$r = db_query($query);
		if ($r) $ar = db_fetch($r);
		if ($ar) $last = $ar[0]["lsat"];
		
		$token = $t;

	}
		
	estudiantes($last, $token);

	//myeventos(0, $token);
	//eventos($last, $t);
	//eventos(0, $t);
	//prueba($last, $t);


}
$key="";
if ($_REQUEST["key"]) $key=$_REQUEST["key"];

db_conectar();
fbupdate($key);
?>


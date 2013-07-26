<?php

require_once(dirname(__FILE__)."/../phpdb.php");



//eventos mios todos
function eventos($last, $token)
{


	$qr = "";
	if ($last) $qr="&since={$last}";
	//https://graph.facebook.com/100000065026573/events?limit=600&access_token=AAAFZCjV0GMcgBAKmGBtPxPkDdtZBiWCVsXuWixNzTUZC1qXNRFlZBlC7xotoJSZAaOIX8sKkvJCp5oqab2kts1WZCJS2cqC7rH6mtbDlRSSwZDZD

	$next = "https://graph.facebook.com/100000065026573/events?limit=600&access_token={$token}{$qr}";
	//$next = "https://graph.facebook.com/110594545686574/events?limit=600&access_token={$token}{$qr}";
	$query1 = "INSERT IGNORE INTO ei_event (datei, datef, name, place, url, guid, type) VALUES ";
	$i = 0;
	while(1) {
		if (!$next) break;
		//print $next;
		//print "<br>";		
		$r = @file_get_contents($next);
		if (!$r) break;
		print_r($r)."<br>";
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
			
			$query2 = "('{$itime}', '{$ftime}', '{$name}', '{$location}', 'http://www.facebook.com/events/{$a->id}', '{$a->id}', '1')";
			if ($i++) $query1 .= ", ";
			$query1 .= $query2;
		}
		
	}
	$query1 .= ";";
	//print($query1);
	$r = query($query1);
	
	
}

//estudiantes eventos
function myeventos($last, $token)
{
	$qr = "";
	if ($last) $qr="&since={$last}";
	////https://graph.facebook.com/100000065026573/events?limit=600&access_token=AAAFZCjV0GMcgBAKmGBtPxPkDdtZBiWCVsXuWixNzTUZC1qXNRFlZBlC7xotoJSZAaOIX8sKkvJCp5oqab2kts1WZCJS2cqC7rH6mtbDlRSSwZDZD
	//$next = "https://graph.facebook.com/100000065026573/events?limit=600&access_token={$token}{$qr}";
	//$next = "https://graph.facebook.com/110594545686574/events?limit=600&access_token={$token}{$qr}";

	//$next = "https://graph.facebook.com/100000065026573/events?limit=600&access_token={$token}{$qr}";
	$next = "https://graph.facebook.com/110594545686574/events?limit=600&access_token={$token}{$qr}";
	$query1 = "INSERT IGNORE INTO ei_event (datei, datef, name, place, url, guid, type) VALUES ";
	$i = 0;
	while(1) {
		if (!$next) break;
		print $next."<br>";;
		
		print "<br>";		
		$r =  @file_get_contents($next);
		if (!$r) break;
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
			print $name1."<br>";;
			print "_";
			$name2= utf8_decode($name1);
			print $name2;
			print ".."."<br>";;
			$loc1= mb_encode_numericentity($location, $convmap, 'UTF-8');
			$loc2= utf8_decode($loc1);
						
			
			$name = str_replace("'", " ",  mysql_real_escape_string(htmlentities($name2)));
			$location = str_replace("'", " ",  mysql_real_escape_string(htmlentities($loc2)));
			
			$query2 = "('{$itime}', '{$ftime}', '{$name}', '{$location}', 'http://www.facebook.com/events/{$a->id}', '{$a->id}', '2')";
			if ($i++) $query1 .= ", ";
			$query1 .= $query2;
			
			$rpfile=dirname(__FILE__)."/../../images/events/{$a->id}.jpg";
			if (!file_exists($rpfile)) {
				$rpicture = file_get_contents("https://graph.facebook.com/{$a->id}/picture?type=large&access_token={$token}");
				file_put_contents($rpfile, $rpicture);
				print_r(dirname(__FILE__)."/../../images/events/{$a->id}.jpg");
			}
		}
		
	}
	$query1 .= ";";
	print($query1)."<br>";;
	$r = query($query1);
	$e = mysql_error();
	print $e."<br>";;
	
}

function blog_post($fecha, $uid, $file, $titulo,  $ptype, $alink)
{
	$query = "INSERT IGNORE INTO ei_blog(datec, iduser, title, filename, ptype, link) VALUES ('{$fecha}', '{$uid}', '{$titulo}', '{$file}', '{$ptype}', '{$alink}');";

	print($query);


	$r = query($query);

	print $r;
	return $r;

}


//articulos en estudiantes
function estudiantes($last, $token)
{

	$qr = "";
	//if ($last) $qr="&since={$last}";
	

	$next = "https://graph.facebook.com/110594545686574/feed?access_token={$token}{$qr}";
	print $next."<br>";;
	
	while(1) {
		if (!$next) break;
		//$next .= "&limit=300";
		print $next."<br>";;
		
		print "<br>";
		$r = @file_get_contents($next);
		if (!$r) break;
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
		print($l)."<br>";;
		
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
				
			//$user = get_userbylogin($from);
			//if (!$user) {
			//	set_userfb($from, $froma->name);
			//	$user = get_userbylogin($from);
			//}
			$user = $from;
			print $user."<br>";;
			if (!$user) continue;
				
			$time = substr(str_replace("T", " ", $time), 0, 19);
			$ffile = str_replace(":", "", str_replace("-", "", str_replace(" ", "", $time))). "_{$id}.php";
			$file = dirname(__FILE__)."/../../blogs/".$ffile;
			
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

			$hmsg2 = str_replace("'", " ",  str_replace("\n","<br>",(htmlentities( utf8_decode($hmsg)))));
			print "h2:".$hmsg2."<br>";

			$query = "INSERT IGNORE INTO ei_blog(datec, iduser, title, data, ptype, link, guid, filename)
			VALUES ('{$time}', '{$user}', '{$titulo}', '{$hmsg2}', '1', '{$alink}', '{$id}', '{$file}');";
			query($query);
			print $query."<br>";;
			print mysql_error()."<br>";;

//			blog_post($time, $user["id"], $ffile, $titulo, '1', $alink);
				

		}
		//if (!isset($k->paging)) break;
		//if ($l < 30) break;
	}
	
	$t = time();
	//$query = "REPLACE INTO uinfo (userid, ukey, uvalue) select id, 'lastfbupdate', '{$t}'  from users where login='100000065026573';";
	//$r = query($query);
	//print ($query);

}



if (isset($_REQUEST["key"])) {

	$key = $_REQUEST["key"];
	query("SELECT 1;");

	if (!isset($_REQUEST["up"])) {
		estudiantes(0, $key);
//		window.location = "?key={$_REQUEST["key"]}&up=my";
	}
	else {
		if ($_REQUEST["up"]=="my") {
			myeventos(0, $key);
		}
		else if ($_REQUEST["up"]=="e") {
			eventos(0, $key);
		}
	}
}

?>
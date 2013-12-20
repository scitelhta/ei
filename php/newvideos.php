<?php


ini_set('display_errors', 'On');
error_reporting(E_ALL);

include_once(dirname(__FILE__)."/phpdb.php");

$d = file_get_contents(dirname(__FILE__)."/../videos.txt");

$c = @split("\n", $d);



$videos = array();
foreach($c as $b) {
	$l = strpos($b, "v=");
	if ($l !== false)  {
		$guid = substr($b, $l + 2, 11);
		$videos[] = $guid;
		continue;
	}
}


$rvideos = array();
if (1) :
foreach($videos as $guid) {
	$a = file_get_contents("http://gdata.youtube.com/feeds/api/videos/{$guid}?v=2&alt=json");
	$b = json_decode($a);
	if (!$b) continue;

	$video = array("guid"=>$guid, "json"=>(addslashes($a)));
	$entry = $b->entry;
	foreach($entry as $k=>$v) {
		if ($k == "title") {
			foreach($v as $titulo) {
				$video["title"] = addslashes($titulo);
				//print $titulo."<br>";
			}
		}
		if ($k == "media\$group") {
			foreach($v as $kk=>$vv) {
				if ($kk == "media\$title") {
					//print $kk.".".json_encode($vv)."<br>";
				}
				if ($kk == "media\$content") {
					foreach($vv[0] as $mk=>$mv) {
						if ($mk == "duration") {
							$video["duration"] = $mv;
							//print $mk.".".$mv."<br>";
						}
					}
					//print $kk.".".json_encode($vv)."<br>";
				}
				if ($kk == "yt\$duration") {
					$video["duration"] = $vv->seconds;
					//print $kk.".".json_encode($vv)."<br>";
				}
				if ($kk == "yt\$aspectRatio") {
					foreach($vv as $mk=>$mv) {
						$video["aspect"] = $mv;
					}
				}
				if ($kk == "media\$description") {
					foreach($vv as $descripcion) {
						$video["description"] = addslashes($descripcion);
						//print "description".".".$descripcion."<br>";
						break;
					}
				}

				//print $kk."<br>";
			}
		}
		//print $k."<br>";

	}
	$rvideos[] = $video;

	//print json_encode($video)."<br>";
	//break;
}
endif;

$query = "INSERT IGNORE INTO ei_media(type, guid, idalbum, title, description, image, seconds) VALUES";
$aq = array();
foreach($rvideos as $video) {
	$aq[] = "('1', '{$video["guid"]}', 1,  '{$video["title"]}',
	'{$video["description"]}', 'http://i1.ytimg.com/vi/{$video["guid"]}/mqdefault.jpg', {$video["duration"]}' )";
}
$query .= join(",", $aq);
print $query;
//print_r($query);
$p = query($query);




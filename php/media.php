<?php
function do_get_data()
{
    global $dodo;
    $q = "";
    if ($dodo) {
        $q = " AND idmedia='{$dodo}''";
    }

	define("DS","/",true);

	$imgb = $_SERVER["HTTP_HOST"].dirname($_SERVER["REQUEST_URI"])."/images/media/";

	query("SET NAMES 'utf8' COLLATE 'utf8_general_ci';");

	$query = "SELECT a.idalbum, a.name aname, a.author aauthor,
				m.description, m.title, m.idmedia, m.image, m.url
        FROM ei_media m, ei_album a
        WHERE a.status=1
        and m.status=1
        and a.idalbum=m.idalbum
        {$q}
        ORDER BY a.idalbum,m.dateu
        ;";

	$r = query($query);

	$a = array();
	$i = 0;
	foreach($r as $row) {
		if (($i < count($a)) && ($a[$i]["id"]!=$row["idalbum"])) $i++;
		if ($i >= count($a)) {
			$a[] = array("id"=>$row["idalbum"],
				"name"=>utf8_encode($row["aname"]), "author"=>utf8_encode($row["aauthor"]), "media"=>array());
		}
		$image =utf8_encode($row["image"]);
		if (strpos($image, "//")===false) {
			$image = $imgb.str_replace("//", "/", m.image);
		}
		$a[$i]["media"][] = array("id"=>$row["idmedia"], "image"=>$image,
				"title"=>utf8_encode($row["title"]), "description"=>utf8_encode($row["description"]),
				"url"=>utf8_encode($row["url"]));

	}


    return $a;
}


?>
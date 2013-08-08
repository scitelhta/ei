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
				m.description, m.title, m.idmedia, m.image, m.type, m.guid
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
	if ($r) {
		foreach($r as $row) {
			if (($i < count($a)) && ($a[$i]["id"]!=$row["idalbum"])) $i++;
			if ($i >= count($a)) {
				$a[] = array("id"=>$row["idalbum"],
					"name"=>($row["aname"]), "author"=>($row["aauthor"]), "media"=>array());
			}
			$image =($row["image"]);
			if (strpos($image, "//")===false) {
				$image = $imgb.str_replace("//", "/", m.image);
			}
			if ($row["type"] == 'youtube') {
				$row["url"] = "http://www.youtube.com/watch?v=".$row["guid"];
			}
			$a[$i]["media"][] = array("id"=>$row["idmedia"], "image"=>$image,
					"title"=>($row["title"]), "description"=>($row["description"]),
					"url"=>($row["url"]), "type"=>$row["type"], "guid"=>$row["guid"]);

		}
	}

    return $a;
}


?>
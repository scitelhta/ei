<?php

function do_get_data()
{
	query("SET NAMES 'utf8'");

	$query = "SELECT c.name country, d.place, d.name, d.phones, d.url, d.image
	        FROM ei_country c, ei_distribute d
	        WHERE c.idcountry=d.idcountry
	        ORDER BY c.idcountry,d.iddistribute;";
	$r = query($query);
	$a = array();
	if ($r) {
		foreach($r as $row) {
			if (!isset($a[$row["country"]])) {
				$a[$row["country"]] = array();
			}
			$a[$row["country"]][] = array("place" => ($row["place"]),
				"name"=>($row["name"]),
					"url"=>$row["url"], "phone"=>$row["phones"], "image"=>$row["image"]);

		}
	}
	//print json_encode($a);
	//exit;
	return $a;
}


?>
<?php

function minigal()
{
	$imgb = "//".str_replace("//","/",$_SERVER["HTTP_HOST"].str_replace('\\', '/', dirname($_SERVER["REQUEST_URI"]))."/images/gallery/");

	$query = "SELECT idphoto, thumb, title FROM ei_photo order by rand() limit 6;";
	$r = query($query);

	$a = array();
	if ($r) {
		foreach($r as $row) {
			$image = $row["thumb"];
			if (strpos($image, "//")=== false) {
				$image = $imgb.$image;
			}
			$a[] = array("image"=>$image, "id"=>$row["idphoto"], "title"=>$row["title"]);
		}
	}
	return $a;

}


?>
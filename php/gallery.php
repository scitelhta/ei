<?php
function do_get_data()
{
    global $dodo;

	$imgb = $_SERVER["REQUEST_SCHEME"]."://".str_replace("//","/",$_SERVER["HTTP_HOST"].str_replace('\\', '/', dirname($_SERVER["REQUEST_URI"]))."/images/gallery/");


    $q = "SELECT g.idgallery gid, g.title galeria, p.image imagen,
            p.thumb, p.title titulo, p.idphoto id
          FROM ei_gallery g, ei_photo p
          WHERE g.idgallery=p.idgallery
          AND p.status=1
          AND g.status=1
          ORDER by g.idgallery, p.idphoto;";

	//print $q;
    $r = query($q);
	//print_r($r);

    $a = array();
	$b = array();
    $foto = array();
	if ($r) {
	    foreach($r as $row) {
	        if (!isset($a[$row["galeria"]])) {
	            $a[$row["galeria"]] = array();
	        }
	        $imagen = $row["imagen"];
	        if (strpos($imagen, "//") === false) {
	            $imagen = $imgb.$imagen;
	        }
	        $thumb = $row["thumb"];
	        if (strpos($thumb, "//") === false) {
	            $thumb = $imgb.$thumb;
	        }
	        $a[$row["galeria"]][] = array("imagen"=>$imagen,
	            "thumb"=>$thumb, "titulo"=>$row["titulo"], "id"=>$row["id"]);

            if ($dodo && ($row["id"] == $dodo)) {
                $foto["id"] = $row["id"];
                $foto["thumb"] = $thumb;
                $foto["imagen"] = $imagen;
                $foto["galeria"] = $row["galeria"];
                $foto["titulo"] = $row["titulo"];
            }
	    }
	}

	foreach($a as $g=>$aa) {
		$b[] = array("g"=>(htmlentities($g)), "photos"=>$aa);
	}
    $c = array();
    $c["gal"] = $b;
    $c["foto"] = $foto;

    return $c;
}



<?php
function do_get_data()
{
	$imgb = "//".$_SERVER["HTTP_HOST"].str_replace('\\', '/', dirname($_SERVER["REQUEST_URI"]))."/images/gallery/";


    $q = "SELECT g.idgallery gid, g.title galeria, p.image imagen,
            p.thumb, p.title titulo
          FROM ei_gallery g, ei_photo p
          WHERE g.idgallery=p.idgallery
          AND p.status=1
          AND g.status=1
          ORDER by g.idgallery, p.idphoto;";

    $r = query($q);

    $a = array();
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
            "thumb"=>$thumb, "titulo"=>$row["titulo"]);
    }
    return $a;
}


?>
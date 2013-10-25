<?php



function og_get($data)
{
    $aa = array();

    $description = "";
    $image = "images/ei256.png";
    $titulo = "Estudiantes del Instante";
    $t2 = "";
//    $file = "";
    $file = $data["bodyhtml"];
    $ya = 0;



    if ($data["do"] == "porquerielabrisa") {
        $ya=1;
        $image = "images/portada03.jpg";
    }
    if ($data["do"] == "events") {
        $ya=2;
        $t2 = "Eventos";
        if ($data["events"]["mio"]) {
            $e = $data["events"]["mio"][0];
            $image = $e["imagen"];
            //$description = $e["nombre"];
            //$file = "";
        }
    }
    if ($data["do"] == "gallery") {
        $ya = 3;
        $t2 = "Fotos";
        if ($data["gallery"]["foto"]) {
            $foto = $data["gallery"]["foto"];
            $t2 = $foto["galeria"];
            if ($foto["titulo"]) {
                $t2 .= " - ".$foto["titulo"];
            }
            $image = $foto["thumb"];
        }
        $file = "";
    }

    if ($data["do"] == "media") {
        $ya = 4;
        $t2 = "Media";
        if ($data["media"]["video"]) {
            $video = $data["media"]["video"];
            $t2 = $video["title"];
            if ($video["description"]) {
                $description = $video["description"];
            }
            $image = $video["image"];
        }
        $file = "";
    }
    if ($data["do"] == "blog") {
        $ya = 5;
        if ($data["dodo"]) {
            $t2 = $data["blog"][0]["title"];
            $description = $data["blog"][0]["data"];
        }
        else {
            $t2 = "Pensamientos y reflexiones";
        }
        $file = "";
    }

    if ((!$ya) && ($data["ei"]["go"])) {
        $ya = -1;
        $t2 = "<h2>";
        $file = $data["ei"]["gohtml"];
        $image = "images/".$data["ei"]["go"]."_100.png";
    }


    $url = "http://{$_SERVER["SERVER_NAME"]}{$_SERVER["REQUEST_URI"]}";
    if (strpos($image, "//")===false) {
        $a = $_SERVER["REQUEST_URI"];
        $a = str_replace("\\", "/", dirname($a) );
        $jimage = "http://{$_SERVER["SERVER_NAME"]}{$a}{$image}";
    }
    else {
        $jimage = $image;
    }

    if ($file && (!$description)) {
        $d = file_get_contents(dirname(__FILE__)."/../html/".$file);
        if (strpos($t2, "<")!==false) {
            $l = strpos($d, $t2);
            if ($l !== FALSE) {
                $td = substr($d, $l+strlen($t2));
                $l = strpos($td, "</".substr($t2, 1));
                if ($l !== FALSE) {
                    $t2 = substr($td, 0, $l);
                }
            }

        }

        $l = strpos($d, "<p>");
        if ($l !== FALSE) {
            $d = substr($d, $l+3);
            $l = strpos($d, "</p>");
            if ($l !== FALSE) {
                $d = substr($d, 0, $l);
            }
        }


        $r = strip_tags(html_entity_decode($d));
        $r = str_replace("\n", " ", $r);
        $description = substr($r, 0, 256);
    }
    if ($t2) $titulo = "{$titulo} - {$t2}";


    if (!$description) $description = $titulo;
    else $description = htmlentities($description, ENT_QUOTES);



    $aa["description"] = $description;
    $aa["url"] = $url;
    $aa["image"] = $jimage;
    $aa["title"] = $titulo;

    return $aa;
}


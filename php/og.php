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



    if ($data["do"] == "porquerielabrisa") {
        $image = "images/portada03.jpg";
    }
    if ($data["do"] == "events") {
        $t2 = "Eventos";
        if ($data["events"]["mio"]) {
            $e = $data["events"]["mio"][0];
            $image = $e["imagen"];
            //$description = $e["nombre"];
            //$file = "";
        }
    }

    if ($t2) $titulo = "{$titulo} - {$t2}";
    if (strpos($image, "//")===false) {
        $a = $_SERVER["REQUEST_URI"];
        $a = str_replace("\\", "/", dirname($a) );
        $url = "http://{$_SERVER["SERVER_NAME"]}{$_SERVER["REQUEST_URI"]}";
        $jimage = "http://{$_SERVER["SERVER_NAME"]}{$a}{$image}";
    }
    else {
        $jimage = $image;
    }

    if ($file && (!$description)) {
        $d = file_get_contents(dirname(__FILE__)."/../html/".$file);
        $l = strpos($d, "<p>");
        if ($l !== FALSE) {
            $d = substr($d, $l);
            $l = strpos($d, "</p>");
            if ($l !== FALSE) {
                $d = substr($d, 0, $l);
            }
        }
        $r = strip_tags(html_entity_decode($d));
        $r = str_replace("\n", " ", $r);
        $description = substr($r, 0, 256);
    }


    if (!$description) $description = $titulo;
    else $description = htmlentities($description, ENT_QUOTES);



    $aa["description"] = $description;
    $aa["url"] = $url;
    $aa["image"] = $jimage;
    $aa["title"] = $titulo;

    return $aa;
}


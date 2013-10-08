<?php

function nombrepp($e)
{
    $a = explode(".", $e);
    $a = explode("_", $a[0]);
    return $a[count($a)-1];
}

function about_files()
{
    $files = array();
    $dname = dirname(__FILE__).'/../html/ei';
    $handle = opendir($dname);
    while (false !== ($entry = readdir($handle))) {
        $files[] = $entry;
    }
    closedir($handle);
    return $files;
}

function do_get_about($files) {
//    $files = about_files();
    global $do;
    $gdo = strtolower($do);
    if (!$gdo) $gdo = "about";




    sort($files);
    $ll = 200;
    $doabout = "404.html";
    foreach($files as $file) {
        $afile = strtolower(nombrepp($file));
        $l = strpos($afile, $gdo);
        if (($l !== false) && ($l < $ll)) {
            $ll = $l;
            $doabout = "ei/".$file;
        }
    }
    return $doabout;
}


function do_get_ei() {

    global $do;
    $eis = array();//"dd10_mvision.html"=>array("about"));
    $types = "fap";



    $a = array("types"=>array());
    $f = array();
    $opened = 0;
    $files = about_files();
    sort($files);


    $doabout = do_get_about($files);
    foreach($files as $file) {
        $d = array();
        if ($file[0] != '.') {
//            $d["data"] = file_get_contents($dname."/".$entry);
            $d["open"] = 0;
            $d["html"] = "ei/".$file;
            $d["type"] = $file[0];
            $d["icon"] = nombrepp($file);
            $a["types"][] = $d["type"];


            if ((!$opened) && ($d["html"] == $doabout)) {
                $d["open"] = 1;
                $a["go"] = $d["icon"];
                $opened = 1;
            }

            $f[] = $d;
        }
    }
    if (!$opened) {
        $f[0]["open"] = 1;
    }
    $a["files"] = $f;
    return $a;
}



?>
<?php



$alias = array("yage"=>"ayahuasca", "abrazosgratis"=>"abrazos", "meregalasunabrazo"=>"abrazos",
    "regalameunabrazo"=>"abrazos", "meditar"=>"meditacion",
"circulos"=>"instrumentos", "sanacionespiritual"=>"terapias", "bioconstruccion"=>"permacultura",
    "mision"=>"mvision", "fundacion"=>"about");

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
    global $do, $alias;
    $gdo = strtolower($do);
    if (!$gdo) $gdo = "about";


    $ll = 200;
    $name = "";
    foreach($alias as $alia => $aname) {
        $l = strpos($alia, $gdo);
        if ($l === false) continue;
        $l = strlen($alia)-strlen($gdo);
        if ($l < $ll) {
            $ll = $l;
            $name = $aname;
        }
    }
    if ($name) $gdo = $name;
    $ll = 200;

   // print $name.".".$gdo."<br>";

    sort($files);
    $doabout = "404.html";
    foreach($files as $file) {
        $afile = strtolower(nombrepp($file));
        $l = strpos($afile, $gdo);
        if ($l === false) continue;
        $l = strlen($afile)-strlen($gdo);
        if ($l < $ll) {
            $ll = $l;
            $doabout = "ei/".$file;
        }
    }
   // print $doabout."<br>";
   // print_r($files);
   // exit(0);
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
                $a["gohtml"] = $d["html"];
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




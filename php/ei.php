<?php


function do_get_ei() {

    global $do;
    $eis = array();//"dd10_mvision.html"=>array("about"));
    $types = "fap";

    $a = array("types"=>array());
    $f = array();
    $dname = dirname(__FILE__).'/../html/ei';
    $handle = opendir($dname);
    $opened = 0;
    $files = array();
    while (false !== ($entry = readdir($handle))) {
        $files[] = $entry;
    }
    sort($files);
    foreach($files as $entry) {
        $d = array();
        if ($entry[0] != '.') {
//            $d["data"] = file_get_contents($dname."/".$entry);
            $d["open"] = 0;
            $d["html"] = "ei/".$entry;
            $d["type"] = $entry[0];
            $a["types"][] = $d["type"];

            if ((!opened) && (strstr($entry, $do) !== false)) {
                $d["open"] = 1;
                $opened = 1;
            }

            $f[] = $d;
        }
    }
    if (!$opened) {
        $f[0]["open"] = 1;
    }
    closedir($handle);
    $a["files"] = $f;
    return $a;
}



?>
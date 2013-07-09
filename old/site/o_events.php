<?php

$do = "";
if (isset($_REQUEST["do"]))
	$do = $_REQUEST["do"];
	
require_once(dirname(__FILE__)."/../php/phpapi.php");	

if ($do == "eedays")
{
	$y = $_REQUEST["year"];
	$m = $_REQUEST["month"];
	$d = $_REQUEST["day"];
	$o = $_REQUEST["offset"];
	
	$_SESSION["eeyear"] = $y;
	$_SESSION["eemonth"] = $m;
	$_SESSION["eeday"] = $d;
	$_SESSION["eeoffset"] = $o;
	
	$a = array();
	$es = array();
	
	$aa = get_events_by_month($y, $m + 1, $o);
	if (!$aa) {
		$a["error"] = "";
		$a["days"] = array();
		print json_encode($a);			
		exit();
	}

	//print_r($aa);
	$i = 0;
	for($j = $aa[$i]["day"]; $j < 30; $j++) {
		$e = array();
		while(1) {
			if (!isset($aa[$i])) break;
			if ($aa[$i]["day"] > $j) break;

			array_push($e, $aa[$i]);
			$i++;
		}
		if (count($e)) $es[$j] = $e;
		if (!isset($aa[$i])) break;
	}
	

	$e = array();
	
	

	$a["error"] = "";
	$a["days"] = $es;

	print json_encode($a);	
	

	exit();
}	
	

if ($do == "eemonths")
{
	$y = $_REQUEST["year"];
	$m = $_REQUEST["month"];
	$d = $_REQUEST["day"];
	$o = $_REQUEST["offset"];
	
	$ea = get_events_months($o);
	$a = array();
	
	$ys = array();
	for($i = 0; $i < count($ea); $i++) {
		if (!isset($ys[$ea[$i]["year"]]))
			$ys[$ea[$i]["year"]] = array();
		array_push($ys[$ea[$i]["year"]], $ea[$i]["month"]);
	}
	

	$a["error"] = "";
	$a["years"] = $ys;

	print json_encode($a);	
	

	exit();
}		



if ($do == "eventn")
{
	$a = array();
	$a["error"] = "";
	
	$e = array();
	
	$e["name"] = $_REQUEST["name"];
	$e["itime"] = $_REQUEST["itime"];
	$e["ftime"] = $_REQUEST["ftime"];
	//$e["etime"] = $_REQUEST["etime"];
	$e["person"] = $_REQUEST["person"];
	$e["place"] = $_REQUEST["place"];
	$e["city"] = $_REQUEST["city"];
	$e["url"] = $_REQUEST["url"];
	
	$e["ulogin"] = getuserid();
	
	
	$o = $_REQUEST["offset"];
	
	if (!$e["ftime"]) $e["ftime"]= $e["itime"];
	
	set_event($e, $o);
	
	
	
	print json_encode($a);
	exit();
}


if ($do == "eenext")
{
	$y = $_REQUEST["year"];
	$m = $_REQUEST["month"];
	$d = $_REQUEST["day"];
	$o = $_REQUEST["offset"];
	
	
	$a = array();
	
	$aa = get_events_next($y, $m + 1, $d, $o, 0);
	if (!$aa) {
		$a["error"] = "error";
		$a["events"] = array();
		print json_encode($a);			
		exit();
	}


	

	$a["error"] = "";
	$a["events"] = $aa;

	print json_encode($a);	
	

	exit();
}	


?>


<style type="text/css">
#eeeevents {
	width: 500px;

}

</style>

<?php
//<div id="eeeevents">
global $adir;
$adir="cals";
global $mobile;

if ($mobile) {


	$aa = get_events_next(date("Y"), date("m"), date("d"), 0, 0);
	if ($aa) {
		print "<table>";
		foreach($aa as $e) {
			$url = str_replace("www.facebook", "m.facebook", $e["url"]);
			print "<tr>".
			"<td>{$e["itime"]}</td>".
			"<td>{$e["ftime"]}</td>".
			"<td>{$e["name"]}</td>".
			"<td>{$e["person"]}</td>".
			"<td>{$e["place"]}</td>".
			"<td>{$e["city"]}</td>".
			"<td><a   target='_blank' href='{$url}'><img src='./images/link.png' style='width:35px;height:15px'></a></td>".
		"</tr>";
		
		}
	
		print "</table>";
	}
	
}
else {
require_once(dirname(__FILE__)."/../site/ref.php");
}
//require_once(dirname(__FILE__)."/../wids/calendar.php");		
//</div>	
?>	


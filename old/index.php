<?php
global $do, $dodo;
global $art;
global $params;

error_reporting(0);

$do = "";
if (isset($_REQUEST["do"]))
	$do = $_REQUEST["do"];
if (!$do) $do = "about";
	
$dom = ereg_replace("[^A-Za-z0-9_]", "", $do );	
	
$a = split("_", $do);
$dodo = $a[0];
if (!$dodo) $dodo = "about";

$art = "";
$params = array_slice($a, 1);
if (isset($params[0])) $art = $params[0];

	
session_start();

//
require_once(dirname(__FILE__)."/php/phpapi.php");

require_once(dirname(__FILE__)."/php/auth/auth.php");
auth_auth();
//header("location:https://graph.facebook.com/110594545686574/feed?access_token=".$_SESSION["auth_facebook_token"]);

//header("location:https://graph.facebook.com/me/friends?access_token=".$_SESSION["auth_facebook_token"]);
//header("location:https://graph.facebook.com/110594545686574/feed?access_token=".$_SESSION["auth_facebook_token"]);


if (($do == "eedays") || ($do == "eemonths") || ($do == "eventn") || ($do == "eenext")) {
	require_once(dirname(__FILE__)."/site/events.php");
	exit();
}

global $mobile;

$mobile = 0;
$layout = "";

foreach ($params as $a) {
	if ($a && ($a == 'm1') && (substr($a, 1))) $layout="mobile";
}

if (isset($_REQUEST["m"])) {
	if ($_REQUEST["m"]) $layout="mobile";
	else $layout = "desktop";
}	

if (!$layout) {

	require_once './lib/Mobile_Detect.php';
	$detect = new Mobile_Detect();
	$layout = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'mobile') : 'desktop');
}

if ($layout == 'mobile') {

	$mobile = 1;

	//require_once(dirname(__FILE__)."/mobile.php");
	require_once(dirname(__FILE__)."/template.php");
}
else {
	require_once(dirname(__FILE__)."/template.php");
}





?>



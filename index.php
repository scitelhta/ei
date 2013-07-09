<?php

require_once (dirname(__FILE__).'/php/phpdb.php');

session_start();


require_once ('./lib/Twig/Autoloader.php');
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(dirname(__FILE__)."/html");
$twig = new Twig_Environment($loader);


require_once(dirname(__FILE__).'/lib/Mobile_Detect.php');
$detect = new Mobile_Detect();
$layout = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'mobile') : 'desktop');
$mobile = ($detect->isMobile());

global $do, $dodo;
$do = "about";
$dodo = "";
if (isset($_REQUEST["do"])) {
	$a = preg_split("/_/", $_REQUEST["do"]);
	$do = $a[0];
	if (count($a)>1)
		$dodo = $a[1];
}




$data = array('title' => 'Estudiantes del Instante');
$data["rss"] = "/rss";
$data["mobile"] = $mobile;
$data["layout"] = $layout;
$data["do"] = $do;
$data["bodyhtml"] = "do/{$do}.html";

if (@include(dirname(__FILE__)."/php/{$do}.php")) {
	$data[$do] = do_get_data();	
}



if ($do == 'xblog') {
	if (@include(dirname(__FILE__)."/php/blog.php")) {
		$data["blog"] = do_get_data();	
	}
	echo $twig->render('do/xblog.html', $data);
	exit;
}


//print json_encode($data);
echo $twig->render('main.html', $data);


?>


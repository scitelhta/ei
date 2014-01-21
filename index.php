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
$data["dodo"] = $dodo;
$data["bodyhtml"] = "do/{$do}.html";
$data["lefthtml"] = "left.html";
$data["righthtml"] = "right.html";
$data["errorhtml"] = "404.html";


$data["paginas"] = array(
	array("name"=>"home", "title"=>"Inicio", "title2"=>"Estudiantes del Instante"),
    array("name"=>"about", "title"=>"Fundación", "title2"=>"Fundación"),
	array("name"=>"events", "title"=>"Eventos", "title2"=>"Próximos Eventos"),
	array("name"=>"media", "title"=>"Música", "title2"=>"Música y Videos"),
	array("name"=>"gallery", "title"=>"Galería", "title2"=>"Galería de Imágenes"),
	array("name"=>"blog", "title"=>"Pensamientos", "title2"=>"Pensamientos y Reflexiones"),
	array("name"=>"porquerielabrisa", "title"=>"Libro", "title2"=>"Por qué ríe la brisa")
	);

if (@include(dirname(__FILE__)."/php/ei.php")) {
    $data["ei"] = do_get_ei();
    if ($data["ei"]["go"]) {
        $data["errorhtml"] = "do/about.html";
    }
}

if (@include(dirname(__FILE__)."/php/{$do}.php")) {
	$data[$do] = do_get_data();	
}
if (@include(dirname(__FILE__)."/php/minigal.php")) {
	$data["minigal"] = minigal();
}
if (@include(dirname(__FILE__)."/php/miniblog.php")) {
	$data["miniblog"] = miniblog();
}

if ($do == 'xblog') {
	if (@include(dirname(__FILE__)."/php/blog.php")) {
		$data["blog"] = do_get_data();	
	}
    echo $twig->render('do/xblog.html', $data);
	exit;
}

if (@include(dirname(__FILE__)."/php/og.php")) {
    $data["og"] = og_get($data);
}


header('Content-type: text/html; charset=UTF-8');

//print json_encode($data);
//exit;
if ($do == "pruebas") {
    echo $twig->render('prueba.html', $data);
    exit;
}
echo $twig->render('main.html', $data);




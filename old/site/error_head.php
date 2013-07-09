<?php
global $do, $dodo, $art;

$description = "";
$image = "images/ei256.png";
$titulo = "Estudiantes del Instante";
$t2 = "";


if ($do == "about") $t2 = "Fundaci&oacute;n &quot;Estudiantes del Instante&quot;";
if ($do == "ayahuasca") {
	$t2 = "Ayahuasca";
	$image = "images/ayahuasca.png";

	$d = file_get_contents(dirname(__FILE__)."/../site/ayahuasca.php");
	$r = strip_tags(html_entity_decode($d));
	$r = str_replace("\n", " ", $r);
	$r = substr($r, 0, 256);
	
	$desc = $r;
}
if ($do == "meditacion") {
	$t2 = "Meditaci&oacute;n";
	$image = "images/meditacion.png";
	
	$d = file_get_contents(dirname(__FILE__)."/../site/meditacion.php");
	$r = strip_tags(html_entity_decode($d));
	$r = str_replace("\n", " ", $r);
	$r = substr($r, 0, 256);
	
	$desciption = $r;
}
if ($do == "events_eproximos") {
	$t2 = "P&oacute;ximos Eventos";
	$image = "images/eproximos.png";
}

if ($do == "events_emensual") {
	$t2 = "Calendario Mensual";
	$image = "images/emensual.png";
}

if ($dodo == "library") {
	$t2 = "Por qué ríe la brisa";
	$image = "images/portada03.jpg";
	$description = "En este libro intento comunicar la tonada que me inspira. En estas líneas intento transcribir los colores que olfateo cuando cierro los ojos y escucho. ";
}

if ($dodo == "ecuador") {
	$titulo = "Ayahuasca en Ecuador";
	$image = "images/ecuador_120.jpg";
	$description = '"Estudiantes del Instante" viene a Ecuador para ofrecer terapias holísticas, meditaciones y actividades de aprendizaje y auto-estudio.';
}

if ($t2) $titulo = "{$titulo} - {$t2}";

$a = $_SERVER["REQUEST_URI"];
$a = str_replace("\\", "/", dirname($a) );


$url = "http://{$_SERVER["SERVER_NAME"]}{$_SERVER["REQUEST_URI"]}";
$jimage = "http://{$_SERVER["SERVER_NAME"]}{$a}{$image}";

//$titulo = htmlentities($titulo, ENT_QUOTES);


if (!$description) $description = $titulo;
else $description = htmlentities($description, ENT_QUOTES);

?>
<!-- BEGIN TUMBLR FACEBOOK OPENGRAPH TAGS -->
<!-- If you'd like to specify your own Open Graph tags, define the og:url and og:title tags in your theme's HTML. -->
<!-- Read more: http://ogp.me/ -->
<meta name="description" content="<?php print $description; ?>" />
<meta property="fb:app_id" content="421720104513992" />
<meta property="og:title" content="<?php print $titulo; ?>" />
<meta property="og:url" content="<?php print $url; ?>" />
<meta property="og:description" content="<?php print $description; ?>"/>
<meta property="og:type" content="website" />
<meta property="og:image" content="<?php print $jimage; ?>" />

<!-- END TUMBLR FACEBOOK OPENGRAPH TAGS -->


<!-- TWITTER TAGS -->
<meta charset="utf-8">
<meta name="twitter:card" content="summary" />
<meta name="twitter:image" content="<?php print $jimage; ?>" />
<meta name="twitter:url" content="<?php print $url; ?>" />
<meta name="twitter:creator" content="<?php print $titulo; ?>" />


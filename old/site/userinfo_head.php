<?php

$image = "images/ei256.png";
$titulo = "Estudiantes del Instante";

require_once(dirname(__FILE__)."/../php/auth/auth.php");
require_once(dirname(__FILE__)."/../php/phpapi.php");



global $user;



if (!isset($user)) $user = get_userbylogin(getuserid());

if (isset($user["picture"]))
		$image = $user["picture"];
if (isset($user["name"]))
		$titulo = $user["name"];

$a = $_SERVER["REQUEST_URI"];
$a = str_replace("\\", "/", dirname($a) );


$url = "http://{$_SERVER["SERVER_NAME"]}{$_SERVER["REQUEST_URI"]}";

$jimage = $image;
//$jimage = "http://{$_SERVER["SERVER_NAME"]}{$a}{$image}";

//$titulo = htmlentities($titulo, ENT_QUOTES);
$description = htmlentities($description, ENT_QUOTES);

?>
<!-- BEGIN TUMBLR FACEBOOK OPENGRAPH TAGS -->
<!-- If you'd like to specify your own Open Graph tags, define the og:url and og:title tags in your theme's HTML. -->
<!-- Read more: http://ogp.me/ -->
<meta name="description" content="<?php print $titulo; ?>" />
<meta property="fb:app_id" content="421720104513992" />
<meta property="og:title" content="<?php print $titulo; ?>" />
<meta property="og:url" content="<?php print $url; ?>" />
<meta property="og:description" content="<?php print $titulo; ?>"/>
<meta property="og:type" content="website" />
<meta property="og:image" content="<?php print $jimage; ?>" />

<!-- END TUMBLR FACEBOOK OPENGRAPH TAGS -->


<!-- TWITTER TAGS -->
<meta charset="utf-8">
<meta name="twitter:card" content="summary" />
<meta name="twitter:image" content="<?php print $jimage; ?>" />
<meta name="twitter:url" content="<?php print $url; ?>" />
<meta name="twitter:creator" content="<?php print $titulo; ?>" />


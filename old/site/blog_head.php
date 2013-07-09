<?php
global $link;
global $description;
global $title;
global $image;
$titulo = "Estudiantes del Instante";
$url = "http://{$_SERVER["SERVER_NAME"]}{$_SERVER["REQUEST_URI"]}";

require_once(dirname(__FILE__)."/../php/blogfun.php");
head_blog();

if (!isset($title)) $title = $titulo;
if (!isset($link)) $link = $url;
if (!isset($description)) $description=$title;
if (!isset($image)) $image = "./images/ei256.png";

//$title = htmlentities($title, ENT_QUOTES);
$description = htmlentities($description, ENT_QUOTES);



?>
<!-- BEGIN TUMBLR FACEBOOK OPENGRAPH TAGS -->
<!-- If you'd like to specify your own Open Graph tags, define the og:url and og:title tags in your theme's HTML. -->
<!-- Read more: http://ogp.me/ -->
<meta name="description" content="<?php print $description; ?>" />
<meta property="fb:app_id" content="421720104513992" />
<meta property="og:title" content="<?php print $title; ?>" />
<meta property="og:url" content="<?php print $link; ?>" />
<meta property="og:description" content="<?php print $description; ?>"/>
<meta property="og:type" content="webpage" />
<meta property="og:image" content="<?php print $image; ?>" />

<!-- END TUMBLR FACEBOOK OPENGRAPH TAGS -->


<!-- TWITTER TAGS -->
<meta charset="utf-8">
<meta name="twitter:card" content="webpage" />
<meta name="twitter:image" content="<?php print $image; ?>"/>
<meta name="twitter:url" content="<?php print $link; ?>" />
<meta name="twitter:creator" content="<?php print $title; ?>" />


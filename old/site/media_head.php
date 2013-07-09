<?php
global $do, $dodo, $art;
//http://profile.ak.fbcdn.net/hprofile-ak-ash4/592280_364963453583685_1862341701_n.jpg
$image = "images/notes.png";
$titulo = "Estudiantes del Instante";
$t2 = "";
$desc = "";

$a = $_SERVER["REQUEST_URI"];
$a = str_replace("\\", "/", dirname($a) );


$e = get_mp3files('1', $art);
if (!$e) {
	$t2 = "No media";
}
else {
	$titulo = "{$e[0]["uowner"]} - {$e[0]["utitle"]}";
	$desc= $titulo;
	$image2 = "images/{$e[0]["eid"]}.jpg";
	if (file_exists($image2)) $image = $image2;
	
	$fname = $e[0]["filename"];
	if (strpos($fname, "://")===FALSE) {
		if ($fname[0] == '/') $fname = "http://{$_SERVER["SERVER_NAME"]}{$fname}";
		else $fname = "http://{$_SERVER["SERVER_NAME"]}{$a}{$fname}";
	}
	$fname=str_replace("_d_", "_r_", $fname);
	

}


$url = "http://{$_SERVER["SERVER_NAME"]}{$_SERVER["REQUEST_URI"]}";
$jimage = "http://{$_SERVER["SERVER_NAME"]}{$a}{$image}";


//$titulo = htmlentities($titulo, ENT_QUOTES);
$desc = htmlentities($desc, ENT_QUOTES);
?>
<!-- BEGIN TUMBLR FACEBOOK OPENGRAPH TAGS -->
<!-- If you'd like to specify your own Open Graph tags, define the og:url and og:title tags in your theme's HTML. -->
<!-- Read more: http://ogp.me/ -->
<meta name="description" content="<?php print $titulo; ?>" />
<meta property="fb:app_id" content="421720104513992" />
<meta property="og:title" content="<?php print $titulo; ?>" />
<meta property="og:url" content="<?php print $url; ?>" />
<meta property="og:description" content="<?php print $desc; ?>"/>
<meta property="og:type" content="video" />
<meta property="og:image" content="<?php print $jimage; ?>" />
<meta property="og:audio:type" content="audio/mpeg" />
<meta property="og:audio:url" content="<?php print $fname; ?>" />
<meta property='og:video' content="http://player.longtailvideo.com/player.swf?file=<?php print $fname; ?>&autostart=0&allowfullscreen=true&controlbar=bottom&height=24;" />
<meta property="og:video:height" content="24" />
<meta property="og:video:width" content="450" />
<meta property="og:video:type" content="application/x-shockwave-flash" />

<!-- END TUMBLR FACEBOOK OPENGRAPH TAGS -->


<!-- TWITTER TAGS -->
<meta charset="utf-8">
<meta name="twitter:card" content="player" />
<meta name="twitter:player:height" content="24" />
<meta name="twitter:player:width" content="450" />
<meta name="twitter:image" content="<?php print $jimage; ?>" />
<meta name="twitter:url" content="<?php print $url; ?>" />
<meta name='twitter:player' content="http://player.longtailvideo.com/player.swf?file=<?php print $fname; ?>&autostart=0&allowfullscreen=true&controlbar=bottom&height=24;" />
<meta name="twitter:creator" content="<?php print $titulo; ?>" />


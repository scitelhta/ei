
<style type="text/css">

.thumbsarea img
{
   vertical-align: middle;
   border: solid 5px #d6c9b8;
   margin: 5px;
}

.thumbsarea img:hover
{
	cursor:pointer;
   border: solid 5px #f9ead6;
}

</style>

<div id="refart2" class="thumbsarea">

<?php



$r = get_pictures(1);
foreach($r as $p)
{
	$f = $p["filename"];
	$l = strrpos($f, "/");
	$th = substr($f, 0, $l)."/.thumbs/".substr($f, $l + 1);
	print "<a href=\"./{$f}\" title=\"{$p["utitle"]}\" rel=\"lightbox[roadtrip]\"><img src=\"{$th}\" /></a>";
}


//11.30 los obrajes n33-13 y quiteño libre juan carlos andrade 085530973




?>


</div>




<?php $link = "http://{$_SERVER["SERVER_NAME"]}".str_replace("\\", "/", dirname($_SERVER["REQUEST_URI"]))."gallery"; 
$title = "Fotos";

require(dirname(__FILE__)."/../php/social.php");

?>

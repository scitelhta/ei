
<style type="text/css">

.imgthb
{
	float:left;
   _vertical-align: middle;
   _border: solid 5px #d6c9b8;
   border: solid 1px #ffffff;
   margin: 1px;
   width:74px;
   height:74px;
}

.imgthb:hover
{
	cursor:pointer;
   border: solid 1px #0000d6;
}

</style>

<?php

$r = get_pictures(1);
foreach($r as $p)
{
	$f = $p["filename"];
	$l = strrpos($f, "/");
	$th = substr($f, 0, $l)."/.thumbs/".substr($f, $l + 1);
	print "<a href=\"./{$f}\" title=\"{$p["utitle"]}\" rel=\"lightbox[roadtrip]\"><img src=\"{$th}\" class=\"imgthb\"/></a>";
}


?>

<div style="clear:left;margin:5px;height:2px;width:20px;"></div>


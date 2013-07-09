<?php
//global $adir;
//$adir="music";
//require_once(dirname(__FILE__)."/../site/ref.php");




?>	


<?php

global $art;

//print_r($_FILES);
foreach ($_FILES as $k => $r) {
	
	$l = strrpos($r["name"], ".");
	$s = $_REQUEST["csinger1"];
	$t = $_REQUEST["csong1"];
	$ext = substr($r["name"], $l);
	
	//print($ext);
	
	$m = new_mp3file($s, $t, $ext, "1");
	move_uploaded_file($r["tmp_name"], $m);

}

$e = get_mp3files('1', $art);

if ($e):

if ($art) $h1 = "{$e[0]["uowner"]} - {$e[0]["utitle"]}";
else $h1 = "M&uacute;sica";
?>

<h3><?php print $h1; ?></h3>

<div style="max-width:800px">
<table id="mp3Table" class="tablesorter"> 
<thead> 
<tr> 
	<th>Tema</th>
    <th>Int&eacute;rprete</th> 
    <th>Fecha</th> 
    <th>Escuchar</th> 
    <th>Descargar</th> 
</tr> 
</thead> 
<tbody> 



<?php


foreach($e as $k => $r) {
$file = str_replace("_d_", "_v_", urlencode($r["filename"]));

if ($art):
?>		
<tr> <td> <?php print $r['utitle']; ?></td>
<?php
else:
?>
<tr> <td style='cursor:pointer;' onclick='goto("media_<?php print $r['id']; ?>");'> <?php print $r['utitle']; ?></td>
<?php
endif;
?>

<td> <?php print $r['uowner']; ?></td>
<td> <?php print $r['udate']; ?></td>
<td>

<object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3_mini.swf" width="200" height="20">
    <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3_mini.swf" />
    <param name="FlashVars" value="mp3=<?php print $file; ?>&amp;bgcolor=E6EEEE&amp;loadingcolor=0D0385&amp;buttoncolor=0D0385&amp;slidercolor=0D0385" />
    <param name="bgcolor" value="#E6EEEE" />
</object>
</td>
<td><a href='<?php print $r['filename']; ?>'><img src='images/download.png' width='63' height='20' /></a></td>
</tr>

<?php 


}

?>

</tbody> 
</table> 
</div>

<?php

else:

if (!$e) {
print_r("<i>No hay descargas disponibles</i>");
}

endif;

if (!$art):

?>

<style type="text/css">
#brisaform form p { position:relative }
#brisaform label.label  { position:absolute; left:0;
	_text-transform:uppercase;
	font-size:10px;
	font-family:Tahoma,Arial,Sans-serif;
	display: block;
    margin: 5px 5px 5px 6px;
    padding: 0;
    width: 80px;	
}


</style>

<br/>
<br/>
<div style="position:relative;max-width:300px;margin:auto;height:200px;">
<div id="brisaform" style="position:absolute;>
<form enctype="multipart/form-data" method="POST" action="" >
<p>Env&iacute;anos tu propia canci&oacute;n</p>

	<p>
<label class="label" for="csong1" style="text-align:left;">Tema</label>
<input type="text" style="width:210px;" id="csong1" name="csong1" autocomplete="off"/>
	</p>	
	
	<p>
<label class="label" for="csinger1" style="text-align:left;">Int&eacute;rprete(s)</label>
<input type="text" style="width:210px;" id="csinger1" name="csinger1" autocomplete="off"/>
	</p>	
	
	<p>
<!--label class="label" for="cfile1" >Archivo</label-->
<input type="file" id="cfile1" name="cfile1" autocomplete="off"/>
	</p>	

<input type="hidden" name="MAX_FILE_SIZE" value="30000000"/>

<input type="submit" value="Enviar">


</form>
</div>
</div>

<script type="text/javascript">


	$("label").inFieldLabels();
	
	$("#mp3Table").tablesorter(); 


</script>


<?php


endif;
?>


<?php $link = "http://{$_SERVER["SERVER_NAME"]}".str_replace("\\", "/", dirname($_SERVER["REQUEST_URI"]))."media"; 
$title = $h1;

if ($art) $link = "{$link}_{$art}";
require(dirname(__FILE__)."/../php/social.php");

?>

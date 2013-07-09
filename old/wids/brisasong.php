
<?php

//print_r($_FILES);
foreach ($_FILES as $k => $r) {
	
	$l = strrpos($r["name"], ".");
	$s = $_REQUEST["csinger1"];
	$ext = substr($r["name"], $l);
	
	//print($ext);
	
	$m = new_mp3file($s, $ext, "1");
	move_uploaded_file($r["tmp_name"], $m);

}

$e = get_mp3files('1');

if ($e):
?>

<table id="mp3Table" class="tablesorter"> 
<thead> 
<tr> 
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
?>		

<tr> <td> <?php print $r['uowner']; ?></td>
<td> <?php print $r['udate']; ?></td>
<td>
<object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3_mini.swf" width="200" height="20">
    <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3_maxi.swf" />
    <param name="bgcolor" value="#E6EEEE" />
    <param name="FlashVars" value="mp3=<?php print $file; ?>&amp;bgcolor=E6EEEE&amp;loadingcolor=0D0385&amp;buttoncolor=0D0385&amp;slidercolor=0D0385" />
</object>
</td>
<td><a href='<?php print $r['filename']; ?>'><img src='images/download.png' width='63' height='20' /></a></td>
</tr>

<?php 


}

?>

</tbody> 
</table> 


<?php

else:

if (!$e) {
print_r("<i>No hay descargas disponibles</i>");
}

endif;

?>

<style type="text/css">
#brisaform form p { position:relative }
#brisaform label.label  { position:absolute; top:0; left:0;
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
<div id="brisaform">
<form enctype="multipart/form-data" method="POST" action="" >
<p>Env&iacute;anos tu propia versi&oacute;n de la canci&oacute;n</p>
	<p>
<label class="label" for="csinger1" >Int&eacute;rprete(s)</label>
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

<script type="text/javascript">


	$("label").inFieldLabels();
	
	$("#mp3Table").tablesorter(); 


</script>

</br/>
</br/></br/>
</br/></br/></br/></br/></br/></br/>
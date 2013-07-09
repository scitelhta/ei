<?php

require_once(dirname(__FILE__)."/../php/phpblog.php");	

global $do;
if ($do=="blogpost") {
	$a = array();
	$a["error"] = "";
	
	$text = $_REQUEST["text"];
	$login = $_REQUEST["login"];
	$ptype = $_REQUEST["ptype"];
	
	if (!$ptype) $ptype="1";
	
	if (!trim($text)) {
		$a["error"] = "empty";
		print json_encode($a);
		exit();
	}

	if ((!auth_islogged()) || ($login != getuserlogin())) {
		$a["error"] = "login";
		print json_encode($a);
		exit();
	}
	
	$user = get_userbylogin($login);
	if ($user["utype"] > 3) {
		$text = str_replace("<?", "&lt;&#63;", $text);
		$text = str_replace("?>", "&#63;&gt;", $text);
	}
	
	$d = new DateTime();
	$file = $d->format("ymdHisu").".php";
	$ffile = dirname(__FILE__)."/blog/".$file;
	$fp = fopen($ffile, 'w');
	fwrite($fp, $text);
	fclose($fp);
	
	
	$s=trim(strip_tags(str_replace("<br", "\n", str_replace("<BR", "\n", $text))));
	$l = strpos($s, "\n");
	$ll = strpos($s, ".");
	if (($ll > 0) && ($ll < $l)) $l = $ll;
	if ($l === FALSE) $l = strlen($s);
	if ($l > 32) $l = 32;
	
	$e = blog_post($d->format("Y-m-d H:i:s"), $user["id"], $file, substr($s, 0, $l), $ptype, '');
	if ($e) $a["error"] = "";
	
	
	print json_encode($a);
	exit();
}


?>

<style type="text/css">
#sblogpost p { position:relative; margin:0; }
#sblogpost label.label  { position:absolute; top:0; left:0;
	font-size:10px;
	font-family:Tahoma,Arial,Sans-serif;
	display: block;
    margin: 5px 5px 5px 6px;
    padding: 0;
}

.sblogpost {
	position: relative;
	max-width:400px;
    border:1px solid #ACE;
	height:85px;
}


#spost {
	_position: absolute;
	left:7px;
	width:400px;
	height:60px;
	float:top;
	top:0px;
}

#ssubmit {
	position: absolute;
	right:10px;
	top: 74px;
	float:bottom;
}

#serror {
	position: absolute;
	left:10px;
	top: 74px;
	float:bottom;
	color:red;
}

</style>

<?php

if (auth_islogged()) {
	$slabel = "Ingrese el texto (Se permite c&oacute;digo HTML).";
	$sbutton="Publicar";
	$slogin = getuserlogin();;
}
else {
	$slabel = "Para publicar, por favor, inicie sesi&oacute;n.";
	$sbutton="Iniciar Sesi&oacute;n";
	$slogin = "";
}

global $ptype;

?>


<script type="text/javascript">

var slogin = "<?php print $slogin; ?>";

function sboton()
{
	var ptype="<?php if (isset($ptype)) print $ptype; ?>";

	if (slogin) {
	
		var dodata = "ajax=1&do=blogpost&login="+encodeURIComponent(slogin)+"&text="+encodeURIComponent($("#spost").val())+"&ptype="+ptype;
	
		$.ajax({url:"./", data: dodata, type: "POST", dataType:"json", success:function(data){
			if (!data.error) {
				$("#spost").val("");
				$("#serror").html("Texto enviado");
				goto(-1)
			}
			else {
				$("#serror").html("Error enviando texto");
			}
		}, error: function (xhr, ajaxOptions, thrownError) {
				$("#serror").html("Error enviando texto");
      }

		}
		);	
	}
	else {
		llogin();
	}

}

</script>



<fieldset class="sblogpost" id="sblogpost">

<form id="blogpost" action="javascript:sboton();">
<p>
<label class="label" for="spost"><?php print $slabel; ?></label>
<textarea id="spost" name="spost"></textarea>
</p>	

<div id="serror"></div>
<input type="submit" id="ssubmit" value="<?php print $sbutton; ?>"/>
	
</form>

</fieldset>

<script type="text/javascript">
$("label").inFieldLabels();
</script>



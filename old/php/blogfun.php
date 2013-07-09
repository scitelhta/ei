<?php
function blog_load_css()
{
?>



	
<style type="text/css">
div.tooltip {
cursor:pointer;
text-align:center;

}

div.tooltip:hover {
text-decoration:none;
}

div.tooltip span {
display:none;
margin:-20 5 0 10px;
padding:5px 5px;
}

div.tooltip:hover span {
display:inline;
position:absolute;
border:1px solid #cccccc;
background:#ffffff;
color:#666666;
}

div.articleset {
	height:100%;
	max-width:900;
	text-align:left;
	padding:20px;
}

div.article {
	position: relative;
	left: 0;
	top: 0;
	padding-top:10px;
}

div.article_top {
	_height:80px;
}

div.article_topimage {
	position: relative;
	float: left;
	padding-right:4px;
}


div.article_title {
	position: relative;
	float: top;
}

div.article_title a {
	text-decoration: none;
	color:#777777;
	font-size:22px;
	font-weight:normal;
	_text-transform:uppercase;

}

div.article_date {
	text-decoration: none;
	color:#888888;
	font-size:14px;
	font-weight:normal;
	_text-transform:uppercase;

}

div.article_user a {
	text-decoration: none;
	color:#888888;
	font-size:12px;
	font-weight:normal;
	_text-transform:uppercase;

}


div.article_user {
	position: relative;
	float: bottom;
}

div.articletitular img{
	height:50px;
	width:50px;
	margin: 20px;
}

div.article_textpaged img{
	height:120px;
	width:120px;
	margin: 10px;
}

div.article_text {
	position: relative;
	float: top;
	_min-height:125px;
	_margin-top: 50px;
	margin-bottom: 20px;
	_max-height: 200px;
}

div.article_separator {
	position: relative;
	float: top;
	margin-top: 30px;
	margin-bottom: 20px;
}



</style>









<?php
} //load_css


require_once(dirname(__FILE__)."/phpblog.php");	
$Articulos = array();




function print_art($ar, $u, $page, $titular)
{

	global $mobile;
	

	$a = $_SERVER["REQUEST_URI"];
	$a = str_replace("\\", "/", dirname($a) );

	$alink = "blog_{$ar['id']}";
	$link = "http://{$_SERVER['SERVER_NAME']}{$a}{$alink}";
	
	$ha = dirname(__FILE__)."/../site/blog/{$ar['filename']}";
	if (!file_exists($ha)) return "";
	$dd=file_get_contents($ha);
	
	$img = $u["image"];
	if (!$img) $img = "./images/pensamientos.jpg";
	
	
//	$ulink = "./user_{$u["id"]}";
?>
	<div class='article <?php if ($titular) print "articletitular"; ?>'>
<?php if (!$titular): ?>
		<div class="article_top" >
			<div class="article_topimage">
				<img src="<?php echo $img ?>" width="60" height="60" />
			</div>
			<div class="article_title">
				
				<a href="javascript:void();" onclick="goto('<?php print $alink; ?>');"><?php echo $ar["title"] ?></a>
				
			</div>
			<div class="article_date">
				<?php echo $ar["created"] ?>
			</div>
			
			<div class="article_user">
				<?php if (isset($u["link"])): ?>
				<a href='<?php echo $u["link"]; ?>' target='_blank'>Por: <?php echo $u["name"] ?></a>
				<?php if (isset($u["link"]) && (strpos($u["link"], "facebook"))): ?>
				<a href='<?php echo $ar["link"]; ?>' target='_blank'>&nbsp;via Facebook</a>
				<?php endif; ?>
				<?php else: ?>
				&nbsp;
				<?php endif; ?>
			</div>
		</div>
<?php endif; ?>
		<div class="article_text <?php if ($page) print "article_textpaged"; ?>">
			<?php 
				//flush();
				if ((strpos($dd, "<?")===FALSE) && (strpos($dd, "<br")===FALSE)) {
					$dd=str_replace("\n", "<br>", $dd);
					//print $dd;
				}
				else {
					//require($ha);
				}
				$ll=strlen($dd);
				if ($page) {
					$l = 0;
					for($ii=0;$ii<4;$ii++) {
						$k=stripos($dd, "<br", $l);	
						if ($k === FALSE) break;
						$l = $k+1;
						$ll = $k;
					}
				}
				echo substr($dd, 0, $ll);
				
				//readfile($ha);
				//echo $ar["text"];
			?>			
		</div>
<?php if ((!$mobile) && (!$page)):	?>		
<?php 
$title = $ar["title"];
$isblog = 1;
require(dirname(__FILE__)."/social.php");

?>



		
<?php endif; ?>			
	</div>
	
<?php

	return $alink;

}

function blog_narts($pars)
{
	$psize = 10;
	$ptype = 1;
	$setpsize = 0;
	$setptype = 0;
	$artn = 0;
	$page = 1;
	$p = 1;
	
	$i = 0;
	foreach($pars as $art) {	
	
		if ((!$i) && (is_numeric($art))) {
			$artn = $art;
			$page = 0;
		}
		else if ($art && ($art[0] == 'p')) {	
			$p = 0 + substr($art, 1);
			$page = 1;
		}
		else if ($art && ($art[0] == 's')) {
			$setpsize = 1;
			$psize = 0 + substr($art, 1);
		}
		else if ($art && ($art[0] == 't')) {
			$setptype = 1;
			$ptype = 0 + substr($art, 1);
		}			
	
		$i++;
	}
	$ps = array();
	$ps["page"] = $page;
	if ($page) {
		$ps["p"] = $p;
	}
	else {
		$ps["a"] = $artn;
	}
	$ps["psize"] = $psize;
	$ps["ptype"] = $ptype;
	$ps["setpsize"] = $setpsize;
	$ps["setptype"] = $setptype;
	
	return $ps;
}

function print_arts($arts, $ps, $titular)
{
	print '	<div class="articleset">';


	$l = min(count($arts), $ps["psize"]);
	$i = 0;
	for($i = 0; $i < $l; $i++)
	{
		$artt = $arts[$i];
		if (!isset($users[$artt["userid"]])) {
			$users[$artt["userid"]] = get_userbyid($artt["userid"]);
		}	
		$u = $users[$artt["userid"]];
		
		
	
		$not = "";
		$nots = "";
		if ($ps["ptype"] == 2) {$not = " Noticia"; $nots=$not."s";}
		if ($ps["ptype"] == 1) {$not = " Reflexi&oacute;n";$nots="Reflexiones";}

		$link = print_art($artt, $u, $ps["page"], $titular);
		if (!$link) continue;

if ($ps["page"]):
?>
		<a class="readmore jlink" href="./<?php print $link;?>"><div class="kmenu" name="kk_<?php print $link;?>">Leer...</div></a>

<?php 
endif;		
		//print("_{$page},{$next}, {$psize}, {$i}_");
		if (($ps["page"] && ($i + 1 >= $l) && ($ps["next"] || $ps["prev"]))) {
		
		
		$np = $ps["p"]+1;
		$pp = $ps["p"]-1;
		$next = "./blog_p{$np}".($ps["setpsize"]?"_s{$ps["psize"]}":"").($ps["setptype"]?"_t{$ps["ptype"]}":"");
		$prev = "./blog_p{$pp}".($ps["setpsize"]?"_s{$ps["psize"]}":"").($ps["setptype"]?"_t{$ps["ptype"]}":"");		
		$more = "./blog_p1".($ps["setptype"]?"_t{$ps["ptype"]}":"");
		
		//print_r($ps);
		//print $next;
		//print $prev;
		if ($titular):
		
?>
					<div style='float:right'>
				<a href='javascript:void(0);' onclick='goto("<?php print $more;?>", "<?php print $ps["div"];?>", "divblog=<?php print $ps["div"];?>");'>M&aacute;s <?php print $nots;?>...</a>
						</div>
<?php
		else:
?>
					<div style="float:bottom;margin-top:20px;">
					<div style='float:left'>
<?php if ($ps["prev"]):?>
				<a href='javascript:void(0);' onclick='goto("<?php print $prev;?>", "<?php print $ps["div"];?>", "divblog=<?php print $ps["div"];?>");'>Anteriores <?php print $nots;?>...</a>
<?php endif; ?>
				</div>
				<div style='text-align:right;'>
<?php if ($ps["next"]):?>
				<a href='javascript:void(0);' onclick='goto("<?php print $next;?>", "<?php print $ps["div"];?>", "divblog=<?php print $ps["div"];?>");'>Siguientes <?php print $nots;?>...</a>
<?php endif; ?>				
				</div>
				</div>

<?php
		endif;
		}
		else if ($ps["page"] && ($i + 1 < $l)){
		?>
			<div class="article_separator">
				<hr align="left" width="60%"/>
			</div>
			
		<?php
		
		}
		

	

	
	}
	
	print '</div>';

}

function headme($arts)
{
	global $title, $link, $image, $description;
	if (count($arts)<1) return;
	$ar=$arts[0];
	$title = $ar["title"];
	
	$a = dirname(__FILE__)."/../site/blog/{$ar['filename']}";
	$r = file_get_contents($a);
	
	$l=strpos($r, "src=");
	if ($l!==FALSE) {
		$o = trim(substr($r, $l+4));
		$d = explode(">", $o);
		$d = explode(" ", $d[0]);
		$o = str_replace('"', "", str_replace("'", "", $d[0]));
		$image = trim($o);
	}
	$r = strip_tags(html_entity_decode($r));
	$r = str_replace("\n", " ", $r);
	$r = substr(trim($r), 0, 256);
	$description = $r;
}

function do_blog($divblogv, $titularr, $body)
{
	global $params, $mobile;
	global $ggps, $ggarts;
	

	
	$artn = 0;

	$users = array();

	if (isset($ggps) && (!$titularr)) {
		$ps = $ggps;
	}
	else {
		$ps = blog_narts($params);
		$ps["div"] = $divblogv;
		$ps["next"] = 0;
		$ps["prev"] = 0;
		$ggps = $ps;
	}
	
	$utype = 10;
	if (auth_islogged()) {
		$u = get_userbylogin(getuserlogin());
		$utype = $u["utype"];
	}
	
	if ($ps["page"]  && (!$titularr) && (($ps["ptype"] == '1') || ($utype < 4))) {
		global $ptype;
		$ptype = $ps["ptype"];
		//require(dirname(__FILE__)."/../site/blogpost.php");	
	}
	

	$arts = array();
	if (isset($ggarts) && (!$titularr)) {
		$arts = $ggarts;
	}
	else {
		if (!$ps["page"]) {
			$arts = getblogid($ps["a"]);
		}
		else {
			$arts = getblogpage($ps["p"] - 1, $ps["psize"], $ps["ptype"]);
			if (count($arts) > $ps["psize"]) {
				$ps["next"] = 1;
			}
			if ($ps["p"] > 1) $ps["prev"] = 1;
		}
		$ggarts = $arts;
	}	
	//print_r($arts);
	
	if ($body) {
	
		print_arts($arts, $ps, $titularr);
	
		?>
				<script type="text/javascript">
					$(".kmenu").mouseover(pmenuover);
					$(".kmenu").mouseleave(pmenuexit);
					$(".kmenu").click(pmenuclick);
					$(".jlink").click(jclick);

				</script>
		<script type="text/javascript">gapi.plusone.go();twttr.widgets.load();FB.XFBML.parse();</script>
		<?php
//print '<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';	
	}
	else {
		global $link;
		headme($arts);
	}
	
}	


function print_blog($divblogv, $titularr)
{
	do_blog($divblogv, $titularr, 1);
}

function head_blog()
{
	do_blog("", 0, 0);
}


?>

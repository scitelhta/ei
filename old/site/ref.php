
<?php

function activeart()
{
	global $art;

		
	$artt = ereg_replace("[^A-Za-z0-9]", "", $art );	

	$f = dirname(__FILE__)."/../wids/".$artt.".php";
	if (file_exists($f)) 
		require_once($f); 
	else
		require_once(dirname(__FILE__)."/../wids/error.php"); 


	

}

if (isset($_REQUEST["ajax"])) {
	if ($_REQUEST["ajax"] == 'reflista') {
		activeart();
		exit();
	}

}


?>


<style type="text/css">

#refmenu2 {
float:left;
width: 150px;


}

#refart {
	float:left;
	width: 500px;
}


#vlinea {
	float:left;
	width: 1px;
	background-color:black;
	height: 400px;
}



div#refid {
	_max-width: 960px;
	height: 100%;
	overflow: hidden;
	position: relative;
	left: 0;
	_float: left;
	padding-top:40px;
	padding-right:30px;
	padding-bottom:30px;
}

div#refid > ul {

}

ul#refmenu {
	left: 0;
	z-index: 2;
	width: 120px;
	position: absolute;
	top: 0;
	list-style: none;	
	padding: 0;
	margin: 0;
}

ul#refmenu li {
	font-size: 12px;
	font-family: Arial;
}

ul#refmenu li img {
	padding: 5px;
	border: none;
	float: left;
	margin: 0px 10px 0 0;
}

ul#refmenu li a {
	color: #222;
	text-decoration: none;	
	display: block;
	padding: 10px;
	height: 60px;
	outline: none;
	background-position: -180px 0;
	background: url('./images/tab-acurrent.png') no-repeat scroll -180px 0 transparent;
	position: absolute;
	width:120px;
}

ul#refmenu li a:hover {
	text-decoration: underline;
	width:320px;
	background-position: 0 0 !important;	
}

ul#refmenu li a.current {
	background:  url('./images/tab-current.png') no-repeat  scroll -180px 0 transparent;
	color: #FFF;	
}

ul#refmenu li a.current:hover {
	text-decoration: none;
	cursor: default;

}

ul#refmenu li a h3 {
	margin: 0;	
	padding: 7px 0 0 0;
	font-size: 16px;
	text-transform: uppercase;
	position: absolute;
	visibility: hidden;
}

ul#refmenu li a span {
	position: absolute;
	visibility: hidden;
}


ul#refmenu li a:hover span {
	position: relative;
	visibility: visible;
}

ul#refmenu li a:hover h3 {
	position: relative;
	visibility: visible;
}

ul#refmenu div.tablia {
position:relative;
height:60px;
margin-top:20px;
}

#reflista {
	_right: 0px;
	_max-width: 800px;
	height: 100%;
	left: 0px;
	position: relative;
	text-align: left;
	padding-left:150px;
}

#refmenu1 {
	left: 0;
	float:left;
	width:150px;
	height:100%;
	
}

</style>

<script type="text/javascript">

	$(document).ready(function() {
	});
	
	function goto2(a)
	{
		goto(a, "reflista");
		$(".acurrent").attr("class", "acurrent");
		$("#"+a).attr("class", "current acurrent");
	
			
	
	}
	
</script>		

	<div id="content">

	

		<div id="refid">
			<div id="refmenu1">
			<ul id="refmenu">
			
<?php
	global $adir;

if ((!(isset($adir))) || (!$adir)) {
	$adir="arts";
}
require_once(dirname(__FILE__)."/../wids/{$adir}.php");			
foreach($myarts as $a => $v) {

if ((!(isset($art))) || (!$art)) {
	$art=$a;
}


$no = "";
if ($art != $a) $no = "no";
print <<<EOFREF1
				<li><div class="tablia">
					<a href="javascript:void(0);" id="{$dodo}_{$a}" onclick="goto2('{$dodo}_{$a}');" class="{$no}current acurrent">
						<img src="./images/{$a}.png" />
						<h3>{$v[0]}</h3>
						<span>${v[1]}</span>
					</a>
					</div>
				</li>
EOFREF1
;
}
?>

			
			</ul>
			</div>
			<div id="reflista">
			
			<?php
				activeart();
			?>
			
			</div>

		</div>
		<div id="ii">&nbsp;</div>
	</div>
	
</div>
<?php 
	require_once(dirname(__FILE__)."/config.php");
require_once(dirname(__FILE__)."/php/auth/auth.php");
require_once(dirname(__FILE__)."/php/rss.php");
?><?php 



function activemenu($a)
{
	global $do, $dodo;
	$si = "inactivemenu";

	
	
	if (!$dodo) {
		if ((!$a) || ($a == "inicio")) $si="activemenu";
	}
	else {
		if ($dodo == $a) $si="activemenu";
	}
	print $si;
}

function activehead()
{
	activebody(1);
}


function activebody($h)
{
	global $dodo, $art, $params, $do;
	if (isset($a[1]))
		$art = $a[1];
	
	
	if ($dodo == "porquerielabrisa") {
		$dodo = "library";
		global $Dododo;
		global $Porquerielabrisa;
		$Dododo = 1;
		$Porquerielabrisa = 1;
	}

	$hs = "";
	if ($h) $hs = "_head";
	

	$f = dirname(__FILE__)."/site/{$dodo}{$hs}.php";
	if (file_exists($f)) 
		require_once($f); 
	else {
		$u = get_userbylogin($dodo);
		if ($u) {
			global $user;
			$user = $u;
			require_once(dirname(__FILE__)."/site/userinfo{$hs}.php"); 
		}
		else {
			require_once(dirname(__FILE__)."/site/error{$hs}.php"); 
		}
		
	}

	
}



if (isset($_REQUEST["ajax"])) {
	if ($_REQUEST["ajax"])
	{
		activebody(0);
		exit();
	}
}		
		
?><!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb='http://www.facebook.com/2008/fbml' xmlns:og='http://opengraphprotocol.org/schema/'>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# blog: http://ogp.me/ns/blog#">
<link rel="shortcut icon" href="./images/ei16.png" />
<link rel="apple-touch-icon" href="./images/ei256.png"/>
<link rel="alternate" type="application/rss+xml" href="<?php print rss_url(); ?>" />

<?php
activehead();

?>
<script type="text/javascript">

	var jash = window.location.hash;
	if (jash) {
		window.location = "./"+jash.replace(/[^a-zA-Z 0-9_]+/g,'');
	}


	var dodo = "<?php print $dodo; ?>";
		
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-33252048-1']);
  _gaq.push(['_setDomainName', 'estudiantesdelinstante.net']);
  _gaq.push(['_trackPageview']);

  (function() {
//	return; //sininternet;
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();


</script>

<meta http-equiv="Content-Type" content="text/html; charsetUTF-8" erer="ISO-8859-1">

<link rel="stylesheet" type="text/css" href="./css/styles.css" />
<link href="./css/menu.css" rel="stylesheet" type="text/css">
<link href="css/lightbox.css" rel="stylesheet" />

<link type="text/css" href="css/jquery-ui-1.8.20.custom.css" rel="Stylesheet" />
<link type="text/css" href="css/blue/style.css" rel="Stylesheet" />
<!--link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/css" media="all" /sininternet-->






			
<title>Estudiantes del Instante</title>

<?php
if (strpos($_SERVER["HTTP_HOST"], "localhost")!==false) :
?>

   <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
   <script type="text/javascript" src="js/jquery-ui-1.8.21.custom.min.js"></script> 
	<script src="js/jquery.infieldlabel.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script> 
		<script type="text/javascript" src="js/jquery.smooth-scroll.min.js"></script> 	
	<script type="text/javascript" src="js/lightbox.js"></script> 	
	<script type="text/javascript" src="js/jquery.featureList-1.0.0.js"></script> 		
	<script type="text/javascript" src="js/jquery.ba-outside-events.min.js"></script> 			

	<script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>	

	<script type="text/javascript" src="js/history.adapter.jquery.js"></script>
	<script type="text/javascript" src="js/history.js"></script>
		<script type="text/javascript" src="js/widgets.js"></script>
			<script type="text/javascript" src="js/all.js"></script>


<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
  {lang: 'es-419', parsetags: 'explicit'}
</script>

	
<?php
else:
?>
	

   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
   <script src="http://code.jquery.com/ui/1.8.21/jquery-ui.min.js" type="text/javascript"></script>
	<script src="http://fuelyourcoding.com/scripts/infield/src/jquery.infieldlabel.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script> 
		<script type="text/javascript" src="http://lokeshdhakar.com/projects/lightbox2/js/jquery.smooth-scroll.min.js"></script> 	

		<script type="text/javascript" src="http://lokeshdhakar.com/projects/lightbox2/js/lightbox.js"></script> 	
	<script type="text/javascript" src="http://oneway2.googlecode.com/svn-history/r27/trunk/static/js/jquery.featureList-1.0.0.js"></script> 
	<script type="text/javascript" src="http://oneway2.googlecode.com/svn-history/r27/trunk/static/js/jquery.featureList-1.0.0.js"></script> 
<script type="text/javascript" src="https://raw.github.com/cowboy/jquery-outside-events/v1.1/jquery.ba-outside-events.min.js"></script> 	

	<script type="text/javascript" src="http://tablesorter.com/__jquery.tablesorter.min.js"></script>
		<script type="text/javascript" src="http://trentrichardson.com/examples/timepicker/jquery-ui-timepicker-addon.js"></script>
	
	<script type="text/javascript" src="https://raw.github.com/balupton/history.js/master/scripts/compressed/history.adapter.jquery.js"></script>
	<script type="text/javascript" src="https://raw.github.com/balupton/history.js/master/scripts/compressed/history.js"></script>	
			<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
			<script type="text/javascript" src="http://connect.facebook.net/es_LA/all.js"></script>
			
			
<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
  {lang: 'es-419', parsetags: 'explicit'}
</script>
	
<?php 
endif; ?>	

	  <script type="text/javascript">
	
		function createCookie(name,value,days) {
			if (days) {
				var date = new Date();
				date.setTime(date.getTime()+(days*24*60*60*1000));
				var expires = "; expires="+date.toGMTString();
			}
			else var expires = "";
			document.cookie = name+"="+value+expires+"; path=/";
		};

		function readCookie(name) {
			var nameEQ = name + "=";
			var ca = document.cookie.split(';');
			for(var i=0;i < ca.length;i++) {
				var c = ca[i];
				while (c.charAt(0)==' ') c = c.substring(1,c.length);
				if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
			}
			return null;
		};

		function eraseCookie(name) {
			createCookie(name,"",-1);
		};
		
		var expanded = "1";
		function switchupdown() {
			if (expanded == '1') {
				$("#logolike").addClass("likedown");
				$("#body1").css("top", "70px");
				$(".logo").css("height", "30px");
				expanded = "0";
			}
			else {
				$("#logolike").removeClass("likedown");
				$("#body1").css("top", "220px");
				$(".logo").css("height", "180px");
				expanded = "1";
			}
			createCookie("expanded", expanded, 30);			

		};
		
		function logoclick(){

		};
		
		function titleclick(e) {
			
			goto("");
			e.stopPropagation();
		
		};
		
		function socialclick(e) {
			e.stopPropagation();
		};
		
		function likeclick(e) {
			e.stopPropagation();
			switchupdown();
		};
		
		function onStateChange(e) {
			var State = window.History.getState();
			if (State.data && (State.data.url !== undefined)) {
			
				//var oldState = e.delegateTarget.window.History.getState();
				//if ((!oldState.data) ||(oldState.data.url === undefined) || (oldState.data.url != State.data.url))
					goto(State.data.url, State.data.tak, State.data.par);
			
			}
		};		
		
        $(document).ready(function() {
			$("label").inFieldLabels();
			
			var e = readCookie("expanded");
			if (e != expanded) switchupdown();
			
			$(window).bind("statechange", onStateChange);
			
			window.History.replaceState({url:window.location.href.split("/").slice(-1)[0].split("?")[0], tak:"", par:""}, window.document.title, encodeURIComponent(window.location));

			$("#logo").click(logoclick);
			$("#logotitle").click(titleclick);
			$("#logolike").click(likeclick);
			$("#logosocial").click(socialclick);
			
  
			FB.init({
				appId      : '421720104513992', // App ID
				channelUrl : '//www.estudiantesdelinstante/channel.html', // Channel File
				status     : true, // check login status
				cookie     : true, // enable cookies to allow the server to access the session
				xfbml      : true  // parse XFBML
			  });			

			});
	
var lasturl = -1;	
function goto(url, tak, par)
{

	if (url == -1) {
		if (lasturl == -1) {
			url = window.location.href.split("/").slice(-1)[0].split("?")[0];
		}
		else {
			url = lasturl;
		}
		
	}
	else {
		if (url && (url == lasturl)) {
			return;
		}
	}
	
	lasturl = url;
	//alert(url);f
	if ((arguments.length < 2) || (!tak)){
		tak="body2";
	}
	
	if (arguments.length < 3) par = "";
	
	
	dodo = url.split("_")[0];
	if (!dodo) dodo = "inicio";
	

	var dodata =  "do="+encodeURIComponent(url)+"&ajax="+encodeURIComponent(tak)+(par?"&"+par:"");
	
	
	$.ajax({url:"./", data: dodata, type: "POST", dataType:"text", success:function(data){
		$("#"+tak).html(data);
		
	}});

	window.History.debug.enable = true;
	var State = window.History.getState();
	if ((!State.data) || (State.data.url === undefined) || (State.data.url  != url)) {
		//alert(url);
		//if (State.data.url !== undefined)
			//alert(State.data.url);
		
		var rurl = url;
		if (!rurl) rurl = "/";
		
		window.History.pushState({url:url, tak:tak, par:par}, window.document.title, encodeURIComponent(rurl));
	}
	
	$(".activemenu").attr("class", "inactivemenu omenu");
	$("#i_"+dodo).attr("class", "activemenu omenu");

	
	$("label").inFieldLabels();
	
	if (window.innerHeight) {
		window.scrollBy(0, -window.innerHeight*10);
	}
	else {
		window.scrollBy(0, -document.body.clientHeight*10);
	
	}
}

function salir()
{
	$.ajax({url:"./", data: "do=logout", type: "POST", dataType:"json", success:function(data){
		if (data.error) {
		}
		else {
			window.location.reload(true);
		}		
	}});	

}


</script>

</head>
<body id="body_bg">
<div id="fb-root"></div>


<?php
//require_once(dirname(__FILE__)."/php/auth/auth.php");
auth_header();

?>


<div id="containter">
<div id="header">
<table id="tabla" border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
<tr height="100%">
<td width="50">
<img src="./images/eis.png"/ style="position:absolute; left: 0; top: 0;"/>

</td>
<td style="width:auto;text-align:left;">
<div class='cssmenu' id='cssmenu'>

<ul class='menu'>
<li class="has-sub "><a href='javascript:void(0);' id="i_inicio" onclick="goto('');" class="<?php activemenu("inicio"); ?> omenu" >
Comenzar</a>
	<ul>
		<li><a href='javascript:void(0);' onclick="goto('');" >Principal</a>
		</li>
		<li><a href='javascript:void(0);' onclick="goto('news');" >Noticias</a>
		</li>
		<li><a href='javascript:void(0);' onclick="goto('blog');" >Reflexiones</a>
		</li>
	</ul>   
</li>

<li class="has-sub "><a href='javascript:void(0);' id="i_events" onclick="goto('events');"   class="<?php activemenu("events"); ?> omenu"><span>Asistir</span></a>
	<ul>
		<li><a href='javascript:void(0);' onclick="goto('events_eproximos');" >Pr&oacute;ximos Eventos</a>
		</li>
		<li><a href='javascript:void(0);' onclick="goto('events_emensual');" >Calendario Mensual</a></li>
		<li><a href='javascript:void(0);' onclick="eregistrar();" >Nuevo Evento</a></li>
	</ul>   

</li>
<li class="has-sub "><a  href='javascript:void(0);' id="i_library" onclick="goto('library');"  class="<?php activemenu("library"); ?> omenu"><span>Adquirir</span></a>
	<ul>
	<li>   
	  <a  href='javascript:void(0);' onclick="goto('library');"  class="<?php activemenu("library"); ?>omenu"><span>Libros</span></a></li>   
	
	<li>   
	   <a  href='javascript:void(0);'  onclick="goto('media');"  class="<?php activemenu("media"); ?> omenu"><span>M&uacute;sica</span></a></li>   
	<li>   
	   <a  href='javascript:void(0);' onclick="goto('gallery');"  class="<?php activemenu("gallery"); ?> omenu"><span>Fotos</span></a></li>   

   </ul>
</li>
<li class="has-sub "><a href='javascript:void(0);' id="i_ref" class="<?php activemenu("ref"); ?> omenu">Conocer</a>
	<ul>
	<li>   <a  href='javascript:void(0);' id="i_about" onclick="goto('about');"  class="<?php activemenu("about"); ?> omenu"><span>Fundaci&oacute;n &quot;Estudiantes del Instante&quot;</span></a>

	</li>
	
	<li class="has-sub "><a href='javascript:void(0);'  onclick="goto('ref_');" id="i_ref" class="<?php activemenu("ref"); ?> omenu">Disciplinas</a>
		<ul>

		<li><a href='javascript:void(0);' onclick="goto('ref_ayahuasca');" >Ayahuasca</a>
		</li>
		<li><a href='javascript:void(0);' onclick="goto('ref_meditacion');" >Meditaci&oacute;n</a></li>
		</ul>
	</li>
	<li id="topnav" class="topnav" >
	<a href='javascript:void(0);'  class="signin"><span>
	   Cont&aacute;ctanos
	   </span></a>
	</li>   	
	</ul>
</li>

   
<?php if (!auth_islogged()): ?>
<li id="rightmenu" class="rightmenu">
<?php auth_menu(); ?>
</li>
<?php else: ?>

<li id="rightmenu" class="rightmenu has-sub">
<?php auth_menu(); ?>

	<ul>
		<li><a href="javascript:void(0);" onclick="goto('<?php print getuserlogin();?>');">Informaci&oacute;n de la Cuenta</a></li>
		<li><a href="javascript:void(0);" onclick="salir();">Salir</a></li>
	</ul>
</li>
<?php endif; ?>
</ul>
</div>
</td>
<td style="width:auto;text-align:right;">
 <font color="white"></font>
</td>
<td width="20">&nbsp;</td>
</tr>
</table>
</div nid="header">

   <?php
   require_once(dirname(__FILE__)."/site/contact.php"); 
    require_once(dirname(__FILE__)."/wids/eregistrar.php");   
   ?>
   
<div id="logo"  class = "logo">

<div id="logolike" class="logolike" ></div>

<img id="logotitle" class="logotitle" src="./images/logo.gif"/ width="200" height="30"  style="cursor:pointer;" >

<div id="logosocial" class="logosocial" style="position:absolute;right:0px;top:0px;cursor:default;width:200px;height:30px;"  >
<a target="_blank" href="http://www.facebook.com/groups/estudiantesdelinstante/">
<img src="./images/icon_facebook.png" style="height:30px;width:30px;cursor:pointer;" />
</a>
<a target="_blank" href="http://twitter.com/estuinstante">
<img src="./images/icon_twitter.png" style="height:30px;width:30px;cursor:pointer;" />
</a>

	
<a target="_blank" href="http://<?php print "{$_SERVER['SERVER_NAME']}".str_replace("\\", "/", dirname($_SERVER["REQUEST_URI"]) ); ?>rss">
<img src="./images/icon_rss.png" style="height:30px;width:30px;cursor:pointer;" />
</a>
<a target="_blank" href="http://<?php print "{$_SERVER['SERVER_NAME']}".str_replace("\\", "/", dirname($_SERVER["REQUEST_URI"]) ); ?>rss_eventos">
<img src="./images/icon_rss2.png" style="height:30px;width:30px;cursor:pointer;" />
</a>
<!--a href="./suscribe">
<img src="./images/icon_email.png" style="height:30px;width:30px;cursor:pointer;" />
</a-->

</div>

</div nid="logo">

<table width="100%"  cellpadding="0" cellspacing="0" height="100%" border="0" id="body1" class="body1">
<tr height="100%">
<td width="100%" align="center">
<div id="body">



<div id="body2" class='body'>
<?php activebody(0); ?>

</div>


</div nid="body">
</td>
</tr>
</table>





</div nid="container">

</body>
</html>

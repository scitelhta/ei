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

	
	$lodo = $dodo;
	$hs = "";
	if ($h == 1) $hs = "_head";
	
	if ($h == 2) {
		$lodo ="left";
	}
	if ($h == 3) {
		$lodo = "right";
	}
	

	$f = dirname(__FILE__)."/site/{$lodo}{$hs}.php";
	if (file_exists($f)) 
		require_once($f); 
	else {
		$u = get_userbylogin($lodo);
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
<link type="text/css" href="css/less.css" rel="Stylesheet" />
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


<script type="text/javascript" src="js/plusone.js">
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


	
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->	
		<link rel="stylesheet" media="all" href=""/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<!-- Adding "maximum-scale=1" fixes the Mobile Safari auto-zoom bug: http://filamentgroup.com/examples/iosScaleBug/ -->
	


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
		
		function pmenuover(e) {
			var t = e.target;
			var a=t.attributes["id"].nodeValue;
			var s = "#pt"+a[2];
			//alert($(s));
			
			$(".pment").hide();
			$(s).show();
			
		}
		
		function pmenuexit(e) {
			$(".pment").hide();
		}
		
		function pmenuclick(e) {
			var t = e.target;
			var a=t.attributes["name"].nodeValue;
			var s = a.substring(3);
			goto(s);
			
			return false;
		}
		
		function jclick(e){
			e.stopPropagation();
			return false;
		}
		
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
			$(".pment").hide();
			
			//var e = readCookie("expanded");
			//if (e != expanded) switchupdown();
			
			$(window).bind("statechange", onStateChange);
			
			window.History.replaceState({url:window.location.href.split("/").slice(-1)[0].split("?")[0], tak:"", par:""}, window.document.title, encodeURIComponent(window.location));

			$("#logo").click(logoclick);
			$("#logotitle").click(titleclick);
			$("#logolike").click(likeclick);
			$("#logosocial").click(socialclick);
			
			$(".pmenu").mouseover(pmenuover);
			$(".pmenu").mouseleave(pmenuexit);
			$(".pmenu").click(pmenuclick);
			$(".jlink").click(jclick);
			
  
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
		//window.scrollBy(0, -window.innerHeight*10);
	}
	else {
		//window.scrollBy(0, -document.body.clientHeight*10);
	
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

<style type="text/css">

.pmenu {
	_position:absolute;
	position:relative;
	_left:0;
	bottom:0;
	align:left;
	width:70px;
	height:70px;
	cursor:pointer;
	background-size: 100% auto !important;
}

.jlink {
	
	bottom:0px;
}

.pment {
	_visibility:hidden;
	color:white;
	font-family:"Arial", Times, serif;
}

</style>
</head>
<body id="body_bg">
<div id="fb-root"></div>


<?php
//require_once(dirname(__FILE__)."/php/auth/auth.php");
//auth_header();

?>


<div id="container" style="position:relative;">

   <?php
   //require_once(dirname(__FILE__)."/site/contact.php"); 
    //require_once(dirname(__FILE__)."/wids/eregistrar.php");   
   ?>
   
<div id="logo"  class = "logo">
<div style="align:top;height:70px;">

<img src="./images/eis.png"/ style="position:absolute; left: -2000px; top: 0;"/>
<!--div id="logolike" class="logolike" ></div-->

<img id="logotitle" class="logotitle" src="./images/logo.gif"/ width="200" height="30"  style="cursor:pointer;" >

<div id="logosocial" class="logosocial" style="position:absolute;right:0px;top:0px;cursor:default;width:100px;height:30px;"  >
<a target="_blank" href="http://www.facebook.com/groups/estudiantesdelinstante/">
<img src="./images/icon_facebook.png" style="height:30px;width:30px;cursor:pointer;" />
</a>
<a target="_blank" href="http://twitter.com/estuinstante">
<img src="./images/icon_twitter.png" style="height:30px;width:30px;cursor:pointer;" />
</a>

	
<!--a target="_blank" href="http://<?php print "{$_SERVER['SERVER_NAME']}".str_replace("\\", "/", dirname($_SERVER["REQUEST_URI"]) ); ?>rss">
<img src="./images/icon_rss.png" style="height:30px;width:30px;cursor:pointer;" />
</a-->
<a target="_blank" href="http://<?php print "{$_SERVER['SERVER_NAME']}".str_replace("\\", "/", dirname($_SERVER["REQUEST_URI"]) ); ?>rss_eventos">
<img src="./images/icon_rss2.png" style="height:30px;width:30px;cursor:pointer;" />
</a>
<!--a href="./suscribe">
<img src="./images/icon_email.png" style="height:30px;width:30px;cursor:pointer;" />
</a-->

</div>

</div ss="top">
<div style="align:bottom;width:100%;height:75px;position:relative;">

<a class="jlink" href="./">
<div class="pmenu" id="pu1" name="pp_about" style="float:left;background:url('images/ei3.png');">
</div></a>
<a class="jlink" href="./events">
<div class="pmenu" id="pu2" name="pp_events" style="float:left;background:url('images/ev3.png');">
</div>
</a>
<a class="jlink" href="./porquerielabrisa_libro">
<div class="pmenu" id="pu3" name="pp_porquerielabrisa_libro" style="float:left;background:url('images/pr3.png');">
</div>
</a>

<a class="jlink" href="./media">
<div class="pmenu" id="pu7" name="pp_media" style="float:right;background:url('images/mu3.png');">
</div>
</a>
<a class="jlink" href="./gallery">
<div class="pmenu" id="pu8" name="pp_gallery" style="float:right;background:url('images/fo3.png');">
</div>
</a>
<a class="jlink" href="./acts">
<div class="pmenu" id="pu9" name="pp_acts" style="float:right;background:url('images/me3.png');">
</div>
</a>

</div ss="bottom">


<div ss="bottom2" style="align:bottom;width:100%;height:40px;position:relative;">

<div class="pment"  id="pt1" style="left:0;position:absolute;">Fundaci&oacute;n &quot;Estudiantes del Instante&quot;
</div>
<div  class="pment" id="pt2"  style="left:70px;position:absolute;">Pr&oacute;ximos Eventos
</div>
<div  class="pment"  id="pt3" style="left:140px;position:absolute;">Libro &quot;Por qu&eacute; r&iacute;e la brisa&quot;
</div>
<div  class="pment"  id="pt7" style="right:140px;position:absolute;">M&uacute;sica y Videos
</div>
<div  class="pment"  id="pt8" style="right:70px;position:absolute;">Fotos
</div>
<div  class="pment"  id="pt9" style="right:0px;position:absolute;">Actividades
</div>



</div ss="bottom2">

</div nid="logo">

<!--table width="100%"  cellpadding="0" cellspacing="0" height="100%" border="0" id="body1" class="body1">
<tr height="100%">
<td width="100%" align="center"-->
<div id="body" class='body'> 


<style type="text/css">

#contentwrapper {
    float: left;
    width: 100%;
}


#contentcolumn {
    margin: 0 170px 0 180px;
}


.innertube {
    _margin: 0 10px 10px;
	margin: 0;
}

#leftcolumn {
    _background: none repeat scroll 0 0 #C8FC98;
    float: left;
    margin-left: -100%;
    width: 170px;
}
#rightcolumn {
    _background: none repeat scroll 0 0 #FDE95E;
    float: left;
    margin-left: -180px;
    width: 180px;
}

</style>

<div id="columns2">

	<div id="contentwrapper">
	 <div id="contentcolumn">
	  <div class="innertube">
		<div id="body2" style="text-align:left;">

			<?php activebody(0); ?>
		</div>
	  </div>
	 </div>
	</div>
	<div id="leftcolumn">
	 <div class="innertube">


	<?php activebody(2); ?>
	 </div>
	</div>
	<div id="rightcolumn">
	 <div class="innertube">

	<?php activebody(3); ?>
	 </div>
	</div>
	<div style="width:100%;height:1px;clear:left;">
	</div>
</div>



</div nid="body">


<!--/td>
</tr>
</table-->





</div nid="container">

<div id="foot" style="background-color:#8888ee;width:100%;height:30px;">
Estudiantes del Instante
</div>

</body>
</html>

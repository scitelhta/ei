<script type="text/javascript">

function goto3(a, divblog)
{
	goto(a, divblog);
}

</script>	

<div style="max-width:900px;height:100%;float:left;position:relative;">

<div id="blog2"  style="max-width:500px;_position:absolute; left: 10px; top: 20px;">

<?php
global $divblog, $titular, $params;
$params = array("t2", "s1");
$divblog="";
$titular="yes";
require(dirname(__FILE__)."/blog.php");
?>
</div>

<!--div class="article_separator">
	<hr align="left" width="100%"/>
</div-->


<div style="border: 1px solid #39d; _position:absolute; left: 10px; top: 200px;">
<?php 
global $divblog, $titular, $params;
$params = array("t1", "s1");
$divblog="";
$titular="yes";
require(dirname(__FILE__)."/blog.php");
?>


</div>

<br/>
<br/>

<?php $link = "http://{$_SERVER["SERVER_NAME"]}".str_replace("\\", "/", dirname($_SERVER["REQUEST_URI"])); 
$title = "Estudiantes del Instante";



require(dirname(__FILE__)."/../php/social.php");

?>

</div>
<style type="text/css">

#lib_brisa {
<?php 
global $mobile;
global $Porquerielabrisa;	
if (!isset($Porquerielabrisa)): ?>
	height: 400px;
<?php else: ?>
	height: 100%;
<?php endif; ?>

	max-width: 800px;
	float:center;

}

#portada_brisa {
<?php if (!$mobile):?>
	width: 200px;
	height: 324px;
<?php else: ?>
	width: 86px;
	height: 127px;
<?php endif; ?>	
	_float: top;
}

#desc_brisa {
	max-width: 800px;
	_height: 324px;
	_float: left;
	padding: 20px;
}
#desc_brisa p{
	font-size: 12px;
}

#desc_paypal2 {
<?php
if (!isset($Porquerielabrisa)): ?>
	_margin-top: 100px;
<?php else: ?>
	_margin-top: 150px;
<?php endif; ?>

	margin-left: 10px;
	_float:bottom;
}

#portada_compra {
	float:left;
}

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

#tpresentacion a
{
	color: black;
	text-decoration: none;
}

</style>

<script>
function comprar()
{
	window.open("http://articulo.mercadolibre.com.ve/MLV-404222015-libro-por-que-rie-la-brisa-de-sergio-velasquez-zeballos-_JM");
}
</script>

<br/>


<div id="lib_brisa">

<div id="portada_compra">

<div id="refart2" class="thumbsarea">
<a href="./images/portada01.jpg" title="Por qu&eacute; r&iacute;e la brisa" rel="lightbox[roadtrip]"><img src="./images/portada02.jpg" /></a>
	</div>
	
	

<div id="desc_paypal2">

<input type="button" value="Comprar" onclick="comprar();"/>


</div>
</div>

<div id="desc_brisa">
<?php
if (!isset($Porquerielabrisa)): ?>
<h1>
<a href='/porquerielabrisa<?php if ($mobile) print "_m1";?>'>
Libro: Por qu&eacute; r&iacute;e la brisa
</a>
</h1>
<?php else: ?>
<h1>Libro: Por qu&eacute; r&iacute;e la brisa</h1>
<?php endif; ?>
<h4>Autor: Sergio Vel&aacute;squez Zeballos</h4>
<hr style="width:50%"/>
<p>&quot;Junto a la brisa que yo mismo hac&iacute;a, aprend&iacute;a que yo mismo creaba la risa de la  brisa. Aprend&iacute;a el porqu&eacute; de ella.&quot;	</p>
<p>&quot;En este libro intento comunicar la tonada que me inspira. En estas l&iacute;neas intento transcribir los colores que olfateo cuando cierro los ojos y escucho. &quot;</p>

<?php 
if (!isset($Porquerielabrisa)): ?>
<p> <a href='/porquerielabrisa<?php if ($mobile) print "_m1";?>'>M&aacute;s detalles...</a></p>

<?php else: ?>

<div >
<h3 >
<a style="text-decoration:none !important;color:black;" href="http://www.facebook.com/events/389707751097913">Presentaci&oacute;n del libro en Venezuela</a>
</h3>
</div>


<table border='0' id="tpresentacion" class="tablesorter">
<thead> 
<tr> 
	<th>Evento</th>
	<th>Fecha</th>
    <th>Hora</th> 
    <th>Lugar</th> 
    <th>Direcci&oacute;n</th> 
    <th>Mapa</th> 
    <th>Info</th> 	
</tr> 
</thead> 
<tbody>
<tr>
<td style="font-weight:bold"><a href="http://www.facebook.com/events/389707751097913">
Presentaci&oacute;n y conversatorio en Valencia.</a></td>
<td > Viernes, 19 de octubre</td>
<td >  3:00 - 7:00 pm</td>
<td > Caf&eacute; Turismo.</td>
<td >  CC Trigal Sur, 1er piso. Arriba de Arturo's. Diagonal a la notar&iacute;a 5ta, El Trigal. Valencia.</td>
<td >  <a href="http://goo.gl/maps/V93aP"><img src="./images/maps-icon.png" style="width:30px;height:30px;"></a></td>
<td >  Lorenzo 0424-461.17.28</td>
</tr>

<!--tr>
<td style="font-weight:bold"> Terapia de Yagé en Valencia/Maracay.</td>
<td >  Viernes, 19 de octubre.</td>
<td >  9:00 pm - 7:00 am</td>
<td >  Por confirmar.</td>
<td >  Pedro 0424-471.98.86</td>
</tr-->

<tr>
<td style="font-weight:bold"> <a href="http://www.facebook.com/events/389707751097913">
Presentaci&oacute;n y conversatorio en Maracay.</a></td>
<td >  S&aacute;bado, 20 de octubre.</td>
<td >  12:00 - 5:00 pm.</td>
<td >  Librer&iacute;a Saraswati</td>
<td >  CC Las Am&eacute;ricas, Nivel 3, Av. Las Delicias, Sector Las Delicias.</td>
<td > <a href="http://goo.gl/maps/VsW38"><img src="./images/maps-icon.png" style="width:30px;height:30px;"></a></td>
<td >  Saraswati 0243-232.20.14</td>
</tr>

<tr>
<td style="font-weight:bold"> <a href="http://www.facebook.com/events/125672334248667">Terapia de Yag&eacute; en Caracas.</a></td>
<td > S&aacute;bado, 20 de octubre.</td>
<td >  9:00 pm - 7:00 am</td>
<td >  Tierrasana, Sabaneta</td>
<td>&nbsp;</td>
<td><a href="mailto:ser@estudiantesdelinstante.net"><img src="./images/icon_email.png" style="width:30px;height:30px;"></a> </td>
<td >  Gabriela 0416-211.5890, 0212-880.2891</td>
</tr>

<tr>
<td style="font-weight:bold"><a href="http://www.facebook.com/events/263382123783458/"> Abrazos Gratis en Caracas</a></td>
<td >  Domingo, 21 de octubre.</td>
<td >  12:00 - 3:00 pm</td>
<td >  Parque del Este (Parque Miranda).</td>
<td >  Frente a la concha ac&uacute;stica. Av. Francisco de Miranda. Chacao.</td>
<td >  <a href="http://goo.gl/maps/YWtKu"><img src="./images/maps-icon.png" style="width:30px;height:30px;"></a></td>
<td >  Gabriela 0416-211.5890, 0212-880.2891</td>
</tr>

<tr>
<td style="font-weight:bold"> <a href="http://www.facebook.com/events/389707751097913">
Presentaci&oacute;n y conversatorio en Caracas.
</a>
</td>
<td >  Domingo, 21 de octubre.</td>
<td >  3:00 - 6:00 pm.</td>
<td >  Sirio Casa del Ser.</td>
<td >  CC Milenium Mall, Torre Oficina, Piso 2, Of. N2-04. Los Dos Caminos.</td>
<td >  <a href="http://goo.gl/maps/nFALN"><img src="./images/maps-icon.png" style="width:30px;height:30px;"></a></td>
<td >  Gabriela 0416-211.5890, 0212-880.2891</td>
</tr>

<tr>
<td style="font-weight:bold"> <a href="http://www.facebook.com/events/389707751097913">
Presentaci&oacute;n y conversatorio en Caracas.
</a>
</td>
<td >  Lunes, 22 de octubre</td>
<td >  4:00 - 6:00 pm.</td>
<td >  UCV.</td>
<td >  Sala de lecturas de la Escuela de Historia. Facultad de Humanidades. Ciudad Universitaria.</td>
<td > <a href="http://goo.gl/maps/jWH48"><img src="./images/maps-icon.png" style="width:30px;height:30px;"></a></td>
<td >  Gabriela 0416-211.5890, 0212-880.2891</td>
</tr>
</tbody>
</table>

<?php endif; ?>
</div>
<br/>
<br/>

<script type="text/javascript">
$("#tpresentacion").tablesorter();
</script>



<?php $link = "http://{$_SERVER["SERVER_NAME"]}".str_replace("\\", "/", dirname($_SERVER["REQUEST_URI"]))."porquerielabrisa_"; 
$title = "Libro &quot;Por qu&eacute; r&iacute;e la brisa&quot;";
require(dirname(__FILE__)."/../php/social.php");

?>
</div>



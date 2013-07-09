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

	_max-width: 800px;
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
	_max-width: 800px;
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

#tpresentacion2 a
{
	color: black;
	text-decoration: none;
}

#tpresentacion3 a
{
	color: black;
	text-decoration: none;
}

</style>

<script>
function comprar()
{
	window.open("http://articulo.mercadolibre.com.ve/MLV-407524579-libro-por-que-rie-la-brisa-de-sergio-velasquez-zeballos-_JM");
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
<a style="text-decoration:none !important;color:black;" href="http://articulo.mercadolibre.com.ve/MLV-404222015-libro-por-que-rie-la-brisa-de-sergio-velasquez-zeballos-_JM">Ventas del libro en Venezuela</a>
</h3>
</div>


<table border='0' id="tpresentacion" class="tablesorter">
<thead> 
<tr> 
	<th>Ciudad</th>
    <th>Contacto</th> 
	<th>Tel&eacute;fono</th>
</tr> 
</thead> 
<tbody>

 



<tr>
<td style="font-weight:bold">
Caracas/San Antonio (Yag&eacute; Tierrasana)</td><td> 
<a href="http://www.facebook.com/gabriela.destefano.7">
Gabriela D'Estefano</a></td>
<td >0416-528.28.74 </td>
</tr>

<tr>
<td style="font-weight:bold">
Maracay-El Lim&oacute;n</td><td> 
<a href="http://www.facebook.com/gladys.zeballos">
Gladys Victoria Zeballos</a></td>
<td >0412-594.91.99 </td>
</tr>

<tr>
<td style="font-weight:bold">
Maracay-El Lim&oacute;n</td><td> 
<a href="http://www.facebook.com/groups/131413522271/">
GFU "El Vegetariano"</a></td>
<td >0243-283.18.39	 </td>
</tr>


<tr>
<td style="font-weight:bold">
Maracay-Las Am&eacute;ricas</td><td> 
<a href="http://www.facebook.com/Saraswati.book.store">
Librer&iacute;a Saraswati </a></td>
<td >0243-232.20.14 </td>
</tr>

<tr>
<td style="font-weight:bold">
Valencia (Yag&eacute; Las Trincheras)</td><td> 
<a href="http://www.facebook.com/adrenalinexcess">
Andr&eacute;s Mart&iacute;nez </a></td>
<td >0426-443.88.55 </td>
</tr>

<tr>
<td style="font-weight:bold">
Valencia (Yag&eacute; La Cumaca)</td><td> 
<a href="http://www.facebook.com/barbara.ramirez.9275">
B&aacute;rbara Ram&iacute;rez </a></td>
<td >0414-420.04.24  </td>
</tr>

<tr>
<td style="font-weight:bold">
Barquisimeto  (Yag&eacute; Las Teresitas)</td><td> 
<a href="http://www.facebook.com/alejandro.n.pina">
Alejandro &Ntilde;as Pi&ntilde;a </a></td>
<td >0412- 174.67.11 </td>
</tr>

<tr>
<td style="font-weight:bold">
Cabudare (Yag&eacute; Los Cafetaleros)</td><td> 
<a href="http://www.facebook.com/giovanna.salas2">
Giovanna Salas</a></td>
<td >0424-576.78.61  </td>
</tr>


<tr>
<td style="font-weight:bold">
M&eacute;rida-La Azulita</td><td> 
<a href="http://www.facebook.com/david.marincabrera">
David Mar&iacute;n Cabrera</a></td>
<td >0416-041.71.85  </td>
</tr>

  

<tr>
<td style="font-weight:bold">
Zulia-Ciudad Ojeda</td><td> 
<a href="http://www.facebook.com/ayahuascazabalareyes">
Wen Zabala</a></td>
<td >0416-069.83.36  </td>
</tr>

</tbody>
</table>


<br/>
<br/>



<div >
<h3 >
<div style="text-decoration:none !important;color:black;" >Ventas del libro en Ecuador</a>
</h3>
</div>

<table border='0' id="tpresentacion2" class="tablesorter">
<thead> 
<tr> 
	<th>Ciudad</th>
    <th>Contacto</th> 
	<th>Tel&eacute;fono</th>
</tr> 
</thead> 
<tbody>
<tr>
<td style="font-weight:bold">
Quito (Solanda)</td><td> 
<a href="http://www.facebook.com/scitelhta?ref=tn_tnmn">
Sergio Vel&aacute;squez Zeballos</a></td>
<td >0979-208.206</td>
</tr>

</tbody>
</table>
<br/>
<br/>
 

<div >
<h3 >
<div style="text-decoration:none !important;color:black;" >Ventas del libro en Colombia</a>
</h3>
</div>

<table border='0' id="tpresentacion3" class="tablesorter">
<thead> 
<tr> 
	<th>Ciudad</th>
    <th>Contacto</th> 
	<th>Tel&eacute;fono</th>
</tr> 
</thead> 
<tbody>


<tr>
<td style="font-weight:bold">
Cali</td><td> 
<a href="mailto:andresyage@hotmail.com">
Andr&eacute;s C&oacute;rdoba</a></td>
<td >316-341.6181</td>
</tr>

</tbody>
</table>
<br/>
<br/>
 

<?php endif; ?>
</div>


<script type="text/javascript">
$("#tpresentacion").tablesorter();
$("#tpresentacion2").tablesorter();
$("#tpresentacion3").tablesorter();
</script>



<?php $link = "http://{$_SERVER["SERVER_NAME"]}".str_replace("\\", "/", dirname($_SERVER["REQUEST_URI"]))."porquerielabrisa_libro"; 
$title = "Libro &quot;Por qu&eacute; r&iacute;e la brisa&quot;";
require(dirname(__FILE__)."/../php/social.php");

?>
</div>



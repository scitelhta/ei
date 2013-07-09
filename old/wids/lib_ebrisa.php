<style type="text/css">

#lib_ebrisa {
<?php 
global $ePorquerielabrisa;	
if (!isset($ePorquerielabrisa)): ?>
	height: 400px;
<?php else: ?>
	height: 500px;
<?php endif; ?>

	width: 800px;
	float:center;

}

#portada_ebrisa {
	width: 200px;
	height: 324px;
	float: left;
}

#desc_ebrisa {
	width: 400px;
	height: 324px;
	float: left;
}
#desc_ebrisa p{
	font-size: 12px;
}

#desc_epaypal2 {
<?php
if (!isset($ePorquerielabrisa)): ?>
	margin-top: 100px;
<?php else: ?>
	margin-top: 150px;
<?php endif; ?>

	margin-left: 20px;
	float:left;
}

</style>

<br/>

<div id="lib_ebrisa">

<div id="portada_ebrisa">
	<img src="./images/portada01.jpg"  width="100%" height="100%"/>

</div>
<div id="desc_ebrisa">
<?php
if (!isset($ePorquerielabrisa)): ?>
<h1>
<a href='/eporquerielabrisa'>
Libro electr&oacute;nico: Por qu&eacute; r&iacute;e la brisa
</a>
</h1>
<?php else: ?>
<h1>Libro electr&oacute;nico (PDF): Por qu&eacute; r&iacute;e la brisa</h1>
<?php endif; ?>
<h4>Autor: Sergio Vel&aacute;squez Zeballos</h4>
<hr style="width:50%"/>
<p>Junto a la brisa que yo mismo hacía, aprendía que yo mismo creaba la risa de la  brisa. Aprendía el porqué de ella.	</p>
<p>En este libro intento comunicar la tonada que me inspira. En estas líneas intento transcribir los colores que olfateo cuando cierro los ojos y escucho. </p>

<?php 
if (!isset($ePorquerielabrisa)): ?>
<p> <a href='/eporquerielabrisa'>M&aacute;s detalles...</a></p>

<?php else: ?>
<table border='0'>
<tr>
<td style="font-weight:bold">N. p&aacute;ginas:</td>
<td>200</td>
</tr>
<tr>
<td style="font-weight:bold">Fecha publicaci&oacute;n:</td>
<td>Agosto, 2010</td>
</tr>
<tr>
<td style="font-weight:bold">Idioma:</td>
<td>Espa&ntilde;ol</td>
</tr>
<tr>
<td style="font-weight:bold">ISBN-13:</td>
<td>978-980-12-5836-0</td>
</tr>
<tr>
<td style="font-weight:bold">Dimensiones:</td>
<td>11 x 17,8 x 1,2 cm</td>
</tr>
<tr>
<td style="font-weight:bold">Impresi&oacute;n:</td>
<td>Editorial Torino</td>
</tr>
</table>
<?php endif; ?>
</div>
<div id="desc_epaypal2">

<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="7L5RGA2VR8S38">
<table>
<tr><td><input type="hidden" name="on0" value="Formato">Formato</td></tr><tr><td><select name="os0">
	<option value="PDF 2$" selected="selected">PDF 2$USD</option>
	<option value="PDF 4$">PDF 4$USD</option>
	<option value="PDF 8$">PDF 8$USD</option>
	<option value="PDF 16$">PDF 16$USD</option>
</select> </td></tr>
</table>
<input type="hidden" name="currency_code" value="USD">
<input type="image" src="./images/paypal_comprar.png" border="0" name="submit" alt="PayPal - Comprar">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

</div>





</div>

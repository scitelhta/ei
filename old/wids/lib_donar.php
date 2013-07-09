<style type="text/css">

#lib_donar {
	width: 800px;
	height: 300px;
	_margin-left: 50px;
	float:center;

}

#portada_donar {
	width: 200px;
	height: 260x;
	float: left;
}
#desc_donar {
	width: 400px;
	height: 260px;
	float: left;
}
#desc_donar p{
	font-size: 12px;
}

#desc_paypal1 {
	margin-top: 100px;
	margin-left: 40px;
	float:left;
}

</style>

<br/>

<div id="lib_donar">

<div id="portada_donar">
	<img src="./images/regalito.png" width="200" height="260" />

</div>
<div id="desc_donar">

<?php 
global $Donar;

if (!isset($Donar)): ?>
<a href='/donar'>
<h1>Donaci&oacute;n amorosa</h1>
</a>
<?php else: ?>
<h1>Donaci&oacute;n amorosa</h1>
<?php endif; ?>
<hr style="width:50%"/>
<p>Lo que das con el corazón es lo que tu corazón se crece. </p>
<p>Tus bendiciones son agradecidas y bien invertidas en la salud y bienestar de muchos </p>
</div>
<div id="desc_paypal1">

<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="SWMMFAFMKZP4U">
<input type="image" src="./images/paypal_donar.gif" border="0" name="submit" alt="PayPal - Donar">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

</div>



</div>

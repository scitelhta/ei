
<?php 
global $Dododo;
global $Porquerielabrisa;
$Porquerielabrisa = 1;


if ((!isset($Dododo)) || ($Dododo == 1))
require_once(dirname(__FILE__)."/../wids/lib_brisa.php");
?>

<!--?php if (!isset($Dododo)): ?>
<br/>
<hr style="width:80%" />
<br/>
<php endif; ?>


<php
if ((!isset($Dododo)) || ($Dododo == 2))
require_once(dirname(__FILE__)."/../wids/lib_ebrisa.php");
?-->




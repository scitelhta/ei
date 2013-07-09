<?php

function modulo($o, $t) 
{
?>
<div class="module">
<h3 class="title">
<?php print $t; ?>	
</h3>
<div class="modulec">
<?php
require_once(dirname(__FILE__)."/../mods/{$o}.php");
?>

</div>

</div>
<?php

}


?>
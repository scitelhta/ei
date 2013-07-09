<?php

//print "hola";
//exit();


$do = "";
if (isset($_REQUEST["do"]))
	$do = $_REQUEST["do"];
	
require_once(dirname(__FILE__)."/../php/phpapi.php");	

$y = date("Y");
$m = date("n") - 1;
$d = date("j");
$w = date("N");
$o = 0;


$evs = get_events_next($y, $m + 1, $d, $o, 0, "mevents");
?>

<div style="position:relative;padding:20px;">
	
<h2 style="text-align:center;">Pr&oacute;ximos Eventos</h2>	
	
	
<table id="eenevents" class="tablesorter" style="">

<?php

function edate($uitime)
{
	$wdias = array("Domingo", "Lunes", "Martes", "Mi&eacute;rcoles", "Jueves", "Viernes", "S&aacute;bado");
	$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	return $wdias[date("w", $uitime)].", ".date("j", $uitime)." de ".$meses[date("n", $uitime)].". ".date("g:i a", $uitime);
}

$eventos = "<thead><tr> <th>Im&aacute;gen</th><th>Fecha Inicio</th> <th>Evento</th>  ".
"<th>Lugar</th></thead> <tbody> ";

foreach ($evs as $e)
{
	//print_r($e);

	$em = "";
	if ($e["personad"] && (strpos($e["personad"],"noreply")<0)) {
		$em = " <a href='mailto:".htmlentities($e["personad"])."'> (@)</a>";
	}
	
	$edate = edate($e["uitime"]);

	$eventos = $eventos . "<tr>".
		"<td class='eeimage'><a target='_blank' href='{$e["url"]}'><img src='./eventss/{$e["guid"]}.jpg'/></a></td>".
		"<td rel='{$e["uitime"]}' class='eeetime'>{$edate}</td>".
		//"<td class='eeetime'>".$e["ftime"]."</td>".
		"<td class='eeename'>".($e["name"])."</td>".
		//"<td class='eeeperson'>".htmlentities($e["person"]).$em . "</td>".
		"<td class='eeeplace'>".($e["place"])."</td>".
		//"<td class='eeecity'>".htmlentities($e["city"])."</td>".
	"</tr>";	
}
$eventos = $eventos . "</tbody>";
print $eventos;

?>

</table>

<script type="text/javascript">

	$.tablesorter.addParser({
			// set a unique id
			id: 'fecha',
			is: function(s) {
					// return false so this parser is not auto detected
					return false;
			},
			format: function(s, table, cell) {
					// format your data for normalization

					var year = $(cell).attr('rel');
					return year;
			},
			// set type, either numeric or text
			type: 'numeric'
	});

	$("#eenevents").tablesorter({
		sortList: [[0,0]],     
		 widgets: ['zebra'],
			headers: {
			1: {
					sorter:'fecha'
			}
		}
    });	
	

</script>	
	
</div>



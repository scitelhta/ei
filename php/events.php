<?php

function do_get_data() {

	define("DS","/",true);

    $imgb = "//graph.facebook.com/";
    $imgc = "/picture?type=large";

    $query = "SELECT idevent id, datei fechai, datef fechaf,
                name nombre, place lugar, url, type tipo,
                concat('{$imgb}', guid, '{$imgc}') imagen,
                if (DATEDIFF(datei, now())<=7, '13', DATE_FORMAT(datei, '%m')) mes
              FROM ei_event
              WHERE datei>now()
              ORDER BY type desc, datei asc
              ;";

	$k = -1;
    $q = query($query);
	$a = array();
	$next = array();
	$last = "";
	$pormes = array();
	$mio = array();
	$meses = array("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre", "Esta semana");
	foreach($q as $row) {

		if ($row["tipo"] == 1) {
			$row["nombre"] = utf8_decode(html_entity_decode($row["nombre"]));
		}


		$b = array("id"=>$row["id"], "fechai"=>$row["fechai"], "fechaf"=>$row["fechaf"],
			"nombre"=>utf8_encode($row["nombre"]), "lugar"=>$row["lugar"], "url"=>$row["url"],
			"imagen"=>$row["imagen"], "tipo"=>$row["tipo"]);

		if ($row["tipo"] == '2') {
			$mio[] = $b;
			continue;
		}

		if ($row["mes"] != $last) {
			$last = $row["mes"];
			$pormes[] = array("nombre"=>$meses[intval($row["mes"])], "events"=>array());
			$k++;
		}
		$pormes[$k]["events"][] = $b;
	}

	$a["mio"] = $mio;
	$a["mes"] = $pormes;

//	print_r($q);
    return $a;
}


?>
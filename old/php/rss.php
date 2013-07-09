<?php


$do = "";
if (isset($_REQUEST["do"]))
	$do = $_REQUEST["do"];
	
require_once(dirname(__FILE__)."/../php/phpapi.php");	


function rss_url()
{
	$aurl = $_SERVER["REQUEST_URI"];
	$aurl = str_replace("\\", "/", dirname($aurl) );

	$link = "http://{$_SERVER['SERVER_NAME']}{$aurl}";
	print "{$link}rss";

}


// Elimina caracteres extraños que me pueden molestar en las cadenas que meto en los item de los RSS
function clrAll($str) {

   
   
   $str=str_replace("&quot;","",$str);
   $str=str_replace("acute;","",$str);
   $str=str_replace("tilde;","",$str);

   $str=str_replace("&","",$str);
   $str=str_replace('"','',$str);
   $str=str_replace("'","",$str);
   $str=str_replace(">","",$str);
   $str=str_replace("<","",$str);

   
   return $str;
}

function rss()
{
	global $do;
	global $art;
	
	$aurl = $_SERVER["REQUEST_URI"];
	$aurl = str_replace("\\", "/", dirname($aurl) );

	$link = "http://{$_SERVER['SERVER_NAME']}{$aurl}";
	
	$rsslink = "{$link}$do";	

	header("Content-type: text/xml");
	echo '<?xml version="1.0" encoding="ISO-8859-1"?>';

	$ev = 0;
	
	$titulo = "";
	if (($art == "n") ||($art == "news") ||($art == "noticias")) $titulo = "Noticias";
	if (($art == "r") ||($art == "reflexiones")||($art == "thoughts")) $titulo = "Reflexiones" ;
	if (($art == "e") || ($art == "events") || ($art == "eventos")) {$titulo = "Eventos" ; $ev = 1; }
	
	//Cabeceras del RSS
	echo "<rss version=\"2.0\" xmlns:dc=\"http://purl.org/dc/elements/1.1/\" xmlns:itunes=\"http://www.itunes.com/dtds/podcast-1.0.dtd\" xmlns:atom=\"http://www.w3.org/2005/Atom\">\n";
	//Datos generales del Canal. Edítalos conforme a tus necesidades
	echo "<channel>\n";
	echo "<atom:link href=\"{$rsslink}\" rel=\"self\" type=\"application/rss+xml\" />\n";
	echo "<title>Estudiantes del Instante {$titulo}</title>\n";
	echo "<link>http://www.estudiantesdelinstante.net</link>\n";
	echo "<description>Eventos, reflexiones y noticias relativos a nuestro estudio de la luz interna.</description>\n";
	echo "<language>es-es</language>\n";
	echo "<copyright>Fundacion Estudiantes del Instante</copyright>\n";


	if ($ev) {

		$t = time() - 24*3600;
		
	
		$evs = get_events_next(date("Y", $t), date("n", $t), date("j", $t), 0, 0);
		
		foreach ($evs as $e) {
		
  
		
			$titulo = clrAll($e["name"]);
			$url = $e["url"];
			$guid=$url;
			$date = date("r", $e["uitime"]);
			$desc = "Titulo: {$e["name"]}";
			$desc .= "\nDesde: ".date("r", $e["uitime"]);
			$desc .= "\nHasta: ".date("r", $e["uftime"]);
			if ($e["place"]) $desc.="\nLugar:{$e["place"]}";
			//if ($e["city"]) $desc.="\nCiudad:{$e["city"]}";
			//if ($e["person"]) $desc.="\nResponsable:{$e["person"]}";

			
			$desc = clrAll($desc);

			
			echo "<item>\n";
			echo "<title>{$titulo}</title>\n";
			echo "<description>{$desc}</description>\n";
			echo "<link>{$url}</link>\n";
			echo "<guid>{$guid}</guid>\n";
			echo "<pubDate>{$date}</pubDate>\n";
			echo "</item>\n";		
	
		}

	
		$articulos=get_rss($art);
		foreach ($articulos as $ar) {
			
			$t = dirname(__FILE__)."/../site/blog/{$ar['filename']}";
			$d = file_get_contents($t);
			$d = clrAll(substr(strip_tags(html_entity_decode($d)), 0, 8000));
		
			$titulo = clrAll($ar["title"]);         
			$desc = clrAll($d);
			$url = "{$link}blog_{$ar["id"]}";
			$date = date("r", $ar["cdate"]);
		   
			echo "<item>\n";
			echo "<title>{$titulo}</title>\n";
			echo "<description>{$desc}</description>\n";
			echo "<link>{$url}</link>\n";
			echo "<guid>{$url}</guid>\n";
			echo "<pubDate>{$date}</pubDate>\n";
			echo "</item>\n";
		   
		}
	
	
	
	}
	else {
	
	
	
		$articulos=get_rss($art);
		foreach ($articulos as $ar) {
			
			$t = dirname(__FILE__)."/../site/blog/{$ar['filename']}";
			$d = file_get_contents($t);
			$d = clrAll(substr(strip_tags(html_entity_decode($d)), 0, 8000));
		
			$titulo = clrAll($ar["title"]);         
			$desc = clrAll($d);
			$url = "{$link}blog_{$ar["id"]}";
			$date = date("r", $ar["cdate"]);
		   
			echo "<item>\n";
			echo "<title>{$titulo}</title>\n";
			echo "<description>{$desc}</description>\n";
			echo "<link>{$url}</link>\n";
			echo "<guid>{$url}</guid>\n";
			echo "<pubDate>{$date}</pubDate>\n";
			echo "</item>\n";
		   
		}
	}



	//cierro las etiquetas del XML
	echo "</channel>";
	echo "</rss>";


}


if ($dodo == "rss") {
	rss();
	exit();
}
	


?>
<?php 

header("Content-type: image/png");

//$imagen = imagecreate(300, 30);

$nombre=$_GET["name"];
if (isset($_GET["r"]))
	$r=$_GET["r"];
else
	$r="255";
if (isset($_GET["g"]))
	$g=$_GET["g"];
else
	$g="255";
if (isset($_GET["b"]))
	$b=$_GET["b"];
else
	$b="255";
if (isset($_GET["a"]))
	$a=$_GET["a"];
else
	$a="0";

if ($nombre) {


	$string=$nombre;

	$font  = 3;
	$width  = ImageFontWidth($font) * strlen($string);
	$lheight = ImageFontHeight($font);
	$height = 21;
	
  $im = imagecreatetruecolor ($width,$height);
  imagealphablending($im, false);
  imagesavealpha($im, true);
  $background_color = imagecolorallocatealpha ($im, 0, 0, 255, 127);
  imagefill($im, 0, 0, $background_color);
  $text_color = imagecolorallocatealpha ($im, $r, $g, $b, $a);
 imagestring ($im, $font, 0, ($height-$lheight)/2,  $string, $text_color);
  imagepng ($im); 
	
	

}	


?>

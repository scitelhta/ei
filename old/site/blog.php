<?php

require_once(dirname(__FILE__)."/../php/blogfun.php");


if (isset($_REQUEST["params"])) {
	$params = split("_", $_REQUEST["params"]);
}

if (!isset($divblog)) {
	if (isset($_REQUEST["divblog"])) $divblog=$_REQUEST["divblog"];
	else $divblog = "";
}	

if (!isset($titular)) {
	if (isset($_REQUEST["titular"])) $titular=$_REQUEST["titular"];
	else $titular = "";
}	

global $mobile;

if ($mobile) $params[] = "m1";


echo '<div class="blog">';
blog_load_css();

print_blog($divblog, $titular);
echo '</div>';



?>






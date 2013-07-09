<?php

require_once(dirname(__FILE__)."/../php/auth/auth.php");
require_once(dirname(__FILE__)."/../php/phpapi.php");

function userpage($u)
{
	if (!$u) {
		print "No se encuentra el usuario.";
		return;
	}

	
print "<div style='width:500px'>";	

if (isset($u["url"]))
	print "<a href='{$u["url"]}'>";

if (isset($u["name"]))
	print "{$u["name"]}<br/>";
	
if (isset($u["picture"]))
	print "<img style='max-width:200px;' src='{$u["picture"]}'/>";

if (isset($u["url"]))
	print "</a>";
	

print "</div>";


}

global $user;

if (!isset($user)) $user = get_userbylogin(getuserid());
userpage($user);






?>
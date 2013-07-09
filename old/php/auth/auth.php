<?php

if (!isset($do)) $do = "";

if ($do == "login") {

	$login = $_REQUEST["login"];
	$password = $_REQUEST["password"];
	$t = login_user($login, $password);
	if ($t)
		$error = "";
	else
		$error = "Invalid";
		
	$_SESSION["auth_login_token"]  = $t;

	

		
	$a = array();
	$a["error"] = $error;
	$a["token"] = $t;
	print json_encode($a);
	exit();
}	

if ($do == "contact") {
	$name = $_REQUEST["name"];
	$email = $_REQUEST["email"];
	$url = $_REQUEST["url"];
	$comment = $_REQUEST["com"];
	
	$a = array();
	$a["error"] = "";
	print json_encode($a);
	exit();
}

if ($do == "register") {

	$login = $_REQUEST["login"];
	$name = $_REQUEST["name"];
	$password = $_REQUEST["password"];
	$email = $_REQUEST["email"];
	$email = $_REQUEST["date"];
	
	
	$r = register_user($login, $name, $password, $email, $date);
	
	$a = array();
	$a["error"] = $r;
	print json_encode($a);
	exit();
}


$auths = array();
$auth0 = "";


class auth
{
	var $logged;
	var $token;
	var $username;
	var $userid;
	var $picture;
	
	function __construct()
	{
		//print("auth");
		global $auths;
		$auths[count($auths)] = $this;
		$this->logged = 0;
		$this->token = "";
		$this->username = "";
		$this->userid = "";
		$this->picture = "";
		$this->userlogin = "";
	}
	
	function authid() {return "none";}
	
	function islogged(){}
	
	function auth(){}
	
	function login(){}
	function logout(){}
	
	function authHeader() {}
	
	function getPicture(){}
	function getName(){ return $this->username;}
	function getId() { return $this->userid;}
	
	function printLogo(){
	?>
		<a style="padding-left:32px;background:url(<?php print $this->getPicture();?>) no-repeat;background-size:30px 30px;background-position:0 5px;" href="javascript:void(0);">
		<?php print $this->username; ?>
		</a>
	<?php	
			

	
	}
	function printLogin($pb){}
	function printLogout(){}


}

function auth_printLogo()
{
	global $auths, $auth0;
	for($i = 0; $i < count($auths); $i++) {
		$t = $auths[$i];
		if (($t) && ($t->islogged())) {
			return $t->printLogo();
		}
	}
	return "";
}


function auth_logout()
{
	global $auths, $auth0;
	for($i = 0; $i < count($auths); $i++) {
		$t = $auths[$i];
		if (($t) && ($t->islogged())) {
			return $t->logout();
		}
	}
	return "";
}

function auth_printLogin($ij, $pb)
{
	
	global $auths, $auth0;
	//print_r($auths);
	$j = 0;
	for($i = 0; $i < count($auths); $i++) {
		$t = $auths[$i];
		if (($t) && (!$t->islogged())) {
			$r = $t->printLogin($pb);
			//print_r($r);
			if (!$r) continue;
			if (($ij == $j)) {
				return $r;
			}
			$j++;
		}
	}
	return "";
}



function auth_islogged()
{
	global $auths, $auth0;
	for($i = 0; $i < count($auths); $i++) {
		$t = $auths[$i];
		if (($t) && ($t->islogged())) {
			$auth0 = $t;
			return $auth0;
		}
	}
	return 0;
	

}


function auth_auth()
{
	
	global $auths, $auth0;
	for($i = 0; $i < count($auths); $i++) {
		$t = $auths[$i];
		if (($t) && ($t->auth())) {
			$auth0 = $t;
			return 1;
		}
	}
	return 0;
}

function auth_header()
{
	global $auths, $auth0;
	for($i = 0; $i < count($auths); $i++) {
		$t = $auths[$i];
		if (($t) && ($t->authHeader())) {
			//$auth0 = $t;
			//return 1;
		}
	}
	return 0;
}

require_once(dirname(__FILE__)."/auth_facebook.php");
require_once(dirname(__FILE__)."/auth_gmail.php");
require_once(dirname(__FILE__)."/auth_login.php");

$fb = new auth_facebook();
$gm = new auth_gmail();
$ll = new auth_login();








function menu2()
{
	
	if (auth_islogged()) {
		$r = auth_printLogo();
		print $r;
	}
	else {
		$r = "";
		for($i = 0; ;$i++) {
			$k = auth_printLogin($i, 1);
			if (!$k) break;
			$r .= "<img src=\"./images/separator.png\" />".$k;
		}
		print $r;
	}
}



function auth_menu()
{
	if (auth_islogged()) {
		$r = auth_printLogo();
		print $r;		
	}
	else {
		print "<a href='javascript:void(0);' onclick='llogin()'>Iniciar Sesi&oacute;n</a>";
	}


}

function getuserid()
{
	global $auth0;
	if (!$auth0)
		auth_islogged();
	if (!$auth0) return "";
	return $auth0->userid;
}

function getuserlogin()
{
	global $auth0;
	if (!$auth0)
		auth_islogged();
	if (!$auth0) return "";
	return $auth0->userlogin;
}


if ($do == "logout") {
		
	auth_logout();
		
	$a = array();
	$a["error"] = 0;
	print json_encode($a);
	exit();

}






?>
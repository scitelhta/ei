<?php



require_once(dirname(__FILE__)."/../../lib/google-api-php-client/src/apiClient.php");
require_once(dirname(__FILE__)."/../../lib/google-api-php-client/src/contrib/apiOauth2Service.php");


class auth_gmail extends auth
{
	var $client = "";
	var $oauth2 = "";
	var $picture = "";

	var $code = "";

	
	function __construct() {
		
		parent::__construct();

		$this->client = new apiClient();
		$this->client->setClientId('653397996370.apps.googleusercontent.com');
		$this->client->setClientSecret('LHzzTp6WE8bD0tsMl_2WQeWl');
		$this->client->setRedirectUri('http://localhost.com');
		$this->client->setDeveloperKey('AIzaSyDTCv-zEMoJI4uVToYHW0EVOLaHchW5_hQ');
		$this->oauth2 = new apiOauth2Service($this->client);

		
		if (isset($_SESSION["auth_gmail_token"])) {
		
			$this->token = $_SESSION["auth_gmail_token"];
			$this->username = $_SESSION["auth_gmail_username"];
			$this->userid = $_SESSION["auth_gmail_userid"];
			$this->picture = $_SESSION["auth_gmail_picture"];
			$this->userlogin = $_SESSION["auth_gmail_userid"];
			$this->logged = true;
			
			$this->client->setAccessToken($this->token);
		}
		

	}
	
	function islogged()
	{
		return $this->logged;
	}
	function authid() {return "gg.".$this->logged;}
	
	function auth()
	{
		if (isset($_REQUEST["logout"]))
			return $this->logout();
	
		$code = "";
		if (isset($_REQUEST["code"]))
			$code = $_REQUEST["code"];
		
		//print $code;
		//print $this->logged;
		
		if ($this->logged) return false;
		if (!$code) return false;
		
		try {
			$this->client->authenticate();
		}
		catch (Exception $e) {
			return false;
		}
		$_SESSION['auth_gmail_token'] = $this->client->getAccessToken();
		$this->token = $_SESSION['auth_gmail_token'];
		$this->client->setAccessToken($this->token);
 
		$user = $this->oauth2->userinfo->get();
		//print_r($user);
		
		user_gglogin($user, $this->token);
		
		$this->logged = true;
		
		
		$this->username = $user["name"];
		$this->userid = $user["id"];
		$this->picture = $user["picture"];
		$this->userlogin = $user["id"];
		
		$_SESSION["auth_gmail_username"] = $this->username;
		$_SESSION["auth_gmail_userid"] = $this->userid;
		$_SESSION["auth_gmail_picture"] = $this->picture;
		
		$redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
		//header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));		
	
		return true;
	}
	
	
	function login_failed()
	{
		print "FAILED";
		return 0;
	}
	
	function logout()
	{

		//if (isset($_REQUEST['logout'])) {
		  unset($_SESSION['auth_gmail_token']);
		  $this->client->revokeToken();
		  unset($this->token);
		//}
		$this->logged = 0;
		return 1;
	}	
	
	
	function getPicture()
	{
		if ($this->userid) 
			return filter_var($this->picture, FILTER_VALIDATE_URL);
	}
	
	function getName(){
		return $this->username;
	}
	
	function aprintLogo()
	{
		$r = "";
		$r.=("<div id=\"ggdt\">");
		$r.=("<img src=\"".$this->getPicture()."\" width=\"21\" height=\"21\"/>"); //imagen
		$r.=("<img src=\"/myimage.php?r=0&g=0&b=0&id=".$this->userid."&name=".$this->username."\"/>"); //nombre
		$r.=("<img src=\"./images/ggd.png\" width=\"28\" height=\"21\"/>"); //f
		$r.=("</div>");	
		return $r;
	}
	
	function printLogin($pb)
	{
		if ($pb) {
			$url = $this->client->createAuthUrl();
			
			$boton="<img src=\"./images/gglogo.jpg\" style=\"cursor:pointer;width:150px;height:60px;\"";
			$boton.="onclick=\"window.location.href='".$url."'\"  />	";
			return $boton;
		}
	}
	
	function printLogout()
	{
		$r = "";
		$r.=("<a href=\"?logout\">");
		$r.=("</a>");	
		return $r;
	}



}











?>
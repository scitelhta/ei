<?php


require_once(dirname(__FILE__)."/../../lib/facebook-php-sdk/src/facebook.php");

class auth_facebook extends auth
{
	var $app = array(
	'appId'  => '421720104513992',
	'secret' => '0a9bdc62655a821b63122ff362c3fc64',
	'cookie' => true
	);
	
	var $facebook;

	var $code = "";
	var $state = "";
	
	function __construct() {
		
		parent::__construct();
		$this->facebook = new Facebook($this->app);
		if (isset($_SESSION["auth_facebook_token"])) {
			$this->token = $_SESSION["auth_facebook_token"];
			$this->username = $_SESSION["auth_facebook_username"];
			$this->userlogin = $_SESSION["auth_facebook_userlogin"];
			$this->userid = $_SESSION["auth_facebook_userid"];
			$this->logged = true;
		}

		
		if (isset($_SESSION["auth_facebook_state"])) {
			$this->state = $_SESSION["auth_facebook_state"];
		}
	}
	
	function islogged()
	{
	//	header("location:https://graph.facebook.com/110594545686574/feed?access_token=".$this->token);
	
		//header("location:https://graph.facebook.com/me/friends?access_token=".$this->token);

    
		return $this->logged;
	}

	function authid() {return "fb.".$this->logged;}
		
	function auth()
	{
		if (isset($_REQUEST["logout"]))
			return $this->logout();
			
		$code = "";
		$state = "";
		
		
			
		if (isset($_REQUEST["code"]))
			$code = $_REQUEST["code"];
		if (isset($_REQUEST["state"]))
			$state = $_REQUEST["state"];

		if (isset($_REQUEST["signed_request"])) {
			$signed_request = $_REQUEST["signed_request"];
			
			list($encoded_sig, $payload) = explode('.', $signed_request, 2);
			$data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);
			
			
			if ($this->token != $data["oauth_token"]) {
			
				
			
				$this->token = $data["oauth_token"];
				$this->userid = $data["user_id"];
				$_SESSION["auth_facebook_token"] = $this->token;
				$_SESSION["auth_facebook_userid"] = $this->userid;
				$this->userlogin = $data["user_id"];
				
				$graph_url = "https://graph.facebook.com/me?access_token=" . $this->token;
				$r = file_get_contents($graph_url);
				$user = json_decode($r);

				user_fblogin($user, $this->token, $this->userid);
		
				$this->username = $user->first_name;
				$_SESSION["auth_facebook_username"] = $this->username;
				$_SESSION["auth_facebook_userlogin"] = $this->userlogin;
				
				$this->logged = true;
				
				
				
			
				return true;
			}
			
			
		}
		
		if ($this->logged) return false;
		if ((!$code) || (!$state)) return false;
		if ($state != $this->state) return false;
		

		
		$url="https://graph.facebook.com/oauth/access_token?";
		$url.="client_id=".$this->app["appId"];
		$url.="&redirect_uri=".urlencode("http://localhost.com/");
		$url.="&client_secret=".$this->app["secret"];
		$url.="&code=$code";
		$response = file_get_contents($url);
		
		
		
		parse_str($response, $params);
		if (!isset($params['access_token'])) {
			return $this->login_failed();
		}
		$_SESSION["auth_facebook_token"] = $params['access_token'];
		$this->token = $_SESSION["auth_facebook_token"];
		$this->logged = true;

		$graph_url = "https://graph.facebook.com/me?access_token=" . $this->token;
		$user = json_decode(file_get_contents($graph_url));
		
		user_fblogin($user, $this->token, $this->userid);
		
		$this->username = $user->first_name;
		$this->userid = $user->id;
		$this->userlogin = $user->id;
		$_SESSION["auth_facebook_username"] = $this->username;
		$_SESSION["auth_facebook_userid"] = $this->userid;
		$_SESSION["auth_facebook_userlogin"] = $this->userlogin;
		
		return true;
	}
	
	function logout()
	{
		if (!$this->logged) return;
		$url = "http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
		$params = array( 'next' => $url );

		$logout = $this->facebook->getLogoutUrl($params);
		
		unset($_SESSION["auth_facebook_token"]);
		unset($this->token);
		$this->logged = 0;
		
		return 1;
		//header("Location: $logout");
		//exit();
	}
	
	function login_failed()
	{
		//print "FAILED";
		return 0;
	}
	
	
	function getPicture()
	{
		return get_fbuserPicture($this->userid);
	}
	
	function getName(){
		return $this->username;
	}
	

	
	function printLogin($pb)
	{
		if ($pb) {
			if (!$this->state) {
				$this->state = md5(rand());
				$_SESSION["auth_facebook_state"] = $this->state;
			}
			$url = "https://www.facebook.com/dialog/oauth?";
			$url .= "client_id=".$this->app["appId"];
			$url .= "&redirect_uri=".urlencode("http://localhost.com/");
			$url .= "&state=".$this->state;
			$url .= "&scope=offline_access,user_checkins,email,user_about_me,user_groups,user_events,friends_events,user_online_presence,publish_stream,offline_access,status_update,photo_upload,read_friendlists,manage_notifications,rsvp_event ";
			$boton="<img src=\"./images/fblogo.jpg\" style=\"cursor:pointer;width:150px;height:50px;\"";
			$boton.="onclick=\"window.location.href='".$url."'\"  />	";
			return $boton;
		}
	}
	
	function printLogout()
	{
		$r = "";
		$r.=("<a href=\"$logoutUrl\">");
		$r.=("</a>");	
		return $r;
	}



}

function get_fbuserPicture($uid)
{
	if ($uid) 
		return "http://graph.facebook.com/{$uid}/picture";
	return "";
}










?>
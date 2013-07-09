<?php


class auth_login extends auth
{
	var $client = "";
	var $oauth2 = "";
	var $picture = "";

	var $code = "";

	function __construct() {
		global $_SESSION;
		
		parent::__construct();
		


		if (isset($_SESSION["auth_login_token"])) {
		

			$token = $_SESSION["auth_login_token"];
			$user = get_user($token);
			

			if (!$user) {
				unset($_SESSION["auth_login_token"]);
				unset($_SESSION["auth_login_username"]);
				unset($_SESSION["auth_login_login"]);
				unset($_SESSION["auth_login_userid"]);
				unset($_SESSION["auth_login_picture"]);
				$this->logged = 0;
				return;
			}

			$this->token = $_SESSION["auth_login_token"];
			$this->userlogin = $user["login"];
			$this->username = $user["name"];
			$this->userid = $user["id"];
			$this->picture = $user["image_large"];
			$this->logged = true;
			
		}
		//exit(0);
		

	}
	
	function islogged()
	{
		return $this->logged;
	}
	function authid() {return "ll.".$this->logged;}
	function auth()
	{
		if (isset($_REQUEST["logout"]))
			return $this->logout();
			
		if ($this->logged) return false;
		
		if (isset($_REQUEST["loogged"])) {
			return 1;
		}
		
		if (isset($_REQUEST["totoken"]))
		{
			$_SESSION['auth_login_token'] = $_REQUEST["totoken"];
			$this->token = $_SESSION['auth_login_token'];
		}

		$user = get_user($this->token);
		if (!$user) 
			return 0;
		
		
		$this->logged = true;
		
		$this->userlogin = $user["login"];
		$this->username = $user["name"];
		$this->userid = $user["id"];
		$this->picture = $user["picture"];
		
		$_SESSION["auth_login_username"] = $this->username;
		$_SESSION["auth_login_userid"] = $this->userid;
		$_SESSION["auth_login_picture"] = $this->picture;
		$_SESSION["auth_login_login"] = $this->userlogin;
		
		$redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
		//header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));		
	
		return true;
	}
	function authHeader()
	{
?>


<style type="text/css">
.login_dialog .ui-dialog-titlebar { display:none; }

</style>


<script type="text/javascript">

 $(document).ready(function() {
	
	

});
	
function llogin()
{
	edialog(2);
	//$("#dialogo_login").dialog({dialogClass: "login_dialog", closeOnEscape: true, modal: true, resizable: false, draggable: true});
}



var dataerror = "";

function dologin(p)
{
	var login = $((p?"#namelr1":"#namell1")).val();
	var password=$((p?"#passwordlr1":"#passwordll1")).val();
	var email=(p?$("#emaillr1").val():"");
	var rname=(p?$("#rnamelr1").val():"");
	var rdate=(p?$("#datelr1").val():"");

	var todo = (p? "register": "login");
	
	$.ajax({url:"./", data: "do="+todo+ "&login="+encodeURIComponent(login)+"&password="+encodeURIComponent(password)+"&email="+encodeURIComponent(email)+
	"&name="+encodeURIComponent(rname)+"&date="+encodeURIComponent(rdate),
		type: "POST", dataType:"json", success:function(data){
		if (data.error) {
			pp = document.getElementById("pwderror");
			pp.style.display="inline";
			dataerror = data.error;
		}
		else {
			dataerror = "";
		}
	}, complete: function() {
		//if (!dataerror) 
			//setTimeout("window.location.reload(true);", 100);
	}
	});
	
	
}

function authtab(i)
{
	$(".tab").addClass("unselectedtab");
	$("#tab"+i).removeClass("unselectedtab");
	
	$(".loginform").addClass("invisiblek");
	
	var r = new Array();
	r[0] = "#login_dialog";
	r[1] = "#register_dialog";
	r[2] = "#llbuttons_dialog";
	
	$(r[i]).removeClass("invisiblek");
	
	

	$("#ss_register_dialog").validate({ 
		rules: { 
		  namelr1: "required",// simple rule, converted to {required:true} 
		  emaillr1: {// compound rule 
		  required: true, 
		  email: true 
		}, 

		passwordlr1: { 
		  required: true 
		  
		},
		passwordlr2: { 
		  required: true 
		  
		} 		
		}, 
		messages: { 
			namelr1: "Por favor, ingrese su nombre.",
			emaillr1: "Por favor, ingrese un correo v&aacute;lido.",
			passwordlr1: "Por favor, ingrese un password v&aacute;lido.",
		} 
	}); 				
	
}


</script>

<div id="s2" style="visibility:hidden;position:absolute;">

<div style="height:50px;width:100%;position:relative;margin-bottom:20px;">
	<div onclick="authtab(2);" class="tab " id="ss_tab2" style="position:absolute;top:0;left:0;height:50px;width:80px;border-right:1px solid;text-align:center;" >
	<h3 >Iniciar</h3>
	</div>
	<div onclick="authtab(0);" class="tab unselectedtab" id="ss_tab0" style="position:absolute;top:0;left:80px;height:50px;width:80px;border-right:1px solid;text-align:center;" >
	<h3 >Ingresar</h3>
	</div>
	<div onclick="authtab(1);" class="tab unselectedtab" id="ss_tab1" style="position:absolute;top:0;left:160px;height:50px;width:80px;border-left:1px solid;border-right:2px solid;text-align:center;" >
	<h3>Registrar</h3>
	</div>
	<div class="tab" style="cursor:auto !important; position:absolute;top:0;left:240px;height:50px; width:96px;border-bottom:2px solid;">&nbsp;</div>
</div>


<div class="loginform invisiblek" id="ss_register_dialog" style="padding:20px;padding-left:100px;padding-right:100px;">	
	<form id="ss_login" action="javascript:dologin(1);">
	
	<p>
	<label class="label" for="ss_namelr1">Usuario</label>
	<input id="ss_namelr1" name="ss_namelr1" type="text" value="" autocomplete="off" size="50"/>
	</p>	
	<p>
	<label class="label" for="ss_rnamelr1">Nombres</label>
	<input id="ss_rnamelr1" name="ss_rnamelr1" type="text" value="" autocomplete="off" size="50"/>
	</p>	
	<p>
	<label class="label" for="ss_emaillr1">Correo</label>
	<input id="ss_emaillr1" name="ss_emaillr1" type="text" value="" autocomplete="off" size="50"/>
	</p>
	<p>
	<label class="label" for="ss_rdatelr1">Fecha de Nacimiento</label>
	<input id="ss_rdatelr1" name="ss_rdatelr1" type="text" value="" autocomplete="off" size="50"/>
	</p>		
	<p>	
	<label class="label" for="ss_passwordlr1">Contrase&ntilde;a</label>
	<input id="ss_passwordlr1" name="ss_passwordlr1" type="password" value="" autocomplete="off" size="50"/>
	</p>		
	<p>
	<label class="label" for="ss_passwordlr2">Repite Contrase&ntilde;a</label>
	<input id="ss_passwordlr2" name="ss_passwordlr2" type="password" value="" autocomplete="off" size="50"/>
	</p>			
	<p style="text-align:center;"><input type="submit" value="Acceder"/><input type="button" value="Cancelar" onclick="edialog('');"/></p>
	</form>

</div>


<div class="loginform" id="ss_llbuttons_dialog" style="padding:20px;padding-left:100px;padding-right:100px;">	
	<p>
	Ingresar a trav&eacute;s de...<br/><br/>
	</p>
	<p  style="text-align:center;">
	<?php menu2(); ?>
	</p>
	

</div>

<div class="loginform invisiblek" id="ss_login_dialog" style="padding:20px;padding-left:100px;padding-right:100px;">
<div id="ss_dialogo_login" title="Iniciar sesi&oacute;n">
	<form id="ss_login" action="javascript:dologin(0);">
	<p>
	<label class="label" for="ss_namell1">Usuario</label>
	<input id="ss_namell1" name="ss_namell1" type="text" value="" autocomplete="off" size="50"/>
	</p>	
	<p>
	<label class="label" for="ss_passwordll1">Contrase&ntilde;a</label>
	<input id="ss_passwordll1" name="ss_passwordll1" type="password" value="" autocomplete="off" size="50"/>
	</p>		
   <p id="ss_pwderror" style="display:none;color:red;">Usuaro o contrase&ntilde;a inv&aacute;lidos</p>
	<p  style="text-align:center;"><input type="submit" value="Acceder"/><input type="button" value="Cancelar" onclick="edialog('');"/></p>
	</form>


</div>
</div>
</div>



<?php	
	
	}
	
	function login_failed()
	{
		print "FAILED";
		return 0;
	}
	
	function logout()
	{

		if (!$this->logged) return ;
		//if (isset($_REQUEST['logout'])) {
		
		  unset($_SESSION['auth_login_token']);
		//}
		$this->logged = 0;
	}	
	
	
	function getPicture()
	{
		if ($this->userid) 
			return filter_var($this->picture, FILTER_VALIDATE_URL);
	}
	
	function getName(){
		return $this->username;
	}
	

	
	function printLogin($pb)
	{
		if ($pb) {
			//$url = $this->client->createAuthUrl();
			$boton="<img src=\"./images/logo.gif\" style=\"cursor:pointer;width:150px;height:30px;\"";
			$boton.="onclick=\"authtab(0);\"  />	";
			return $boton;
		}
	}
	
	function printLogout()
	{

	}



}







?>
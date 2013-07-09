<html>
<head>

<script type="text/javascript" src="http://connect.facebook.net/es_LA/all.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

			
<script type="text/javascript">



FB.init({
	appId      : '421720104513992', // App ID
//	channelUrl : '//www.estudiantesdelinstante/channel.html', // Channel File
	status     : true, // check login status
	cookie     : true, // enable cookies to allow the server to access the session
	xfbml      : true  // parse XFBML
  });			

			  
			  
			  
</script>			  
</head>
<body>

<div id="fb-root"></div>



<div class="fb-login-button" data-show-faces="true" data-width="200" data-max-rows="1"></div>

<script>
/*
FB.login(function(response) {
        if (response.authResponse) {
            alert("si");// connected
        } else {
            alert("no");// cancelled
        }
    });
*/

FB.getLoginStatus(function(response) {
  if (response.status === 'connected') {
//	alert(response.authResponse.accessToken);

	window.tokend = response.authResponse.accessToken;
	$("#token").html(window.tokend);
	alert(window.tokend);
	
	//window.location="fbupdate.php?key="+response.authResponse.accessToken+message;
    // connected
  } else if (response.status === 'not_authorized') {
  alert("not_authorized");
    // not_authorized
  } else {
	alert("not");
    // not_logged_in
  }
 });
 
 function update()
 {
 window.location="fbupdate.php?key="+window.tokend;
 }
 
 function enviar(q)
 {
	$("input[name='access_token']").val(window.tokend);
	$("#m2").val($("#m1").val());
	if (q) $("#op").submit();
	else $("#oo").submit();
/*		$xPost=array();
		$xPost['access_token'] = window.token;
		$xPost['message'] = str_replace("\\n", "\n", $message);

		if ($q == 1)
			//$ch = curl_init('https://graph.facebook.com/223425221101722/feed'); 
			$ch = curl_init('https://graph.facebook.com/110594545686574/feed'); 
		if ($q == 0)
			$ch = curl_init('https://graph.facebook.com/100000065026573/feed'); 
		curl_setopt($ch, CURLOPT_VERBOSE, 1); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_HEADER, 1); 
		curl_setopt($ch, CURLOPT_TIMEOUT, 120);
		curl_setopt($ch, CURLOPT_POST, 1); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xPost); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);  
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
		curl_setopt($ch, CURLOPT_CAINFO, NULL); 
		curl_setopt($ch, CURLOPT_CAPATH, NULL); 
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0); 

		$result = curl_exec($ch); 
		if (!$result) print curl_error($ch);
		else print_r($result);*/
 }
 
 </script>
 
 <div id="token">
	
 </div>


<form id="oo" method="POST" action="https://graph.facebook.com/100000065026573/feed" target="_blank">
 <textarea name="message" id="m1">
  </textarea>
<input type="hidden" name="access_token">
<input type="button" value = "Enviarme" onclick="enviar(0);"/>
</form>
<form id="op" method="POST" action="https://graph.facebook.com/223425221101722/feed" target="_blank">
<input type="hidden" name="message" id="m2">
<input type="hidden" name="access_token">
<input type="button" value = "EnviarGR" onclick="enviar(1);"/>
</form>
<input type="button" onclick="update();"/>
  </body>
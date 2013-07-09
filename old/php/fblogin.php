<html>
<head>

<script type="text/javascript" src="http://connect.facebook.net/es_LA/all.js"></script>

			
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
	var message = '<?php print (isset($_REQUEST["message"])?"&message=".$_REQUEST["message"]:""); ?>';

	window.location="fbupdate.php?key="+response.authResponse.accessToken+message;
    // connected
  } else if (response.status === 'not_authorized') {
  //alert("not_authorized");
    // not_authorized
  } else {
	//alert("not");
    // not_logged_in
  }
 });
 </script>
 
</body>
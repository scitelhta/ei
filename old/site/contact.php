<?php
require_once(dirname(__FILE__)."/../php/dialog.php");
?>

<script type="text/javascript">
$(document).ready(function() {


	
	$(".signin").click(function(e) {
	
		edialog(1);
		e.preventDefault();
		$(".signin").toggleClass("menu-open");  

	});
	
	$(document).mouseup(function(e) {
		if($(e.target).parent("a.signin").length==0) {
			$(".signin").removeClass("menu-open");
			$("fieldset#signin_menu").hide();
		}
	});    

			
	$("#signin_menu #contact-form").validate({ 
		rules: { 
		  name: "required",// simple rule, converted to {required:true} 
		  email: {// compound rule 
		  required: true, 
		  email: true 
		}, 
		url: { 
		  url: true 
		}, 
		comment: { 
		  required: true 
		} 
		}, 
		messages: { 
			name: "Por favor, ingrese su nombre.",
			email: "Por favor, ingrese un correo v&aacute;lido.",
			url: "Por favor, ingrese una URL v&aacute;lida.",
			comment: "Por favor, escriba su mensaje." 
		} 
	}); 			
			
			
});
function contact()
{
	var form=document.getElementById("form-container");
	var name=$("#form-container").find("#name").val();
	var email=$("#form-container").find("#email").val();
	var url=$("#form-container").find("#url").val();
	var com=$("#form-container").find("#comment").val();


	$.ajax({url:"./", data: "do=contact&name="+encodeURIComponent(name)+"&email="+encodeURIComponent(email)+"&url="+encodeURIComponent(url)+"&com="+encodeURIComponent(com), type: "POST", dataType:"json", success:function(data){
		//e
	}});

	$(".signin").removeClass("menu-open");
	$("fieldset#signin_menu").hide();	

}
		
		
</script>

<div id="s1" style="visibility:hidden;position:absolute;">
<h1>Cu&eacute;ntanos</h1> <!-- Headings -->
<h2>Lo que tu silencio quiera expresarnos</h2>
	 
	<form id="ss_contact-form" name="ss_contact-form" action="javascript:contact();">    <!-- The form, sent to submit.php -->
<p>
<label class="label" for="ss_name">Nombre</label>
<input id="ss_name" name="ss_name" type="text" value="" autocomplete="off" size="50"/>
</p>
<p>
<label class="label"  for="ss_email">Correo Electr&oacute;nico</label>
<input id="ss_email" name="ss_email" type="text" value="" autocomplete="off" size="50"/>
</p>
<p>
<label class="label"  for="ss_url" >P&aacute;gina Web</label>
<input id="ss_url" name="ss_url" type="text" value="" autocomplete="off" size="50"/>
</p>
<p>
<label class="label"  for="ss_comment">Mensaje</label>
<textarea id="ss_comment" type="text" name="ss_comment" rows="10" cols="57"></textarea>
</p>
<p>
<input type="submit" value="Enviar"/>
	 </p>
	</form>
</div>


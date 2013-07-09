<?php
?>
<style type="text/css">

#eecreate 
{
	padding:20px;
	_text-align:center;

}

#eecreate form p { position:relative }
#eecreate label.label  { position:absolute; top:0; left:0}

#eecreate input  { 
 width: 203px;
 	font-size:10px;
	font-family:Tahoma,Arial,Sans-serif;
_position:relative; left:0; 
_z-index:-1;
}

#eecreate label.label{
	_text-transform:uppercase;
	font-size:10px;
	font-family:Tahoma,Arial,Sans-serif;
	_display: block;
    margin: 5px 5px 5px 6px;
    padding: 0;
    _width: 203px;	
}

#eecreate .error{
	_background-color:#AB0000;
	_color:white;
	font-size:8px;
	font-weight:bold;
	_margin-top:10px;
	_padding:10px;
	_text-transform:uppercase;
	_width:240px;
	_width: 250px; 
	display: block; 
	_float: left; 
	color: red; 
	padding-left: 10px; } 	
}

</style>
<script type="text/javascript">





function registrar()
{
	var form=document.getElementById("eecreate-form");
	var name=encodeURIComponent($("#eecreate-form").find("#eevname").val());
	var itime=encodeURIComponent($("#eecreate-form").find("#eevitime").val());
	var ftime=encodeURIComponent($("#eecreate-form").find("#eevftime").val());
	//var etime=encodeURIComponent($("#eecreate-form").find("#eevetime").val());
	///var person=encodeURIComponent($("#eecreate-form").find("#eevperson").val());
	var place=encodeURIComponent($("#eecreate-form").find("#eevplace").val());
	//var city=encodeURIComponent($("#eecreate-form").find("#eevcity").val());
	var url=encodeURIComponent($("#eecreate-form").find("#eevurl").val());
	var person = "";
	var city = "";

	var o = new Date().getTimezoneOffset();

	$.ajax({url:"./", data: "do=eventn&name="+name+"&itime="+itime+"&ftime="+ftime+"&person="+person+"&place="+place+"&city="+city+"&url="+url+"&offset="+o,
		type: "POST", dataType:"json", success:function(data){
		
		$("#eendone").html("Evento &quot;"+name+"&quot; agregado.");
		$("#eecreate-form").find("#eevname").val("");
		$("#eecreate-form").find("#eevitime").val("");
		$("#eecreate-form").find("#eevftime").val("");
		//$("#eecreate-form").find("#eevperson").val("");
		$("#eecreate-form").find("#eevplace").val("");
		//$("#eecreate-form").find("#eevcity").val("");
		$("#eecreate-form").find("#eevurl").val("");
			
			
//		eesetmonth(0);
//		$("#eecreate").dialog("close");
	}});


}

</script>

<div id="s3" style="visibility:hidden;position:absolute;">
<h1>Inv&iacute;tanos</h1> <!-- Headings -->

<div id="ss_eecreate" title="Nuevo Evento">

	<div style='margin: 10px auto 15px auto;width:220px;'>
		<div id="ss_eendone"></div>
			 
		<form id="ss_eecreate-form" name="ss_eecreate-form" action="javascript:registrar();">    <!-- The form, sent to submit.php -->
		<p>
		<label class="label" for="ss_eevname">Descripci&oacute;n del evento</label>
		<input id="ss_eevname" name="ss_eevname" type="text" value="" autocomplete="off" size="50"/>
		</p>
		<p>
		<label class="label"  for="ss_eevitime">Desde fecha</label>
		<input id="ss_eevitime" name="ss_eevitime" type="text" value="" readonly="readonly" autocomplete="off" size="50"/>
		</p>
		<p>		
		<label class="label"  for="ss_eevftime">Hasta fecha</label>
		<input id="ss_eevftime" name="ss_eevftime" type="text" value=""  readonly="readonly" autocomplete="off" size="50"/>
		</p>
<?php 
		//<p>		
		//<label class="label"  for="ss_eevperson">Responsable del Evento</label>
		//<input id="ss_eevperson" name="ss_eevperson" type="text" value="" autocomplete="off" size="50"/>
		//</p>
?>		
		<p>		
		<label class="label"  for="ss_eevplace" >Lugar en que se Realizar&aacute;</label>
		<input id="ss_eevplace" name="ss_eevplace" type="text" value="" autocomplete="off" size="50"/>
		</p>
<?php		
	//	<p>		
		//<label class="label"  for="ss_eevcity" >Ciudad/Pa&iacute;s en que se Realizar&aacute;</label>
		//<input id="ss_eevcity" name="ss_eevcity" type="text" value="" autocomplete="off" size="50"/>
		//</p>		
?>
		<p>		
		<label class="label"  for="ss_eevurl" >Direcci&oacute;n web</label>
		<input id="ss_eevurl" name="ss_eevurl" type="text" value="" autocomplete="off" size="50"/>
		</p>
		<input type="submit" value="Registrar"/>
			</form>
	</div>
</div>	
</div>

<script type="text/javascript">

		
function eregistrar()
{
	<?php if (!auth_islogged()): ?>
	edialog(2);
	<?php else: ?>
	edialog(3);
	<?php endif; ?>
		
	$("label").inFieldLabels();
	$( "#eevitime" ).text("");
	$( "#eevftime" ).text("");

	$( "#eevitime" ).datetimepicker({dateFormat: 'yy-mm-dd'});
	$( "#eevftime" ).datetimepicker({dateFormat: 'yy-mm-dd'});


		$("#eecreate form").validate({ 
			rules: { 
			  eevname: "required",// simple rule, converted to {required:true} 
			  eevitime: {// compound rule 
			  required: true
			}, 
			eevurl: { 
			  required: true,
			  url: true 
			}, 
			eevplace: { 
			  required: true 
			} 
			}, 
			messages: { 
				eevname: "Por favor, ingrese la descripci&oacute;n del evento.",
				eevitime: "Por favor, ingrese la fecha/hora del evento",
				eevurl: "Por favor, ingrese una URL v&aacute;lida.",
				eevplace: "Por favor, ingrese el lugar del evento." 
			} 
		}); 		
		var cityTags = [
		<?php print_city_tags(); ?>
	];
		var placeTags = [
		<?php print_place_tags(); ?>
	];

			$( "#eevcity" ).autocomplete({
				source: cityTags
			});
			$( "#eevplace" ).autocomplete({
				source: placeTags
			});	

}		
		
</script>

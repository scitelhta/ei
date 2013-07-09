<?php
?>

<script type="text/javascript">

function esetevs(evs)
{
	//var eventos = "<thead><tr> <th>Fecha Inicio</th> <th>Fecha Fin</th><th>Evento</th>  <th>Responsable</th> <th>Lugar</th><th>Ciudad</th><th style='width:50px'>Enlace</th> </tr> </thead> <tbody> ";
	var eventos = "<thead><tr> <th>Fecha Inicio</th> <th>Fecha Fin</th><th>Evento</th>  <th>Lugar</th><th style='width:50px'>Enlace</th> </tr> </thead> <tbody> ";
	var l = evs.length;	
		



		
	for(i = 0; i < l; i++) {
		var e = evs[i];
		
		var em = "";
		
		if (e["personad"] && (e["personad"].indexOf("noreply")<0)) {
			em = " <a href='mailto:"+e["personad"]+"'> (@)</a>";
		}
		
		var tz = new Date().getTimezoneOffset() / -60;
		
		eventos = eventos + "<tr>"+
			"<td class='eeetime'>"+e["itime"]+"</td>"+
			"<td class='eeetime'>"+e["ftime"]+"</td>"+
			"<td class='eeename'>"+e["name"]+"</td>"+
			//"<td class='eeeperson'>"+e["person"]+em + "</td>"+
			"<td class='eeeplace'>"+e["place"]+"</td>"+
			//"<td class='eeecity'>"+e["city"]+"</td>"+
			"<td align='center' class='eeelink'><a   target='_blank' href='"+ e["url"] + "'><img src='./images/link.png' style='width:35px;height:15px'></a></td>"+
		"</tr>";
	}

	eventos = eventos + "</tbody>";
	
	$("#eenevents").show();
	$("#eenevents").html(eventos);
	$("#eenevents").tablesorter(); 
	
	
	


}

function eproximos() {

		var i;
		var evs = "";
		
		var today =  new Date();	
		var y = today.getFullYear();
		var m = today.getMonth();
		var d = today.getDate();
		var w = today.getDay();		
		var o = today.getTimezoneOffset();
	
		$.ajax({url:"./", data: "do=eenext&year="+y+"&month="+m+"&day="+d+"&offset="+o, type: "POST", dataType:"json", success:function(data){
		if (data.error) {
			return;
		}
		else {
			evs = data;

			esetevs(evs.events);
			
			
		}
	}});	
		
}

</script>



<div style="position:relative;">
	
<h2 style="text-align:center;">Pr&oacute;ximos Eventos</h2>	
	
<div  style="position:absolute;right:0px;top:-20px;" class="boton" onclick="eregistrar();"><img src="./images/eregistrar.png"/><br/>Registrar Evento</div>
	
	
<table id="eenevents" class="tablesorter">



</table>

</div>

<script type="text/javascript">
eproximos();
</script>


</br/>
</br/>
</br/>
</br/></br/>
</br/></br/></br/></br/></br/></br/>
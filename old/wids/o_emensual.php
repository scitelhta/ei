<?php


function hoytime()
{
	if (isset($_SESSION["eeyear"])) {
		$y = $_SESSION["eeyear"];
		$m = $_SESSION["eemonth"];
		$d = $_SESSION["eeday"];
		return mktime(10, 0, 0, $m + 1, $d, $y);
	}
	else {
		return time();
	}


}	

?>

<style type="text/css">

.eecalendar {
	max-width: 850px;
}

.eemonthdiv {
	padding: 20px;
    text-align: center;
	font-size: 30px;
	position: relative;
}


.eetoday {
	padding: 10px;
    text-align: center;
	font-size: 18px;
	position: relative;
}



.eehoy {
	padding: 0px;
    text-align: center;
	font-size: 12px;
	position: relative;
	height: 0px;
	cursor:pointer;
}

.eemonth {
	text-align: center;
	height: 50px;
}

.eemonth a{
text-decoration: none;
color: inherit;
}

table.tablesorter a{
text-decoration: none;
color: inherit;
}


.eemonth a#eebk {
	left: -20px;
    position: relative;
}

.eemonth a#eeff {
	left: 20px;
    position: relative;
}

.eeclear {
clear: both;
}

.eedays {
	text-align: center;
	border: 0 none;
    font-size: 100%;
    margin: 0;
    outline: 0 none;
    padding: 0;
    vertical-align: baseline;
	line-height: 1;

}

.eedays ul {
	top: 0;
	height: 50px;
	position: relative;
	top: 0;
	max-width: 850px;
	margin:0;
	margin-top:20px;
	padding:0;
	text-align:center;
}

.eedays li {
    background: none repeat scroll 0 0 transparent;
    
    float: left;
    
    font-size: 15px;
    line-height: 100% !important;
    list-style: none outside none;
    padding: 10px 5px 5px;
    max-width: 13px;
	
	cursor:pointer;
}

.eedays .day0 {
	width: 45px;
	text-align: right;
}

.eedays .day1 {
	background: url('./images/eeactive.png')  no-repeat;
	background-size: 100%;
	background-position: 0 3px;	
}

.eedays .day1.day3 {
	background: url('./images/eeactivebusy.png')  no-repeat;
	background-size: 100%;
	background-position: 0 3px;	
}

.eedays .day2 {
	font-weight: bold;
	color: blue;
	_text-decoration; underline;
}

.eedays .day3 {
	background: url('./images/eebusy.png') no-repeat;
	background-size: 100%;
	background-position: 0 3px;
}

.eedays .day4 {
	color: red;
}

#eedyears ul {
	margin-left: 0;
	padding-left: 0em;
	margin-top: 0;
	padding-top: 0em;	
}

#eedmonth {
	text-align: center;	
}

#eedmonths ul {
	margin-left: 0;
	padding-left: 0em;
	margin-top: 0;
	padding-top: 0em;	
}

#eedyears li {
    _background: none repeat scroll 0 0 transparent;
    
    float: left;
    
    font-size: 15px;
    line-height: 100% !important;
    list-style: none outside none;
    width: 36px;
    padding: 0px 5px 0px 0px;
	margin: 0;
	cursor: pointer;	
}

#eedmonths li {
    _background: none repeat scroll 0 0 transparent;
    
    float: left;
	text-align: center;
    
    font-size: 12px;
    line-height: 100% !important;
    list-style: none outside none;
    width: 20px;
	_height: 20px;
    padding: 0px 5px 0px 0px;
	margin: 0;
	cursor: pointer;
}


.eeyyear1 {
	background: url('./images/eebusy2.png') no-repeat;
	background-size: 36px 24px;
	_background-clip: border-box;
}

.eeyyear2 {
	background: url('./images/eeactive2.png') no-repeat;
	background-size: 36px 24px;
	_background-clip: border-box;
}

.eeyyear1.eeyyear2 {
	background: url('./images/eeactivebusy2.png') no-repeat;
	background-size: 36px 24px;	
}

.eeyyear3 {
	font-weight: bold;
	color: blue;
}

.eeymonth1 {
	background: url('./images/eebusy2.png') no-repeat;
	background-size: 22px 14px;
	_background-clip: border-box;
}

.eeymonth2 {
	background: url('./images/eeactive2.png') no-repeat;
	background-size: 22px 14px;
	_background-clip: border-box;
}

.eeymonth3 {
	font-weight: bold;
	color: blue;
}

.eeymonth1.eeymonth2 {
	background: url('./images/eeactivebusy2.png') no-repeat;
	background-size: 22px 14px;
}

.alert .ui-dialog-titlebar { display:none; }

.eeevents ul {
	text-align:center;
}

.eeevents li {
    background: none repeat scroll 0 0 transparent;
    
    float: left;
    
    font-size: 14px;
    line-height: 100% !important;
    list-style: none outside none;
    width: 100%;
    padding: 0px 0px 0px 0px;
	margin: 0;
	text-align: center;
	_cursor: pointer;
}

.eeevents li .eeetime {
	width: 50px;
	float: left;
	word-wrap: break-word;
}

.eeevents li .eeename {
    font-size: 12px;
	width: 250px;
	float: left;
	text-align: left;	
}

.eeevents li .eeename a{
	text-decoration: none;
	color: inherit;
}

.eeevents li .eeeperson {
	width: 50px;
	float: left;
	text-align: left;
}

.eeevents li .eeeplace {
	width: 50px;
	float: left;
}


</style>


<script type="text/javascript">

var mon=new Array();
mon[0]="Ene";
mon[1]="Feb";
mon[2]="Mar";
mon[3]="Apr";
mon[4]="May";
mon[5]="Jun";
mon[6]="Jul";
mon[7]="Ago";
mon[8]="Sep";
mon[9]="Oct";
mon[10]="Nov";
mon[11]="Dic";

var week = new Array();
week[0] = "Domingo";
week[1] = "Lunes";
week[2] = "Martes";
week[3] = "Mi&eacute;rcoles";
week[4] = "Jueves";
week[5] = "Viernes";
week[6] = "S&aacute;bado";


var public_eedays;
var public_eemonths;
var public_date;



function daysInMonth(iMonth, iYear)
{
	return 32 - new Date(iYear, iMonth, 32).getDate();
}




function eesetdate(edate)
{
	public_date = edate;
	var y = edate.getFullYear();
	var m = edate.getMonth();
	var d = edate.getDate();
	var w = edate.getDay();

	var data = public_days;
	var today = new Date();	
	
		
	var dias="";
	var mm=daysInMonth(m, y);
	for (i=1; i<=mm; i++)
	{	
		var cl = "";
		if (i == 1) cl = cl + " day0";
		if ((y == today.getFullYear()) && (m == today.getMonth()) && (i == today.getDate())) cl = cl + " day2";
		if (data.days[i]) cl = cl + " day1";
		if (i == d) cl = cl + " day3";
		
		if (i%7 == ((d + 7 - w) % 7)) cl = cl + " day4";
		
		
		dias = dias + "<li class='eeday "+cl+"' onclick='eeclick("+i+")'>"+ ((i < 10 ? '0' : '') + i)+ "</li>";
		if (i == 14) dias = dias;// + "<br/>";

	}
	
	$("#eeldays").html(dias);
	
	
	$("#eetoday").html(week[w] + " " + d);// + " " + mon[m] + " " + y);
	
	$("#eelevents").html("");	
	
	var eventos = "";
	
	if (data.days[d]) {
		var ddd = data.days[d];
		var l = ddd.length;


		var i;
		
		//eventos = "<thead><tr> <th>Fecha Inicio</th> <th>Fecha Fin</th><th>Evento</th>  <th>Responsable</th> <th>Lugar</th> <th>Ciudad</th><th style='width:50px'>Enlace</th></tr> </thead> <tbody> ";
		eventos = "<thead><tr> <th>Fecha Inicio</th> <th>Fecha Fin</th><th>Evento</th>  <th>Lugar</th><th style='width:50px'>Enlace</th></tr> </thead> <tbody> ";
		
		
		for(i = 0; i < l; i++) {
			var e = ddd[i];
			
			var em = "";
			
			if (e["personad"] && (e["personad"].indexOf("noreply")<0)) {
				em = " <a href='mailto:"+e["personad"]+"'> (@)</a>";
			}			
			
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
		
		$("#eelevents").show();
		$("#eelevents").html(eventos);
		
		$("#eellevents").html("");
	
	}
	if (!eventos) {
			eventos = "<li><div class='eename'>(No hay eventos registrados para este d&iacute;a.)</div></li>";
			$("#eellevents").html(eventos);
			$("#eelevents").hide();
		}
		
	$("#eelevents").tablesorter(); 

}

function eesetmonth(edate)
{
	if (!edate) edate = public_date;
	var y = edate.getFullYear();
	var m = edate.getMonth();
	var d = edate.getDate();
	var w = edate.getDay();
	var o = new Date().getTimezoneOffset();

	$("#eem").html(mon[m]);
	$("#eey").html(y);//(d < 10 ? '0' : '') + d);
	
	$.ajax({url:"./", data: "do=eedays&year="+y+"&month="+m+"&day="+d+"&offset="+o, type: "POST", dataType:"json", success:function(data){
		if (data.error) {
		}
		else {
			public_days = data;
			

			
			eesetdate(edate);
		}
	}});	

}

function eeplus(p)
{
	public_date.setMonth(public_date.getMonth() + p);
	eesetmonth(public_date);
}

function eed(bb)
{
	edate = public_date;
	var y = edate.getFullYear();
	var m = edate.getMonth();
	var d = edate.getDate();
	var w = edate.getDay();
	var today = new Date();
	var o = new Date().getTimezoneOffset();
	
	ty = today.getFullYear();
	

	$.ajax({url:"./", data: "do=eemonths&year="+y+"&month="+m+"&day="+d+"&offset="+o, type: "POST", dataType:"json", success:function(data){
		if (!data.error) {
			public_months = data;
			
			var anos = "";
			for(i = -2; i < 5; i++) {
				var cl = "eeyyear";
				if (i + ty == y) cl = cl + " eeyyear1";
				if (data["years"][i+ty]) cl = cl + " eeyyear2";
				if (i + ty == today.getFullYear()) cl = cl + " eeyyear3";
				
				anos = anos + "<li class='"+cl+"' name='"+(i+ty)+"'>"+ (i + ty) + "</li>";
			}
			$("#eedlyears").html(anos);
			
			var meses = "";
			for(i = 0; i < 12; i++) {
				var cl = "eeymonth";
				if (i == m) cl = cl + " eeymonth1";
				if ((data["years"][y]) && (data["years"][y].indexOf((i + 1).toString()) >= 0)) cl = cl+" eeymonth2";
				if ((y == today.getFullYear()) && (i == today.getMonth())) cl = cl + " eeymonth3";
				
				meses = meses + "<li class='"+cl+"' name='"+i+"'>"+mon[i]+"</li>";
			}
			$("#eedlmonths").html(meses);
			
			if (bb) {
				$("#eedmonth").dialog({dialogClass: 'alert' ,height: 100, width: 340, dialogClass: 'alert', resizable: false});
				$(document).click(function(e) {
					if ((e.target.id != "eedmonth") && (e.target.nodeName != "LI") && (e.button == 0)) {
						$("#eedmonth").dialog("close");
					}
				});	
			}
				
				$("#eedmonths li").click(function(e) {
				
					var k = e.target;
					var i = k.attributes["name"].nodeValue;
					m = i;	 
					public_date.setMonth(m);
					eesetmonth(public_date);
					eed(0);
					$("#eedmonth").dialog("close");
					
				});
				
				$("#eedyears li").click(function(e) {
					var k = e.target;
					var i = k.attributes["name"].nodeValue;
					y = i;	
					public_date.setFullYear(y);
					eesetmonth(public_date);
					eed(0);
					//$("#eedmonth").dialog("close");

				});		
			//}
		}
		else {

		}
	}});
}

function eeclick(k) {

		public_date.setDate(k);
		eesetdate(public_date);		
}

function eefunctions() {

	
	$("#eem").click(function(e) {
		eed(1);
	});
	$("#eey").click(function(e) {
		eed(1);
	});
	$("#eebk").click(function(e) {
		eeplus(-1);
	});
	$("#eeff").click(function(e) {
		eeplus(1);
	});
	
	$("#eehoy").click(function(e) {
		var d = new Date();
		eesetmonth(d);
	});

	
	$.datepicker.setDefaults($.datepicker.regional["es"]);
	$("#eevitime").datepicker({dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"], dateFormat: "yy-mm-dd", monthNames: mon});
	$("#eevftime").datepicker({dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"], dateFormat: "yy-mm-dd", monthNames: mon});

	$.validator.addMethod(
		"eeDate",
		function(value, element) {
			if (value == "") return 1;
			// put your own logic here, this is just a (crappy) example
			return value.match(/^\d\d\d\d\-\d\d?\-\d\d?$/);
		},
		"Please enter a date in the format yyyy-mm-dd"
	);
	
		
	$("#eecreate #eecreate-form").validate({ 
        rules: { 
            eevname: {
				required: true
			},
            eevitime: {// compound rule 
	          required: true, 
	          eeDate: true 
	        }, 
            eevftime: {// compound rule 
	          //required: true, 
	          eeDate: true 
	        }, 			
	        eevurl: { 
	          url: true 
	        }, 
	        }, 
	        messages: { 
				name: "Por favor, ingrese la descripci&oacute;n del evento.",
				eevitime: "Por favor, ingrese la fecha de inicio del evento.",
				eevurl: "Por favor, ingrese una direcci&oacute;n URL v&aacute;lida.",
	        } 
	      }); 		
}	

	
$(document).ready(function() {
	var eedate= <?php print hoytime(); ?>;
	var d=new Date();
	d.setTime(eedate * 1000);
	eesetmonth(d);
	
	eefunctions();
	});	
	

	

		
</script>




<h2 style="text-align:center;">Calendario de Eventos</h2>


<div id="calendar" class="eecalendar">

<div  style="position:absolute;right:0px;top:-20px;" class="boton" onclick="eregistrar();"><img src="./images/eregistrar.png"/><br/>Nuevo Evento</div>

	<div class="eemonthdiv">
		<div class="eemonth">
			<a id="eebk" href="javascript:void(0);">&lt;&lt;</a>
			<a id="eem" href="javascript:void(0);" ></a>
			<a id="eey" href="javascript:void(0);"></a>
			<a id="eeff" href="javascript:void(0);">&gt;&gt;</a>
		</div>
		<div class="eehoy" id="eehoy">(Hoy)</div>
		<div id="eedays" class="eedays">
			<ul id="eeldays">
			</ul>
		</div>
		<!--div class="eeclear"></div-->
		<div class="eetoday" id="eetoday">
		
		</div>
		
	
		<!--div class="eeclear"></div-->
		<div class="eeevents">
			<table id="eelevents" class="tablesorter">

			
			</table>
			<div id="eellevents"></div>
		</div>
	</div>

	<div id="eedmonth" style="display:none;" title="Mes/A&ntilde;o">
		<div id="eedyears">
			<ul id="eedlyears">
			</ul>
		</div>
		<div class="eeclear"></div>
		<div id="eedmonths">
			<ul id="eedlmonths">
			</ul>
		</div>
	</div>	
	
	
	</div>
	
</div>

</br/>
</br/>
</br/>
</br/></br/>
</br/></br/></br/></br/></br/></br/>
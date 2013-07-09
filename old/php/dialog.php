


<style type="text/css">

.clear{
	clear:both;
}

#main-container{
	width:400px;
	margin:30px auto;
background-color: #0D0385;	
}
#form-container{
	background-color:#f5f5f5;
	_padding:15px;
	_padding-bottom:15px;
	_padding-top:15px;
	
	-moz-border-radius:12px;
	-khtml-border-radius: 12px;
	-webkit-border-radius: 12px;
	border-radius:12px;
	position: relative;
}

#form-container #ss {
	padding:15px;
	position: relative;
	left: 0;
	top: 0;
	
}


#form-container td{
	white-space:nowrap;
}

#form-container a, a:visited {
	color:#00BBFF;
	text-decoration:none;
	outline:none;
}

#form-container a:hover{
	text-decoration:underline;
}

#form-container h1{
	color:#777777;
	font-size:22px;
	font-weight:normal;
	text-transform:uppercase;
	margin-top: 0px;
	margin-bottom:5px;
	text-align:center;
}

#form-container h2{
	font-weight:normal;
	font-size:10px;
	
	text-transform:uppercase;
	
	color:#aaaaaa;
	margin-bottom:15px;
	
	border-bottom:1px solid #eeeeee;
	margin-bottom:15px;
	padding-bottom:10px;
	
	text-align: center;
}

#form-container label.label{
	_text-transform:uppercase;
	font-size:10px;
	font-family:Tahoma,Arial,Sans-serif;
	display: block;
    margin: 5px 5px 5px 6px;
    padding: 0;
    width: 380px;	
}

#form-container textarea{
	color:#404040;
	font-family:Arial,Helvetica,sans-serif;
	font-size:12px;
}

#form-container td > button{
	text-indent:8px;
}

#form-container .error{
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

#loading{
	position:relative;
	bottom:9px;
	visibility:hidden;
}

#form-container .tutorial-info{
	color:white;
	text-align:center;
	padding:10px;
	margin-top:10px;
}
#signin_menu {
    -moz-border-radius-topleft:5px;
    -moz-border-radius-bottomleft:5px;
    -moz-border-radius-bottomright:5px;
    -webkit-border-top-left-radius:5px;
    -webkit-border-bottom-left-radius:5px;
    -webkit-border-bottom-right-radius:5px;
    display:none;
    _background-color:#ddeef6;
	background-color: #0D0385;	
    position:absolute;
	_position:relative;
    width:410px;
    z-index:10000;
	
    border:1px transparent;
    text-align:left;
    padding:12px;
    top: 0px;
    _right: auto;
	_left: 250px;
	_margin-left: -100px;
	_margin-top:0px;
    _margin-right: 0px;
    _margin-right: -1px;
    color:#789;
    font-size:11px;	
}

.signin_menu1 {
	left: 200px;
}

.signin_menu2 {
	right: 0px;
}



#signin_menu input[type=text],#signin_menu input[type=password] {
    display:block;
    -moz-border-radius:4px;
    -webkit-border-radius:4px;
    border:1px solid #ACE;
    font-size:13px;
    margin:0 0 5px;
    padding:5px;
    width:203px;
}
#signin_menu p {
    margin:0;
}

#signin_menu form p { position:relative }
#signin_menu label.label  { position:absolute; top:0; left:0}

#signin_menu a {
    color:#6AC;
}
#signin_menu label {
    font-weight:normal;
}
#signin_menu p.remember {
    padding:10px 0;
}
#signin_menu p.forgot, .signin_menu p.complete {
    clear:both;
    margin:5px 0;
}
#signin_menu p a {
    color:#27B!important;
}
#signin_submit {
    -moz-border-radius:4px;
    -webkit-border-radius:4px;
    background:#39d url('images/bg-btn-blue.png') repeat-x scroll 0 0;
    border:1px solid #39D;
    color:#fff;
    text-shadow:0 -1px 0 #39d;
    padding:4px 10px 5px;
    font-size:11px;
    margin:0 5px 0 0;
    font-weight:bold;
}
#signin_submit::-moz-focus-inner {
padding:0;
border:0;
}
#signin_submit:hover, #signin_submit:focus {
    background-position:0 -5px;
    cursor:pointer;
}

#topnav {
	
}

.label {
_cursor:text;
}

.tab {
	cursor:pointer;
	border-color: #0D0385 !important;
}

.unselectedtab {
	border-bottom:2px solid;
}

.unselectedtab h1{
	color:#aaaaaa !important;
}

#ss2 h1 {
	margin-top: 20px !important;
}

.invisiblek {
	visibility:hidden !important;
	position: absolute !important;
}


  </style>

<script type="text/javascript">

var lasts = 0;

function edialog(s) {

	var c = 0;
	
	
	$("fieldset#signin_menu").removeClass("signin_menu" + lasts);
	$("fieldset#signin_menu").toggleClass("signin_menu"+s);	
	
	
	if (s && (lasts == s)) c = 1;

	if (!c) 	$("#ss").html("");
	

	

	if (!s)  {
		lasts = 0;
		$("fieldset#signin_menu").toggle();	
		return;
	}
	
	lasts = s;
	
	
	
	if (!c) $("#ss").html($("#s" + s).html().replace(/ss_/g, "" ));
	$("label").inFieldLabels();


	
	if (!c) 
		$("fieldset#signin_menu").toggle();
	else
		$("fieldset#signin_menu").show();		

}

function edialog2(ss, s) {

	var c = 0;
	$("fieldset#signin_menub").removeClass("signin_menub2");
	$("fieldset#signin_menub").removeClass("signin_menub1");
	
	$("fieldset#signin_menu").toggleClass(((ss == "ssb1")?"signin_menub1":"signin_menub2"));
	
	if ($("#ssb1").html()) {
		if ("ssb1"!=ss) c = 1;
		$("#sb1").html($("#ssb1").html());
		$("#ssb1").html("");
		
	}
	if ($("#ssb2").html()) {
		if ("ssb2"!=ss) c = 1;
		$("#sb2").html($("#ssb2").html());
		$("#ssb2").html("");

	}

	if (!ss)  {
		$("fieldset#signin_menub").toggle();	
		return;
	}
	
	$("#" + ss).html($("#" + s).html());
	$("#" + s).html("");
	$("label").inFieldLabels();

	
	if (!c) 
		$("fieldset#signin_menub").toggle();
	else
		$("fieldset#signin_menub").show();		

}

$(document).ready(function() {



	$("fieldset#signin_menu").mouseup(function() {
		return false
	});
	
        

			
});

		
</script>


<fieldset class="sigin_menu" id="signin_menu">
   
<div class="main-container" id="main-container"> <!-- The main container element -->

<div class="form-container" id="form-container"> <!-- The form container -->
<div id="ss"></div>



</div>
</div>



</fieldset>



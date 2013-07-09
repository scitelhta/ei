<script>




function prueba()
{
    var facepad_xmlhttp;
	    var facebookURLrequest = "./e.php";
   if(!facepad_xmlhttp && typeof XMLHttpRequest!='undefined') {
      facepad_xmlhttp = new XMLHttpRequest();
    }  
    facepad_xmlhttp.open("GET", facebookURLrequest);
    facepad_xmlhttp.onreadystatechange = function() {      
      if (facepad_xmlhttp.readyState == 4 && facepad_xmlhttp.status == 200) {
	
      		var tt = facepad_xmlhttp.responseText;
			var photoURL3 = /(http:[a-zA-Z./\-\\\\\_0-9]*photos[a-zA-Z./\-\\\\\_0-9]*\.jpg)/g;

			var matches3 = tt.match(photoURL3);
			alert(matches3.length);
			for(i=0;i<matches3.length;i++){
				var s = matches3[i];
				alert(s);
			}
		}
		
	};
	
	facepad_xmlhttp.send(null);
		

}

prueba();

</script>
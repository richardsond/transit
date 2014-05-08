<?php

?>

<!DOCTYPE html>
<html>
<body>

<script>
if (navigator.geolocation)
{
	navigator.geolocation.getCurrentPosition(getPosition);
}
else
{ 
	alert("Geolocation is not supported by this browser.");
}

function getPosition(position)
  {
  alert("Latitude: " + position.coords.latitude + 
  "\nLongitude: " + position.coords.longitude);	
  
  /* http://api.winnipegtransit.com/stops?distance=250&lat=49.895&lon=-97.138&api-key=zWiJ9RXbXmBPJ1CdBxoC */ 
  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  	xmlhttp=new XMLHttpRequest();
  }
  else
  {// code for IE6, IE5
  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
	xmlhttp.open("GET","http://api.winnipegtransit.com/stops?distance=250&lat=" + position.coords.latitude + "&lon=" + position.coords.longitude + "&api-key=zWiJ9RXbXmBPJ1CdBxoC",false);
	xmlhttp.send();
	xmlDoc=xmlhttp.responseXML;
	
	parser = new DOMParser();
	xmlDoc = parser.parseFromString(xmlhttp.responseXML, "text/xml");
	
	alert(xmlDoc);
  }
</script>
</body>
</html>
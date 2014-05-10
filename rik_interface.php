
<?php
session_start();
?>

<html>
<script src="mohit.js"></script>

<button onclick="on()">on</button>
<button onclick="off()">off</button>
<div style="display:none" id="hd"><?php echo $_SESSION["id"]; ?></div>
<div id="output"></div>
<script>
var z= document.getElementById("hd").innerHTML ;
var loop;var longitude; var latitude;
function on()
{

loop=setInterval(update,30000);
	if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition);
    }
  else{document.getElementById("output").innerHTML = "Geolocation is not supported by this browser."; return ;}
  
function showPosition(position)
  {
  latitude=position.coords.latitude ; 
  longitude=position.coords.longitude; 

 $.ajax({
  type: "post",
  url: "rikshaw.php",
  data: {type:0,lat:latitude,lon:longitude,id:z}
})
  .done(function( msg ) {
    document.getElementById("output").innerHTML=msg+"ouput set at "+latitude+"  "+longitude;
  });

  }

    
 /* $.ajax({
  type: "post",
  url: "rikshaw.php",
  data: {type:0,lat:latitude,lon:longitude,id:z}
})
  .done(function( msg ) {
    document.getElementById("output").innerHTML=msg;
  });
*/
}

function off()
{
  document.getElementById("output").innerHTML="ouput deleted of id"+z;
clearInterval(loop);
$.ajax({
  type: "post",
  url: "rikshaw.php",
  data: {type:2,lat:latitude,lon:longitude,id:z}
})
  .done(function( msg ) {
    document.getElementById("output").innerHTML=msg;
  });

}

function update()
{

if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition);
    }
  else{document.getElementById("output").innerHTML = "Geolocation is not supported by this browser."; return ;}
  
function showPosition(position)
  {
  latitude=position.coords.latitude ; 
  longitude=position.coords.longitude; 
  $.ajax({
  type: "post",
  url: "rikshaw.php",
  data: {type:1,lat:latitude,lon:longitude,id:z}
})
  .done(function( msg ) {
    document.getElementById("output").innerHTML=msg+"ouput updated of id"+z+" at lat="+latitude+" longitude "+longitude;
  });
  }


/*

	*/
}
</script>


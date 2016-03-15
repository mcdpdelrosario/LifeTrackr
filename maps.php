<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>LifeTrackr</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="moments.css" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
	    $("#moments-but").click(function(){
	        $("#center-pane").load("moments.php");
	    });
	});
	</script>
</head>
<body>

<?php

session_start();
	$con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } else {

	}
?>
	
	<div class="content container">
		<div class="maps">
						<section id="wrapper">
							<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
							    <article>

							    </article>
							<script>
							function success(position) {
							  var mapcanvas = document.createElement('div');
							  mapcanvas.id = 'mapcontainer';
							  mapcanvas.style.height = '400px';
							  mapcanvas.style.width = '600px';

							  document.querySelector('article').appendChild(mapcanvas);

							  var coords = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
							  
							  var options = {
							    zoom: 15,
							    center: coords,
							    mapTypeControl: false,
							    navigationControlOptions: {
							    	style: google.maps.NavigationControlStyle.SMALL
							    },
							    mapTypeId: google.maps.MapTypeId.ROADMAP
							  };
							  var map = new google.maps.Map(document.getElementById("mapcontainer"), options);

							  var marker = new google.maps.Marker({
							      position: coords,
							      map: map,
							      title:"You are here!"
							  });
							}

							if (navigator.geolocation) {
							  navigator.geolocation.getCurrentPosition(success);
							} else {
							  error('Geo Location is not supported');
							}

							</script>
						</section>
					</div>
	</div>


</body>
</html>
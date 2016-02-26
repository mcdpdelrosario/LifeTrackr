<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>LifeTrackr</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="userpage.css" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<?php
	session_start();

?>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
		  	<ul class="nav navbar-nav">
				<li>
					<a href="#"><span class="glyphicon glyphicon-home"></span> Home</a>
				</li>
				<li>
					<a href="#"><span class="glyphicon glyphicon-film"></span> Moments</a>
				</li>
				<li>
					<a href="#"><span class="glyphicon glyphicon-bell"></span> Notifications</a>
				</li>
		  	</ul>
		  	<div class="navbar-brand"
>		  		LifeTrackr
		  	</div>
		  	<ul class="nav navbar-nav navbar-right">
		  		<li>
		  			<div class="inner-addon left-addon">
			      		<i class="glyphicon glyphicon-user"></i>
	    				<input type="text" class="form-control test" placeholder=" Search">
	    			</div>
		      	</li>
		      	<li>
		      		<a href="#"><img class="iconimg"src="img.jpg"> <?=$_SESSION["emailmo"]?></a>
		      	</li>
		      	<li>
		      		<a href="#"><span class="glyphicon glyphicon-cog"></span></a>
		      	</li>
		    </ul>
		</div>
	</nav>

<div class="maps">
	<section id="wrapper">
		Click the allow button to let the browser find your location.

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
</body>
</html>
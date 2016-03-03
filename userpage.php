<html lang="en">
<head>
  <title>LifeTrackr</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <link href="userpage.css" rel="stylesheet">
  <link href="sidebar.css" rel="stylesheet">
  <!-- <link href="css/simple-sidebar.css" rel="stylesheet"> -->

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-QcrS-bymcrFPClDmuA4A3RMVZsvQCuQ&signed_in=true"></script>
	<script>
	  // In the following example, markers appear when the user clicks on the map.
	  // Each marker is labeled with a single alphabetical character.
	  var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	  var labelIndex = 0;
	  var map;
	  var userPosition;
	  function initialize() {
	    var philippines = { lat: 13, lng: 122 };
	    map = new google.maps.Map(document.getElementById('map'), {
	      zoom: 6,
	      center: philippines
	    });
	    var infoWindow = new google.maps.InfoWindow({map: map});

	    // This event listener calls addMarker() when the map is clicked.
	    google.maps.event.addListener(map, 'click', function(event) {
	      var wordlat = event.latLng.lat();
	      var wordlng = event.latLng.lng();
	      addMarker(event.latLng, map);
	      infoWindow.setPosition(event.latLng);
	      infoWindow.setContent("Latitude: "+wordlat+"\nLongtitude: "+wordlng);
	    });
	    
	    // Try HTML5 geolocation.
	    
	    if (navigator.geolocation) {
	      navigator.geolocation.watchPosition(function(position) {
	        userPosition = {
	          lat: position.coords.latitude,
	          lng: position.coords.longitude
	        };
	      
	        
	        addMarker(userPosition, map);
	        map.setCenter(userPosition);
	        map.setZoom(16);
	      }, function() {
	        handleLocationError(true, infoWindow, map.getCenter());
	      });
	    } else {
	      // Browser doesn't support Geolocation
	      handleLocationError(false, infoWindow, map.getCenter());
	    }

	    // Add a marker at the center of the map.
	    
	  }

	  // Adds a marker to the map.
	  function addMarker(location, map) {
	    // Add the marker at the clicked location, and add the next-available label
	    // from the array of alphabetical characters.
	    var marker = new google.maps.Marker({
	      position: location,
	      label: labels[labelIndex++ % labels.length],
	      map: map
	    });
	  }
	  function handleLocationError(browserHasGeolocation, infoWindow, pos) {
	    infoWindow.setPosition(pos);
	    infoWindow.setContent(browserHasGeolocation ?
	                          'Error: The Geolocation service failed.' :
	                          'Error: Your browser doesn\'t support geolocation.');
	  }
	  google.maps.event.addDomListener(window, 'load', initialize);
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

			$query = "select firstName,lastName from userinfo where userName = 'mcdpdelrosario'";
			$result = mysqli_query($con, $query) or mysqli_error($con);
			while ($row = mysqli_fetch_array($result)) {
			    $_SESSION["fname"] = $row[0];
				$_SESSION["lname"] = $row[1];
			}
			
	}
	
?>

	<nav class="navbar">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a href="#menu-toggle" class="navbar-brand" id="menu-toggle" >LF</a>
	    </div>
	      <ul class="nav navbar-nav">
			<li>
				<a href="#" id="home-but"><span class="glyphicon glyphicon-home"></span> Home</a>
			</li>
			<li>
				<a href="#" id="moments-but"><span class="glyphicon glyphicon-film"></span> Moments</a>
			</li>
			<li>
				<a href="#" id="notif-but" class="popper" data-toggle="popover" data-trigger="focus"><span class="glyphicon glyphicon-bell"></span> Notifications</a>
			</li>
	      </ul>
	  </div>
	</nav>
	<div id="wrapper" class="toggled">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav" >
                <li class="sidebar-brand">
                    <a href="#">
                        <img src="img.jpg" class="imgicon"><br>
                        <p>
                        <?php
                        	echo $_SESSION["fname"]." ". $_SESSION["lname"];
                        ?></p>
                    </a>
                </li>
                <div class="sidebar-coms">
                <li>
                    <a href="#">Favorites</a>
                </li>
                <li>
                    <a href="#">Shortcuts</a>
                </li>
                <li>
                    <a href="#">Friends</a>
                </li>
                <li>
                    <a href="#">Settings</a>
                </li>
                <li>
                    <a href="#">Logout</a>
                </li>
                </div>
            </ul>
        </div>
    </div>


    <div class="content">
    	<div id="map"></div>
    </div>

    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>
</html>
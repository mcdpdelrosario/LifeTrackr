<html lang="en">
<head>
  <title>LifeTrackr</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <link href="userpage.css" rel="stylesheet">
  <link href="sidebar.css" rel="stylesheet">

  <script src='//ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
  <script src='js/jquery.ba-hashchange.min.js'></script>
  <!-- <script src='dynamicpage.js'></script> -->
  <!-- <script src='switchpage.js'></script> -->

  <!-- <link href="css/simple-sidebar.css" rel="stylesheet"> -->

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-QcrS-bymcrFPClDmuA4A3RMVZsvQCuQ&signed_in=true"></script>
	<script src="js/googlemaps.js"></script>
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
			$query = "select firstName,lastName from userinfo where userName = '".$_SESSION["myuser"]."'";
			$result = mysqli_query($con, $query) or mysqli_error($con);
			while ($row = mysqli_fetch_array($result)) {
			    $_SESSION["fname"] = $row[0];
				$_SESSION["lname"] = $row[1];
			}
			
	}
?>

	<nav class="navbar">
	  <div class="container-fluid">
	    <div class="navbar-center navbar-header">
	      <a  class="navbar-brand" >LF</a>
	    </div>
	      <ul class="nav navbar-nav">
      <li>
        <a href="#menu-toggle" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger"></span>  </a>
      </li>
			<li>
				<a href="userpage.php" id="home-but"><span class="glyphicon glyphicon-home"></span> Home</a>
			</li>
			<li>
				<a href="moments.php" id="moments-but"><span class="glyphicon glyphicon-film"></span> Moments</a>
			</li>
			<li>
				<a href="notifications.php" id="notif-but" class="popper" data-toggle="popover" data-trigger="focus"><span class="glyphicon glyphicon-bell"></span> Notifications</a>
			</li>
	      </ul>
	  </div>
	</nav>
	<div id="wrapper" class="toggled">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav" >
                <li class="sidebar-brand" >
                    <a href="profiler.php" >
                        <img src="img.jpg" class="imgicon"><br>
                        <p>
                        <?php
                        	echo $_SESSION["fname"]." ". $_SESSION["lname"];
                        ?></p>
                    </a>
                </li>
                <!-- <hr width="70%"> -->
                <div class="sidebar-coms">
                <li>
                    <a href="#">Favorites</a>
                </li>
                <li>
                    <a href="#">Friends</a>
                </li>
                <li>
                    <a href="#">Drafts</a>
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


    <section id="main-content">
		  <!-- <h2>Home</h2> -->
		  <div id="map"></div>
    </iframe>
		</section>

    

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
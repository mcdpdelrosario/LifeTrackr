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
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
	    $("#moments-but").click(function(){
	        $("#center-pane").load("moments.php");
	    });
	});
	</script>
	<script>
	$(document).ready(function(){
	    $("#home-but").click(function(){
	        $("#center-pane").load("maps.php");
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

			$query = "select firstName,lastName from userinfo where userName = 'mcdpdelrosario'";
			$result = mysqli_query($con, $query) or mysqli_error($con);
			while ($row = mysqli_fetch_array($result)) {
			    $_SESSION["fname"] = $row[0];
				$_SESSION["lname"] = $row[1];
			}

			
	}
	
?>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="collapse navbar-collapse" id="myNavbar">
			  	<ul class="nav navbar-nav">
					<li>
						<a href="#" id="home-but"><span class="glyphicon glyphicon-home"></span> Home</a>
					</li>
					<li>
						<a href="#" id="moments-but"><span class="glyphicon glyphicon-film"></span> Moments</a>
					</li>
					<li>
						<a href="#" id="notif-but"><span class="glyphicon glyphicon-bell"></span> Notifications</a>
					</li>
			  	</ul>
			  	<ul class="nav navbar-nav navbar-right">
			  		<li>
			  			<div class="inner-addon left-addon">
				      		<i class="glyphicon glyphicon-user"></i>
		    				<input type="text" class="form-control test" placeholder=" Search">
		    			</div>
			      	</li>
			      	<li>
			      		<a href="#"><span class="glyphicon glyphicon-cog"></span></a>
			      	</li>
			    </ul>
			</div>
		</div>
	</nav>

	<div class="content container" id="content">
		<div class="row">
			<div class="col-xs-2 left-pane" id="left-pane">
				<div class="lp-header">
					<a href="#"><img src="img.jpg" class="iconimg"></a>
					<p class="head-name"><?=$_SESSION["fname"]?> <?=$_SESSION["lname"]?></p>
				</div>
				<nav class="navbar navbar-default navbarbot" role="navigation">
				  <!-- Collect the nav links, forms, and other content for toggling -->
				  <div class="collapse navbar-collapsebot navbar-ex1-collapse">
				    <ul class="nav navbar-navbot">
				      <li><a href="#">Link</a></li>
				      <li><a href="#">Link</a></li>
				      <li class="dropdown">
				        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
				        <ul class="dropdown-menu dropdown-menubot">
				          <li><a href="#">Action</a></li>
				          <li><a href="#">Another action</a></li>
				          <li><a href="#">Something else here</a></li>
				          <li><a href="#">Separated link</a></li>
				          <li><a href="#">One more separated link</a></li>
				        </ul>
				      </li>
				    </ul>
				    <ul class="nav navbar-navbot navbar-right navbar-rightbot">
				      <li><a href="#">Link</a></li>
				      <li class="dropdown">
				        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
				        <ul class="dropdown-menu">
				          <li><a href="#">Action</a></li>
				          <li><a href="#">Another action</a></li>
				          <li><a href="#">Something else here</a></li>
				          <li><a href="#">Separated link</a></li>
				        </ul>
				      </li>
				    </ul>
				  </div><!-- /.navbar-collapse -->
				</nav>
				
			</div>
			<div class="col-xs-7 center-pane" id="center-pane">
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
			<div class="col-xs-3 right-pane">
				<div class="panel-group" >
					<div class="panel panel-default">
						<div class="panel-heading explore-head">
							<h3>Explore</h3>
						</div>
						<div class="panel-body explore-body">
								
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


</body>
</html>
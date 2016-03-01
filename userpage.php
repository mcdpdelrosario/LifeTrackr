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
 <!--  <script>
	  $('#trig').on('click', function () {
	    $('#colMain').toggleClass('span12 span9');
	    $('#colPush').toggleClass('span0 span3');
		});
	</script> -->
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
	      <a class="navbar-brand">LF</a>
	    </div>
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
	      	<li class="searchbar">
		      	<div class="right-inner-addon">
			        <i class="glyphicon glyphicon-search"></i>
			        <input type="search" class="form-control search-bar" placeholder="Search" />
			    </div>
			</li>
	        <li>
	      		<a href=""><img src="img.jpg" class="imgicon"></a>
	      	</li>
	      </ul>
	  </div>
	</nav>


</body>
</html>
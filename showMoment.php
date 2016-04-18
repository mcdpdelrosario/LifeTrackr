<!-- The new loginpage -->

<!-- working -->
<html lang="en">
<head>

  <title>LifeTrackr</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1 ,maximum-scale=1,user-scalable=no">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="HandheldFriendly" content="true">
  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <!-- <link href="userpage.css" rel="stylesheet" media="screen and (min-width:0)"> -->
   <link href="navbar.css" rel="stylesheet" media="screen and (min-width:0)">
    <link href="userpage.css" rel="stylesheet" media="screen and (min-width:0)">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


  <script src="dist/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">


  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-QcrS-bymcrFPClDmuA4A3RMVZsvQCuQ&signed_in=false"></script>
  <script src="main_Map.js"></script>
  <script src="momentHandler.js"></script>
</head>
  
<body>
<div class="container">
<?php
	$id = $_GET['moment_id'];
	session_start();
	include "navbar.php";
    $con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");

	$query = "SELECT m.user_id,first_name, last_name, username, longitude, latitude, moments_message,moments_id, m.time_stamp FROM moments AS m
	INNER JOIN userinfo AS ui
	ON m.user_id = ui.user_id
WHERE m.moments_id = ".$id."";
	$result=mysqli_query($con, $query) or mysqli_error($con);

	while($row=mysqli_fetch_array($result)){
		$latlong=$row['latitude'] .",".$row['longitude'];
		?>
		<div class="panel panel-group">
			<div class="panel-heading">
				<h3><?=$row['first_name']?> <?=$row['last_name']?> @<?=$row['username']?></br></h3>
			</div>
			<div class="panel-body">
				<img id ="pic-profile_user" src='http://maps.googleapis.com/maps/api/staticmap?center=<?=$latlong?>&zoom=18&size=400x300&sensor=true&maptype=satellite'>
				<hr>
                                  <p><?=$row['moments_message']?></p>
                                  </div>
                            <div class="panel-footer">
                              <p><a href="likeMoments.php?moment_id=<?=$row['moments_id']?>&moment_user_id=<?=$row['user_id']?>"><button class="btn btn-default">Like</button></p>
                              </a>
			</div>

		</div>
		<?php
	}
	
?>
</div>
</body>
</html>
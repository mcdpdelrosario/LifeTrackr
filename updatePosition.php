<?php
	session_start();
	$con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");

	$longitude=$_GET["current_lng"];
	$latitude=$_GET["current_lat"];
	// $img=$_GET["moment_Img"];
	
	date_default_timezone_set('Asia/Taipei');
	$date=date("Y-m-d h:i:s");

	$query = "UPDATE userinfo SET last_latitude=".$latitude.", last_longitude=".$longitude.",time_stamp='".$date."' WHERE user_id='".$_SESSION['myuser']."'";
	$result = mysqli_query($con,$query);
	
?>
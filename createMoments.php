<?php
	// session_start();
	$con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");

	$longitude=$_GET["moment_Lng"];
	$latitude=$_GET["moment_Lat"];
	$message=$_GET["moment_Message"];
	$img=$_GET["moment_Img"];
	date_default_timezone_set('Asia/Taipei');
	$date=date("Y-m-d h:i:s");

	$query = "INSERT INTO moments (`longitude`, `latitude`,`timestamp`) VALUES(".$longitude.",".$latitude.",'".$date."')";
	$result = mysqli_query($con,$query);

	echo $query;
?>
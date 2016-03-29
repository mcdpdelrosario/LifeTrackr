<?php
	session_start();
	$con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");	

	$longitude=$_GET["moment_Lng"];
	$latitude=$_GET["moment_Lat"];
	date_default_timezone_set('Asia/Taipei');
	$date=date("Y-m-d h:i:sa");

	$query = "INSERT INTO moments (`longtitude`, `latitude`,`time_taken`) VALUES(".$longitude.",".$latitude.",'".$date."')";
	$result = mysqli_query($link,$query);

	echo $query;
?>
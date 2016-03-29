<?php
	
	// $userID = $_GET["userID"];
session_start();
	$longitude = $_GET["longitude"];
	$latitude = $_GET["latitude"];
	$moments = $_GET["moments-text"];
	// $image_user = $_POST["moments-img"];
	date_default_timezone_set('Asia/Taipei');
	$date=date("Y-m-d h:i:s");

	$link = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");

	$query = "INSERT INTO moments (`username`,`moments_message`,`longtitude`, `latitude`,`time_taken`) VALUES('".$_SESSION["myuser"]."','".$moments."',".$longitude.",".$latitude.",'".$date."')";
				
	$result = mysqli_query($link,$query);
	
	echo $query;
	echo "<br/>";

	echo mysqli_error($link);
?>
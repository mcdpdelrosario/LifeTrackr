<?php
	
	// $userID = $_GET["userID"];
	$longitude = $_GET["longitude"];
	$latitude = $_GET["latitude"];

	// echo($userID);
	echo("<br/>");
	echo($longitude);
	echo("<br/>");
	echo($latitude);		
	echo("<br/>");
		
	// Create connection to database
	$link = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");

	$query = "INSERT INTO dummytable (`long`, `lat`) VALUES(".$longitude.",".$latitude.")";
				
	$result = mysqli_query($link,$query);
	
	echo $query;
	echo "<br/>";

	echo mysqli_error($link);
?>
<?php	
	// $userID = $_GET["userID"];
	session_start();
	
	$json_result = array();
	$query = "SELECT moments_id,longtitude,latitude FROM moments";
	$link = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");
	$result = mysqli_query($link,$query);
	
	while($row=mysqli_fetch_array($result))
	{
		array_push($json_result,$row);
	}

	echo json_encode($json_result);
?>
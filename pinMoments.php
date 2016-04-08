<?php
	session_start();
	
	$con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");

	$pin_moment = array();
	$pin_moment['moment_id'] = array();
	$pin_moment['username'] = array();
	$pin_moment['longitude'] = array();
	$pin_moment['latitude'] = array();
	$pin_moment['message'] = array();
	$pin_moment['time_stamp'] = array();
	$pin_moment['first_name'] = array();
	$pin_moment['last_name'] = array();

	$query = "SELECT moments_id, ui.username, moments_message, longitude, latitude, first_name, last_name, mome.time_stamp FROM moments AS mome 
			  INNER JOIN userinfo AS ui 
			  ON ui.user_id = mome.moments_user_id
			  WHERE moments_user_id = '".$_SESSION['myuser']."'"; 
			  //mome.username should be a variable
			  // SELECT ui.username, moments_message, longitude, latitude, first_name, last_name FROM moments AS mome INNER JOIN userinfo AS ui ON ui.username = mome.username WHERE mome.username='mcdpdelrosario'

	$result = mysqli_query($con, $query) or mysqli_error($con);

	while($row = mysqli_fetch_array($result))
	{
		array_push($pin_moment['moment_id'], $row['moments_id']);
		array_push($pin_moment['username'], $row['username']);
		array_push($pin_moment['message'], $row['moments_message']);
		array_push($pin_moment['longitude'], $row['longitude']); 
		array_push($pin_moment['latitude'], $row['latitude']); 
		array_push($pin_moment['time_stamp'], $row['time_stamp']); 
		array_push($pin_moment['first_name'], $row['first_name']); 
		array_push($pin_moment['last_name'], $row['last_name']); 
	}

	echo json_encode($pin_moment);
?>
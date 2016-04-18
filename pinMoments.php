<?php
	session_start();
	
	$con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");

	$pin_moment = array();
	$pin_moment['moment_id'] = array();
	$pin_moment['user_id'] = array();
	$pin_moment['longitude'] = array();
	$pin_moment['latitude'] = array();
	$pin_moment['message'] = array();
	$pin_moment['time_stamp'] = array();
	$pin_moment['first_name'] = array();
	$pin_moment['last_name'] = array();
	$pin_moment['username'] = array();
	$pin_moment['img_user'] = array();
	$pin_moment['img_moment'] = array();

	$query = "SELECT m.user_id, m.moments_id, m.img_id, m.moments_message, m.longitude, m.latitude, m.time_stamp, username, first_name, last_name, ui.img_id AS user_img_id FROM moments AS m 
                                INNER JOIN userinfo AS ui 
                                    ON m.user_id = ui.user_id 
                                INNER JOIN friends AS f  
                                    ON m.user_id = f.user_id_fr 
                                WHERE f.user_id_user=".$_SESSION['userid']." AND status =1 
                                UNION ALL 
                                SELECT m2.user_id, m2.moments_id, m2.img_id, moments_message, longitude, latitude, m2.time_stamp, username, first_name, last_name, ui2.img_id FROM moments AS m2 
                                INNER JOIN userinfo AS ui2 
                                    ON m2.user_id = ui2.user_id 
                                    WHERE ui2.user_id=".$_SESSION['userid']."
                                ORDER BY time_stamp DESC";

	$result = mysqli_query($con, $query) or mysqli_error($con);

	while($row = mysqli_fetch_array($result))
	{
		array_push($pin_moment['moment_id'], $row['moments_id']);
		array_push($pin_moment['user_id'], $row['user_id']);
		array_push($pin_moment['message'], $row['moments_message']);
		array_push($pin_moment['longitude'], $row['longitude']); 
		array_push($pin_moment['latitude'], $row['latitude']); 
		array_push($pin_moment['time_stamp'], $row['time_stamp']); 
		array_push($pin_moment['first_name'], $row['first_name']); 
		array_push($pin_moment['last_name'], $row['last_name']); 
		array_push($pin_moment['username'], $row['username']); 
		array_push($pin_moment['img_user'], $row['user_img_id']); 
		array_push($pin_moment['img_moment'], $row['img_id']); 
	}

	echo json_encode($pin_moment);
?>
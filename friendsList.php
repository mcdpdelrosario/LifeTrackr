<?php
	session_start();
	$con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");

	$friend_list = array();
	$friend_list['first_name'] = array();
	$friend_list['last_name'] = array();
	$friend_list['username'] = array();
	$friend_list['user_id_user'] = array();

	$no_result = "No Results";

	if(mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}else{
		$query = "SELECT ui.first_name, ui.last_name, ui.username, f.status FROM friends AS f INNER JOIN userinfo as ui ON ui.user_id=f.user_id_fr WHERE f.user_id_user='".$_SESSION['myuser']."' AND status = 1";
		$result = mysqli_query($con, $query) or mysqli_error($con);

		if(mysqli_num_rows($result)==0){
			echo json_encode($no_result);
		}else{
			while ($row = mysqli_fetch_array($result)) {
				array_push($friend_list['first_name'], $row['first_name']);
				array_push($friend_list['last_name'], $row['last_name']);
				array_push($friend_list['username'], $row['username']);
				array_push($friend_list['user_id_user'], $row['username']);
            }
            echo json_encode($friend_list);
		}
	}

?>
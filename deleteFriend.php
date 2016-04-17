<?php
	session_start();
	$user_id_fr=$_GET['friend'];
	date_default_timezone_set('Asia/Taipei');
	$date=date("Y-m-d h:i:s");
	$con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");

	if (mysqli_connect_errno()){
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    } else {
                          $query = "DELETE FROM friends WHERE user_id_user=".$_SESSION['userid']." AND user_id_fr=".$user_id_fr."";
                          mysqli_query($con, $query) or mysqli_error($con);	
                          $redirect="Location: profile_user.php?user=".$user_id_fr."";
                          header($redirect);
			}

?>
<?php
	session_start();
	$user_id_fr=$_GET['friend'];
	date_default_timezone_set('Asia/Taipei');
	$date=date("Y-m-d h:i:s");
	$con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");

	if (mysqli_connect_errno()){
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    } else {
                          $query = "INSERT INTO `friends`(`user_id_user`, `user_id_fr`, `status`, `time_stamp`) VALUES ('".$_SESSION['userid']."','".$user_id_fr."',0,'".$date."')";
                          mysqli_query($con, $query) or mysqli_error($con);	
                          $query_check="SELECT max(friends) FROM friends WHERE user_id_fr=".$user_id_fr."";
                          $result_check = mysqli_query($con,$query_check);
                          
                          if(mysqli_num_rows($result_check)==1){
                            while($row = mysqli_fetch_array($result_check)){
                                $query = "INSERT INTO notifications(user_id,link_id,notification_type,time_stamp) VALUES(".$_SESSION['userid'].",".$row[0].",0,'".$date."')";
                                mysqli_query($con, $query) or mysqli_error($con);
                            }
                        }
                          $redirect="Location: profile_user.php?user=".$user_id_fr."";
                          header($redirect);
			}
?>
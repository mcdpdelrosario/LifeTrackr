<?php
    $moment_id=$_POST['moment_id'];
    $user_id=$_POST['user_id'];
    date_default_timezone_set('Asia/Taipei');
    $date=date("Y-m-d h:i:s");
	session_start();
	$con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");

	if (mysqli_connect_errno()){
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    } else {
                        $query_check= "SELECT * FROM likes WHERE moment_id=".$moment_id." AND user_id=".$user_id."";
                        $result = mysqli_query($con, $query_check) or mysqli_error($con);
                        if(mysqli_num_rows($result) == 1){
                            $query = "DELETE FROM likes WHERE moment_id=".$moment_id." AND user_id=".$user_id."";
                            mysqli_query($con, $query) or mysqli_error($con);
                        }else{
                            $query = "INSERT INTO likes(moment_id,user_id,time_stamp) VALUES(".$moment_id.",".$user_id.",'".$date."')";
                            $result = mysqli_query($con, $query) or mysqli_error($con);
                            $query = "SELECT max(like_id) FROM likes WHERE user_id=".$_SESSION['myuser']."";
                            $result_getlikes = mysqli_query($con, $query) or mysqli_error($con);
                            if(mysqli_num_rows($result_getlikes)==1){
                            while($row = mysqli_fetch_array($result_getlikes)){
                                echo $_SESSION['myuser'];
                                echo $query = "INSERT INTO notifications(user_id,link_id,notification_type,time_stamp) VALUES(".$user_id.",".$row[0].",0,'".$date."')";
                                mysqli_query($con, $query) or mysqli_error($con);
                            }
                        }
                        }
                      }

?>
<?php
	session_start();
	$con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");

  
    $get_notification = array();
    $get_notification['notification_type'] = array();
    $get_notification['time_stamp'] = array();
    $get_notification['moment_id'] = array();
    $get_notification['first_name'] = array();
    $get_notification['last_name'] = array();
    $get_notification['username'] = array();
    $get_notification['img_id'] = array();
    $get_notification['user_id_user'] = array();
	if (mysqli_connect_errno()){
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    } else {
                          $query = "SELECT notification_type, link_id FROM notifications WHERE user_id = ".$_SESSION['myuser']."";
                          $result_notitype=mysqli_query($con, $query) or mysqli_error($con);
                          while($row = mysqli_fetch_array($result_notitype)){
                          	if($row[0]==0){ // likes
                            		$query_likes = "SELECT notification_type, n.time_stamp, moment_id, first_name, last_name, username, ui.img_id FROM notifications AS n
                                      INNER JOIN likes AS l
                                        ON n.link_id = l.like_id
                                        INNER JOIN userinfo AS ui
                                        ON l.user_id = ui.user_id
                                        INNER JOIN moments AS m
                                        ON l.moment_id = m.moments_id
                                    WHERE m.user_id = ".$_SESSION['myuser']."";
                            		$result_likes=mysqli_query($con, $query_likes) or mysqli_error($con);

                                  while($row = mysqli_fetch_array($result_likes)){
                                    array_push($get_notification['notification_type'], $row['notification_type']);
                                    array_push($get_notification['time_stamp'], $row['time_stamp']);
                                    array_push($get_notification['moment_id'], $row['moment_id']);
                                    array_push($get_notification['first_name'], $row['first_name']);
                                    array_push($get_notification['last_name'], $row['last_name']);
                                    array_push($get_notification['username'], $row['username']);
                                    array_push($get_notification['img_id'], $row['img_id']);
                                }
                                echo json_encode($get_notification);

                          	}else if($row[0]==1){ // messages
                          		echo "messages";
                          	}else if($row[0]==2){ // comments
                          		echo "comments";
                          	}else  if($row[0]==3){ // friend requests
                          		$query_fr = "SELECT first_name, last_name, username, user_id_user FROM friends AS f INNER JOIN userinfo as ui ON ui.user_id=f.user_id_user WHERE user_id_fr='".$_SESSION['myuser']."' AND status = 0";
                              $result_fr = mysqli_query($con, $query_fr) or mysqli_error($con);

                              while ($row = mysqli_fetch_array($result)) {
                                  array_push($get_notification['first_name'], $row['first_name']);
                                  array_push($get_notification['last_name'], $row['last_name']);
                                  array_push($get_notification['username'], $row['username']);
                                  array_push($get_notification['user_id_user'], $row['username']);
                                  }
                                  echo json_encode($get_notification);
                          	}
                          }
                          
			}
?>
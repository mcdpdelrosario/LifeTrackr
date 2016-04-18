<?php
echo "Notifications <br>";
	session_start();
	$con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");

      if (mysqli_connect_errno()){
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    } else {
                          $query = "SELECT notification_type, user_id, link_id FROM notifications WHERE user_owner = ".$_SESSION['myuser']." ORDER BY time_stamp DESC";
                          $result_notitype=mysqli_query($con, $query) or mysqli_error($con);
                          while($row = mysqli_fetch_array($result_notitype)){
                            if($row['notification_type']==0){ // likes
                                $query_likes = "SELECT first_name, last_name, ui.img_id, username, n.time_stamp,l.moment_id FROM notifications AS n
									INNER JOIN likes AS l
								    ON n.link_id = l.like_id
								    INNER JOIN userinfo AS ui
								    ON ui.user_id = n.user_id
								    WHERE n.link_id=".$row['link_id']."";
                                $result_likes=mysqli_query($con, $query_likes) or mysqli_error($con);

                                  while($row = mysqli_fetch_array($result_likes)){
                                        echo $row['first_name'] ." ". $row['last_name'] ." @". $row['username'];
                                        echo " liked your ";
                                        ?>
                                        <a href="showMoment.php?moment_id=<?=$row['moment_id']?>"> post</a>
                                        <?php
                                }

                            }else if($row[0]==1){ // messages
                              echo "messages";
                            }else if($row[0]==2){ // comments
                              echo "comments";
                            }else  if($row[0]==3){ // friend requests
                              echo "friend requests";
                            }
                          }
                          
      }
?>
<?php
	echo "Moments Page <br>";
	session_start();
	$con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");
    $post_moment = array();
    $post_moment['user_id'] = array();
    $post_moment['moments_id'] = array();
    $post_moment['moments_message'] = array();
    $post_moment['longitude'] = array();
    $post_moment['latitude'] = array();
    $post_moment['time_stamp'] = array();
    $post_moment['username'] = array();
    $post_moment['first_name'] = array();
    $post_moment['last_name'] = array();
    $post_moment['img_id'] = array();
    $post_moment['user_img_id'] = array();
	if (mysqli_connect_errno())
                    {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    } else {
                        $query = "SELECT m.user_id, m.moments_id, m.img_id, m.moments_message, m.longitude, m.latitude, m.time_stamp, username, first_name, last_name, ui.img_id AS user_img_id FROM moments AS m 
                                INNER JOIN userinfo AS ui 
                                    ON m.user_id = ui.user_id 
                                WHERE ui.user_id=".$_SESSION['myuser']."
                                ORDER BY time_stamp DESC";
                        $result = mysqli_query($con, $query) or mysqli_error($con);
                while($row = mysqli_fetch_array($result)){
                array_push($pin_moment['user_id'], $row['user_id']);
                array_push($pin_moment['moments_id'], $row['moments_id']);
                array_push($pin_moment['moments_message'], $row['moments_message']);
                array_push($pin_moment['longitude'], $row['longitude']); 
                array_push($pin_moment['latitude'], $row['latitude']); 
                array_push($pin_moment['time_stamp'], $row['time_stamp']); 
                array_push($pin_moment['username'], $row['username']); 
                array_push($pin_moment['first_name'], $row['first_name']); 
                array_push($pin_moment['last_name'], $row['last_name']); 
                array_push($pin_moment['img_id'], $row['img_id']);
                array_push($pin_moment['user_img_id'], $row['user_img_id']);
            }

            echo json_encode($pin_moment);
}
?>
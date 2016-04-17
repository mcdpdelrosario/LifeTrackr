<?php
	$id = $_GET['moment_id'];
	session_start();
    $con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");

	$query = "SELECT first_name, last_name, username, ui.img_id AS profpic, longitude, latitude, m.img_id, m.time_stamp FROM moments AS m
	INNER JOIN userinfo AS ui
	ON m.user_id = ui.user_id
WHERE m.moments_id = ".$id."";
	$result=mysqli_query($con, $query) or mysqli_error($con);

	while($row=mysqli_fetch_array($result)){
		echo $row[0] ."<br>";
		echo $row[1]."<br>";
		echo $row[2]."<br>";
		echo $row[3]."<br>";
		echo $row[4]."<br>";
		echo $row[5]."<br>";
		echo $row[6]."<br>";
		echo $row[7]."<br>";
	}
	
?>
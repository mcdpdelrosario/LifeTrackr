<?php
	$id = $_GET['moment_id'];
	session_start();
    $con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");

	$query = "SELECT m.user_id,first_name, last_name, username, longitude, latitude, moments_message,moments_id, m.time_stamp FROM moments AS m
	INNER JOIN userinfo AS ui
	ON m.user_id = ui.user_id
WHERE m.moments_id = ".$id."";
	$result=mysqli_query($con, $query) or mysqli_error($con);

	while($row=mysqli_fetch_array($result)){
		$latlong=$row['latitude'] .",".$row['longitude'];
		?>
		<div class="panel panel-group">
			<div class="panel-heading">
				<h3><?=$row['first_name']?> <?=$row['last_name']?> @<?=$row['username']?></br></h3>
			</div>
			<div class="panel-body">
				<img id ="pic-profile_user" src='http://maps.googleapis.com/maps/api/staticmap?center=<?=$latlong?>&zoom=18&size=400x300&sensor=true&maptype=satellite'>
				<hr>
                                  <p><?=$row['moments_message']?></p>
                                  </div>
                            <div class="panel-footer">
                              <p><a href="likeMoments.php?moment_id=<?=$row['moments_id']?>&moment_user_id=<?=$row['user_id']?>"><button class="btn btn-default">Like</button></p>
			</div>

		</div>
		<?php
	}
	
?>
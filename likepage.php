<html>

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
function pushLike(userid,momentid){
	var url = "golike.php?moment_id="+ momentid+"&user_id="+userid;
	httpGetAsync(url,td);
}

function td(){

}

function httpGetAsync(theUrl, callback){
	var xmlHttp = new XMLHttpRequest();
	xmlHttp.onreadystatechange = function() { 
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
			callback(xmlHttp.responseText);
	}
	xmlHttp.open("GET", theUrl, true); // true for asynchronous 
	xmlHttp.send(null);
}
</script>
</head>
<body>
<?php
	echo "Moments Page <br>";
	session_start();
	$con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");

	if (mysqli_connect_errno())
                    {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    } else {
                        echo $query = "SELECT moments_user_id, moments_id, m.img_id, moments_message, longitude, latitude, m.time_stamp, username, first_name, last_name, ui.img_id FROM moments AS m INNER JOIN userinfo AS ui ON m.moments_user_id = ui.user_id INNER JOIN friends AS f  ON m.moments_user_id = f.user_id_fr WHERE f.user_id_user=".$_SESSION['myuser']." AND status =1 UNION ALL SELECT moments_user_id, moments_id, m2.img_id, moments_message, longitude, latitude, m2.time_stamp, username, first_name, last_name, ui2.img_id FROM moments AS m2 INNER JOIN userinfo AS ui2 ON m2.moments_user_id = ui2.user_id WHERE ui2.user_id=".$_SESSION['myuser']." ORDER BY time_stamp DESC";
                        echo "<br>";
                        $result = mysqli_query($con, $query) or mysqli_error($con);
                        $temp = 0;
                        	while ($row = mysqli_fetch_array($result)) {
                        		$temp++;
                        		for($i=0;$i<10;$i++){
                        			echo "<br>".$row[$i];
                        		}
                        		?>	
                        			<!--  -->
                        			<button type="button" onclick="pushLike(<?=$_SESSION['myuser']?>,<?=$row['moments_id']?>)"class="btn btn-default" id="like-but">Like</button>
                        		<?php
echo "<br>";
                        }
                      }

?>


</body>
</html>
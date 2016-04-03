<?php
	session_start();
	$con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");
	// Check connection
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
  	else 
  	{
		if (!empty($_POST)) 
		{	
			$logged_num = $_POST["uname_log"];
			$signed_num = $_POST["pwd_log"];
			$query = "select user_id from userinfo where username = '".$logged_num."' && password = '".$signed_num."'";
			$result = mysqli_query($con, $query) or mysqli_error($con);
			
			if (mysqli_num_rows($result) == 1) 
			{
			 	while($row=mysqli_fetch_array($result)){
			 		$_SESSION["myuser"] = $row['user_id'];
			 	}
			 	
			 	header('Location: userpage.php');
			}
			else 
			{
				header('Location: login.php');
			}
		}
	}
?>

<?php
	session_start();
	$con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");
	
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	} 
  	else 
  	{
  		date_default_timezone_set('Asia/Taipei');
		$createDate=date('Y-m-d');

		if (!empty($_POST)) 
		{
			$fname_su = $_POST["fname-su"];
			$lname_su = $_POST["lname-su"];
			$uname_su = $_POST["uname-su"];
			$eadd_su = $_POST["eadd-su"];
			$pwd_su = $_POST["pwd-su"];

			$query = "INSERT INTO userinfo(username, first_name, last_name, password, email, time_stamp) VALUES ('".$uname_su."','".$fname_su."','".$lname_su."','".$pwd_su."','".$eadd_su."','".$createDate."')";
			$result = mysqli_query($con, $query) or mysqli_error($con);

			if(!$result) 
			{
				echo mysqli_error($con);
			} 
			else 
			{
				$_SESSION["myuser"] = $uname_su;
				header('Location: userpage.php');
			}
		}
	}
?>
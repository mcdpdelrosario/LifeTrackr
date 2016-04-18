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
			$fname_edit = $_POST["fname_edit"];
			$lname_edit = $_POST["lname_edit"];
			$uname_edit = $_POST["uname_edit"];
			$email_edit = $_POST["email_edit"];
			$pword_edit = $_POST["pword_edit"];
			$query = "UPDATE `userinfo` SET `username`='".$uname_edit."',`password`='".$pword_edit."',`last_name`='".$lname_edit."',`first_name`='".$fname_edit."',`email`='".$email_edit."' WHERE `username`='".$_SESSION["myuser"]."'";
			$result = mysqli_query($con, $query) or mysqli_error($con);

			if (!$result) 
			{
				echo mysqli_error($con);
			}
			else 
			{
				$_SESSION["myuser"] = $uname_edit;
				header('Location: userpage.php');
			}
		}
	}
?>
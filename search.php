<?php
	$dbHost = 'ap-cdbr-azure-southeast-b.cloudapp.net';
	$dbUsername = 'bdd92f8752ef7e';
	$dbPassword = 'fdb4d70b';
	$dbName = 'lifetrackr';
	$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
	$searchTerm = $_GET['term'];
	
	
	$query = $db->query("SELECT * FROM userinfo WHERE username LIKE '%".$searchTerm."%' ORDER BY username ASC");
	$a_json = array();
	$a_json_row = array();
	while ($row = $query->fetch_assoc()) 
	{
    	//$data[] = $row['username'];
    	$username = htmlentities(stripslashes($row['username']));
    	$code = htmlentities(stripslashes($row['user_id']));
		$a_json_row["id"] = $code;
		$a_json_row["value"] = $username;
		$a_json_row["label"] = $username;
		array_push($a_json, $a_json_row);
	}
	//return json data
	
	//echo json_encode($data);

	echo json_encode($a_json);
	flush();
?>
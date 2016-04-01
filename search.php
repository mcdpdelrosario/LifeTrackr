<?php
$dbHost = 'ap-cdbr-azure-southeast-b.cloudapp.net';
$dbUsername = 'bdd92f8752ef7e';
$dbPassword = 'fdb4d70b';
$dbName = 'lifetrackr';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $db->query("SELECT * FROM userinfo WHERE username LIKE '%".$searchTerm."%' ORDER BY username ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['username'];
}
//return json data
echo json_encode($data);
?>
<?php
	session_start();
	$con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");

	$longitude=$_POST["moment_Lng"];
	$latitude=$_POST["moment_Lat"];
	$message=$_POST["moment_Message"];
	$image=$_POST["imagefp"];
	// $img=$_GET["moment_Img"];
	date_default_timezone_set('Asia/Taipei');
	$date=date("Y-m-d h:i:s");

	$query = "INSERT INTO moments (`moments_user_id`,`longitude`, `latitude`,`moments_message`,`time_stamp`) VALUES(".$_SESSION["myuser"].",".$longitude.",".$latitude.",'".$message."','".$date."')";
	$result = mysqli_query($con,$query);

	$id = mysql_insert_id();
	$blobObj = new BobDemo();
	$blobObj->insertBlob($image,"gif",$id);

	echo $query;


class BobDemo
{
    const DB_HOST = 'ap-cdbr-azure-southeast-b.cloudapp.net';
    const DB_NAME = 'lifetrackr';
    const DB_USER = 'bdd92f8752ef7e';
    const DB_PASSWORD = 'fdb4d70b';

    private $conn = null;

    public function __construct()
    {
        $connectionString = sprintf("mysql:host=%s;dbname=%s;charset=utf8",
                BobDemo::DB_HOST,
                BobDemo::DB_NAME);
        try 
        {
            $this->conn = new PDO($connectionString,
                    BobDemo::DB_USER,
                    BobDemo::DB_PASSWORD);
        } 
        catch (PDOException $pe) 
        {
            die($pe->getMessage());
        }
    }
    
    function insertBlob($filePath,$mime,$id){
        $blob = fopen($filePath,'rb');
        $sql = "INSERT INTO pictures(img_dt,img,moment_id) VALUES(:mime,:data,".$id.")";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':mime',$mime);
        $stmt->bindParam(':data',$blob,PDO::PARAM_LOB);
        return $stmt->execute();
    }

    function __destruct() {
        $this->conn = null;
    }
}



?>
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

    $blobObj = new BobDemo();
    $blobObj->insertBlob($image,"gif");
    //$id = $con->insert_id;
    $id2 = "select max(img_id) maxid from pictures";
    $id = mysqli_query($con,$id2);

    $row = mysqli_fetch_array($id);

    $id3 = $row["maxid"];

	$query = "INSERT INTO moments (`user_id`,`longitude`, `latitude`,`moments_message`,`time_stamp`,`img_id`) VALUES(".$_SESSION["myuser"].",".$longitude.",".$latitude.",'".$message."','".$date."','".$id3."')";
	$result = mysqli_query($con,$query);



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
            $connectionString = sprintf("mysql:host=%s;dbname=%s;charset=utf8",BobDemo::DB_HOST,BobDemo::DB_NAME);
            try 
            {
                $this->conn = new PDO($connectionString,BobDemo::DB_USER,BobDemo::DB_PASSWORD);
            } 
            
            catch (PDOException $pe) 
            {
                die($pe->getMessage());
            }
        }
    
        function insertBlob($filePath,$mime)
        {
            $blob = fopen($filePath,'rb');
            $sql = "INSERT INTO pictures(img_dt,img) VALUES(:mime,:data)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':mime',$mime);
            $stmt->bindParam(':data',$blob,PDO::PARAM_LOB);
            return $stmt->execute();
        }

        function __destruct() 
        {
            $this->conn = null;
        }
    }
    
?>
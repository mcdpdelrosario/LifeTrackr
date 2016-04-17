<!-- The new loginpage -->

<!-- working -->
<html lang="en">
<head>

  <title>LifeTrackr</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1 ,maximum-scale=1,user-scalable=no">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="HandheldFriendly" content="true">
  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <!-- <link href="userpage.css" rel="stylesheet" media="screen and (min-width:0)"> -->
   <link href="navbar.css" rel="stylesheet" media="screen and (min-width:0)">
    <link href="userpage.css" rel="stylesheet" media="screen and (min-width:0)">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


  <script src="dist/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">


  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-QcrS-bymcrFPClDmuA4A3RMVZsvQCuQ&signed_in=false"></script>
  <script src="main_Map.js"></script>
  <script src="momentHandler.js"></script>
</head>
<body>

 <div id="background"> 
<?php

session_start();
 include "navbar.php";
//   $con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");

// // Check connection
// if (mysqli_connect_errno())
//   {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   } else {
//       $query = "select first_name,last_name, username from userinfo where user_id = '".$_SESSION["myuser"]."'";
//       $result = mysqli_query($con, $query) or mysqli_error($con);
//       while ($row = mysqli_fetch_array($result)) {
//           $_SESSION["fname"] = $row['first_name'];
//         $_SESSION["lname"] = $row['last_name'];
//         $_SESSION["uname"] = $row['username'];
//       }
      
//   }
?>

    <!-- include "logout.php"; -->
  

   <div class = "row">

        <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-12" id="container1-moments">
          <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-6 col-xs-3">
                       <img id="profilepic-moments" src="img.jpg">
                </div>
                
              

               <div class "col-lg-offset-1 col-lg-6 col-md-offset-1 col-md -6 col-sm-offset-1 col-sm-offset-1" id="name-moments">

                    <a href="#"><?=$_SESSION['firstname']?> <?=$_SESSION['lastname']?></a></br>
                    <a href="#"id="username-moments"><?=$_SESSION['username']?></a>

                </div>
          </div>      
      </div>

       <div class="col-lg-offset-1 col-lg-7 col-md-offset-1 col-md-4 col-sm-offset-1 col-sm-4 col-xs-12" id="container2-moments"> 
        <div class="row">
          <div class="col" id="colme">

          colme

          </div>



        </div>  

       </div>
  </div>
  


</body>
</html>
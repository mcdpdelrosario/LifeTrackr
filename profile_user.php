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
  <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="dist/sweetalert.min.js"></script>
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-QcrS-bymcrFPClDmuA4A3RMVZsvQCuQ&signed_in=false"></script> -->
  <script src="main_Map.js"></script>
  <script src="momentHandler.js"></script>

</head>

<body>
  <?php
    session_start();
    $con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");
    // Check connection
    $useruser=$_GET['userid'];


    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } 
    else 
    {
      $query = "SELECT first_name,last_name,username FROM userinfo WHERE user_id = ".$useruser."";
      $result = mysqli_query($con, $query) or mysqli_error($con);
      while ($row = mysqli_fetch_array($result)) 
      {
        $_SESSION["fname"] = $row['first_name'];
        $_SESSION["lname"] = $row['last_name'];
        $_SESSION["username"] = $row['username'];
      }
    }
    include "navbar.php";
  ?>                           


  <div class = "grid">
    <div class = "row">
      
      

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="container2-profileuser">
          <div class="panel-heading" id="container2-prof">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs- 12" id="container1-profileuser">
                    <div class="panel panel-default lefty">
                    
                      <div class="panel-body" id="container1-background">
                        <div id="left-panel">
                          <div class="col-lg-4 col-md-5 col-sm-5 col-xs-7">
                            <img id="profile_pic" src="img.jpg">
                          </div>
                          <div class="col-lg-5 col-md-7 col-sm-5 col-xs-6" id="profile_name">
                            <a href="profile_user.php"><h4 id="myname"><?=$_SESSION["fname"]?> <?=$_SESSION["lname"]?> <br> </h4></a>
                            <p id="username">@<?=$_SESSION["username"]?></p>
                           </div>
                           <?php
                              if($useruser==$_SESSION['myuser']){
                                ?>
                          <div class="col-lg-3 col-md-7 col-sm-5"id="editprofile-profileuser">
                            <a href="profiler.php"><button class="btn btn-default edit-profile" id="profile-button" >Edit Profile</button></a>
                          </div> 
                                <?php
                              }else{

                                ?>
                                <div class="col-lg-3 col-md-7 col-sm-5"id="editprofile-profileuser">
                                <a href="profiler.php"><button class="btn btn-default edit-profile" id="profile-button" >Add Friend</button></a>
                              </div> 

                                <?php

                              }
                           ?>
                           

                            <div class="col-lg-3 col-md-7 col-sm-5"id="editprofile-profileuser1">
                                <a href="profiler.php"> <button type="button" class="btn btn-default btn-sm"> <span class="glyphicon glyphicon-cog" id="cogbutton"></span></button></a>
                          </div>


                        </div>
                      </div>
                    </div>
          </div>
          </div>
       <div class="panel-body righty" id="container3-prof">
        <!--     <div id="right-panel">
              <ul class="nav nav-tabs">
                <li class="active"><a href="profile_user.php">Home</a></li>
              </ul>
            </div> -->

            
              <?php
                    $con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");

                  // Check connection
                  if (mysqli_connect_errno())
                    {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    } else {
                        $query = "SELECT m.img_id, moments_message, longitude, latitude, m.time_stamp, username, first_name, last_name, ui.img_id FROM moments AS m
                              INNER JOIN userinfo AS ui
                                ON m.user_id = ui.user_id
                                WHERE ui.user_id = ".$useruser." ORDER BY time_stamp DESC";
                        $result = mysqli_query($con, $query) or mysqli_error($con);
                        while ($row = mysqli_fetch_array($result)) {
                           $longlat = $row['longitude'].','.$row['latitude'];
                           // echo $longlat;
                           ?>
                          
                                  <p><b><?=$row['first_name']?> <?=$row['last_name']?></b> @<?=$row['username']?> <?=$row['time_stamp']?></p>
                                  <img src="http://maps.googleapis.com/maps/api/staticmap?location=<?=$longlat?>&zoom=19&size=400x300&sensor=false&maptype=satellite">
                                  <p><?=$row['moments_message']?></p>
                                  <hr>

                      <?php
                        }
                      }
                  ?>
                
          </div>

      </div>


    </div>

  </div>   
</body>



</html>
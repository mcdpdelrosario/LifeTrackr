<!-- The new loginpage -->

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







  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-QcrS-bymcrFPClDmuA4A3RMVZsvQCuQ&signed_in=false"></script>
  <script src="main_Map.js"></script>
  <script src="momentHandler.js"></script>
</head>
<body>


<?php

session_start();
  $con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } else {
      $query = "select first_name,last_name from userinfo where username = '".$_SESSION["myuser"]."'";
      $result = mysqli_query($con, $query) or mysqli_error($con);
      while ($row = mysqli_fetch_array($result)) {
          $_SESSION["fname"] = $row['first_name'];
        $_SESSION["lname"] = $row['last_name'];
      }
      
  }
?>


                    <?php
                        include "navbar.php";
                      ?>

     <section id="main-content">
      
      <div id="map"></div>
    </section>

<!-- Modal -->
<div id="momentsSection">
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Moments</h4>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                  <textarea class="form-control" rows="5" id="MomentsComment"></textarea>
                </div>

            </form>
          </div>
        <div class="modal-footer">
          <button id="ConfirmMoment" class="btn btn-default" type="submit" value="submit" onclick="confirmFunction()">Confirm</button>
          <button id="CancelMoment" type="button" class="btn btn-default" data-dismiss="modal" onclick="cancelFunction()">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>


      <a id="findButton" onclick="findUser()" class="btn btn-default">
        <span class="glyphicon glyphicon-screenshot"></span>
      </a>





</body>
</html>
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
  <link href="userpage.css" rel="stylesheet" media="screen and (min-width:0)">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">





  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-QcrS-bymcrFPClDmuA4A3RMVZsvQCuQ&signed_in=false"></script>
  <script src="userpage.js"></script>
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
      $query = "select firstName,lastName from userinfo where userName = '".$_SESSION["myuser"]."'";
      $result = mysqli_query($con, $query) or mysqli_error($con);
      while ($row = mysqli_fetch_array($result)) {
          $_SESSION["fname"] = $row[0];
        $_SESSION["lname"] = $row[1];
      }
      
  }
?>


 <nav class="navbar navbar-default navbar-fixed-top">

    
    <div class="container bar-align">

    
        <div class="navbar-header active">
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" id = "hamburgerbutton"><span class="glyphicon glyphicon-menu-hamburger"></span> 
            </button>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbars" id = "searchbutton"><span class="glyphicon glyphicon-search"></span> 
            </button>

        </div>

        <div class = "logo">
            LF
            </div>

         <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
<!--                 <li>
                  <a href="#menu-but" id="menu-but"><span class="glyphicon glyphicon-user"></span> Profile</a>
                </li> -->
                <li>
                  <a href="userpage.php" id="signup-but"><span class="glyphicon glyphicon-home"></span> Home</a>
                </li>
                <li>
                  <a href="moments.php" id="signup-but"><span class="glyphicon glyphicon-film"></span> Moments</a>
                </li>
                <li>
                  <a href="notifications.php" id="signup-but" class="popper" data-toggle="popover" data-trigger="focus"><span class="glyphicon glyphicon-bell"></span> Notifications</a>
                </li>    
              </ul>
      
        </div>
    </div>
        <div class="collapse navbar-collapse" id="myNavbars">
           <ul class="nav navbar-nav">
             <li>
                      <form>
                      <input type="search" class="form-control" placeholder=" Search" />
                     <i class="form-control-feedback glyphicon glyphicon-search" id = "search-but"></i></form>   
                </li>
           </ul>
         </div> 


  </nav>
  



    <section id="main-content">
      
      <div id="map"></div>
    </section>

<!-- Modal -->
<div id="momentsSection">
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div id="modalhead" class="modal-header">
            <button id="xbutton" type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Moments</h4>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                  <textarea class="form-control" rows="5" id="MomentsComment"></textarea>
                </div>

            </form>
          </div>
        <div id="modalfoot" class="modal-footer">
          <button id="ConfirmMoment" class="btn btn-default" type="submit" value="submit" onclick="confirmFunction()">Confirm</button>
          <button id="CancelMoment" type="button" class="btn btn-default" data-dismiss="modal" onclick="cancelFunction()">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>


 

</body>
</html>
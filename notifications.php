
<html lang="en">
<head>
  <title>LifeTrackr</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <link href="userpage.css" rel="stylesheet">
  <link href="notifications.css" rel="stylesheet">


  <script src="js/bootstrap.min.js"></script>
  <!--  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-QcrS-bymcrFPClDmuA4A3RMVZsvQCuQ&signed_in=true"></script>
  <script src="js/googlemaps.js"></script> -->
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
     <div class="navbar-center navbar-header" >
        <a  class="navbar-brand" >LF</a>
      </div>

 
     <!--  <div class="col-xs-2" id = "search">
          <div class="right-inner-addon">
              
           <input type="search" class="form-control" placeholder="Search" />
           <i class="form-control-feedback glyphicon glyphicon-search" id = "search-but"></i> 

          </div>
     </div>
      -->
</div>
    <div class="container bar-align">
        <div class="navbar-header active">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"  id = "hamburgerbutton"><span class="glyphicon glyphicon-menu-hamburger"></span> 
            </button>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbars" id = "searchbutton"><span class="glyphicon glyphicon-search"></span> 
            </button>
    
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
                      <input type="search" class="form-control" placeholder="Search" />
                     <i class="form-control-feedback glyphicon glyphicon-search" id = "search-but"></i> 

                   
                </li>
           </ul>
         </div>  
  </nav>


    

    <!-- Bootstrap Core JavaScript -->


    <!-- Menu Toggle Script -->
   

</body>
</html>
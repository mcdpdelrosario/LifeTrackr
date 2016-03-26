
<html lang="en">
<head>
  <title>LifeTrackr</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <link href="userpage.css" rel="stylesheet">
  <link href="sidebar.css" rel="stylesheet">
  <link href="notifications.css" rel="stylesheet">


  <script src='//ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- <script src='js/jquery.ba-hashchange.min.js'></script> -->
  <!-- <script src='dynamicpage.js'></script> -->
  <!-- <script src='switchpage.js'></script> -->

  <!-- <link href="css/simple-sidebar.css" rel="stylesheet"> -->

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
  <div class="navbar-center navbar-header">
        <a  class="navbar-brand" >LF</a>
      </div>

      <div class="navbar-left navbar-header " id = "menu-toggle">
         <a href="userpage.php" ><span class="glyphicon glyphicon-menu-hamburger"></span> </a>
      </div>
      

    <div class="container bar-align">
     

        <div class="navbar-header active">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"><span class="glyphicon glyphicon-menu-hamburger"></span> 
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
  </nav>

  <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li><a href="#">Account</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </div>

        <!-- Page content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <a href="#" class="btn btn-success" id="menu-toggle">Toggle Menu</a>
                        <h1>Sidebar Layouts are Cool</h1>
                        <p>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap Core JavaScript -->


    <!-- Menu Toggle Script -->
    <!-- Menu toggle script -->
    <script>
        $("#menu-toggle").click( function (e){
            e.preventDefault();
            $("#wrapper").toggleClass("menuDisplayed");
        });
    </script>

</body>
</html>
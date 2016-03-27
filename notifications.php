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
  <link href="notifications.css" rel="stylesheet" media="screen and (min-width:0)">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


  
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
    
    <div class="container bar-align">
        <div class="navbar-header active" id ="logo">
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" id = "searchbutton"><span class="glyphicon glyphicon-menu-hamburger"></span> 
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
                      <form>
                      <input type="search" class="form-control" placeholder=" Search" />
                     <i class="form-control-feedback glyphicon glyphicon-search" id = "search-but"></i></form>   
                </li>
           </ul>
         </div> 


  </nav>
  
 


      


</body>
</html>
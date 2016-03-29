
<html lang="en">
<head>
  <title>LifeTrackr</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <link href="navbar.css" rel="stylesheet">
  <link href="userpage.css" rel="stylesheet">

  
  <script src='//ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
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
      $query = "select first_name,last_name from userinfo where username = '".$_SESSION["myuser"]."'";
      $result = mysqli_query($con, $query) or mysqli_error($con);
      while ($row = mysqli_fetch_array($result)) {
          $_SESSION["fname"] = $row[first_name];
        $_SESSION["lname"] = $row[last_name];
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

             <button type="button" class="navbar-toggle" data-toggle="collapse" id = "listbutton"><span class="glyphicon glyphicon-option-vertical"></span> 
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
            </li>
           </ul>
         </div> 

        <div class="collapse navbar-collapse" id="mySettings">
           <ul class="nav navbar-nav">
            
                 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-option-vertical" ></span></a>
                    <ul class="dropdown-menu">
                      <?php
                        include "list.html";
                      ?>
            </ul>
            </li>
           </ul>
         </div> 


      


  </nav>
  

    <div id="wrapper">
        <div id="sidebar-wrapper">
 
            <ul class="sidebar-nav">
               <?php

                  include "list.html";

               ?>
            </ul>
           
        </div>
        <!-- /#sidebar-wrapper -->

       

    </div>
  

    <section id="main-content">
      <div class="panel-group" >
        <div class="panel panel-default">
          <!-- <form action="goprofiler.php" method="post"> -->
            <div class="panel-heading plogh">
              <center><h4>Notifications</h4></center>
            </div>
            <div class="panel-body plogb">
            <div class="col-xs-2"></div>
                <div class="col-xs-8">

                  <?php
                    $con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");

                  // Check connection
                  if (mysqli_connect_errno())
                    {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    } else {
                        $query = "SELECT * FROM userinfo AS ui INNER JOIN notifications AS noti ON ui.username = noti.username WHERE noti.username = '".$_SESSION["myuser"]."' ORDER BY time_taken DESC";
                        $result = mysqli_query($con, $query) or mysqli_error($con);
                        while ($row = mysqli_fetch_array($result)) {
                           $_SESSION["uname_notif"] = $row['username'];
                           $_SESSION["fname_sender_notif"] = $row['first_name'];
                           $_SESSION["lname_sender_notif"] = $row['last_name'];
                           $_SESSION["uname_sender_notif"] = $row['from_username'];
                           $_SESSION["message_notif"] = $row['notif_message'];
                           $_SESSION["time_notif"] = $row['time_taken'];
                           ?>
                           <div class="inner-content">
                             <div class="panel panel-default">
                                <div class="panel-heading">
                                  <p><b><?=$_SESSION["fname_sender_notif"]?> <?=$_SESSION["lname_sender_notif"]?></b> @<?=$_SESSION["uname_sender_notif"]?> <?=$_SESSION["time_notif"]?></p>
                                </div>
                                <div class="panel-body">
                                  <p><?=$_SESSION["message_notif"]?></p>
                                </div>
                             </div>
                           </div>
                        <?php
                        }
                      }
                  ?>
                  <br>
                  <!-- <a href="#" id="load-more">Load More</a> -->
                  <button class="btn btn-default" id="load-more"><span class="glyphicon glyphicon-repeat"></span><br>Load</button>
                  </div>
                </div>
            </div>
        </div>
    </section>
      
    </section>
    <script>
      $(function(){
          $(".inner-content").slice(0, 3).show(); // select the first ten
          $("#load-more").click(function(e){ // click event for load more
              e.preventDefault();
              $(".inner-content:hidden").slice(0, 3).show(); // select next 10 hidden divs and show them
              if($(".inner-content:hidden").length == 0){ // check if any hidden divs still exist
                  alert("No more Notifications!"); // alert if there are none left
              }
          });
      });
    </script>
    <script src="js/jquery-2.2.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
  <script>
    $("#listbutton").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>


</body>
</html>
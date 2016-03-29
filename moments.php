<!DOCTYPE html>
<html lang="en">
<head>
  <title>LifeTrackr</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  
  <link href="navbar.css" rel="stylesheet" media="screen and (min-width:0)">
  <link href="userpage.css" rel="stylesheet"media="screen and (min-width:0)">
  
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src='//ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
  <!-- <script src='dynamicpage.js'></script> -->
  <!-- <script src='switchpage.js'></script> -->

  <!-- <link href="css/simple-sidebar.css" rel="stylesheet"> -->

   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-QcrS-bymcrFPClDmuA4A3RMVZsvQCuQ&signed_in=false"></script>
  <!-- <script src="googlemaps_moments.js"></script> -->

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
        <div class="panel-group" >
        <div class="panel panel-default">
          <!-- <form action="goprofiler.php" method="post"> -->
            <div class="panel-heading plogh">
              <center><h4>Moments</h4></center>
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
                        $query = "SELECT * FROM userinfo AS ui INNER JOIN moments AS mmnt ON ui.username = mmnt.username WHERE mmnt.username = '".$_SESSION["myuser"]."' ORDER BY time_taken DESC";
                        $result = mysqli_query($con, $query) or mysqli_error($con);
                        while ($row = mysqli_fetch_array($result)) {
                           // $_SESSION["uname_notif"] = $row['username'];
                           $_SESSION["fname_my_moment"] = $row['first_name'];
                           $_SESSION["lname_my_moment"] = $row['last_name'];
                           $_SESSION["uname_my_moment"] = $row['username'];
                           $_SESSION["message_moments"] = $row['moments_message'];
                           $_SESSION["longtitude_moments"] = $row['longtitude'];
                           $_SESSION["latitude_moments"] = $row['latitude'];
                           $_SESSION["time_taken"] = $row['time_stamp'];
                           $longlat = $_SESSION["longtitude_moments"].','.$_SESSION["latitude_moments"];
                           ?>
                          
                           <div class="inner-content">
                             <div class="panel panel-default">
                                <div class="panel-heading">
                                  <p><b><?=$_SESSION["fname_my_moment"]?> <?=$_SESSION["lname_my_moment"]?></b> @<?=$_SESSION["uname_my_moment"]?> <?=$_SESSION["time_taken"]?></p>
                                </div>
                                <div class="panel-body">
                                  <?php

                                    echo "<img src='http://maps.googleapis.com/maps/api/staticmap?center=".$longlat."&zoom=14&size=400x300&sensor=true'>";

                                    ?>
                                  <p><?=$_SESSION["message_moments"]?></p>
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
      
    <script>
      $(function(){
          $(".inner-content").slice(0, 3).show(); // select the first ten
          $("#load-more").click(function(e){ // click event for load more
              e.preventDefault();
              $(".inner-content:hidden").slice(0, 3).show(); // select next 10 hidden divs and show them
              if($(".inner-content:hidden").length == 0){ // check if any hidden divs still exist
                  alert("No more Moments!"); // alert if there are none left
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
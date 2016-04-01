
<html lang="en">
<head>
  <title>LifeTrackr</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <link href="navbar.css" rel="stylesheet">
  <link href="userpage.css" rel="stylesheet">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src='//ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
</head>
<body>
<?php
  session_start();
?>

	<!-- palitan mo nalang ng navbar mo-->
  
                    <?php
                        include "navbar.php";
                      ?>



  
  <div class = "grid">
    <div class = "row">
      <div class="col-md-8 col-wd-12" id="container1-profileuser">
        <div class="panel panel-default lefty">
        
          <div class="panel-body" id="container1-background">
            <div id="left-panel">
              <div class="col-md-4">
                <img id="profile_pic" src="img.jpg">
              </div>
              <div class="col-md-8" id="profile_name">
                <a href="profile_user.php"><h4 id="myname"><?=$_SESSION["fname"]?> <?=$_SESSION["lname"]?> <br> </h4></a>
                <p id="username">@<?=$_SESSION["myuser"]?></p>
                <a href="profiler.php"><button class="btn btn-default edit-profile" id="editprofile-profileuser">Edit Profile</button></a>
              </div> 
            </div>
          </div>
        </div>
      </div>
      

        <div class="col-md-8 col-wd-12" id="container2-profileuser">
        <div class="panel panel-default">
    
          <div class="panel-body righty">
            <div id="right-panel">
              <ul class="nav nav-tabs">
                <li class="active"><a href="profile_user.php">Home</a></li>
                <li><a href="#">Menu 1</a></li>
                <li><a href="#">Menu 2</a></li>
              </ul>
            </div>

            
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
                           $_SESSION["lname_my_moment"] = $row['last_Name'];
                           $_SESSION["uname_my_moment"] = $row['username'];
                           $_SESSION["message_moments"] = $row['moments_message'];
                           $_SESSION["longtitude_moments"] = $row['longitude'];
                           $_SESSION["latitude_moments"] = $row['latitude'];
                           $_SESSION["time_taken"] = $row['time_stamp'];
                           $longlat = $_SESSION["longtitude_moments"].','.$_SESSION["latitude_moments"];
                           ?>
                          
                           <div class="inner-content">
                                  <p><b><?=$_SESSION["fname_my_moment"]?> <?=$_SESSION["lname_my_moment"]?></b> @<?=$_SESSION["uname_my_moment"]?> <?=$_SESSION["time_taken"]?></p>
                                  <?php
                                    echo "<img src='http://maps.googleapis.com/maps/api/staticmap?center=".$longlat."&zoom=19&size=400x300&sensor=true&maptype=satellite'>";
                                    ?>
                                  <p><?=$_SESSION["message_moments"]?></p>
                                  <hr>
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
  </div>

  

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

</body>
</html>
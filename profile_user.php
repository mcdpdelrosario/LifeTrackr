<html lang="en">
<head>
  <title>LifeTrackr</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <link href="userpage.css" rel="stylesheet">
  <!-- <link href="sidebar.css" rel="stylesheet"> -->

  <script src='//ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>

  <!-- <link href="css/simple-sidebar.css" rel="stylesheet"> -->

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-QcrS-bymcrFPClDmuA4A3RMVZsvQCuQ&signed_in=false"></script>
  <script src="googlemaps.js"></script>
</head>
<body>
<?php
  session_start();
?>

	<!-- palitan mo nalang ng navbar mo-->
  <nav class="navbar">
    <div class="container-fluid">
      <div class="navbar-center navbar-header">
        <a  class="navbar-brand" >LF</a>
      </div>
        <ul class="nav navbar-nav">
      <li>
        <a href="#menu-toggle" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger"></span>  </a>
      </li>
      <li>
        <a href="userpage.php" id="home-but"><span class="glyphicon glyphicon-home"></span> Home</a>
      </li>
      <li>
        <a href="moments.php" id="moments-but"><span class="glyphicon glyphicon-film"></span> Moments</a>
      </li>
      <li>
        <a href="notifications.php" id="notif-but" class="popper" data-toggle="popover" data-trigger="focus"><span class="glyphicon glyphicon-bell"></span> Notifications</a>
      </li>
        </ul>
      <div class="col-sm-3 col-md-3 pull-right">
        <form class="navbar-form" action="gosearch.php" method="get">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
            <div class="input-group-btn">
                <button class="btn btn-default" value="submit" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
    </div>
  </nav>

  <section id="main-content" class="container profile">
  	<div class="row">
  		<div class="col-xs-4">
      	<div class="panel panel-default lefty">
          <div class="panel-heading header">
          </div>
	        <div class="panel-body">
            <div id="left-panel">
              <img id="profile_pic" src="img.jpg">
              <a href="profile_user.php"><h4 id="myname"><?=$_SESSION["fname"]?> <?=$_SESSION["lname"]?> <br> </h4></a>
              <p id="username">@<?=$_SESSION["myuser"]?></p>
              <a href="profiler.php"><button class="btn btn-default edit-profile">Edit Profile</button></a>
            </div>
	        </div>
        </div>
		  </div>
      <div class="col-xs-8">
        <div class="panel panel-default">
          <div class="panel-heading header">
          </div>
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
                           $_SESSION["longtitude_moments"] = $row['long'];
                           $_SESSION["latitude_moments"] = $row['lat'];
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

</body>
</html>
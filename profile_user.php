
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
      <div class="col-md-4 col-wd-12" id="container1-profileuser">
        <div class="panel panel-primary lefty">
          <div class="panel-heading header">
          </div>
          <div class="panel-body">
            <div id="left-panel">
              <img id="profile_pic" src="img.jpg">
              <a href="profile_user.php"><h4 id="myname"><?=$_SESSION["fname"]?> <?=$_SESSION["lname"]?> <br> </h4></a>
              <p id="username">@<?=$_SESSION["myuser"]?></p>
              <a href="profiler.php"><button class="btn btn-default edit-profile" id="editprofile-profileuser">Edit Profile</button></a>
            </div>
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
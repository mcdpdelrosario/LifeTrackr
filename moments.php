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
    <script src="js/jquery-2.2.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-QcrS-bymcrFPClDmuA4A3RMVZsvQCuQ&signed_in=false"></script>
  <!-- <script src="googlemaps_moments.js"></script> -->

</head>
<body>
    <?php
      include "navbar.php";
    ?>

     <div class="grid">
    <div class="row">
      <div class="col-wd-12 col-md-4" id="containera-moments">
        <div id="container1-moments">
          <div class="col-md-4">
            <img id="profile-pic-moments" src="img.jpg">
          </div>

          <div class="col-md-8" id="profile_name_moments">
          </div> 
        </div>

        <div id ="container2-moments">

           <ul class="nav nav-pills" id="icons-moments">
                <li><a href="#" >
                  <!-- <span class="glyphicon glyphicon-user"id="message-moments"></span> -->Friends
                  </a></li>
                <li><a href="#" >
                  <!-- <span class="glyphicon glyphicon-envelope"id="message-moments"> -->Messages
                  </a></li>
                <li><a href="#" >
                <!--   <span class="glyphicon glyphicon-heart-empty"id="message-moments"> -->Likes
                  </a></li>
                <!-- <li><a href="#" >
                  <span class="glyphicon glyphicon-cog"id="message-moments"></span>
                  </a></li> -->
          </ul>
      </div>
        
    </div>
   </div> 
  </div>
                 



</body>
</html>
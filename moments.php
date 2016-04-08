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
<div class="containera-moments">
  <div class="row">
     <div class="col-lg-3 col-md-4 col-sm-4" id="container1-moments">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-1">
            <img id="profile-pic-moments" src="img.jpg">
          </div>
          
          <div class="col-lg-8 col-md-4 col-sm-4 col-xs-1" id="name">
            Angel
          </div>

    </div>


   <div class="container2-moments">  
      <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-3">
            <img id="container2-profile" src="img.jpg">
        </div>

        <div class="col-lg-10 col-md-9 col-sm-8 col-xs-6">
          
           <input type="text" class="form-control" placeholder=" Make now a moment." id="input-moments"/>

        </div>
    
      </div>
    </div> 

  </div>


</div>

<div class="containerb-moments">

<div class="row">
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12" id="container3-moments">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="icons-moments">
            <ul class="nav nav-pills">
                <li><a href="#" id="friends-icons" >
                  <!-- <span class="glyphicon glyphicon-user"id="message-moments"></span> -->Friends
                  </a></li>

                 <li><a href="#" id="messages-icons" >
                  <!-- <span class="glyphicon glyphicon-user"id="message-moments"></span> -->Messages
                  </a></li>

                  <li><a href="#" id="likes-icons">
                  <!-- <span class="glyphicon glyphicon-user"id="message-moments"></span> -->Likes
                  </a></li>

          </ul>

       </div>   
      
    </div>
</div>

</body>
</html>
<!-- The new loginpage -->

<!-- working -->
<html lang="en">
<head>

  <title>LifeTrackr</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1 ,maximum-scale=1,user-scalable=no">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="HandheldFriendly" content="true">
  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <!-- <link href="userpage.css" rel="stylesheet" media="screen and (min-width:0)"> -->
   <link href="navbar.css" rel="stylesheet" media="screen and (min-width:0)">
    <link href="userpage.css" rel="stylesheet" media="screen and (min-width:0)">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


  <script src="dist/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">


  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-QcrS-bymcrFPClDmuA4A3RMVZsvQCuQ&signed_in=false"></script>
  <script src="main_Map.js"></script>
  <script src="momentHandler.js"></script>
</head>
<body>

 <div id="background"> 
<?php

session_start();
 include "navbar.php";
  $con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");
?>

    <!-- include "logout.php"; -->
  

   <div class = "row">

        <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-12" id="container1-moments">
          <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-6 col-xs-3">
                       <img id="profilepic-moments" src="img.jpg">
                </div>
                
              

               <div class "col-lg-offset-1 col-lg-6 col-md-offset-1 col-md -6 col-sm-offset-1 col-sm-offset-1" id="name-moments">

                    <a href="profile_user.php?user=<?=$_SESSION['userid']?>"><?=$_SESSION['firstname']?> <?=$_SESSION['lastname']?></br>
                    @<?=$_SESSION['username']?></a>

                </div>

          </div>      
      </div>

       <div class="col-lg-offset-1 col-lg-7 col-md-offset-1 col-md-4 col-sm-offset-1 col-sm-4 col-xs-12" id="container2-moments"> 
        <div class="row">
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <img id="profilepic1-moments" src="img.jpg">
          </div>

          <div class="col-lg-8 col-lg-offset-1 col-md-7 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-offset-1 col-xs-4" id="post-moments">
              <form>
                  <input type="text" class="form-control" placeholder=" Make now a moment." id="input-moments"  size="15"/>
              </form>
              <button id="ConfirmMoment" class="btn btn-default" type="submit" value="submit" onclick="createMomentdash()">Post</button>
              
          </div>    

       </div>

       <div id ="container4-moments">
         <?php
          if (mysqli_connect_errno())
                    {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    } else {
                        $query_postmoment = "SELECT m.user_id, m.moments_id, m.img_id, m.moments_message, m.longitude, m.latitude, m.time_stamp, username, first_name, last_name, ui.img_id AS user_img_id FROM moments AS m 
                                INNER JOIN userinfo AS ui 
                                    ON m.user_id = ui.user_id 
                                INNER JOIN friends AS f  
                                    ON m.user_id = f.user_id_fr 
                                WHERE f.user_id_user=".$_SESSION['userid']." AND status =1 
                                UNION ALL 
                                SELECT m2.user_id, m2.moments_id, m2.img_id, moments_message, longitude, latitude, m2.time_stamp, username, first_name, last_name, ui2.img_id FROM moments AS m2 
                                INNER JOIN userinfo AS ui2 
                                    ON m2.user_id = ui2.user_id 
                                    WHERE ui2.user_id=".$_SESSION['userid']."
                                ORDER BY time_stamp DESC";
                        $result_postmoment = mysqli_query($con, $query_postmoment) or mysqli_error($con);
                        while($row = mysqli_fetch_array($result_postmoment)){
                            $latlong=$row['latitude'].','.$row['longitude'];
                        ?>
                          <div class="panel panel-default">
                            <div class="panel-heading"><a href="profile_user.php?user=<?=$row['user_id']?>"><?=$row['first_name']?> <?=$row['last_name']?> @<?=$row['username']?></a>
                            <p></br> <?=$row['time_stamp']?></p>
                            </div>
                            <div class="panel-body">
                              <img src='http://maps.googleapis.com/maps/api/staticmap?center=<?=$latlong?>&zoom=18&size=400x300&sensor=true&maptype=satellite'>
                                <hr>
                                  <p><?=$row['moments_message']?></p></div>
                            <div class="panel-footer">
                              <p><a href="likeMoments.php?moment_id=<?=$row['moments_id']?>&moment_user_id=<?=$row['user_id']?>"><button class="btn btn-default">Like</button>  <button class="btn btn-default">Comment</button></p>

                            </div>
                          </div>
                        <?php
                        }
                    }

        ?>

       
   </div>       

  </div>

</div>

<div class="row">

  <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-12" id="container3-moments">
       <ul class="nav nav-pills"id="pills-moments">
        <li class="pills-class-moments"data-toggle="modal" data-target="#friendsModal" id="friends-tab"><a href="#">Friends</a></li>
        <li  class="pills-class-moments" data-toggle="modal" data-target="#likesModal" id="likes-tab"><a href="#">Likes</a></li>
      </ul>

</div>

<div class="modal fade" id="likesModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Your likes</h3>
        </div>
        <div class="modal-body">
          <?php
            $query="SELECT username, first_name, last_name, moment_id, m.user_id FROM likes AS l
  INNER JOIN moments AS m
  ON m.moments_id = l.moment_id
    INNER JOIN userinfo AS ui
    ON m.user_id = ui.user_id
WHERE l.user_id = ".$_SESSION['userid']."";
            $result = mysqli_query($con,$query);
            while($row=mysqli_fetch_array($result)){
              echo "You liked ";
              ?>
                <div class="panel-body">
                  <a href="profile_user.php?user=<?=$row['user_id']?>"><?=$row['first_name']?> <?=$row['last_name']?>'s</a><p> </p><a href="showMoments.php?moment_id=<?=$row['moment_id']?>">post</a>
                </div>
              <?php
            }
          ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="friendsModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h3>Friends List</h3>
        </div>
        <div id="friendsList"class="modal-body">
        <?php
          $query="select user_id_fr,first_name, last_name, username, img_id from friends as f
          inner join userinfo as ui
          on f.user_id_fr = ui.user_id
        where status=1 and user_id_user = ".$_SESSION['userid']."";
          $result=mysqli_query($con,$query);
          while($row=mysqli_fetch_array($result)){
?>
          <div class="panel-body">
            <a href="profile_user.php?user=<?=$row['user_id_fr']?>"><?=$row['first_name']?> <?=$row['last_name']?></br>@<?=$row['username']?></a>
          </div>
<?php


          }

        ?>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


</body>
</html>
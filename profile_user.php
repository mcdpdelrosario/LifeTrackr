<html lang="en">
<head>

  <title>LifeTrackr</title>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1 ,maximum-scale=1,user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="HandheldFriendly" content="true">
  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="navbar.css" rel="stylesheet" media="screen and (min-width:0)">
  <link href="userpage.css" rel="stylesheet" media="screen and (min-width:0)">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="dist/sweetalert.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-QcrS-bymcrFPClDmuA4A3RMVZsvQCuQ&signed_in=false"></script>
  <script src="main_Map.js"></script>
  <script src="momentHandler.js"></script>

</head>

<body>
  <?php
    session_start();
    $con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");
    // Check connection
    $userid=$_GET['user'];
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } 
    else 
    {
        $query="SELECT username, first_name, last_name FROM userinfo WHERE user_id=".$userid."";
        $result=mysqli_query($con,$query) or mysqli_error($con);
        $row=mysqli_fetch_array($result);
      
    }
    include "navbar.php";
  ?>                           


  <div class = "grid">
    <div class = "row">
      <div class="col-lg-12 col-lg-offset-2 col-md-12 col-md-offset-1 col-sm-12 col-sm-offset-1" id="container1-profileuser">
          <div class="panel-body">
              <div id="left-panel">
                    <div class="row">
                        <div class="specialcontainer-profile_user">
                          <div class="col-lg-3 col-md-3 col-sm-7 col-xs-4">
                            <img id="profilepic-profile_user" src="#">
                          </div>

                          <div class="col-lg-offset-1 col-lg-5 col-md-offset-2 col-md-5" id="names-profile_user">
                            
                            <a href="profile_user.php"><h4 id="myname"><?=$row['first_name']?> <?=$row['last_name']?> <br> </h4></a>
                            <p id="username-profile_user">@<?=$row['username']?></p>

                          </div>
                           
                           <div id="container2-profileuser">

                      <?php
                           if($userid==$_SESSION['userid']){
                            ?>
                            <a href="profiler.php?userid=<?=$_SESSION['userid']?>"><button class="btn btn-default edit-profile" id="profilebutton-profile_user" >Edit Profile</button></a>
                            <?php
                          }else{
                            $query="SELECT user_id_fr,status FROM friends WHERE user_id_user=".$_SESSION['userid']." AND user_id_fr=".$userid."";
                            $result=mysqli_query($con,$query);
                            $row=mysqli_fetch_array($result);
                            if(mysqli_num_rows($result)==1&&$row['status']==0){
                              ?>
                                <a href="deleteFriend.php?friend=<?=$userid?>"><button class="btn btn-default edit-profile" id="cancelfriend-button" >Pending</button></a>
                              <?php
                            }else if(mysqli_num_rows($result)==0){
                              ?>
                                <a href="addFriend.php?friend=<?=$userid?>"><button class="btn btn-default edit-profile" id="add-button" >Add Friend</button></a>
                              <?php
                            }else if(mysqli_num_rows($result)==1&&$row['status']==1){
                              ?>
                                <a href="deleteFriend.php?friend=<?=$userid?>"><button class="btn btn-default edit-profile" id="delete-button">Friend</button></a>
                                <?php
                            }
                            
                          }
                            
                            ?>
        </div>  


                         </div> 
                  
                      <div id ="container3-profileuser">
                           <?php
                      $con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");

                    // Check connection
                    if (mysqli_connect_errno())
                      {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                      } else {
                          $query = "select m.time_stamp, moments_message, longitude, latitude, first_name, last_name, username from userinfo as ui 
                            inner join moments as m 
                            on ui.user_id = m.user_id
                              where ui.user_id = ".$userid." ORDER BY time_stamp DESC";
                          $result = mysqli_query($con, $query) or mysqli_error($con);
                          while ($row = mysqli_fetch_array($result)) {
                            $latlong=$row['latitude'].",".$row['longitude'];
                             ?>
                            
                                    <p><b><?=$row['first_name']?> <?=$row['last_name']?></b> @<?=$row['username']?> <?=$row['time_stamp']?></p>
                                    <img id="pic-profile_user"src='http://maps.googleapis.com/maps/api/staticmap?center=<?=$latlong?>&zoom=19&size=400x300&sensor=true&maptype=satellite'>
                                    <hr>
                                    <p><?=$row['moments_message']?></p>
                                    <hr>

                        <?php
                          }
                        }
                    ?>
                        </div>

                
                  <br>
                    </div>      
                           
              </div>
         </div>
        </div>  

     

                          <div id="cogbutton-profile_user">
                                <a href="profiler.php"> <button type="button" class="btn btn-default btn-sm"> <span class="glyphicon glyphicon-cog" id="cogbutton"></span></button></a>
                          </div>

                           <div id="container3-prof">
    

               
                         </div>

</body>



</html>
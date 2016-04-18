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
  <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="dist/sweetalert.min.js"></script>
  <script src="main_Map.js"></script>
  <script src="momentHandler.js"></script>

</head>
<body>
 <?php
 session_start();
 $con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");
  include "navbar.php";
?>


    <div class = "row">

        <div class="col-lg-2 col-lg-offset-1"style="background-color:yellow;"id="container1-notifications">

          <h3>Notifications</h3>
          <ul class="nav nav-pills nav-stacked">
            <li><a href="Notifications.php">All <span class="glyphicon glyphicon-menu-right notiglyph"></span></a></li>
            <li><a href="activityNotifications.php">Activities <span class="glyphicon glyphicon-menu-right notiglyph"></span></a></li>
            <li class="active"><a href="friendRequestNotifications.php">Friend Requests <span class="glyphicon glyphicon-menu-right notiglyph"></span></a></li>
          </ul>

        </div>

        <div class ="col-lg-offset-1 col-lg-5 " style="background-color:red;"id="container2-notifications">
          <?php
          $query = "SELECT notification_type, link_id FROM notifications WHERE user_owner = ".$_SESSION['userid']." AND notification_type=3 ORDER BY time_stamp DESC";
            $result_notitype=mysqli_query($con, $query) or mysqli_error($con);

            while($row = mysqli_fetch_array($result_notitype)){
          $query_fr="SELECT ui.user_id,n.time_stamp, first_name, last_name, username FROM notifications AS n
                                    INNER JOIN friends AS f
                                      ON n.link_id = f.friends_id
                                      INNER JOIN userinfo AS ui
                                      ON n.user_id = ui.user_id
                                  WHERE n.user_owner=".$_SESSION['userid']." AND n.link_id=".$row['link_id']." AND f.status=0";
                                  $result_fr=mysqli_query($con, $query_fr) or mysqli_error($con);
                                    while($row = mysqli_fetch_array($result_fr)){
                                      ?>

                                          <div class="panel-body">
                                          <a href="profile_user.php?user=<?=$row['user_id']?>"><?=$row['first_name']?> <?=$row['last_name']?></a>
                                          <?php
                                            echo "added you.<br>";
                                          ?>
                                            <a href="acceptFriend.php?friend=<?=$row['user_id']?>"><button class="btn btn-default">Accept</button></a>
                                          </div>

                                      <?php
                                    }
                                }
                                    ?>
        </div>
   </div>
      

      <script>
        
      </script>
</body>

</html>
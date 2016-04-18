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
  <?php
    session_start();
     include "navbar.php";
    $con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");
    // Check connection

    $userid=$_GET['userid'];
    
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } 
    else 
    {
		  $query = "SELECT * FROM userinfo WHERE user_id = ".$userid."";
			$result = mysqli_query($con, $query) or mysqli_error($con);
			
      while ($row = mysqli_fetch_array($result)) 
      {
			  $_SESSION["uname"] = $row['username'];
        $_SESSION["pword"] = $row['password'];
				$_SESSION["lname"] = $row['last_name'];
        $_SESSION["fname"] = $row['first_name'];
        $_SESSION["email"] = $row['email'];
			}
	   }
  ?>


  <section class="container" id="container1-profiler">
    <div class="panel-group" >
      <div class="panel panel-default">
        <form action="goprofiler.php" method="post">
          <div class="panel-heading plogh" id ="box1">
            <center><h4>General Account Settings</h4></center>
          </div>
          
          <div class="panel-body plogb" id = "box">
            <div class="col-lg-2"></div>
            <div class="col-xs-8">

              <div class="form-group" id="image-profiler">
                 <img id="profile-pic-profiler" src="#" class="img-circle">
              </div>

              <button class="btn btn-default" type="submit" value="submit" id="upload-profiler">Upload</button>
              
              <div class="form-group" id="firstname-profiler">
               <p>First Name</p><input type="text" class="form-control" id="fname_edit" name="fname_edit" value="<?=$_SESSION["fname"]?>">
              </div>
              
              <div class="form-group" id="lastname-profiler">
                <p>Last Name</p><input type="text" class="form-control" id="lname_edit" name="lname_edit" value="<?=$_SESSION["lname"]?>">
              </div>
              
              <div class="form-group"id="username-profiler">
               <p>Username</p> <input type="text" class="form-control" id="uname_edit" name="uname_edit" value="<?=$_SESSION["uname"]?>">
              </div>
              
              <div class="form-group"id="email-profiler">
                <p>Email Address</p><input type="text" class="form-control" id="email_edit" name="email_edit" value="<?=$_SESSION["email"]?>">
              </div>
              
              <div class="form-group"id="password-profiler">
                <p>Password</p><input type="password" class="form-control" id="pword_edit" name="pword_edit" value="<?=$_SESSION["pword"]?>">
              </div>
                
              <button class="btn btn-default" type="submit" value="submit" id="update-profiler">Update</button>
            </div>
          </div>
        </form> 
      </div>
    </div>
	</section>

 <!--  <section>
    <div class="container">
      <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal" data-backdrop="true">Modal with Overlay (true)</button>
      
      <div class="modal fade" id="myModal" role="dialog">
    
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal with Dark Overlay</h4>
            </div>
            
            <div class="modal-body">
              <p>This modal has a dark overlay.</p>
            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>      
        </div>
      </div>          
    </div>
  </section> -->

  <script src="js/jquery.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) 
    {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>
</html>
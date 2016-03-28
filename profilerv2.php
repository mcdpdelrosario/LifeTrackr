<html lang="en">
<head>
  	<title>LifeTrackr</title>
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  	<link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<link href="profiler.css" rel="stylesheet">
  	<link href="sidebar.css" rel="stylesheet">

  	<script src='//ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
  	<script src='js/jquery.ba-hashchange.min.js'></script>
  	<!-- <script src='dynamicpage.js'></script> -->
  	<!-- <script src='switchpage.js'></script> -->

  	<!-- <link href="css/simple-sidebar.css" rel="stylesheet"> -->

  	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-QcrS-bymcrFPClDmuA4A3RMVZsvQCuQ&signed_in=true"></script>
	<script src="js/googlemaps.js"></script>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<link href="bootstrap.min.css" rel="stylesheet">
	<link href="homepage.css" rel="stylesheet">
	
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#login-btn").click(function(){
				$("#login-modal").fadeIn();
			});
		});
	</script>

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
			$query = "select * from userinfo where userName = '".$_SESSION["myuser"]."'";
			$result = mysqli_query($con, $query) or mysqli_error($con);
			while ($row = mysqli_fetch_array($result)) {
			  $_SESSION["uname"] = $row[0];
        $_SESSION["pword"] = $row[2];
				$_SESSION["lname"] = $row[3];
        $_SESSION["fname"] = $row[4];
        $_SESSION["email"] = $row[5];
			}
			
	}
?>

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
	  </div>
	</nav>
	<div id="wrapper" class="toggled">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav" >
                <li class="sidebar-brand" >
                    <a href="#" >
                        <img src="img.jpg" class="imgicon"><br>
                        <p>
                        <?php
                        	echo $_SESSION["fname"]." ". $_SESSION["lname"];
                        ?></p>
                    </a>
                </li>
                <!-- <hr width="70%"> -->
                <div class="sidebar-coms">
                <li>
                    <a href="#">Favorites</a>
                </li>
                <li>
                    <a href="#">Friends</a>
                </li>
                <li>
                    <a href="#">Drafts</a>
                </li>
                <li>
                    <a href="#">Settings</a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#login-modal" id="login-btn">LogOut</button> 
                </li>
                </div> 
            </ul>
        </div>
    </div>

<!---->
                    	<div class="container">
							<div class="modal modal-login fade " id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="vertical-alignment-helper-login">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<font style="font-family: Avant Garde,Avantgarde,Century Gothic,CenturyGothic,AppleGothic,sans-serif" ><h5 class="modal-title" id="myModalLabel">Login</font></h5>
										</div>
											<div class="modal-body">
												<form role="form">
													<button type="button" class="btn btn-primary btn-md">Confirm</button> 
													<button type="button" class="btn btn-primary btn-md">Cancle</button> 
												</form>
											</div>
									</div>		
							    </div>
								</div>
							</div>					
						</div>
                    <!---->

    <section class="container" id="main-content">
      <div class="panel-group" >
        <div class="panel panel-default">
          <form action="goprofiler.php" method="post">
            <div class="panel-heading plogh">
              <center><h4>General Account Settings</h4></center>
            </div>
            <div class="panel-body plogb">
              <div class="col-xs-2">
              
              </div>
              <div class="col-xs-8">
                <div class="form-group">
                  <input type="text" class="form-control" id="fname_edit" name="fname_edit" value="<?=$_SESSION["fname"]?>">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="lname_edit" name="lname_edit" value="<?=$_SESSION["lname"]?>">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="uname_edit" name="uname_edit" value="<?=$_SESSION["uname"]?>">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="email_edit" name="email_edit" value="<?=$_SESSION["email"]?>">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="pword_edit" name="pword_edit" value="<?=$_SESSION["pword"]?>">
                </div>
                <button class="btn btn-default" type="submit" value="submit" id="update-but">Update</button>
              </div>
            </div>
          </form> 
        </div>
      </div>
        
        
        
        
        
		</section>

    

    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>
</html>
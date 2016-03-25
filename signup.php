<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>LifeTrackr</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1 ,maximum-scale=1,user-scalable=no">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="HandheldFriendly" content="true">
  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="signup.css" rel="stylesheet" media="screen and (min-width:0)">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">


	<nav class="navbar navbar-default navbar-fixed-top" role = "navigation" id = "navbars">
		<div class="container bar-align">
				<div class="navbar-header active" id ="logo">
					 <a href="index.html" id="signup-but"> <button type="button" class="navbar-toggle">HOME </button></a>
						<div class = "logo">
						LifeTracker
						</div>

						<div class ="logologo">
						LF
						</div>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					
					  	<ul class="nav navbar-nav navbar-right ">
							<li>
								
        						 <a href="index.html" id="signup-but"><span class="glyphicon glyphicon-home"></span> Home</a>
   								 	
							</li>

					  	</ul>
				
				</div>
		</div>
	</nav>

 <div class = "grid">
    <div class = "row">
		<div class ="col-xs-1 col-md-0 col-wd-1"></div>
        <div class ="col-xs-5 col-md-5 	col-wd-1 caption">
        	
        	<span class="glyphicon glyphicon-plus-sign"></span> Be a member
        	<br><br>
        	<span class="glyphicon glyphicon-camera"></span> Capture moments
        	<br><br>
        	<span class="glyphicon glyphicon-time"></span> Share timeless memories
        	<br><br>
        	<span class="glyphicon glyphicon-repeat"></span> Watch and repeat every moment
        </div>


		<!-- <div class ="col-xs-2"></div> -->
        <div class ="col-xs-4 col-md-6 col-wd-12">
          <form action="gosignup.php" method="post">
				<div class ="col"><center><h3>Not a member?</h3></center>
				<div class="row">
		
					<div class="col-xs-6 box col-md-6">

		                          <div class="form-group" id = "First">
		                            <input type="text" class="form-control" id="fname-su" placeholder="First Name" name="fname-su">
		                          </div>
		                          
		             </div>

		             <div class="col-xs-6 col-md-6 box">
		                          <div class="form-group"  id = "First">
		                            <input type="text" class="form-control" id="lname-su" placeholder="Last Name" name="lname-su">
		                          </div>
		             </div>

		             <div class="col-xs-12 col-md-12 box">
												<div class="form-group">
													<input type="text" class="form-control" id="uname-su" placeholder="Username" name="uname-su">
												</div>
												<div class="form-group">
													<input type="text" class="form-control" id="eadd-su" placeholder="Email Address" name="eadd-su">
												</div>
												<div class="form-group">
													<input type="password" class="form-control" id="pwd-su" placeholder="Password" name="pwd-su">
												</div>
												<div class="form-group">
													<input type="password" class="form-control" id="cpwd-su" placeholder="Confirm Password" name="cpwd-su">
												</div>
												<button class="btn btn-default" type="submit" value="submit" id="sign-but">Register</button>
									</div>
	
				</div>
          </form>
        </div>

        <div class ="col-xs-2 col-md-0"></div>

	</div>
</div>

	    


</body>
</html>
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
  <link href="login.css" rel="stylesheet" media="screen and (min-width:0)">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

	<nav class="navbar navbar-default navbar-fixed-top" role = "navigation">
		<div class="container bar-align">
				<div class="navbar-header active" id ="logo">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=#myNavbar>

					  	Login

					  </button>
					<a class="navbar-brand" href="#home"><!-- LifeTracker --></a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<form action="checklogin.php" method="post">
					  	<ul class="nav navbar-nav navbar-right ">
							<li>
								<input type="text" class="form-control" id="eadd-log" placeholder="Username" name="uname_log">
							</li>
							<li>
								<input type="password" class="form-control" id="pwd-log" placeholder="Password" name="pwd_log">
							</li>
							<li>
								<button class="btn btn-default" type="submit" value="submit" id="login-but">Log in </button>
							</li>


					  	</ul>
					</form>
				</div>
		</div>
	</nav>


	<div class = "grid">
		<div class = "row">

				<div class ="col-xs-7 col-wd-1">
		          <div class ="col">6column</div>
		        </div>
		     

		        <div class = "col-xs-5">
		        	 <form action="gosignup.php" method="post">

		                <div class"col-wd-12 ">
		                    <div class ="col"><center><h3>Not a member?</h3></center>
		                      <div class="row">

		                        <div class="col-wd-6 box">

		                          <div class="form-group" id = "First">
		                            <input type="text" class="form-control" id="fname-su" placeholder="First Name" name="fname-su">
		                          </div>
		                          
		                        </div>
		                     <!--    
		                        <div class="col-wd-1">
		                        </div> -->

		                        <div class="col-wd-6 box">
		                          <div class="form-group"  id = "First">
		                            <input type="text" class="form-control" id="lname-su" placeholder="Last Name" name="lname-su">
		                          </div>
		                        </div>

		                        <div class="col-sm-12 box">
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
		                    </div>


		                 </div>
		          	
         			 </form>      
		        	
					
		        </div>

		</div>
	


	</div>

	    


</body>
</html>
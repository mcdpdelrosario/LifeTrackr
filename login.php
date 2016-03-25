<html lang="en">
<head>

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
<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


  
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

	<nav class="navbar navbar-default navbar-fixed-top" role = "navigation" id = "navbars">
		<div class="container bar-align">
				<div class="navbar-header active" id ="logo">
					 <a href="signup.php" id="signup-but"> <button type="button" class="navbar-toggle">SIGN UP </button></a>
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
								
        						 <a href="signup.php" id="signup-but"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
   								 	
							</li>

					  	</ul>
				
				</div>
		</div>
	</nav>
	
	<div class = "grid">
		<div class = "row">
		      <div class = "col-xs-2">
				</div>
				
		        <div class = "col-xs-4 col-md-6">
		        	 <form action="checklogin.php" method="post">

		                <div class"col-xs-12 col-md-12 col-wd-6">
		                    <div class ="col"><center><h3>WELCOME!</h3></center>
		                      <div class="row">

		                        <div class="col-xs-12 col-md-12 box">
												<div class="form-group">
													<input type="text" class="form-control" id="eadd-log" placeholder="Username" name="uname_log">
												</div>
												<div class="form-group">
													<input type="password" class="form-control" id="pwd-log" placeholder="Password" name="pwd_log">
												</div>
												<button class="btn btn-default" type="submit" value="submit" id="sign-but">Log In</button>
									</div>
		                      </div>
		                    </div>
		                 </div>
         			 </form>      
		        </div>

		       


				<div class ="col-xs-6 col-md-6 col-wd-1">
		          <div class =caption>
		          <h3>	Welcome to LifeTracker </h3>
		          <p><span class ="highlight"> In LifeTracker </span>, capture every moment without hesitation. <br> Commit and share it with your loved ones.					
				  <br>
				  <br>		
		          You can also connect and visit your friends profile <br>and witness some of their unforgettable experiences.
				 
				 <br>
				 <br>
		          Enjoy!
		          </p>
		          </div>

		         

		        </div>
		     
		  

		</div>
	


	</div>


	    


</body>
</html>
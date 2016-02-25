<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>LifeTrackr</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="login.css" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
				<div class="navbar-header active">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					  </button>
					<a class="navbar-brand" href="#home">LifeTrackr</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<form action="userpage.php" method="post">
					  	<ul class="nav navbar-nav navbar-right ">
							<li>
								<input type="text" class="form-control" id="eadd-log" placeholder="Email" name="eadd_log">
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

		
	<div class="container signup">
		<div class="row">
			<div class="col-xs-6">
				Insert things here.
			</div>
			<div class="col-xs-5">
				<div class="panel-group" >
						<div class="panel panel-default">
							<form action="UserPage.php" method="post">
								<div class="panel-heading plogh">
									<center><h3>Not a member?</h3></center>
								</div>
								<div class="panel-body plogb">
										<div class="col-sm-6">
											<div class="form-group">
												<input type="text" class="form-control" id="fname-su" placeholder="First Name" name="fname-su">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<input type="text" class="form-control" id="lname-su" placeholder="Last Name" name="lname-su">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<input type="text" class="form-control" id="eadd-su" placeholder="Email Address" name="eadd-su">
											</div>
											<div class="form-group">
												<input type="text" class="form-control" id="pwd-su" placeholder="Password" name="pwd-su">
											</div>
											<div class="form-group">
												<input type="text" class="form-control" id="cpwd-su" placeholder="Confirm Password" name="cpwd-su">
											</div>
											<button class="btn btn-default" type="submit" value="submit" id="sign-but">Register</button>
										</div>
								</div>
							</form>	
						</div>
					</div>
			</div>
		</div>
	</div>
</body>
</html>
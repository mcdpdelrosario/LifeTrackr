<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>LifeTrackr</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="userpage.css" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
<?php
/*  
	This is the page for receiving the posted values.
	Use checking for posted values to refrain errors. :)
*/ 	

	if (!empty($_POST)) {
		
		$logged_num = $_POST["eadd_log"];
		$signed_num = $_POST["pwd_log"];
	}
	
	$log="11277920";
	$pass="2hutru8e";
	$name=" Dips";

	$out_u = strcmp($logged_num,$log);
	$out_p = strcmp($signed_num,$pass);
	
	if($out_u!=0 && $out_p!=0){
		header('Location: http://www.google.com');
	}
	
?>

	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
		  	<ul class="nav navbar-nav">
				<li>
					<a href="#"><span class="glyphicon glyphicon-home"></span> Home</a>
				</li>
				<li>
					<a href="#"><span class="glyphicon glyphicon-film"></span> Moments</a>
				</li>
				<li>
					<a href="#"><span class="glyphicon glyphicon-bell"></span> Notifications</a>
				</li>
		  	</ul>
		  	<div class="navbar-brand">
		  		LifeTrackr
		  	</div>
		  	<ul class="nav navbar-nav navbar-right">
		  		<li>
		  			<div class="inner-addon left-addon">
			      		<i class="glyphicon glyphicon-user"></i>
	    				<input type="text" class="form-control test" placeholder=" Search">
	    			</div>
		      	</li>
		      	<li>
		      		<a href="#"><img class="iconimg"src="img.jpg"> <?=$name?></a>
		      	</li>
		      	<li>
		      		<a href="#"><span class="glyphicon glyphicon-cog"></span></a>
		      	</li>
		    </ul>
		</div>
	</nav>

		
	<div class="container signup">
		<div class="row">
			<div class="col-xs-6">
			</div>
			<div class="col-xs-6">

			</div>
		</div>
	</div>
</body>
</html>
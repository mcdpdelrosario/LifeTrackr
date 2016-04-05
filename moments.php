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
      $con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");
      // Check connection
      if (mysqli_connect_errno())
      {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      } 
      else 
      {
        $query = "SELECT first_name,last_name from userinfo where user_id = '".$_SESSION["myuser"]."'";
        $result = mysqli_query($con, $query) or mysqli_error($con);
        while ($row = mysqli_fetch_array($result)) 
        {
          $_SESSION["fname"] = $row['first_name'];
          $_SESSION["lname"] = $row['last_name'];
        }
      }
      include "navbar.php";
    ?>
    
    <div class="containera-moments">
      <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-4" id="container1-moments">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-1">
            <img id="profile-pic-moments" src="img.jpg">
          </div>
          
          <div class="col-lg-8 col-md-4 col-sm-4 col-xs-1" id="name">Angel</div>
        </div>
        
        <div class="container2-moments">  
          <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="col-lg-2 col-md-1 col-sm-1 col-xs-3">
              <img id="container2-profile" src="img.jpg">
            </div>

            <div class="col-lg-10 col-md-8 col-sm-8 col-xs-6">
              <input type="text" class="form-control" placeholder=" Make now a moment." id="input-moments"/>
            </div>
          </div>
        </div> 
      </div>
    </div>
    
    <div class="containerb-moments">
      <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-1" id="container3-moments">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-1 col-xs-1" id="icons-moments">
              <ul class="nav nav-pills">
                <li>
                  <a href="#" id="friends-icons" >
                    <!-- <span class="glyphicon glyphicon-user"id="message-moments"></span> --><span>Friends</span>
                  </a>
                </li>
                
                <li>
                  <a href="#" id="messages-icons" >
                    <!-- <span class="glyphicon glyphicon-user"id="message-moments"></span> -->Messages
                  </a>
                </li>
                
                <li>
                  <a href="#" id="likes-icons">
                    <!-- <span class="glyphicon glyphicon-user"id="message-moments"></span> -->Likes
                  </a>
                </li>

              </ul>
            </div>   
          </div>   
        </div>
      </div>
    </div>

    <div class="containerc-moments">
      <div class="row">       
        <div class="container4-moments">  
          <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            Put yo moments here
            a;sjaslkdjsakjdsakldjkdjakd
            laskdjasldjaslkdjsa
            lasjdlaskjdslakd
            lasdjalskjdaskjdsakldjaskldjas
            ladjlaskjdalskjdlaskd
            laksjdalskdjaslkjdaslkjdsa
            lasjdlkasjd;asjds
            klajdlkasjdklsad
            ;kasjdlkasjdlksadjlaskdjsalkd
            lkasjdlkasjdlkasjdlaskjdsa
            kasjdlkasjdaskjdskad
            laksjdaskjdaslkdjalk
            laksdjaskljdaslkjdsalkd
            dalskdjaslkjdaslkjdsa
            lasjdlkasjd;asjds
            klajdlkasjdklsad
            ;kasjdlkasjdlksadjlaskdjsalkd
            lkasjdlkasjdlkasjdlaskjdsa
            kasjdlkasjdaskjdskad      
            1234
          </div>
        </div>       
      </div>  
    </div>
  </div>
        
</body>

</html>
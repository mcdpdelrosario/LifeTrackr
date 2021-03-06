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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-QcrS-bymcrFPClDmuA4A3RMVZsvQCuQ&signed_in=false"></script>
  <script src="main_Map.js"></script>
  <script src="momentHandler.js"></script>

</head>

<body>
  
  <?php
    session_start();
    $con = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bdd92f8752ef7e","fdb4d70b","lifetrackr");
    include "navbar.php";
  ?>

  <section id="main-content">
    <div id="map"></div>
  </section>

  <!-- Modal -->
  <div id="momentPop">
    <div class="modal fade" id="momentModal" data-backdrop="static" data-keyboard="false" role="dialog">
      <div class="modal-dialog"> 
        <div class="modal-content">
          <div class="modal-header" style="background-color:#ff6600;color:#e6e6e6;">
            <button type="button" class="close" data-dismiss="modal" onclick="cancelFunction()">&times;</button>
            <h4 class="modal-title">Moments</h4>
          </div>
          
          <div class="modal-body">
            <form>
              <div class="form-group">
                <textarea class="form-control" rows="5" id="MomentsComment"></textarea>
              </div>
            </form>
          </div>
          
          <div class="modal-footer">
            <!-- <input id="Search" class="btn btn-default" type="file" value="browse" size="15"> -->
            <button id="ConfirmMoment" class="btn btn-default" type="submit" value="submit" onclick="confirmFunction()">Confirm</button>
            <button id="CancelMoment" type="button" class="btn btn-default" data-dismiss="modal" onclick="cancelFunction()">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div id="momentsSection">
    <div class="modal fade" id="momentPost" data-backdrop="static" data-keyboard="false" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="background-color:#ff6600;color:#e6e6e6;">
            <button type="button" class="close" onclick = "modalClosedFunction()">&times;</button>

            <div class="modal-title">
              <h1 id="momentTitlePost"></h1>
              <p id="momentSubtitlePost"></p>
            </div>

          </div>
          <div class="modal-body">
            <h4 id="momentWords"></h4>
         <!--    <center>
          <img id="imageData" src="x.png">
             </canvas> 
             </center>
          --> </div>
          
          <div class="modal-footer">
            <div id="postButtons">
              <button id="momentLike" class="btn btn-default" type="submit" value="submit" onclick="likeFunction()">Like</button>
              <!-- <button id="momentComment" type="button" class="btn btn-default" onclick="commentFunction()">Comment</button> -->
            </div>
            
            <!-- <div id="commentArea"  style = "display: none;">
              <div id="commentSection" class="panel panel-default">
                <div class="panel-body">Panel Body</div>
              </div>
              <form>
                <div class="form-group">
                  <textarea class="form-control" rows="3" id="commentTextArea"></textarea>
                </div>
              </form>
              <button id="submitComment" type="button" class="btn btn-default" onclick="enterComment()">Submit</button>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <a id="findButton" onclick="findUser()" class="btn btn-default">
    <span class="glyphicon glyphicon-screenshot"></span>
  </a>
  <!-- <a id="commitButton" onclick="futureMode()" class="btn btn-default">
  M
  </a> -->
</body>

</html>
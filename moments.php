<!DOCTYPE html>
<html lang="en">
<head>
  <title>LifeTrackr</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  
  <link href="navbar.css" rel="stylesheet" media="screen and (min-width:0)">
  <link href="userpage.css" rel="stylesheet"media="screen and (min-width:0)">
  
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src='//ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
  <!-- <script src='dynamicpage.js'></script> -->
  <!-- <script src='switchpage.js'></script> -->

  <!-- <link href="css/simple-sidebar.css" rel="stylesheet"> -->
    <script src="js/jquery-2.2.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-QcrS-bymcrFPClDmuA4A3RMVZsvQCuQ&signed_in=false"></script>
  <!-- <script src="googlemaps_moments.js"></script> -->

</head>
<body>

                    <?php
                        include "navbar.php";
                    ?>


                    
    
      
    <script>
      $(function(){
          $(".inner-content").slice(0, 3).show(); // select the first ten
          $("#load-more").click(function(e){ // click event for load more
              e.preventDefault();
              $(".inner-content:hidden").slice(0, 3).show(); // select next 10 hidden divs and show them
              if($(".inner-content:hidden").length == 0){ // check if any hidden divs still exist
                  alert("No more Moments!"); // alert if there are none left
              }
          });
      });
    </script>



    <!-- Menu Toggle Script -->


</body>
</html>
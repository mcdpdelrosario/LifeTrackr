<!DOCTYPE HTML>
<html>
<head>
    <title>Geolocation</title>
    
    <!-- for mobile view -->
    <meta content='width=device-width, initial-scale=1' name='viewport'/>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map_canvas {
        height: 100%;
      }
      #log {
        width: 270px;
        height: 60px;
      }
    </style>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3&sensor=false&language=en"></script>
    
    <script type="text/javascript">

        // you can specify the default lat long
        var map,
            currentPositionMarker,
            mapCenter = new google.maps.LatLng(14, 122),
            map;
        var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        var labelIndex = 0;
        var count = 0;
        // change the zoom if you want
        function initializeMap()
        {
            map = new google.maps.Map(document.getElementById('map_canvas'), {
               zoom: 22,
               center: mapCenter,
               mapTypeId: google.maps.MapTypeId.ROADMAP
             });
            logMsg("Setting up map");
            google.maps.event.addListener(map, 'click', function(event) {
              addMarker(event.latLng, map);
              createMoments();
            });
            
        }
        function locError(error) {
            // tell the user if the current position could not be located
            alert("The current position could not be found!");
        }
        function createMoments(){
          var btn = document.createElement("BUTTON");
          var t = document.createTextNode("PAST");
          btn.appendChild(t);
          document.body.appendChild(btn);
        }
        // current position of the user
        function setCurrentPosition(pos) {
          count++;
            currentPositionMarker = new google.maps.Marker({
                map: map,
                position: new google.maps.LatLng(
                    pos.coords.latitude,
                    pos.coords.longitude
                ),
                title: "Latitude: \t" + pos.coords.latitude +"\nLongitude: " + pos.coords.longitude
            });
            map.panTo(new google.maps.LatLng(
                    pos.coords.latitude,
                    pos.coords.longitude
                ));
        }
        function logMsg(msg) {
          $("#log").prepend(msg + "\n");
        }
        function displayAndWatch(position) {
          
            // set current position
            setCurrentPosition(position);
            
            // watch position
            watchCurrentPosition();
        }
        
        function watchCurrentPosition() {
          
          setInterval( function() {}, 1000 );
          var positionTimer = navigator.geolocation.watchPosition(
              function (position) {
                  setMarkerPosition(
                      currentPositionMarker,
                      position
                  );
              });
        }

        function setMarkerPosition(marker, position) {
            // marker.setPosition(
            //     new google.maps.LatLng(
            //         position.coords.latitude,
            //         position.coords.longitude)
            // );
            setCurrentPosition(position);
        }

        function initLocationProcedure() {

            initializeMap();
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(displayAndWatch, locError);
            } else {
                // tell the user if a browser doesn't support this amazing API
                alert("Your browser does not support the Geolocation API!");
            }
        }

        // initialize with a little help of jQuery
        $(document).ready(function() {
            initLocationProcedure();
        });

         function addMarker(location, map) {
        // Add the marker at the clicked location, and add the next-available label
        // from the array of alphabetical characters.
          var marker = new google.maps.Marker({
            position: location,
            label: labels[labelIndex++ % labels.length],
            map: map
          });
        }

      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>

<body style="margin:0; padding:0;">
    
    <!-- display the map here, you can changed the height or style -->
    <div id="map_canvas" ></div>
    <div id="logContainer"><textarea id="log"></textarea></div>
</body>

</html>
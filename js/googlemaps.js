// In the following example, markers appear when the user clicks on the map.
	  // Each marker is labeled with a single alphabetical character.
	  var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	  var labelIndex = 0;
	  var map;
	  var userPosition;
	  function initialize() {
	    var philippines = { lat: 13, lng: 122 };
	    map = new google.maps.Map(document.getElementById('map'), {
	      zoom: 6,
	      center: philippines
	    });
	    var infoWindow = new google.maps.InfoWindow({map: map});

	    // This event listener calls addMarker() when the map is clicked.
	    google.maps.event.addListener(map, 'click', function(event) {
	      var wordlat = event.latLng.lat(); //upon click
	      var wordlng = event.latLng.lng(); //upon click
	      addMarker(event.latLng, map);
	      infoWindow.setPosition(event.latLng);
	      infoWindow.setContent("Latitude: "+wordlat+"\nLongtitude: "+wordlng);
	    });
	    
	    // Try HTML5 geolocation.
	    
	    if (navigator.geolocation) {
	      navigator.geolocation.watchPosition(function(position) {
	        userPosition = {
	          lat: position.coords.latitude, //from geolocation
	          lng: position.coords.longitude //from geolocation
	        };
	      
	        
	        addMarker(userPosition, map);
	        map.setCenter(userPosition);
	        map.setZoom(16);
	      }, function() {
	        handleLocationError(true, infoWindow, map.getCenter());
	      });
	    } else {
	      // Browser doesn't support Geolocation
	      handleLocationError(false, infoWindow, map.getCenter());
	    }

	    // Add a marker at the center of the map.
	    
	  }

	  // Adds a marker to the map.
	  function addMarker(location, map) {
	    // Add the marker at the clicked location, and add the next-available label
	    // from the array of alphabetical characters.
	    var marker = new google.maps.Marker({
	      position: location,
	      label: labels[labelIndex++ % labels.length],
	      map: map
	    });
	  }
	  function handleLocationError(browserHasGeolocation, infoWindow, pos) {
	    infoWindow.setPosition(pos);
	    infoWindow.setContent(browserHasGeolocation ?
	                          'Error: The Geolocation service failed.' :
	                          'Error: Your browser doesn\'t support geolocation.');
	  }
	  google.maps.event.addDomListener(window, 'load', initialize);
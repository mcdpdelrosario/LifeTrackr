// In the following example, markers appear when the user clicks on the map.
// Each marker is labeled with a single alphabetical character.
var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
	labelIndex = 0,
	map,
	userPosition,
	momentPosition,
	userMarker,
	momentMarker,
	iterations = 0,
	zoomValue = 15,
	screenMaxHeight,
	screenMaxWidth,
	buttonYes,
	buttonNo,
	momentsOption,
	momentsTextArea,
	momentsExtraWords,
	abreak;
function PTP(percent,max){
	var pix = (percent/100)*max + "px"
	return pix;
}
function initialize() {
	abreak = document.createElement("BR");
	screenMaxHeight = screen.height;
	screenMaxWidth = screen.width;
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
		var userlat = userMarker.getPosition().lat();
		var userlng = userMarker.getPosition().lng();
		var distance = Math.sqrt(Math.pow((wordlat-userlat),2)+Math.pow((wordlng-userlng),2)); 
		if(distance<0.03){
			if(document.getElementById("momentsDiv")){
				
			}else{

				momentsOption = document.createElement("div");
				momentsOption.setAttribute("id","momentsDiv");
				momentsOption.style.width = "200px";
				momentsOption.style.height = "100px";
				momentsOption.style.background = "pink";
				momentsOption.style.position = "absolute";
				momentsOption.style.top = PTP(15,screenMaxHeight);
  				momentsOption.style.left = PTP(80,screenMaxWidth);
	    		var textYes = document.createTextNode("Submit");
	    		var textNo = document.createTextNode("Cancel");
	    		momentsExtraWords = document.createTextNode("Moments");
	    		momentsTextArea = document.createElement("TEXTAREA");
	    		buttonYes = document.createElement("BUTTON");
	    		buttonYes.setAttribute("id", "yesButton");
	    		buttonNo = document.createElement("BUTTON");
	    		buttonNo.setAttribute("id", "noButton");
	   			buttonYes.appendChild(textYes);
	   			buttonNo.appendChild(textNo);
	   			document.body.appendChild(momentsOption);
	   			momentsOption.appendChild(momentsExtraWords);
	   			momentsOption.appendChild(abreak);
	   			momentsOption.appendChild(momentsTextArea);
	   			momentsOption.appendChild(buttonYes);
	   			momentsOption.appendChild(buttonNo);
   			}
			addMarker(event.latLng, map);
			infoWindow.setPosition(event.latLng);
			infoWindow.setContent("Latitude: "+wordlat+"\nLongtitude: "+wordlng);
		}else{
			alert('Too Far');
		}
		
	});

	// Try HTML5 geolocation.

	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			userPosition = {
				lat: position.coords.latitude, //from geolocation
				lng: position.coords.longitude //from geolocation
			};
			userMarker = new google.maps.Marker({
				position: userPosition,
				label: 'X',
				map: map,
				title: 'lat: '+userPosition.lat +'\tlong: '+userPosition.lng +'\tItr: '+iterations
			});
			
			userMarker.addListener('click', function() {
				map.setCenter(userMarker.getPosition());
				alert('YES');
			    
		  	});
			iterations++;
			map.setCenter(userPosition);
			map.setZoom(zoomValue);
		}, function() {
			handleLocationError(true, infoWindow, map.getCenter());
		});
		updateUserPosition();
	} else {
		// Browser doesn't support Geolocation
		handleLocationError(false, infoWindow, map.getCenter());
	}
	updateUserPosition();
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

function moveUserMarker(position, map){
	userMarker.setPosition(position);
	userMarker.setTitle('lat: '+position.lat +'\tlong: '+position.lng+'\tItr: '+iterations);
	iterations++;
}

function updateUserPosition(){

		navigator.geolocation.watchPosition(function(position) {
			userPosition = {
				lat: position.coords.latitude, //from geolocation
				lng: position.coords.longitude //from geolocation
			};
			moveUserMarker(userPosition, map);
		}, function() {
			handleLocationError(true, infoWindow, map.getCenter());
		});

}

function removeElement(parentDiv, childDiv){
     if (childDiv == parentDiv) {
          alert("The parent div cannot be removed.");
     }
     else if (document.getElementById(childDiv)) {     
          var child = document.getElementById(childDiv);
          var parent = document.getElementById(parentDiv);
          parent.removeChild(child);
     }
     else {
          //alert("Child div has already been removed or does not exist.");
          return false;
     }
}

google.maps.event.addDomListener(window, 'load', initialize);
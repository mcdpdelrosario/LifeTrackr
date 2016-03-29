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
	zoomValue = 17,
	screenMaxHeight,
	screenMaxWidth,
	buttonYes,
	buttonNo,
	momentsOption,
	momentsTextArea,
	momentsExtraWords,
	abreak,
	temporaryMarker,
	dataLat,
	dataLng;
function PTP(percent,max){
	var pix = (percent/100)*max + "px"
	return pix;
}
function initialize() {
	temporaryMarker = new google.maps.Marker({});
	abreak = document.createElement("BR");
	screenMaxHeight = screen.height;
	screenMaxWidth = screen.width;
	var philippines = { lat: 13, lng: 122 };
	map = new google.maps.Map(document.getElementById('map'), {
		zoom: 6,
		center: philippines,
		disableDefaultUI: true
	});
	var infoWindow = new google.maps.InfoWindow({map: null});

	// This event listener calls addMarker() when the map is clicked.

	creatingMapListener(map);

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
				
				// alert('You clicked Me');
				temporaryMarker.setMap(null);
				map.setCenter(userPosition);
				momentPosition=userPosition;
				dataLat=momentPosition.lat;
				dataLng=momentPosition.lng;
				//alert("lat: " +momentPosition.lat +"\tlng: " + momentPosition.lng);
				$("#myModal").modal("show");

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

function creatingMapListener(map){
	//var coordWindow = new google.maps.InfoWindow({map: map});
	google.maps.event.addListener(map, 'click', function(event) {
		var wordlat = event.latLng.lat(); //upon click
		var wordlng = event.latLng.lng(); //upon click
		momentPosition = event.latLng;
		dataLat=wordlat;
		dataLng=wordlng;
		var userlat = userMarker.getPosition().lat();
		var userlng = userMarker.getPosition().lng();
		var distance = Math.sqrt(Math.pow((wordlat-userlat),2)+Math.pow((wordlng-userlng),2)); 
		if(distance<0.014){

				temporaryMarker.setMap(null);
				createPointer();
				//alert("lat: " +momentPosition.lat() +"\tlng: " +momentPosition.lng());
				$("#myModal").modal("show");
			
		}else{
			alert('Too Far');
		}	
		
	});
}
function confirmFunction(){
	//
	var commentText = document.getElementById("MomentsComment").value;
	//dataLat for latitude of clicked
	//dataLng for longtitude of clicked
	//alert("Sent: " + commentText + "...Lat: " + dataLat + "...Lng: " + dataLng);
	var url = "savecoordinates.php?longitude="+dataLng + "&latitude=" + dataLat+"&moments-text=" + commentText;
	httpGetAsync(url, alert);
	swal("Blow job!", "Sent: " + commentText + "...Lat: " + dataLat + "...Lng: " + dataLng, "success");

	$("#myModal").modal("hide");
	document.getElementById("MomentsComment").value = "";
}

function td(){

}

function cancelFunction(){
	temporaryMarker.setMap(null);
	$("#myModal").modal("hide");
	document.getElementById("MomentsComment").value = "";
}
function createPointer(){
	map.panTo(momentPosition);
	temporaryMarker.setPosition(momentPosition);
	temporaryMarker.setLabel("4");
	temporaryMarker.setMap(map);
}

function addMarker(location, map) {
// Add the marker at the clicked location, and add the next-available label
// from the array of alphabetical characters.
	var marker = new google.maps.Marker({
		position: location,
		label: labels[labelIndex++ % labels.length],
		map: map
	});
	//worldMarkers.push(marker);

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
function findUser(){
	map.panTo(userPosition);
}
function httpGetAsync(theUrl, callback){
		var xmlHttp = new XMLHttpRequest();
		xmlHttp.onreadystatechange = function() { 
			if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
				callback(xmlHttp.responseText);
		}
		xmlHttp.open("GET", theUrl, true); // true for asynchronous 
		xmlHttp.send(null);
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
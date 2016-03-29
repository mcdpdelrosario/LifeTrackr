var map,
temporaryMarker,
userMarker,
arrayMarker,
zoomValue = 17;

function initialize() {
	temporaryMarker = new google.maps.Marker({});
	var philippines = { lat: 13, lng: 122 };
	map = new google.maps.Map(document.getElementById('map'), {
		zoom: 6,
		center: philippines,
		disableDefaultUI: true
	});
	// This event listener calls addMarker() when the map is clicked.
	creatingMapListener();
	// Try HTML5 geolocation.
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			userMarker = new google.maps.Marker({
				position: {
					lat: position.coords.latitude, //from geolocation
					lng: position.coords.longitude //from geolocation
				},
				label: 'X',
				map: map,
				title:'Im Was Here'
			});
			map.setCenter(userMarker.position);
			map.setZoom(zoomValue);
		}, function() {
			handleLocationError(true);
		});
		updateUserPosition();
	} else {
		// Browser doesn't support Geolocation
		handleLocationError(false);
	}
	updateUserPosition();
// Add a marker at the center of the map.
}

// Adds a marker to the map.

function handleLocationError(browserHasGeolocation) {
	if(browserHasGeolocation){
		alert('Error: The Geolocation service failed.');
	}else{
		alert('Error: Browser does not support Geolocation.');
	}
}

function updateUserPosition(){
		navigator.geolocation.watchPosition(function(position) {
			userMarker.setPosition({
				lat: position.coords.latitude, //from geolocation
				lng: position.coords.longitude //from geolocation
			});
		}, function() {
			handleLocationError(true);
		});

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

google.maps.event.addDomListener(window, 'load', initialize);

function findUser(){
	map.panTo(userMarker.position);
}

function userMarkerListener(){

}

function creatingMapListener(){

}

function addMarker(location) {
// Add the marker at the clicked location, and add the next-available label
// from the array of alphabetical characters.
	// var marker = new google.maps.Marker({
	// 	position: location,
	// 	label: labels[labelIndex++ % labels.length],
	// 	map: map
	// });
	//worldMarkers.push(marker);

}
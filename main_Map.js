var map,
temporaryMarker,
userMarker,
arrayMarkers,
zoomValue = 17;

function initialize() {
	temporaryMarker = new google.maps.Marker({});
	var philippines = { lat: 13, lng: 122 };
	map = new google.maps.Map(document.getElementById('map'), {
		zoom: 6,
		center: philippines,
		disableDefaultUI: true
	});
	creatingMapListener();
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			userMarker = new google.maps.Marker({
				position: {
					lat: position.coords.latitude, //from geolocation
					lng: position.coords.longitude //from geolocation
				},
				label: 'X',
				map: map,
				title:'Im this Here'
			});
			map.setCenter(userMarker.position);
			map.setZoom(zoomValue);
		}, function() {
			handleLocationError(true);
		});
		updateUserPosition();
	} else {
		handleLocationError(false);
	}
	updateUserPosition();
	pinMarkers();
}

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

function pinMarkers(){
	setInterval(function(){
		pinMoment();
		//console.log(dataMoments);
		for(var i = 0; i < dataMoments.moment_id.length; i++){
			// console.log(dataMoments.moments_id[i]);
			//addMarker({lat: dataMoments.latitude[i],lng: dataMoments.longitude[i]},dataMoments.moment_id[i]);	
		}
		//showMarkers(map);
	}, 5000);
}
function showMarkers(map){
	for (var j = 0; j < arrayMarkers.length; j++) {
    	arrayMarkers[j].setMap(map);
  	}
}
function findUser(){
	map.panTo(userMarker.position);
}

function userMarkerListener(){

}
function confirmFunction(){
	var comments = document.getElementById("MomentsComment").value;
	//alert(comments);
	//var markerObj = {temporaryMarker.position,message: comments};
	createMoment(temporaryMarker.position.lat(),
		temporaryMarker.position.lng(),comments);
	$("#myModal").modal("hide");
	document.getElementById("MomentsComment").value = "";
}
function cancelFunction(){
	$("#myModal").modal("hide");
	document.getElementById("MomentsComment").value = "";
}
function createPointer(){
	map.panTo(temporaryMarker.position);
	temporaryMarker.setLabel("4");
	temporaryMarker.setMap(map);
}
function creatingMapListener(){
	google.maps.event.addListener(map, 'click', function(event) {
		var wordlat = event.latLng.lat(); //upon click
		var wordlng = event.latLng.lng(); //upon click
		temporaryMarker.setPosition({lat: event.latLng.lat(),lng: event.latLng.lng()});
		var userlat = userMarker.position.lat();
		var userlng = userMarker.position.lng();
		var distance = Math.sqrt(Math.pow((wordlat-userlat),2)+Math.pow((wordlng-userlng),2)); 
		
		if(distance<0.014){
			temporaryMarker.setMap(null);
			createPointer();
			//alert("lat: " +userlat +"\tlng: " +userlng);
			$("#myModal").modal("show");
			
		}else{
			//swal("Too Far!", "Moment cannot be Created", "error");
			alert('Too Far');
			temporaryMarker.setMap(null);
		}	
		
	});
}

function addMarker(location, id) {
// Add the marker at the clicked location, and add the next-available label
// from the array of alphabetical characters.
	var marker = new google.maps.Marker({
		position: location,
		id: id,
		map: map
	});
	arrayMarkers.push(marker);

}

google.maps.event.addDomListener(window, 'load', initialize);

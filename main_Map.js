var map,
temporaryMarker,
userMarker,
arrayMarkers = [],
zoomValue = 16,
userRadius = 0.5,
infoWindow,
infoMessages = [];//in Km
function initialize() {
	temporaryMarker = new google.maps.Marker({});
	infoWindow = new google.maps.InfoWindow({map: null});
	var philippines = { lat: 13, lng: 122 };
	map = new google.maps.Map(document.getElementById('map'), {
		zoom: 6,
		center: philippines,
		//disableDefaultUI: true
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
				title:'Im kinda here I hope'
			});
			userMarkerListener(userMarker);
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

		for(var i = 0; i < dataMoments.moment_id.length; i++){
			var lats = dataMoments.latitude[i];
			var lngs = dataMoments.longitude[i];
			addMarker({ lat: parseFloat(lats), lng: parseFloat(lngs) }, {msg: String(dataMoments.message[i]), username: String(dataMoments.username[i]), first_name: String(dataMoments.first_name[i]), last_name: String(dataMoments.last_name[i])},i);
		}
		showMarkers(map);
	}, 5000);
}
function showMarkers(map){
	for (var j = 0; j < arrayMarkers.length; j++) {
		var distance = getDistanceFromLatLonInKm(arrayMarkers[j].position.lat(),arrayMarkers[j].position.lng(),userMarker.position.lat(),userMarker.position.lng());
		if(0.25>distance){
    		arrayMarkers[j].setMap(map);
    		attachListener(arrayMarkers[j], infoMessages[j]);
    	}else{
    		arrayMarkers[j].setMap(null);
    	}
  	}
  	hideTemporaryMarker();
}


function attachListener(marker, momentInfo) {
  // var infowindow = new google.maps.InfoWindow({
  //   content: secretMessage
  // });

  marker.addListener('click', function() {
  	// console.log(mouseX);
	// infowindow.setContent("X: " +mouseX +" Y: " + mouseY);
    // infowindow.open(marker.get('map'), marker);
    //console.log(secretMessage);
    document.getElementById("momentTitlePost").innerHTML=momentInfo.first_name+" "+momentInfo.last_name;
    document.getElementById("momentSubtitlePost").innerHTML=momentInfo.username;
    document.getElementById("momentWords").innerHTML=momentInfo.msg;
    $("#momentPost").modal("show");
    //alert("sa");

  });
}

function findUser(){
	map.panTo(userMarker.position);
}

function userMarkerListener(marker){
	marker.addListener('click', function() {
		temporaryMarker.setPosition(userMarker.position);
		hideTemporaryMarker();
		$("#momentModal").modal("show");
  	});
}
function sendUserCoordinates(){
	setInterval(function(){ alert("Hello"); 
	}, 3000);
}
function confirmFunction(){
	var comments = document.getElementById("MomentsComment").value;
	createMoment(temporaryMarker.position.lat(),
	temporaryMarker.position.lng(),comments);
	$("#momentModal").modal("hide");
	document.getElementById("MomentsComment").value = "";
	
}
function cancelFunction(){
	hideTemporaryMarker();
	$("#momentModal").modal("hide");
	document.getElementById("MomentsComment").value = "";
}
function createPointer(){
	map.panTo(temporaryMarker.position);
	temporaryMarker.setLabel("4");
	showTemporaryMarker();
}
function creatingMapListener(){
	google.maps.event.addListener(map, 'click', function(event) {
		var wordlat = event.latLng.lat(); //upon click
		var wordlng = event.latLng.lng(); //upon click
		temporaryMarker.setPosition({lat: wordlat,lng: wordlng});
		var userlat = userMarker.position.lat();
		var userlng = userMarker.position.lng();
		var distance = getDistanceFromLatLonInKm(wordlat,wordlng,userlat,userlng);
		if(userRadius>distance){
			//temporaryMarker.setMap(null);
			createPointer();
			//alert("lat: " +userlat +"\tlng: " +userlng);
			$("#momentModal").modal("show");
			
		}else{
			hideTemporaryMarker();
			swal("Too Far!", "Moment cannot be Created", "error");
		}	
	});
}
function hideTemporaryMarker(){
	temporaryMarker.setMap(null);
}
function showTemporaryMarker(){
	temporaryMarker.setMap(map);
}
function addMarker(location,words,n) {
// Add the marker at the clicked location, and add the next-available label
// from the array of alphabetical characters.
	var marker = new google.maps.Marker({
		position:location,
		map: null
	});
	infoMessages[n] = words;
	arrayMarkers[n] = marker;
	//arrayMarkers[n].addListener('click', popTheInfo(n));
}

google.maps.event.addDomListener(window, 'load', initialize);
//Haversine formula
function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
	var R = 6371; // Radius of the earth in km
	var dLat = deg2rad(lat2-lat1);  // deg2rad below
	var dLon = deg2rad(lon2-lon1); 
	var a = 
	Math.sin(dLat/2) * Math.sin(dLat/2) +
	Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
	Math.sin(dLon/2) * Math.sin(dLon/2)
	; 
	var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
	var d = R * c; // Distance in km
	return d;
}

function deg2rad(deg) {
	return deg * (Math.PI/180)
}


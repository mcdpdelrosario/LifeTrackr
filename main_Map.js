var map,
temporaryMarker,
userMarker,
arrayMarkers = [],
zoomValue = 20,
userRadius = 0.2,
infoWindow,
infoMessages = [],
clickedMoment,
futureFlag = 0,
fastMarker;//in Km
function initialize() {
	fastMarker = new google.maps.Marker({
		icon: {
			path: google.maps.SymbolPath.BACKWARD_OPEN_ARROW,
	        strokeColor: "red",
	        scale: 4
		}
	});
	temporaryMarker = new google.maps.Marker({
		icon: {
			path: google.maps.SymbolPath.BACKWARD_OPEN_ARROW,
	        strokeColor: "green",
	        scale: 4
		}
	});
	infoWindow = new google.maps.InfoWindow({map: null,
	maxWidth: 200
	});
	var philippines = { lat: 13, lng: 122 };

	var mapStyles = [
	  {
	    stylers: [
	      { hue: "#cc5200" },
	      { saturation: -20 }
	    ]
	  }
	];


	map = new google.maps.Map(document.getElementById('map'), {
		zoom: 6,
		center: philippines,
		styles: mapStyles
		//disableDefaultUI: true
	});
	pinMarkers();
	creatingMapListener();
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			userMarker = new google.maps.Marker({
				position: {
					lat: position.coords.latitude, //from geolocation
					lng: position.coords.longitude //from geolocation
				},
				map: map,
				title:'Im kinda here I hope',
				icon: {
					path: google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
			        strokeColor: "orange",
			        scale: 6
				}
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
	
}

function handleLocationError(browserHasGeolocation) {
	if(browserHasGeolocation){
		swal("Error!", "The Geolocation service failed", "error");
	}else{
		swal("Error!", "Browser does not support Geolocation", "error");
	}
}
function updateUserPosition(){
		navigator.geolocation.watchPosition(function(position) {
			userMarker.setPosition({
				lat: position.coords.latitude, //from geolocation
				lng: position.coords.longitude //from geolocation
			});
			document.cookie="user_latitude="+position.coords.latitude+"; user_longtitude="+position.coords.longitude;
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
		fastMarker.setMap(null);
		pinMoment();
		for(var i = 0; i < dataMoments.moment_id.length; i++){
			var lats = dataMoments.latitude[i];
			var lngs = dataMoments.longitude[i];
			prepareMarker({ lat: parseFloat(lats), lng: parseFloat(lngs) }, {user_id: parseInt(dataMoments.user_id[i]),moment_id: parseInt(dataMoments.moment_id[i]), msg: String(dataMoments.message[i]), username: String(dataMoments.username[i]), first_name: String(dataMoments.first_name[i]), last_name: String(dataMoments.last_name[i])},i);
		}
		showMarkers(map);
	}, 5000);
}
function showMarkers(map){
	for (var j = 0; j < arrayMarkers.length; j++) {
		var distance = getDistanceFromLatLonInKm(arrayMarkers[j].position.lat(),arrayMarkers[j].position.lng(),userMarker.position.lat(),userMarker.position.lng());
		if(userRadius>distance){
    		arrayMarkers[j].setMap(map);
    		attachListener(arrayMarkers[j], infoMessages[j]);
    	}else{
    		arrayMarkers[j].setMap(null);
    	}
  	}
  	//hideTemporaryMarker();
}


function attachListener(marker, momentInfo) {

  marker.addListener('click', function() {
  	getImage({moment: momentInfo.moment_id});
    document.getElementById("momentTitlePost").innerHTML=momentInfo.first_name+" "+momentInfo.last_name;
    document.getElementById("momentSubtitlePost").innerHTML=momentInfo.username;
    document.getElementById("momentWords").innerHTML=momentInfo.msg;
    clickedMoment = momentInfo;
    $("#momentPost").modal("show");
  });

  
  marker.addListener('mouseover', function() {
  	

  	var infoContent = '<div><p>'+momentInfo.first_name+" "+momentInfo.last_name+'<br>'+momentInfo.msg+'</div></p>';
  	infoWindow.setContent(infoContent);
    infoWindow.open(map,marker);

  });

  marker.addListener('mouseout', function() {
    infoWindow.close();
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
	setInterval(function(){ 
		alert("Hello"); 
	}, 3000);
}
function confirmFunction(){
	var comments = document.getElementById("MomentsComment").value;
	//var imagefp = document.getElementById("Search").value;
	var sendMoments;
	if(futureFlag==0){
		sendMoments = {
			moment_Lng: temporaryMarker.position.lng(),
			moment_Lat: temporaryMarker.position.lat(),
			moment_Message: comments,
			//imagefp: imagefp
		};
		fastMarker.setIcon({
			path: google.maps.SymbolPath.BACKWARD_OPEN_ARROW,
	        strokeColor: "red",
	        scale: 4
		});
	}else{
		sendMoments = {
			moment_Lng: temporaryMarker.position.lng(),
			moment_Lat: temporaryMarker.position.lat(),
			moment_Message: comments,
			//imagefp: imagefp
		};
		fastMarker.setIcon({
			path: google.maps.SymbolPath.BACKWARD_OPEN_ARROW,
	        strokeColor: "blue",
	        scale: 4
		});
	}
	fastMarker.setPosition(temporaryMarker.position);
	createMoment(sendMoments);
	$("#momentModal").modal("hide");
	document.getElementById("MomentsComment").value = "";
	//document.getElementById("Search").value = "";
	
}

function cancelFunction(){
	hideTemporaryMarker();
	$("#momentModal").modal("hide");
	document.getElementById("MomentsComment").value = "";
	//document.getElementById("Search").value = "";
}
function createPointer(){
	map.panTo(temporaryMarker.position);
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
		if(futureFlag==0){
		if(userRadius>distance){
			createPointer();
			$("#momentModal").modal("show");
		}else{
			hideTemporaryMarker();
			swal("Too Far!", "Moment cannot be Created", "error");
		}}else{
			createPointer();
			$("#momentModal").modal("show");
		}	
	});
}
function hideTemporaryMarker(){
	temporaryMarker.setMap(null);
}
function showTemporaryMarker(){
	temporaryMarker.setMap(map);
}
function prepareMarker(location,words,n) {
// Add the marker at the clicked location, and add the next-available label
// from the array of alphabetical characters.
	
	infoMessages[n] = words;
	arrayMarkers[n] = addMarker(location);
	//arrayMarkers[n].addListener('click', popTheInfo(n));
}

function addMarker(location){
	var markercolor;
	if(futureFlag==1){
		markercolor = "blue";
	}else{
		markercolor = "red";
	}
	var marker = new google.maps.Marker({
		position:location,
		map: null,
		icon: {
			path: google.maps.SymbolPath.BACKWARD_OPEN_ARROW,
	        strokeColor: markercolor,
	        scale: 4
		}
	});
	return marker;
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
function commentFunction(){
	//$("#commentArea").slideToggle("slow");
}
function modalClosedFunction(){
	//$("#commentArea").slideUp("fast");
	$("#momentPost").modal("hide");
	//document.getElementById("commentTextArea").value = "";
}

function likeFunction(){
	console.log(clickedMoment);
	likeAMoment({moment_id: clickedMoment.moment_id,user_id: clickedMoment.user_id});
}

function enterComment(){

	// var comment = document.getElementById("commentTextArea").value;
	// document.getElementById("commentTextArea").value = "";
	// createComment({moment_id: clickedMoment.moment_id, comment: comment});
}
function futureMode(){
	if(futureFlag == 0){
		futureFlag = 1;
	}else{
		futureFlag = 0;
	}
}

function createMomentdash(){
	var long = parseFloat(getCookie("user_longtitude"));
	var lat = parseFloat(getCookie("user_latitude"));
	var imagefp = null;
	var comment = document.getElementById("input-moments").value;
	sendMoments = {
		moment_Lng: long,
		moment_Lat: lat,
		moment_Message: comment,
		imagefp: imagefp
	};
	createMoment(sendMoments);
}
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
} 

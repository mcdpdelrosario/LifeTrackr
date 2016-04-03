var dataMoments;

function createMoment(lat,lng,message,imagefp){
	//alert('lat: '+lat+' lng: '+lng+' comments: '+message);
	var url = "createMoments.php?moment_Lng="+lng+ "&moment_Lat=" + lat+"&moment_Message=" + message+"$imagefp="+imagefp;
	httpGetAsync(url,successQuery);
}
function successQuery(text){
	swal("Good job!", text, "success");
	hideTemporaryMarker();

}
function pinMoment(){
	var url = "pinMoments.php";
	httpGetAsync(url,function(json){
	 	dataMoments = JSON.parse(json);
	});
}
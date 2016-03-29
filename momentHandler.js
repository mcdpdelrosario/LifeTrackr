var moment_Lat,
moment_Lng,
map,
username,
moment_ID,
moment_Message,
moment_Img;


function createMoment(){
	var url = "savecoordinates.php?moment_Lng="+moment_Lng + "&moment_Lat=" + moment_Lat+"&moment_Message=" + moment_Message;
	httpGetAsync(url,successQuery);
}
function successQuery(){
	
}
function pinMoment(){

}
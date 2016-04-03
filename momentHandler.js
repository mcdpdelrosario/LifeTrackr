var dataMoments;

function createMoment(sendMoments){

	var url = "createMoments.php";

	queryServer(url,sendMoments,successQuery);
}
function successQuery(data,status){
	swal("Well done!", data +"\nStatus: " + status, "success");
	hideTemporaryMarker();

}
function pinMoment(){
	var url = "pinMoments.php";
	// httpGetAsync(url,function(json){
	//  	dataMoments = JSON.parse(json);
	// });
	queryServer(url,null,function(json,status){
		//alert(status);
		if(status!="success"){
			alert("Something went Wrong");
		}
		dataMoments = JSON.parse(json);
	});
}


function queryServer(url,data,callback){
	$.post(url,data,callback);
}
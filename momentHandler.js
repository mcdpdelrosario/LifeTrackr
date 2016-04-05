var dataMoments;

function createMoment(sendMoments){

	var url = "createMoments.php";

	queryServer(url,sendMoments,successQuery);
}
function successQuery(data,status){
	if(status=="success"){
		swal("Well done!", "Moment Created", "success");
	}else{
		swal("Error occured", data +"\nStatus: " + status, "error");
	}
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
			swal("Error occured", json +"\nStatus: " + status, "error");
		}
		dataMoments = JSON.parse(json);
	});
}


function queryServer(url,data,callback){
	$.post(url,data,callback);
}
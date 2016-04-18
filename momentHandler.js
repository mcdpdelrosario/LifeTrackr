var dataMoments;

function createMoment(sendMoments)
{
	var url = "createMoments.php";

	queryServer(url,sendMoments,successQuery);
}

function successQuery(data,status)
{
	hideTemporaryMarker();
	fastMarker.setMap(map);
	if(status=="success")
	{
		swal("Well done!", "Moment Created", "success");
	}
	else
	{
		swal("Error occured", data +"\nStatus: " + status, "error");
	}
	

}

function pinMoment()
{
	var url = "pinMoments.php";
	queryServer(url,null,function(json,status)
	{
		//alert(status);
		//alert(json);
		if(status=="success"){
			
		}else{
			swal("Error occured", json +"\nStatus: " + status, "error");
		}
		dataMoments = JSON.parse(json);
		//console.log(dataMoments);
	});
}

function queryServer(url,data,callback)
{
	$.post(url,data,callback);
}
function likeAMoment(momentData){
	var url = "advLike.php"
	// var url = "likeMoments.php?moment_id="+momentData.moment_id+"&moment_user_id="+momentData.user_id;
	queryServer(url,momentData,likeStatus);
	// $.get(URL,function(data){
	// 	console.log("Something");
	// }); 

}


function likeStatus(data,status){
	if(status=="success")
	{
		swal("Well done!", "Like/Unlike SuccessFull", "success");
	}
	else
	{
		swal("Error occured", data +"\nStatus: " + status, "error");
	}
}

function createComment(commentData){
	//var url = "createComment.php";
	//console.log(commentData);
	//swal("Comment", "Moment id: "+commentData.moment_id+"\nComment: "+commentData.comment, "success");
	//queryServer(url,commentData,commentStatus);
}
function commentStatus(data){
	
	if(data==1)
	{
		swal("Well done!", "Comment SuccessFull", "success");
	}
	else
	{
		swal("Error occured","Sorry Try Again", "error");
	}
}
function getImage(momentData){
	var url ="canvas.php";
	queryServer(url,momentData,imageSuccess);
}
var imageMoment;
function imageSuccess(json){
	imageMoment = JSON.parse(data);
	alert(data);
	
}
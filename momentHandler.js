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
		if(status=="success"){
			
		}else{
			swal("Error occured", json +"\nStatus: " + status, "error");
		}
		dataMoments = JSON.parse(json);
	});
}

function queryServer(url,data,callback)
{
	$.post(url,data,callback);
}

function likeAMoment(momentData){
	var url = "likeMoments.php";
	queryServer(url,momentData,likeStatus);
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
	var url = "createComment.php";
	//swal("Comment", "Moment id: "+commentData.moment_id+"\nComment: "+commentData.comment, "success");
	queryServer(url,commentData,commentStatus);
}
function commentStatus(data,status){
	alert(data);
	// if(status=="success")
	// {
	// 	swal("Well done!", "Comment SuccessFull", "success");
	// }
	// else
	// {
	// 	swal("Error occured", data +"\nStatus: " + status, "error");
	// }
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
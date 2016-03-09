$(function(){
$('.link').click(function(){
	var page=$(this).attr('rel');

	$('#main-content').load(page);
});
})
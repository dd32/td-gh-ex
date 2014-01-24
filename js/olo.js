jQuery(document).ready(function($){
$body=(window.opera)?(document.compatMode=="CSS1Compat"?$('html'):$('body')):$('html,body');
$('#oloUp').click(function(){
		$body.animate({scrollTop:0},400);
});
}); 
function up(){
   $wd = $(window);
   $wd.scrollTop($wd.scrollTop() - 1);
   fq = setTimeout("up()", 50);
}

$(document).ready( function() {
	var h1 = $(".oloPosts").height();
	var h2 = $("#oloContainer #oloWidget").height();

	if(h2 < h1){
		$("#oloContainer #oloWidget").height(h1);
		}else {
		$(".oloPosts").height(h2);
		}
}); 
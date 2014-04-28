jQuery(document).ready(function($){
    $(".post").fitVids();
	$(".page").fitVids();
	
	if(window.innerWidth >782){
		skrollr.init({
			forceHeight: false
		});
	}
			
	$("#mobile-menu").click(function(){
		$(".nav-menu").toggle();
	});
});

//Menu dropdown animation
jQuery(function($) {
	$('.main-navigation .children').hide();
	$('.main-navigation li').hover( 
		function() {
			$(this).children('.main-navigation .children').slideDown();
		}, 
		function() {
			$(this).children('.main-navigation .children').hide();
		}
	);
});

// Nice scroll
jQuery(function($) {
	$("html").niceScroll({
		cursorborder:"", 
		cursorcolor:"#525252", 
		boxzoom:true, 
		cursoropacitymin: 0.5,
		cursoropacitymax: 1,
		cursorwidth: 10,
		mousescrollstep: 50
	});
});

//Fit Vids
jQuery(function($) {
  
  $(document).ready(function(){
    $("body").fitVids();
  });
  
});

//Comments clearfix
jQuery(function($) {
	$(".comment-body").addClass('clearfix');
});
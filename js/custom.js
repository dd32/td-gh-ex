jQuery(function($){
 "use strict";
   jQuery('.main-menu-navigation > ul').superfish({
     delay:       500,                            
     animation:   {opacity:'show',height:'show'},  
     speed:       'fast'                        
   });

});

function resMenu_open() {
	document.getElementById("navbar-header").style.width = "250px";
}
function resMenu_close() {
  document.getElementById("navbar-header").style.width = "0";
}

/**** Hidden search box ***/
	jQuery(document).ready(function(){
	jQuery('a[href="#search"]').on('click', function(event) {
		jQuery('#search').addClass('open');
	});            
	jQuery('#search, #search button.close').on('click keyup', function(event) {
		if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
			jQuery(this).removeClass('open');
		}
	});            
});

// scroll
jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
	    if (jQuery(this).scrollTop() > 0) {
	        jQuery('#scrollbutton').fadeIn();
	    } else {
	        jQuery('#scrollbutton').fadeOut();
	    }
	});
	jQuery(window).on("scroll", function () {
	   document.getElementById("scrollbutton").style.display = "block";
	});
	jQuery('#scrollbutton').click(function () {
	    jQuery("html, body").animate({
	        scrollTop: 0
	    }, 600);
	    return false;
	});

});

jQuery(function($){
	$(window).load(function() {
		$(".loader").delay(2000).fadeOut("slow");
	    $(".frame").delay(2000).fadeOut("slow");
	})
});

(function( $ ) {

	$(window).scroll(function(){
	  var sticky = $('.sticky-header'),
	      scroll = $(window).scrollTop();

	  if (scroll >= 100) sticky.addClass('fixed-header');
	  else sticky.removeClass('fixed-header');
	});

})( jQuery );
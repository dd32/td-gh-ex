(function( $ ) {

	/**** Hidden search box ***/
	jQuery('document').ready(function($){
		jQuery('.search-box ').click(function(){
	        jQuery(".serach_outer").slideDown(100);
	    });

	    jQuery('.closepop').click(function(){
	        jQuery(".serach_outer").slideUp(100);
	    });
	});
})( jQuery );

// scroll
jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
	    if (jQuery(this).scrollTop() > 100) {
	        jQuery('.scrollup').fadeIn();
	    } else {
	        jQuery('.scrollup').fadeOut();
	    }
	});
	jQuery('.scrollup').click(function () {
	    jQuery("html, body").animate({
	        scrollTop: 0
	    }, 600);
	    return false;
	});
});
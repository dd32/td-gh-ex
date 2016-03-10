jQuery(document).ready(function() {
	   jQuery('.nav li.dropdown').hover(function() {
		   jQuery(this).addClass('open');
	   }, function() {
		   jQuery(this).removeClass('open');
	   }); 
	   
	});
	
// Page Scroll To Top Section 
jQuery(document).ready(function () {

	jQuery(window).scroll(function () {
		if (jQuery(this).scrollTop() > 100) {
			jQuery('.page_up').fadeIn();
		} else {
			jQuery('.page_up').fadeOut();
		}
	});

	jQuery('.page_up').click(function () {
		jQuery("html, body").animate({
			scrollTop: 0
		}, 1000);
		return false;
	});

});		
	
	  
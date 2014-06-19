// JavaScript Document
jQuery(document).ready(function() {
/* Mobile */
	jQuery("#menu-trigger").on("click", function(){
		jQuery(".customize-menu").slideToggle();
	});
	
	// iPad
	var isiPad = navigator.userAgent.match(/iPad/i) != null;
		if (isiPad) jQuery('.linkedin-menu ul').addClass('no-transition');      
});          

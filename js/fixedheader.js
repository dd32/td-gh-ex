jQuery(window).scroll(function() { 'use strict';
	var hcontentH = jQuery('#header-content').outerHeight(true);
	var mainmconH = jQuery('#main-menu-con').outerHeight(true);
	// jQuery('#header').css('left','-'+jQuery(window).scrollLeft()+'px');
	if (jQuery(this).scrollTop() > jQuery('#header').outerHeight(true)+10) {
		jQuery('#header').addClass('smallheader'); 
	} else {
		jQuery('#header').removeClass('smallheader');		
	}
	jQuery('#main-menu-con').css('top', (hcontentH - mainmconH) + 'px' );							  
});
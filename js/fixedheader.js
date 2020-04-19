jQuery(window).load(function(){ 'use strict';
	var resMwdt = jQuery('#resmwdt').width();	  
	var headerH = jQuery('#header').outerHeight(true);
	if( resMwdt > 11 ){							
	jQuery(window).scroll(function() { 
		//jQuery('#header').css('left','-'+jQuery(window).scrollLeft()+'px');		
		if (jQuery(this).scrollTop() > headerH - 50 ) {
			jQuery('#header').addClass('smallheader');
			jQuery('#topadjust').height(headerH);
		} else {
			jQuery('#header').removeClass('smallheader');
			jQuery('#topadjust').height(0);
		}
	});
	}
});
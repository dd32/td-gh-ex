jQuery(window).load(function(){ 'use strict';
	if(jQuery('#main-menu-con')[0]){						   
		var resMwdt = jQuery('#resmwdt').width();
		if( resMwdt > 10 ){	
		var menuT = jQuery('#main-menu-con').position().top;
		var headerT = jQuery('#topadjust').position().top;								
		jQuery(window).scroll(function() { 			
			if (jQuery(this).scrollTop() > menuT ) {
				jQuery('#header').addClass('smallheader');
				jQuery('#topadjust').height(headerT);
			} else {
				jQuery('#header').removeClass('smallheader');
				jQuery('#topadjust').height(0);
			}
		});
		}
	}
});
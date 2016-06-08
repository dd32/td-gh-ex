/*
* Author: Asiathemes
* Created by: asiathemes
* Copyright (c) 2015 Becorp
* Date: 10 Sep, 2015
* http://www.asiathemes.com/Becorp
*/

/*-- Page Scroll To Top Section ---------------*/
	jQuery(document).ready(function () {
	
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 100) {
				jQuery('.hc_scrollup').fadeIn();
			} else {
				jQuery('.hc_scrollup').fadeOut();
			}
		});
	
		jQuery('.hc_scrollup').click(function () {
			jQuery("html, body").animate({
				scrollTop: 0
			}, 600);
			return false;
		});
	
	});	
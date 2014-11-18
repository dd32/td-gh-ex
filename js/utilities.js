jQuery( document ).ready(function() {

	// add submenu icons class in main menu (only for large resolution)
	if (tishoIsLargeResolution()) {
	
		jQuery('.menu > li:has(".sub-menu")').addClass('level-one-sub-menu');
		jQuery('.menu li ul li:has(".sub-menu")').addClass('level-two-sub-menu');										
	}

	jQuery('.menu-all-pages-container', jQuery('#navmain')).on('click', function(e) {

		e.stopPropagation();

		// toggle main menu
		if (tishoIsSmallResolution() || tishoIsMediumResolution()) {

			var parentOffset = jQuery(this).parent().offset(); 
			
			var relY = e.pageY - parentOffset.top;
		
			if (relY < 36) {
			
				jQuery('ul:first-child', this).toggle(400);
			}
		}
	});

	jQuery("#navmain .menu li").mouseleave( function() {
		if (tishoIsLargeResolution()) {
			jQuery(this).children("ul").stop(true, true).css('display', 'block').slideUp(300);
		}
	});
	
	jQuery("#navmain .menu li").mouseenter( function() {
		if (tishoIsLargeResolution()) {

			var curMenuLi = jQuery(this);
			jQuery("#navmain .menu > ul:not(:contains('#" + curMenuLi.attr('id') + "')) ul").hide();
		
			jQuery(this).children("ul").stop(true, true).css('display','none').slideDown(400);
		}
	});
	
	jQuery('#header-spacer').height(jQuery('#header-main-fixed').height());
	
	if (jQuery('#wpadminbar').length > 0) {
	
		jQuery('#header-main-fixed').css('top', jQuery('#wpadminbar').height() + 'px');
		jQuery('#wpadminbar').css('position', 'fixed');
	}
});

function tishoIsSmallResolution() {

	return (jQuery(window).width() <= 360);
}

function tishoIsMediumResolution() {
	
	var browserWidth = jQuery(window).width();

	return (browserWidth > 360 && browserWidth < 800);
}

function tishoIsLargeResolution() {

	return (jQuery(window).width() >= 800);
}

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
jQuery( document ).ready(function() {

	// add submenu icons class in main menu (only for large resolution)
	if (fcorpo_IsLargeResolution()) {
	
		jQuery('#navmain > div > ul > li:has("ul")').addClass('level-one-sub-menu');
		jQuery('#navmain > div > ul li ul li:has("ul")').addClass('level-two-sub-menu');										
	} else {

    jQuery('#header-main-fixed .cart-contents-icon').appendTo(jQuery('#header-main-fixed'));
    jQuery('#header-main-fixed #cart-popup-content').appendTo(jQuery('#header-main-fixed'));

    jQuery('#navmain > div > ul > li').each(
       function() {
         if (jQuery(this).find('> ul.sub-menu').length > 0) {

           jQuery(this).prepend('<span class="sub-menu-item-toggle"></span>');
         }
       }
     );

   jQuery('.sub-menu-item-toggle').on('click', function(e) {

	e.stopPropagation();

     var subMenu = jQuery(this).parent().find('> ul.sub-menu');

     jQuery('#navmain ul ul.sub-menu').not(subMenu).hide();
      jQuery('#navmain span.sub-menu-item-toggle').not(this).removeClass('sub-menu-item-toggle-expanded');
     jQuery(this).toggleClass('sub-menu-item-toggle-expanded');
     subMenu.toggle();
     subMenu.find('ul.sub-menu').toggle();
   });
  }

  fcorpo_initHeaderIconsEvents();

	if (fcorpo_options && fcorpo_options.loading_effect) {
	   fcorpo_init_loading_effects();
  	}

	jQuery('#navmain > div').on('click', function(e) {

		e.stopPropagation();

		// toggle main menu
		if (fcorpo_IsSmallResolution() || fcorpo_IsMediumResolution()) {

			var parentOffset = jQuery(this).parent().offset(); 
			
			var relY = e.pageY - parentOffset.top;
		
			if (relY < 36) {
			
				jQuery('ul:first-child', this).toggle(400);
			}
		}
	});
	
	jQuery(function(){
		jQuery('#camera_wrap').camera({
				navigationHover : false,
			height: fcorpo_IsLargeResolution() ? '450px' : '300px',
			loader: 'bar',
			pagination: true,
			thumbnails: false,
			time: 4500
		});
	});

	jQuery('#header-spacer').height(jQuery('#header-main-fixed').height());
});

function fcorpo_IsSmallResolution() {

	return (jQuery(window).width() <= 360);
}

function fcorpo_IsMediumResolution() {
	
	var browserWidth = jQuery(window).width();

	return (browserWidth > 360 && browserWidth < 800);
}

function fcorpo_IsLargeResolution() {

	return (jQuery(window).width() >= 800);
}

function fcorpo_init_loading_effects() {

    jQuery('#header-logo').addClass("hidden").viewportChecker({
            classToAdd: 'animated bounce',
            offset: 1
          });

    jQuery('.phone-and-email, #header-phone, #header-email').addClass("hidden").viewportChecker({
            classToAdd: 'animated rubberBand',
            offset: 1
          });

    jQuery('#page-header').addClass("hidden").viewportChecker({
            classToAdd: 'animated bounceInUp',
            offset: 1
          });

    jQuery('#main-content-wrapper h2, #main-content-wrapper h3')
            .addClass("hidden").viewportChecker({
            classToAdd: 'animated bounceInUp',
            offset: 1
          });

    jQuery('.col3a, .col3b, .col3c').addClass("hidden").viewportChecker({
            classToAdd: 'animated zoomIn',
            offset: 1
          });

    jQuery('article img, .instagram-pics img, .products img').addClass("hidden").viewportChecker({
            classToAdd: 'animated zoomIn',
            offset: 1
          });

    jQuery('#sidebar').addClass("hidden").viewportChecker({
            classToAdd: 'animated zoomIn',
            offset: 1
          });

    jQuery('.before-content, .after-content').addClass("hidden").viewportChecker({
            classToAdd: 'animated bounce',
            offset: 1
          });

    jQuery('.header-social-widget')
        .addClass("hidden").viewportChecker({
            classToAdd: 'animated bounceInLeft',
            offset: 1
          });

    jQuery('article, article p, article li')
        .addClass("hidden").viewportChecker({
            classToAdd: 'animated zoomIn',
            offset: 1
          });

    jQuery('#footer-main h1, #footer-main h2, #footer-main h3')
        .addClass("hidden").viewportChecker({
            classToAdd: 'animated bounceInUp',
            offset: 1
          });

    jQuery('#footer-main p, #footer-main ul, #footer-main li, .footer-title, .col3a, .col3b, .col3c')
        .addClass("hidden").viewportChecker({
            classToAdd: 'animated zoomIn',
            offset: 1
          });

    jQuery('.footer-social-widget')
        .addClass("hidden").viewportChecker({
            classToAdd: 'animated rubberBand',
            offset: 1
          });

    jQuery('#footer-menu')
        .addClass("hidden").viewportChecker({
            classToAdd: 'animated bounceInDown',
            offset: 1
          });
}

function fcorpo_initHeaderIconsEvents() {

    jQuery('a.cart-contents-icon').mouseenter(function(){
    
      // display mini-cart if it's not visible
      if ( !jQuery('#cart-popup-content').is(":visible") ) {

        var rightPos = (jQuery(window).width() - (jQuery(this).offset().left + jQuery(this).outerWidth()));
        var topPos = jQuery(this).offset().top - jQuery(window).scrollTop() + jQuery(this).outerHeight(); 

        jQuery('#cart-popup-content').css('right', rightPos).css('top', topPos).fadeIn();
      }
    });
    
    jQuery('#cart-popup-content').mouseleave(function(){
    
      jQuery('#cart-popup-content').fadeOut();
    });
  }

jQuery(document).ready(function () {

  jQuery(window).scroll(function () {
	  if (jQuery(this).scrollTop() > 100) {
		  jQuery('.scrollup').fadeIn();
		  jQuery('#header-top').hide();
	  } else {
		  jQuery('.scrollup').fadeOut();
		  jQuery('#header-top').show();
	  }
  });

  jQuery('.scrollup').click(function () {
	  jQuery("html, body").animate({
		  scrollTop: 0
	  }, 600);
	  return false;
  });

});
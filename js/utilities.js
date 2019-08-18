jQuery( document ).ready(function() {

	// add submenu icons class in main menu (only for large resolution)
	if (fcorpo_IsLargeResolution()) {
	
		jQuery('#navmain > div > ul > li:has("ul")').addClass('level-one-sub-menu');
		jQuery('#navmain > div > ul li ul li:has("ul")').addClass('level-two-sub-menu');

    // add support of browsers which don't support focus-within
    jQuery('#navmain > div > ul > li a')
      .focus(function() {
        jQuery(this).closest('li.level-one-sub-menu').addClass('menu-item-focused');
        jQuery(this).closest('li.level-two-sub-menu').addClass('menu-item-focused');

        // hide cart mini cart popup content when focus menu links if hidden on iterate back (shift + tab)
        if (jQuery(this).closest('#navmain > div > ul > li').find('#cart-popup-content').length == 0 && jQuery('#cart-popup-content').css('right') != '-99999px')
          jQuery('#cart-popup-content').css('right', '-99999px');

        // hide cart login popup content when focus menu links if hidden on iterate back (shift + tab)
        if (jQuery(this).closest('#navmain > div > ul > li').find('#login-popup-content').length == 0 && jQuery('#login-popup-content').css('right') != '-99999px')
          jQuery('#login-popup-content').css('right', '-99999px');

        // hide search popup content when focus menu links if hidden on iterate back (shift + tab)
        if (jQuery(this).closest('#navmain > div > ul > li').find('#search-popup-content').length == 0 && jQuery('#search-popup-content').css('right') != '-99999px')
          jQuery('#search-popup-content').css('right', '-99999px');

        // show cart popup content when focus on mini cart popup link if hidden on iterate back (shift + tab)
        if (jQuery(this).closest('#navmain > div > ul > li').find('#cart-popup-content').length && jQuery('#cart-popup-content').css('right') == '-99999px') {
          
          var rootLi = jQuery(this).closest('#navmain > div > ul > li');
          var rightPos = (jQuery(window).width() - (rootLi.offset().left + rootLi.outerWidth()));
          var topPos = rootLi.offset().top - jQuery(window).scrollTop() + rootLi.outerHeight();

          jQuery('#cart-popup-content').css('right', rightPos).css('top', topPos);
        }

        // show login popup content when focus on login popup link if hidden on iterate back (shift + tab)
        if (jQuery(this).closest('#navmain > div > ul > li').find('#login-popup-content').length && jQuery('#login-popup-content').css('right') == '-99999px')
          jQuery('#login-popup-content').css('right', 'auto');

        // show search popup content when focus on search popup link if hidden on iterate back (shift + tab)
        if (jQuery(this).closest('#navmain > div > ul > li').find('#search-popup-content').length && jQuery('#search-popup-content').css('right') == '-99999px')
          jQuery('#search-popup-content').css('right', 'auto');
      })
      .blur(function() {
        jQuery(this).closest('li.level-one-sub-menu').removeClass('menu-item-focused');
        jQuery(this).closest('li.level-two-sub-menu').removeClass('menu-item-focused');
    });										
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

   jQuery('#navmain').on('focusin', function(){

      if (jQuery('#navmain > div > ul').css('right') == '-99999px') {

        jQuery('#navmain > div > ul').css({'right': 'auto'});
        jQuery('#navmain ul ul').css({'right': 'auto'}).css({'position': 'relative'});

        jQuery('.sub-menu-item-toggle').addClass('sub-menu-item-toggle-expanded');
      }
    });

   jQuery('.sub-menu-item-toggle').on('click', function(e) {

	e.stopPropagation();

     var subMenu = jQuery(this).parent().find('> ul.sub-menu');

     jQuery('#navmain ul ul.sub-menu').not(subMenu).css('right', '-99999px').css('position', 'absolute');
      jQuery('#navmain span.sub-menu-item-toggle').not(this).removeClass('sub-menu-item-toggle-expanded');
     jQuery(this).toggleClass('sub-menu-item-toggle-expanded');
     
     if (subMenu.css('right') == '-99999px') {

        subMenu.css({'right': 'auto'}).css({'position': 'relative'});
        subMenu.find('ul.sub-menu').css({'right': 'auto'}).css({'position': 'relative'});

     } else {

        subMenu.css({'right': '-99999px'}).css({'position': 'absolute'});
        subMenu.find('ul.sub-menu').css({'right': '-99999px'}).css({'position': 'absolute'});
     }
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
			
				var firstChild = jQuery('ul:first-child', this);

        if (firstChild.css('right') == '-99999px')
            firstChild.css({'right': 'auto'});
        else
            firstChild.css({'right': '-99999px'});

        firstChild.parent().toggleClass('mobile-menu-expanded');
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

    jQuery('#header-logo').addClass("animations-hidden").viewportChecker({
            classToAdd: 'animated bounce',
            offset: 1
          });

    jQuery('.phone-and-email, #header-phone, #header-email').addClass("animations-hidden").viewportChecker({
            classToAdd: 'animated rubberBand',
            offset: 1
          });

    jQuery('#page-header').addClass("animations-hidden").viewportChecker({
            classToAdd: 'animated bounceInUp',
            offset: 1
          });

    jQuery('#main-content-wrapper h2, #main-content-wrapper h3')
            .addClass("animations-hidden").viewportChecker({
            classToAdd: 'animated bounceInUp',
            offset: 1
          });

    jQuery('.col3a, .col3b, .col3c').addClass("animations-hidden").viewportChecker({
            classToAdd: 'animated zoomIn',
            offset: 1
          });

    jQuery('article img, .instagram-pics img, .products img').addClass("animations-hidden").viewportChecker({
            classToAdd: 'animated zoomIn',
            offset: 1
          });

    jQuery('#sidebar').addClass("animations-hidden").viewportChecker({
            classToAdd: 'animated zoomIn',
            offset: 1
          });

    jQuery('.before-content, .after-content').addClass("animations-hidden").viewportChecker({
            classToAdd: 'animated bounce',
            offset: 1
          });

    jQuery('.header-social-widget')
        .addClass("animations-hidden").viewportChecker({
            classToAdd: 'animated bounceInLeft',
            offset: 1
          });

    jQuery('article, article p, article li')
        .addClass("animations-hidden").viewportChecker({
            classToAdd: 'animated zoomIn',
            offset: 1
          });

    jQuery('#footer-main h1, #footer-main h2, #footer-main h3')
        .addClass("animations-hidden").viewportChecker({
            classToAdd: 'animated bounceInUp',
            offset: 1
          });

    jQuery('#footer-main p, #footer-main ul, #footer-main li, .footer-title, .col3a, .col3b, .col3c')
        .addClass("animations-hidden").viewportChecker({
            classToAdd: 'animated zoomIn',
            offset: 1
          });

    jQuery('.footer-social-widget')
        .addClass("animations-hidden").viewportChecker({
            classToAdd: 'animated rubberBand',
            offset: 1
          });

    jQuery('#footer-menu')
        .addClass("animations-hidden").viewportChecker({
            classToAdd: 'animated bounceInDown',
            offset: 1
          });
}

function fcorpo_initHeaderIconsEvents() {

    jQuery('a.cart-contents-icon').on('mouseenter focusin', function(){
    
      // display mini-cart if it's not visible
      if ( jQuery('#cart-popup-content').css('right') == '-99999px' ) {

        var rightPos = (jQuery(window).width() - (jQuery(this).offset().left + jQuery(this).outerWidth()));
        var topPos = jQuery(this).offset().top - jQuery(window).scrollTop() + jQuery(this).outerHeight(); 

        jQuery('#cart-popup-content').css('right', rightPos).css('top', topPos);
      }
    });
    
    jQuery('#cart-popup-content').on('mouseleave', function(){
    
      jQuery('#cart-popup-content').css('right', '-99999px');
    });

    jQuery('#main-content-wrapper, #home-content-wrapper').on('focusin', function(){
    
      if (jQuery('#cart-popup-content').css('right') != '-99999px')
        jQuery('#cart-popup-content').css('right', '-99999px');

      if (jQuery('#navmain > div > ul').css('right') != '-99999px') {
        jQuery('#navmain > div > ul').css({'right': ''});  
      }

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
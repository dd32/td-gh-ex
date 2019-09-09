jQuery( document ).ready(function() {

	// add submenu icons class in main menu (only for large resolution)
	if (ayaspirit_IsLargeResolution()) {
	
		jQuery('#navmain > div > ul > li:has("ul")').addClass('level-one-sub-menu');
		jQuery('#navmain > div > ul li ul li:has("ul")').addClass('level-two-sub-menu');

    // add support of browsers which don't support focus-within
    jQuery('#navmain > div > ul > li a')
      .focus(function() {
        jQuery(this).closest('li.level-one-sub-menu').addClass('menu-item-focused');
        jQuery(this).closest('li.level-two-sub-menu').addClass('menu-item-focused');

        // hide cart mini cart popup content when focus menu links if hidden on iterate back (shift + tab)
        if (jQuery(this).closest('#navmain > div > ul > li').find('#cart-popup-content').length == 0 && jQuery('#cart-popup-content').css('z-index') != '-1')
          jQuery('#cart-popup-content').css('z-index', '-1');

        // hide cart login popup content when focus menu links if hidden on iterate back (shift + tab)
        if (jQuery(this).closest('#navmain > div > ul > li').find('#login-popup-content').length == 0 && jQuery('#login-popup-content').css('z-index') != '-1')
          jQuery('#login-popup-content').css('z-index', '-1');

        // hide search popup content when focus menu links if hidden on iterate back (shift + tab)
        if (jQuery(this).closest('#navmain > div > ul > li').find('#search-popup-content').length == 0 && jQuery('#search-popup-content').css('z-index') != '-1')
          jQuery('#search-popup-content').css('z-index', '-1');

        // show cart popup content when focus on mini cart popup link if hidden on iterate back (shift + tab)
        if (jQuery(this).closest('#navmain > div > ul > li').find('#cart-popup-content').length && jQuery('#cart-popup-content').css('z-index') == '-1') {
          
          var rootLi = jQuery(this).closest('#navmain > div > ul > li');
          var rightPos = (jQuery(window).width() - (rootLi.offset().left + rootLi.outerWidth()));
          var topPos = rootLi.offset().top - jQuery(window).scrollTop() + rootLi.outerHeight();

          jQuery('#cart-popup-content').css('z-index', '5000').css('right', rightPos).css('top', topPos);
        }

        // show login popup content when focus on login popup link if hidden on iterate back (shift + tab)
        if (jQuery(this).closest('#navmain > div > ul > li').find('#login-popup-content').length && jQuery('#login-popup-content').css('z-index') == '-1')
          jQuery('#login-popup-content').css('z-index', '5000');

        // show search popup content when focus on search popup link if hidden on iterate back (shift + tab)
        if (jQuery(this).closest('#navmain > div > ul > li').find('#search-popup-content').length && jQuery('#search-popup-content').css('z-index') == '-1')
          jQuery('#search-popup-content').css('z-index', '5000');
      })
      .blur(function() {
        jQuery(this).closest('li.level-one-sub-menu').removeClass('menu-item-focused');
        jQuery(this).closest('li.level-two-sub-menu').removeClass('menu-item-focused');
    });										
	}

	if (ayaspirit_options && ayaspirit_options.loading_effect) {
		   ayaspirit_init_loading_effects();
	  }

	if ( jQuery(window).width() < 800 ) {
		
			jQuery('#navmain > div > ul > li').each(
		       function() {
		         if (jQuery(this).find('> ul.sub-menu').length > 0) {

		           jQuery(this).prepend('<span class="sub-menu-item-toggle"></span>');
		         }
		       }
		     );

		   jQuery('#navmain').on('focusin', function(){

      if (jQuery('#navmain > div > ul').css('z-index') == '-1') {

        jQuery('#navmain > div > ul').css({'z-index': '5000'});
        jQuery('#navmain ul ul').css({'z-index': '5000'}).css({'position': 'relative'});

        jQuery('.sub-menu-item-toggle').addClass('sub-menu-item-toggle-expanded');
      }
    });

    jQuery('#main-content-wrapper, #home-content-wrapper').on('focusin', function(){

      if (jQuery('#navmain > div > ul').css('z-index') != '-1') {
        jQuery('#navmain > div > ul').css({'z-index': '-1'});  
      }

    });

   jQuery('.sub-menu-item-toggle').on('click', function(e) {

		     e.stopPropagation();

		     var subMenu = jQuery(this).parent().find('> ul.sub-menu');

		     jQuery('#navmain ul ul.sub-menu').not(subMenu).css('z-index', '-1').css('position', 'absolute');
      jQuery('#navmain span.sub-menu-item-toggle').not(this).removeClass('sub-menu-item-toggle-expanded');
		     jQuery(this).toggleClass('sub-menu-item-toggle-expanded');
		     if (subMenu.css('z-index') == '-1') {

        subMenu.css({'z-index': '5000'}).css({'position': 'relative'});
        subMenu.find('ul.sub-menu').css({'z-index': '5000'}).css({'position': 'relative'});

     } else {

        subMenu.css({'z-index': '-1'}).css({'position': 'absolute'});
        subMenu.find('ul.sub-menu').css({'z-index': '-1'}).css({'position': 'absolute'});
     }
		   });

		}

		jQuery('#navmain > div').on('click', function(e) {

		e.stopPropagation();

		// toggle main menu
		if (ayaspirit_IsSmallResolution() || ayaspirit_IsMediumResolution()) {

			var parentOffset = jQuery(this).parent().offset(); 
			
			var relY = e.pageY - parentOffset.top;
		
			if (relY < 36) {
			
				var firstChild = jQuery('ul:first-child', this);

        if (firstChild.css('z-index') == '-1')
            firstChild.css({'z-index': '5000'});
        else
            firstChild.css({'z-index': '-1'});

        firstChild.parent().toggleClass('mobile-menu-expanded');
			}
		}
	});
});

jQuery(function() {

	var Page = (function() {

		var $nav = jQuery( '#nav-dots > span' ),
			slitslider = jQuery( '#slider' ).slitslider( {
				onBeforeChange : function( slide, pos ) {

					$nav.removeClass( 'nav-dot-current' );
					$nav.eq( pos ).addClass( 'nav-dot-current' );
				}
			} ),

			init = function() {

				initEvents();
				
			},
			initEvents = function() {

				$nav.each( function( i ) {
				
					jQuery( this ).on( 'click', function( event ) {
						
						var $dot = jQuery( this );
						
						if( !slitslider.isActive() ) {

							$nav.removeClass( 'nav-dot-current' );
							$dot.addClass( 'nav-dot-current' );
						
						}
						
						slitslider.jump( i + 1 );
						return false;
					
					} );
					
				} );
			};

			return { init : init };

	})();

	Page.init();

});

function ayaspirit_IsSmallResolution() {

	return (jQuery(window).width() <= 360);
}

function ayaspirit_IsMediumResolution() {
	
	var browserWidth = jQuery(window).width();

	return (browserWidth > 360 && browserWidth < 800);
}

function ayaspirit_IsLargeResolution() {

	return (jQuery(window).width() >= 800);
}

function ayaspirit_init_loading_effects() {

    jQuery('#header-logo').addClass("animations-hidden").viewportChecker({
            classToAdd: 'animated bounce',
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

    jQuery('article img, .products img').addClass("animations-hidden").viewportChecker({
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

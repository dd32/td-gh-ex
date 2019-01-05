(function($) {

	"use strict";

	$( document ).ready(function() {

		if ($('#wpadminbar').length > 0) {
		
			$('#header-main-fixed').css('top', $('#wpadminbar').height() + 'px');
			$('#wpadminbar').css('position', 'fixed');
		}

		$(window).scroll(function () {

			if ($(this).scrollTop() > 100) {

				$('.scrollup').fadeIn();

			} else {

				$('.scrollup').fadeOut();

			}
		});

		var Page = (function() {

			var $navArrows = $( '#nav-arrows' ).hide(),
				$navDots = $( '#nav-dots' ).hide(),
				$nav = $navDots.children( 'span' ),
				$shadow = $( '#shadow' ).hide(),
				slicebox = $( '#sb-slider' ).slicebox( {
					onReady : function() {

						$navArrows.show();
						$navDots.show();
						$shadow.show();

					},
					onBeforeChange : function( pos ) {

						$nav.removeClass( 'nav-dot-current' );
						$nav.eq( pos ).addClass( 'nav-dot-current' );

					}
				} ),
				
				init = function() {

					initEvents();
					
				},
				initEvents = function() {

					// add navigation events
					$navArrows.children( ':first' ).on( 'click', function() {

						slicebox.next();
						return false;

					} );

					$navArrows.children( ':last' ).on( 'click', function() {
						
						slicebox.previous();
						return false;

					} );

					$nav.each( function( i ) {
					
						$( this ).on( 'click', function( event ) {
							
							var $dot = $( this );
							
							if( !slicebox.isActive() ) {

								$nav.removeClass( 'nav-dot-current' );
								$dot.addClass( 'nav-dot-current' );
							
							}
							
							slicebox.jump( i + 1 );
							return false;
						
						} );
						
					} );

				};

				return { init : init };

		})();

		Page.init();

		$('.scrollup').click(function () {
			
			$("html, body").animate({
				  scrollTop: 0
			  }, 600);

			return false;
		});

		ayablogging_mainMenuInit();

		if (ayablogging_options && ayablogging_options.loading_effect) {
			ayablogging_init_loading_effects();
		}

		if ( $(window).width() < 800 ) {
		
			$('#navmain > div > ul > li').each(
		       function() {
		         if ($(this).find('> ul.sub-menu').length > 0) {

		           $(this).prepend('<span class="sub-menu-item-toggle"></span>');
		         }
		       }
		     );

		   $('.sub-menu-item-toggle').on('click', function(e) {

		     e.stopPropagation();

		     var subMenu = $(this).parent().find('> ul.sub-menu');

		     $('#navmain ul ul.sub-menu').not(subMenu).hide();
		     $(this).toggleClass('sub-menu-item-toggle-expanded');
		     subMenu.toggle();
		     subMenu.find('ul.sub-menu').toggle();
		   });

		}

		$('#navmain > div').on('click', function(e) {

			e.stopPropagation();

			// toggle main menu
			if ( $(window).width() < 800 ) {

				var parentOffset = $(this).parent().offset(); 
				
				var relY = e.pageY - parentOffset.top;
			
				if (relY < 36) {
				
					$('ul:first-child', this).toggle(400);
				}
			}
		});

		// re-init main menu on screen resize
		$(window).resize(function () {
	       
	    	ayablogging_mainMenuClear();
	    	ayablogging_mainMenuInit();
		});
	});

	function ayablogging_mainMenuClear() {

		if ( $(window).width() >= 800 ) {
		
			$('#navmain > div > ul > li:has("ul")').removeClass('level-one-sub-menu');
			$('#navmain > div > ul li ul li:has("ul")').removeClass('level-two-sub-menu');										
		}

		if ( $('ul:first-child', $('#navmain > div') ).is( ":visible" ) ) {

			$('ul:first-child', $('#navmain > div') ).css('display', '');
		}
	}

	function ayablogging_mainMenuInit() {

		if ( $(window).width() >= 800 ) {
		
			$('#navmain > div > ul > li:has("ul")').addClass('level-one-sub-menu');
			$('#navmain > div > ul li ul li:has("ul")').addClass('level-two-sub-menu');										
		}
	}

	function ayablogging_init_loading_effects() {

	    $('#header-logo').addClass("hidden").viewportChecker({
            classToAdd: 'animated bounce',
            offset: 1
          });

	    

	    $('#page-header, article h1').addClass("hidden").viewportChecker({
	            classToAdd: 'animated bounceInUp',
	            offset: 1
	          });

	    $('#main-content-wrapper h2, #main-content-wrapper h3')
	            .addClass("hidden").viewportChecker({
	            classToAdd: 'animated bounceInUp',
	            offset: 1
	          });

	    $('img').addClass("hidden").viewportChecker({
	            classToAdd: 'animated zoomIn',
	            offset: 1
	          });

	    $('#sidebar, .col3a, .col3b, .col3c').addClass("hidden").viewportChecker({
	            classToAdd: 'animated bounceInRight',
	            offset: 1
	          });

	    $('.before-content, .after-content').addClass("hidden").viewportChecker({
	            classToAdd: 'animated bounce',
	            offset: 1
	          });

	    $('article, article p, article li')
        .addClass("hidden").viewportChecker({
            classToAdd: 'animated zoomIn',
            offset: 1
          })

	    $('#footer-main h1, #footer-main h2, #footer-main h3')
	        .addClass("hidden").viewportChecker({
	            classToAdd: 'animated bounceInUp',
	            offset: 1
	          });

	    $('#footer-main p, #footer-main ul, #footer-main li, .footer-title, .col3a, .col3b, .col3c')
        .addClass("hidden").viewportChecker({
            classToAdd: 'animated zoomIn',
            offset: 1
          });

    $('.footer-social-widget')
        .addClass("hidden").viewportChecker({
            classToAdd: 'animated rubberBand',
            offset: 1
          });

    $('#footer-menu')
        .addClass("hidden").viewportChecker({
            classToAdd: 'animated bounceInDown',
            offset: 1
          });
	}

})(jQuery);

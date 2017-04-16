(function($) {

	"use strict";

	$( document ).ready(function() {

		$(window).scroll(function () {

			if ($(this).scrollTop() > 100) {

				$('.scrollup').fadeIn();

			} else {

				$('.scrollup').fadeOut();

			}
		});

		$('.scrollup').click(function () {
			
			$("html, body").animate({
				  scrollTop: 0
			  }, 600);

			return false;
		});

		ayafreelance_mainMenuInit();

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
	       
	    	ayafreelance_mainMenuClear();
	    	ayafreelance_mainMenuInit();
		});
	});

	function ayafreelance_mainMenuClear() {

		if ( $(window).width() >= 800 ) {
		
			$('#navmain > div > ul > li:has("ul")').removeClass('level-one-sub-menu');
			$('#navmain > div > ul li ul li:has("ul")').removeClass('level-two-sub-menu');										
		}

		if ( $('ul:first-child', $('#navmain > div') ).is( ":visible" ) ) {

			$('ul:first-child', $('#navmain > div') ).css('display', '');
		}
	}

	function ayafreelance_mainMenuInit() {

		if ( $(window).width() >= 800 ) {
		
			$('#navmain > div > ul > li:has("ul")').addClass('level-one-sub-menu');
			$('#navmain > div > ul li ul li:has("ul")').addClass('level-two-sub-menu');										
		}
	}

	$(function(){
			
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
	});

})(jQuery);
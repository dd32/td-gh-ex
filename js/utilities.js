(function($) {

	"use strict";

	$( document ).ready(function() {

		$('#header-spacer').height( $('#header-main-fixed').height() );

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

		$('.scrollup').click(function () {
			
			$("html, body").animate({
				  scrollTop: 0
			  }, 600);

			return false;
		});

		fmuzz_mainMenuInit();

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
	       
	    	fmuzz_mainMenuClear();
	    	fmuzz_mainMenuInit();
		});

		$(function(){
			$('#camera_wrap').camera({
				height: '300px',
				loader: 'bar',
				pagination: true,
				thumbnails: false,
				time: 4500
			});
		});
	});

	function fmuzz_mainMenuClear() {

		if ( $(window).width() >= 800 ) {
		
			$('#navmain > div > ul > li:has("ul")').removeClass('level-one-sub-menu');
			$('#navmain > div > ul li ul li:has("ul")').removeClass('level-two-sub-menu');										
		}

		if ( $('ul:first-child', $('#navmain > div') ).is( ":visible" ) ) {

			$('ul:first-child', $('#navmain > div') ).css('display', '');
		}
	}

	function fmuzz_mainMenuInit() {

		if ( $(window).width() >= 800 ) {
		
			$('#navmain > div > ul > li:has("ul")').addClass('level-one-sub-menu');
			$('#navmain > div > ul li ul li:has("ul")').addClass('level-two-sub-menu');										
		}
	}

})(jQuery);
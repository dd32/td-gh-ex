(function($) {

	"use strict";

	function artgallery_init_loading_effects() {

	    $('#header-logo').addClass("animations-hidden").viewportChecker({
	            classToAdd: 'animated bounce',
	            offset: 1
	          });

	    

	    $('#page-header').addClass("animations-hidden").viewportChecker({
	            classToAdd: 'animated bounceInUp',
	            offset: 1
	          });

	    $('#main-content-wrapper h2, #main-content-wrapper h3')
	            .addClass("animations-hidden").viewportChecker({
	            classToAdd: 'animated bounceInUp',
	            offset: 1
	          });

	    $('img').addClass("animations-hidden").viewportChecker({
	            classToAdd: 'animated zoomIn',
	            offset: 1
	          });

	    $('#sidebar').addClass("animations-hidden").viewportChecker({
	            classToAdd: 'animated zoomIn',
	            offset: 1
	          });

	    $('.before-content, .after-content').addClass("animations-hidden").viewportChecker({
	            classToAdd: 'animated bounce',
	            offset: 1
	          });

	    $('.header-social-widget')
	        .addClass("animations-hidden").viewportChecker({
	            classToAdd: 'animated bounceInLeft',
	            offset: 1
	          });

	    $('article, article p, article li')
	        .addClass("animations-hidden").viewportChecker({
	            classToAdd: 'animated zoomIn',
	            offset: 1
	          });

	    $('#footer-main h1, #footer-main h2, #footer-main h3')
	        .addClass("animations-hidden").viewportChecker({
	            classToAdd: 'animated bounceInUp',
	            offset: 1
	          });

	    $('#footer-main p, #footer-main ul, #footer-main li, .footer-title, .col3a, .col3b, .col3c')
	        .addClass("animations-hidden").viewportChecker({
	            classToAdd: 'animated zoomIn',
	            offset: 1
	          });

	    $('.footer-social-widget')
	        .addClass("animations-hidden").viewportChecker({
	            classToAdd: 'animated rubberBand',
	            offset: 1
	          });

	    $('#footer-menu')
	        .addClass("animations-hidden").viewportChecker({
	            classToAdd: 'animated bounceInDown',
	            offset: 1
	          });
	}

	$( document ).ready(function() {

		if (artgallery_options && artgallery_options.loading_effect) {
	       artgallery_init_loading_effects();
	    }

		// add submenu icons class in main menu (only for large resolution)
		if ( $(window).width() >= 800 ) {
		
			$('#navmain > div > ul > li:has("ul")').addClass('level-one-sub-menu');
			$('#navmain > div > ul li ul li:has("ul")').addClass('level-two-sub-menu');

		} else {

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
			
				$('ul:first-child', this).toggle(400).parent().toggleClass('mobile-menu-expanded');
			}
		});

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


		$(function(){
			$('#camera_wrap').camera({
				navigationHover : false,
				height: '450px',
				loader: 'bar',
				pagination: true,
				thumbnails: false,
				time: 4500
			});
		});

	});

})(jQuery);
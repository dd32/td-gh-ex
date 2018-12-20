(function($) {

	"use strict";

	$( document ).ready(function() {

		$('a.cart-contents-icon').mouseenter(function(){
	
			// display mini-cart if it's not visible
			if ( !$('#cart-popup-content').is(":visible") ) {

				var rightPos = ($(window).width() - ($(this).offset().left + $(this).outerWidth()));
				var topPos = $(this).offset().top - $(window).scrollTop() + $(this).outerHeight(); 

				$('#cart-popup-content').css('right', rightPos).css('top', topPos).fadeIn();
			}
		});
		
		$('#cart-popup-content').mouseleave(function(){
		
			$('#cart-popup-content').fadeOut();
		});

		var owl = $('.owl-carousel');
		owl.owlCarousel({
		    items:1,
		    loop:true,
		    margin:10,
		    autoplay:true,
		    autoplayTimeout:3500,
		    autoplayHoverPause:true
		});


		if ($(window).width() < 800) {

			$('#navmain > div > ul > li').each(
		       function() {
		         if ($(this).find('> ul.sub-menu').length > 0) {

		           $(this).prepend('<span class="sub-menu-item-toggle"></span>');
		         }
		       }
		     );

		   $('.sub-menu-item-toggle').on('click', function(e) {

		     var subMenu = $(this).parent().find('> ul.sub-menu');

		     $('#navmain ul ul.sub-menu').not(subMenu).hide();
		     $(this).toggleClass('sub-menu-item-toggle-expanded');
		     subMenu.toggle();
		     subMenu.find('ul.sub-menu').toggle();
		   });



		}

	});

})(jQuery);
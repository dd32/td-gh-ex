(function($) {

	"use strict";

	$( document ).ready(function() {

		$('a.cart-contents-icon').on('mouseenter focusin', function(){
	
			// display mini-cart if it's not visible
			if ( $('#cart-popup-content').css('right') == '-99999px' ) {

				var rightPos = ($(window).width() - ($(this).offset().left + $(this).outerWidth()));
				var topPos = $(this).offset().top - $(window).scrollTop() + $(this).outerHeight(); 

				$('#cart-popup-content').css('right', rightPos).css('top', topPos).fadeIn();
			}
		});
		
		$('#cart-popup-content').on('mouseleave', function(){
    
      $('#cart-popup-content').css('right', '-99999px');
    });

    $('#main-content-wrapper').on('focusin', function(){
    
      if ($('#cart-popup-content').css('right') != '-99999px')
        $('#cart-popup-content').css('right', '-99999px');

      if ($('#navmain > div > ul').css('right') != '-99999px') {
        $('#navmain > div > ul').css({'right': ''});  
      }

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

		   $('#navmain').on('focusin', function(){

      if ($('#navmain > div > ul').css('right') == '-99999px') {

        $('#navmain > div > ul').css({'right': 'auto'});
        $('#navmain ul ul').css({'right': 'auto'}).css({'position': 'relative'});

        $('.sub-menu-item-toggle').addClass('sub-menu-item-toggle-expanded');
      }
    });

   $('.sub-menu-item-toggle').on('click', function(e) {

			 e.stopPropagation();

		     var subMenu = $(this).parent().find('> ul.sub-menu');

		     $('#navmain ul ul.sub-menu').not(subMenu).css('right', '-99999px').css('position', 'absolute');
		     $(this).toggleClass('sub-menu-item-toggle-expanded');
		     if (subMenu.css('right') == '-99999px') {

        subMenu.css({'right': 'auto'}).css({'position': 'relative'});
        subMenu.find('ul.sub-menu').css({'right': 'auto'}).css({'position': 'relative'});

     } else {

        subMenu.css({'right': '-99999px'}).css({'position': 'absolute'});
        subMenu.find('ul.sub-menu').css({'right': '-99999px'}).css({'position': 'absolute'});
     }
		   });



		}

	});

})(jQuery);
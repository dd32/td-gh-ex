(function($) {

	"use strict";

	$( document ).ready(function() {

		$('#header-spacer').height($('#header-main-fixed').height());

		if ( $(window).width() < 800 ) {

		   $('#navmain').on('focusin', function(){

		      if ($('#navmain > div > ul').css('right') == '-99999px') {

		        $('#navmain > div > ul').css({'right': 'auto'});
		        $('#navmain ul ul').css({'right': 'auto'}).css({'position': 'relative'}).css('z-index', '5000');

		        $('.sub-menu-item-toggle').addClass('sub-menu-item-toggle-expanded');
		      }
		    });

		   $('#main-content-wrapper, #home-content-wrapper').on('focusin', function(){

		      if ($('#navmain > div > ul').css('right') != '-99999px') {
		        $('#navmain > div > ul').css({'right': '-99999px'});  
		      }

		   });

		   $('.sub-menu-item-toggle').on('click', function(e) {

				     e.stopPropagation();

				     var subMenu = $(this).parent().find('> ul.sub-menu');

				     $('#navmain ul ul.sub-menu').not(subMenu).css('right', '-99999px').css('position', 'absolute');
		      $('#navmain span.sub-menu-item-toggle').not(this).removeClass('sub-menu-item-toggle-expanded');
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



	$('#navmain > div').on('click', function(e) {
			
		e.stopPropagation();

		// toggle main menu
		if ( $(window).width() < 800 ) {

			var parentOffset = $(this).parent().offset(); 
			
			var relY = e.pageY - parentOffset.top;
		
			if (relY < 36) {
			
				var firstChild = $('ul:first-child', this);

        if (firstChild.css('right') == '-99999px')
            firstChild.css({'right': 'auto'});
        else
            firstChild.css({'right': '-99999px'});

        firstChild.parent().toggleClass('mobile-menu-expanded');
			}
		}
	});
	
	});

})(jQuery);

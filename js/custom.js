jQuery(function($){
 "use strict";
   jQuery('.main-menu-navigation > ul').superfish({
     delay:       0,                            
     animation:   {opacity:'show',height:'show'},  
     speed:       'fast'                        
   });

});

function resMenu_open() {
  document.getElementById("menu-sidebar").style.width = "100%";
  document.getElementById("contact-info").style.position = "fixed";
}
function resMenu_close() {
  document.getElementById("menu-sidebar").style.width = "0";
  document.getElementById("contact-info").style.position = "static";
}


/**** Hidden search box ***/

	function search_open() {
	  jQuery(".serach_outer").slideDown(100);
	}
	function search_close() {
	  jQuery(".serach_outer").slideUp(100);
	}

(function( $ ) {

	jQuery(document).ready(function() {
		var owl = jQuery('#category .owl-carousel');
			owl.owlCarousel({
				nav: true,
				autoplay:true,
				autoplayTimeout:2000,
				autoplayHoverPause:true,
				loop: true,
				navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
				responsive: {
				  0: {
				    items: 1
				  },
				  600: {
				    items: 1
				  },
				  1000: {
				    items: 1
				}
			}
		})
	})
})( jQuery );
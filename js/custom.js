jQuery(function($){
 "use strict";
   jQuery('.main-menu-navigation > ul').superfish({
     delay:       500,                            
     animation:   {opacity:'show',height:'show'},  
     speed:       'fast'                        
   });

});

function resMenu_open() {
	  document.getElementById("menu-sidebar").style.width = "250px";
}
function resMenu_close() {
  document.getElementById("menu-sidebar").style.width = "0";
}

(function( $ ) {

	/**** Hidden search box ***/
	jQuery('document').ready(function($){
	$('.search-box i').click(function(){
	       $(".serach_outer").slideDown(700);
	   });

	   $('.closepop i').click(function(){
	       $(".serach_outer").slideUp(700);
	   });
	});
	

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
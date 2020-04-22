jQuery(function($){
 	"use strict";
   	jQuery('.main-menu-navigation > ul').superfish({
		delay:       0,
		animation:   {opacity:'show',height:'show'},  
		speed:       'fast'
   	});
});

function advance_automobile_resmenu_open() {
  document.getElementById("menu-sidebar").style.width = "100%";
}
function advance_automobile_resmenu_close() {
  document.getElementById("menu-sidebar").style.width = "0";
}

/**** Hidden search box ***/
function advance_automobile_search_open() {
  jQuery(".serach_outer").slideDown(100);
}
function advance_automobile_search_close() {
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

	// scroll
	jQuery(document).ready(function () {
		jQuery(window).scroll(function () {
		  if (jQuery(this).scrollTop() > 0) {
		      jQuery('#scroll-top').fadeIn();
		  } else {
		      jQuery('#scroll-top').fadeOut();
		  }
		});
		jQuery(window).on("scroll", function () {
		  document.getElementById("scroll-top").style.display = "block";
		});
		jQuery('#scroll-top').click(function () {
		  jQuery("html, body").animate({
		      scrollTop: 0
		  }, 600);
		  return false;
		});
	});

(function( $ ) {

	$(window).scroll(function(){
	  var sticky = $('.sticky-header'),
	      scroll = $(window).scrollTop();

	  if (scroll >= 100) sticky.addClass('fixed-header');
	  else sticky.removeClass('fixed-header');
	});

})( jQuery );

jQuery(function($){
  $(window).load(function() {
    $("#loader-wrapper").delay(1000).fadeOut("slow");
      $("#loader").delay(1000).fadeOut("slow");
  })
});


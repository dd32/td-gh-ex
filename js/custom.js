jQuery(function($){
 	"use strict";
   	jQuery('.main-menu-navigation > ul').superfish({
		delay:       0,
		animation:   {opacity:'show',height:'show'},  
		speed:       'fast'
   	});
});

function advance_automobile_resmenu_open() {
  	window.advance_automobile_mobileMenu=true;
	jQuery(".sidebar").addClass('display');
}
function advance_automobile_resmenu_close() {
  	window.advance_automobile_mobileMenu=false;
	jQuery(".sidebar").removeClass('display');
}

jQuery(document).ready(function () {

	window.advance_automobile_currentfocus=null;
  	advance_automobile_checkfocusdElement();
	var advance_automobile_body = document.querySelector('body');
	advance_automobile_body.addEventListener('keyup', advance_automobile_check_tab_press);
	var advance_automobile_gotoHome = false;
	var advance_automobile_gotoClose = false;
	window.advance_automobile_mobileMenu=false;
 	function advance_automobile_checkfocusdElement(){
	 	if(window.advance_automobile_currentfocus=document.activeElement.className){
		 	window.advance_automobile_currentfocus=document.activeElement.className;
	 	}
 	}
	function advance_automobile_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
			if (e.keyCode == 9) {
				if(window.advance_automobile_mobileMenu){
					if (!e.shiftKey) {
						if(advance_automobile_gotoHome) {
							jQuery( ".main-menu-navigation ul:first li:first a:first-child" ).focus();
						}
					}
					if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
						advance_automobile_gotoHome = true;
					} else {
						advance_automobile_gotoHome = false;
					}

				}else{

					if(window.advance_automobile_currentfocus=="mobiletoggle"){
						jQuery( "" ).focus();
					}
				}
			}
		}
		if (e.shiftKey && e.keyCode == 9) {
			if(window.innerWidth < 999){
				if(window.advance_automobile_currentfocus=="header-search"){
					jQuery(".mobiletoggle").focus();
				}else{
					if(window.advance_automobile_mobileMenu){
						if(advance_automobile_gotoClose){
							jQuery("a.closebtn.mobile-menu").focus();
						}
						if (jQuery( ".main-menu-navigation ul:first li:first a:first-child" ).is(":focus")) {
							advance_automobile_gotoClose = true;
						} else {
							advance_automobile_gotoClose = false;
					}
				
				}else{

					if(window.advance_automobile_mobileMenu){
					}
				}

				}
			}
		}
	 	advance_automobile_checkfocusdElement();
	}

});

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


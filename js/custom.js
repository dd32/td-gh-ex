jQuery(function($){
 "use strict";
   jQuery('.main-menu-navigation > ul').superfish({
     delay:       500,                            
     animation:   {opacity:'show',height:'show'},  
     speed:       'fast'                        
   });

});

function automobile_car_dealer_responsive_menu_open() {
	window.mobileMenu=true;
	jQuery(".menu-brand").addClass('show');
}
function automobile_car_dealer_responsive_menu_close() {
	window.mobileMenu=false;
	jQuery(".menu-brand").removeClass('show');
}

jQuery(document).ready(function () {

	window.currentfocus=null;
  	automobile_car_dealer_checkfocusdElement();
	var body = document.querySelector('body');
	body.addEventListener('keyup', automobile_car_dealer_check_tab_press);
	var gotoHome = false;
	var gotoClose = false;
	window.mobileMenu=false;
 	function automobile_car_dealer_checkfocusdElement(){
	 	if(window.currentfocus=document.activeElement.className){
		 	window.currentfocus=document.activeElement.className;
	 	}
 	}
	function automobile_car_dealer_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
			if (e.keyCode == 9) {
				if(window.mobileMenu){
					if (!e.shiftKey) {
						if(gotoHome) {
							jQuery( "#navbar-header input.search-field" ).focus();
						}
					}
					if (jQuery("a.closebtn.responsive-menu").is(":focus")) {
						gotoHome = true;
					} else {
						gotoHome = false;
					}

			}else{

					if(window.currentfocus=="mobiletoggle"){
						jQuery( "" ).focus();
					}
				}
			}
		}
		if (e.shiftKey && e.keyCode == 9) {
			if(window.innerWidth < 999){
				if(window.currentfocus=="header-search"){
					jQuery(".mobiletoggle").focus();
				}else{
					if(window.mobileMenu){
						if(gotoClose){
							jQuery("a.closebtn.responsive-menu").focus();
						}
						if (jQuery( "#navbar-header input.search-field" ).is(":focus")) {
							gotoClose = true;
						} else {
							gotoClose = false;
					}
				
				}else{

					if(window.mobileMenu){
					}
				}

				}
			}
		}
	 	automobile_car_dealer_checkfocusdElement();
	}

});

// scroll
jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
	    if (jQuery(this).scrollTop() > 0) {
	        jQuery('#scrollbutton').fadeIn();
	    } else {
	        jQuery('#scrollbutton').fadeOut();
	    }
	});
	jQuery(window).on("scroll", function () {
	   document.getElementById("scrollbutton").style.display = "block";
	});
	jQuery('#scrollbutton').click(function () {
	    jQuery("html, body").animate({
	        scrollTop: 0
	    }, 600);
	    return false;
	});

});

jQuery(function($){
	$(window).load(function() {
		$(".loader").delay(2000).fadeOut("slow");
	    $(".frame").delay(2000).fadeOut("slow");
	})
});

(function( $ ) {

	$(window).scroll(function(){
		var sticky = $('.sticky-header'),
		scroll = $(window).scrollTop();

		if (scroll >= 100) sticky.addClass('fixed-header');
		else sticky.removeClass('fixed-header');
	});

})( jQuery );
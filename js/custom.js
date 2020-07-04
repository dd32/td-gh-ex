jQuery(function($){
 "use strict";
   jQuery('.main-menu-navigation > ul').superfish({
     delay:       500,                            
     animation:   {opacity:'show',height:'show'},  
     speed:       'fast'                        
   });

});

function automobile_car_dealer_responsive_menu_open() {
	window.automobile_car_dealer_mobileMenu=true;
	jQuery(".menu-brand").addClass('show');
}
function automobile_car_dealer_responsive_menu_close() {
	window.automobile_car_dealer_mobileMenu=false;
	jQuery(".menu-brand").removeClass('show');
}

jQuery(document).ready(function () {

	window.automobile_car_dealer_currentfocus=null;
  	automobile_car_dealer_checkfocusdElement();
	var automobile_car_dealer_body = document.querySelector('body');
	automobile_car_dealer_body.addEventListener('keyup', automobile_car_dealer_check_tab_press);
	var automobile_car_dealer_gotoHome = false;
	var automobile_car_dealer_gotoClose = false;
	window.automobile_car_dealer_mobileMenu=false;
 	function automobile_car_dealer_checkfocusdElement(){
	 	if(window.automobile_car_dealer_currentfocus=document.activeElement.className){
		 	window.automobile_car_dealer_currentfocus=document.activeElement.className;
	 	}
 	}
	function automobile_car_dealer_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
			if (e.keyCode == 9) {
				if(window.automobile_car_dealer_mobileMenu){
					if (!e.shiftKey) {
						if(automobile_car_dealer_gotoHome) {
							jQuery( "#navbar-header input.search-field" ).focus();
						}
					}
					if (jQuery("a.closebtn.responsive-menu").is(":focus")) {
						automobile_car_dealer_gotoHome = true;
					} else {
						automobile_car_dealer_gotoHome = false;
					}

			}else{

					if(window.automobile_car_dealer_currentfocus=="mobiletoggle"){
						jQuery( "" ).focus();
					}
				}
			}
		}
		if (e.shiftKey && e.keyCode == 9) {
			if(window.innerWidth < 999){
				if(window.automobile_car_dealer_currentfocus=="header-search"){
					jQuery(".mobiletoggle").focus();
				}else{
					if(window.automobile_car_dealer_mobileMenu){
						if(automobile_car_dealer_gotoClose){
							jQuery("a.closebtn.responsive-menu").focus();
						}
						if (jQuery( "#navbar-header input.search-field" ).is(":focus")) {
							automobile_car_dealer_gotoClose = true;
						} else {
							automobile_car_dealer_gotoClose = false;
					}
				
				}else{

					if(window.automobile_car_dealer_mobileMenu){
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
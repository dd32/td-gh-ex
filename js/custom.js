jQuery(function($){
	"use strict";
	jQuery('.main-menu-navigation > ul').superfish({
		delay:       0,                            
		animation:   {opacity:'show',height:'show'},  
		speed:       'fast'                        
	});
});

function advance_portfolio_resmenu_open() {
  	window.advance_portfolio_mobileMenu=true;
	jQuery(".sidebar").addClass('display');
}
function advance_portfolio_resmenu_close() {
  	window.advance_portfolio_mobileMenu=false;
	jQuery(".sidebar").removeClass('display');
}

jQuery(document).ready(function () {

	window.advance_portfolio_currentfocus=null;
  	advance_portfolio_checkfocusdElement();
	var advance_portfolio_body = document.querySelector('body');
	advance_portfolio_body.addEventListener('keyup', advance_portfolio_check_tab_press);
	var advance_portfolio_gotoHome = false;
	var advance_portfolio_gotoClose = false;
	window.advance_portfolio_mobileMenu=false;
 	function advance_portfolio_checkfocusdElement(){
	 	if(window.advance_portfolio_currentfocus=document.activeElement.className){
		 	window.advance_portfolio_currentfocus=document.activeElement.className;
	 	}
 	}
	function advance_portfolio_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
			if (e.keyCode == 9) {
				if(window.advance_portfolio_mobileMenu){
					if (!e.shiftKey) {
						if(advance_portfolio_gotoHome) {
							jQuery( ".main-menu-navigation ul:first li:first a:first-child" ).focus();
						}
					}
					if (jQuery("a.closebtn.responsive-menu").is(":focus")) {
						advance_portfolio_gotoHome = true;
					} else {
						advance_portfolio_gotoHome = false;
					}

			}else{

					if(window.advance_portfolio_currentfocus=="mobiletoggle"){
						jQuery( "" ).focus();
					}
				}
			}
		}
		if (e.shiftKey && e.keyCode == 9) {
			if(window.innerWidth < 999){
				if(window.advance_portfolio_currentfocus=="header-search"){
					jQuery(".mobiletoggle").focus();
				}else{
					if(window.advance_portfolio_mobileMenu){
						if(advance_portfolio_gotoClose){
							jQuery("a.closebtn.responsive-menu").focus();
						}
						if (jQuery( ".main-menu-navigation ul:first li:first a:first-child" ).is(":focus")) {
							advance_portfolio_gotoClose = true;
						} else {
							advance_portfolio_gotoClose = false;
					}
				
				}else{

					if(window.advance_portfolio_mobileMenu){
					}
				}

				}
			}
		}
	 	advance_portfolio_checkfocusdElement();
	}

});

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

jQuery(function($){
 	"use strict";
   	jQuery('.main-menu-navigation > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},  
		speed:       'fast'
   	});
});

function advance_blogging_menu_open() {
	window.advance_blogging_respMenu=true;
	jQuery(".side-menu").addClass('open');
}
function advance_blogging_menu_close() {
	window.advance_blogging_respMenu=false;
	jQuery(".side-menu").removeClass('open');
}

(function( $ ) {

	$(window).scroll(function(){
		var sticky = $('.sticky-header'),
		scroll = $(window).scrollTop();

		if (scroll >= 100) sticky.addClass('fixed-header');
		else sticky.removeClass('fixed-header');
	});

	// Back to top
	jQuery(document).ready(function () {
	    jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 0) {
				jQuery('.scrollup').fadeIn();
			} else {
				jQuery('.scrollup').fadeOut();
			}
	    });
	    jQuery('.scrollup').click(function () {
			jQuery("html, body").animate({
				scrollTop: 0
			}, 600);
			return false;
	    });
	});

	$(window).load(function() {
		$(".preloader").delay(2000).fadeOut("slow");
	});

})( jQuery );

jQuery(window).load(function() {
	window.advance_blogging_currentfocus=null;
	advance_blogging_checkfocusdElement();
	var advance_blogging_body = document.querySelector('body');
	advance_blogging_body.addEventListener('keyup', advance_blogging_check_tab_press);
	var advance_blogging_gotoHome = false;
	var advance_blogging_gotoClose = false;
	window.advance_blogging_respMenu=false;
	function advance_blogging_checkfocusdElement(){
	    if(window.advance_blogging_currentfocus=document.activeElement.className){
	        window.advance_blogging_currentfocus=document.activeElement.className;
	    }
	}
	function advance_blogging_check_tab_press(e) {
	    "use strict";
	    e = e || event;
	    var activeElement;

	    if(window.innerWidth < 999){
		    if (e.keyCode == 9) {
		        if(window.advance_blogging_respMenu){
				    if (!e.shiftKey) {
				        if(advance_blogging_gotoHome) {
				            jQuery( ".main-menu-navigation ul:first li:first a:first-child" ).focus();
				        }
				    }
				    if (jQuery("a.closebtn").is(":focus")) {
				        advance_blogging_gotoHome = true;
				    } else {
				        advance_blogging_gotoHome = false;
				    }
		    	}
		    }
	    }
	    if (e.shiftKey && e.keyCode == 9) {
		    if(window.innerWidth < 999){
			    if(window.advance_blogging_currentfocus=="header-search"){
			        jQuery("button.mobiletoggle").focus();
			    }else{
				    if(window.advance_blogging_respMenu){
				        if(advance_blogging_gotoClose){
				        	jQuery("a.closebtn").focus();
				        }
				        if(jQuery( ".main-menu-navigation ul:first li:first a:first-child" ).is(":focus")) {
				            advance_blogging_gotoClose = true;
				        } else {
				            advance_blogging_gotoClose = false;
				        }
				    }
			    }
		    }
	    }
	    advance_blogging_checkfocusdElement();
	}
});
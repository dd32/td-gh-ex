jQuery(function($){
 "use strict";
   jQuery('.main-menu-navigation > ul').superfish({
     delay:       500,                            
     animation:   {opacity:'show',height:'show'},  
     speed:       'fast'                        
   });
});

function academic_education_resmenu_open() {
	window.academic_education_mobileMenu=true;
	jQuery(".sidebar").addClass('menubar');
}
function academic_education_resmenu_close() {
	window.academic_education_mobileMenu=false;
	jQuery(".sidebar").removeClass('menubar');
}

jQuery(document).ready(function () {

	window.academic_education_currentfocus=null;
  	academic_education_checkfocusdElement();
	var academic_education_body = document.querySelector('body');
	academic_education_body.addEventListener('keyup', academic_education_check_tab_press);
	var academic_education_gotoHome = false;
	var academic_education_gotoClose = false;
	window.academic_education_mobileMenu=false;
 	function academic_education_checkfocusdElement(){
	 	if(window.academic_education_currentfocus=document.activeElement.className){
		 	window.academic_education_currentfocus=document.activeElement.className;
	 	}
 	}
	function academic_education_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
			if (e.keyCode == 9) {
				if(window.academic_education_mobileMenu){
					if (!e.shiftKey) {
						if(academic_education_gotoHome) {
							jQuery( ".main-menu-navigation ul:first li:first a:first-child" ).focus();
						}
					}
					if (jQuery("a.closebtn.responsive-menu").is(":focus")) {
						academic_education_gotoHome = true;
					} else {
						academic_education_gotoHome = false;
					}

			}else{

					if(window.academic_education_currentfocus=="resToggle"){
						jQuery( "" ).focus();
					}
				}
			}
		}
		if (e.shiftKey && e.keyCode == 9) {
			if(window.innerWidth < 999){
				if(window.academic_education_currentfocus=="header-search"){
					jQuery(".resToggle").focus();
				}else{
					if(window.academic_education_mobileMenu){
						if(academic_education_gotoClose){
							jQuery("a.closebtn.responsive-menu").focus();
						}
						if (jQuery( ".main-menu-navigation ul:first li:first a:first-child" ).is(":focus")) {
							academic_education_gotoClose = true;
						} else {
							academic_education_gotoClose = false;
					}
				
				}else{

					if(window.academic_education_mobileMenu){
					}
				}

				}
			}
		}
	 	academic_education_checkfocusdElement();
	}

});

(function( $ ) {

	$(window).scroll(function(){
	    var sticky = $('.sticky-menubox'),
	    scroll = $(window).scrollTop();

	    if (scroll >= 100) sticky.addClass('fixed-menubox');
	    else sticky.removeClass('fixed-menubox');
	});

})( jQuery );
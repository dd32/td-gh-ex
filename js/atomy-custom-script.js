/**
 * atom-custom-script.js
 * author    Franchi Design
 * package   Atomy
 */

/* ------------------------------------------------------------------------- *
##  AOS Animate */
/* ------------------------------------------------------------------------- */

AOS.init({
	duration: 200
});

/* ------------------------------------------------------------------------- *
##  Back to top */
/* ------------------------------------------------------------------------- */

//Check to see if the window is top if not then display button
var back_to_top_button = jQuery('.btn-back-to-top');

jQuery(window).scroll(function(){
	if (jQuery(this).scrollTop() > 100 && !back_to_top_button.hasClass('scrolled')) {
		back_to_top_button.addClass('scrolled');
		
	} else if (jQuery(this).scrollTop() < 100 && back_to_top_button.hasClass('scrolled')) {
		back_to_top_button.removeClass('scrolled');
		
	}
});

//click to scroll to top
back_to_top_button.click(function(){
    jQuery('html, body').animate({scrollTop : 0},800);
    return false;
});


/* ------------------------------------------------------------------------- *
##  Parallax */
/* ------------------------------------------------------------------------- */

jQuery(function($){
	$(window).scroll(function(){
   var scrollVericale = $(this).scrollTop();
   $(".at-text-parallax").css({
	   "transform" : "translate(0px, " + scrollVericale / 10 + "%)"
   });
   
});
});





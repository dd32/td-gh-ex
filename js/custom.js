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
}
function resMenu_close() {
  document.getElementById("menu-sidebar").style.width = "0";
}

/**** Hidden search box ***/
	function search_open() {
	  jQuery(".serach_outer").slideDown(100);
	}
	function search_close() {
	  jQuery(".serach_outer").slideUp(100);
	}

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

  $(window).scroll(function(){
    var sticky = $('.logo-sticky-header'),
      scroll = $(window).scrollTop();

    if (scroll >= 100) sticky.addClass('fixed-logo');
    else sticky.removeClass('fixed-logo');
  });

})( jQuery );



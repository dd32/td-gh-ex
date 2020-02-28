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

	$(window).scroll(function(){
	  var sticky = $('.sticky-menubox'),
	      scroll = $(window).scrollTop();

	  if (scroll >= 100) sticky.addClass('fixed-menubox');
	  else sticky.removeClass('fixed-menubox');
	});

})( jQuery );
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

	/**** Hidden search box ***/
	jQuery('document').ready(function($){
	$('.search-box i').click(function(){
	       $(".serach_outer").slideDown(700);
	   });

	   $('.closepop i').click(function(){
	       $(".serach_outer").slideUp(700);
	   });
	});
	
})( jQuery );
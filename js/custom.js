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
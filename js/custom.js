jQuery(function($){
 "use strict";
   jQuery('.main-menu-navigation > ul').superfish({
     delay:       500,                            
     animation:   {opacity:'show',height:'show'},  
     speed:       'fast'                        
   });

});

function resMenu_open() {
	document.getElementById("navbar-header").style.width = "250px";
}
function resMenu_close() {
  document.getElementById("navbar-header").style.width = "0";
}

/**** Hidden search box ***/
	jQuery(document).ready(function(){
	jQuery('a[href="#search"]').on('click', function(event) {
		jQuery('#search').addClass('open');
	});            
	jQuery('#search, #search button.close').on('click keyup', function(event) {
		if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
			jQuery(this).removeClass('open');
		}
	});            
});
<!-- Javascript Start //-->
 
    jQuery(document).ready(function() { 
        jQuery('ul.nav').superfish({ 
            delay:       0,                            // one second delay on mouseout 
            animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
            speed:       'fast',                          // faster animation speed 
            autoArrows:  false,                           // disable generation of arrow mark-up 
            dropShadows: false                            // disable drop shadows 
        }); 
    });
 
  jQuery(document).ready( function($){	
 
 $('#slideshow').after('<div id="nav">').cycle({ 
   		fx: 'scrollLeft',
        speed:  'slow',
		easing: 'easeInOutQuad',
        timeout: 5000,
        pager:  '#nav'

});
});
// Custom Script  
	
function sldreadyresize() { 'use strict';
	if ( jQuery( "#mainslider" ).length ) {
		var hHeight = jQuery('#header').outerHeight(true);	
		var sWidth = jQuery('#sldvidcon').outerWidth(true);
		var sHeight = sWidth*0.45;										  
		jQuery('#sldvidcon, #slidevideo, #mainslider, #mainslider .slides .slideitem').css({ 'height': sHeight  });
		jQuery('#sldvidcon').css({ 'margin-top': -hHeight });
		jQuery('#mainslider .slidecaptions').css({ 'padding-top': hHeight });
	}
}

jQuery(document).ready(sldreadyresize);
jQuery(window).on('resize',sldreadyresize);

jQuery(document).ready(function(){ 'use strict';
	if ( jQuery( "#mainslider" ).length ) {
		jQuery(this).scrollTop(0);
		//Top Slider
		jQuery('#mainslider').flexslider({
			animation: 'fade', 		   
			controlNav: true,   	
			directionNav: true,
			slideshow: true,
			slideshowSpeed: 7000,   
			animationSpeed: 600,   
			pauseOnHover: true,   
			prevText: "",        
			nextText: ""		
		});	
	}
								  
	if ( jQuery( "#portfslider" ).length ) {							  
		jQuery('#portfslider').flexslider({
			animation: "slide",
    		animationLoop: false,
    		itemWidth: 300,
    		itemMargin: 1,
    		minItems: 1,
    		maxItems: 4,
			slideshow: true,
			controlNav: false,
			directionNav: true, 
			prevText: "",       
 			nextText: ""		
		});	
	}
								  
	if ( jQuery( "#grid-staff" ).length ) { jQuery( '#grid-staff' ).hoverfold(); }
	
	if ( jQuery( ".testimonialslider" ).length ) {							  
		jQuery('.testimonialslider').flexslider({
			animation: "slide",
			animationLoop: false,
			itemWidth: 200,
			itemMargin: 1,
			minItems: 1,
			maxItems: 3,
			slideshow: true,
			controlNav: true,
			directionNav: false,
			prevText: "",       
			nextText: ""	
  		});
	}
								  
});
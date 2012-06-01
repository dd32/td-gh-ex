/*!
 * jQuery Cycle set up
 * Version: 1.0
 * Description: Featured slider to display in header.php
 */



jQuery('#slider-wrap').cycle({ 
     fx:            		'fade', // name of transition effect (or comma separated names, ex: 'fade,scrollUp,shuffle') 
	next:  				'#nav-slider .nav-next',    // advances slideshow to next slide 
	prev:  				'#nav-slider .nav-previous',    // advances slideshow to previous slide
	timeout:       		6000,  // milliseconds between slide transitions (0 to disable auto advance) 
	speed:         		1000,  // speed of the transition (any valid fx speed value) 
	pause:         		1,     // true to enable "pause on hover" 
	pauseOnPagerHover: 	1, // true to pause when hovering over pager link 
	width: 				'100%',
	containerResize: 	0,   // resize container to fit largest slide 
	fit:           		1,
	after: function (){
        jQuery(this).parent().css("height", jQuery(this).height());
     }, 		
	
});
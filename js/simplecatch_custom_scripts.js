/*!
 * Custom scripts for jQuery Cycle set up
 * Version: 1.0
 * Description: Featured slider to display in header.php
 */

jQuery('.featured-slider').cycle({ 
    fx:            		'fade', // name of transition effect (or comma separated names, ex: 'fade,scrollUp,shuffle') 
    pager:  			'#controllers',  // element, jQuery object, or jQuery selector string for the element to use as pager container 
	activePagerClass: 	'active',  // class name used for the active pager element
	timeout:       		4000,  // milliseconds between slide transitions (0 to disable auto advance) 
	speed:         		1000,  // speed of the transition (any valid fx speed value) 
	pause:         		1,     // true to enable "pause on hover" 
	pauseOnPagerHover: 	1, // true to pause when hovering over pager link 
});
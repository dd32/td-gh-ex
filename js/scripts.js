/* <![CDATA[ */
var $ = jQuery.noConflict();
jQuery(document).ready(function($){ // START

	// Double Tap To Go
	$( '.nav li:has(ul)' ).doubleTapToGo();

	// Fluid video
	$( '.article' ).fitVids();

}); // END
/* ]]> */
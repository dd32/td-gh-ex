/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */

jQuery(document).ready(function($){

	$(".menu-toggle").click(function(){
		$("#header-menu").toggle();
	});
	
	/* Thanks to: Keyboard Accessible Dropdown Menus
	Copyright 2013 Amy Hendrix (email : amy@amyhendrix.net), Graham Armfield (email : graham.armfield@coolfields.co.uk)
	License:      MIT
	Plugin URI:   http://github.com/sabreuse/accessible-menus
	*/
	
	$('.main-navigation li').hover(
		function(){$(this).addClass("keyboard-dropdown");},
		function(){$(this).delay('250').removeClass("keyboard-dropdown");}
	);
	$('.main-navigation li a').on('focus blur',
		function(){$(this).parents().toggleClass("keyboard-dropdown");}
	);
});	
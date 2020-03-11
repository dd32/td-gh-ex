/**
 * at-preloader.js
 * author    Franchi Design
 * package   Atomy
 * version   1.0.7
 */



// makes sure the whole site is loaded
jQuery(window).load(function() {
	// will first fade out the loading animation
	jQuery("#status").delay(1700).fadeOut();
	// will fade out the whole DIV that covers the website.
	jQuery("#preloader").delay(1700).fadeOut("slow");
	})


/**
	Functionality for Alhena Lite theme.
	Author: ThemeinProgress.
	Licensed under GNU General Public License v3 or later.
*/

jQuery.noConflict()(function($){

	"use strict";

/* ===============================================
   MAIN MENU
   =============================================== */

	if ( $('nav#mainmenu ul:first .current-menu-item').length ) { 
	
		$('nav#mainmenu ul:first').tinyNav({
			active: 'current-menu-item',
		});

	} else {
	
		$('nav#mainmenu ul:first').tinyNav({
			header: 'Select an item',
		});

	}

	$('nav#mainmenu ul > li').each(function(){
    	
		if( $('ul', this).length > 0 ) {
        
			$(this).children('a').append('<span class="sf-sub-indicator"> <i class="fa fa-chevron-down"></i> </span>');
		
		}
	
	});
	
	$('nav#mainmenu li').hover(
		function () {
				$(this).children('ul').stop(true, true).fadeIn(100);
	 
		}, 
		function () {
				$(this).children('ul').stop(true, true).fadeOut(400);		
		}
	
	);

/* ===============================================
   WIDGET MENU
   =============================================== */

	$('nav#widgetmenu ul > li').each(function(){
    	
		if( $('ul', this).length > 0 ) {
        
			$(this).children('a').append('<span class="sf-sub-indicator"> &raquo;</span>').removeAttr("href");
		
		}
	
	});
	
	$('nav#widgetmenu ul > li ul').click(function(e){
		  e.stopPropagation();
		})
		.filter(':not(:first)')
		.hide();
		
	  $('nav#widgetmenu ul > li, nav#widgetmenu ul > li > ul > li').click(function(){
	
		var selfClick = $(this).find('ul:first').is(':visible');
		if(!selfClick) {
		  $(this).parent().find('> li ul:visible').slideToggle('low');
		  
		
		}
		$(this).find('ul:first').stop(true, true).slideToggle();
		
	});
	
/* ===============================================
   HEADER
   =============================================== */

	function wip_header() {

		var body_width = $(window).width();

		if ( body_width >= 992 ){

			var header_height = $('header.header').outerHeight();
			var nav_height = $('nav#mainmenu ul li a').height();
			
			var nav_padding = ((header_height-nav_height)/2);
		
			$('nav#mainmenu ul li a, .header-cart ').css({
				'padding-top' : nav_padding,
				'padding-bottom' : nav_padding
			});
		
			$('nav#mainmenu ul ul').css({
				'top' : header_height,
			});
		
			$('.header-cart-widget ').css({
				'top' : header_height - 1,
			});
		
		}
	
	}
	
	$( window ).load(wip_header);
	$( window ).resize(wip_header);

/* ===============================================
   FOOTER
   =============================================== */

	function wip_footer() {
	
		var footer_h = $('#footer').innerHeight();
		$('#wrapper').css({'padding-bottom':footer_h + 5});
	
	}
	
	$( window ).load(wip_footer);
	$( window ).resize(wip_footer);

/* ===============================================
   HEADER CART
   ============================================= */

	$('section.header-cart').hover(
		
		function () {
			$(this).children('div.header-cart-widget').stop(true, true).fadeIn(100);
		}, 
		function () {
			$(this).children('div.header-cart-widget').stop(true, true).fadeOut(400);		
		}
			
	);
	
/* ===============================================
   SOCIAL BUTTONS
   =============================================== */

	$('a.social').tipsy({fade:true, gravity:'s'});
	
/* ===============================================
   PRETTYPHOTO
   =============================================== */

	$("a[data-rel^='prettyPhoto']").prettyPhoto({
				// Parameters for PrettyPhoto styling
				animationSpeed:'fast',
				slideshow:5000,
				theme:'pp_default',
				show_title:false,
				overlay_gallery: false,
				social_tools: false
	});

});          
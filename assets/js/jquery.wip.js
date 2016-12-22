jQuery.noConflict()(function($){

	"use strict";

/* ===============================================
   FIXED HEADER
   =============================================== */

	function suevafree_header() {
		
		var body_width = $(window).width();
		
		var header = $('#header-wrapper .row').innerHeight();
		var submenu = $('.suevafree-menu ul > li').innerHeight();
		var demostore = $('p.demo_store').innerHeight();
		var adminbar = $('body.logged-in #wpadminbar').innerHeight();
		
		if ( body_width >= 992 ){
		
			$('#header-wrapper.fixed-header').css({'height': header + demostore});
			$('#header-wrapper.fixed-header #header').css({'height': header});
			$('#header-wrapper.fixed-header #header').css({'top': demostore + adminbar });
			$('.suevafree-menu ul > li > ul').css({'top': submenu });
		
		} else {
		
			$('#header-wrapper.fixed-header, #header-wrapper.fixed-header #header').css({'height':'auto'});
		
		}

	}
	
	$( window ).load(suevafree_header);
	$( window ).resize(suevafree_header);

/* ===============================================
   HEADER /
   =============================================== */

	$(window).load(function() {

		$('body.nicescroll').niceScroll({ cursorcolor: '#c1c1c1', cursorwidth:'12px', background:'#fafafa', scrollspeed:100, zindex:999999 });
	
		$("#scroll-sidebar").niceScroll({smoothscroll: false});
		$("#scroll-sidebar").getNiceScroll().hide();

		var pw = $(window).width();
		
		$("#header .navigation").click(function() {

			$('#overlay-body').fadeIn(600).addClass('visible');
			$('body').addClass('overlay-active');
			$('#wrapper').addClass('open-sidebar');

		});

		if ( pw < 992 ) {

			$("#sidebar-wrapper .navigation").click(function() {
	
				$('#overlay-body').fadeOut(600);
				$('body').removeClass('overlay-active');
				$('#wrapper').removeClass('open-sidebar');
		
			});

			$("#overlay-body").swipe({
	
				swipeRight:function(event, direction, distance, duration, fingerCount) {
	
					$('#overlay-body').fadeOut(600);
					$('body').removeClass('overlay-active');
					$('#wrapper').removeClass('open-sidebar');
	
				},
	
				threshold:0
		
			});
		
		} else if ( pw > 992 ) {

			$("#sidebar-wrapper .navigation, #overlay-body").click(function() {
	
				$('#overlay-body').fadeOut(600);
				$('body').removeClass('overlay-active');
				$('#wrapper').removeClass('open-sidebar');
		
			});

		}
		
	});

/* ===============================================
   HEADER CART
   ============================================= */
	
	$('div.header-cart').hover(
		
		function () {
			$(this).children('div.header-cart-widget').stop(true, true).fadeIn(100);
		}, 
		function () {
			$(this).children('div.header-cart-widget').stop(true, true).fadeOut(400);		
		}
			
	);

/* ===============================================
   MOBILE MENU
   =============================================== */
	
	$(window).load(function() {

		$("#mobile-scroll").niceScroll({smoothscroll: false});
		$("#mobile-scroll").getNiceScroll().hide();

		var pw = $(window).width();
		
		$("#header .mobile-navigation").click(function() {

			$('#overlay-body').fadeIn(600).addClass('visible');
			$('body').addClass('overlay-active');
			$('#wrapper').addClass('open-sidebar');

		});

		if ( pw < 992 ) {

			$("#mobile-wrapper .mobile-navigation, #overlay-body").click(function() {
	
				$('#overlay-body').fadeOut(600);
				$('body').removeClass('overlay-active');
				$('#wrapper').removeClass('open-sidebar');
		
			});

			$("#overlay-body").swipe({
	
				swipeRight:function() {
	
					$('#overlay-body').fadeOut(600);
					$('body').removeClass('overlay-active');
					$('#wrapper').removeClass('open-sidebar');
	
				},
	
				threshold:0
		
			});
		
		} else if ( pw > 992 ) {

			$("#mobile-wrapper .mobile-navigation, #overlay-body").click(function() {
				$('#overlay-body').fadeOut(600);
				$('body').removeClass('overlay-active');
				$('#wrapper').removeClass('open-sidebar');
			});

		}
		
	});

/* ===============================================
   MAIN MENU
   =============================================== */

	$('.suevafree-general-menu li').hover(
		
		function () {
			$(this).children('ul').stop(true, true).fadeIn(100);
		}, 
		function () {
			$(this).children('ul').stop(true, true).fadeOut(400);		
		}
			
	);

/* ===============================================
   TINYNAV MENU
   =============================================== */

	if ( $('.tinynav-menu').length ) { 
	
		$('.tinynav-menu ul:first').tinyNav({
			active: 'current-menu-item',
		});

	} else {
	
		$('.tinynav-menu ul:first').tinyNav({
			header: 'Select an item',
		});

	}

/* ===============================================
   VERTICAL MENU
   =============================================== */

	$('.suevafree-vertical-menu ul > li').each(function(){
    	if( $('ul', this).length > 0 ) {
        $(this).children('a').append('<span class="sf-sub-indicator"> <i class="fa fa-plus"></i> </span>').removeAttr("href"); }
	}); 

	$('.suevafree-vertical-menu ul > li ul').click(function(e){
		e.stopPropagation();
    })
	
    .filter(':not(:first)')
    .hide();
    
	$('.suevafree-vertical-menu ul > li, .suevafree-vertical-menu ul > li > ul > li').click(function(){

		var selfClick = $(this).find('ul:first').is(':visible');
		
		if(!selfClick) {
		  
		  $(this).parent().find('> li ul:visible').slideToggle('low');
		
		}
		
		$(this).find('ul:first').stop(true, true).slideToggle();

	});

/* ===============================================
   FOOTER
   =============================================== */

	function suevafree_footer() {
	
		var footer_h = $('#footer').innerHeight();
		$('#wrapper').css({'padding-bottom':footer_h});
	
	}
	
	$( document ).ready(suevafree_footer);
	$( window ).resize(suevafree_footer);

/* ===============================================
   OVERLAY
   =============================================== */

	$('.gallery img').hover(function(){
		$(this).animate({ opacity: 0.50 },{queue:false});
	}, 
	function() {
		$(this).animate({ opacity: 1.00 },{queue:false});
	});
	

/* ===============================================
   Tipsy
   =============================================== */

	$('.social-buttons a').tipsy({fade:true, gravity:'s'});
	
/* ===============================================
   Scroll to Top Plugin
   =============================================== */

	$(window).scroll(function() {
		
		if( $(window).scrollTop() > 400 ) {
			
				$('#back-to-top').fadeIn(500);
			
			} else {
			
				$('#back-to-top').fadeOut(500);
		}
		
	});

	$('.back-to-top').click(function(){
		$.scrollTo(0,'slow');
		return false;
	});

/* ===============================================
   MASONRY
   =============================================== */

	function suevafree_masonry() {

		if( $(window).width() < 992 ){
			
			if( $('.masonry').masonry() ) {
			
				$('.masonry').masonry('destroy');
			
			}
		
		} else {

			$('.masonry').imagesLoaded(function () {

				$('.masonry').masonry({
					itemSelector: '.masonry-item',
				});
				
			});
		
		}

	}

/* ===============================================
   ISOTOPE
   =============================================== */
   
	$(document).ready(function(){
		suevafree_masonry();
	});

	$(window).resize(function(){
		suevafree_masonry();
	});
	
/* ===============================================
   Prettyphoto
   =============================================== */

	if( $().prettyPhoto ) {
		suevafree_lightbox();
	}

	function suevafree_lightbox() {
	
		$("a[data-rel^='prettyPhoto']").prettyPhoto({
			animationSpeed:'fast',
			slideshow:5000,
			theme:'pp_default',
			show_title:false,
			overlay_gallery: false,
			social_tools: false
		});
	
	}

});          
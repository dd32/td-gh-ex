/*
 * jQuery Avventura Lite theme functions file
 * https://www.themeinprogress.com
 *
 * Copyright 2019, ThemeinProgress
 * Licensed under MIT license
 * https://opensource.org/licenses/mit-license.php
 */

jQuery.noConflict()(function($){

	"use strict";

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
   FIXED HEADER
   =============================================== */

	function avventura_lite_header() {

		if( $('body').hasClass('sticky_header') ) {
	
			if ( $(window).width() > 992 ) {
		
				var menuHeight = $('#menu-wrapper').innerHeight();
				var headerHeight = $('#header').innerHeight() + $('#logo-wrapper').innerHeight();
		
				if( $(window).scrollTop() > headerHeight ) {
					$('#menu-wrapper').addClass('fixed');
					$('body').css({'padding-top': menuHeight});
				} else {
					$('#menu-wrapper').removeClass('fixed');
					$('body').css({'padding-top': 0});
				}
				
			} else {
	
				var adminBarHeight = $('#wpadminbar').innerHeight();
				var mobileHeaderHeight = $('#header').innerHeight();
		
				if( $(window).scrollTop() > mobileHeaderHeight ) {
					$('#header').addClass('fixed').css({'top': adminBarHeight});
					$('body').css({'padding-top': mobileHeaderHeight});
				} else {
					$('#header').removeClass('fixed').css({'top': 0});
					$('body').css({'padding-top': 0});
				}
	
			}
		
		}
	
	}
	
	$( document ).ready(avventura_lite_header);
	$( window ).scroll(avventura_lite_header);
	$( window ).resize(avventura_lite_header);

/* ===============================================
   SCROLL SIDEBAR
   =============================================== */

	$(window).load(function() {

		$("#scroll-sidebar").niceScroll({smoothscroll: false});
		$("#scroll-sidebar").getNiceScroll().hide();
		
		$("#header .mobile-navigation").click(function() {

			$('#overlay-body').fadeIn(600).addClass('visible');
			$('body').addClass('overlay-active').addClass('no-scrolling');
			$('#wrapper').addClass('open-sidebar');

		});

		if ( $(window).width() < 992 ) {

			$("#overlay-body").swipe({
	
				swipeLeft:function() {
					$('#overlay-body').fadeOut(600);
					$('body').removeClass('overlay-active').removeClass('no-scrolling');
					$('#wrapper').removeClass('open-sidebar');
				},
	
				threshold:0
		
			});

			$("#sidebar-wrapper .mobile-navigation").click(function() {
				
				$('#overlay-body').fadeOut(600);
				$('body').removeClass('overlay-active').removeClass('no-scrolling');
				$('#wrapper').removeClass('open-sidebar');
		
			});

		} else if ( $(window).width() > 992 ) {

			$("#sidebar-wrapper .mobile-navigation, #overlay-body").click(function() {
				$('#overlay-body').fadeOut(600);
				$('body').removeClass('overlay-active').removeClass('no-scrolling');
				$('#wrapper').removeClass('open-sidebar');
			});

		}
		
	});

/* ===============================================
   Mobile menu
   =============================================== */

	$('nav#mobilemenu ul > li').each(function(){
		if( $('ul', this).length > 0 ) {
			$(this).children('a').append('<span class="sf-sub-indicator"><i class="fa fa-caret-down"></i></span>'); 
		}
	});
    
	$('nav#mobilemenu ul > li .sf-sub-indicator, nav#mobilemenu ul > li > ul > li .sf-sub-indicator ').click(function(e){
		e.preventDefault();
		if($(this).closest('a').next('ul.sub-menu').css('display') === 'none' ) {	
			$(this).html('<i class="fa fa-caret-up"></i>');
		} else {	
			$(this).html('<i class="fa fa-caret-down"></i>');
		}
		$(this).closest('a').next('ul.sub-menu').stop(true,false).slideToggle('slow');
	});

/* ===============================================
   Open header search 
   =============================================== */

	function avventura_lite_open_search_form() {
		$('.header-search .search-form').addClass('is-open');
		$('body').addClass('no-scrolling');
		return false;
	}
	
	$( ".header-search a.open-search-form").on("focus", avventura_lite_open_search_form);
	$( ".header-search a.open-search-form").on("click", avventura_lite_open_search_form);

/* ===============================================
   Close header search 
   =============================================== */

	function avventura_lite_close_search_form() {
		$('.header-search .search-form').removeClass('is-open');
		$('body').removeClass('no-scrolling');
	}
	
	$( ".header-search a.close-search-form").on("focus", avventura_lite_close_search_form);
	$( ".header-search a.close-search-form").on("click", avventura_lite_close_search_form);

/* ===============================================
   Footer fix
   =============================================== */

	function avventura_lite_footer() {
	
		var footerHeight = $('#footer').innerHeight();
		$('#wrapper').css({'padding-bottom':footerHeight});
	
	}

	$( window ).load(avventura_lite_footer);
	$( document ).ready(avventura_lite_footer);
	$( window ).resize(avventura_lite_footer);

/* ===============================================
   Scroll to top Plugin
   =============================================== */

	$(window).scroll(function() {
		
		if( $(window).scrollTop() > 400 ) {
			$('#back-to-top').fadeIn(500);
		} else {
			$('#back-to-top').fadeOut(500);
		}
		
	});

	$('#back-to-top').click(function(){
		$("html, body").animate({scrollTop: 0}, 700);
		return false;
	});

/* ===============================================
   Masonry
   =============================================== */

	function avventura_lite_masonry() {
		
		$('.masonry').imagesLoaded(function () {
	
			$('.masonry').masonry({
				itemSelector: '.masonry-item',
				isAnimated: true
			});
	
		});

	}
   
	$(document).ready(function(){
		avventura_lite_masonry();
	});

	$(window).resize(function(){
		avventura_lite_masonry();
	});
	
/* ===============================================
   Prettyphoto
   =============================================== */

	function avventura_lite_lightbox() {
	
		$("a[data-rel^='prettyPhoto']").prettyPhoto({
			animationSpeed:'fast',
			slideshow:5000,
			theme:'pp_default',
			show_title:false,
			overlay_gallery: false,
			deeplinking: false,
			social_tools: false
		});
	
	}
	
	if( $().prettyPhoto ) {
		avventura_lite_lightbox();
	}

/* ===============================================
   Slick slider
   ============================================= */

	$('.slick-slideshow').each(function(){

		var mobilecolums = 1;
		var colums = parseInt($(this).attr('data-columns'));
		if ( colums >= 3 ) { mobilecolums = 2 ;}

		$(this).children('.slick-slides').slick({
		
			centerMode: true,
			slidesToShow: colums,
			prevArrow: '<div class="prev-arrow"><span class="dashicons dashicons-arrow-left-alt"></span></div>',
			nextArrow: '<div class="next-arrow"><span class="dashicons dashicons-arrow-right-alt"></span></div>',
			responsive: [
				{
					breakpoint: 480,
					settings: {
						centerMode: false,
						slidesToShow: 1,
						arrows: false
					}
				},
				{
					breakpoint: 600,
					settings: {
						centerMode: false,
						slidesToShow: 2,
						arrows: true
					}
				},
				{
					breakpoint: 992,
					settings: {
						centerMode: false,
						slidesToShow: mobilecolums,
						arrows: true
					}
				}
		
			]
	
		});
	
	});

	function slickActiveItem() {
		
		$('.slick-slideshow').each(function(){

			var items = $(this).find('.slick-slide').length;
			var colums = parseInt($(this).attr('data-columns'));
			$(this).find('.slick-slide').removeClass('slick-visible-item');

			if ( $('body').width() > 992 ) {
				
				if ( items <= colums ) {
				
					$(this).find('.slick-slide').addClass('slick-visible-item');
				
				} else {
					
					if ( colums%2 === 0 ) {
						
						$(this).find('.slick-active').prev().addClass('slick-visible-item');
							
					} else {
						
						$(this).find('.slick-active').addClass('slick-visible-item');
			
					}
				}
				
			} else {
				
				$(this).find('.slick-active').addClass('slick-visible-item');
				
			}
			
		}); 
		
	}
	
	$(document).ready(function(){
		
		slickActiveItem();
		$(".slick-slideshow .slick-slides").on('afterChange', function(){
			slickActiveItem();
		});
	
	});

/* ===============================================
   Slick Overlay fix
   =============================================== */

	function avventura_lite_slick_overlay() {

		$('.slick-slide').find('.slider-overlay').css({'height': 'auto', 'margin-top': 0 });

		$('.slick-slide').each(function(){

			var overlayHight ;
			var contentHeight = $(this).find('.slider-overlay-content').innerHeight();
			
			if ( $('body').width() < 992 ) {
			
				overlayHight = contentHeight+50;
			
			} else {
			
				overlayHight = contentHeight+150;
			
			}
			
			$(this).find('.slider-overlay').css({'height': overlayHight, 'margin-top': -overlayHight/2});
		
		}); 

	}

	$(document).ready(function(){
		avventura_lite_slick_overlay();
	});

	$(window).resize(function(){
		avventura_lite_slick_overlay();
	});

});          
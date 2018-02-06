jQuery(document).ready(function( $ ) {
	"use strict";

/*
** Main Navigation =====
*/
	// Navigation Hover 
	$('#main-menu').find('li').hover(function () {
	    $(this).children('.sub-menu').stop().fadeToggle( 200 );
	}, function() {
		$(this).children('.sub-menu').stop().fadeToggle( 200 );
	});

	// Mobile Menu
	$('.mobile-menu-btn').on( 'click', function() {
		$('.mobile-menu-container').slideToggle();
	});

	// Responsive Menu 
	$( '#mobile-menu .menu-item-has-children' ).prepend( '<div class="sub-menu-btn"></div>' );
	$( '#mobile-menu .sub-menu' ).before( '<span class="sub-menu-btn-icon"><i class="fa fa-angle-down"></i></span>' );

	// Responsive sub-menu btn
	$('.sub-menu-btn').click(function(){
		$(this).closest('li').children('.sub-menu').slideToggle();
		$(this).closest('li').children('.sub-menu-btn-icon').children('i').toggleClass( 'fa-rotate-270' );
	});

	$( window ).on( 'resize', function() {
		if ( $('.main-menu-container').css('display') === 'block' ) {
			$( '.mobile-menu-container' ).css({ 'display' : 'none' });
		}
	});

	// Search Form
	$('.main-nav-icons').after($('.main-nav-search #searchform').remove());
	var mainNavSearch = $('#main-nav #searchform');
	
	mainNavSearch.find('#s').attr( 'placeholder', mainNavSearch.find('#s').data('placeholder') );

	$('.main-nav-search').click(function() {
		if ( mainNavSearch.css('display') === 'none' ) {
			mainNavSearch.fadeIn();
			$('.main-nav-search i:last-of-type').show();
			$('.main-nav-search i:first-of-type').hide();
		} else {
			mainNavSearch.fadeOut();
			$('.main-nav-search i:last-of-type').hide();
			$('.main-nav-search i:first-of-type').show();
		}
	});


/*
** Featured Slider =====
*/
	var RTL = false;
	if( $('html').attr('dir') == 'rtl' ) {
	RTL = true;
	}

	$('#featured-slider').slick({
		prevArrow: '<span class="prev-arrow"><i class="fa fa-angle-left"></i></span>',
		nextArrow: '<span class="next-arrow"><i class="fa fa-angle-right"></i></span>',
		dotsClass: 'slider-dots',
		adaptiveHeight: true,
		rtl: RTL,
		speed: 750,
  		customPaging: function(slider, i) {
            return '';
        }
	});


/*
** Sidebars =====
*/

	// Sticky Sidebar
	function stickySidebar() {
		if ( $( '.main-content' ).data('sidebar-sticky') === 1 ) {		
			var SidebarOffset = 0;

			if ( $("#main-nav").attr( 'data-fixed' ) === '1' ) {
				SidebarOffset = 40;
			}

			$('.sidebar-left,.sidebar-right').stick_in_parent({
				parent: ".main-content",
				offset_top: SidebarOffset,
				spacer: '.sidebar-left-wrap,.sidebar-right-wrap'
			});

			if ( $('#page-wrap').width() <= 1050 ) {
				$('.sidebar-left,.sidebar-right').trigger("sticky_kit:detach");
			}
		}
	}

	// on Window Resize
	$( window ).on( 'resize', function() {
		stickySidebar();
	});

	// on Load
	$( window ).on( 'load', function() {
		stickySidebar();
	});


/*
** Scroll Top Button =====
*/

	$('.scrolltop').on( 'click', function() {
		$('html, body').animate( { scrollTop : 0 }, 800 );
		return false;
	});

	$( window ).on( 'scroll', function() {
		if ($(this).scrollTop() >= 800 ) {
			$('.scrolltop').fadeIn(350);
		} else {
			$('.scrolltop').fadeOut(350);
		}
	});


/*
** Preloader =====
*/
	if ( $('.bard-preloader-wrap').length ) {

		$( window ).on( 'load', function() {
			setTimeout(function(){
				$('.bard-preloader-wrap > div').fadeOut( 600 );
				$('.bard-preloader-wrap').fadeOut( 1500 );
			}, 300);
		});

	}


/*
** Run Functions =====
*/
	// FitVids
	$('.slider-item, .post-media').fitVids();


}); // end dom ready
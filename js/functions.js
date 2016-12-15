( function( $ ) {
	var body = $(document.body),
		menuToggle = $('#menu-toggle'),
		siteNav = $('#site-navigation');

	$( document ).ready( function() {

		// Enable top search
		$('#search-show, #search-hide').on('click', function(e) {
			var searchBox = $('#search-box');
			e.preventDefault();
			if ( body.hasClass('search-opened') ) {
				body.removeClass('search-opened').addClass('search-closing');
				setTimeout(function() {
					body.removeClass('search-closing');
				}, 500);
			} else {
				body.addClass('search-opening');
				setTimeout(function() {
					body.addClass('search-opened').removeClass('search-opening');
				}, 500);
				searchBox.find('.search-field').focus();
			}
		});

		// Scroll to top
		$('#top-link').on('click', function(e) {
			$('html, body').animate({'scrollTop': 0});
			e.preventDefault();
		});

		// Fixed top navigation
		if ( body.hasClass('fixed-nav') ) {
			jgt_azalea_fixed_nav();
			$(window).scroll(function() {
				jgt_azalea_fixed_nav();
			});
		}

		// Add dropdown toggle
		var dropdownArrow = $('<button class="dropdown-toggle" aria-expanded="false"><span class="screen-reader-text">' + azaleaVars.screenReaderText + '</span></button>');
		siteNav.find('.menu-item-has-children > a, .page_item_has_children > a').after(dropdownArrow);
		siteNav.find('.dropdown-toggle').click( function(e) {
			var _this = $(this);
			e.preventDefault();
			_this.toggleClass('toggled-on').attr('aria-expanded', _this.attr('aria-expanded') === 'false' ? 'true' : 'false');
			_this.next('.children, .sub-menu').slideToggle();
		});

		// Show submenu on hover
		jgt_azalea_menu_dropdown();

		// Enable menu toggle
		menuToggle.click(function(){
			if ( menuToggle.hasClass( 'toggled-on' ) ) {
				menuToggle.removeClass('toggled-on').attr('aria-expanded', 'false');
				$('#menu-container').slideUp(200);
			} else {
				menuToggle.addClass('toggled-on').attr('aria-expanded', 'true');
				$('#menu-container').slideDown(200);
			}
		});

		$(window).bind('resize orientationchange', function() {
			jgt_azalea_menu_dropdown();
			if ( menuToggle.is(':hidden') ) {
				menuToggle.removeClass('toggled-on').attr('aria-expanded', 'false');
				$('#menu-container').removeAttr('style');
			}
		});

		// Responsive video embeds
		$('.hentry').fitVids();

		// Initialize post slider
		$('.post-gallery').slick({
			arrows : true,
			dots : false,
			fade : true
		});

		$(document.body).on('post-load', function() {
			// Run Fitvid on Infinite Scroll
			$('.hentry').fitVids();

			// Initialize post slider on Infinite Scroll
			$('.post-gallery').not('.slick-slider').slick({
				arrows : true,
				dots : false,
				fade : true
			});
		});

	} );

	function jgt_azalea_fixed_nav() {
		if ( $(window).scrollTop() > 0 ) {
			siteNav.addClass('scrolled');
		} else {
			siteNav.removeClass('scrolled');
		}
	}

	function jgt_azalea_menu_dropdown() {
		var menuItem = siteNav.find('li');
		siteNav.find('.sub-menu, .children').removeAttr('style');
		siteNav.find('.dropdown-toggle').removeClass( 'toggled-on' ).attr('aria-expanded', 'false');
		if ( menuToggle.is(':hidden') ) {
			menuItem.hover(function(){
				$(this).find('ul:first').stop(true, true).slideDown(200);
			},function(){
				$(this).find('ul:first').stop(true, true).slideUp(200);
			});
		} else {
			menuItem.unbind('mouseenter mouseleave');
			siteNav.find( '.current-menu-ancestor > .dropdown-toggle, .current_page_ancestor > .dropdown-toggle' ).addClass( 'toggled-on' ).attr('aria-expanded', 'true');
		}
	}

} )( jQuery );
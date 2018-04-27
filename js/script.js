jQuery( function ( $ ) {
	'use strict';

	var iOS = false,
		ieMobile = false,
		isMac = false;

	function platformDetect() {
		ieMobile = ! ! navigator.userAgent.match( /Windows Phone/i );
		iOS = /iPad|iPhone|iPod/.test( navigator.userAgent ) && ! window.MSStream;
		isMac = navigator.platform.toUpperCase().indexOf( 'MAC' ) >= 0;
	}

	function isElementInViewport( el ) {
		//special bonus for those using jQuery
		if ( typeof jQuery === "function" && el instanceof jQuery ) {
			el = el[0];
		}

		var rect = el.getBoundingClientRect();

		return (
			rect.top >= 0 &&
			rect.left >= 0 &&
			rect.bottom <= (
			window.innerHeight || document.documentElement.clientHeight
			) &&
			rect.right <= (
			window.innerWidth || document.documentElement.clientWidth
			)
		);
	}

	/**
	 * Add toggle dropdown icon for sidebar menu.
	 * @param selector
	 */
	function toggleMenu( selector ) {
		// Add dropdown toggle icon that displays child menu items.
		var $icon = $( '<i class="dropdown-toggle fa fa-angle-right"></i>' ),
			clickEvent = 'ontouchstart' in window ? 'touchstart' : 'click',
			$container = $( selector );

		$container.find( '.menu-item-has-children > a' ).after( $icon );

		// Toggle buttons and sub menu items with active children menu items.
		$container.find( '.current-menu-ancestor > .sub-menu' ).siblings( 'i' ).addClass( 'is-open' );
		$container.on( clickEvent, '.dropdown-toggle', function ( e ) {
			e.preventDefault();
			var $this = $( this );
			$this.toggleClass( 'is-open' );
		} );
	}

	function slidingDoorForProjects() {
		if ( $( window ).width() < 992 ) {
			return;
		}
		$( '.services' )
			.on( 'click', '.service', function () {
				$( this ).removeClass( 'is-collapse' ).addClass( 'is-open' )
				         .siblings().removeClass( 'is-open' ).addClass( 'is-collapse' );
			} )
			.on( 'blur', function () {
				$( this ).find( '.service' ).removeClass( 'is-collapse is-open' );
			} );
	}

	function niceScrollInit() {
		// Don't run on touch devices
		if ( ( 'ontouchstart' in window ) || navigator.msMaxTouchPoints || window.DocumentTouch && document instanceof DocumentTouch ) {
			return;
		}
		// Don't run on Windows Phone, iOS, Mac
		if ( ieMobile || iOS || isMac ) {
			return;
		}

		var $window = $( window ),
			scrollTime = .6,
			scrollDistance = 300;

		$window.on( 'mousewheel DOMMouseScroll', function ( event ) {
			event.preventDefault();
			var delta = event.originalEvent.wheelDelta / 120 || - event.originalEvent.detail / 3,
				scrollTop = $window.scrollTop(),
				finalScroll = scrollTop - parseInt( delta * scrollDistance );

			TweenLite.to( $window, scrollTime, {
				scrollTo: {y: finalScroll, autoKill: true},
				ease: Power1.easeOut,
				overwrite: 5
			} );
		} );
	}

	// Animate tiled gallery.
	$( window ).scroll( function () {
		$( '.tiled-gallery-item:not(.animated)' ).each( function ( i, el ) {
			if ( isElementInViewport( el ) ) {
				$( el ).addClass( 'animated' );
			}
		} );
	} ).trigger( 'scroll' );


	// Hero slider
	if ( $().slick ) {
		var $slider = $( '#slider' );
		var $sliderSpeed = $slider.data( 'speed' );
		$slider.slick( {
			autoplay: true,
			arrows: true,
			dots: false,
			easing: 'ease',
			speed: $sliderSpeed,
			fade: true,
			adaptiveHeight: true,
			nextArrow: '<div class="slick-next"></div>',
			prevArrow: '<div class="slick-prev"></div>'
		} );
		if ( $sliderSpeed == 0 ) {
			$slider.slick( 'pause' );
			$slider.find( $( '.slick-arrow' ) ).hide();
		}
	}

	// Toggle primary menu
	if ( $( window ).width() < 1200 ) {
		toggleMenu( '#primary-menu' );
	}

	function hideMobileMenuOnDesktops() {
		$( window ).on( 'resize', function () {
			if ( $( window ).width() > 992 ) {
				$( '.main-navigation' ).removeClass( 'toggled' );
			}
		} )
	}

	// Toggle vertical menu
	toggleMenu( '#secondary .widget_nav_menu' );
	if ( $( window ).width() > 991 ) {
		slidingDoorForProjects();
	}
	platformDetect();
	hideMobileMenuOnDesktops();
	if ( smoothScroll.value ) {
		niceScrollInit();
	}
} );

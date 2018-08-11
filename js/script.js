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
		} );
	}

	// Toggle vertical menu
	toggleMenu( '#secondary .widget_nav_menu' );
	platformDetect();
	hideMobileMenuOnDesktops();
} );

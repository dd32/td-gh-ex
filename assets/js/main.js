/**
 * File main.js
 *
 */

/* Mobile Navigation */

( function( $ ) {

	var body, menuToggle, sidePanel, mobileNavigation;

	body               = $( 'body' );
	menuToggle         = $( '.menu-toggle' );
	sidePanel          = $( '.side-panel' );
	mobileNavigation   = $( '#mobile-navigation' );

	function initMainNavigation( container ) {

		// Add dropdown toggle that displays child menu items.
		var dropdownToggle = $( '<button />', {
			'class': 'dropdown-toggle',
			'aria-expanded': false
		} );

		container.find( '.menu-item-has-children > a' ).after( dropdownToggle );

		// Toggle buttons and submenu items with active children menu items.
		container.find( '.current-menu-ancestor > button' ).addClass( 'toggled-on' );
		container.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );

		// Add menu items with submenus to aria-haspopup="true".
		container.find( '.menu-item-has-children' ).attr( 'aria-haspopup', 'true' );

		container.find( '.dropdown-toggle' ).click( function( e ) {
			var _this            = $( this ),
				screenReaderSpan = _this.find( '.screen-reader-text' );

			e.preventDefault();
			_this.toggleClass( 'toggled-on' );
			_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );

			// jscs:disable
			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			// jscs:enable

		} );
	}
	initMainNavigation( $( '.mobile-navigation' ) );

	// Enable menuToggle.
	( function() {

		// Return early if menuToggle is missing.
		if ( ! menuToggle.length ) {
			return;
		}

		// Add an initial values for the attribute.
		menuToggle.add( mobileNavigation ).attr( 'aria-expanded', 'false' );

		menuToggle.on( 'click.type', function() {
			$( this ).add( sidePanel ).toggleClass( 'toggled-on' );
			body.toggleClass( 'side-panel-open' );
			$( this ).add( mobileNavigation ).attr( 'aria-expanded', 'true' );
		} );

	} )();

	// Close Side Panel.
	$( '#side-panel-close, #side-panel-overlay' ).on( 'click.type', function() {
		menuToggle.removeClass( 'toggled-on' );
		sidePanel.removeClass( 'toggled-on' );
		body.toggleClass( 'side-panel-open' );
		menuToggle.add( mobileNavigation ).attr( 'aria-expanded', 'false' );
	} );

	// Fix sub-menus for touch devices and better focus for hidden submenu items for accessibility.
	( function() {
		if ( ! mobileNavigation.length || ! mobileNavigation.children().length ) {
			return;
		}

		// Toggle 'focus' class to allow submenu access on tablets.
		function toggleFocusClassTouchScreen() {
			if ( window.innerWidth >= 960 ) {
				$( document.body ).on( 'touchstart.type', function( e ) {
					if ( ! $( e.target ).closest( '.mobile-navigation li' ).length ) {
						$( '.mobile-navigation li' ).removeClass( 'focus' );
					}
				} );
				mobileNavigation.find( '.menu-item-has-children > a' ).on( 'touchstart.type', function( e ) {
					var el = $( this ).parent( 'li' );

					if ( ! el.hasClass( 'focus' ) ) {
						e.preventDefault();
						el.toggleClass( 'focus' );
						el.siblings( '.focus' ).removeClass( 'focus' );
					}
				} );
			} else {
				mobileNavigation.find( '.menu-item-has-children > a' ).unbind( 'touchstart.type' );
			}
		}

		if ( 'ontouchstart' in window ) {
			$( window ).on( 'resize.type', toggleFocusClassTouchScreen );
			toggleFocusClassTouchScreen();
		}

		mobileNavigation.find( 'a' ).on( 'focus.type blur.type', function() {
			$( this ).parents( '.menu-item' ).toggleClass( 'focus' );
		} );
	} )();

	// Add the default ARIA attributes for the menu toggle and the navigations.
	function onResizeARIA() {
		if ( window.innerWidth < 960 ) {
			if ( menuToggle.hasClass( 'toggled-on' ) ) {
				menuToggle.attr( 'aria-expanded', 'true' );
			} else {
				menuToggle.attr( 'aria-expanded', 'false' );
			}

			if ( sidePanel.hasClass( 'toggled-on' ) ) {
				mobileNavigation.attr( 'aria-expanded', 'true' );
			} else {
				mobileNavigation.attr( 'aria-expanded', 'false' );
			}

			menuToggle.attr( 'aria-controls', 'site-navigation' );
		} else {
			menuToggle.removeAttr( 'aria-expanded' );
			mobileNavigation.removeAttr( 'aria-expanded' );
			menuToggle.removeAttr( 'aria-controls' );
		}
	}

	// Fixed Header on scroll
	if ( $( ".is-fixed" ).length ) {
		let didScroll      = false;
		const header       = $( '.is-fixed' );
		const logo         = $( '.site-logo' );
		const HeaderHeight = parseInt( $( '.site-header' ).outerHeight() );

		// Detect scroll event
		$( window ).on( 'scroll', function () {
			didScroll = true;
		});

		// Used for throttling to improve performance
		setInterval( function () {
			if ( didScroll ) {
				didScroll = false;

				if ( $(window).scrollTop() > HeaderHeight ) {
					header.addClass( 'fixed-header' );
					$('body').css( 'padding-top', 60 );
					//logo.attr( 'src', 'assets/images/logo-orange-text.png' );
				} else {
					header.removeClass( 'fixed-header' );
					$('body').css( 'padding-top', 0 );
					//logo.attr( 'src', 'assets/images/logo-white-text.png' );
				}
			}
		}, 100);
	}

} )( jQuery );


/* Search Icon Toggle effect */

jQuery(document).ready( function() {
	jQuery('.search-popup-button').click( function(){
		jQuery('.search-popup').toggleClass('active');
	});
});


/* Back to top */
jQuery(document).ready( function() {
	jQuery("#back-to-top").hide();
	jQuery(function () {
		jQuery(window).scroll(function () {
			if ( jQuery(this).scrollTop() > 768 ) {
				jQuery('#back-to-top').fadeIn();
			} else {
				jQuery('#back-to-top').fadeOut();
			}
		});
		jQuery('#back-to-top a').click( function () {
			var target = jQuery( 'html' );
			jQuery('body,html').animate( {
				scrollTop: target.offset().top
			}, 800);
			return false;
		});
	});
});

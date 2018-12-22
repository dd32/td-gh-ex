/* global bayleafScreenReaderText */
( function( $ ) {

var isIos          = /iPad|iPhone|iPod/.test( navigator.userAgent ) && ! window.MSStream,
	header         = $( '#masthead' ),
	body           = $( 'body' ),
	navWrapper     = header.find( '#site-navigation' ),
	mainMenu       = header.find( '#' + bayleafScreenReaderText.menu ),
	menuToggle     = header.find( '.menu-toggle' ),
	scrollDisabled = false,
	scrollTop;

if ( isIos ) {
	document.documentElement.classList.add( 'ios-device' );
}

function scrollDisable() {
	if ( scrollDisabled ) {
		return;
	}

    scrollTop = $( window ).scrollTop();
	body.addClass( 'no-scroll' ).css({
		top: -1 * scrollTop
	});

	scrollDisabled = true;
}

function scrollEnable() {
	if ( ! scrollDisabled ) {
		return;
	}

	body.removeClass( 'no-scroll' );
	$( window ).scrollTop( scrollTop );

	scrollDisabled = false;
}

// ObjectFit fallback.
( function() {
	var container, imageSource, i;
	if ( false === 'objectFit' in document.documentElement.style ) {
		container = document.querySelectorAll( '.entry-thumbnail, .gallery-icon a' );
		for ( i = 0; i < container.length; i++ ) {
			imageSource = container[i].querySelector( 'img' ).src;
			container[i].querySelector( 'img' ).style.visibility = 'hidden';
			container[i].style.backgroundSize = 'cover';
			container[i].style.backgroundImage = 'url(' + imageSource + ')';
			container[i].style.backgroundPosition = 'center center';
		}
	}
}() );

/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */

function skipLinkFocusFix() {
	var isIe = /(trident|msie)/i.test( navigator.userAgent );

	if ( isIe && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', focusFix );
	}

	function focusFix() {
		var id = location.hash.substring( 1 ),
			element;
		if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
			return;
		}
		element = document.getElementById( id );
		if ( element ) {
			if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
				element.tabIndex = -1;
			}
			element.focus();
		}
	}
}
skipLinkFocusFix();

/**
 * Toggle Primary menu on smaller screens.
 *
 * @since 1.0.0
 */
function toggleMenu() {

	menuToggle.click(
		function() {
			$( this ).toggleClass( 'toggled-btn' );
			$( this ).attr( 'aria-expanded', $( this ).hasClass( 'toggled-btn' ) );
			if ( menuToggle.hasClass( 'toggled-btn' ) ) {
				navWrapper.slideDown( 'slow' );
			} else {
				navWrapper.slideUp( 'slow' );
			}
		}
	);
}
toggleMenu();

/**
 * Toggle sub-menus of primary navigation.
 *
 * @since 1.0.0
 */
function toggleSubMenu() {
	var menuItems = mainMenu.find( '.menu-item-has-children, .page_item_has_children' );

	menuItems.hover(
		function() {
			$( this ).addClass( 'toggled-on' );
		},
		function() {
			$( this ).removeClass( 'toggled-on' );
		}
	);

	menuItems.find( 'a' ).on( 'focus.bayleaf blur.bayleaf', function() {
		$( this )
			.parents( '.menu-item, .page_item' )
			.toggleClass( 'toggled-on' );
	} );
}
toggleSubMenu();

/**
 * Drop down navigation menu on larger touch screens.
 *
 * @since 1.0.0
 */
function toggleMenuTouchScreen() {
	var menuItems  = mainMenu.find( '.menu-item-has-children, .page_item_has_children' ),
		parentLink = menuItems.children( 'a' );

	if ( menuToggle.is( ':hidden' ) ) {
		body.on( 'touchstart.bayleaf', function( e ) {
			if ( ! $( e.target ).closest( '#primary-menu' ) ) {
				menuItems.removeClass( 'toggled-on' );
			}
		} );
		parentLink.on( 'touchstart.bayleaf click.bayleaf', function( e ) {
			var el = $( this ).parent( 'li' );
			if ( ! el.hasClass( 'toggled-on' ) ) {
				e.preventDefault();
				el.addClass( 'toggled-on' );
				el.siblings( '.toggled-on' ).removeClass( 'toggled-on' );
			}
		} );
	} else {
		parentLink.unbind( 'touchstart.bayleaf' );
	}
}

/**
 * Toggle navigation menu on touchscreen.
 *
 * @since 1.0.0
 */
if ( 'ontouchstart' in window || navigator.maxTouchPoints ) {
	$( window ).on( 'resize.bayleaf', toggleMenuTouchScreen );
	toggleMenuTouchScreen();
}

/**
 * Make embedded videos responsive.
 *
 * Identify video iframes in main content and wrap them in a div containing 'video-container'
 * class. Now make it responsive using css.
 */

(function() {
	var wrapper, elem,
		main = document.getElementById( 'main' ),
		bin = main ? main.getElementsByClassName( 'entry-content' )[0] : null,
		selectors = [
			'iframe[src*="youtube.com"]',
			'iframe[src*="vimeo.com"]',
			'iframe[src*="dailymotion.com"]',
			'iframe[src*="videopress.com"]'
		],
		frames = bin ? bin.querySelectorAll( selectors.join( ',' ) ) : [],
		length = frames.length,
		i = 0;

	for ( ; i < length; i++ ) {
		elem = frames[i];
		wrapper = document.createElement( 'div' );
		wrapper.className = 'video-container';
		elem.parentNode.insertBefore( wrapper, elem );
		wrapper.appendChild( elem );
	}
}() );

/**
 * Toggle header widget area on click of a button.
 *
 * @since 1.0.0
 */
function headerWidgetToggle() {
	var actionButton = header.find( '.action-toggle' ),
		widgetArea   = header.find( '#header-widget-area' );
	actionButton.click(
		function() {
			if ( scrollDisabled ) {
				scrollEnable();
			} else {
				scrollDisable();
			}
			widgetArea.toggleClass( 'makeitvisible' );
			$( this ).toggleClass( 'toggled-btn' );

			if ( widgetArea.hasClass( 'makeitvisible' ) ) {
				widgetArea.fadeIn( 'slow' );
				$( this ).attr( 'aria-expanded', true );
			} else {
				widgetArea.fadeOut( 'slow' );
				$( this ).attr( 'aria-expanded', false );
			}
		}
	);
}
headerWidgetToggle();

/**
 * Toggle a class on scroll to display scroll button.
 *
 * @since 1.0.0
 */

function toggleScrollClass() {
	var scrlTotop,
		scroll = function( $scrollTop ) {
			if ( 300 < $scrollTop ) {
				scrlTotop.classList.add( 'makeitvisible' );
			} else {
				scrlTotop.classList.remove( 'makeitvisible' );
			}
		},
		raf = window.requestAnimationFrame ||
		window.webkitRequestAnimationFrame ||
		window.mozRequestAnimationFrame ||
		window.msRequestAnimationFrame ||
		window.oRequestAnimationFrame,
		lastScrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;

	scrlTotop = document.getElementsByClassName( 'scrl-to-top' );
	if ( ! scrlTotop.length ) {
		return;
	}
	scrlTotop = scrlTotop[0];
	if ( raf ) {
		loop();
	}

	function loop() {
		var scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
		if ( lastScrollTop === scrollTop ) {
			raf( loop );
			return;
		} else {
			lastScrollTop = scrollTop;

			// Fire scroll function if scrolls vertically
			scroll( lastScrollTop );
			raf( loop );
		}
	}
}
toggleScrollClass();

function scrollToTop() {
	var scrlTotop;
	scrlTotop = document.getElementsByClassName( 'scrl-to-top' );
	if ( ! scrlTotop.length ) {
		return;
	}
	scrlTotop = scrlTotop[0];
	scrlTotop.addEventListener( 'click', function() {
		$( 'html, body' ).animate({ scrollTop: 0 }, 'slow' );
	} );
}
scrollToTop();

/**
 * Toggle a class on scroll to display scroll button.
 *
 * @since 1.0.0
 */

function fadeInScroll() {
	var raf = window.requestAnimationFrame ||
		window.webkitRequestAnimationFrame ||
		window.mozRequestAnimationFrame ||
		window.msRequestAnimationFrame ||
		window.oRequestAnimationFrame;

	if ( raf ) {
		loop();
	}

	function loop() {
		var object = $( '.brick' );

		// Loop through each object in the array.
		$.each( object, function() {

			var windowHeight = $( window ).height(),
				offset = $( this ).offset().top,
				top = offset - $( document ).scrollTop(),
				percent = Math.floor( top / windowHeight * 100 );

			if ( percent < 90 ) {
				$( this ).addClass( 'fadeInUp' );
			}

		});

		raf( loop );
	}
}
fadeInScroll();

} )( jQuery );

/* global aamlaScreenReaderText */
( function() {

var aamla = {},
	isIos = /iPad|iPhone|iPod/.test( navigator.userAgent ) && ! window.MSStream;
if ( isIos ) {
	document.documentElement.classList.add( 'ios-device' );
}

aamla = {
	aniScrollLeft: function( element, to, duration ) {
		var start = element.scrollLeft,
			change = to - start,
			currentTime = 0,
			increment = 20,
			val;

		var animateScroll = function() {
			currentTime += increment;
			val = aamla.easeInOutQuad( currentTime, start, change, duration );
			element.scrollLeft = val;
			if ( currentTime < duration ) {
				setTimeout( animateScroll, increment );
			}
		};
		animateScroll();
	},

	//T = current time
	//b = start value
	//c = change in value
	//d = duration
	easeInOutQuad: function( t, b, c, d ) {
		t /= d / 2;
		if ( t < 1 ) {
			return c / 2 * t * t + b;
		}
		t--;
		return -c / 2 * ( t * ( t - 2 ) - 1 ) + b;
	}
};

if ( ! Element.prototype.matches ) {
	Element.prototype.matches = Element.prototype.msMatchesSelector || Element.prototype.webkitMatchesSelector;
}

if ( ! Element.prototype.closest ) {
	Element.prototype.closest = function( s ) {
		var el = this;
		if ( ! document.documentElement.contains( el ) ) {
			return null;
		}
		do {
			if ( el.matches( s ) ) {
				return el;
			}
			el = el.parentElement || el.parentNode;
		} while ( null !== el && 1 === el.nodeType );
		return null;
	};
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
 * Mobile navigation menu
 *
 * This script serve two purposes, first, display sub-menus on clicking on their respective
 * parent menu-item and second, support nav-menu scrolling on smaller screens. This way we
 * never have to completely hide our primary navigation behind a hamburger button.
 */

( function() {
	var left, right, length, i,
		menu = document.getElementById( aamlaScreenReaderText.menu ),
		bin = menu ? menu.parentNode : null,
		nav = bin ? bin.parentNode : null,
		buttonLeft = nav ? nav.getElementsByClassName( 'scroll-btn-Left' )[0] : null,
		buttonRight = nav ? nav.getElementsByClassName( 'scroll-btn-Right' )[0] : null,
		selectors = [
			'.menu-item-has-children > a',
			'.page_item_has_children > a'
		],
		links = menu ? menu.querySelectorAll( selectors.join( ',' ) ) : [],
		isMenuOpen = false,
		timer = null;

	if ( null === menu ) {
		return;
	}

	for ( i = 0, length = links.length; i < length; ++i ) {
		links[i].parentNode.setAttribute( 'aria-expanded', false );
		links[i].addEventListener( 'click', toggleMenu, false );
		links[i].addEventListener( 'keypress', toggleMenu, false );
	}

	document.documentElement.addEventListener( 'click', collapseMenu, false );

	bin.addEventListener( 'scroll', menuScroll, false );

	window.addEventListener( 'resize', function() {
		clearTimeout( timer );
		timer = setTimeout( isMenuScrollable, 100 );
	}, false );

	buttonLeft.addEventListener( 'click', function() {
		aamla.aniScrollLeft( bin, bin.scrollLeft - 150, 300 );
	}, false );
	buttonRight.addEventListener( 'click', function() {
		aamla.aniScrollLeft( bin, bin.scrollLeft + 150, 300 );
	}, false );

	function toggleMenu( e ) {
		var item = this.parentNode,
			siblings = item.parentNode.children,
			child = item.getElementsByTagName( 'ul' )[0],
			childitems = child.children;

		if ( 'click' === e.type || ( 'keypress' === e.type && '13' === e.which ) ) {
			e.preventDefault();
			for ( i = 0, length = siblings.length; i < length; ++i ) {
				if ( item === siblings[i] ) {
					continue;
				}
				siblings[i].classList.remove( 'toggled-on' );
				siblings[i].setAttribute( 'aria-expanded', false );
			}
			for ( i = 0, length = childitems.length; i < length; ++i ) {
				childitems[i].classList.remove( 'toggled-on' );
				childitems[i].setAttribute( 'aria-expanded', false );
			}
			item.classList.toggle( 'toggled-on' );
			isMenuOpen = item.classList.contains( 'toggled-on' );
			item.setAttribute( 'aria-expanded', isMenuOpen );
		}
	}

	function collapseMenu( e ) {
		var toggledItems;
		if ( isMenuOpen && ! e.target.closest( '#primary-menu' ) ) {
			toggledItems = menu.getElementsByClassName( 'toggled-on' );
			while ( toggledItems.length > 0 ) {
				toggledItems[0].setAttribute( 'aria-expanded', false );
				toggledItems[0].classList.remove( 'toggled-on' );
			}
			isMenuOpen = false;
		}
	}

	function isMenuScrollable() {
		var metrics = bin.getBoundingClientRect();
		left  = Math.floor( metrics.left );
		right = Math.floor( metrics.right );
		menuScroll();
	}
	isMenuScrollable();

	function menuScroll() {
		window.requestAnimationFrame(function() {
			bin.setAttribute( 'data-overflowing', (function() {
				var cmetrics = menu.getBoundingClientRect(),
					cleft = Math.floor( cmetrics.left ),
					cright = Math.floor( cmetrics.right );
				if ( left > cleft && right < cright ) {
					return 'both';
				} else if ( cleft < left ) {
					return 'left';
				} else if ( cright > right ) {
					return 'right';
				} else {
					return 'none';
				}
			}() ) );
		});
	}
}() );

// Funtion name needs to be changed.
function mediaToggle() {
	var open, close,
		elems = document.getElementsByClassName( 'entry-featured-media' ),
		length = elems.length,
		i = 0;

	for ( ; i < length; ++i ) {
		open = elems[i].parentElement.getElementsByClassName( 'post-permalink' )[0];
		if ( undefined === open ) {
			continue;
		}

		close = elems[i].getElementsByClassName( 'close-media' )[0];

		open.addEventListener( 'click', function( e ) {
			e.preventDefault();
			e.stopPropagation();
			this.classList.add( 'makeitvisible' );
		}.bind( elems[i] ), false );
		close.addEventListener( 'click', function() {
			var videoWrapper, videoFrame, video, videoFrameSrc;
			this.classList.remove( 'makeitvisible' );
			videoWrapper = this.getElementsByClassName( 'entry-video' )[0];
			if ( videoWrapper ) {
				videoFrame = videoWrapper.getElementsByTagName( 'iframe' )[0];
				video = videoFrame.getElementsByTagName( 'video' )[0];
				if ( videoFrame ) {
					videoFrameSrc = videoFrame.src;
					videoFrame.src = videoFrameSrc;
				}
				if ( video ) {
					video.pause();
				}
			}
		}.bind( elems[i] ), false );
	}
}
mediaToggle();

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

function headerWidgetToggle() {
	var elem = document.getElementById( 'header-widget-area' ),
		toggle = elem ? elem.parentElement.getElementsByClassName( 'action-toggle' )[0] : null;
	if ( toggle ) {
		toggle.addEventListener( 'click', function( e ) {
			elem.classList.toggle( 'makeitvisible' );
			toggle.classList.toggle( 'toggled-btn' );
			toggle.setAttribute( 'aria-expanded', elem.classList.contains( 'makeitvisible' ) );
		}, false );
		document.documentElement.addEventListener( 'click', function( e ) {
			if ( ! e.target.closest( '#header-widget-area' ) && ! e.target.closest( '.action-toggle' ) ) {
				elem.classList.remove( 'makeitvisible' );
				toggle.classList.remove( 'toggled-btn' );
				toggle.setAttribute( 'aria-expanded', false );
			}
		}, false );
	}
}
headerWidgetToggle();

} )();

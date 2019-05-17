/* global aamlaScreenReaderText */
( function() {

var aamla = {},
	isIos = /iPad|iPhone|iPod/.test( navigator.userAgent ) && ! window.MSStream;
if ( isIos ) {
	document.documentElement.classList.add( 'ios-device' );
}

aamla = {
	bodyScrollDisabled: false,
	scrollingElem: document.scrollingElement || document.documentElement || document.body,
	scrollPosition: 0,
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

	aniScrollTop: function( element, to, duration ) {
		var start = element.scrollTop,
			change = to - start,
			currentTime = 0,
			increment = 20,
			val;

		var animateScroll = function() {
			currentTime += increment;
			val = aamla.easeInOutQuad( currentTime, start, change, duration );
			element.scrollTop = val;
			if ( currentTime < duration ) {
				setTimeout( animateScroll, increment );
			}
		};
		animateScroll();
	},

	scrollDisable: function() {

		// Return if scroll is already disabled.
		if ( aamla.bodyScrollDisabled ) {
			return;
		}

		aamla.scrollPosition = aamla.scrollingElem.scrollTop;
		aamla.scrollingElem.classList.add( 'no-scroll' );
		aamla.scrollingElem.scrollTop = 0;
		aamla.bodyScrollDisabled = true;
	},

	scrollEnable: function() {

		// Return if scroll is already Enabled.
		if ( ! aamla.bodyScrollDisabled ) {
			return;
		}

		aamla.scrollingElem.classList.remove( 'no-scroll' );
		aamla.scrollingElem.scrollTop = aamla.scrollPosition;
		aamla.bodyScrollDisabled = false;
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

function headerWidgetToggle() {
	var elem = document.getElementById( 'header-widget-area' ),
		toggle = elem ? elem.parentElement.getElementsByClassName( 'action-toggle' )[0] : null;
	if ( toggle ) {
		toggle.addEventListener( 'click', function( e ) {
			elem.classList.toggle( 'makeitvisible' );
			toggle.classList.toggle( 'toggled-btn' );
			toggle.setAttribute( 'aria-expanded', elem.classList.contains( 'makeitvisible' ) );
			if ( elem.classList.contains( 'makeitvisible' ) ) {
				aamla.scrollDisable();
			} else {
				aamla.scrollEnable();
			}
		}, false );
	}
}
headerWidgetToggle();

function contactToggle() {
	var wrapper = document.getElementsByClassName( 'contact-information' ),
		elem, toggle;

	if ( ! wrapper.length ) {
		return;
	}

	elem = wrapper[0].getElementsByClassName( 'contact-wrapper' );
	toggle = wrapper[0].getElementsByClassName( 'contact-toggle' );

	if ( elem.length && toggle.length ) {
		toggle[0].addEventListener( 'click', function() {
			elem[0].classList.toggle( 'makeitvisible' );
			toggle.classList.toggle( 'toggled-btn' );
			toggle.setAttribute( 'aria-expanded', elem.classList.contains( 'makeitvisible' ) );
		});
	}
}
contactToggle();

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
		aamla.aniScrollTop( document.scrollingElement || document.documentElement || document.body, 0, 300 );
	} );
}
scrollToTop();

/**
 * Handle toggling media on archive pages.
 */
function aamlaMediaManager() {
	var open, close,
		elems = document.getElementsByClassName( 'entry-featured-media' ),
		length = elems.length,
		i = 0;

	for ( ; i < length; ++i ) {
		open = elems[i].parentElement.getElementsByClassName( 'post-permalink' )[0];
		if ( undefined === open ) {
			continue;
		}

		open.addEventListener( 'click', function( e ) {
			e.preventDefault();
			e.stopPropagation();
			aamla.scrollDisable();
			toggleMedia.bind( this )();
		}.bind( elems[i] ), false );

		close = elems[i].getElementsByClassName( 'close-media' )[0];
		close.addEventListener( 'click', function() {
			console.log( this );
			aamla.scrollEnable();
			toggleMedia.bind( this )();
		}.bind( elems[i] ), false );
	}

	function toggleMedia() {
		var modal, video, audioWrapper, audioFrame, audio, src, thumb, bg,
			videoSelectors = [
				'iframe[data-src*="youtube.com"]',
				'iframe[data-src*="vimeo.com"]',
				'iframe[data-src*="dailymotion.com"]',
				'iframe[data-src*="videopress.com"]',
				'video'
			];

		this.classList.toggle( 'makeitvisible' );

		modal = this.getElementsByClassName( 'entry-video' )[0];
		if ( modal ) {
			video = modal.querySelector( videoSelectors.join( ',' ) );

			if ( this.classList.contains( 'makeitvisible' ) ) {

				// If an HTML5 video, play it.
				if ( 'video' === video && video.tagName.toLowerCase() ) {
					video.play();
					return;
				}

				// Create ifrmae src attribute from data-src attribute.
				if ( video && ! video.src ) {
					src = video.getAttribute( 'data-src' );

					// Remove any autoplay instructions already present in dataset.
					src = src.replace( '&autoplay=1', '' ).replace( '?autoplay=1', '' ).replace( '&autoplay=0', '' ).replace( '?autoplay=0', '' ).replace( '?autoPlay=1', '' ).replace( '&autoPlay=1', '' );

					// Create video src attribute.
					video.src = src ? src + ( src.indexOf( '?' ) < 0 ? '?' : '&' ) + 'autoplay=1' : '';
					return;
				} else if ( video ) {

					// Add autoplay instruction to src attribute.
					video.src = video.src + ( video.src.indexOf( '?' ) < 0 ? '?' : '&' ) + 'autoplay=1';
					return;
				}

				// Let's check if modal have other iframe videos.
				video = modal.getElementsByTagName( 'iframe' )[0];
				if ( video && ! video.hasAttribute( 'src' ) ) {
					src = video.getAttribute( 'data-src' );
					if ( src ) {
						video.setAttribute( 'src', src );
					}
				}
			} else {

				// If an HTML5 video, pause it
				if ( 'video' === video && video.tagName.toLowerCase() ) {
					video.pause();
					return;
				}

				// Remove autoplay from video src
				if ( video ) {
					video.src = video.src.replace( '&autoplay=1', '' ).replace( '?autoplay=1', '' );
					return;
				}

				video = modal.getElementsByTagName( 'iframe' )[0];
				src = video.getAttribute( 'src' );
				if ( src ) {
					video.setAttribute( 'src', src );
				}
			}
			return;
		}

		audioWrapper = this.getElementsByClassName( 'entry-audio' )[0];
		if ( audioWrapper ) {
			if ( ! audioWrapper.classList.contains( 'bg-img' ) ) {
				thumb = this.parentNode.getElementsByClassName( 'entry-thumbnail' )[0] || this.parentNode.getElementsByClassName( 'dp-thumbnail' )[0];
				bg = thumb ? thumb.getElementsByTagName( 'img' )[0].src : false;
				if ( bg ) {
					audioWrapper.style.backgroundSize = 'cover';
					audioWrapper.style.backgroundImage = 'url(' + bg + ')';
					audioWrapper.style.backgroundPosition = 'center center';
					audioWrapper.classList.add( 'bg-img' );
				}
			}
			if ( ! this.classList.contains( 'makeitvisible' ) ) {
				audio = audioWrapper.getElementsByTagName( 'audio' )[0];
				if ( audio ) {
					audio.pause();
				}
			}
			return;
		}

		audioWrapper = this.getElementsByClassName( 'entry-iaudio' )[0];
		if ( audioWrapper ) {
			audioFrame = audioWrapper.getElementsByTagName( 'iframe' )[0];
			if ( audioFrame ) {
				if ( this.classList.contains( 'makeitvisible' ) ) {
					if ( ! audioFrame.hasAttribute( 'src' ) ) {
						src = audioFrame.getAttribute( 'data-src' );
						if ( src ) {
							audioFrame.setAttribute( 'src', src );
						}
					}
				} else {
					src = audioFrame.getAttribute( 'src' );
					if ( src ) {
						audioFrame.setAttribute( 'src', src );
					}
				}
				return;
			}
		}

		if ( this.classList.contains( 'makeitvisible' ) ) {
			return;
		}

		audioWrapper = this.getElementsByClassName( 'entry-playlist' )[0];
		if ( audioWrapper ) {
			audio = audioWrapper.getElementsByTagName( 'audio' )[0];
			if ( audio ) {
				audio.pause();
			}
			return;
		}
	}
}
window.onload = aamlaMediaManager;

} )();

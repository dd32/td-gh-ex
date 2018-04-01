/* global aamlaScreenReaderText */
( function() {


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
 * Handle toggling of menu and submenus on mobile and tablets.
 */

function navMenu() {
	var menu = document.getElementById( aamlaScreenReaderText.menu ),
		isMenuOpen = false,
		menuContainer,
		parentLink,
		i;

	if ( null === menu ) {
		return;
	}

	menuContainer = menu.parentNode;
	parentLink = menu.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

	for ( i = 0; i < parentLink.length; ++i ) {
		parentLink[i].addEventListener( 'touchend', toggleMenu, false );
		parentLink[i].addEventListener( 'click', toggleMenu, false );
		parentLink[i].addEventListener( 'keypress', toggleMenu, false );
	}
	document.documentElement.addEventListener( 'click', collapseMenu, false );
	menuContainer.addEventListener( 'scroll', menuScroll, false );
	window.addEventListener( 'resize', menuScroll, false );

	function toggleMenu( e ) {
		var menuItem = this.parentNode,
			childMenu = menuItem.getElementsByTagName( 'ul' )[0];

		if ( 'click' === e.type || 'touchend' === e.type || ( 'keypress' === e.type && '13' === e.which ) ) {
			e.preventDefault();
			e.stopPropagation();
			for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
				if ( menuItem === menuItem.parentNode.children[i] ) {
					continue;
				}
				menuItem.parentNode.children[i].classList.remove( 'toggled-on' );
			}
			for ( i = 0; i < childMenu.children.length; ++i ) {
				childMenu.children[i].classList.remove( 'toggled-on' );
			}
			menuItem.classList.toggle( 'toggled-on' );
			isMenuOpen = menuItem.classList.contains( 'toggled-on' ) || menuItem.parentNode.parentNode.classList.contains( 'toggled-on' );
		}
	}

	function collapseMenu( e ) {
		if ( isMenuOpen ) {
			for ( i = 0; i < parentLink.length; ++i ) {
				parentLink[i].parentNode.classList.remove( 'toggled-on' );
			}
			isMenuOpen = false;
		}
	}

	function menuScroll() {
		var ticking = false,
			lastKnownScrollPosition = window.scrollY;
		if ( ! ticking ) {
			window.requestAnimationFrame(function() {
				OverflowAttr( lastKnownScrollPosition );
				ticking = false;
			});
		}
		ticking = true;
	}
	menuScroll();

	function OverflowAttr( scrollPos ) {
		menuContainer.setAttribute( 'data-overflowing', determineOverflow( menu, menuContainer ) );
	}

	function determineOverflow( content, container ) {
		var containerMetrics = container.getBoundingClientRect();
		var containerMetricsRight = Math.floor( containerMetrics.right );
		var containerMetricsLeft = Math.floor( containerMetrics.left );
		var contentMetrics = content.getBoundingClientRect();
		var contentMetricsRight = Math.floor( contentMetrics.right );
		var contentMetricsLeft = Math.floor( contentMetrics.left );
		if ( containerMetricsLeft > contentMetricsLeft && containerMetricsRight < contentMetricsRight ) {
			return 'both';
		} else if ( contentMetricsLeft < containerMetricsLeft ) {
			return 'left';
		} else if ( contentMetricsRight > containerMetricsRight ) {
			return 'right';
		} else {
			return 'none';
		}
	}
}
navMenu();

} )();

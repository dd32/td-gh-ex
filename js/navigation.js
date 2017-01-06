/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	var container, button, menu, links, subMenus, i, len;
	var containerT, buttonT, menuT, linksT, subMenusT, iT, lenT;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}
	
	containerT = document.getElementById( 'top-nav' );
	if ( ! containerT ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}
	
	buttonT = containerT.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof buttonT ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];
	
	menuT = containerT.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}
	
	if ( 'undefined' === typeof menuT ) {
		buttonT.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}
	
	menuT.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menuT.className.indexOf( 'menu' ) ) {
		menuT.className += ' menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};
	
	buttonT.onclick = function() {
		if ( -1 !== containerT.className.indexOf( 'toggled' ) ) {
			containerT.className = containerT.className.replace( ' toggled', '' );
			buttonT.setAttribute( 'aria-expanded', 'false' );
			menuT.setAttribute( 'aria-expanded', 'false' );
		} else {
			containerT.className += ' toggled';
			buttonT.setAttribute( 'aria-expanded', 'true' );
			menuT.setAttribute( 'aria-expanded', 'true' );
		}
	};

	// Get all the link elements within the menu.
	links    = menu.getElementsByTagName( 'a' );
	subMenus = menu.getElementsByTagName( 'ul' );

	// Set menu items with submenus to aria-haspopup="true".
	for ( i = 0, len = subMenus.length; i < len; i++ ) {
		subMenus[i].parentNode.setAttribute( 'aria-haspopup', 'true' );
	}

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}
} )();

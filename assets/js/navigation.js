/**
 * Handles toggling the navigation menu for small screens and
 * accessibility for submenu items.
 * - top navigation
 */
( function() {
	var nav = document.getElementById( 'top-navigation' ), button, menu;
	if( ! nav ) {
		return;
	}
	
	button = nav.getElementsByTagName( 'button' )[0];
	menu   = nav.getElementsByTagName( 'ul' )[0];
	if( !button ) {
		return;
	}
	
	// Hide button if menu is missing or empty.
	if( ! menu || ! menu.childNodes.lenght ) {
		button.style.display = 'none';
		return;
	}
	
	button.onclick = function() {
		jQuery('.top-nav-menu').slideToggle();
	}
	
} )();

/**
 * Handles toggling the navigation menu for small screens and
 * accessibility for submenu items.
 * - primary navigation
 */
( function() {
	var nav = document.getElementById( 'site-navigation' ), button, menu;
	if ( ! nav ) {
		return;
	}

	button = nav.getElementsByTagName( 'button' )[0];
	menu   = nav.getElementsByTagName( 'ul' )[0];
	if ( ! button ) {
		return;
	}

	// Hide button if menu is missing or empty.
	if ( ! menu || ! menu.childNodes.length ) {
		button.style.display = 'none';
		return;
	}
	
	button.onclick = function() {
		jQuery('.nav-menu').slideToggle();
	};
	
} )();

jQuery(document).ready(function(){
	jQuery('.nav-menu, .top-nav-menu').superfish();
});

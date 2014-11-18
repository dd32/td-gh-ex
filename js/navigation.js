/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
( function() {
	var container, container_top, button, button_top, menu;

	container = document.getElementById( 'site-navigation' );
	if ( ! container )
		return;
		
	container_top = document.getElementById( 'top-nav' );
	if ( ! container )
		return;
		
	button_top = container_top.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button_top )
		return;
		
	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button )
		return;
	
	menu_top = container_top.getElementsByTagName( 'ul' )[0];
	menu = container.getElementsByTagName( 'ul' )[0];
	

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu_top ) {
		button_top.style.display = 'none';
		return;
	}
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}
	
	if ( -1 === menu_top.className.indexOf( 'nav-menu' ) )
		menu_top.className += ' nav-menu';

	if ( -1 === menu.className.indexOf( 'nav-menu' ) )
		menu.className += ' nav-menu';
		
	button_top.onclick = function() {
		if ( -1 !== container_top.className.indexOf( 'toggled' ) )
			container_top.className = container_top.className.replace( ' toggled', '' );
		else
			container_top.className += ' toggled';
	};

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) )
			container.className = container.className.replace( ' toggled', '' );
		else
			container.className += ' toggled';
	};
} )();

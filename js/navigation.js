/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
jQuery( function() {
		// Search toggle.
		jQuery( '.search-toggle' ).on( 'click', function( event ) {
			var that    = jQuery( this ),
				wrapper = jQuery( '#search-box' );
			that.toggleClass( 'active' );
			wrapper.toggleClass( 'hide' );
			if ( that.is( '.active' ) || jQuery( '.search-toggle' )[0] === event.target ) {
				wrapper.find( '.s' ).focus();
			}
		} );
		// Enable menu toggle for small screens.
		( function() {
			var nav = jQuery( '.main-navigation' ), button, menu;
			if ( ! nav ) {
				return;
			}
			button = nav.find( '.menu-toggle' );
			if ( ! button ) {
				return;
			}
			// Hide button if menu is missing or empty.
			menu = nav.find( '.nav-menu' );
			if ( ! menu || ! menu.children().length ) {
				button.hide();
				return;
			}
			jQuery( '.menu-toggle' ).on( 'click', function() {
				nav.toggleClass( 'toggled' );
			} );
		} )();
} );

/*
( function() {
	var container, button, menu;

	container = document.getElementById( 'site-navigation' );
	if ( ! container )
		return;

	button = container.getElementsByTagName( 'h1' )[0];
	if ( 'undefined' === typeof button )
		return;

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	if ( -1 === menu.className.indexOf( 'nav-menu' ) )
		menu.className += ' nav-menu';

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) )
			container.className = container.className.replace( ' toggled', '' );
		else
			container.className += ' toggled';
	};
} )();
*/

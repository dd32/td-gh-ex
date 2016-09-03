jQuery( document ).ready( function( $ ) {    
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
			menu = nav.find( '.menu' );
			if ( ! menu || ! menu.children().length ) {
				button.hide();
				return;
			}
			jQuery( '.menu-toggle' ).on( 'click', function() {
				nav.toggleClass( 'toggled' );
			} );
		} )();
} );

( function() {
	var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
	    is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
	    is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

	if ( ( is_webkit || is_opera || is_ie ) && 'undefined' !== typeof( document.getElementById ) ) {
		var eventMethod = ( window.addEventListener ) ? 'addEventListener' : 'attachEvent';
		window[ eventMethod ]( 'hashchange', function() {
			var element = document.getElementById( location.hash.substring( 1 ) );

			if ( element ) {
				if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) )
					element.tabIndex = -1;

				element.focus();
			}
		}, false );
	}
})();
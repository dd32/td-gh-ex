( function( window, $, undefined ) {
	'use strict';

	$( '.site-branding' ).after( '<a class="menu-toggle primary-toggle" role="button" aria-pressed="false"></a>' ); // Add toggle to primary menu
	$( 'nav .sub-menu' ).before( '<span class="sub-menu-toggle" role="button" aria-pressed="false"></span>' ); // Add toggles to all sub menus

	// Show/hide the navigation
	$( '.menu-toggle, .sub-menu-toggle' ).on( 'click', function() {
		var $this = $( this );
		$this.attr( 'aria-pressed', function( index, value ) {
			return 'false' === value ? 'true' : 'false';
		});

		$this.toggleClass( 'activated' );
		$this.next( 'nav, .sub-menu' ).toggleClass( 'activated' );
		$this.next( 'nav, .sub-menu' ).slide( 'slow' );

	});

})( this, jQuery );

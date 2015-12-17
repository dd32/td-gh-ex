/**
 * Live-update changed settings in real time in the Customizer preview.
 */

( function( $ ) {
	// Update the blog name
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newval ) {
			$( '.site-title a' ).text( newval );
		} );
	} );
	
	// Update the blog description.
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( newval ) {
			$( '.site-description' ).text( newval );
		} );
	} );				
	
	//Update copyright text
	var themeBy = $( '.site-footer' ).html();
	wp.customize( 'aesblo_customizer[copyright]', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.site-footer' ).addClass( 'has-copyright' ).html( '<div class="copyright">' + newval + '</div>' + themeBy );
			} else {
				$( '.site-footer' ).removeClass( 'has-copyright' ).find( '.copyright' ).remove();
			}
		} );
	} );
		
} )( jQuery );

/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
    
    // Header style
    wp.customize( 'basic-shop[site_title_color]', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).css( 'color', to );
		} );
	} );
    wp.customize( 'basic-shop[tagline_color]', function( value ) {
		value.bind( function( to ) {
			$( 'p.site-description' ).css( 'color', to );
		} );
	} );
//end
} )( jQuery );
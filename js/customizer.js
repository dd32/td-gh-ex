/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	var api = wp.customize;
	// Site title and description.
	api( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	api( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	

	// add class layout for to body.
	api( 'site_layout', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).find( '.site_layout' ).

			removeClass('fluid box_wbb full' ).
			addClass(to );
		} );
	} );

} )( jQuery );

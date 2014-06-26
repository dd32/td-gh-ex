/**
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

	// Footer copyright name.
	wp.customize( 'copy_name', function( value ) {
		value.bind( function( to ) {
			$( '#footer-copy-name' ).text( to );
		} );
	} );

	// Figure/Ground script settings. For each option, reset the animation on change for immediate feedback.
	wp.customize( 'fg_type', function( value ) {
		value.bind( function( to ) {
			window.fg.settings.type = to;
			window.fg.clearCanvas();
			window.fg.init();
			$( 'body' ).toggleClass( 'circular' );
		} );
	} );

	wp.customize( 'fg_max_width', function( value ) {
		value.bind( function( to ) {
			window.fg.settings.maxw = to;
			window.fg.settings.maxr = ( 2 * to / 3 );
			window.fg.clearCanvas();
			window.fg.init();
		} );
	} );

	wp.customize( 'fg_max_height', function( value ) {
		value.bind( function( to ) {
			window.fg.settings.maxh = to;
			window.fg.clearCanvas();
			window.fg.init();
		} );
	} );

	wp.customize( 'fg_speed', function( value ) {
		value.bind( function( to ) {
			window.fg.settings.delay = to;
			window.fg.clearCanvas();
			window.fg.init();
		} );
	} );

	wp.customize( 'fg_initial', function( value ) {
		value.bind( function( to ) {
			window.fg.settings.initial = to;
			window.fg.clearCanvas();
			window.fg.init();
		} );
	} );

} )( jQuery );

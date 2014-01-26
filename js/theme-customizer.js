/*
 Theme Customizer live preview v1.0 | @agareginyan | GPL v3 Licensed

 This file adds some LIVE to the Theme Customizer live preview. To leverage
 this, set your custom settings to 'postMessage' and then add your handling
 here. Your javascript should grab settings from customizer controls, and 
 then make any necessary changes to the page using jQuery.
*/

( function( $ ) {

  // Title & Description
	// Update the site title in real time...
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newval ) {
			$( '.site-title' ).html( newval );
		} );
	} );
	
	// Update the site description in real time...
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( newval ) {
			$( '.site-description' ).html( newval );
		} );
	} );


  // Title & Description & Background Color
	// Update site Title color in real time...
	wp.customize( 'title_color', function( value ) {
		value.bind( function( newval ) {
			$('.site-title').css('color', newval );
		} );
	} );

        // Update site Description color in real time...
        wp.customize( 'tagline_color', function( value ) {
                value.bind( function( newval ) {
                        $('.site-description').css('color', newval );
                } );
        } );

	// Update site Background color...
	wp.customize( 'background_color', function( value ) {
		value.bind( function( newval ) {
			$('body').css('background-color', newval );
		} );
	} );

} )( jQuery );

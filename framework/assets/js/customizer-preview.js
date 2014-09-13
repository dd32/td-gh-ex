/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. This javascript will grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
 
( function( $ ) {
		
	//LIVE HTML
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newval ) {
			$( '.logo-text' ).html( newval );
		} );
	} );
	
    wp.customize( 'img-upload-logo-width', function( value ) {
		value.bind( function( newval ) {
			$( '.logo-uploaded' ).css('width',  newval + 'px' );
		} );
	} );
    
    wp.customize('type_logo_size', function( value ) {
		value.bind( function( newval ) {
			$( '.logo-text' ).css('font-size',  newval + 'px' );
		} );
	} );
    
    wp.customize('type_logo_lineheight', function( value ) {
		value.bind( function( newval ) {
			$( '.logo-text' ).css('line-height',  newval + 'px' );
		} );
	} );
		
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( newval ) {
			$( '.site-description' ).html( newval );
		} );
	} );

	wp.customize( 'footer_copyright', function( value ) {
		value.bind( function( newval ) {
			$( '.copyright' ).html( newval );
		} );
	} );
	
	wp.customize( 'footer_alt_text', function( value ) {
		value.bind( function( newval ) {
			$( '.alt-text p' ).html( newval );
		} );
	} );
    
	//LIVE CSS
	wp.customize( 'thumb_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('.isotope-item .post-thumb').css('background-color', newval );
		} );
	} );

} )( jQuery );

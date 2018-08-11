/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $, customize ) {
	'use strict';

	// List of text elements that have postMessage transport.
	var texts = {
		blogname: '.site-title a',
		blogdescription: '.site-description',
		front_page_contact_title: '.contact-info__title',
		front_page_contact_info: '.contact-info__details',
		cta_text: '.section--cta__text',
		cta_link_text: '.section--cta__link a',
	};

	// Live update the text elements.
	$.each( texts, function ( setting, selector ) {
		customize( setting, function ( value ) {
			value.bind( function ( to ) {
				$( selector ).text( to );
			} );
		} );
	} );

	// Live update HTML content for Contact info details.
	customize( 'front_page_cta', function ( value ) {
		value.bind( function ( to ) {
			$( '.contact-info__details' ).html( to );
		} );
	} );

	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
			}
			$( '.page-header .entry-title, .page-header a' ).css( {
				color: to
			} );
		} );
	} );

} )( jQuery, wp.customize );

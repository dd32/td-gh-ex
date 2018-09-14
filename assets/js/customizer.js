/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

/* global AtlanticCustomizerl10n */
( function( $, api ) {

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

	// Header text color.
	api( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// Post Meta
	api( 'post_date', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.entry-meta .posted-on' ).css( {
					'display': 'inline-block'
				} );
			} else {
				$( '.entry-meta .posted-on' ).css( {
					'display': 'none'
				} );
			}
		} );
	} );

	api( 'post_author', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.entry-meta .byline' ).css( {
					'display': 'inline-block'
				} );
			} else {
				$( '.entry-meta .byline' ).css( {
					'display': 'none'
				} );
			}
		} );
	} );

	api( 'post_cat', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.entry-footer .cat-links' ).css( {
					'display': 'inline-block'
				} );
			} else {
				$( '.entry-footer .cat-links' ).css( {
					'display': 'none'
				} );
			}
		} );
	} );

	api( 'post_tag', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.entry-footer .tags-links' ).css( {
					'display': 'inline-block'
				} );
			} else {
				$( '.entry-footer .tags-links' ).css( {
					'display': 'none'
				} );
			}
		} );
	} );

	api( 'post_comments', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.entry-footer .comments-link' ).css( {
					'display': 'inline-block'
				} );
			} else {
				$( '.entry-footer .comments-link' ).css( {
					'display': 'none'
				} );
			}
		} );
	} );

	api( 'author_display', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.author-info' ).css( {
					'display': 'inline-block'
				} );
			} else {
				$( '.author-info' ).css( {
					'display': 'none'
				} );
			}
		} );
	} );

	api( 'theme_designer', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.site-designer' ).css( {
					'display': 'block'
				} );
			} else {
				$( '.site-designer' ).css( {
					'display': 'none'
				} );
			}
		} );
	} );

	api( 'return_top', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.return-to-top' ).css( {
					'display': 'block'
				} );
			} else {
				$( '.return-to-top' ).css( {
					'display': 'none'
				} );
			}
		} );
	} );

	api( 'primary_text_color', function( value ){
		value.bind( function( to ) {
			$( '#primary-text-color' ).text(
				AtlanticCustomizerl10n.primary_text_color_background + '{background-color:'+ to +'}' +
				AtlanticCustomizerl10n.primary_text_color_border + '{border-color:'+ to +'}' +
				AtlanticCustomizerl10n.primary_text_color + '{color:'+ to +'}' +
				'@media (min-width: 768px){ .main-navigation ul.menu a{ color: '+ to +' } }' +
				'@media (min-width: 768px){ .main-navigation ul.menu > .menu-item:before{ background-color: '+ to +' } }');
		} );
	} );

	api( 'secondary_text_color', function( value ){
		value.bind( function( to ) {
			$( '#secondary-text-color' ).text(
				AtlanticCustomizerl10n.secondary_text_color_background + '{background-color:'+ to +'}' +
				AtlanticCustomizerl10n.secondary_text_color_border + '{border-color:'+ to +'}' +
				AtlanticCustomizerl10n.secondary_text_color + '{color:'+ to +'}' );
		} );
	} );

	api( 'primary_color', function( value ){
		value.bind( function( to ) {
			$( '#primary-color' ).text(
				AtlanticCustomizerl10n.primary_color_background + '{background-color:'+ to +'}' +
				AtlanticCustomizerl10n.primary_color_border + '{border-color:'+ to +'}' +
				AtlanticCustomizerl10n.primary_color_text + '{color:'+ to +'}' );
		} );
	} );

	api( 'secondary_color', function( value ){
		value.bind( function( to ) {
			$( '#secondary-color' ).text(
				AtlanticCustomizerl10n.secondary_color_background + '{background-color:'+ to +'}' +
				AtlanticCustomizerl10n.secondary_color_border + '{border-color:'+ to +'}' +
				AtlanticCustomizerl10n.secondary_color_text + '{color:'+ to +'}' );
		} );
	} );

	api( 'price_color', function( value ){
		value.bind( function( to ) {
			$( '#price-color' ).text(
				AtlanticCustomizerl10n.price_color + '{color:'+ to +'}' );
		} );
	} );

	api( 'sale_color', function( value ){
		value.bind( function( to ) {
			$( '#sale-color' ).text(
				AtlanticCustomizerl10n.sale_color + '{background-color:'+ to +'}' );
		} );
	} );

	api( 'stars_color', function( value ){
		value.bind( function( to ) {
			$( '#stars-color' ).text(
				AtlanticCustomizerl10n.stars_color + '{color:'+ to +'}' );
		} );
	} );

} )( jQuery, wp.customize );

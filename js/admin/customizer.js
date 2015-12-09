/**
 * customizer.js
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
	// Header text color.
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
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
} )( jQuery );

/**
 * Upsell notice for theme
 */
( function( $ ) {
 // Add Upgrade Message
 if ('undefined' !== typeof prefixL10n) {
 upsell = $('<a class="prefix-upsell-link"></a>')
 .attr('href', prefixL10n.prefixURL)
 .attr('target', '_blank')
 .text(prefixL10n.prefixLabel)
 .css({
 'display' 					: 'table',
 'background-color' : '#fc535f',
 'color' 						: '#fff',
 'text-transform' 	: 'uppercase',
 'margin-top' 			: '6px',
 'padding' 					: '2px 6px',
 'font-size'				: '9px',
 'letter-spacing'		: '1.5px',
 'line-height'			: '1.5',
 'clear' 						: 'both'
 })
 ;
 setTimeout(function () {
 $('.panel-title').append(upsell);
 $('.customize-section-title h3').append(upsell);
 // $('.control-panel-content .panel-title').append(upsell);
 }, 200);
 // Remove accordion click event
 $('.prefix-upsell-link').on('click', function(e) {
 e.stopPropagation();
 });
 }
} )( jQuery );

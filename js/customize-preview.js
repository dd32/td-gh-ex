/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function($) {
	// Header text color.
	wp.customize('header_textcolor', function(value) {
		value.bind(function(to) {
			if ('blank' === to) {
				$('.site-title a, .site-description').css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$('.site-title a, .site-description').css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$('.site-title a, .site-description').css( {
					'color': to
				} );
			}
		} );
	} );
    
	// Custom Header Background Color
	wp.customize('header_color', function(value) {
		value.bind(function(to) {
			$('.site-header').css( {
				'background-color': to 
			});
		} );
	} );
    
	// Custom Layout Options
	wp.customize('post_layout', function(value) {
		value.bind(function(to) {
			$( '#general-layout' ).removeClass( 'sidebar-left sidebar-right full-width' );
			$( '#general-layout' ).addClass( to );
		} );
	} );
} )( jQuery );
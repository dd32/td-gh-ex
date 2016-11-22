/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function($) {
	// Update the site title in real time...
	wp.customize('blogname', function(value) {
		value.bind(function(newVal) {
			$('.site-title a').html(newVal);
		} );
	} );
	
	// Update the site description in real time...
	wp.customize('blogdescription', function(value) {
		value.bind(function(newVal) {
			$('.site-description').html(newVal);
		});
	});
    
	// Header text color.
	wp.customize('header_textcolor', function(value) {
		value.bind(function(newVal) {
			if ('blank' === newVal) {
				$('.site-title a, .site-description').css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				});
			} else {
				$('.site-title a, .site-description').css( {
					'clip': 'auto',
					'position': 'relative'
				});
				$('.site-title a, .site-description').css( {
					'color': newVal
				});
			}
		});
	});
    
	// Custom Header Background Color
	wp.customize('header_color', function(value) {
		value.bind(function(newVal) {
			$('.site-header').css( {
				'background': newVal 
			});
		});
	});
    
	// Custom Header Background Color
	wp.customize('body_text_color', function(value) {
		value.bind(function(newVal) {
			$('body').css( {
				'color': newVal 
			});
		});
	});
} )( jQuery );
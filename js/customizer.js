/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */


(function($) {
	
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '#text-title-desc' ).css({
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute'
				});
				// Add class for different logo styles if title and description are hidden.
				$( 'body' ).addClass( 'title-tagline-hidden' );
			} else {
				
				$( '#text-title-desc' ).css({
					clip: 'auto',
					position: 'relative'
				});
				$( '.site-branding a' ).css({
					color: to
				});
				// Add class for different logo styles if title and description are visible.
				$( 'body' ).removeClass( 'title-tagline-hidden' );
			}
		});
	});
	
	wp.customize( 'adviso_header_desccolor', function( value ) {
	    value.bind( function ( to ) {
		    jQuery('h2.site-description').css('color', to );
	    });
    });
    
    wp.customize( 'adviso_top_bar_color', function( value ) {
	    value.bind( function ( to ) {
		    jQuery('body.home ul.menu > li:not(.current-menu-item):not(.current_page_item):not(.current_page_ancestor) > a, body.home #adviso-search #search-icon, body.home #contact-info, #top-cart, #top-cart a').css('color', to );
	    });
    });
})(jQuery);
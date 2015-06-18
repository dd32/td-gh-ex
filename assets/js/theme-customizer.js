/**
 * Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Customizer preview reload changes asynchronously.
 * Things like site title, description, and background color changes.
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

	// Header text color
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-title a, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );

	// Hook into background color/image change and adjust body class value as needed.
	wp.customize( 'background_color', function( value ) {
		value.bind( function( to ) {
			var body = $( 'body' );

			if ( ( '#ffffff' == to || '#fff' == to ) && 'none' == body.css( 'background-image' ) )
				body.addClass( 'custom-background-white' );
			else if ( '' == to && 'none' == body.css( 'background-image' ) )
				body.addClass( 'custom-background-empty' );
			else
				body.removeClass( 'custom-background-empty custom-background-white' );
		} );
	} );
	wp.customize( 'background_image', function( value ) {
		value.bind( function( to ) {
			var body = $( 'body' );

			if ( '' !== to ) {
				body.removeClass( 'custom-background-empty custom-background-white' );
			} else if ( 'rgb(255, 255, 255)' === body.css( 'background-color' ) ) {
				body.addClass( 'custom-background-white' );
			} else if ( 'rgb(230, 230, 230)' === body.css( 'background-color' ) && '' === wp.customize.instance( 'background_color' ).get() ) {
				body.addClass( 'custom-background-empty' );
			}
		} );
	} );
	
	// Header top border size
	wp.customize( 'header_top_border_size', function( value ) {
		value.bind( function( to ) {
			var site = $('#main-wrapper');
			site.css( 'border-top-width', to );
		} );
	} );
	
	// Header top border color
	wp.customize( 'agama_primary_color', function( value ) {
		value.bind( function( to ) {
			var site = jQuery('#main-wrapper');
			site.css( 'border-top-color', to );
		} );
	} );
	
	// Header top margin
	wp.customize( 'header_top_margin', function( value ) {
		value.bind( function( to ) {
			var header = jQuery('#main-wrapper');
			if( '' !== to ) {
				header.css( 'margin-top', to );
			}
		} );
	} );
	
	// Agama primary color
	wp.customize( 'agama_primary_color', function( value ) {
		value.bind( function( to ) {
			var custom_css = jQuery('#agama-customize-css');
			if( '' !== to ) {
				jQuery('.entry-date .date-box').css('background-color', to);
				jQuery('.entry-date .format-box i').css('color', to);
			}			
		} );
	} );
	
	// Agama skin
	wp.customize( 'agama_skin', function( value ) {
		value.bind( function( to ) {
			var skin = jQuery('#agama-customize-css');
			if( '' !== to ) {
				skin.prepend( 'import url('+ agama.skin_url + to +'.css);' );
			}
		} );
		
	// Disable top navigation
	wp.customize( 'agama_top_navigation', function( value ) {
		top_nav = jQuery('.top-navigation');
	
		if(  1 == agama.top_nav_enable ) {
			top_nav.show();
		} else {
			top_nav.hide();
		}
		
		value.bind( function( to ) {
			if( false == to ) {
				top_nav.hide();
			} else {
				top_nav.show();
			}
		} );
	});
	
	} );
} )( jQuery );

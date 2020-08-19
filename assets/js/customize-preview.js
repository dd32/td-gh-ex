/**
 * Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Customizer preview reload changes asynchronously.
 * Things like site title, description, and background color changes.
 */

( function( $ ) {
    
    // Site Title
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
    
    // Site Description
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
    
    // Body background colors.
    wp.customize( 'agama_body_background_colors', function( value ) {
        value.bind( function( color ) {
            $('body').css({
                'background': 'linear-gradient(to right, '
                    .concat( color.left ).concat( ' 0, ' )
                    .concat( color.right ).concat( ' 100%)' )
            });
        } );
    } );
    
    // Navigation top colors.
    wp.customize( 'agama_navigation_top_links_color', function( value ) {
        value.bind( function( color ) {
            if ( color.normal ) {
                $('#agama-top-nav a').css( 'color', color.normal );
            }
            if ( color.visited ) {
                $('#agama-top-nav a:visited').css( 'color', color.visited );
            }
            if ( color.hover ) {
                $('#agama-top-nav a:hover').css( 'color', color.hover );
            }
            if ( color.active ) {
                $('#agama-top-nav a:active').css( 'color', color.active );
            }
        } );
    } );
    
    // Navigation primary colors.
    wp.customize( 'agama_navigation_primary_links_color', function( value ) {
        value.bind( function( color ) {
            if ( color.normal ) {
                $('#agama-primary-nav a').css( 'color', color.normal );
            }
            if ( color.visited ) {
                $('#agama-primary-nav a:visited').css( 'color', color.visited );
            }
            if ( color.hover ) {
                $('#agama-primary-nav a:hover').css( 'color', color.hover );
            }
            if ( color.active ) {
                $('#agama-primary-nav a:active').css( 'color', color.active );
            }
        } );
    } );
    
    // Navigation mobile colors.
    wp.customize( 'agama_navigation_mobile_links_color', function( value ) {
        value.bind( function( color ) {
            if ( color.normal ) {
                $('#agama-mobile-nav a').css( 'color', color.normal );
            }
            if ( color.visited ) {
                $('#agama-mobile-nav a:visited').css( 'color', color.visited );
            }
            if ( color.hover ) {
                $('#agama-mobile-nav a:hover').css( 'color', color.hover );
            }
            if ( color.active ) {
                $('#agama-mobile-nav a:active').css( 'color', color.active );
            }
        } );
    } );
    
    // Header image background overlay.
    wp.customize( 'agama_header_image_background', function( value ) {
        value.bind( function( color ) {
            var header_image = wp.customize.get().header_image;
            $('#agama-header-image .header-image').css({
                'background': 'linear-gradient(to right, '
                    .concat( color.left ).concat( ' 0, ' )
                    .concat( color.right ).concat( ' 100%), url('+ header_image +')' )
            });
        } );
    } );
    
    // Layout Style
    wp.customize( 'agama_layout_style', function( value ) {
        value.bind( function( to ) {
            if( 'fullwidth' === to ) {
                $('#agama-main-wrapper').removeClass( 'tv-container tv-p-0' ).addClass( 'is-full-width' );
            } else if( 'boxed' === to ) {
                $('#agama-main-wrapper').removeClass( 'is-full-width' ).addClass( 'tv-container tv-p-0' );
            }
        } );
    } );
    
    // Footer widgets background colors.
    wp.customize( 'agama_footer_widgets_background_colors', function( value ) {
        value.bind( function( color ) {
            $('.footer-widgets').css({
                'background': 'linear-gradient(to right, '
                    .concat( color.left ).concat( ' 0, ' )
                    .concat( color.right ).concat( ' 100%)' )
            });
        } );
    } );
    
    // Footer background colors.
    wp.customize( 'agama_footer_background_colors', function( value ) {
        value.bind( function( color ) {
            $('#agama-footer').css({
                'background': 'linear-gradient(to right, '
                    .concat( color.left ).concat( ' 0, ' )
                    .concat( color.right ).concat( ' 100%)' )
            });
        } );
    } );
})( jQuery );

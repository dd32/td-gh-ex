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

	

	/*
    Shop Options
    =====================================================
    */
	//Shop Layout
	wp.customize( 'absolutte_shop_layout', function( value ) {
		value.bind( function( to ) {
			if ( 'masonry' == to ) {
				$container_isotope.isotope( args_isotope );
			}else{
				$container_isotope.isotope('destroy');
			}
		} );
	} );

	//Shop Columns
	wp.customize( 'absolutte_shop_columns', function( value ) {
		value.bind( function( to ) {
			$( '.products' ).removeClass( 'layout-4-columns layout-2-columns layout-3-columns' );
			$( '.products' ).addClass( 'layout-' + to + '-columns' );
			setTimeout(function(){ $container_isotope.isotope('layout'); }, 301);


		} );
	} );


	
	/*
    Site
    =====================================================
    */
    //Background Color
	wp.customize( 'absolutte_site_background_color', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( {
					'background-color': to
			} );
		} );
	} );


	/*
    Header Options
    =====================================================
    */
	//Header Layout
	wp.customize( 'absolutte_header_layout', function( value ) {
		value.bind( function( to ) {
			var selected_header = to.replace("header-", '');
			$('#header').removeClass('absolutte-header-style-1 absolutte-header-style-2 absolutte-header-style-3 absolutte-header-style-4 absolutte-header-style-5 absolutte-header-style-6 absolutte-header-style-7 absolutte-header-style-8 absolutte-header-style-9');
			$('#header').addClass('absolutte-header-style-' + selected_header);
		} );
	} );

	//Header Position
	wp.customize( 'absolutte_header_position', function( value ) {
		value.bind( function( to ) {
			if ( 'header-side' == to ) {
				$('body').removeClass('absolutte-header-side-small absolutte-header-top');
				$('body').addClass('absolutte-header-side-small');
			}else{
				$('body').removeClass('absolutte-header-side-small absolutte-header-top');
				$('body').addClass('absolutte-header-top');
			}
		} );
	} );

	//Header Absolutte
	wp.customize( 'absolutte_header_absolute', function( value ) {
		value.bind( function( to ) {
			if ( to ) {
				$('body').addClass('absolutte-header-absolute');
			}else{
				$('body').removeClass('absolutte-header-absolute');
			}
		} );
	} );

	/*
    Footer Options
    =====================================================
    */
	wp.customize( 'absolutte_footer_up_btn', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$('.absolutte-up-button').css('display', 'block');
			}else{
				$('.absolutte-up-button').css('display', 'none');
			}
		} );
	} );

	//Footer Layout
	wp.customize( 'absolutte_footer_layout', function( value ) {
		value.bind( function( to ) {
			var selected_footer = to.replace("footer-", '');
			$('.sub-footer').removeClass('absolutte-sub-footer-style-1 absolutte-sub-footer-style-2 absolutte-sub-footer-style-3');
			$('.sub-footer').addClass('absolutte-sub-footer-style-' + selected_footer);
		} );
	} );






} )( jQuery );

function hexToRgb(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;
}
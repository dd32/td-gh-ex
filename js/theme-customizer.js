
/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */

( function( $ ) {  

	wp.customize( 'ct_acool[heading_font]', function( value ) {
		value.bind( function( newval ) {
			$('.ct_site_tagline').css('font-family', newval );
			$('.ct_site_name').css('font-family', newval );
			
		} );
	} );

	wp.customize( 'ct_acool[menu_font]', function( value ) {
		value.bind( function( newval ) {
			$('#ct-top-navigation nav#top-menu-nav ul li a,#ct_mobile_nav_menu ul li a').css('font-family', newval );
		} );
	} );

	wp.customize( 'ct_acool[title_font]', function( value ) {
		value.bind( function( newval ) {
			$('h1, h2, h3, h4, h5, h6,.case-tx0,.case-tx1,h1 a, h2 a, h3 a, h4 a, h5 a, h6 a,.footer-widget .ioftsc-lt span').css('font-family', newval );
		} );
	} );


	wp.customize( 'ct_acool[body_font]', function( value ) {
		value.bind( function( newval ) {
			$('html, body, div, span, applet, object, iframe, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, font, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td ').css('font-family', newval );
		} );
	} );



    //Update header background color in real time...
    wp.customize( 'ct_acool[header_bgcolor]', function( value ) {
		
        value.bind( function( newval ) {			
            $('.site-header').css('background-color', newval );			
            $('.ct_header_class').css('border-bottom-color', newval );			
			
        } );
    } );
	

/*
	wp.customize( 'ct_acool[color_schemes]', function( value ) {
		value.bind( function( to ) {
			var $body = $( 'body' ),
				body_classes = $body.attr( 'class' ),
				et_customizer_color_scheme_prefix = 'ct_color_scheme_',
				body_class;

			body_class = body_classes.replace( /ct_color_scheme_[^\s]+/, '' );
			$body.attr( 'class', $.trim( body_class ) );

			if ( 'none' !== to  )
			{				
				$body.addClass( et_customizer_color_scheme_prefix + to );				
			}
		} );
	} );
*/

	wp.customize( 'ct_acool[show_search_icon]', function( value ) {
		value.bind( function( to ) {
			var $search = $('#ct_top_search');

			if ( to ) {
				$search.show();
			} else {
				$search.hide();
			}
		} );
	} );

	
	wp.customize( 'ct_acool[box_header_center]', function( value ) {
		value.bind( function( to ) {
			var $header_box = $('.header_box');

			if ( to ) {
				$('#ct-top-navigation').css('margin-left','0' );
				$('.ct_logo').css('padding-left','20px' );					
				$header_box.addClass( 'container' );

			} else {
				$('#ct-top-navigation').css('margin-left','40px' );
				$('.ct_logo').css('padding-left','56px' );				
				$header_box.removeClass( 'container' );		
			}
		} );
	} );	
	
	
//#ct-top-navigation{ margin:15px 0 0 0;}.ct_logo{ padding-left:20px;}

/*	
    wp.customize( 'ct_acool[add_custom_css]', function( value ) {		
        value.bind( function( newval ) {
					
		
		
        } );
    } );

	*/
	
} )( jQuery );






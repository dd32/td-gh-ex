/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
(function ($) {
	// Site title and description.
	wp.customize('blogname', function (value) {
		value.bind( function (to) {
			$('.site-title a').text( to );
		} );
	} );
	wp.customize('blogdescription', function (value) {
		value.bind(function(to) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize('header_textcolor', function (value) {
		value.bind( function(to){
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
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );
	//Update Secondary Background Color
	wp.customize( 'bellini_accent_color', function( value ) {
		value.bind( function( newval ) {
			$('.post-meta__tag__item a').css('background-color', newval );
		} );
	} );
	//Update Secondary Color
	wp.customize( 'bellini_accent_color', function( value ) {
		value.bind( function( newval ) {
			$('.post-meta__category a,.comment-reply-link,.comment__author,.breadcrumb_last').css('color', newval );
		} );
	} );
	//Widget Background Color
	wp.customize( 'widgets_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.widget').css('background-color', newval );
		} );
	} );
	// Footer Background Color
	wp.customize( 'footer_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.site-footer').css('background-color', newval );
		} );
	} );
	// Footer Background Color
	wp.customize( 'button_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.button--secondary').css('background-color', newval );
		} );
	} );
	// Site Body Text Color
	wp.customize( 'body_text_color', function( value ) {
		value.bind( function( newval ) {
			$('body').css('color', newval );
		} );
	} );
	// Title Text Color
	wp.customize( 'title_text_color', function( value ) {
		value.bind( function( newval ) {
			$('.element-title').css('color', newval );
		} );
	} );
	// Menu Text Color
	wp.customize( 'menu_text_color', function( value ) {
		value.bind( function( newval ) {
			$('.menu-item a').css('color', newval );
		} );
	} );
	// Button Text Color
	wp.customize( 'button_text_color', function( value ) {
		value.bind( function( newval ) {
			$('.button--secondary a').css('color', newval );
		} );
	} );
	// Link Text Color
	wp.customize( 'link_text_color', function( value ) {
		value.bind( function( newval ) {
			$('a').css('color', newval );
		} );
	} );
	// Link Hover Color
	wp.customize( 'link_hover_color', function( value ) {
		value.bind( function( newval ) {
			$('a:hover').css('color', newval );
		} );
	} );
	// Page Title Position
	wp.customize( 'page_title_position', function( value ) {
		value.bind( function( newval ) {
			$('.single-page__title').css('text-align', newval );
		} );
	} );
	// Menu Position
	wp.customize( 'bellini_menu_position', function( value ) {
		value.bind( function( newval ) {
			$('.nav-menu').css('text-align', newval );
		} );
	} );
	// Body Font Size
	wp.customize( 'bellini_body_font_size', function( value ) {
		value.bind( function( newval ) {
			$('body').css('font-size', newval );
		} );
	} );
	// Title Font Size
	wp.customize( 'bellini_title_font_size', function( value ) {
		value.bind( function( newval ) {
			$('.element-title--post,.element-title--main,.single-page__title,.single-post__title').css('font-size', newval );
		} );
	} );
	// Menu Font Size
	wp.customize( 'bellini_menu_font_size', function( value ) {
		value.bind( function( newval ) {
			$('.menu-item a,.page-numbers a,.page-numbers span').css('font-size', newval );
		} );
	} );
/*
*
#######################           Layout & Positioning              ####################
*
*/
	 // Website Width
     wp.customize( 'bellini_website_width', function( value ) {
        value.bind( function( to ) {
            $( '.website-width' ).css( 'width', to + '%' );
        } );
    });
/*
*
#######################           FRONT PAGE SECTION                ####################
*
*/
	// Front Page Category Background Color
	wp.customize( 'woo_category_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.front-product-category').css('background-color', newval );
		} );
	} );
	// Front Page Product Background Color
	wp.customize( 'woo_product_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.front-new-arrival').css('background-color', newval );
		} );
	} );
	// Front Page Featured Product Background Color
	wp.customize( 'woo_featured_product_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.front__product-featured').css('background-color', newval );
		} );
	} );
	// Front Page Blog Section Background Color
	wp.customize( 'bellini_blogposts_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.front-blog').css('background-color', newval );
		} );
	} );
	// Slider CTA 1
	wp.customize( 'bellini_static_slider_button_background_one', function( value ) {
		value.bind( function( newval ) {
			$('.slider__cta--one').css('background-color', newval );
		} );
	} );
	// Slider CTA 2
	wp.customize( 'bellini_static_slider_button_background_two', function( value ) {
		value.bind( function( newval ) {
			$('.slider__cta--two').css('background-color', newval );
		} );
	} );
} )( jQuery );
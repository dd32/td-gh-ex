/**
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */


/**
 * Dynamic Internal/Embedded Style for a Control
 */
function arrival_store_add_dynamic_css( control, style ) {
	control = control.replace( '[', '-' );
	control = control.replace( ']', '' );
	jQuery( 'style#' + control ).remove();

	jQuery( 'head' ).append(
		'<style id="' + control + '">' + style + '</style>'
	);
}

(function ($) {

	wp.customize('arrival_top_header_txt', function (value) {
			value.bind(function (to) {
				$('.top-header-wrapp .text-wrap').text(to);
			});
		});

	wp.customize('arrival_store_middle_header_phone', function (value) {
			value.bind(function (to) {
				$('.after-top-header-wrapp .phone-wrapp .phone').text(to);
			});
		});


	//top header bg
	wp.customize( 'arrival_store_top_header_bg', function( value ) {
		value.bind( function( color ) {
			if (color == '') {
				wp.customize.preview.send( 'refresh' );
			}
			if ( color ) {
				var dynamicStyle = '.arrival-store-main .top-header-wrapp { background: ' + color + '; } ';
				arrival_store_add_dynamic_css( 'arrival_store_top_header_bg', dynamicStyle );
			}

		} );
	} );


	wp.customize( 'arrival_store_top_header_text_color', function( value ) {
		value.bind( function( color ) {
			if (color == '') {
				wp.customize.preview.send( 'refresh' );
			}
			if ( color ) {
				var dynamicStyle = '.top-header-wrapp .text-wrap,.top-right-wrapp ul.arrival-top-navigation li a { color: ' + color + '; } ';
				arrival_store_add_dynamic_css( 'arrival_store_top_header_text_color', dynamicStyle );
			}

		} );
	} );


	wp.customize( 'arrival_store_middle_header_bg', function( value ) {
		value.bind( function( color ) {
			if (color == '') {
				wp.customize.preview.send( 'refresh' );
			}
			if ( color ) {
				var dynamicStyle = '.arrival-store-main .after-top-header-wrapp { background: ' + color + '; } ';
				arrival_store_add_dynamic_css( 'arrival_store_middle_header_bg', dynamicStyle );
			}

		} );
	} );


	wp.customize( 'arrival_store_middle_header_text', function( value ) {
		value.bind( function( color ) {
			if (color == '') {
				wp.customize.preview.send( 'refresh' );
			}
			if ( color ) {
				var dynamicStyle = '.after-top-header-wrapp { color: ' + color + '; } ';
				arrival_store_add_dynamic_css( 'arrival_store_middle_header_text', dynamicStyle );
			}

		} );
	} );

	wp.customize( 'arrival_store_main_header_bg', function( value ) {
		value.bind( function( color ) {
			if (color == '') {
				wp.customize.preview.send( 'refresh' );
			}
			if ( color ) {
				var dynamicStyle = '.main-header-wrapp.boxed .container, .main-header-wrapp.full { background: ' + color + '; } ';
				arrival_store_add_dynamic_css( 'arrival_store_main_header_bg', dynamicStyle );
			}

		} );
	} );


	wp.customize( 'arrival_store_main_header_text', function( value ) {
		value.bind( function( color ) {
			if (color == '') {
				wp.customize.preview.send( 'refresh' );
			}
			if ( color ) {
				var dynamicStyle = '.main-header-wrapp.boxed .container, .main-header-wrapp.full,.main-header-wrapp .container .main-navigation .primary-menu-container>ul>li>a,.arrival-custom-element ul li a { color: ' + color + '; } ';
				 	dynamicStyle += '.main-navigation .dropdown-symbol, .arrival-top-navigation .dropdown-symbol {border-color:' +color+';}';
				 	dynamicStyle += '.main-header-wrapp .browse-category-wrap .browse-category svg {fill:' +color+';}';
				arrival_store_add_dynamic_css( 'arrival_store_main_header_text', dynamicStyle );
			}

		} );
	} );




})(jQuery);

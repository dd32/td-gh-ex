/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

/**
 * Dynamic Internal/Embedded Style for a Control
 */
function arrival_add_dynamic_css( control, style ) {
	control = control.replace( '[', '-' );
	control = control.replace( ']', '' );
	jQuery( 'style#' + control ).remove();

	jQuery( 'head' ).append(
		'<style id="' + control + '">' + style + '</style>'
	);
}


(function ($) {

	// Site title and description.
	wp.customize('blogname', function (value) {
		value.bind(function (to) {
			$('.site-title a').text(to);
		});
	});
	wp.customize('blogdescription', function (value) {
		value.bind(function (to) {
			$('.site-description').text(to);
		});
	});

	// Header text color.
	wp.customize('header_textcolor', function (value) {
		value.bind(function (to) {
			if ('blank' === to) {
				$('.site-title, .site-description').css({
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				});
			} else {
				$('.site-title, .site-description').css({
					'clip': 'auto',
					'position': 'relative'
				});
				$('.site-title a, .site-description').css({
					'color': to
				});
			}
		});
	});

//top header bg color
wp.customize( 'arrival_top_header_bg_color', function( value ) {
	value.bind( function( color ) {
		if (color == '') {
			wp.customize.preview.send( 'refresh' );
		}
		if ( color ) {
			var dynamicStyle = '.top-header-wrapp { background: ' + color + '; } ';
			arrival_add_dynamic_css( 'arrival_top_header_bg_color', dynamicStyle );
		}

	} );
} );

//top header text colors
wp.customize( 'arrival_top_header_txt_color', function( value ) {
	value.bind( function( color ) {
		if (color == '') {
			wp.customize.preview.send( 'refresh' );
		}
		if ( color ) {
			var dynamicStyle = '.top-header-wrapp a, .top-header-wrapp { color: ' + color + '; } ';
				dynamicStyle += '.top-header-wrapp .phone-wrap:before{ background: '+ color + '; } ';
			arrival_add_dynamic_css( 'arrival_top_header_txt_color', dynamicStyle );
		}

	} );
} );

//main nav bg color
wp.customize( 'arrival_main_nav_bg_color', function( value ) {
	value.bind( function( color ) {
		if (color == '') {
			wp.customize.preview.send( 'refresh' );
		}
		if ( color ) {
			var dynamicStyle = '.main-header-wrapp.boxed .container, .main-header-wrapp.full { background: ' + color + '; } ';
			arrival_add_dynamic_css( 'arrival_main_nav_bg_color', dynamicStyle );
		}

	} );
} );


//menu link color
wp.customize( 'arrival_main_nav_menu_color', function( value ) {
	value.bind( function( color ) {
		if (color == '') {
			wp.customize.preview.send( 'refresh' );
		}
		if ( color ) {
			var dynamicStyle = '.main-navigation ul li > a { color: ' + color + '; } ';
				dynamicStyle += '.main-navigation .dropdown-symbol, .arrival-top-navigation .dropdown-symbol{ border-color:'+color+';}';
			arrival_add_dynamic_css( 'arrival_main_nav_menu_color', dynamicStyle );
		}

	} );
} );

//menu color:hover
wp.customize( 'arrival_main_nav_menu_color_hover', function( value ) {
	value.bind( function( color ) {
		if (color == '') {
			wp.customize.preview.send( 'refresh' );
		}
		if ( color ) {
			var dynamicStyle = '.main-navigation ul li a:hover { color: ' + color + '; } ';
				dynamicStyle += '.main-navigation .dropdown-symbol:hover, .arrival-top-navigation .dropdown-symbol:hover{ border-color:'+color+';}';
			arrival_add_dynamic_css( 'arrival_main_nav_menu_color_hover', dynamicStyle );
		}

	} );
} );

/**
* navigation padding
*
*/

//top padding
wp.customize( 'arrival_nav_top_padding', function( value ) {
	value.bind( function( color ) {
		if (color == '') {
			wp.customize.preview.send( 'refresh' );
		}
		if ( color ) {
			var dynamicStyle = '.main-header-wrapp.boxed .container, .main-header-wrapp.full { padding-top: ' + color + 'px; } ';
			arrival_add_dynamic_css( 'arrival_nav_top_padding', dynamicStyle );
		}

	} );
} );

//bottom padding
wp.customize( 'arrival_nav_bottom_padding', function( value ) {
	value.bind( function( color ) {
		if (color == '') {
			wp.customize.preview.send( 'refresh' );
		}
		if ( color ) {
			var dynamicStyle = '.main-header-wrapp.boxed .container, .main-header-wrapp.full{ padding-bottom: ' + color + 'px; } ';
			arrival_add_dynamic_css( 'arrival_nav_bottom_padding', dynamicStyle );
		}

	} );
} );


//footer background color
wp.customize( 'arrival_footer_bg_color', function( value ) {
	value.bind( function( color ) {
		if (color == '') {
			wp.customize.preview.send( 'refresh' );
		}
		if ( color ) {
			var dynamicStyle = '.site-footer { background: ' + color + '; } ';
			arrival_add_dynamic_css( 'arrival_footer_bg_color', dynamicStyle );
		}

	} );
} );

//footer text color
wp.customize( 'arrival_footer_text_color', function( value ) {
	value.bind( function( color ) {
		if (color == '') {
			wp.customize.preview.send( 'refresh' );
		}
		if ( color ) {
			var dynamicStyle = '.site-footer h2.widget-title,.site-footer { color: ' + color + '; } ';
			arrival_add_dynamic_css( 'arrival_footer_text_color', dynamicStyle );
		}

	} );
} );

//footer link color
wp.customize( 'arrival_footer_link_color', function( value ) {
	value.bind( function( color ) {
		if (color == '') {
			wp.customize.preview.send( 'refresh' );
		}
		if ( color ) {
			var dynamicStyle = '.site-footer ul li a,.site-footer a { color: ' + color + '; } ';
			arrival_add_dynamic_css( 'arrival_footer_link_color', dynamicStyle );
		}

	} );
} );


//inner page header bottom padding (default layout)
wp.customize( 'arrival_inner_header_image_padding_btm', function( value ) {
	value.bind( function( padding ) {
		if (padding == '') {
			wp.customize.preview.send( 'refresh' );
		}
		if ( padding ) {
			var dynamicStyle = 'body.arrival-inner-page .site-header,.arrival-breadcrumb-wrapper { padding-bottom: ' + padding + 'px; } ';
				dynamicStyle += '.arrival-breadcrumb-wrapper { padding-top: '+ padding + 'px; } ';
			arrival_add_dynamic_css( 'arrival_inner_header_image_padding_btm', dynamicStyle );
		}

	} );
} );



//inner page header bg position
wp.customize( 'arrival_inner_header_img_position', function( value ) {
	value.bind( function( position ) {
		if (position == '') {
			wp.customize.preview.send( 'refresh' );
		}
		if ( position ) {
			var dynamicStyle = 'body.arrival-inner-page .site-header,.arrival-breadcrumb-wrapper { background-position: ' + position + '; } ';
			arrival_add_dynamic_css( 'arrival_inner_header_img_position', dynamicStyle );
		}

	} );
} );

//header last item button text
wp.customize('arrival_main_nav_right_btn_txt', function (value) {
		value.bind(function (to) {
			$('.header-last-item .header-cta-btn').text(to);
		});
	});

})(jQuery);
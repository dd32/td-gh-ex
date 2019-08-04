<?php
/**
 * @package advance-coaching
 * @subpackage advance-coaching
 * @since advance-coaching 1.0
 * Setup the WordPress core custom header feature.
 *
 * @uses advance_coaching_header_style()
*/

function advance_coaching_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'advance_coaching_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'advance_coaching_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'advance_coaching_custom_header_setup' );

if ( ! function_exists( 'advance_coaching_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see advance_coaching_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'advance_coaching_header_style' );
function advance_coaching_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .page-template-custom-front-page .menu-bar, .menu-bar{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'advance-coaching-basic-style', $custom_css );
	endif;
}
endif; // advance_coaching_header_style
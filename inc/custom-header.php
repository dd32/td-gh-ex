<?php
/**
 * @package Advance Automobile
 * @subpackage advance_automobile
 * @since advance-automobile 1.0
 * Setup the WordPress core custom header feature.
 *
 * @uses advance_automobile_header_style()
*/

function advance_automobile_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'advance_automobile_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1360,
		'height'                 => 110,
		'flex-width'         	=> true,
        'flex-height'        	=> true,
		'wp-head-callback'       => 'advance_automobile_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'advance_automobile_custom_header_setup' );

if ( ! function_exists( 'advance_automobile_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see advance_automobile_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'advance_automobile_header_style' );
function advance_automobile_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$advance_automobile_custom_css = "
        #header .main-menu{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'advance-automobile-basic-style', $advance_automobile_custom_css );
	endif;
}
endif; // advance_automobile_header_style
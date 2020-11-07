<?php
/**
 * @package advance-business
 * @subpackage advance-business
 * @since advance-business 1.0
 * Setup the WordPress core custom header feature.
 *
 * @uses advance_business_header_style()
*/

function advance_business_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'advance_business_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1355,
		'height'                 => 170,
		'flex-width'         	=> true,
        'flex-height'        	=> true,
		'wp-head-callback'       => 'advance_business_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'advance_business_custom_header_setup' );

if ( ! function_exists( 'advance_business_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see advance_business_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'advance_business_header_style' );
function advance_business_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$advance_business_custom_css = "
        #header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}
		.main-header{
			background:none;";
	   	wp_add_inline_style( 'advance-business-basic-style', $advance_business_custom_css );
	endif;
}
endif; // advance_business_header_style
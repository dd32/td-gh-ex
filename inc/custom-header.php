<?php
/**
 * @package Academic Education
 * Setup the WordPress core custom header feature.
 *
 * @uses academic_education_header_style()
*/
function academic_education_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'academic_education_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'academic_education_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'academic_education_custom_header_setup' );

if ( ! function_exists( 'academic_education_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see academic_education_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'academic_education_header_style' );
function academic_education_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .headerbox{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'academic-education-basic-style', $custom_css );
	endif;
}
endif; // academic_education_header_style
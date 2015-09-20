<?php
/**
 * semplicemente Theme Customizer
 *
 * @package semplicemente
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function semplicemente_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'semplicemente_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function semplicemente_customize_preview_js() {
	wp_enqueue_script( 'semplicemente_customizer', 
		get_template_directory_uri() . '/js/customizer.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_preview_init', 'semplicemente_customize_preview_js' );


/*
Enqueue Script for top buttons
*/
if ( ! function_exists( 'semplicemente_customizer_controls' ) ){
	function semplicemente_customizer_controls(){

		wp_register_script( 'semplicemente_customizer_top_buttons', get_template_directory_uri() . '/js/theme-customizer-top-buttons.js', array( 'jquery' ), true  );
		wp_enqueue_script( 'semplicemente_customizer_top_buttons' );

		wp_localize_script( 'semplicemente_customizer_top_buttons', 'customBtns', array(
			'prodemo' => esc_html__( 'Demo PRO version', 'semplicemente' ),
            'proget' => esc_html__( 'Get PRO Version', 'semplicemente' )
		) );
	}
}//end if function_exists
add_action( 'customize_controls_enqueue_scripts', 'semplicemente_customizer_controls' );
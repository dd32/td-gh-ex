<?php
/**
 * aquarella Theme Customizer.
 *
 * @package aquarella
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aquarella_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
}
add_action( 'customize_register', 'aquarella_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function aquarella_customize_preview_js() {
	wp_enqueue_script( 'aquarella_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'aquarella_customize_preview_js' );


function aquarella_lite_registers() {


	wp_register_script( 'aquarella_lite_customizer_buttons', get_template_directory_uri() . '/js/aquarella_lite_customizer.js', array("jquery"), '20120206', true  );

	wp_enqueue_script( 'aquarella_lite_customizer_buttons' );
	
	wp_localize_script( 'aquarella_lite_customizer_buttons', 'objectL10n', array(

		'titulo' => __('Take a look at our <strong>Aquarella Premium</strong> version and check out the exclusive features.','aquarella-lite'),
		'pro' => __('Check Aquarella PRO version!','aquarella-lite'),
		
	) );

}

add_action( 'customize_controls_enqueue_scripts', 'aquarella_lite_registers' );

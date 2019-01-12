<?php
/**
 * Arrival Theme Customizer
 *
 * @package arrival
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
require get_template_directory() . '/inc/customizer/customizer-defaults.php';
require get_template_directory() . '/inc/customizer/buttonset/init.php';
require get_template_directory() . '/inc/customizer/customizer-custom-controllers.php';
require get_template_directory() . '/inc/customizer/customizer-sanitize.php';
require get_template_directory() . '/inc/customizer/repeater-controller/customizer.php';



function arrival_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname', array(
				'selector'        => '.site-title a',
				'render_callback' => 'arrival_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription', array(
				'selector'        => '.site-description',
				'render_callback' => 'arrival_customize_partial_blogdescription',
			)
		);
	}

	

	require get_template_directory() . '/inc/customizer/arrival-customizer.php';
}
add_action( 'customize_register', 'arrival_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function arrival_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function arrival_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function arrival_customize_preview_js() {
	wp_enqueue_script( 'arrival-customizer', get_theme_file_uri( '/js/customizer.js' ), array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'arrival_customize_preview_js' );


/**
* add customizer scripts
*/
function arrival_customizer_scripts(){
	wp_enqueue_style( 'arrival-customizer-styles', get_theme_file_uri( '/css/customizer-styles.css' ), array(), '20180514' );
	wp_enqueue_script( 'arrival-customizer-scripts', get_theme_file_uri( '/js/customizer-control.js' ), array('customize-controls'), '20180514' );
}
add_action('customize_controls_enqueue_scripts','arrival_customizer_scripts');
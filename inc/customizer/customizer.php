<?php
/**
 * Best_Charity Theme Customizer
 *
 * @package Best_Charity
 */
use WPTRT\Customize\Section\Button;

function best_charity_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'best_charity_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'best_charity_customize_partial_blogdescription',
		) );
	}


	$wp_customize->register_section_type( Button::class );

	$wp_customize->add_section(
		new Button( $wp_customize, 'best_charity_pro', [
			'title'       => __( 'Buy Best Charity Pro', 'best-charity' ),
			'button_text' => __( 'Go Pro', 'best-charity' ),
			'button_url'  => 'http://html5wp.com/downloads/best-charity-pro-wordpress-theme/'
		] )
	);

}
add_action( 'customize_register', 'best_charity_customize_register' );

function best_charity_customize_partial_blogname() {
	bloginfo( 'name' );
}

function best_charity_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function best_charity_customize_preview_js() {
	wp_enqueue_script( 'best-charity-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'best_charity_customize_preview_js' );


function best_charity_customize_backend_scripts() {
	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'best-charity-customize-section-button',
		get_theme_file_uri( 'inc/upgrade-to-pro/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'best-charity-customize-section-button',
		get_theme_file_uri( 'inc/upgrade-to-pro/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);
}
add_action( 'customize_controls_enqueue_scripts', 'best_charity_customize_backend_scripts', 10 );

require get_template_directory() . '/inc/customizer/general-panel.php';
require get_template_directory() . '/inc/customizer/header-panel.php';

require get_template_directory() . '/inc/customizer/customizer-sanitize.php';
require get_template_directory() . '/inc/customizer/customizer-classes.php';

// Autoloader
include get_theme_file_path( 'inc/upgrade-to-pro/src/Loader.php' );

$loader = new \WPTRT\Autoload\Loader();

$loader->add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'inc/upgrade-to-pro/src' ) );

$loader->register();
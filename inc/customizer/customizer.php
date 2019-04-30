<?php
/**
 * Best_Charity Theme Customizer
 *
 * @package Best_Charity
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
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

	//Upgrade to Pro
	// Register custom section types.
	$wp_customize->register_section_type( 'Best_Charity_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Best_Charity_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Go Pro', 'best-charity' ),
				'pro_text' => esc_html__( 'Buy Best Charity Pro', 'best-charity' ),
				'pro_url'  => 'http://html5wp.com/downloads/best-charity-pro-wordpress-theme/',
				'priority' => 1,
			)
		)
	);

}
add_action( 'customize_register', 'best_charity_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function best_charity_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function best_charity_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function best_charity_customize_preview_js() {
	wp_enqueue_script( 'best-charity-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'best_charity_customize_preview_js' );


/**
 * Enqueue required scripts/styles for customizer panel
 *
 * @since 1.0.0
 */
function best_charity_customize_backend_scripts() {
	wp_enqueue_script( 'best_charity-customize-controls', get_template_directory_uri() . '/inc/upgrade-to-pro/pro.js', array( 'customize-controls' ) );
	wp_enqueue_style( 'best_charity-customize-controls', get_template_directory_uri() . '/inc/upgrade-to-pro/pro.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'best_charity_customize_backend_scripts', 10 );

/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Load customizer required panels.
 */

require get_template_directory() . '/inc/customizer/general-panel.php';
require_once trailingslashit( get_template_directory() ) . '/inc/upgrade-to-pro/control.php';
require get_template_directory() . '/inc/customizer/header-panel.php';

require get_template_directory() . '/inc/customizer/customizer-sanitize.php';
require get_template_directory() . '/inc/customizer/customizer-classes.php';
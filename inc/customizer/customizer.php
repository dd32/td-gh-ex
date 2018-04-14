<?php
/**
 * agency-x Theme Customizer
 *
 * @package agency-x
 */

$panels   = array( 'homepage', 'social-media' );
$homepage_sections = array( 'banner-slider', 'welcome', 'counter', 'services', 'team', 'works', 'testimonial', 'skills', 'latest-posts', 'contact', 'clients' );


foreach( $panels as $panel ){
    require get_template_directory() . '/inc/customizer/panels/' . $panel . '.php';
}

foreach( $homepage_sections as $section ){
    require get_template_directory() . '/inc/customizer/sections/homepage-options/' . $section . '.php';
}


require get_template_directory() . '/inc/customizer/sections/social-media.php';

/**
 * Sanitization Functions
*/
require get_template_directory() . '/inc/customizer/sanitization-functions.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */

function agency_x_customize_preview_js() {
  wp_enqueue_script( 'agency-x-customizer-preview', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'agency_x_customize_preview_js' );

/* Upgrade to Pro */
// Load Upgrade to Pro control.
	require_once trailingslashit( get_template_directory() ) . '/inc/upgrade-to-pro/control.php';

	// Register custom section types.
	$wp_customize->register_section_type( 'agency_x_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new agency_x_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Upgrade to Agency Plus', 'agency-x' ),
				'pro_text' => esc_html__( 'Buy Now', 'agency-x' ),
				'pro_url'  => 'https://goo.gl/KyCGWH',
				'priority' => 1,
			)
		)
	);

function agency_x_customizer_control_scripts() {

	wp_enqueue_script( 'blogzine-controls', get_template_directory_uri() . '/inc/upgrade-to-pro/customize-controls.js', array('customize-controls'), '20151215', true );
	wp_enqueue_style( 'blogzine-customizer', get_template_directory_uri() . '/inc/upgrade-to-pro/customize-controls.css' );

}

add_action( 'customize_controls_enqueue_scripts', 'agency_x_customizer_control_scripts', 0 );

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

function agency_x_customizer_js() {
    wp_enqueue_script('agency-x-customizer', get_template_directory_uri() . '/js/agency-x-customizer.js', array('jquery'), '1.3.0', true);

    wp_localize_script( 'agency-x-customizer', 'agency_x_customizer_js_obj', array(
        'pro' => __('Upgrade To Agency Plus','agency-x')
    ) );
    wp_enqueue_style( 'agency-x-customizer', get_template_directory_uri() . '/css/agency-x-customizer.css');
}
add_action( 'customize_controls_enqueue_scripts', 'agency_x_customizer_js' );
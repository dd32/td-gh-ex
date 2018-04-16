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


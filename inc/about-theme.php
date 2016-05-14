<?php
/**
 * Display upgrade notice on customizer page
 */
function prefix_upsell_theme() {
 // Enqueue the script
 wp_enqueue_script(
 'prefix-customizer-upsell3',
 get_template_directory_uri() . '/js/about-theme.js',
 array(), '1.0.0',
 true
 );
 // Localize the script
 wp_localize_script(
 'prefix-customizer-upsell3',
 'prefixL12n',
 
 array(
 'prefixURL3'	=> esc_url( 'http://www.imonthemes.com/advance-lite/' ),
 'prefixLabel3'	=> __( 'About Theme & Demo', 'advance' ),
 
 )
 );
 
 
 
 
}
add_action( 'customize_controls_enqueue_scripts', 'prefix_upsell_theme' );


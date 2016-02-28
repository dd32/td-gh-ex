<?php
/**
 * Display upgrade notice on customizer page
 */
function prefix_upsell_extra() {
 // Enqueue the script
 wp_enqueue_script(
 'prefix-customizer-upsell2',
 get_template_directory_uri() . '/js/extra.js',
 array(), '1.0.0',
 true
 );
 // Localize the script
 wp_localize_script(
 'prefix-customizer-upsell2',
 'prefixL11n',
 
 array(
 'prefixURL2'	=> esc_url( 'https://upsell.com' ),
 'prefixLabel2'	=> __( 'View Documentation', 'safreen' ),
 
 )
 );
 
 
 
 
}
 add_action( 'customize_controls_enqueue_scripts', 'prefix_upsell_extra' );


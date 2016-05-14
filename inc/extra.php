<?php
/**
 * Display upgrade notice on customizer page
 */
function advance_upsell_extra() {
 // Enqueue the script
 wp_enqueue_script(
 'advance-customizer-upsell2',
 get_template_directory_uri() . '/js/extra.js',
 array(), '1.0.0',
 true
 );
 // Localize the script
 wp_localize_script(
 'advance-customizer-upsell2',
 'advanceL11n',
 
 array(
 'advanceURL2'	=> esc_url( 'http://advance-docs.imonthemes.com/' ),
 'advanceLabel2'	=> __( 'View Documentation', 'advance' ),
 
 )
 );
 
 
 
 
}
 add_action( 'customize_controls_enqueue_scripts', 'advance_upsell_extra' );


<?php
/**
 * Display upgrade notice on customizer page
 */
function advance_upsell_notice() {
 // Enqueue the script
 wp_enqueue_script(
 'advance-customizer-upsell',
 get_template_directory_uri() . '/js/upsell.js',
 array(), '1.0.0',
 true
 );
 // Localize the script
 wp_localize_script(
 'advance-customizer-upsell',
 'advanceL10n',
 array(
 'advanceURL'	=> esc_url( 'http://www.imonthemes.com/advance-pro/' ),
 'advanceLabel'	=> __( 'Upgrade to Pro', 'advance' ),
 
 
 
 )
 );
}
add_action( 'customize_controls_enqueue_scripts', 'advance_upsell_notice' );
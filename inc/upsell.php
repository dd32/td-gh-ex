<?php
/**
 * Display upgrade notice on customizer page
 */
function prefix_upsell_notice() {
 // Enqueue the script
 wp_enqueue_script(
 'prefix-customizer-upsell',
 get_template_directory_uri() . '/js/upsell.js',
 array(), '1.0.0',
 true
 );
 // Localize the script
 wp_localize_script(
 'prefix-customizer-upsell',
 'prefixL10n',
 array(
 'prefixURL'	=> esc_url( 'https://upsell.com' ),
 'prefixLabel'	=> __( 'Upgrade to Pro', 'safreen' ),
 
 
 
 )
 );
}
add_action( 'customize_controls_enqueue_scripts', 'prefix_upsell_notice' );
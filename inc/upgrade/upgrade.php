<?php
/**
 * Display upgrade notice on customizer page
 */
function advocator_lite_upgrade_notice() {
 
	// Enqueue the script
	wp_enqueue_script(
		'advocator-lite-customizer-upgrade',
		get_template_directory_uri() . '/inc/upgrade/label.js',
		array(), '1.0',
		true
	);
 
	// Localize the script for main label
	wp_localize_script(
		'advocator-lite-customizer-upgrade',
		'advocatorLiteUpgrade',
		array(
			'advocatorLiteUpgradeURL'		=> esc_url( 'https://rescuethemes.com/wordpress-themes/advocator/' ),
			'advocatorLiteUpgradeLabel'	=> __( 'Upgrade to Advocator Plus', 'advocator-lite' ),
		)
	);

	// Enqueue the script
	wp_enqueue_script(
		'advocator-lite-customizer-mini-label-upgrade',
		get_template_directory_uri() . '/inc/upgrade/minilabel.js',
		array(), '1.0',
		true
	);

	// Localize the script for mini label
	wp_localize_script(
		'advocator-lite-customizer-mini-label-upgrade',
		'advocatorLiteMiniUpgrade',
		array(
			'advocatorLiteMiniUpgradeLabel'	=> __( 'Plus', 'advocator-lite' ),
		)
	);
 
}
add_action( 'customize_controls_enqueue_scripts', 'advocator_lite_upgrade_notice' );
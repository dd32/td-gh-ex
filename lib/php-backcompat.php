<?php
/**
 * Aamla Theme back compat functionality
 *
 * Prevents aamla from running on PHP versions prior to 5.4,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in PHP 5.4.
 *
 * @package Aamla
 * @since 1.0.0
 */

/**
 * Prevent switching to aamla on old versions of PHP.
 *
 * Switches to the default theme.
 *
 * @since 1.0.0
 */
function aamla_prevent_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'aamla_upgrade_notice' );
}
add_action( 'after_switch_theme', 'aamla_prevent_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * aamla on PHP versions prior to 5.4.
 *
 * @since 1.0.0
 *
 * @global const PHP_VERSION PHP version.
 */
function aamla_upgrade_notice() {
	$message = sprintf(
		/* translators: %s: Installed PHP version */
		esc_html__( 'Aamla requires at least PHP version 5.4. You are running version %s. Please upgrade and try again.', 'aamla' ),
		PHP_VERSION
	);
	printf( '<div class="error"><p>%s</p></div>', $message ); // WPCS xss ok.
}

/**
 * Prevents the Customizer from being loaded on PHP versions prior to 5.4.
 *
 * @since 1.0.0
 *
 * @global const PHP_VERSION PHP version.
 */
function aamla_prevent_customize_load() {
	wp_die(
		sprintf(
			/* translators: %s: Installed PHP version */
			esc_html__( 'aamla requires at least PHP version 5.4. You are running version %s. Please upgrade and try again.', 'aamla' ),
			PHP_VERSION
		),
		'',
		array( 'back_link' => true )
	); // WPCS xss ok. 'PHP_VERSION' is a Predefined Constant.
}
add_action( 'load-customize.php', 'aamla_prevent_customize_load' );

/**
 * Prevents the Theme Preview from being loaded on PHP versions prior to 5.4.
 *
 * @since 1.0.0
 *
 * @global const PHP_VERSION PHP version.
 */
function aamla_prevent_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die(
			sprintf(
				/* translators: %s: Installed PHP version */
				esc_html__( 'aamla requires at least PHP version 5.4. You are running version %s. Please upgrade and try again.', 'aamla' ),
				PHP_VERSION
			)
		); // WPCS xss ok. 'PHP_VERSION' is a Predefined Constant.
	}
}
add_action( 'template_redirect', 'aamla_prevent_preview' );

<?php
/**
 * Aguafuerte back compat functionality
 *
 * Prevents Aguafuerte from running on WordPress versions prior to 4.6,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.6.
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.2
 */

/**
 * Prevent switching to Aguafuerte on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Aguafuerte 1.0.2
 */
function aguafuerte_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	unset( $_GET['activated'] );

	add_action( 'admin_notices', 'aguafuerte_upgrade_notice' );
}
add_action( 'after_switch_theme', 'aguafuerte_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Aguafuerte on WordPress versions prior to 4.6.
 *
 * @since Aguafuerte 1.0.2
 *
 * @global string $wp_version WordPress version.
 */
function aguafuerte_upgrade_notice() {
	$message = sprintf( __( 'Aguafuerte requires at least WordPress version 4.6. You are running version %s. Please upgrade and try again.', 'aguafuerte' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.6.
 *
 * @since Aguafuerte 1.0.2
 *
 * @global string $wp_version WordPress version.
 */
function aguafuerte_customize() {
	wp_die( sprintf( __( 'Aguafuerte requires at least WordPress version 4.6. You are running version %s. Please upgrade and try again.', 'aguafuerte' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'aguafuerte_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.6.
 *
 * @since Aguafuerte 1.0.2
 *
 * @global string $wp_version WordPress version.
 */
function aguafuerte_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Aguafuerte requires at least WordPress version 4.6. You are running version %s. Please upgrade and try again.', 'aguafuerte' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'aguafuerte_preview' );

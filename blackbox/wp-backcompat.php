<?php
/**
 * Aamla Theme back compat functionality
 *
 * Prevents aamla from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * This file incorporates code from Twenty Fifteen WordPress Theme,
 * Copyright 2014-2016 WordPress.org & Automattic.com Twenty Fifteen is
 * distributed under the terms of the GNU GPL.
 *
 * @package Aamla
 * @since 1.0.0
 */

/**
 * Prevent switching to aamla on old versions of WordPress.
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
 * aamla on WordPress versions prior to 4.7.
 *
 * @since 1.0.0
 *
 * @global string $wp_version WordPress version.
 */
function aamla_upgrade_notice() {
	$message = sprintf(
		/* translators: %s: Installed WordPress version */
		esc_html__( 'Aamla requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'aamla' ),
		$GLOBALS['wp_version']
	);
	printf( '<div class="error"><p>%s</p></div>', $message ); // WPCS xss ok.
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since 1.0.0
 *
 * @global string $wp_version WordPress version.
 */
function aamla_prevent_customize_load() {
	wp_die(
		sprintf(
			/* translators: %s: Installed WordPress version */
			esc_html__( 'aamla requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'aamla' ),
			$GLOBALS['wp_version']
		),
		'',
		array(
			'back_link' => true,
		)
	);
}
add_action( 'load-customize.php', 'aamla_prevent_customize_load' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since 1.0.0
 *
 * @global string $wp_version WordPress version.
 */
function aagam_prevent_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die(
			sprintf(
				/* translators: %s: Installed WordPress version */
				esc_html__( 'aamla requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'aamla' ),
				$GLOBALS['wp_version']
			)
		);
	}
}
add_action( 'template_redirect', 'aagam_prevent_preview' );

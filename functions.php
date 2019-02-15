<?php
/**
 * Auspicious (functions.php)
 *
 * @package     Auspicious
 * @copyright   Copyright (C) 2019. Benjamin Lu
 * @license     GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      Benjamin Lu (https://getbenonit.com)
 * ************************************************************************************************************************
 */

/**
 * Table of Content
 *
 * 1.0 - Compatibility Check
 * 2.0 - Load Theme Setup
 * 3.0 - Autoload Backrop Core
 * 4.0 - Additional Recommended Features
 */

/**
 * 1.0 - Compatibility Check
 */
function auspicious_compatibility_check() {
	if ( version_compare( $GLOBALS['wp_version'], '4.9.6', '<' ) ) {
		return sprintf(
			// translators: 1 =  a version string, 2 = current wp version string.
			__( 'Initiator requires at least WordPress version %1$s. You are currently running %2$s. Please upgrade and try again.', 'auspicious' ),
			'4.9.6',
			$GLOBALS['wp_version']
		);
	} elseif ( version_compare( PHP_VERSION, '5.6', '<' ) ) {
		return sprintf(
			// translators: 1 =  a version string, 2 = current wp version string.
			__( 'Initiator requires at least PHP version %1$s. You are currently running %2$s. Please upgrade and try again.', 'auspicious' ),
			'5.6',
			PHP_VERSION
		);
	}
	return '';
}

/**
 * Triggered after switch themes and check if it meets the requirements.
 */
function auspicious_switch_theme() {
	if ( version_compare( $GLOBALS['wp_version'], '4.9.6', '<' ) || version_compare( PHP_VERSION, '5.6', '<' ) ) {
		switch_theme( get_option( 'theme_switched' ) );
		add_action( 'admin_notices', 'auspicious_upgrade_notice' );
	}
	return false;
}
add_action( 'after_switch_theme', 'auspicious_switch_theme' );

/**
 * Displays an error if it doesn't meet the requirements.
 */
function auspicious_upgrade_notice() {
	printf( '<div class="error"><p>%s</p></div>', esc_html( auspicious_compatibility_check() ) );
}

/**
 * 2.0 - Load Theme Setup
 */
function auspicious_load_theme_setup() {
	/**
	 * The load_theme_textdomain( 'auspicious' );. This should translate all translation in the theme. If there is a
	 * second text-domain, it should ignore since translation only takes the primary text domain.
	 */
	load_theme_textdomain( 'auspicious' );
}
add_action( 'after_setup_theme', 'auspicious_load_theme_setup' );

/**
 * 3.0 - Autoload Backrop Core
 */
if ( file_exists( get_parent_theme_file_path( '/vendor/autoload.php' ) ) ) {
	require_once get_parent_theme_file_path( '/vendor/autoload.php' );
}

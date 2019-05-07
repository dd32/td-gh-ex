<?php
/**
 * Configuration for environment requirements
 * WordPress setups that fail the requirements will not be able to use the theme.
 * Configurations defining WordPress & PHP requirements
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define the PHP minimum version
define( 'UNDEDICATED_MIN_PHP_VERSION', '5.6' );

// Define the WP minimum version
define( 'UNDEDICATED_MIN_WP_VERSION', '4.7' );

/**
 * Immediately after theme switch is fired, check PHP & WordPress version and
 * revert to previously active theme if version is below our minimum
 */
add_action( 'after_switch_theme', 'undedicated_check_requirements' );

/**
 * Reverts to the previous theme if minimum WP or PHP version not met
 */
function undedicated_check_requirements() {

	// Set variable to report failure
	$undedicated_requirements_failed = false;

	// Check for PHP version
	if ( version_compare( PHP_VERSION, UNDEDICATED_MIN_PHP_VERSION, '<' ) ) {

		// Site doesn't meet the PHP requirement, add notice
		add_action( 'admin_notices', 'undedicated_php_version_notice' );
		
		$undedicated_requirements_failed = true;

	};

	// Check for WordPress version
	if ( version_compare( esc_attr($GLOBALS['wp_version']), UNDEDICATED_MIN_WP_VERSION, '<' ) ) {

		// Site doesn't meet the PHP requirement, add notice
		add_action( 'admin_notices', 'undedicated_wp_version_notice' );

		$undedicated_requirements_failed = true;

	};

	// If requirements not met
	if( $undedicated_requirements_failed ) {
	
		// Switch back to previous theme
		switch_theme( get_option( 'theme_switched' ) );

		return false;

	}

}

/**
 * Error notice if the minimum PHP version not met
 */
function undedicated_php_version_notice() {
	?>
	<div class="notice notice-error is_dismissable">
		<h3><?php esc_html_e( 'PHP Update Required', 'undedicated' ); ?></h3>
		<p>
			<?php
			printf(
				/* translators: 1. Current PHP version, 2. Minimum supported PHP version */
				esc_html__( 'Your website installation uses PHP version: %1$s. To use this theme, please upgrade PHP to version: %2$s or higher. You can upgrade PHP via your web hosting control panel.', 'undedicated' ),
				PHP_VERSION,
				UNDEDICATED_MIN_PHP_VERSION
			); // phpcs: XSS ok.
			?>

		</p>
	</div>
	<?php
}

/**
 * Error notice if the minimum WordPress version not met
 */
function undedicated_wp_version_notice() {
	?>
	<div class="notice notice-error is_dismissable">
		<h3><?php esc_html_e( 'WordPress Update Required', 'undedicated' ); ?></h3>
		<p>
			<?php
			printf(
				/* translators: 1. Current PHP version, 2. Minmum supported PHP version */
				esc_html__( 'You are currently using WordPress version: %1$s. To use this theme, please update your WordPress to version: %2$s or higher.', 'undedicated' ),
				esc_attr($GLOBALS['wp_version']),
				UNDEDICATED_MIN_WP_VERSION
			); // phpcs: XSS ok.
			?>

		</p>
	</div>
	<?php
}
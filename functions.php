<?php
/**
 * AzAuthority functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AzAuthority
 */

/**
 * Assign the AzAuthority version to a var
 */
$azauthority_theme              = wp_get_theme( 'azauthority' );
$azauthority_version = $azauthority_theme->get('Version');
$azauthority_slug = $azauthority_theme->get('azauthority');

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$azauthority = (object) array(
	'version' => $azauthority_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require get_template_directory(). '/inc/class-azauthority.php',
	'customizer' => require get_template_directory(). '/inc/customizer/class-azauthority-customizer.php',
);

/**
 * Include functions
 */
if ( is_admin() ) {

	$azauthority->admin = require 'inc/admin/class-admin.php';

	// Includes recommend plugin
	require 'inc/helpers/class-tgm-plugin-activation.php';
}

require get_template_directory() . '/inc/azauthority-functions.php';
require get_template_directory() . '/inc/azauthority-template-hooks.php';
require get_template_directory() . '/inc/azauthority-template-functions.php';
require get_template_directory() . '/inc/class-azauthority-menu-walker.php';

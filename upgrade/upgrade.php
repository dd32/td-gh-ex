<?php
/**
 * Functions for users wanting to upgrade to premium
 *
 * @package Conica
 */

/**
 * Display the upgrade to Premium page & load styles.
 */
function conica_premium_admin_menu() {
    global $conica_upgrade_page;
    $conica_upgrade_page = add_theme_page( __( 'About Conica', 'conica' ), '<span class="premium-link">' . __( 'About Conica', 'conica' ) . '</span>', 'edit_theme_options', 'theme_info', 'conica_render_upgrade_page' );
}
add_action( 'admin_menu', 'conica_premium_admin_menu' );

/**
 * Enqueue admin stylesheet only on upgrade page.
 */
function conica_load_upgrade_page_scripts() {
    global $pagenow;
	if ( $pagenow == 'themes.php' ) {
		wp_enqueue_style( 'conica-upgrade-css', get_template_directory_uri() . '/upgrade/css/upgrade-admin.css' );
	    wp_enqueue_script( 'caroufredsel', get_template_directory_uri() . '/js/caroufredsel/jquery.carouFredSel-6.2.1-packed.js', array( 'jquery' ), CONICA_THEME_VERSION, true );
	    wp_enqueue_script( 'conica-upgrade-js', get_template_directory_uri() . '/upgrade/js/upgrade-custom.js', array( 'jquery' ), CONICA_THEME_VERSION, true );
	}
}
add_action( 'admin_enqueue_scripts', 'conica_load_upgrade_page_scripts' );

/**
 * Render the premium page to download premium upgrade plugin
 */
function conica_render_upgrade_page() {
	get_template_part( 'upgrade/tpl/upgrade-page' );
}

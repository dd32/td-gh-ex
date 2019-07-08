<?php
/**
 * Display Bayleaf theme admin page in Dashboard > Appearance.
 *
 * @package Bayleaf
 * @since 1.3.4
 */

namespace bayleaf;

/**
 * Display Bayleaf theme admin page in Dashboard > Appearance.
 *
 * @since  1.3.4
 */
class Admin_Page {

	/**
	 * Constructor method.
	 *
	 * @since  1.3.4
	 */
	public function __construct() {}

	/**
	 * Register hooked functions.
	 *
	 * @since 1.3.4
	 */
	public function init() {
		global $pagenow;

		// Add Welcome message on Theme activation.
		if ( is_admin() && 'themes.php' === $pagenow && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', [ $this, 'welcome_theme_notice' ], 99 );
		}
	}

	/**
	 * Display Welcome Message on Theme activation.
	 *
	 * @since  1.3.4
	 *
	 * @return void
	 */
	public function welcome_theme_notice() {
		bayleaf_get_template_partial( 'add-on/admin-page', 'template' );
	}
}

$bayleaf_admin_page = new Admin_Page();
$bayleaf_admin_page->init();

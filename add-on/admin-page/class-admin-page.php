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
		add_action( 'admin_notices', [ $this, 'welcome_theme_notice' ], 99 );
		add_action( 'admin_head', [ $this, 'dismiss_notices' ] );
	}

	/**
	 * Display Welcome Message on Theme activation.
	 *
	 * @since  1.3.4
	 *
	 * @return void
	 */
	public function welcome_theme_notice() {
		if ( BAYLEAF_THEME_VERSION !== get_option( 'bayleaf-admin-notice' ) ) {
			bayleaf_get_template_partial( 'add-on/admin-page', 'template' );
		}
	}

	/**
	 * Display message on plugin activation.
	 *
	 * @since 1.4.4
	 */
	public function dismiss_notices() {
		if ( isset( $_GET['bayleaf-dismiss'] ) && check_admin_referer( 'bayleaf-dismiss-' . get_current_user_id() ) ) {
			update_option( 'bayleaf-admin-notice', BAYLEAF_THEME_VERSION );
		}
	}
}

$bayleaf_admin_page = new Admin_Page();
$bayleaf_admin_page->init();

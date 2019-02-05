<?php
/**
 * This file adds compatability between this theme and the 'Google Tag Manager for WordPress' plugin
 *
 * @see https://de.wordpress.org/plugins/duracelltomi-google-tag-manager/
 * @package agncy
 */

/**
 * The class that adds compatibilty between "Google Tag Manager for WordPress" and this theme
 */
class AgncyGtm4wpCompatibility {

	/**
	 * The class constructor. It constructs things.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {
		// Only fire this class if the yoast plugin is really active.
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		if ( is_plugin_active( 'duracelltomi-google-tag-manager/duracelltomi-google-tag-manager-for-wordpress.php' ) ) {
			$this->action_dispatcher();
			$this->filter_dispatcher();
		}
	}


	/**
	 * Set the actions we need in this class.
	 *
	 * @access private
	 * @return void
	 */
	private function action_dispatcher() {
		add_action( 'agncy_after_body', array( $this, 'inject_gtm_tag' ) );
	}

	/**
	 * Set the filters we need in this class.
	 *
	 * @access private
	 * @return void
	 */
	private function filter_dispatcher() {

	}

	/**
	 * Check if the gtm function really exists and if so output the gtm tag.
	 *
	 * @access public
	 * @return void
	 */
	public function inject_gtm_tag() {
		if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) {
			gtm4wp_the_gtm_tag();
		}
	}

}
new AgncyGtm4wpCompatibility();

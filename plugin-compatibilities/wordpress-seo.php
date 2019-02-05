<?php
/**
 * This file adds compatability between this theme and the 'Yoast SEO' plugin
 *
 * @see https://de.wordpress.org/plugins/wordpress-seo/
 * @package agncy
 */

/**
 * The class that adds compatibilty between "Yoast SEO" and this theme
 */
class AgncyYoastCompatibility {

	/**
	 * The class constructor. It constructs things.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {
		// Only fire this class if the yoast plugin is really active.
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		if ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) ) {
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

	}

	/**
	 * Set the filters we need in this class.
	 *
	 * @access private
	 * @return void
	 */
	private function filter_dispatcher() {
		add_filter( 'agncy_breadcrumb', array( $this, 'yoast_breadcrumbs' ) );
	}

	/**
	 * Check if the yoast breadcrumbs exist and if so return them.
	 *
	 * Yoast Breadcrumbs are awesome and we use them all the time. Thats why we
	 * filter them in our theme for some awesome use cases.
	 *
	 * @access public
	 * @return string The yoast breadcrumb
	 */
	public function yoast_breadcrumbs() {
		if ( function_exists( 'yoast_breadcrumb' ) ) {
			return yoast_breadcrumb( null, null, false );
		}
	}

}
new AgncyYoastCompatibility();

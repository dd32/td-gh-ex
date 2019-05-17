<?php
/**
 * Display Aamla theme admin page in Dashboard > Appearance.
 *
 * @package Aamla
 * @since 1.0.2
 */

namespace aamla;

/**
 * Display Aamla theme admin page in Dashboard > Appearance.
 *
 * @since  1.0.2
 */
class Admin_Page {

	/**
	 * Constructor method.
	 *
	 * @since  1.0.2
	 */
	public function __construct() {}

	/**
	 * Register hooked functions.
	 *
	 * @since 1.0.2
	 */
	public function init() {

		// Add Aamla theme help page to Dashboard > appearance.
		add_action( 'admin_menu', [ $this, 'add_theme_page' ] );
	}

	/**
	 * Add theme specific help & support page on Admin screen.
	 *
	 * @since 1.0.2
	 */
	public function add_theme_page() {
		$aamla_page = add_theme_page(
			// Page Title.
			esc_html__( 'Aamla Docs', 'aamla' ),
			// Menu Title.
			esc_html__( 'Aamla Docs', 'aamla' ),
			// Capability.
			'edit_theme_options',
			// Menu Slug.
			'aamla-docs',
			// Render Function.
			[ $this, 'render' ]
		);

		if ( $aamla_page ) {
			$aamla_page = esc_html( $aamla_page );

			// Register theme options page specific styles.
			add_action( "admin_print_styles-$aamla_page", [ $this, 'enqueue_styles' ] );

			// Register theme options page specific scripts.
			add_action( "admin_print_scripts-$aamla_page", [ $this, 'enqueue_scripts' ] );
		}
	}

	/**
	 * Render markup for Aamla theme support page.
	 *
	 * @since 1.0.2
	 */
	public function render() {
		aamla_get_template_partial( 'add-on/admin-page', 'theme-page-display' );
	}

	/**
	 * Enqueue styles to the Admin page.
	 *
	 * @since 1.0.2
	 */
	public function enqueue_styles() {

		wp_enqueue_style(
			'aamla_admin_page_style',
			get_template_directory_uri() . '/add-on/admin-page/assets/admin-page.css',
			[],
			AAMLA_THEME_VERSION,
			'all'
		);

		$fonts_url = 'https://fonts.googleapis.com/css?family=Roboto+Condensed:400|Roboto:400,700';
		wp_enqueue_style( 'aamla-adminpage-font', esc_url_raw( $fonts_url ) );
	}

	/**
	 * Enqueue scripts to the Admin page.
	 *
	 * @since 1.0.2
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( 'jquery-ui-tabs' );
		wp_enqueue_script(
			'aamla_admin_page_js',
			get_template_directory_uri() . '/add-on/admin-page/assets/admin-page.js',
			[ 'jquery' ],
			AAMLA_THEME_VERSION,
			'all'
		);
	}
}

$aamla_admin_page = new Admin_Page();
$aamla_admin_page->init();

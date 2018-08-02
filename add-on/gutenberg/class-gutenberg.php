<?php
/**
 * Gutenberg Support.
 *
 * @package Aamla
 * @since 1.0.1
 */

namespace aamla;

/**
 * Gutenberg support.
 *
 * @since  1.0.1
 */
class GutenBerg {

	/**
	 * Holds the instance of this class.
	 *
	 * @since  1.0.1
	 * @access protected
	 * @var    object
	 */
	protected static $instance = null;

	/**
	 * Constructor method.
	 *
	 * @since  1.0.1
	 */
	public function __construct() {}

	/**
	 * Returns the instance of this class.
	 *
	 * @since  1.0.1
	 *
	 * @return object Instance of this class.
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Register hooked functions.
	 *
	 * @since 1.0.1
	 */
	public static function init() {
		// Return if Gutenberg is not activated.
		if ( ! defined( 'GUTENBERG_VERSION' ) ) {
			return false;
		}
		add_action( 'after_setup_theme', [ self::get_instance(), 'add_gutenberg_support' ] );
		add_action( 'wp_enqueue_scripts', [ self::get_instance(), 'enqueue_front' ] );
		add_action( 'enqueue_block_editor_assets', [ self::get_instance(), 'enqueue_admin' ] );
	}

	/**
	 * Declare Gutenberg features support.
	 *
	 * @since 1.0.1
	 */
	public function add_gutenberg_support() {
		// Add theme support for Wide Alignment.
		add_theme_support( 'align-wide' );

	}

	/**
	 * Enqueue scripts and styles to front end.
	 *
	 * @since 1.0.1
	 */
	public function enqueue_front() {
		wp_enqueue_style(
			'aamla_gutenberg_style',
			get_template_directory_uri() . '/add-on/gutenberg/assets/gutenberg.css',
			[],
			AAMLA_THEME_VERSION,
			'all'
		);
	}

	/**
	 * Enqueue scripts and styles to admin.
	 *
	 * @since 1.0.1
	 */
	public function enqueue_admin() {
		// Add custom fonts, used in the main stylesheet.
		wp_enqueue_style(
			'aamla-fonts',
			esc_url( aamla_font_url() ),
			[],
			AAMLA_THEME_VERSION,
			'all'
		);
		// Add custom styles for gutenberg admin screen.
		wp_enqueue_style(
			'aamla_gutenberg_admin_style',
			get_template_directory_uri() . '/add-on/gutenberg/admin/gutenberg.css',
			[],
			AAMLA_THEME_VERSION,
			'all'
		);
		wp_add_inline_style( 'aamla_gutenberg_admin_style', $this->gutenberg_css() );
	}

	/**
	 * Add gutenberg inline styles to editor screen.
	 *
	 * @since 1.0.1
	 */
	public function gutenberg_css() {

		/**
		 * Filter inline styles to be injected to Gutenberg Editor screen.
		 *
		 * @since 1.0.1
		 *
		 * @param string $css String of inline styles or empty string.
		 */
		$css = apply_filters( 'aamla_gutenberg_styles', '' );

		if ( ! $css ) {
			return '';
		}

		return aamla_prepare_css( $css );
	}
}

GutenBerg::init();

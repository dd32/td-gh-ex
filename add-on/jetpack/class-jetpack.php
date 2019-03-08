<?php
/**
 * JetPack Plugin Support.
 *
 * @package Aamla
 * @since 1.0.0
 */

namespace aamla;

/**
 * JetPack plugin support.
 *
 * @since  1.0.0
 */
class JetPack {

	/**
	 * Holds the instance of this class.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    object
	 */
	protected static $instance = null;

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 */
	public function __construct() {}

	/**
	 * Returns the instance of this class.
	 *
	 * @since  1.0.0
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
	 * @since 1.0.0
	 */
	public static function init() {
		// Return if JetPack is not activated.
		if ( ! defined( 'JETPACK__VERSION' ) ) {
			return false;
		}
		add_action( 'wp_enqueue_scripts', [ self::get_instance(), 'enqueue_front' ] );
		add_action( 'after_setup_theme', [ self::get_instance(), 'add_jetpack_support' ] );
		add_filter( 'infinite_scroll_js_settings', [ self::get_instance(), 'js_settings' ] );
	}

	/**
	 * Declare JetPack & its features support.
	 *
	 * @since 1.0.0
	 */
	public function add_jetpack_support() {
		// Add theme support for Infinite Scroll.
		add_theme_support(
			'infinite-scroll',
			array(
				'container' => 'main',
				'render'    => [ $this, 'infinite_scroll_render' ],
				'footer'    => 'page',
			)
		);
	}

	/**
	 * Custom render function for Jetpack Infinite Scroll.
	 *
	 * @since 1.0.0
	 */
	public function infinite_scroll_render() {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content/content', get_post_type() );
		}
	}

	/**
	 * Customize Jetpack Infinite Scroll Js settings.
	 *
	 * @since 1.0.0
	 *
	 * @param array $settings Infinite Scroll JS settings.
	 */
	public function js_settings( $settings ) {
		$settings['text'] = esc_html__( 'Load more posts', 'aamla' );
		return $settings;
	}

	/**
	 * Enqueue scripts and styles to front end.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_front() {
		wp_enqueue_style(
			'aamla_jetpack_style',
			get_template_directory_uri() . '/add-on/jetpack/assets/jetpack.css',
			[],
			AAMLA_THEME_VERSION,
			'all'
		);

		wp_enqueue_script(
			'aamla_jetpack_js',
			get_template_directory_uri() . '/add-on/jetpack/assets/jetpack.js',
			[ 'jquery', 'aamla_media_manager_js' ],
			AAMLA_THEME_VERSION,
			true
		);
	}
}

JetPack::init();

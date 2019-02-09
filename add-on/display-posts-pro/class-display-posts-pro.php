<?php
/**
 * A widget to customize display of Posts, pages and custom post types.
 *
 * @package Bayleaf
 * @since 1.0.0
 */

namespace bayleaf;

/**
 * Customize display of Posts, pages and custom post types.
 *
 * @since  1.0.0
 */
class Display_Posts_Pro {

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
		add_filter( 'bayleaf_dp_styles', [ self::get_instance(), 'dp_styles' ], 12, 2 );
		add_filter( 'bayleaf_dp_style_args', [ self::get_instance(), 'get_style_args' ], 10, 2 );
		add_filter( 'bayleaf_dp_excerpt_length', [ self::get_instance(), 'excerpt_length' ], 10, 2 );
		add_filter( 'bayleaf_dp_excerpt_more', [ self::get_instance(), 'excerpt_more' ], 10, 2 );
		add_filter( 'bayleaf_dp_wrapper_classes', [ self::get_instance(), 'wrapper_classes' ], 10, 3 );
		add_action( 'bayleaf_after_dp_loop', [ self::get_instance(), 'navigate' ] );
	}

	/**
	 * Register widget display styles.
	 *
	 * @param array $styles   Array of supported posts display styles.
	 * @param array $instance Settings for the current widget instance.
	 * @return array Array of supported display styles.
	 */
	public function dp_styles( $styles, $instance ) {
		return array_merge( $styles,
			[
				'slider1' => esc_html__( 'Slider 1', 'bayleaf' ),
				'slider2' => esc_html__( 'Slider 2', 'bayleaf' ),
			]
		);
	}

	/**
	 * Register widget display posts entry wrapper classes.
	 *
	 * @param str    $classes  Comma separated entry posts classes.
	 * @param array  $instance Settings for the current widget instance.
	 * @param Object $widget   The widget instance.
	 * @return str Entry posts classes.
	 */
	public function wrapper_classes( $classes, $instance, $widget ) {
		if ( false !== strpos( $instance['styles'], 'slider' ) ) {
			$classes[] = 'slider-wrapper';
			$classes[] = 'widescreen';
		}
		return $classes;
	}

	/**
	 * Get args for displaying elements for specific dp style.
	 *
	 * @param arr $ins   Display posts instructions.
	 * @param str $style Style for this widget instance.
	 * @return array
	 */
	public function get_style_args( $ins, $style ) {

		switch ( $style ) {
			case 'slider1':
				$d = [ 'thumbnail-large', [ 'category', 'title', 'excerpt' ] ];
				break;
			case 'slider2':
				$d = [ 'thumbnail-large', [ [ 'title', 'excerpt' ] ] ];
				break;
			default:
				$d = $ins;
		}

		return $d;
	}

	/**
	 * Modify display post's excerpt length.
	 *
	 * @since 1.0.0
	 *
	 * @param int $length Excerpt length.
	 * @param str $style  Current display post style.
	 * @return int Excerpt length.
	 */
	public function excerpt_length( $length, $style ) {

		if ( 'slider1' === $style ) {
			$length = 0;
		}

		if ( 'slider2' === $style ) {
			$length = 25;
		}

		return $length;
	}

	/**
	 * Modify display post's excerpt length.
	 *
	 * @since 1.0.0
	 *
	 * @param str $teaser Excerpt teaser.
	 * @param str $style  Current display post style.
	 * @return int Excerpt teaser.
	 */
	public function excerpt_more( $teaser, $style ) {

		if ( 'slider1' === $style ) {
			$exrpt_url  = esc_url( get_permalink() );
			$exrpt_text = esc_html__( 'Read More', 'bayleaf' );
			$teaser     = sprintf( '<p class="dp-link-more"><a class="dp-more-link" href="%1$s">%2$s</a></p>', $exrpt_url, $exrpt_text );
		}

		return $teaser;
	}

	/**
	 * Display slider navigation.
	 *
	 * @since 1.0.0
	 *
	 * @param array $args Settings & args for the current widget instance.
	 */
	public function navigate( $args ) {
		$instance = $args['instance'];
		$query    = $args['query'];

		if ( 1 >= $query->post_count ) {
			return;
		}

		if ( false === strpos( $instance['styles'], 'slider' ) ) {
			return;
		}

		$navigation  = sprintf(
			'<button class="dp-prev-slide">%1$s<span class="screen-reader-text">%2$s</span></button>',
			bayleaf_get_icon( [ 'icon' => 'angle-left' ] ),
			esc_html__( 'Previous Slide', 'bayleaf' )
		);
		$navigation .= sprintf(
			'<button class="dp-next-slide">%1$s<span class="screen-reader-text">%2$s</span></button>',
			bayleaf_get_icon( [ 'icon' => 'angle-right' ] ),
			esc_html__( 'Next Slide', 'bayleaf' )
		);

		if ( 'slider2' === $instance['styles'] ) {
			echo $navigation; // WPCS xss ok. Contains HTML, other values escaped.
		} else {
			printf( '<div class="dp-slide-navigate">%s</div>', $navigation ); // WPCS xss ok. Contains HTML, other values escaped.
		}
	}
}

Display_Posts_Pro::init();

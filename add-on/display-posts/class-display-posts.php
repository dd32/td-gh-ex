<?php
/**
 * A widget to customize display of Posts, pages and custom post types.
 *
 * @package Aamla
 * @since 1.0.1
 */

namespace aamla;

/**
 * Customize display of Posts, pages and custom post types.
 *
 * @since  1.0.1
 */
class Display_Posts {

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
		add_filter( 'aamla_dp_classes', [ self::get_instance(), 'dp_classes' ], 10, 3 );
		add_filter( 'aamla_dp_styles', [ self::get_instance(), 'dp_styles' ], 10, 2 );
		add_action( 'widgets_init', [ self::get_instance(), 'register_custom_widget' ] );
		add_action( 'wp_enqueue_scripts', [ self::get_instance(), 'enqueue_front' ] );
		add_action( 'admin_enqueue_scripts', [ self::get_instance(), 'enqueue_admin' ] );
		add_action( 'aamla_dp_entry', [ self::get_instance(), 'dp_entry' ], 10, 3 );
	}

	/**
	 * Register widget display styles.
	 *
	 * @param array $styles   Array of supported posts display styles.
	 * @param array $instance Settings for the current widget instance.
	 * @return array Array of supported display styles.
	 */
	public function dp_styles( $styles, $instance ) {
		$styles = [
			'list-l-m'     => esc_html__( 'Mini List - Left Thumb', 'aamla' ),
			'list-r-m'     => esc_html__( 'Mini List - Right Thumb', 'aamla' ),
			'list-l-l'     => esc_html__( 'Large List - Left Thumb', 'aamla' ),
			'list-r-l'     => esc_html__( 'Large List - Right Thumb', 'aamla' ),
			'grid-default' => esc_html__( 'Default Grid', 'aamla' ),
			'grid-t'       => esc_html__( 'Only Thumb-Title Grid', 'aamla' ),
			'only-content' => esc_html__( 'Only Full content', 'aamla' ),
		];
		return $styles;
	}

	/**
	 * Register widget display posts entry classes.
	 *
	 * @param str    $classes  Comma separated entry posts classes.
	 * @param array  $instance Settings for the current widget instance.
	 * @param Object $widget   The widget instance.
	 * @return str Entry posts classes.
	 */
	public function dp_classes( $classes, $instance, $widget ) {
		$classes .= ' index-view';
		if ( in_array( $instance['styles'], [ 'grid-default', 'grid-t' ], true ) ) {
			$classes .= ' dp-grid';
		}
		return $classes;
	}

	/**
	 * Display widget content to front-end.
	 *
	 * @param array  $args     Widget display arguments.
	 * @param array  $instance Settings for the current widget instance.
	 * @param Object $widget   The widget instance.
	 */
	public function dp_entry( $args, $instance, $widget ) {
		$display = $this->get_style_args( $instance['styles'] );
		if ( $display[0] ) {
			$this->title();
		}
		if ( $display[1] ) {
			$this->meta( $display[1] );
		}
		if ( $display[2] ) {
			$this->featured( $this->get_thumb_size( $instance['styles'] ) );
		}
		if ( $display[3] ) {
			$this->main_content( $display[3] );
		}
	}

	/**
	 * Enqueue scripts and styles to front-end.
	 *
	 * @since 1.0.1
	 */
	public function enqueue_front() {
		wp_enqueue_style(
			'aamla_display_posts_style',
			get_template_directory_uri() . '/add-on/display-posts/assets/displayposts.css',
			array(),
			false,
			'all'
		);
	}

	/**
	 * Enqueue scripts and styles to admin.
	 *
	 * @since 1.0.1
	 */
	public function enqueue_admin() {
		$screen = get_current_screen();
		if ( ! in_array( $screen->id, array( 'page', 'widgets', 'customize' ), true ) ) {
			return;
		}

		wp_enqueue_style(
			'aamla_display_posts_admin_style',
			get_template_directory_uri() . '/add-on/display-posts/admin/displayposts.css',
			array(),
			false,
			'all'
		);
		wp_enqueue_script(
			'aamla_display_posts_admin_js',
			get_template_directory_uri() . '/add-on/display-posts/admin/displayposts.js',
			[ 'jquery' ],
			'1.0.0',
			true
		);
		wp_localize_script( 'aamla_display_posts_admin_js', 'aamlaDisplayPosts', [
			'nounce' => wp_create_nonce( 'display_posts' ),
			'fetch'  => esc_html__( 'Fetching Data...', 'aamla' ),
			'failed' => esc_html__( 'Nothing Found', 'aamla' ),
		] );
	}

	/**
	 * Get args for displaying elements for specific dp style.
	 *
	 * @param str $style Style for this widget instance.
	 * @return array
	 */
	public function get_style_args( $style ) {
		$t = true;
		$f = false;

		/*
		 * Default element display instructions.
		 * Instructions array to display particular entry element.
		 * [ 'title', [ 'date', 'author' ], ['thumbnail'], [ 'title', [ 'date', 'author', 'category' ], 'excerpt', 'content' ] ]
		 */

		switch ( $style ) {
			case 'list-l-m':
			case 'list-r-m':
				$d = [ $f, $f, $t, [ $t, [ $t, $t, $f ], $f, $f ] ];
				break;
			case 'list-l-l':
			case 'list-r-l':
				$d = [ $f, $f, $t, [ $t, [ $f, $f, $t ], $t, $f ] ];
				break;
			case 'grid-default':
				$d = [ $f, $f, $t, [ $t, $f, $t, $f ] ];
				break;
			case 'grid-t':
				$d = [ $f, $f, $t, [ $t, $f, $f, $f ] ];
				break;
			case 'only-content':
				$d = [ $f, $f, $f, [ $f, $f, $f, $t ] ];
				break;
			default:
				$d = [ $f, $f, $t, [ $t, [ $t, $t, $f ], $t, $f ] ];
		}

		return apply_filters( 'aamla_dp_style_args', $d, $style );
	}

	/**
	 * Get post thumbnail size.
	 *
	 * @param str $style      Style for this widget instance.
	 * @return str
	 */
	public function get_thumb_size( $style ) {

		$thumb_size = 'aamla-medium';

		if ( 'list-l-m' === $style || 'list-r-m' === $style ) {
			$thumb_size = 'thumbnail';
		}

		return apply_filters( 'aamla_dp_thumb_size', $thumb_size, $style );
	}

	/**
	 * Display post entry title.
	 *
	 * @since 1.0.1
	 */
	public function title() {
		if ( get_the_title() ) {
			the_title(
				sprintf(
					'<div class="dp-title"><a href="%s" rel="bookmark">',
					esc_url( get_permalink() )
				),
				'</a></div>'
			);
		}
	}

	/**
	 * Display post entry meta.
	 *
	 * @since 1.0.1
	 *
	 * @param array $instruct Date and author display instruction.
	 */
	public function meta( $instruct ) {
		$date   = '';
		$author = '';

		if ( $instruct[0] ) {
			$date = sprintf( '<span class="dp-date"><time datetime="%s">%s</time></span>',
				esc_attr( get_the_date( DATE_W3C ) ),
				esc_html( get_the_date( 'M j, Y' ) )
			);
		}

		if ( $instruct[1] ) {
			$author = sprintf( '<span class="dp-author"><a href="%s"><span>%s</span></a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_html( get_the_author_meta( 'display_name' ) )
			);
		}

		printf( '<div class="dp-meta">%s%s</div>', $author, $date ); // WPCS xss ok. Contains HTML, other values escaped.
	}

	/**
	 * Display post featured content.
	 *
	 * @since 1.0.1
	 *
	 * @param str $size Thumbanil Size.
	 */
	public function featured( $size ) {
		if ( has_post_thumbnail() || aamla_get_mod( 'aamla_thumbnail_placeholder', 'none' ) ) {
			aamla_markup(
				'dp-featured-content',
				[
					[ [ $this, 'thumbnail' ], $size ],
					[ 'aamla_get_template_partial', 'template-parts/meta', 'meta-permalink' ],
				]
			);
		}
	}

	/**
	 * Display post entry thumbnail.
	 *
	 * @since 1.0.1
	 *
	 * @param str $size Thumbanil Size.
	 */
	public function thumbnail( $size ) {
		echo '<div class="dp-thumbnail">';
		the_post_thumbnail( $size );
		echo '</div>';
	}

	/**
	 * Display main content.
	 *
	 * @since 1.0.1
	 *
	 * @param array $instruct Date and author display instruction.
	 */
	public function main_content( $instruct ) {
		echo '<div class="dp-main-content">';

		if ( $instruct[0] ) {
			$this->title();
		}

		if ( $instruct[1] ) {
			$this->meta( $instruct[1] );
		}

		if ( $instruct[2] ) {
			echo '<div class="dp-content">';
			$this->excerpt();
			echo '</div>';
		}

		if ( $instruct[3] ) {
			echo '<div class="dp-content">';
			the_content();
			echo '</div>';
		}

		echo '</div>';
	}

	/**
	 * Display post excerpt.
	 *
	 * Custom function has been used instead of core 'the_excerpt', in order to fecilitate
	 * different excerpt length from the main query excerpts.
	 *
	 * @since 1.0.1
	 *
	 * @param int $length Number of words in an excerpt.
	 */
	public function excerpt( $length = 20 ) {
		$text = get_the_content( '' );

		$text = wp_strip_all_tags( strip_shortcodes( $text ) );

		/** This filter is documented in wp-includes/post-template.php */
		$text = apply_filters( 'the_content', $text );
		$text = str_replace( ']]>', ']]&gt;', $text );

		/**
		 * Filters the number of words in an excerpt.
		 *
		 * @since 1.0.1
		 *
		 * @param int $number The number of words. Default 20.
		 */
		$excerpt_length = apply_filters( 'aamla_dp_excerpt_length', $length );

		/**
		 * Filters the string in the "more" link displayed after a trimmed excerpt.
		 *
		 * @since 1.0.1
		 *
		 * @param string $more_string The string shown within the more link.
		 */
		$excerpt_more = apply_filters( 'aamla_dp_excerpt_more', ' [&hellip;]' );
		$text         = wp_trim_words( $text, $excerpt_length, $excerpt_more );

		echo $text; // WPCS xss ok.
	}

	/**
	 * Register the custom Widget.
	 *
	 * @since 1.0.1
	 */
	public function register_custom_widget() {
		require_once get_template_directory() . '/add-on/display-posts/class-display-posts-widget.php';
		register_widget( 'aamla\Display_Posts_Widget' );
	}
}

Display_Posts::init();

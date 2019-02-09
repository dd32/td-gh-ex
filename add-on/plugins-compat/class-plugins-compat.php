<?php
/**
 * Making Bayleaf theme compatible with various plugins.
 *
 * @package Bayleaf
 * @since 1.0.0
 */

namespace bayleaf;

/**
 * Bayleaf theme's compatibility with various plugins.
 *
 * @since  1.0.0
 */
class Plugins_Compat {

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
		// Compatibility to Event Calender Plugin.
		if ( class_exists( 'Tribe__Events__Main' ) ) {
			add_filter( 'bayleaf_markup_entry_index_wrapper', [ self::get_instance(), 'display_events' ] );
			add_filter( 'bayleaf_template_page_header', [ self::get_instance(), 'disable_page_header' ] );
			add_filter( 'bayleaf_template_entry_author', [ self::get_instance(), 'disable_entry_author' ] );
			add_filter( 'bayleaf_markup_entry_main_content', [ self::get_instance(), 'remove_header' ] );
			add_filter( 'bayleaf_display_posts_excerpt', [ self::get_instance(), 'modify_dp_excerpts' ], 10, 2 );
			add_filter( 'bayleaf_dp_style_args', [ self::get_instance(), 'modify_dp_items' ], 10, 2 );
			add_filter( 'bayleaf_dp_entry_classes', [ self::get_instance(), 'entry_classes' ], 12, 3 );
			add_filter( 'bayleaf_after_dp_widget_title', [ self::get_instance(), 'dp_wid_title' ], 10, 2 );
			add_action( 'bayleaf_display_dp_item', [ self::get_instance(), 'display_dp_item' ] );
		}
	}

	/**
	 * Display all events on events archive pages.
	 *
	 * @param  array $callbacks Array of display functions.
	 * @return array Revised array of display functions.
	 */
	public function display_events( $callbacks ) {
		if ( is_post_type_archive( 'tribe_events' ) ) {
			$callbacks = [ [ 'bayleaf_get_template_partial', 'template-parts/post', 'entry-content' ] ];
		}

		return $callbacks;
	}

	/**
	 * Disable page header.
	 *
	 * @param  str $file Template file name.
	 * @return string
	 */
	public function disable_page_header( $file ) {
		if ( is_post_type_archive( 'tribe_events' ) ) {
			$file = '';
		}

		return $file;
	}

	/**
	 * Disable page header.
	 *
	 * @param  str $file Template file name.
	 * @return string
	 */
	public function disable_entry_author( $file ) {
		if ( is_singular( 'tribe_events' ) ) {
			$file = '';
		}

		return $file;
	}

	/**
	 * Remove entry header from 'tribe_events' post type.
	 *
	 * @param  array $functions Array of display functions.
	 * @return array Revised array of display functions.
	 */
	public function remove_header( $functions ) {
		if ( is_singular( [ 'tribe_events' ] ) ) {
			$key = array_search( 'bayleaf_entry_header_wrapper', $functions, true );
			if ( false !== $key ) {
				unset( $functions[ $key ] );
			}
		}
		return $functions;
	}

	/**
	 * Modify display posts excerpts to show event details.
	 *
	 * @param bool $return Returning true will short circuit original function.
	 * @param str  $style  Display posts style.
	 * @return bool
	 */
	public function modify_dp_excerpts( $return, $style ) {
		if ( 'tribe_events' === get_post_type() ) {
			bayleaf_get_template_partial( 'add-on/plugins-compat/templates', 'venue' );
			return true;
		}
		return $return;
	}

	/**
	 * Modify display posts items for 'tribe_events' post type.
	 *
	 * @param arr $d     Post items display instructions.
	 * @param str $style Display posts style.
	 * @return bool
	 */
	public function modify_dp_items( $d, $style ) {
		if ( 'tribe_events' === get_post_type() ) {
			if ( in_array( $style, [ 'grid-view1', 'grid-view2', 'grid-view3' ], true ) ) {
				$d = [ 'thumbnail-medium', [ 'title', 'event-time' ] ];
			}
		}
		return $d;
	}

	/**
	 * Show display posts items for 'tribe_events' post type.
	 *
	 * @param str $item Post item to be displayed.
	 */
	public function display_dp_item( $item ) {
		switch ( $item ) {
			case 'event-time':
				echo tribe_events_event_schedule_details( null, '<div class="dp-categories"', '</div>' ); // WPCS xss ok. Plugin's display safe function.
				break;
			default:
				break;
		}
	}

	/**
	 * Register widget display posts entry classes.
	 *
	 * @param str    $classes  Comma separated entry posts classes.
	 * @param array  $instance Settings for the current widget instance.
	 * @param Object $widget   The widget instance.
	 * @return str Entry posts classes.
	 */
	public function entry_classes( $classes, $instance, $widget ) {
		if ( 'tribe_events' === get_post_type() ) {
			$classes[] = 'dp-event no-zig';
		}
		return $classes;
	}

	/**
	 * Add items to widget title area.
	 *
	 * @param array $after_title Items before closing of widget title.
	 * @param array $instance    Settings for the current widget instance.
	 * @return str
	 */
	public function dp_wid_title( $after_title, $instance ) {
		$link_html = '';

		// Change only if theme specific after_title args has not been altered.
		if ( '</span></h3>' !== $after_title ) {
			return $after_title;
		}

		if ( 'tribe_events' === $instance['post_type'] ) {
			$link_html = sprintf( '<span class="dp-term-links"><a class="term-link" href="%1$s">%2$s %3$s</a></span>', esc_url( tribe_get_events_link() ), esc_html__( 'Calender', 'bayleaf' ), bayleaf_get_icon( array( 'icon' => 'long-arrow-right' ) ) );
		}

		return '</span>' . $link_html . '</h3>';
	}
}
Plugins_Compat::init();

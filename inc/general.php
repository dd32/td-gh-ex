<?php
/**
 * General functions.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'asagi_scripts' ) ) {
	add_action( 'wp_enqueue_scripts', 'asagi_scripts' );
	/**
	 * Enqueue scripts and styles
	 */
	function asagi_scripts() {
		$asagi_settings = wp_parse_args(
			get_option( 'asagi_settings', array() ),
			asagi_get_defaults()
		);

		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		$dir_uri = get_template_directory_uri();

		wp_enqueue_style( 'asagi-style-grid', $dir_uri . "/css/unsemantic-grid{$suffix}.css", false, ASAGI_VERSION, 'all' );
		wp_enqueue_style( 'asagi-style', $dir_uri . "/style{$suffix}.css", array( 'asagi-style-grid' ), ASAGI_VERSION, 'all' );
		wp_enqueue_style( 'asagi-mobile-style', $dir_uri . "/css/mobile{$suffix}.css", array( 'asagi-style' ), ASAGI_VERSION, 'all' );

		if ( is_child_theme() ) {
			wp_enqueue_style( 'asagi-child', get_stylesheet_uri(), array( 'asagi-style' ), filemtime( get_stylesheet_directory() . '/style.css' ), 'all' );
		}

		if ( ! apply_filters( 'asagi_fontawesome_essentials', false ) ) {
			wp_enqueue_style( 'font-awesome', $dir_uri . "/css/font-awesome{$suffix}.css", false, '4.7', 'all' );
		}

		if ( function_exists( 'wp_script_add_data' ) ) {
			wp_enqueue_script( 'asagi-classlist', $dir_uri . "/js/classList{$suffix}.js", array(), ASAGI_VERSION, true );
			wp_script_add_data( 'asagi-classlist', 'conditional', 'lte IE 11' );
		}

		wp_enqueue_script( 'asagi-menu', $dir_uri . "/js/menu{$suffix}.js", array(), ASAGI_VERSION, true );
		wp_enqueue_script( 'asagi-a11y', $dir_uri . "/js/a11y{$suffix}.js", array(), ASAGI_VERSION, true );

		if ( 'click' == $asagi_settings[ 'nav_dropdown_type' ] || 'click-arrow' == $asagi_settings[ 'nav_dropdown_type' ] ) {
			wp_enqueue_script( 'asagi-dropdown-click', $dir_uri . "/js/dropdown-click{$suffix}.js", array( 'asagi-menu' ), ASAGI_VERSION, true );
		}

		if ( 'enable' == $asagi_settings['nav_search'] ) {
			wp_enqueue_script( 'asagi-navigation-search', $dir_uri . "/js/navigation-search{$suffix}.js", array( 'asagi-menu' ), ASAGI_VERSION, true );
		}

		if ( 'enable' == $asagi_settings['back_to_top'] ) {
			wp_enqueue_script( 'asagi-back-to-top', $dir_uri . "/js/back-to-top{$suffix}.js", array(), ASAGI_VERSION, true );
		}

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}

if ( ! function_exists( 'asagi_widgets_init' ) ) {
	add_action( 'widgets_init', 'asagi_widgets_init' );
	/**
	 * Register widgetized area and update sidebar with default widgets
	 */
	function asagi_widgets_init() {
		$widgets = array(
			'sidebar-1' => __( 'Right Sidebar', 'asagi' ),
			'sidebar-2' => __( 'Left Sidebar', 'asagi' ),
			'header' => __( 'Header', 'asagi' ),
			'footer-1' => __( 'Footer Widget 1', 'asagi' ),
			'footer-2' => __( 'Footer Widget 2', 'asagi' ),
			'footer-3' => __( 'Footer Widget 3', 'asagi' ),
			'footer-4' => __( 'Footer Widget 4', 'asagi' ),
			'footer-5' => __( 'Footer Widget 5', 'asagi' ),
			'footer-bar' => __( 'Footer Bar','asagi' ),
			'top-bar' => __( 'Top Bar','asagi' ),
		);

		foreach ( $widgets as $id => $name ) {
			register_sidebar( array(
				'name'          => $name,
				'id'            => $id,
				'before_widget' => '<aside id="%1$s" class="widget inner-padding %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => apply_filters( 'asagi_start_widget_title', '<h2 class="widget-title">' ),
				'after_title'   => apply_filters( 'asagi_end_widget_title', '</h2>' ),
			) );
		}
	}
}

if ( ! function_exists( 'asagi_smart_content_width' ) ) {
	add_action( 'wp', 'asagi_smart_content_width' );
	/**
	 * Set the $content_width depending on layout of current page
	 * Hook into "wp" so we have the correct layout setting from asagi_get_layout()
	 * Hooking into "after_setup_theme" doesn't get the correct layout setting
	 */
	function asagi_smart_content_width() {
		global $content_width;

		$container_width = asagi_get_setting( 'container_width' );
		$right_sidebar_width = apply_filters( 'asagi_right_sidebar_width', '25' );
		$left_sidebar_width = apply_filters( 'asagi_left_sidebar_width', '25' );
		$layout = asagi_get_layout();

		if ( 'left-sidebar' == $layout ) {
			$content_width = $container_width * ( ( 100 - $left_sidebar_width ) / 100 );
		} elseif ( 'right-sidebar' == $layout ) {
			$content_width = $container_width * ( ( 100 - $right_sidebar_width ) / 100 );
		} elseif ( 'no-sidebar' == $layout ) {
			$content_width = $container_width;
		} else {
			$content_width = $container_width * ( ( 100 - ( $left_sidebar_width + $right_sidebar_width ) ) / 100 );
		}
	}
}

if ( ! function_exists( 'asagi_page_menu_args' ) ) {
	add_filter( 'wp_page_menu_args', 'asagi_page_menu_args' );
	/**
	 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
	 *
	 *
	 * @param array $args The existing menu args.
	 * @return array Menu args.
	 */
	function asagi_page_menu_args( $args ) {
		$args['show_home'] = true;
		return $args;
	}
}

if ( ! function_exists( 'asagi_disable_title' ) ) {
	add_filter( 'asagi_show_title', 'asagi_disable_title' );
	/**
	 * Remove our title if set.
	 *
	 *
	 * @return bool Whether to display the content title.
	 */
	function asagi_disable_title() {
		global $post;

		$disable_headline = ( isset( $post ) ) ? get_post_meta( $post->ID, '_asagi-disable-headline', true ) : '';

		if ( ! empty( $disable_headline ) && false !== $disable_headline ) {
			return false;
		}

		return true;
	}
}

if ( ! function_exists( 'asagi_resource_hints' ) ) {
	add_filter( 'wp_resource_hints', 'asagi_resource_hints', 10, 2 );
	/**
	 * Add resource hints to our Google fonts call.
	 *
	 *
	 * @param array  $urls           URLs to print for resource hints.
	 * @param string $relation_type  The relation type the URLs are printed.
	 * @return array $urls           URLs to print for resource hints.
	 */
	function asagi_resource_hints( $urls, $relation_type ) {
		if ( wp_style_is( 'asagi-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
			if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '>=' ) ) {
				$urls[] = array(
					'href' => 'https://fonts.gstatic.com',
					'crossorigin',
				);
			} else {
				$urls[] = 'https://fonts.gstatic.com';
			}
		}
		return $urls;
	}
}

if ( ! function_exists( 'asagi_remove_caption_padding' ) ) {
	add_filter( 'img_caption_shortcode_width', 'asagi_remove_caption_padding' );
	/**
	 * Remove WordPress's default padding on images with captions
	 *
	 * @param int $width Default WP .wp-caption width (image width + 10px)
	 * @return int Updated width to remove 10px padding
	 */
	function asagi_remove_caption_padding( $width ) {
		return $width - 10;
	}
}

if ( ! function_exists( 'asagi_enhanced_image_navigation' ) ) {
	add_filter( 'attachment_link', 'asagi_enhanced_image_navigation', 10, 2 );
	/**
	 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
	 */
	function asagi_enhanced_image_navigation( $url, $id ) {
		if ( ! is_attachment() && ! wp_attachment_is_image( $id ) ) {
			return $url;
		}

		$image = get_post( $id );
		if ( ! empty( $image->post_parent ) && $image->post_parent != $id ) {
			$url .= '#main';
		}

		return $url;
	}
}

if ( ! function_exists( 'asagi_categorized_blog' ) ) {
	/**
	 * Determine whether blog/site has more than one category.
	 *
	 *
	 * @return bool True of there is more than one category, false otherwise.
	 */
	function asagi_categorized_blog() {
		if ( false === ( $all_the_cool_cats = get_transient( 'asagi_categories' ) ) ) {
			// Create an array of all the categories that are attached to posts.
			$all_the_cool_cats = get_categories( array(
				'fields'     => 'ids',
				'hide_empty' => 1,

				// We only need to know if there is more than one category.
				'number'     => 2,
			) );

			// Count the number of categories that are attached to the posts.
			$all_the_cool_cats = count( $all_the_cool_cats );

			set_transient( 'asagi_categories', $all_the_cool_cats );
		}

		if ( $all_the_cool_cats > 1 ) {
			// This blog has more than 1 category so twentyfifteen_categorized_blog should return true.
			return true;
		} else {
			// This blog has only 1 category so twentyfifteen_categorized_blog should return false.
			return false;
		}
	}
}

if ( ! function_exists( 'asagi_category_transient_flusher' ) ) {
	add_action( 'edit_category', 'asagi_category_transient_flusher' );
	add_action( 'save_post',     'asagi_category_transient_flusher' );
	/**
	 * Flush out the transients used in {@see asagi_categorized_blog()}.
	 *
	 */
	function asagi_category_transient_flusher() {
		// Like, beat it. Dig?
		delete_transient( 'asagi_categories' );
	}
}

if ( ! function_exists( 'asagi_get_default_color_palettes' ) ) {
	/**
	 * Set up our colors for the color picker palettes and filter them so you can change them.
	 *
	 */
	function asagi_get_default_color_palettes() {
		$palettes = array(
			'#000000',
			'#FFFFFF',
			'#F1C40F',
			'#E74C3C',
			'#1ABC9C',
			'#1e72bd',
			'#8E44AD',
			'#00CC77',
		);

		return apply_filters( 'asagi_default_color_palettes', $palettes );
	}
}

add_filter( 'asagi_fontawesome_essentials', 'asagi_set_font_awesome_essentials' );
/**
 * Check to see if we should include the full Font Awesome library or not.
 *
 *
 * @param bool $essentials
 * @return bool
 */
function asagi_set_font_awesome_essentials( $essentials ) {
	if ( asagi_get_setting( 'font_awesome_essentials' ) ) {
		return true;
	}

	return $essentials;
}

add_filter( 'asagi_dynamic_css_skip_cache', 'asagi_skip_dynamic_css_cache' );
/**
 * Skips caching of the dynamic CSS if set to false.
 *
 *
 * @param bool $cache
 * @return bool
 */
function asagi_skip_dynamic_css_cache( $cache ) {
	if ( ! asagi_get_setting( 'dynamic_css_cache' ) ) {
		return true;
	}

	return $cache;
}

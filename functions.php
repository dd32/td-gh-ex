<?php
/**
 * Functions and definitions.
 *
 * @package aesblo
 * @since 1.0.0
 */
 
/**
 * The theme only works in WordPress 4.1 or later.
 *
 * @since 1.0.0
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) {
	require get_template_directory() . '/inc/class-back-compat.php';
}

 
if ( ! function_exists( 'aesblo_setup' ) ) :
/**
 * Setup theme features.
 *
 * @since 1.0.0
 */
function aesblo_setup() {
	// Set the $content_width
	$GLOBALS['content_width'] = apply_filters( 'aesblo_content_width', 900 );
	
	// Interationalization for theme.
	load_theme_textdomain( 'aesblo', get_template_directory() . '/languages' );
	
	// Automatic Feed Links for post and comment in the head.
	add_theme_support( 'automatic-feed-links' );
	
	// Manage the document title tag
	add_theme_support( 'title-tag' );
	
	// Support for the Featured Image 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1080, 608, true );
	
	// Allows the use of HTML5 markup for the search forms, comment forms, comment lists, gallery, and caption. 
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	// Enables Post Formats support for a Theme.
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'gallery',
		'video',
		'audio',
		'quote',
		'link',
		'status',
		'chat'
	) );
	
	// Custom header
	add_theme_support( 'custom-header', array(
		'width'									=> 992,
		'height'								=> 1300
	) );
	
	// custom background
	add_theme_support( 'custom-background', array(
		'default-color'			=> '#f1f1f1'
	) );		 
	 
	// Register primary menu.
	register_nav_menu( 'primary', __( 'Primary Menu', 'aesblo' ) );
	
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css', aesblo_fonts_url() ) );
}
endif;		// end aesblo_setup().
 
add_action( 'after_setup_theme', 'aesblo_setup' );


if ( ! function_exists( 'aesblo_fonts_url' ) ) :
/**
 * Register Google fonts for the theme.
 *
 * @since 1.0.1
 *
 * @return string Google fonts URL for the theme.
 */
function aesblo_fonts_url() {
	$fonts_url = '';
	$fonts     = array();

	/* translators: If there are characters in your language that are not supported by Alegreya Sans font, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Alegreya Sans font: on or off', 'aesblo' ) ) {
		$fonts[] = 'Alegreya Sans:400,400italic,700';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;


/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since 1.0.1
 */
function aesblo_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'aesblo_javascript_detection', 0 );
 
 
/**
 * Register widgets area.
 *
 * @since 1.0.0
 */
function aesblo_register_sidebars() {
	// Primary widget.
	register_sidebar( array(
		'name'				=> __( 'Primary Sidebar', 'aesblo' ),
		'id'				=> 'primary-sidebar',
		'description'		=> __( 'Displaying under the nav menu.', 'aesblo' ),
		'class'				=> '',
		'before_widget'		=> '<section id="%1$s" class="widget %2$s">',
		'after_widget'		=> '</section>',
		'before_title'  	=> '<h3 class="widget-title text-divider">',
		'after_title'		=> '</h3>'	
	) );
	
	// Secondary widget.
	register_sidebar( array(
		'name'				=> __( 'Secondary Sidebar', 'aesblo' ),
		'id'				=> 'secondary-sidebar',
		'description'		=> __( 'Displaying when click the toggle icon.', 'aesblo' ),
		'class'				=> '',
		'before_widget'		=> '<section id="%1$s" class="widget %2$s">',
		'after_widget'		=> '</section>',
		'before_title'  	=> '<h3 class="widget-title text-divider">',
		'after_title'		=> '</h3>'	
	) );	
}	
  
add_action( 'widgets_init', 'aesblo_register_sidebars' );


/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 */
function aesblo_enqueue_scripts() {
	// Google fonts
	wp_enqueue_style( 'aseblo-Alegreya-Sans', aesblo_fonts_url() );
	
	// Font awesome
	wp_enqueue_style( 'aesblo-fontawesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );
	
	// Include style.css file.
	wp_enqueue_style( 'aesblo-style', get_stylesheet_uri() );
	
	// Theme javascript functions file.
	wp_enqueue_script( 'aesblo-functions', get_template_directory_uri() . '/assets/js/functions.js', array( 'jquery' ), '', true );
	wp_localize_script( 'aesblo-functions', 'aesblo', array(
		'videoResponsive' 			=> apply_filters( 'aesblo_video_responsive', '16:9' ),
		'expandMenu' 						=> __( 'expand child menu', 'aesblo' ),
		'collapseMenu' 					=> __( 'collapse child menu', 'aesblo' )
	) );
	
	// Comment reply.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'aesblo_enqueue_scripts' );


if ( ! class_exists( 'aesblo_walker_primary_nav_menu' ) ) {
	/**
	 * Primary nav menu walker.
	 *
	 * @since 1.0.0
	 */
	class aesblo_walker_primary_nav_menu extends Walker_Nav_Menu {
		/**
		 * Start the element output.
		 *
		 * @see Walker::start_el()
		 *
		 * @since 1.0.0
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item   Menu item data object.
		 * @param int    $depth  Depth of menu item. Used for padding.
		 * @param array  $args   An array of arguments. @see wp_nav_menu()
		 * @param int    $id     Current item ID.
		 */
		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
	
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;
	
			/**
			 * Filter the CSS class(es) applied to a menu item's list item element.
			 *
			 * @param array  $classes The CSS classes that are applied to the menu item's `<li>` element.
			 * @param object $item    The current menu item.
			 * @param array  $args    An array of {@see wp_nav_menu()} arguments.
			 * @param int    $depth   Depth of menu item. Used for padding.
			 */
			 
			// Fetch the icon class name
			$classes = array_filter( $classes );
			$icon_class = '';
			if ( $classes ) {
				$i = 0;
				foreach ( $classes as $class ) {
					if ( false !== strpos( $class, 'fa-' ) ) {
						$icon_class = $class;
						unset( $classes[ $i ] );
						break;
					}
					$i++;
				}
			}
					 
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', $classes, $item, $args, $depth ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
	
			/**
			 * Filter the ID applied to a menu item's list item element.
			 *
			 * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
			 * @param object $item    The current menu item.
			 * @param array  $args    An array of {@see wp_nav_menu()} arguments.
			 * @param int    $depth   Depth of menu item. Used for padding.
			 */
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
	
			$output .= $indent . '<li' . $id . $class_names .'>';
	
			$atts = array();
			$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
			$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
			$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
			$atts['href']   = ! empty( $item->url )        ? $item->url        : '';
	
			/**
			 * Filter the HTML attributes applied to a menu item's anchor element.
			 *
			 * @param array $atts {
			 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
			 *
			 *     @type string $title  Title attribute.
			 *     @type string $target Target attribute.
			 *     @type string $rel    The rel attribute.
			 *     @type string $href   The href attribute.
			 * }
			 * @param object $item  The current menu item.
			 * @param array  $args  An array of {@see wp_nav_menu()} arguments.
			 * @param int    $depth Depth of menu item. Used for padding.
			 */
			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
	
			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}
	
			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			
			// Add a icon element into the a tag.
			if ( $icon_class ) {
				$item_output .= sprintf( '<span class="fa %s"></span>', $icon_class );
			}
			
			// Add menu description.
			$item_description = $item->description ? '<p class="menu-item-description">' . $item->description . '</p>' : '';
			
			/** This filter is documented in wp-includes/post-template.php */
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $item_description . $args->link_after;
			$item_output .= '</a>';
			
			// Add icon for opening or closing sub menus.
			if ( in_array( 'menu-item-has-children', (array) $item->classes ) ) {
				$aria_expanded = 'false';
				$screen_reader_text = sprintf( '<span class="screen-reader-text">%s</span>', __( 'expand child menu', 'aesblo' ) );
				if ( in_array( 'current-menu-ancestor', (array) $item->classes ) ) {
					$aria_expanded = 'true';
					$screen_reader_text = sprintf( '<span class="screen-reader-text">%s</span>', __( 'collapse child menu', 'aesblo' ) );
				}
				
				$item_output .= sprintf( 
					'<button type="button" class="submenu-switch" aria-expanded="%1$s">%2$s<span class="fa fa-angle-down"></span></button>',
					$aria_expanded,
					$screen_reader_text
				);
			}		
			
			$item_output .= $args->after;
	
			/**
			 * Filter a menu item's starting output.
			 *
			 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
			 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
			 * no filter for modifying the opening and closing `<li>` for a menu item.
			 *
			 * @param string $item_output The menu item's starting HTML output.
			 * @param object $item        Menu item data object.
			 * @param int    $depth       Depth of menu item. Used for padding.
			 * @param array  $args        An array of {@see wp_nav_menu()} arguments.
			 */
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
}


/**
 * Add post classes.
 *
 * @since 1.0.0
 *
 * @return 
 */
function aesblo_post_class( $class ) {
	if ( '' === get_the_title() ) {
		$class[] = 'no-post-title';
	}
	
	return $class;
}

add_filter( 'post_class', 'aesblo_post_class' );


if ( ! function_exists( 'aesblo_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a 'Continue reading' link.
 *
 * @since 1.0.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function aesblo_excerpt_more( $more ) {
	$link = sprintf( ' ... <p><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		sprintf( __( 'Continue reading &raquo; %s', 'aesblo' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
	);
	return $link;
}
add_filter( 'excerpt_more', 'aesblo_excerpt_more' );
endif;


/**
 * Custom template tags.
 *
 * @since 1.0.0
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Custom Style.
 *
 * @since 1.0.0
 */
require get_template_directory() . '/inc/class-custom-style.php';


/**
 * Customizer
 *
 * @since 1.0.0
 */
require get_template_directory() . '/inc/class-customizer.php';
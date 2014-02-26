<?php
/**
 * thebox functions and definitions
 *
 * @package thebox
 * @since thebox 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since thebox 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 590; /* pixels */

/*
 * Load Jetpack compatibility file.
 */
require( get_template_directory() . '/inc/jetpack.php' );

if ( ! function_exists( 'thebox_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since thebox 1.0
 */
 
function thebox_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Customizer additions
	 */
	require( get_template_directory() . '/inc/customizer.php' );
	
	/**
	* Load the Theme Options Page for social media icons
	*/
	require get_template_directory() . '/inc/theme-options.php';
	
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on thebox, use a find and replace
	 * to change 'thebox' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'thebox', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );
	
	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 590, 9999, true ); //590 pixels wide (and unlimited height)
	
	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'thebox' ),
		'secondary' => __( 'Secondary Menu', 'thebox' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // thebox_setup
add_action( 'after_setup_theme', 'thebox_setup' );

/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for WordPress 3.3
 * using feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Remove the 3.3 support when WordPress 3.6 is released.
 *
 * Hooks into the after_setup_theme action.
 */
 
function thebox_register_custom_background() {
	$args = array(
		'default-color' => 'f0f3f5',
		'default-image' => '',
	);

	$args = apply_filters( 'thebox_custom_background_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-background', $args );
	} else {
		define( 'BACKGROUND_COLOR', $args['default-color'] );
		if ( ! empty( $args['default-image'] ) )
			define( 'BACKGROUND_IMAGE', $args['default-image'] );
		add_theme_support( 'custom-background' ) ;
	}
}
add_action( 'after_setup_theme', 'thebox_register_custom_background' );


/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since thebox 1.0
 */
 
function thebox_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar Primary', 'thebox' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',	
	) );
	register_sidebar( array(
		'name' => __( 'Footer', 'thebox' ),
		'id' => 'sidebar-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'thebox_widgets_init' );


/**
 * Enqueue scripts and styles
 */
 
function thebox_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'thebox_scripts' );


/**
 * Implement the Custom Header feature
 */
 
require( get_template_directory() . '/inc/custom-header.php' );


function custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/**
 * Implement Custom Colors feature
 */

function thebox_custom_colors_register( $wp_customize ) {
	$colors = array();
	
	$colors[] = array(
	'slug'=>'color_primary', 
	'default' => '#0fa5d9',
	'label' => __('Primary Color ', 'thebox')
	);
	
	foreach( $colors as $color ) {
	// SETTINGS
	$wp_customize->add_setting(
		$color['slug'], array(
			'default' => $color['default'],
			'type' => 'option', 
			'capability' => 
			'edit_theme_options'
		)
	);
	// CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$color['slug'], 
			array('label' => $color['label'], 
			'section' => 'colors',
			'settings' => $color['slug'])
		)
	);
	}
	
}

add_action( 'customize_register', 'thebox_custom_colors_register' );


/*
 * Change excerpt text
 *
 */
function thebox_excerpt($num) {
	global $post;
	$limit = $num+1;
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt)."... <br><a class=\"more-link\" href='" .get_permalink($post->ID) ." '>".__('Read more', 'short-news')." &raquo;</a>";
	echo $excerpt;
    }
    
    
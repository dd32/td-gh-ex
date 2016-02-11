<?php
/**
 * actions setup functions
 *
 * @package actions
 */

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function actions_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'actions_content_width', 640 );
}
add_action( 'after_setup_theme', 'actions_content_width', 0 );

/**
 * Assign the Actions version to a var
 */
$theme 					= wp_get_theme( 'actions' );
$actions_version 	= $theme['Version'];

if ( ! function_exists( 'actions_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function actions_setup() {

		/*
	     * Make theme available for translation.
	     * Translations can be filed in the /languages/ directory.
	     * If you're building a theme based on actions, use a find and replace
	     * to change 'actions' to the name of your theme in all the template files.
	     */
	    load_theme_textdomain( 'actions', get_template_directory() . '/languages' );

		/**
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 640, 300 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary'		=> __( 'Primary Menu', 'actions' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, comments, galleries, captions and widgets
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'widgets',
		) );

		// Add support for the Site Logo plugin and the site logo functionality in JetPack
		// https://github.com/automattic/site-logo
		// http://jetpack.me/
		
		$args = array(
            'header-text' => array(
                'site-title',
                'site-description',
            ),
            'size' => 'medium',
        );
        add_theme_support( 'site-logo', $args );		

		// Declare support for title theme feature
		add_theme_support( 'title-tag' );
	}
endif; // actions_setup

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function actions_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'actions' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

/**
 * Enqueue scripts and styles.
 * @since  1.0.0
 */
function actions_scripts() {
	global $actions_version;

	wp_enqueue_style( 'actions-style', get_template_directory_uri() . '/style.css', '', $actions_version );

	wp_style_add_data( 'actions-style', 'rtl', 'replace' );

	wp_enqueue_script( 'actions-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20120206', true );

	wp_enqueue_script( 'actions-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/**
 * Enqueue child theme stylesheet.
 * A separate function is required as the child theme css needs to be enqueued _after_ the parent theme
 * primary css and the separate WooCommerce css.
 * @since  1.0.0
 */
function actions_child_scripts() {
	if ( is_child_theme() ) {
		wp_enqueue_style( 'actions-child-style', get_stylesheet_uri(), '' );
	}
}
<?php
/**
 * aquaparallax functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package aquaparallax
 */
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if ( ! isset( $content_width ) ) $content_width = 640;

function aquaparallax_setup()  {
    /*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Aquaparallax Theme, use a find and replace
	 */
	load_theme_textdomain( 'aquaparallax', get_template_directory() . '/languages' );

    add_theme_support( 'title-tag' );

    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'automatic-feed-links' );

    // Add theme support for Custom Header
    $args = array(
    'flex-width'    => true,
    'width'         => 980,
    'flex-height'   => true,
    'height'        => 200,
    'default-image' => get_template_directory_uri() . '/assets/images/banner.jpg',
    );
    add_theme_support( 'custom-header', $args );
	
	// Add theme support for Custom Background
	$background_args = array(
		'default-color'          => '#cccccc',
		'default-image' 		 => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-background', $background_args );
   
    // Add theme support for Custom Logo
	$defaults = array(
        'height'      => 71,
        'width'       => 255,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );

    /*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

    // This theme uses wp_nav_menu() in one location. 
    register_nav_menus(
    array(
      'header-menu' => esc_html( 'Header Menu', 'aquaparallax' ),
      )
    );

   	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
}

add_action( 'after_setup_theme', 'aquaparallax_setup' );


// wp enque script and style
function aquaparallax_scripts() {
    // aquaparallax styles
    wp_enqueue_style( 'aquaparallax-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', true, '', 'all' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', false, '', 'all' );
	wp_enqueue_style( 'aquaparallax-styles', get_template_directory_uri() . '/assets/css/styles.css', false, '', 'all' );
	wp_enqueue_style( 'aquaparallax-responsive', get_template_directory_uri() . '/assets/css/responsive.css', false, '', 'all' );
	wp_enqueue_style( 'meanmenu', get_template_directory_uri() . '/assets/css/meanmenu.min.css', false, '', 'all' );
	wp_enqueue_style( 'aquaparallax-pagination', get_template_directory_uri() . '/assets/css/pagination.css', false, '', 'all' );
	wp_enqueue_style( 'google-font', '//fonts.googleapis.com/css?family=Pacifico|Roboto:400,500,700', false, '', 'all' );

    // aquaparallax scripts
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.js', array( 'jquery' ), '', true ); 
	wp_enqueue_script( 'meanmenu-js', get_template_directory_uri() . '/assets/js/jquery.meanmenu.min.js', array( 'jquery' ), '', true ); 
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider-min.js', array( 'jquery' ), '', true ); 
	wp_enqueue_script( 'menu-jquery', get_template_directory_uri() . '/assets/js/menu-jquery.js', array( 'jquery' ), '', true );  
	wp_enqueue_script( 'nav-jquery', get_template_directory_uri() . '/assets/js/nav.jquery.min.js', array( 'jquery' ), '', true );	 
	wp_enqueue_script( 'aquaparallax-main-js', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '', true );
	// Pull Masonry from the core of WordPress
    wp_enqueue_script( 'masonry' ); 
 
    //Pull Masonry from a cdn
    wp_enqueue_script( 'masonry', '//cdnjs.cloudflare.com/ajax/libs/masonry/3.1.2/masonry.pkgd.js' );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_enqueue_scripts', 'aquaparallax_scripts');



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aquaparallax_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'aquaparallax_content_width', 640 );
}
add_action( 'after_setup_theme', 'aquaparallax_content_width', 0 );

// Aquaparallax Register widget
function aquaparallax_widgets_init() {
	// Right Sidebar
	register_sidebar( array(
		'name'          => esc_html( 'Right Sidebar', 'aquaparallax' ),
		'id'            => 'aquaparallax_right_sidebar',
		'description'   => esc_html( 'Add widgets here for right sidebar.', 'aquaparallax' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	// Left Sidebar
	register_sidebar( array(
		'name'          => esc_html( 'Left Sidebar', 'aquaparallax' ),
		'id'            => 'aquaparallax_left_sidebar',
		'description'   => esc_html( 'Add widgets here for left sidebar.', 'aquaparallax' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	// Footer 1
	register_sidebar( array(
		'name'          => esc_html( 'Footer Sidebar 1', 'aquaparallax' ),
		'id'            => 'aquaparallax_footer_sidebar1',
		'description'   => esc_html( 'Add widgets here for footer sidebar 1.', 'aquaparallax' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	// Footer 2
	register_sidebar( array(
		'name'          => esc_html( 'Footer Sidebar 2', 'aquaparallax' ),
		'id'            => 'aquaparallax_footer_sidebar2',
		'description'   => esc_html( 'Add widgets here for footer sidebar 2.', 'aquaparallax' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	// Footer 3
	register_sidebar( array(
		'name'          => esc_html( 'Footer Sidebar 3', 'aquaparallax' ),
		'id'            => 'aquaparallax_footer_sidebar3',
		'description'   => esc_html( 'Add widgets here for footer sidebar 3.', 'aquaparallax' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	// Footer 4
	register_sidebar( array(
		'name'          => esc_html( 'Footer Sidebar 4', 'aquaparallax' ),
		'id'            => 'aquaparallax_footer_sidebar4',
		'description'   => esc_html( 'Add widgets here for footer sidebar 4.', 'aquaparallax' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'aquaparallax_widgets_init' );

// Aquaparallax register nav walker
require get_template_directory() . '/wp_bootstrap_navwalker.php';

// Aquaparallax excerpt length for posts
function aquaparallax_excerpt_length( $length ) {
        return 20;
    }
add_filter( 'excerpt_length', 'aquaparallax_excerpt_length', 999 );

// Aquaparallax register customizer
require get_template_directory() . '/inc/customizer.php';

// Aquaparallax register plugins 
require get_template_directory() . '/inc/tgm-plugin-activation/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/tgm-plugin-activation/tgmpa-aquaparallax.php';

// Aquaparallax register pagination
require get_template_directory() . '/inc/pagination.php';

// Aquaparallax link pages
 	$defaults = array(
		'before'           => '<p>' . esc_html( 'Pages:', 'aquaparallax' ),
		'after'            => '</p>',
		'link_before'      => '',
		'link_after'       => '',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => esc_html( 'Next page', 'aquaparallax' ),
		'previouspagelink' => esc_html( 'Previous page', 'aquaparallax' ),
		'pagelink'         => '%',
		'echo'             => 1
	);
 
        wp_link_pages( $defaults );
    
function aquaparallax_add_editor_styles() {
    add_editor_style( 'style.css' );
}
add_action( 'admin_init', 'aquaparallax_add_editor_styles' );

// Aquaparallax active plugin
function aquaparallax_is_plugin_active( $plugin ) {
    return in_array( $plugin, (array) get_option( 'active_plugins', array() ) );
}
<?php

/* Load framework
----------------------------------------------------------------------------- */

if ( file_exists( get_template_directory(). '/framework/themeora-framework-init.php') ) {
    include_once ( get_template_directory(). '/framework/themeora-framework-init.php' );
}

/* Add various theme support options
----------------------------------------------------------------------------- */

add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
add_theme_support( 'custom-background' );
add_theme_support( 'post-formats', array( 'audio', 'gallery', 'image', 'quote', 'video', 'link' ) );

$defaults = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '',
	'header-text'            => true,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);

add_theme_support( 'custom-header', $defaults );

/* Setup the post thumbnail size for the theme.
------------------------------------------------------------------------------ */

if ( ! isset( $content_width ) ) $content_width = 1170;
set_post_thumbnail_size( 750, 500, true ); //this is wide enough for 8 cols of the bootstrap grid system
/* add custom image sizes */
add_image_size( 'thumbnail-span-4', 360, 190, true ); //spans 4 cols of the bootstrap grid
add_image_size( 'single-post-thumbnail', 750, 9999 );
add_image_size( 'testimonial-thumbnail', 160, 160, true );


if ( ! function_exists( 'themeora_enqueue_scripts' ) ) :

    /* The function to register / enqueue theme scripts
    ------------------------------------------------------------------------------- */

    function themeora_enqueue_scripts() {
        /* styles */
        wp_enqueue_style( 'base-style', get_stylesheet_uri() ); //the essential stylesheet required for the theme to be recognised
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
        wp_enqueue_style( 'fontAwesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
        wp_enqueue_style( 'typography', get_template_directory_uri() . '/css/typography.css' );
        wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/css/styles.css' );

        /* scrips */
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', WP_THEME_URL . '/js/jquery-1.10.2.min.js', false, null, false);
        wp_enqueue_script( 'jquery' );

        wp_register_script( 'jqueryValidate', WP_THEME_URL . '/js/jquery.validate.min.js', false, null, true);
        wp_enqueue_script( 'jqueryValidate' );

        wp_register_script( 'retina', WP_THEME_URL . '/js/retina.js', false, null, true);
        wp_enqueue_script( 'retina' );

        wp_register_script( 'bootstrap', WP_THEME_URL . '/js/bootstrap.min.js', false, null, true);
        wp_enqueue_script( 'bootstrap' );

        if ( !is_admin() ){ //add support for threaded comments
            if ( is_singular() AND comments_open() AND ( 1 == get_option('thread_comments') ))
            wp_enqueue_script( 'comment-reply' );
        }

        //register the main js file
        wp_register_script( 'custom', WP_THEME_URL . '/js/custom.js', false, null, true );
        wp_enqueue_script( 'custom' );

    }
endif; //themeora_enqueue_scripts

add_action( 'wp_enqueue_scripts', 'themeora_enqueue_scripts' );

if ( ! function_exists( 'init_themeora' ) ) :

    /* The function to register widebars, widgets and menus
    ------------------------------------------------------------------------------- */

    function init_themeora() {
        /* Register Navigation */
        register_nav_menus( array(
            'primary_menu' => __( 'Primary Menu', 'Primary Menu' )
        ));

        /* Register widget areas
        --------------------------------------------------------------------------*/

        register_sidebar( array(
            'name' => __( 'Blog Sidebar', THEMEORA_THEME_NAME ),
            'id' => 'blog-sidebar',
            'description' => __( 'Default blog sidebar stuff', THEMEORA_THEME_NAME ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="">',
            'after_title' => '</h3>',
        ));

        register_sidebar( array(
            'name' => __( 'Page Sidebar', THEMEORA_THEME_NAME ),
            'id' => 'page-sidebar',
            'description' => __( 'Default page sidebar stuff', THEMEORA_THEME_NAME ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="">',
            'after_title' => '</h3>',
        ));

        register_sidebar( array(
            'name' => __( 'Footer Left Widget', THEMEORA_THEME_NAME ),
            'id' => 'footer-widget-left',
            'description' => __( 'Footer left side widget', THEMEORA_THEME_NAME ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="">',
            'after_title' => '</h3>',
        ));

        register_sidebar( array(
            'name' => __( 'Footer Right Widget', THEMEORA_THEME_NAME ),
            'id' => 'footer-widget-right',
            'description' => __( 'Footer right side widget', THEMEORA_THEME_NAME ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="">',
            'after_title' => '</h3>',
        ));

    }

endif; //init_themeora

add_action('init', 'init_themeora'); // Run the above function at the init() hook

if ( ! function_exists( 'themeora_theme_setup' ) ) :
    
    function themeora_theme_setup(){
        //Load editor style
        add_editor_style( 'custom-editor-style.css' );

        //Load text domain
        load_theme_textdomain(THEMEORA_THEME_NAME, WP_THEME_URL . "/languages/");
    }
endif; //themeora_theme_setup

add_action('after_setup_theme', 'themeora_theme_setup');


/* Load theme functions
------------------------------------------------------------------------------ */

include 'includes/functions-utility.php';
include 'includes/functions-templates.php';

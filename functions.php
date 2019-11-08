<?php

/* Load framework
----------------------------------------------------------------------------- */

if ( file_exists( get_template_directory(). '/framework/themeora-framework-init.php') ) {
    include_once ( get_template_directory(). '/framework/themeora-framework-init.php' );
}


/* General theme setup options
----------------------------------------------------------------------------- */

if ( ! function_exists( 'themeora_theme_setup' ) ) :

    function themeora_theme_setup() {

        /* Register Navigation
        ------------------------------------------------------------------------------*/
        register_nav_menus( array(
            'primary_menu' => __( 'Primary Menu', 'atwood' )
        ));

        /* Load editor style
        ------------------------------------------------------------------------------*/
        add_editor_style( 'custom-editor-style.css' );

        /* Load text domain
        ------------------------------------------------------------------------------*/
        load_theme_textdomain('atwood', WP_THEME_URL . "/languages/");

        /* Add various theme support options
        ----------------------------------------------------------------------------- */

        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
        add_theme_support( 'custom-background' );
        add_theme_support( 'post-formats', array( 'audio', 'gallery', 'image', 'quote', 'video', 'link' ) );
        add_theme_support( "title-tag" );

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
        add_image_size( 'themeora-thumbnail-span-4', 360, 190, true ); //spans 4 cols of the bootstrap grid
        add_image_size( 'themeora-thumbnail-span-8', 750, 500, true ); //spans 8 cols of the bootstrap grid
        add_image_size( 'themeora-single-post-thumbnail', 750, 9999 );
        add_image_size( 'themeora-testimonial-thumbnail', 160, 160, true );
    }

endif; //themeora_theme_setup

add_action('after_setup_theme', 'themeora_theme_setup');


/* The function to register / enqueue theme scripts
------------------------------------------------------------------------------- */

if ( ! function_exists( 'themeora_enqueue_scripts' ) ) :

    function themeora_enqueue_scripts() {
        /* styles */
        wp_enqueue_style( 'themeora-base-style', get_stylesheet_uri() ); //the essential stylesheet required for the theme to be recognised
        wp_enqueue_style( 'themeora-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
        wp_enqueue_style( 'themeora-fontAwesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
        wp_enqueue_style( 'themeora-typography', get_template_directory_uri() . '/css/typography.css' );
        wp_enqueue_style( 'themeora-theme-style', get_template_directory_uri() . '/css/styles.css' );

        //load jquery validate
        wp_enqueue_script( 'jqueryValidate', get_template_directory_uri() . '/js/jquery.validate.min.js', array( 'jquery' ), null, true );

        //load bootstraps javascript file
        wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), null, true );

        if ( !is_admin() ){ //add support for threaded comments
            if ( is_singular() AND comments_open() AND ( 1 == get_option('thread_comments') ))
            wp_enqueue_script( 'comment-reply' );
        }

        //register the main js file
        wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), null, true );

    }
endif; //themeora_enqueue_scripts

add_action( 'wp_enqueue_scripts', 'themeora_enqueue_scripts' );


/* Load moderniser, respond.js and html5shiv
------------------------------------------------------------------------------- */
function themeora_head_js() {
    echo '<!--[if lt IE 9]>' . "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/js/html5shiv.js' ) . '"></script>' . "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/js/respond.js' ) . '"></script>' . "\n";
    echo '<![endif]-->' . "\n";
}
add_action( 'wp_head', 'themeora_head_js' );


if ( ! function_exists( 'themeora_widgets_init' ) ) :

    /* The function to register sidebars & widgets
    ------------------------------------------------------------------------------- */

    function themeora_widgets_init() {

        /* Register widget areas
        --------------------------------------------------------------------------*/

        register_sidebar( array(
            'name' => __( 'Blog Sidebar', 'atwood' ),
            'id' => 'blog-sidebar',
            'description' => __( 'Default blog sidebar stuff', 'atwood' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="">',
            'after_title' => '</h3>',
        ));

        register_sidebar( array(
            'name' => __( 'Page Sidebar', 'atwood' ),
            'id' => 'page-sidebar',
            'description' => __( 'Default page sidebar stuff', 'atwood' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="">',
            'after_title' => '</h3>',
        ));

        register_sidebar( array(
            'name' => __( 'Footer Left Widget', 'atwood' ),
            'id' => 'footer-widget-left',
            'description' => __( 'Footer left side widget', 'atwood' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="">',
            'after_title' => '</h3>',
        ));

        register_sidebar( array(
            'name' => __( 'Footer Right Widget', 'atwood' ),
            'id' => 'footer-widget-right',
            'description' => __( 'Footer right side widget', 'atwood' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="">',
            'after_title' => '</h3>',
        ));

    }

endif; //themeora_widgets_init

add_action( 'widgets_init', 'themeora_widgets_init' );


/* Load theme functions
------------------------------------------------------------------------------ */

require 'includes/functions-utility.php'; // Load useful helper functions
require 'includes/functions-templates.php'; // Load any functions specific to template layouts

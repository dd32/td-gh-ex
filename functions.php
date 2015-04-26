<?php
/*******************************************************************************
 1.0 - Required file to be included in the functions.php
 ******************************************************************************/
require(get_template_directory() . '/includes/template-tags.php');
require(get_template_directory() . '/includes/custom-header.php');
/*******************************************************************************
 2.0 - Enqueue Stylesheet and Scripts
 ******************************************************************************/
function barista_scripts_setup(){
    wp_enqueue_style('barista-style', get_stylesheet_uri());
    wp_enqueue_style('barista-font-awesome', get_stylesheet_directory_uri() . '/extras/font-awesome/css/font-awesome.css', '03302015', true);
    wp_enqueue_style('barista-ubuntu-font', '//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic');
    wp_enqueue_script('barista-hide-search', get_template_directory_uri() . '/js/hide-search.js', array('jquery'), '04062015', true);
    
    if (is_singular() && comments_open() && get_option('thread_comments'))
        wp_enqueue_script( 'comment-reply' );
}
add_action('wp_enqueue_scripts', 'barista_scripts_setup');

/*******************************************************************************
 3.0 - Theme Setup
 ******************************************************************************/
if (!function_exists('barista_theme_setup')){    
    function barista_theme_setup(){
        /***********************************************************************
         * Declare $content_width as 600
         **********************************************************************/
        global $content_width;

        if (!isset($content_width))
            $content_width = 600;
        
        /***********************************************************************
         * Let WordPress manage the document's title. 
         **********************************************************************/
        add_theme_support('title-tag');
        
        /***********************************************************************
         * Add default posts and comments RRS feeds links to the head.
         **********************************************************************/
        add_theme_support('automatic-feed-links');
        
        /***********************************************************************
         * Custom Background Feature
        ***********************************************************************/
        add_theme_support('custom-background', array(
            'default-color' => '#E6E3D4'
        ));

        /***********************************************************************
         * Suppot HTML5 Search Form
        ***********************************************************************/
        add_theme_support( 'html5', array( 'search-form' ) );
        
        /***********************************************************************
         * Register Navigation Menus
        ***********************************************************************/
        register_nav_menus(array(
        'primary-navigation'    => __('Primary Navigation', 'barista'),
        'social'                => __('Social Navigation', 'barista'),
        ));
        
        /***********************************************************************
         * Enable Thumbnails for Feature Images
        ***********************************************************************/
        add_theme_support('post-thumbnails');
        add_image_size('barista-small-thumbnail', 150, 150, true);
        add_image_size('barista-medium-thumbnail', 600, 150, true);
        
        /***********************************************************************
        * Editor Styles
        **********************************************************************/
        add_editor_style();
        
        load_theme_textdomain( 'barista', get_template_directory() . '/languages' );
    }
    add_action('after_setup_theme', 'barista_theme_setup');
}
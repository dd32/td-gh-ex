<?php
require(get_template_directory() . '/page-templates/custom-header.php');
require(get_template_directory() . '/functions/extra-functions.php');

if (!function_exists('silverquantum_scripts_setup')){
    function silverquantum_scripts_setup(){
       wp_enqueue_style('silverquantum-style', get_stylesheet_uri());
       wp_enqueue_style('silverquantum-ubuntu', 'http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic');
       wp_enqueue_style('silverquantum-font-awesome', get_stylesheet_directory_uri() . '/extras/font-awesome/css/font-awesome.css', '03222015', true);
       
	if (is_singular() && comments_open() && get_option('thread_comments'))
		wp_enqueue_script( 'comment-reply' );
   }
   add_action('wp_enqueue_scripts', 'silverquantum_scripts_setup');   
}

if (!function_exists('silverquantum_theme_setup')) {
    function silverquantum_theme_setup(){
        // Setup Content Width value based on the theme's design and stylesheet.
        global $content_width;
        if (!isset($content_width))
                $content_width = 650;
        
        // Load Theme Textdomain
        load_theme_textdomain( 'silverquantum', get_template_directory() . '/languages' );
        
        // Register Navigation Menu
        register_nav_menu('primary-navigation', __('Primary Navigation', 'silverquantum') );
        
        // Title Tag
        add_theme_support('title-tag');

        // Support Search Form in HTML5 format
        add_theme_support('html5', array('search-form'));
        
        //Automatic Feedback
        add_theme_support('automatic-feed-links'); 
        
        //Add Feature Image
        add_theme_support('post-thumbnails');
        add_image_size('silverquantum-small-thumbnail', 150, 150, true);
        add_image_size('silverquantum-medium-thumbnail', 650, 150, true);
        
        //Add Custom Background
        add_theme_support('custom-background');
        
        add_editor_style();
        
    }
    add_action('after_setup_theme', 'silverquantum_theme_setup');
}

?>

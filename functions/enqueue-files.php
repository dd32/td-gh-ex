<?php

/*
 * best-startup Enqueue css and js files
 */

function best_startup_enqueue() {
    wp_enqueue_style('best-startup-font-raleway', '//fonts.googleapis.com/css?family=Raleway:500,300,600,700', array(),null);

    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(),null);
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', array(),null);
    wp_enqueue_style('best-startup-main-style', get_template_directory_uri() . '/assets/css/default.css', array(),null);    
    /*  Blog Layout Css  */
    wp_enqueue_style('best-startup-blog-layout-css', get_template_directory_uri(). '/assets/css/blog-layout.css', array(),null);
    wp_enqueue_style('best-startup-header-style', get_template_directory_uri() . '/assets/css/header-style.css', array(),null);      

    wp_enqueue_script("comment-reply");
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-form');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'),false, true);
    wp_enqueue_script('best-startup-custom-script', get_template_directory_uri() . '/assets/js/best-startup-custom.js',array('jquery'), false, true );
    wp_enqueue_script('best-startup-script-header-style', get_template_directory_uri() . '/assets/js/header-style.js', array('jquery'), false, true);
  
    best_startup_custom_css();
}

add_action('wp_enqueue_scripts', 'best_startup_enqueue');
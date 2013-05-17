<?php 
//
//
function comment_scripts(){
   if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'comment_scripts' );
//

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	/*
	 * This theme supports custom background color and image, and here
	 * we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => '292728',
	) );
	add_theme_support( 'custom-header' );

	if(function_exists ('add_theme_support')){
		add_theme_support ('post-thumbnails');
		}
	if(function_exists ('add_image_size')){
	add_image_size ('featured', 220, 200, true );
	add_image_size ('post_tumb', 280, 220, true );
	add_image_size ('post_single', 700, 99999, true );
	}
//


register_nav_menus( array(
	'header_menu' => 'PluginBuddy Mobile Navigation Menu',
	'footer_menu' => 'My Custom Footer Menu'
) );


/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 625;

	
/* To Register Sidebar */

function bw_widget_areas() {

    register_sidebar(array(
        'name' => __('Right Sidebar', 'bw'),
        'id' => 'right_sidebar',
        'before_widget' => '<div class="right_sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('left Sidebar', 'bw'),
        'id' => 'left_sidebar',
        'before_widget' => '<div class="left_sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('footer01', 'bw'),
        'id' => 'footer01',
        'before_widget' => '<div class="footer01">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('footer02', 'bw'),
        'id' => 'footer02',
        'before_widget' => '<div class="footer02">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('footer03', 'bw'),
        'id' => 'footer03',
        'before_widget' => '<div class="footer03">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('footer04', 'bw'),
        'id' => 'footer04',
        'before_widget' => '<div class="footer04">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'bw_widget_areas');

/* This code for readmore */

function excerpt_read_more_link($output) {
    global $post;
    return $output . '<a class="readmore_btn" href="' . get_permalink($post->ID) . '">Read More</a>';
}

add_filter('the_excerpt', 'excerpt_read_more_link');




?> 
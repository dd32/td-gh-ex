<?php

// Content width
if ( ! isset( $content_width ) )
	$content_width = 540;

// Setup
if ( ! function_exists( 'quickpress_setup' ) ) :
function quickpress_setup() {

	// add title tag
	add_theme_support( 'title-tag' );

	// add text domain
	load_theme_textdomain( 'quickpress', get_template_directory() . '/languages' );

	// Custom Background
	add_theme_support( 'custom-background', apply_filters( 'quickpress_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// post thumbnails
	add_theme_support('post-thumbnails');

	// feed links
	add_theme_support('automatic-feed-links');
}
endif; // quickpress_setup
add_action( 'after_setup_theme', 'quickpress_setup' );

// Register sidebar widgets
function quickpress_widgets_init() {
register_sidebar(array(
        'name' => 'Sidebar Full',
        'id' => 'sidebar-1',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
register_sidebar(array(
        'name' => 'Sidebar Split Left',
        'id' => 'sidebar-2',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
)); 
register_sidebar(array(
         'name' => 'Sidebar Split Right',
        'id' => 'sidebar-3',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
)); 
register_sidebar(array(
         'name' => 'Header Nav Menu',
	'description' => 'Add Custom Menu Here WITHOUT title',
        'id' => 'nav-menu',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
)); 
}
add_action( 'widgets_init', 'quickpress_widgets_init' );

// add editor style
function quickpress_add_editor_styles() {
    	add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'quickpress_add_editor_styles' );

// read more
function quickpress_excerpt_more( $more ) {
	return ' &bull;  <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __(' Read More &raquo;', 'quickpress') . '</a>'; 
	}
	add_filter( 'excerpt_more', 'quickpress_excerpt_more' );

// credits
function quickpress_credits() {
    echo '<p class="text-center">
	<a href="http://www.quickonlinethemes.com/wordpress/quickpress/" title="QuickPress Theme" rel="nofollow" >QuickPress Theme</a> powered by <a href="http://wordpress.org">WordPress</a>
	</p>';
	}
	add_action('wp_footer', 'quickpress_credits');


// load javascript
	function quickpress_scripts() {
	wp_enqueue_style( 'quickpress', get_stylesheet_uri() );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
        wp_enqueue_script( 'comment-reply' );
    	}
	}
	add_action( 'wp_enqueue_scripts', 'quickpress_scripts' );
?>
<?php

// content width
	if ( ! isset( $content_width ) ) {
	$content_width = 920;
	}

// Setup
if ( ! function_exists( 'quickchic_setup' ) ) :
function quickchic_setup() {

	// add title tag
	add_theme_support( 'title-tag' );

	// add text domain
	load_theme_textdomain( 'quickchic', get_template_directory() . '/languages' );

	// Custom Background
	add_theme_support( 'custom-background', apply_filters( 'quickchic_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// post thumbnails
	add_theme_support('post-thumbnails');

	// feed links
	add_theme_support('automatic-feed-links');
}
endif; // quickchic_setup
add_action( 'after_setup_theme', 'quickchic_setup' );

// Register sidebar widgets
function quickchic_widgets_init() {
	register_sidebar(array(
        'name' => __( 'Sidebar', 'quickchic' ),
        'id' => 'sidebar',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}
add_action( 'widgets_init', 'quickchic_widgets_init' );

// add editor style
	function quickchic_add_editor_styles() {
 	add_editor_style( 'custom-editor-style.css' );
	}
	add_action( 'admin_init', 'quickchic_add_editor_styles' );

// read more
function quickchic_excerpt_more( $more ) {
	return ' &bull;  <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __(' Read More &raquo;', 'quickchic') . '</a>'; 
	}
	add_filter( 'excerpt_more', 'quickchic_excerpt_more' );

// credits
function quickchic_credits() {
    echo '<p class="text-center">
	<a href="http://www.quickonlinetips.com/archives/quickchic/" title="QuickChic Theme" rel="nofollow" target="_blank">QuickChic Theme</a>' 
 	. __(' powered by ', 'quickchic') . 
	'<a href="http://wordpress.org">WordPress</a>
	</p>';
	}
	add_action('wp_footer', 'quickchic_credits');


// load javascript
	function quickchic_scripts() {
	wp_enqueue_style( 'quickchic', get_stylesheet_uri() );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
        wp_enqueue_script( 'comment-reply' );
    	}
	}
	add_action( 'wp_enqueue_scripts', 'quickchic_scripts' );
?>
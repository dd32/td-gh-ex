<?php
// content width
	if ( ! isset( $content_width ) ) {
	$content_width = 540;
	}
	
// Setup
if ( ! function_exists( 'quickpic_setup' ) ) :
function quickpic_setup() {

	// Register menus
	register_nav_menus( array(
	'header-nav' => 'Header Menu',
	) );

	// add title tag
	add_theme_support( 'title-tag' );

	// add text domain
	load_theme_textdomain( 'quickpic', get_template_directory() . '/languages' );

	// Custom Background
	add_theme_support( 'custom-background', apply_filters( 'quickpic_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// post thumbnails
	add_theme_support('post-thumbnails');

	// feed links
	add_theme_support('automatic-feed-links');
}
endif; // quickpic_setup
add_action( 'after_setup_theme', 'quickpic_setup' );


// Register footer widgets
function quickpic_widgets_init() {
register_sidebar(array(
        'name' => __( 'Footer 1', 'quickpic' ),
        'id' => 'footer-1',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
register_sidebar(array(
        'name' => __( 'Footer 2', 'quickpic' ),
        'id' => 'footer-2',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
)); 
}
add_action( 'widgets_init', 'quickpic_widgets_init' );

 // add editor style
	function quickpic_add_editor_styles() {
 	add_editor_style( 'custom-editor-style.css' );
	}
	add_action( 'admin_init', 'quickpic_add_editor_styles' );

// read more
function quickpic_excerpt_more( $more ) {
	return ' &bull;  <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __(' Read More &raquo;', 'quickpic') . '</a>'; 
	}
	add_filter( 'excerpt_more', 'quickpic_excerpt_more' );

// credits
function quickpic_credits() {
    echo '<p class="text-center">
	<a href="http://www.quickonlinethemes.com/wordpress/quickpic/" title="QuickPic Theme" rel="nofollow" >QuickPic Theme</a>' 
 	. __(' powered by ', 'quickpic') . 
	'<a href="http://wordpress.org">WordPress</a>
	</p>';
	}
	add_action('wp_footer', 'quickpic_credits');


// load javascript
	function quickpic_scripts() {
	wp_enqueue_style( 'quickpic', get_stylesheet_uri() );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
        wp_enqueue_script( 'comment-reply' );
    	}
	}
	add_action( 'wp_enqueue_scripts', 'quickpic_scripts' );
?>
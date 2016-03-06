<?php

if ( ! function_exists( 'avata_setup' ) ) :

function avata_setup() {
	global $content_width, $avata_options;
    $avata_options = get_theme_mods();
	
	if ( ! isset( $content_width ) ) {
		$content_width = 1170; /* pixels */
	}
	
	load_theme_textdomain( 'avata', get_template_directory() . '/languages' );

    add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_editor_style("editor-style.css");
	add_image_size( 'avata-related-post', 400, 300, true ); //(cropped)

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'avata' ),
		'top_bar_menu' => __( 'Top Bar Menu', 'avata' ),
		'footer_menu' => __( 'Footer Menu', 'avata' ),
		'custom_menu_1' => __( 'Custom Menu 1', 'avata' ),
		'custom_menu_2' => __( 'Custom Menu 2', 'avata' ),
		'custom_menu_3' => __( 'Custom Menu 3', 'avata' ),
		'custom_menu_4' => __( 'Custom Menu 4', 'avata' ),
		'custom_menu_5' => __( 'Custom Menu 5', 'avata' ),
		'custom_menu_6' => __( 'Custom Menu 6', 'avata' ),
	) );
	

	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
	
	add_theme_support( 'custom-header', array(
        'default-image'          => '',
        'random-default'         => false,
        'width'                  => '1920',
        'height'                 => '120',
        'flex-height'            => true,
        'flex-width'             => true,
        'default-text-color'     => 'ffffff',
        'header-text'            => true,
        'uploads'                => true,
        'wp-head-callback'       => '',
        'admin-head-callback'    => '',
        'admin-preview-callback' => ''
)); 

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'avata_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	add_editor_style( array( 'assets/css/editor-style.css', 'assets/fonts/genericons/genericons.css' ) );

}
endif; // avata_setup
add_action( 'after_setup_theme', 'avata_setup' );


/**
 * Enqueue scripts and styles.
 */
function avata_scripts() {
 wp_enqueue_style( 'avata-rokkitt', esc_url('http://fonts.googleapis.com/css?family=Rokkitt:400,700|Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic, false'), '', false );
 wp_enqueue_style( 'avata-font-awesome',  get_template_directory_uri() .'/assets/fonts/font-awesome/css/font-awesome.min.css', false, '', false );
 wp_enqueue_style( 'avata-bootstrap',  get_template_directory_uri() .'/assets/bootstrap/css/bootstrap.css', false, '', false );
 wp_enqueue_style( 'avata-main', get_stylesheet_uri() );

 wp_enqueue_script( 'avata-bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.js', array( 'jquery' ), null, false );
 wp_enqueue_script( 'avata-hoverIntent', get_template_directory_uri() . '/assets/js/hoverIntent.js', array( 'jquery' ), null, true );
 wp_enqueue_script( 'avata-superfish', get_template_directory_uri() . '/assets/js/superfish.js', array( 'jquery' ), null, true );
 wp_enqueue_script( 'avata-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), null, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	
}
add_action( 'wp_enqueue_scripts', 'avata_scripts' );

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


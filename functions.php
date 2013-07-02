<?php
add_action( 'after_setup_theme', 'star_setup' );
function star_setup() {
	/* width     bredd */
	if ( ! isset( $content_width ) ) $content_width = 400;
	
	$star_ch = array( //custom header settings
	'default-image'          => get_template_directory_uri() . '/images/star-header-light-blue.png',
	'random-default'         => false,
	'width'                  => 1600,
	'height'                 => 512,
	'flex-height'            => false,
	'flex-width'             => false,
	'uploads'                => true,
	'header-text'            => false
	);
	add_theme_support( 'custom-header', $star_ch );	
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	
	/* translate */
	load_theme_textdomain( 'star', get_template_directory() . '/languages' );
	
	/* add menu */
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'star' ),
		'footer' => __( 'Footer Navigation', 'star' ),
	) );


/*switch on jquery to make the slider work          starta jquery till slidern...*/
/* add slider javascript              ladda javascripten till slidern*/


function star_enqueue_scripts() {
    wp_enqueue_script('jquery');
	if ( !is_admin() ){
		wp_register_script('star_custom_script', get_template_directory_uri() . '/scripts/jquery.cycle.all.js');
		wp_enqueue_script('star_custom_script');
	}
}
add_action('wp_enqueue_scripts', 'star_enqueue_scripts');
}


/* add 'home' button to menu            'hem' knapp i menyn*/
function star_menu( $args ) {
		$args['show_home'] = true;
		return $args;
	}
add_filter( 'wp_page_menu_args', 'star_menu' );
	

 function star_fonts() {
	if ( !is_admin() ) {
            wp_register_style('star_Font','http://fonts.googleapis.com/css?family=Arvo');
            wp_enqueue_style('star_Font');
	}
}
add_action('wp_print_styles', 'star_fonts');	

 
 /* Enque comment reply / threaded comments. */
 function star_enqueue_comment_reply() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
		wp_enqueue_script( 'comment-reply' ); 
	}
}
add_action( 'wp_enqueue_scripts', 'star_enqueue_comment_reply' );	
	

// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
register_default_headers( array(
	'light-blue' => array(
		'url' => '%s/images/star-header-light-blue.png',
		'thumbnail_url' => '%s/images/star-header-light-blue-thumb.png',
		/* translators: header image description */
		'description' => __( 'Light Blue', 'star' )
	),
	'light-beige' => array(
		'url' => '%s/images/star-header-light-beige.png',
		'thumbnail_url' => '%s/images/star-header-light-beige-thumb.png',
		/* translators: header image description */
		'description' => __( 'Light Beige', 'star' )
	),
	'black' => array(
		'url' => '%s/images/star-header-black.png',
		'thumbnail_url' => '%s/images/star-header-black-thumb.png',
		/* translators: header image description */
		'description' => __( 'Black', 'star' )
	),
	'blue' => array(
		'url' => '%s/images/star-header.png',
		'thumbnail_url' => '%s/images/star-header-thumb.png',
		/* translators: header image description */
		'description' => __( 'Blue', 'star' )
	)
) );

/* Register widget areas (Sidebars)        Skapa sidebars*/
register_sidebar(array('name'=>'Right_Widgetarea'));
?>
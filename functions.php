<?php
/*
 * Theme functions and definitions.
 */

// Sets up theme defaults and registers various WordPress features that LeftSide supports
	function leftside_setup() { 

	// Set max content width for img, video, and more
		global $content_width; 
		if ( ! isset( $content_width ) )
		$content_width = 750;

	// Make theme available for translation
		load_theme_textdomain('leftside', get_template_directory() . '/languages');  

	// Register Menu
		register_nav_menus( 
		array( 'primary' => __( 'Primary Navigation', 'leftside' ), 
	 	) ); 

	// Add document title
		add_theme_support( 'title-tag' );

	// Add editor styles
		add_editor_style( array( 'custom-editor-style.css' ) );

	// Custom header	
		$args = array(		
		'width' => 800,
		'height' => 450,
		'default-image' => get_template_directory_uri() . '/images/boats.jpg',
		'header-text' => false,
		'uploads' => true,
		);	
		add_theme_support( 'custom-header', $args );

	// Default header
		register_default_headers( array(
		'boats' => array(
			'url' => '%s/images/boats.jpg',
			'thumbnail_url' => '%s/images/boats-thumbnail.jpg',
			'description' => __( 'Boats', 'leftside' )
			)
		) );

	// Post thumbnails
		add_theme_support( 'post-thumbnails' ); 

	// Resize mode thumbnails
		set_post_thumbnail_size( 300, 300 ); 

	// Resize single page thumbnail
		add_image_size( 'single', 300, 300 ); 

	// This feature adds RSS feed links to html head 
		add_theme_support( 'automatic-feed-links' );

	// Switches default core markup for search form, comment form, and comments to output valid HTML5
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	// Background color
		$args = array( 'default-color' => 'eeeeee', 
		); 
		add_theme_support( 'custom-background', $args ); 

	}
	add_action( 'after_setup_theme', 'leftside_setup' ); 


// Add blogname to document title for WP 4.0 and older 
function leftside_wp_title( $title ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	$title .= get_bloginfo( 'name' );

	return $title;
}
add_filter( 'wp_title', 'leftside_wp_title' );


// Add document title for WP 4.0 and older 
if ( ! function_exists( '_wp_render_title_tag' ) ) :
	function leftside_render_title() {
		?> 
		<title><?php wp_title( '|', true, 'right' ); ?></title> 
		<?php
	}
	add_action( 'wp_head', 'leftside_render_title' );
endif;


// Add html5 support for IE 8 and older 
	function leftside_html5() { 
		echo '<!--[if lt IE 9]>'. "\n"; 
		echo '<script src="' . esc_url( get_template_directory_uri() . '/js/ie.js' ) . '"></script>'. "\n"; 
		echo '<![endif]-->'. "\n"; 
		}
	add_action( 'wp_head', 'leftside_html5' ); 


// Enqueues scripts and styles for front-end
	function leftside_scripts() {
			wp_enqueue_style( 'leftside-style', get_stylesheet_uri() );
			wp_enqueue_script( 'leftside-nav', get_template_directory_uri() . '/js/nav.js', array( 'jquery' ) );
			wp_enqueue_style( 'leftside-googlefonts', '//fonts.googleapis.com/css?family=Open+Sans' ); 

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
	}
	add_action( 'wp_enqueue_scripts', 'leftside_scripts' );


// Sidebars
	function leftside_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Primary Sidebar', 'leftside' ),
		'id' => 'primary',
		'description' => __( 'Select widgets from the right-hand side.', 'leftside' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Right', 'leftside' ),
		'id' => 'footer-right',
		'description' => __( 'Select widgets from the right-hand side.', 'leftside' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Middle', 'leftside' ),
		'id' => 'footer-middle',
		'description' => __( 'Select widgets from the right-hand side.', 'leftside' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Left', 'leftside' ),
		'id' => 'footer-left',
		'description' => __( 'Select widgets from the right-hand side.', 'leftside' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	}
	add_action( 'widgets_init', 'leftside_widgets_init' );


// Add class to the excerpt 
	function leftside_excerpt( $excerpt ) {
    		return str_replace('<p', '<p class="excerpt"', $excerpt);
		}
	add_filter( "the_excerpt", "leftside_excerpt" );


// Custom excerpt lenght (default length is 55 words)
	function leftside_excerpt_length( $length ) { 
		return 55; } 
	add_filter( 'excerpt_length', 'leftside_excerpt_length', 999 ); 


// Theme Customizer (option to add logo)
	function leftside_theme_customizer( $wp_customize ) { 
		$wp_customize->add_section( 'leftside_logo_section' , array( 
			'title' => __( 'Logo', 'leftside' ), 
			'priority' => 30, 
			'description' => __( 'Upload a logo to replace blogname and description in header', 'leftside' ),
		) );
		$wp_customize->add_setting( 'leftside_logo', array( 
			'capability' => 'edit_theme_options', 
			'sanitize_callback' => 'esc_url_raw', 
		) ); 
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'leftside_logo', array( 
			'label' => __( 'Logo', 'leftside' ), 
			'section' => 'leftside_logo_section', 
			'settings' => 'leftside_logo', 
		) ) );
	} 
	add_action('customize_register', 'leftside_theme_customizer');

?>
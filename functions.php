<?php
/*
 * Theme functions and definitions.
 */

// Sets up theme defaults and registers various WordPress features that MyKnowledgeBase supports
	function myknowledgebase_setup() { 

	// Set max content width for img, video, and more
		global $content_width; 
		if ( ! isset( $content_width ) )
		$content_width = 810;

	// Make theme available for translation
		load_theme_textdomain('myknowledgebase', get_template_directory() . '/languages');  

	// Register Menu
		register_nav_menus( 
		array( 'primary' => __( 'Primary Navigation', 'myknowledgebase' ), 
	 	) ); 

	// Add document title
		add_theme_support( 'title-tag' );

	// Add editor styles
		add_editor_style( array( 'custom-editor-style.css' ) );

	// Custom header	
		$args = array(		
		'width' => 600,
		'height' => 400,
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
			'description' => __( 'Boats', 'myknowledgebase' )
		)
		) );

	// Post thumbnails
		add_theme_support( 'post-thumbnails' ); 

	// Resize mode thumbnails
		set_post_thumbnail_size( 250, 250 ); 

	// Resize single page thumbnail
		add_image_size( 'single', 250, 250 ); 

	// This feature adds RSS feed links to html head 
		add_theme_support( 'automatic-feed-links' );

	// Switches default core markup for search form, comment form, and comments to output valid HTML5
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	// Background color
		$args = array( 'default-color' => 'ffffff', 
		); 
		add_theme_support( 'custom-background', $args ); 

	}
	add_action( 'after_setup_theme', 'myknowledgebase_setup' ); 


// Add blogname to document title for WP 4.0 and older 
function myknowledgebase_wp_title( $title ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	$title .= get_bloginfo( 'name' );

	return $title;
}
add_filter( 'wp_title', 'myknowledgebase_wp_title' );


// Add document title for WP 4.0 and older 
if ( ! function_exists( '_wp_render_title_tag' ) ) :
	function myknowledgebase_render_title() {
		?> 
		<title><?php wp_title( '|', true, 'right' ); ?></title> 
		<?php
	}
	add_action( 'wp_head', 'myknowledgebase_render_title' );
endif;


// Add html5 support for IE 8 and older 
	function myknowledgebase_html5() { 
		echo '<!--[if lt IE 9]>'. "\n"; 
		echo '<script src="' . esc_url( get_template_directory_uri() . '/js/ie.js' ) . '"></script>'. "\n"; 
		echo '<![endif]-->'. "\n"; 
		}
	add_action( 'wp_head', 'myknowledgebase_html5' ); 


// Enqueues scripts and styles for front-end
	function myknowledgebase_scripts() {
			wp_enqueue_style( 'myknowledgebase-style', get_stylesheet_uri() );
			wp_enqueue_script( 'myknowledgebase-nav', get_template_directory_uri() . '/js/nav.js', array( 'jquery' ) );
			wp_enqueue_style( 'myknowledgebase-googlefonts', '//fonts.googleapis.com/css?family=Open+Sans' ); 

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
	}
	add_action( 'wp_enqueue_scripts', 'myknowledgebase_scripts' );


// Sidebars
	function myknowledgebase_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Primary Sidebar', 'myknowledgebase' ),
		'id' => 'primary',
		'description' => __( 'Select widgets from the right-hand side.', 'myknowledgebase' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage Sidebar', 'myknowledgebase' ),
		'id' => 'homepage',
		'description' => __( 'Select widgets from the right-hand side.', 'myknowledgebase' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Right', 'myknowledgebase' ),
		'id' => 'footer-right',
		'description' => __( 'Select widgets from the right-hand side.', 'myknowledgebase' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Middle', 'myknowledgebase' ),
		'id' => 'footer-middle',
		'description' => __( 'Select widgets from the right-hand side.', 'myknowledgebase' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Left', 'myknowledgebase' ),
		'id' => 'footer-left',
		'description' => __( 'Select widgets from the right-hand side.', 'myknowledgebase' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	}
	add_action( 'widgets_init', 'myknowledgebase_widgets_init' );


// Add class to post nav 
	function myknowledgebase_post_next() { 
		return 'class="nav-next"'; 
	}
	add_filter('next_posts_link_attributes', 'myknowledgebase_post_next'); 

	function myknowledgebase_post_prev() { 
		return 'class="nav-prev"'; 
	}
	add_filter('previous_posts_link_attributes', 'myknowledgebase_post_prev'); 


// Custom excerpt lenght (default length is 55 words)
	function myknowledgebase_excerpt_length( $length ) { 
		return 75; } 
	add_filter( 'excerpt_length', 'myknowledgebase_excerpt_length', 999 ); 


// Theme Customizer (option to add logo)
	function myknowledgebase_theme_customizer( $wp_customize ) { 
		$wp_customize->add_section( 'myknowledgebase_logo_section' , array( 
			'title' => __( 'Logo', 'myknowledgebase' ), 
			'priority' => 30, 
			'description' => __( 'Upload a logo to replace blogname and description in header', 'myknowledgebase' ),
		) );
		$wp_customize->add_setting( 'myknowledgebase_logo', array( 
			'capability' => 'edit_theme_options', 
			'sanitize_callback' => 'esc_url_raw', 
		) ); 
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'myknowledgebase_logo', array( 
			'label' => __( 'Logo', 'myknowledgebase' ), 
			'section' => 'myknowledgebase_logo_section', 
			'settings' => 'myknowledgebase_logo', 
		) ) );
	} 
	add_action('customize_register', 'myknowledgebase_theme_customizer');

?>
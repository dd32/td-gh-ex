<?php
/*
 * Theme functions and definitions.
 */

// Sets up theme defaults and registers various WordPress features that DarkElements supports
	function darkelements_setup() { 

	// Set max content width for img, video, and more
		global $content_width; 
		if ( ! isset( $content_width ) )
		$content_width = 680;

	// Make theme available for translation
		load_theme_textdomain('darkelements', get_template_directory() . '/languages');  

	// Register Menu
		register_nav_menus( array( 
			'primary' => __( 'Primary Navigation', 'darkelements' ), 
	 	) ); 

	// Add document title
		add_theme_support( 'title-tag' );

	// Add editor styles
		add_editor_style( array( 'custom-editor-style.css' ) );

	// Custom header	
		$args = array(		
			'width' => 680,
			'height' => 450,
			'default-image' => get_template_directory_uri() . '/images/boats.jpg',
			'header-text' => false,
			'uploads' => true,
		);	
		add_theme_support( 'custom-header', $args );

	// Default header
		register_default_headers( array(
			'boats' => array(
				'url'           => get_template_directory_uri() . '/images/boats.jpg',
				'thumbnail_url' => get_template_directory_uri() . '/images/boats.jpg',
				'description'   => __( 'Default header', 'darkelements' )
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
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'caption' ) );

	// Background color
		$args = array( 
			'default-color' => '333333', 
		); 
		add_theme_support( 'custom-background', $args ); 

	}
	add_action( 'after_setup_theme', 'darkelements_setup' ); 


// Add html5 support for IE 8 and older 
	function darkelements_html5() { 
		echo '<!--[if lt IE 9]>'. "\n"; 
		echo '<script src="' . esc_url( get_template_directory_uri() . '/js/ie.js' ) . '"></script>'. "\n"; 
		echo '<![endif]-->'. "\n"; 
	}
	add_action( 'wp_head', 'darkelements_html5' ); 


// Enqueues scripts and styles for front-end
	function darkelements_scripts() {
			wp_enqueue_style( 'darkelements-style', get_stylesheet_uri() );
			wp_enqueue_script( 'darkelements-nav', get_template_directory_uri() . '/js/nav.js', array( 'jquery' ) );
			wp_enqueue_style( 'darkelements-googlefonts', '//fonts.googleapis.com/css?family=Open+Sans' ); 

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
	}
	add_action( 'wp_enqueue_scripts', 'darkelements_scripts' );


// Sidebars
	function darkelements_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Primary Sidebar', 'darkelements' ),
		'id' => 'primary',
		'description' => __( 'You can add one or multiple widgets here.', 'darkelements' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Right', 'darkelements' ),
		'id' => 'footer-right',
		'description' => __( 'You can add one or multiple widgets here.', 'darkelements' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Middle', 'darkelements' ),
		'id' => 'footer-middle',
		'description' => __( 'You can add one or multiple widgets here.', 'darkelements' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Left', 'darkelements' ),
		'id' => 'footer-left',
		'description' => __( 'You can add one or multiple widgets here.', 'darkelements' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	}
	add_action( 'widgets_init', 'darkelements_widgets_init' );


// Add class to post nav 
	function darkelements_post_next() { 
		return 'class="nav-next"'; 
	}
	add_filter('next_posts_link_attributes', 'darkelements_post_next', 999); 

	function darkelements_post_prev() { 
		return 'class="nav-prev"'; 
	}
	add_filter('previous_posts_link_attributes', 'darkelements_post_prev', 999); 


// Add class to comment nav 
	function darkelements_comment_next() { 
		return 'class="comment-next"'; 
	}
	add_filter('next_comments_link_attributes', 'darkelements_comment_next', 999); 

	function darkelements_comment_prev() { 
		return 'class="comment-prev"'; 
	}
	add_filter('previous_comments_link_attributes', 'darkelements_comment_prev', 999); 


// Custom excerpt lenght (default length is 55 words)
	function darkelements_excerpt_length( $length ) { 
		return 75; 
	} 
	add_filter( 'excerpt_length', 'darkelements_excerpt_length', 999 ); 


// Theme Customizer (logo)
	function darkelements_theme_customizer( $wp_customize ) { 
		$wp_customize->add_section( 'darkelements_logo_section' , array( 
			'title' => __( 'Logo', 'darkelements' ), 
			'priority' => 30, 
			'description' => __( 'Upload a logo to replace blogname and description in header.', 'darkelements' ),
		) );
		$wp_customize->add_setting( 'darkelements_logo', array( 
			'capability' => 'edit_theme_options', 
			'sanitize_callback' => 'esc_url_raw', 
		) ); 
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'darkelements_logo', array( 
			'label' => __( 'Logo', 'darkelements' ), 
			'section' => 'darkelements_logo_section', 
			'settings' => 'darkelements_logo', 
		) ) );
	} 
	add_action('customize_register', 'darkelements_theme_customizer');

?>
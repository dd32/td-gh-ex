<?php
/*
 * Theme functions and definitions.
 */

// Sets up theme defaults and registers various WordPress features that GridBulletin supports
	function gridbulletin_setup() { 

	// Set width without the padding
		if ( ! isset( $content_width ) )
		$content_width = 650;

	// Make theme available for translation
		load_theme_textdomain('gridbulletin', get_template_directory() . '/languages');  

	// Register Menu
		register_nav_menus( 
		array( 'primary' => __( 'Primary Navigation', 'gridbulletin' ), 
	 	) ); 

	// Add editor styles
		add_editor_style( array( 'custom-editor-style.css' ) );

	// Custom header	
		$args = array(		
		'width' => 1200,
		'height' => 350,
		'default-image' => get_template_directory_uri() . '/images/boats.jpg',
		'header-text' => false,
		'uploads' => true,
		);	
		add_theme_support( 'custom-header', $args );

	// Post thumbnails
		add_theme_support( 'post-thumbnails' ); 

	// Resize thumbnails
		set_post_thumbnail_size( 650, 550 ); 

	// Resize homepage, archive and search thumbnails
		add_image_size( 'homepage', 250, 250 ); 

	// This feature adds RSS feed links to html head 
		add_theme_support( 'automatic-feed-links' );


	// Switches default core markup for search form, comment form, and comments to output valid HTML5
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	// Background color
		$args = array( 'default-color' => 'eeeeee', 
		); 
		add_theme_support( 'custom-background', $args ); 

	}
	add_action( 'after_setup_theme', 'gridbulletin_setup' ); 


// Add html5 support for older IE version 
	function gridbulletin_html5() { 
		echo '<!--[if lt IE 9]>'. "\n"; 
		echo '<script src="' . esc_url( get_template_directory_uri() . '/js/ie.js' ) . '"></script>'. "\n"; 
		echo '<![endif]-->'. "\n"; 
		} 
	add_action( 'wp_head', 'gridbulletin_html5' ); 


// Enqueues scripts and styles for front-end
	function gridbulletin_scripts() {
		if (!is_admin()) { 
			wp_enqueue_style( 'style', get_stylesheet_uri() );
			wp_enqueue_script( 'nav', get_template_directory_uri() . '/js/nav.js', array( 'jquery' ) );
		}
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	}
	add_action( 'wp_enqueue_scripts', 'gridbulletin_scripts' );


// Register Google Fonts
	function gridbulletin_fonts() { 
		if (! is_admin() ) { 
			wp_register_style('googleFonts', '//fonts.googleapis.com/css?family=Open+Sans' ); 		
				wp_enqueue_style( 'googleFonts'); 	
		}
	}  	
	add_action('wp_enqueue_scripts', 'gridbulletin_fonts');


// Add blogname to wp_title
	function gridbulletin_wp_title( $title ) { 
		global $page, $paged; 
		if ( is_feed() ) 
		return $title; 
	
		$filtered_title = $title . get_bloginfo( 'name' ); 
			return $filtered_title; 
	}
	add_filter( 'wp_title', 'gridbulletin_wp_title' ); 


// Sidebars
	function gridbulletin_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Primary Sidebar', 'gridbulletin' ),
		'id' => 'primary',
		'description' => __( 'Select widgets from the right-hand side.', 'gridbulletin' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Right', 'gridbulletin' ),
		'id' => 'footer-right',
		'description' => __( 'Select widgets from the right-hand side.', 'gridbulletin' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Middle', 'gridbulletin' ),
		'id' => 'footer-middle',
		'description' => __( 'Select widgets from the right-hand side.', 'gridbulletin' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Left', 'gridbulletin' ),
		'id' => 'footer-left',
		'description' => __( 'Select widgets from the right-hand side.', 'gridbulletin' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Home Right', 'gridbulletin' ),
		'id' => 'footer-home-right',
		'description' => __( 'Select widgets from the right-hand side.', 'gridbulletin' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Home Middle', 'gridbulletin' ),
		'id' => 'footer-home-middle',
		'description' => __( 'Select widgets from the right-hand side.', 'gridbulletin' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Home Left', 'gridbulletin' ),
		'id' => 'footer-home-left',
		'description' => __( 'Select widgets from the right-hand side.', 'gridbulletin' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	}
	add_action( 'widgets_init', 'gridbulletin_widgets_init' );


// Custom excerpt lenght 
	function gridbulletin_excerpt_length( $length ) { 
		return 20; } 
	add_filter( 'excerpt_length', 'gridbulletin_excerpt_length', 999 ); 


// Add class to the excerpt 
	function gridbulletin_excerpt( $excerpt ) {
    		return str_replace('<p', '<p class="excerpt"', $excerpt);
		}
	add_filter( "the_excerpt", "gridbulletin_excerpt" );


// Default header
	register_default_headers( array(
	'boats' => array(
		'url' => '%s/images/boats.jpg',
		'thumbnail_url' => '%s/images/boats-thumbnail.jpg',
		'description' => __( 'Boats', 'gridbulletin' )
		)
	) );


// Theme Customizer (option to add logo)
	function gridbulletin_theme_customizer( $wp_customize ) { 

		$wp_customize->add_section( 'gridbulletin_logo_section' , array( 
		'title' => __( 'Logo', 'gridbulletin' ), 
		'priority' => 30, 
		'description' => __( 'Upload a logo to replace blogname and description in header', 'gridbulletin' ),
		) );
		$wp_customize->add_setting( 'gridbulletin_logo' );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'gridbulletin_logo', array( 
		'label' => __( 'Logo', 'gridbulletin' ), 
		'section' => 'gridbulletin_logo_section', 
		'settings' => 'gridbulletin_logo', 
		) ) );

	} 
	add_action('customize_register', 'gridbulletin_theme_customizer');

?>
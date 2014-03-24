<?php
/*
 * Theme functions and definitions.
 */

// Sets up theme defaults and registers various WordPress features that BlueGray supports
	function bluegray_setup() { 

	// Set width without the padding
		if ( ! isset( $content_width ) )
		$content_width = 650;

	// Make theme available for translation
		load_theme_textdomain('bluegray', get_template_directory() . '/languages');  

	// Register Menu
		register_nav_menus( 
		array( 'primary' => __( 'Primary Navigation', 'bluegray' ), 
	 	) ); 

	// Add editor styles
		add_editor_style( array( 'custom-editor-style.css' ) );

	// Custom header	
		$args = array(		
		'width' => 1700,
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
			'description' => __( 'Boats', 'bluegray' )
		)
		));

	// Post thumbnails
		add_theme_support( 'post-thumbnails' ); 

	// Resize mode thumbnails
		set_post_thumbnail_size( 650, 550 ); 


	// This feature adds RSS feed links to html head 
		add_theme_support( 'automatic-feed-links' );


	// Switches default core markup for search form, comment form, and comments to output valid HTML5
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	// Background color
		$args = array( 'default-color' => 'eeeeee', 
		); 
		add_theme_support( 'custom-background', $args ); 

	}
	add_action( 'after_setup_theme', 'bluegray_setup' ); 


// Add html5 support for older IE version 
	function bluegray_html5() { 
		echo '<!--[if lt IE 9]>'. "\n"; 
		echo '<script src="' . esc_url( get_template_directory_uri() . '/js/ie.js' ) . '"></script>'. "\n"; 
		echo '<![endif]-->'. "\n"; 
		} 
	add_action('wp_enqueue_scripts', 'bluegray_html5'); 


// Add blogname to wp_title
	function bluegray_wp_title( $title ) { 
		global $page, $paged; 
		if ( is_feed() ) 
		return $title; 
	
		$filtered_title = $title . get_bloginfo( 'name' ); 
			return $filtered_title; 
	}
	add_filter( 'wp_title', 'bluegray_wp_title' ); 


// Enqueues scripts and styles for front-end
	function bluegray_scripts() {
		if (!is_admin()) { 
			wp_enqueue_style( 'style', get_stylesheet_uri() );
			wp_enqueue_script( 'nav', get_template_directory_uri() . '/js/nav.js', array( 'jquery' ) );
		}
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	}
	add_action( 'wp_enqueue_scripts', 'bluegray_scripts' );


// Register Google Fonts
	function bluegray_fonts() { 
		if (! is_admin() ) { 
			wp_register_style('bluegray_googlefonts', '//fonts.googleapis.com/css?family=Open+Sans' ); 		
				wp_enqueue_style( 'bluegray_googlefonts'); 	
		}
	}  	
	add_action('wp_enqueue_scripts', 'bluegray_fonts');


// Sidebars
	function bluegray_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Primary Sidebar', 'bluegray' ),
		'id' => 'primary',
		'description' => __( 'Select widgets from the right-hand side.', 'bluegray' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage Sidebar Right', 'bluegray' ),
		'id' => 'homepage-right',
		'description' => __( 'Select widgets from the right-hand side.', 'bluegray' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage Sidebar Middle', 'bluegray' ),
		'id' => 'homepage-middle',
		'description' => __( 'Select widgets from the right-hand side.', 'bluegray' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );


	register_sidebar( array(
		'name' => __( 'Homepage Sidebar Left', 'bluegray' ),
		'id' => 'homepage-left',
		'description' => __( 'Select widgets from the right-hand side.', 'bluegray' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Right', 'bluegray' ),
		'id' => 'footer-right',
		'description' => __( 'Select widgets from the right-hand side.', 'bluegray' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Middle', 'bluegray' ),
		'id' => 'footer-middle',
		'description' => __( 'Select widgets from the right-hand side.', 'bluegray' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Left', 'bluegray' ),
		'id' => 'footer-left',
		'description' => __( 'Select widgets from the right-hand side.', 'bluegray' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	}
	add_action( 'widgets_init', 'bluegray_widgets_init' );


// Add class to the excerpt 
	function bluegray_excerpt( $excerpt ) {
    		return str_replace('<p', '<p class="excerpt"', $excerpt);
		}
	add_filter( "the_excerpt", "bluegray_excerpt" );


// Theme Customizer (option to add logo)
	function bluegray_theme_customizer( $wp_customize ) { 

		$wp_customize->add_section( 'bluegray_logo_section' , array( 
		'title' => __( 'Logo', 'bluegray' ), 
		'priority' => 30, 
		'description' => __( 'Upload a logo to replace blogname and description in header', 'bluegray' ),
		) );
		$wp_customize->add_setting( 'bluegray_logo' );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bluegray_logo', array( 
		'label' => __( 'Logo', 'bluegray' ), 
		'section' => 'bluegray_logo_section', 
		'settings' => 'bluegray_logo', 
		) ) );

	} 
	add_action('customize_register', 'bluegray_theme_customizer');

?>
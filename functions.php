<?php
/*
 * Theme functions and definitions.
 */

// Sets up theme defaults and registers various WordPress features that OneColumn supports
	function onecolumn_setup() { 
		// Set max content width for img, video, and more
			global $content_width; 
			if ( ! isset( $content_width ) )
			$content_width = 920;

		// Make theme available for translation
			load_theme_textdomain('onecolumn', get_template_directory() . '/languages');  

		// Register Menu
			register_nav_menus( array( 
				'primary' => __( 'Primary Navigation', 'onecolumn' ), 
		 	) ); 

		// Add document title
			add_theme_support( 'title-tag' );

		// Add editor styles
			add_editor_style( 'custom-editor-style.css' );

		// Custom header	
			$header_args = array(		
				'width' => 960,
				'height' => 350,
				'default-image' => get_template_directory_uri() . '/images/boats.jpg',
				'header-text' => false,
				'uploads' => true,
			);	
			add_theme_support( 'custom-header', $header_args );

		// Default header
			register_default_headers( array(
				'boats' => array(
					'url' => get_template_directory_uri() . '/images/boats.jpg',
					'thumbnail_url' => get_template_directory_uri() . '/images/boats.jpg',
					'description' => __( 'Default header', 'onecolumn' )
				)
			) );

		// Post thumbnails
			add_theme_support( 'post-thumbnails' ); 

		// Resize mode thumbnails
			set_post_thumbnail_size( 450, 450 ); 

		// Resize single page thumbnail
			add_image_size( 'single', 450, 450 ); 

		// This feature adds RSS feed links to html head 
			add_theme_support( 'automatic-feed-links' );

		// Switch default core markup for search form, comment form, comments and caption to output valid html5
			add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'caption' ) );

		// Background color
			$background_args = array( 
				'default-color' => 'ffffff', 
			); 
			add_theme_support( 'custom-background', $background_args ); 

		// Post formats
			add_theme_support( 'post-formats', array( 'aside', 'status', 'image', 'video', 'gallery', 'audio' ) );
	}
	add_action( 'after_setup_theme', 'onecolumn_setup' ); 


// Add html5 support for IE 8 and older 
	function onecolumn_html5() { 
		echo '<!--[if lt IE 9]>'. "\n"; 
		echo '<script src="' . esc_url( get_template_directory_uri() . '/js/ie.js' ) . '"></script>'. "\n"; 
		echo '<![endif]-->'. "\n"; 
	} 
	add_action( 'wp_head', 'onecolumn_html5' ); 


// Enqueues scripts and styles for front-end
	function onecolumn_scripts() {
		wp_enqueue_style( 'onecolumn-style', get_stylesheet_uri() );
		wp_enqueue_script( 'onecolumn-nav', get_template_directory_uri() . '/js/nav.js', array( 'jquery' ) );
		wp_enqueue_style( 'onecolumn-googlefonts', '//fonts.googleapis.com/css?family=Open+Sans' ); 

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// mobile nav args
		$onecolumn_mobile_nav_args = array(
			'navText' => __( 'Menu', 'onecolumn' )
		);
		// localize script with data for mobile nav
		wp_localize_script( 'onecolumn-nav', 'objectL10n', $onecolumn_mobile_nav_args );
	}
	add_action( 'wp_enqueue_scripts', 'onecolumn_scripts' );


// Sidebars
	function onecolumn_widgets_init() {
		register_sidebar( array(
			'name' => __( 'Homepage Right', 'onecolumn' ),
			'id' => 'homepage-right',
			'description' => __( 'You can add one or multiple widgets here.', 'onecolumn' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Homepage Left', 'onecolumn' ),
			'id' => 'homepage-left',
			'description' => __( 'You can add one or multiple widgets here.', 'onecolumn' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Footer Right', 'onecolumn' ),
			'id' => 'footer-right',
			'description' => __( 'You can add one or multiple widgets here.', 'onecolumn' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Footer Left', 'onecolumn' ),
			'id' => 'footer-left',
			'description' => __( 'You can add one or multiple widgets here.', 'onecolumn' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );
	}
	add_action( 'widgets_init', 'onecolumn_widgets_init' );


// Add class to post nav 
	function onecolumn_post_next() { 
		return 'class="nav-next"'; 
	}
	add_filter('next_posts_link_attributes', 'onecolumn_post_next', 999); 

	function onecolumn_post_prev() { 
		return 'class="nav-prev"'; 
	}
	add_filter('previous_posts_link_attributes', 'onecolumn_post_prev', 999); 


// Add class to comment nav 
	function onecolumn_comment_next() { 
		return 'class="comment-next"'; 
	}
	add_filter('next_comments_link_attributes', 'onecolumn_comment_next', 999); 

	function onecolumn_comment_prev() { 
		return 'class="comment-prev"'; 
	}
	add_filter('previous_comments_link_attributes', 'onecolumn_comment_prev', 999); 


// Custom excerpt lenght (default length is 55 words)
	function onecolumn_excerpt_length( $length ) { 
		return 75; 
	} 
	add_filter( 'excerpt_length', 'onecolumn_excerpt_length', 999 ); 


// Theme Customizer (logo)
	function onecolumn_theme_customizer( $wp_customize ) { 
		$wp_customize->add_section( 'onecolumn_logo_section' , array( 
			'title' => __( 'Logo', 'onecolumn' ), 
			'priority' => 30, 
			'description' => __( 'Upload a logo to replace blogname and description in header.', 'onecolumn' ),
		) );
		$wp_customize->add_setting( 'onecolumn_logo', array( 
			'capability' => 'edit_theme_options', 
			'sanitize_callback' => 'esc_url_raw', 
		) ); 
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'onecolumn_logo', array( 
			'label' => __( 'Logo', 'onecolumn' ), 
			'section' => 'onecolumn_logo_section', 
			'settings' => 'onecolumn_logo', 
		) ) );
	} 
	add_action('customize_register', 'onecolumn_theme_customizer');

?>
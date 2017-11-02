<?php
/*
 * Theme functions and definitions.
 */

// Sets up theme defaults and registers various WordPress features that MultiColors supports
	function multicolors_setup() { 
		// Set max content width for img, video, and more
			global $content_width; 
			if ( ! isset( $content_width ) )
			$content_width = 760;

		// Make theme available for translation
			load_theme_textdomain('multicolors', get_template_directory() . '/languages');  

		// Register Menu
			register_nav_menus( array( 
				'primary' => __( 'Primary Navigation', 'multicolors' ), 
		 	) ); 

		// Add document title
			add_theme_support( 'title-tag' );

		// Add editor styles
			add_editor_style( array( 'custom-editor-style.css', multicolors_font_url() ) );

		// Custom header	
			$header_args = array(		
				'width' => 570,
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
					'description' => __( 'Default header', 'multicolors' )
				)
			) );

		// Post thumbnails
			add_theme_support( 'post-thumbnails' ); 

		// Resize thumbnails
			set_post_thumbnail_size( 300, 300 ); 

		// Resize single page thumbnail
			add_image_size( 'single', 300, 300 ); 

		// This feature adds RSS feed links to html head 
			add_theme_support( 'automatic-feed-links' );

		// Switch default core markup for search form, comment form, comments and caption to output valid html5
			add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'caption' ) );

		// Background color
			$background_args = array( 
				'default-color' => '800080', 
			); 
			add_theme_support( 'custom-background', $background_args ); 

		// Post formats
			add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'gallery', 'audio' ) );
	}
	add_action( 'after_setup_theme', 'multicolors_setup' ); 


// Enqueues scripts and styles for front-end
	function multicolors_scripts() {
		wp_enqueue_style( 'multicolors-style', get_stylesheet_uri() );
		wp_enqueue_script( 'multicolors-nav', get_template_directory_uri() . '/js/nav.js', array( 'jquery' ) );
		wp_enqueue_style( 'multicolors-googlefonts', multicolors_font_url() ); 

		// Add html5 support for IE 8 and older 
		wp_enqueue_script( 'multicolors_html5', get_template_directory_uri() . '/js/ie.js' );
		wp_script_add_data( 'multicolors_html5', 'conditional', 'lt IE 9' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'multicolors_scripts' );


// Font family
	function multicolors_font_url() {
		$font_url = '//fonts.googleapis.com/css?family=Open+Sans';
		return esc_url_raw( $font_url );
	}


// Sidebars
	function multicolors_widgets_init() {
		register_sidebar( array(
			'name' => __( 'Primary Sidebar', 'multicolors' ),
			'id' => 'primary',
			'description' => __( 'You can add one or multiple widgets here.', 'multicolors' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Homepage Sidebar', 'multicolors' ),
			'id' => 'header',
			'description' => __( 'You can add one or multiple widgets here.', 'multicolors' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Homepage Right', 'multicolors' ),
			'id' => 'homepage-right',
			'description' => __( 'You can add one or multiple widgets here.', 'multicolors' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Homepage Middle', 'multicolors' ),
			'id' => 'homepage-middle',
			'description' => __( 'You can add one or multiple widgets here.', 'multicolors' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Homepage Left', 'multicolors' ),
			'id' => 'homepage-left',
			'description' => __( 'You can add one or multiple widgets here.', 'multicolors' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Footer Right', 'multicolors' ),
			'id' => 'footer-right',
			'description' => __( 'You can add one or multiple widgets here.', 'multicolors' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Footer Middle', 'multicolors' ),
			'id' => 'footer-middle',
			'description' => __( 'You can add one or multiple widgets here.', 'multicolors' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Footer Left', 'multicolors' ),
			'id' => 'footer-left',
			'description' => __( 'You can add one or multiple widgets here.', 'multicolors' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		) );
	}
	add_action( 'widgets_init', 'multicolors_widgets_init' );


// Add class to post nav 
	function multicolors_post_next() { 
		return 'class="nav-next"'; 
	}
	add_filter('next_posts_link_attributes', 'multicolors_post_next', 999); 

	function multicolors_post_prev() { 
		return 'class="nav-prev"'; 
	}
	add_filter('previous_posts_link_attributes', 'multicolors_post_prev', 999); 


// Add class to comment nav 
	function multicolors_comment_next() { 
		return 'class="comment-next"'; 
	}
	add_filter('next_comments_link_attributes', 'multicolors_comment_next', 999); 

	function multicolors_comment_prev() { 
		return 'class="comment-prev"'; 
	}
	add_filter('previous_comments_link_attributes', 'multicolors_comment_prev', 999); 


// Custom excerpt lenght (default length is 55 words)
	function multicolors_excerpt_length( $length ) { 
		return 55; 
	} 
	add_filter( 'excerpt_length', 'multicolors_excerpt_length', 999 ); 


// Theme Customizer (logo)
	function multicolors_theme_customizer( $wp_customize ) { 
		$wp_customize->add_section( 'multicolors_logo_section' , array( 
			'title' => __( 'Logo', 'multicolors' ), 
			'priority' => 30, 
			'description' => __( 'Set a logo to replace site title and tagline.', 'multicolors' ),
		) );
		$wp_customize->add_setting( 'multicolors_logo', array( 
			'capability' => 'edit_theme_options', 
			'sanitize_callback' => 'esc_url_raw', 
		) ); 
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'multicolors_logo', array( 
			'label' => __( 'Logo', 'multicolors' ), 
			'section' => 'multicolors_logo_section', 
			'settings' => 'multicolors_logo', 
		) ) );
		$wp_customize->add_section( 'multicolors_blog_section' , array( 
			'title' => __( 'Blog Page', 'multicolors' ), 
			'priority' => 31, 
			'description' => __( 'Set a page title and content above your posts.', 'multicolors' ),
		) );
		$wp_customize->add_setting( 'multicolors_blog_title', array( 
			'capability' => 'edit_theme_options', 
			'sanitize_callback' => 'sanitize_text_field', 
		) ); 
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'multicolors_blog_title', array( 
			'label' => __( 'Title', 'multicolors' ), 
			'section' => 'multicolors_blog_section', 
			'settings' => 'multicolors_blog_title', 
		) ) );
		$wp_customize->add_setting( 'multicolors_blog_content', array( 
			'capability' => 'edit_theme_options', 
			'sanitize_callback' => 'wp_kses_post', 
		) ); 
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'multicolors_blog_content', array( 
			'label' => __( 'Content', 'multicolors' ), 
			'type' => 'textarea', 
			'section' => 'multicolors_blog_section', 
			'settings' => 'multicolors_blog_content', 
		) ) );
		$wp_customize->add_section( 'multicolors_post_section' , array( 
			'title' => __( 'Posts', 'multicolors' ), 
			'priority' => 32, 
			'description' => __( 'Customize the way how posts are displayed.', 'multicolors' ),
		) );
		$wp_customize->add_setting( 'multicolors_content_type', array( 
			'capability' => 'edit_theme_options', 
			'sanitize_callback' => 'sanitize_text_field', 
			'default' => 'yes', 
		) ); 
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'multicolors_content_type', array( 
			'label' => __( 'Show a summary', 'multicolors' ), 
			'section' => 'multicolors_post_section', 
			'settings' => 'multicolors_content_type', 
			'type' => 'radio', 
			'choices' => array( 
				'yes' => __('Yes', 'multicolors'), 
				'no' => __('No', 'multicolors'), 
			), 
		) ) );
		$wp_customize->add_setting( 'multicolors_read_more', array( 
			'capability' => 'edit_theme_options', 
			'sanitize_callback' => 'sanitize_text_field', 
			'default' => 'yes', 
		) ); 
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'multicolors_read_more', array( 
			'label' => __( 'Show Read More button', 'multicolors' ), 
			'section' => 'multicolors_post_section', 
			'settings' => 'multicolors_read_more', 
			'type' => 'radio', 
			'choices' => array( 
				'yes' => __('Yes', 'multicolors'), 
				'no' => __('No', 'multicolors'), 
			), 
		) ) );
	} 
	add_action('customize_register', 'multicolors_theme_customizer');

?>
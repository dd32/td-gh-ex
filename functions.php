<?php
/*
 * Theme functions and definitions.
 */

// Sets up theme defaults and registers various WordPress features that privatebusiness supports
	function privatebusiness_setup() { 

	// Set width without the padding
		if ( ! isset( $content_width ) )
		$content_width = 675;

	// Make theme available for translation
		load_theme_textdomain('privatebusiness', get_template_directory() . '/languages');  

	// Register Menu
		register_nav_menus( 
		array( 'primary' => __( 'Primary Navigation', 'privatebusiness' ), 
	 	) ); 

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

	// Resize mode thumbnails
		set_post_thumbnail_size( 675, 550 ); 


	// This feature adds RSS feed links to html head 
		add_theme_support( 'automatic-feed-links' );


	// Switches default core markup for search form, comment form, and comments to output valid HTML5
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	// Background color
		$args = array( 'default-color' => 'eeeeee', 
		); 
		add_theme_support( 'custom-background', $args ); 

	}
	add_action( 'after_setup_theme', 'privatebusiness_setup' ); 


// Add blogname to wp_title
	function privatebusiness_wp_title( $title ) { 
		global $page, $paged; 
		if ( is_feed() ) 
		return $title; 
	
		$filtered_title = $title . get_bloginfo( 'name' ); 
			return $filtered_title; 
	}
	add_filter( 'wp_title', 'privatebusiness_wp_title' ); 


// Enqueues scripts and styles for front-end
	function privatebusiness_scripts() {
		if (!is_admin()) { 
			wp_enqueue_style( 'style', get_stylesheet_uri() );
			wp_enqueue_script( 'nav', get_template_directory_uri() . '/js/nav.js', array( 'jquery' ) );
		}
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	}
	add_action( 'wp_enqueue_scripts', 'privatebusiness_scripts' );


// Register Google Fonts
	function privatebusiness_fonts() { 
		if (! is_admin() ) { 
			wp_register_style('googleFonts', '//fonts.googleapis.com/css?family=Open+Sans' ); 		
				wp_enqueue_style( 'googleFonts'); 	
		}
	}  	
	add_action('wp_enqueue_scripts', 'privatebusiness_fonts');


// Sidebars
	function privatebusiness_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Primary Sidebar', 'privatebusiness' ),
		'id' => 'primary',
		'description' => __( 'Select widgets from the right-hand side.', 'privatebusiness' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage Sidebar Right', 'privatebusiness' ),
		'id' => 'homepage-right',
		'description' => __( 'Select widgets from the right-hand side.', 'privatebusiness' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage Sidebar Left', 'privatebusiness' ),
		'id' => 'homepage-left',
		'description' => __( 'Select widgets from the right-hand side.', 'privatebusiness' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Right', 'privatebusiness' ),
		'id' => 'footer-right',
		'description' => __( 'Select widgets from the right-hand side.', 'privatebusiness' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar Left', 'privatebusiness' ),
		'id' => 'footer-left',
		'description' => __( 'Select widgets from the right-hand side.', 'privatebusiness' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );

	}
	add_action( 'widgets_init', 'privatebusiness_widgets_init' );


// Replaces the excerpt "more" text by a link 
	function privatebusiness_excerpt_more($more) { 
		global $post; 
		return '<a class="moretag" href="'. get_permalink($post->ID) . '">' . __( 'Read More &raquo;', 'privatebusiness' ) . '</a>'; 
		} 
	add_filter('excerpt_more', 'privatebusiness_excerpt_more'); 


// Add class to the excerpt 
	function privatebusiness_excerpt( $excerpt ) {
    		return str_replace('<p', '<p class="excerpt"', $excerpt);
		}
	add_filter( "the_excerpt", "privatebusiness_excerpt" );


// Default header
	register_default_headers( array(
	'boats' => array(
		'url' => '%s/images/boats.jpg',
		'thumbnail_url' => '%s/images/boats-thumbnail.jpg',
		'description' => __( 'Boats', 'privatebusiness' )
		)
	) );


// Add html5 support for older IE version 
	function darkorange_html5_shim () { 
		echo '<!--[if lt IE 9]>'; 
		echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>'; 
		echo '<![endif]-->'; 
		} 
	add_action('wp_head', 'darkorange_html5_shim');


// Theme Options Page
	function register_privatebusiness_menu_page(){ 
		add_theme_page('PrivateBusiness', 'PrivateBusiness', 'manage_options', 'privatebusiness', 'privatebusiness_options' ); 
 	} 
	add_action( 'admin_menu', 'register_privatebusiness_menu_page' ); 

	function privatebusiness_options() { 
		if (!current_user_can('manage_options')) { 
			wp_die( __('You do not have permission to access this page', 'privatebusiness' ) ); 
			} 
			include 'theme-options.php'; 
		}


// Theme Customizer (option to add logo)
	function privatebusiness_theme_customizer( $wp_customize ) { 

		$wp_customize->add_section( 'privatebusiness_logo_section' , array( 
		'title' => __( 'Logo', 'privatebusiness' ), 
		'priority' => 30, 
		'description' => __( 'Upload a logo to replace blogname and description in header', 'privatebusiness' ),
		) );
		$wp_customize->add_setting( 'privatebusiness_logo' );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'privatebusiness_logo', array( 
		'label' => __( 'Logo', 'privatebusiness' ), 
		'section' => 'privatebusiness_logo_section', 
		'settings' => 'privatebusiness_logo', 
		) ) );

	} 
	add_action('customize_register', 'privatebusiness_theme_customizer');

?>
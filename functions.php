<?php
/**
 * concern functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package atlas_concern
 */

if ( ! function_exists( 'atlas_concern_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function atlas_concern_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on concern, use a find and replace
	 * to change 'concern' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'atlas-concern', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
    
    /*
     * Enable support for Post Thumbnails on posts and pages.
     */
    add_theme_support( 'post-thumbnails' );


    // Add menus.
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'atlas-concern' ),
	
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );
	
	
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'concern_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
		) ) );

	// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

}
endif; // atlas_concern_setup

add_action( 'after_setup_theme', 'atlas_concern_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

function atlas_concern_content_width() {
        // This variable is intended to be overruled from themes.
        // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
        // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
        $GLOBALS['content_width'] = apply_filters( 'atlas_concern_content_width', 900 );
}

add_action( 'after_setup_theme', 'atlas_concern_content_width', 0 );

if ( ! function_exists( 'atlas_concern_customize_register' ) ) :

function atlas_concern_customize_register( $wp_customize ) {
	
    // Theme Settings

    /* Social Layout */

    $wp_customize->add_section( 'social_section', array(
	    'priority'       => 1,
        'title' => __( 'Top Lİne Layout', 'atlas-concern' )
    ));


    $wp_customize->add_setting( 'social_section_text_1', array(
        'type' => 'theme_mod',
		'default' => 'Welcome Concern Site',
		'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control( 'social_section_text_1', array(
        'label' => __( 'İnfo', 'atlas-concern' ),
        'type' => 'text',
        'section' => 'social_section'
    ));


    $wp_customize->add_setting( 'social_section_facebook_url', array(
        'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( 'social_section_facebook_url', array(
        'label' => __( 'Facebook Url', 'atlas-concern' ),
        'type' => 'url',
        'section' => 'social_section'
    ));
	
	$wp_customize->add_setting( 'social_section_twitter_url', array(
        'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( 'social_section_twitter_url', array(
        'label' => __( 'Twitter Url', 'atlas-concern' ),
        'type' => 'url',
        'section' => 'social_section'
    ));
	
	$wp_customize->add_setting( 'social_section_linkedin_url', array(
        'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( 'social_section_linkedin_url', array(
        'label' => __( 'Linkedin Url', 'atlas-concern' ),
        'type' => 'url',
        'section' => 'social_section'
    ));
	
	$wp_customize->add_setting( 'social_section_youtube_url', array(
        'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( 'social_section_youtube_url', array(
        'label' => __( 'Youtube Url', 'atlas-concern' ),
        'type' => 'url',
        'section' => 'social_section'
    ));

	$wp_customize->add_setting( 'social_section_google_url', array(
        'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( 'social_section_google_url', array(
        'label' => __( 'Google Url', 'atlas-concern' ),
        'type' => 'url',
        'section' => 'social_section'
    ));


    /* Message Layout */

    $wp_customize->add_section( 'message_section', array(
	     'priority'       => 2,
        'title' => __( 'Mesaage Layout', 'atlas-concern' )
    ));


	$wp_customize->add_setting( 'message_section_icon', array(
        'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr'
    ));

    $wp_customize->add_control( 'message_section_icon', array(
        'label' => __( 'İcon', 'atlas-concern' ),
        'type' => 'text',
		'description' => __( 'Themify icons for code <a href="https://themify.me/themify-icons" target="_blank">click here</a> ', 'atlas-concern' ),
        'section' => 'message_section'
    ));

    $wp_customize->add_setting( 'message_section_text', array(
        'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control( 'message_section_text', array(
        'label' => __( 'Message Title', 'atlas-concern' ),
        'type' => 'text',
        'section' => 'message_section'
    ));
	
	$wp_customize->add_setting( 'message_section_textarea', array(
        'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_textarea'
    ));

    $wp_customize->add_control( 'message_section_textarea', array(
        'label' => __( 'Message Description', 'atlas-concern' ),
        'type' => 'textarea',
        'section' => 'message_section'
    ));

    /* Button Layout */

    $wp_customize->add_section( 'btn_section', array(
		'priority'       => 3,
        'title' => __( 'Button Layout', 'atlas-concern' )
    ));


	$wp_customize->add_setting( 'btn_section_text_1', array(
        'type' => 'theme_mod',
		'default' => 'Contact Us',
		'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control( 'btn_section_text_1', array(
        'label' => __( 'Button Text', 'atlas-concern' ),
        'type' => 'text',
        'section' => 'btn_section'
    ));
	
	$wp_customize->add_setting( 'btn_section_url', array(
        'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( 'btn_section_url', array(
        'label' => __( 'Button Url', 'atlas-concern' ),
        'type' => 'url',
        'section' => 'btn_section'
    ));

   

}
add_action( 'customize_register', 'atlas_concern_customize_register' );
endif;// atlas_concern_customize_register




if ( ! function_exists( 'atlas_concern_widgets_init' ) ) :

function atlas_concern_widgets_init() {

    /*
     * Register widget areas.
     */
   
    register_sidebar( array(
        'name' => __( 'Right Sidebar', 'atlas-concern' ),
        'id' => 'right_sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'atlas-concern' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ) );
	
    register_sidebar( array(
        'name' => __( 'Footer Widget 1', 'atlas-concern' ),
        'id' => 'footer_widget_1',
		'description'   => esc_html__( 'Add widgets here.', 'atlas-concern' ),
        'before_widget' => '<li id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ) );

    register_sidebar( array(
        'name' => __( 'Footer Widget 2', 'atlas-concern' ),
        'id' => 'footer_widget_2',
		'description'   => esc_html__( 'Add widgets here.', 'atlas-concern' ),
        'before_widget' => '<li id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ) );

    register_sidebar( array(
        'name' => __( 'Footer Widget 3', 'atlas-concern' ),
        'id' => 'footer_widget_3',
		'description'   => esc_html__( 'Add widgets here.', 'atlas-concern' ),
        'before_widget' => '<li id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ) );

    register_sidebar( array(
        'name' => __( 'Footer Widget 4', 'atlas-concern' ),
        'id' => 'footer_widget_4',
		'description'   => esc_html__( 'Add widgets here.', 'atlas-concern' ),
        'before_widget' => '<li id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ) );

    
}
add_action( 'widgets_init', 'atlas_concern_widgets_init' );
endif;// concern_widgets_init




if ( ! function_exists( 'atlas_concern_enqueue_scripts' ) ) :
    function atlas_concern_enqueue_scripts() {

     /* Js */
    wp_enqueue_script( 'jquery.min', get_template_directory_uri() . '/js/jquery-1.12.4.min.js', array('jquery'), '20151215', true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '20151215', true );
    wp_enqueue_script( 'bootsnav', get_template_directory_uri() . '/js/bootsnav.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'concern-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'concern-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery'), '20151215', true );

     /* Css */
	 
    wp_enqueue_style( 'atlas-concern-style', get_stylesheet_uri() );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style( 'bootsnav', get_template_directory_uri() . '/css/bootsnav.css');
	wp_enqueue_style( 'theme', get_template_directory_uri() . '/css/theme.css');
	wp_enqueue_style( 'themify-icons', get_template_directory_uri() . '/css/themify-icons/themify-icons.css');


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
    }
    add_action( 'wp_enqueue_scripts', 'atlas_concern_enqueue_scripts' );
endif;






/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/*
 * Resource files included by Bootstrap.
 */
require get_template_directory() . '/inc/bootstrap/wp_bootstrap_navwalker.php';
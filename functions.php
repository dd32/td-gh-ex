<?php

/**
 * bestblog functions and definitions
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 */

/*
 * Set up the content width value based on the theme's design.
 *
 */


if (! function_exists('bestblog_setup')) :
//**************bestblog SETUP******************//
function bestblog_setup()
{

  // Set the default content width.
	$GLOBALS['content_width'] = 525;

/*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
    add_theme_support('title-tag');


    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    //Register Menus
    register_nav_menus(array(
        'primary' => __('Primary Navigation(Header)', 'best-blog'),
    'off-canvas'    => esc_html__('Off canvas(Header)', 'best-blog')
    ));

    // Declare WooCommerce support
    add_theme_support('woocommerce');
		
		// Add theme support for woocommerce product gallery added in WooCommerce 3.0.
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-slider' );

    //Custom Background
    $args = array(
    'default-color' => 'f7f7f7',
);
    add_theme_support('custom-background', $args);

    /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    /*
         * Enable support for custom Header image.
         *
         *  @since advance
         */
    $args = array(
            'flex-width'    => true,
            'flex-height'   => true,
            'default-image' => get_template_directory_uri() . '/images/header.jpg',
            'header-text'   => false,
    );
    add_theme_support('custom-header', $args);

    //Post Thumbnail
    add_theme_support('post-thumbnails');

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');
    /*

    /*
         * Enable support for custom logo.
         *
         *  @since bestblog
         */


    $defaults = array(
        'height'      => 100,
        'width'      => 220,
        'flex-width'  => true,
				'flex-height'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support('custom-logo', $defaults);

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    // Add featured image sizes
    //
    // Sizes are optimized and cropped for landscape aspect ratio
    // and optimized for HiDPI displays on 'small' and 'medium' screen sizes.
    add_image_size('bestblog-small', 540, 370, true); // name, width, height, crop
    add_image_size('bestblog-medium', 750, 450, true);
    add_image_size('bestblog-large', 1200, 750, true);
    add_image_size('bestblog-xlarge', 1920, 400, true);
		add_image_size('bestblog-slider', 1440, 500, true);


    add_theme_support('starter-content', array(

    'posts' => array(
        'home',
        'blog' ,
    ),

        'options' => array(
            'show_on_front' => 'page',
            'page_on_front' => '{{home}}',
            'page_for_posts' => '{{blog}}',
        ),


        'nav_menus' => array(
            'primary' => array(
                'name' => __('Primary Navigation(Header)', 'best-blog'),
                'items' => array(
                    'page_home',
                    'page_about',
                    'page_blog',
                    'page_contact',
                ),
            ),
        ),
    ));
}
endif; // bestblog_setup
add_action('after_setup_theme', 'bestblog_setup');



//Load CSS files

function bestblog_scripts()
{
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/fonts/awesome/css/font-awesome.min.css', 'font_awesome', true);
    wp_enqueue_style('bestblog_core', get_template_directory_uri() . '/css/bestblog.min.css', 'bestblogcore_css', true);
    wp_enqueue_style('bestblog-fonts', bestblog_fonts_url(), array(), null);
    wp_enqueue_style('bestblog-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'bestblog_scripts');


/**
 * Google Fonts
 */

function bestblog_fonts_url()
{
    $fonts_url = '';

    /* Translators: If there are characters in bestblogr language that are not
    * supported by Lato, translate this to 'off'. Do not translate
    * into bestblogr own language.
    */
    $lato = _x('on', 'Lato font: on or off', 'best-blog');

    /* Translators: If there are characters in your language that are not
    * supported by Ubuntu, translate this to 'off'. Do not translate
    * into your own language.
    */
    $ubuntu = _x('on', 'Ubuntu font: on or off', 'best-blog');



    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $open_sans = _x('on', 'Open Sans font: on or off', 'best-blog');

    if ('off' !== $lato || 'off' !== $ubuntu || 'off' !== bestblog) {
        $font_families = array();

        if ('off' !== $ubuntu) {
            $font_families[] = 'Ubuntu:400,500,700';
        }

        if ('off' !== $lato) {
            $font_families[] = 'Lato:400,700,400italic,700italic';
        }

        if ('off' !== $open_sans) {
            $font_families[] = 'Open Sans:400,400italic,700';
        }

        $query_args = array(
                'family' => urlencode(implode('|', $font_families)),
                'subset' => urlencode('latin,latin-ext'),
            );

        $fonts_url = add_query_arg($query_args, '//fonts.googleapis.com/css');
    }

    return $fonts_url;
}

//Load Java Scripts
function bestblog_head_js()
{
    if (!is_admin()) {
        wp_enqueue_script('jquery');
        wp_enqueue_script('bestblog_js', get_template_directory_uri().'/js/bestblog.min.js', array('jquery'), true);
        wp_enqueue_script('bestblog_other', get_template_directory_uri().'/js/bestblog_other.min.js', array('jquery'), true);

        if (is_singular()) {
            wp_enqueue_script('comment-reply');
        }
    }
}
add_action('wp_enqueue_scripts', 'bestblog_head_js');


/**
 * Adds css style for customizer ui
 */
function bestblog_customizer_controls_styles() {
	$theme_version = wp_get_theme()->get( 'version' );
	wp_enqueue_style( 'customizer', get_template_directory_uri() . '/css/admin.css', array(), $theme_version );
}
add_action( 'customize_controls_enqueue_scripts', 'bestblog_customizer_controls_styles' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function bestblog_widgets_init()
{
    register_sidebar(array(
    'name'          => __('Right Sidebar', 'best-blog'),
    'id'            => 'right-sidebar',
    'description'   => __('Right Sidebar', 'best-blog'),
    'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-item cell small-24 medium-12 large-24"><div class="widget_wrap ">',
    'after_widget'  => '</div></div>',
    'before_title'  => '<div class="widget-title "> <h3>',
    'after_title'   => '</h3></div>'
    ));
		register_sidebar(array(
    'name'          => __('Home Widgets area', 'best-blog'),
    'id'            => 'home-widgets-bestblog',
    'description'   => __('Home widgets area', 'best-blog'),
    'before_widget' => '<div id="%1$s" class="widget %2$s home_widget_wrap">',
    'after_widget'  => '</div>',
    'before_title'  => '',
    'after_title'   => ''
    ));

		register_sidebar(array(
		'name'          => __('Home sidebar Widgets', 'best-blog'),
		'id'            => 'home-sidebar-bestblog',
		'description'   => __('Home Right Sidebar', 'best-blog'),
		'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-item cell small-24 medium-12 large-24"><div class="widget_wrap home_sidebar ">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="widget-title "> <h3>',
		'after_title'   => '</h3></div>'
		));
		register_sidebar(array(
		'name'          => __('WooCommerce sidebar Widgets', 'best-blog'),
		'id'            => 'woocommerce-sidebar-bestblog',
		'description'   => __('Home Right Sidebar', 'best-blog'),
		'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-item cell small-24 medium-12 large-24"><div class="widget_wrap woocommerce_sidebar ">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="widget-title"> <h3>',
		'after_title'   => '</h3></div>'
		));
    register_sidebar(array(
    'name'          => __('Footer Widgets', 'best-blog'),
    'id'            => 'foot_sidebar',
    'description'   => __('Widget Area for the Footer', 'best-blog'),
    'before_widget' => '<div id="%1$s" class="widget %2$s widget_wrap footer_widgets_warp cell small-24 medium-12 large-6 align-self-top " ><aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside></div>',
    'before_title'  => '<div class="widget-title "> <h3>',
    'after_title'   => '</h3></div>'
    ));
}

add_action('widgets_init', 'bestblog_widgets_init');

/**
 * Checks whether woocommerce is active or not
 *
 * @return boolean
 */
function bestblog_is_woocommerce_active() {
	if ( class_exists( 'woocommerce' ) ) {
		return true;
	} else {
		return false;
	}
}


/**
 * If woocommerce is active, load compatibility file
 */
if ( bestblog_is_woocommerce_active() ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


/** call widgets */
require_once(get_template_directory() . '/inc/widgets/class-author-widget.php');
require_once(get_template_directory() . '/inc/widgets/latest-posts-single.php');
require_once(get_template_directory() . '/inc/widgets/latest-posts-missionary.php');



/** Register all navigation menus */
require_once(get_template_directory() . '/functions/menu.php');

/** Image function */
require_once(get_template_directory() . '/functions/function-hooks.php');

/** color function */
require_once(get_template_directory() . '/functions/custom-css.php');

/** Layout function */
require_once(get_template_directory() . '/functions/template-layout.php');

/**
 * Implement the Custom Header feature.
 */
require_once(get_template_directory() . '/inc/custom-header.php');


//load widgets ,kirki ,customizer,functions
require_once(get_template_directory() . '/inc/kirki/kirki.php');
require_once(get_template_directory() . '/inc/customizer.php');
require_once(get_template_directory() . '/inc/welcome/welcome-screen.php');

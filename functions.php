<?php


if ( ! function_exists( 'bee_news_setup' ) ) :

function bee_news_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    /* Beenews Load Text Domain Begin */
    load_theme_textdomain( 'bee-news', get_template_directory() . '/languages' );
    /* Beenews Load Text Domain End */

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'content_width', 900 );

    /*
     * Let WordPress manage the document title.
     */
    add_theme_support( 'title-tag' );
    
    /*
     * Enable support for Post Thumbnails on posts and pages.
     */
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 825, 510, true );

    add_image_size( 'bee-news-category-thumb', 350, 260, true ); // (cropped)
    add_image_size( 'bee-news-category-thumb-small', 220, 180, true ); // (cropped)

    add_theme_support( 'custom-header', array (
      'width'             => 960,
      'height'            => 100,
      'flex-height'        => true,
      'uploads'           => true,
      'header-text'            => false
    ));

    add_theme_support( 'custom-background', array (
     'default-color'          => '#000',
    'default-image'          => ''
    ));


    // Add menus.
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'bee-news' ),
        'social'  => __( 'Social Links Menu', 'bee-news' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    /*
     * Enable support for Post Formats.
     */
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ) );
}
endif; // bee_news_setup

add_action( 'after_setup_theme', 'bee_news_setup' );


if ( ! function_exists( 'bee_news_widgets_init' ) ) :

function bee_news_widgets_init() {

    /*
     * Register widget areas.
     */
    /* Beenews Register Sidebars Begin */


     register_sidebar( array(
        'name' => __( 'Homepage - Header area', 'bee-news' ),
        'id' => 'homepage-slider',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ) );

     
    register_sidebar( array(
        'name' => __( 'Homepage - Content area', 'bee-news' ),
        'id' => 'content-area',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ) );

    register_sidebar( array(
        'name' => __( 'Right Sidebar', 'bee-news' ),
        'id' => 'right-sidebar',
        'before_widget' => '<div id="%1$s" class="single-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title title">',
        'after_title' => '</h3>'
    ) );


    register_sidebar( array(
        'name' => __( 'Footer 3 - Quick Link 1', 'bee-news' ),
        'id' => 'footer-3-quicklink-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s col-xs-4" >',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ) );


    register_sidebar( array(
        'name' => __( 'Footer 3 - Quick Link 2', 'bee-news' ),
        'id' => 'footer-3-quicklink-2',
        'before_widget' => '<div id="%1$s" class="widget %2$s col-xs-4" >',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ) );


    register_sidebar( array(
        'name' => __( 'Footer 3 - Quick Link 3', 'bee-news' ),
        'id' => 'footer-3-quicklink-3',
        'before_widget' => '<div id="%1$s" class="widget %2$s col-xs-4" >',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ) );



    /* Beenews Register Sidebars End */
}
add_action( 'widgets_init', 'bee_news_widgets_init' );
endif;// bee_news_widgets_init



if ( ! function_exists( 'bee_news_customize_register' ) ) :

function bee_news_customize_register( $wp_customize ) {
    // Do stuff with $wp_customize, the WP_Customize_Manager object.

    /* Beenews Customizer Controls Begin */

    /* Beenews Customizer Controls End */

}
add_action( 'customize_register', 'bee_news_customize_register' );
endif;// bee_news_customize_register


if ( ! function_exists( 'bee_news_enqueue_scripts' ) ) :
    function bee_news_enqueue_scripts() {

        /* Beenews Enqueue Scripts Begin */

    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.js', false, null, true);

    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', false, null, true);
  



    if(is_home() || is_front_page()):

        wp_enqueue_script( 'google-api-js', 
            'https://apis.google.com/js/client.js?onload=init', false, null, true);
    endif;



    wp_enqueue_script( 'beenews-custom-js', get_template_directory_uri() . '/js/beenews-custom.js', false, null, true);

    /* Beenews Enqueue Scripts End */

        /* Beenews Enqueue Styles Begin */

    wp_deregister_style( 'bootstrap' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', false, null, 'all');
    wp_deregister_style( 'font-awesome' );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', false, null, 'all');
        // Load our main stylesheet.

    wp_deregister_style( 'style' );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', false, null, 'all');

    wp_deregister_style( 'inline-css' );
    wp_enqueue_style( 'inline-css', get_template_directory_uri() . '/css/style.css', false, null, 'all');


         global $bee_news_redux_builder;
          $custom_css = "
            .header-wrap{
                background:" .  $bee_news_redux_builder['primary-color']['color'] . ";" .
            "
            }

            .panel-heading span{
                background: " .  $bee_news_redux_builder['primary-color']['color']  . ";" .
            " 
            }

            .carousel-news .carousel-caption label{
                background: ".  $bee_news_redux_builder['primary-color']['color']  . ";".

            "
            }
            .carousel-news .carousel-indicators:after{
                background: " . $bee_news_redux_builder['primary-color']['color']  . ";".

            "
            }
           .carousel-news .carousel-indicators li{
            display:block;
            margin-bottom:5px;
            border:0;
            border-left:3px solid " . $bee_news_redux_builder['primary-color']['color'] . ";".
            "width:100%;
            height:auto;border-radius:0;
            text-align:left;
            text-indent:inherit;
            padding:2px 0 2px 8px;
            opacity:0.7;
            background:transparent;
            }
            .panel-slider .carousel-indicators li.active, .photo-gallery-carousel .carousel-indicators li.active{
                background: " . $bee_news_redux_builder['primary-color']['color'] . ";".
            "}
            .tab-container .nav-tabs li.active a,
            .tab-container .nav-tabs li.active a:focus,
            .tab-container .nav-tabs li.active:hover a,
            .tab-container .nav-tabs li.active:hover a:focus,
            .tab-container .nav-tabs li.active:focus a,
            .tab-container .nav-tabs li.active:focus a:focus {
                color: ". $bee_news_redux_builder['primary-color']['color']  . ";".
            "    background: #fff
            }
            a:hover, a:focus {
                text-decoration: none;
                color: " . $bee_news_redux_builder['primary-color']['color']  . ";".
            "}
            .video-carousel{
                background: " . $bee_news_redux_builder['secondary-color']['color']  . ";".
            "}
            .footer{
                background: " .  $bee_news_redux_builder['secondary-color']['color'] . ";".
            "
            }
            .navbar-maitri{
                background: " .  $bee_news_redux_builder['menu-color']['color'] . ";".
            
            "}
            .navbar-maitri li.active, .navbar-maitri li a:hover, .navbar-maitri li a:focus{
                background: " . $bee_news_redux_builder['menu-active-color']['color'] . ";".
            "
            }
            .navbar-maitri li.menu-item-home.active a {
                color: rgba(255,255,255,0);
            }
            ";
        wp_add_inline_style( 'inline-css', $custom_css );


    /* Beenews Enqueue Styles End */

    }
    add_action( 'wp_enqueue_scripts', 'bee_news_enqueue_scripts' );
endif;


/* Beenews Include Resources Begin */
require_once "inc/bootstrap/bee_news_bootstrap_navwalker.php";
require_once "inc/bootstrap/bee_news_bootstrap_navwalker.php";

require_once "inc/template-tags.php";
require_once "inc/widget/Bee-News-Breaking-New-Headline-layout.php";
require_once "inc/widget/Bee-News-Right-Sidebar.php";
require_once "inc/widget/Bee-News-Slider.php";
require_once "inc/widget/Bee-News-Layout-1.php";
require_once "inc/widget/Bee-News-Layout-2.php";
require_once "inc/widget/Bee-News-Layout-3.php";
require_once "inc/widget/Bee-News-Category-Sidebar.php";
require_once "inc/news-layouts.php";
require_once "inc/class-bee-news-autoloader.php";
require_once "inc/class-bee-news-lite.php";
 require_once "inc/library/customizer/class-bee-news-main-notify-system.php";

//include Redux Framework
include_once get_template_directory().'/admin-folder/admin/admin-init.php';
$beenews = new bee_news_Lite();

/* Beenews Include Resources End */


/*
 * Removed Continue reading on manually inputted excerpt;
 */
function bee_news_excerpt_more( $output ) {
    return '...';
}

add_filter('excerpt_more', 'bee_news_excerpt_more');


// Changing excerpt length - only works with MANUAL excerpt
// Priority of 9 is set so that read more filter function fires AFTER this one.
add_filter('get_the_excerpt', 'bee_news_excerpt_length', 9);
function bee_news_excerpt_length($excerpt) {
    global $post;
    $length = 10; //Number of characters to display in excerpt
    $new_excerpt = substr($excerpt, 0, $length); //truncate excerpt according to $len
    if(strlen($new_excerpt) < strlen($excerpt)) {
        return $new_excerpt;
    } else {
        return $excerpt;
    }
}


function bee_news_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'bee_news_content_width', 840 );
}
add_action( 'after_setup_theme', 'bee_news_content_width', 0 );

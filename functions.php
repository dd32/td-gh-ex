<?php
include_once (get_template_directory() . '/include/theme-options.php');

function betilu_setup() {
    // set width of external linked media players not defined
    global $content_width;
        if ( !isset( $content_width  ) ) {
            $content_width  = 720;
    }
    // custom editor style support
    add_editor_style( 'editor-style.css' );
  
    // This theme uses Featured Images (also known as post thumbnails)
    add_theme_support('post-thumbnails'); 
    //set_post_thumbnail_size( 150, 150 );

    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // add tag support to pages
    register_taxonomy_for_object_type('post_tag', 'page');

    // language support - add your translation
    load_theme_textdomain('betilu', get_template_directory() . '/languages');

    // This theme uses wp_nav_menu in one location.
    register_nav_menus(array(
        'primary' => __('Primary Navigation - below header', 'betilu'),
        'secondary' => __('Secondary Top Navigation - NO DROPDOWNS', 'betilu')
        ));  
}
add_action('after_setup_theme', 'betilu_setup');

function betilu_add_theme_scripts() {    
   
    // Loads default main stylesheet.
    wp_enqueue_style( 'style', get_stylesheet_uri() ); 

    /**
     * Adds JavaScript to pages with the comment form to support
     * sites with threaded comments (when in use).
     */
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );  
}
    add_action( 'wp_enqueue_scripts', 'betilu_add_theme_scripts' );

    // add ie conditional html5 shim to header
function betilu_add_ie_html5_shim () {
    echo '<!--[if lt IE 9]>';
    echo '<script src="js/html5.js"></script>';
    echo '<![endif]-->';
}
    add_action('wp_head', 'betilu_add_ie_html5_shim');

    // font imported from googleapolis fonts
    add_action( 'betilu', 'wpb_add_google_fonts', 5);
    function betilu_add_google_fonts() {
    echo "<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,300,700' rel='stylesheet' type='text/css'>";
    }

   /**
     * customer background color and image support 
     */
    add_theme_support( 'custom-background' );
    $args = array(
    'default-color'          => 'FAFAFB',
    'default-image'          => get_template_directory_uri() . '/images/default-background.jpg',	
    );
    add_theme_support( 'custom-background', $args );

    /**
     * customer header image banner support 
     */
    add_theme_support( 'custom-header' );
        $defaults = array(
    
	'default-image'          => get_template_directory_uri() . '/images/default-header.png',
	'random-default'         => false,
 	'width'                  => 176,
	'height'                 => 176,
	'flex-height'            => true,
 	'flex-width'             => true,
        'repeat'                 => 'no-repeat',
 	'default-text-color'     => 'FFFFFF',
	'header-text'            => false,
	'uploads'                => true,
        'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',    
    );
    add_theme_support( 'custom-header', $defaults );

    /**
     *  reformat the more link for excerpts 
     */
    function betilu_excerpt_more($more) {
        global $post;
           return  
	       '<a class="moretag" href="'. get_permalink($post->ID) . '">' . __( '<br>View Full Article...', 'betilu' ) . '</a>';
    }
    add_filter('excerpt_more', 'betilu_excerpt_more');

   
function betilu_widgets_init() {
      register_sidebar(array(
            'name'          => __('Lead Article Top Right Box', 'betilu'),
            'id'            => 'sidebar-2',
            'description'   => __('Right-side top Lead Article page', 'betilu'),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ));
        register_sidebar(array(
            'name'          => __('Primary Right Side', 'betilu'),
            'id'            => 'sidebar-1',
            'description'   => __('Right-side widget area - two column pages', 'betilu'),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ));

        register_sidebar(array(
            'name'          => __('First Footer Widget Area', 'betilu'),
            'id'            => 'first-footer-widget-area',
            'description'   => __('The first footer widget area', 'betilu'),
            'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ));
        register_sidebar(array(
            'name'          => __('Second Footer Widget Area', 'betilu'),
            'id'            => 'second-footer-widget-area',
            'description'   => __('The second footer widget area', 'betilu'),
            'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ));
        register_sidebar(array(
            'name'          => __('Third Footer Widget Area', 'betilu'),
            'id'            => 'third-footer-widget-area',
            'description'   => __('The third footer widget area', 'betilu'),
            'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ));
        register_sidebar(array(
            'name'          => __('Fourth Footer Widget Area', 'betilu'),
            'id'            => 'fourth-footer-widget-area',
            'description'   => __('The fourth footer widget area', 'betilu'),
            'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ));
}
add_action( 'widgets_init', 'betilu_widgets_init' );
?>
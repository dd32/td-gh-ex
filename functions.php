<?php
/*
================================================================================================
Silver Quantum - functions.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other being template-tags.php). This functions.php template file allows you to 
add features and functionality to a WordPress theme which is stored in the theme's sub-directory
in the theme folder. The second template file template-tags.php allows you to add additional 
features and functionality to the WordPress theme which is stored in the includes folder and its 
called in the functions.php.

@package        Silver Quantum WordPress Theme
@copyright      Copyright (C) 2014-2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.lumiathemes.com/)
================================================================================================
*/

/*
================================================================================================
Table of Content
================================================================================================
 1.0- Theme Setup
 2.0 - Content Width
 3.0 - Enqueue Scripts and Styles
 4.0 - Register Sidebars
 5.0 - Required Files
 ================================================================================================
*/

/*
================================================================================================
 1.0 - Theme Setup
================================================================================================
The theme setup uses the after_setup_theme hook to initialize basic setup, registrations and init
actions for a theme.
================================================================================================
*/
function silver_quantum_theme_setup() {
    /*
    ============================================================================================
    Enable and activate add_theme_support('title-tag); for Silver Quantum. This feature should
    be used in place instead of wp_title() function. 
    ============================================================================================
    */
    add_theme_support('title-tag');
    
    /*
    ============================================================================================
    Enable and activate load_theme_textdomain(); for Silver Quantum. This feature is use to help
    translate the theme's translations to differnt locale. WordPress core will automatically help
    translating.
    ============================================================================================
    */
    load_theme_textdomain('silver-quantum');
    
    /*
    ================================================================================================
    Enable and activate add_theme_support('automatic-feed-links'); for Silver Quantum. This feature
    enables Automtic Feed Links for posts and comments in the head. This should be used in place of
    the deprected automatic_feed_links() function. 
    ================================================================================================
    */
    add_theme_support('automatic-feed-links');
    
    /*
    ================================================================================================
    Enable and activate add_theme_support('html5', array()); for Silver Quantum. This feature allows 
    the use of HTML5 markup for search forms, comment forms, comment list, gallery, and captions.
    ================================================================================================
    */
    add_theme_support('html5', array(
        'comment-list',
        'comment-form',
        'search-form', 
        'caption'
    ));
    
    /*
    ================================================================================================
    Enable and activate add_theme_support('custom-background'); for Silver Quantum. This feature
    enables custom backgrounds and colors for this theme.
    ================================================================================================
    */
    add_theme_support('custom-background', array(
        'default-color' => '#cccccc',
    ));
    
    /*
    ================================================================================================
    Enable and activate add_theme_support('post-thumbnails); for Silver Quantum. This feature
    enables Post Thumbnails (Featured Images) support for a theme. If you wish to display thumbnails,
    use the following to display the_post_thumbnail();. If you need to to check of there is a post
    thumbnail, then use has_post_thumbnail();.
    ================================================================================================
    */
    add_theme_support('post-thumbnails');
    add_image_size('silver-quantum-banner', 1024, 300, true);
    
    /*
    ================================================================================================
    Enable and activate add_post_type_suport('page', 'excerpt'); for Silver Quantum. This feature
    enables excerpt for pages only that needs it. Excerpts is already supported in posts.
    ================================================================================================
    */
    add_post_type_support('page', 'excerpt');
    
    register_nav_menus(array(
        'primary-navigation'    => esc_html__('Primary Navigation', 'silver-quantum'),
    ));
}
add_action('after_setup_theme', 'silver_quantum_theme_setup');

/*
================================================================================================
 2.0 - Content Width
================================================================================================
Content Width is a theme feature that allows you set maximum allowed width for any content in 
the theme like OEmbeds and images added to posts.
================================================================================================
*/
function silver_quantum_content_width_setup() {
    $GLOBALS['content_width'] = apply_filters('silver_quantum_content_width_setup', 834);
}
add_action('after_setup_theme', 'silver_quantum_content_width_setup', 0);

/*
================================================================================================
 3.0 - Enqueue Scripts and Styles
================================================================================================
WordPress has an enqueuing system for adding scripts and styles locally or remotely to prevent
conflicts with plugins. 
================================================================================================
*/
function silver_quantum_enqueue_scripts_setup() {
    /*
    ============================================================================================
    Enable and activate the main theme stylesheet for Silver Quantum.
    ============================================================================================
    */
    wp_enqueue_style('silver-quantum-style', get_stylesheet_uri());
    
    /*
    ================================================================================================
    Enable and activate Google Fonts (Sanchez and Merriweather Sans) locally for Silver Quantum.
    For more information regarding this feature, please go the following url to begin the awesomeness
    of Google WebFonts Helper (https://google-webfonts-helper.herokuapp.com/fonts)
    ================================================================================================
    */
    wp_enqueue_style('silver-quantum-local-fonts', get_template_directory_uri() . '/extras/fonts/custom-fonts.css', '11212014', true);
    
    /*
    ================================================================================================
    Enable and activate Font Awesome 4.7 locally for Silver Quantum. For more information about
    Font Awesome, please navigate to the URL for more information. (http://fontawesome.io/)
    ================================================================================================
    */
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/extras/font-awesome/css/font-awesome.css', '06012014', true);
    
    /*
    ================================================================================================
    Enable and activate JavaScript/JQuery to support Navigation for Primary Navigation for Silver
    Quantum. This allows you to use click feature for dropdowns and multiple depths, When using 
    this new feature of the navigation. The Menu for mobile side is now at the bottom of the page.
    ================================================================================================
    */
    wp_enqueue_script('silver-quantum-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20140601', true);
	wp_localize_script('silver-quantum-navigation', 'silverquantumscreenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __('expand child menu', 'silver-quantum') . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __('collapse child menu', 'silver-quantum') . '</span>',
	));
    
    /*
    ================================================================================================
    Enable and activate the threaded comments for Silver Quantum. This allows users to comment
    by clicking on reply so that it gets nested to the comments you are trying to respnse too. 
    ================================================================================================
    */
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'silver_quantum_enqueue_scripts_setup');



/*
================================================================================================
 4.0 - Register Sidebars
================================================================================================
*/
function silver_quantum_register_sidebars_setup() {
    register_sidebar(array(
        'name'          => __('Primary Sidebar', 'silver-quantum'),
        'id'            => 'primary',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));    

    register_sidebar(array(
        'name'          => __('Secondary Sidebar', 'silver-quantum'),
        'id'            => 'secondary',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));  
    
    register_sidebar(array(
        'name'          => __('Custom Sidebar', 'silver-quantum'),
        'id'            => 'custom',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));  
}
add_action('widgets_init', 'silver_quantum_register_sidebars_setup');

/*
================================================================================================
 5.0 - Required Files
================================================================================================
*/
require_once(get_template_directory() . '/includes/custom-header.php');
require_once(get_template_directory() . '/includes/customizer.php');
require_once(get_template_directory() . '/includes/misc.php');
require_once(get_template_directory() . '/includes/template-tags.php');
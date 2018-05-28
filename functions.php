<?php
/*
===========================================================================================================
Silver Quantum - functions.php
===========================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files for a 
theme (the other being template-tags.php). This functions.php template file allows you to add features and 
functionality to a WordPress theme which is stored in the theme's root directory in the theme folder. The 
second template file template-tags.php allows you to add additional features and functionality to the 
WordPress theme which is stored in the includes folder and it's called in the template-tags.php.

@package        Silver Quantum WordPress Theme
@copyright      Copyright (C) 2014-2018. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.benjlu.com/)
===========================================================================================================
*/

/*
===========================================================================================================
Table of Content
===========================================================================================================
 1.0 - Theme Setup
 2.0 - Enqueue Scripts and Styles
 3.0 - Content Width
 4.0 - Register Sidebars
 5.0 - Required Files
===========================================================================================================
*/

/*
===========================================================================================================
 1.0 - Theme Setup
===========================================================================================================
*/
function silver_quantum_theme_setup() {
    /*
    =======================================================================================================
    Enable and activate add_theme_support('title-tag); for Silver Quantum WordPress Theme. This feature 
    should be used in place instead of wp_title() function. 
    =======================================================================================================
    */
    add_theme_support('title-tag');


    /*
    =======================================================================================================
    Enable and activate add_theme_support('automatic-feed-links'); for Silver Quantum WordPress Theme. This 
    feature when enabled allows feed links for posts and comments in the head. This should be used in place 
    of the deprecated automatic_feed_link(); function.
    =======================================================================================================
    */
    add_theme_support('automatic-feed-links');

    /*
    =======================================================================================================
    Enable and activate register_nav_menus(); for Silver Quantum WordPress theme. This feature when enabled,
    you can create a Primary Navigation, Secondary Navigation, and Social Navigation menus in the dashboard
    under menus.
    =======================================================================================================
    */   
    register_nav_menus(array(
        'primary-navigation'    => esc_html__('Primary Navigation', 'silver-quantum'),
        'secondary-navigation'  => esc_html__('Secondary Navigation', 'silver-quantum'),
        'social-navigation'     => esc_html__('Social Navigation', 'silver-quantum')
    ));

    /*
    =======================================================================================================
    Enable and activate add_theme_support('html5'); for Silver Quantum WordPress Theme. This feature allows 
    the use of HTML5 markup for search forms, comment forms, comment list, gallery, and captions.
    =======================================================================================================
    */
    add_theme_support('html5', array(
        'comment-list', 
        'comment-form', 
        'search-form', 
        'gallery', 
        'caption'
    ));

    /*
    =======================================================================================================
    Enable and activate add_theme_support('post-thumbnails); for Silver Quantum WordPress Theme. This 
    feature enables Post Thumbnails (Featured Images) support for a theme. If you wish to display thumbnails, 
    use the following to display the_post_thumbnail();. If you need to to check of there is a post thumbnail, 
    then use has_post_thumbnail();.
    =======================================================================================================
    */
    add_theme_support('post-thumbnails');

    /*
    =======================================================================================================
    add_image_size('colonnade-portfolio-banner-thumbnail', 1208, 300, true); should be used under the 
    following files, content-single.php and content-page.php
    =======================================================================================================
    */
    add_image_size('silver-quantum-banner-thumbnail', 1208, 300, true);

    /*
    =======================================================================================================
    Enable and activate load_theme_textdomain('silver-quantum'); for Silver Quantum WordPress Theme. This 
    feature will let the WordPress core translations to do its job to translate the theme.
    =======================================================================================================
    */
    load_theme_textdomain('silver-quantum');
}
add_action('after_setup_theme', 'silver_quantum_theme_setup');

/*
===========================================================================================================
 2.0 - Enqueue Scripts and Styles
===========================================================================================================
*/
function silver_quantum_enqueue_scripts_and_styles_setup() {
    /*
    =======================================================================================================
    Enable and activate the main stylesheet and custom stylesheet if available for Silver Quantum WordPress
    theme. The main stylesheet should be enqueued rather than using @import. The other custom stylesheet is
    theme normalize.css that is to makes browsers render all elements more consistently and in line with 
    modern standards. It is precisly targets only the styles that needs normalizing.
    =======================================================================================================
    */
    wp_enqueue_style('silver-quantum-style', get_stylesheet_uri());
    wp_enqueue_style('silver-quantum-normalize', get_template_directory_uri() . '/css/normalize.css', '04192014', true);

    /*
    =======================================================================================================
    Enable and activate Google Fonts (Sanchez and Merriweather Sans) locally for Silver Quantum. For more 
    information regarding this feature, please go the following url to begin the awesomeness of Google 
    WebFonts Helper (https://google-webfonts-helper.herokuapp.com/fonts)
    =======================================================================================================
    */
    wp_enqueue_style('silver-quantum-local-fonts', get_template_directory_uri() . '/extras/fonts/custom-fonts.css', '04192014', true);
    
    /*
    =======================================================================================================
    Enable and activate Font Awesome 4.7 locally for Silver Quantum. For more information about Font Awesome, 
    please navigate to the URL for more information. (http://fontawesome.io/)
    =======================================================================================================
    */
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/extras/font-awesome/css/font-awesome.css', '04192014', true);

    /*
    =======================================================================================================
    Enable and activate JavaScript/JQuery to support Navigation for Primary Navigation for Silver
    Quantum. This allows you to use click feature for dropdowns and multiple depths, When using 
    this new feature of the navigation. The Menu for mobile side is now at the bottom of the page.
    =======================================================================================================
    */
    wp_enqueue_script('silver-quantum-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '04192014', true);
	wp_localize_script('silver-quantum-navigation', 'silverquantumScreenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . esc_html__('expand child menu', 'silver-quantum') . '</span>',
		'collapse' => '<span class="screen-reader-text">' . esc_html__('collapse child menu', 'silver-quantum') . '</span>',
    ));

    /*
    =======================================================================================================
    Enable and activate the threaded comments for Silver Quantum. This allows users to comment by clicking 
    on reply so that it gets nested to the comments you are trying to respnse too. 
    =======================================================================================================
    */
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'silver_quantum_enqueue_scripts_and_styles_setup');

/*
===========================================================================================================
 3.0 - Content Width
===========================================================================================================
*/
function silver_quantum_content_width_setup() {
    /*
    =======================================================================================================
    Using this feature allows you can set the maximum allowed width for any content in the theme like oEmbeds
    and images added to posts.
    =======================================================================================================
    */
	$GLOBALS['content_width'] = apply_filters('silver_quantum_content_width_setup', 810);
}
add_action('after_setup_theme', 'silver_quantum_content_width_setup', 0);

/*
===========================================================================================================
 4.0 - Register Sidebars
===========================================================================================================
*/
function silver_quantum_register_sidebars_setup() {
    /*
    =======================================================================================================
    Enable and activate Primary Sidebar for Silver Quantum WordPress Theme. The Primary Sidebar should 
    only show in the blog posts only rather in the pages. 
    =======================================================================================================
    */
    register_sidebar(array(
        'name'          => esc_html__('Primary Sidebar', 'silver-quantum'),
        'description'   => esc_html__('Add widgets here to appear in your sidebar on Blog Posts and Archives only', 'silver-quantum'),
        'id'            => 'primary-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    /*
    =======================================================================================================
    Enable and activate Primary Sidebar for Silver Quantum WordPress Theme. The Secondary Sidebar should 
    only show in the pages posts only rather in the pages. 
    =======================================================================================================
    */
    register_sidebar(array(
        'name'          => esc_html__('Secondary Sidebar', 'silver-quantum'),
        'description'   => esc_html__('Add widgets here to appear in your sidebar on Pages only', 'silver-quantum'),
        'id'            => 'secondary-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    /*
    =======================================================================================================
    Enable and activate Primary Sidebar for Silver Quantum WordPress Theme. The Custom Sidebar should 
    only show in the blog posts only rather in the pages. 
    =======================================================================================================
    */
    register_sidebar(array(
        'name'          => esc_html__('Custom Sidebar', 'silver-quantum'),
        'description'   => esc_html__('Add widgets here to appear in your sidebar on custom pages only', 'silver-quantum'),
        'id'            => 'custom-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'silver_quantum_register_sidebars_setup');

/*
===========================================================================================================
 5.0 - Required Files
===========================================================================================================
*/
require_once(get_template_directory() . '/extras/inline-styles/header-image.php');
require_once(get_template_directory() . '/framework/framework.php');
require_once(get_template_directory() . '/includes/template-tags.php');
<?php
/*
============================================================================================================================
Backdrop - backdrop/config/functions-scripts.php
============================================================================================================================
This functions-scripts.php template file allows you to add the neccessary  scripts and styles needed for this theme. 

@package        Backdrop Framework
@copyright      Copyright (C) 2018. Benjamin Lu
@license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com)
============================================================================================================================
*/

/*
============================================================================================================================
 Define namespace
============================================================================================================================
*/
namespace Backdrop;

/*
============================================================================================================================
Table of Content
============================================================================================================================
 1.0 - Enqueue Scripts and Styles
============================================================================================================================
*/

/*
============================================================================================================================
 1.0 - Enqueue Scripts and Styles
============================================================================================================================
*/
add_action('wp_enqueue_scripts', function() {
    /*
    ========================================================================================================================
    Enable and activate the main stylesheet and custom stylesheet if available. The main file (style.css) should be enqueued 
    rather than using @import. The other custom file is the normalize.css that allows all browsers render all elements more 
    consistently and inline with modern standards. It is precisly targets only the styles that needs normalizing.
    ========================================================================================================================
    */
    wp_enqueue_style('backdrop-style', get_stylesheet_uri());
    wp_enqueue_style('backdrop-normalize', get_theme_file_uri('/backdrop/dist/css/normalize.css'), '10012018');

    /*
    ========================================================================================================================
    Enable and activate Google Fonts (Fira Sans and Merriweather Sans) locally. For more information regarding this feature, 
    please go the following url to begin the awesomeness of Google WebFonts Helper. 
    (https://google-webfonts-helper.herokuapp.com/fonts)
    ========================================================================================================================
    */
    wp_enqueue_style('backdrop-custom-fonts', get_theme_file_uri('/backdrop/assets/fonts/custom-fonts.css'), '10012018', true);

     /*
    ========================================================================================================================
    Enable and activate Font Awesome 4.7 locally. For more information about Font Awesome, please navigate to the URL for 
    more information. (http://fontawesome.io/)
    ========================================================================================================================
    */
    wp_enqueue_style('font-awesome', get_theme_file_uri('/backdrop/assets/font-awesome/css/font-awesome.css'), '10012018', true);

    /*
    ========================================================================================================================
    Enable and activate JavaScript/JQuery to support Navigation for Primary Navigation for Silver Quantum. This allows you 
    to use click feature for dropdowns and multiple depths, When using this new feature of the navigation. The Menu for 
    mobile side is now at the bottom of the page.
    ========================================================================================================================
    */
    wp_enqueue_script('backdrop-navigation', get_theme_file_uri('/backdrop/dist/js/navigation.js'), array('jquery'), '09012018', true );
    wp_localize_script('backdrop-navigation', 'backdropScreenReaderText', array(
        'expand'   => '<span class="screen-reader-text">' . esc_html__('expand child menu', 'backdrop') . '</span>',
        'collapse' => '<span class="screen-reader-text">' . esc_html__('collapse child menu', 'backdrop') . '</span>',
    ));
    /*
    ========================================================================================================================
    Enable and activate the threaded comments. This allows users to comment by clicking on reply so that it gets nested to 
    the comments you are trying to response too. 
    ========================================================================================================================
    */
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
});
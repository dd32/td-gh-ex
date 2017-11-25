<?php
/*
================================================================================================
White Spektrum - extras.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the required file for 
a theme. This extras.php template file allows you to add additional features and functionality to 
a WordPress theme which is stored in the extras folder and its called in the functions.php

@package        White Spektrum WordPress Theme
@copyright      Copyright (C) 2014-2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.benjlu.com/)
================================================================================================
*/

/*
================================================================================================
Table of Content
================================================================================================
 1.0 - Pingback Setup
 2.0 - Post Thumbnail Setup
 3.0 - Excerpt Length Setup
================================================================================================
*/

/*
================================================================================================
 1.0 - Pingback Setup
================================================================================================
*/
function white_spektrum_pingback_setup() {
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">' . "\n", get_bloginfo('pingback_url'));
	}
}
add_action('wp_head', 'white_spektrum_pingback_setup');

/*
================================================================================================
 2.0 - Post Thumbnail Setup
================================================================================================
*/
function white_spektrum_unset_has_post_thumbnail($classes) {
    $class_key = array_search('has-post-thumbnail', $classes);
    if (is_singular() || is_post_type_archive('jetpack-portfolio') || is_post_type_archive('jetpack-testimonial')) {
        unset($classes[$class_key]);
    }     
    return $classes;
}
add_filter('post_class', 'white_spektrum_unset_has_post_thumbnail');

/*
================================================================================================
 3.0 - Excerpt Length Setup
================================================================================================
*/
function white_spektrum_excerpt_length_setup() {
    return 50;
}
add_filter('excerpt_length', 'white_spektrum_excerpt_length_setup');
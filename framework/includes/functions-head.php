<?php
/*
===========================================================================================================
Silver Quantum - functions-head.php
===========================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files for a 
theme. This framework.php template file allows you to add features and functionality that has been preset 
to be use in this WordPress theme which is stored in the theme's framework directory in the theme folder.

@package        Silver Quantum WordPress Theme
@copyright      Copyright (C) 2018. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.benjlu.com/)
===========================================================================================================
*/
/*
===========================================================================================================
Table of Content
===========================================================================================================
 1.0 - Meta Charset
 2.0 - Meta Viewport
 3.0 - Link Pingback
===========================================================================================================
*/
/*
===========================================================================================================
1.0 - Meta Charset
===========================================================================================================
*/
function silver_quantum_meta_charset_setup() {
    printf('<meta charset="%s">' . "\n", esc_attr(get_bloginfo('charset')));
}
add_action('wp_head', 'silver_quantum_meta_charset_setup', 0);
/*
===========================================================================================================
 2.0 - Meta Viewport
===========================================================================================================
*/
function silver_quantum_meta_viewport_setup() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1" />' . "\n";
}
add_action('wp_head', 'silver_quantum_meta_viewport_setup', 1);
/*
===========================================================================================================
 3.0 - Link Pingback
===========================================================================================================
*/
function silver_quantum_link_pingback_setup() {
    if ('open' === get_option('default_ping_status')) {
        printf('<link rel="pingback" href="%s" />' . "\n", esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'silver_quantum_link_pingback_setup', 1);
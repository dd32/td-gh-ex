<?php
/*
================================================================================================
Silver Quantum - misc.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the requirements to add
more features to the theme if necessary.

@package        Silver Quantum WordPress Theme
@copyright      Copyright (C) 2014-2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.benjaminlu.net/)
================================================================================================
*/

/*
================================================================================================
Table of Content
================================================================================================
 1.0 - Pingback Setup
================================================================================================
*/

/*
================================================================================================
Table of Content
================================================================================================
 1.0 - Pingback Setup
================================================================================================
*/
function silver_quantum_pingback_setup() {
    if (is_singular() && pings_open()) {
        echo '<link href="', esc_url(get_bloginfo('pingback_url')), '" rel="pingback" />';
    }
}
add_action('wp_head', 'silver_quantum_pingback_setup');
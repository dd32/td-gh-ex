<?php
/*
============================================================================================================================
Silver Quantum - framework/menu/social.php
============================================================================================================================
This is the most generic template file in a WordPress theme and is one of the required file for a theme. This default.php
will display all the necessary.

@package        Silver Quantum WordPress Theme
@copyright      Copyright (C) 2014-2018. Benjamin Lu
@license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com)
============================================================================================================================
*/

/*
============================================================================================================================
Table of Content
============================================================================================================================
 1.0 - Primary Navigation
============================================================================================================================
*/

/*
============================================================================================================================
 1.0 - Primary Navigation
============================================================================================================================
*/
function silver_quantum_display_social_navigation() {
    do_action('silver_quantum_display_social_navigation');
}
function silver_quantum_output_social_navigation() {
    if (has_nav_menu('social')) { ?>
        <nav id="social" class="site-social">
            <?php
                wp_nav_menu(array(
                    'theme_location'    => 'social',
                    'container'         => 'nav',
                    'container_id'      => 'menu-social',
                    'container_class'   => 'menu-social',
                    'menu_id'           => 'menu-social-items',
                    'menu_class'        => 'menu-items',
                    'depth'             => 1,
                    'link_before'       => '<span class="screen-reader-text">',
                    'link_after'        => '</span>',
                    'fallback_cb'       => '',
                ));                                  
            ?>
        </nav>
    <?php }
}
add_action('silver_quantum_display_social_navigation', 'silver_quantum_output_social_navigation');

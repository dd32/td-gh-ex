<?php
/*
============================================================================================================================
Backdrop - backdrop/menu/social.php
============================================================================================================================
This backdrop/menu/social.php when used, it is displayed at the footer underneath the secondary navigation. THis should help
display social navigatin icons and when clicked, it brings you to the pages that are intended.

@package        Backdrop
@copyright      Copyright (C) 2018. Benjamin Lu
@license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com)
============================================================================================================================
*/

/*
============================================================================================================================
namespace define
============================================================================================================================
*/
namespace Benlumia007\Backdrop\Menu;

/*
============================================================================================================================
Table of Content
============================================================================================================================
 1.0 - Menu (Primary)
============================================================================================================================
*/

/*
============================================================================================================================
 1.0 - Menu (Primary)
============================================================================================================================
*/
function display_social() {
    echo output_social();
}

function output_social() {
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
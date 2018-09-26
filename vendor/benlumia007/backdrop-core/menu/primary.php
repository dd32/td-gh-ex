<?php
/*
============================================================================================================================
Backdrop - backdrop/menu/primary.php
============================================================================================================================
This backdrop/framework.php uses an array_map(); feature that allows you add require file automatically without the need to 
type lines and lines of require_once();. This way it will be easier to maintain and only use the files are needed.

@package        Backdrop Framework
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
function display_primary() {
    echo output_primary();
}

function output_primary() {
    if (has_nav_menu('primary')) { ?>
        <div class="main-navigation">
            <nav id="site-navigation" class="primary-navigation">
                <button class="menu-toggle" aria-conrol="primary-menu" aria-expanded="false"><?php esc_html_e('Menu', 'backdrop'); ?></button>
                <?php wp_nav_menu(array(
                    'theme_location'    => 'primary',
                    'menu_id'           => 'primary-menu',
                    'menu_class'        => 'nav-menu'   
                )); 
                ?>
            </nav>
        </div>
    <?php }
}
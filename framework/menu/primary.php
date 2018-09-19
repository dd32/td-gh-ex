<?php
/*
============================================================================================================================
Silver Quantum - /framework/menu/primary.php
============================================================================================================================
This primary.php template displays the primary navigation for this theme.

@package        silver_quantum WordPress Theme
@copyright      Copyright (C) 2018. Benjamin Lu
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
function silver_quantum_display_primary_navigation() {
    do_action('silver_quantum_display_primary_navigation');
} 

function silver_quantum_output_primary_navigation() {
    if (has_nav_menu('primary')) { ?>
        <nav id="site-navigation" class="primary-navigation">
            <button class="menu-toggle" aria-conrol="primary-menu" aria-expanded="false"><?php esc_html_e('Menu', 'silver-quantum'); ?></button>
            <?php wp_nav_menu(array(
                'theme_location'    => 'primary',
                'menu_id'           => 'primary-menu',
                'menu_class'        => 'nav-menu'   
            )); 
            ?>
        </nav>
    <?php }
}
add_action('silver_quantum_display_primary_navigation', 'silver_quantum_output_primary_navigation');
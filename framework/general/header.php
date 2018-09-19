<?php
/*
============================================================================================================================
Silver Quantum - framework/general/header.php
============================================================================================================================
This is the most generic template file in a WordPress theme and is one of the required file for a theme. This framework.php
template file allows you to add features and functionality has been preset to be used in this WordPress theme which is store
in the theme's framework directory.

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
 1.0 - Display (Custom Header
============================================================================================================================
*/
/*
============================================================================================================================
 1.0 - Display (Custom Header
============================================================================================================================
*/
function silver_quantum_display_site_header() {
    do_action('silver_quantum_display_site_header');
}
function silver_quantum_output_site_header() { ?>
    <header id="header" class="site-header header-image">    
        <div class="site-branding">
            <?php 
                silver_quantum_display_site_title();
                silver_quantum_display_site_description();
            ?>
        </div>
    </header>
<?php }
add_action('silver_quantum_display_site_header', 'silver_quantum_output_site_header');
<?php
/*
============================================================================================================================
Silver Quantum - framework/template/general.php
============================================================================================================================
This framework.php template file allows you to add features and functionality has been preset to be used in this WordPress 
theme which is store in the theme's framework directory.

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
 1.0 - Display (Site Title)
 2.0 - Display (Site Description)
 3.0 - Display (Site Link)
 4.0 - Display (WordPress Link)
 5.0 - Display (Theme Link)
============================================================================================================================
*/ 

/*
============================================================================================================================
 1.0 - Display (Site Title)
============================================================================================================================
*/
function silver_quantum_display_site_title() {
    echo silver_quantum_output_site_title();
}

function silver_quantum_output_site_title() {
    $site_title = get_bloginfo('name');
    if ($site_title) {
        $site_title = sprintf('<h1 class="site-title"><a href="%s">%s</a></h1>', esc_url(home_url('/')), $site_title);
    }
    return apply_filters('silver_quantum_display_site_title', $site_title);
}

/*
============================================================================================================================
 2.0 - Display (Site Description)
============================================================================================================================
*/
function silver_quantum_display_site_description() {
    echo silver_quantum_output_site_description();
}

function silver_quantum_output_site_description() {
    $site_description = get_bloginfo('description');
    if ($site_description) {
        $site_description = sprintf('<h3 class="site-description">%s</h3>', $site_description);
    }
    return apply_filters('silver_quantum_display_site_description', $site_description);
}
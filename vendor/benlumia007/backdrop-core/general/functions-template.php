<?php
/*
============================================================================================================================
Backdrop - backdrop/general/template.php
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
namespace Benlumia007\Backdrop\Site;

/*
============================================================================================================================
Table of Content
============================================================================================================================
 1.0 - Display Site Title
 2.0 - Display Site Description
 3.0 - Display Site Link
 4.0 - Display WP Link
 5.0 - Display (Theme Link)
============================================================================================================================
*/

/*
============================================================================================================================
 1.0 - Display Site Title
============================================================================================================================
*/
function display_site_title() {
    echo output_site_title();
}

function output_site_title() {
    $site_title = get_bloginfo('name');

    if ($site_title) {
        $site_title = sprintf('<h1 class="site-title"><a href="%s">%s</a></h1>', esc_url(home_url('/')), $site_title);
    }
    return apply_filters('display_site_title', $site_title);
}

/*
============================================================================================================================
 2.0 - Display Site Description
============================================================================================================================
*/
function display_site_description() {
    echo output_site_description();
}

function output_site_description() {
    $site_description = get_bloginfo('description');

    if ($site_description) {
        $site_description = sprintf('<h3 class="site-description">%s</h3>', $site_description);
    }
    return apply_filters('display_site_description', $site_description);
}

/*
============================================================================================================================
 3.0 - Display Site Link
============================================================================================================================
*/
function display_site_link() {
    echo output_site_link();
}

function output_site_link() {
    return sprintf('<a href="%s">%s</a>', esc_url(home_url('/')), get_bloginfo('name'));
}

/*
============================================================================================================================
 4.0 - Display WP Link
============================================================================================================================
*/
function display_wp_link() {
    echo output_wp_link();
}

function output_wp_link() {
    return sprintf('<a href="%s">%s</a>', esc_url(__('https://wordpress.org', 'backdrop')), esc_html__('WordPress', 'backdrop'));
}

/*
============================================================================================================================
 5.0 - Display (Theme Link)
============================================================================================================================
*/
function display_theme_link() {
    echo output_theme_link();
}

function output_theme_link() {
    $theme_name = wp_get_theme(get_template());
    $allowed = array('abbr' => array('title' => true), 'acronym' => array('title' => true), 'code' => true, 'em' => true, 'strong' => true);
 
    return sprintf( '<a href="%s">%s</a>', $theme_name->display('ThemeURI'), wp_kses($theme_name->display('Name'), $allowed));
}
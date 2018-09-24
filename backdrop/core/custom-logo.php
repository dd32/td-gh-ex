<?php
/*
============================================================================================================================
Backdrop - backdrop/core/custom-header.php
============================================================================================================================
This specific file custom-header.php template allows you to add custom header through the customizer. As part of this theme, 
there is a preset image that will come with the theme. 

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
namespace Backdrop\Core;

/*
============================================================================================================================
Table of Content
============================================================================================================================
 1.0 - Custom Header (Setup)
 2.0 - Custom Header (Inline Styles)
============================================================================================================================
*/
add_action('after_setup_theme', function() {
    /*
    ========================================================================================================================
    Enable and activate add_theme_support('custom-header', $args);. This feature allows the use of custom header to display
    images.
    ========================================================================================================================
    */
    $args = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    );
    add_theme_support('custom-logo', $args);
});
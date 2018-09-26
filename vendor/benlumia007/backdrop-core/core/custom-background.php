<?php
/*
============================================================================================================================
Backdrop - backdrop/core/custom-background.php
============================================================================================================================
The custom background is a core featured that allows you set custom backgrounds or solid colors depending on what you want.
This helps if you like to make your site cool.

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
namespace Benlumia007\Backdrop\Core;

/*
============================================================================================================================
Table of Content
============================================================================================================================
 1.0 - Core (Custom Background)
============================================================================================================================
*/
function custom_background() {
    $args = array(
        'default-color' => 'ffffff',
    );
    add_theme_support('custom-background', $args);
}
add_action('after_setup_theme', __NAMESPACE__ . "\\custom_background");
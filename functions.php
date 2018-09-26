<?php
/*
============================================================================================================================
White Spektrum - functions.php
============================================================================================================================
This functions.php template should only do one job is to require the backdrop framework's main file (framework.php). This 
allows to register all the necessary functions and features for this theme.

@package        White Spektrum WordPress Theme
@copyright      Copyright (C) 2014-2018. Benjamin Lu
@license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com)
============================================================================================================================
*/

/*
============================================================================================================================
Table of Content
============================================================================================================================
 1.0 - Require PHP 5.6 or higher
 2.0 - Require Framework's Main File
============================================================================================================================
*/

/*
============================================================================================================================
Table of Content
============================================================================================================================
 1.0 - Require PHP 5.6 or higher
============================================================================================================================
*/
if (version_compare($GLOBALS['wp_version'], '4.9.6', '<') || version_compare(PHP_VERSION, '5.6', '<')) {
    require_once(get_parent_theme_file_path('backdrop/comatibility.php'));
    return;
}

/*
============================================================================================================================
 2.0 - Require Framework's Main File
============================================================================================================================
*/
if (file_exists(get_parent_theme_file_path('vendor/autoload.php'))) {
    require_once(get_parent_theme_file_path('vendor/autoload.php'));
}
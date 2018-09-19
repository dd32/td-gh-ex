<?php
/*
============================================================================================================================
Silver Quantum - framework/framework.php
============================================================================================================================
This framework.php template file uses an array_map(); feature that allows you add or remove require file automatically 
without the need to type lines and lines of require_once();. This way it will be easier to maintain and only use the files
are needed.

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
 1.0 - array_map ($config)
 2.0 - array_map ($core)
 3.0 - array_map ($customize)
 4.0 - array_map ($inline_styles)
 5.0 - array_map ($general)
 6.0 - array_map ($loop)
 7.0 - array_map ($menu)
 8.0 - array_map ($misc)
============================================================================================================================
*/

/*
============================================================================================================================
 1.0 - array_map ($config)
============================================================================================================================
*/
array_map(function($config) {
    require_once(get_parent_theme_file_path("/framework/config/{$config}.php"));
}, [
    'functions-scripts',
    'functions-setup',
    'functions-sidebars',
    'functions-tags'
]);

/*
============================================================================================================================
 2.0 - array_map ($core)
============================================================================================================================
*/
array_map(function($core) {
    require_once(get_parent_theme_file_path("/framework/core/{$core}.php"));
}, [
    'custom-header'
]);

/*
============================================================================================================================
 3.0 - array_map ($customize)
============================================================================================================================
*/
array_map(function($customize) {
    require_once(get_parent_theme_file_path("/framework/customize/{$customize}.php"));
}, [
    'theme-layouts', 
]);

/*
============================================================================================================================
 4.0 - array_map ($inline_styles)
============================================================================================================================
*/
array_map(function($inline_styles) {
    require_once(get_parent_theme_file_path("/framework/inline-styles/{$inline_styles}.php"));
}, [
    'extras',
    'header-image',
]);
/*
============================================================================================================================
 5.0 - array_map ($general)
============================================================================================================================
*/
array_map(function($general) {
    require_once(get_parent_theme_file_path("/framework/general/{$general}.php"));
}, [
    'sidebars',
    'template'
]);

/*
============================================================================================================================
 6.0 - array_map ($loop)
============================================================================================================================
*/
array_map(function($loop) {
    require_once(get_parent_theme_file_path("/framework/loop/{$loop}.php"));
}, [
    'custom-query',
    'main-query'
]);

/*
============================================================================================================================
 7.0 - array_map ($menu)
============================================================================================================================
*/
array_map(function($menu) {
    require_once(get_parent_theme_file_path("/framework/menu/{$menu}.php"));
}, [
    'primary'
]);

/*
============================================================================================================================
 8.0 - array_map ($misc)
============================================================================================================================
*/
array_map(function($misc) {
    require_once(get_parent_theme_file_path("/framework/misc/{$misc}.php"));
}, [
    'functions-head'
]);
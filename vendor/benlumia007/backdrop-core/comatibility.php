<?php
/*
============================================================================================================================
Backdrop - backdrop/comatibility.php
============================================================================================================================
This backdrop/comatibility.php will check if the theme is using the latest WordPress version as well as the PHP version 5.6
or higher.

@package        Backdrop Framework
@copyright      Copyright (C) 2018. Benjamin Lu
@license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com)
============================================================================================================================
*/

/*
============================================================================================================================
namespace
============================================================================================================================
*/
namespace Benlumia007\Backdrop\Compatibility;

/*
============================================================================================================================
Table of Content
============================================================================================================================
 1.0 - Compatibility (Compatibility Check)
 2.0 - Compatibility (Theme Switch Check)
 3.0 - Compatibility (Upgrade Notice)
============================================================================================================================
*/

/*
============================================================================================================================
 1.0 - Compatibility (Compatibility Check)
============================================================================================================================
*/
function compatibility_check() {
   if (version_compare($GLOBALS['wp_version'], '4.9.6', '<')) {
        return sprintf(__('White Spektrum requires at least WordPress version %1$s. You are currently running %2$s. Please upgrade and try again.', 'backdrop'),
        '4.6',
        $GLOBALS['wp_version']
    );
   } elseif (version_compare(PHP_VERSION, '5.6', '<')) {
        return sprintf(__('White Spektrum requires at least PHP version %1$s. You are running version %2$s. Please upgrade and try again.', 'backdrop'),
        '5.6',
        PHP_VERSION
    );
   }
   return '';
}

/*
============================================================================================================================
 2.0 - Compatibility (Theme Switch Check)
============================================================================================================================
*/
function switch_theme_check($previous_theme) {
	switch_theme( $previous_theme ? $previous_theme : WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action('admin_notices', __NAMESPACE__ . "\\upgrade_notice");
}
add_action('after_switch_theme', __NAMESPACE__ . "\\switch_theme_check");


/*
============================================================================================================================
 3.0 - Compatibility (Upgrade Notice)
============================================================================================================================
*/
function upgrade_notice() {
	printf( '<div class="error"><p>%s</p></div>', esc_html(compatibility_check()));
}
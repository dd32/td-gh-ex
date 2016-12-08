<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/* --- MULTI-SITE Control ---
  All non-checkbox options for this theme are filtered based on the 'unfiltered_html' capability,
  so non-admins and non-editors can only add safe html to the various options. It should be
  fairly safe to leave all theme options available on your Multi-site installation. If you want
  to eliminate most of the options that let users enter HTML,
  then set WVRX_MULTISITE_RESTRICT_OPTIONS to true.

  You can uncomment the define define('WVRX_MULTISITE_RESTRICT_OPTIONS', true);
  (remove the // in front) in this file, but that change will be
  overwritten when you update the theme. You can also copy the uncommented line to the wp-config.php
  file for your WP installation (anywhere before the "That's all, stop editing! Happy blogging." line),
  and the setting will then survive WP and theme updates.
*/

// define('WVRX_MULTISITE_RESTRICT_OPTIONS', true);

/* Version Information */

define ('WEAVERX_VERSION','3.0');
define ('WEAVERX_VERSION_ID', 100);
define ('WEAVERX_THEMENAME', 'Weaver Xtreme');
define ('WEAVERX_THEMEVERSION', WEAVERX_THEMENAME . ' ' . WEAVERX_VERSION);
define ('WEAVERX_MIN_WPVERSION','4.5');

define('WEAVERX_LEVEL_BEGINNER', 1);
define('WEAVERX_LEVEL_INTERMEDIATE', 5);
define('WEAVERX_LEVEL_ADVANCED', 10);

define('WEAVERX_THEME_WIDTH', 1100);	/* manually fix in style-weaverx.css */

define ('WEAVERX_DEV_MODE', false);
define ('WEAVERX_PHP_MEMORY_LIMIT', 128);

if ( WEAVERX_DEV_MODE )
	define ('WEAVERX_DEFAULT_THEME_FILE', 'none');
else
	define ('WEAVERX_DEFAULT_THEME_FILE', '/subthemes/go-basic.wxt');
define ('WEAVERX_DEFAULT_THEME','go-basic');


/* utility definitions - should not be edited */
/* This is also used in functions.php for add_editor_style */
define ('WEAVERX_GOOGLE_FONTS_URL',"https://fonts.googleapis.com/css?family=Open+Sans:400,700,700italic,400italic%7COpen+Sans+Condensed:300,700%7CAlegreya:400,400italic,700,700italic%7CAlegreya+Sans:400,400italic,700,700italic%7CDroid+Sans:400,700%7CDroid+Serif:400,400italic,700,700italic%7CExo+2:400,700%7CLato:400,400italic,700,700italic%7CLora:400,400italic,700,700italic%7CArvo:400,700,400italic,700italic%7CRoboto:400,400italic,700,700italic%7CRoboto+Condensed:400,700%7CRoboto+Slab:400,700%7CArchivo+Black%7CSource+Sans+Pro:400,400italic,700,700italic%7CSource+Serif+Pro:400,700%7CVollkorn:400,400italic,700,700italic%7CArimo:400,700%7CTinos:400,400italic,700,700italic%7CRoboto+Mono:400,700%7CInconsolata%7CHandlee%7CUltra&subset=latin,latin-ext");

define ('WEAVERX_GOOGLE_FONTS', "<link href='" . WEAVERX_GOOGLE_FONTS_URL . "' rel='stylesheet' type='text/css'>");

define ('WEAVERX_ADMIN_DIR', '/admin/admin-core');

define ('WEAVERX_MINIFY','.min');	// dev: '', production: '.min'
?>

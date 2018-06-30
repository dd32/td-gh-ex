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

define ('WEAVERX_VERSION','4.0.3');
define ('WEAVERX_VERSION_ID', 100);
define ('WEAVERX_THEMENAME', 'Weaver Xtreme');
define ('WEAVERX_THEMEVERSION', WEAVERX_THEMENAME . ' ' . WEAVERX_VERSION );
define ('WEAVERX_MIN_WPVERSION','4.8');

define('WEAVERX_LEVEL_BEGINNER', 1);
define('WEAVERX_LEVEL_INTERMEDIATE', 5);
define('WEAVERX_LEVEL_ADVANCED', 10);

define('WEAVERX_THEME_WIDTH', 1100);	/* manually fix in style-weaverx.css */

define ('WEAVERX_DEV_MODE', false);
define ('WEAVERX_PHP_MEMORY_LIMIT', 128);

if ( WEAVERX_DEV_MODE )
	define ('WEAVERX_DEFAULT_THEME_FILE', 'none');
else
	define ('WEAVERX_DEFAULT_THEME_FILE', '/subthemes/arctic-white.wxt');

define ('WEAVERX_DEFAULT_THEME','arctic-white');


/* utility definitions - should not be edited */
/* This is also used in functions.php for add_editor_style (note: no , and no | - use %2C and %7C */
define ('WEAVERX_GOOGLE_FONTS_URL',"https://fonts.googleapis.com/css?family=Open+Sans:400%2C700%2C700italic%2C400italic%7COpen+Sans+Condensed:300%2C700%7CAlegreya+SC:400%2C400i%2C700%2C700i%7CAlegreya+Sans+SC:400%2C400i%2C700%2C700i%7CAlegreya+Sans:400%2C400i%2C700%2C700i%7CAlegreya:400%2C400i%2C700%2C700i%7CDroid+Sans:400%2C700%7CDroid+Serif:400%2C400italic%2C700%2C700italic%7CExo+2:400%2C700%7CLato:400%2C400italic%2C700%2C700italic%7CLora:400%2C400italic%2C700%2C700italic%7CArvo:400%2C700%2C400italic%2C700italic%7CRoboto:400%2C400italic%2C700%2C700italic%7CRoboto+Condensed:400%2C700%7CRoboto+Slab:400%2C700%7CArchivo+Black%7CSource+Sans+Pro:400%2C400italic%2C700%2C700italic%7CSource+Serif+Pro:400%2C700%7CVollkorn:400%2C400italic%2C700%2C700italic%7CArimo:400%2C700%7CTinos:400%2C400italic%2C700%2C700italic%7CRoboto+Mono:400%2C700%7CInconsolata%7CHandlee%7CUltra&subset=latin%2Clatin-ext");

define ('WEAVERX_GOOGLE_FONTS', "<link href='" . WEAVERX_GOOGLE_FONTS_URL . "' rel='stylesheet' type='text/css'>");

// Version dependent options for plugin compatibility
// Weaver Xtreme used options

if ( !defined('WEAVER_GET_OPTION')) define ('WEAVER_GET_OPTION', 'get_option');
if ( !defined('WEAVER_DELETE_OPTION')) define ('WEAVER_DELETE_OPTION', 'delete_option');
if ( !defined('WEAVER_UPDATE_OPTION')) define ('WEAVER_UPDATE_OPTION', 'update_option');
if ( !defined('WEAVER_SETTINGS_NAME')) define ('WEAVER_SETTINGS_NAME', 'weaverx_settings');

define ('WEAVER_CUSTOMIZER_TYPE', 'option');
define ('WEAVER_SUBTHEMES_DIR', 'weaverx-subthemes');


// Weaver theme directories and generated files

define ('WEAVERX_ADMIN_DIR', '/admin/admin-core');
define ('WEAVERX_SUBTHEMES_DIR','weaverx-subthemes');
define ('WEAVERX_STYLE_FILE', 'style-weaverxt.css');

define ('WEAVERX_MINIFY','.min');	// dev: '', production: '.min'
?>

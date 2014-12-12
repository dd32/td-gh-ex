<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/* --- MULTI-SITE Control ---
  All non-checkbox options for this theme are filtered based on the 'unfiltered_html' capability,
  so non-admins and non-editors can only add safe html to the various options. It should be
  farily safe to leave all theme options available on your Multi-site installation. If you want
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

define ('WEAVERX_VERSION','0.92');
define ('WEAVERX_VERSION_ID', 100);
define ('WEAVERX_THEMENAME', 'Weaver Xtreme');
define ('WEAVERX_THEMEVERSION', WEAVERX_THEMENAME . ' ' . WEAVERX_VERSION);
define ('WEAVERX_MIN_WPVERSION','3.9');

define ('WEAVERX_DEV_MODE', false);
define ('WEAVERX_SELF_HOST', true);     // this will be used only until WP.org version approved

if ( WEAVERX_DEV_MODE )
    define ('WEAVERX_DEFAULT_THEME_FILE', 'none');
else
    define ('WEAVERX_DEFAULT_THEME_FILE', '/subthemes/ajax.wxt');

/* utility definitions - should not be edited */
define ('WEAVERX_DEFAULT_THEME','ajax');
define ('WEAVERX_SLUG', 'weaver-xtreme');
define ('WEAVERX_MINIFY','.min');	// dev: '', production: '.min'
?>

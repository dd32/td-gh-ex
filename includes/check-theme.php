<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/*
 Check issues

 1. Header Widget - if any widgets are defined for the area, then check to be sure widths are set.
 2. Look for SEO plugins
 3. See if they've saved their options ever.
 4. Custom bullet defined, but not selected, or selected and not defined
 5. No defined widget areas
 6. See if they have defined SEO meta, FavIcon
 7. Warn about fixed width theme

*/
function weaverx_perform_check() {
?>
<div style="background:#FFFF88;border:3px solid green;font-size:larger;padding:0 10px 0 10px; width:80%;margin-top:15px;margin-bottom:10px;">
	<p style="font-weight:normal;"><strong>Checking Weaver Xtreme for possible problems.</strong> This will check for some potential problems, but it is
	not a comprehensive check. Most messages are informational warnings, but things that should be fixed are marked ERROR.</p>
	<ul style="list-style-type:disc;list-style-position:inside;">
<?php

	global $wp_version;

	// check for installed plugins
	if (!function_exists('weaverx_sw_installed')) {
?>
	<li><strong>Recommended</strong>: Install the free <strong>Weaver Xtreme Shortcodes and Widgets</strong> plugin. This plugin adds
	great new features to the Weaver Xtreme theme, including a collection of useful shortcodes such as
	[weaverx_slider], [weaverx_show_posts], and many others. To install, open the Appearance:Plugins dashboard menu,
	click the "Add New" button at the top, then search for "Weaver Xtreme Shortcodes". You can then install and activate
	the plugin.</li>
<?php
	}

	if (!function_exists('weaverx_extras_installed')) {
	?>
	<li><strong>Recommended</strong>: Install the free <strong>Weaver Xtreme Extras</strong> plugin. This plugin adds
	the ability to specify Per Page subtheme use, upload additional subthemes, and update to the very
	latest version of Weaver Xtreme To install, open the Appearance:Plugins dashboard menu,
	click the "Add New" button at the top, then search for "Weaver Xtreme Extras". You can then install and activate
	the plugin.</li>
<?php

	}

	// see about file system

	if (function_exists('get_filesystem_method')) {	// this is available to check
        $type = get_filesystem_method(array());		// lets see if we have direct or ftpx
        if ($type == 'ftpext') {		// supposed to be using ftp access
?>
	<li><strong>Please note</strong>: your site server is configured so that WordPress requires "FTP File Access" to update themes,
	plugins, and other files. If your site host is a private server, VPS, other system where your site is secure from other
	users, or you understand what you are doing, <em>this is not an issue</em>. If, on the other hand, your site is using
	shared hosting, then it might
	be vulnerable to attack from other users who share your server. We <strong>strongly</strong> advise that you contact
	your hosting company and see if your site can be configured more securely, and if not, change hosting companies.
	Most modern shared hosting companies can provide "suPHP", "fastCGI", or other tools that allow shared
	serving without compromising file security.
	</li>
<?php
        }
	}


	// widgets

	if (!is_active_sidebar('primary-widget-area') && !is_active_sidebar('secondary-widget-area')) {
        echo '<li><strong>Warning</strong>: You have not added any <em>widgets</em> to the standard sidebar widget areas. (Dashboard:Widgets)</li>';
	}

	// misc

	$saved = get_option( apply_filters('weaverx_options','weaverx_settings_backup') );
	if (empty($saved)) {
        echo '<li><strong>Warning</strong>: You have not saved your settings using the <em>Save/Restore</em> tab. It is good practice to keep a saved version of your settings.</li>';
	}

	$icon = weaverx_getopt('_favicon_url');
        if (!$icon) {
            echo '<li><strong>Recommended</strong>: You have not specified a <em>FavIcon</em>. It is a good idea to have a FavIcon for your site. (Advanced Options:Site Options)</li>';
	}

	// pro options

	if (weaverx_getopt_checked('_inline_style')) {
        echo '<li><strong>Recommended</strong>: You have <em>Inline CSS</em> checked. This is not recommended for production sites. (Advanced Options : Site Options tab)</li>';
	}

	if (weaverx_getopt_checked('_development_mode')) {
        echo '<li><strong>Warning</strong>: You have <em>Development Mode</em> checked. It is recommended to disable it for production sites. (Weaver Xtreme Plus tab)</li>';
	}

?>
	</ul>
	<p style="font-weight:normal;">Theme check complete.</p>

</div>
<?php
}
?>

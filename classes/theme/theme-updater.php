<?php

/**
 * Easy Digital Downloads Theme Updater
 *
 * @package WordPress
 * @subpackage Artwork
 * @since Artwork 1.1.0
 */
// Includes the files needed for the theme updater
if (!class_exists('Theme_EDD_Updater_Admin')) {
    include( dirname(__FILE__) . '/theme-updater-admin.php' );
}
$theme_info = wp_get_theme();
$theme_name = $theme_info->get('Name');
$theme_slug = get_template();
$theme_version = $theme_info->get('Version');
$theme_author = $theme_info->get('Author');
 $remote_api_url=$theme_info->get('AuthorURI');
// Loads the updater classes
$updater = new Theme_EDD_Updater_Admin(
        // Config settings
        $config = array(
    'remote_api_url' => $remote_api_url, // Site where EDD is hosted
    'item_name' => $theme_name, // Name of theme
    'theme_slug' => $theme_slug, // Theme slug
    'version' => $theme_version, // The current version of this theme
    'author' => $theme_author, // The author of this theme
    'download_id' => '', // Optional, used for generating a license renewal link
    'renew_url' => '' // Optional, allows for a custom license renewal link
        ),
        // Strings
        $strings = array(
    'theme-license' => __('Theme License', 'artwork-lite'),
    'enter-key' => __('Enter your theme license key.', 'artwork-lite'),
    'license-key' => __('License Key', 'artwork-lite'),
    'license-action' => __('License Action', 'artwork-lite'),
    'deactivate-license' => __('Deactivate License', 'artwork-lite'),
    'license-error' => __('Errors', 'artwork-lite'),
    'license-is-inactive' => __('License is inactive.', 'artwork-lite'),
    'site-is-inactive' => __('Site is inactive.', 'artwork-lite'),
    'license-valid-until' => __("Valid until", 'artwork-lite'),
    'license-valid-lifetime' => __("Valid (Lifetime)", 'artwork-lite'),
    'license-key-is-disabled' => __('License key is disabled.', 'artwork-lite'),
    'license-key-expired' => __('License key has expired.', 'artwork-lite'),
    'license-key-invalid' => __('License status is invalid.', 'artwork-lite'),
    'item-name-mismatch' => __("Your License Key does not match the installed theme.", 'artwork-lite'),
    'action' => __('Action', 'artwork-lite'),
    'license-unknown' => __('License  is unknown.', 'artwork-lite'),
    'status' => __('Status', 'artwork-lite'),
    'activate-license' => __('Activate License', 'artwork-lite'),
    'update-notice' => __("Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'artwork-lite'),
    'update-available' => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'artwork-lite')
        )
);

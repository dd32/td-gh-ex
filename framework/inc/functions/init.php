<?php

/**
 * Initiating file for core theme files.
 *
 *
 * @package WordPress
 * @author Themebeans
 */

/* Load functions
--------------------------------------------------------------------- */

// Load Widgets
if (themeora_theme_supports('primary', 'widgets')) {
    include( THEMEORA_WIDGETS_DIR . '/widget-video.php' );
}

// Load fonts for customiser
if (themeora_theme_supports('primary', 'customizer') && themeora_theme_supports('primary', 'fonts')) {
    require_once( THEMEORA_FUNCTIONS_DIR . '/themeora-fonts.php' );
}
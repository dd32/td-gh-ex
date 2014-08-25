<?php

/**
 * @package WordPress
 * @subpackage Themeora Framework
 *

/* =================================================================== */
/* 3. LOAD ADMIN CSS	
  /*=================================================================== */
add_action('admin_enqueue_scripts', 'themeora_admin_styles');

function themeora_admin_styles() {
    //DISPLAY META STYLESHEET IF TRUE
    if (themeora_theme_supports('primary', 'meta')) {
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_style('themeora-meta-css', THEMEORA_FRAMEWORK_CSS_URL . '/themeora-meta.css');
    }
    //DISPLAY ADMIN STYLESHEET IF TRUE (CUSTOM CSS TO MAKE THINGS LOOK A BIT BETTER)
    if (themeora_theme_supports('primary', 'adminstyles')) {
        wp_enqueue_style('themeora-admin-css', THEMEORA_FRAMEWORK_CSS_URL . '/themeora-admin.css');
    }
}

/* =================================================================== */
/* 4. LOAD ADMIN JS	
  /*=================================================================== */
add_action('admin_enqueue_scripts', 'themeora_admin_scripts');

function themeora_admin_scripts() {
    wp_register_script('themeora-framework-admin', THEMEORA_FRAMEWORK_JS_URL . '/themeora-admin.js', array('jquery', 'wp-color-picker'));

    wp_enqueue_script('themeora-framework-admin');
    wp_enqueue_script('jquery');
}


/* =================================================================== */
/* 6. LOAD CUSTOMIZER FONTS
  /*=================================================================== */
//DISPLAY META STYLESHEET IF TRUE
if (themeora_theme_supports('primary', 'customizer') && themeora_theme_supports('primary', 'fonts')) {
    require_once( THEMEORA_FRAMEWORK_FUNCTIONS_DIR . '/themeora-admin-fonts-library.php' );
}


/* =================================================================== */
/* 7. MISC ADMIN FUNCTIONS
  /*=================================================================== */
require( THEMEORA_FRAMEWORK_FUNCTIONS_DIR . '/themeora-admin-functions.php' );

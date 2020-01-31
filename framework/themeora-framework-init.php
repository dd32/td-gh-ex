<?php

/* 1. Define constants
/*=================================================================== */

/* Define theme URL */
if ( !defined( 'WP_THEME_URL' ) ) {
    define( 'WP_THEME_URL', get_template_directory_uri() );
}

// Directory location constants
define('PARENT_DIR', get_template_directory());
define('CHILD_DIR', get_stylesheet_directory());

// Theme URL constants
define('PARENT_URL', get_template_directory_uri());
define('CHILD_URL', get_stylesheet_directory_uri());

// General constants
define('THEMEORA_FRAMEWORK_DIR', PARENT_DIR . '/framework/');
define('THEMEORA_INC_DIR', PARENT_DIR . '/framework/inc');
define('THEMEORA_JS_DIR', PARENT_DIR . '/framework/assets/js');
define('THEMEORA_CSS_DIR', PARENT_DIR . '/framework/assets/css');
define('THEMEORA_FUNCTIONS_DIR', THEMEORA_INC_DIR . '/functions');
define('THEMEORA_CUSTOMIZER_DIR', PARENT_DIR . '/framework/');

define('THEMEORA_INC_URL', PARENT_URL . '/framework/inc');
define('THEMEORA_JS_URL', PARENT_URL . '/framework/assets/js');
define('THEMEORA_CSS_URL', PARENT_URL . '/framework/assets/css/');
define('THEMEORA_FUNCTIONS_URL', THEMEORA_INC_URL . '/functions/');
define('THEMEORA_CUSTOMIZER_URL', PARENT_DIR . '/framework/');

// Widget constants
define('THEMEORA_WIDGETS_DIR', THEMEORA_INC_DIR . '/widgets');
define('THEMEORA_WIDGETS_URL', THEMEORA_INC_URL . '/widgets');

// Framework constants
define('THEMEORA_FRAMEWORK_FUNCTIONS_DIR', THEMEORA_FRAMEWORK_DIR);
define('THEMEORA_FRAMEWORK_IMAGES_DIR', THEMEORA_FRAMEWORK_DIR . '/assets/images');
define('THEMEORA_FRAMEWORK_CSS_DIR', THEMEORA_FRAMEWORK_DIR . '/assets/css');
define('THEMEORA_FRAMEWORK_JS_DIR', THEMEORA_FRAMEWORK_DIR . '/assets/js');

define('THEMEORA_FRAMEWORK_URL', PARENT_URL . '/framework');
define('THEMEORA_FRAMEWORK_FUNCTIONS_URL', THEMEORA_FRAMEWORK_URL . '/functions');
define('THEMEORA_FRAMEWORK_IMAGES_URL', THEMEORA_FRAMEWORK_URL . '/assets/images');
define('THEMEORA_FRAMEWORK_CSS_URL', THEMEORA_FRAMEWORK_URL . '/assets/css');
define('THEMEORA_FRAMEWORK_JS_URL', THEMEORA_FRAMEWORK_URL . '/assets/js');

do_action('themeora_pre');

/* Run the init hook */
do_action( 'themeora_init' );

/* Run the setup hook */
do_action( 'themeora_setup' );


/* end themeora framework */

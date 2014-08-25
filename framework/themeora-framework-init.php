<?php

/* 1. Define constants
/*=================================================================== */

/* Define theme URL */
if ( !defined( 'WP_THEME_URL' ) ) {
    define( 'WP_THEME_URL', get_template_directory_uri() );
}

/* Define theme name */
if ( !defined( 'THEMEORA_THEME_NAME' ) ) {
    define( "THEMEORA_THEME_NAME", 'Atwood' );
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

/* Feature Setup
/* --------------------------------------------------------------------- */

if (!function_exists('themeora_feature_setup')) {

    function themeora_feature_setup() {
        $args = array(
            'primary' => array(
                'adminstyles' => true,
                'customizer' => true,
                'fonts' => true,
                'meta' => true,
                'widgets' => true,
            ),
            'comments' => array(
                'posts' => true,
                'pages' => false,
                'portfolio' => false,
            )
        );

        return apply_filters('themeora_theme_config_args', $args);
    }

    add_action('themeora_init', 'themeora_feature_setup');
} //END if ( !function_exists( 'themeora_feature_setup' ) )


// FEATURE SETUP RETURN
/* --------------------------------------------------------------------- */

function themeora_theme_supports($group, $feature) {
    $setup = themeora_feature_setup();
    if (isset($setup[$group][$feature]) && $setup[$group][$feature])
        return true;
    else {     
    }
}


/* LOAD FRAMEWORK
/* --------------------------------------------------------------------- */

function themeora_load_framework() {
    //do_action('themeora_pre_framework');

    // FRAMEWORK FUNCTIONS
    $tempdir = get_template_directory();
    require_once($tempdir . '/framework/themeora-admin-init.php');
    require_once($tempdir . '/framework/inc/functions/init.php');

    // THEME CUSTOMIZER
    if (themeora_theme_supports('primary', 'customizer')) {
        require( THEMEORA_CUSTOMIZER_DIR . '/themeora-customizer.php' );
        require( THEMEORA_CUSTOMIZER_DIR . '/themeora-customizer-css.php' );
        
        //CUSTOMIZER CSS
        function themeora_customizer_ui_css() {
            wp_register_style('customizer-ui-css', get_template_directory_uri() . '/framework/assets/css/customizer-ui.css', 'all');
            wp_enqueue_style('customizer-ui-css');
        }

        add_action('customize_controls_print_scripts', 'themeora_customizer_ui_css');

        //CUSTOMIZER JS
        function themeora_customizer_ui_js() {
            wp_register_script('customizer-ui-js', get_template_directory_uri() . '/framework/assets/js/customizer-ui.js', 'jquery');
            wp_enqueue_script('customizer-ui-js');
        }

        add_action('customize_controls_print_scripts', 'themeora_customizer_ui_js');
    } //END if( themeora_theme_supports( 'primary', 'customizer' ))
}

add_action( 'themeora_init', 'themeora_load_framework' );

/* Run the init hook */
do_action( 'themeora_init' );

/* Run the setup hook */
do_action( 'themeora_setup' );


/* end themeora framework */
<?php
/**
 * astral functions and code
 *
 * @package Astral
 * @since 0.1
 *
 */
/**
 * Define constants
 */
define( 'ASTRAL_PARENT_DIR', get_template_directory() );
define( 'ASTRAL_PARENT_URI', get_template_directory_uri() );
define( 'ASTRAL_PARENT_INC_DIR', ASTRAL_PARENT_DIR . '/inc' );
define( 'ASTRAL_PARENT_INC_URI', ASTRAL_PARENT_URI . '/inc' );
define( 'ASTRAL_PARENT_CORE_URI', ASTRAL_PARENT_INC_URI . '/core/' );
/* 
 * require classes 
*/
require ASTRAL_PARENT_INC_DIR . '/core/class-astral-main.php';
require ASTRAL_PARENT_INC_DIR . '/core/class-astral-abstract-main.php';
require ASTRAL_PARENT_INC_DIR . '/core/class-astral-slider-section.php';
require ASTRAL_PARENT_INC_DIR . '/core/class-astral-callout-section.php';
require ASTRAL_PARENT_INC_DIR . '/core/class-astral-service-section.php';
require ASTRAL_PARENT_INC_DIR . '/core/class-astral-contact-section.php';
require ASTRAL_PARENT_INC_DIR . '/core/class-astral-blog-section.php';
/* 
 * customizer class
*/
require( dirname( __FILE__ ) . '/inc/core/class-astral-customizer.php' );
/*
 * Load hooks.
*/
require ASTRAL_PARENT_INC_DIR . '/hooks.php';
require ASTRAL_PARENT_INC_DIR . '/header.php';
require ASTRAL_PARENT_INC_DIR . '/footer.php';

require ASTRAL_PARENT_INC_DIR . '/core/class-wp-bootstrap-navwalker.php';
/* 
 * theme extra function 
*/
require ASTRAL_PARENT_INC_DIR . '/theme-function.php';
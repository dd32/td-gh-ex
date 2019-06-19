<?php 
/**
 * astral functions and code
 *
 * @package WordPress
 * @subpackage astral
 * @since 0.1
 *
*/
 
/**
* Define constants
*/
define( 'astral_PARENT_DIR', get_template_directory() );
define( 'astral_PARENT_URI', get_template_directory_uri() );
define( 'astral_PARENT_INC_DIR', astral_PARENT_DIR . '/inc' );
define( 'astral_PARENT_INC_URI', astral_PARENT_URI . '/inc' );
define( 'astral_PARENT_CORE_URI', astral_PARENT_INC_URI . '/core/' );

/* 
 * require classes 
*/
require astral_PARENT_INC_DIR . '/core/class-astral-main.php';
require astral_PARENT_INC_DIR . '/core/class-astral-abstract-main.php';
require astral_PARENT_INC_DIR . '/core/class-astral-slider-section.php';
require astral_PARENT_INC_DIR . '/core/class-astral-callout-section.php';
require astral_PARENT_INC_DIR . '/core/class-astral-service-section.php';
require astral_PARENT_INC_DIR . '/core/class-astral-contact-section.php';
require astral_PARENT_INC_DIR . '/core/class-astral-blog-section.php';

/* 
 * customizer class
*/
require(dirname(__FILE__).'/inc/core/class-astral-customizer.php'); 

/*
 * Load hooks.
*/
require astral_PARENT_INC_DIR . '/hooks.php';
require astral_PARENT_INC_DIR . '/header.php';
require astral_PARENT_INC_DIR . '/footer.php';

require astral_PARENT_INC_DIR . '/core/class-wp-bootstrap-navwalker.php';

/* 
 * theme extra function 
*/
require astral_PARENT_INC_DIR . '/theme-function.php';


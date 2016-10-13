<?php
/*-----------------------------------------------------------------------------------*/
/* Include Theme Functions */
/*-----------------------------------------------------------------------------------*/
function backyard_lang_setup() {
load_theme_textdomain('backyard', get_template_directory() . '/languages');
}
add_action( 'after_setup_theme', 'backyard_lang_setup' );
//post meta core functions
require_once locate_template('/lib/template_tag.php');
require_once locate_template('/lib/scripts.php'); //  setup style and script
require_once locate_template('/lib/init.php'); // Initial theme setup and constants
require_once locate_template('/lib/widgets.php'); //  setup sidebar
require_once locate_template('/lib/theme-options.php');
require_once locate_template('/lib/backyard-breadcrumbs.php');
require_once locate_template('/lib/comments.php');
?>
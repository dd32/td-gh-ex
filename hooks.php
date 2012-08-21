<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

?>
<?php

/**
 * Just after opening <body> tag
 *
 * @see header.php
 */
function semperfi_container() {
    do_action('semperfi_container');
}

/**
 * Just after closing </div><!-- end of #container -->
 *
 * @see footer.php
 */
function semperfi_container_end() {
    do_action('semperfi_container_end');
}

/**
 * Just after opening <div id="container">
 *
 * @see header.php
 */
function semperfi_header() {
    do_action('semperfi_header');
}

/**
 * Just after opening <div id="header">
 *
 * @see header.php
 */
function semperfi_in_header() {
    do_action('semperfi_in_header');
}

/**
 * Just after closing </div><!-- end of #header -->
 *
 * @see header.php
 */
function semperfi_header_end() {
    do_action('semperfi_header_end');
}

/**
 * Just before opening <div id="wrapper">
 *
 * @see header.php
 */
function semperfi_wrapper() {
    do_action('semperfi_wrapper');
}

/**
 * Just after opening <div id="wrapper">
 *
 * @see header.php
 */
function semperfi_in_wrapper() {
    do_action('semperfi_in_wrapper');
}

/**
 * Just after closing </div><!-- end of #wrapper -->
 *
 * @see header.php
 */
function semperfi_wrapper_end() {
    do_action('semperfi_wrapper_end');
}

/**
 * Just before opening <div id="widgets">
 *
 * @see sidebar.php
 */
function semperfi_widgets() {
    do_action('semperfi_widgets');
}

/**
 * Just after closing </div><!-- end of #widgets -->
 *
 * @see sidebar.php
 */
function semperfi_widgets_end() {
    do_action('semperfi_widgets_end');
}

/**
 * Theme Options
 *
 * @see theme-options.php
 */
function semperfi_theme_options() {
    do_action('semperfi_theme_options');
}

?>
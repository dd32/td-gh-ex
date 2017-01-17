<?php
$template_directory = get_template_directory();
global $theme_info;

$theme_info = wp_get_theme();

require_once( $template_directory . '/includes/theme-setup.php' );
require_once( $template_directory . '/includes/customize/customize.php' );
require_once( $template_directory . '/includes/widgets.php');
require_once( $template_directory . '/includes/custom-functions.php' );
require_once( $template_directory . '/includes/custom-functions.php' );
require_once $template_directory . '/includes/trt-customizer-pro/example-1/class-customize.php';
?>
<?php
$template_directory = get_template_directory();
global $themename,$theme_info;

$theme_info = wp_get_theme();
//define 
define( 'ACOOL_THEME_PRO_USED', false );
define( 'ACOOL_THEME_CN', true );
define( 'ACOOL_COOTHEMES', false );

if ( defined( 'ACOOL_THEME_PRO_USED' ) && ACOOL_THEME_PRO_USED ){
	require_once( $template_directory . '/includes/pro/theme-setup-pro.php');
}

require_once( $template_directory . '/includes/theme-setup.php' );
require_once( $template_directory . '/includes/customize/customize.php' );
require_once( $template_directory . '/includes/widgets.php');
require_once( $template_directory . '/includes/custom-functions.php' );
?>
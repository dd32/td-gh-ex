<?php
/*adding header options panel*/
$wp_customize->add_panel( 'acmephoto-header-panel', array(
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Header Options', 'acmephoto' ),
    'description'    => __( 'Customize your awesome site header ', 'acmephoto' )
) );

/*
* file for header logo options
*/
$acmephoto_customizer_header_logo_file_path = acmephoto_file_directory('acmethemes/customizer/header-options/header-logo.php');
require $acmephoto_customizer_header_logo_file_path;

/*
* file for header social options
*/
$acmephoto_customizer_header_social_file_path = acmephoto_file_directory('acmethemes/customizer/header-options/social-options.php');
require $acmephoto_customizer_header_social_file_path;

/*
* file for menu options
*/
$acmephoto_customizer_header_menu_option_file_path = acmephoto_file_directory('acmethemes/customizer/header-options/menu-option.php');
require $acmephoto_customizer_header_menu_option_file_path;



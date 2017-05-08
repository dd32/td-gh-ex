<?php
/*adding header options panel*/
$wp_customize->add_panel( 'acmeblog-header-panel', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Header Options', 'acmeblog' ),
    'description'    => __( 'Customize your awesome site header ', 'acmeblog' )
) );

/*
* file for header logo options
*/
$acmeblog_customizer_header_logo_file_path = acmeblog_file_directory('acmethemes/customizer/header-options/header-logo.php');
require $acmeblog_customizer_header_logo_file_path;

/*
* file for header date options
*/
$acmeblog_customizer_header_date_file_path = acmeblog_file_directory('acmethemes/customizer/header-options/header-date.php');
require $acmeblog_customizer_header_date_file_path;

/*
* file for header social options
*/
$acmeblog_customizer_header_social_file_path = acmeblog_file_directory('acmethemes/customizer/header-options/social-options.php');
require $acmeblog_customizer_header_social_file_path;

/*
* file for header menu options
*/
$acmeblog_customizer_header_menu_option_file_path = acmeblog_file_directory('acmethemes/customizer/header-options/menu-option.php');
require $acmeblog_customizer_header_menu_option_file_path;




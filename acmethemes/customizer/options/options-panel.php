<?php
/*adding theme options panel*/
$wp_customize->add_panel( 'acmeblog-options', array(
    'priority'       => 210,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Theme Options', 'acmeblog' ),
    'description'    => __( 'Customize your awesome site with theme options ', 'acmeblog' )
) );

/*
* file for header breadcrumb options
*/
$acmeblog_customizer_options_breadcrumb_file_path = acmeblog_file_directory('acmethemes/customizer/options/breadcrumb.php');
require $acmeblog_customizer_options_breadcrumb_file_path;

/*
* file for header search options
*/
$acmeblog_customizer_options_search_file_path = acmeblog_file_directory('acmethemes/customizer/options/search.php');
require $acmeblog_customizer_options_search_file_path;
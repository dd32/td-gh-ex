<?php
/*adding theme options panel*/
$wp_customize->add_panel( 'acmephoto-options', array(
    'priority'       => 210,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Theme Options', 'acmephoto' ),
    'description'    => __( 'Customize your awesome site with theme options ', 'acmephoto' )
) );

/*
* file for header breadcrumb options
*/
$acmephoto_customizer_options_breadcrumb_file_path = acmephoto_file_directory('acmethemes/customizer/options/breadcrumb.php');
require $acmephoto_customizer_options_breadcrumb_file_path;

/*
* file for header search options
*/
$acmephoto_customizer_options_search_file_path = acmephoto_file_directory('acmethemes/customizer/options/search.php');
require $acmephoto_customizer_options_search_file_path;

/*
* file for pagination
*/
$acmephoto_customizer_options_pagination_file_path = acmephoto_file_directory('acmethemes/customizer/options/pagination.php');
require $acmephoto_customizer_options_pagination_file_path;
<?php
/*adding feature options panel*/
$wp_customize->add_panel( 'acmeblog-feature-panel', array(
    'priority'       => 40,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Featured Section Options', 'acmeblog' ),
    'description'    => __( 'Customize your awesome site feature section ', 'acmeblog' )
) );

/*
* file for feature slider category
*/
$acmeblog_customizer_feature_category_file_path = acmeblog_file_directory('acmethemes/customizer/feature-section/feature-category.php');
require $acmeblog_customizer_feature_category_file_path;

/*
* file for feature side
*/
$acmeblog_customizer_feature_side_file_path = acmeblog_file_directory('acmethemes/customizer/feature-section/feature-side.php');
require $acmeblog_customizer_feature_side_file_path;

/*
* file for feature section enable
*/
$acmeblog_customizer_feature_enable_file_path = acmeblog_file_directory('acmethemes/customizer/feature-section/feature-enable.php');
require $acmeblog_customizer_feature_enable_file_path;
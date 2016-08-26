<?php
/*adding feature options panel*/
$wp_customize->add_panel( 'acmephoto-feature-panel', array(
    'priority'       => 105,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Featured Section Options', 'acmephoto' ),
    'description'    => __( 'Customize your awesome site feature section ', 'acmephoto' )
) );


/*
* file for feature section enable
*/
$acmephoto_customizer_feature_enable_file_path = acmephoto_file_directory('acmethemes/customizer/feature-section/feature-enable.php');
require $acmephoto_customizer_feature_enable_file_path;

/*
* file for feature slider category
*/
$acmephoto_customizer_feature_category_file_path = acmephoto_file_directory('acmethemes/customizer/feature-section/feature-slider.php');
require $acmephoto_customizer_feature_category_file_path;

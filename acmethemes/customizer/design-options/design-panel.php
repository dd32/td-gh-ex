<?php
/*
 * adding theme options panel
 * */
$wp_customize->add_panel( 'acmephoto-design-panel', array(
    'priority'       => 190,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Layout/Design Option', 'acmephoto' )
) );

/*
* file for default layout
*/
$acmephoto_customizer_default_layout_file_path = acmephoto_file_directory('acmethemes/customizer/design-options/default-layout.php');
require $acmephoto_customizer_default_layout_file_path;

/*
* file for sidebar layout
*/
$acmephoto_customizer_sidebar_layout_file_path = acmephoto_file_directory('acmethemes/customizer/design-options/sidebar-layout.php');
require $acmephoto_customizer_sidebar_layout_file_path;

/*
* file for blog layout
*/
$acmephoto_customizer_blog_layout_file_path = acmephoto_file_directory('acmethemes/customizer/design-options/blog-layout.php');
require $acmephoto_customizer_blog_layout_file_path;

/*
* file for color options
*/
$acmephoto_customizer_colors_options_file_path = acmephoto_file_directory('acmethemes/customizer/design-options/colors-options.php');
require $acmephoto_customizer_colors_options_file_path;

/*
* file for background image layout
*/
$acmephoto_customizer_background_image_file_path = acmephoto_file_directory('acmethemes/customizer/design-options/background-image.php');
require $acmephoto_customizer_background_image_file_path;

/*
* file for custom css
*/
$acmephoto_customizer_custom_css_file_path = acmephoto_file_directory('acmethemes/customizer/design-options/custom-css.php');
require $acmephoto_customizer_custom_css_file_path;

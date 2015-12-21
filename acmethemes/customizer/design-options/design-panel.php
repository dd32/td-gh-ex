<?php
/*adding theme options panel*/
$wp_customize->add_panel( 'acmeblog-design-panel', array(
    'priority'       => 190,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Layout/Design Option', 'acmeblog' )
) );

/*
* file for default layout
*/
$acmeblog_customizer_default_layout_file_path = acmeblog_file_directory('acmethemes/customizer/design-options/default-layout.php');
require $acmeblog_customizer_default_layout_file_path;

/*
* file for sidebar layout
*/
$acmeblog_customizer_sidebar_layout_file_path = acmeblog_file_directory('acmethemes/customizer/design-options/sidebar-layout.php');
require $acmeblog_customizer_sidebar_layout_file_path;

/*
* file for blog layout
*/
$acmeblog_customizer_blog_layout_file_path = acmeblog_file_directory('acmethemes/customizer/design-options/blog-layout.php');
require $acmeblog_customizer_blog_layout_file_path;

/*
* file for color options
*/
$acmeblog_customizer_colors_options_file_path = acmeblog_file_directory('acmethemes/customizer/design-options/colors-options.php');
require $acmeblog_customizer_colors_options_file_path;

/*
* file for background image layout
*/
$acmeblog_customizer_background_image_file_path = acmeblog_file_directory('acmethemes/customizer/design-options/background-image.php');
require $acmeblog_customizer_background_image_file_path;

/*
* file for custom css
*/
$acmeblog_customizer_custom_css_file_path = acmeblog_file_directory('acmethemes/customizer/design-options/custom-css.php');
require $acmeblog_customizer_custom_css_file_path;

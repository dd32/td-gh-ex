<?php
/*adding theme options panel*/
$wp_customize->add_panel( 'acmeblog-design-panel', array(
    'priority'       => 80,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Layout/Design Option', 'acmeblog' )
) );


$wp_customize->get_section( 'background_image' )->panel = 'acmeblog-design-panel';
$wp_customize->get_section( 'background_image' )->priority = 50;


/*
* file for default layout
*/
$acmeblog_customizer_default_layout_file_path = acmeblog_file_directory('acmethemes/customizer/design-options/default-layout.php');
require $acmeblog_customizer_default_layout_file_path;
/*
* file for sidebar layout
*/
require acmeblog_file_directory('acmethemes/customizer/design-options/sidebar-layout.php');

/*
* file for front page sidebar layout options
*/
require acmeblog_file_directory('acmethemes/customizer/design-options/front-page-sidebar-layout.php');

/*
* file for front archive sidebar layout options
*/
require acmeblog_file_directory('acmethemes/customizer/design-options/archive-sidebar-layout.php');

/*
* file for sticky sidebar
*/
$acmeblog_customizer_sticky_sidebar_file_path = acmeblog_file_directory('acmethemes/customizer/design-options/sticky-sidebar.php');
require $acmeblog_customizer_sticky_sidebar_file_path;
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
* file for custom css
*/
$acmeblog_customizer_custom_css_file_path = acmeblog_file_directory('acmethemes/customizer/design-options/custom-css.php');
require $acmeblog_customizer_custom_css_file_path;

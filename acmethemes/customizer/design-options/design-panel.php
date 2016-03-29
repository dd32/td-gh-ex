<?php
/*adding theme options panel*/
$wp_customize->add_panel( 'acmephoto-design-panel', array(
    'priority'       => 190,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Layout/Design Option', 'acmephoto' )
) );

/*
* file for sidebar layout
*/
require_once get_template_directory() . '/acmethemes/customizer/design-options/sidebar-layout.php';

/*
* file for blog layout
*/
require_once get_template_directory() . '/acmethemes/customizer/design-options/blog-layout.php';

/*
* file for color options
*/
require_once get_template_directory() . '/acmethemes/customizer/design-options/colors-options.php';

/*
* file for background image layout
*/
require_once get_template_directory() . '/acmethemes/customizer/design-options/background-image.php';

/*
* file for custom css
*/
require_once get_template_directory() . '/acmethemes/customizer/design-options/custom-css.php';

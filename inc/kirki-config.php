<?php
// theme class: Tbm_Aquarella_Kirki
// config: tbm_aquarella_kc
//main config

$theme_url = 'http://themebear.co/portfolio/aquarella-blog-wordpress-theme/';

Tbm_Aquarella_Kirki::add_config( 'tbm_aquarella_kc', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

/*
** PANELS ==================================================
*/

//General
Tbm_Aquarella_Kirki::add_panel( 'aqrl_general', array(
    'priority'    => 10,
    'title'       => __( 'Aquarella Lite: Theme Options', 'aquarella-lite' ),
    'description' => __( 'Customization here', 'aquarella-lite' ),
) );

/*
** SECTIONS ==================================================
*/

//Layout
Tbm_Aquarella_Kirki::add_section( 'aqrl_layout', array(
    'title'          => __( 'Layout', 'aquarella-lite'),
    //'description'    => __( '' ),
    'panel'          => 'aqrl_general', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

//Color Scheme
Tbm_Aquarella_Kirki::add_section( 'aqrl_colors', array(
    'title'          => __( 'Color Scheme' , 'aquarella-lite'),
    //'description'    => __( '' ),
    'panel'          => 'aqrl_general', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

//Typography
Tbm_Aquarella_Kirki::add_section( 'aqrl_typography', array(
    'title'          => __( 'Tipography', 'aquarella-lite'),
    //'description'    => __( '' ),
    'panel'          => 'aqrl_general', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

//Background
Tbm_Aquarella_Kirki::add_section( 'aqrl_bg', array(
    'title'          => __( 'Background', 'aquarella-lite' ),
    //'description'    => __( '' ),
    'panel'          => 'aqrl_general', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

//Header
Tbm_Aquarella_Kirki::add_section( 'aqrl_header', array(
    'title'          => __( 'Header', 'aquarella-lite' ),
    //'description'    => __( '' ),
    'panel'          => 'aqrl_general', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

//Header
Tbm_Aquarella_Kirki::add_section( 'aqrl_footer', array(
    'title'          => __( 'Footer', 'aquarella-lite' ),
    //'description'    => __( '' ),
    'panel'          => 'aqrl_general', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

//Profile
Tbm_Aquarella_Kirki::add_section( 'aqrl_profile', array(
    'title'          => __( 'Profile Widget', 'aquarella-lite' ),
    //'description'    => __( '' ),
    'panel'          => 'aqrl_general', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

//Social Networks
Tbm_Aquarella_Kirki::add_section( 'aqrl_social', array(
    'title'          => __( 'Social Networks', 'aquarella-lite' ),
    //'description'    => __( '' ),
    'panel'          => 'aqrl_general', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

//Extra Options
Tbm_Aquarella_Kirki::add_section( 'aqrl_extra', array(
    'title'          => __( 'Extra Options', 'aquarella-lite' ),
    //'description'    => __( '' ),
    'panel'          => 'aqrl_general', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

/*
** CONTROLS ==================================================
*/

//>> Layout ==================
Tbm_Aquarella_Kirki::add_field( 'tbm_aquarella_kc', array(
	'type'        => 'radio',
	'settings'    => 'layout_custom',
	'label'       => esc_html__( 'Layout Style', 'aquarella-lite' ),
	'section'     => 'aqrl_layout',
	'default'     => 'sidebar_right',
	'priority'    => 10,
	'choices'     => array(
		'sidebar_left' => esc_attr__( 'Sidebar on left', 'aquarella-lite' ),
		'sidebar_right'  => esc_attr__( 'Sidebar on right', 'aquarella-lite' ),
	),
) );

//PRO version
Tbm_Aquarella_Kirki::add_field( 'tbm_aquarella_kc', array(
	'type'        => 'custom',
	'settings'    => 'layout_warning',
	'label'       => esc_attr__( 'Upgrade to PRO Version', 'aquarella-lite' ),
	'section'     => 'aqrl_layout',
	'default'     => '<a href="' .$theme_url .'" style="display: block; font-weight: bold; padding: 10px; background-color: #f8be27; color: #fff; border-radius: 5px;" target="_blank">' . esc_html__( 'There are more features in this section that can be unlocked with the PRO version. Click here to upgrade and enable this features!', 'aquarella-lite' ) . '</a>',
	'priority'    => 10,
) );



//>> Color Scheme ==================
//Color 1
Tbm_Aquarella_Kirki::add_field( 'tbm_aquarella_kc', array(
	'type'        => 'color',
	'settings'    => 'color_one',
	'label'       => __( 'Accent Color', 'aquarella-lite' ),
	'section'     => 'aqrl_colors',
	'default'     => '#f72565',
	'priority'    => 10,
	'alpha'       => false,
) );

//Color 2
Tbm_Aquarella_Kirki::add_field( 'tbm_aquarella_kc', array(
	'type'        => 'color',
	'settings'    => 'color_two',
	'label'       => __( 'Color 2', 'aquarella-lite' ),
	'section'     => 'aqrl_colors',
	'default'     => '#ffcf38',
	'priority'    => 10,
	'alpha'       => false,
) );

//Color 3
Tbm_Aquarella_Kirki::add_field( 'tbm_aquarella_kc', array(
	'type'        => 'color',
	'settings'    => 'color_three',
	'label'       => __( 'Color 3', 'aquarella-lite' ),
	'section'     => 'aqrl_colors',
	'default'     => '#f8be27',
	'priority'    => 10,
	'alpha'       => false,
) );

//PRO version
Tbm_Aquarella_Kirki::add_field( 'tbm_aquarella_kc', array(
	'type'        => 'custom',
	'settings'    => 'colors_warning',
	'label'       => esc_attr__( 'Upgrade to PRO Version', 'aquarella-lite' ),
	'section'     => 'aqrl_colors',
	'default'     => '<a href="' .$theme_url .'" style="display: block; font-weight: bold; padding: 10px; background-color: #f8be27; color: #fff; border-radius: 5px;" target="_blank">' . esc_html__( 'There are more features in this section that can be unlocked with the PRO version. Click here to upgrade and enable this features!', 'aquarella-lite' ) . '</a>',
	'priority'    => 10,
) );




//>> Typography ==================

//PRO version
Tbm_Aquarella_Kirki::add_field( 'tbm_aquarella_kc', array(
	'type'        => 'custom',
	'settings'    => 'typo_warning',
	'label'       => esc_attr__( 'Exclusive features of the PRO version', 'aquarella-lite' ),
	'section'     => 'aqrl_typography',
	'default'     => '<a href="' .$theme_url .'" style="display: block; font-weight: bold; padding: 10px; background-color: #f8be27; color: #fff; border-radius: 5px;" target="_blank">' . esc_html__( 'This is a exclusive feature of the PRO version. Click here to upgrade and enable this feature  and choose from 600+ Google Fonts for your blog.', 'aquarella-lite' ) . '</a>',
	'priority'    => 10,
) );



//>> Theme Background ==================
//Background Image
Tbm_Aquarella_Kirki::add_field( 'tbm_aquarella_kc', array(
	'type'        => 'image',
	'settings'    => 'bg_image',
	'label'       => __( 'Background Image', 'aquarella-lite' ),
	'description' => __( 'You can use a background image (like a pattern) if you want. ', 'aquarella-lite' ),
	//'help'        => __( 'This is some extra help text.', 'aquarella-lite' ),
	'section'     => 'aqrl_bg',
	'default'     => '',
	'priority'    => 10,
) );

//Background Color
Tbm_Aquarella_Kirki::add_field( 'tbm_aquarella_kc', array(
	'type'        => 'color',
	'settings'    => 'bg_color',
	'label'       => __( 'Background Color', 'aquarella-lite' ),
	'section'     => 'aqrl_bg',
	'default'     => '#eeeeee',
	'priority'    => 10,
	'alpha'       => true,
) );

//PRO version
Tbm_Aquarella_Kirki::add_field( 'tbm_aquarella_kc', array(
	'type'        => 'custom',
	'settings'    => 'bg_warning',
	'label'       => esc_attr__( 'Upgrade to PRO Version', 'aquarella-lite' ),
	'section'     => 'aqrl_bg',
	'default'     => '<a href="' .$theme_url .'" style="display: block; font-weight: bold; padding: 10px; background-color: #f8be27; color: #fff; border-radius: 5px;" target="_blank">' . esc_html__( 'There are more features that can be unlocked with the PRO version. Click here to upgrade and enable this features!', 'aquarella-lite' ) . '</a>',
	'priority'    => 10,
) );


//>> Header ======================
//PRO version
Tbm_Aquarella_Kirki::add_field( 'tbm_aquarella_kc', array(
	'type'        => 'custom',
	'settings'    => 'header_warning',
	'label'       => esc_attr__( 'Exclusive features of the PRO version', 'aquarella-lite' ),
	'section'     => 'aqrl_header',
	'default'     => '<a href="' .$theme_url .'" style="display: block; font-weight: bold; padding: 10px; background-color: #f8be27; color: #fff; border-radius: 5px;" target="_blank">' . esc_html__( 'This is a exclusive feature of the PRO version. Click here to upgrade and enable this feature.', 'aquarella-lite' ) . '</a>',
	'priority'    => 10,
) );


//>> Footer ======================
//PRO version
Tbm_Aquarella_Kirki::add_field( 'tbm_aquarella_kc', array(
	'type'        => 'custom',
	'settings'    => 'footer_warning',
	'label'       => esc_attr__( 'Exclusive features of the PRO version', 'aquarella-lite' ),
	'section'     => 'aqrl_footer',
	'default'     => '<a href="' .$theme_url .'" style="display: block; font-weight: bold; padding: 10px; background-color: #f8be27; color: #fff; border-radius: 5px;" target="_blank">' . esc_html__( 'This is a exclusive feature of the PRO version. Click here to upgrade and enable this feature.', 'aquarella-lite' ) . '</a>',
	'priority'    => 10,
) );



//>> Profile Widget ==================
//PRO version
Tbm_Aquarella_Kirki::add_field( 'tbm_aquarella_kc', array(
	'type'        => 'custom',
	'settings'    => 'profile_warning',
	'label'       => esc_attr__( 'Exclusive feature of the PRO version', 'aquarella-lite' ),
	'section'     => 'aqrl_profile',
	'default'     => '<a href="' .$theme_url .'" style="display: block; font-weight: bold; padding: 10px; background-color: #f8be27; color: #fff; border-radius: 5px;" target="_blank">' . esc_html__( 'This is a exclusive feature of the PRO version. Click here to upgrade and enable this feature.', 'aquarella-lite' ) . '</a>',
	'priority'    => 10,
) );


//>> Social Networks ==================
Tbm_Aquarella_Kirki::add_field( 'tbm_aquarella_kc', array(
	'type'        => 'custom',
	'settings'    => 'social_warning',
	'label'       => esc_attr__( 'Exclusive feature of the PRO version', 'aquarella-lite' ),
	'section'     => 'aqrl_social',
	'default'     => '<a href="' .$theme_url .'" style="display: block; font-weight: bold; padding: 10px; background-color: #f8be27; color: #fff; border-radius: 5px;" target="_blank">' . esc_html__( 'This is a exclusive feature of the PRO version. Click here to upgrade and enable this feature.', 'aquarella-lite' ) . '</a>',
	'priority'    => 10,
) );



//>> Extra Options ==================
//Extra - Custom CSS
Tbm_Aquarella_Kirki::add_field( 'tbm_aquarella_kc', array(
	'type'        => 'custom',
	'settings'    => 'social_warning',
	'label'       => esc_attr__( 'Exclusive feature of the PRO version', 'aquarella-lite' ),
	'section'     => 'aqrl_extra',
	'default'     => '<a href="' .$theme_url .'" style="display: block; font-weight: bold; padding: 10px; background-color: #f8be27; color: #fff; border-radius: 5px;" target="_blank">' . esc_html__( 'This is a exclusive feature of the PRO version. Click here to upgrade and enable this feature.', 'aquarella-lite' ) . '</a>',
	'priority'    => 10,
) );


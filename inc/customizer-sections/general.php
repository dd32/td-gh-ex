<?php
// Set prefix
$prefix = 'asterion';

// Set section id
$panel_id = $prefix.'_general_section';
$section_id = $prefix.'_copyright';
$section_id_2 = $prefix.'_section_order';
$section_id_3 = $prefix.'_color_options';


/***********************************************/
/********************* Contact  *****************/
/***********************************************/

$wp_customize->add_panel( $panel_id,
    array(
        'priority'          => 21,
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => esc_html__( 'General Settings', 'asterion' ),
        'description'       => esc_html__( 'Theme general options like header and footer settings, copyright information etc.', 'asterion' ),
    )
);

/***********************************************/
/**************** SECTION ORDER  ***************/
/***********************************************/

$wp_customize->add_section( $section_id_2,
    array(
        'priority'          => 1,
        'theme_supports'    => '',
        'title'             => esc_html__( 'Section Order', 'asterion' ),
        'description'       => esc_html__( 'Reorder the front page sections.', 'asterion' ),
        'panel'             => $panel_id
    )
);

//first section
$wp_customize->add_setting( $prefix .'_section_order_1',
    array(
        'sanitize_callback' => 'esc_attr',
        'default'           => 1
    )
);

$wp_customize->add_control(
    $prefix .'_section_order_1',
    array(
        'label'         => esc_html__( 'First section', 'asterion' ),
        'description'   => esc_html__( 'Select what section you would like see first on the front page.', 'asterion' ),
        'type'          => 'select',
        'section'       => $section_id_2,
        'choices'       => array(
            1   => esc_html__( 'Features', 'asterion' ),
            2   => esc_html__( 'Portfolio', 'asterion' ),
            3   => esc_html__( 'Testimonials', 'asterion' ),
            4   => esc_html__( 'About', 'asterion' ),
            5   => esc_html__( 'Contact us', 'asterion' )
        )
    )
);

//second section
$wp_customize->add_setting( $prefix .'_section_order_2',
    array(
        'sanitize_callback' => 'esc_attr',
        'default'           => 2
    )
);

$wp_customize->add_control(
    $prefix .'_section_order_2',
    array(
        'label'         => esc_html__( 'Second section', 'asterion' ),
        'description'   => esc_html__( 'Select what section you would like see second on the front page.', 'asterion' ),
        'type'          => 'select',
        'section'       => $section_id_2,
        'choices'       => array(
            1   => esc_html__( 'Features', 'asterion' ),
            2   => esc_html__( 'Portfolio', 'asterion' ),
            3   => esc_html__( 'Testimonials', 'asterion' ),
            4   => esc_html__( 'About', 'asterion' ),
            5   => esc_html__( 'Contact us', 'asterion' )
        )
    )
);

//third section
$wp_customize->add_setting( $prefix .'_section_order_3',
    array(
        'sanitize_callback' => 'esc_attr',
        'default'           => 3
    )
);

$wp_customize->add_control(
    $prefix .'_section_order_3',
    array(
        'label'         => esc_html__( 'Third section', 'asterion' ),
        'description'   => esc_html__( 'Select what section you would like see third on the front page.', 'asterion' ),
        'type'          => 'select',
        'section'       => $section_id_2,
        'choices'       => array(
            1   => esc_html__( 'Features', 'asterion' ),
            2   => esc_html__( 'Portfolio', 'asterion' ),
            3   => esc_html__( 'Testimonials', 'asterion' ),
            4   => esc_html__( 'About', 'asterion' ),
            5   => esc_html__( 'Contact us', 'asterion' )
        )
    )
);

//forth section
$wp_customize->add_setting( $prefix .'_section_order_4',
    array(
        'sanitize_callback' => 'esc_attr',
        'default'           => 4
    )
);

$wp_customize->add_control(
    $prefix .'_section_order_4',
    array(
        'label'         => esc_html__( 'Forth section', 'asterion' ),
        'description'   => esc_html__( 'Select what section you would like see forth on the front page.', 'asterion' ),
        'type'          => 'select',
        'section'       => $section_id_2,
        'choices'       => array(
            1   => esc_html__( 'Features', 'asterion' ),
            2   => esc_html__( 'Portfolio', 'asterion' ),
            3   => esc_html__( 'Testimonials', 'asterion' ),
            4   => esc_html__( 'About', 'asterion' ),
            5   => esc_html__( 'Contact us', 'asterion' )
        )
    )
);

//fifth section
$wp_customize->add_setting( $prefix .'_section_order_5',
    array(
        'sanitize_callback' => 'esc_attr',
        'default'           => 5
    )
);

$wp_customize->add_control(
    $prefix .'_section_order_5',
    array(
        'label'         => esc_html__( 'Fifth section', 'asterion' ),
        'description'   => esc_html__( 'Select what section you would like see fifth on the front page.', 'asterion' ),
        'type'          => 'select',
        'section'       => $section_id_2,
        'choices'       => array(
            1   => esc_html__( 'Features', 'asterion' ),
            2   => esc_html__( 'Portfolio', 'asterion' ),
            3   => esc_html__( 'Testimonials', 'asterion' ),
            4   => esc_html__( 'About', 'asterion' ),
            5   => esc_html__( 'Contact us', 'asterion' )
        )
    )
);



/***********************************************/
/****************** COPYRIGHT  *****************/
/***********************************************/

$wp_customize->add_section( $section_id,
    array(
        'priority'          => 2,
        'theme_supports'    => '',
        'title'             => esc_html__( 'Copyright', 'asterion' ),
        'description'       => esc_html__( 'Change copyright here.', 'asterion' ),
        'panel'             => $panel_id
    )
);



// Title
$wp_customize->add_setting( $prefix .'_copyright',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_html' ),
        'default'           => sprintf( __( '&copy; Copyright %s. All Rights Reserved.', 'asterion' ), date('Y')),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_copyright',
    array(
        'label'         => esc_html__( 'Copyright', 'asterion' ),
        'description'   => esc_html__( 'Add your copyright message here.', 'asterion'),
        'section'       => $section_id,
        'priority'      => 1
    )
);


/***********************************************/
/****************** COLORS  *****************/
/***********************************************/

$wp_customize->add_section( $section_id_3,
    array(
        'priority'          => 2,
        'theme_supports'    => '',
        'title'             => esc_html__( 'Colors', 'asterion' ),
        'description'       => esc_html__( 'Customize theme colors here.', 'asterion' ),
        'panel'             => $panel_id
    )
);



// accent color
$wp_customize->add_setting( $prefix .'_accent_color',
    array(
        'sanitize_callback' => 'sanitize_hex_color',
        'default'           => '#00afa4'
    )
);
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
    $prefix .'_accent_color',
    array(
        'label'         => esc_html__( 'Accent Color', 'asterion' ),
        'description'   => esc_html__( 'Theme accent colors', 'asterion'),
        'section'       => $section_id_3,
        'priority'      => 1
    )
));

// hover color
$wp_customize->add_setting( $prefix .'_hover_color',
    array(
        'sanitize_callback' => 'sanitize_hex_color',
        'default'           => '#fbcc3f'
    )
);
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
    $prefix .'_hover_color',
    array(
        'label'         => esc_html__( 'Hover Color', 'asterion' ),
        'description'   => esc_html__( 'Theme hover colors', 'asterion'),
        'section'       => $section_id_3,
        'priority'      => 2
    )
));



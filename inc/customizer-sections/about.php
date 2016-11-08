<?php
// Set prefix
$prefix = 'asterion';

// Set section id
$section_id = $prefix.'_about_section';

/***********************************************/
/********************* About  *****************/
/***********************************************/
$wp_customize->add_section( $section_id,
    array(
        'priority'          => 102,
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => esc_html__( 'About Section', 'asterion' ),
        'description'       => esc_html__( 'Change about section information here.', 'asterion' ),
    )
);



// Show this section
$wp_customize->add_setting( $prefix . '_about_show',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_checkbox' ),
        'default'           => 1,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_about_show',
    array(
        'type'      => 'checkbox',
        'label'     => esc_html__( 'Show this section?', 'asterion' ),
        'section'   => $section_id,
        'priority'  => 1
    )
);

// Title
$wp_customize->add_setting( $prefix .'_about_title',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_html' ),
        'default'           => esc_html__( 'About', 'asterion' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_about_title',
    array(
        'label'         => esc_html__( 'Title', 'asterion' ),
        'description'   => esc_html__( 'Add the title for this section.', 'asterion'),
        'section'       => $section_id,
        'priority'      => 2
    )
);

// Text
$wp_customize->add_setting( $prefix .'_about_text',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_html' ),
        'default'           => esc_html__( 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.', 'asterion' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_about_text',
    array(
        'label'         => esc_html__( 'Text', 'asterion' ),
        'description'   => esc_html__( 'Add the content for this section.', 'asterion'),
        'section'       => $section_id,
        'priority'      => 3,
        'type'          => 'textarea'
    )
);

// background color
$wp_customize->add_setting( $prefix . '_about_bg_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'default'           => '#ffffff',
    'transport'         => 'postMessage'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_about_bg_color', array(
    'label'       => esc_html__( 'Background color', 'asterion' ),
    'description' => esc_html__( 'About section background color', 'asterion' ),
    'section'     => $section_id,
    'settings'    => $prefix . '_about_bg_color',
    'priority'    => 4,
) ) );


// text color
$wp_customize->add_setting( $prefix . '_about_text_color',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_checkbox' ),
        'default'           => 0,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_about_text_color',
    array(
        'type'      => 'checkbox',
        'label'     => esc_html__( 'Light text?', 'asterion' ),
        'description' => esc_html__( 'Choose text color scheme, light or dark', 'asterion' ),
        'section'   => $section_id,
        'priority'  => 5
    )
);
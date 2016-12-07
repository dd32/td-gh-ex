<?php
// Set prefix
$prefix = 'asterion';

// Set section id
$section_id = $prefix.'_counters_section';

/***********************************************/
/****************** COUNTERS  *****************/
/***********************************************/
$wp_customize->add_section( $section_id,
    array(
        'priority'          => 102,
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => esc_html__( 'Counters Section', 'asterion' ),
        'description'       => esc_html__( 'Change counters section information here.', 'asterion' ),
    )
);



// Show this section
$wp_customize->add_setting( $prefix . '_counters_show',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_checkbox' ),
        'default'           => 1,
        //'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_counters_show',
    array(
        'type'      => 'checkbox',
        'label'     => esc_html__( 'Show this section?', 'asterion' ),
        'section'   => $section_id,
        'priority'  => 1
    )
);

$wp_customize->selective_refresh->add_partial( $prefix . '_counters_show', 
    array(
        'selector'            => '#counters .ot-container',
        'container_inclusive' => true,
    ) 
);

// Title 1
$wp_customize->add_setting( $prefix .'_counters_title_1',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_html' ),
        'default'           => esc_html__( 'Awards', 'asterion' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_counters_title_1',
    array(
        'label'         => esc_html__( 'First Counter Title', 'asterion' ),
        'section'       => $section_id,
        'priority'      => 2,
    )
);


// counter count 1
$wp_customize->add_setting( $prefix .'_counters_count_1',
    array(
        'sanitize_callback' => 'esc_html',
        'default'           => absint( 16 ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_counters_count_1',
    array(
        'label'             => esc_html__( 'First Counter Count', 'asterion' ),
        'description'       => esc_html__( 'Add a number to the counter', 'asterion'),
        'section'           => $section_id,
        'priority'          => 3
    )
);

// Title 2
$wp_customize->add_setting( $prefix .'_counters_title_2',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_html' ),
        'default'           => esc_html__( 'Clients', 'asterion' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_counters_title_2',
    array(
        'label'         => esc_html__( 'Second Counter Title', 'asterion' ),
        'section'       => $section_id,
        'priority'      => 4,
    )
);

// counter count 2
$wp_customize->add_setting( $prefix .'_counters_count_2',
    array(
        'sanitize_callback' => 'esc_html',
        'default'           => absint( 453 ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_counters_count_2',
    array(
        'label'             => esc_html__( 'Second Counter Count', 'asterion' ),
        'description'       => esc_html__( 'Add a number to the counter', 'asterion'),
        'section'           => $section_id,
        'priority'          => 5
    )
);

// Title 3
$wp_customize->add_setting( $prefix .'_counters_title_3',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_html' ),
        'default'           => esc_html__( 'Team', 'asterion' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_counters_title_3',
    array(
        'label'         => esc_html__( 'Third Counter Title', 'asterion' ),
        'section'       => $section_id,
        'priority'      => 6,
    )
);

// counter count 2
$wp_customize->add_setting( $prefix .'_counters_count_3',
    array(
        'sanitize_callback' => 'esc_html',
        'default'           => absint( 7 ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_counters_count_3',
    array(
        'label'             => esc_html__( 'Third Counter Count', 'asterion' ),
        'description'       => esc_html__( 'Add a number to the counter', 'asterion'),
        'section'           => $section_id,
        'priority'          => 6
    )
);

// Title 4
$wp_customize->add_setting( $prefix .'_counters_title_4',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_html' ),
        'default'           => esc_html__( 'Projects', 'asterion' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_counters_title_4',
    array(
        'label'         => esc_html__( 'Forth Counter Title', 'asterion' ),
        'section'       => $section_id,
        'priority'      => 7,
    )
);

// counter count 2
$wp_customize->add_setting( $prefix .'_counters_count_4',
    array(
        'sanitize_callback' => 'esc_html',
        'default'           => absint( 24 ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_counters_count_4',
    array(
        'label'             => esc_html__( 'Forth Counter Count', 'asterion' ),
        'description'       => esc_html__( 'Add a number to the counter', 'asterion'),
        'section'           => $section_id,
        'priority'          => 8
    )
);



// Background Type
$wp_customize->add_setting( $prefix . '_counters_bg_type', 
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_radio' ),
        'default'           => 1,
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_control( $prefix . '_counters_bg_type', 
    array(
        'label'     => esc_html__( 'Background Type', 'asterion' ),
        'section'   => $section_id,
        'settings'  => $prefix . '_counters_bg_type',
        'type'      => 'radio',
        'choices'   => array(
                1   => esc_html__( 'Image', 'asterion' ),
                2   => esc_html__( 'Color', 'asterion' )
            ),
        'priority'  => 9
    ) 
);


/* Background Image */
$wp_customize->add_setting( $prefix . '_counters_bg_image', 
    array(
        'sanitize_callback' => 'esc_url_raw',
        'default'           => esc_url_raw( get_template_directory_uri() . '/images/counters-bg.jpg' ),
        'transport'         => 'postMessage'
    ) 
);

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $prefix . '_counters_bg_image', 
    array(
        'label'       => esc_html__( 'Background image', 'asterion' ),
        'section'     => $section_id,
        'settings'    => $prefix . '_counters_bg_image',
        'priority'    => 10,
    ) 
) );


// Parallax effect
$wp_customize->add_setting( $prefix . '_counters_image_parallax',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_checkbox' ),
        'default'           => 1,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_counters_image_parallax',
    array(
        'type'      => 'checkbox',
        'label'     => esc_html__( 'Enable background image parallax effect?', 'asterion' ),
        'section'   => $section_id,
        'priority'  => 11
    )
);

// Image overlay
$wp_customize->add_setting( $prefix . '_counters_image_overlay',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_checkbox' ),
        'default'           => 1,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_counters_image_overlay',
    array(
        'type'      => 'checkbox',
        'label'     => esc_html__( 'Enable background image overlay?', 'asterion' ),
        'section'   => $section_id,
        'priority'  => 12
    )
);



// background color
$wp_customize->add_setting( $prefix . '_counters_bg_color',
    array(
        'sanitize_callback' => 'sanitize_hex_color',
        'default'           => '#ffffff',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_counters_bg_color', 
    array(
        'label'       => esc_html__( 'Background color', 'asterion' ),
        'description' => esc_html__( 'Counters section background color', 'asterion' ),
        'section'     => $section_id,
        'settings'    => $prefix . '_counters_bg_color',
        'priority'    => 13,
    ) 
) );

// text color
$wp_customize->add_setting( $prefix . '_counters_text_color',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_checkbox' ),
        'default'           => 0,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_counters_text_color',
    array(
        'type'      => 'checkbox',
        'label'     => esc_html__( 'Light text?', 'asterion' ),
        'description' => esc_html__( 'Choose text color scheme, light or dark', 'asterion' ),
        'section'   => $section_id,
        'priority'  => 14,
    )
);




<?php
// Set prefix
$prefix = 'asterion';

// Set section id
$section_id = $prefix.'_testimonials_section';

/***********************************************/
/****************** Testimonials  *****************/
/***********************************************/
$wp_customize->add_section( $section_id,
    array(
        'priority'          => 103,
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => esc_html__( 'Testimonials Section', 'asterion' ),
        'description'       => esc_html__( 'Change testimonials section information here.', 'asterion' ),
    )
);



// Show this section
$wp_customize->add_setting( $prefix . '_testimonials_show',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_checkbox' ),
        'default'           => 1,
        //'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_testimonials_show',
    array(
        'type'      => 'checkbox',
        'label'     => esc_html__( 'Show this section?', 'asterion' ),
        'section'   => $section_id,
        'priority'  => 1,
        'active_callback' => array( asterion()->customizer, 'jetpack_testimonials_active_callback' ),
    )
);

// Title
$wp_customize->add_setting( $prefix .'_testimonials_title',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_html' ),
        'default'           => esc_html__( 'Testimonials', 'asterion' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_testimonials_title',
    array(
        'label'         => esc_html__( 'Title', 'asterion' ),
        'description'   => esc_html__( 'Add the title for this section.', 'asterion'),
        'section'       => $section_id,
        'priority'      => 2,
        'active_callback' => array( asterion()->customizer, 'jetpack_testimonials_active_callback' ),
    )
);
$wp_customize->selective_refresh->add_partial( $prefix . '_testimonials_title', 
    array(
        'selector'            => '#testimonials .section-title',
        'container_inclusive' => true,
    ) 
);
// Text
$wp_customize->add_setting( $prefix .'_testimonials_text',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_html' ),
        'default'           => esc_html__( 'Mida sit una namet, cons uectetur adipiscing adon elit.', 'asterion' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_testimonials_text',
    array(
        'label'         => esc_html__( 'Text', 'asterion' ),
        'description'   => esc_html__( 'Add the content for this section.', 'asterion'),
        'section'       => $section_id,
        'priority'      => 3,
        'type'          => 'textarea',
        'active_callback' => array( asterion()->customizer, 'jetpack_testimonials_active_callback' ),
    )
);

// Post count
$wp_customize->add_setting( $prefix .'_testimonials_count',
    array(
        'sanitize_callback' => 'esc_html',
        'default'           => absint( 3 ),
    )
);
$wp_customize->add_control(
    $prefix .'_testimonials_count',
    array(
        'label'             => esc_html__( 'Post Count', 'asterion' ),
        'description'       => esc_html__( 'Add the number of posts to show in this section.', 'asterion'),
        'section'           => $section_id,
        'priority'          => 4,
        'active_callback' => array( asterion()->customizer, 'jetpack_testimonials_active_callback' ),
    )
);

// background color
$wp_customize->add_setting( $prefix . '_testimonials_bg_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'default'           => '#f2f1f7',
    'transport'         => 'postMessage'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_testimonials_bg_color', 
    array(
        'label'       => esc_html__( 'Background color', 'asterion' ),
        'description' => esc_html__( 'Testimonials section background color', 'asterion' ),
        'section'     => $section_id,
        'settings'    => $prefix . '_testimonials_bg_color',
        'priority'    => 5,
        'active_callback' => array( asterion()->customizer, 'jetpack_testimonials_active_callback' ),
    ) 
    )
);

// text color
$wp_customize->add_setting( $prefix . '_testimonials_text_color',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_checkbox' ),
        'default'           => 0,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_testimonials_text_color',
    array(
        'type'      => 'checkbox',
        'label'     => esc_html__( 'Light text?', 'asterion' ),
        'description' => esc_html__( 'Choose text color scheme, light or dark', 'asterion' ),
        'section'   => $section_id,
        'priority'  => 6,
        'active_callback' => array( asterion()->customizer, 'jetpack_testimonials_active_callback' ),
    )
);


//jetpack form installation
$wp_customize->add_setting(
    $prefix .'_jetpack_testimonials_install',
    array(
        'sanitize_callback' => 'esc_html',
        'default'           => ''
    )
);
$wp_customize->add_control(
    new Asterion_Custom_Text(
        $wp_customize, 
        $prefix .'_jetpack_testimonials_install',
        array(
            'label'             => esc_html__( 'Install JetPack', 'asterion' ),
            'description'       => sprintf( '%s %s %s', esc_html__( 'This option requires ', 'asterion' ), '<a href="https://wordpress.org/plugins/jetpack/" title="JetPack" target="_blank">JetPack</a>', esc_html__( ', please install it and enable Custom Post Type: Testimonials to enable this option.', 'asterion' ) ),
            'section'           => $section_id,
            'settings'          => $prefix .'_jetpack_testimonials_install',
            'priority'          => 7,
            'active_callback'   => array( asterion()->customizer, 'jetpack_testimonials_inactive_callback' )
        )
    )
);
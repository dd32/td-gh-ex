<?php
// Set prefix
$prefix = 'asterion';

// Set section id
$section_id = $prefix.'_features_section';

/***********************************************/
/********************* Features  *****************/
/***********************************************/
$wp_customize->add_section( $section_id,
    array(
        'priority'          => 101,
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => esc_html__( 'Features Section', 'asterion' ),
        'description'       => esc_html__( 'Change features section information here.', 'asterion' ),
    )
);



// Show this section
$wp_customize->add_setting( $prefix . '_features_show',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_checkbox' ),
        'default'           => 0,
        //'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_features_show',
    array(
        'type'      => 'checkbox',
        'label'     => esc_html__( 'Show this section?', 'asterion' ),
        'section'   => $section_id,
        'priority'  => 1,
        'active_callback'   => array( asterion()->customizer, 'ot_widgets_active_callback' )
    )
);

// Title
$wp_customize->add_setting( $prefix .'_features_title',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_html' ),
        'default'           => esc_html__( 'Features', 'asterion' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_features_title',
    array(
        'label'         => esc_html__( 'Title', 'asterion' ),
        'description'   => esc_html__( 'Add the title for this section.', 'asterion'),
        'section'       => $section_id,
        'priority'      => 2,
        'active_callback'   => array( asterion()->customizer, 'ot_widgets_active_callback' )
    )
);
$wp_customize->selective_refresh->add_partial( $prefix . '_features_title', 
    array(
        'selector'            => '#features .section-title',
        'container_inclusive' => true,
    ) 
);
// Text
$wp_customize->add_setting( $prefix .'_features_text',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_html' ),
        'default'           => esc_html__( 'A creative agency based on Candy Land, ready to boost your business with some beautifull templates. Orange Themes Agency is one of the best in town see more you will be amazed.', 'asterion' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_features_text',
    array(
        'label'         => esc_html__( 'Text', 'asterion' ),
        'description'   => esc_html__( 'Add the content for this section.', 'asterion'),
        'section'       => $section_id,
        'priority'      => 3,
        'type'          => 'textarea',
        'active_callback'   => array( asterion()->customizer, 'ot_widgets_active_callback' )
    )
);


// background color
$wp_customize->add_setting( $prefix . '_features_bg_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'default'           => '#f7f7f7',
    'transport'         => 'postMessage'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_features_bg_color', array(
    'label'       => esc_html__( 'Background color', 'asterion' ),
    'description' => esc_html__( 'Features section background color', 'asterion' ),
    'section'     => $section_id,
    'settings'    => $prefix . '_features_bg_color',
    'priority'    => 4,
    'active_callback'   => array( asterion()->customizer, 'ot_widgets_active_callback' )
) ) );


// text color
$wp_customize->add_setting( $prefix . '_features_text_color',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_checkbox' ),
        'default'           => 0,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_features_text_color',
    array(
        'type'      => 'checkbox',
        'label'     => esc_html__( 'Light text?', 'asterion' ),
        'description' => esc_html__( 'Choose text color scheme, light or dark', 'asterion' ),
        'section'   => $section_id,
        'priority'  => 5,
        'active_callback'   => array( asterion()->customizer, 'ot_widgets_active_callback' )
    )
);


//ot widgets form installation
$wp_customize->add_setting(
    $prefix .'_ot_widgets_install_2',
    array(
        'sanitize_callback' => 'esc_html',
        'default'           => ''
    )
);
$wp_customize->add_control(
    new Asterion_Custom_Text(
        $wp_customize, 
        $prefix .'_ot_widgets_install_2',
        array(
            'label'             => esc_html__( 'Install Orange Themes Custom Widgets', 'asterion' ),
            'description'       => sprintf( '%s %s %s', esc_html__( 'This option requires ', 'asterion' ), '<a href="https://wordpress.org/plugins/orange-themes-custom-widgets" title="Orange Themes Custom Widgets" target="_blank">Orange Themes Custom Widgets</a>', esc_html__( ', please install it to enable team widgets.', 'asterion' ) ),
            'section'           => $section_id,
            'settings'          => $prefix .'_ot_widgets_install_2',
            'priority'          => 7,
            'active_callback'   => array( asterion()->customizer, 'ot_widgets_inactive_callback' )
        )
    )
);
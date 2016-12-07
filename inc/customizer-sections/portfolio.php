<?php
// Set prefix
$prefix = 'asterion';

// Set section id
$section_id = $prefix.'_portfolio_section';

/***********************************************/
/****************** Portfolio  *****************/
/***********************************************/
$wp_customize->add_section( $section_id,
    array(
        'priority'          => 102,
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => esc_html__( 'Portfolio Section', 'asterion' ),
        'description'       => esc_html__( 'Change portfolio section information here.', 'asterion' ),
    )
);



// Show this section
$wp_customize->add_setting( $prefix . '_portfolio_show',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_checkbox' ),
        'default'           => 1,
        //'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_portfolio_show',
    array(
        'type'      => 'checkbox',
        'label'     => esc_html__( 'Show this section?', 'asterion' ),
        'section'   => $section_id,
        'priority'  => 1,
        'active_callback'   => array( asterion()->customizer, 'jetpack_portfolio_active_callback' )
    )
);

// Title
$wp_customize->add_setting( $prefix .'_portfolio_title',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_html' ),
        'default'           => esc_html__( 'Portfolio', 'asterion' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_portfolio_title',
    array(
        'label'         => esc_html__( 'Title', 'asterion' ),
        'description'   => esc_html__( 'Add the title for this section.', 'asterion'),
        'section'       => $section_id,
        'priority'      => 2,
        'active_callback'   => array( asterion()->customizer, 'jetpack_portfolio_active_callback' )
    )
);
$wp_customize->selective_refresh->add_partial( $prefix . '_portfolio_title', 
    array(
        'selector'            => '#portfolio .section-title',
        'container_inclusive' => true,
    ) 
);
// Text
$wp_customize->add_setting( $prefix .'_portfolio_text',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_html' ),
        'default'           => esc_html__( 'Our portfolio is the best way to show our work, you can see here a big range of our work. Check them all and you will find what you are looking for.', 'asterion' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_portfolio_text',
    array(
        'label'         => esc_html__( 'Text', 'asterion' ),
        'description'   => esc_html__( 'Add the content for this section.', 'asterion'),
        'section'       => $section_id,
        'priority'      => 3,
        'type'          => 'textarea',
        'active_callback'   => array( asterion()->customizer, 'jetpack_portfolio_active_callback' )
    )
);

// Post count
$wp_customize->add_setting( $prefix .'_portfolio_count',
    array(
        'sanitize_callback' => 'esc_html',
        'default'           => absint( 6 ),
    )
);
$wp_customize->add_control(
    $prefix .'_portfolio_count',
    array(
        'label'             => esc_html__( 'Post Count', 'asterion' ),
        'description'       => esc_html__( 'Add the number of posts to show in this section.', 'asterion'),
        'section'           => $section_id,
        'priority'          => 4,
        'active_callback'   => array( asterion()->customizer, 'jetpack_portfolio_active_callback' )
    )
);


//image hover effect
$wp_customize->add_setting( $prefix .'_portfolio_image_hover_effect',
    array(
        'sanitize_callback' => 'esc_attr',
        'default'           => 'bubba',
        'transport'         => 'postMessage'
    )
);

$wp_customize->add_control(
    $prefix .'_portfolio_image_hover_effect',
    array(
        'label'         => esc_html__( 'Image hover effect', 'asterion' ),
        'type'          => 'select',
        'section'       => $section_id,
        'priority'      => 4,
        'choices'       => array(
            'bubba'     => esc_html__( 'Bubba', 'asterion' ),
            'apollo'    => esc_html__( 'Apollo', 'asterion' ),
            'milo'      => esc_html__( 'Milo', 'asterion' ),
            'jazz'      => esc_html__( 'Jazz', 'asterion' ),
            'goliath'   => esc_html__( 'Goliath', 'asterion' ),
        )
    )
);

// hover background color
$wp_customize->add_setting( $prefix . '_portfolio_image_overlay_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'default'           => '#1a1a1a',
    'transport'         => 'postMessage'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_portfolio_image_overlay_color', 
    array(
        'label'       => esc_html__( 'Image overlay', 'asterion' ),
        'section'     => $section_id,
        'settings'    => $prefix . '_portfolio_image_overlay_color',
        'priority'    => 5,
    ) 
) );

// background color
$wp_customize->add_setting( $prefix . '_portfolio_bg_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'default'           => '#ffffff',
    'transport'         => 'postMessage'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_portfolio_bg_color', 
    array(
        'label'       => esc_html__( 'Background color', 'asterion' ),
        'description' => esc_html__( 'Portfolio section background color', 'asterion' ),
        'section'     => $section_id,
        'settings'    => $prefix . '_portfolio_bg_color',
        'priority'    => 5,
        'active_callback'   => array( asterion()->customizer, 'jetpack_portfolio_active_callback' )
    ) 
) );

// text color
$wp_customize->add_setting( $prefix . '_portfolio_text_color',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_checkbox' ),
        'default'           => 0,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_portfolio_text_color',
    array(
        'type'      => 'checkbox',
        'label'     => esc_html__( 'Light text?', 'asterion' ),
        'description' => esc_html__( 'Choose text color scheme, light or dark', 'asterion' ),
        'section'   => $section_id,
        'priority'  => 6,
        'active_callback'   => array( asterion()->customizer, 'jetpack_portfolio_active_callback' )
    )
);



//jetpack form installation
$wp_customize->add_setting(
    $prefix .'_jetpack_portfolio_install',
    array(
        'sanitize_callback' => 'esc_html',
        'default'           => ''
    )
);
$wp_customize->add_control(
    new Asterion_Custom_Text(
        $wp_customize, 
        $prefix .'_jetpack_portfolio_install',
        array(
            'label'             => esc_html__( 'Install JetPack', 'asterion' ),
            'description'       => sprintf( '%s %s %s', esc_html__( 'This option requires ', 'asterion' ), '<a href="https://wordpress.org/plugins/jetpack/" title="JetPack" target="_blank">JetPack</a>', esc_html__( ', please install it and enable Custom Post Type: Portfolio to enable this option.', 'asterion' ) ),
            'section'           => $section_id,
            'settings'          => $prefix .'_jetpack_portfolio_install',
            'priority'          => 7,
            'active_callback'   => array( asterion()->customizer, 'jetpack_portfolio_inactive_callback' )
        )
    )
);
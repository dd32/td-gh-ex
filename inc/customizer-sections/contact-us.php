<?php
// Set prefix
$prefix = 'asterion';

// Set section id
$panel_id = $prefix.'_contact_section';
$section_id = $prefix.'_contact_section_general';
$section_id_2 = $prefix.'_contact_section_details';

/***********************************************/
/********************* Contact  *****************/
/***********************************************/

$wp_customize->add_panel( $panel_id,
    array(
        'priority'          => 105,
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => esc_html__( 'Contact us', 'asterion' ),
        'description'       => esc_html__( 'Change about section information here.', 'asterion' ),
    )
);

/***********************************************/
/********************* GENERAL  *****************/
/***********************************************/

$wp_customize->add_section( $section_id,
    array(
        'priority'          => 105,
        'theme_supports'    => '',
        'title'             => esc_html__( 'General Data', 'asterion' ),
        'description'       => esc_html__( 'Change contact section information here.', 'asterion' ),
        'panel'             => $panel_id
    )
);



// Show this section
$wp_customize->add_setting( $prefix . '_contact_us_show',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_checkbox' ),
        'default'           => 0,
        //'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_contact_show',
    array(
        'type'      => 'checkbox',
        'label'     => esc_html__( 'Show this section?', 'asterion' ),
        'section'   => $section_id,
        'priority'  => 1
    )
);

// Title
$wp_customize->add_setting( $prefix .'_contact_title',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_html' ),
        'default'           => esc_html__( 'Contact Us', 'asterion' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_contact_title',
    array(
        'label'         => esc_html__( 'Title', 'asterion' ),
        'description'   => esc_html__( 'Add the title for this section.', 'asterion'),
        'section'       => $section_id,
        'priority'      => 2
    )
);
$wp_customize->selective_refresh->add_partial( $prefix . '_contact_title', 
    array(
        'selector'            => '#contact .section-title',
        'container_inclusive' => true,
    ) 
);
// Text
$wp_customize->add_setting( $prefix .'_contact_text',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_html' ),
        'default'           => esc_html__( 'If you have some Questions or need Help! Please Contact Us! We make Cool and Clean Design for your Business', 'asterion' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_contact_text',
    array(
        'label'         => esc_html__( 'Text', 'asterion' ),
        'description'   => esc_html__( 'Add the content for this section.', 'asterion'),
        'section'       => $section_id,
        'priority'      => 3,
        'type'          => 'textarea'
    )
);

// background color
$wp_customize->add_setting( $prefix . '_contact_bg_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'default'           => '#ffffff',
    'transport'         => 'postMessage'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_contact_bg_color', array(
    'label'       => esc_html__( 'Background color', 'asterion' ),
    'description' => esc_html__( 'Contact section background color', 'asterion' ),
    'section'     => $section_id,
    'settings'    => $prefix . '_contact_bg_color',
    'priority'    => 4,
) ) );


// text color
$wp_customize->add_setting( $prefix . '_contact_text_color',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_checkbox' ),
        'default'           => 0,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_contact_text_color',
    array(
        'type'      => 'checkbox',
        'label'     => esc_html__( 'Light text?', 'asterion' ),
        'description' => esc_html__( 'Choose text color scheme, light or dark', 'asterion' ),
        'section'   => $section_id,
        'priority'  => 5
    )
);

/***********************************************/
/**************** CONTACT DETAILS  *************/
/***********************************************/

$wp_customize->add_section( $section_id_2,
    array(
        'priority'          => 105,
        'theme_supports'    => '',
        'title'             => esc_html__( 'Contact Details', 'asterion' ),
        'description'       => esc_html__( 'Change contact section information here.', 'asterion' ),
        'panel'             => $panel_id
    )
);


// Address title
$wp_customize->add_setting( $prefix .'_contact_address_title',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_html' ),
        'default'           => esc_html__( 'Our Business Office', 'asterion' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_contact_address_title',
    array(
        'label'         => esc_html__( 'Title', 'asterion' ),
        'description'   => esc_html__( 'Add the title for this section.', 'asterion'),
        'section'       => $section_id_2,
        'priority'      => 2
    )
);
$wp_customize->selective_refresh->add_partial( $prefix . '_contact_address_title', 
    array(
        'selector'            => '#contact .address-details',
        'container_inclusive' => true,
    ) 
);
// Address
$wp_customize->add_setting( $prefix .'_contact_address',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_html' ),
        'default'           => esc_html__( '34522 Street, Barcelona 442 &#13;&#10;Spain, New Building North, 25th Floor', 'asterion' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_contact_address',
    array(
        'label'         => esc_html__( 'Address', 'asterion' ),
        'description'   => esc_html__( 'Add the content for this section.', 'asterion'),
        'section'       => $section_id_2,
        'priority'      => 3,
        'type'          => 'textarea'
    )
);



// Contact info itle
$wp_customize->add_setting( $prefix .'_contact_info_title',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_html' ),
        'default'           => esc_html__( 'Contacts', 'asterion' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_contact_info_title',
    array(
        'label'         => esc_html__( 'Title', 'asterion' ),
        'description'   => esc_html__( 'Add the title for this section.', 'asterion'),
        'section'       => $section_id_2,
        'priority'      => 4
    )
);

// Contact info phone
$wp_customize->add_setting( $prefix .'_contact_info_phone',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_html' ),
        'default'           => esc_html__( '+101 377 655 22127', 'asterion' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_contact_info_phone',
    array(
        'label'         => esc_html__( 'Phone', 'asterion' ),
        'description'   => esc_html__( 'Add a phone number.', 'asterion'),
        'section'       => $section_id_2,
        'priority'      => 5
    )
);

// Contact info email
$wp_customize->add_setting( $prefix .'_contact_info_email',
    array(
        'sanitize_callback' => array( asterion()->customizer, 'sanitize_html' ),
        'default'           => esc_html__( 'mail@yourcompany.com', 'asterion' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_contact_info_email',
    array(
        'label'         => esc_html__( 'Email', 'asterion' ),
        'description'   => esc_html__( 'Add a email address.', 'asterion'),
        'section'       => $section_id_2,
        'priority'      => 6
    )
);


//contact Form 7
$wp_customize->add_setting( $prefix .'_contact_from',
    array(
        'sanitize_callback' => 'sanitize_key'
    )
);
$wp_customize->add_control( new Asterion_Custom_WPCF7(
    $wp_customize,
    $prefix .'_contact_from',
        array(
            'type'              => 'asterion_contact_form_7',
            'label'             => esc_html__( 'Select a contact form to display it in the contact section', 'asterion' ),
            'section'           => $section_id_2,
            'priority'          => 7,
            'active_callback'   => array( asterion()->customizer, 'cf7_active_callback' )
        )
    )
);

//contact form installation
$wp_customize->add_setting(
    $prefix .'_contact_from_install',
    array(
        'sanitize_callback' => 'esc_html',
        'default'           => ''
    )
);
$wp_customize->add_control(
    new Asterion_Custom_Text(
        $wp_customize, 
        $prefix .'_contact_from_install',
        array(
            'label'             => esc_html__( 'Install Contact From 7', 'asterion' ),
            'description'       => sprintf( '%s %s %s', esc_html__( 'This option requires ', 'asterion' ), '<a href="https://wordpress.org/plugins/contact-form-7/" title="Contact Form 7" target="_blank">Contact Form 7</a>', esc_html__( ', please install it to enable this option.', 'asterion' ) ),
            'section'           => $section_id_2,
            'settings'          => $prefix .'_contact_from_install',
            'priority'          => 7,
            'active_callback'   => array( asterion()->customizer, 'cf7_inactive_callback' )
        )
    )
);

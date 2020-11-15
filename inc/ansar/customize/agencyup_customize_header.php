<?php
function agencyup_header_setting( $wp_customize ) {

	/* Header Section */
	$wp_customize->add_panel( 'header_options', array(
		'priority' => 2,
		'capability' => 'edit_theme_options',
		'title' => __('Header Settings', 'agencyup'),
	) );

    $wp_customize->add_section(
        'title_tagline',
        array(
            'priority'      => 1,
            'title'         => __('Site Identity','agencyup'),
            'panel'         => 'header_options',
        )
    );

	$wp_customize->add_section( 'header_contact' , array(
		'title' => __('Contact Setting', 'agencyup'),
		'panel' => 'header_options',
		'priority' => 10,
   	) );

    //Enable and disable header contact info
    $wp_customize->add_setting(
    'header_contact_info_enable',
    array(
        'capability'     => 'edit_theme_options',
        'default' => '1',
        'sanitize_callback' => 'agencyup_header_sanitize_checkbox',
    )   
    );
    $wp_customize->add_control(
    'header_contact_info_enable',
    array(
        'label' => __('Hide / Show','agencyup'),
        'section' => 'header_contact',
        'type' => 'checkbox',
    )
    );

    $wp_customize->add_setting(
        'agencyup_head_info_icon_one', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'agencyup_head_info_icon_one', array(
        'label' => __('Icon', 'agencyup'),
        'section' => 'header_contact',
        'type' => 'text',
    ) );
	
	$wp_customize->add_setting(
		'agencyup_head_info_icon_one_text', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'agencyup_sanitize_text_content',
    ) );
    $wp_customize->add_control( 'agencyup_head_info_icon_one_text', array(
        'label' => __('Text', 'agencyup'),
        'section' => 'header_contact',
        'type' => 'text',
    ) );
	

    $wp_customize->add_setting(
        'agencyup_head_info_icon_two', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'agencyup_head_info_icon_two', array(
        'label' => __('Icon', 'agencyup'),
        'section' => 'header_contact',
        'type' => 'text',
    ) );
	
	$wp_customize->add_setting(
		'agencyup_head_info_icon_two_text', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'agencyup_sanitize_text_content',
    ) );
    $wp_customize->add_control( 'agencyup_head_info_icon_two_text', array(
        'label' => __('Text', 'agencyup'),
        'section' => 'header_contact',
        'type' => 'text',
    ) );

	 $wp_customize->add_section('header_social_icon', array(
        'title' => __('Social Icon','agencyup'),
        'priority' => 20,
        'panel' => 'header_options',
    ) );
	
	
	//Enable and disable social icon
	$wp_customize->add_setting(
	'header_social_icon_enable'
    ,
    array(
		'capability'     => 'edit_theme_options',
        'default' => '1',
		'sanitize_callback' => 'agencyup_header_sanitize_checkbox',
    )	
	);
	$wp_customize->add_control(
    'header_social_icon_enable',
    array(
        'label' => __('Hide / Show','agencyup'),
        'section' => 'header_social_icon',
        'type' => 'checkbox',
    )
	);

	// Soical facebook link
	$wp_customize->add_setting(
    'agencyup_header_fb_link',
    array(
		'sanitize_callback' => 'esc_url_raw',
    )
	
	);
	$wp_customize->add_control(
    'agencyup_header_fb_link',
    array(
        'label' => __('Facebook URL','agencyup'),
        'section' => 'header_social_icon',
        'type' => 'url',
    )
	);

	$wp_customize->add_setting(
	'agencyup_header_fb_target',array(
	'sanitize_callback' => 'agencyup_header_sanitize_checkbox',
	'default' => 1,
	));

	$wp_customize->add_control(
    'agencyup_header_fb_target',
    array(
        'type' => 'checkbox',
        'label' => __('Open link in a new tab','agencyup'),
        'section' => 'header_social_icon',
    )
	);
	
	
	//Social Twitter link
	$wp_customize->add_setting(
    'agencyup_header_twt_link',
    array(
		'sanitize_callback' => 'esc_url_raw',
    )
	
	);
	$wp_customize->add_control(
    'agencyup_header_twt_link',
    array(
        'label' => __('Twitter URL','agencyup'),
        'section' => 'header_social_icon',
        'type' => 'url',
    )
	);

	$wp_customize->add_setting(
	'agencyup_header_twt_target',array(
	'sanitize_callback' => 'agencyup_header_sanitize_checkbox',
	'default' => 1,
	));

	$wp_customize->add_control(
    'agencyup_header_twt_target',
    array(
        'type' => 'checkbox',
        'label' => __('Open link in a new tab','agencyup'),
        'section' => 'header_social_icon',
    )
	);
	
	//Soical Linkedin link
	$wp_customize->add_setting(
    'agencyup_header_lnkd_link',
    array(
		'sanitize_callback' => 'esc_url_raw',
    )
	
	);
	$wp_customize->add_control(
    'agencyup_header_lnkd_link',
    array(
        'label' => __('Linkedin URL','agencyup'),
        'section' => 'header_social_icon',
        'type' => 'url',
    )
	);

	$wp_customize->add_setting(
	'agencyup_twitter_lnkd_target',array(
	'default' => 1,
	'sanitize_callback' => 'agencyup_header_sanitize_checkbox',
	));

	$wp_customize->add_control(
    'agencyup_twitter_lnkd_target',
    array(
        'type' => 'checkbox',
        'label' => __('Open link in a new tab','agencyup'),
        'section' => 'header_social_icon',
    )
	);
	
	
	//Soical Instagram link
	$wp_customize->add_setting(
    'agencyup_header_insta_link',
    array(
        'sanitize_callback' => 'esc_url_raw',
    )
	
	);
	$wp_customize->add_control(
    'agencyup_header_insta_link',
    array(
        'label' => __('Instagram URL','agencyup'),
        'section' => 'header_social_icon',
        'type' => 'url',
    )
	);

	$wp_customize->add_setting(
	'agencyup_insta_lnkd_target',array(
	'default' => 1,
	'sanitize_callback' => 'agencyup_header_sanitize_checkbox',
	));

	$wp_customize->add_control(
    'agencyup_insta_lnkd_target',
    array(
        'type' => 'checkbox',
        'label' => __('Open link in a new tab','agencyup'),
        'section' => 'header_social_icon',
    )
	);

    $wp_customize->add_section(
        'nav_btn_section',
        array(
            'priority'      => 30,
            'title'         => __('Menu Button','agencyup'),
            'panel'         => 'header_options',
        )
    );


    $wp_customize->add_setting( 
        'hide_show_nav_menu_btn' , 
            array(
            'default' => '1',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'agencyup_header_sanitize_checkbox',
        ) 
    );
    
    $wp_customize->add_control(
    'hide_show_nav_menu_btn', 
        array(
            'label'       => esc_html__( 'Hide/Show', 'agencyup' ),
            'section'     => 'nav_btn_section',
            'type'        => 'checkbox'
        ) 
    ); 
     
    $wp_customize->add_setting(
        'menu_btn_label',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'capability' => 'edit_theme_options',
        )
    );  

    $wp_customize->add_control( 
        'menu_btn_label',
        array(
            'label'         => __('Button Text','agencyup'),
            'section'       => 'nav_btn_section',
            'type'       => 'text'
        )  
    );
    
    $wp_customize->add_setting(
        'menu_btn_link',
        array(
            'sanitize_callback' => 'esc_url_raw',
            'capability' => 'edit_theme_options',
        )
    );  

    $wp_customize->add_control( 
        'menu_btn_link',
        array(
            'label'         => __('Button Link','agencyup'),
            'section'       => 'nav_btn_section',
            'type'       => 'text',
        )  
    );
    

    $wp_customize->add_setting( 
        'menu_btn_target' , 
            array(
            'default' => '1',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'agencyup_header_sanitize_checkbox',
        ) 
    );
    
    $wp_customize->add_control(
    'menu_btn_target', 
        array(
            'label'       => esc_html__( 'Open link in new tab', 'agencyup' ),
            'section'     => 'nav_btn_section',
            'type'        => 'checkbox'
        ) 
    ); 
	
	

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh'; 

    if ( isset( $wp_customize->selective_refresh ) ) {
        
        // site title
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title',
                'render_callback' => array( 'agencyup_Customizer_Partials', 'customize_partial_blogname' ),
            )
        );

        // site tagline
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector'        => '.site-description',
                'render_callback' => array( 'agencyup_Customizer_Partials', 'customize_partial_blogdescription' ),
            )
        );
    }

	
	function agencyup_header_info_sanitize_text( $input ) {

    return wp_kses_post( force_balance_tags( $input ) );

    }


   
	
	if ( ! function_exists( 'agencyup_sanitize_text_content' ) ) :

	/**
	 * Sanitize text content.
	 *
	 * @since 1.0.0
	 *
	 * @param string               $input Content to be sanitized.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return string Sanitized content.
	 */
	function agencyup_sanitize_text_content( $input, $setting ) {

		return ( stripslashes( wp_filter_post_kses( addslashes( $input ) ) ) );

	}
endif;
	
	function agencyup_header_sanitize_checkbox( $input ) {
			// Boolean check 
	return ( ( isset( $input ) && true == $input ) ? true : false );
	
	}
	}
	add_action( 'customize_register', 'agencyup_header_setting' );

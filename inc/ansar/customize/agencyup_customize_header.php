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

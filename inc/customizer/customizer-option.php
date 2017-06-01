<?php
/** Customizer Options **/
if( ! function_exists( 'beetech_customizer_option_register' ) ):
	function beetech_customizer_option_register( $wp_customize ) {

    	$wp_customize->get_section( 'title_tagline' )->panel = 'beetech_general_settings_panel';
    	$wp_customize->get_section( 'background_image' )->panel = 'beetech_general_settings_panel';
    	$wp_customize->get_section( 'colors' )->panel = 'beetech_general_settings_panel';
        $wp_customize->get_section( 'static_front_page' )->panel = 'beetech_general_settings_panel';
    
    	/** General Pannel */
    	$wp_customize->add_panel(
            'beetech_general_settings_panel', 
            	array(
            		'priority'       => 5,
                	'capability'     => 'edit_theme_options',
                	'theme_supports' => '',
                	'title'          => esc_html__( 'General Settings', 'beetech' ),
                ) 
        );
        
        /** Header Pannel Options **/
        $wp_customize->get_section( 'header_image' )->panel = 'beetech_header_settings_panel';
		$wp_customize->get_section( 'header_image' )->title = esc_html__( 'Single Page Banner Image', 'beetech' );

    	global $beetech_single_menu_fields;

		$wp_customize->add_panel(
	        'beetech_header_settings_panel', 
	        	array(
	        		'priority'       => 10,
	            	'capability'     => 'edit_theme_options',
	            	'theme_supports' => '',
	            	'title'          => esc_html__( 'Header Settings', 'beetech' ),
	            ) 
	    );

		$wp_customize->add_section(
	        'menu_settings_section',
	        array(
	            'title'		=> esc_html__( 'Menu Settings', 'beetech' ),
	            'panel'     => 'beetech_header_settings_panel',
	            'priority'  => 15,
	        )
	    );

	    $wp_customize->add_setting(
	        'primary_menu_type',
	        array(
	            'default' => 'default',
	            'sanitize_callback' => 'beetech_sanitize_menu_switch_option',
	            )
	    );
	    $wp_customize->add_control( new beetech_Customize_Switch_Control(
	        $wp_customize, 
	            'primary_menu_type', 
	            array(
	                'type' 		=> 'switch',
	                'label' 	=> esc_html__( 'Primary Menu Type', 'beetech' ),
	                'description' 	=> esc_html__( 'Enable Parallax Menu', 'beetech' ),
	                'section' 	=> 'menu_settings_section',
	                'choices'   => array(
	                    'parallax' 	=> esc_html__( 'Parallax', 'beetech' ),
	                    'default' 	=> esc_html__( 'Default', 'beetech' )
	                    ),
	                'priority'  => 3,
	            )
	        )
	    );

	    $count = 10;
	    foreach ( $beetech_single_menu_fields as $menu_key => $section_value ) {
	    	$wp_customize->add_setting(
		        $menu_key.'_menu_title',
		            array(
		                'default' => $section_value['default'],
		                'sanitize_callback' => 'sanitize_text_field',
			       )
		    );    
		    $wp_customize->add_control(
		        $menu_key.'_menu_title',
		            array(
		            'type' => 'text',
		            'label' => $section_value['label'],
		            'section' => 'menu_settings_section',
		            'priority' => $count,
		            'active_callback' => 'beetech_primary_menu_type_callback'
		            )
		    );
		    $count++;
	    }

	    $wp_customize->add_setting(
	        'primary_menu_search_option',
	        array(
	            'default' => 'hide',	            
	            'sanitize_callback' => 'beetech_sanitize_switch_option',
	            )
	    );
	    $wp_customize->add_control( new beetech_Customize_Switch_Control(
	        $wp_customize, 
	            'primary_menu_search_option', 
	            array(
	                'type' 		=> 'switch',
	                'label' 	=> esc_html__( 'Search Icon', 'beetech' ),
	                'description' 	=> esc_html__( 'Enable Disable Menu search', 'beetech' ),
	                'section' 	=> 'menu_settings_section',
	                'choices'   => array(
	                    'show' 	=> esc_html__( 'Show', 'beetech' ),
	                    'hide' 	=> esc_html__( 'Hide', 'beetech' )
	                    ),
	                'priority'  => 5,
	            )
	        )
	    );

	    $wp_customize->add_setting(
	        'sticky_header_option',
	        array(
	            'default' => 'enable',
	            'sanitize_callback' => 'beetech_sanitize_enable_switch_option',
	            )
	    );
	    $wp_customize->add_control( new beetech_Customize_Switch_Control(
	        $wp_customize, 
	            'sticky_header_option', 
	            array(
	                'type' 		=> 'switch',
	                'label' 	=> esc_html__( 'Header Sticky', 'beetech' ),
	                'description' 	=> esc_html__( 'Enable Disable Stickey Menu.', 'beetech' ),
	                'section' 	=> 'menu_settings_section',
	                'choices'   => array(
	                    'enable' 	=> esc_html__( 'Enable', 'beetech' ),
	                    'disable' 	=> esc_html__( 'Disable', 'beetech' )
	                    ),
	                'priority'  => 5,
	            )
	        )
	    );
        
        /** Home Options **/
        /** Home Customizer Pannel */
		$wp_customize->add_panel(
	        'beetech_homepage_settings_panel', 
	        	array(
	        		'priority'       => 15,
	            	'capability'     => 'edit_theme_options',
	            	'theme_supports' => '',
	            	'title'          => esc_html__( 'HomePage Settings', 'beetech' ),
	            ) 
	    );
        
        
		/** Slider Section */
		$wp_customize->add_section(
	        'beetech_slider_section',
		        array(
		            'title'		=> esc_html__( 'Slider Section', 'beetech' ),
		            'panel'     => 'beetech_homepage_settings_panel',
		            'priority'  => 5,
		        )
	    );

	    $wp_customize->add_setting(
	        'homepage_slider_option',
		        array(
		            'default' => 'hide',
		            'sanitize_callback' => 'beetech_sanitize_switch_option',
		        )
	    );
	    $wp_customize->add_control( new beetech_Customize_Switch_Control(
	        $wp_customize, 
            'homepage_slider_option', 
	            array(
	                'type' 		=> 'switch',	                
	                'label' 	=> esc_html__( 'Slider Option', 'beetech' ),
	                'description' 	=> esc_html__( 'Show/hide option for homepage Slider Section.', 'beetech' ),
	                'section' 	=> 'beetech_slider_section',
	                'choices'   => array(
	                    'show' 	=> esc_html__( 'Show', 'beetech' ),
	                    'hide' 	=> esc_html__( 'Hide', 'beetech' )
	                    ),
	                'priority'  => 5,
	            )
	        )
	    );

	    
	    $wp_customize->add_setting(
	        'slider_cat_id',
		        array(
		            'default' => '0',
		            'capability' => 'edit_theme_options',
		            'sanitize_callback' => 'absint'
		        )
	    );
	    $wp_customize->add_control( new beetech_Customize_Category_Control(
	        $wp_customize,
	        'slider_cat_id', 
		        array(
		            'label' => esc_html__( 'Slider Category', 'beetech' ),
		            'description' => esc_html__( 'Select cateogry for Homepage Slider Section', 'beetech' ),
		            'section' => 'beetech_slider_section',
		            'priority' => 10
		        )
		    )
	    );

		/** Service Section */
		$wp_customize->add_section(
	        'beetech_service_section',
		        array(
		            'title'		=> esc_html__( 'Service Section', 'beetech' ),
		            'panel'     => 'beetech_homepage_settings_panel',
		            'priority'  => 10,
		        )
	    );

	    $wp_customize->add_setting(
	        'homepage_service_option',
		        array(
		            'default' => 'hide',
		            'sanitize_callback' => 'beetech_sanitize_switch_option',
		        )
	    );
	    $wp_customize->add_control( new beetech_Customize_Switch_Control(
	        $wp_customize, 
	            'homepage_service_option', 
	            array(
	                'type' 		=> 'switch',	                
	                'label' 	=> esc_html__( 'Section Option', 'beetech' ),
	                'description' 	=> esc_html__( 'Show/hide option for Homepage Service Section.', 'beetech' ),
	                'section' 	=> 'beetech_service_section',
	                'choices'   => array(
	                    'show' 	=> esc_html__( 'Show', 'beetech' ),
	                    'hide' 	=> esc_html__( 'Hide', 'beetech' )
	                    ),
	                'priority'  => 5,
	            )
	        )
	    );

	    $wp_customize->add_setting(
	        'service_section_title', 
	            array(
	                'default' => '',
	                'sanitize_callback' => 'sanitize_text_field',
	                'transport' => 'postMessage'
		       	)
	    );
	    $wp_customize->add_control(
	        'service_section_title',
	            array(
		            'type' => 'text',
		            'label' => esc_html__( 'Section Title', 'beetech' ),
		            'section' => 'beetech_service_section',
		            'priority' => 10
	            )
	    );

	    $wp_customize->add_setting(
	        'service_section_sub_title', 
	            array(
	                'default' => '',
	                'sanitize_callback' => 'sanitize_text_field',
	                'transport' => 'postMessage'
		       	)
	    );
	    $wp_customize->add_control(
	        'service_section_sub_title',
	            array(
		            'type' => 'text',
		            'label' => esc_html__( 'Section Description', 'beetech' ),
		            'section' => 'beetech_service_section',
		            'priority' => 15
	            )
	    );

        $service_priority = 30;
        $beetech_default_service_icon = array( 'fa-flag', 'fa-database', 'fa-codepen');
        $beetech_separator_label = array( 'First', 'Second', 'Third');
        
        foreach ( $beetech_default_service_icon as $icon_key => $icon_value ) {    	
		
    	    
    	    $wp_customize->add_setting(
    	        'service_icon_sec_separator_'.$icon_key,
    		        array(
    		            'default' => '',
    		            'sanitize_callback' => 'sanitize_text_field',
    		        )
    	    );
    	    $wp_customize->add_control( new beetech_Customize_Section_Separator(
    	        $wp_customize, 
    	            'service_icon_sec_separator_'.$icon_key, 
    	            array(
    	                'type' 		=> 'beetech_separator',
    	                'label' 	=> sprintf(esc_html__( '%s Service', 'beetech' ), $beetech_separator_label[$icon_key] ),
    	                'section' 	=> 'beetech_service_section',
    	                'priority'  => $service_priority,
    	            )	            	
    	        )
    	    );
    
    	    
    	    $wp_customize->add_setting(
    	        'service_icon_'.$icon_key,
    		        array(
    		            'default' => $icon_value,
    		            'sanitize_callback' => 'sanitize_text_field',
    		        )
    	    );
    	    $wp_customize->add_control( new beetech_Customize_Icons_Control(
    	        $wp_customize, 
    	        'service_icon_'.$icon_key, 
    	            array(
    	                'type' 		=> 'beetech_icons',	                
    	                'label' 	=> esc_html__( 'Service Icon', 'beetech' ),
    	                'description' 	=> esc_html__( 'Choose the icon from lists.', 'beetech' ),
    	                'section' 	=> 'beetech_service_section',
    	                'priority'  => $service_priority,
    	            )	            	
    	        )
    	    );
    
    	    
    	    $wp_customize->add_setting(
    	        'service_page_id_'.$icon_key,
    		        array(
    		            'default' => '0',
    		            'capability' => 'edit_theme_options',
    		            'sanitize_callback' => 'absint'
    		        )
    	    );
    	    $wp_customize->add_control(
    	        'service_page_id_'.$icon_key,
    		        array(
    		        	'type' => 'dropdown-pages',
    		            'label' => esc_html__( 'Service Page', 'beetech' ),
    		            'description' => esc_html__( 'Select page for Homepage Service Section', 'beetech' ),
    		            'section' => 'beetech_service_section',
    		            'priority' => $service_priority
    		        )
    	    );
    	    $service_priority = $service_priority+5;
	   }

/*--------------------------------------------------------------------------------------------------------------*/
		/** Team Section */
		$wp_customize->add_section(
	        'beetech_team_section',
		        array(
		            'title'		=> esc_html__( 'Our Team Section', 'beetech' ),
		            'panel'     => 'beetech_homepage_settings_panel',
		            'priority'  => 15,
		        )
	    );

	    $wp_customize->add_setting(
	        'homepage_team_option',
		        array(
		            'default' => 'hide',
		            'sanitize_callback' => 'beetech_sanitize_switch_option',
		        )
	    );
	    $wp_customize->add_control( new beetech_Customize_Switch_Control(
	        $wp_customize, 
	            'homepage_team_option', 
	            array(
	                'type' 		=> 'switch',	                
	                'label' 	=> esc_html__( 'Section Option', 'beetech' ),
	                'description' 	=> esc_html__( 'Show/hide option for Homepage Our Team Section.', 'beetech' ),
	                'section' 	=> 'beetech_team_section',
	                'choices'   => array(
	                    'show' 	=> esc_html__( 'Show', 'beetech' ),
	                    'hide' 	=> esc_html__( 'Hide', 'beetech' )
	                    ),
	                'priority'  => 5,
	            )
	        )
	    );

	    $wp_customize->add_setting(
	        'team_section_title', 
	            array(
	                'default' => '',
	                'sanitize_callback' => 'sanitize_text_field',
	                'transport' => 'postMessage'
		       	)
	    );
	    $wp_customize->add_control(
	        'team_section_title',
	            array(
		            'type' => 'text',
		            'label' => esc_html__( 'Section Title', 'beetech' ),
		            'section' => 'beetech_team_section',
		            'priority' => 10
	            )
	    );

	    
	    $wp_customize->add_setting(
	        'team_section_description', 
	            array(
	                'default' => '',
	                'sanitize_callback' => 'sanitize_text_field',
	                'transport' => 'postMessage'
		       	)
	    );    
	    $wp_customize->add_control(
	        'team_section_description',
	            array(
		            'type' => 'text',
		            'label' => esc_html__( 'Section Description', 'beetech' ),
		            'section' => 'beetech_team_section',
		            'priority' => 20
	            )
	    );

	    $wp_customize->add_setting(
	        'team_cat_id',
		        array(
		            'default' => '0',
		            'capability' => 'edit_theme_options',
		            'sanitize_callback' => 'absint'
		        )
	    );
	    $wp_customize->add_control( new beetech_Customize_Category_Control(
	        $wp_customize,
	        'team_cat_id', 
		        array(
		            'label' => esc_html__( 'Section Category', 'beetech' ),
		            'description' => esc_html__( 'Select cateogry for Homepage Our Team Section', 'beetech' ),
		            'section' => 'beetech_team_section',
		            'priority' => 25
		        )
		    )
	    );
        
        
        /** About Section */
		$wp_customize->add_section(
	        'beetech_about_section',
		        array(
		            'title'		=> esc_html__( 'Our About Section', 'beetech' ),
		            'panel'     => 'beetech_homepage_settings_panel',
		            'priority'  => 20,
		        )
	    );

	    $wp_customize->add_setting(
	        'homepage_about_option',
		        array(
		            'default' => 'hide',
		            'sanitize_callback' => 'beetech_sanitize_switch_option',
		        )
	    );
	    $wp_customize->add_control( new beetech_Customize_Switch_Control(
	        $wp_customize, 
	            'homepage_about_option', 
	            array(
	                'type' 		=> 'switch',	                
	                'label' 	=> esc_html__( 'Section Option', 'beetech' ),
	                'description' 	=> esc_html__( 'Show/hide option for Homepage Our About Section.', 'beetech' ),
	                'section' 	=> 'beetech_about_section',
	                'choices'   => array(
	                    'show' 	=> esc_html__( 'Show', 'beetech' ),
	                    'hide' 	=> esc_html__( 'Hide', 'beetech' )
	                    ),
	                'priority'  => 5,
	            )
	        )
	    );

	    $wp_customize->add_setting(
	        'about_section_title', 
	            array(
	                'default' => '',
	                'sanitize_callback' => 'sanitize_text_field',
	                'transport' => 'postMessage'
		       	)
	    );
	    $wp_customize->add_control(
	        'about_section_title',
	            array(
		            'type' => 'text',
		            'label' => esc_html__( 'Section Title', 'beetech' ),
		            'section' => 'beetech_about_section',
		            'priority' => 10
	            )
	    );

	    $wp_customize->add_setting(
	        'about_section_description', 
	            array(
	                'default' => '',
	                'sanitize_callback' => 'sanitize_text_field',
	                'transport' => 'postMessage'
		       	)
	    );    
	    $wp_customize->add_control(
	        'about_section_description',
	            array(
		            'type' => 'text',
		            'label' => esc_html__( 'Section Description', 'beetech' ),
		            'section' => 'beetech_about_section',
		            'priority' => 20
	            )
	    );

    	$about_priority = 300;
        $beetech_default_about_icon = array( 'fa-flag', 'fa-database', 'fa-codepen', 'fa-hand-o-left');
        $beetech_separator_label = array( 'First', 'Second', 'Third', 'Forth');
        
        foreach ( $beetech_default_about_icon as $icon_key => $icon_value ) {    	
		
    	    $wp_customize->add_setting(
    	        'about_icon_sec_separator_'.$icon_key,
    		        array(
    		            'default' => '',
    		            'sanitize_callback' => 'sanitize_text_field',
    		        )
    	    );
    	    $wp_customize->add_control( new beetech_Customize_Section_Separator(
    	        $wp_customize, 
    	            'about_icon_sec_separator_'.$icon_key, 
    	            array(
    	                'type' 		=> 'beetech_separator',
    	                'label' 	=> sprintf(esc_html__( '%s About', 'beetech' ), $beetech_separator_label[$icon_key] ),
    	                'section' 	=> 'beetech_about_section',
    	                'priority'  => $about_priority,
    	            )	            	
    	        )
    	    );
            
            $wp_customize->add_setting(
    	        'about_title_'.$icon_key,
    		        array(
    		            'default' => '',
    		            'sanitize_callback' => 'sanitize_text_field',
                        'transport' => 'postMessage'
    		        )
    	    );
    	    $wp_customize->add_control(
    	        'about_title_'.$icon_key, 
    	            array(
    	                'type' 		=> 'text',	                
    	                'label' 	=> esc_html__( 'About Tab Title', 'beetech' ),
    	                'description' 	=> esc_html__( 'Please Input Tab Title', 'beetech' ),
    	                'section' 	=> 'beetech_about_section',
    	                'priority'  => $about_priority,
    	            )	            	
    	    );
            $wp_customize->add_setting(
    	        'about_title_sub_'.$icon_key,
    		        array(
    		            'default' => '',
    		            'sanitize_callback' => 'sanitize_text_field',
                        'transport' => 'postMessage'
    		        )
    	    );
    	    $wp_customize->add_control(
    	        'about_title_sub_'.$icon_key, 
    	            array(
    	                'type' 		=> 'text',	                
    	                'label' 	=> esc_html__( 'About Tab Sub Title', 'beetech' ),
    	                'description' 	=> esc_html__( 'Please Input Tab Sub Title', 'beetech' ),
    	                'section' 	=> 'beetech_about_section',
    	                'priority'  => $about_priority,
    	            )	            	
    	    );

    	    $wp_customize->add_setting(
    	        'about_icon_'.$icon_key,
    		        array(
    		            'default' => $icon_value,
    		            'sanitize_callback' => 'sanitize_text_field',
    		        )
    	    );
    	    $wp_customize->add_control( new beetech_Customize_Icons_Control(
    	        $wp_customize, 
    	        'about_icon_'.$icon_key, 
    	            array(
    	                'type' 		=> 'beetech_icons',	                
    	                'label' 	=> esc_html__( 'About Icon', 'beetech' ),
    	                'description' 	=> esc_html__( 'Choose the icon from lists.', 'beetech' ),
    	                'section' 	=> 'beetech_about_section',
    	                'priority'  => $about_priority,
    	            )	            	
    	        )
    	    );
    
    	    $wp_customize->add_setting(
    	        'about_page_id_'.$icon_key,
    		        array(
    		            'default' => '0',
    		            'capability' => 'edit_theme_options',
    		            'sanitize_callback' => 'absint'
    		        )
    	    );
    	    $wp_customize->add_control(
    	        'about_page_id_'.$icon_key,
    		        array(
    		        	'type' => 'dropdown-pages',
    		            'label' => esc_html__( 'About Page', 'beetech' ),
    		            'description' => esc_html__( 'Select page for Homepage About Section', 'beetech' ),
    		            'section' => 'beetech_about_section',
    		            'priority' => $about_priority
    		        )
    	    );
    	    $about_priority = $about_priority+5;
	   }



		/** Testimonial Section */
		$wp_customize->add_section(
	        'beetech_testimonials_section',
		        array(
		            'title'		=> esc_html__( 'Testimonials Section', 'beetech' ),
		            'panel'     => 'beetech_homepage_settings_panel',
		            'priority'  => 25,
		        )
	    );

	    $wp_customize->add_setting(
	        'homepage_testimonials_option',
	        	array(
		            'default' => 'hide',
		            'sanitize_callback' => 'beetech_sanitize_switch_option',
		        )
	    );
	    $wp_customize->add_control( new beetech_Customize_Switch_Control(
	        $wp_customize, 
	        'homepage_testimonials_option', 
	            array(
	                'type' 		=> 'switch',	                
	                'label' 	=> esc_html__( 'Section Option', 'beetech' ),
	                'description' 	=> esc_html__( 'Show/hide option for Homepage Testimonials Section.', 'beetech' ),
	                'section' 	=> 'beetech_testimonials_section',
	                'choices'   => array(
	                    'show' 	=> esc_html__( 'Show', 'beetech' ),
	                    'hide' 	=> esc_html__( 'Hide', 'beetech' )
	                    ),
	                'priority'  => 5,
	            )
	        )
	    );

	    $wp_customize->add_setting(
	        'testimonials_section_title', 
	            array(
	                'default' => '',
	                'sanitize_callback' => 'sanitize_text_field',
	                'transport' => 'postMessage'
		       	)
	    );
	    $wp_customize->add_control(
	        'testimonials_section_title',
	            array(
		            'type' => 'text',
		            'label' => esc_html__( 'Section Title', 'beetech' ),
		            'section' => 'beetech_testimonials_section',
		            'priority' => 10
	            )
	    );

	    $wp_customize->add_setting(
	        'testimonials_cat_id',
		        array(
		            'default' => '0',
		            'capability' => 'edit_theme_options',
		            'sanitize_callback' => 'absint'
		        )
	    );
	    $wp_customize->add_control( new beetech_Customize_Category_Control(
	        $wp_customize,
	        'testimonials_cat_id', 
		        array(
		            'label' => esc_html__( 'Section Category', 'beetech' ),
		            'description' => esc_html__( 'Select cateogry for Homepage Testimonials Section', 'beetech' ),
		            'section' => 'beetech_testimonials_section',
		            'priority' => 20
	            )
	        )
	    );

		/** Fact Section */
		$wp_customize->add_section(
	        'beetech_fact_section',
		        array(
		            'title'		=> esc_html__( 'Our Facts Section', 'beetech' ),
		            'panel'     => 'beetech_homepage_settings_panel',
		            'priority'  => 30,
		        )
	    );

	    $wp_customize->add_setting(
	        'homepage_fact_option',
		        array(
		            'default' => 'hide',
		            'sanitize_callback' => 'beetech_sanitize_switch_option',
		        )
	    );
	    $wp_customize->add_control( new beetech_Customize_Switch_Control(
	        $wp_customize, 
	            'homepage_fact_option', 
	            array(
	                'type' 		=> 'switch',	                
	                'label' 	=> esc_html__( 'Section Option', 'beetech' ),
	                'description' 	=> esc_html__( 'Show/hide option for Homepage Our Facts.', 'beetech' ),
	                'section' 	=> 'beetech_fact_section',
	                'choices'   => array(
	                    'show' 	=> esc_html__( 'Show', 'beetech' ),
	                    'hide' 	=> esc_html__( 'Hide', 'beetech' )
	                    ),
	                'priority'  => 5,
	            )
	        )
	    );
	     
	    $wp_customize->add_setting(
	        'fact_section_title', 
	            array(
	                'default' => '',
	                'sanitize_callback' => 'sanitize_text_field',
	                'transport' => 'postMessage'
		       	)
	    );
	    $wp_customize->add_control(
	        'fact_section_title',
	            array(
		            'type' => 'text',
		            'label' => esc_html__( 'Section Title', 'beetech' ),
		            'section' => 'beetech_fact_section',
		            'priority' => 10
	            )
	    );

	    $wp_customize->add_setting(
	        'fact_section_description', 
	            array(
	                'default' => '',
	                'sanitize_callback' => 'sanitize_text_field',
	                'transport' => 'postMessage'
		       	)
	    );    
	    $wp_customize->add_control(
	        'fact_section_description',
	            array(
		            'type' => 'text',
		            'label' => esc_html__( 'Section Description', 'beetech' ),
		            'section' => 'beetech_fact_section',
		            'priority' => 20
	            )
	    );
	    $wp_customize->add_setting(
	        'fact_bg_image',
		        array(
		            'default' => '',
		            'capability' => 'edit_theme_options',
		            'sanitize_callback' => 'esc_url_raw'
		        )
	    );

	    $wp_customize->add_control( new WP_Customize_Image_Control(
	        $wp_customize,
	        'fact_bg_image',
	        	array(
	            	'label'      => esc_html__( 'Section Background Image', 'beetech' ),
	               	'section'    => 'beetech_fact_section',
	               	'priority' => 25
	           	)
	       	)
	   	);

		$fact_priority = 30;
		$beetech_separator_label = array( 'First', 'Second', 'Third', 'Forth' );
		$beetech_default_fact_icon = array( 'fa-coffee', 'fa-rocket', 'fa-code', 'fa-thumbs-o-up' );
		$beetech_default_fact_title = array( 'Cups Consumed', 'Projects Lunched', 'Lines of Code', 'Satisfied Clients' );
		$beetech_default_fact_number = array( '798', '237', '54871', '25084' );
    	
    	foreach ( $beetech_default_fact_icon as $icon_key => $icon_value ) {
    		
    	    $wp_customize->add_setting(
    	        'fact_icon_sec_separator_'.$icon_key,
    		        array(
    		            'default' => '',
    		            'sanitize_callback' => 'sanitize_text_field',
    		        )
    	    );
    	    $wp_customize->add_control( new beetech_Customize_Section_Separator(
    	        $wp_customize, 
    	            'fact_icon_sec_separator_'.$icon_key, 
    	            array(
    	                'type' 		=> 'beetech_separator',
    	                'label' 	=> sprintf(esc_html__( '%s Fact Counter', 'beetech' ), $beetech_separator_label[$icon_key] ),
    	                'section' 	=> 'beetech_fact_section',
    	                'priority'  => $fact_priority,
    	            )	            	
    	        )
    	    );
    
    	    $wp_customize->add_setting(
    	        'fact_icon_'.$icon_key,
    		        array(
    		            'default' => $beetech_default_fact_icon[$icon_key],
    		            'sanitize_callback' => 'sanitize_text_field',
    		            'transport' => 'postMessage'
    		        )
    	    );
    	    $wp_customize->add_control( new beetech_Customize_Icons_Control(
    	        $wp_customize, 
    	            'fact_icon_'.$icon_key, 
    	            array(
    	                'type' 		=> 'beetech_icons',	                
    	                'label' 	=> esc_html__( 'Fact Icon', 'beetech' ),
    	                'description' 	=> esc_html__( 'Choose the icon from lists.', 'beetech' ),
    	                'section' 	=> 'beetech_fact_section',
    	                'priority'  => $fact_priority,
    	            )	            	
    	        )
    	    );
    
    	    $wp_customize->add_setting(
    	        'fact_counter_title_'.$icon_key, 
    	            array(
    	                'default' => sprintf( esc_html( '%s', 'beetech' ), $beetech_default_fact_title[$icon_key] ),
    	                'sanitize_callback' => 'sanitize_text_field',
    	                'transport' => 'postMessage'
    		       )
    	    );    
    	    $wp_customize->add_control(
    	        'fact_counter_title_'.$icon_key,
    	            array(
    		            'type' => 'text',
    		            'label' => esc_html__( 'Fact Title', 'beetech' ),
    		            'section' => 'beetech_fact_section',
    		            'priority' => $fact_priority
    	            )
    	    );
    
    	    $wp_customize->add_setting(
    	        'fact_counter_number_'.$icon_key, 
    	            array(
    	            	'default' => $beetech_default_fact_number[$icon_key],
    	                'sanitize_callback' => 'beetech_sanitize_number',
    	                'transport' => 'postMessage'
    		       	)
    	    );    
    	    $wp_customize->add_control(
    	        'fact_counter_number_'.$icon_key,
    	            array(
    		            'type' => 'number',
    		            'label' => esc_html__( 'Fact Number', 'beetech' ),
    		            'section' => 'beetech_fact_section',
    		            'priority' => $fact_priority
    	            )
    	    );
    	    $fact_priority = $fact_priority+5;
    	}
        
        /** Portfolio Section */
        
		$wp_customize->add_section(
	        'beetech_portfolio_section',
		        array(
		            'title'		=> esc_html__( 'PortFolio Section', 'beetech' ),
		            'panel'     => 'beetech_homepage_settings_panel',
		            'priority'  => 35,
		        )
	    );

	    $wp_customize->add_setting(
	        'homepage_portfolio_option',
		        array(
		            'default' => 'hide',
		            'sanitize_callback' => 'beetech_sanitize_switch_option',
		        )
	    );
	    $wp_customize->add_control( new beetech_Customize_Switch_Control(
	        $wp_customize, 
	        'homepage_portfolio_option', 
	            array(
	                'type' 		=> 'switch',	                
	                'label' 	=> esc_html__( 'Section Option', 'beetech' ),
	                'description' 	=> esc_html__( 'Show/hide option for Homepage Portfolio section.', 'beetech' ),
	                'section' 	=> 'beetech_portfolio_section',
	                'choices'   => array(
	                    'show' 	=> esc_html__( 'Show', 'beetech' ),
	                    'hide' 	=> esc_html__( 'Hide', 'beetech' )
	                    ),
	                'priority'  => 5,
	            )
	        )
	    );

	    $wp_customize->add_setting(
	        'portfolio_section_title', 
	            array(
	                'default' => '',
	                'sanitize_callback' => 'sanitize_text_field',
	                'transport' => 'postMessage'
		       	)
	    );
	    $wp_customize->add_control(
	        'portfolio_section_title',
	            array(
		            'type' => 'text',
		            'label' => esc_html__( 'Section Title', 'beetech' ),
		            'section' => 'beetech_portfolio_section',
		            'priority' => 10
	            )
	    );

	    $wp_customize->add_setting(
	        'portfolio_section_description', 
	            array(
	                'default' => '',
	                'sanitize_callback' => 'sanitize_text_field',
	                'transport' => 'postMessage'
		       	)
	    );    
	    $wp_customize->add_control(
	        'portfolio_section_description',
	            array(
		            'type' => 'text',
		            'label' => esc_html__( 'Section Description', 'beetech' ),
		            'section' => 'beetech_portfolio_section',
		            'priority' => 20
	            )
	    );

	    $wp_customize->add_setting(
	        'portfolio_cat_id',
	        array(
	            'default' => '0',
	            'capability' => 'edit_theme_options',
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new beetech_Customize_Category_Control(
	        $wp_customize,
	        'portfolio_cat_id', 
		        array(
		            'label' => esc_html__( 'Section Category', 'beetech' ),
		            'description' => esc_html__( 'Select cateogry for Homepage Portfolio Section', 'beetech' ),
		            'section' => 'beetech_portfolio_section',
		            'priority' => 25
	            )
	        )
	    );
        
        /** Blog Section */
		$wp_customize->add_section(
	        'beetech_blog_section',
	        array(
	            'title'		=> esc_html__( 'Blog Section', 'beetech' ),
	            'panel'     => 'beetech_homepage_settings_panel',
	            'priority'  => 35,
	        )
	    );

	    $wp_customize->add_setting(
	        'homepage_blog_option',
	        array(
	            'default' => 'hide',
	            'sanitize_callback' => 'beetech_sanitize_switch_option',
	            )
	    );
	    $wp_customize->add_control( new beetech_Customize_Switch_Control(
	        $wp_customize, 
	            'homepage_blog_option', 
	            array(
	                'type' 		=> 'switch',	                
	                'label' 	=> esc_html__( 'Section Option', 'beetech' ),
	                'description' 	=> esc_html__( 'Show/hide option for Homepage Latest Blog section.', 'beetech' ),
	                'section' 	=> 'beetech_blog_section',
	                'choices'   => array(
	                    'show' 	=> esc_html__( 'Show', 'beetech' ),
	                    'hide' 	=> esc_html__( 'Hide', 'beetech' )
	                    ),
	                'priority'  => 5,
	            )
	        )
	    );

	    $wp_customize->add_setting(
	        'blog_section_title', 
	            array(
	                'default' => '',
	                'sanitize_callback' => 'sanitize_text_field',
	                'transport' => 'postMessage'
		       )
	    );
	    $wp_customize->add_control(
	        'blog_section_title',
	            array(
		            'type' => 'text',
		            'label' => esc_html__( 'Section Title', 'beetech' ),
		            'section' => 'beetech_blog_section',
		            'priority' => 10
	            )
	    );

	    $wp_customize->add_setting(
	        'blog_section_desc', 
	            array(
	                'default' => esc_html__( 'Latest News', 'beetech' ),
	                'sanitize_callback' => 'sanitize_text_field',
	                'transport' => 'postMessage'
		       )
	    );
	    $wp_customize->add_control(
	        'blog_section_desc',
	            array(
		            'type' => 'text',
		            'label' => esc_html__( 'Section Description', 'beetech' ),
		            'section' => 'beetech_blog_section',
		            'priority' => 15
	            )
	    );

	    $wp_customize->add_setting(
	        'blog_cat_id',
		        array(
		            'default' => '0',
		            'capability' => 'edit_theme_options',
		            'sanitize_callback' => 'absint'
		        )
	    );
	    $wp_customize->add_control( new beetech_Customize_Category_Control(
	        $wp_customize,
	        'blog_cat_id', 
		        array(
		            'label' => esc_html__( 'Blog Category', 'beetech' ),
		            'description' => esc_html__( 'Select cateogry for Homepage Blog Section', 'beetech' ),
		            'section' => 'beetech_blog_section',
		            'priority' => 20
		        )
		    )
	    );

	   
        /** Client Section */
		$wp_customize->add_section(
	        'beetech_client_section',
		        array(
		            'title'		=> esc_html__( 'Our Clients Section', 'beetech' ),
		            'panel'     => 'beetech_homepage_settings_panel',
		            'priority'  => 40,
		        )
	    );

	    $wp_customize->add_setting(
	        'homepage_clients_option',
		        array(
		            'default' => 'hide',
		            'sanitize_callback' => 'beetech_sanitize_switch_option',
	            )
	    );
	    $wp_customize->add_control( new beetech_Customize_Switch_Control(
	        $wp_customize, 
	            'homepage_clients_option', 
	            array(
	                'type' 		=> 'switch',	                
	                'label' 	=> esc_html__( 'Section Option', 'beetech' ),
	                'description' 	=> esc_html__( 'Show/hide option for Homepage Our Clients section.', 'beetech' ),
	                'section' 	=> 'beetech_client_section',
	                'choices'   => array(
	                    'show' 	=> esc_html__( 'Show', 'beetech' ),
	                    'hide' 	=> esc_html__( 'Hide', 'beetech' )
	                    ),
	                'priority'  => 5,
	            )
	        )
	    );

	    $wp_customize->add_setting(
	        'clients_section_title', 
	            array(
	                'default' => '',
	                'sanitize_callback' => 'sanitize_text_field',
	                'transport' => 'postMessage'
		       	)
	    );
	    $wp_customize->add_control(
	        'clients_section_title',
	            array(
		            'type' => 'text',
		            'label' => esc_html__( 'Section Title', 'beetech' ),
		            'section' => 'beetech_client_section',
		            'priority' => 10
	            )
	    );

	    $wp_customize->add_setting(
	        'clients_section_description', 
	            array(
	                'default' => '',
	                'sanitize_callback' => 'sanitize_text_field',
	                'transport' => 'postMessage'
		       	)
	    );
	    $wp_customize->add_control(
	        'clients_section_description',
	            array(
		            'type' => 'text',
		            'label' => esc_html__( 'Section Description', 'beetech' ),
		            'section' => 'beetech_client_section',
		            'priority' => 15
	            )
	    );

	    $wp_customize->add_setting(
	        'clients_cat_id',
		        array(
		            'default' => '0',
		            'capability' => 'edit_theme_options',
		            'sanitize_callback' => 'absint'
		        )
	    );
	    $wp_customize->add_control( new beetech_Customize_Category_Control(
	        $wp_customize,
	        'clients_cat_id',
		        array(
		            'label' => esc_html__( 'Section Category', 'beetech' ),
		            'description' => esc_html__( 'Select cateogry for Homepage Our Clients Section', 'beetech' ),
		            'section' => 'beetech_client_section',
		            'priority' => 20
	            )
	        )
	    );

	    $wp_customize->add_setting(
	        'clients_bg_image',
		        array(
		            'default' => '',
		            'capability' => 'edit_theme_options',
		            'sanitize_callback' => 'esc_url_raw'
		        )
	    );

	    $wp_customize->add_control( new WP_Customize_Image_Control(
	        $wp_customize,
	        'clients_bg_image',
	           	array(
	               'label'      => esc_html__( 'Section Background Image', 'beetech' ),
	               'section'    => 'beetech_client_section',
	               'priority' => 25
	           	)
	       )
	    );
        /** Contact Section */
		$wp_customize->add_section(
	        'beetech_contact_section',
		        array(
		            'title'		=> esc_html__( 'Contact Us Section', 'beetech' ),
		            'panel'     => 'beetech_homepage_settings_panel',
		            'priority'  => 45,
		        )
	    );

	    $wp_customize->add_setting(
	        'homepage_contact_option',
		        array(
		            'default' => 'hide',
		            'sanitize_callback' => 'beetech_sanitize_switch_option',
	            )
	    );
	    $wp_customize->add_control( new beetech_Customize_Switch_Control(
	        $wp_customize, 
	            'homepage_contact_option', 
	            array(
	                'type' 		=> 'switch',	                
	                'label' 	=> esc_html__( 'Section Option', 'beetech' ),
	                'description' 	=> esc_html__( 'Show/hide option for Homepage Contact Us section.', 'beetech' ),
	                'section' 	=> 'beetech_contact_section',
	                'choices'   => array(
	                    'show' 	=> esc_html__( 'Show', 'beetech' ),
	                    'hide' 	=> esc_html__( 'Hide', 'beetech' )
	                    ),
	                'priority'  => 5,
	            )
	        )
	    );
		
        $wp_customize->add_setting( 'contact_section_map_page', array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'contact_section_map_page', array(
			'label'       => esc_html__( 'Map Page', 'beetech' ),
			'section'     => 'beetech_contact_section',
			'priority'	  => 8,
			'type'     => 'dropdown-pages'
		) );
        
        
	    $wp_customize->add_setting(
	        'contact_section_title', 
	            array(
	                'default' => '',
	                'sanitize_callback' => 'sanitize_text_field',
	                'transport' => 'postMessage'
		       	)
	    );
	    $wp_customize->add_control(
	        'contact_section_title',
	            array(
		            'type' => 'text',
		            'label' => esc_html__( 'Section Title', 'beetech' ),
		            'section' => 'beetech_contact_section',
		            'priority' => 10
	            )
	    );

        $wp_customize->add_setting( 'contact_section_form_page', array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'contact_section_form_page', array(
			'label'       => esc_html__( 'Contact Form Page', 'beetech' ),
			'description' => esc_html__( 'Use contact form 7 shortcode.', 'beetech' ),
			'section'     => 'beetech_contact_section',
			'priority'	  => 20,
			'type'     => 'dropdown-pages'
		) );

	    $wp_customize->add_setting(
	        'contact_section_phone', 
	            array(
	                'default' =>'',
	                'sanitize_callback' => 'sanitize_text_field',
	                'transport' => 'postMessage'
		       	)
	    );
	    $wp_customize->add_control(
	        'contact_section_phone',
	            array(
		            'type' => 'text',
		            'label' => esc_html__( 'Call Us', 'beetech' ),
		            'section' => 'beetech_contact_section',
		            'priority' => 25
	            )
	    );

	    $wp_customize->add_setting(
	        'contact_section_address',
	            array(
	                'default' => '',
	                'sanitize_callback' => 'sanitize_text_field',
	                'transport' => 'postMessage'
		       	)
	    );
	    $wp_customize->add_control(
	        'contact_section_address',
	            array(
		            'type' => 'text',
		            'label' => esc_html__( 'Address', 'beetech' ),
		            'section' => 'beetech_contact_section',
		            'priority' => 30
	            )
	    );
        
        /** Footer Pannel **/
		$wp_customize->add_panel(
	        'beetech_footer_settings_panel', 
	        	array(
	        		'priority'       => 30,
	            	'capability'     => 'edit_theme_options',
	            	'theme_supports' => '',
	            	'title'          => esc_html__( 'Footer Settings', 'beetech' ),
	            ) 
	    );


		$wp_customize->add_section(
	        'bottom_footer_section',
	        array(
	            'title'		=> esc_html__( 'Bottom Footer Settings', 'beetech' ),
	            'panel'     => 'beetech_footer_settings_panel',
	            'priority'  => 10,
	        )
	    );

	    $wp_customize->add_setting(
	        'beetech_copyright_text', 
	            array(
	                'default' => '',
	                'sanitize_callback' => 'wp_kses_post',
	                'transport' => 'postMessage'
		       	)
	    );
	    $wp_customize->add_control(
	        'beetech_copyright_text',
	            array(
		            'type' => 'textarea',
		            'label' => esc_html__( 'Copyright Text', 'beetech' ),
		            'section' => 'bottom_footer_section',
		            'priority' => 5
	            )
	    );
        
        
        /** Sidebar Settings **/

		$wp_customize->add_panel(
	        'beetech_design_settings_panel', 
	        	array(
	        		'priority'       => 20,
	            	'capability'     => 'edit_theme_options',
	            	'theme_supports' => '',
	            	'title'          => esc_html__( 'Sidebar Setting', 'beetech' ),
	            ) 
	    );
        
        
		/** Archive Settings **/
		$wp_customize->add_section(
	        'archive_settings_section',
	        array(
	            'title'		=> esc_html__( 'Archive Sidebar', 'beetech' ),
	            'panel'     => 'beetech_design_settings_panel',
	            'priority'  => 5,
	        )
	    );	    

	    $wp_customize->add_setting(
	        'beetech_archive_sidebar_layout',
	        array(
	            'default'           => 'right_sidebar',
	            'sanitize_callback' => 'sanitize_text_field',
	        )
	    );	    
	    $wp_customize->add_control(
	        'beetech_archive_sidebar_layout',
	            array(
	                'label'    => esc_html__( 'Archive Sidebars', 'beetech' ),
	                'section'  => 'archive_settings_section',
                    'type' => 'radio',
	                'choices'  => array(
		                    'left_sidebar' => esc_html__( 'Left Sidebar', 'beetech' ),
		                    'right_sidebar' => esc_html__( 'Right Sidebar', 'beetech' ),
		                    'no_sidebar' => esc_html__( 'No Sidebar', 'beetech' ),
		                    'both_sidebar' => esc_html__( 'Both Sidebar', 'beetech' ),
		            ),
		            'priority' => 5
	            )
	    );
    
	}
endif;

add_action( 'customize_register', 'beetech_customizer_option_register' );
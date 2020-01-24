<?php
/**
 * Advance Education Theme Customizer
 *
 * @package advance-education
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function advance_education_customize_register($wp_customize) {

	//add home page setting pannel
	$wp_customize->add_panel('advance_education_panel_id', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Theme Settings', 'advance-education'),
		'description'    => __('Description of what this panel does.', 'advance-education'),
	));	

	// Add the Theme Color Option section.
	$wp_customize->add_section( 'advance_education_theme_color_option', array( 
		'panel' => 'advance_education_panel_id', 
		'title' => esc_html__( 'Theme Color Option', 'advance-education' ) 
	) );

  	$wp_customize->add_setting( 'advance_education_theme_color', array(
	    'default' => '#cc3333',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_education_theme_color', array(
  		'label' => 'Color Option',
	    'description' => __('One can change complete theme color on just one click.', 'advance-education'),
	    'section' => 'advance_education_theme_color_option',
	    'settings' => 'advance_education_theme_color',
  	)));

	//Typography
	$wp_customize->add_section( 'advance_education_typography', array(
    	'title'      => __( 'Typography', 'advance-education' ),
		'priority'   => 30,
		'panel' => 'advance_education_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'advance_education_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_education_paragraph_color', array(
		'label' => __('Paragraph Color', 'advance-education'),
		'section' => 'advance_education_typography',
		'settings' => 'advance_education_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('advance_education_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_education_paragraph_font_family', array(
	    'section'  => 'advance_education_typography',
	    'label'    => __( 'Paragraph Fonts','advance-education'),
	    'type'     => 'select',
	    'choices'  => 'font_array',
	));

	$wp_customize->add_setting('advance_education_paragraph_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_education_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','advance-education'),
		'section'	=> 'advance_education_typography',
		'setting'	=> 'advance_education_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'advance_education_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_education_atag_color', array(
		'label' => __('"a" Tag Color', 'advance-education'),
		'section' => 'advance_education_typography',
		'settings' => 'advance_education_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('advance_education_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_education_atag_font_family', array(
	    'section'  => 'advance_education_typography',
	    'label'    => __( '"a" Tag Fonts','advance-education'),
	    'type'     => 'select',
	    'choices'  => 'font_array',
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'advance_education_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_education_li_color', array(
		'label' => __('"li" Tag Color', 'advance-education'),
		'section' => 'advance_education_typography',
		'settings' => 'advance_education_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('advance_education_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_education_li_font_family', array(
	    'section'  => 'advance_education_typography',
	    'label'    => __( '"li" Tag Fonts','advance-education'),
	    'type'     => 'select',
	    'choices'  => 'font_array',
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'advance_education_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_education_h1_color', array(
		'label' => __('H1 Color', 'advance-education'),
		'section' => 'advance_education_typography',
		'settings' => 'advance_education_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('advance_education_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_education_h1_font_family', array(
	    'section'  => 'advance_education_typography',
	    'label'    => __( 'H1 Fonts','advance-education'),
	    'type'     => 'select',
	    'choices'  => 'font_array',
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('advance_education_h1_font_size',array(
		'default'	=> '50px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_education_h1_font_size',array(
		'label'	=> __('H1 Font Size','advance-education'),
		'section'	=> 'advance_education_typography',
		'setting'	=> 'advance_education_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'advance_education_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_education_h2_color', array(
		'label' => __('H2 Color', 'advance-education'),
		'section' => 'advance_education_typography',
		'settings' => 'advance_education_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('advance_education_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_education_h2_font_family', array(
	    'section'  => 'advance_education_typography',
	    'label'    => __( 'H2 Fonts','advance-education'),
	    'type'     => 'select',
	    'choices'  => 'font_array',
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('advance_education_h2_font_size',array(
		'default'	=> '45px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_education_h2_font_size',array(
		'label'	=> __('H2 Font Size','advance-education'),
		'section'	=> 'advance_education_typography',
		'setting'	=> 'advance_education_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'advance_education_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_education_h3_color', array(
		'label' => __('H3 Color', 'advance-education'),
		'section' => 'advance_education_typography',
		'settings' => 'advance_education_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('advance_education_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_education_h3_font_family', array(
	    'section'  => 'advance_education_typography',
	    'label'    => __( 'H3 Fonts','advance-education'),
	    'type'     => 'select',
	    'choices'  => 'font_array',
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('advance_education_h3_font_size',array(
		'default'	=> '36px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_education_h3_font_size',array(
		'label'	=> __('H3 Font Size','advance-education'),
		'section'	=> 'advance_education_typography',
		'setting'	=> 'advance_education_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'advance_education_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_education_h4_color', array(
		'label' => __('H4 Color', 'advance-education'),
		'section' => 'advance_education_typography',
		'settings' => 'advance_education_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('advance_education_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_education_h4_font_family', array(
	    'section'  => 'advance_education_typography',
	    'label'    => __( 'H4 Fonts','advance-education'),
	    'type'     => 'select',
	    'choices'  => 'font_array',
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('advance_education_h4_font_size',array(
		'default'	=> '30px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_education_h4_font_size',array(
		'label'	=> __('H4 Font Size','advance-education'),
		'section'	=> 'advance_education_typography',
		'setting'	=> 'advance_education_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'advance_education_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_education_h5_color', array(
		'label' => __('H5 Color', 'advance-education'),
		'section' => 'advance_education_typography',
		'settings' => 'advance_education_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('advance_education_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_education_h5_font_family', array(
	    'section'  => 'advance_education_typography',
	    'label'    => __( 'H5 Fonts','advance-education'),
	    'type'     => 'select',
	    'choices'  => 'font_array',
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('advance_education_h5_font_size',array(
		'default'	=> '25px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_education_h5_font_size',array(
		'label'	=> __('H5 Font Size','advance-education'),
		'section'	=> 'advance_education_typography',
		'setting'	=> 'advance_education_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'advance_education_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_education_h6_color', array(
		'label' => __('H6 Color', 'advance-education'),
		'section' => 'advance_education_typography',
		'settings' => 'advance_education_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('advance_education_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_education_h6_font_family', array(
	    'section'  => 'advance_education_typography',
	    'label'    => __( 'H6 Fonts','advance-education'),
	    'type'     => 'select',
	    'choices'  => 'font_array',
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('advance_education_h6_font_size',array(
		'default'	=> '18px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_education_h6_font_size',array(
		'label'	=> __('H6 Font Size','advance-education'),
		'section'	=> 'advance_education_typography',
		'setting'	=> 'advance_education_h6_font_size',
		'type'	=> 'text'
	));

	//Layouts
	$wp_customize->add_section('advance_education_left_right', array(
		'title'    => __('Layout Settings', 'advance-education'),
		'priority' => null,
		'panel'    => 'advance_education_panel_id',
	));
	
	$wp_customize->add_setting('advance_education_theme_options',array(
        'default' => __('Default','advance-education'),
        'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control('advance_education_theme_options',array(
        'type' => 'radio',
        'label' => __('Container Box','advance-education'),
        'description' => __('Here you can change the Width layout. ','advance-education'),
        'section' => 'advance_education_left_right',
        'choices' => array(
            'Default' => __('Default','advance-education'),
            'Container' => __('Container','advance-education'),
            'Box Container' => __('Box Container','advance-education'),
        ),
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('advance_education_layout_options', array(
		'default'           => __('Right Sidebar', 'advance-education'),
		'sanitize_callback' => 'advance_education_sanitize_choices',
	));
	$wp_customize->add_control('advance_education_layout_options',array(
		'type'           => 'radio',
		'label'          => __('Change Layouts', 'advance-education'),
		'section'        => 'advance_education_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'advance-education'),
			'Right Sidebar' => __('Right Sidebar', 'advance-education'),
			'One Column'    => __('One Column', 'advance-education'),
			'Grid Layout'   => __('Grid Layout', 'advance-education')
		),
	));

	//Top Bar
	$wp_customize->add_section('advance_education_topbar',array(
		'title'	=> __('Topbar Section','advance-education'),
		'description'	=> __('Add topbar content','advance-education'),
		'priority'	=> null,
		'panel' => 'advance_education_panel_id',
	));

	//Show /Hide Topbar
	$wp_customize->add_setting( 'advance_education_display_topbar',array(
		'default' => 'true',
      	'sanitize_callback'	=> 'sanitize_text_field'
    ) );
    $wp_customize->add_control('advance_education_display_topbar',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Topbar','advance-education' ),
        'section' => 'advance_education_topbar'
    ));

    //Sticky Header
	$wp_customize->add_setting( 'advance_education_sticky_header',array(
      	'sanitize_callback'	=> 'sanitize_text_field'
    ) );
    $wp_customize->add_control('advance_education_sticky_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Sticky Header','advance-education' ),
        'section' => 'advance_education_topbar'
    ));

	$wp_customize->add_setting('advance_education_mail1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_education_mail1',array(
		'label'	=> __('Mail Address','advance-education'),
		'section'	=> 'advance_education_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_education_phone1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_education_phone1',array(
		'label'	=> __('Phone Number','advance-education'),
		'section'	=> 'advance_education_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_education_time',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_education_time',array(
		'label'	=> __('Timing Text','advance-education'),
		'section'	=> 'advance_education_topbar',
		'type'	=> 'text'
	));

	//Slider
	$wp_customize->add_section( 'advance_education_slider' , array(
    	'title'      => __( 'Slider Settings', 'advance-education' ),
		'priority'   => null,
		'panel' => 'advance_education_panel_id'
	) );

	$wp_customize->add_setting('advance_education_slider_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_education_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','advance-education'),
       'section' => 'advance_education_slider'
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'advance_education_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'advance_education_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'advance_education_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'advance-education' ),
			'description'	=> __('Size of image should be 1600 x 633','advance-education'),
			'section'  => 'advance_education_slider',
			'type'     => 'dropdown-pages'
		) );
	}

	//Popular Courses 
	$wp_customize->add_section('advance_education_category',array(
		'title'	=> __('Popular Courses','advance-education'),
		'description'	=> __('Add section below.','advance-education'),
		'panel' => 'advance_education_panel_id',
	));

	$wp_customize->add_setting('advance_education_title',array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_text_field',
   	));
   	$wp_customize->add_control('advance_education_title',array(
	    'label' => __('Section Title','advance-education'),
	    'section' => 'advance_education_category',
	    'type'  => 'text'
   	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('advance_education_popular_courses_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'advance_education_sanitize_choices',
	));	
	$wp_customize->add_control('advance_education_popular_courses_category',array(
		'type'    => 'select',
		'choices' => $cat_post,		
		'label' => __('Select Category to display post','advance-education'),
		'description'	=> __('Size of image should be 370 x 240','advance-education'),
		'section' => 'advance_education_category',
	));

	//Blog Post
	$wp_customize->add_section('advance_education_blog_post',array(
		'title'	=> __('Blog Page Settings','advance-education'),
		'panel' => 'advance_education_panel_id',
	));	

	$wp_customize->add_setting('advance_education_date_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_education_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Date','advance-education'),
       'section' => 'advance_education_blog_post'
    ));

    $wp_customize->add_setting('advance_education_comment_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_education_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Comments','advance-education'),
       'section' => 'advance_education_blog_post'
    ));

    $wp_customize->add_setting('advance_education_author_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_education_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Author','advance-education'),
       'section' => 'advance_education_blog_post'
    ));

    $wp_customize->add_setting('advance_education_tags_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_education_tags_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Tags','advance-education'),
       'section' => 'advance_education_blog_post'
    ));

    $wp_customize->add_setting( 'advance_education_excerpt_number', array(
		'default'              => 20,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'advance_education_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','advance-education' ),
		'section'     => 'advance_education_blog_post',
		'type'        => 'textfield',
		'settings'    => 'advance_education_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('advance_education_button_text',array(
		'default'=> 'READ MORE',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_education_button_text',array(
		'label'	=> __('Add Button Text','advance-education'),
		'section'=> 'advance_education_blog_post',
		'type'=> 'text'
	));

	//footer
	$wp_customize->add_section('advance_education_footer_section', array(
		'title'       => __('Footer Text', 'advance-education'),
		'priority'    => null,
		'panel'       => 'advance_education_panel_id',
	));

	$wp_customize->add_setting('advance_education_footer_widget_areas',array(
        'default'           => '4',
        'sanitize_callback' => 'advance_education_sanitize_choices',
    ));
    $wp_customize->add_control('advance_education_footer_widget_areas',array(
        'type'        => 'select',
        'label'       => __('Footer widget area', 'advance-education'),
        'section'     => 'advance_education_footer_section',
        'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'advance-education'),
        'choices' => array(
            '1'     => __('One', 'advance-education'),
            '2'     => __('Two', 'advance-education'),
            '3'     => __('Three', 'advance-education'),
            '4'     => __('Four', 'advance-education')
        ),
    ));

	$wp_customize->add_setting('advance_education_footer_copy', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_education_footer_copy', array(
		'label'   => __('Copyright Text', 'advance-education'),
		'section' => 'advance_education_footer_section',
		'type'    => 'text',
	));

	$wp_customize->add_setting('advance_education_enable_disable_scroll',array(
        'default' => 'true',
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_education_enable_disable_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Scroll Top Button','advance-education'),
      	'section' => 'advance_education_footer_section',
	));

	$wp_customize->add_setting('advance_education_scroll_setting',array(
        'default' => __('Right','advance-education'),
        'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control('advance_education_scroll_setting',array(
        'type' => 'select',
        'label' => __('Scroll Back to Top Position','advance-education'),
        'section' => 'advance_education_footer_section',
        'choices' => array(
            'Left' => __('Left','advance-education'),
            'Right' => __('Right','advance-education'),
            'Center' => __('Center','advance-education'),
        ),
	) );
}
add_action('customize_register', 'advance_education_customize_register');

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Advance_Education_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if (is_null($instance)) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action('customize_register', array($this, 'sections'));

		// Register scripts and styles for the conadvance_education_Customizetrols.
		add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_control_scripts'), 0);
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections($manager) {

		// Load custom sections.
		load_template(trailingslashit(get_template_directory()).'/inc/section-pro.php');

		// Register custom section types.
		$manager->register_section_type('Advance_Education_Customize_Section_Pro');

		// Register sections.
		$manager->add_section(
			new Advance_Education_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__('Education Pro Theme', 'advance-education'),
					'pro_text' => esc_html__('Go Pro', 'advance-education'),
					'pro_url'  => esc_url('https://www.themeshopy.com/themes/education-wordpress-theme/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script('advance-education-customize-controls', trailingslashit(get_template_directory_uri()).'/js/customize-controls.js', array('customize-controls'));
		wp_enqueue_style('advance-education-customize-controls', trailingslashit(get_template_directory_uri()).'/css/customize-controls.css');
	}
}

// Doing this customizer thang!
Advance_Education_Customize::get_instance();
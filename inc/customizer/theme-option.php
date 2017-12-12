<?php 

/**
 * Theme Options Panel.
 *
 * @package best-education
 */

$default = best_education_get_default_theme_options();


// Slider Main Section.
$wp_customize->add_section( 'slider_section_settings',
	array(
		'title'      => esc_html__( 'Slider Section', 'best-education' ),
		'priority'   => 60,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);


// Setting - show_slider_section.
$wp_customize->add_setting( 'show_slider_section',
	array(
		'default'           => $default['show_slider_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'best_education_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_slider_section',
	array(
		'label'    => esc_html__( 'Enable Slider', 'best-education' ),
		'section'  => 'slider_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);


// Setting - drop down category for slider.
$wp_customize->add_setting( 'select_category_for_slider',
	array(
		'default'           => $default['select_category_for_slider'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control( new Best_Education_Dropdown_Taxonomies_Control( $wp_customize, 'select_category_for_slider',
	array(
        'label'           => esc_html__( 'Category For Main slider', 'best-education' ),
        'section'         => 'slider_section_settings',
        'type'            => 'dropdown-taxonomies',
        'taxonomy'        => 'category',
		'priority'    	  => 130,
    ) ) );



// Setting - drop down category for slider.
$wp_customize->add_setting( 'select_category_for_slider_double_post',
	array(
		'default'           => $default['select_category_for_slider_double_post'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control( new Best_Education_Dropdown_Taxonomies_Control( $wp_customize, 'select_category_for_slider_double_post',
	array(
        'label'           => esc_html__( 'Category For 2 Pined Post ', 'best-education' ),
        'description'     => esc_html__( 'Select category to be shown on side of slider i.e the 2 pined posts', 'best-education' ),
        'section'         => 'slider_section_settings',
        'type'            => 'dropdown-taxonomies',
        'taxonomy'        => 'category',
		'priority'    	  => 140,
    ) ) );



// Add Theme Options Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
		'title'      => esc_html__( 'Theme Options', 'best-education' ),
		'priority'   => 200,
		'capability' => 'edit_theme_options',
	)
);

/*layout management section start */
$wp_customize->add_section( 'theme_option_section_settings',
	array(
		'title'      => esc_html__( 'Layout Management', 'best-education' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting social_icon_style.
$wp_customize->add_setting( 'social_icon_style',
	array(
	'default'           => $default['social_icon_style'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'best_education_sanitize_select',
	)
);
$wp_customize->add_control( 'social_icon_style',
	array(
	'label'       => esc_html__( 'Social Icon Style', 'best-education' ),
	'section'     => 'theme_option_section_settings',
	'type'        => 'select',
	'choices'               => array(
		'square' => esc_html__( 'Square', 'best-education' ),
		'circle' => esc_html__( 'Circle', 'best-education' ),
	    ),
	'priority'    => 110,
	)
);

/*Home Page Layout*/
$wp_customize->add_setting( 'home_page_content_status',
	array(
		'default'           => $default['home_page_content_status'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'best_education_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'home_page_content_status',
	array(
		'label'    => esc_html__( 'Enable Static Page Content', 'best-education' ),
		'section'  => 'static_front_page',
		'type'     => 'checkbox',
		'priority' => 150,
	)
);

/*Home Page Layout*/
$wp_customize->add_setting( 'enable_overlay_option',
	array(
		'default'           => $default['enable_overlay_option'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'best_education_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'enable_overlay_option',
	array(
		'label'    => esc_html__( 'Enable Banner Overlay', 'best-education' ),
		'section'  => 'theme_option_section_settings',
		'type'     => 'checkbox',
		'priority' => 150,
	)
);

/*Home Page Layout*/
$wp_customize->add_setting( 'homepage_layout_option',
	array(
		'default'           => $default['homepage_layout_option'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'best_education_sanitize_select',
	)
);
$wp_customize->add_control( 'homepage_layout_option',
	array(
		'label'    => esc_html__( 'Home Page Layout', 'best-education' ),
		'section'  => 'theme_option_section_settings',
		'choices'  => array(
                'full-width' => esc_html__( 'Full Width', 'best-education' ),
                'boxed' => esc_html__( 'Boxed', 'best-education' ),
		    ),
		'type'     => 'select',
		'priority' => 160,
	)
);

/*Global Layout*/
$wp_customize->add_setting( 'global_layout',
	array(
		'default'           => $default['global_layout'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'best_education_sanitize_select',
	)
);
$wp_customize->add_control( 'global_layout',
	array(
		'label'    => esc_html__( 'Global Layout', 'best-education' ),
		'section'  => 'theme_option_section_settings',
		'choices'               => array(
                'right-sidebar' => esc_html__( 'Content - Primary Sidebar', 'best-education' ),
                'left-sidebar' => esc_html__( 'Primary Sidebar - Content', 'best-education' ),
                'no-sidebar' => esc_html__( 'No Sidebar', 'best-education' )
		    ),
		'type'     => 'select',
		'priority' => 170,
	)
);


/*content excerpt in global*/
$wp_customize->add_setting( 'excerpt_length_global',
	array(
		'default'           => $default['excerpt_length_global'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'best_education_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'excerpt_length_global',
	array(
		'label'    => esc_html__( 'Set Global Archive Length', 'best-education' ),
		'section'  => 'theme_option_section_settings',
		'type'     => 'number',
		'priority' => 175,
		'input_attrs'     => array( 'min' => 1, 'max' => 200, 'style' => 'width: 150px;' ),

	)
);

/*Archive Layout text*/
$wp_customize->add_setting( 'archive_layout',
	array(
		'default'           => $default['archive_layout'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'best_education_sanitize_select',
	)
);
$wp_customize->add_control( 'archive_layout',
	array(
		'label'    => esc_html__( 'Archive Layout', 'best-education' ),
		'section'  => 'theme_option_section_settings',
		'choices'               => array(
			'excerpt-only' => esc_html__( 'Excerpt Only', 'best-education' ),
			'full-post' => esc_html__( 'Full Post', 'best-education' ),
		    ),
		'type'     => 'select',
		'priority' => 180,
	)
);

/*Archive Layout image*/
$wp_customize->add_setting( 'archive_layout_image',
	array(
		'default'           => $default['archive_layout_image'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'best_education_sanitize_select',
	)
);
$wp_customize->add_control( 'archive_layout_image',
	array(
		'label'    => esc_html__( 'Archive Image Alocation', 'best-education' ),
		'section'  => 'theme_option_section_settings',
		'choices'               => array(
			'full' => esc_html__( 'Full', 'best-education' ),
			'right' => esc_html__( 'Right', 'best-education' ),
			'left' => esc_html__( 'Left', 'best-education' ),
			'no-image' => esc_html__( 'No image', 'best-education' )
		    ),
		'type'     => 'select',
		'priority' => 185,
	)
);

/*single post Layout image*/
$wp_customize->add_setting( 'single_post_image_layout',
	array(
		'default'           => $default['single_post_image_layout'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'best_education_sanitize_select',
	)
);
$wp_customize->add_control( 'single_post_image_layout',
	array(
		'label'    => esc_html__( 'Single Post/Page Image Alocation', 'best-education' ),
		'section'  => 'theme_option_section_settings',
		'choices'               => array(
			'full' => esc_html__( 'Full', 'best-education' ),
			'right' => esc_html__( 'Right', 'best-education' ),
			'left' => esc_html__( 'Left', 'best-education' ),
			'no-image' => esc_html__( 'No image', 'best-education' )
		    ),
		'type'     => 'select',
		'priority' => 190,
	)
);


// Pagination Section.
$wp_customize->add_section( 'pagination_section',
	array(
	'title'      => esc_html__( 'Pagination Options', 'best-education' ),
	'priority'   => 110,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting pagination_type.
$wp_customize->add_setting( 'pagination_type',
	array(
	'default'           => $default['pagination_type'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'best_education_sanitize_select',
	)
);
$wp_customize->add_control( 'pagination_type',
	array(
	'label'       => esc_html__( 'Pagination Type', 'best-education' ),
	'section'     => 'pagination_section',
	'type'        => 'select',
	'choices'               => array(
		'default' => esc_html__( 'Default (Older / Newer Post)', 'best-education' ),
		'numeric' => esc_html__( 'Numeric', 'best-education' ),
	    ),
	'priority'    => 100,
	)
);



// Footer Section.
$wp_customize->add_section( 'footer_section',
	array(
	'title'      => esc_html__( 'Footer Options', 'best-education' ),
	'priority'   => 130,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);


// Setting social_content_heading.
$wp_customize->add_setting( 'number_of_footer_widget',
	array(
	'default'           => $default['number_of_footer_widget'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'best_education_sanitize_select',
	)
);
$wp_customize->add_control( 'number_of_footer_widget',
	array(
	'label'    => esc_html__( 'Number Of Footer Widget', 'best-education' ),
	'section'  => 'footer_section',
	'type'     => 'select',
	'priority' => 100,
	'choices'               => array(
		0 => esc_html__( 'Disable footer sidebar area', 'best-education' ),
		1 => esc_html__( '1', 'best-education' ),
		2 => esc_html__( '2', 'best-education' ),
		3 => esc_html__( '3', 'best-education' ),
	    ),
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'copyright_text',
	array(
	'default'           => $default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'copyright_text',
	array(
	'label'    => esc_html__( 'Footer Copyright Text', 'best-education' ),
	'section'  => 'footer_section',
	'type'     => 'text',
	'priority' => 120,
	)
);

// Breadcrumb Section.
$wp_customize->add_section( 'breadcrumb_section',
	array(
	'title'      => esc_html__( 'Breadcrumb Options', 'best-education' ),
	'priority'   => 120,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting breadcrumb_type.
$wp_customize->add_setting( 'breadcrumb_type',
	array(
	'default'           => $default['breadcrumb_type'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'best_education_sanitize_select',
	)
);
$wp_customize->add_control( 'breadcrumb_type',
	array(
	'label'       => esc_html__( 'Breadcrumb Type', 'best-education' ),
	'description' => sprintf( esc_html__( 'Advanced: Requires %1$sBreadcrumb NavXT%2$s plugin', 'best-education' ), '<a href="https://wordpress.org/plugins/breadcrumb-navxt/" target="_blank">','</a>' ),
	'section'     => 'breadcrumb_section',
	'type'        => 'select',
	'choices'               => array(
		'disabled' => esc_html__( 'Disabled', 'best-education' ),
		'simple' => esc_html__( 'Simple', 'best-education' ),
		'advanced' => esc_html__( 'Advanced', 'best-education' ),
	    ),
	'priority'    => 100,
	)
);
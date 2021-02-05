<?php 
	Kirki::add_config( 'accesspress_lite_config', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'option',
		'option_name'	=> 'accesspresslite_options'
	) );

	Kirki::add_panel( 'accesspress_lite_basic', array(
	    'priority'    => 20,
	    'title'       => esc_html__( 'Basic Settings', 'accesspress-lite' ),
	    'description' => esc_html__( 'Setup Basic Settings.', 'accesspress-lite' ),
	) );
		Kirki::add_section( 'accesspresslite_desg_settings', array(
		    'title'          => esc_html__( 'Design Settings', 'accesspress-lite' ),
		    'description'    => esc_html__( 'Setup design template.', 'accesspress-lite' ),
		    'panel'          => 'accesspress_lite_basic',
		    'priority'       => 10,
		) );

			Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'switch',
				'settings'    => 'responsive_design',
				'label'       => esc_html__( 'Disable Responsive Design?', 'accesspress-lite' ),
				'section'     => 'accesspresslite_desg_settings',
				'default'     => '1',
				'priority'    => 10,
				'choices'     => [
					true  => esc_html__( 'Enable', 'accesspress-lite' ),
					false => esc_html__( 'Disable', 'accesspress-lite' ),
				],
				'sanitize_callback'	=> 'accesspress_lite_sanitize_checkbox',
			] );
		
			Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'radio',
				'settings'    => 'accesspresslite_home_template',
				'label'       => esc_html__( 'Home Page Template', 'accesspress-lite' ),
				'section'     => 'accesspresslite_desg_settings',
				'default'     => 'template_one',
				'priority'    => 20,
				'choices'     => [
					'template_one'   => esc_html__( 'Template One', 'accesspress-lite' ),
					'template_two' => esc_html__( 'Template Two', 'accesspress-lite' ),
				],
				'sanitize_callback'	=> 'accesspress_lite_sanitize_templayout'
			] );

			Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'color',
				'settings'    => 'template_color',
				'label'       => esc_html__( 'Template Color', 'accesspress-lite' ),
				'description' => esc_html__( 'Choose primary theme color.', 'accesspress-lite' ),
				'section'     => 'accesspresslite_desg_settings',
				'default'     => '#04A3ED',
				'priority'    => 30,
            	'sanitize_callback'	=> 'sanitize_hex_color',
			] );

			Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'radio',
				'settings'    => 'accesspresslite_webpage_layout',
				'label'       => esc_html__( 'Web Layout', 'accesspress-lite' ),
				'section'     => 'accesspresslite_desg_settings',
				'default'     => 'Fullwidth',
				'priority'    => 40,
				'choices'     => [
					'Fullwidth'   => esc_html__( 'Fullwidth', 'accesspress-lite' ),
					'Boxed' => esc_html__( 'Boxed', 'accesspress-lite' ),
				],
				'sanitize_callback'	=> 'accesspress_lite_sanitize_weblayout'
			] );

		Kirki::add_section( 'accesspresslite_header_settings', array(
		    'title'          => esc_html__( 'Header Settings', 'accesspress-lite' ),
		    'description'    => esc_html__( 'Setup header settings.', 'accesspress-lite' ),
		    'panel'          => 'accesspress_lite_basic',
		    'priority'       => 20,
		) );

			Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'switch',
				'settings'    => 'show_search',
				'label'       => esc_html__( 'Show Search in Header?', 'accesspress-lite' ),
				'section'     => 'accesspresslite_header_settings',
				'default'     => '1',
				'priority'    => 10,
				'choices'     => [
					true  => esc_html__( 'Enable', 'accesspress-lite' ),
					false => esc_html__( 'Disable', 'accesspress-lite' ),
				],
				'sanitize_callback'	=> 'accesspress_lite_sanitize_checkbox',
			] );

			Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'textarea',
				'settings'    => 'header_text',
				'label'       => esc_html__( 'Header Text', 'accesspress-lite' ),
				'section'     => 'accesspresslite_header_settings',
				'priority'    => 10,
				'sanitize_callback' => 'accesspress_lite_sanitize_textarea',
            	'default'	=> ''
			] );

			Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'radio',
				'settings'    => 'menu_alignment',
				'label'       => esc_html__( 'Menu Alignment', 'accesspress-lite' ),
				'section'     => 'accesspresslite_header_settings',
				'default'     => 'Left',
				'priority'    => 20,
				'choices'     => [
					'Left'   => esc_html__( 'Left', 'accesspress-lite' ),
					'Right' => esc_html__( 'Right', 'accesspress-lite' ),
					'Center' => esc_html__( 'Center', 'accesspress-lite' ),

				],
				'sanitize_callback'	=> 'accesspress_lite_sanitize_menu'
			] );

		Kirki::add_section( 'accesspress_lite_other', array(
		    'title'          => esc_html__( 'Other Settings', 'accesspress-lite' ),
		    'description'    => esc_html__( 'Setup other Settings.', 'accesspress-lite' ),
		    'panel'          => 'accesspress_lite_basic',
		    'priority'       => 30,
		) );
			Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'select',
				'settings'    => 'event_cat',
				'label'       => esc_html__( 'Event Category', 'accesspress-lite' ),
				'description' => esc_html__( 'Select the category to display as Events.', 'accesspress-lite' ),
				'section'     => 'accesspress_lite_other',
				'priority'    => 10,
            	'choices' 	=> accesspress_lite_category_lists(),
            	'default'	=> '',
            	'sanitize_callback'	=> 'accesspress_lite_sanitize_category_lists',
			] );

			Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'select',
				'settings'    => 'testimonial_cat',
				'label'       => esc_html__( 'Testimonials Category', 'accesspress-lite' ),
				'description' => esc_html__( 'Select the category to display as Testimonials.', 'accesspress-lite' ),
				'section'     => 'accesspress_lite_other',
				'priority'    => 10,
            	'choices' 	=> accesspress_lite_category_lists(),
            	'default'	=> '',
            	'sanitize_callback'	=> 'accesspress_lite_sanitize_category_lists',
			] );

			Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'select',
				'settings'    => 'portfolio_cat',
				'label'       => esc_html__( 'Portfolio Category', 'accesspress-lite' ),
				'description' => esc_html__( 'Select the category to display as Portfolio/Products.', 'accesspress-lite' ),
				'section'     => 'accesspress_lite_other',
				'priority'    => 10,
            	'choices' 	=> accesspress_lite_category_lists(),
            	'default'	=> '',
            	'sanitize_callback'	=> 'accesspress_lite_sanitize_category_lists',
			] );


		Kirki::add_section( 'accesspress_lite_blog_setting', array(
		    'priority'    => 70,
		    'title'          => esc_html__( 'Blog Setting', 'accesspress-lite' ),
		    'description'    => esc_html__( 'Setup Blog settings.', 'accesspress-lite' ),
		) );

			Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'text',
				'settings'    => 'blog_read_more',
				'label'       => esc_html__( 'Readmore Text', 'accesspress-lite' ),
				'description' => esc_html__( 'Enter text to change text of Read More button in Archive Pages.', 'accesspress-lite' ),
				'section'     => 'accesspress_lite_blog_setting',
				'priority'    => 10,
            	'default'	=> 'Read More',
				'sanitize_callback' => 'sanitize_text_field',
			] );

		Kirki::add_section( 'accesspress_lite_post_setting', array(
		    'priority'    => 70,
		    'title'          => esc_html__( 'Post Setting', 'accesspress-lite' ),
		    'description'    => esc_html__( 'Setup Post settings.', 'accesspress-lite' ),
		) );

			Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'switch',
				'settings'    => 'post_meta_enable',
				'label'       => esc_html__( 'Show Meta Data?', 'accesspress-lite' ),
				'description' => esc_html__( 'Show Meta Data in Post', 'accesspress-lite' ),
				'section'     => 'accesspress_lite_post_setting',
				'default'     => '1',
				'priority'    => 20,
				'choices'     => [
					true  => esc_html__( 'Enable', 'accesspress-lite' ),
					false => esc_html__( 'Disable', 'accesspress-lite' ),
				],
				'sanitize_callback'	=> 'accesspress_lite_sanitize_checkbox',
			] );

			Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'switch',
				'settings'    => 'post_comment_enable',
				'label'       => esc_html__( 'Show Page Comment?', 'accesspress-lite' ),
				'description' => esc_html__( 'Show Comments in Post', 'accesspress-lite' ),
				'section'     => 'accesspress_lite_post_setting',
				'default'     => '1',
				'priority'    => 20,
				'choices'     => [
					true  => esc_html__( 'Enable', 'accesspress-lite' ),
					false => esc_html__( 'Disable', 'accesspress-lite' ),
				],
				'sanitize_callback'	=> 'accesspress_lite_sanitize_checkbox',
			] );

			

		Kirki::add_section( 'accesspress_lite_footer_setting', array(
		    'priority'    => 80,
		    'title'          => esc_html__( 'Footer Setting', 'accesspress-lite' ),
		    'description'    => esc_html__( 'Setup Footer settings.', 'accesspress-lite' ),
		) );

			Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'text',
				'settings'    => 'footer_copyright',
				'label'       => esc_html__( 'Footer Copyright Text', 'accesspress-lite' ),
				'description' => esc_html__( 'Enter text to change text of Footer Copyright.', 'accesspress-lite' ),
				'section'     => 'accesspress_lite_footer_setting',
				'priority'    => 20,
            	'default'	=> '',
				'sanitize_callback' => 'sanitize_text_field',
			] );


	Kirki::add_panel( 'accesspress_lite_hm_settings', array(
	    'priority'    => 40,
	    'title'       => esc_html__( 'Homepage Settings', 'accesspress-lite' ),
	    'description' => esc_html__( 'Setup Homepage Settings.', 'accesspress-lite' ),
	) );
			
		Kirki::add_section( 'accesspresslite_hm_layout', array(
		    'title'          => esc_html__( 'Homepage Layout', 'accesspress-lite' ),
		    'description'    => esc_html__( 'Setup homepage layout.', 'accesspress-lite' ),
		    'panel'          => 'accesspress_lite_hm_settings',
		    'priority'       => 10,
		) );

			Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'radio-image',
				'settings'    => 'accesspresslite_home_page_layout',
				'label'       => esc_html__( 'Choose Layout', 'accesspress-lite' ),
				'section'     => 'accesspresslite_hm_layout',
				'default'     => 'Default',
				'priority'    => 10,
				'choices'     => [
					'Default'  => get_template_directory_uri() . '/inc/admin-panel/images/Default.jpg',
					'Layout1'  => get_template_directory_uri() . '/inc/admin-panel/images/Layout1.jpg',
					'Layout2'  => get_template_directory_uri() . '/inc/admin-panel/images/Layout2.jpg',
				],
			] );

		Kirki::add_section( 'accesspresslite_call_to_actn', array(
		    'title'          => esc_html__( 'Call to Action', 'accesspress-lite' ),
		    'description'    => esc_html__( 'Setup call to action.', 'accesspress-lite' ),
		    'panel'          => 'accesspress_lite_hm_settings',
		    'priority'       => 20,
		) );

			Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'textarea',
				'settings'    => 'action_text',
				'label'       => esc_html__( 'CTA Title', 'accesspress-lite' ),
				'section'     => 'accesspresslite_call_to_actn',
				'priority'    => 10,
				'sanitize_callback' => 'accesspress_lite_sanitize_textarea',
            	'default'	=> ''
			] );

			Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'text',
				'settings'    => 'action_btn_text',
				'label'       => esc_html__( 'Read More Button Text', 'accesspress-lite' ),
				'section'     => 'accesspresslite_call_to_actn',
				'priority'    => 20,
            	'default'	=> '',
				'sanitize_callback' => 'sanitize_text_field',
			] );

			Kirki::add_field( 'accesspress_lite_config', [
				'type'     => 'link',
				'settings' => 'action_btn_link',
				'label'    => esc_html__( 'Read More Button link', 'accesspress-lite' ),
				'section'  => 'accesspresslite_call_to_actn',
				'default'  => '',
				'priority' => 30,
				'sanitize_callback' => 'esc_url_raw',
			] );

	Kirki::add_section( 'accesspresslite_welcom_post', array(
		    'title'          => esc_html__( 'Welcome Post', 'accesspress-lite' ),
		    'description'    => esc_html__( 'Setup welcome section.', 'accesspress-lite' ),
		    'panel'          => 'accesspress_lite_hm_settings',
		    'priority'       => 30,
		) );

			Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'select',
				'settings'    => 'welcome_post',
				'label'       => esc_html__( 'Welcome Post', 'accesspress-lite' ),
				'description' => esc_html__( 'Select post to show in welcome section.', 'accesspress-lite' ),
				'section'     => 'accesspresslite_welcom_post',
				'priority'    => 10,
            	'choices' => accesspress_lite_post_list(),
            	'sanitize_callback'	=> 'accesspress_lite_sanitize_post_lists',
			] );

			Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'switch',
				'settings'    => 'welcome_post_content',
				'label'       => esc_html__( 'Show Full Content?', 'accesspress-lite' ),
				'section'     => 'accesspresslite_welcom_post',
				'default'     => '1',
				'priority'    => 20,
				'choices'     => [
					true  => esc_html__( 'Enable', 'accesspress-lite' ),
					false => esc_html__( 'Disable', 'accesspress-lite' ),
				],
				'sanitize_callback'	=> 'accesspress_lite_sanitize_checkbox',
			] );

			Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'number',
				'settings'    => 'welcome_post_char',
				'label'       => esc_html__( 'Welcome Post Excerpt Character', 'accesspress-lite' ),
				'description' => esc_html__( 'Enter number to show post excerpt character in Welcome Section.', 'accesspress-lite' ),
				'section'     => 'accesspresslite_welcom_post',
				'default'     => 650,
            	'sanitize_callback'	=> 'accesspress_lite_sanitize_number',
				'priority'    => 30,
			] );

			Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'text',
				'settings'    => 'welcome_post_readmore',
				'label'       => esc_html__( 'Read More Text', 'accesspress-lite' ),
				'description' => esc_html__( 'Leave blank if you don\'t want to show read more.', 'accesspress-lite' ),
				'section'     => 'accesspresslite_welcom_post',
				'priority'    => 40,
            	'default'	=> '',
				'sanitize_callback' => 'sanitize_text_field',
			] );


	Kirki::add_section( 'accesspresslite_event_sect', array(
	    'title'          => esc_html__( 'Event Section', 'accesspress-lite' ),
	    'description'    => esc_html__( 'Setup Event section.', 'accesspress-lite' ),
	    'panel'          => 'accesspress_lite_hm_settings',
	    'priority'       => 40,
	) );

			Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'switch',
				'settings'    => 'disable_event',
				'label'       => esc_html__( 'Disable Event Section?', 'accesspress-lite' ),
				'description' => esc_html__( 'The welcome post will cover the full width if disabled.', 'accesspress-lite' ),
				'section'     => 'accesspresslite_event_sect',
				'default'     => '1',
				'priority'    => 10,
				'choices'     => [
					true  => esc_html__( 'Enable', 'accesspress-lite' ),
					false => esc_html__( 'Disable', 'accesspress-lite' ),
				],
				'sanitize_callback'	=> 'accesspress_lite_sanitize_checkbox',
			] );

			Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'number',
				'settings'    => 'show_event_number',
				'label'       => esc_html__( 'No of Items', 'accesspress-lite' ),
				'description' => esc_html__( 'No of Items to display in Event/News Category(Righ side of Welcome Post).', 'accesspress-lite' ),
				'section'     => 'accesspresslite_event_sect',
				'priority'    => 20,
            	'sanitize_callback'	=> 'accesspress_lite_sanitize_integer',
            	'default'	=> 3,
			] );

			Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'switch',
				'settings'    => 'show_eventdate',
				'label'       => esc_html__( 'Show Event Date?', 'accesspress-lite' ),
				'description' => esc_html__( 'Check to enable.', 'accesspress-lite' ),
				'section'     => 'accesspresslite_event_sect',
				'default'     => '1',
				'priority'    => 30,
				'choices'     => [
					true  => esc_html__( 'Enable', 'accesspress-lite' ),
					false => esc_html__( 'Disable', 'accesspress-lite' ),
				],
				'sanitize_callback'	=> 'accesspress_lite_sanitize_checkbox',
			] );

			Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'custom',
				'settings'    => 'accesspress_lite_custom',
				'section'     => 'accesspresslite_event_sect',
				'default'     => '<div style="padding: 10px;background-color: #ddd; color: #000; border-radius: 5px;">' . esc_html__( 'To replace the Event section in homepage, Go to widget and drag widget item into the Event Sidebar Widget area.', 'accesspress-lite' ) . '</div>',
				'priority'    => 40,
			] );

	Kirki::add_section( 'accesspresslite_feature_sect', array(
	    'title'          => esc_html__( 'Feature Section', 'accesspress-lite' ),
	    'description'    => esc_html__( 'Setup Feature section.', 'accesspress-lite' ),
	    'panel'          => 'accesspress_lite_hm_settings',
	    'priority'       => 50,
	) );

		Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'switch',
			'settings'    => 'show_fontawesome',
			'label'       => esc_html__( 'Show Font Awesome icon for Featured Post?', 'accesspress-lite' ),
			'description' => esc_html__( 'If enabled the featured image will be replaced by Font Awesome Icon.Go to Font Awesome Icon Page', 'accesspress-lite' ),
			'section'     => 'accesspresslite_feature_sect',
			'default'     => '1',
			'priority'    => 10,
			'choices'     => [
				true  => esc_html__( 'Enable', 'accesspress-lite' ),
				false => esc_html__( 'Disable', 'accesspress-lite' ),
			],
			'sanitize_callback'	=> 'accesspress_lite_sanitize_checkbox',
		] );

		Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'switch',
			'settings'    => 'big_icons',
			'label'       => esc_html__( 'Show Big Font Awesome Icon?', 'accesspress-lite' ),
			'description' => esc_html__( 'Show Big Font Awesome icon with center aligned.', 'accesspress-lite' ),
			'section'     => 'accesspresslite_feature_sect',
			'default'     => '1',
			'priority'    => 20,
			'choices'     => [
				true  => esc_html__( 'Enable', 'accesspress-lite' ),
				false => esc_html__( 'Disable', 'accesspress-lite' ),
			],
			'sanitize_callback'	=> 'accesspress_lite_sanitize_checkbox',
		] );

		Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'text',
				'settings'    => 'featured_section_title',
				'label'       => esc_html__( 'Feature Section Title', 'accesspress-lite' ),
				'section'     => 'accesspresslite_feature_sect',
				'priority'    => 30,
				'default'     => esc_html__( 'Feature Posts', 'accesspress-lite' ),
				'sanitize_callback' => 'sanitize_text_field',
			] );

		Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'select',
				'settings'    => 'featured_post1',
				'label'       => esc_html__( 'Feature Post 1', 'accesspress-lite' ),
				'section'     => 'accesspresslite_feature_sect',
				'priority'    => 40,
            	'choices' => accesspress_lite_post_list(),
            	'sanitize_callback'	=> 'accesspress_lite_sanitize_post_lists',
			] );

		Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'text',
				'settings'    => 'featured_post1_icon',
				'label'       => esc_html__( 'Font Awesome icon name', 'accesspress-lite' ),
				'description' => esc_html__( ' Example: fa-bell.', 'accesspress-lite' ),
				'section'     => 'accesspresslite_feature_sect',
				'priority'    => 50,
            	'default'	=> '',
				'sanitize_callback' => 'sanitize_text_field',
			] );

		Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'select',
				'settings'    => 'featured_post2',
				'label'       => esc_html__( 'Feature Post 2', 'accesspress-lite' ),
				'section'     => 'accesspresslite_feature_sect',
				'priority'    => 60,
            	'choices' => accesspress_lite_post_list(),
            	'sanitize_callback'	=> 'accesspress_lite_sanitize_post_lists',
			] );

		Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'text',
				'settings'    => 'featured_post2_icon',
				'label'       => esc_html__( 'Font Awesome icon name', 'accesspress-lite' ),
				'description' => esc_html__( ' Example: fa-bell.', 'accesspress-lite' ),
				'section'     => 'accesspresslite_feature_sect',
				'priority'    => 70,
            	'default'	=> '',
				'sanitize_callback' => 'sanitize_text_field',
			] );

		Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'select',
				'settings'    => 'featured_post3',
				'label'       => esc_html__( 'Feature Post 3', 'accesspress-lite' ),
				'section'     => 'accesspresslite_feature_sect',
				'priority'    => 80,
            	'choices' => accesspress_lite_post_list(),
            	'sanitize_callback'	=> 'accesspress_lite_sanitize_post_lists',
			] );

		Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'text',
			'settings'    => 'featured_post3_icon',
			'label'       => esc_html__( 'Font Awesome icon name', 'accesspress-lite' ),
			'description' => esc_html__( ' Example: fa-bell.', 'accesspress-lite' ),
			'section'     => 'accesspresslite_feature_sect',
			'priority'    => 90,
        	'default'	=> '',
			'sanitize_callback' => 'sanitize_text_field',
		] );

		Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'text',
			'settings'    => 'featured_post_readmore',
			'label'       => esc_html__( 'Read More Text', 'accesspress-lite' ),
			'description' => esc_html__( 'Leave blank if you don\'t want to show read more.', 'accesspress-lite' ),
			'section'     => 'accesspresslite_feature_sect',
			'priority'    => 90,
        	'default'	=> '',
			'sanitize_callback' => 'sanitize_text_field',
		] );		

	Kirki::add_section( 'accesspresslite_gallery_sect', array(
	    'title'          => esc_html__( 'Gallery Section', 'accesspress-lite' ),
	    'description'    => esc_html__( 'Setup Gallery section.', 'accesspress-lite' ),
	    'panel'          => 'accesspress_lite_hm_settings',
	    'priority'       => 60,
	) );

		Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'text',
			'settings'    => 'gallery_code',
			'label'       => esc_html__( 'Gallery Short Code', 'accesspress-lite' ),
			'description' => esc_html__( '[gallery link="file" ids="203,204,205,206,207,208"].', 'accesspress-lite' ),
			'section'     => 'accesspresslite_gallery_sect',
			'priority'    => 10,
        	'default'	=> '',
			'sanitize_callback' => 'sanitize_text_field',
		] );

		Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'custom',
			'settings'    => 'ap_gallery_custom',
			'section'     => 'accesspresslite_gallery_sect',
			'default'     => '<div style="padding: 10px;background-color: #ddd; color: #000; border-radius: 5px;">' . esc_html__( 'You can replace the gallery and testimonial section of the home page with custom widget here.', 'accesspress-lite' ) . '</div>',
			'priority'    => 20,
		] );

		Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'switch',
			'settings'    => 'featured_bar',
			'label'       => esc_html__( 'Disable Featured Bar (above footer)', 'accesspress-lite' ),
			'description' => esc_html__( 'check to disable', 'accesspress-lite' ),
			'section'     => 'accesspresslite_gallery_sect',
			'default'     => '1',
			'priority'    => 10,
			'choices'     => [
				true  => esc_html__( 'Enable', 'accesspress-lite' ),
				false => esc_html__( 'Disable', 'accesspress-lite' ),
			],
			'sanitize_callback'	=> 'accesspress_lite_sanitize_checkbox',
		] );	


	Kirki::add_section( 'accesspress_lite_slider_settings', array(
	    'priority'    => 20,
	    'title'          => esc_html__( 'Slider Setting', 'accesspress-lite' ),
	    'description'    => esc_html__( 'Setup Slider settings.', 'accesspress-lite' ),
	) );

		Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'radio',
			'settings'    => 'slider_options',
			'label'       => esc_html__( 'Show', 'accesspress-lite' ),
			'section'     => 'accesspress_lite_slider_settings',
			'default'     => 'single_post_slider',
			'priority'    => 10,
			'choices'     => [
				'single_post_slider'   => esc_html__( 'Single Posts as a Slider', 'accesspress-lite' ),
				'cat_post_slider' => esc_html__( 'Category Posts as a Slider', 'accesspress-lite' ),
			],
			'sanitize_callback'	=> 'accesspress_lite_sanitize_slider'
		] );

		Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'select',
			'settings'    => 'slider_cat',
			'label'       => esc_html__( 'Slider Category', 'accesspress-lite' ),
        	'default'	=> '',
			'description' => esc_html__( 'Select the category to show post in Slider Section.', 'accesspress-lite' ),
			'section'     => 'accesspress_lite_slider_settings',
			'priority'    => 20,
        	'choices' => accesspress_lite_category_lists(),
        	'sanitize_callback'	=> 'accesspress_lite_sanitize_category_lists',
        	'active_callback' => [
							[
								'setting'  => 'slider_options',
								'operator' => '==',
								'value'    => 'cat_post_slider',
							]
						],
		] );

		Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'select',
			'settings'    => 'slider1',
			'label'       => esc_html__( 'Silde 1', 'accesspress-lite' ),
			'description' => esc_html__( 'Choose post to show as Slider Post.', 'accesspress-lite' ),
			'section'     => 'accesspress_lite_slider_settings',
			'priority'    => 20,
        	'default'	=> '',
        	'choices' => accesspress_lite_post_list(),
        	'sanitize_callback'	=> 'accesspress_lite_sanitize_post_lists',
        	'active_callback' => [
							[
								'setting'  => 'slider_options',
								'operator' => '==',
								'value'    => 'single_post_slider',
							]
						],
		] );
		Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'select',
			'settings'    => 'slider2',
			'label'       => esc_html__( 'Silde 2', 'accesspress-lite' ),
        	'default'	=> '',
			'description' => esc_html__( 'Choose post to show as Slider Post.', 'accesspress-lite' ),
			'section'     => 'accesspress_lite_slider_settings',
			'priority'    => 25,
        	'choices' => accesspress_lite_post_list(),
        	'sanitize_callback'	=> 'accesspress_lite_sanitize_post_lists',
        	'active_callback' => [
							[
								'setting'  => 'slider_options',
								'operator' => '==',
								'value'    => 'single_post_slider',
							]
						],
		] );
		Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'select',
			'settings'    => 'slider3',
			'label'       => esc_html__( 'Silde 3', 'accesspress-lite' ),
        	'default'	=> '',
			'description' => esc_html__( 'Choose post to show as Slider Post.', 'accesspress-lite' ),
			'section'     => 'accesspress_lite_slider_settings',
			'priority'    => 30,
        	'choices' => accesspress_lite_post_list(),
        	'sanitize_callback'	=> 'accesspress_lite_sanitize_post_lists',
        	'active_callback' => [
							[
								'setting'  => 'slider_options',
								'operator' => '==',
								'value'    => 'single_post_slider',
							]
						],
		] );
		Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'select',
			'settings'    => 'slider4',
			'label'       => esc_html__( 'Silde 4', 'accesspress-lite' ),
        	'default'	=> '',
			'description' => esc_html__( 'Choose post to show as Slider Post.', 'accesspress-lite' ),
			'section'     => 'accesspress_lite_slider_settings',
			'priority'    => 35,
        	'choices' => accesspress_lite_post_list(),
        	'sanitize_callback'	=> 'accesspress_lite_sanitize_post_lists',
        	'active_callback' => [
							[
								'setting'  => 'slider_options',
								'operator' => '==',
								'value'    => 'single_post_slider',
							]
						],
		] );

		Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'select',
			'settings'    => 'slider_cat',
			'label'       => esc_html__( 'Slider Category', 'accesspress-lite' ),
        	'default'	=> '',
			'description' => esc_html__( 'Select the category to show post in Slider Section.', 'accesspress-lite' ),
			'section'     => 'accesspress_lite_slider_settings',
			'priority'    => 20,
        	'choices' => accesspress_lite_category_lists(),
        	'sanitize_callback'	=> 'accesspress_lite_sanitize_category_lists',
        	'active_callback' => [
							[
								'setting'  => 'slider_options',
								'operator' => '==',
								'value'    => 'cat_post_slider',
							]
						],
		] );

		Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'switch',
			'settings'    => 'show_slider',
			'label'       => esc_html__( 'Show Slider', 'accesspress-lite' ),
			'section'     => 'accesspress_lite_slider_settings',
			'default'     => 'yes',
			'priority'    => 40,
			'choices'     => array(
				'yes'  => esc_html__( 'Yes', 'accesspress-lite' ),
				'no' => esc_html__( 'No', 'accesspress-lite' ),
			),
			'sanitize_callback'	=> 'accesspress_lite_sanitize_yes_no',
		] );

		Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'switch',
			'settings'    => 'slider_show_pager',
			'label'       => esc_html__( 'Show Slider Pager (Navigation dots)', 'accesspress-lite' ),
			'section'     => 'accesspress_lite_slider_settings',
			'default'     => true,
			'priority'    => 40,
			'choices'     => array(
				'yes1'  => esc_html__( 'Yes', 'accesspress-lite' ),
				'no1' => esc_html__( 'No', 'accesspress-lite' ),
			),
			'sanitize_callback'	=> 'accesspress_lite_sanitize_yes1_no1',
		] );

		Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'switch',
			'settings'    => 'slider_show_controls',
			'label'       => esc_html__( 'Show Slider Controls (Arrows)', 'accesspress-lite' ),
			'section'     => 'accesspress_lite_slider_settings',
			'default'     => '1',
			'priority'    => 50,
			'choices'     => array(
				'yes2'  => esc_html__( 'Yes', 'accesspress-lite' ),
				'no2' => esc_html__( 'No', 'accesspress-lite' ),
			),
			'sanitize_callback'	=> 'accesspress_lite_sanitize_yes2_no2',
		] );

		Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'radio',
				'settings'    => 'slider_mode',
				'label'       => esc_html__( 'Slider Transition - fade/slide', 'accesspress-lite' ),
				'section'     => 'accesspress_lite_slider_settings',
				'default'     => 'fade',
				'priority'    => 60,
				'choices'     => [
					'fade'   => esc_html__( 'fade', 'accesspress-lite' ),
					'slide' => esc_html__( 'slide', 'accesspress-lite' ),
				],
				'sanitize_callback'	=> 'accesspress_lite_sanitize_sl_trsn'
			] );

		Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'switch',
			'settings'    => 'slider_auto',
			'label'       => esc_html__( 'Slider auto Transition', 'accesspress-lite' ),
			'section'     => 'accesspress_lite_slider_settings',
			'default'     => 'yes3',
			'priority'    => 70,
			'choices'     => array(
				'yes3'  => esc_html__( 'Yes', 'accesspress-lite' ),
				'no3' => esc_html__( 'No', 'accesspress-lite' ),
			),
			'sanitize_callback'	=> 'accesspress_lite_sanitize_yes3_no3',
		] );

		Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'text',
			'settings'    => 'slider_speed',
			'label'       => esc_html__( 'Slider Speed', 'accesspress-lite' ),
			'section'     => 'accesspress_lite_slider_settings',
			'priority'    => 80,
        	'default'	=> 500,
			'sanitize_callback' => 'sanitize_text_field',
		] );	

		Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'text',
			'settings'    => 'slider_pause',
			'label'       => esc_html__( 'Slider Pause', 'accesspress-lite' ),
			'section'     => 'accesspress_lite_slider_settings',
			'priority'    => 90,
        	'default'	=> 4000,
			'sanitize_callback' => 'sanitize_text_field',
		] );

		Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'switch',
			'settings'    => 'slider_caption',
			'label'       => esc_html__( 'Show Slider Captions', 'accesspress-lite' ),
			'section'     => 'accesspress_lite_slider_settings',
			'default'     => 1,
			'priority'    => 90,
			'choices'     => array(
				true  => esc_html__( 'Yes', 'accesspress-lite' ),
				false => esc_html__( 'No', 'accesspress-lite' ),
			),
		] );	
	

	Kirki::add_panel( 'accesspress_lite_sidebar_settings', array(
	    'priority'    => 60,
	    'title'       => esc_html__( 'Sidebar Settings', 'accesspress-lite' ),
	    'description' => esc_html__( 'Setup Slider Settings.', 'accesspress-lite' ),
	) );

		Kirki::add_section( 'accesspresslite_left_sd_settings', array(
		    'title'          => esc_html__( 'Left Sidebar Options', 'accesspress-lite' ),
		    'description'    => esc_html__( 'Setup left sidebar settings.', 'accesspress-lite' ),
		    'panel'          => 'accesspress_lite_sidebar_settings',
		    'priority'       => 10,
		) );

		Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'switch',
			'settings'    => 'leftsidebar_show_latest_events',
			'label'       => esc_html__( 'Show Latest Events?', 'accesspress-lite' ),
		    'description'    => esc_html__( 'Check to enable.', 'accesspress-lite' ),
			'section'     => 'accesspresslite_left_sd_settings',
			'default'     => '1',
			'priority'    => 30,
			'choices'     => [
				true  => esc_html__( 'Show', 'accesspress-lite' ),
				false => esc_html__( 'Hide', 'accesspress-lite' ),
			],
			'sanitize_callback'	=> 'accesspress_lite_sanitize_checkbox',
		] );

		Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'switch',
			'settings'    => 'leftsidebar_show_testimonials',
			'label'       => esc_html__( 'Show Testimonials?', 'accesspress-lite' ),
		    'description'    => esc_html__( 'Check to enable.', 'accesspress-lite' ),
			'section'     => 'accesspresslite_left_sd_settings',
			'default'     => '1',
			'priority'    => 30,
			'choices'     => [
				true  => esc_html__( 'Show', 'accesspress-lite' ),
				false => esc_html__( 'Hide', 'accesspress-lite' ),
			],
			'sanitize_callback'	=> 'accesspress_lite_sanitize_checkbox',
		] );

		Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'custom',
			'settings'    => 'accesspress_lite_ls_custom',
			'section'     => 'accesspresslite_left_sd_settings',
			'default'     => '<div style="padding: 10px;background-color: #ddd; color: #000; border-radius: 5px;">' . esc_html__( 'To add Custom widget in Left Sidebar, Go to Widget Section.', 'accesspress-lite' ) . '</div>',
			'priority'    => 40,
		] );

		Kirki::add_section( 'accesspresslite_right_sd_settings', array(
		    'title'          => esc_html__( 'Right Sidebar Options', 'accesspress-lite' ),
		    'description'    => esc_html__( 'Setup left sidebar settings.', 'accesspress-lite' ),
		    'panel'          => 'accesspress_lite_sidebar_settings',
		    'priority'       => 10,
		) );

		Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'switch',
			'settings'    => 'rightsidebar_show_latest_events',
			'label'       => esc_html__( 'Show Latest Events?', 'accesspress-lite' ),
		    'description'    => esc_html__( 'Check to enable.', 'accesspress-lite' ),
			'section'     => 'accesspresslite_right_sd_settings',
			'default'     => '1',
			'priority'    => 30,
			'choices'     => [
				true  => esc_html__( 'Show', 'accesspress-lite' ),
				false => esc_html__( 'Hide', 'accesspress-lite' ),
			],
			'sanitize_callback'	=> 'accesspress_lite_sanitize_checkbox',
		] );

		Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'switch',
			'settings'    => 'rightsidebar_show_testimonials',
			'label'       => esc_html__( 'Show Testimonials?', 'accesspress-lite' ),
		    'description'    => esc_html__( 'Check to enable.', 'accesspress-lite' ),
			'section'     => 'accesspresslite_right_sd_settings',
			'default'     => '1',
			'priority'    => 30,
			'choices'     => [
				true  => esc_html__( 'Show', 'accesspress-lite' ),
				false => esc_html__( 'Hide', 'accesspress-lite' ),
			],
			'sanitize_callback'	=> 'accesspress_lite_sanitize_checkbox',
		] );

		Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'custom',
			'settings'    => 'accesspress_lite_custom',
			'section'     => 'accesspresslite_right_sd_settings',
			'default'     => '<div style="padding: 10px;background-color: #ddd; color: #000; border-radius: 5px;">' . esc_html__( 'To add Custom widget in Left Sidebar, Go to Widget Section.', 'accesspress-lite' ) . '</div>',
			'priority'    => 40,
		] );

	Kirki::add_section( 'accesspresslite_other_settings', array(
		    'title'          => esc_html__( 'Other Options', 'accesspress-lite' ),
		    'description'    => esc_html__( 'Setup other settings.', 'accesspress-lite' ),
		    'panel'          => 'accesspress_lite_sidebar_settings',
		    'priority'       => 10,
		) );

		Kirki::add_field( 'accesspress_lite_config', [
				'type'        => 'text',
				'settings'    => 'view_all_text',
				'label'       => esc_html__( 'View All Text', 'accesspress-lite' ),
				'description' => esc_html__( 'Leave blank if you don\'t want to show View All Text', 'accesspress-lite' ),
				'section'     => 'accesspresslite_other_settings',
				'priority'    => 20,
            	'default'	=> '',
				'sanitize_callback' => 'sanitize_text_field',
			] );
    
    Kirki::add_section( 'accesspresslite_sc_icons_settings', array(
		    'title'          => esc_html__( 'Social Icons Options', 'accesspress-lite' ),
		    'description'    => esc_html__( 'Setup social icons settings.', 'accesspress-lite' ),
		    'panel'          => 'accesspress_lite_basic',
		    'priority'       => 40,
		) );

    	Kirki::add_field( 'accesspress_lite_config', [
			'type'        => 'switch',
			'settings'    => 'show_social_header',
			'label'       => esc_html__( 'Disable Social icons in header?', 'accesspress-lite' ),
			'description' => esc_html__( 'Put your social url below.. Leave blank if you don\'t want to show it.', 'accesspress-lite' ),
			'section'     => 'accesspresslite_sc_icons_settings',
			'default'     => false,
			'priority'    => 10,
			'sanitize_callback'	=> 'accesspress_lite_sanitize_checkbox',
			'choices'     => [
				true  => esc_html__( 'Yes', 'accesspress-lite' ),
				false => esc_html__( 'No', 'accesspress-lite' ),
			],
		] );

		Kirki::add_field( 'accesspress_lite_config', [
			'type'     => 'link',
			'settings' => 'accesspresslite_facebook',
			'label'    => esc_html__( 'Facebook', 'accesspress-lite' ),
			'section'  => 'accesspresslite_sc_icons_settings',
			'default'  => '',
			'priority' => 20,
			'sanitize_callback' => 'esc_url_raw',
		] );
		Kirki::add_field( 'accesspress_lite_config', [
			'type'     => 'link',
			'settings' => 'accesspresslite_twitter',
			'label'    => esc_html__( 'Twitter', 'accesspress-lite' ),
			'section'  => 'accesspresslite_sc_icons_settings',
			'default'  => '',
			'priority' => 30,
			'sanitize_callback' => 'esc_url_raw',
		] );
		Kirki::add_field( 'accesspress_lite_config', [
			'type'     => 'link',
			'settings' => 'accesspresslite_gplus',
			'label'    => esc_html__( 'Google Plus', 'accesspress-lite' ),
			'section'  => 'accesspresslite_sc_icons_settings',
			'default'  => '',
			'priority' => 40,
			'sanitize_callback' => 'esc_url_raw',
		] );
		Kirki::add_field( 'accesspress_lite_config', [
			'type'     => 'link',
			'settings' => 'accesspresslite_youtube',
			'label'    => esc_html__( 'Youtube', 'accesspress-lite' ),
			'section'  => 'accesspresslite_sc_icons_settings',
			'default'  => '',
			'priority' => 50,
			'sanitize_callback' => 'esc_url_raw',
		] );
		Kirki::add_field( 'accesspress_lite_config', [
			'type'     => 'link',
			'settings' => 'accesspresslite_pinterest',
			'label'    => esc_html__( 'Pinterest', 'accesspress-lite' ),
			'section'  => 'accesspresslite_sc_icons_settings',
			'default'  => 'https://www.pinterest.com/',
			'priority' => 60,
			'sanitize_callback' => 'esc_url_raw',
		] );
		Kirki::add_field( 'accesspress_lite_config', [
			'type'     => 'link',
			'settings' => 'accesspresslite_linkedin',
			'label'    => esc_html__( 'Linkedin', 'accesspress-lite' ),
			'section'  => 'accesspresslite_sc_icons_settings',
			'default'  => '',
			'priority' => 70,
			'sanitize_callback' => 'esc_url_raw',
		] );
		Kirki::add_field( 'accesspress_lite_config', [
			'type'     => 'link',
			'settings' => 'accesspresslite_flickr',
			'label'    => esc_html__( 'Flicker', 'accesspress-lite' ),
			'section'  => 'accesspresslite_sc_icons_settings',
			'default'  => '',
			'priority' => 80,
			'sanitize_callback' => 'esc_url_raw',
		] );
		Kirki::add_field( 'accesspress_lite_config', [
			'type'     => 'link',
			'settings' => 'accesspresslite_vimeo',
			'label'    => esc_html__( 'Vimeo', 'accesspress-lite' ),
			'section'  => 'accesspresslite_sc_icons_settings',
			'default'  => '',
			'priority' => 90,
			'sanitize_callback' => 'esc_url_raw',
		] );
		Kirki::add_field( 'accesspress_lite_config', [
			'type'     => 'link',
			'settings' => 'accesspresslite_stumbleupon',
			'label'    => esc_html__( 'Stumbleupon', 'accesspress-lite' ),
			'section'  => 'accesspresslite_sc_icons_settings',
			'default'  => '',
			'priority' => 100,
			'sanitize_callback' => 'esc_url_raw',
		] );
		Kirki::add_field( 'accesspress_lite_config', [
			'type'     => 'link',
			'settings' => 'accesspresslite_instagram',
			'label'    => esc_html__( 'Instagram', 'accesspress-lite' ),
			'section'  => 'accesspresslite_sc_icons_settings',
			'default'  => '',
			'priority' => 110,
			'sanitize_callback' => 'esc_url_raw',
		] );
		Kirki::add_field( 'accesspress_lite_config', [
			'type'     => 'link',
			'settings' => 'accesspresslite_sound_cloud',
			'label'    => esc_html__( 'Sound Cloud', 'accesspress-lite' ),
			'section'  => 'accesspresslite_sc_icons_settings',
			'default'  => '',
			'priority' => 120,
			'sanitize_callback' => 'esc_url_raw',
		] );
		Kirki::add_field( 'accesspress_lite_config', [
			'type'     => 'text',
			'settings' => 'accesspresslite_skype',
			'label'    => esc_html__( 'Skype', 'accesspress-lite' ),
			'section'  => 'accesspresslite_sc_icons_settings',
			'default'  => '',
			'priority' => 130,
			'sanitize_callback' => 'esc_url_raw',
		] );
		Kirki::add_field( 'accesspress_lite_config', [
			'type'     => 'text',
			'settings' => 'accesspresslite_tumblr',
			'label'    => esc_html__( 'Tumblr', 'accesspress-lite' ),
			'section'  => 'accesspresslite_sc_icons_settings',
			'default'  => '',
			'priority' => 140,
			'sanitize_callback' => 'esc_url_raw',
		] );
		Kirki::add_field( 'accesspress_lite_config', [
			'type'     => 'text',
			'settings' => 'accesspresslite_myspace',
			'label'    => esc_html__( 'Myspace', 'accesspress-lite' ),
			'section'  => 'accesspresslite_sc_icons_settings',
			'default'  => '',
			'priority' => 150,
			'sanitize_callback' => 'esc_url_raw',
		] );
		Kirki::add_field( 'accesspress_lite_config', [
			'type'     => 'link',
			'settings' => 'accesspresslite_rss',
			'label'    => esc_html__( 'Rss', 'accesspress-lite' ),
			'section'  => 'accesspresslite_sc_icons_settings',
			'default'  => '',
			'priority' => 160,
			'sanitize_callback' => 'esc_url_raw',
		] );

	

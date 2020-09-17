<?php 
	Kirki::add_config( 'accesspress_root_config', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'option',
		'option_name'	=> 'accesspress-root'
	) );
	Kirki::add_panel( 'accesspress_root_general', array(
	    'priority'    => 40,
	    'title'       => esc_html__( 'General Settings', 'accesspress-root' ),
	    'description' => esc_html__( 'Setup General Settings.', 'accesspress-root' ),
	) );
		Kirki::add_section( 'accesspress_root_design', array(
		    'title'          => esc_html__( 'Design Settings', 'accesspress-root' ),
		    'description'    => esc_html__( 'Setup website layout.', 'accesspress-root' ),
		    'panel'          => 'accesspress_root_general',
		    'priority'       => 10,
		) );
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'radio_buttonset',
					'settings'    => 'web_layout',
					'label'       => esc_html__( 'Web Layout', 'accesspress-root' ),
					'section'     => 'accesspress_root_design',
					'default'     => 'full-width',
					'priority'    => 20,
					'choices'     => 
					array(
						'full-width'   => esc_html__( 'Full Width', 'accesspress-root' ),
						'boxed' => esc_html__( 'Boxed', 'accesspress-root' ),
						),					
					'sanitize_callback'	=> 'accesspress_root_sanitize_weblayout'
					)
				);		
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'responsive',
					'label'       => esc_html__( 'Enable Responsive', 'accesspress-root' ),
					'section'     => 'accesspress_root_design',
					'default'     => true,
					'priority'    => 10,
					'choices'     => 
					array(
						true  => esc_html__( 'Enable', 'accesspress-root' ),
						false => esc_html__( 'Disable', 'accesspress-root' ),
						),					
					'sanitize_callback'	=> 'accesspress_root_sanitize_checkbox',
					)
				);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'color',
					'settings'    => 'template_color',
					'label'       => esc_html__( 'Template Color', 'accesspress-root' ),
					'description' => esc_html__( 'Choose template color of the theme.', 'accesspress-root' ),
					'section'     => 'accesspress_root_design',
					'default'     => '#1eb0bc',
					'priority'    => 30,
	            	'sanitize_callback'	=> 'sanitize_hex_color',
					)
				);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'radio-buttonset',
					'settings'    => 'page_background_option',
					'label'       => esc_html__( 'Background Type', 'accesspress-root' ),
					'section'     => 'accesspress_root_design',
					'default'     => 'none',
					'priority'    => 40,
					'choices'     => 
					array(
						'none' => esc_html__( 'None', 'accesspress-root'),
						'image'   => esc_html__( 'Image', 'accesspress-root' ),
						'color' => esc_html__( 'Color', 'accesspress-root' ),
						'pattern' => esc_html__( 'Pattern', 'accesspress-root' ),
						),					
					'sanitize_callback'	=> 'accesspress_root_sanitize_background_type'
					)
				);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'color',
					'settings'    => 'page_background_color',
					'label'       => esc_html__( 'Background Color', 'accesspress-root' ),
					'description' => esc_html__( 'Choose template color of the theme.', 'accesspress-root' ),
					'section'     => 'accesspress_root_design',
					'default'     => '#ff0a0a',
					'priority'    => 50,
	            	'sanitize_callback'	=> 'sanitize_hex_color',
	            	'active_callback' => 
	            	array(						
						array(
							'setting'  => 'page_background_option',
							'operator' => '==',
							'value'    => 'color',
							),												
						)
					)
				);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'background',
					'settings'    => 'page_background_image',
					'label'       => esc_html__( 'Section Background', 'accesspress-root' ),
					'description' => esc_html__( 'Select image to show image in background.', 'accesspress-root' ),
					'section'     => 'accesspress_root_design',
					'priority'    => 60,
					'default'     => 
					array(
						'background-color'      => 'rgba(20,20,20,.8)',
						'background-image'      => '',
						'background-repeat'     => 'repeat',
						'background-position'   => 'center center',
						'background-size'       => 'cover',
						'background-attachment' => 'scroll',
						),					
	            	'active_callback' => 
	            	array(					
						array(
							'setting'  => 'page_background_option',
							'operator' => '==',
							'value'    => 'image',
							),
						)
					)
				);
			$imagepath =  get_template_directory_uri() . '/inc/panel/images/';
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'radio-image',
					'settings'    => 'page_background_pattern',
					'label'       => esc_html__( 'Background Pattern', 'accesspress-root' ),
					'description' => esc_html__( 'Choose background pattern to set background of the theme.', 'accesspress-root' ),
					'section'     => 'accesspress_root_design',
					'default'     => 'pattern1',
					'choices'     => array(
							'pattern1' => $imagepath . 'patterns/80X80/pattern1.png',  
							'pattern2' => $imagepath . 'patterns/80X80/pattern2.png', 
							'pattern3' => $imagepath . 'patterns/80X80/pattern3.png',
					        'pattern4' => $imagepath . 'patterns/80X80/pattern4.png',  
							'pattern5' => $imagepath . 'patterns/80X80/pattern5.png', 
							'pattern6' => $imagepath . 'patterns/80X80/pattern6.png'
							),					
					'priority'    => 70,
	            	'active_callback' => array(
							array(
								'setting'  => 'page_background_option',
								'operator' => '==',
								'value'    => 'pattern',
								),											
						),
	            	'sanitize_callback'	=> 'accesspress_root_sanitize_pattern',
					)
				);

		Kirki::add_section( 'accesspress_root_header', array(
		    'title'          => esc_html__( 'Header Settings', 'accesspress-root' ),
		    'description'    => esc_html__( 'Setup header Settings.', 'accesspress-root' ),
		    'panel'          => 'accesspress_root_general',
		    'priority'       => 20,
		) );
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'radio-buttonset',
					'settings'    => 'logo_setting',
					'label'       => esc_html__( 'Logo Settings', 'accesspress-root' ),
					'section'     => 'accesspress_root_header',
					'default'     => 'image_text',
					'priority'    => 20,
					'choices'     => array(
							'image'   => esc_html__( 'Image', 'accesspress-root' ),
							'text' => esc_html__( 'Text', 'accesspress-root' ),
							'image_text'   => esc_html__( 'Image & Text', 'accesspress-root' ),
						),					
					'sanitize_callback'	=> 'accesspress_root_sanitize_logo'
					)
				);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'upload',
					'settings'    => 'logo',
					'label'       => esc_html__( 'Upload Logo', 'accesspress-root' ),
					'description' => esc_html__( 'Upload image for logo.', 'accesspress-root' ),
					'section'     => 'accesspress_root_header',
					'priority'    => 20,
		        	'default'	=> '',
		        	'sanitize_callback'	=> 'esc_url_raw',
				)
			);
			
		Kirki::add_section( 'accesspress_root_single_post', array(
		    'title'          => esc_html__( 'Single Post', 'accesspress-root' ),
		    'description'    => esc_html__( 'Setup Single Post Settings.', 'accesspress-root' ),
		    'panel'          => 'accesspress_root_general',
		    'priority'       => 30,
		) );
			
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'radio-image',
					'settings'    => 'single_post_layout',
					'label'       => esc_html__( 'Single Post Layout', 'accesspress-root' ),
					'description' => esc_html__( 'Choose layout of single post.', 'accesspress-root' ),
					'section'     => 'accesspress_root_single_post',
					'default'     => 'pattern1',
					'choices'     => array(
							'left-sidebar' => $imagepath . 'left-sidebar.png',  
							'right-sidebar' => $imagepath . 'right-sidebar.png', 
							'both-sidebar' => $imagepath . 'both-sidebar.png',
					        'no-sidebar' => $imagepath . 'no-sidebar.png',
						),					
					'priority'    => 70,
	            	'sanitize_callback'	=> 'accesspress_root_sanitize_sidebar',
					)
				);
			
		Kirki::add_section( 'accesspress_root_single_page', array(
		    'title'          => esc_html__( 'Single Page', 'accesspress-root' ),
		    'description'    => esc_html__( 'Setup Single Page Settings.', 'accesspress-root' ),
		    'panel'          => 'accesspress_root_general',
		    'priority'       => 30,
		) );
			
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'radio-image',
					'settings'    => 'single_page_layout',
					'label'       => esc_html__( 'Single Page Layout', 'accesspress-root' ),
					'description' => esc_html__( 'Choose layout of single page.', 'accesspress-root' ),
					'section'     => 'accesspress_root_single_page',
					'default'     => 'left-sidebar',
					'choices'     => array(
						'left-sidebar' => $imagepath . 'left-sidebar.png',  
						'right-sidebar' => $imagepath . 'right-sidebar.png', 
						'both-sidebar' => $imagepath . 'both-sidebar.png',
				        'no-sidebar' => $imagepath . 'no-sidebar.png',
						),					
					'priority'    => 70,
	            	'sanitize_callback'	=> 'accesspress_root_sanitize_sidebar',
					)
				);
			
		Kirki::add_section( 'accesspress_root_archive_page', array(
		    'title'          => esc_html__( 'Archive Post', 'accesspress-root' ),
		    'description'    => esc_html__( 'Setup Archive Page Settings.', 'accesspress-root' ),
		    'panel'          => 'accesspress_root_general',
		    'priority'       => 30,
		) );
			
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'radio-image',
					'settings'    => 'archive_page_layout',
					'label'       => esc_html__( 'Archive Page Layout', 'accesspress-root' ),
					'description' => esc_html__( 'Choose layout of archive page.', 'accesspress-root' ),
					'section'     => 'accesspress_root_archive_page',
					'default'     => 'pattern1',
					'choices'     => 
					array(
						'left-sidebar' => $imagepath . 'left-sidebar.png',  
						'right-sidebar' => $imagepath . 'right-sidebar.png', 
						'both-sidebar' => $imagepath . 'both-sidebar.png',
				        'no-sidebar' => $imagepath . 'no-sidebar.png',
						),					
					'priority'    => 70,
	            	'sanitize_callback'	=> 'accesspress_root_sanitize_sidebar',
					)
				);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'radio-buttonset',
					'settings'    => 'blog_post_layout',
					'label'       => esc_html__( 'Blog Post Layout', 'accesspress-root' ),
					'description' => esc_html__( 'Choose layout of Blog Post Layout.', 'accesspress-root' ),
					'section'     => 'accesspress_root_archive_page',
					'default'     => 'left-sidebar',
					'choices'     => 
					array(
						'blog_layout1' => esc_html__( 'Blog with Large Image', 'accesspress-root'),  
						'blog_layout2' => esc_html__( 'Blog with Medium Image', 'accesspress-root'), 
						'blog_layout3' => esc_html__( 'Blog Image Alternate Medium', 'accesspress-root'),
				        'blog_layout4' => esc_html__( 'Blog Full Content', 'accesspress-root'),
						),					
					'priority'    => 70,
	            	'sanitize_callback'	=> 'accesspress_root_sanitize_blog',
					)
				);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'multicheck',
					'settings'    => 'exclude_from_blog',
					'label'       => esc_html__( 'Exclude From Blog', 'accesspress-root' ),
					'description' => esc_html__( 'Check the categories to exclude from blog page.', 'accesspress-root' ),
					'section'     => 'accesspress_root_archive_page',
					'priority'    => 10,
	            	'choices' 	=> accesspress_root_category_lists(),
	            	'default'	=> array(),
	            	'sanitize_callback'	=> 'accesspress_root_sanitize_category_lists',
					)
				);
	Kirki::add_section( 'accesspress_root_footer_settings', array(
		    'title'          => esc_html__( 'Footer Options', 'accesspress-root' ),
		    'description'    => esc_html__( 'Setup Footer Settings.', 'accesspress-root' ),
		    'priority'       => 90,
		) );

		Kirki::add_field( 'accesspress_root_config', 
			array(
				'type'        => 'text',
				'settings'    => 'accesspress_root_footer_cp_options',
				'label'       => esc_html__( 'Footer Copyright', 'accesspress-root' ),
				'section'     => 'accesspress_root_footer_settings',
				'priority'    => 10,
            	'sanitize_callback'	=> 'sanitize_text_field',
				)
			);

	Kirki::add_panel( 'accesspress_root_homepage', array(
	    'priority'    => 50,
	    'title'          => esc_html__( 'Setup Homepage', 'accesspress-root' ),
	    'description'    => esc_html__( 'Setup homepage settings.', 'accesspress-root' ),
	) );
		Kirki::add_section( 'accesspress_root_text_slider', array(
		    'title'         => esc_html__( 'Text Slider', 'accesspress-root' ),
		    'description'   => esc_html__( 'Setup Text Slider Section settings.', 'accesspress-root' ),
		    'priority'      => accesspress_root_get_section_position('text_slider'),
		    'panel'			=>	'accesspress_root_homepage'
		) );
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'select',
					'settings'    => 'text_slider_cat',
					'label'       => esc_html__( 'text Category', 'accesspress-root' ),
					'description' => esc_html__( 'Select the category to show post in Text slider Section.', 'accesspress-root' ),
					'section'     => 'accesspress_root_text_slider',
					'priority'    => 10,
	            	'choices' => accesspress_root_category_lists(),
	            	'sanitize_callback'	=> 'accesspress_root_sanitize_category_lists',
	            	'default'	=> array(),
					)
				);
		Kirki::add_section( 'accesspress_root_call_to_action', array(
		    'title'         => esc_html__( 'Call to Action', 'accesspress-root' ),
		    'description'   => esc_html__( 'Setup Call to Action Section settings.', 'accesspress-root' ),
		    'priority'      => accesspress_root_get_section_position('call_to_action'),
		    'panel'			=>	'accesspress_root_homepage'
		) );
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'text',
					'settings'    => 'call_to_action_title',
					'label'       => esc_html__( 'Call to Action Title', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to show title in call to action.', 'accesspress-root' ),
					'section'     => 'accesspress_root_call_to_action',
					'priority'    => 10,
					'default'		=> esc_html__('AccessPress Root', 'accesspress-root'),
	            	'sanitize_callback'	=> 'sanitize_text_field',
					)
				);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'textarea',
					'settings'    => 'call_to_action_desc',
					'label'       => esc_html__( 'Call to Action Title', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to show title in call to action.', 'accesspress-root' ),
					'section'     => 'accesspress_root_call_to_action',
					'priority'    => 20,
					'default'		=> '',
	            	'sanitize_callback'	=> 'accesspress_root_sanitize_textarea',
					)
				);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'text',
					'settings'    => 'call_to_action_button_text',
					'label'       => esc_html__( 'Button Text', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to change text of button in Call to Action Section.', 'accesspress-root' ),
					'section'     => 'accesspress_root_call_to_action',
					'priority'    => 40,
					'default'	  => esc_html__('Download Now', 'accesspress-root'),
					'sanitize_callback' => 'sanitize_text_field',
					)
				);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'link',
					'settings'    => 'call_to_action_link',
					'label'       => esc_html__( 'Button Link', 'accesspress-root' ),
					'description' => esc_html__( 'Enter link to change link of button in Call to Action Section.', 'accesspress-root' ),
					'section'     => 'accesspress_root_call_to_action',
					'priority'    => 50,
					'default'	  => '',
					'sanitize_callback' => 'esc_url_raw',
					)
				);
		Kirki::add_section( 'accesspress_root_feature_block', array(
		    'title'         => esc_html__( 'Featured Post', 'accesspress-root' ),
		    'description'   => esc_html__( 'Setup Featured Section settings.', 'accesspress-root' ),
		    'priority'      => accesspress_root_get_section_position('feature_block'),
		    'panel'			=>	'accesspress_root_homepage'
		) );
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'text',
					'settings'    => 'feature_title',
					'label'       => esc_html__( 'Featured Title', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to change title of Featured Section.', 'accesspress-root' ),
					'section'     => 'accesspress_root_feature_block',
					'priority'    => 10,
					'sanitize_callback' => 'sanitize_text_field',
					)
				);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'textarea',
					'settings'    => 'feature_desc',
					'label'       => esc_html__( 'Featured Description', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to change description of Featured Section.', 'accesspress-root' ),
					'section'     => 'accesspress_root_feature_block',
					'priority'    => 20,
					'sanitize_callback' => 'accesspress_root_sanitize_textarea',
					)
				);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'select',
					'settings'    => 'feature1',
					'label'       => esc_html__( 'Featured Post 1', 'accesspress-root' ),
					'description' => esc_html__( 'Choose post to show as 1st Featured Post.', 'accesspress-root' ),
					'section'     => 'accesspress_root_feature_block',
					'priority'    => 40,
	            	'choices' => accesspress_root_page_list(),
	            	'sanitize_callback'	=> 'accesspress_root_sanitize_page_lists',
	            	'default'	=> ''
					)
				);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'select',
					'settings'    => 'feature2',
					'label'       => esc_html__( 'Featured Post 2', 'accesspress-root' ),
					'description' => esc_html__( 'Choose post to show as 2nd Featured Post.', 'accesspress-root' ),
					'section'     => 'accesspress_root_feature_block',
					'priority'    => 60,
	            	'choices' => accesspress_root_page_list(),
	            	'sanitize_callback'	=> 'accesspress_root_sanitize_page_lists',
	            	'default'	=> ''
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'select',
					'settings'    => 'feature3',
					'label'       => esc_html__( 'Featured Post 3', 'accesspress-root' ),
					'description' => esc_html__( 'Choose post to show as 3rd Featured Post.', 'accesspress-root' ),
					'section'     => 'accesspress_root_feature_block',
					'priority'    => 80,
	            	'choices' => accesspress_root_page_list(),
	            	'sanitize_callback'	=> 'accesspress_root_sanitize_page_lists',
	            	'default'	=> ''
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'select',
					'settings'    => 'feature4',
					'label'       => esc_html__( 'Featured Post 4', 'accesspress-root' ),
					'description' => esc_html__( 'Choose post to show as 4th Featured Post.', 'accesspress-root' ),
					'section'     => 'accesspress_root_feature_block',
					'priority'    => 100,
	            	'choices' => accesspress_root_page_list(),
	            	'sanitize_callback'	=> 'accesspress_root_sanitize_page_lists',
	            	'default'	=> ''
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'text',
					'settings'    => 'feature_readmore',
					'label'       => esc_html__( 'Read More Text', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to change text of Read More button in Featured Section.', 'accesspress-root' ),
					'section'     => 'accesspress_root_feature_block',
					'priority'    => 120,
					'default'	  => esc_html__('Read More', 'accesspress-root'),
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
		Kirki::add_section( 'accesspress_root_service_block', array(
		    'title'         => esc_html__( 'Service Section', 'accesspress-root' ),
		    'description'   => esc_html__( 'Setup Service Section settings.', 'accesspress-root' ),
		    'priority'      => accesspress_root_get_section_position('service_block'),
		    'panel'			=>	'accesspress_root_homepage'
		) );
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'text',
					'settings'    => 'service_title',
					'label'       => esc_html__( 'Service', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to change title of Service.', 'accesspress-root' ),
					'section'     => 'accesspress_root_service_block',
					'priority'    => 10,
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'textarea',
					'settings'    => 'service_desc',
					'label'       => esc_html__( 'Service', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to change description of Service.', 'accesspress-root' ),
					'section'     => 'accesspress_root_service_block',
					'priority'    => 20,
					'sanitize_callback' => 'accesspress_root_sanitize_textarea',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'select',
					'settings'    => 'service1',
					'label'       => esc_html__( 'Service 1', 'accesspress-root' ),
					'description' => esc_html__( 'Choose post to show as 1st Service.', 'accesspress-root' ),
					'section'     => 'accesspress_root_service_block',
					'priority'    => 40,
	            	'choices' => accesspress_root_page_list(),
	            	'sanitize_callback'	=> 'accesspress_root_sanitize_page_lists',
	            	'default'	=> ''
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'select',
					'settings'    => 'service2',
					'label'       => esc_html__( 'Service 2', 'accesspress-root' ),
					'description' => esc_html__( 'Choose post to show as 2nd Service.', 'accesspress-root' ),
					'section'     => 'accesspress_root_service_block',
					'priority'    => 60,
	            	'choices' => accesspress_root_page_list(),
	            	'sanitize_callback'	=> 'accesspress_root_sanitize_page_lists',
	            	'default'	=> ''
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'select',
					'settings'    => 'service3',
					'label'       => esc_html__( 'Service 3', 'accesspress-root' ),
					'description' => esc_html__( 'Choose post to show as 3rd Service.', 'accesspress-root' ),
					'section'     => 'accesspress_root_service_block',
					'priority'    => 80,
	            	'choices' => accesspress_root_page_list(),
	            	'sanitize_callback'	=> 'accesspress_root_sanitize_page_lists',
	            	'default'	=> ''
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'select',
					'settings'    => 'service4',
					'label'       => esc_html__( 'Service 4', 'accesspress-root' ),
					'description' => esc_html__( 'Choose post to show as 4th Service.', 'accesspress-root' ),
					'section'     => 'accesspress_root_service_block',
					'priority'    => 100,
	            	'choices' => accesspress_root_page_list(),
	            	'sanitize_callback'	=> 'accesspress_root_sanitize_page_lists',
	            	'default'	=> ''
				)
			);

		Kirki::add_section( 'accesspress_root_latest_post_block', array(
		    'title'         => esc_html__( 'Latest Post', 'accesspress-root' ),
		    'description'   => esc_html__( 'Setup Latest Section settings.', 'accesspress-root' ),
		    'priority'      => accesspress_root_get_section_position('latest_post_block'),
		    'panel'			=>	'accesspress_root_homepage'
		) );
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'text',
					'settings'    => 'latest_post_title',
					'label'       => esc_html__( 'Title', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to change title of Latest Section.', 'accesspress-root' ),
					'section'     => 'accesspress_root_latest_post_block',
					'priority'    => 10,
					'sanitize_callback' => 'sanitize_text_field',
	            	'default'	=> esc_html('Latest Posts')
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'textarea',
					'settings'    => 'latest_post_desc',
					'label'       => esc_html__( 'Description', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to change description of Latest Section.', 'accesspress-root' ),
					'section'     => 'accesspress_root_latest_post_block',
					'priority'    => 20,
					'sanitize_callback' => 'accesspress_root_sanitize_textarea',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'number',
					'settings'    => 'latest_post_count',
					'label'       => esc_html__( 'No. of Post', 'accesspress-root' ),
					'description' => esc_html__( 'Enter number to how total post in Latest Post Section.', 'accesspress-root' ),
					'section'     => 'accesspress_root_latest_post_block',
					'default'	  => '2',
					'priority'    => 30,
		        	'sanitize_callback'	=> 'accesspress_root_sanitize_integer',
				)
			);

		Kirki::add_section( 'accesspress_root_project_block', array(
		    'title'         => esc_html__( 'Project', 'accesspress-root' ),
		    'description'   => esc_html__( 'Setup Project Section settings.', 'accesspress-root' ),
		    'priority'      => accesspress_root_get_section_position('project_block'),
		    'panel'			=>	'accesspress_root_homepage'
		) );
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'select',
					'settings'    => 'project',
					'label'       => esc_html__( 'Choose Page', 'accesspress-root' ),
					'description' => esc_html__( 'Choose page to show project title and desc in project section.', 'accesspress-root' ),
					'section'     => 'accesspress_root_project_block',
					'priority'    => 10,
	            	'choices' => accesspress_root_page_list(),
	            	'sanitize_callback'	=> 'accesspress_root_sanitize_page_lists',
	            	'default'	=> ''
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'text',
					'settings'    => 'project_readmore',
					'label'       => esc_html__( 'Read More Text', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to change text of Read More button in Project Section.', 'accesspress-root' ),
					'section'     => 'accesspress_root_project_block',
					'priority'    => 20,
					'default'	  => esc_html__('Read More', 'accesspress-root'),
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'select',
					'settings'    => 'project_cat',
					'label'       => esc_html__( 'Project Category', 'accesspress-root' ),
					'description' => esc_html__( 'Select the category to show post in Project Section.', 'accesspress-root' ),
					'section'     => 'accesspress_root_project_block',
					'priority'    => 30,
	            	'choices' => accesspress_root_category_lists(),
	            	'sanitize_callback'	=> 'accesspress_root_sanitize_category_lists',
	            	'default'	=> array()
				)
			);

		Kirki::add_section( 'accesspress_root_testimonial_slider', array(
		    'title'         => esc_html__( 'Testimonial', 'accesspress-root' ),
		    'description'   => esc_html__( 'Setup Testimonial Section settings.', 'accesspress-root' ),
		    'priority'      => accesspress_root_get_section_position('testimonial_slider'),
		    'panel'			=>	'accesspress_root_homepage'
		) );
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'text',
					'settings'    => 'testimonial_title',
					'label'       => esc_html__( 'Title', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to change title of Latest Section.', 'accesspress-root' ),
					'section'     => 'accesspress_root_testimonial_slider',
					'priority'    => 20,
					'sanitize_callback' => 'sanitize_text_field',
	            	'default'	=> esc_html('Latest Posts')
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'textarea',
					'settings'    => 'testimonial_desc',
					'label'       => esc_html__( 'Description', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to change description of Latest Section.', 'accesspress-root' ),
					'section'     => 'accesspress_root_testimonial_slider',
					'priority'    => 20,
					'sanitize_callback' => 'accesspress_root_sanitize_textarea',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'select',
					'settings'    => 'testimonial_slider_cat',
					'label'       => esc_html__( 'Testimonial Category', 'accesspress-root' ),
					'description' => esc_html__( 'Select the category to show post in Testimonial Section.', 'accesspress-root' ),
					'section'     => 'accesspress_root_testimonial_slider',
					'priority'    => 20,
	            	'choices' => accesspress_root_category_lists(),
	            	'sanitize_callback'	=> 'accesspress_root_sanitize_category_lists',
	            	'default'	=> array()
				)
			);
	Kirki::add_panel( 'accesspress_root_slider', array(
	    'priority'    => 80,
	    'title'          => esc_html__( 'Slider Section', 'accesspress-root' ),
	    'description'    => esc_html__( 'Setup Slider settings.', 'accesspress-root' ),
	) );
		Kirki::add_section( 'accesspress_root_slide1', array(
		    'priority'    => 10,
		    'panel'    => 'accesspress_root_slider',
		    'title'          => esc_html__( 'Slide 1', 'accesspress-root' ),
		    'description'    => esc_html__( 'Setup Slider Slides.', 'accesspress-root' ),
		) );
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'upload',
					'settings'    => 'slider_image1',
					'label'       => esc_html__( 'Image', 'accesspress-root' ),
					'description' => esc_html__( 'Upload image for 1st slides of Slider.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slide1',
					'priority'    => 20,
		        	'default'	=> '',
		        	'sanitize_callback'	=> 'esc_url_raw',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'text',
					'settings'    => 'slider_title1',
					'label'       => esc_html__( 'Title', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to change title of 1st slides.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slide1',
					'priority'    => 20,
		        	'default'	=> '',
		        	'sanitize_callback'	=> 'sanitize_text_field',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'textarea',
					'settings'    => 'slider_desc1',
					'label'       => esc_html__( 'Description', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to change description of 1st slides.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slide1',
					'priority'    => 20,
		        	'default'	=> '',
		        	'sanitize_callback'	=> 'accesspress_root_sanitize_textarea',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'text',
					'settings'    => 'slider_button_text1',
					'label'       => esc_html__( 'Button Text', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to change text of button of 1st slides.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slide1',
					'priority'    => 20,
		        	'default'	=> '',
		        	'sanitize_callback'	=> 'sanitize_text_field',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'link',
					'settings'    => 'slider_button_link1',
					'label'       => esc_html__( 'Button Link', 'accesspress-root' ),
					'description' => esc_html__( 'Enter link to change link of button of 1st slides.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slide1',
					'priority'    => 20,
		        	'default'	=> '',
		        	'sanitize_callback'	=> 'esc_url_raw',
				)
			);
		Kirki::add_section( 'accesspress_root_slide2', array(
		    'priority'    => 10,
		    'panel'    => 'accesspress_root_slider',
		    'title'          => esc_html__( 'Slide 2', 'accesspress-root' ),
		    'description'    => esc_html__( 'Setup Slider Slides.', 'accesspress-root' ),
		) );
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'upload',
					'settings'    => 'slider_image2',
					'label'       => esc_html__( 'Image', 'accesspress-root' ),
					'description' => esc_html__( 'Upload image for 2nd slides of Slider.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slide2',
					'priority'    => 20,
		        	'default'	=> '',
		        	'sanitize_callback'	=> 'esc_url_raw',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'text',
					'settings'    => 'slider_title2',
					'label'       => esc_html__( 'Title', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to change title of 2nd slides.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slide2',
					'priority'    => 20,
		        	'default'	=> '',
		        	'sanitize_callback'	=> 'sanitize_text_field',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'textarea',
					'settings'    => 'slider_desc2',
					'label'       => esc_html__( 'Description', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to change description of 2nd slides.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slide2',
					'priority'    => 20,
		        	'default'	=> '',
		        	'sanitize_callback'	=> 'accesspress_root_sanitize_textarea',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'text',
					'settings'    => 'slider_button_text2',
					'label'       => esc_html__( 'Button Text', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to change text of button of 2nd slides.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slide2',
					'priority'    => 20,
		        	'default'	=> '',
		        	'sanitize_callback'	=> 'sanitize_text_field',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'link',
					'settings'    => 'slider_button_link2',
					'label'       => esc_html__( 'Button Link', 'accesspress-root' ),
					'description' => esc_html__( 'Enter link to change link of button of 2nd slides.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slide2',
					'priority'    => 20,
		        	'default'	=> '',
		        	'sanitize_callback'	=> 'esc_url_raw',
				)
			);
		Kirki::add_section( 'accesspress_root_slide3', array(
		    'priority'    => 10,
		    'panel'    => 'accesspress_root_slider',
		    'title'          => esc_html__( 'Slide 3', 'accesspress-root' ),
		    'description'    => esc_html__( 'Setup Slider Slides.', 'accesspress-root' ),
		) );
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'upload',
					'settings'    => 'slider_image3',
					'label'       => esc_html__( 'Image', 'accesspress-root' ),
					'description' => esc_html__( 'Upload image for 3rd slides of Slider.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slide3',
					'priority'    => 20,
		        	'default'	=> '',
		        	'sanitize_callback'	=> 'esc_url_raw',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'text',
					'settings'    => 'slider_title3',
					'label'       => esc_html__( 'Title', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to change title of 3rd slides.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slide3',
					'priority'    => 20,
		        	'default'	=> '',
		        	'sanitize_callback'	=> 'sanitize_text_field',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'textarea',
					'settings'    => 'slider_desc3',
					'label'       => esc_html__( 'Description', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to change description of 3rd slides.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slide3',
					'priority'    => 20,
		        	'default'	=> '',
		        	'sanitize_callback'	=> 'accesspress_root_sanitize_textarea',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'text',
					'settings'    => 'slider_button_text3',
					'label'       => esc_html__( 'Button Text', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to change text of button of 3rd slides.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slide3',
					'priority'    => 20,
		        	'default'	=> '',
		        	'sanitize_callback'	=> 'sanitize_text_field',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'link',
					'settings'    => 'slider_button_link3',
					'label'       => esc_html__( 'Button Link', 'accesspress-root' ),
					'description' => esc_html__( 'Enter link to change link of button of 3rd slides.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slide3',
					'priority'    => 20,
		        	'default'	=> '',
		        	'sanitize_callback'	=> 'esc_url_raw',
				)
			);
		Kirki::add_section( 'accesspress_root_slide4', array(
		    'priority'    => 10,
		    'panel'    => 'accesspress_root_slider',
		    'title'          => esc_html__( 'Slide 4', 'accesspress-root' ),
		    'description'    => esc_html__( 'Setup Slider Slides.', 'accesspress-root' ),
		) );
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'upload',
					'settings'    => 'slider_image4',
					'label'       => esc_html__( 'Image', 'accesspress-root' ),
					'description' => esc_html__( 'Upload image for 4th slides of Slider.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slide4',
					'priority'    => 20,
		        	'default'	=> '',
		        	'sanitize_callback'	=> 'esc_url_raw',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'text',
					'settings'    => 'slider_title4',
					'label'       => esc_html__( 'Title', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to change title of 4th slides.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slide4',
					'priority'    => 20,
		        	'default'	=> '',
		        	'sanitize_callback'	=> 'sanitize_text_field',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'textarea',
					'settings'    => 'slider_desc4',
					'label'       => esc_html__( 'Description', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to change description of 4th slides.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slide4',
					'priority'    => 20,
		        	'default'	=> '',
		        	'sanitize_callback'	=> 'accesspress_root_sanitize_textarea',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'text',
					'settings'    => 'slider_button_text4',
					'label'       => esc_html__( 'Button Text', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to change text of button of 4th slides.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slide4',
					'priority'    => 20,
		        	'default'	=> '',
		        	'sanitize_callback'	=> 'sanitize_text_field',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'link',
					'settings'    => 'slider_button_link4',
					'label'       => esc_html__( 'Button Link', 'accesspress-root' ),
					'description' => esc_html__( 'Enter link to change link of button of 4th slides.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slide4',
					'priority'    => 20,
		        	'default'	=> '',
		        	'sanitize_callback'	=> 'esc_url_raw',
				)
			);
		Kirki::add_section( 'accesspress_root_slide5', array(
		    'priority'    => 10,
		    'panel'    => 'accesspress_root_slider',
		    'title'          => esc_html__( 'Slide 5', 'accesspress-root' ),
		    'description'    => esc_html__( 'Setup Slider Slides.', 'accesspress-root' ),
		) );
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'upload',
					'settings'    => 'slider_image5',
					'label'       => esc_html__( 'Image', 'accesspress-root' ),
					'description' => esc_html__( 'Upload image for 5th slides of Slider.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slide5',
					'priority'    => 20,
		        	'default'	=> '',
		        	'sanitize_callback'	=> 'esc_url_raw',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'text',
					'settings'    => 'slider_title5',
					'label'       => esc_html__( 'Title', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to change title of 5th slides.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slide5',
					'priority'    => 20,
		        	'default'	=> '',
		        	'sanitize_callback'	=> 'sanitize_text_field',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'textarea',
					'settings'    => 'slider_desc5',
					'label'       => esc_html__( 'Description', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to change description of 5th slides.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slide5',
					'priority'    => 20,
		        	'default'	=> '',
		        	'sanitize_callback'	=> 'accesspress_root_sanitize_textarea',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'text',
					'settings'    => 'slider_button_text5',
					'label'       => esc_html__( 'Button Text', 'accesspress-root' ),
					'description' => esc_html__( 'Enter text to change text of button of 5th slides.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slide5',
					'priority'    => 20,
		        	'default'	=> '',
		        	'sanitize_callback'	=> 'sanitize_text_field',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'link',
					'settings'    => 'slider_button_link5',
					'label'       => esc_html__( 'Button Link', 'accesspress-root' ),
					'description' => esc_html__( 'Enter link to change link of button of 5th slides.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slide5',
					'priority'    => 20,
		        	'default'	=> '',
		        	'sanitize_callback'	=> 'esc_url_raw',
				)
			);
		Kirki::add_section( 'accesspress_root_slides_setting', array(
		    'priority'    => 10,
		    'panel'    => 'accesspress_root_slider',
		    'title'          => esc_html__( 'Slider Settings', 'accesspress-root' ),
		    'description'    => esc_html__( 'Setup Slider Setting.', 'accesspress-root' ),
		) );
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'show_slider',
					'label'       => esc_html__( 'Show Slider', 'accesspress-root' ),
					'description' => esc_html__( 'Select Yes to enable slider in Slider Section of Homepage.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slides_setting',
					'default'     => true,
					'priority'    => 60,
					'choices'     => 
					array(
						true  => esc_html__( 'Yes', 'accesspress-root' ),
						false => esc_html__( 'No', 'accesspress-root' ),
						),					
					'sanitize_callback'	=> 'accesspress_root_sanitize_checkbox',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'show_pager',
					'label'       => esc_html__( 'Show Pager', 'accesspress-root' ),
					'description' => esc_html__( 'Select Yes to enable slider pager in Slider Section of Homepage.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slides_setting',
					'default'     => true,
					'priority'    => 70,
					'choices'     => 
					array(
						true  => esc_html__( 'Yes', 'accesspress-root' ),
						false => esc_html__( 'No', 'accesspress-root' ),
						),					
					'sanitize_callback'	=> 'accesspress_root_sanitize_checkbox',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'show_controls',
					'label'       => esc_html__( 'Show Controls', 'accesspress-root' ),
					'description' => esc_html__( 'Select Yes to enable slider controls in Slider Section of Homepage.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slides_setting',
					'default'     => true,
					'priority'    => 80,
					'sanitize_callback'	=> 'accesspress_root_sanitize_checkbox',
					'choices'     => array(
							true  => esc_html__( 'Yes', 'accesspress-root' ),
							false => esc_html__( 'No', 'accesspress-root' ),
						),					
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'auto_transition',
					'label'       => esc_html__( 'Enable Auto Transition', 'accesspress-root' ),
					'description' => esc_html__( 'Select Yes to enable slider auto transition in Slider Section of Homepage.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slides_setting',
					'default'     => true,
					'priority'    => 90,
					'sanitize_callback'	=> 'accesspress_root_sanitize_checkbox',
					'choices'     => array(
							true  => esc_html__( 'Yes', 'accesspress-root' ),
							false => esc_html__( 'No', 'accesspress-root' ),
						),					
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'radio',
					'settings'    => 'slider_transition',
					'label'       => esc_html__( 'Slider Type', 'accesspress-root' ),
					'section'     => 'accesspress_root_slides_setting',
					'default'     => 'fade',
					'priority'    => 130,
					'choices'     => array(
							'fade'   => esc_html__( 'Fade', 'accesspress-root' ),
							'slide' => esc_html__( 'Slide', 'accesspress-root' ),
						),					
					'sanitize_callback'	=> 'accesspress_root_sanitize_slider_transition'
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'number',
					'settings'    => 'slider_speed',
					'label'       => esc_html__( 'Slider Speed', 'accesspress-root' ),
					'description' => esc_html__( 'Enter number to control slider speed in Slider Section.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slides_setting',
					'default'	  => '500',
					'priority'    => 110,
		        	'sanitize_callback'	=> 'accesspress_root_sanitize_integer',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'number',
					'settings'    => 'slider_pause',
					'label'       => esc_html__( 'Slider Pause', 'accesspress-root' ),
					'description' => esc_html__( 'Enter number to control slider pause time in Slider Section.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slides_setting',
					'default'	  => '4000',
					'priority'    => 120,
		        	'sanitize_callback'	=> 'accesspress_root_sanitize_integer',
				)
			);
			Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'show_caption',
					'label'       => esc_html__( 'Show Caption', 'accesspress-root' ),
					'description' => esc_html__( 'Select Yes to enable slider caption in Slider Section of Homepage.', 'accesspress-root' ),
					'section'     => 'accesspress_root_slides_setting',
					'default'     => true,
					'priority'    => 100,
					'sanitize_callback'	=> 'accesspress_root_sanitize_checkbox',
					'choices'     => array(
							true  => esc_html__( 'Yes', 'accesspress-root' ),
							false => esc_html__( 'No', 'accesspress-root' ),
						),					
				)
			);

	Kirki::add_section( 'accesspress_root_social', array(
	    'priority'    => 80,
	    'title'          => esc_html__( 'Social Link Setting', 'accesspress-root' ),
	    'description'    => esc_html__( 'Setup Social settings.', 'accesspress-root' ),
	) );
		Kirki::add_field( 'accesspress_root_config', 
			array(
				'type'     => 'link',
				'settings' => 'facebook',
				'label'    => esc_html__( 'Facebook', 'accesspress-root' ),
				'section'  => 'accesspress_root_social',
				'default'  => 'https://www.facebook.com/',
				'priority' => 20,
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		Kirki::add_field( 'accesspress_root_config', 
			array(
				'type'     => 'link',
				'settings' => 'twitter',
				'label'    => esc_html__( 'Twitter', 'accesspress-root' ),
				'section'  => 'accesspress_root_social',
				'default'  => 'https://www.twitter.com/',
				'priority' => 30,
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		Kirki::add_field( 'accesspress_root_config', 
			array(
				'type'     => 'link',
				'settings' => 'google_plus',
				'label'    => esc_html__( 'Google Plus', 'accesspress-root' ),
				'section'  => 'accesspress_root_social',
				'default'  => 'https://www.plus.google.com/',
				'priority' => 40,
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		Kirki::add_field( 'accesspress_root_config', 
			array(
				'type'     => 'link',
				'settings' => 'youtube',
				'label'    => esc_html__( 'Youtube', 'accesspress-root' ),
				'section'  => 'accesspress_root_social',
				'default'  => 'https://www.youtube.com/',
				'priority' => 50,
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		Kirki::add_field( 'accesspress_root_config', 
			array(
				'type'     => 'link',
				'settings' => 'pinterest',
				'label'    => esc_html__( 'Pinterest', 'accesspress-root' ),
				'section'  => 'accesspress_root_social',
				'default'  => 'https://www.pinterest.com/',
				'priority' => 60,
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		Kirki::add_field( 'accesspress_root_config', 
			array(
				'type'     => 'link',
				'settings' => 'linkedin',
				'label'    => esc_html__( 'Linkedin', 'accesspress-root' ),
				'section'  => 'accesspress_root_social',
				'default'  => '',
				'priority' => 70,
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		Kirki::add_field( 'accesspress_root_config', 
			array(
				'type'     => 'link',
				'settings' => 'instagram',
				'label'    => esc_html__( 'Instagram', 'accesspress-root' ),
				'section'  => 'accesspress_root_social',
				'default'  => '',
				'priority' => 110,
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		Kirki::add_field( 'accesspress_root_config', 
			array(
				'type'     => 'link',
				'settings' => 'stumbleupon',
				'label'    => esc_html__( 'Stumbleupon', 'accesspress-root' ),
				'section'  => 'accesspress_root_social',
				'default'  => '',
				'priority' => 100,
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		Kirki::add_field( 'accesspress_root_config', 
			array(
				'type'     => 'text',
				'settings' => 'skype',
				'label'    => esc_html__( 'Skype', 'accesspress-root' ),
				'description'    => esc_html__( 'Enter skype id.', 'accesspress-root' ),
				'section'  => 'accesspress_root_social',
				'default'  => '',
				'priority' => 130,
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

	Kirki::add_section( 'accesspress_root_post_setting', array(
	    'priority'    => 90,
	    'title'          => esc_html__( 'Post Setting', 'accesspress-root' ),
	    'description'    => esc_html__( 'Setup Single Post settings.', 'accesspress-root' ),
	) );

		Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'featured_image',
					'label'       => esc_html__( 'Enable Featured Image', 'accesspress-root' ),
					'section'     => 'accesspress_root_post_setting',
					'default'     => '1',
					'priority'    => 10,
					'choices'     => 
					array(
						true  => esc_html__( 'Enable', 'accesspress-root' ),
						false => esc_html__( 'Disable', 'accesspress-root' ),
						),					
					'sanitize_callback'	=> 'accesspress_root_sanitize_checkbox',
					)
				);

		Kirki::add_field( 'accesspress_root_config', 
				array(
					'type'        => 'switch',
					'settings'    => 'post_metadata',
					'label'       => esc_html__( 'Enable MetaData', 'accesspress-root' ),
					'section'     => 'accesspress_root_post_setting',
					'default'     => '1',
					'priority'    => 20,
					'choices'     => 
					array(
						true  => esc_html__( 'Enable', 'accesspress-root' ),
						false => esc_html__( 'Disable', 'accesspress-root' ),
						),					
					'sanitize_callback'	=> 'accesspress_root_sanitize_checkbox',
					)
				);
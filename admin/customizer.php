<?php

class arenabiz_Customizer {

    public static function arenabiz_Register($wp_customize) {

        self::arenabiz_Sections($wp_customize);

        self::arenabiz_Controls($wp_customize);
    }

    public static function arenabiz_Sections($wp_customize) {

        /**
         * Add panel for home page feature area
         */
        $wp_customize->add_panel('general_setting_panel', array(
            'title' => __('General Settings', 'arenabiz'),
            'description' => wp_kses_post(__('Allows you to setup home page feature area section for arenabiz Theme.', 'arenabiz')),
            'priority' => '8',
            'capability' => 'edit_theme_options'
        ));

        /**
         * Site Title Section
         */
        $wp_customize->add_section('title_tagline', array(
            'title' => __('Site Title & Tagline', 'arenabiz'),
            'priority' => '',
            'panel' => 'general_setting_panel'
        ));


 /**
         * Add panel for home page about area
         */
        $wp_customize->add_panel('home_area_panel', array(
            'title' => __('Home Settings', 'arenabiz'),
            'description' => __('Allows you to setup home page section.', 'arenabiz'),
            'priority' => '9',
            'capability' => 'edit_theme_options'
        ));

        $wp_customize->add_section('home_about_area_panel', array(
            'title' => __('About Settings', 'arenabiz'),
            'description' => wp_kses_post(__('Allows you to setup home page about us section.', 'arenabiz')),
            'priority' => '',
            'panel' => 'home_area_panel'
        ));

        /**
         * Home page slider panel
         */
        $wp_customize->add_section('home_page_slider_panel', array(
            'title' => __('Slider Settings', 'arenabiz'),
            'description' =>wp_kses_post( __('Allows you to setup home page slider for arenabiz Theme.', 'arenabiz')),
            'priority' => '',
            'panel' => 'home_area_panel'
        ));

        /**
         * Slider controle section
         */
		        /**
         * Welcome Slider section
         */
        $wp_customize->add_section('home_page_welcome', array(
            'title' => __('Welcome bar settings', 'arenabiz'),
            'description' =>wp_kses_post(__('Allows you to setup slider bar elements for arenabiz Theme.', 'arenabiz')), //Descriptive tooltip
            'priority' => '',
            'panel' => 'home_area_panel'
                )
        );

 /*
         * Home page portfolio area control section
         */
		 
        $wp_customize->add_section('home_portfolio_area_panel', array(
            'title' => __('Portfolio Settings', 'arenabiz'),
            'description' => wp_kses_post(__('Allows you to setup home page portfolio for arenabiz Theme.', 'arenabiz')),
            'priority' => '',
            'panel' => 'home_area_panel'
        ));
		
 /*
         * Home page testimonial area control section
         */
		 
        $wp_customize->add_section('home_testimonial_area_panel', array(
            'title' => __('Testimonial Settings', 'arenabiz'),
            'description' => wp_kses_post(__('Allows you to setup home page testimonials for arenabiz Theme.', 'arenabiz')),
            'priority' => '',
            'panel' => 'home_area_panel'
        ));
		
 /*
         * Home page cta area control section
         */
		 
        $wp_customize->add_section('home_cta_area_section', array(
            'title' => __('Cta Settings', 'arenabiz'),
            'description' => wp_kses_post(__('Allows you to setup home page cta for arenabiz Theme.', 'arenabiz')),
            'priority' => '14',
            'panel' => 'home_area_panel'
        ));			

        /**
         * Footer Setting
         */
        $wp_customize->add_section('footer_section', array(
            'title' => __('Footer Settings', 'arenabiz'),
            'description' => wp_kses_post(__('Allows you to setup footer copyright text for arenabiz Theme.', 'arenabiz')),
            'priority' => '16',
            'panel' => ''
        ));
		
        /**
         * Blog Setting
         */
        $wp_customize->add_section('blog_section', array(
            'title' => __('Blog Settings', 'arenabiz'),
            'description' => wp_kses_post(__('Allows you to setup blog title for arenabiz Theme.', 'arenabiz')),
            'priority' => '18',
            'panel' => ''
        ));		

        /**
         * Add panel for styling option
         */
        $wp_customize->add_panel('style_setting', array(
            'title' => __('Style Settings', 'arenabiz'),
            'description' => wp_kses_post(__('Allows you to setup Theme text and Background color for arenabiz Theme.', 'arenabiz')),
            'priority' => '17',
            'capability' => 'edit_theme_options'
        ));

        /**
         * Background color Section
         */
        $wp_customize->add_section('colors', array(
            'title' => __('Background color Setting', 'arenabiz'),
            'description' => wp_kses_post(__('Allows you to change Background color for arenabiz Theme. This only works when no any image set as background image.', 'arenabiz')),
            'priority' => '',
            'panel' => 'style_setting'
        ));

        /**
         * Background Image Section
         */
        $wp_customize->add_section('background_image', array(
            'title' => __('Background Image setting', 'arenabiz'),
            'description' => wp_kses_post(__('Allows you to change background image for arenabiz Theme. This will overright the background color property', 'arenabiz')),
            'priority' => '',
            'panel' => 'style_setting'
        ));

        /**
         * Text color Section
         */
        $wp_customize->add_section('text_colors', array(
            'title' => __('Text color setting', 'arenabiz'),
            'description' => wp_kses_post(__('Allows you to change text color for arenabiz Theme.', 'arenabiz')),
            'priority' => '',
            'panel' => 'style_setting'
        ));

        /**
         * Style Section
         */
        $wp_customize->add_section('style_section', array(
            'title' => __('Custom Style Setting', 'arenabiz'),
            'description' => wp_kses_post(__('Allows you to change style using custom css for arenabiz Theme.', 'arenabiz')),
            'panel' => 'style_setting',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
    }

    public static function arenabiz_Section_Content() {

        $section_content = array(			
 			'home_about_area_panel' => array(
                'arenabiz_about_status',
				'arenabiz_about_main_head',
				'arenabiz_about_main_desc',
				'arenabiz_about_page1',
				'arenabiz_about_page2',														
				'arenabiz_about_page3'									
            ),
            'home_page_welcome' => array(
				'arenabiz_home_page_slider',
				'arenabiz_slidewelcometext',
				'arenabiz_slidewelcomebtntext',
				'arenabiz_slidewelcomelink'
            ),		
 			'home_page_slider_panel' => array(
                'arenabiz_slide_page1',
				 'arenabiz_slidelink1',
				'arenabiz_slide_page2',
				'arenabiz_slidelink2'
            ),
 			'home_portfolio_area_panel' => array(
                'arenabiz_portfolio_status',
				'arenabiz_portfolio_main_head',
				'arenabiz_portfolio_main_desc',
				'arenabiz_portfolio_page1',
				'arenabiz_portfolio_page2',														
				'arenabiz_portfolio_page3'									
            ),
 			'home_testimonial_area_panel' => array(
                'arenabiz_testimonial_status',
				'arenabiz_testimonial_main_head',
				'arenabiz_testimonial_main_desc',
				'arenabiz_testimonial_page1',
				'arenabiz_testimonial_page2',														
				'arenabiz_testimonial_page3'									
            ),
          'home_cta_area_section' => array(
		   	 'arenabiz_home_page_cta',
              	'arenabiz_ctatext',
				'arenabiz_ctabtntext',
				'arenabiz_ctalink'
            ),					
            'blog_section' => array(
                'arenabiz_blogtitle'
            ),			
            'footer_section' => array(
                'arenabiz_footertext'
            ),
            
        );
        return $section_content;
    }

    public static function arenabiz_Settings() {

        $theme_settings = array(
 			 'arenabiz_about_status' => array(
                'id' => 'arenabiz_options[arenabiz_about_status]',
                'label' => esc_html__('About Section On/Off', 'arenabiz'),
                'description' => wp_kses_post(__('Turn on or off the home page about section as per your requirement.', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'radio',
                'transport' => 'postMessage',
                'default' => 'on',
                'choices' => array(
                    'on' => 'on',
                    'off' => 'Off'
                )
            ),
            'arenabiz_about_main_head' => array(
                'id' => 'arenabiz_options[arenabiz_about_main_head]',
                'label' => esc_html__('About Main Heading', 'arenabiz'),
                'description' => wp_kses_post(__('Here mention the text about Section Main Description', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'textarea',
                'transport' => 'postMessage',
                'default' => ''
            ),
            'arenabiz_about_main_desc' => array(
                'id' => 'arenabiz_options[arenabiz__about_main_desc]',
                'label' => esc_html__('About Main Description', 'arenabiz'),
                'description' => wp_kses_post(__('Here mention the text about Section Description', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'textarea',
                'transport' => 'postMessage',
                'default' => ''
            ),				
            'arenabiz_about_page1' => array(
                'id' => 'arenabiz_options[arenabiz_about_page1]',
                'label' => esc_html__('First About Page', 'arenabiz'),
                'description' => wp_kses_post(__('Select a Page.', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'dropdown-pages',
                'default' => ''
            ),
            'arenabiz_about_page2' => array(
                'id' => 'arenabiz_options[arenabiz_about_page2]',
                'label' => esc_html__('Second About Page', 'arenabiz'),
                'description' => wp_kses_post(__('Select a Page.', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'dropdown-pages',
                'default' => ''
            ),
            'arenabiz_about_page3' => array(
                'id' => 'arenabiz_options[arenabiz_about_page3]',
                'label' => esc_html__('Third About Page', 'arenabiz'),
                'description' => wp_kses_post(__('Select a Page.', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'dropdown-pages',
                'default' => ''
            ),
            'arenabiz_home_page_slider' => array(
                'id' => 'arenabiz_options[arenabiz_home_page_slider]',
                'label' => esc_html__('Slider Bar On/Off', 'arenabiz'),
                'description' => wp_kses_post(__('Select option to display welcome slider bar.', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'radio',
                'default' => 'on',
                'choices' => array(
                    "on" => "On",
                    "off" => "Off")
            ),
			  'arenabiz_home_page_slider1' => array(
                'id' => 'arenabiz_options[arenabiz_home_page_slider1]',
                'label' => esc_html__('Slider Caption On/Off', 'arenabiz'),
                'description' => wp_kses_post(__('Select option to display caption of slider.', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'radio',
                'default' => 'on',
                'choices' => array(
                    "on" => "On",
                    "off" => "Off")
            ),
		   'arenabiz_slidewelcometext' => array(
                'id' => 'arenabiz_options[arenabiz_slidewelcometext]',
                'label' => __('Welcome text', 'arenabiz'),
                'description' => wp_kses_post(__('Hompage slider welcome text content.', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),		
			'arenabiz_slidewelcomebtntext' => array(
                'id' => 'arenabiz_options[arenabiz_slidewelcomebtntext]',
                'label' => esc_html__('Welcome Button text', 'arenabiz'),
                'description' => wp_kses_post(__('Hompage slider welcome button text.', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => ''
            ),
			'arenabiz_slidewelcomelink' => array(
                'id' => 'arenabiz_options[arenabiz_slidewelcomelink]',
                'label' => esc_html__('Welcome Button link', 'arenabiz'),
                'description' => wp_kses_post(__('Hompage slider welcome button link.', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => ''
            ),
            'arenabiz_slide_page1' => array(
                'id' => 'arenabiz_options[arenabiz_slide_page1]',
                'label' => esc_html__('First Slider Page', 'arenabiz'),
                'description' => wp_kses_post(__('Select a Page.', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'dropdown-pages',
                'default' => ''
            ),
            'arenabiz_slidelink1' => array(
                'id' => 'arenabiz_options[arenabiz_slidelink1]',
                'label' =>esc_html__('First Slide Link', 'arenabiz'),
                'description' => wp_kses_post(__('Paste here the link of the page or post.', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => ''
            ),
            'arenabiz_slide_page2' => array(
                'id' => 'arenabiz_options[arenabiz_slide_page2]',
                'label' => esc_html__('Second Slider Page', 'arenabiz'),
                'description' => wp_kses_post(__('Select a Page.', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'dropdown-pages',
                'default' => ''
            ),								
            'arenabiz_slidelink2' => array(
                'id' => 'arenabiz_options[arenabiz_slidelink2]',
                'label' => esc_html__('Second Slide Link', 'arenabiz'),
                'description' => wp_kses_post(__('Paste here the link of the page or post.', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => ''
            ),
 			 'arenabiz_portfolio_status' => array(
                'id' => 'arenabiz_options[arenabiz_portfolio_status]',
                'label' => __('Portfolio Section On/Off', 'arenabiz'),
                'description' => wp_kses_post(__('Turn on or off the home page portfolio section as per your requirement.', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'radio',
                'transport' => 'postMessage',
                'default' => 'on',
                'choices' => array(
                    'on' => 'on',
                    'off' => 'Off'
                )
            ),
            'arenabiz_portfolio_main_head' => array(
                'id' => 'arenabiz_options[arenabiz_portfolio_main_head]',
                'label' => esc_html__('Portfolio Main Heading', 'arenabiz'),
                'description' => wp_kses_post(__('Here mention the text portfolio Section Main Description', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'textarea',
                'transport' => 'postMessage',
                'default' => ''
            ),
            'arenabiz_portfolio_main_desc' => array(
                'id' => 'arenabiz_options[arenabiz_portfolio_main_desc]',
                'label' => esc_html__('Portfolio Main Description', 'arenabiz'),
                'description' => wp_kses_post(__('Here mention the text portfolio Section Description', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'textarea',
                'transport' => 'postMessage',
                'default' => ''
            ),
            'arenabiz_portfolio_page1' => array(
                'id' => 'arenabiz_options[arenabiz_portfolio_page1]',
                'label' =>esc_html__('First Portfolio Page', 'arenabiz'),
                'description' => wp_kses_post(__('Select a Page.', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'dropdown-pages',
                'default' => ''
            ),
            'arenabiz_portfolio_page2' => array(
                'id' => 'arenabiz_options[arenabiz_portfolio_page2]',
                'label' => esc_html__('Second Portfolio Page', 'arenabiz'),
                'description' => wp_kses_post(__('Select a Page.', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'dropdown-pages',
                'default' => ''
            ),
            'arenabiz_portfolio_page3' => array(
                'id' => 'arenabiz_options[arenabiz_portfolio_page3]',
                'label' => esc_html__('Third Portfolio Page', 'arenabiz'),
                'description' => wp_kses_post(__('Select a Page.', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'dropdown-pages',
                'default' => ''
            ),				
 			 'arenabiz_testimonial_status' => array(
                'id' => 'arenabiz_options[arenabiz_testimonial_status]',
                'label' => esc_html__('Testimonial Section On/Off', 'arenabiz'),
                'description' => wp_kses_post(__('Turn on or off the home page testimonial section as per your requirement.', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'radio',
                'transport' => 'postMessage',
                'default' => 'on',
                'choices' => array(
                    'on' => 'On',
                    'off' => 'Off'
                )
            ),
            'arenabiz_testimonial_main_head' => array(
                'id' => 'arenabiz_options[arenabiz_testimonial_main_head]',
                'label' =>esc_html__('Testimonial Main Heading', 'arenabiz'),
                'description' => wp_kses_post(__('Here mention the text testimonial Section Main Description', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'textarea',
                'transport' => 'postMessage',
                'default' => ''
            ),
            'arenabiz_testimonial_main_desc' => array(
                'id' => 'arenabiz_options[arenabiz_testimonial_main_desc]',
                'label' => esc_html__('Testimonial Main Description', 'arenabiz'),
                'description' => wp_kses_post(__('Here mention the text testimonial Section Description', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'textarea',
                'transport' => 'postMessage',
                'default' => ''
            ),
            'arenabiz_testimonial_page1' => array(
                'id' => 'arenabiz_options[arenabiz_testimonial_page1]',
                'label' => esc_html__('First Testimonial Page', 'arenabiz'),
                'description' => __('Select a Page.', 'arenabiz'),
                'type' => 'option',
                'setting_type' => 'dropdown-pages',
                'default' => ''
            ),
            'arenabiz_testimonial_page2' => array(
                'id' => 'arenabiz_options[arenabiz_testimonial_page2]',
                'label' => esc_html__('Second Testimonial Page', 'arenabiz'),
                'description' => wp_kses_post(__('Select a Page.', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'dropdown-pages',
                'default' => ''
            ),
            'arenabiz_testimonial_page3' => array(
                'id' => 'arenabiz_options[arenabiz_testimonial_page3]',
                'label' => esc_html__('Third Testimonial Page', 'arenabiz'),
                'description' => wp_kses_post(__('Select a Page.', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'dropdown-pages',
                'default' => ''
            ),
            'arenabiz_home_page_cta' => array(
                'id' => 'arenabiz_options[arenabiz_home_page_cta]',
                'label' => esc_html__('Cta Bar On/Off', 'arenabiz'),
                'description' => wp_kses_post(__('Select option to display Cta bar.', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'radio',
                'default' => 'on',
                'choices' => array(
                    "on" => "On",
                    "off" => "Off")
            ),					
		   'arenabiz_ctatext' => array(
                'id' => 'arenabiz_options[arenabiz_ctatext]',
                'label' => esc_html__('Cta text', 'arenabiz'),
                'description' => wp_kses_post(__('Hompage slider cta text content.', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),		
			'arenabiz_ctabtntext' => array(
                'id' => 'arenabiz_options[arenabiz_ctabtntext]',
                'label' => esc_html__('Cta Button text', 'arenabiz'),
                'description' => wp_kses_post(__('Hompage Cta button text.', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => ''
            ),
			'arenabiz_ctalink' => array(
                'id' => 'arenabiz_options[arenabiz_ctalink]',
                'label' => esc_html__('Cta Button link', 'arenabiz'),
                'description' => wp_kses_post(__('Hompage Cta button link.', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => ''
            ),			
            'arenabiz_footertext' => array(
                'id' => 'arenabiz_options[arenabiz_footertext]',
                'label' => esc_html__('Footer copyright text', 'arenabiz'),
                'description' => wp_kses_post(__('Enter your company name here.', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => ''
            ),
            'arenabiz_blogtitle' => array(
                'id' => 'arenabiz_options[arenabiz_blogtitle]',
                'label' => esc_html__('Blog title', 'arenabiz'),
                'description' => wp_kses_post(__('Enter your blog name here.', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => 'Blog'
            ),			
            'arenabiz_customcss' => array(
                'id' => 'arenabiz_options[arenabiz_customcss]',
                'label' => esc_html__('Custom CSS', 'arenabiz'),
                'description' => wp_kses_post(__('Quickly add your custom CSS code to your theme by writing the code in this block.', 'arenabiz')),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            )
        );
        return $theme_settings;
    }

    public static function arenabiz_Controls($wp_customize) {

        $sections = self::arenabiz_Section_Content();
        $settings = self::arenabiz_Settings();

        foreach ($sections as $section_id => $section_content) {

            foreach ($section_content as $section_content_id) {

                switch ($settings[$section_content_id]['setting_type']) {
                    case 'image':
                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'arenabiz_sanitize_url');
                        $wp_customize->add_control(new WP_Customize_Image_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id']
                                )
                        ));
                        break;

                    case 'text':
                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'arenabiz_sanitize_text');

                        $wp_customize->add_control(new WP_Customize_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id'],
                            'type' => 'text'
                                )
                        ));
                        break;

                    case 'textarea':

                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'arenabiz_sanitize_textarea');

                        $wp_customize->add_control(new WP_Customize_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id'],
                            'type' => 'textarea'
                                )
                        ));
                        break;
						
                    case 'dropdown-pages':

                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'arenabiz_sanitize_dropdownpages');

                        $wp_customize->add_control(new WP_Customize_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id'],
                            'type' => 'dropdown-pages'
                                )
                        ));
                        break;						

                    case 'link':

                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'arenabiz_sanitize_url');

                        $wp_customize->add_control(new WP_Customize_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id'],
                            'type' => 'text'
                                )
                        ));
                        break;

                    case 'color':

                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'arenabiz_sanitize_color');

                        $wp_customize->add_control(new WP_Customize_Color_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id']
                                )
                        ));
                        break;

                    case 'number':

                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'arenabiz_sanitize_number');

                        $wp_customize->add_control(new WP_Customize_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id'],
                            'type' => 'text'
                                )
                        ));
                        break;

                    case 'select':

                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'arenabiz_sanitize_select');

                        $wp_customize->add_control(new WP_Customize_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id'],
                            'type' => 'select',
                            'choices' => $settings[$section_content_id]['choices']
                                )
                        ));
                        break;

                    case 'radio':

                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'arenabiz_sanitize_radio');

                        $wp_customize->add_control(new WP_Customize_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id'],
                            'type' => 'radio',
                            'choices' => $settings[$section_content_id]['choices']
                                )
                        ));
                        break;

                    default:
                        break;
                }
            }
        }
    }

    public static function add_setting($wp_customize, $setting_id, $default, $type, $sanitize_callback) {
        $wp_customize->add_setting($setting_id, array(
            'default' => $default,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => array('arenabiz_Customizer', $sanitize_callback),
            'type' => $type
                )
        );
    }

    /**
     * adds sanitization callback funtion : textarea
     * @package arenabiz
     */
    public static function arenabiz_sanitize_textarea($value) {
        $value = wp_kses_post($value);
        return $value;
    }
	
    public static function arenabiz_sanitize_dropdownpages($value) {
        $value = absint($value);
        return $value;
    }	

    /**
     * adds sanitization callback funtion : url
     * @package arenabiz
     */
    public static function arenabiz_sanitize_url($value) {
        $value = esc_url_raw($value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : text
     * @package arenabiz
     */
    public static function arenabiz_sanitize_text($value) {
        $value = sanitize_text_field($value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : email
     * @package arenabiz
     */
    public static function arenabiz_sanitize_email($value) {
        $value = sanitize_email($value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : number
     * @package arenabiz
     */
    public static function arenabiz_sanitize_number($value) {
        $value = absint($value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : number
     * @package arenabiz
     */
    public static function arenabiz_sanitize_color($value) {
        $value = sanitize_hex_color($value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : select
     * @package arenabiz
     */
    public static function arenabiz_sanitize_select($value, $setting) {
        global $wp_customize;
        $control = $wp_customize->get_control($setting->id);
        if (array_key_exists($value, $control->choices)) {
            return $value;
        } else {
            return $setting->default;
        }
    }

    /**
     * adds sanitization callback funtion : radio
     * @package arenabiz
     */
    public static function arenabiz_sanitize_radio($value, $setting) {
        global $wp_customize;
        $control = $wp_customize->get_control($setting->id);
        if (array_key_exists($value, $control->choices)) {
            return $value;
        } else {
            return $setting->default;
        }
    }

}

// Setup the Theme Customizer settings and controls...
add_action('customize_register', array('arenabiz_Customizer', 'arenabiz_Register'));

function arenabiz_registers() {
    wp_register_script('arenabiz_jquery_ui', '//code.jquery.com/ui/1.11.0/jquery-ui.js', array("jquery"), true);
}

add_action('customize_controls_enqueue_scripts', 'arenabiz_registers');

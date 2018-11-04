<?php

class themeszen_Customizer {

    public static function themeszen_Register($wp_customize) {

        self::themeszen_Sections($wp_customize);

        self::themeszen_Controls($wp_customize);
    }

    public static function themeszen_Sections($wp_customize) {

        /**
         * Add panel for home page feature area
         */
        $wp_customize->add_panel('general_setting_panel', array(
            'title' => __('General Settings', 'arena'),
            'description' => __('Allows you to setup home page feature area section for arena Theme.', 'arena'),
            'priority' => '9',
            'capability' => 'edit_theme_options'
        ));

        /**
         * Site Title Section
         */
        $wp_customize->add_section('title_tagline', array(
            'title' => __('Site Title & Tagline', 'arena'),
            'priority' => '',
            'panel' => 'general_setting_panel'
        ));


 /**
         * Add panel for home page about area
         */
        $wp_customize->add_panel('home_about_area_panel', array(
            'title' => __('About Settings', 'arena'),
            'description' => __('Allows you to setup home page about us section.', 'arena'),
            'priority' => '10',
            'capability' => 'edit_theme_options'
        ));
		
        $wp_customize->add_section('home_about_control', array(
            'title' => __('About Control', 'arena'),
            'description' => __('Allows you to control about section for arena Theme.', 'arena'),
            'priority' => '',
            'panel' => 'home_about_area_panel'
        ));		
		
		    /**
         * First home page box section
         */
        $wp_customize->add_section('home_page_box_1', array(
            'title' => __('Homepage About 1', 'arena'),
            'description' => __('Allows you to setup Homepage About 1 for arena Theme.', 'arena'), //Descriptive tooltip
            'panel' => 'home_about_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
		
				    /**
         * Second home page box section
         */
        $wp_customize->add_section('home_page_box_2', array(
            'title' => __('Homepage About 2', 'arena'),
            'description' => __('Allows you to setup Homepage About 2 for arena Theme.', 'arena'), //Descriptive tooltip
            'panel' => 'home_about_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
		
				    /**
         * Third home page box section
         */
        $wp_customize->add_section('home_page_box_3', array(
            'title' => __('Homepage About 3', 'arena'),
            'description' => __('Allows you to setup Homepage About 3 for arena Theme.', 'arena'), //Descriptive tooltip
            'panel' => 'home_about_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );

        /**
         * Home page slider panel
         */
        $wp_customize->add_panel('home_page_slider_panel', array(
            'title' => __('Slider Settings', 'arena'),
            'description' => __('Allows you to setup home page slider for arena Theme.', 'arena'),
            'priority' => '11',
            'capability' => 'edit_theme_options'
        ));

        /**
         * Slider controle section
         */
        $wp_customize->add_section('home_page_slider_control', array(
            'title' => __('Slider Control', 'arena'),
            'description' => __('Turn on or off the home page Slider elements.', 'arena'), //Descriptive tooltip
            'panel' => 'home_page_slider_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
		
		        /**
         * Welcome Slider section
         */
        $wp_customize->add_section('home_page_welcome', array(
            'title' => __('Slider bar settings', 'arena'),
            'description' => __('Allows you to setup slider bar elements for arena Theme.', 'arena'), //Descriptive tooltip
            'panel' => 'home_page_slider_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );

        /**
         * First Slider section
         */
        $wp_customize->add_section('home_page_slider_1', array(
            'title' => __('First Slider', 'arena'),
            'description' => __('Allows you to setup first slider for arena Theme.', 'arena'), //Descriptive tooltip
            'panel' => 'home_page_slider_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );

        /**
         * Second Slider section
         */
        $wp_customize->add_section('home_page_slider_2', array(
            'title' => __('Second Slider', 'arena'),
            'description' => __('Allows you to setup second slider for arena Theme.', 'arena'), //Descriptive tooltip
            'panel' => 'home_page_slider_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );

 /*
         * Home page portfolio area control section
         */
		 
        $wp_customize->add_panel('home_portfolio_area_panel', array(
            'title' => __('Portfolio Settings', 'arena'),
            'description' => __('Allows you to setup home page portfolio for arena Theme.', 'arena'),
            'priority' => '12',
            'capability' => 'edit_theme_options'
        ));
		
				 
        $wp_customize->add_section('home_portfolio_control', array(
            'title' => __('Portfolio Control', 'arena'),
            'description' => __('Allows you to control portfolio section for arena Theme.', 'arena'),
            'priority' => '',
            'panel' => 'home_portfolio_area_panel'
        ));

        /*
         * Home page first portfolio section
         */
        $wp_customize->add_section('home_portfolio_1', array(
            'title' => __('First Portfolio', 'arena'),
            'description' => __('Allows you to setup first portfolio section for arena Theme.', 'arena'),
            'priority' => '',
            'panel' => 'home_portfolio_area_panel'
        ));
		
	     /*
         * Home page second portfolio section
         */
        $wp_customize->add_section('home_portfolio_2', array(
            'title' => __('Second Portfolio', 'arena'),
            'description' => __('Allows you to setup second portfolio section for arena Theme.', 'arena'),
            'priority' => '',
            'panel' => 'home_portfolio_area_panel'
        ));

        /*
         * Home page third portfolio section
         */
        $wp_customize->add_section('home_portfolio_3', array(
            'title' => __('Third Portfolio', 'arena'),
            'description' => __('Allows you to setup third portfolio section for arena Theme.', 'arena'),
            'priority' => '',
            'panel' => 'home_portfolio_area_panel'
        ));		
		
 /*
         * Home page testimonial area control section
         */
		 
        $wp_customize->add_panel('home_testimonial_area_panel', array(
            'title' => __('Testimonial Settings', 'arena'),
            'description' => __('Allows you to setup home page testimonials for arena Theme.', 'arena'),
            'priority' => '13',
            'capability' => 'edit_theme_options'
        ));
		
				 
        $wp_customize->add_section('home_testimonial_control', array(
            'title' => __('Testimonial Control', 'arena'),
            'description' => __('Allows you to control testimonial section for arena Theme.', 'arena'),
            'priority' => '',
            'panel' => 'home_testimonial_area_panel'
        ));

        /*
         * Home page first testimonial section
         */
        $wp_customize->add_section('home_testimonial_1', array(
            'title' => __('First Testimonial', 'arena'),
            'description' => __('Allows you to setup first testimonial section for arena Theme.', 'arena'),
            'priority' => '',
            'panel' => 'home_testimonial_area_panel'
        ));

        /*
         * Home page second testimonial section
         */
        $wp_customize->add_section('home_testimonial_2', array(
            'title' => __('Second Testimonial', 'arena'),
            'description' => __('Allows you to setup second testimonial section for arena Theme.', 'arena'),
            'priority' => '',
            'panel' => 'home_testimonial_area_panel'
        ));

        /*
         * Home page third testimonial section
         */
        $wp_customize->add_section('home_testimonial_3', array(
            'title' => __('Third Testimonial', 'arena'),
            'description' => __('Allows you to setup third testimonial section for arena Theme.', 'arena'),
            'priority' => '',
            'panel' => 'home_testimonial_area_panel'
        ));	
		
 /*
         * Home page cta area control section
         */
		 
        $wp_customize->add_section('home_cta_area_section', array(
            'title' => __('Cta Settings', 'arena'),
            'description' => __('Allows you to setup home page cta for arena Theme.', 'arena'),
            'priority' => '14',
            'panel' => ''
        ));			

        /**
         * Footer Setting
         */
        $wp_customize->add_section('footer_section', array(
            'title' => __('Footer Settings', 'arena'),
            'description' => __('Allows you to setup footer copyright text for arena Theme.', 'arena'),
            'priority' => '16',
            'panel' => ''
        ));
		
        /**
         * Blog Setting
         */
        $wp_customize->add_section('blog_section', array(
            'title' => __('Blog Settings', 'arena'),
            'description' => __('Allows you to setup blog title for arena Theme.', 'arena'),
            'priority' => '18',
            'panel' => ''
        ));		

        /**
         * Add panel for styling option
         */
        $wp_customize->add_panel('style_setting', array(
            'title' => __('Style Settings', 'arena'),
            'description' => __('Allows you to setup Theme text and Background color for arena Theme.', 'arena'),
            'priority' => '17',
            'capability' => 'edit_theme_options'
        ));

        /**
         * Background color Section
         */
        $wp_customize->add_section('colors', array(
            'title' => __('Background color Setting', 'arena'),
            'description' => __('Allows you to change Background color for arena Theme. This only works when no any image set as background image.', 'arena'),
            'priority' => '',
            'panel' => 'style_setting'
        ));

        /**
         * Background Image Section
         */
        $wp_customize->add_section('background_image', array(
            'title' => __('Background Image setting', 'arena'),
            'description' => __('Allows you to change background image for arena Theme. This will overright the background color property', 'arena'),
            'priority' => '',
            'panel' => 'style_setting'
        ));

        /**
         * Text color Section
         */
        $wp_customize->add_section('text_colors', array(
            'title' => __('Text color setting', 'arena'),
            'description' => __('Allows you to change text color for arena Theme.', 'arena'),
            'priority' => '',
            'panel' => 'style_setting'
        ));

        /**
         * Style Section
         */
        $wp_customize->add_section('style_section', array(
            'title' => __('Custom Style Setting', 'arena'),
            'description' => __('Allows you to change style using custom css for arena Theme.', 'arena'),
            'panel' => 'style_setting',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
    }

    public static function themeszen_Section_Content() {

        $section_content = array(
 			'home_about_control' => array(
                'arena_about_status',
                'themeszen_about_main_head',
                'themeszen_about_main_desc'
            ),		
			  'home_page_box_1' => array(
                 'arena_boxhead1',
                'arena_boxtext1',
                'arena_boximage1',
                'arena_boxlink1'
            ),
			 'home_page_box_2' => array(
                 'arena_boxhead2',
                'arena_boxtext2',
                'arena_boximage2',
                'arena_boxlink2'
            ),
			 'home_page_box_3' => array(
                 'arena_boxhead3',
                'arena_boxtext3',
                'arena_boximage3',
                'arena_boxlink3'
            ),
			 'home_page_box_4' => array(
                 'arena_boxhead4',
                'arena_boxtext4',
                'arena_boximage4',
                'arena_boxlink4'
            ),
            'home_page_slider_control' => array(
                'arena_home_page_slider',
				 'arena_home_page_slider1'
            ),
            'home_page_welcome' => array(
				'arena_slidewelcometext',
				'arena_slidewelcomebtntext',
				'arena_slidewelcomelink'
            ),			
            'home_page_slider_1' => array(
                'arena_slideimage1',
                'arena_slideheading1',
                'arena_slidetext1',				
                'arena_slidelink1'
            ),
            'home_page_slider_2' => array(
                'arena_slideimage2',
                'arena_slideheading2',
                'arena_slidetext2',				
                'arena_slidelink2'
            ),
 			'home_portfolio_control' => array(
                'arena_portfolio_status',
                'themeszen_portfolio_main_head',
                'themeszen_portfolio_main_desc'
            ),
            'home_portfolio_1' => array(
                'themeszen_portfolio_img',
                'themeszen_portfolio_name',
                'themeszen_portfolio',
                'themeszen_portfolio_link'				
            ),
            'home_portfolio_2' => array(
                'themeszen_portfolio_img_2',
                'themeszen_portfolio_name_2',
                'themeszen_portfolio_2',
				 'themeszen_portfolio_link2'
            ),
            'home_portfolio_3' => array(
                'themeszen_portfolio_img_3',
                'themeszen_portfolio_name_3',
                'themeszen_portfolio_3',
                'themeszen_portfolio_link3'
            ),			
 			'home_testimonial_control' => array(
                'arena_testimonial_status',
                'themeszen_testimonial_main_head',
                'themeszen_testimonial_main_desc'
            ),
            'home_testimonial_1' => array(
                'themeszen_testimonial_img',
                'themeszen_testimonial_name',
                'themeszen_testimonial'
            ),
            'home_testimonial_2' => array(
                'themeszen_testimonial_img_2',
                'themeszen_testimonial_name_2',
                'themeszen_testimonial_2'
            ),
            'home_testimonial_3' => array(
                'themeszen_testimonial_img_3',
                'themeszen_testimonial_name_3',
                'themeszen_testimonial_3'
            ),
          'home_cta_area_section' => array(
		   	 'arena_home_page_cta',
              	'arena_ctatext',
				'arena_ctabtntext',
				'arena_ctalink'
            ),					
            'blog_section' => array(
                'arena_blogtitle'
            ),			
            'footer_section' => array(
                'arena_footertext'
            ),
            
        );
        return $section_content;
    }

    public static function themeszen_Settings() {

        $theme_settings = array(
 			 'arena_about_status' => array(
                'id' => 'themeszen_options[arena_about_status]',
                'label' => __('About Section On/Off', 'arena'),
                'description' => __('Turn on or off the home page about section as per your requirement.', 'arena'),
                'type' => 'option',
                'setting_type' => 'radio',
                'transport' => 'postMessage',
                'default' => 'on',
                'choices' => array(
                    'on' => 'On',
                    'off' => 'Off'
                )
            ),
            'themeszen_about_main_head' => array(
                'id' => 'themeszen_options[themeszen_about_main_head]',
                'label' => __('About Main Heading', 'arena'),
                'description' => __('Here mention the text about Section Main Description', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'transport' => 'postMessage',
                'default' => ''
            ),
            'themeszen_about_main_desc' => array(
                'id' => 'themeszen_options[themeszen_about_main_desc]',
                'label' => __('About Main Description', 'arena'),
                'description' => __('Here mention the text about Section Description', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'transport' => 'postMessage',
                'default' => ''
            ),				
			  'arena_boxhead1' => array(
                'id' => 'themeszen_options[arena_boxhead1]',
                'label' => __('Homepage About 1 heading', 'arena'),
                'description' => __('Heading for homepage about1.', 'arena'),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => ''
            ),
			 'arena_boxtext1' => array(
                'id' => 'themeszen_options[arena_boxtext1]',
                'label' => __('Homepage About 1 text', 'arena'),
                'description' => __('Textarea for homepage about1.', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),
			  'arena_boximage1' => array(
                'id' => 'themeszen_options[arena_boximage1]',
                'label' => __('Homepage About 1 thumbnail image', 'arena'),
                'description' => __('215px x 130px exact. Upload your image for homepage about 1.', 'arena'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => ''
            ),
			  'arena_boxlink1' => array(
                'id' => 'themeszen_options[arena_boxlink1]',
                'label' => __('Homepage About 1 link', 'arena'),
                'description' => __('Paste here the link of the page or post.', 'arena'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => ''
            ),
			'arena_boxhead2' => array(
                'id' => 'themeszen_options[arena_boxhead2]',
                'label' => __('Homepage About 2 heading', 'arena'),
                'description' => __('Heading for homepage About2.', 'arena'),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => ''
            ),
			 'arena_boxtext2' => array(
                'id' => 'themeszen_options[arena_boxtext2]',
                'label' => __('Homepage About 2 text', 'arena'),
                'description' => __('Textarea for homepage About2.', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),
			  'arena_boximage2' => array(
                'id' => 'themeszen_options[arena_boximage2]',
                'label' => __('Homepage About 2 thumbnail image', 'arena'),
                'description' => __('215px x 130px exact. Upload your image for homepage About 2.', 'arena'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => ''
            ),
			  'arena_boxlink2' => array(
                'id' => 'themeszen_options[arena_boxlink2]',
                'label' => __('Homepage About 2 link', 'arena'),
                'description' => __('Paste here the link of the page or post.', 'arena'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => ''
            ),
			'arena_boxhead3' => array(
                'id' => 'themeszen_options[arena_boxhead3]',
                'label' => __('Homepage About 3 heading', 'arena'),
                'description' => __('Heading for homepage About3.', 'arena'),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => ''
            ),
			 'arena_boxtext3' => array(
                'id' => 'themeszen_options[arena_boxtext3]',
                'label' => __('Homepage About 3 text', 'arena'),
                'description' => __('Textarea for homepage About3.', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),
			  'arena_boximage3' => array(
                'id' => 'themeszen_options[arena_boximage3]',
                'label' => __('Homepage About 3 thumbnail image', 'arena'),
                'description' => __('215px x 130px exact. Upload your image for homepage About 3.', 'arena'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => ''
            ),
			  'arena_boxlink3' => array(
                'id' => 'themeszen_options[arena_boxlink3]',
                'label' => __('Homepage About 3 link', 'arena'),
                'description' => __('Paste here the link of the page or post.', 'arena'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => ''
            ),'arena_boxhead4' => array(
                'id' => 'themeszen_options[arena_boxhead4]',
                'label' => __('Homepage Box 4 heading', 'arena'),
                'description' => __('Heading for homepage box4.', 'arena'),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => ''
            ),
			 'arena_boxtext4' => array(
                'id' => 'themeszen_options[arena_boxtext4]',
                'label' => __('Homepage Box 4 text', 'arena'),
                'description' => __('Textarea for homepage box4.', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),
			  'arena_boximage4' => array(
                'id' => 'themeszen_options[arena_boximage4]',
                'label' => __('Homepage Box 4 thumbnail image', 'arena'),
                'description' => __('215px x 130px exact. Upload your image for homepage box 4.', 'arena'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => ''
            ),
			  'arena_boxlink4' => array(
                'id' => 'themeszen_options[arena_boxlink4]',
                'label' => __('Homepage Box 4 link', 'arena'),
                'description' => __('Paste here the link of the page or post.', 'arena'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => ''
            ),
            'arena_home_page_slider' => array(
                'id' => 'themeszen_options[arena_home_page_slider]',
                'label' => __('Slider Bar On/Off', 'arena'),
                'description' => __('Select option to display welcome slider bar.', 'arena'),
                'type' => 'option',
                'setting_type' => 'radio',
                'default' => 'on',
                'choices' => array(
                    "on" => "On",
                    "off" => "Off")
            ),
			  'arena_home_page_slider1' => array(
                'id' => 'themeszen_options[arena_home_page_slider1]',
                'label' => __('Slider Caption On/Off', 'arena'),
                'description' => __('Select option to display caption of slider.', 'arena'),
                'type' => 'option',
                'setting_type' => 'radio',
                'default' => 'on',
                'choices' => array(
                    "on" => "On",
                    "off" => "Off")
            ),
		   'arena_slidewelcometext' => array(
                'id' => 'themeszen_options[arena_slidewelcometext]',
                'label' => __('Welcome text', 'arena'),
                'description' => __('Hompage slider welcome text content.', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),		
			'arena_slidewelcomebtntext' => array(
                'id' => 'themeszen_options[arena_slidewelcomebtntext]',
                'label' => __('Welcome Button text', 'arena'),
                'description' => __('Hompage slider welcome button text.', 'arena'),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => ''
            ),
			'arena_slidewelcomelink' => array(
                'id' => 'themeszen_options[arena_slidewelcomelink]',
                'label' => __('Welcome Button link', 'arena'),
                'description' => __('Hompage slider welcome button link.', 'arena'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => ''
            ),						
            'arena_slideimage1' => array(
                'id' => 'themeszen_options[arena_slideimage1]',
                'label' => __('First Slider Image', 'arena'),
                'description' => __('1200px x 500px minimum. Upload your image for homepage slider.', 'arena'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => ''
            ),
            'arena_slideheading1' => array(
                'id' => 'themeszen_options[arena_slideheading1]',
                'label' => __('First Slider Heading', 'arena'),
                'description' => __('Enter the Heading for Home page First slider', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),
            'arena_slidetext1' => array(
                'id' => 'themeszen_options[arena_slidetext1]',
                'label' => __('First Slider Text', 'arena'),
                'description' => __('Enter the Text for Home page First slider', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),
            'arena_slidelink1' => array(
                'id' => 'themeszen_options[arena_slidelink1]',
                'label' => __('First Slide Link', 'arena'),
                'description' => __('Paste here the link of the page or post.', 'arena'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => ''
            ),
            'arena_slideimage2' => array(
                'id' => 'themeszen_options[arena_slideimage2]',
                'label' => __('Second Slider Image', 'arena'),
                'description' => __('1200px x 500px minimum. Upload your image for homepage slider.', 'arena'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => ''
            ),
            'arena_slideheading2' => array(
                'id' => 'themeszen_options[arena_slideheading2]',
                'label' => __('Second Slider Heading', 'arena'),
                'description' => __('Enter the Heading for Home page Second slider', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),
            'arena_slidetext2' => array(
                'id' => 'themeszen_options[arena_slidetext2]',
                'label' => __('Second Slider Text', 'arena'),
                'description' => __('Enter the Text for Home page Second slider', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),			
            'arena_slidelink2' => array(
                'id' => 'themeszen_options[arena_slidelink2]',
                'label' => __('Second Slide Link', 'arena'),
                'description' => __('Paste here the link of the page or post.', 'arena'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => ''
            ),
 			 'arena_portfolio_status' => array(
                'id' => 'themeszen_options[arena_portfolio_status]',
                'label' => __('Portfolio Section On/Off', 'arena'),
                'description' => __('Turn on or off the home page portfolio section as per your requirement.', 'arena'),
                'type' => 'option',
                'setting_type' => 'radio',
                'transport' => 'postMessage',
                'default' => 'on',
                'choices' => array(
                    'on' => 'On',
                    'off' => 'Off'
                )
            ),
            'themeszen_portfolio_main_head' => array(
                'id' => 'themeszen_options[themeszen_portfolio_main_head]',
                'label' => __('Portfolio Main Heading', 'arena'),
                'description' => __('Here mention the text portfolio Section Main Description', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'transport' => 'postMessage',
                'default' => ''
            ),
            'themeszen_portfolio_main_desc' => array(
                'id' => 'themeszen_options[themeszen_portfolio_main_desc]',
                'label' => __('Portfolio Main Description', 'arena'),
                'description' => __('Here mention the text portfolio Section Description', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'transport' => 'postMessage',
                'default' => ''
            ),
            'themeszen_portfolio' => array(
                'id' => 'themeszen_options[themeszen_portfolio]',
                'label' => __('First Portfolio Description', 'arena'),
                'description' => __('Here mention the first portfolio description', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'transport' => 'postMessage',
                'default' => ''
            ),
            'themeszen_portfolio_img' => array(
                'id' => 'themeszen_options[themeszen_portfolio_img]',
                'label' => __('First Portfolio Image', 'arena'),
                'description' => __('Here mention the first portfolio Image', 'arena'),
                'type' => 'option',
                'setting_type' => 'image',
                'transport' => 'postMessage',
                'default' => ''
            ),
            'themeszen_portfolio_name' => array(
                'id' => 'themeszen_options[themeszen_portfolio_name]',
                'label' => __('First Portfolio Name', 'arena'),
                'description' => __('Here mention the name of  portfolio name', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'transport' => 'postMessage',
                'default' => ''
            ),
            'themeszen_portfolio_link' => array(
                'id' => 'themeszen_options[themeszen_portfolio_link]',
                'label' => __('First Portfolio Link', 'arena'),
                'description' => __('Here insert the link of  portfolio page', 'arena'),
                'type' => 'option',
                'setting_type' => 'text',
                'transport' => 'postMessage',
                'default' => ''
            ),					
            'themeszen_portfolio_2' => array(
                'id' => 'themeszen_options[themeszen_portfolio_2]',
                'label' => __('Second Portfolio Description', 'arena'),
                'description' => __('Here mention the Second portfolio description', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'transport' => 'postMessage',
                'default' => ''
            ),
            'themeszen_portfolio_img_2' => array(
                'id' => 'themeszen_options[themeszen_portfolio_img_2]',
                'label' => __('Second Portfolio Image', 'arena'),
                'description' => __('Here mention the Second portfolio Image', 'arena'),
                'type' => 'option',
                'setting_type' => 'image',
                'transport' => 'postMessage',
                'default' => ''
            ),
            'themeszen_portfolio_name_2' => array(
                'id' => 'themeszen_options[themeszen_portfolio_name_2]',
                'label' => __('Second Portfolio Name', 'arena'),
                'description' => __('Here mention the name of  portfolio name', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'transport' => 'postMessage',
                'default' => ''
            ),
            'themeszen_portfolio_link2' => array(
                'id' => 'themeszen_options[themeszen_portfolio_link2]',
                'label' => __('Second Portfolio Link', 'arena'),
                'description' => __('Here insert the link of  portfolio page', 'arena'),
                'type' => 'option',
                'setting_type' => 'text',
                'transport' => 'postMessage',
                'default' => ''
            ),					
            'themeszen_portfolio_3' => array(
                'id' => 'themeszen_options[themeszen_portfolio_3]',
                'label' => __('Third Portfolio Description', 'arena'),
                'description' => __('Here mention the Third portfolio description', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'transport' => 'postMessage',
                'default' => ''
            ),
            'themeszen_portfolio_img_3' => array(
                'id' => 'themeszen_options[themeszen_portfolio_img_3]',
                'label' => __('Third Portfolio Image', 'arena'),
                'description' => __('Here mention the Third portfolio Image', 'arena'),
                'type' => 'option',
                'setting_type' => 'image',
                'transport' => 'postMessage',
                'default' => ''
            ),
            'themeszen_portfolio_name_3' => array(
                'id' => 'themeszen_options[themeszen_portfolio_name_3]',
                'label' => __('Third Portfolio Name', 'arena'),
                'description' => __('Here mention the name of  portfolio name', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'transport' => 'postMessage',
                'default' => ''
            ),	
            'themeszen_portfolio_link3' => array(
                'id' => 'themeszen_options[themeszen_portfolio_link3]',
                'label' => __('Third Portfolio Link', 'arena'),
                'description' => __('Here insert the link of  portfolio page', 'arena'),
                'type' => 'option',
                'setting_type' => 'text',
                'transport' => 'postMessage',
                'default' => ''
            ),					
 			 'arena_testimonial_status' => array(
                'id' => 'themeszen_options[arena_testimonial_status]',
                'label' => __('Testimonial Section On/Off', 'arena'),
                'description' => __('Turn on or off the home page testimonial section as per your requirement.', 'arena'),
                'type' => 'option',
                'setting_type' => 'radio',
                'transport' => 'postMessage',
                'default' => 'on',
                'choices' => array(
                    'on' => 'On',
                    'off' => 'Off'
                )
            ),
            'themeszen_testimonial_main_head' => array(
                'id' => 'themeszen_options[themeszen_testimonial_main_head]',
                'label' => __('Testimonial Main Heading', 'arena'),
                'description' => __('Here mention the text testimonial Section Main Description', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'transport' => 'postMessage',
                'default' => ''
            ),
            'themeszen_testimonial_main_desc' => array(
                'id' => 'themeszen_options[themeszen_testimonial_main_desc]',
                'label' => __('Testimonial Main Description', 'arena'),
                'description' => __('Here mention the text testimonial Section Description', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'transport' => 'postMessage',
                'default' => ''
            ),
            'themeszen_testimonial' => array(
                'id' => 'themeszen_options[themeszen_testimonial]',
                'label' => __('First Testimonial Description', 'arena'),
                'description' => __('Here mention the first testimonial description of client', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'transport' => 'postMessage',
                'default' => ''
            ),
            'themeszen_testimonial_img' => array(
                'id' => 'themeszen_options[themeszen_testimonial_img]',
                'label' => __('First Testimonial Image', 'arena'),
                'description' => __('Here mention the first testimonial Image of client', 'arena'),
                'type' => 'option',
                'setting_type' => 'image',
                'transport' => 'postMessage',
                'default' => ''
            ),
            'themeszen_testimonial_name' => array(
                'id' => 'themeszen_options[themeszen_testimonial_name]',
                'label' => __('First Testimonial Name', 'arena'),
                'description' => __('Here mention the name of  testimonial name of client', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'transport' => 'postMessage',
                'default' => ''
            ),
            'themeszen_testimonial_2' => array(
                'id' => 'themeszen_options[themeszen_testimonial_2]',
                'label' => __('Second Testimonial Description', 'arena'),
                'description' => __('Here mention the Second testimonial description of client', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'transport' => 'postMessage',
                'default' => ''
            ),
            'themeszen_testimonial_img_2' => array(
                'id' => 'themeszen_options[themeszen_testimonial_img_2]',
                'label' => __('Second Testimonial Image', 'arena'),
                'description' => __('Here mention the Second testimonial Image of client', 'arena'),
                'type' => 'option',
                'setting_type' => 'image',
                'transport' => 'postMessage',
                'default' => ''
            ),
            'themeszen_testimonial_name_2' => array(
                'id' => 'themeszen_options[themeszen_testimonial_name_2]',
                'label' => __('Second Testimonial Name', 'arena'),
                'description' => __('Here mention the name of  testimonial name of client', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'transport' => 'postMessage',
                'default' => ''
            ),
            'themeszen_testimonial_3' => array(
                'id' => 'themeszen_options[themeszen_testimonial_3]',
                'label' => __('Third Testimonial Description', 'arena'),
                'description' => __('Here mention the Third testimonial description of client', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'transport' => 'postMessage',
                'default' => ''
            ),
            'themeszen_testimonial_img_3' => array(
                'id' => 'themeszen_options[themeszen_testimonial_img_3]',
                'label' => __('Third Testimonial Image', 'arena'),
                'description' => __('Here mention the Third testimonial Image of client', 'arena'),
                'type' => 'option',
                'setting_type' => 'image',
                'transport' => 'postMessage',
                'default' => ''
            ),
            'themeszen_testimonial_name_3' => array(
                'id' => 'themeszen_options[themeszen_testimonial_name_3]',
                'label' => __('Third Testimonial Name', 'arena'),
                'description' => __('Here mention the name of  testimonial name of client', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'transport' => 'postMessage',
                'default' => ''
            ),
            'arena_home_page_cta' => array(
                'id' => 'themeszen_options[arena_home_page_cta]',
                'label' => __('Cta Bar On/Off', 'arena'),
                'description' => __('Select option to display Cta bar.', 'arena'),
                'type' => 'option',
                'setting_type' => 'radio',
                'default' => 'on',
                'choices' => array(
                    "on" => "On",
                    "off" => "Off")
            ),					
		   'arena_ctatext' => array(
                'id' => 'themeszen_options[arena_ctatext]',
                'label' => __('Cta text', 'arena'),
                'description' => __('Hompage slider cta text content.', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),		
			'arena_ctabtntext' => array(
                'id' => 'themeszen_options[arena_ctabtntext]',
                'label' => __('Cta Button text', 'arena'),
                'description' => __('Hompage Cta button text.', 'arena'),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => ''
            ),
			'arena_ctalink' => array(
                'id' => 'themeszen_options[arena_ctalink]',
                'label' => __('Cta Button link', 'arena'),
                'description' => __('Hompage Cta button link.', 'arena'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => ''
            ),			
            'arena_footertext' => array(
                'id' => 'themeszen_options[arena_footertext]',
                'label' => __('Footer copyright text', 'arena'),
                'description' => __('Enter your company name here.', 'arena'),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => ''
            ),
            'arena_blogtitle' => array(
                'id' => 'themeszen_options[arena_blogtitle]',
                'label' => __('Blog title', 'arena'),
                'description' => __('Enter your blog name here.', 'arena'),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => 'Blog'
            ),			
            'themeszen_customcss' => array(
                'id' => 'themeszen_options[themeszen_customcss]',
                'label' => __('Custom CSS', 'arena'),
                'description' => __('Quickly add your custom CSS code to your theme by writing the code in this block.', 'arena'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            )
        );
        return $theme_settings;
    }

    public static function themeszen_Controls($wp_customize) {

        $sections = self::themeszen_Section_Content();
        $settings = self::themeszen_Settings();

        foreach ($sections as $section_id => $section_content) {

            foreach ($section_content as $section_content_id) {

                switch ($settings[$section_content_id]['setting_type']) {
                    case 'image':
                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'themeszen_sanitize_url');
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
                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'themeszen_sanitize_text');

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

                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'themeszen_sanitize_textarea');

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

                    case 'link':

                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'themeszen_sanitize_url');

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

                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'themeszen_sanitize_color');

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

                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'themeszen_sanitize_number');

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

                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'themeszen_sanitize_select');

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

                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'themeszen_sanitize_radio');

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
            'sanitize_callback' => array('themeszen_Customizer', $sanitize_callback),
            'type' => $type
                )
        );
    }

    /**
     * adds sanitization callback funtion : textarea
     * @package themeszen
     */
    public static function themeszen_sanitize_textarea($value) {
        $value = esc_html($value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : url
     * @package themeszen
     */
    public static function themeszen_sanitize_url($value) {
        $value = esc_url($value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : text
     * @package themeszen
     */
    public static function themeszen_sanitize_text($value) {
        $value = sanitize_text_field($value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : email
     * @package themeszen
     */
    public static function themeszen_sanitize_email($value) {
        $value = sanitize_email($value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : number
     * @package themeszen
     */
    public static function themeszen_sanitize_number($value) {
        $value = preg_replace("/[^0-9+ ]/", "", $value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : number
     * @package themeszen
     */
    public static function themeszen_sanitize_color($value) {
        $value = sanitize_hex_color($value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : select
     * @package themeszen
     */
    public static function themeszen_sanitize_select($value, $setting) {
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
     * @package themeszen
     */
    public static function themeszen_sanitize_radio($value, $setting) {
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
add_action('customize_register', array('themeszen_Customizer', 'themeszen_Register'));

function themeszen_registers() {
    wp_register_script('themeszen_jquery_ui', '//code.jquery.com/ui/1.11.0/jquery-ui.js', array("jquery"), true);
    wp_register_script('themeszen_customizer_script', get_template_directory_uri() . '/admin/js/themeszen_customizer.js', array("jquery", "themeszen_jquery_ui"), true);
    wp_enqueue_script('themeszen_customizer_script');
    wp_localize_script('themeszen_customizer_script', 'zen_advert', array(
        'pro' => __('Buy PRO version!', 'arena'),
        'url' => esc_url('http://www.themeszen.com/?page_id=73'),
        'support_text' => __('Need Help!', 'arena'),
        'support_url' => esc_url('http://www.themeszen.com/?page_id=33'),
            )
    );
}

add_action('customize_controls_enqueue_scripts', 'themeszen_registers');

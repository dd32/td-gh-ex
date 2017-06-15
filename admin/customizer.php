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
            'title' => __('General Settings', 'discover'),
            'description' => __('Allows you to setup home page feature area section for discover Theme.', 'discover'),
            'priority' => '9',
            'capability' => 'edit_theme_options'
        ));

        /**
         * Site Title Section
         */
        $wp_customize->add_section('title_tagline', array(
            'title' => __('Site Title & Tagline', 'discover'),
            'priority' => '',
            'panel' => 'general_setting_panel'
        ));


 /**
         * Add panel for home page box area
         */
        $wp_customize->add_panel('homepage_setting_panel', array(
            'title' => __('Homepage Box Settings', 'discover'),
            'description' => __('Allows you to setup home page box section.', 'discover'),
            'priority' => '10',
            'capability' => 'edit_theme_options'
        ));
		
		    /**
         * First home page box section
         */
        $wp_customize->add_section('home_page_box_1', array(
            'title' => __('Homepage Box 1', 'discover'),
            'description' => __('Allows you to setup Homepage Box 1 for discover Theme.', 'discover'), //Descriptive tooltip
            'panel' => 'homepage_setting_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
		
				    /**
         * Second home page box section
         */
        $wp_customize->add_section('home_page_box_2', array(
            'title' => __('Homepage Box 2', 'discover'),
            'description' => __('Allows you to setup Homepage Box 2 for discover Theme.', 'discover'), //Descriptive tooltip
            'panel' => 'homepage_setting_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
		
				    /**
         * Third home page box section
         */
        $wp_customize->add_section('home_page_box_3', array(
            'title' => __('Homepage Box 3', 'discover'),
            'description' => __('Allows you to setup Homepage Box 3 for discover Theme.', 'discover'), //Descriptive tooltip
            'panel' => 'homepage_setting_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );


		    /**
         * Fourth home page box section
         */
        $wp_customize->add_section('home_page_box_4', array(
            'title' => __('Homepage Box 4', 'discover'),
            'description' => __('Allows you to setup Homepage Box 4 for discover Theme.', 'discover'), //Descriptive tooltip
            'panel' => 'homepage_setting_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Home page slider panel
         */
        $wp_customize->add_panel('home_page_slider_panel', array(
            'title' => __('Slider Settings', 'discover'),
            'description' => __('Allows you to setup home page slider for discover Theme.', 'discover'),
            'priority' => '11',
            'capability' => 'edit_theme_options'
        ));

        /**
         * Slider controle section
         */
        $wp_customize->add_section('home_page_slider_control', array(
            'title' => __('Slider Control', 'discover'),
            'description' => __('Turn on or off the home page Slider elements.', 'discover'), //Descriptive tooltip
            'panel' => 'home_page_slider_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
		
		        /**
         * Welcome Slider section
         */
        $wp_customize->add_section('home_page_welcome', array(
            'title' => __('Welcome settings', 'discover'),
            'description' => __('Allows you to setup weloome elements for discover Theme.', 'discover'), //Descriptive tooltip
            'panel' => 'home_page_slider_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );

        /**
         * First Slider section
         */
        $wp_customize->add_section('home_page_slider_1', array(
            'title' => __('First Slider', 'discover'),
            'description' => __('Allows you to setup first slider for discover Theme.', 'discover'), //Descriptive tooltip
            'panel' => 'home_page_slider_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );

        /**
         * Second Slider section
         */
        $wp_customize->add_section('home_page_slider_2', array(
            'title' => __('Second Slider', 'discover'),
            'description' => __('Allows you to setup second slider for discover Theme.', 'discover'), //Descriptive tooltip
            'panel' => 'home_page_slider_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );

        /**
         * Footer Setting
         */
        $wp_customize->add_section('footer_section', array(
            'title' => __('Footer Settings', 'discover'),
            'description' => __('Allows you to setup footer copyright text for discover Theme.', 'discover'),
            'priority' => '16',
            'panel' => ''
        ));

        /**
         * Add panel for styling option
         */
        $wp_customize->add_panel('style_setting', array(
            'title' => __('Style Settings', 'discover'),
            'description' => __('Allows you to setup Theme text and Background color for discover Theme.', 'discover'),
            'priority' => '17',
            'capability' => 'edit_theme_options'
        ));

        /**
         * Background color Section
         */
        $wp_customize->add_section('colors', array(
            'title' => __('Background color Setting', 'discover'),
            'description' => __('Allows you to change Background color for discover Theme. This only works when no any image set as background image.', 'discover'),
            'priority' => '',
            'panel' => 'style_setting'
        ));

        /**
         * Background Image Section
         */
        $wp_customize->add_section('background_image', array(
            'title' => __('Background Image setting', 'discover'),
            'description' => __('Allows you to change background image for discover Theme. This will overright the background color property', 'discover'),
            'priority' => '',
            'panel' => 'style_setting'
        ));

        /**
         * Text color Section
         */
        $wp_customize->add_section('text_colors', array(
            'title' => __('Text color setting', 'discover'),
            'description' => __('Allows you to change text color for discover Theme.', 'discover'),
            'priority' => '',
            'panel' => 'style_setting'
        ));

        /**
         * Style Section
         */
        $wp_customize->add_section('style_section', array(
            'title' => __('Custom Style Setting', 'discover'),
            'description' => __('Allows you to change style using custom css for discover Theme.', 'discover'),
            'panel' => 'style_setting',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
    }

    public static function themeszen_Section_Content() {

        $section_content = array(
			  'home_page_box_1' => array(
                 'discover_boxhead1',
                'discover_boxtext1',
                'discover_boximage1',
                'discover_boxlink1'
            ),
			 'home_page_box_2' => array(
                 'discover_boxhead2',
                'discover_boxtext2',
                'discover_boximage2',
                'discover_boxlink2'
            ),
			 'home_page_box_3' => array(
                 'discover_boxhead3',
                'discover_boxtext3',
                'discover_boximage3',
                'discover_boxlink3'
            ),
			 'home_page_box_4' => array(
                 'discover_boxhead4',
                'discover_boxtext4',
                'discover_boximage4',
                'discover_boxlink4'
            ),
            'home_page_slider_control' => array(
                'discover_home_page_slider',
				 'discover_home_page_slider1'
            ),
            'home_page_welcome' => array(
                'discover_slidewelcomehead',
				'discover_slidewelcometext',
				'discover_slidewelcomebtntext',
				'discover_slidewelcomelink'
            ),			
            'home_page_slider_1' => array(
                'discover_slideimage1',
                'discover_slideheading1',
                'discover_slidelink1'
            ),
            'home_page_slider_2' => array(
                'discover_slideimage2',
                'discover_slideheading2',
                'discover_slidelink2'
            ),
            'footer_section' => array(
                'discover_footertext'
            ),
            
        );
        return $section_content;
    }

    public static function themeszen_Settings() {

        $theme_settings = array(
			  'discover_boxhead1' => array(
                'id' => 'themeszen_options[discover_boxhead1]',
                'label' => __('Homepage Box 1 heading', 'discover'),
                'description' => __('Heading for homepage box1.', 'discover'),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => ''
            ),
			 'discover_boxtext1' => array(
                'id' => 'themeszen_options[discover_boxtext1]',
                'label' => __('Homepage Box 1 text', 'discover'),
                'description' => __('Textarea for homepage box1.', 'discover'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),
			  'discover_boximage1' => array(
                'id' => 'themeszen_options[discover_boximage1]',
                'label' => __('Homepage Box 1 thumbnail image', 'discover'),
                'description' => __('215px x 130px exact. Upload your image for homepage box 1.', 'discover'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => ''
            ),
			  'discover_boxlink1' => array(
                'id' => 'themeszen_options[discover_boxlink1]',
                'label' => __('Homepage Box 1 link', 'discover'),
                'description' => __('Paste here the link of the page or post.', 'discover'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => ''
            ),
			'discover_boxhead2' => array(
                'id' => 'themeszen_options[discover_boxhead2]',
                'label' => __('Homepage Box 2 heading', 'discover'),
                'description' => __('Heading for homepage box2.', 'discover'),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => ''
            ),
			 'discover_boxtext2' => array(
                'id' => 'themeszen_options[discover_boxtext2]',
                'label' => __('Homepage Box 2 text', 'discover'),
                'description' => __('Textarea for homepage box2.', 'discover'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),
			  'discover_boximage2' => array(
                'id' => 'themeszen_options[discover_boximage2]',
                'label' => __('Homepage Box 2 thumbnail image', 'discover'),
                'description' => __('215px x 130px exact. Upload your image for homepage box 2.', 'discover'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => ''
            ),
			  'discover_boxlink2' => array(
                'id' => 'themeszen_options[discover_boxlink2]',
                'label' => __('Homepage Box 2 link', 'discover'),
                'description' => __('Paste here the link of the page or post.', 'discover'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => ''
            ),
			'discover_boxhead3' => array(
                'id' => 'themeszen_options[discover_boxhead3]',
                'label' => __('Homepage Box 3 heading', 'discover'),
                'description' => __('Heading for homepage box3.', 'discover'),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => ''
            ),
			 'discover_boxtext3' => array(
                'id' => 'themeszen_options[discover_boxtext3]',
                'label' => __('Homepage Box 3 text', 'discover'),
                'description' => __('Textarea for homepage box3.', 'discover'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),
			  'discover_boximage3' => array(
                'id' => 'themeszen_options[discover_boximage3]',
                'label' => __('Homepage Box 3 thumbnail image', 'discover'),
                'description' => __('215px x 130px exact. Upload your image for homepage box 3.', 'discover'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => ''
            ),
			  'discover_boxlink3' => array(
                'id' => 'themeszen_options[discover_boxlink3]',
                'label' => __('Homepage Box 3 link', 'discover'),
                'description' => __('Paste here the link of the page or post.', 'discover'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => ''
            ),'discover_boxhead4' => array(
                'id' => 'themeszen_options[discover_boxhead4]',
                'label' => __('Homepage Box 4 heading', 'discover'),
                'description' => __('Heading for homepage box4.', 'discover'),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => ''
            ),
			 'discover_boxtext4' => array(
                'id' => 'themeszen_options[discover_boxtext4]',
                'label' => __('Homepage Box 4 text', 'discover'),
                'description' => __('Textarea for homepage box4.', 'discover'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),
			  'discover_boximage4' => array(
                'id' => 'themeszen_options[discover_boximage4]',
                'label' => __('Homepage Box 4 thumbnail image', 'discover'),
                'description' => __('215px x 130px exact. Upload your image for homepage box 4.', 'discover'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => ''
            ),
			  'discover_boxlink4' => array(
                'id' => 'themeszen_options[discover_boxlink4]',
                'label' => __('Homepage Box 4 link', 'discover'),
                'description' => __('Paste here the link of the page or post.', 'discover'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => ''
            ),
            'discover_home_page_slider' => array(
                'id' => 'themeszen_options[discover_home_page_slider]',
                'label' => __('Slider Button On/Off', 'discover'),
                'description' => __('Select option to display welcome button of slider(download now).', 'discover'),
                'type' => 'option',
                'setting_type' => 'radio',
                'default' => 'on',
                'choices' => array(
                    "on" => "On",
                    "off" => "Off")
            ),
			  'discover_home_page_slider1' => array(
                'id' => 'themeszen_options[discover_home_page_slider1]',
                'label' => __('Slider Caption On/Off', 'discover'),
                'description' => __('Select option to display caption of slider.', 'discover'),
                'type' => 'option',
                'setting_type' => 'radio',
                'default' => 'on',
                'choices' => array(
                    "on" => "On",
                    "off" => "Off")
            ),
			   'discover_slidewelcomehead' => array(
                'id' => 'themeszen_options[discover_slidewelcomehead]',
                'label' => __('Welcome headline', 'discover'),
                'description' => __('Hompage slider welcome headline content.', 'discover'),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => ''
            ),
		   'discover_slidewelcometext' => array(
                'id' => 'themeszen_options[discover_slidewelcometext]',
                'label' => __('Welcome text', 'discover'),
                'description' => __('Hompage slider welcome text content.', 'discover'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),		
			'discover_slidewelcomebtntext' => array(
                'id' => 'themeszen_options[discover_slidewelcomebtntext]',
                'label' => __('Welcome Button text', 'discover'),
                'description' => __('Hompage slider welcome button text.', 'discover'),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => ''
            ),
			'discover_slidewelcomelink' => array(
                'id' => 'themeszen_options[discover_slidewelcomelink]',
                'label' => __('Welcome Button link', 'discover'),
                'description' => __('Hompage slider welcome button link.', 'discover'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => ''
            ),						
            'discover_slideimage1' => array(
                'id' => 'themeszen_options[discover_slideimage1]',
                'label' => __('First Slider Image', 'discover'),
                'description' => __('637px x 298px minimum. Upload your image for homepage slider.', 'discover'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => ''
            ),
            'discover_slideheading1' => array(
                'id' => 'themeszen_options[discover_slideheading1]',
                'label' => __('First Slider Heading', 'discover'),
                'description' => __('Enter the Heading for Home page First slider', 'discover'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),
            'discover_slidelink1' => array(
                'id' => 'themeszen_options[discover_slidelink1]',
                'label' => __('First Slide Link', 'discover'),
                'description' => __('Paste here the link of the page or post.', 'discover'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => ''
            ),
            'discover_slideimage2' => array(
                'id' => 'themeszen_options[discover_slideimage2]',
                'label' => __('Second Slider Image', 'discover'),
                'description' => __('637px x 298px minimum. Upload your image for homepage slider.', 'discover'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => ''
            ),
            'discover_slideheading2' => array(
                'id' => 'themeszen_options[discover_slideheading2]',
                'label' => __('Second Slider Heading', 'discover'),
                'description' => __('Enter the Heading for Home page Second slider', 'discover'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),
            'discover_slidelink2' => array(
                'id' => 'themeszen_options[discover_slidelink2]',
                'label' => __('Second Slide Link', 'discover'),
                'description' => __('Paste here the link of the page or post.', 'discover'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => ''
            ),
            'discover_footertext' => array(
                'id' => 'themeszen_options[discover_footertext]',
                'label' => __('Footer copyright text', 'discover'),
                'description' => __('Enter your company name here.', 'discover'),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => ''
            ),
            'themeszen_customcss' => array(
                'id' => 'themeszen_options[themeszen_customcss]',
                'label' => __('Custom CSS', 'discover'),
                'description' => __('Quickly add your custom CSS code to your theme by writing the code in this block.', 'discover'),
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
        'pro' => __('View PRO version', 'discover'),
        'url' => esc_url('http://www.themeszen.com/?page_id=73'),
        'support_text' => __('Need Help!', 'discover'),
        'support_url' => esc_url('http://www.themeszen.com/?page_id=33'),
            )
    );
}

add_action('customize_controls_enqueue_scripts', 'themeszen_registers');

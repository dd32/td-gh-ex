<?php

class Appointway_Customizer {

    public static function Appointway_Register($wp_customize) {

        self::Appointway_Sections($wp_customize);

        self::Appointway_Controls($wp_customize);
    }

    public static function Appointway_Sections($wp_customize) {

        /**
         * General Section
         */
        $wp_customize->add_section('general_setting_section', array(
            'title' => __('General Settings', 'appointway'),
            'description' => __('Allows you to customize header logo, favicon, background etc settings for Appointway Theme.', 'appointway'), //Descriptive tooltip
            'panel' => '',
            'priority' => '10',
            'capability' => 'edit_theme_options'
                )
        );

        /**
         * Home Page Top Feature Area
         */
        $wp_customize->add_section('home_top_feature_area', array(
            'title' => __('Top Feature Area', 'appointway'),
            'description' => __('Allows you to setup Top feature area section for Appointway Theme.', 'appointway'), //Descriptive tooltip
            'panel' => '',
            'priority' => '11',
            'capability' => 'edit_theme_options'
                )
        );

        /**
         * Add panel for home page feature area
         */
        $wp_customize->add_panel('home_page_feature_area_panel', array(
            'title' => __('Home Page Feature Area', 'appointway'),
            'description' => __('Allows you to setup home page feature area section for Appointway Theme.', 'appointway'),
            'priority' => '12',
            'capability' => 'edit_theme_options'
        ));

        /**
         * Home Page Feature area setting
         */
        $wp_customize->add_section('home_page_feature_area_heading', array(
            'title' => __('Feature Area Heading', 'appointway'),
            'description' => __('Allows you to setup feature area section heading for Appointway Theme.', 'appointway'),
            'panel' => 'home_page_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );

        /**
         * Home Page feature area 1
         */
        $wp_customize->add_section('home_feature_area_section1', array(
            'title' => __('First Feature Area', 'appointway'),
            'description' => __('Allows you to setup first feature area section for Appointway Theme.', 'appointway'),
            'panel' => 'home_page_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );

        /**
         * Home Page feature area 2
         */
        $wp_customize->add_section('home_feature_area_section2', array(
            'title' => __('Second Feature Area', 'appointway'),
            'description' => __('Allows you to setup second feature area section for Appointway Theme.', 'appointway'),
            'panel' => 'home_page_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );

        /**
         * Home Page feature area 3
         */
        $wp_customize->add_section('home_feature_area_section3', array(
            'title' => __('Third Feature Area', 'appointway'),
            'description' => __('Allows you to setup third feature area section for Appointway Theme.', 'appointway'),
            'panel' => 'home_page_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );

        /**
         * Style Section
         */
        $wp_customize->add_section('style_section', array(
            'title' => __('Style Setting', 'appointway'),
            'description' => __('Allows you to change style using custom css for Appointway Theme.', 'appointway'),
            'panel' => '15',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );


        /**
         * Social Icon Section
         */
        $wp_customize->add_section('social_icon_section', array(
            'title' => __('Social Icons', 'appointway'),
            'description' => __('Allows you to setup social site link for Appointway Theme.', 'appointway'),
            'panel' => '',
            'priority' => '14',
            'capability' => 'edit_theme_options'
                )
        );
    }

    public static function Appointway_Section_Content() {

        $section_content = array(
            'general_setting_section' => array(
                'appointway_logo',
                'appointway_favicon',
                'appointway_bodybg',
                'appointway_topright',
                'appointway_contact_number'
            ),
            'home_top_feature_area' => array(
                'appointway_page_main_heading',
                'appointway_page_sub_heading',
                'appointway_slideimage1',
                'appointway_slidelink1'
            ),
            'home_page_feature_area_heading' => array(
                'appointway_feature_mainhead'
            ),
            'home_feature_area_section1' => array(
                'appointway_firsthead',
                'appointway_feature_image1',
                'appointway_firstdesc',
                'appointway_feature_link1'
            ),
            'home_feature_area_section2' => array(
                'appointway_secondhead',
                'appointway_feature_image2',
                'appointway_seconddesc',
                'appointway_feature_link2'
            ),
            'home_feature_area_section3' => array(
                'appointway_thirdhead',
                'appointway_feature_image3',
                'appointway_thirddesc',
                'appointway_feature_link3'
            ),
            'style_section' => array(
                'appointway_customcss'
            ),
            'social_icon_section' => array(
                'appointway_twitter',
                'appointway_facebook',
                'appointway_google',
                'appointway_rss',
                'appointway_linkdin'
            ),
        );
        return $section_content;
    }

    public static function Appointway_Seetings() {

        $appointway_settings = array(
            'appointway_logo' => array(
                'id' => 'appointway_options[appointway_logo]',
                'label' => __('Custom Logo', 'appointway'),
                'description' => __('Upload a logo for your Website. The recommended size for the logo is 340px width x 46px height.', 'appointway'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/logo.png'
            ),
            'appointway_favicon' => array(
                'id' => 'appointway_options[appointway_favicon]',
                'label' => __('Custom Favicon', 'appointway'),
                'description' => __('Here you can upload a Favicon for your Website. Specified size is 16px x 16px.', 'appointway'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => ''
            ),
            'appointway_bodybg' => array(
                'id' => 'appointway_options[appointway_bodybg]',
                'label' => __('Background Image', 'appointway'),
                'description' => __('Choose a suitable background image that will complement your website.', 'appointway'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => ''
            ),
            'appointway_topright' => array(
                'id' => 'appointway_options[appointway_topright]',
                'label' => __('Top Right Contact Details', 'appointway'),
                'description' => __('Mention the contact details here which will be displayed on the top right corner of Website.', 'appointway'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('For Reservation Call : 1.888.222.5847', 'appointway')
            ),
            'appointway_contact_number' => array(
                'id' => 'appointway_options[appointway_contact_number]',
                'label' => __('Contact Number For Tap To Call Feature', 'appointway'),
                'description' => __('Mention your contact number here through which users can interact to you directly. This feature is called tap to call and this will work when the user will access your website through mobile phones or iPhone.', 'appointway'),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => ''
            ),
            'appointway_page_main_heading' => array(
                'id' => 'appointway_options[appointway_page_main_heading]',
                'label' => __('Home Page Main Heading', 'appointway'),
                'description' => __('Mention the punch line for your business here.', 'appointway'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('We Provide The Best Spa Services In The New York City.', 'appointway')
            ),
            'appointway_page_sub_heading' => array(
                'id' => 'appointway_options[appointway_page_sub_heading]',
                'label' => __('Home Page Sub Heading', 'appointway'),
                'description' => __('Mention the tagline for your business here that will complement the punch line.', 'appointway'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Just Try Our Services. Book Your Appointments Now!', 'appointway')
            ),
            'appointway_slideimage1' => array(
                'id' => 'appointway_options[appointway_slideimage1]',
                'label' => __('Home Page Main Image', 'appointway'),
                'description' => __('Upload the image for the Home Page Main Image Area. Recommended size is 694px width x 345px height.', 'appointway'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/slider-img.jpg'
            ),
            'appointway_slidelink1' => array(
                'id' => 'appointway_options[appointway_slidelink1]',
                'label' => __('Link for Home Page Main Image', 'appointway'),
                'description' => __('Mention the URL for Home Page Main Image', 'appointway'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'appointway_feature_mainhead' => array(
                'id' => 'appointway_options[appointway_feature_mainhead]',
                'label' => __('Three Column Feature Main Heading', 'appointway'),
                'description' => __('Here you can mention a suitable title for your business services.', 'appointway'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Our Services', 'appointway')
            ),
            'appointway_firsthead' => array(
                'id' => 'appointway_options[appointway_firsthead]',
                'label' => __('First Feature Heading', 'appointway'),
                'description' => __('Mention the heading for First column that will showcase your business services.', 'appointway'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Easily Customise', 'appointway')
            ),
            'appointway_feature_image1' => array(
                'id' => 'appointway_options[appointway_feature_image1]',
                'label' => __('First Feature Image', 'appointway'),
                'description' => __('Upload an image for First column. Optimal size is 217px x 200px.', 'appointway'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/f-img1.jpg'
            ),
            'appointway_firstdesc' => array(
                'id' => 'appointway_options[appointway_firstdesc]',
                'label' => __('First Feature Description', 'appointway'),
                'description' => __('Write short description for your First heading.', 'appointway'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('All spas offer spa services like massage,', 'appointway')
            ),
            'appointway_feature_link1' => array(
                'id' => 'appointway_options[appointway_feature_link1]',
                'label' => __('First feature Link', 'appointway'),
                'description' => __('Enter your text for First feature Link.', 'appointway'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'appointway_secondhead' => array(
                'id' => 'appointway_options[appointway_secondhead]',
                'description' => __('Mention the heading for Second column that will showcase your business services.', 'appointway'),
                'label' => __('Second Feature Heading', 'appointway'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Single Click', 'appointway')
            ),
            'appointway_feature_image2' => array(
                'id' => 'appointway_options[appointway_feature_image2]',
                'label' => __('Second Feature Image', 'appointway'),
                'description' => __('Upload an image for Second column. Optimal size is 217px x 200px.', 'appointway'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/f-img2.jpg'
            ),
            'appointway_seconddesc' => array(
                'id' => 'appointway_options[appointway_seconddesc]',
                'label' => __('Second Feature Description', 'appointway'),
                'description' => __('Write short description for your Second heading.', 'appointway'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Body treatments deal with your body&#39;s skin.', 'appointway')
            ),
            'appointway_feature_link2' => array(
                'id' => 'appointway_options[appointway_feature_link2]',
                'label' => __('Second feature Link', 'appointway'),
                'description' => __('Enter your text for Second feature Link.', 'appointway'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'appointway_thirdhead' => array(
                'id' => 'appointway_options[appointway_thirdhead]',
                'label' => __('Third Feature Heading', 'appointway'),
                'description' => __('Mention the heading for Third column that will showcase your business services.', 'appointway'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('WordPress Theme', 'appointway')
            ),
            'appointway_feature_image3' => array(
                'id' => 'appointway_options[appointway_feature_image3]',
                'label' => __('Third Feature Image', 'appointway'),
                'description' => __('Upload an image for Third column. Optimal size is 217px x 200px.', 'appointway'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/f-img3.jpg'
            ),
            'appointway_thirddesc' => array(
                'id' => 'appointway_options[appointway_thirddesc]',
                'label' => __('Third Feature Description', 'appointway'),
                'description' => __('Write short description for your third heading.', 'appointway'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Massage feels good and has lots of health benefits.', 'appointway')
            ),
            'appointway_feature_link3' => array(
                'id' => 'appointway_options[appointway_feature_link3]',
                'label' => __('Third feature Link', 'appointway'),
                'description' => __('Enter your text for Second feature Link.', 'appointway'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'appointway_customcss' => array(
                'id' => 'appointway_options[appointway_customcss]',
                'label' => __('Custom CSS', 'appointway'),
                'description' => __('Quickly add your custom CSS code to your theme by writing the code in this block.', 'appointway'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),
            'appointway_twitter' => array(
                'id' => 'appointway_options[appointway_twitter]',
                'label' => __('Twitter URL', 'appointway'),
                'description' => __('Mention the URL of your Twitter here.', 'appointway'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'appointway_facebook' => array(
                'id' => 'appointway_options[appointway_facebook]',
                'label' => __('Facebook URL', 'appointway'),
                'description' => __('Mention the URL of your Facebook here.', 'appointway'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'appointway_google' => array(
                'id' => 'appointway_options[appointway_google]',
                'label' => __('Google+ URL', 'appointway'),
                'description' => __('Mention the URL of your Google+ here.', 'appointway'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'appointway_rss' => array(
                'id' => 'appointway_options[appointway_rss]',
                'label' => __('RSS URL', 'appointway'),
                'description' => __('Mention the URL of your RSS here.', 'appointway'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'appointway_linkdin' => array(
                'id' => 'appointway_options[appointway_linkdin]',
                'label' => __('LinkedIn URL', 'appointway'),
                'description' => __('Mention the URL of your LinkedIn here.', 'appointway'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            )
        );
        return $appointway_settings;
    }

    public static function Appointway_Controls($wp_customize) {

        $sections = self::Appointway_Section_Content();
        $settings = self::Appointway_Seetings();

        foreach ($sections as $section_id => $section_content) {

            foreach ($section_content as $section_content_id) {

                switch ($settings[$section_content_id]['setting_type']) {
                    case 'image':
                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'appoitway_sanitize_url');
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

                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'appoitway_sanitize_text');

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

                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'appoitway_sanitize_textarea');

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

                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'appoitway_sanitize_url');

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
            'sanitize_callback' => array('Appointway_Customizer', $sanitize_callback),
            'type' => $type
                )
        );
    }

    /**
     * adds sanitization callback funtion : textarea
     * @package Appointway
     */
    public static function appoitway_sanitize_textarea($value) {
        $value = esc_html($value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : url
     * @package Appointway
     */
    public static function appoitway_sanitize_url($value) {
        $value = esc_url($value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : text
     * @package Appointway
     */
    public static function appoitway_sanitize_text($value) {
        $value = sanitize_text_field($value);
        return $value;
    }
    /**
     * adds sanitization callback funtion : email
     * @package Appointway
     */
    public static function appoitway_sanitize_email($value) {
        $value = sanitize_email($value);
        return $value;
    }
    /**
     * adds sanitization callback funtion : number
     * @package Appointway
     */
    public static function appoitway_sanitize_number($value) {
        $value = preg_replace("/[^0-9+ ]/", "", $value);
        return $value;
    }
}
// Setup the Theme Customizer settings and controls...
add_action('customize_register', array('Appointway_Customizer', 'Appointway_Register'));
function inkthemes_registers() {
    wp_register_script( 'inkthemes_jquery_ui', '//code.jquery.com/ui/1.11.0/jquery-ui.js', array("jquery"), true  );
	wp_register_script( 'inkthemes_customizer_script', get_template_directory_uri() . '/functions/js/inkthemes_customizer.js', array("jquery","inkthemes_jquery_ui"), true  );
	wp_enqueue_script( 'inkthemes_customizer_script' );
	wp_localize_script( 'inkthemes_customizer_script', 'ink_advert', array(
	'pro' => __('View PRO version','appointway'),
	'url' => esc_url('http://www.inkthemes.com/wp-themes/appointway-wordpress-theme/'),
	'support_text' => __('Need Help!','appointway'),
	'support_url' => esc_url('http://www.inkthemes.com/lets-connect/'),
	)			
	);
}
add_action( 'customize_controls_enqueue_scripts', 'inkthemes_registers' );
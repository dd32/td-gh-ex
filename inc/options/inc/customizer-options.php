<?php
//the id of the options
$igthemes_option='base-wp';

//start class
class IGthemes_Customizer {
// add some settings
public static function igthemes_customize($wp_customize) {

/** The short name gives a unique element to each options id. */
global $igthemes_option;

// Move background color setting alongside background image.
    $wp_customize->get_control( 'background_color' )->section   = 'background_image';
    $wp_customize->get_control( 'background_color' )->priority  = 20;
// Change background image section title & priority.
    $wp_customize->get_section( 'background_image' )->title     = __( 'Background', 'base-wp' );
    $wp_customize->get_section( 'background_image' )->priority  = 30;

// GENERAL
    $wp_customize->get_section('title_tagline')->title = __('General', 'base-wp');
    $wp_customize->get_section('title_tagline')->priority = 3;

// Header
    $wp_customize->get_section( 'header_image' )->title         = __( 'Header', 'base-wp' );
    $wp_customize->get_section( 'header_image' )->priority      = 4;

// FOOTER
    $wp_customize->add_section('footer-settings', array(
        'title' => __('Footer', 'base-wp'),
        'priority' => 5,
    ));
// TYPOGRAPHY
    $wp_customize->add_section('typography-settings', array(
        'title' => __('Typography', 'base-wp'),
        'priority' => 6,
    ));
// BUTTONS
    $wp_customize->add_section('buttons-settings', array(
        'title' => __('Buttons', 'base-wp'),
        'priority' => 7,
    ));
// LAYOUT
    $wp_customize->add_section('layout-settings', array(
        'title' => __('Layout', 'base-wp'),
        'priority' => 8,
    ));
// SOCIAL
    $wp_customize->add_section('social-settings', array(
        'title' => __('Social', 'base-wp'),
        'priority' => 9,
    ));
// END SECTIONS

//ADD CONTROLS
/*****************************************************************
* PREMIUM
******************************************************************/
    if ( apply_filters( 'igthemes_customizer_more', true ) ) {
        $wp_customize->add_section( 'upgrade_premium' , array(
            'title'      		=> __( 'More Options', 'base-wp' ),
            'priority'   		=> 1,
        ) );

        $wp_customize->add_setting( 'upgrade_premium', array(
            'default'    		=> null,
            'sanitize_callback' => 'igthemes_sanitize_text',
        ) );

        $wp_customize->add_control( new IGthemes_More_Control( $wp_customize, 'upgrade_premium', array(
            'label'    			=> __( 'Looking for more options?', 'base-wp' ),
            'section'  			=> 'upgrade_premium',
            'settings' 			=> 'upgrade_premium',
            'priority' 			=> 1,
        ) ) );
    }
/*****************************************************************
* GENERAL SETTINGS
******************************************************************/
//breadcrumb
    $wp_customize->add_setting(
        $igthemes_option . '[breadcrumb]',
        array(
            'type' => 'option',
            'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control(
        'breadcrumb',
        array(
            'label' => esc_html__('Display breadcrumb', 'base-wp'),
            'description' => __( 'Yoast Breadcrumb supported<br>NavXT Breadcrumb supported', 'base-wp'),
            'type' => 'checkbox',
            'section' => 'title_tagline',
            'settings' => $igthemes_option . '[breadcrumb]',
            'priority' => 90,
    ));
//numeric_pagination
    $wp_customize->add_setting(
        $igthemes_option . '[numeric_pagination]',
        array(
            'type' => 'option',
            'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control(
        'numeric_pagination',
        array(
            'label' => esc_html__('Use numeric pagination', 'base-wp'),
            'description' => __( 'WP-PageNavi supported', 'base-wp'),
            'type' => 'checkbox',
            'section' => 'title_tagline',
            'settings' => $igthemes_option . '[numeric_pagination]',
            'priority' => 91,
    ));
/*****************************************************************
* LAYOUT SETTINGS
******************************************************************/
//main layout
    $wp_customize->add_setting(
        $igthemes_option . '[main_sidebar]',
        array(
            'type' => 'option',
            'sanitize_callback' => 'ightemes_sanitize_layout',
            'default' => 'right'
    ));
    $wp_customize->add_control(
            new IGthemes_Radio_Image_Control(
            // $wp_customize object
            $wp_customize,
            // $id
            'blog_layout',
            // $args
            array(
                'label'			=> __( 'General Layout', 'base-wp' ),
                'description'	=> __( 'Select the theme layout', 'base-wp' ),
                'type'          => 'radio-image',
                'section'		=> 'layout-settings',
                'settings'      => $igthemes_option . '[main_sidebar]',
                'choices'		=> array(
                    'left' 	    => get_template_directory_uri() . '/inc/options/images/left.png',
                    'right' 	=> get_template_directory_uri() . '/inc/options/images/right.png'
                )
            )
    ));
/*****************************************************************
* HEADER SETTINGS
******************************************************************/
//header color
    $wp_customize->add_setting(
        $igthemes_option . '[header_background_color]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#ffffff',
        'transport' => 'postMessage'

    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'header_background_color',
            array(
                'label' => __('Colors', 'base-wp'),
                'description' => __('Background color', 'base-wp'),
                'type' => 'color',
                'section' => 'header_image',
                'settings' => $igthemes_option . '[header_background_color]',
            )
    ));
//header text color
    $wp_customize->add_setting(
        $igthemes_option . '[header_text_color]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#666666',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'header_text_color',
            array(
                'label' => __('', 'base-wp'),
                'description' => __('Text color', 'base-wp'),
                'type' => 'color',
                'section' => 'header_image',
                'settings' => $igthemes_option . '[header_text_color]',
            )
    ));
//header link normal
    $wp_customize->add_setting(
        $igthemes_option . '[header_link_normal]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#444444',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'header_link_normal',
            array(
                'label' => __('', 'base-wp'),
                'description' => __('Link color', 'base-wp'),
                'type' => 'color',
                'section' => 'header_image',
                'settings' => $igthemes_option . '[header_link_normal]',
            )
    ));
//header link normal
    $wp_customize->add_setting(
        $igthemes_option . '[header_link_hover]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#ff9900',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'header_link_hover',
            array(
                'label' => __('', 'base-wp'),
                'description' => __('Link hover color', 'base-wp'),
                'type' => 'color',
                'section' => 'header_image',
                'settings' => $igthemes_option . '[header_link_hover]',
            )
    ));
/*****************************************************************
* TYPOGRAPHY SETTINGS
******************************************************************/
    //body text color
    $wp_customize->add_setting(
        $igthemes_option . '[body_text_color]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#666666',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'body_text_color',
            array(
                'label' => __('Font Style', 'base-wp'),
                'description' => __('Body text color', 'base-wp'),
                'type' => 'color',
                'section' => 'typography-settings',
                'settings' => $igthemes_option . '[body_text_color]',
            )
    ));
    //body headings color
    $wp_customize->add_setting(
        $igthemes_option . '[body_headings_color]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#444444',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'body_headings_color',
            array(
                'label' => __('', 'base-wp'),
                'description' => __('Headings color', 'base-wp'),
                'type' => 'color',
                'section' => 'typography-settings',
                'settings' => $igthemes_option . '[body_headings_color]',
            )
    ));
    //body link normal
    $wp_customize->add_setting(
        $igthemes_option . '[body_link_normal]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#444444',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'body_link_normal',
            array(
                'label' => __('', 'base-wp'),
                'description' => __('Link color', 'base-wp'),
                'type' => 'color',
                'section' => 'typography-settings',
                'settings' => $igthemes_option . '[body_link_normal]',
            )
    ));
    //body link hover
    $wp_customize->add_setting(
        $igthemes_option . '[body_link_hover]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#ff9900'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'body_link_hover',
            array(
                'label' => __('', 'base-wp'),
                'description' => __('Link color', 'base-wp'),
                'type' => 'color',
                'section' => 'typography-settings',
                'settings' => $igthemes_option . '[body_link_hover]',
            )
    ));
/*****************************************************************
* FOOTER SETTINGS
******************************************************************/
    //footer background color
    $wp_customize->add_setting(
        $igthemes_option . '[footer_background_color]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#ffffff',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'footer_background_color',
            array(
                'label' => __('Colors', 'base-wp'),
                'description' => __('Background color', 'base-wp'),
                'type' => 'color',
                'section' => 'footer-settings',
                'settings' => $igthemes_option . '[footer_background_color]',
            )
    ));
    //footer text color
    $wp_customize->add_setting(
        $igthemes_option . '[footer_text_color]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#666666',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'footer_text_color',
            array(
                'label' => __('', 'base-wp'),
                'description' => __('Text color', 'base-wp'),
                'type' => 'color',
                'section' => 'footer-settings',
                'settings' => $igthemes_option . '[footer_text_color]',
            )
    ));
    //footer headings color
    $wp_customize->add_setting(
        $igthemes_option . '[footer_headings_color]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#444444',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'footer_headings_color',
            array(
                'label' => __('', 'base-wp'),
                'description' => __('Hedings color', 'base-wp'),
                'type' => 'color',
                'section' => 'footer-settings',
                'settings' => $igthemes_option . '[footer_headings_color]',
            )
    ));
    //footer link normal
    $wp_customize->add_setting(
        $igthemes_option . '[footer_link_normal]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#444444',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'footer_link_normal',
            array(
                'label' => __('', 'base-wp'),
                'description' => __('Link color', 'base-wp'),
                'type' => 'color',
                'section' => 'footer-settings',
                'settings' => $igthemes_option . '[footer_link_normal]',
            )
    ));
    //footer link hover
    $wp_customize->add_setting(
        $igthemes_option . '[footer_link_hover]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#ff9900'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'footer_link_hover',
            array(
                'label' => __('', 'base-wp'),
                'description' => __('Link color', 'base-wp'),
                'type' => 'color',
                'section' => 'footer-settings',
                'settings' => $igthemes_option . '[footer_link_hover]',
            )
    ));
/*****************************************************************
* BUTTONS SETTINGS
******************************************************************/
    //button background color
    $wp_customize->add_setting(
        $igthemes_option . '[button_background_normal]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#444444',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'button_background_normal',
            array(
                'label' => __('Main Buttons', 'base-wp'),
                'description' => __('Background color', 'base-wp'),
                'type' => 'color',
                'section' => 'buttons-settings',
                'settings' => $igthemes_option . '[button_background_normal]',
            )
    ));
    //button background hover
    $wp_customize->add_setting(
        $igthemes_option . '[button_background_hover]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#555555'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'button_background_hover',
            array(
                'label' => __('', 'base-wp'),
                'description' => __('Background hover', 'base-wp'),
                'type' => 'color',
                'section' => 'buttons-settings',
                'settings' => $igthemes_option . '[button_background_hover]',
            )
    ));
    //button text color
    $wp_customize->add_setting(
        $igthemes_option . '[button_text_normal]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#ffffff',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'button_text_normal',
            array(
                'label' => __('', 'base-wp'),
                'description' => __('Text normal', 'base-wp'),
                'type' => 'color',
                'section' => 'buttons-settings',
                'settings' => $igthemes_option . '[button_text_normal]',
            )
    ));
    //button text hover
    $wp_customize->add_setting(
        $igthemes_option . '[button_text_hover]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#ffffff'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'button_text_hover',
            array(
                'label' => __('', 'base-wp'),
                'description' => __('Text hover', 'base-wp'),
                'type' => 'color',
                'section' => 'buttons-settings',
                'settings' => $igthemes_option . '[button_text_hover]',
            )
    ));
/*****************************************************************
* SOCIAL SETTINGS
******************************************************************/
//facebook
    $wp_customize->add_setting($igthemes_option . '[facebook_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
        'default' => 'https://www.facebook.com/iograficathemes'

    ));
    $wp_customize->add_control('facebook_url', array(
        'label' => esc_html__('Facebook url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[facebook_url]',
    ));
//twitter
    $wp_customize->add_setting($igthemes_option . '[twitter_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
        'default' => 'https://twitter.com/iograficathemes'
    ));
    $wp_customize->add_control('twitter_url', array(
        'label' => esc_html__('Twitter url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[twitter_url]',
    ));
//google
    $wp_customize->add_setting($igthemes_option . '[google_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
        'default' => 'https://plus.google.com/+Iograficathemes'
    ));
    $wp_customize->add_control('google_url', array(
        'label' => esc_html__('Google plus url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[google_url]',
    ));
//pinterest
    $wp_customize->add_setting($igthemes_option . '[pinterest_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('pinterest_url', array(
        'label' => esc_html__('Pinterest url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[pinterest_url]',
    ));
//tumblr
    $wp_customize->add_setting($igthemes_option . '[tumblr_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('tumblr_url', array(
        'label' => esc_html__('Tumblr url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[tumblr_url]',
    ));
//instagram
    $wp_customize->add_setting($igthemes_option . '[instagram_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('instagram_url', array(
        'label' => esc_html__('Instagram url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[instagram_url]',
    ));
//linkedin
    $wp_customize->add_setting($igthemes_option . '[linkedin_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('linkedin_url', array(
        'label' => esc_html__('Linkedin url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[linkedin_url]',
    ));
//dribbble
    $wp_customize->add_setting($igthemes_option . '[dribbble_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('dribbble_url', array(
        'label' => esc_html__('Dribble url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[dribbble_url]',
    ));
//youtube
    $wp_customize->add_setting($igthemes_option . '[youtube_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('youtube_url', array(
        'label' => esc_html__('Youtube url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[youtube_url]',
    ));
//END
    }
}
// Setup the Theme Customizer settings and controls...
add_action('customize_register' , array('IGthemes_Customizer' , 'igthemes_customize') );
//END OF CLASS

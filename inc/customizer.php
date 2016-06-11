<?php
/**
 * AZA Theme Customizer.
 *
 * @package aza-lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aza_customize_register($wp_customize)
{

    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    /********************************************************/
    /************** WP DEFAULT CONTROLS  ********************/
    /********************************************************/

    $wp_customize->remove_section('colors');
    $wp_customize->remove_panel('site_identity');

    /********************************************************/
    /************** GENERAL OPTIONS  ************************/
    /********************************************************/

    $wp_customize->add_section('aza_general_section', array(
        'title' => __('General Options', 'aza-lite'),
        'priority' => 1,
        'description' => __('Theme general options', 'aza-lite')
    ));

    /*=============================================================================
    Logo
    =============================================================================*/
if ( !function_exists( 'the_custom_logo' ) ) {

    $wp_customize->add_setting('aza_logo', array(
        'default'           => get_template_directory_uri() . '/images/logo.png',
        'sanitize_callback' => 'esc_url'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'aza_logo', array(
        'label'       => __('Website Logo', 'aza-lite'),
        'section'     => 'aza_general_section',
        'priority'    => 1,
        'description' => __('We recommend using a logo that has a <b>maximum height</b> of <b>60px</b>.', 'aza-lite')
    )));
}

    $wp_customize->add_setting('aza_navbar_color', array(
        'default'           => 'rgba(0, 0, 0, 0.75)',
        'sanitize_callback' => 'aza_sanitize_text'
    ));
    $wp_customize->add_control(new Aza_Customize_Alpha_Color_Control($wp_customize, 'aza_navbar_color', array(
        'label'       => __(' Navigation bar color', 'aza-lite'),
        'section'     => 'aza_general_section',
        'priority'    => 2,
        'description' => __('Change color and opacity of the menu bar', 'aza-lite'),
        'palette'     => false
    )));

    $blogname        = $wp_customize->get_control('blogname');
    $blogdescription = $wp_customize->get_control('blogdescription');
    $blogicon        = $wp_customize->get_control('site_icon');
    $show_on_front   = $wp_customize->get_control('show_on_front');
    $page_on_front   = $wp_customize->get_control('page_on_front');
    $page_for_posts  = $wp_customize->get_control('page_for_posts');
    $site_background = $wp_customize->get_control('background_image');
    $custom_logo     = $wp_customize->get_control('custom_logo');

    if (!empty($custom_logo)) {
        $custom_logo->section     = 'aza_general_section';
        $custom_logo->priority    = 1;
        $custom_logo->description = __('Change your website background image. This will show up throughout the <b>front page</b> of your website', 'aza-lite');
    }
    if (!empty($site_background)) {
        $site_background->section     = 'aza_general_section';
        $site_background->priority    = 3;
        $site_background->description = __('Change your website background image. This will show up throughout the <b>front page</b> of your website', 'aza-lite');
    }
    if (!empty($blogname)) {
        $blogname->section  = 'aza_general_section';
        $blogname->priority = 4;
    }
    if (!empty($blogdescription)) {
        $blogdescription->section  = 'aza_general_section';
        $blogdescription->priority = 5;
    }
    if (!empty($blogicon)) {
        $blogicon->section  = 'aza_general_section';
        $blogicon->priority = 6;
    }
    if (!empty($show_on_front)) {
        $show_on_front->section     = 'aza_general_section';
        $show_on_front->priority    = 7;
        $show_on_front->description = __('To have a fully functional version of AZA Theme, you should  set your homepage to <b>a static page</b> and create two pages for <b>Home</b> and <b>Blog</b>', 'aza-lite');
    }
    if (!empty($page_on_front)) {
        $page_on_front->section  = 'aza_general_section';
        $page_on_front->priority = 8;
    }
    if (!empty($page_for_posts)) {
        $page_for_posts->section  = 'aza_general_section';
        $page_for_posts->priority = 9;
    }

    $wp_customize->remove_section('static_front_page');
    $wp_customize->remove_section('title_tagline');
    $wp_customize->remove_control('background_repeat');
    $wp_customize->remove_control('background_position_x');
    $wp_customize->remove_control('background_attachment');

    /********************************************************/
    /********************* PRELOADER ************************/
    /********************************************************/

    $wp_customize->add_section('aza_preloader_section', array(
        'title'       => __('Preloader', 'aza-lite'),
        'priority'    => 25,
        'description' => __('Preloader options', 'aza-lite')
    ));

    /*
    Preloader Colors
    */
    $wp_customize->add_setting('aza_preloader_color', array(
        'default'           => '#fc535f',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'preloader_color', array(
        'label'       => __('Color', 'aza-lite'),
        'section'     => 'aza_preloader_section',
        'settings'    => 'aza_preloader_color',
        'description' => __('Change the color of the preloader object', 'aza-lite')

    )));

    $wp_customize->add_setting('aza_preloader_background_color', array(
        'default'           => '#333333',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'preloader_background-color', array(
        'label'       => __('Background Color', 'aza-lite'),
        'section'     => 'aza_preloader_section',
        'settings'    => 'aza_preloader_background_color',
        'description' => __('Change the background color of the preloader', 'aza-lite')

    )));

    /*=============================================================================
    Preloader Toggle
    =============================================================================*/

    $wp_customize->add_setting('aza_preloader_toggle', array(
        'default'           => 1,
        'sanitize_callback' => 'aza_sanitize_text'

    ));

    $wp_customize->add_control('aza_preloader_toggle', array(
        'label'       => __('Enable Preloader', 'aza-lite'),
        'type'        => 'checkbox',
        'section'     => 'aza_preloader_section',
        'settings'    => 'aza_preloader_toggle',
        'description' => __('Toggle the website preloader ON or OFF', 'aza-lite'),
        'priority'    => 0
    ));

    /*=============================================================================
    Preloader Types
    =============================================================================*/
    $wp_customize->add_setting('aza_preloader_type', array(
        'default'           => '1',
        'sanitize_callback' => 'aza_sanitize_text'
    ));

    $wp_customize->add_control('aza_preloader_type', array(
        'type'        => 'radio',
        'label'       => __('Preloader type', 'aza-lite'),
        'section'     => 'aza_preloader_section',
        'choices'     => array(
            '1' => 'Rotating plane',
            '2' => 'Bouncing circles',
            '3' => 'Folding square',
            '4' => 'Bouncing lines'
        ),
        'description' => __('Change the preloader animation', 'aza-lite')
    ));

    /********************************************************/
    /********************* APPEARANCE  **********************/
    /********************************************************/

    $wp_customize->add_panel('appearance_panel', array(
        'priority'        => 30,
        'capability'      => 'edit_theme_options',
        'theme_supports'  => '',
        'title'           => __('Sections', 'aza-lite'),
        'description'     => __('Customize the appearance of the front page sections', 'aza-lite')
    ));


    $wp_customize->add_section('aza_appearance_cover', array(
        'title'       => __('Hero Area', 'aza-lite'),
        'priority'    => 30,
        'description' => __('Edit the hero area content', 'aza-lite'),
        'panel'       => 'appearance_panel'
    ));

    /*=============================================================================
    Site header title
    =============================================================================*/

    $wp_customize->add_setting('aza_header_title', array(
        'default'           => esc_html__('AZA Theme', 'aza-lite'),
        'sanitize_callback' => 'aza_sanitize_text'
    ));

    $wp_customize->add_control('aza_header_title', array(
        'label'       => __('Site heading', 'aza-lite'),
        'section'     => 'aza_appearance_cover',
        'priority'    => 2,
        'description' => __('Main heading', 'aza-lite')
    ));

    /*=============================================================================
    Site header subtitle
    =============================================================================*/

    $wp_customize->add_setting('aza_subheader_title', array(
        'default'           => esc_html__('One-page - Responsive, Eyecandy, Clean', 'aza-lite'),
        'sanitize_callback' => 'aza_sanitize_text'
    ));
    $wp_customize->add_control('aza_subheader_title', array(
        'section'     => 'aza_appearance_cover',
        'priority'    => 3,
        'description' => __('Subheading', 'aza-lite')

    ));

    /*=============================================================================
    Header buttons
    =============================================================================*/
    $wp_customize->add_setting('aza_header_buttons_type', array(
        'default'           => 'normal_buttons',
        'sanitize_callback' => 'aza_sanitize_text'
    ));

    $wp_customize->add_control('aza_header_buttons_type', array(
        'type'        => 'radio',
        'priority'    => 5,
        'label'       => __('Button options', 'aza-lite'),
        'description' => __('Change the header buttons type or remove them', 'aza-lite'),
        'section'     => 'aza_appearance_cover',
        'choices'     => array(
            'store_buttons'     => 'Store buttons',
            'normal_buttons'    => 'Normal buttons',
            'disabled_buttons'  => 'Disable buttons'
        )
    ));


    /*=============================================================================
    Store Buttons
    =============================================================================*/
    $wp_customize->add_setting('aza_appstore_link', array(
        'default'           => esc_url('#'),
        'sanitize_callback' => 'esc_url'
    ));
    $wp_customize->add_control('aza_appstore_link', array(
        'label'       => __('Store links', 'aza-lite'),
        'section'     => 'aza_appearance_cover',
        'priority'    => 6,
        'description' => __('Apple Appstore link to your app', 'aza-lite')
    ));

    $wp_customize->add_setting('aza_playstore_link', array(
        'default'           => esc_url('#'),
        'sanitize_callback' => 'aza_sanitize_text'
    ));
    $wp_customize->add_control('aza_playstore_link', array(
        'section'     => 'aza_appearance_cover',
        'priority'    => 7,
        'description' => __('Google Playstore link to your app', 'aza-lite')
    ));


    /*=============================================================================
    Regular Buttons
    =============================================================================*/
    //first button controls
    $wp_customize->add_setting('aza_button_text_1', array(
        'default'           => esc_html__('Button 1', 'aza-lite'),
        'sanitize_callback' => 'aza_sanitize_text'
    ));
    $wp_customize->add_control('aza_button_text_1', array(
        'label'       => __('First button', 'aza-lite'),
        'section'     => 'aza_appearance_cover',
        'priority'    => 8,
        'description' => __('Text on the first button of the hero area', 'aza-lite')
    ));

    $wp_customize->add_setting('aza_button_link_1', array(
        'default'           => esc_url('#'),
        'sanitize_callback' => 'esc_url'
    ));
    $wp_customize->add_control('aza_button_link_1', array(
        'section'     => 'aza_appearance_cover',
        'priority'    => 9,
        'description' => __('Link for the <b>first button</b>', 'aza-lite')
    ));

    $wp_customize->add_setting('aza_button_color_1', array(
        'default'           => '#3399df',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'aza_button_color_1', array(
        'section'     => 'aza_appearance_cover',
        'priority'    => '10',
        'settings'    => 'aza_button_color_1',
        'description' => __('Button color', 'aza-lite')

    )));

    $wp_customize->add_setting('aza_button_text_color_1', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'aza_button_text_color_1', array(
        'section'     => 'aza_appearance_cover',
        'priority'    => '11',
        'settings'    => 'aza_button_text_color_1',
        'description' => __('Text color', 'aza-lite')

    )));

    //second button controls
    $wp_customize->add_setting('aza_button_text_2', array(
        'default'           => esc_html__('Button 2', 'aza-lite'),
        'sanitize_callback' => 'aza_sanitize_text'
    ));
    $wp_customize->add_control('aza_button_text_2', array(
        'label'       => __('Second button', 'aza-lite'),
        'section'     => 'aza_appearance_cover',
        'priority'    => 12,
        'description' => __('Text on the second button of the hero area', 'aza-lite')
    ));

    $wp_customize->add_setting('aza_button_link_2', array(
        'default'           => esc_url('#'),
        'sanitize_callback' => 'esc_url'
    ));
    $wp_customize->add_control('aza_button_link_2', array(
        'section'     => 'aza_appearance_cover',
        'priority'    => 13,
        'description' => __('Link for the <b>second button</b>', 'aza-lite')
    ));

    $wp_customize->add_setting('aza_button_color_2', array(
        'default'           => '#fc535f',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'aza_button_color_2', array(
        'section'     => 'aza_appearance_cover',
        'priority'    => '14',
        'settings'    => 'aza_button_color_2',
        'description' => __('Button color', 'aza-lite')

    )));

    $wp_customize->add_setting('aza_button_text_color_2', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'aza_button_text_color_2', array(
        'section'     => 'aza_appearance_cover',
        'priority'    => '15',
        'settings'    => 'aza_button_text_color_2',
        'description' => __('Text color', 'aza-lite')

    )));

    /*=============================================================================
    FEATURES SECTION
    =============================================================================*/

    $wp_customize->add_section('aza_appearance_features', array(
        'title'       => __('Features Section', 'aza-lite'),
        'priority'    => 31,
        'description' => __('Features section options', 'aza-lite'),
        'panel'       => 'appearance_panel'
    ));

    /*=============================================================================
    Features heading
    =============================================================================*/

    $wp_customize->add_setting('aza_features_heading', array(
        'default'           => esc_html__('KEY FEATURES', 'aza-lite'),
        'sanitize_callback' => 'aza_sanitize_text'
    ));

    $wp_customize->add_control('aza_features_heading', array(
        'label'     => __('Section title', 'aza-lite'),
        'section'   => 'aza_appearance_features',
        'priority'  => 1
    ));

    /*=============================================================================
    Features content
    =============================================================================*/

    //Features Left repeater
    $wp_customize->add_setting('aza_features_icons_left', array(
        'sanitize_callback' => 'aza_sanitize_repeater',
        'default'           => json_encode(array(
            array(
                'icon_value'  => 'icon-arrows-squares',
                'title'       => esc_html__('Fully Responsive', 'aza-lite'),
                'text'        => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.', 'aza-lite'),
                'subtitle'    => 'fully-responsive',
                'color'       => '#3399df'
            ),

            array(
                'icon_value'  => 'icon-computer-imac',
                'title'       => esc_html__('Clean Design', 'aza-lite'),
                'text'        => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.', 'aza-lite'),
                'subtitle'    => 'clean-design',
                'color'       => '#f0b57c'
            )
        ))
    ));

    $wp_customize->add_control(new AZA_General_Repeater($wp_customize, 'aza_features_icons_left', array(
        'label'                   => __('Section content', 'aza-lite'),
        'description'             => __('Left collumn content', 'aza-lite'),
        'section'                 => 'aza_appearance_features',
        'priority'                => 2,
        'parallax_image_control'  => false,
        'parallax_icon_control'   => true,
        'parallax_title_control'  => true,
        'parallax_text_control'   => true,
        'parallax_link_control'   => false,
        'parallax_color_control'  => true
    )));

    //Features Phone screen
    $wp_customize->add_setting('aza_phone_screen', array(
        'default'           => get_template_directory_uri() . '/images/screen.png',
        'sanitize_callback' => 'esc_url'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'aza_phone_screen', array(
        'description' => __('Center collumn content', 'aza-lite'),
        'section'     => 'aza_appearance_features',
        'priority'    => 3
    )));

    //Features Right repeater
    $wp_customize->add_setting('aza_features_icons_right', array(
        'sanitize_callback' => 'aza_sanitize_repeater',
        'default'           => json_encode(array(
            array(
                'icon_value'  => 'icon-ecommerce-diamond',
                'title'       => esc_html__('Beautiful Showcase', 'aza-lite'),
                'text'        => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.', 'aza-lite'),
                'subtitle'    => 'perfect-showcase',
                'color'       => '#4bb992'
            ),

            array(
                'icon_value'  => 'icon-settings-streamline-2',
                'title'       => esc_html__('Fully Customizable', 'aza-lite'),
                'text'        => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.', 'aza-lite'),
                'subtitle'    => 'fully-customizable',
                'color'       => '#8a74b9'
            )
        ))
    ));

    $wp_customize->add_control(new AZA_General_Repeater($wp_customize, 'aza_features_icons_right', array(
        'description'             => __('Right collumn content', 'aza-lite'),
        'section'                 => 'aza_appearance_features',
        'priority'                => 4,
        'parallax_image_control'  => false,
        'parallax_icon_control'   => true,
        'parallax_title_control'  => true,
        'parallax_text_control'   => true,
        'parallax_link_control'   => false,
        'parallax_color_control'  => true
    )));
    /*=============================================================================
    Features Button
    =============================================================================*/

    $wp_customize->add_setting('aza_features_button_text', array(
        'default'           => esc_html__('LEARN MORE', 'aza-lite'),
        'sanitize_callback' => 'aza_sanitize_text'
    ));

    $wp_customize->add_control('aza_features_button_text', array(
        'label'       => __('Section button', 'aza-lite'),
        'section'     => 'aza_appearance_features',
        'priority'    => 5,
        'description' => __('Button text', 'aza-lite')
    ));

    $wp_customize->add_setting('aza_features_button_link', array(
        'default'           => esc_url('#'),
        'sanitize_callback' => 'aza_sanitize_text'
    ));

    $wp_customize->add_control('aza_features_button_link', array(
        'description' => __('Button link', 'aza-lite'),
        'section'     => 'aza_appearance_features',
        'priority'    => 6
    ));


    /*=============================================================================
    Features zig-zag
    =============================================================================*/

    $wp_customize->add_setting('aza_zigzag_features_top', array(
        'default'           => 0,
        'sanitize_callback' => 'aza_sanitize_text'
    ));

    $wp_customize->add_control('aza_zigzag_features_top', array(
        'label'   => __('Jagged top edge', 'aza-lite'),
        'type'    => 'checkbox',
        'section' => 'aza_appearance_features'
    ));

    $wp_customize->add_setting('aza_zigzag_features_bottom', array(
        'default'           => 0,
        'sanitize_callback' => 'aza_sanitize_text'
    ));

    $wp_customize->add_control('aza_zigzag_features_bottom', array(
        'label'   => __('Jagged bottom edge', 'aza-lite'),
        'type'    => 'checkbox',
        'section' => 'aza_appearance_features'
    ));


    /*=============================================================================
    PARALLAX SECTION
    =============================================================================*/

    $wp_customize->add_section('aza_appearance_parallax', array(
        'title'       => __('Parallax Section', 'aza-lite'),
        'priority'    => 32,
        'description' => __('Parallax section options', 'aza-lite'),
        'panel'       => 'appearance_panel'
    ));

    /*=============================================================================
    Parallax content
    =============================================================================*/


    $wp_customize->add_setting('aza_parallax_image', array(
        'default'           => get_template_directory_uri() . '/images/parallax-image.png',
        'sanitize_callback' => 'esc_url'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'aza_parallax_image', array(
        'label'       => __('Parallax content', 'aza-lite'),
        'description' => __('Image', 'aza-lite'),
        'section'     => 'aza_appearance_parallax',
        'priority'    => 1
    )));

    $wp_customize->add_setting('aza_parallax_text', array(
        'sanitize_callback' => 'aza_sanitize_text',
        'default'           => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Itaque hic ipse iam pridem est reiectus;', 'aza-lite')
      );

    $wp_customize->add_control('aza_parallax_text', array(
        'description'             => __('Text', 'aza-lite'),
        'section'                 => 'aza_appearance_parallax',
        'priority'                => 2,
    ));


    /*=============================================================================
    Parallax layers
    =============================================================================*/

    $wp_customize->add_setting('aza_parallax_background', array(
        'default'           => get_template_directory_uri() . '/images/parallax-background.jpg',
        'sanitize_callback' => 'esc_url'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'aza_parallax_background', array(
        'label'       => __('Parallax Layers', 'aza-lite'),
        'description' => __('Background','aza-lite'),
        'section'     => 'aza_appearance_parallax',
        'priority'    => 3
    )));

    $wp_customize->add_setting('aza_parallax_layer_1', array(
        'default'           => get_template_directory_uri() . '/images/parallax-layer1.png',
        'sanitize_callback' => 'esc_url'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'aza_parallax_layer_1', array(
        'description' => __('First layer image','aza-lite'),
        'section'     => 'aza_appearance_parallax',
        'priority'    => 4
    )));

    $wp_customize->add_setting('aza_parallax_layer_2', array(
        'default'           => get_template_directory_uri() . '/images/parallax-layer2.png',
        'sanitize_callback' => 'esc_url'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'aza_parallax_layer_2', array(
        'description' => __('Second layer image','aza-lite'),
        'section'     => 'aza_appearance_parallax',
        'priority'    => 5
    )));


    /*=============================================================================
    RIBBON SECTION
    =============================================================================*/


    $wp_customize->add_section('aza_appearance_ribbon', array(
        'title'       => __('Ribbon Section', 'aza-lite'),
        'description' => __('Call to action ribbon options', 'aza-lite'),
        'panel'       => 'appearance_panel'
    ));


    //Layout

    $wp_customize->add_setting('aza_ribbon_layout', array(
          'default'           => '2',
          'sanitize_callback' => 'aza_sanitize_text'
    ));

    $wp_customize->add_control('aza_ribbon_layout', array(
          'priority'    => '1',
          'type'        => 'radio',
          'label'       => __('Section layout', 'aza-lite'),
          'section'     => 'aza_appearance_ribbon',
          'choices'     => array(
              '1' => 'Button first',
              '2' => 'Text first',
          ),
          'description' => __('Change the layout of the ribbon', 'aza-lite')
      ));

    //Color

    $wp_customize->add_setting('aza_ribbon_background_color', array(
        'default'           => 'rgba(0, 69, 97, 0.35)',
        'sanitize_callback' => 'aza_sanitize_text'
    ));
    $wp_customize->add_control(new Aza_Customize_Alpha_Color_Control($wp_customize, 'aza_ribbon_background_color', array(
        'label'       => __('Background overlay ', 'aza-lite'),
        'section'     => 'aza_appearance_ribbon',
        'description' => __('Change color and opacity of ribbon overlay', 'aza-lite'),
        'palette'     => false,
        'priority'    => 2,
    )));



    //Text options

    $wp_customize->add_setting('aza_ribbon_text', array(
        'default'           => esc_html__('START USING THIS BEAUTIFUL THEME TODAY', 'aza-lite'),
        'sanitize_callback' => 'aza_sanitize_text'
    ));

    $wp_customize->add_control('aza_ribbon_text', array(
        'label'       => __('Text options', 'aza-lite'),
        'description' => __('Ribbon text', 'aza-lite'),
        'section'     => 'aza_appearance_ribbon',
        'priority'    => 3
    ));

    $wp_customize->add_setting('aza_ribbon_text_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'aza_ribbon_text_color', array(
        'section'     => 'aza_appearance_ribbon',
        'settings'    => 'aza_ribbon_text_color',
        'description' => __('Text color', 'aza-lite'),
        'priority'    => 4,
    )));



    //Button options

    $wp_customize->add_setting('aza_ribbon_button_text', array(
        'default'           => esc_html__('LEARN MORE', 'aza-lite'),
        'sanitize_callback' => 'aza_sanitize_text'
    ));

    $wp_customize->add_control('aza_ribbon_button_text', array(
        'label'       => __('Button options', 'aza-lite'),
        'description' => __('Button text', 'aza-lite'),
        'section'     => 'aza_appearance_ribbon',
        'priority'    => 5
    ));

    $wp_customize->add_setting('aza_ribbon_button_link', array(
        'default'           => esc_url('#'),
        'sanitize_callback' => 'aza_sanitize_text'
    ));

    $wp_customize->add_control('aza_ribbon_button_link', array(
        'description' => __('Button link', 'aza-lite'),
        'section'     => 'aza_appearance_ribbon',
        'priority'    => 6
    ));

    $wp_customize->add_setting('aza_ribbon_button_color', array(
        'default'           => '#fc535f',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'aza_ribbon_button_color', array(
        'section'     => 'aza_appearance_ribbon',
        'priority'    => '7',
        'settings'    => 'aza_ribbon_button_color',
        'description' => __('Button color', 'aza-lite')
    )));

    $wp_customize->add_setting('aza_ribbon_button_text_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'aza_ribbon_button_text_color', array(
        'section'     => 'aza_appearance_ribbon',
        'priority'    => '8',
        'settings'    => 'aza_ribbon_button_text_color',
        'description' => __('Button text color', 'aza-lite')
    )));

    /*=============================================================================
    TEAM SECTION
    =============================================================================*/

    $wp_customize->add_section('aza_appearance_team', array(
        'title'       => __('Team Section', 'aza-lite'),
        'description' => __('Team section options', 'aza-lite'),
        'panel'       => 'appearance_panel'
    ));

    /*=============================================================================
    Team headings
    =============================================================================*/

    $wp_customize->add_setting('aza_team_title', array(
        'default'           => esc_html__('OUR TEAM', 'aza-lite'),
        'sanitize_callback' => 'aza_sanitize_text'
    ));

    $wp_customize->add_control('aza_team_title', array(
        'label'       => __('Heading', 'aza-lite'),
        'description' => __('Title', 'aza-lite'),
        'section'     => 'aza_appearance_team',
        'priority'    => 1
    ));

    $wp_customize->add_setting('aza_team_subtitle', array(
        'default'           => esc_html__("Present your team members and their role in the company", 'aza-lite'),
        'sanitize_callback' => 'aza_sanitize_text'
    ));

    $wp_customize->add_control('aza_team_subtitle', array(
        'description' => __('Subtitle', 'aza-lite'),
        'section'     => 'aza_appearance_team',
        'priority'    => 2
    ));


    /*=============================================================================
    Team content
    =============================================================================*/

    $wp_customize->add_setting('aza_team_content', array(
        'sanitize_callback' => 'aza_sanitize_repeater',
        'default'           => json_encode(array(
            array(
                  "image_url" => get_template_directory_uri() . '/images/team1.jpg',
                  "title"     => esc_html__('Jane Doe', 'aza-lite'),
                  "subtitle"  => esc_html__('Project Supervisor', 'aza-lite'),
                  "color"     => '#f0b57c',
                  "text"      => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.', 'aza-lite')
            ),
            array(
                  "image_url" => get_template_directory_uri() . '/images/team2.jpg',
                  "title"     => esc_html__('Ola Nordmann', 'aza-lite'),
                  "subtitle"  => esc_html__('Web Designer', 'aza-lite'),
                  "color"     => '#4bb992',
                  "text"      => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.', 'aza-lite')
            ),

            array(
                  "image_url" => get_template_directory_uri() . '/images/team3.jpg',
                  "title"     => esc_html__('Average Joe', 'aza-lite'),
                  "subtitle"  => esc_html__('Front End Developer', 'aza-lite'),
                  "color"     => '#349ae0',
                  "text"      => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.', 'aza-lite')
            ),
            array(
                  "image_url" => get_template_directory_uri() . '/images/team4.jpg',
                  "title"     => esc_html__('Joe Bloggs', 'aza-lite'),
                  "subtitle"  => esc_html__('UX Designer', 'aza-lite'),
                  "color"     => '#887caf',
                  "text"      => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.', 'aza-lite')
            )
        ))
    ));

    $wp_customize->add_control(new AZA_General_Repeater($wp_customize, 'aza_team_content', array(
        'label'                     => esc_html__('Edit the Team members', 'aza-lite'),
        'section'                   => 'aza_appearance_team',
        'priority'                  => 3,
        'parallax_title_control'    => true,
        'parallax_subtitle_control' => true,
        'parallax_text_control'     => true,
        'parallax_image_control'    => true,
        'parallax_color_control'    => true
    )));


    /*=============================================================================
    Team Background
    =============================================================================*/

    $wp_customize->add_setting('aza_team_background', array(
        'default'           => 'rgba(0, 0, 0, 0.75)',
        'sanitize_callback' => 'aza_sanitize_text'
    ));
    $wp_customize->add_control(new Aza_Customize_Alpha_Color_Control($wp_customize, 'aza_team_background', array(
        'label'       => __(' Background color', 'aza-lite'),
        'section'     => 'aza_appearance_team',
        'palette'     => false,
        'priority'    => 4,
    )));


    /*=============================================================================
    Team Separators
    =============================================================================*/

    $wp_customize->add_setting('aza_separator_team_top', array(
        'default'           => 1,
        'sanitize_callback' => 'esc_attr'
    ));

    $wp_customize->add_control('aza_separator_team_top', array(
        'label'   => __('Separator top','aza-lite'),
        'type'    => 'checkbox',
        'section' => 'aza_appearance_team'
    ));

    $wp_customize->add_setting('aza_separator_team_bottom', array(
        'default'           => 0,
        'sanitize_callback' => 'esc_attr'
    ));

    $wp_customize->add_control('aza_separator_team_bottom', array(
        'label'   => __('Separator bottom','aza-lite'),
        'type'    => 'checkbox',
        'section' => 'aza_appearance_team'
    ));


    /*=============================================================================
    Team Button
    =============================================================================*/

    $wp_customize->add_setting('aza_team_button_text', array(
        'default'           => esc_html__('Work with us', 'aza-lite'),
        'sanitize_callback' => 'aza_sanitize_text'
    ));

    $wp_customize->add_control('aza_team_button_text', array(
        'label'     => __('Button Text', 'aza-lite'),
        'section'   => 'aza_appearance_team',
        'priority'  => 5
    ));

    $wp_customize->add_setting('aza_team_button_link', array(
        'default'           => esc_url('#'),
        'sanitize_callback' => 'aza_sanitize_text'
    ));

    $wp_customize->add_control('aza_team_button_link', array(
        'description' => __('Button link', 'aza-lite'),
        'section'     => 'aza_appearance_team',
        'priority'    => 6
    ));



    /*=============================================================================
    BLOG SECTION
    =============================================================================*/

    $wp_customize->add_section('aza_appearance_blog', array(
        'title'       => __('Blog Section', 'aza-lite'),
        'description' => __('Blog section options', 'aza-lite'),
        'panel'       => 'appearance_panel'
    ));

    /*=============================================================================
    Blog headings
    =============================================================================*/

    $wp_customize->add_setting('aza_blog_title', array(
        'default'           => esc_html__('LATEST NEWS', 'aza-lite'),
        'sanitize_callback' => 'aza_sanitize_text'
    ));

    $wp_customize->add_control('aza_blog_title', array(
        'label'     => __('Title', 'aza-lite'),
        'section'   => 'aza_appearance_blog',
        'priority'  => 1
    ));

    $wp_customize->add_setting('aza_blog_subtitle', array(
        'default'           => esc_html__("Keep your users in touch with your latest blog posts and updates.", 'aza-lite'),
        'sanitize_callback' => 'aza_sanitize_text'
    ));

    $wp_customize->add_control('aza_blog_subtitle', array(
        'label'     => esc_html__('Subtitle', 'aza-lite'),
        'section'   => 'aza_appearance_blog',
        'priority'  => 2
    ));
    /*=============================================================================
    Blog Separators
    =============================================================================*/

    $wp_customize->add_setting('aza_separator_blog_top', array(
        'default'           => 1,
        'sanitize_callback' => 'esc_attr'
    ));

    $wp_customize->add_control('aza_separator_blog_top', array(
        'label'   => __('Separator top','aza-lite'),
        'type'    => 'checkbox',
        'section' => 'aza_appearance_blog'
    ));

    $wp_customize->add_setting('aza_separator_blog_bottom', array(
        'default'           => 0,
        'sanitize_callback' => 'esc_attr'
    ));

    $wp_customize->add_control('aza_separator_blog_bottom', array(
        'label'   => __('Separator bottom','aza-lite'),
        'type'    => 'checkbox',
        'section' => 'aza_appearance_blog'
    ));


    /*=============================================================================
    CONTACT SECTION
    =============================================================================*/

    $wp_customize->add_section('aza_appearance_contact', array(
        'title'       => __('Contact Section', 'aza-lite'),
        'description' => __('Contact section shortcode', 'aza-lite'),
        'panel'       => 'appearance_panel'
    ));

    /*=============================================================================
    Contact headings
    =============================================================================*/


    $wp_customize->add_setting('aza_contact_title', array(
        'default'           => esc_html__('Contact', 'aza-lite'),
        'sanitize_callback' => 'aza_sanitize_text'
    ));

    $wp_customize->add_control('aza_contact_title', array(
        'label'     => __('Section heading', 'aza-lite'),
        'section'   => 'aza_appearance_contact',
        'description' => __('Title', 'aza-lite'),
        'priority'  => 1,
    ));

    $wp_customize->add_setting('aza_contact_subtitle', array(
        'default'           => esc_html__('Message us', 'aza-lite'),
        'sanitize_callback' => 'aza_sanitize_text'
    ));

    $wp_customize->add_control('aza_contact_subtitle', array(
        'description' => __('Subtitle', 'aza-lite'),
        'section'     => 'aza_appearance_contact',
        'priority'    => 2,
    ));

    /*=============================================================================
    Contact shortcode
    =============================================================================*/

    $wp_customize->add_setting('frontpage_contact_shortcode', array(
        'sanitize_callback' => 'aza_sanitize_text'
    ));

    $wp_customize->add_control('frontpage_contact_shortcode', array(
        'label'             => __('Form Shortcode', 'aza-lite'),
        'section'           => 'aza_appearance_contact',
        'priority'          => 3,
    ));


    /*=============================================================================
    Contact background
    =============================================================================*/

    $wp_customize->add_setting('aza_contact_background', array(
      'default'           => 'rgba(0, 0, 0, 0.75)',
      'sanitize_callback' => 'aza_sanitize_text'
  ));
  $wp_customize->add_control(new Aza_Customize_Alpha_Color_Control($wp_customize, 'aza_contact_background', array(
      'label'       => __(' Background color', 'aza-lite'),
      'section'     => 'aza_appearance_contact',
      'palette'     => false,
      'priority'    => 4,
  )));


    /*=============================================================================
    Contact separators
    =============================================================================*/

    $wp_customize->add_setting('aza_separator_contact_top', array(
        'default'           => 1,
        'sanitize_callback' => 'esc_attr'
    ));

    $wp_customize->add_control('aza_separator_contact_top', array(
        'label'   => __('Top Separator','aza-lite'),
        'type'    => 'checkbox',
        'section' => 'aza_appearance_contact',
        'priority'=> 5,
    ));


    /*=============================================================================
    INTERGEO MAPS SECTION
    =============================================================================*/

    $wp_customize->add_section('aza_appearance_map', array(
        'title'       => __('Maps Section', 'aza-lite'),
        'panel'       => 'appearance_panel'
    ));
    $wp_customize->add_setting('frontpage_map_shortcode', array(
        'sanitize_callback' => 'aza_sanitize_text'
    ));
    $wp_customize->add_control('frontpage_map_shortcode', array(
        'label'       => __('Map Shortcode', 'aza-lite'),
        'description' => __('We suggest using the <b>Intergeo Maps</b> plugin for the best possible experience', 'aza-lite'),
        'section'     => 'aza_appearance_map',
        'priority'    => 1
    ));


    /*=============================================================================
    SOCIAL RIBBON
    =============================================================================*/
    $wp_customize->add_section('aza_appearance_social_ribbon', array(
        'title'       => __('Social Ribbon', 'aza-lite'),
        'description' => __('Social ribbon options.', 'aza-lite'),
        'panel'       => 'appearance_panel'
    ));


    /*=============================================================================
    Social ribbon heading 1
    =============================================================================*/

    $wp_customize->add_setting('aza_social_heading_1', array(
        'default'           => esc_html__('STAY CONNECTED', 'aza-lite'),
        'sanitize_callback' => 'aza_sanitize_text'
    ));

    $wp_customize->add_control('aza_social_heading_1', array(
        'label'     => __('Heading 1', 'aza-lite'),
        'section'   => 'aza_appearance_social_ribbon',
        'priority'  => 1
    ));


    /*=============================================================================
    Social ribbon separator
    =============================================================================*/

    $wp_customize->add_setting('aza_separator_social_ribbon', array(
        'default'           => 1,
        'sanitize_callback' => 'esc_attr'
    ));

    $wp_customize->add_control('aza_separator_social_ribbon', array(
        'label'   => __('Separator', 'aza-lite'),
        'type'    => 'checkbox',
        'section' => 'aza_appearance_social_ribbon'
    ));

    /*=============================================================================
    Social ribbon icons
    =============================================================================*/

    $wp_customize->add_setting('aza_social_ribbon_icons', array(
        'sanitize_callback' => 'aza_sanitize_repeater',
        'default' => json_encode(array(
            array(
                  'icon_value'  => 'icon-social-facebook',
                  'link'        => esc_url('#', 'aza-lite'),
                  'color'       => '#4597d1'
            ),
            array(
                  'icon_value'  => 'icon-social-twitter',
                  'link'        => esc_url('#', 'aza-lite'),
                  'color'       => '#45d1c2'
            ),
            array(
                  'icon_value'  => 'icon-social-googleplus',
                  'link'        => esc_url('#','aza-lite'),
                  'color'       => '#fc535f'
            )
        ))
    ));

    $wp_customize->add_control(new AZA_General_Repeater($wp_customize, 'aza_social_ribbon_icons', array(
        'label'                   => __('Social Icons', 'aza-lite'),
        'section'                 => 'aza_appearance_social_ribbon',
        'priority'                => 2,
        'parallax_icon_control'   => true,
        'parallax_link_control'   => true,
        'parallax_color_control'  => true
    )));

    /*=============================================================================
    Social ribbon heading 2
    =============================================================================*/

    $wp_customize->add_setting('aza_social_heading_2', array(
        'default'           => esc_html__('GET STARTED USING OUR THEME TODAY', 'aza-lite'),
        'sanitize_callback' => 'aza_sanitize_text'
    ));

    $wp_customize->add_control('aza_social_heading_2', array(
        'label'     => __('Heading 2', 'aza-lite'),
        'section'   => 'aza_appearance_social_ribbon',
        'priority'  => 3
    ));

    /*=============================================================================
    Social ribbon store buttons
    =============================================================================*/
    $wp_customize->add_setting('aza_social_ribbon_store_buttons', array(
        'default'           => 0,
        'sanitize_callback' => 'esc_attr'
    ));

    $wp_customize->add_control('aza_social_ribbon_store_buttons', array(
        'label'   => 'Show store buttons',
        'type'    => 'checkbox',
        'section' => 'aza_appearance_social_ribbon'
    ));

}

add_action('customize_register', 'aza_customize_register');

require_once('class/repeater-general-control.php');
require_once('class/alpha-general-customizer.php');

//=============================================================================
function aza_custom_background_settings()
{
    add_theme_support('custom-background', array(
        'default-image'       => get_template_directory_uri() . '/images/background.jpg',
        'default-repeat'      => 'no-repeat',
        'default-position-x'  => 'center',
        'default-attachment'  => 'fixed'

    ));
}
add_action('after_setup_theme', 'aza_custom_background_settings');

//=============================================================================
function aza_sanitize_repeater($input)
{
    $input_decoded = json_decode($input, true);
    $allowed_html  = array(
                          'br'      => array(),
                          'em'      => array(),
                          'strong'  => array(),
                          'a'       => array(
                                            'href'    => array(),
                                            'class'   => array(),
                                            'id'      => array(),
                                            'target'  => array()
                          ),
                          'button'  => array(
                                            'class'   => array(),
                                            'id'      => array()
        )
    );
    foreach ($input_decoded as $boxk => $box) {
        foreach ($box as $key => $value) {
            if ($key == 'text') {
                $input_decoded[$boxk][$key] = wp_kses($value, $allowed_html);

            } else {
                $input_decoded[$boxk][$key] = wp_kses_post($value);
            }

        }
    }

    return json_encode($input_decoded);
}

//=============================================================================
function aza_sanitize_text($input)
{
    return wp_kses_post(force_balance_tags($input));
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */

function aza_customize_preview_js()
{
    wp_enqueue_script('aza_customizer', get_template_directory_uri() . '/js/admin/customizer.js', array(
        'customize-preview'
    ), '20130508', true);
}
add_action('customize_preview_init', 'aza_customize_preview_js');

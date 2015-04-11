<?php

/* Load the live preview js
  ---------------------------------------------------------------------------------------------------- */
add_action('customize_preview_init', 'themeora_customizer_live_preview');

function themeora_customizer_live_preview() {
    wp_enqueue_script('customizer', get_template_directory_uri() . '/framework/assets/js/customizer-preview.js', 'jquery', '1.0', true);
}

/* General settings
  ---------------------------------------------------------------------------------------------------- */
add_theme_support('custom-background');

add_action('customize_register', 'Themeora_Customize_Register');

function Themeora_Customize_Register($wp_customize) {

    //Load custom controls
    require_once( THEMEORA_FRAMEWORK_FUNCTIONS_DIR . '/themeora-admin-customizer-controls.php' );

    /* Rearange sections
      ---------------------------------------------------------------------------------------------------- */
    //Title / Description
    $wp_customize->get_control('blogname')->section = 'logo';
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_control('blogname')->priority = 1;

    $wp_customize->get_control('blogdescription')->section = 'logo';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_control('blogdescription')->priority = 2;

    //Background
    $wp_customize->remove_section('background_image');
    $wp_customize->get_control('background_color')->section = 'background';
    $wp_customize->get_setting('background_color')->transport = 'postMessage';
    $wp_customize->get_control('background_color')->priority = 98;
    $wp_customize->get_setting('background_color')->default = '#f6f6f6';

    $wp_customize->get_control('background_image')->section = 'background';
    $wp_customize->get_setting('background_image')->transport = 'postMessage';
    $wp_customize->get_control('background_image')->priority = 99;

    $wp_customize->get_control('background_repeat')->section = 'background';
    $wp_customize->get_setting('background_repeat')->transport = 'postMessage';
    $wp_customize->get_control('background_repeat')->priority = 100;

    $wp_customize->get_control('background_position_x')->section = 'background';
    $wp_customize->get_setting('background_position_x')->transport = 'postMessage';
    $wp_customize->get_control('background_position_x')->priority = 101;

    $wp_customize->get_control('background_attachment')->section = 'background';
    $wp_customize->get_setting('background_attachment')->transport = 'postMessage';
    $wp_customize->get_control('background_attachment')->priority = 102;


    /* Fonts
      ---------------------------------------------------------------------------------------------------- */
    if (themeora_theme_supports('primary', 'fonts')) {
        //Load font list
        $fonts = themeora_fonts();

        $font_size_range = array(
            'min' => '10',
            'max' => '80',
            'step' => '1',
        );

        $font_lineheight_range = array(
            'min' => '10',
            'max' => '80',
            'step' => '1',
        );

        $font_letterspacing_range = array(
            'min' => '-5',
            'max' => '20',
            'step' => '1',
        );

        $font_weight_range = array(
            'bold' => 'bold',
            'normal' => 'normal',
        );
    } else {
        $fonts = '';
        $font_size_range = '';
        $font_lineheight_range = '';
        $font_letterspacing_range = '';
        $font_weight_range = '';
    }


    /* Typograpgy logo settings
      ---------------------------------------------------------------------------------------------------- */
    $wp_customize->add_section('logo', array(
        'title' => __('Logo Typography', 'themeora'),
        'priority' => 1,
            )
    );

    if (themeora_theme_supports('primary', 'fonts')) {
        $wp_customize->add_setting('type_select_logo', array(
            'default' => 'Open Sans',
            'sanitize_callback' => 'themeora_sanitize_fonts',
         ));
        $wp_customize->add_control('type_select_logo', array(
            'type' => 'select',
            'label' => __('Logo Font', 'themeora'),
            'section' => 'logo',
            'priority' => 3,
            'choices' => $fonts
            )
        );

        $wp_customize->add_setting('type_logo_size', array(
            'default' => '20',
            'sanitize_callback' => 'themeora_sanitize_int',
        ));
        $wp_customize->add_control(new Themeora_Customize_Slider_Control($wp_customize, 'type_logo_size', array(
            'type' => 'slider',
            'label' => __('Logo Size', 'themeora'),
            'section' => 'logo',
            'settings' => 'type_logo_size',
            'priority' => 4,
            'choices' => $font_size_range
        )));

        $wp_customize->add_setting('type_logo_lineheight', array(
            'default' => '26',
            'sanitize_callback' => 'themeora_sanitize_int',
        ));
        $wp_customize->add_control(new Themeora_Customize_Slider_Control($wp_customize, 'type_logo_lineheight', array(
            'type' => 'slider',
            'label' => __('Logo Line Height', 'themeora'),
            'section' => 'logo',
            'settings' => 'type_logo_lineheight',
            'priority' => 5,
            'choices' => $font_lineheight_range
        )));

        $wp_customize->add_setting('type_logo_letterspacing', array(
            'default' => '0',
            'sanitize_callback' => 'themeora_sanitize_int',
        ));
        $wp_customize->add_control(new Themeora_Customize_Slider_Control($wp_customize, 'type_logo_letterspacing', array(
            'type' => 'slider',
            'label' => __('Logo Letter Spacing', 'themeora'),
            'section' => 'logo',
            'settings' => 'type_logo_letterspacing',
            'priority' => 6,
            'choices' => $font_letterspacing_range
         )));
    }


    /* Image logo settings
    ---------------------------------------------------------------------------------------------------- */
    
    $wp_customize->add_section('image_logo_settings', array(
        'title' => __('Image Logo Settings', 'themeora'),
        'priority' => 3,
            )
    );

    $wp_customize->add_setting('img-upload-login-logo', array(
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'img-upload-login-logo', array(
        'label' => __('Login Logo', 'themeora'),
        'section' => 'image_logo_settings',
        'settings' => 'img-upload-login-logo',
        'priority' => 2
     )));

    $wp_customize->add_setting('img-upload-logo', array(
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'img-upload-logo', array(
        'label' => __('Logo', 'themeora'),
        'section' => 'image_logo_settings',
        'settings' => 'img-upload-logo',
        'priority' => 1
     )));

    $wp_customize->add_setting('img-upload-logo-width', array(
        'default' => '',
        'sanitize_callback' => 'themeora_sanitize_int',
    ));
    $wp_customize->add_control('img-upload-logo-width', array(
        'label' => __('Logo width (px)', 'themeora'),
        'section' => 'image_logo_settings',
        'type' => 'text',
        'priority' => 3,
            )
    );


    /* General settings
    ---------------------------------------------------------------------------------------------------- */
    
    $wp_customize->add_section('general_settings', array(
        'title' => __('General Settings', 'themeora'),
        'priority' => 3,
       )
    );
     
    $wp_customize->add_setting('img-upload-favicon', array(
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'img-upload-favicon', array(
        'label' => __('Favicon', 'themeora'),
        'section' => 'general_settings',
        'settings' => 'img-upload-favicon',
        'priority' => 4
     )));

    $wp_customize->add_setting('img-upload-apple_touch', array(
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'img-upload-apple_touch', array(
        'label' => __('Apple Touch Icon', 'themeora'),
        'section' => 'general_settings',
        'settings' => 'img-upload-apple_touch',
        'priority' => 5
    )));


    $wp_customize->add_setting('footer_copyright', array(
        'default' => '',
        'sanitize_callback' => 'themeora_sanitize_text',
    ));
    $wp_customize->add_control(new Themeora_Customize_Textarea_Control($wp_customize, 'footer_copyright', array(
        'label' => __('Footer Copyright Text', 'themeora'),
        'section' => 'general_settings',
        'settings' => 'footer_copyright',
        'priority' => 7
    )));

    /* Background settings
      ---------------------------------------------------------------------------------------------------- */

    $wp_customize->add_section('background', array(
        'title' => __('Background', 'themeora'),
        'priority' => 5,
      )
    );

    /* Colour settings
      ---------------------------------------------------------------------------------------------------- */
    $wp_customize->add_section('custom_styles', array(
        'title' => __('Custom Styles', 'themeora'),
        'priority' => 6,
        )
    );

    // Accent colour
    $wp_customize->add_setting('theme_accent_color', array(
        'default' => '#428BCA',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'theme_accent_color', array(
        'label' => __('Accent Color', 'themeora'),
        'section' => 'custom_styles',
        'settings' => 'theme_accent_color',
        'priority' => 1
    )));

    // Colour for headings
    $wp_customize->add_setting('header_text_color', array(
        'default' => '#414142',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_text_color', array(
        'label' => __('Header Font Color', 'themeora'),
        'section' => 'custom_styles',
        'settings' => 'header_text_color',
        'priority' => 3
     )));

    // Colour for body text
    $wp_customize->add_setting('body_text_color', array(
        'default' => '#565656',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'body_text_color', array(
        'label' => __('Body Font Color', 'themeora'),
        'section' => 'custom_styles',
        'settings' => 'body_text_color',
        'priority' => 4
    )));

    // Body secondary colour
    $wp_customize->add_setting('body_sec_text_color', array(
        'default' => '#B7B7B7',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'body_sec_text_color', array(
        'label' => __('Body Secondary Font Color', 'themeora'),
        'section' => 'custom_styles',
        'settings' => 'body_sec_text_color',
        'priority' => 5
    )));

    // Button standard color
    $wp_customize->add_setting('button_primary_color', array(
        'default' => '#3498db',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'button_primary_color', array(
        'label' => __('Button color', 'themeora'),
        'section' => 'custom_styles',
        'settings' => 'button_primary_color',
        'priority' => 6
    )));
    
    // Button hover colour
    $wp_customize->add_setting('button_primary_hover_color', array(
        'default' => '#4bb0f4',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'button_primary_hover_color', array(
        'label' => __('Button hover color', 'themeora'),
        'section' => 'custom_styles',
        'settings' => 'button_primary_hover_color',
        'priority' => 7
    )));


    /* Typography
      ---------------------------------------------------------------------------------------------------- */
    
    if (themeora_theme_supports('primary', 'fonts')) {
        //Headings
        $wp_customize->add_section('custom_heading_typography', array(
            'title' => __('Heading Typography', 'themeora'),
            'priority' => 7,
           )
        );

        $wp_customize->add_setting('type_select_headings', array(
            'default' => '',
            'sanitize_callback' => 'themeora_sanitize_fonts',
        ));
        $wp_customize->add_control('type_select_headings', array(
            'type' => 'select',
            'label' => __('Header Font', 'themeora'),
            'section' => 'custom_heading_typography',
            'priority' => 1,
            'choices' => $fonts
          )
        );

        $wp_customize->add_setting('type_heading_weight', array(
            'default' => 'bold',
            'sanitize_callback' => 'themeora_sanitize_text',
        ));
        $wp_customize->add_control('type_heading_weight', array(
            'type' => 'select',
            'label' => __('Heading Font Weight', 'themeora'),
            'section' => 'custom_heading_typography',
            'priority' => 1,
            'choices' => $font_weight_range
                )
        );

        $wp_customize->add_setting('type_slider_h1_size', array(
            'default' => '46',
            'sanitize_callback' => 'themeora_sanitize_int',
        ));
        $wp_customize->add_control(new Themeora_Customize_Slider_Control($wp_customize, 'type_slider_h1_size', array(
            'type' => 'slider',
            'label' => __('H1 Size', 'themeora'),
            'section' => 'custom_heading_typography',
            'settings' => 'type_slider_h1_size',
            'priority' => 2,
            'choices' => $font_size_range
        )));

        $wp_customize->add_setting('type_slider_h1_lineheight', array(
            'default' => '54',
            'sanitize_callback' => 'themeora_sanitize_int',
        ));
        $wp_customize->add_control(new Themeora_Customize_Slider_Control($wp_customize, 'type_slider_h1_lineheight', array(
            'type' => 'slider',
            'label' => __('H1 Line Height', 'themeora'),
            'section' => 'custom_heading_typography',
            'settings' => 'type_slider_h1_lineheight',
            'priority' => 3,
            'choices' => $font_lineheight_range
        )));

        $wp_customize->add_setting('type_slider_h1_letterspacing', array(
            'default' => '0',
            'sanitize_callback' => 'themeora_sanitize_int',
        ));
        $wp_customize->add_control(new Themeora_Customize_Slider_Control($wp_customize, 'type_slider_h1_letterspacing', array(
            'type' => 'slider',
            'label' => __('H1 Letter Spacing', 'themeora'),
            'section' => 'custom_heading_typography',
            'settings' => 'type_slider_h1_letterspacing',
            'priority' => 4,
            'choices' => $font_letterspacing_range
        )));

        $wp_customize->add_setting('type_slider_h2_size', array(
            'default' => '28',
            'sanitize_callback' => 'themeora_sanitize_int',
        ));
        $wp_customize->add_control(new Themeora_Customize_Slider_Control($wp_customize, 'type_slider_h2_size', array(
            'type' => 'slider',
            'label' => __('H2 Size', 'themeora'),
            'section' => 'custom_heading_typography',
            'settings' => 'type_slider_h2_size',
            'priority' => 5,
            'choices' => $font_size_range
        )));

        $wp_customize->add_setting('type_slider_h2_lineheight', array(
            'default' => '32',
            'sanitize_callback' => 'themeora_sanitize_int',
        ));
        $wp_customize->add_control(new Themeora_Customize_Slider_Control($wp_customize, 'type_slider_h2_lineheight', array(
            'type' => 'slider',
            'label' => __('H2 Line Height', 'themeora'),
            'section' => 'custom_heading_typography',
            'settings' => 'type_slider_h2_lineheight',
            'priority' => 6,
            'choices' => $font_lineheight_range
        )));

        $wp_customize->add_setting('type_slider_h2_letterspacing', array(
            'default' => '0',
            'sanitize_callback' => 'themeora_sanitize_int',
        ));
        $wp_customize->add_control(new Themeora_Customize_Slider_Control($wp_customize, 'type_slider_h2_letterspacing', array(
            'type' => 'slider',
            'label' => __('H2 Letter Spacing', 'themeora'),
            'section' => 'custom_heading_typography',
            'settings' => 'type_slider_h2_letterspacing',
            'priority' => 7,
            'choices' => $font_letterspacing_range
        )));

        $wp_customize->add_setting('type_slider_h3_size', array(
            'default' => '22',
            'sanitize_callback' => 'themeora_sanitize_int',
        ));
        $wp_customize->add_control(new Themeora_Customize_Slider_Control($wp_customize, 'type_slider_h3_size', array(
            'type' => 'slider',
            'label' => __('H3 Size', 'themeora'),
            'section' => 'custom_heading_typography',
            'settings' => 'type_slider_h3_size',
            'priority' => 8,
            'choices' => $font_size_range
        )));

        $wp_customize->add_setting('type_slider_h3_lineheight', array(
            'default' => '32',
            'sanitize_callback' => 'themeora_sanitize_int',
        ));
        $wp_customize->add_control(new Themeora_Customize_Slider_Control($wp_customize, 'type_slider_h3_lineheight', array(
            'type' => 'slider',
            'label' => __('H3 Line Height', 'themeora'),
            'section' => 'custom_heading_typography',
            'settings' => 'type_slider_h3_lineheight',
            'priority' => 9,
            'choices' => $font_lineheight_range
        )));

        $wp_customize->add_setting('type_slider_h3_letterspacing', array(
            'default' => '0',
            'sanitize_callback' => 'themeora_sanitize_int',
        ));
        $wp_customize->add_control(new Themeora_Customize_Slider_Control($wp_customize, 'type_slider_h3_letterspacing', array(
            'type' => 'slider',
            'label' => __('H3 Letter Spacing', 'themeora'),
            'section' => 'custom_heading_typography',
            'settings' => 'type_slider_h3_letterspacing',
            'priority' => 10,
            'choices' => $font_letterspacing_range
         )));

        $wp_customize->add_setting('type_slider_h4_size', array(
            'default' => '20',
            'sanitize_callback' => 'themeora_sanitize_int',
        ));
        $wp_customize->add_control(new Themeora_Customize_Slider_Control($wp_customize, 'type_slider_h4_size', array(
            'type' => 'slider',
            'label' => __('H4 Size', 'themeora'),
            'section' => 'custom_heading_typography',
            'settings' => 'type_slider_h4_size',
            'priority' => 11,
            'choices' => $font_size_range
         )));

        $wp_customize->add_setting('type_slider_h4_lineheight', array(
            'default' => '30',
            'sanitize_callback' => 'themeora_sanitize_int',
        ));
        $wp_customize->add_control(new Themeora_Customize_Slider_Control($wp_customize, 'type_slider_h4_lineheight', array(
            'type' => 'slider',
            'label' => __('H4 Line Height', 'themeora'),
            'section' => 'custom_heading_typography',
            'settings' => 'type_slider_h4_lineheight',
            'priority' => 12,
            'choices' => $font_lineheight_range
         )));

        $wp_customize->add_setting('type_slider_h4_letterspacing', array(
            'default' => '0',
            'sanitize_callback' => 'themeora_sanitize_int',
        ));
        $wp_customize->add_control(new Themeora_Customize_Slider_Control($wp_customize, 'type_slider_h4_letterspacing', array(
            'type' => 'slider',
            'label' => __('H4 Letter Spacing', 'themeora'),
            'section' => 'custom_heading_typography',
            'settings' => 'type_slider_h4_letterspacing',
            'priority' => 13,
            'choices' => $font_letterspacing_range
         )));

        $wp_customize->add_setting('type_slider_h5_size', array(
            'default' => '16',
            'sanitize_callback' => 'themeora_sanitize_int',
        ));
        $wp_customize->add_control(new Themeora_Customize_Slider_Control($wp_customize, 'type_slider_h5_size', array(
            'type' => 'slider',
            'label' => __('H5 Size', 'themeora'),
            'section' => 'custom_heading_typography',
            'settings' => 'type_slider_h5_size',
            'priority' => 14,
            'choices' => $font_size_range
        )));

        $wp_customize->add_setting('type_slider_h5_lineheight', array(
            'default' => '28',
            'sanitize_callback' => 'themeora_sanitize_int',
        ));
        $wp_customize->add_control(new Themeora_Customize_Slider_Control($wp_customize, 'type_slider_h5_lineheight', array(
            'type' => 'slider',
            'label' => __('H5 Line Height', 'themeora'),
            'section' => 'custom_heading_typography',
            'settings' => 'type_slider_h5_lineheight',
            'priority' => 15,
            'choices' => $font_lineheight_range
         )));

        $wp_customize->add_setting('type_slider_h5_letterspacing', array(
            'default' => '0',
            'sanitize_callback' => 'themeora_sanitize_int',
        ));
        $wp_customize->add_control(new Themeora_Customize_Slider_Control($wp_customize, 'type_slider_h5_letterspacing', array(
            'type' => 'slider',
            'label' => __('H5 Letter Spacing', 'themeora'),
            'section' => 'custom_heading_typography',
            'settings' => 'type_slider_h5_letterspacing',
            'priority' => 16,
            'choices' => $font_letterspacing_range
         )));


        /* Body fonts
          ---------------------------------------------------------------------------------------------------- */
        
        $wp_customize->add_section('custom_body_typography', array(
            'title' => __('Body Typography', 'themeora'),
            'priority' => 8,
                )
        );

        $wp_customize->add_setting('type_select_body', array(
            'default' => 'Open Sans',
            'sanitize_callback' => 'themeora_sanitize_fonts',
        ));
        $wp_customize->add_control('type_select_body', array(
            'type' => 'select',
            'label' => __('Body Font', 'themeora'),
            'section' => 'custom_body_typography',
            'priority' => 1,
            'choices' => $fonts
                )
        );

        $wp_customize->add_setting('type_slider_body_size', array(
            'default' => '16',
            'sanitize_callback' => 'themeora_sanitize_int',
        ));
        $wp_customize->add_control(new Themeora_Customize_Slider_Control($wp_customize, 'type_slider_body_size', array(
            'type' => 'slider',
            'label' => __('Body Size', 'themeora'),
            'section' => 'custom_body_typography',
            'settings' => 'type_slider_body_size',
            'priority' => 2,
            'choices' => $font_size_range
        )));

        $wp_customize->add_setting('type_slider_body_lineheight', array(
            'default' => '28',
            'sanitize_callback' => 'themeora_sanitize_int',
        ));
        $wp_customize->add_control(new Themeora_Customize_Slider_Control($wp_customize, 'type_slider_body_lineheight', array(
            'type' => 'slider',
            'label' => __('Body Line Height', 'themeora'),
            'section' => 'custom_body_typography',
            'settings' => 'type_slider_body_lineheight',
            'priority' => 3,
            'choices' => $font_lineheight_range
        )));

        $wp_customize->add_setting('type_slider_body_letterspacing', array(
            'default' => '0',
            'sanitize_callback' => 'themeora_sanitize_int',
        ));
        $wp_customize->add_control(new Themeora_Customize_Slider_Control($wp_customize, 'type_slider_body_letterspacing', array(
            'type' => 'slider',
            'label' => __('Body Letter Spacing', 'themeora'),
            'section' => 'custom_body_typography',
            'settings' => 'type_slider_body_letterspacing',
            'priority' => 4,
            'choices' => $font_letterspacing_range
        )));
    }



    /* Blog settings
      ---------------------------------------------------------------------------------------------------- */

    $wp_customize->add_section('blog_settings', array(
        'title' => __('Blog Settings', 'themeora'),
        'priority' => 11,
        )
    );

    $wp_customize->add_setting('post_pagination', array(
        'default' => true,
        'sanitize_callback' => 'themeora_sanitize_checkbox',
    ));
    $wp_customize->add_control('post_pagination', array(
        'type' => 'checkbox',
        'label' => __('Enable Post Pagination', 'themeora'),
        'section' => 'blog_settings',
        'priority' => 1,
        )
    );

    $wp_customize->add_setting('show_tags', array(
        'default' => false,
        'sanitize_callback' => 'themeora_sanitize_checkbox',
    ));
    $wp_customize->add_control('show_tags', array(
        'type' => 'checkbox',
        'label' => __('Display Single Post Tags', 'themeora'),
        'section' => 'blog_settings',
        'priority' => 3,
            )
    );
    
    $wp_customize->add_setting('show_author_bio', array(
        'default' => false,
        'sanitize_callback' => 'themeora_sanitize_checkbox',
    ));
    $wp_customize->add_control('show_author_bio', array(
        'type' => 'checkbox',
        'label' => __('Show author block under post', 'themeora'),
        'section' => 'blog_settings',
        'priority' => 3,
        )
    );

    /* Transport for live previews
    ---------------------------------------------------------------------------------------------------- */

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('img-upload-logo-width')->transport = 'postMessage';
    $wp_customize->get_setting('type_logo_size')->transport = 'postMessage';
    $wp_customize->get_setting('type_logo_lineheight')->transport = 'postMessage';
    $wp_customize->get_setting('footer_copyright')->transport = 'postMessage';
}

/* Sanetize callbacks
---------------------------------------------------------------------------------------------------- */

function themeora_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

//Integers
function themeora_sanitize_int( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

//Text
function themeora_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

//Url
function themeora_sanitize_url( $input ) {
    return esc_url( $input );
}

function themeora_sanitize_text_field( $input ) {
    wp_kses_post( $input );
}

//Fonts
function themeora_sanitize_fonts( $input ) {
    $valid = themeora_fonts();
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
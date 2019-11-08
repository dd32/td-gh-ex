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
        'title' => __('Logo Typography', 'atwood'),
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
            'label' => __('Logo Font', 'atwood'),
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
            'label' => __('Logo Size', 'atwood'),
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
            'label' => __('Logo Line Height', 'atwood'),
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
            'label' => __('Logo Letter Spacing', 'atwood'),
            'section' => 'logo',
            'settings' => 'type_logo_letterspacing',
            'priority' => 6,
            'choices' => $font_letterspacing_range
         )));
    }


    /* Image logo settings
    ---------------------------------------------------------------------------------------------------- */

    $wp_customize->add_section('image_logo_settings', array(
        'title' => __('Image Logo Settings', 'atwood'),
        'priority' => 3,
            )
    );

    $wp_customize->add_setting('img-upload-login-logo', array(
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'img-upload-login-logo', array(
        'label' => __('Login Logo', 'atwood'),
        'section' => 'image_logo_settings',
        'settings' => 'img-upload-login-logo',
        'priority' => 2
     )));

    $wp_customize->add_setting('img-upload-logo', array(
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'img-upload-logo', array(
        'label' => __('Logo', 'atwood'),
        'section' => 'image_logo_settings',
        'settings' => 'img-upload-logo',
        'priority' => 1
     )));

    $wp_customize->add_setting('img-upload-logo-width', array(
        'default' => '',
        'sanitize_callback' => 'themeora_sanitize_int',
    ));
    $wp_customize->add_control('img-upload-logo-width', array(
        'label' => __('Logo width (px)', 'atwood'),
        'section' => 'image_logo_settings',
        'type' => 'text',
        'priority' => 3,
            )
    );


    /* General settings
    ---------------------------------------------------------------------------------------------------- */

    $wp_customize->add_section('general_settings', array(
        'title' => __('General Settings', 'atwood'),
        'priority' => 3,
       )
    );

    $wp_customize->add_setting('footer_copyright', array(
        'default' => '',
        'sanitize_callback' => 'themeora_sanitize_text',
    ));
    $wp_customize->add_control(new Themeora_Customize_Textarea_Control($wp_customize, 'footer_copyright', array(
        'label' => __('Footer Copyright Text', 'atwood'),
        'section' => 'general_settings',
        'settings' => 'footer_copyright',
        'priority' => 7
    )));

    $wp_customize->add_setting('navbar_fixed', array(
        'default' => 'no',
        'sanitize_callback' => 'themeora_sanitize_text',
     ));
    $wp_customize->add_control('navbar_fixed', array(
        'type' => 'select',
        'label' => __('Fix the navbar?', 'atwood'),
        'section' => 'general_settings',
        'priority' => 8,
        'choices' => array('no' => 'No', 'yes' => 'Yes')
        )
    );

    /* Background settings
      ---------------------------------------------------------------------------------------------------- */

    $wp_customize->add_section('background', array(
        'title' => __('Background', 'atwood'),
        'priority' => 5,
      )
    );

    /* Colour settings
      ---------------------------------------------------------------------------------------------------- */
    $wp_customize->add_section('custom_styles', array(
        'title' => __('Custom Styles', 'atwood'),
        'priority' => 6,
        )
    );

    // Accent colour
    $wp_customize->add_setting('theme_accent_color', array(
        'default' => '#428BCA',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'theme_accent_color', array(
        'label' => __('Accent Color', 'atwood'),
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
        'label' => __('Header Font Color', 'atwood'),
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
        'label' => __('Body Font Color', 'atwood'),
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
        'label' => __('Body Secondary Font Color', 'atwood'),
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
        'label' => __('Button color', 'atwood'),
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
        'label' => __('Button hover color', 'atwood'),
        'section' => 'custom_styles',
        'settings' => 'button_primary_hover_color',
        'priority' => 7
    )));


    /* Typography
      ---------------------------------------------------------------------------------------------------- */

    if (themeora_theme_supports('primary', 'fonts')) {
        //Headings
        $wp_customize->add_section('custom_heading_typography', array(
            'title' => __('Heading Typography', 'atwood'),
            'priority' => 7,
           )
        );

        $wp_customize->add_setting('type_select_headings', array(
            'default' => '',
            'sanitize_callback' => 'themeora_sanitize_fonts',
        ));
        $wp_customize->add_control('type_select_headings', array(
            'type' => 'select',
            'label' => __('Header Font', 'atwood'),
            'section' => 'custom_heading_typography',
            'priority' => 1,
            'choices' => $fonts
          )
        );


        /* Body fonts
          ---------------------------------------------------------------------------------------------------- */

        $wp_customize->add_section('custom_body_typography', array(
            'title' => __('Body Typography', 'atwood'),
            'priority' => 8,
                )
        );

        $wp_customize->add_setting('type_select_body', array(
            'default' => 'Open Sans',
            'sanitize_callback' => 'themeora_sanitize_fonts',
        ));
        $wp_customize->add_control('type_select_body', array(
            'type' => 'select',
            'label' => __('Body Font', 'atwood'),
            'section' => 'custom_body_typography',
            'priority' => 1,
            'choices' => $fonts
                )
        );


    }



    /* Blog settings
      ---------------------------------------------------------------------------------------------------- */

    $wp_customize->add_section('blog_settings', array(
        'title' => __('Blog Settings', 'atwood'),
        'priority' => 11,
        )
    );

    $wp_customize->add_setting('post_pagination', array(
        'default' => true,
        'sanitize_callback' => 'themeora_sanitize_checkbox',
    ));
    $wp_customize->add_control('post_pagination', array(
        'type' => 'checkbox',
        'label' => __('Enable Post Pagination', 'atwood'),
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
        'label' => __('Display Single Post Tags', 'atwood'),
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
        'label' => __('Show author block under post', 'atwood'),
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

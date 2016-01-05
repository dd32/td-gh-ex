<?php

require get_template_directory() . '/inc/admin/customise-classes.php';
/**
 * Handles the theme's theme customizer functionality.
 *
 * @package    Artwork
 */
/* Theme Customizer setup. */
add_action('customize_register', 'theme_customize_register');

/**
 * Sets up the theme customizer sections, controls, and settings.
 *
 * @since  1.0.0
 * @access public
 * @param  object  $wp_customize
 * @return void
 */
function theme_customize_register($wp_customize) {

    /*
     * Enable live preview for WordPress theme features. 
     */
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->remove_section("header_image");
    $list_fonts = array(); // 1
    $list_font_weights = array(); // 2
    $webfonts_array = file(get_template_directory_uri() . '/assets/fonts.json');
    $webfonts = implode('', $webfonts_array);
    $list_fonts_decode = json_decode($webfonts, true);

    foreach ($list_fonts_decode['items'] as $key => $value) {
        $item_family = $list_fonts_decode['items'][$key]['family'];
        $list_fonts[$item_family] = $item_family;
        $list_font_weights[$item_family] = $list_fonts_decode['items'][$key]['variants'];
    }

    $list_all_font_weights = array(// 3
        '100' => __('Ultra Light', 'artwork-lite'),
        '100italic' => __('Ultra Light Italic', 'artwork-lite'),
        '200' => __('Light', 'artwork-lite'),
        '200italic' => __('Light Italic', 'artwork-lite'),
        '300' => __('Book', 'artwork-lite'),
        '300italic' => __('Book Italic', 'artwork-lite'),
        '400' => __('Regular', 'artwork-lite'),
        '400italic' => __('Regular Italic', 'artwork-lite'),
        '500' => __('Medium', 'artwork-lite'),
        '500italic' => __('Medium Italic', 'artwork-lite'),
        '600' => __('Semi-Bold', 'artwork-lite'),
        '600italic' => __('Semi-Bold Italic', 'artwork-lite'),
        '700' => __('Bold', 'artwork-lite'),
        '700italic' => __('Bold Italic', 'artwork-lite'),
        '800' => __('Extra Bold', 'artwork-lite'),
        '800italic' => __('Extra Bold Italic', 'artwork-lite'),
        '900' => __('Ultra Bold', 'artwork-lite'),
        '900italic' => __('Ultra Bold Italic', 'artwork-lite')
    );
    $list_all_font_size = array(
        '14px' => '14px',
        '15px' => '15px',
        '16px' => '16px',
        '18px' => '18px',
        '20px' => '20px',
        '22px' => '22px',
        '24px' => '24px',
        '26px' => '26px',
        '28px' => '28px',
        '30px' => '30px',
        '32px' => '32px',
        '34px' => '34px',
        '36px' => '36px',
        '38px' => '38px',
        '40px' => '40px',
        '42px' => '42px',
        '44px' => '44px',
        '48px' => '48px',
        '50px' => '50px',
        '52px' => '52px',
        '54px' => '54px',
        '56px' => '56px',
        '58px' => '58px',
        '60px' => '60px',
        '62px' => '62px',
        '64px' => '64px',
        '66px' => '66px',
        '68px' => '68px',
        '70px' => '70px',
        '72px' => '72px',
        '74px' => '74px',
        '76px' => '76px',
        '78px' => '78px',
        '80px' => '80px',
        '82px' => '82px',
        '84px' => '84px',
        '86px' => '86px',
        '88px' => '88px',
        '90px' => '90px',
        '92px' => '92px',
        '96px' => '96px',
        '94px' => '94px',
        '96px' => '96px',
        '98px' => '98px'
    );

    $wp_customize->add_setting('theme_title_font_family', array(
        'default' => 'Roboto',
        'sanitize_callback' => 'theme_sanitize_select',
    ));

    $wp_customize->add_control('theme_title_font_family', array(
        'type' => 'select',
        'label' => __('Site Title Font Family', 'artwork-lite'),
        'section' => 'title_tagline',
        'priority' => 10,
        'choices' => $list_fonts
    ));
    $wp_customize->add_setting('theme_title_font_weight', array(
        'default' => '700',
        'sanitize_callback' => 'theme_sanitize_select',
    ));

    $wp_customize->add_control('theme_title_font_weight', array(
        'type' => 'select',
        'label' => __('Site Title Font Weight', 'artwork-lite'),
        'section' => 'title_tagline',
        'priority' => 11,
        'choices' => $list_all_font_weights
    ));
    $wp_customize->add_setting('theme_title_font_size', array(
        'default' => '90px',
        'sanitize_callback' => 'theme_sanitize_select',
    ));

    $wp_customize->add_control('theme_title_font_size', array(
        'type' => 'select',
        'label' => __('Site Title Font Size', 'artwork-lite'),
        'section' => 'title_tagline',
        'priority' => 12,
        'choices' => $list_all_font_size
    ));

    /*
     * Add 'gemeral' section 
     */
    $wp_customize->add_section(
            'theme_general_section', array(
        'title' => esc_html__('General', 'artwork-lite'),
        'priority' => 20,
        'capability' => 'edit_theme_options'
            )
    );

    /*
     * Add the 'copyright ' setting.
     */
    $wp_customize->add_setting('theme_copyright', array(
      'sanitize_callback' => 'theme_sanitize_pro_version')
      );

      $wp_customize->add_control(new Theme_Support($wp_customize, 'theme_copyright', array(
      'label' => __('"Designed and Powered..." text in footer', 'artwork-lite' ),
      'section' => 'theme_general_section',
      'settings' => 'theme_copyright',
      'priority' => 2
      )
      ));

    $color_scheme = theme_get_color_scheme();

    /*
     * Brand Color
     */

    $wp_customize->add_setting('theme_color_text', array(
        'default' => THEME_TEXT_COLOR,
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'theme_color_text', array(
        'label' => __('Text Color', 'artwork-lite'),
        'section' => 'colors',
        'settings' => 'theme_color_text'
    )));
    $wp_customize->add_setting('theme_color_primary', array(
        'default' => $color_scheme[0],
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'theme_color_primary', array(
        'label' => __('Accent Color', 'artwork-lite'),
        'section' => 'colors',
        'settings' => 'theme_color_primary'
    )));

    $wp_customize->add_setting('theme_color_second', array(
        'default' => $color_scheme[1],
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'theme_color_second', array(
        'label' => __('Second Accent Color', 'artwork-lite'),
        'section' => 'colors',
        'settings' => 'theme_color_second'
    )));

    $wp_customize->add_setting('theme_color_third', array(
        'default' => $color_scheme[2],
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'theme_color_third', array(
        'label' => __('Third Accent Color', 'artwork-lite'),
        'section' => 'colors',
        'settings' => 'theme_color_third'
    )));
    $wp_customize->add_setting('theme_color_fourth', array(
        'default' => $color_scheme[3],
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'theme_color_fourth', array(
        'label' => __('Fourth Accent Color', 'artwork-lite'),
        'section' => 'colors',
        'settings' => 'theme_color_fourth'
    )));

    /*
     * Add 'logo/favicon' section 
     */
    $theme_logo_section_title = esc_html__('Logo', 'artwork-lite');
    if (!function_exists('has_site_icon')) {
        $theme_logo_section_title = esc_html__('Logo & Favicon', 'artwork-lite');
    }
    $wp_customize->add_section(
            'theme_logo_section', array(
        'title' => $theme_logo_section_title,
        'priority' => 30,
        'capability' => 'edit_theme_options'
            )
    );

    /*
     * Add the 'logo ' upload setting.
     */
    $wp_customize->add_setting(
            'theme_logo', array(
        'default' => $color_scheme[4],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
            )
    );

    /*
     * Add the upload control for the 'theme_logo' setting.
     */
    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'theme_logo', array(
        'label' => esc_html__('Logo', 'artwork-lite'),
        'section' => 'theme_logo_section',
        'settings' => 'theme_logo',
            )
            )
    );
    /*
     * Add the 'logo footer' upload setting.
     */
    $wp_customize->add_setting(
            'theme_logo_footer', array(
        'default' => $color_scheme[5],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
            )
    );

    /*
     * Add the upload control for the 'theme_logo_footer' setting.
     */
    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'theme_logo_footer', array(
        'label' => esc_html__('Footer logo', 'artwork-lite'),
        'section' => 'theme_logo_section',
        'settings' => 'theme_logo_footer',
            )
            )
    );
    if (!function_exists('has_site_icon')) {
        /*
         * Add the 'favicon' upload setting.
         */
        $wp_customize->add_setting(
                'theme_favicon', array(
            'default' => get_template_directory_uri() . '/images/headers/favicon.png',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
                )
        );

        /*
         * Add the upload control for the 'theme_favicon' setting. 
         */
        $wp_customize->add_control(
                new WP_Customize_Image_Control(
                $wp_customize, 'theme_favicon', array(
            'label' => esc_html__('Favicon', 'artwork-lite'),
            'section' => 'theme_logo_section',
            'settings' => 'theme_favicon',
                )
                )
        );
    }

    /*
     * Add 'header_info' section 
     */
    $wp_customize->add_section(
            'theme_header_info', array(
        'title' => esc_html__('Contact Information', 'artwork-lite'),
        'priority' => 60,
        'capability' => 'edit_theme_options'
            )
    );
    $wp_customize->add_setting('theme_location_info_label', array(
        'default' => __('Opening hours', 'artwork-lite'),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'theme_sanitize_text',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control('theme_location_info_label', array(
        'label' => __('Title Contact Information 1', 'artwork-lite'),
        'section' => 'theme_header_info',
        'settings' => 'theme_location_info_label',
    ));
    $wp_customize->add_setting('theme_location_info', array(
        'default' => THEME_DEFAULT_ADDRESS,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'theme_sanitize_text',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new Theme_Customize_Textarea_Control($wp_customize, 'theme_location_info', array(
        'label' => __('Contact Information 1', 'artwork-lite'),
        'section' => 'theme_header_info',
        'settings' => 'theme_location_info',
    )));
    $wp_customize->add_setting('theme_hours_info_label', array(
        'default' => __('Address', 'artwork-lite'),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'theme_sanitize_text',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control('theme_hours_info_label', array(
        'label' => __('Title Contact Information 2', 'artwork-lite'),
        'section' => 'theme_header_info',
        'settings' => 'theme_hours_info_label',
    ));
    $wp_customize->add_setting('theme_hours_info', array(
        'default' => THEME_DEFAULT_OPEN_HOURS,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'theme_sanitize_text',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new Theme_Customize_Textarea_Control($wp_customize, 'theme_hours_info', array(
        'label' => __('Contact Information 2', 'artwork-lite'),
        'section' => 'theme_header_info',
        'settings' => 'theme_hours_info',
    )));
    /*
     * Add 'about' section 
     */
    $wp_customize->add_section(
            'theme_about_section', array(
        'title' => esc_html__('About Page', 'artwork-lite'),
        'priority' => 70,
        'capability' => 'edit_theme_options'
            )
    );
    /*
     * Add the 'phone info' setting. 
     */
    $wp_customize->add_setting('theme_about_content', array(
        'sanitize_callback' => 'theme_sanitize_text_all',
        'default' => '',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage'
    ));
    /*
     * Add the control for the 'phone info' setting.
     */
    $wp_customize->add_control(new Theme_Customize_Textarea_Control($wp_customize, 'theme_about_content', array(
        'label' => __('Description', 'artwork-lite'),
        'section' => 'theme_about_section',
        'settings' => 'theme_about_content',
    )));
    if (get_theme_mod('theme_about_content', false) === false) :
        set_theme_mod('theme_about_content', (__('<h1>Hello!</h1><p>Artistique is a fine art gallery located in 24 Hillside Gardens Northwood, Greater London UK. The gallery was established in 1993 and is dedicated to the exhibition, education and research of contemporary figurative art. Our aim is to contribute, initiate, develop and inspire viewers about the visual arts.</p><p>Artistique Artwork Gallery is always open for submissions from all creative artists. Get your opportunity to exhibit your works at a prestigious gallery and have them seen by thousands of visitors who appreciate the art.</p><h5>OPENING HOURS</h5> <p class="color-black">10.30am to 5.30pm, Tuesday to Sunday during exhibitions.<br/>Closed on Mondays (except bank holidays) and during exhibition changeovers.</p><p><h5  class="inline-class">DIRECTIONS:</h5> via subway take 282/H11 train towards Harrow Bus Station (Stop D), walk about 2 min, head southeast on Green Ln/A4125, at the roundabout, take the 2nd exit onto Northwood Way, turn right to stay on Northwood Way, turn left onto Hillside Rise, Continue onto Hillside Gardens. Artistique Artwork Gallery will be on the left.</p>', 'artwork-lite') . '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2477.886123831363!2d-0.40599407821061495!3d51.606975100903576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48766b6644faeab9%3A0x43cc932445a52c2a!2s24+Hillside+Gardens%2C+Northwood%2C+Greater+London+HA6+1RL%2C+UK!5e0!3m2!1sen!2sua!4v1448962013715" width="600" height="217" frameborder="0" style="border:0" allowfullscreen></iframe>'));
    endif;
    /*
     * Add the 'logo footer' upload setting.
     */
    $wp_customize->add_setting(
            'theme_about_img', array(
        'default' => get_template_directory_uri() . '/images/about_img.png',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
            )
    );
    /*
     * Add the upload control for the 'theme_logo' setting.
     */
    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'theme_about_img', array(
        'label' => esc_html__('Background image', 'artwork-lite'),
        'section' => 'theme_about_section',
        'settings' => 'theme_about_img',
            )
            )
    );

    /*
     * Add 'header_socials' section 
     */
    $wp_customize->add_section(
            'theme_header_socials', array(
        'title' => esc_html__('Social Links', 'artwork-lite'),
        'priority' => 80,
        'capability' => 'edit_theme_options'
            )
    );
    /*
     *  Add the 'facebook link' setting. 
     */
    $wp_customize->add_setting(
            'theme_facebook_link', array(
        'default' => '#',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'theme_sanitize_text',
            )
    );

    /*
     * Add the upload control for the 'facebook link' setting. 
     */
    $wp_customize->add_control(
            'theme_facebook_link', array(
        'label' => esc_html__('Facebook link', 'artwork-lite'),
        'section' => 'theme_header_socials',
        'settings' => 'theme_facebook_link',
            )
    );
    /*
     * Add the 'twitter link' setting. 
     */
    $wp_customize->add_setting(
            'theme_twitter_link', array(
        'default' => '#',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'esc_url_raw',
            )
    );

    /*
     *  Add the upload control for the 'twitter link' setting. 
     */
    $wp_customize->add_control(
            'theme_twitter_link', array(
        'label' => esc_html__('Twitter link', 'artwork-lite'),
        'section' => 'theme_header_socials',
        'settings' => 'theme_twitter_link',
            )
    );

    /*
     * Add the 'linkedin link' setting. 
     */
    $wp_customize->add_setting(
            'theme_linkedin_link', array(
        'default' => '#',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'esc_url_raw',
            )
    );

    /*
     * Add the upload control for the 'linkedin link' setting. 
     */
    $wp_customize->add_control(
            'theme_linkedin_link', array(
        'label' => esc_html__('LinkedIn link', 'artwork-lite'),
        'section' => 'theme_header_socials',
        'settings' => 'theme_linkedin_link',
            )
    );
    /*
     * Add the 'google plus link' setting. 
     */
    $wp_customize->add_setting(
            'theme_google_plus_link', array(
        'default' => '#',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'esc_url_raw',
            )
    );

    /*
     * Add the upload control for the 'google plus link' setting. 
     */
    $wp_customize->add_control(
            'theme_google_plus_link', array(
        'label' => esc_html__('Google+ link', 'artwork-lite'),
        'section' => 'theme_header_socials',
        'settings' => 'theme_google_plus_link',
            )
    );
    /*
     * Add the 'rss link' setting. 
     */
    $wp_customize->add_setting(
            'theme_rss_link', array(
        'default' => '#',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'esc_url_raw',
            )
    );

    /*
     * Add the upload control for the 'rss link' setting. 
     */
    $wp_customize->add_control(
            'theme_rss_link', array(
        'label' => esc_html__('Rss link', 'artwork-lite'),
        'section' => 'theme_header_socials',
        'settings' => 'theme_rss_link',
            )
    );
    /*
     * Add 'header_socials' section 
     */
    $wp_customize->add_section(
            'theme_posts_settings', array(
        'title' => esc_html__('Posts Settings', 'artwork-lite'),
        'priority' => 100,
        'capability' => 'edit_theme_options'
            )
    );
    /*
     *  Add the 'Show meta' setting. 
     */
    $wp_customize->add_setting('theme_show_meta', array(
        'default' => '1',
        'sanitize_callback' => 'theme_sanitize_checkbox',
    ));
    /*
     * Add the upload control for the 'Show meta' setting. 
     */
    $wp_customize->add_control(
            new WP_Customize_Control(
            $wp_customize, 'theme_show_meta', array(
        'label' => esc_html__('Show Meta', 'artwork-lite'),
        'section' => 'theme_posts_settings',
        'settings' => 'theme_show_meta',
        'type' => 'checkbox',
            ))
    );
    /*
     * Add the 'Show Categories' setting. 
     */
    $wp_customize->add_setting('theme_show_categories', array(
        'default' => '1',
        'sanitize_callback' => 'theme_sanitize_checkbox',
    ));
    /*
     * Add the upload control for the 'Show Categories'setting. 
     */
    $wp_customize->add_control(
            new WP_Customize_Control(
            $wp_customize, 'theme_show_categories', array(
        'label' => esc_html__('Show Categories', 'artwork-lite'),
        'section' => 'theme_posts_settings',
        'settings' => 'theme_show_categories',
        'type' => 'checkbox',
            ))
    );
    /*
     * Add the 'Show Tags' setting. 
     */
    $wp_customize->add_setting('theme_show_tags', array(
        'default' => '1',
        'sanitize_callback' => 'theme_sanitize_checkbox',
    ));
    /*
     *  Add the upload control for the 'Show Tags' setting.
     */
    $wp_customize->add_control(
            new WP_Customize_Control(
            $wp_customize, 'theme_show_tags', array(
        'label' => esc_html__('Show Tags', 'artwork-lite'),
        'section' => 'theme_posts_settings',
        'settings' => 'theme_show_tags',
        'type' => 'checkbox',
            ))
    );

    /*
     * Add the 'Hide custom page instead of latest posts?' setting. 
     */
    $wp_customize->add_setting('theme_custom_page_show', array(
        'default' => 1,
        'sanitize_callback' => 'theme_sanitize_checkbox',
    ));
    /*
     *  Add the upload control for the 'Hide custom page instead of latest posts?' setting.
     */
    $wp_customize->add_control(
            new WP_Customize_Control(
            $wp_customize, 'theme_custom_page_show', array(
        'label' => esc_html__('Override latest posts with Works Front Page', 'artwork-lite'),
        'section' => 'static_front_page',
        'settings' => 'theme_custom_page_show',
        'type' => 'checkbox',
        'priority' => 1,
            ))
    );
}

function theme_sanitize_pro_version( $input ) {
  return $input;
  }

/**
 * Sanitize Integer
 *
 * @since  1.0.1
 * @access public
 * @return sanitized output
 */
function theme_sanitize_integer($int) {
    if (is_numeric($int)) {
        return intval($int);
    }
}

/**
 * Sanitize text
 *
 * @since  1.0.1
 * @access public
 * @return sanitized output
 */
function theme_sanitize_text($txt) {
    return wp_kses_post(force_balance_tags($txt));
}

function theme_sanitize_text_all($txt) {
    return force_balance_tags($txt);
}

/**
 * Sanitize checkbox
 *
 * @since  1.0.1
 * @access public
 * @return sanitized output
 */
function theme_sanitize_checkbox($input) {
    if ($input == 1) {
        return 1;
    } else {
        return '';
    }
}

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JavaScript handlers to make the Customizer preview
 * reload changes asynchronously.
 *
 * @since Artwork 1.0
 */
function theme_customize_preview_js() {
    wp_enqueue_script('theme-customizer', get_template_directory_uri() . '/js/theme-customizer.min.js', array('customize-preview'), '', true);
}

add_action('customize_preview_init', 'theme_customize_preview_js');

/**
 * Register color schemes for Artwork.
 *
 * Can be filtered with {@see 'theme_color_schemes'}.
 *
 * The order of colors in a colors array:
 * 1. Main Background Color.
 * 2. Sidebar Background Color.
 * 3. Box Background Color.
 * 4. Main Text and Link Color.
 * 5. Sidebar Text and Link Color.
 * 6. Meta Box Background Color.
 *
 * @since Artwork 1.0
 *
 * @return array An associative array of color scheme options.
 */
function theme_get_color_schemes() {
    return apply_filters('theme_color_schemes', array(
        'default' => array(
            'label' => __('Default', 'artwork-lite'),
            'colors' => array(
                THEME_BRAND_COLOR,
                THEME_SECOND_BRAND_COLOR,
                THEME_THIRD_BRAND_COLOR,
                THEME_FOURTH_BRAND_COLOR,
                get_template_directory_uri() . '/images/headers/logo.png',
                get_template_directory_uri() . '/images/headers/logo2.png',
            ),
        )
    ));
}

if (!function_exists('theme_get_color_scheme')) :

    /**
     * Get the current Artwork color scheme.
     *
     * @since Artwork 1.0
     *
     * @return array An associative array of either the current or default color scheme hex values.
     */
    function theme_get_color_scheme() {
        $color_scheme_option = get_theme_mod('color_scheme', 'default');
        $color_schemes = theme_get_color_schemes();

        if (array_key_exists($color_scheme_option, $color_schemes)) {
            return $color_schemes[$color_scheme_option]['colors'];
        }

        return $color_schemes['default']['colors'];
    }

endif; // theme_get_color_scheme

if (!function_exists('theme_get_color_scheme_choices')) :

    /**
     * Returns an array of color scheme choices registered for Artwork.
     *
     * @since Artwork 1.0
     *
     * @return array Array of color schemes.
     */
    function theme_get_color_scheme_choices() {
        $color_schemes = theme_get_color_schemes();
        $color_scheme_control_options = array();

        foreach ($color_schemes as $color_scheme => $value) {
            $color_scheme_control_options[$color_scheme] = $value['label'];
        }
        return $color_scheme_control_options;
    }

endif; // theme_get_color_scheme_choices

if (!function_exists('theme_sanitize_color_scheme')) :

    /**
     * Sanitization callback for color schemes.
     *
     * @since Artwork 1.0
     *
     * @param string $value Color scheme name value.
     * @return string Color scheme name.
     */
    function theme_sanitize_color_scheme($value) {
        $color_schemes = theme_get_color_scheme_choices();

        if (!array_key_exists($value, $color_schemes)) {
            $value = 'default';
        }

        return $value;
    }

endif; // theme_sanitize_color_scheme
if (!function_exists('theme_sanitize_select')) :

    function theme_sanitize_select($input, $setting) {
        global $wp_customize;

        $control = $wp_customize->get_control($setting->id);

        if (array_key_exists($input, $control->choices)) {
            return $input;
        } else {
            return $setting->default;
        }
    }



endif; // theme_sanitize_select
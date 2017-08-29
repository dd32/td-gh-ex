<?php
/**
 * Better Health default theme options.
 *
 * @package Canyon Themes
 * @subpackage Better Health
 */

if ( !function_exists('better_health_get_default_theme_options' ) ) :

    /**
     * Get default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function better_health_get_default_theme_options()
    {

        $default = array();

        // Homepage Slider Section
        $default['better_health_homepage_slider_option'] = 'hide';
        $default['better_health_slider_cat_id'] = 0;
        $default['better_health_homepage_feature_option'] = 'hide';
        $default['better_health_hide_top_footer_contact_link_section'] = 'hide';
        $default['better_health_no_of_slider'] = 3;
        $default['better_health_slider_get_started_txt'] = esc_html__('Get Started!', 'better-health');
        $default['better_health_slider_get_started_link'] = '#';

        // footer copyright.
         $default['better_health_copyright'] = wp_kses_post('Copyright All Rights Reserved', 'better-health');
        $default['better_health_contact_link_button_text'] = esc_html__('Contact Us', 'better-health');
         $default['better_health_contact_link_button_link'] = '#';

          $default['better_health_contact_image'] = '#';

         $default['better_health_contact_link_address'] = esc_html__('Sukedhara, Kathmandu, Nepal', 'better-health');

         $default['better_health_contact_link_email'] = esc_html__('info@gmail.com', 'better-health');

         $default['better_health_contact_link_phone_number'] = esc_html__('+1234567879', 'better-health');

        // Home Page Top header Info.
        $default['better_health_top_header_section'] = 'hide';
        $default['better_health_top_header_section_address_icon'] = 'fa-home';
        $default['better_health_top_header_address'] = esc_html__('20 Maple Avenue 
San Pedro', 'better-health');;

        $default['better_health_top_header_section_phone_number_icon'] = 'fa-phone';
        $default['better_health_top_header_phone_no'] = '';
        $default['better_health_email_icon'] = 'fa-envelope-o';
        $default['better_health_top_header_email'] = '';
        $default['better_health_social_link_hide_option'] = 0;
        $default['better_health_appointment_hide_option'] = 0;
        $default['better_health_appointment_shortcode_field'] = '';

        // Blog.
        $default['better_health_sidebar_layout_option'] = 'right-sidebar';
        $default['better_health_blog_title_option'] = esc_html__('Latest Blog', 'better-health');
        $default['better_health_blog_excerpt_option'] = 'excerpt';
        $default['better_health_description_length_option'] = 40;
        $default['better_health_exclude_cat_blog_archive_option'] = '';
        $default['better_health_read_more_text_blog_archive_option'] = esc_html__('Read More', 'better-health');

        // Details page.
        $default['better_health_show_feature_image_single_option'] = 'show';

        // Color Option.
        $default['better_health_primary_color'] = '#00AEF0';
        $default['better_health_top_header_background_color'] = '#00AEF0';
        $default['better_health_top_footer_background_color'] = '#1A1E21';
        $default['better_health_bottom_footer_background_color'] = '#111315';
        $default['better_health_front_page_hide_option'] = 0;
        $default['better_health_breadcrumb_setting_option'] = 'enable';
        $default['better_health_post_search_placeholder_option'] = esc_html__('Search', 'better-health');
        $default['better_health_hide_breadcrumb_front_page_option'] = 1;
        $default['better_health_color_reset_option'] = 'do-not-reset';

        // Pass through filter.
        $default = apply_filters( 'better_health_get_default_theme_options', $default );
        return $default;
    }
endif;

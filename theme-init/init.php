<?php
/*
 * This file initializes the theme per
 * theme type / functions etc.
 * It contains only theme related functions etc.
 *
 * @package justwp-business/theme-init
 * @since 0.0.1
 */
DEFINE('THEME_INIT_PATH', get_template_directory() . '/theme-init/');

if (!function_exists('atlast_business_wp_menu_fallback')):
    function atlast_business_wp_menu_fallback()
    {
        /*
         * If no menu item is assigned to a menu , then please ,create some :D
         */
        if (current_user_can('edit_others_pages')):
            echo '<ul class="top-menu no-menu-items"><li>
<a href="' . admin_url('nav-menus.php') . '">' . esc_html__('Add a Menu', 'atlast-business') . '</a>
</li></ul>';
        endif;
    }

endif;

if (!function_exists('atlast_business_get_prefix')):
    function atlast_business_get_prefix()
    {
        /*
         *  Generic prefix for that theme.
         */
        $prefix = 'atlast_business';

        return esc_attr($prefix);
    }
endif;

if (!function_exists('atlast_business_get_logo_url')):
    function atlast_business_get_logo_url()
    {

        $custom_logo_id = get_theme_mod('custom_logo');
        $image = wp_get_attachment_image_src($custom_logo_id, 'full');

        return $image[0];
    }
endif;


if (!function_exists('atlast_business_set_header_image')):
    function atlast_business_set_header_image()
    {

    	$header_image_url = get_header_image();
        if (empty($header_image_url)): return; endif;

        $prefix = atlast_business_get_prefix();
        $where_to_show = get_theme_mod($prefix . '_everywhere_header', '0');

        $html = '<div class="header-image-container" style="background-image: url(' . get_header_image() . ') ">';
        /* Has header text? */

        $header_text = get_theme_mod(atlast_business_get_prefix() . '_header_image_heading', '');

        $html .= '<div class="header-texts text-center">';
        if (!empty($header_text)):
            $html .= '<h2>' . esc_html($header_text) . '</h2>';
        endif;

        $btn_text_1 = get_theme_mod(atlast_business_get_prefix() . '_header_btn_text_1', '');
        if (!empty($btn_text_1)):
            $btn_url = get_theme_mod(atlast_business_get_prefix() . '_header_btn_url_1', '#');
            $html .= '<a href="' . esc_url($btn_url) . '" class="header-image-btn">' . esc_html($btn_text_1) . '</a>';
        endif;

        $btn_text_2 = get_theme_mod(atlast_business_get_prefix() . '_header_btn_text_2', '');
        if (!empty($btn_text_2)):
            $btn_url = get_theme_mod(atlast_business_get_prefix() . '_header_btn_url_2', '#');
            $html .= '<a href="' . esc_url($btn_url) . '" class="header-image-btn">' . esc_html($btn_text_2) . '</a>';
        endif;


        $html .= '</div>'; // header-texts ends

        $html .= '</div>'; // .header-image-container

        if ($where_to_show == 0) {
            if (is_front_page() || is_home()) {
                echo $html;
            }
        } else {
            echo $html;
        }

    }
endif;
add_action('atlast_business_after_header', 'atlast_business_set_header_image', 5);
/*
 * Register the WordPress customizer
 *
 * @since 1.0.0
 */
add_action('customize_register', 'atlast_customizer_settings');
if (!function_exists('atlast_customizer_settings')):
    function atlast_customizer_settings($wp_customize)
    {

        $prefix = 'atlast_business';

        $wp_customize->add_panel($prefix . '_home_theme_panel', array(
            'priority' => 4,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => esc_html__('Atlast Business Homepage Layout', 'atlast-business'),
            'description' => esc_html__('Set the sections you like, reorder them and you are set to go.', 'atlast-business'),
        ));

        /*Sections of homepage panel */

        $wp_customize->add_section($prefix . '_home_about_section', array(
            'priority' => 9,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __('About section', 'atlast-business'),
            'description' => esc_html__('The about section of the homepage.', 'atlast-business'),
            'panel' => $prefix . '_home_theme_panel',
        ));

        /* Home about section */

        $wp_customize->add_setting($prefix . '_about_section_subtitle', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_setting($prefix . '_about_section_page', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_dropdown_pages',
        ));


        $wp_customize->add_control($prefix . '_about_section_subtitle', array(
            'type' => 'text',
            'priority' => 11,
            'section' => $prefix . '_home_about_section',
            'label' => esc_html__('A simple subtitle.', 'atlast-business'),
            'description' => esc_html__('A simple subtitle that shows under the title in the frontpage.', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_about_section_page', array(
            'type' => 'dropdown-pages',
            'priority' => 12,
            'section' => $prefix . '_home_about_section',
            'label' => esc_html__('Select the page to show in the about section.', 'atlast-business'),
            'description' => esc_html__('Do not forget to add a featured image as well.', 'atlast-business'),
        ));


        /*Home services section */

        $wp_customize->add_section($prefix . '_home_services_section', array(
            'priority' => 10,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __('Services section', 'atlast-business'),
            'description' => esc_html__('The services section of the homepage.', 'atlast-business'),
            'panel' => $prefix . '_home_theme_panel',
        ));

        $wp_customize->add_setting($prefix . '_enable_services_section', array(
            'default' => true,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_checkbox',
        ));

        $wp_customize->add_setting($prefix . '_services_section_title', array(
            'default' => esc_html__('Tailor made solutions for every client. We specialize in..', 'atlast-business'),
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ));


        $wp_customize->add_setting($prefix . '_services_section_subtitle', array(
            'default' => esc_html__('Our Services', 'atlast-business'),
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_setting($prefix . '_services_section_page_1', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_dropdown_pages',
        ));

        $wp_customize->add_setting($prefix . '_services_section_page_2', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_dropdown_pages',
        ));

        $wp_customize->add_setting($prefix . '_services_section_page_3', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_dropdown_pages',
        ));

        $wp_customize->add_setting($prefix . '_services_section_page_4', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_dropdown_pages',
        ));

        $wp_customize->add_setting($prefix . '_services_section_page_5', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_dropdown_pages',
        ));

        $wp_customize->add_setting($prefix . '_services_section_page_6', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_dropdown_pages',
        ));

        $wp_customize->add_setting($prefix . '_services_section_icon_1', array(
            'default' => 'fa fa-globe',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_setting($prefix . '_services_section_icon_2', array(
            'default' => 'fa fa-globe',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_setting($prefix . '_services_section_icon_3', array(
            'default' => 'fa fa-globe',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_setting($prefix . '_services_section_icon_4', array(
            'default' => 'fa fa-globe',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_setting($prefix . '_services_section_icon_5', array(
            'default' => 'fa fa-globe',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_setting($prefix . '_services_section_icon_6', array(
            'default' => 'fa fa-globe',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ));


        $wp_customize->add_control($prefix . '_enable_services_section', array(
            'type' => 'checkbox',
            'priority' => 10,
            'section' => $prefix . '_home_services_section',
            'label' => esc_html__('Enable this section.', 'atlast-business'),
        ));


        $wp_customize->add_control($prefix . '_services_section_title', array(
            'type' => 'text',
            'priority' => 12,
            'section' => $prefix . '_home_services_section',
            'label' => esc_html__('A simple title.', 'atlast-business'),
            'description' => esc_html__('A simple title for this section.', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_services_section_subtitle', array(
            'type' => 'text',
            'priority' => 13,
            'section' => $prefix . '_home_services_section',
            'label' => esc_html__('A simple subtitle.', 'atlast-business'),
            'description' => esc_html__('A simple subtitle that shows under the title in the frontpage.', 'atlast-business'),
        ));


        $wp_customize->add_control($prefix . '_services_section_page_1', array(
            'type' => 'dropdown-pages',
            'priority' => 14,
            'section' => $prefix . '_home_services_section',
            'label' => esc_html__('Select the first service', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_services_section_page_2', array(
            'type' => 'dropdown-pages',
            'priority' => 15,
            'section' => $prefix . '_home_services_section',
            'label' => esc_html__('Select the second service', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_services_section_page_3', array(
            'type' => 'dropdown-pages',
            'priority' => 16,
            'section' => $prefix . '_home_services_section',
            'label' => esc_html__('Select the third service', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_services_section_page_4', array(
            'type' => 'dropdown-pages',
            'priority' => 17,
            'section' => $prefix . '_home_services_section',
            'label' => esc_html__('Select the fourth service', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_services_section_page_5', array(
            'type' => 'dropdown-pages',
            'priority' => 18,
            'section' => $prefix . '_home_services_section',
            'label' => esc_html__('Select the fifth service', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_services_section_page_6', array(
            'type' => 'dropdown-pages',
            'priority' => 19,
            'section' => $prefix . '_home_services_section',
            'label' => esc_html__('Select the sixth service', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_services_section_icon_1', array(
            'type' => 'text',
            'priority' => 20,
            'section' => $prefix . '_home_services_section',
            'label' => esc_html__('Select the class name for the first service', 'atlast-business'),
            'description' => esc_html__('Read the docs to learn how to use this field', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_services_section_icon_2', array(
            'type' => 'text',
            'priority' => 21,
            'section' => $prefix . '_home_services_section',
            'label' => esc_html__('Select the class name for the second service', 'atlast-business'),
            'description' => esc_html__('Read the docs to learn how to use this field', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_services_section_icon_3', array(
            'type' => 'text',
            'priority' => 21,
            'section' => $prefix . '_home_services_section',
            'label' => esc_html__('Select the class name for the third service', 'atlast-business'),
            'description' => esc_html__('Read the docs to learn how to use this field', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_services_section_icon_4', array(
            'type' => 'text',
            'priority' => 21,
            'section' => $prefix . '_home_services_section',
            'label' => esc_html__('Select the class name for the fourth service', 'atlast-business'),
            'description' => esc_html__('Read the docs to learn how to use this field', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_services_section_icon_5', array(
            'type' => 'text',
            'priority' => 21,
            'section' => $prefix . '_home_services_section',
            'label' => esc_html__('Select the class name for the fifth service', 'atlast-business'),
            'description' => esc_html__('Read the docs to learn how to use this field', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_services_section_icon_6', array(
            'type' => 'text',
            'priority' => 21,
            'section' => $prefix . '_home_services_section',
            'label' => esc_html__('Select the class name for the sixth service', 'atlast-business'),
            'description' => esc_html__('Read the docs to learn how to use this field', 'atlast-business'),
        ));


        /*============================================================*/
        /** Home Projects area */
        /*=============================================================*/
        $wp_customize->add_section($prefix . '_home_projects_section', array(
            'priority' => 11,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __('Projects section', 'atlast-business'),
            'description' => esc_html__('The projects section of the homepage.', 'atlast-business'),
            'panel' => $prefix . '_home_theme_panel',
        ));

        $wp_customize->add_setting($prefix . '_enable_projects_section', array(
            'default' => true,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_checkbox',
        ));
        $wp_customize->add_setting($prefix . '_projects_section_title', array(
            'default' => esc_html__('Our Projects', 'atlast-business'),
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_setting($prefix . '_projects_section_subtitle', array(
            'default' => esc_html__('Start your next project with us', 'atlast-business'),
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_setting($prefix . '_projects_section_page_1', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_dropdown_pages',
        ));

        $wp_customize->add_setting($prefix . '_projects_section_page_2', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_dropdown_pages',
        ));

        $wp_customize->add_setting($prefix . '_projects_section_page_3', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_dropdown_pages',
        ));

        $wp_customize->add_setting($prefix . '_projects_section_page_4', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_dropdown_pages',
        ));


        $wp_customize->add_control($prefix . '_enable_projects_section', array(
            'type' => 'checkbox',
            'priority' => 10,
            'section' => $prefix . '_home_projects_section',
            'label' => esc_html__('Enable this section.', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_projects_section_title', array(
            'type' => 'text',
            'priority' => 11,
            'section' => $prefix . '_home_projects_section',
            'label' => esc_html__('A simple title.', 'atlast-business'),
            'description' => esc_html__('A simple title for this section.', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_projects_section_subtitle', array(
            'type' => 'text',
            'priority' => 12,
            'section' => $prefix . '_home_projects_section',
            'label' => esc_html__('A simple subtitle.', 'atlast-business'),
            'description' => esc_html__('A simple subtitle that shows under the title in that section.', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_projects_section_page_1', array(
            'type' => 'dropdown-pages',
            'priority' => 13,
            'section' => $prefix . '_home_projects_section',
            'label' => esc_html__('Select the first project', 'atlast-business'),
        ));
        $wp_customize->add_control($prefix . '_projects_section_page_2', array(
            'type' => 'dropdown-pages',
            'priority' => 14,
            'section' => $prefix . '_home_projects_section',
            'label' => esc_html__('Select the second project', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_projects_section_page_3', array(
            'type' => 'dropdown-pages',
            'priority' => 15,
            'section' => $prefix . '_home_projects_section',
            'label' => esc_html__('Select the third project', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_projects_section_page_4', array(
            'type' => 'dropdown-pages',
            'priority' => 16,
            'section' => $prefix . '_home_projects_section',
            'label' => esc_html__('Select the fourth project', 'atlast-business'),
        ));

        /*============================================================*/
        /** Home Gallery area */
        /*=============================================================*/

        $wp_customize->add_section($prefix . '_home_gallery_section', array(
            'priority' => 13,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __('Gallery section', 'atlast-business'),
            'description' => esc_html__('The Gallery section of the homepage. Use the Foogallery plugin to show your gallery.', 'atlast-business'),
            'panel' => $prefix . '_home_theme_panel',
        ));

        $wp_customize->add_setting($prefix . '_enable_gallery_section', array(
            'default' => true,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_checkbox',
        ));
        $wp_customize->add_setting($prefix . '_gallery_section_title', array(
            'default' => esc_html__('Great Galleries', 'atlast-business'),
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_setting($prefix . '_gallery_section_subtitle', array(
            'default' => esc_html__('One picture is worth a thousand words', 'atlast-business'),
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_setting($prefix . '_gallery_section_page', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_dropdown_pages',
        ));

        $wp_customize->add_control($prefix . '_enable_gallery_section', array(
            'type' => 'checkbox',
            'priority' => 10,
            'section' => $prefix . '_home_gallery_section',
            'label' => esc_html__('Enable this section.', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_gallery_section_title', array(
            'type' => 'text',
            'priority' => 11,
            'section' => $prefix . '_home_gallery_section',
            'label' => esc_html__('Add a section title.', 'atlast-business'),
            'description' => esc_html__('A simple title for this section.', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_gallery_section_subtitle', array(
            'type' => 'text',
            'priority' => 12,
            'section' => $prefix . '_home_gallery_section',
            'label' => esc_html__('Add a section subtitle.', 'atlast-business'),
            'description' => esc_html__('A simple subtitle that shows under the title in that section.', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_gallery_section_page', array(
            'type' => 'dropdown-pages',
            'priority' => 13,
            'section' => $prefix . '_home_gallery_section',
            'label' => esc_html__('Select the gallery page.', 'atlast-business'),
        ));

        /*============================================================*/
        /** Home Team area */
        /*=============================================================*/
        $wp_customize->add_section($prefix . '_home_team_section', array(
            'priority' => 13,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __('Team section', 'atlast-business'),
            'description' => esc_html__('The team section of the homepage.', 'atlast-business'),
            'panel' => $prefix . '_home_theme_panel',
        ));

        $wp_customize->add_setting($prefix . '_enable_team_section', array(
            'default' => true,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_checkbox',
        ));

        $wp_customize->add_setting($prefix . '_team_section_title', array(
            'default' => esc_html__('Meet our team', 'atlast-business'),
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_setting($prefix . '_team_section_subtitle', array(
            'default' => esc_html__('Our team of experts at your service', 'atlast-business'),
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_setting($prefix . '_team_section_page_1', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_dropdown_pages',
        ));

        $wp_customize->add_setting($prefix . '_team_section_page_2', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_dropdown_pages',
        ));

        $wp_customize->add_setting($prefix . '_team_section_page_3', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_dropdown_pages',
        ));

        $wp_customize->add_setting($prefix . '_team_section_page_4', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_dropdown_pages',
        ));

        $wp_customize->add_control($prefix . '_enable_team_section', array(
            'type' => 'checkbox',
            'priority' => 10,
            'section' => $prefix . '_home_team_section',
            'label' => esc_html__('Enable this section.', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_team_section_title', array(
            'type' => 'text',
            'priority' => 11,
            'section' => $prefix . '_home_team_section',
            'label' => esc_html__('A simple title.', 'atlast-business'),
            'description' => esc_html__('A simple title for this section.', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_team_section_subtitle', array(
            'type' => 'text',
            'priority' => 12,
            'section' => $prefix . '_home_team_section',
            'label' => esc_html__('A simple subtitle.', 'atlast-business'),
            'description' => esc_html__('A simple subtitle that shows under the title in that section.', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_team_section_page_1', array(
            'type' => 'dropdown-pages',
            'priority' => 13,
            'section' => $prefix . '_home_team_section',
            'label' => esc_html__('Select the first member', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_team_section_page_2', array(
            'type' => 'dropdown-pages',
            'priority' => 14,
            'section' => $prefix . '_home_team_section',
            'label' => esc_html__('Select the second member', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_team_section_page_3', array(
            'type' => 'dropdown-pages',
            'priority' => 15,
            'section' => $prefix . '_home_team_section',
            'label' => esc_html__('Select the third member', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_team_section_page_4', array(
            'type' => 'dropdown-pages',
            'priority' => 16,
            'section' => $prefix . '_home_team_section',
            'label' => esc_html__('Select the fourth member', 'atlast-business'),
        ));

        /*============================================================*/
        /** Home Blog area */
        /*=============================================================*/
        $wp_customize->add_section($prefix . '_home_blog_section', array(
            'priority' => 14,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __('Blog section', 'atlast-business'),
            'description' => esc_html__('The blog section of the homepage.', 'atlast-business'),
            'panel' => $prefix . '_home_theme_panel',
        ));

        $wp_customize->add_setting($prefix . '_enable_blog_section', array(
            'default' => true,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_checkbox',
        ));

        $wp_customize->add_setting($prefix . '_blog_section_title', array(
            'default' => esc_html__('Latest from the blog', 'atlast-business'),
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_setting($prefix . '_blog_section_subtitle', array(
            'default' => esc_html__('Valuable articles and news!', 'atlast-business'),
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control($prefix . '_enable_blog_section', array(
            'type' => 'checkbox',
            'priority' => 10,
            'section' => $prefix . '_home_blog_section',
            'label' => esc_html__('Enable this section.', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_blog_section_title', array(
            'type' => 'text',
            'priority' => 11,
            'section' => $prefix . '_home_blog_section',
            'label' => esc_html__('A a section title', 'atlast-business'),
            'description' => esc_html__('A simple title for this section.', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_blog_section_subtitle', array(
            'type' => 'text',
            'priority' => 12,
            'section' => $prefix . '_home_blog_section',
            'label' => esc_html__('Add a section subtitle', 'atlast-business'),
            'description' => esc_html__('A simple subtitle that shows under the title in that section.', 'atlast-business'),
        ));
        /*============================================================*/
        /* GENERAL Settings
        /*=============================================================*/

        $wp_customize->add_panel($prefix . '_theme_panel', array(
            'priority' => 5,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => esc_html__('Atlast Business Options', 'atlast-business'),
            'description' => esc_html__('You have made till the options! Just set the options you like and you are ready to go.', 'atlast-business'),
        ));

        /*
         * Sections of the general panel sections
         */
        $wp_customize->add_section($prefix . '_homepage_section', array(
            'priority' => 9,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __('Homepage section', 'atlast-business'),
            'description' => esc_html__('Set the homepage layout easily', 'atlast-business'),
            'panel' => $prefix . '_theme_panel',
        ));
        $wp_customize->add_section($prefix . '_topbar_section', array(
            'priority' => 10,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __('Top Bar section', 'atlast-business'),
            'description' => '',
            'panel' => $prefix . '_theme_panel',
        ));

        $wp_customize->add_section($prefix . '_header_section', array(
            'priority' => 11,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __('Header section', 'atlast-business'),
            'description' => '',
            'panel' => $prefix . '_theme_panel',
        ));

        $wp_customize->add_section($prefix . '_blog_section', array(
            'priority' => 12,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __('Blog section', 'atlast-business'),
            'description' => '',
            'panel' => $prefix . '_theme_panel',
        ));

        $wp_customize->add_section($prefix . '_single_section', array(
            'priority' => 13,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __('Single Post section', 'atlast-business'),
            'description' => esc_html__('Some settings that apply to all single posts', 'atlast-business'),
            'panel' => $prefix . '_theme_panel',
        ));

        $wp_customize->add_section($prefix . '_social_section', array(
            'priority' => 15,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __('Social section', 'atlast-business'),
            'description' => '',
            'panel' => $prefix . '_theme_panel',
        ));

        $wp_customize->add_section($prefix . '_footer_section', array(
            'priority' => 16,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __('Footer section', 'atlast-business'),
            'description' => '',
            'panel' => $prefix . '_theme_panel',
        ));

        $wp_customize->add_section($prefix . '_copyright_section', array(
            'priority' => 17,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __('Copyright section', 'atlast-business'),
            'description' => '',
            'panel' => $prefix . '_theme_panel',
        ));

        /*== Top Bar section settings ==*/

        $wp_customize->add_setting($prefix . '_topbar_enable', array(
            'default' => 0,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_number_absint',
        ));

        $wp_customize->add_setting($prefix . '_topbar_layout', array(
            'default' => 1,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_number_absint',
        ));


        $wp_customize->add_control($prefix . '_topbar_enable', array(
            'type' => 'select',
            'priority' => 10,
            'section' => $prefix . '_topbar_section',
            'label' => esc_html__('Do you want to enable the top bar?', 'atlast-business'),
            'description' => esc_html__('Show off or not?', 'atlast-business'),
            'choices' => array(
                0 => esc_html__('No', 'atlast-business'),
                1 => esc_html__('Yes', 'atlast-business'),
            )
        ));

        $wp_customize->add_control($prefix . '_topbar_layout', array(
            'type' => 'select',
            'priority' => 11,
            'section' => $prefix . '_topbar_section',
            'label' => esc_html__('Select the possible layouts', 'atlast-business'),
            'description' => esc_html__('Choose among the different layouts', 'atlast-business'),
            'choices' => array(
                1 => esc_html__('Menu + Widget area', 'atlast-business'),
                2 => esc_html__('Just Widget Area', 'atlast-business'),
            )
        ));

        /*= Homepage section settings =*/


        /*== Header section settings ==*/
        $wp_customize->add_setting($prefix . '_header_layout', array(
            'default' => 1,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_number_absint',
        ));

        $wp_customize->add_setting($prefix . '_everywhere_header', array(
            'default' => 0,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_number_absint',
        ));

        $wp_customize->add_setting($prefix . '_sticky_header', array(
            'default' => 0,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_number_absint',
        ));

        $wp_customize->add_setting($prefix . '_transparent_header', array(
            'default' => 0,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_number_absint',
        ));

        $wp_customize->add_setting($prefix . '_header_image_heading', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_setting($prefix . '_header_btn_text_1', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_setting($prefix . '_header_btn_url_1', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_setting($prefix . '_header_btn_text_2', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_setting($prefix . '_header_btn_url_2', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control($prefix . '_header_layout', array(
            'type' => 'select',
            'priority' => 10,
            'section' => $prefix . '_header_section',
            'label' => esc_html__('Select header (contains the navigation) style', 'atlast-business'),
            'description' => esc_html__('There are more than one to choose from. Please refer to the documentation to view the available layouts.', 'atlast-business'),
            'choices' => array(
                '1' => esc_html__('Style 1', 'atlast-business'),
                '2' => esc_html__('Style 2', 'atlast-business'),
                '3' => esc_html__('Style 3', 'atlast-business'),

            )
        ));

        $wp_customize->add_control($prefix . '_everywhere_header', array(
            'type' => 'select',
            'priority' => 11,
            'section' => $prefix . '_header_section',
            'label' => esc_html__('Do you want the header image to appear to all pages / posts etc?', 'atlast-business'),
            'description' => esc_html__('If this is a "No" the header image (if any) will appear only to the homepage and the static front page.', 'atlast-business'),
            'choices' => array(
                '0' => esc_html__('No - Only Front', 'atlast-business'),
                '1' => esc_html__('Yes, everywhere', 'atlast-business'),
            )
        ));

        $wp_customize->add_control($prefix . '_sticky_header', array(
            'type' => 'select',
            'priority' => 12,
            'section' => $prefix . '_header_section',
            'label' => esc_html__('Stick the header at the top.', 'atlast-business'),
            'description' => esc_html__('Enable this to set the main navigation fixed during the page scroll.', 'atlast-business'),
            'choices' => array(
                '0' => esc_html__('No', 'atlast-business'),
                '1' => esc_html__('Yes', 'atlast-business'),
            )
        ));

        $wp_customize->add_control($prefix . '_transparent_header', array(
            'type' => 'select',
            'priority' => 13,
            'section' => $prefix . '_header_section',
            'label' => esc_html__('Transparent header', 'atlast-business'),
            'description' => esc_html__('This applies only to Style 1 of the header area.', 'atlast-business'),
            'choices' => array(
                '0' => esc_html__('No', 'atlast-business'),
                '1' => esc_html__('Yes', 'atlast-business'),
            )
        ));

        $wp_customize->add_control($prefix . '_header_image_heading', array(
            'type' => 'text',
            'priority' => 14,
            'section' => $prefix . '_header_section',
            'label' => esc_html__('Header heading text', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_header_btn_text_1', array(
            'type' => 'text',
            'priority' => 15,
            'section' => $prefix . '_header_section',
            'label' => esc_html__('Button 1 text', 'atlast-business'),
            'description' => esc_html__('Add the text of the button 1', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_header_btn_url_1', array(
            'type' => 'url',
            'priority' => 16,
            'section' => $prefix . '_header_section',
            'label' => esc_html__('Button 1 URL', 'atlast-business'),
            'description' => esc_html__('Starting with http:// or https://', 'atlast-business'),
        ));


        $wp_customize->add_control($prefix . '_header_btn_text_2', array(
            'type' => 'text',
            'priority' => 17,
            'section' => $prefix . '_header_section',
            'label' => esc_html__('Button 2 text', 'atlast-business'),
            'description' => esc_html__('Add the text of the button 2', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_header_btn_url_2', array(
            'type' => 'url',
            'priority' => 18,
            'section' => $prefix . '_header_section',
            'label' => esc_html__('Button 2 URL', 'atlast-business'),
            'description' => esc_html__('Starting with http:// or https://', 'atlast-business'),
        ));

        /*== Blog section settings ==*/

        $wp_customize->add_setting($prefix . '_blog_layout', array(
            'default' => 1,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_number_absint',
        ));

        $wp_customize->add_setting($prefix . '_blog_excerpt_length', array(
            'default' => 55,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_number_absint',
        ));


        $wp_customize->add_control($prefix . '_blog_layout', array(
            'type' => 'select',
            'priority' => 10,
            'section' => $prefix . '_blog_section',
            'label' => esc_html__('Select blog layout.', 'atlast-business'),
            'description' => esc_html__('You can select the blog list page layout.', 'atlast-business'),
            'choices' => array(
                1 => esc_html__('Style 1', 'atlast-business'),
                2 => esc_html__('Style 2', 'atlast-business'),
            )
        ));

        $wp_customize->add_control($prefix . '_blog_excerpt_length', array(
            'type' => 'number',
            'priority' => 11,
            'section' => $prefix . '_blog_section',
            'label' => esc_html__('Blog item excerpt length.', 'atlast-business'),
            'description' => esc_html__('Custom excerpt length. Default is 55 words. You can\'t have 0 as number', 'atlast-business'),
        ));

        /*== Single Post settings ==*/

        $wp_customize->add_setting($prefix . '_single_layout', array(
            'default' => 1,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_number_absint',
        ));

        $wp_customize->add_control($prefix . '_single_layout', array(
            'type' => 'select',
            'priority' => 10,
            'section' => $prefix . '_single_section',
            'label' => esc_html__('Select single post layout.', 'atlast-business'),
            'description' => esc_html__('You can select the single post layout.', 'atlast-business'),
            'choices' => array(
                1 => esc_html__('Style 1 - default', 'atlast-business'),
                2 => esc_html__('Style 2 - Title and meta at the top', 'atlast-business'),
                3 => esc_html__('Full Width Posts with no sidebar', 'atlast-business'),
            )
        ));
        /*== Social section settings ==*/

        $wp_customize->add_setting($prefix . '_facebook', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_setting($prefix . '_twitter', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_setting($prefix . '_google-plus', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_setting($prefix . '_linkedin', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_setting($prefix . '_instagram', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control($prefix . '_facebook', array(
            'type' => 'url',
            'priority' => 10,
            'section' => $prefix . '_social_section',
            'label' => esc_html__('Facebook URL', 'atlast-business'),
            'description' => esc_html__('Add your Facebook URL with https:// in front.', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_twitter', array(
            'type' => 'url',
            'priority' => 11,
            'section' => $prefix . '_social_section',
            'label' => esc_html__('Twitter URL', 'atlast-business'),
            'description' => esc_html__('Add your Twitter URL with https:// in front.', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_google-plus', array(
            'type' => 'url',
            'priority' => 11,
            'section' => $prefix . '_social_section',
            'label' => esc_html__('Google Plus URL', 'atlast-business'),
            'description' => esc_html__('Add your Twitter URL with https:// in front.', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_linkedin', array(
            'type' => 'url',
            'priority' => 12,
            'section' => $prefix . '_social_section',
            'label' => esc_html__('Linkedin URL', 'atlast-business'),
            'description' => esc_html__('Add your Linkedin URL with https:// in front.', 'atlast-business'),
        ));

        $wp_customize->add_control($prefix . '_instagram', array(
            'type' => 'url',
            'priority' => 13,
            'section' => $prefix . '_social_section',
            'label' => esc_html__('Instagram URL', 'atlast-business'),
            'description' => esc_html__('Add your Instagram URL with https:// in front.', 'atlast-business'),
        ));

        /*== Footer section settings ==*/
        $wp_customize->add_setting($prefix . '_footer_layout', array(
            'default' => 1,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_number_absint',
        ));

        $wp_customize->add_control($prefix . '_footer_layout', array(
            'type' => 'select',
            'priority' => 10,
            'section' => $prefix . '_footer_section',
            'label' => esc_html__('Select the footer(widget area) layout', 'atlast-business'),
            'description' => esc_html__('You can have boxed and full width layout.', 'atlast-business'),
            'choices' => array(
                1 => esc_html__('Boxed', 'atlast-business'),
                2 => esc_html__('Full width', 'atlast-business'),
            )
        ));

        /*== Copyright section settings ==*/

        $wp_customize->add_setting($prefix . '_copyright_layout', array(
            'default' => 1,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'atlast_business_sanitize_number_absint',
        ));

        $wp_customize->add_setting($prefix . '_copyright_text', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control($prefix . '_copyright_layout', array(
            'type' => 'select',
            'priority' => 10,
            'section' => $prefix . '_copyright_section',
            'label' => esc_html__('Select the copyright section style', 'atlast-business'),
            'description' => esc_html__('There are more than one to choose from. Please refer to the documentation to view the available layouts.', 'atlast-business'),
            'choices' => array(
                1 => esc_html__('Style 1', 'atlast-business'),
                2 => esc_html__('Style 2', 'atlast-business'),
                3 => esc_html__('Style 3', 'atlast-business'),
                4 => esc_html__('Style 4', 'atlast-business'),
            )
        ));

        $wp_customize->add_control($prefix . '_copyright_text', array(
            'type' => 'text',
            'priority' => 11,
            'section' => $prefix . '_copyright_section',
            'label' => esc_html__('Copyright', 'atlast-business'),
            'description' => esc_html__('Add your copyright text here. You can use this text with the available copyright layouts.', 'atlast-business'),
        ));
    }
endif;

/*
 * Function tha returns the single blog posts categories
 */
if (!function_exists('atlast_business_post_categories')):
    function atlast_business_post_categories()
    {
        $terms = wp_get_object_terms(get_the_ID(), 'category');
        if (!empty($terms)):
            $html = '';
            foreach ($terms as $term):
                $html .= '<a href="' . esc_url(get_term_link($term->term_id)) . '">' . esc_html($term->name) . '</a>';
            endforeach;

            return $html;
        else:
            return false;
        endif;


    }
endif;

/*
 * Function that returns the blog layout v2 classes
 * based on the post counter.
 */
if (!function_exists('atlast_business_blog_col_class')):
    function atlast_business_blog_col_class($counter)
    {
        if ($counter == 0) {
            return 'col-12';
        } elseif ($counter > 0) {
            return 'col-6 col-sm-12';
        }
    }
endif;

/*
 * Function that sets or removes the transparency class
 * based on the Customizer settings
 */
if (!function_exists('atlast_business_set_transparent_menu')):
    function atlast_business_set_transparent_menu()
    {
        $prefix = atlast_business_get_prefix();

        $style = esc_attr(get_theme_mod($prefix . '_header_layout', ''));
        $trans = esc_attr(get_theme_mod($prefix . '_transparent_header', '0'));

        if ($trans == '1' && $style == '1' && (is_front_page() || is_home())) {
            return ' transparent-header ';
        } else {
            return false;
        }
    }
endif;


/*
 * Filter the excerpt length
 */
if (!function_exists('atlast_business_custom_excerpt')):
    function atlast_business_custom_excerpt($length)
    {

        $prefix = atlast_business_get_prefix();
        $excerpt_length = get_theme_mod($prefix . '_blog_excerpt_length', 55);

        return absint($excerpt_length);
    }
endif;
add_filter('excerpt_length', 'atlast_business_custom_excerpt', 999);

/*
 * Gets the author ID outside the loop
 */

if (!function_exists('atlast_business_get_author_id')):
    function atlast_business_get_author_id()
    {
        global $post;
        $authorID = $post->post_author;

        return absint($authorID);
    }
endif;


/*
 * Theme Customizer Sanitization function
 * for extra elements.
 */

function atlast_business_sanitize_number_absint($number, $setting)
{
    $number = absint($number);

    return ($number ? $number : $setting->default);
}

function atlast_business_sanitize_checkbox($checked)
{

    return ((isset($checked) && true == $checked) ? true : false);
}

function atlast_business_sanitize_dropdown_pages($page_id, $setting)
{

    $page_id = absint($page_id);
    return ('publish' == get_post_status($page_id) ? $page_id : $setting->default);
}

/*
 * Breadcrumbs
 */
if (!function_exists('atlast_business_breadcrumb')):
    function atlast_business_breadcrumb()
    {
        $sep = '';
        if (!is_front_page()) {

            // Start the breadcrumb with a link to your homepage
            echo '<ul class="breadcrumb atlast-breadcrumb">';
            echo '<li class="breadcrumb-item">';
            echo '<a href="';
            echo esc_url(home_url());
            echo '">';
            bloginfo('name');
            echo '</a></li>' . $sep;


            if (is_category() || is_single()) {
                echo '<li class="breadcrumb-item">';
                    the_archive_title();
                echo '</li>';
            } elseif (is_archive() || is_single()) {
                echo '<li class="breadcrumb-item">';
                if (is_day()) {
                    printf(__('Day: %s', 'atlast-business'), get_the_date());
                } elseif (is_month()) {
                    printf(__('Month: %s', 'atlast-business'), get_the_date(_x('F Y', 'monthly archives date format', 'atlast-business')));
                } elseif (is_year()) {
                    printf(__('Year: %s', 'atlast-business'), get_the_date(_x('Y', 'yearly archives date format', 'atlast-business')));
                } else {
                    _e('Blog Archives', 'atlast-business');
                }
                echo '</li>';
            }

            if (is_single()) {
                echo $sep;
                echo '<li class="breadcrumb-item">' . get_the_title() . '</li>';
            }

            if (is_page()) {
                echo '<li class="breadcrumb-item">';
                the_title();
                echo '</li>';
            }
            if (is_home()) {

                $page_for_posts_id = get_option('page_for_posts');
                if ($page_for_posts_id) {
                    $post = get_post($page_for_posts_id);
                    setup_postdata($post);
                    the_title();
                    rewind_posts();
                }
            }
            echo '</ul>';
        }
    }
endif;

/*
 * Function that returns the subtitle for any section in the homepage
 */

if (!function_exists('atlast_business_get_citem')):
    function atlast_business_get_citem($itemID, $default = '')
    {
        $prefix = atlast_business_get_prefix();
        $subtitle = get_theme_mod($prefix . $itemID, $default);

        if (!empty($subtitle)): return esc_html($subtitle); endif;
    }
endif;

/*
 * Function that returns true / false if a post has a featured image assinged to.
 */

if (!function_exists('atlast_business_has_fimage')):
    function atlast_business_has_fimage($postID)
    {

        $has_image = get_post_thumbnail_id($postID);

        if (!empty($has_image)):
            return true;
        else:
            return false;
        endif;
    }
endif;

/*
 * Function that returns a css class based on if the post has
 * a featured image attached or not.
 */
if (!function_exists('atlast_business_return_fimage_class')):

    function atlast_business_fimage_class($postID, $classWhenTrue, $classWhenFalse)
    {
        $hasImage = atlast_business_has_fimage($postID);
        if ($hasImage == true):
            return $classWhenTrue;
        else:
            return $classWhenFalse;
        endif;
    }
endif;

/*
 * Function that returns if a section is enabled in the homepage
 */
if (!function_exists('atlast_business_is_section_enabled')):
    function atlast_business_is_section_enabled($customizer_setting)
    {
        $prefix = atlast_business_get_prefix();

        $isEnabled = get_theme_mod($prefix . $customizer_setting, true);

        if ($isEnabled === true) {
            return true;
        } else {
            return false;
        }
    }
endif;

/*
 * Function that returns all the active pages in the services section
 */
if (!function_exists('atlast_business_show_services')):
    function atlast_business_show_services()
    {

        $prefix = atlast_business_get_prefix();
        $pages = array(); // stores page id to use afterwards

        for ($i = 1; $i < 7; $i++) {

            $pageID = get_theme_mod($prefix . '_services_section_page_' . $i, '');

            if (absint($pageID)) {
                $pages[] = $pageID;

            }
        }
        return $pages;

    }
endif;

/*
 * Function that returns all the icons
 */
if (!function_exists('atlast_business_show_icons')):
    function atlast_business_show_icons()
    {

        $prefix = atlast_business_get_prefix();
        $pages = array(); // stores page id to use afterwards
        $icons = array(); // stores all possble class names

        for ($i = 1; $i < 7; $i++) {

            $pageID = get_theme_mod($prefix . '_services_section_page_' . $i, '');

            if (absint($pageID)) {
                $pages[] = $pageID;
                $icons[$pageID] = get_theme_mod($prefix . '_services_section_icon_' . $i, 'fa fa-globe');

            }
        }
        return $icons;

    }
endif;
/*
 * Function that returns all the active pages in the projects section
 */
if (!function_exists('atlast_business_show_projects')):
    function atlast_business_show_projects()
    {

        $prefix = atlast_business_get_prefix();
        $pages = array(); // stores page id to use afterwards

        for ($i = 1; $i < 5; $i++) {

            $pageID = get_theme_mod($prefix . '_projects_section_page_' . $i, '');

            if (absint($pageID)) {
                $pages[] = $pageID;
            }
        }
        return $pages;
    }
endif;
/*
 * Function that returns all the active pages in the team section
 */
if (!function_exists('atlast_business_show_team_members')):
    function atlast_business_show_team_members()
    {

        $prefix = atlast_business_get_prefix();
        $pages = array(); // stores page id to use afterwards

        for ($i = 1; $i < 5; $i++) {

            $pageID = get_theme_mod($prefix . '_team_section_page_' . $i, '');

            if (absint($pageID)) {
                $pages[] = $pageID;
            }
        }
        return $pages;
    }
endif;

/*
 * Function that returns the first paragraph of a WP post
 */
if (!function_exists('atlast_business_get_first_paragraph')):
    function atlast_business_get_first_paragraph($content)
    {
        $str = wpautop($content);
        $str = substr($str, 0, strpos($str, '</p>') + 4);
        $str = strip_tags($str, '<a><strong><em>');
        return $str;
    }
endif;

/*
 * Function that returns the allowed scripts
 */
if (!function_exists('atlast_business_allowed_HTML')):
    function atlast_business_allowed_HTML()
    {
        return array(
            'a' => array(
                'href' => array(),
                'title' => array()
            ),
            'img' => array(),
            'br' => array(),
            'em' => array(),
            'strong' => array(),
        );
    }
endif;
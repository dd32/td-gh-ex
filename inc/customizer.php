<?php

/**
 * gutenbergtheme Theme Customizer
 *
 * @package aari
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function gutenbergtheme_customize_register($wp_customize) {
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector' => '.site-title a',
            'render_callback' => 'gutenbergtheme_customize_partial_blogname',
        ));
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector' => '.site-description',
            'render_callback' => 'gutenbergtheme_customize_partial_blogdescription',
        ));
    }

    $wp_customize->add_panel('aari_panel', array(
        'priority' => 40,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Aari Options', 'aari'),
    ));



    /* Header Options */
    $wp_customize->add_section('aari_theme_setting', array(
        'capability' => 'edit_theme_options',
        'title' => esc_html__('Header', 'aari'),
        'panel' => 'aari_panel',
    ));

    $wp_customize->add_setting('aari_search', array(
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'aari_sanitize_checkbox'
    ));
    $wp_customize->add_control('display_header_search', array(
        'settings' => 'aari_search',
        'label' => esc_html__('Remove Header Search?', 'aari'),
        'section' => 'aari_theme_setting',
        'type' => 'checkbox',
    ));

    /* Header Options end */


    /* Page options */
    $wp_customize->add_section('aari_page_setting', array(
        'capability' => 'edit_theme_options',
        'title' => esc_html__('Page', 'aari'),
        'panel' => 'aari_panel',
    ));

    $wp_customize->add_setting('page_header_background', array(
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri() . '/assets/default-images/page_default_background.jpg',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_upload_page', array(
        'label' => esc_html__('Page header image', 'aari'),
        'section' => 'aari_page_setting',
        'settings' => 'page_header_background',
        'description' => esc_html__('This image will be used for all pages. You can also use page featured image option for different image on different page.', 'aari')
    )));

    $wp_customize->add_setting('404_header_background', array(
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri() . '/assets/default-images/page_default_background.jpg',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_upload_404', array(
        'label' => esc_html__('404 header image', 'aari'),
        'section' => 'aari_page_setting',
        'settings' => '404_header_background',
        'description' => esc_html__('This image will be used for 404 page.', 'aari')
    )));

    $wp_customize->add_setting('disable_breadcrumbs', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'aari_sanitize_checkbox'
    ));
    $wp_customize->add_control('breadcrumbs_control', array(
        'settings' => 'disable_breadcrumbs',
        'label' => esc_html__('Disable Breadcrumbs for Pages', 'aari'),
        'section' => 'aari_page_setting',
        'type' => 'checkbox',
    ));
    /* Page options end */


    /* Post options */
    $wp_customize->add_section('aari_post_setting', array(
        'capability' => 'edit_theme_options',
        'title' => esc_html__('Post', 'aari'),
        'panel' => 'aari_panel',
    ));

    $wp_customize->add_setting('post_layout', array(
        'default' => 'right',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'aari_sanitize_select'
    ));
    $wp_customize->add_control('post_layout_control', array(
        'settings' => 'post_layout',
        'label' => esc_html__('Post Layout', 'aari'),
        'section' => 'aari_post_setting',
        'type' => 'select',
        'choices' => array(
            'right' => esc_html__('Sidebar Right', 'aari'),
            'fullwidth' => esc_html__('Full Width', 'aari')
        ),
    ));


    $wp_customize->add_setting('disable_post_breadcrumbs', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'aari_sanitize_checkbox'
    ));
    $wp_customize->add_control('breadcrumbs_control', array(
        'settings' => 'disable_post_breadcrumbs',
        'label' => esc_html__('Disable Breadcrumbs for Posts', 'aari'),
        'section' => 'aari_post_setting',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('disable_post_details', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'aari_sanitize_checkbox'
    ));
    $wp_customize->add_control('post_author_control', array(
        'settings' => 'disable_post_details',
        'label' => esc_html__('Disable Author Name and Date', 'aari'),
        'section' => 'aari_post_setting',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('disable_tag_cloud', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'aari_sanitize_checkbox'
    ));
    $wp_customize->add_control('post_cloud_control', array(
        'settings' => 'disable_tag_cloud',
        'label' => esc_html__('Disable Tag Cloud After Post', 'aari'),
        'section' => 'aari_post_setting',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('disable_category_cloud', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'aari_sanitize_checkbox'
    ));
    $wp_customize->add_control('post_cat_control', array(
        'settings' => 'disable_category_cloud',
        'label' => esc_html__('Disable Category Cloud After Post', 'aari'),
        'section' => 'aari_post_setting',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('disable_author_after', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'aari_sanitize_checkbox'
    ));
    $wp_customize->add_control('post_autdate_control', array(
        'settings' => 'disable_author_after',
        'label' => esc_html__('Disable Author Date After Post', 'aari'),
        'section' => 'aari_post_setting',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('disable_related_post', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'aari_sanitize_checkbox'
    ));
    $wp_customize->add_control('post_rpost_control', array(
        'settings' => 'disable_related_post',
        'label' => esc_html__('Disable Related Post', 'aari'),
        'section' => 'aari_post_setting',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('related_post_by', array(
        'default' => 'tag',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'aari_sanitize_select'
    ));
    $wp_customize->add_control('related_post_control', array(
        'settings' => 'related_post_by',
        'label' => esc_html__('Related Post By:', 'aari'),
        'section' => 'aari_post_setting',
        'type' => 'select',
        'choices' => array(
            'tag' => esc_html__('Tags', 'aari'),
            '' => esc_html__('Categories', 'aari')
        ),
    ));

    $wp_customize->add_setting('related_post_count', array(
        'capability' => 'edit_theme_options',
        'default' => 3,
        'sanitize_callback' => 'absint'
    ));
    $wp_customize->add_control('rpost_number_control', array(
        'settings' => 'related_post_count',
        'label' => esc_html__('Number Related Post', 'aari'),
        'section' => 'aari_post_setting',
        'type' => 'number',
    ));


    $wp_customize->add_setting('post_header_background', array(
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri() . '/assets/default-images/page_default_background.jpg',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_upload_post', array(
        'label' => esc_html__('Post Default Image', 'aari'),
        'section' => 'aari_post_setting',
        'settings' => 'post_header_background',
        'description' => esc_html__('It will be used on header if no deatured image is found for any post.', 'aari')
    )));

    /* Post options end */

    /* Other options */
    $wp_customize->add_section('aari_other_setting', array(
        'capability' => 'edit_theme_options',
        'title' => esc_html__('Miscellaneous', 'aari'),
        'panel' => 'aari_panel',
    ));
    $wp_customize->add_setting('search_header_background', array(
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri() . '/assets/default-images/page_default_background.jpg',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_upload_sresult', array(
        'label' => esc_html__('Search Default Image', 'aari'),
        'section' => 'aari_other_setting',
        'settings' => 'search_header_background',
        'description' => esc_html__('It will be used on header of search result page.', 'aari')
    )));

    $wp_customize->add_setting('author_header_background', array(
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri() . '/assets/default-images/page_default_background.jpg',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_upload_author', array(
        'label' => esc_html__('Author Default Image', 'aari'),
        'section' => 'aari_other_setting',
        'settings' => 'author_header_background',
        'description' => esc_html__('It will be used on author page.', 'aari')
    )));

    $wp_customize->add_setting('archive_header_background', array(
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri() . '/assets/default-images/page_default_background.jpg',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_upload_archive', array(
        'label' => esc_html__('Archive Default Image', 'aari'),
        'section' => 'aari_other_setting',
        'settings' => 'archive_header_background',
        'description' => esc_html__('It will be used on post archive pages.', 'aari')
    )));
    /* Other options end */

    /* Footer Options */
    $wp_customize->add_section('aari_footer_setting', array(
        'capability' => 'edit_theme_options',
        'title' => esc_html__('Footer', 'aari'),
        'panel' => 'aari_panel',
    ));

    $wp_customize->add_setting('footer_logo', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint'
    ));
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'image_upload_footer', array(
        'label' => esc_html__('Footer Logo', 'aari'),
        'section' => 'aari_footer_setting',
        'settings' => 'footer_logo',
        'height' => 50,
        'width' => 140,
        'flex_width ' => false,
        'flex_height ' => false,
    )));
    $wp_customize->add_setting('aari_footer_copyright', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    ));
    $wp_customize->add_control('footer_copyright', array(
        'settings' => 'aari_footer_copyright',
        'label' => esc_html__('Footer Copyright', 'aari'),
        'section' => 'aari_footer_setting',
        'type' => 'textarea',
        
    ));
    /* Footer Options end */

    $wp_customize->remove_control('header_textcolor');
    $wp_customize->remove_section('header_image');
}

add_action('customize_register', 'gutenbergtheme_customize_register');


/**
 * Aari sanitization function
 */

function aari_sanitize_checkbox($input) {
    return ( isset($input) ? true : false );
}

function aari_sanitize_select($input, $setting) {
    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    $input = sanitize_key($input);
    //get the list of possible select options 
    $choices = $setting->manager->get_control($setting->id)->choices;
    //return input if valid or return default option
    return ( array_key_exists($input, $choices) ? $input : $setting->default );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function gutenbergtheme_customize_partial_blogname() {
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function gutenbergtheme_customize_partial_blogdescription() {
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function gutenbergtheme_customize_preview_js() {
    wp_enqueue_script('gutenbergtheme-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20151215', true);
}

add_action('customize_preview_init', 'gutenbergtheme_customize_preview_js');










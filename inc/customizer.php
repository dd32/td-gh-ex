<?php
     //  =============================
     //  = Default Theme Customizer Settings  =
     //  @ bfront Theme
     //  =============================


function bfront_th_customize_control_enqueue_scripts() {
    wp_enqueue_script( 'th-customize-controls', get_template_directory_uri(). '/js/customize-script.js', array( 'customize-controls' ) );
    wp_register_style( 'ctypo-customize-controls', get_template_directory_uri(). '/css/customize-control.css');
}
add_action( 'customize_controls_enqueue_scripts', 'bfront_th_customize_control_enqueue_scripts');

/*theme customizer*/
function bfront_customize_register( $wp_customize ) {
 
    //  =============================
    //  ====== Genral Settings ======
    //  =============================

    $wp_customize->get_section('title_tagline')->title = esc_html__('General Settings', 'bfront');
    $wp_customize->get_section('title_tagline')->priority = 3;
    //Logo upload
     $wp_customize->add_setting('logo', array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_upload'
    ));
      $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'logo', array(
        'label'    => __('Logo Upload', 'bfront'),
        'section'  => 'title_tagline',
        'settings' => 'logo',
    )));


    //  =============================
    //  ==== Slider Image Option ====
    //  =============================
    $wp_customize->add_panel( 'slider_panel', array(
        'priority'       => 9,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Slider Options', 'bfront'),
        'description'    => '',
    ) );

    /* First Slider Settings */
    $wp_customize->add_section('first_slider_section', array(
        'title'    => __('First Slider', 'bfront'),
        'priority' => 12,
        'panel'  => 'slider_panel',
    ));

    $wp_customize->add_setting('first_slider_image', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_upload'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'first_slider_image', array(
        'label'    => __('Slider Image', 'bfront'),
        'section'  => 'first_slider_section',
        'settings' => 'first_slider_image',
    )));

    $wp_customize->add_setting('first_slider_title', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea'
    ));
    $wp_customize->add_control('first_slider_title', array(
        'label'    => __('Slider Title', 'bfront'),
        'settings' => 'first_slider_title',
        'section'  => 'first_slider_section',
        'type'     => 'text',
    ));
    $wp_customize->add_setting('first_slider_des', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea'
    ));
    $wp_customize->add_control('first_slider_des', array(
        'label'    => __('Slider Description', 'bfront'),
        'settings' => 'first_slider_des',
        'section'  => 'first_slider_section',
        'type'     => 'textarea',
    ));
    $wp_customize->add_setting('first_slider_first_button_text', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea'
    ));
    $wp_customize->add_control('first_slider_first_button_text', array(
        'label'    => __('First Button Text', 'bfront'),
        'settings' => 'first_slider_first_button_text',
        'section'  => 'first_slider_section',
        'type'     => 'text',
    ));
    $wp_customize->add_setting('first_slider_first_button_link', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        'default'           => '#',
    ));
    $wp_customize->add_control('first_slider_first_button_link', array(
        'label'    => __('First Button Link URL', 'bfront'),
        'settings' => 'first_slider_first_button_link',
        'section'  => 'first_slider_section',
        'type'     => 'text',
    ));
    $wp_customize->add_setting('first_slider_second_button_text', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea'
    ));
    $wp_customize->add_control('first_slider_second_button_text', array(
        'label'    => __('Second Button Text', 'bfront'),
        'settings' => 'first_slider_second_button_text',
        'section'  => 'first_slider_section',
        'type'     => 'text',
    ));
    $wp_customize->add_setting('first_slider_second_button_link', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        'default'           => '#',
    ));
    $wp_customize->add_control('first_slider_second_button_link', array(
        'label'    => __('Second Button Link URL', 'bfront'),
        'settings' => 'first_slider_second_button_link',
        'section'  => 'first_slider_section',
        'type'     => 'text',
    ));


    /* Second Slider Settings */
    $wp_customize->add_section('second_slider_section', array(
        'title'    => __('Second Slider', 'bfront'),
        'priority' => 12,
        'panel'  => 'slider_panel',
    ));

    $wp_customize->add_setting('second_slider_image', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_upload'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'second_slider_image', array(
        'label'    => __('Slider Image', 'bfront'),
        'section'  => 'second_slider_section',
        'settings' => 'second_slider_image',
    )));

    $wp_customize->add_setting('second_slider_title', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea'
    ));
    $wp_customize->add_control('second_slider_title', array(
        'label'    => __('Slider Title', 'bfront'),
        'settings' => 'second_slider_title',
        'section'  => 'second_slider_section',
        'type'     => 'text',
    ));
    $wp_customize->add_setting('second_slider_des', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea'
    ));
    $wp_customize->add_control('second_slider_des', array(
        'label'    => __('Slider Description', 'bfront'),
        'settings' => 'second_slider_des',
        'section'  => 'second_slider_section',
        'type'     => 'textarea',
    ));
    $wp_customize->add_setting('second_slider_first_button_text', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea'
    ));
    $wp_customize->add_control('second_slider_first_button_text', array(
        'label'    => __('First Button Text', 'bfront'),
        'settings' => 'second_slider_first_button_text',
        'section'  => 'second_slider_section',
        'type'     => 'text',
    ));
    $wp_customize->add_setting('second_slider_first_button_link', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        'default'           => '#',
    ));
    $wp_customize->add_control('second_slider_first_button_link', array(
        'label'    => __('First Button Link URL', 'bfront'),
        'settings' => 'second_slider_first_button_link',
        'section'  => 'second_slider_section',
        'type'     => 'text',
    ));
    $wp_customize->add_setting('second_slider_second_button_text', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea'
    ));
    $wp_customize->add_control('second_slider_second_button_text', array(
        'label'    => __('Second Button Text', 'bfront'),
        'settings' => 'second_slider_second_button_text',
        'section'  => 'second_slider_section',
        'type'     => 'text',
    ));
    $wp_customize->add_setting('second_slider_second_button_link', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        'default'           => '#',
    ));
    $wp_customize->add_control('second_slider_second_button_link', array(
        'label'    => __('Second Button Link URL', 'bfront'),
        'settings' => 'second_slider_second_button_link',
        'section'  => 'second_slider_section',
        'type'     => 'text',
    ));


    //  ============================================
    //  === Service Area (Three Column) Settings ===
    //  ============================================
    $wp_customize->add_panel( 'service_area', array(
        'priority'       => 9,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Service Area', 'bfront'),
        'description'    => '',
    ) );

    /* Service Area Heading */
    $wp_customize->add_section('service_area_section', array(
        'title'    => __('Service Area Heading', 'bfront'),
        'priority' => 12,
        'panel'  => 'service_area',
    ));

    $wp_customize->add_setting('service_area_heading', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea',
        'default'           =>__('Service Area','bfront')
    ));
    $wp_customize->add_control('service_area_heading', array(
        'label'    => __('Service Area Title', 'bfront'),
        'settings' => 'service_area_heading',
        'section'  => 'service_area_section',
        'type'     => 'text',
    ));

    /* First Column Settings */
    $wp_customize->add_section('first_column_section', array(
        'title'    => __('First Column', 'bfront'),
        'priority' => 12,
        'panel'  => 'service_area',
    ));
    $wp_customize->add_setting('first_icon_serviceArea', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea'
    ));
    $wp_customize->add_control('first_icon_serviceArea', array(
        'label'    => __('First Icon', 'bfront'),
        'settings' => 'first_icon_serviceArea',
        'section'  => 'first_column_section',
        'type'     => 'text',
    ));
    $wp_customize->add_setting('first_title_serviceArea', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea'
    ));
    $wp_customize->add_control('first_title_serviceArea', array(
        'label'    => __('First Title', 'bfront'),
        'settings' => 'first_title_serviceArea',
        'section'  => 'first_column_section',
        'type'     => 'text',
    ));
    $wp_customize->add_setting('first_link_anchor_serviceArea', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        'default'           => '#',
    ));
    $wp_customize->add_control('first_link_anchor_serviceArea', array(
        'label'    => __('First Title Link URL', 'bfront'),
        'settings' => 'first_link_anchor_serviceArea',
        'section'  => 'first_column_section',
        'type'     => 'text',
    ));
    $wp_customize->add_setting('first_description_serviceArea', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea'
    ));
    $wp_customize->add_control('first_description_serviceArea', array(
        'label'    => __('First Description', 'bfront'),
        'settings' => 'first_description_serviceArea',
        'section'  => 'first_column_section',
        'type'     => 'textarea',
    ));

    /* Second Column Settings */
    $wp_customize->add_section('second_column_section', array(
        'title'    => __('Second Column', 'bfront'),
        'priority' => 12,
        'panel'  => 'service_area',
    ));
    $wp_customize->add_setting('second_icon_serviceArea', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea'
    ));
    $wp_customize->add_control('second_icon_serviceArea', array(
        'label'    => __('Second Icon', 'bfront'),
        'settings' => 'second_icon_serviceArea',
        'section'  => 'second_column_section',
        'type'     => 'text',
    ));
    $wp_customize->add_setting('second_title_serviceArea', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea'
    ));
    $wp_customize->add_control('second_title_serviceArea', array(
        'label'    => __('Second Title', 'bfront'),
        'settings' => 'second_title_serviceArea',
        'section'  => 'second_column_section',
        'type'     => 'text',
    ));
    $wp_customize->add_setting('second_link_anchor_serviceArea', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        'default'           => '#',
    ));
    $wp_customize->add_control('second_link_anchor_serviceArea', array(
        'label'    => __('Second Title Link URL', 'bfront'),
        'settings' => 'second_link_anchor_serviceArea',
        'section'  => 'second_column_section',
        'type'     => 'text',
    ));
    $wp_customize->add_setting('second_description_serviceArea', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea'
    ));
    $wp_customize->add_control('second_description_serviceArea', array(
        'label'    => __('Second Description', 'bfront'),
        'settings' => 'second_description_serviceArea',
        'section'  => 'second_column_section',
        'type'     => 'textarea',
    ));

    /* Third Column Settings */
    $wp_customize->add_section('third_column_section', array(
        'title'    => __('Third Column', 'bfront'),
        'priority' => 12,
        'panel'  => 'service_area',
    ));
    $wp_customize->add_setting('third_icon_serviceArea', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea'
    ));
    $wp_customize->add_control('third_icon_serviceArea', array(
        'label'    => __('Third Icon', 'bfront'),
        'settings' => 'third_icon_serviceArea',
        'section'  => 'third_column_section',
        'type'     => 'text',
    ));
    $wp_customize->add_setting('third_title_serviceArea', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea'
    ));
    $wp_customize->add_control('third_title_serviceArea', array(
        'label'    => __('Third Title', 'bfront'),
        'settings' => 'third_title_serviceArea',
        'section'  => 'third_column_section',
        'type'     => 'text',
    ));
    $wp_customize->add_setting('third_link_anchor_serviceArea', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        'default'           => '#',
    ));
    $wp_customize->add_control('third_link_anchor_serviceArea', array(
        'label'    => __('Third Title Link URL', 'bfront'),
        'settings' => 'third_link_anchor_serviceArea',
        'section'  => 'third_column_section',
        'type'     => 'text',
    ));
    $wp_customize->add_setting('third_description_serviceArea', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea'
    ));
    $wp_customize->add_control('third_description_serviceArea', array(
        'label'    => __('Third Description', 'bfront'),
        'settings' => 'third_description_serviceArea',
        'section'  => 'third_column_section',
        'type'     => 'textarea',
    ));



    /* Parallax Section Settings */
    $wp_customize->add_section('parallax_section', array(
        'title'    => __('Parallax Section', 'bfront'),
        'priority' => 12,
    ));

    $wp_customize->add_setting('parallax_section_image', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_upload'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'parallax_section_image', array(
        'label'    => __('Parallax Section Image', 'bfront'),
        'section'  => 'parallax_section',
        'settings' => 'parallax_section_image',
    )));

    $wp_customize->add_setting('parallax_section_title', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea'
    ));
    $wp_customize->add_control('parallax_section_title', array(
        'label'    => __('Parallax Section Title', 'bfront'),
        'settings' => 'parallax_section_title',
        'section'  => 'parallax_section',
        'type'     => 'text',
    ));
    $wp_customize->add_setting('parallax_section_desc', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea'
    ));
    $wp_customize->add_control('parallax_section_desc', array(
        'label'    => __('Parallax Section Description', 'bfront'),
        'settings' => 'parallax_section_desc',
        'section'  => 'parallax_section',
        'type'     => 'textarea',
    ));


    //  ===========================================
    //  ========== Testimonial Settings ===========
    //  ===========================================
    $wp_customize->add_panel( 'testimonial_panel', array(
        'priority'       => 12,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Testimonial Area', 'bfront'),
        'description'    => '',
    ) );
    /* Testimonial  Background Video */
    $wp_customize->add_section('testimonial_section', array(
        'title'    => __('Testimonial Background Image', 'bfront'),
        'priority' => 12,
        'panel'  => 'testimonial_panel',
    ));

    $wp_customize->add_setting('testimonial_parallax_image', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'testimonial_parallax_image', array(
        'label'    => __('Testimonial Background Video', 'bfront'),
        'section'  => 'testimonial_section',
        'settings' => 'testimonial_parallax_image',
    )));

    /* First Testimonial Settings */
    $wp_customize->add_section('first_testimonial_section', array(
        'title'    => __('First Testimonial Options', 'bfront'),
        'priority' => 12,
        'panel'  => 'testimonial_panel',
    ));
    $wp_customize->add_setting('first_testimonial_text', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea'
    ));
    $wp_customize->add_control('first_testimonial_text', array(
        'label'    => __('Testimonial Text', 'bfront'),
        'settings' => 'first_testimonial_text',
        'section'  => 'first_testimonial_section',
        'type'     => 'text',
    ));
    $wp_customize->add_setting('first_testimonial_name', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea'
    ));
    $wp_customize->add_control('first_testimonial_name', array(
        'label'    => __('Name of Person', 'bfront'),
        'settings' => 'first_testimonial_name',
        'section'  => 'first_testimonial_section',
        'type'     => 'text',
    ));

    /* Second Testimonial Settings */
    $wp_customize->add_section('second_testimonial_section', array(
        'title'    => __('Second Testimonial Options', 'bfront'),
        'priority' => 12,
        'panel'  => 'testimonial_panel',
    ));
    $wp_customize->add_setting('second_testimonial_text', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea'
    ));
    $wp_customize->add_control('second_testimonial_text', array(
        'label'    => __('Testimonial Text', 'bfront'),
        'settings' => 'second_testimonial_text',
        'section'  => 'second_testimonial_section',
        'type'     => 'text',
    ));
    $wp_customize->add_setting('second_testimonial_name', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea'
    ));
    $wp_customize->add_control('second_testimonial_name', array(
        'label'    => __('Name of Person', 'bfront'),
        'settings' => 'second_testimonial_name',
        'section'  => 'second_testimonial_section',
        'type'     => 'text',
    ));

    //  =============================
    //  ====  Blogs On HomePage  ====
    //  =============================

    $wp_customize->add_section('blog_area', array(
        'title'    => __('Blog Area Options', 'bfront'),
        'priority' => 21,
    ));

    $wp_customize->add_setting('blog_heading', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea'
    ));
    $wp_customize->add_control('blog_heading', array(
        'label'    => __('Heading For Blogs', 'bfront'),
        'settings' => 'blog_heading',
        'section'  => 'blog_area',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('no_of_blogs', array(
        'default'           => '3',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_int'
    ));
    $wp_customize->add_control('no_of_blogs', array(
        'label'    => __('Number of Blogs on HomePage', 'bfront'),
        'section'  => 'blog_area',
        'settings' => 'no_of_blogs',
        'type'     => 'text',
    ));

    //  =============================
    //  ==== Footer Text Setting ====
    //  =============================

    $wp_customize->add_section('footer_text', array(
        'title'    => __('Footer Text', 'bfront'),
        'priority' => 45,
    ));
    $wp_customize->add_setting('footer_credits', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea'
    ));
    $wp_customize->add_control('footer_credits', array(
        'label'    => __('Footer Credit Text', 'bfront'),
        'section'  => 'footer_text',
        'settings' => 'footer_credits',
        'type'     => 'textarea',
    ));

    //  =============================
    //  ==== Social Media URL's ====
    //  =============================
    $wp_customize->add_section('social_section', array(
        'title'    => __('Scoial Media Options', 'bfront'),
        'priority' => 48,
    ));

    $wp_customize->add_setting('social_facebook', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        'default' => '#'
    ));
    $wp_customize->add_control('social_facebook', array(
        'label'    => __('Facebook Page URL', 'bfront'),
        'section'  => 'social_section',
        'settings' => 'social_facebook',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('social_twitter', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        'default' => '#'
    ));
    $wp_customize->add_control('social_twitter', array(
        'label'    => __('Twitter Page URL', 'bfront'),
        'section'  => 'social_section',
        'settings' => 'social_twitter',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('social_google_plus', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        'default' => '#'
    ));
    $wp_customize->add_control('social_google_plus', array(
        'label'    => __('Google Plus Page URL', 'bfront'),
        'section'  => 'social_section',
        'settings' => 'social_google_plus',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('social_rss', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        'default' => '#'
    ));
    $wp_customize->add_control('social_rss', array(
        'label'    => __('RSS Page URL', 'bfront'),
        'section'  => 'social_section',
        'settings' => 'social_rss',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('social_pinterest', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        'default' => '#'
    ));
    $wp_customize->add_control('social_pinterest', array(
        'label'    => __('Pinterest Page URL', 'bfront'),
        'section'  => 'social_section',
        'settings' => 'social_pinterest',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('social_linkedin', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        'default' => '#'
    ));
    $wp_customize->add_control('social_linkedin', array(
        'label'    => __('Linkedin Page URL', 'bfront'),
        'section'  => 'social_section',
        'settings' => 'social_linkedin',
        'type'     => 'text',
    ));

    /* Custom CSS options */
    $wp_customize->get_section('colors')->title = esc_html__('Custom Style', 'bfront');
    $wp_customize->add_setting('custom_css', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bfront_sanitize_textarea'
    ));
    $wp_customize->add_control('custom_css', array(
        'label'    => __('Custom CSS', 'bfront'),
        'section'  => 'colors',
        'settings' => 'custom_css',
        'type'     => 'textarea',
    ));

}
add_action('customize_register','bfront_customize_register');
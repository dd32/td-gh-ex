<?php
/**
 * aspro Theme Customizer
 *
 * @package aspro
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aspro_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', [
            'selector' => '.site-title a',
            'render_callback' => 'aspro_customize_partial_blogname',
        ]);
        $wp_customize->selective_refresh->add_partial('blogdescription', [
            'selector' => '.site-description',
            'render_callback' => 'aspro_customize_partial_blogdescription',
        ]);
    }

    $wp_customize->add_section('aspro_social_links_section', [
        'priority' => 5,
        'title'       => esc_html__('Social Links', 'aspro'),
        'description' => esc_html__( 'Enter your social media links. If this field is left blank then social media icons will not display.', 'aspro' )
    ]);

    $wp_customize->add_setting('aspro_facebook_link', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ]);
    $wp_customize->add_control('aspro_facebook_link', [
        'settings' => 'aspro_facebook_link',
        'section' => 'aspro_social_links_section',
        'type' => 'url',
        'label' => esc_html__('Facebook', 'aspro'),
    ]);

    $wp_customize->add_setting('aspro_twitter_link', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ]);
    $wp_customize->add_control('aspro_twitter_link', [
        'settings' => 'aspro_twitter_link',
        'section' => 'aspro_social_links_section',
        'type' => 'url',
        'label' => esc_html__('Twitter', 'aspro'),
    ]);

    $wp_customize->add_setting('aspro_instagram_link', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ]);
    $wp_customize->add_control('aspro_instagram_link', [
        'settings' => 'aspro_instagram_link',
        'section' => 'aspro_social_links_section',
        'type' => 'url',
        'label' => esc_html__('Instagram', 'aspro'),
    ]);

    $wp_customize->add_setting('aspro_youtube_link', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ]);
    $wp_customize->add_control('aspro_youtube_link', [
        'settings' => 'aspro_youtube_link',
        'section' => 'aspro_social_links_section',
        'type' => 'url',
        'label' => esc_html__('Youtube', 'aspro'),
    ]);



}
add_action('customize_register', 'aspro_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function aspro_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function aspro_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function aspro_customize_preview_js()
{
    wp_enqueue_script('aspro-customizer', get_template_directory_uri() . '/js/customizer.js', ['customize-preview'], '20151215', true);
}
add_action('customize_preview_init', 'aspro_customize_preview_js');

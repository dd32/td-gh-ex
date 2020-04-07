<?php
/**
 * Social Links
 *
 * @package Fmi
 */

// Add new section
$wp_customize->add_section( 'social_section', array(
  'title'                => esc_html__( 'Social Links', 'fmi' ),
  'priority'             => 31,
) );

// Facebook URL
$wp_customize->add_setting( 'social_facebook', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'social_facebook', array(
  'label'                => esc_html__( 'Facebook URL', 'fmi' ),
  'section'              => 'social_section',
  'type'                 => 'text',
) );

// Twitter URL
$wp_customize->add_setting( 'social_twitter', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'social_twitter', array(
  'label'                => esc_html__( 'Twitter URL', 'fmi' ),
  'section'              => 'social_section',
  'type'                 => 'text',
) );

// Instagram URL
$wp_customize->add_setting( 'social_instagram', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'social_instagram', array(
  'label'                => esc_html__( 'Instagram URL', 'fmi' ),
  'section'              => 'social_section',
  'type'                 => 'text',
) );

// Pinterest URL
$wp_customize->add_setting( 'social_pinterest', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'social_pinterest', array(
  'label'                => esc_html__( 'Pinterest URL', 'fmi' ),
  'section'              => 'social_section',
  'type'                 => 'text',
) );

// Youtube URL
$wp_customize->add_setting( 'social_youtube', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'social_youtube', array(
  'label'                => esc_html__( 'Youtube URL', 'fmi' ),
  'section'              => 'social_section',
  'type'                 => 'text',
) );

// Telegram URL
$wp_customize->add_setting( 'social_telegram', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'social_telegram', array(
  'label'                => esc_html__( 'Telegram URL', 'fmi' ),
  'section'              => 'social_section',
  'type'                 => 'text',
) );

// Vimeo URL
$wp_customize->add_setting( 'social_vimeo', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'social_vimeo', array(
  'label'                => esc_html__( 'Vimeo URL', 'fmi' ),
  'section'              => 'social_section',
  'type'                 => 'text',
) );

// SoundCloud URL
$wp_customize->add_setting( 'social_soundcloud', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'social_soundcloud', array(
  'label'                => esc_html__( 'SoundCloud URL', 'fmi' ),
  'section'              => 'social_section',
  'type'                 => 'text',
) );

// Spotify URL
$wp_customize->add_setting( 'social_spotify', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'social_spotify', array(
  'label'                => esc_html__( 'Spotify URL', 'fmi' ),
  'section'              => 'social_section',
  'type'                 => 'text',
) );

// Dribbble URL
$wp_customize->add_setting( 'social_dribbble', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'social_dribbble', array(
  'label'                => esc_html__( 'Dribbble URL', 'fmi' ),
  'section'              => 'social_section',
  'type'                 => 'text',
) );

// Behance URL
$wp_customize->add_setting( 'social_behance', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'social_behance', array(
  'label'                => esc_html__( 'Behance URL', 'fmi' ),
  'section'              => 'social_section',
  'type'                 => 'text',
) );

// Github URL
$wp_customize->add_setting( 'social_github', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'social_github', array(
  'label'                => esc_html__( 'Github URL', 'fmi' ),
  'section'              => 'social_section',
  'type'                 => 'text',
) );

// Odnoklassniki URL
$wp_customize->add_setting( 'social_ok', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'social_ok', array(
  'label'                => esc_html__( 'Odnoklassniki URL', 'fmi' ),
  'section'              => 'social_section',
  'type'                 => 'text',
) );

// VK URL
$wp_customize->add_setting( 'social_vk', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'social_vk', array(
  'label'                => esc_html__( 'VK URL', 'fmi' ),
  'section'              => 'social_section',
  'type'                 => 'text',
) );

// Xing URL
$wp_customize->add_setting( 'social_xing', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'social_xing', array(
  'label'                => esc_html__( 'Xing URL', 'fmi' ),
  'section'              => 'social_section',
  'type'                 => 'text',
) );

// Linkedin URL
$wp_customize->add_setting( 'social_linkedin', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'social_linkedin', array(
  'label'                => esc_html__( 'Linkedin URL', 'fmi' ),
  'section'              => 'social_section',
  'type'                 => 'text',
) );

// Twitch URL
$wp_customize->add_setting( 'social_twitch', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'social_twitch', array(
  'label'                => esc_html__( 'Twitch URL', 'fmi' ),
  'section'              => 'social_section',
  'type'                 => 'text',
) );

// Flickr URL
$wp_customize->add_setting( 'social_flickr', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'social_flickr', array(
  'label'                => esc_html__( 'Flickr URL', 'fmi' ),
  'section'              => 'social_section',
  'type'                 => 'text',
) );

// Snapchat URL
$wp_customize->add_setting( 'social_snapchat', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'social_snapchat', array(
  'label'                => esc_html__( 'Snapchat URL', 'fmi' ),
  'section'              => 'social_section',
  'type'                 => 'text',
) );

// Medium URL
$wp_customize->add_setting( 'social_medium', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'social_medium', array(
  'label'                => esc_html__( 'Medium URL', 'fmi' ),
  'section'              => 'social_section',
  'type'                 => 'text',
) );

// Weibo URL
$wp_customize->add_setting( 'social_weibo', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'social_weibo', array(
  'label'                => esc_html__( 'Weibo URL', 'fmi' ),
  'section'              => 'social_section',
  'type'                 => 'text',
) );

// WeChat URL
$wp_customize->add_setting( 'social_wechat', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'social_wechat', array(
  'label'                => esc_html__( 'WeChat URL', 'fmi' ),
  'section'              => 'social_section',
  'type'                 => 'text',
) );

// Tumblr URL
$wp_customize->add_setting( 'social_tumblr', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'social_tumblr', array(
  'label'                => esc_html__( 'Tumblr URL', 'fmi' ),
  'section'              => 'social_section',
  'type'                 => 'text',
) );

// Reddit URL
$wp_customize->add_setting( 'social_reddit', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'social_reddit', array(
  'label'                => esc_html__( 'Reddit URL', 'fmi' ),
  'section'              => 'social_section',
  'type'                 => 'text',
) );

// Bloglovin URL
$wp_customize->add_setting( 'social_bloglovin', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'social_bloglovin', array(
  'label'                => esc_html__( 'Bloglovin URL', 'fmi' ),
  'section'              => 'social_section',
  'type'                 => 'text',
) );

// RSS URL
$wp_customize->add_setting( 'social_rss', array(
  'default'              => '',
  'sanitize_callback'    => 'esc_url_raw',
) );
$wp_customize->add_control( 'social_rss', array(
  'label'                => esc_html__( 'RSS URL', 'fmi' ),
  'section'              => 'social_section',
  'type'                 => 'text',
) );

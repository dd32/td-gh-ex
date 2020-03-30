<?php
/**
 * Social Links
 *
 * @package Fmi
 */

// Add new section
Kirki::add_section( 'social_section', array(
  'title'      => esc_html__( 'Social Links', 'fmi' ),
  'priority'   => 31,
) );

// Facebook URL
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'text',
  'settings'   => 'social_facebook',
  'label'      => esc_html__( 'Facebook URL', 'fmi' ),
  'section'    => 'social_section',
  'default'    => '',
  'sanitize_callback'=> 'esc_url_raw',
  'priority'   => 10,
) );

// Twitter URL
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'text',
  'settings'   => 'social_twitter',
  'label'      => esc_html__( 'Twitter URL', 'fmi' ),
  'section'    => 'social_section',
  'default'    => '',
  'sanitize_callback'=> 'esc_url_raw',
  'priority'   => 10,
) );

// Instagram URL
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'text',
  'settings'   => 'social_instagram',
  'label'      => esc_html__( 'Instagram URL', 'fmi' ),
  'section'    => 'social_section',
  'default'    => '',
  'sanitize_callback'=> 'esc_url_raw',
  'priority'   => 10,
) );

// Pinterest URL
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'text',
  'settings'   => 'social_pinterest',
  'label'      => esc_html__( 'Pinterest URL', 'fmi' ),
  'section'    => 'social_section',
  'default'    => '',
  'sanitize_callback'=> 'esc_url_raw',
  'priority'   => 10,
) );

// Youtube URL
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'text',
  'settings'   => 'social_youtube',
  'label'      => esc_html__( 'Youtube URL', 'fmi' ),
  'section'    => 'social_section',
  'default'    => '',
  'sanitize_callback'=> 'esc_url_raw',
  'priority'   => 10,
) );

// Telegram URL
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'text',
  'settings'   => 'social_telegram',
  'label'      => esc_html__( 'Telegram URL', 'fmi' ),
  'section'    => 'social_section',
  'default'    => '',
  'sanitize_callback'=> 'esc_url_raw',
  'priority'   => 10,
) );

// Vimeo URL
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'text',
  'settings'   => 'social_vimeo',
  'label'      => esc_html__( 'Vimeo URL', 'fmi' ),
  'section'    => 'social_section',
  'default'    => '',
  'sanitize_callback'=> 'esc_url_raw',
  'priority'   => 10,
) );

// SoundCloud URL
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'text',
  'settings'   => 'social_soundcloud',
  'label'      => esc_html__( 'SoundCloud URL', 'fmi' ),
  'section'    => 'social_section',
  'default'    => '',
  'sanitize_callback'=> 'esc_url_raw',
  'priority'   => 10,
) );

// Spotify URL
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'text',
  'settings'   => 'social_spotify',
  'label'      => esc_html__( 'Spotify URL', 'fmi' ),
  'section'    => 'social_section',
  'default'    => '',
  'sanitize_callback'=> 'esc_url_raw',
  'priority'   => 10,
) );

// Dribbble URL
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'text',
  'settings'   => 'social_dribbble',
  'label'      => esc_html__( 'Dribbble URL', 'fmi' ),
  'section'    => 'social_section',
  'default'    => '',
  'sanitize_callback'=> 'esc_url_raw',
  'priority'   => 10,
) );

// Behance URL
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'text',
  'settings'   => 'social_behance',
  'label'      => esc_html__( 'Behance URL', 'fmi' ),
  'section'    => 'social_section',
  'default'    => '',
  'sanitize_callback'=> 'esc_url_raw',
  'priority'   => 10,
) );

// Github URL
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'text',
  'settings'   => 'social_github',
  'label'      => esc_html__( 'Github URL', 'fmi' ),
  'section'    => 'social_section',
  'default'    => '',
  'sanitize_callback'=> 'esc_url_raw',
  'priority'   => 10,
) );

// Odnoklassniki URL
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'text',
  'settings'   => 'social_ok',
  'label'      => esc_html__( 'Odnoklassniki URL', 'fmi' ),
  'section'    => 'social_section',
  'default'    => '',
  'sanitize_callback'=> 'esc_url_raw',
  'priority'   => 10,
) );

// VK URL
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'text',
  'settings'   => 'social_vk',
  'label'      => esc_html__( 'VK URL', 'fmi' ),
  'section'    => 'social_section',
  'default'    => '',
  'sanitize_callback'=> 'esc_url_raw',
  'priority'   => 10,
) );

// Xing URL
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'text',
  'settings'   => 'social_xing',
  'label'      => esc_html__( 'Xing URL', 'fmi' ),
  'section'    => 'social_section',
  'default'    => '',
  'sanitize_callback'=> 'esc_url_raw',
  'priority'   => 10,
) );

// Linkedin URL
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'text',
  'settings'   => 'social_linkedin',
  'label'      => esc_html__( 'Linkedin URL', 'fmi' ),
  'section'    => 'social_section',
  'default'    => '',
  'sanitize_callback'=> 'esc_url_raw',
  'priority'   => 10,
) );

// Twitch URL
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'text',
  'settings'   => 'social_twitch',
  'label'      => esc_html__( 'Twitch URL', 'fmi' ),
  'section'    => 'social_section',
  'default'    => '',
  'sanitize_callback'=> 'esc_url_raw',
  'priority'   => 10,
) );

// Flickr URL
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'text',
  'settings'   => 'social_flickr',
  'label'      => esc_html__( 'Flickr URL', 'fmi' ),
  'section'    => 'social_section',
  'default'    => '',
  'sanitize_callback'=> 'esc_url_raw',
  'priority'   => 10,
) );

// Snapchat URL
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'text',
  'settings'   => 'social_snapchat',
  'label'      => esc_html__( 'Snapchat URL', 'fmi' ),
  'section'    => 'social_section',
  'default'    => '',
  'sanitize_callback'=> 'esc_url_raw',
  'priority'   => 10,
) );

// Medium URL
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'text',
  'settings'   => 'social_medium',
  'label'      => esc_html__( 'Medium URL', 'fmi' ),
  'section'    => 'social_section',
  'default'    => '',
  'sanitize_callback'=> 'esc_url_raw',
  'priority'   => 10,
) );

// Weibo URL
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'text',
  'settings'   => 'social_weibo',
  'label'      => esc_html__( 'Weibo URL', 'fmi' ),
  'section'    => 'social_section',
  'default'    => '',
  'sanitize_callback'=> 'esc_url_raw',
  'priority'   => 10,
) );

// WeChat URL
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'text',
  'settings'   => 'social_wechat',
  'label'      => esc_html__( 'WeChat URL', 'fmi' ),
  'section'    => 'social_section',
  'default'    => '',
  'sanitize_callback'=> 'esc_url_raw',
  'priority'   => 10,
) );

// Tumblr URL
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'text',
  'settings'   => 'social_tumblr',
  'label'      => esc_html__( 'Tumblr URL', 'fmi' ),
  'section'    => 'social_section',
  'default'    => '',
  'sanitize_callback'=> 'esc_url_raw',
  'priority'   => 10,
) );

// Reddit URL
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'text',
  'settings'   => 'social_reddit',
  'label'      => esc_html__( 'Reddit URL', 'fmi' ),
  'section'    => 'social_section',
  'default'    => '',
  'sanitize_callback'=> 'esc_url_raw',
  'priority'   => 10,
) );

// Bloglovin URL
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'text',
  'settings'   => 'social_bloglovin',
  'label'      => esc_html__( 'Bloglovin URL', 'fmi' ),
  'section'    => 'social_section',
  'default'    => '',
  'sanitize_callback'=> 'esc_url_raw',
  'priority'   => 10,
) );

// RSS URL
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'text',
  'settings'   => 'social_rss',
  'label'      => esc_html__( 'RSS URL', 'fmi' ),
  'section'    => 'social_section',
  'default'    => '',
  'sanitize_callback'=> 'esc_url_raw',
  'priority'   => 10,
) );

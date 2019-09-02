<?php
/**
* Post options
*
* @package BestWP WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function bestwp_post_options($wp_customize) {

    $wp_customize->add_section( 'sc_bestwp_posts', array( 'title' => esc_html__( 'Post Options', 'bestwp' ), 'panel' => 'bestwp_main_options_panel', 'priority' => 260 ) );

    $wp_customize->add_setting( 'bestwp_options[hide_posts_heading]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'bestwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'bestwp_hide_posts_heading_control', array( 'label' => esc_html__( 'Hide HomePage Posts Heading', 'bestwp' ), 'section' => 'sc_bestwp_posts', 'settings' => 'bestwp_options[hide_posts_heading]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'bestwp_options[posts_heading]', array( 'default' => esc_html__( 'Recent Posts', 'bestwp' ), 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field', ) );

    $wp_customize->add_control( 'bestwp_posts_heading_control', array( 'label' => esc_html__( 'HomePage Posts Heading', 'bestwp' ), 'section' => 'sc_bestwp_posts', 'settings' => 'bestwp_options[posts_heading]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'bestwp_options[thumbnail_link]', array( 'default' => 'yes', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'bestwp_sanitize_thumbnail_link' ) );

    $wp_customize->add_control( 'bestwp_thumbnail_link_control', array( 'label' => esc_html__( 'Thumbnail Link', 'bestwp' ), 'description' => esc_html__('Do you want single post thumbnail to be linked to their post?', 'bestwp'), 'section' => 'sc_bestwp_posts', 'settings' => 'bestwp_options[thumbnail_link]', 'type' => 'select', 'choices' => array( 'yes' => esc_html__('Yes', 'bestwp'), 'no' => esc_html__('No', 'bestwp') ) ) );

    $wp_customize->add_setting( 'bestwp_options[post_style]', array( 'default' => 'style-4', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'bestwp_sanitize_post_style' ) );

    $wp_customize->add_control( 'bestwp_post_style_control', array( 'label' => esc_html__( 'Non-Singular Posts Style', 'bestwp' ), 'description' => esc_html__('Select the post style you want for home/categories/tags/archive/search-results pages.', 'bestwp'), 'section' => 'sc_bestwp_posts', 'settings' => 'bestwp_options[post_style]', 'type' => 'select', 'choices' => array( 'style-4' => esc_html__('Style 4', 'bestwp'), 'style-9' => esc_html__('Style 9', 'bestwp') ) ) );

    $wp_customize->add_setting( 'bestwp_options[read_more_length]', array( 'default' => 25, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'bestwp_sanitize_read_more_length' ) );

    $wp_customize->add_control( 'bestwp_read_more_length_control', array( 'label' => esc_html__( 'Auto Post Summary Length', 'bestwp' ), 'description' => esc_html__('Enter the number of words need to display in the post summary. Default is 25 words.', 'bestwp'), 'section' => 'sc_bestwp_posts', 'settings' => 'bestwp_options[read_more_length]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[read_more_text]', array( 'default' => esc_html__( 'Continue Reading', 'bestwp' ), 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field', ) );

    $wp_customize->add_control( 'bestwp_read_more_text_control', array( 'label' => esc_html__( 'Read More Text', 'bestwp' ), 'section' => 'sc_bestwp_posts', 'settings' => 'bestwp_options[read_more_text]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'bestwp_options[hide_posted_date_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'bestwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'bestwp_hide_posted_date_home_control', array( 'label' => esc_html__( 'Hide Posted Date from Posts Summaries', 'bestwp' ), 'section' => 'sc_bestwp_posts', 'settings' => 'bestwp_options[hide_posted_date_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'bestwp_options[hide_posted_date]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'bestwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'bestwp_hide_posted_date_control', array( 'label' => esc_html__( 'Hide Posted Date from Single Posts', 'bestwp' ), 'section' => 'sc_bestwp_posts', 'settings' => 'bestwp_options[hide_posted_date]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'bestwp_options[hide_post_author_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'bestwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'bestwp_hide_post_author_home_control', array( 'label' => esc_html__( 'Hide Post Author from Posts Summaries', 'bestwp' ), 'section' => 'sc_bestwp_posts', 'settings' => 'bestwp_options[hide_post_author_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'bestwp_options[hide_post_author]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'bestwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'bestwp_hide_post_author_control', array( 'label' => esc_html__( 'Hide Post Author from Single Posts', 'bestwp' ), 'section' => 'sc_bestwp_posts', 'settings' => 'bestwp_options[hide_post_author]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'bestwp_options[hide_post_categories_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'bestwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'bestwp_hide_post_categories_home_control', array( 'label' => esc_html__( 'Hide Post Categories from Posts Summaries', 'bestwp' ), 'section' => 'sc_bestwp_posts', 'settings' => 'bestwp_options[hide_post_categories_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'bestwp_options[hide_post_categories]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'bestwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'bestwp_hide_post_categories_control', array( 'label' => esc_html__( 'Hide Post Categories from Single Posts', 'bestwp' ), 'section' => 'sc_bestwp_posts', 'settings' => 'bestwp_options[hide_post_categories]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'bestwp_options[hide_post_tags_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'bestwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'bestwp_hide_post_tags_home_control', array( 'label' => esc_html__( 'Hide Post Tags from Posts Summaries', 'bestwp' ), 'section' => 'sc_bestwp_posts', 'settings' => 'bestwp_options[hide_post_tags_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'bestwp_options[hide_post_tags]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'bestwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'bestwp_hide_post_tags_control', array( 'label' => esc_html__( 'Hide Post Tags from Single Posts', 'bestwp' ), 'section' => 'sc_bestwp_posts', 'settings' => 'bestwp_options[hide_post_tags]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'bestwp_options[hide_comments_link_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'bestwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'bestwp_hide_comments_link_home_control', array( 'label' => esc_html__( 'Hide Comment Link from Posts Summaries', 'bestwp' ), 'section' => 'sc_bestwp_posts', 'settings' => 'bestwp_options[hide_comments_link_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'bestwp_options[hide_comments_link]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'bestwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'bestwp_hide_comments_link_control', array( 'label' => esc_html__( 'Hide Comment Link from Single Posts', 'bestwp' ), 'section' => 'sc_bestwp_posts', 'settings' => 'bestwp_options[hide_comments_link]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'bestwp_options[hide_post_edit]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'bestwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'bestwp_hide_post_edit_control', array( 'label' => esc_html__( 'Hide Post Edit Link', 'bestwp' ), 'section' => 'sc_bestwp_posts', 'settings' => 'bestwp_options[hide_post_edit]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'bestwp_options[hide_thumbnail]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'bestwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'bestwp_hide_thumbnail_control', array( 'label' => esc_html__( 'Hide Thumbnails from Every Page', 'bestwp' ), 'section' => 'sc_bestwp_posts', 'settings' => 'bestwp_options[hide_thumbnail]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'bestwp_options[hide_thumbnail_single]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'bestwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'bestwp_hide_thumbnail_single_control', array( 'label' => esc_html__( 'Hide Thumbnails from Posts/Pages', 'bestwp' ), 'section' => 'sc_bestwp_posts', 'settings' => 'bestwp_options[hide_thumbnail_single]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'bestwp_options[hide_post_snippet]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'bestwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'bestwp_hide_post_snippet_control', array( 'label' => esc_html__( 'Hide Post Snippet', 'bestwp' ), 'section' => 'sc_bestwp_posts', 'settings' => 'bestwp_options[hide_post_snippet]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'bestwp_options[hide_read_more_button]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'bestwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'bestwp_hide_read_more_button_control', array( 'label' => esc_html__( 'Hide Read More Button', 'bestwp' ), 'section' => 'sc_bestwp_posts', 'settings' => 'bestwp_options[hide_read_more_button]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'bestwp_options[hide_author_bio_box]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'bestwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'bestwp_hide_author_bio_box_control', array( 'label' => esc_html__( 'Hide Author Bio Box', 'bestwp' ), 'section' => 'sc_bestwp_posts', 'settings' => 'bestwp_options[hide_author_bio_box]', 'type' => 'checkbox', ) );

}
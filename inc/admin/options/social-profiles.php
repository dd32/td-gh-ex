<?php
/**
* Social profiles options
*
* @package BestWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function bestwp_social_profiles($wp_customize) {

    $wp_customize->add_section( 'sc_bestwp_sociallinks', array( 'title' => esc_html__( 'Social Links', 'bestwp' ), 'panel' => 'bestwp_main_options_panel', 'priority' => 400, ));

    $wp_customize->add_setting( 'bestwp_options[hide_header_social_buttons]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'bestwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'bestwp_hide_header_social_buttons_control', array( 'label' => esc_html__( 'Hide Header Social Buttons', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[hide_header_social_buttons]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'bestwp_options[twitterlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'bestwp_twitterlink_control', array( 'label' => esc_html__( 'Twitter URL', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[twitterlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[facebooklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'bestwp_facebooklink_control', array( 'label' => esc_html__( 'Facebook URL', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[facebooklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[googlelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) ); 

    $wp_customize->add_control( 'bestwp_googlelink_control', array( 'label' => esc_html__( 'Google Plus URL', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[googlelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[pinterestlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'bestwp_pinterestlink_control', array( 'label' => esc_html__( 'Pinterest URL', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[pinterestlink]', 'type' => 'text' ) );
    
    $wp_customize->add_setting( 'bestwp_options[linkedinlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'bestwp_linkedinlink_control', array( 'label' => esc_html__( 'Linkedin Link', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[linkedinlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[instagramlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'bestwp_instagramlink_control', array( 'label' => esc_html__( 'Instagram Link', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[instagramlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[vklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'bestwp_vklink_control', array( 'label' => esc_html__( 'VK Link', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[vklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[flickrlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'bestwp_flickrlink_control', array( 'label' => esc_html__( 'Flickr Link', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[flickrlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[youtubelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'bestwp_youtubelink_control', array( 'label' => esc_html__( 'Youtube URL', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[youtubelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[vimeolink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'bestwp_vimeolink_control', array( 'label' => esc_html__( 'Vimeo URL', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[vimeolink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[soundcloudlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'bestwp_soundcloudlink_control', array( 'label' => esc_html__( 'Soundcloud URL', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[soundcloudlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[lastfmlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'bestwp_lastfmlink_control', array( 'label' => esc_html__( 'Lastfm URL', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[lastfmlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[githublink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'bestwp_githublink_control', array( 'label' => esc_html__( 'Github URL', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[githublink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[bitbucketlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'bestwp_bitbucketlink_control', array( 'label' => esc_html__( 'Bitbucket URL', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[bitbucketlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[tumblrlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'bestwp_tumblrlink_control', array( 'label' => esc_html__( 'Tumblr URL', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[tumblrlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[digglink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'bestwp_digglink_control', array( 'label' => esc_html__( 'Digg URL', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[digglink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[deliciouslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'bestwp_deliciouslink_control', array( 'label' => esc_html__( 'Delicious URL', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[deliciouslink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[stumblelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'bestwp_stumblelink_control', array( 'label' => esc_html__( 'Stumbleupon Link', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[stumblelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[redditlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'bestwp_redditlink_control', array( 'label' => esc_html__( 'Reddit Link', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[redditlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[dribbblelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'bestwp_dribbblelink_control', array( 'label' => esc_html__( 'Dribbble Link', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[dribbblelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[behancelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'bestwp_behancelink_control', array( 'label' => esc_html__( 'Behance Link', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[behancelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[codepenlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'bestwp_codepenlink_control', array( 'label' => esc_html__( 'Codepen Link', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[codepenlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[jsfiddlelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'bestwp_jsfiddlelink_control', array( 'label' => esc_html__( 'JSFiddle Link', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[jsfiddlelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[stackoverflowlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'bestwp_stackoverflowlink_control', array( 'label' => esc_html__( 'Stack Overflow Link', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[stackoverflowlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[stackexchangelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'bestwp_stackexchangelink_control', array( 'label' => esc_html__( 'Stack Exchange Link', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[stackexchangelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[bsalink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'bestwp_bsalink_control', array( 'label' => esc_html__( 'BuySellAds Link', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[bsalink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[slidesharelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'bestwp_slidesharelink_control', array( 'label' => esc_html__( 'SlideShare Link', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[slidesharelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[skypeusername]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ) );

    $wp_customize->add_control( 'bestwp_skypeusername_control', array( 'label' => esc_html__( 'Skype Username', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[skypeusername]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[emailaddress]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'bestwp_sanitize_email' ) );

    $wp_customize->add_control( 'bestwp_emailaddress_control', array( 'label' => esc_html__( 'Email Address', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[emailaddress]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'bestwp_options[rsslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'bestwp_rsslink_control', array( 'label' => esc_html__( 'RSS Feed URL', 'bestwp' ), 'section' => 'sc_bestwp_sociallinks', 'settings' => 'bestwp_options[rsslink]', 'type' => 'text' ) );

}
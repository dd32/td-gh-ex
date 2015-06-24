<?php
/**
 * Customizer Options
 *
 * @package Theme-Vision
 * @subpackage Agama
 * @since Agama 1.0
 */
 
/**
 * Define Customizer Settings, Controls etc...
 *
 * @since Agama 1.0
 */
function agama_customize_register( $wp_customize ) {
	
	// Register postMessage support
	// Add postMessage support for site title and description for the Customizer.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	// General section
	$wp_customize->add_section( 'agama_general_section', array(
		'title'		=> __( 'General Settings', 'agama' ),
		'priority'	=> 30,
	) );
	
	// NiceScroll - setting
	$wp_customize->add_setting( 'agama_nicescroll', array(
		'default'			=> '1',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_key'
	) );
	
	// NiceScroll - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'agama_nicescroll', array(
		'label'			=> __( 'NiceScroll', 'agama' ),
		'description'	=> __( 'Enable NiceScroll ?', 'agama' ),
		'section'		=> 'agama_general_section',
		'settings'		=> 'agama_nicescroll',
		'type'			=> 'checkbox'
	) ) );
	
	// Header section
	$wp_customize->add_section( 'agama_header_section', array(
		'title'		=> __( 'Header', 'agama' ),
		'priority'  => 30,
	) );
	
	// Top navigation, enable / disable setting
	$wp_customize->add_setting( 'agama_top_navigation', array(
		'default'			=> 1,
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'postMessage',
		'sanitize_callback'	=> 'sanitize_key'
	) );
	
	// Top navigation enable / disable control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'agama_top_navigation', array(
		'label' 		=> __( 'Enable Top Navigation', 'agama' ),
		'description'	=> __( 'Works with normal header only.', 'agama' ),
		'section'		=> 'agama_header_section',
		'settings'		=> 'agama_top_navigation',
		'type'			=> 'checkbox',
		'priority'		=> 1,
	) ) );
	
	// Sticky header - setting
	$wp_customize->add_setting( 'agama_sticky_header', array(
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_key'
	) );
	
	// Sticky header - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'agama_sticky_header', array(
		'label'			=> __( 'Sticky Header', 'agama' ),
		'description'	=> __( 'Enable sticky header ?', 'agama' ),
		'section'		=> 'agama_header_section',
		'settings'		=> 'agama_sticky_header',
		'type'			=> 'checkbox'
	) ) );
	
	// Header top margin setting
	$wp_customize->add_setting( 'agama_header_top_margin', array(
		'default' 			=> '0px',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'postMessage',
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	
	// Header top margin control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'agama_header_top_margin', array(
		'label'			=> __( 'Top Margin', 'agama' ),
		'description'	=> __( 'If sticky header enabled margin will be 0px!', 'agama' ),
		'section'		=> 'agama_header_section',
		'settings'		=> 'agama_header_top_margin',
		'type'			=> 'select',
		'choices'		=> array(
			'0px' 		=> '0px',
			'1px' 		=> '1px',
			'2px'		=> '2px',
			'3px'		=> '3px',
			'4px'		=> '4px',
			'5px'		=> '5px',
			'10px'		=> '10px',
			'15px'		=> '15px',
			'20px'		=> '20px',
			'25px'		=> '25px',
			'50px'		=> '50px',
			'100px'		=> '100px'
		)
	) ) );
	
	// Header top border size
	$wp_customize->add_setting( 'agama_header_top_border_size', array(
		'default' 			=> '3px',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'postMessage',
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	
	// Header top border size control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'agama_header_top_border_size', array(
		'label'		=> __( 'Top Border Size', 'agama' ),
		'section'	=> 'agama_header_section',
		'settings'	=> 'agama_header_top_border_size',
		'type'		=> 'select',
		'choices'	=> array(
			'1px'	=> '1px',
			'2px'	=> '2px',
			'3px'	=> '3px',
			'4px'	=> '4px',
			'5px'	=> '5px',
			'6px'	=> '6px',
			'7px'	=> '7px',
			'8px'	=> '8px',
			'9px'	=> '9px',
			'10px'	=> '10px'
		)
	) ) );
	
	// Logo section
	$wp_customize->add_section( 'agama_logo_section', array(
		'title'		=> __( 'Logo', 'agama' ),
		'priority'  => 30,
	) );
	
	// Upload new logo setting
	$wp_customize->add_setting( 'agama_logo', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw',
	) );
	
	// Upload new logo control
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'agama_logo', array(
		'label'		=> __( 'Upload Logo', 'agama' ),
		'section'	=> 'agama_logo_section',
		'settings'	=> 'agama_logo',
		'context'	=> '',
		'priority'	=> 1,
	) ) );
	
	// Agama primary color setting
	$wp_customize->add_setting( 'agama_primary_color', array(
		'default'			=> '#f7a805',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	// Agama primary color control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'agama_primary_color', array(
		'label'		=> __( 'Agama Primary Color', 'agama' ),
		'section'	=> 'colors',
		'settings'	=> 'agama_primary_color'
	) ) );
	
	// Agama skin setting
	$wp_customize->add_setting( 'agama_skin', array(
		'default'			=> 'light',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	
	// Agama skin control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'agama_skin', array(
		'label'		=> __( 'Skin', 'agama' ),
		'section'	=> 'colors',
		'settings'	=> 'agama_skin',
		'type'		=> 'select',
		'choices'	=> array(
			'light' => __( 'Light', 'agama' ),
			'dark'	=> __( 'Dark', 'agama' )
		)
	) ) );
	
	// Social icons section
	$wp_customize->add_section( 'agama_social_icons_section', array(
		'title'		=> __( 'Social Icons', 'agama' ),
		'priority'	=> 40,
	) );
	
	// Enable social icons in top navigation - setting
	$wp_customize->add_setting( 'agama_top_nav_social', array(
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback' => 'sanitize_key'
	) );
	
	// Enable social icons in top navigation - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'agama_top_nav_social', array(
		'label'		=> __( 'Enable social icons in top nav ?', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'agama_top_nav_social',
		'type'		=> 'checkbox',
	) ) );
	
	// Enable social icons in footer - setting
	$wp_customize->add_setting( 'agama_footer_social', array(
		'default'			=> 0,
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback' => 'sanitize_key'
	) );
	
	// Enable social icons in footer - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'agama_footer_social', array(
		'label'		=> __( 'Enable social icons in footer ?', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'agama_footer_social',
		'type'		=> 'checkbox',
	) ) );
	
	// Social icons URL target - setting
	$wp_customize->add_setting( 'agama_social_url_target', array(
		'default'			=> '_self',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	
	// Social icons URL target - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'agama_social_url_target', array(
		'label'		=> __( 'Icons URL Target', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'agama_social_url_target',
		'type'		=> 'select',
		'choices'	=> array(
			'_self' => '_self',
			'_blank'=> '_blank'
		)
	) ) );
	
	// Social icon Facebook - setting
	$wp_customize->add_setting( 'social_facebook', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Social icon Facebook - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_facebook', array(
		'label'		=> __( 'Facebook URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_facebook',
		'type'		=> 'text',
	) ) );
	
	// Social icon Twitter - setting
	$wp_customize->add_setting( 'social_twitter', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Social icon Twitter - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_twitter', array(
		'label'		=> __( 'Twitter URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_twitter',
		'type'		=> 'text',
	) ) );
	
	// Social icon Flickr - setting
	$wp_customize->add_setting( 'social_flickr', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Social icon Flickr - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_flickr', array(
		'label'		=> __( 'Flickr URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_flickr',
		'type'		=> 'text',
	) ) );
	
	// Social icon RSS - setting
	$wp_customize->add_setting( 'social_rss', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Social icon RSS - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_rss', array(
		'label'		=> __( 'RSS URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_rss',
		'type'		=> 'text',
	) ) );
	
	// Social icon Vimeo - setting
	$wp_customize->add_setting( 'social_vimeo', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Social icon Vimeo - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_vimeo', array(
		'label'		=> __( 'Vimeo URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_vimeo',
		'type'		=> 'text',
	) ) );
	
	// Social icon Youtube - setting
	$wp_customize->add_setting( 'social_youtube', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Social icon Youtube - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_youtube', array(
		'label'		=> __( 'Youtube URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_youtube',
		'type'		=> 'text',
	) ) );
	
	// Social icon Instagram - setting
	$wp_customize->add_setting( 'social_instagram', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Social icon Instagram - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_instagram', array(
		'label'		=> __( 'Instagram URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_instagram',
		'type'		=> 'text',
	) ) );
	
	// Social icon Pinterest - setting
	$wp_customize->add_setting( 'social_pinterest', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Social icon Pinterest - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_pinterest', array(
		'label'		=> __( 'Pinterest URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_pinterest',
		'type'		=> 'text',
	) ) );
	
	// Social icon Tumblr - setting
	$wp_customize->add_setting( 'social_tumblr', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Social icon Tumblr - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_tumblr', array(
		'label'		=> __( 'Tumblr URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_tumblr',
		'type'		=> 'text',
	) ) );
	
	// Social icon Google+ - setting
	$wp_customize->add_setting( 'social_google', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Social icon Google+ - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_google', array(
		'label'		=> __( 'Google+ URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_google',
		'type'		=> 'text',
	) ) );
	
	// Social icon Dribbble - setting
	$wp_customize->add_setting( 'social_dribbble', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Social icon Dribbble - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_dribbble', array(
		'label'		=> __( 'Dribbble URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_dribbble',
		'type'		=> 'text',
	) ) );
	
	// Social icon Digg - setting
	$wp_customize->add_setting( 'social_digg', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Social icon Digg - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_digg', array(
		'label'		=> __( 'Digg URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_digg',
		'type'		=> 'text',
	) ) );
	
	// Social icon Linkedin - setting
	$wp_customize->add_setting( 'social_linkedin', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Social icon Linkedin - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_linkedin', array(
		'label'		=> __( 'Linkedin URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_linkedin',
		'type'		=> 'text',
	) ) );
	
	// Social icon Blogger - setting
	$wp_customize->add_setting( 'social_blogger', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Social icon Blogger - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_blogger', array(
		'label'		=> __( 'Blogger URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_blogger',
		'type'		=> 'text',
	) ) );
	
	// Social icon Skype - setting
	$wp_customize->add_setting( 'social_skype', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Social icon Skype - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_skype', array(
		'label'		=> __( 'Skype URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_skype',
		'type'		=> 'text',
	) ) );
	
	// Social icon Forrst - setting
	$wp_customize->add_setting( 'social_forrst', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Social icon Forrst - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_forrst', array(
		'label'		=> __( 'Forrst URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_forrst',
		'type'		=> 'text',
	) ) );
	
	// Social icon Myspace - setting
	$wp_customize->add_setting( 'social_myspace', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Social icon Myspace - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_myspace', array(
		'label'		=> __( 'Myspace URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_myspace',
		'type'		=> 'text',
	) ) );
	
	// Social icon Deviantart - setting
	$wp_customize->add_setting( 'social_deviantart', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Social icon Deviantart - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_deviantart', array(
		'label'		=> __( 'Deviantart URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_deviantart',
		'type'		=> 'text',
	) ) );
	
	// Social icon Yahoo - setting
	$wp_customize->add_setting( 'social_yahoo', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Social icon Yahoo - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_yahoo', array(
		'label'		=> __( 'Yahoo URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_yahoo',
		'type'		=> 'text',
	) ) );
	
	// Social icon Reddit - setting
	$wp_customize->add_setting( 'social_reddit', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Social icon Reddit - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_reddit', array(
		'label'		=> __( 'Reddit URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_reddit',
		'type'		=> 'text',
	) ) );
	
	// Social icon PayPal - setting
	$wp_customize->add_setting( 'social_paypal', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Social icon PayPal - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_paypal', array(
		'label'		=> __( 'PayPal URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_paypal',
		'type'		=> 'text',
	) ) );
	
	// Social icon Dropbox - setting
	$wp_customize->add_setting( 'social_dropbox', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Social icon Dropbox - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_dropbox', array(
		'label'		=> __( 'Dropbox URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_dropbox',
		'type'		=> 'text',
	) ) );
	
	// Social icon Soundcloud - setting
	$wp_customize->add_setting( 'social_soundcloud', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Social icon Soundcloud - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_soundcloud', array(
		'label'		=> __( 'Soundcloud URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_soundcloud',
		'type'		=> 'text',
	) ) );
	
	// Social icon VK - setting
	$wp_customize->add_setting( 'social_vk', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Social icon VK - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_vk', array(
		'label'		=> __( 'VK URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_vk',
		'type'		=> 'text',
	) ) );
	
	// Social icon Email - setting
	$wp_customize->add_setting( 'social_email', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Social icon Email - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_email', array(
		'label'		=> __( 'Email URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_email',
		'type'		=> 'text',
	) ) );
	
	// Agama slider section
	$wp_customize->add_section( 'agama_slider_section', array(
		'title'		=> __( 'Slider', 'agama' ),
		'priority'	=> 40,
	) );
	
	// Enable slider setting
	$wp_customize->add_setting( 'agama_enable_slider', array(
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	
	// Enable slider control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'agama_enable_slider', array(
		'label'		=> __( 'Enable Slider', 'agama' ),
		'section'	=> 'agama_slider_section',
		'settings'	=> 'agama_enable_slider',
		'type'		=> 'checkbox'
	) ) );
	
	// Slider max-height setting
	$wp_customize->add_setting( 'flex_max_height', array(
		'default'			=> '400px',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	
	// Slider max-height control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'flex_max_height', array(
		'label'		=> __( 'Slider max-height', 'agama' ),
		'section'	=> 'agama_slider_section',
		'settings'	=> 'flex_max_height'
	) ) );
	
	// Agama slide 1 title setting
	$wp_customize->add_setting( 'agama_slide_1_title', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	
	// Agama slide 1 title control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'agama_slide_1_title', array(
		'label'			=> __( 'Image 1 Title', 'agama' ),
		'description'	=> __( 'Enter image 1 title.', 'agama' ),
		'section'		=> 'agama_slider_section',
		'settings'		=> 'agama_slide_1_title',
		'type'			=> 'text'
	) ) );
	
	// Agama slide 1 setting
	$wp_customize->add_setting( 'agama_slide_1', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Agama slide 1 control
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'agama_slide_1', array(
		'label'		=> __( 'Upload Image #1', 'agama' ),
		'section'	=> 'agama_slider_section',
		'settings'	=> 'agama_slide_1',
	) ) );
	
	// Agama slide 2 title setting
	$wp_customize->add_setting( 'agama_slide_2_title', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	
	// Agama slide 2 title control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'agama_slide_2_title', array(
		'label'			=> __( 'Image 2 Title', 'agama' ),
		'description'	=> __( 'Enter image 2 title.', 'agama' ),
		'section'		=> 'agama_slider_section',
		'settings'		=> 'agama_slide_2_title',
		'type'			=> 'text'
	) ) );
	
	// Agama slide 2 setting
	$wp_customize->add_setting( 'agama_slide_2', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Agama slide 2 control
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'agama_slide_2', array(
		'label'		=> __( 'Upload Image #2', 'agama' ),
		'section'	=> 'agama_slider_section',
		'settings'	=> 'agama_slide_2',
	) ) );
	
	// Agama slide 3 title setting
	$wp_customize->add_setting( 'agama_slide_3_title', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	
	// Agama slide 3 title control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'agama_slide_3_title', array(
		'label'			=> __( 'Image 3 Title', 'agama' ),
		'description'	=> __( 'Enter image 3 title.', 'agama' ),
		'section'		=> 'agama_slider_section',
		'settings'		=> 'agama_slide_3_title',
		'type'			=> 'text'
	) ) );
	
	// Agama slide 3 setting
	$wp_customize->add_setting( 'agama_slide_3', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Agama slide 3 control
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'agama_slide_3', array(
		'label'		=> __( 'Upload Image #3', 'agama' ),
		'section'	=> 'agama_slider_section',
		'settings'	=> 'agama_slide_3',
	) ) );
	
	// Agama slide 4 title setting
	$wp_customize->add_setting( 'agama_slide_4_title', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	
	// Agama slide 4 title control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'agama_slide_4_title', array(
		'label'			=> __( 'Image 4 Title', 'agama' ),
		'description'	=> __( 'Enter image 4 title.', 'agama' ),
		'section'		=> 'agama_slider_section',
		'settings'		=> 'agama_slide_4_title',
		'type'			=> 'text'
	) ) );
	
	// Agama slide 4 setting
	$wp_customize->add_setting( 'agama_slide_4', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Agama slide 4 control
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'agama_slide_4', array(
		'label'		=> __( 'Upload Image #4', 'agama' ),
		'section'	=> 'agama_slider_section',
		'settings'	=> 'agama_slide_4',
	) ) );
	
	// Agama slide 5 title setting
	$wp_customize->add_setting( 'agama_slide_5_title', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	
	// Agama slide 5 title control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'agama_slide_5_title', array(
		'label'			=> __( 'Image 5 Title', 'agama' ),
		'description'	=> __( 'Enter image 5 title.', 'agama' ),
		'section'		=> 'agama_slider_section',
		'settings'		=> 'agama_slide_5_title',
		'type'			=> 'text'
	) ) );
	
	// Agama slide 5 setting
	$wp_customize->add_setting( 'agama_slide_5', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	// Agama slide 5 control
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'agama_slide_5', array(
		'label'		=> __( 'Upload Image #5', 'agama' ),
		'section'	=> 'agama_slider_section',
		'settings'	=> 'agama_slide_5',
	) ) );
	
	// Agama blog section
	$wp_customize->add_section( 'agama_blog_section', array(
		'title'		=> __( 'Blog', 'agama' ),
		'priority' 	=> 40,
	) );
	
	// Infinite scroll setting
	$wp_customize->add_setting( 'agama_blog_infinite_scroll', array(
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	
	// Infinite scroll control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'agama_blog_infinite_scroll', array(
		'label'		=> __( 'Enable Infinite Scroll ?', 'agama' ),
		'section'	=> 'agama_blog_section',
		'settings'	=> 'agama_blog_infinite_scroll',
		'type'		=> 'checkbox'
	) ) );
	
	// Blog layout setting
	$wp_customize->add_setting( 'agama_blog_layout', array(
		'default'			=> 'list',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	
	// Blog layout control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'agama_blog_layout', array(
		'label'		=> __( 'Blog Layout', 'agama' ),
		'section'	=> 'agama_blog_section',
		'settings'	=> 'agama_blog_layout',
		'type'		=> 'select',
		'choices'	=> array(
			'list'	=> __( 'List Style', 'agama' ),
			'grid'	=> __( 'Grid Style', 'agama' )
		)
	) ) );
	
	// Blog excerpt lenght setting
	$wp_customize->add_setting( 'agama_blog_excerpt', array(
		'default'			=> 60,
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	
	// Blog excerpt lenght control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'agama_blog_excerpt', array(
		'label'		=> __( 'Blog Excerpt Lenght', 'agama' ),
		'section'	=> 'agama_blog_section',
		'settings'	=> 'agama_blog_excerpt',
		'type'		=> 'select',
		'choices'	=> array(
			'20'	=> 20,
			'40'	=> 40,
			'60'	=> 60,
			'80'	=> 80,
			'100'	=> 100,
			'120'	=> 120,
			'140'	=> 140,
			'160'	=> 160,
			'180'	=> 180,
			'200'	=> 200
		)
	) ) );
	
	// Rename default customizer "Background Image" section
	$wp_customize->add_section( 'background_image', array(
		'title'		=> __( 'Body Background', 'agama' ),
		'priority'	=> 0,
	) );
	
	// WooCommerce section
	$wp_customize->add_section( 'agama_woocommerce', array(
		'title'		=> __( 'WooCommerce', 'agama' ),
		'priority'	=> 60,
	) );
	
	// Products per page setting
	$wp_customize->add_setting( 'agama_products_per_page', array(
		'default'			=> '12',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'esc_attr'
	) );
	
	// Products per page control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'agama_products_per_page', array(
		'label'		=> __( 'Products per Page', 'agama' ),
		'section'	=> 'agama_woocommerce',
		'settings'	=> 'agama_products_per_page',
		'type'		=> 'text'
	) ) );
	
	// Agama footer - section
	$wp_customize->add_section( 'agama_footer_section', array(
		'title'		=> __( 'Footer', 'agama' ),
		'priority'	=> 60,
	) );
	
	// Back to top - setting
	$wp_customize->add_setting( 'agama_to_top', array(
		'default'			=> true,
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_key'
	) );
	
	// Back to top - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'agama_to_top', array(
		'label'			=> __( 'Back to Top', 'agama' ),
		'description'	=> __( 'Enable back to top button ?', 'agama' ),
		'section'		=> 'agama_footer_section',
		'settings'		=> 'agama_to_top',
		'type'			=> 'checkbox'
	) ) );
	
	// Agama footer copyright - setting
	$wp_customize->add_setting( 'agama_footer_copyright', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'esc_textarea'
	) );
	
	// Agama footer copyright - control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'agama_footer_copyright', array(
		'label'			=> __( 'Footer Copyright', 'agama' ),
		'description'	=> __( 'Write your own footer copyright.', 'agama' ),
		'section'		=> 'agama_footer_section',
		'settings'		=> 'agama_footer_copyright',
		'type'			=> 'textarea',
	) ) );
}
add_action( 'customize_register', 'agama_customize_register' );

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Agama 1.0
 */
function agama_customize_preview_js() {
	wp_register_script( 'agama-customizer', get_template_directory_uri() . '/assets/js/theme-customizer.js', array( 'customize-preview' ), uniqid(), true );
	$localize = array(
		'skin_url' 			=> esc_url( get_stylesheet_directory_uri() . '/assets/css/skins/' ),
		'top_nav_enable'	=> esc_attr( get_theme_mod( 'agama_top_navigation', true ) )
	);
	wp_localize_script( 'agama-customizer', 'agama', $localize );
	wp_enqueue_script( 'agama-customizer' );
}
add_action( 'customize_preview_init', 'agama_customize_preview_js' );

/**
 * Generating Live CSS
 *
 * @since Agama 1.0
 */
function agama_customize_css() 
{ global $Agama; ?>
	<style type="text/css" id="agama-customize-css"> 
	a:hover,
	.site-header h1 a:hover, 
	.site-header h2 a:hover,
	.list-style .entry-content .entry-title a:hover,
	.entry-content a:hover, .comment-content a:hover,
	a.comment-reply-link:hover, 
	a.comment-edit-link:hover,
	.comments-area article header a:hover,
	.widget-area .widget a:hover,
	.comments-link a:hover, 
	.entry-meta a:hover,
	.format-status .entry-header header a:hover,
	footer[role="contentinfo"] a:hover {
		color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#f7a805' ) ); ?>; 
	}
	.site-header .logo {
		max-height: 100px;
	}
	.sticky-header .logo {
		max-height: 90px;
	}
	.sticky-header-shrink .logo {
		max-height: 65px;
	}
	.search-form .search-table .search-button input[type="submit"]:hover {
		background: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#f7a805' ) ); ?>;
	}
	#main-wrapper {
		margin-top: <?php echo esc_attr( get_theme_mod( 'agama_header_top_margin', '0px' ) ); ?>;
	}
	.sticky-header,
	.top-nav-wrapper { 
		border-top-width: <?php echo esc_attr( get_theme_mod( 'agama_header_top_border_size', '3px' ) ); ?>; 
		border-top-color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#f7a805' ) ); ?>;
		border-top-style: solid;
	}
	<?php if( get_theme_mod('agama_sticky_header', false) && get_theme_mod('agama_enable_slider', false) ): ?>
	.site-header {
		margin-bottom: 90px;
	}
	<?php endif; ?>
	
	<?php if( get_theme_mod('agama_sticky_header', false) && get_header_image() ): ?>
	.header-image {
		margin-top: 90px;
	}
	<?php endif; ?>
	.flexslider {
		max-height: <?php echo esc_attr( get_theme_mod('flex_max_height', '400px') ); ?> !important;
		overflow: hidden;
		border: 0 !important;
		margin: 0 !important;
	}
	.sticky-nav > li > ul {
		border-top: 1px solid <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#f7a805' ) ); ?>;
	}
	.sticky-nav > li > ul > li > ul {
		border-right: 1px solid <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#f7a805' ) ); ?>;
	}
	<?php if( get_theme_mod('agama_blog_infinite_scroll', false) && get_theme_mod('agama_blog_layout', 'list') == 'grid' ): ?>
	#infscr-loading {
		position: absolute;
		bottom: 0;
		left: 25%;
	}
	<?php endif; ?>
	.entry-date .date-box {
		background-color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#f7a805' ) ); ?>;
	}
	.entry-date .format-box i {
		color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#f7a805' ) ); ?>;
	}
	.blog figure.effect-bubba, 
	.agama-portfolio figure.effect-bubba {
		background-color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#f7a805' ) ); ?>;
	}
	.vision_tabs #tabs li.active a {
		border-top: 3px solid <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#f7a805' ) ); ?>;
	}
	#toTop:hover {
		background-color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#f7a805' ) ); ?>;
	}
	</style>
	<?php
}
add_action( 'wp_head', 'agama_customize_css' );
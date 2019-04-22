<?php
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Theme Customizer
 *
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 */
function baw_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'baw_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'baw_customize_partial_blogdescription',
		) );
	}

/**
 * Sanitize
 */
 
	function baw_sanitize_checkbox( $input ) {
		if ( $input ) {
			return 1;
		}
		return 0;
	}
	
	function header_sanitize_position( $input ) {
		$valid = array(
			'center' => esc_attr__( 'center center', 'baw' ),
			'real' => esc_attr__( 'Real Size (Deactivate the image height.)', 'baw' ),
		);
		
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}
			
	function header_sanitize_show( $input ) {
		$valid = array(
				'' => esc_attr__( 'Default', 'baw' ),
				'all' => esc_attr__( 'All Pages', 'baw' ),
				'home' => esc_attr__( 'Home Page', 'baw' ),
		);
		
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}

/********************************************
* Breadcrumb
*********************************************/ 
		
		$wp_customize->add_section( 'baw_breadcrumb' , array(
			'title'       => __( 'Breadcrumb', 'baw' ),
			'priority'		=> 70,
		) );
				
		$wp_customize->add_setting( 'baw_home_activate_breadcrumb', array (
			'sanitize_callback'	=> 'baw_sanitize_checkbox',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'baw_home_activate_breadcrumb', array(
			'label'    => __( 'Activate Breadcrumb', 'baw' ),
			'section'  => 'baw_breadcrumb',
			'settings' => 'baw_home_activate_breadcrumb',
			'type'     =>  'checkbox',
		) ) );		
	
/**
 * Header Image
 */	
 		$wp_customize->add_setting( 'header_image_show', array (
			'sanitize_callback' => 'header_sanitize_show',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_image_show', array(
			'label'    => __( 'Activate Header Image', 'baw' ),
			'section'  => 'header_image',		
			'settings' => 'header_image_show',
			'type'     =>  'select',
			'priority'    => 1,			
            'choices'  => array(
				'' => esc_attr__( 'Default', 'baw' ),
				'all' => esc_attr__( 'All Pages', 'baw' ),
				'home' => esc_attr__( 'Home Page', 'baw' ),
            ),
			'default'  => 'all'	
		) ) );
		
		$wp_customize->add_setting( 'header_image_height', array (
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_image_height', array(
			'section'  => 'header_image',
			'priority'    => 1,
			'settings' => 'header_image_height',
			'label'       => __( 'Image Height', 'baw' ),			
			'type'     =>  'number',
			'input_attrs'     => array(
				'min'  => 200,
				'max'  => 1000,
				'step' => 1,
			),
		) ) );
		
		$wp_customize->add_setting( 'header_image_position', array (
			'sanitize_callback' => 'header_sanitize_position',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_image_position', array(
			'label'    => __( 'Image Position', 'baw' ),
			'section'  => 'header_image',		
			'settings' => 'header_image_position',
			'type'     =>  'select',
			'priority'    => 2,			
            'choices'  => array(
				'center' => esc_attr__( 'Background Cover (center center)', 'baw' ),
				'real' => esc_attr__( 'Real Size (Deactivate the image height.)', 'baw' ),
            ),
			'default'  => 'real'	
		) ) );

		$wp_customize->add_setting( 'baw_header_shadow', array (
            'default' => '',		
			'sanitize_callback' => 'baw_sanitize_checkbox',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'baw_header_shadow', array(
			'label'    => __( 'Dectivate Image Shadow:', 'baw' ),
			'section'  => 'header_image',
			'priority'    => 3,				
			'settings' => 'baw_header_shadow',
			'type' => 'checkbox',
		) ) );
		
}
add_action( 'customize_register', 'baw_customize_register' );

/**
 * Custom Font Size Styles
 */ 	

function baw_header_position() {
        $header_image_height = get_theme_mod( 'header_image_height' );
        $header_image_position = get_theme_mod( 'header_image_position' );

		if($header_image_height and $header_image_position != 'real') { $header_height = ".header-image {height: {$header_image_height}px !important;}";} else {$header_height ="";}
		if($header_image_position == 'center') { $header_position = ".header-image {background-position: center center !important;}";} else {$header_position ="";}
		if($header_image_position == '50') { $header_position = ".header-image {background-position: 50% 50% !important;}";} else {$header_position ="";}
		if($header_image_position == 'real') { $header_position = ".header-image {background-position: no !important; height: auto;}";} else {$header_position ="";}
	
        wp_add_inline_style( 'black-and-white-style', 
		$header_height.$header_position
		);
}
add_action( 'wp_enqueue_scripts', 'baw_header_position' );	

/**
 * Render the site title for the selective refresh partial.
 */
function baw_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 */
function baw_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function baw_customize_preview_js() {
	wp_enqueue_script( 'black-and-white-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'baw_customize_preview_js' );

/**
 * Kirki Config
 */
function baw_kirki_configuration() {
    return array( 'url_path'     => get_stylesheet_directory_uri() . '/framework/kirki/' );
}
add_filter( 'kirki/config', 'baw_kirki_configuration' );

/**
 * Kirki Customizing - Header Options
 */

Kirki::add_config( 'baw_options', array(
    'option_type' => 'theme_mod',
    'capability'  => 'edit_theme_options'
) );
	
Kirki::add_panel( 'header', array(
    'title'          => __( 'Header Options', 'baw' ),
    'priority'       => 47,
) );

Kirki::add_section( 'baw_header', array(
    'title'          => __( 'Site Branding', 'baw' ),
    'panel'       => 'header',
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
) );


/**
 * Letter Effect
 */
Kirki::add_field( 'baw_options', array(
	'type'        => 'switch',
	'settings'    => 'header_letter',
	'label'       => __( 'Activate Site Branding Letter Effect', 'baw' ),
	'section'     => 'baw_header',
	'default'     => 'on',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_html__( 'On', 'baw' ),
		'' => esc_html__( 'Off', 'baw' ),
	),
) );

/**
 * Header Styles
 */
Kirki::add_field( 'baw_options', array(
	'type'        => 'slider',
	'settings'    => 'site_title_font_size',
	'label'       => esc_html__( 'Site Title Font Size in px.', 'baw' ),
	'section'     => 'baw_header',
	'choices'     => array(
		'min'  => '0',
		'max'  => '100',
		'step' => '1',
	),
	'default'  => '60',
) );

Kirki::add_field( 'baw_options', array(
	'type'        => 'slider',
	'settings'    => 'site_tagline_font_size',
	'label'       => esc_html__( 'Site Tagline Font Size in px.', 'baw' ),
	'section'     => 'baw_header',
	'choices'     => array(
		'min'  => '0',
		'max'  => '50',
		'step' => '1',
	),
	'default'     => '20',
) );

Kirki::add_field( 'baw_options', array(
	'type'        => 'radio-image',
	'settings'    => 'site_branding_position',
	'label'       => esc_html__( 'Site Branding Position', 'baw' ),
	'section'     => 'baw_header',
	'default'     => '',
	'priority'    => 10,
	'choices'     => array(
		'left'   => get_template_directory_uri() . '/images/p-left.png',
		'center' => get_template_directory_uri() . '/images/p-center.png',
		'right'  => get_template_directory_uri() . '/images/p-right.png',
	),
) );

Kirki::add_field( 'baw_options', array(
	'type'        => 'slider',
	'settings'    => 'site_title_width',
	'label'       => esc_html__( 'Site Branding Width in %', 'baw' ),
	'section'     => 'baw_header',
	'choices'     => array(
		'min'  => '1',
		'max'  => '100',
		'step' => '1',
	),
	'default'     => '80',
) );

Kirki::add_field( 'baw_options', array(
	'type'        => 'slider',
	'settings'    => 'site_title_left_distanc',
	'label'       => esc_html__( 'Site Branding left distance in %.', 'baw' ),
	'section'     => 'baw_header',
	'choices'     => array(
		'min'  => '0',
		'max'  => '100',
		'step' => '1',
	),
	'default'     => '0',
) );
Kirki::add_field( 'baw_options', array(
	'type'        => 'slider',
	'settings'    => 'site_title_top_distanc',
	'label'       => esc_html__( 'Site Branding top distance in %.', 'baw' ),
	'section'     => 'baw_header',
	'choices'     => array(
		'min'  => '20',
		'max'  => '100',
		'step' => '1',
	),
	'default'     => '30',
) );

Kirki::add_field( 'baw_options', array(
	'type'        => 'switch',
	'settings'    => 'header_title_hide',
	'label'       => __( 'Hide Site Title', 'baw' ),
	'section'     => 'baw_header',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_html__( 'On', 'baw' ),
		'' => esc_html__( 'Off', 'baw' ),
	),
	'default'     => '',
) );

Kirki::add_field( 'baw_options', array(
	'type'        => 'switch',
	'settings'    => 'header_tagline_hide',
	'label'       => __( 'Hide Tagline', 'baw' ),
	'section'     => 'baw_header',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_html__( 'On', 'baw' ),
		'' => esc_html__( 'Off', 'baw' ),
	),
	'default'     => '',
) );


/**
 * Before Header
 */
Kirki::add_section( 'baw_before_header', array(
    'title'          => __( 'Before Header', 'baw' ),
    'panel'       => 'header',
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'baw_options', array(
	'type'        => 'switch',
	'settings'    => 'activate_before_header',
	'label'       => esc_html__( 'Activate Section - Before Header.', 'baw' ),
	'section'     => 'baw_before_header',
	'default'     => "",
	'choices'     => array(
		'' => esc_html__( 'Off', 'baw' ),
		'on'  => esc_html__( 'On', 'baw' ),		
	),
) );

Kirki::add_field( 'baw_options', array(
	'type'        => 'color',
	'settings'    => 'before_background_color',
	'label'       => __( 'Bckground Color', 'baw' ),
	'section'     => 'baw_before_header',
	'default'     => '',
) );

Kirki::add_field( 'baw_options', array(
	'type'        => 'color',
	'settings'    => 'before_border_color',
	'label'       => __( 'Border Bottom Color', 'baw' ),
	'section'     => 'baw_before_header',
	'default'     => '',
) );

Kirki::add_field( 'baw_options', array(
	'type'        => 'switch',
	'settings'    => 'activate_search_icon',
	'label'       => esc_html__( 'Activate Search Icon.', 'baw' ),
	'section'     => 'baw_before_header',
	'default'     => "",
	'choices'     => array(
		'on'  => esc_html__( 'On', 'baw' ),
		'' => esc_html__( 'Off', 'baw' ),
	),
) );

Kirki::add_field( 'baw_options', array(
	'type'        => 'switch',
	'settings'    => 'activate_my_account',
	'label'       => esc_html__( 'Activate WooCommerce My Account.', 'baw' ),
	'description'	    => esc_attr__( 'Before using woocommerce My Account options you need install WooCommerce. ', 'baw' )."<a target='_blank' href='https://wordpress.org/plugins/woocommerce/'>Download here.</a>",	
	'tooltip'	    => esc_attr__( 'WooCommerce is a free eCommerce plugin that allows you to sell anything, beautifully. Built to integrate seamlessly with WordPress, WooCommerce is the worlds favorite eCommerce solution that gives both store owners and developers complete control.', 'baw' ),
	'section'     => 'baw_before_header',
	'default'     => "",
	'choices'     => array(
		'on'  => esc_html__( 'On', 'baw' ),
		'' => esc_html__( 'Off', 'baw' ),
	),
) );

Kirki::add_field( 'baw_options', array(
	'type'        => 'switch',
	'settings'    => 'activate_woo_cart',
	'label'       => esc_html__( 'Activate WooCommerce Cart.', 'baw' ),
	'description'	    => esc_attr__( 'Before using woocommerce cart options you need install WooCommerce. ', 'baw' )."<a target='_blank' href='https://wordpress.org/plugins/woocommerce/'>Download here.</a>",	
	'tooltip'	    => esc_attr__( 'WooCommerce is a free eCommerce plugin that allows you to sell anything, beautifully. Built to integrate seamlessly with WordPress, WooCommerce is the worlds favorite eCommerce solution that gives both store owners and developers complete control.', 'baw' ),	
	'section'     => 'baw_before_header',
	'default'     => "",
	'choices'     => array(
		'on'  => esc_html__( 'On', 'baw' ),
		'' => esc_html__( 'Off', 'baw' ),
	),
) );

Kirki::add_field( 'baw_options', array(
	'type'     => 'text',
	'settings' => 'header_email',
	'label'    => __( 'E-mail', 'baw' ),
	'section'  => 'baw_before_header',
	'priority' => 10,
) );

Kirki::add_field( 'baw_options', array(
	'type'     => 'text',
	'settings' => 'header_address',
	'label'    => __( 'Address', 'baw' ),
	'section'  => 'baw_before_header',
	'priority' => 10,
) );

Kirki::add_field( 'baw_options', array(
	'type'     => 'text',
	'settings' => 'header_phone',
	'label'    => __( 'Phone', 'baw' ),
	'section'  => 'baw_before_header',
	'priority' => 10,
) );

/**
 *  Sidebar Options
 */
Kirki::add_section( 'baw_sidebar', array(
    'title'          => __( 'Sidebar Options', 'baw' ),
    'priority'       => 61,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'baw_options', array(
	'type'        => 'radio-image',
	'settings'    => 'sidebar_position',
	'label'       => esc_html__( 'Sidebar Position', 'baw' ),
	'section'     => 'baw_sidebar',
	'default'     => 'no',
	'priority'    => 10,
	'choices'     => array(
		'no'   => get_template_directory_uri() . '/images/no.png',
		'left' => get_template_directory_uri() . '/images/left.png',
		'right'  => get_template_directory_uri() . '/images/right.png',
	),
) );
Kirki::add_field( 'baw_options', array(
	'type'        => 'slider',
	'settings'    => 'sidebar_width',
	'label'       => esc_html__( 'Sidebar Width', 'baw' ),
	'section'     => 'baw_sidebar',
	'default'     => "",
	'choices'     => array(
		'min'  => '20',
		'max'  => '50',
		'step' => '1',
	),
) );

/**
 * Colors
 */ 	
Kirki::add_field( 'baw_options', array(
	'type'        => 'color',
	'settings'    => 'baw_link_color',
	'label'       => __( 'Link Color', 'baw' ),
	'section'     => 'colors',
	'default'     => '',
) );

Kirki::add_field( 'baw_options', array(
	'type'        => 'color',
	'settings'    => 'baw_link_hover_color',
	'label'       => __( 'Link Hover Color', 'baw' ),
	'section'     => 'colors',
	'default'     => '',
) );

Kirki::add_field( 'baw_options', array(
	'type'        => 'color',
	'settings'    => 'button_background',
	'label'       => __( 'Buttons Background Color', 'baw' ),
	'section'     => 'colors',
	'default'     => '',
) );

Kirki::add_field( 'baw_options', array(
	'type'        => 'color',
	'settings'    => 'button_hover',
	'label'       => __( 'Buttons Background Hover Color', 'baw' ),
	'section'     => 'colors',
	'default'     => '',
) );

/**
 * Custom Font Size Styles
 */ 	

function baw_customizing_styles() {
        $site_title_font_size = get_theme_mod( 'site_title_font_size' );
        $site_tagline_font_size = get_theme_mod( 'site_tagline_font_size' );
        $site_branding_position = get_theme_mod( 'site_branding_position' );
        $site_title_width = get_theme_mod( 'site_title_width' );
        $site_title_left_distanc = get_theme_mod( 'site_title_left_distanc' );
        $site_title_top_distanc = get_theme_mod( 'site_title_top_distanc' );
        $header_title_hide = get_theme_mod( 'header_title_hide' );
        $header_tagline_hide = get_theme_mod( 'header_tagline_hide' );
        $baw_top_menu_font_size = get_theme_mod( 'baw_top_menu_font_size' );
        $header_image_show = get_theme_mod( 'header_image_show' );
        $sidebar_position = get_theme_mod( 'sidebar_position' );
        $baw_menu_background_color = get_theme_mod( 'baw_menu_background_color' );
        $baw_menu_color = get_theme_mod( 'baw_menu_color' );;
        $baw_menu_background_hover_color = get_theme_mod( 'baw_menu_background_hover_color' );
        $before_background_color = get_theme_mod( 'before_background_color' );
        $before_border_color = get_theme_mod( 'before_border_color' );
        $baw_menu_border_top_color = get_theme_mod( 'baw_menu_border_top_color' );
        $baw_link_color = get_theme_mod( 'baw_link_color' );
        $baw_link_hover_color = get_theme_mod( 'baw_link_hover_color' );
        $button_background = get_theme_mod( 'button_background' );
        $button_hover = get_theme_mod( 'button_hover' );
        $baw_header_shadow = get_theme_mod( 'baw_header_shadow' );
		
## Header Styles
		if($baw_header_shadow) { $style28 = ".s-shadow { background-color: inherit !important;}";} else {$style28 ="";}
		if($site_title_font_size) { $style1 = ".site-branding .site-title a, .site-title {font-size: {$site_title_font_size}px !important;}";} else {$style1 ="";}
		if($site_tagline_font_size) { $style2 = ".site-description {font-size: {$site_tagline_font_size}px !important;}";} else {$style2 ="";}
		if($site_branding_position == "left") { $style3 = ".site-branding {text-align: left !important;}";} else {$style3 ="";}
		if($site_branding_position == "right") { $style4 = ".site-branding {text-align: right !important;}";} else {$style4 ="";}
		if($site_branding_position == "center") { $style26 = ".site-branding {text-align: center !important;}";} else {$style26 ="";}
		if($site_title_width) { $style5 = ".site-branding {width: {$site_title_width}% !important;}";} else {$style5 ="";}
		if($site_title_left_distanc != '0') { $style6 = ".site-branding {left: {$site_title_left_distanc}% !important; right: auto;}";} else {$style6 ="";}
		if($site_title_top_distanc) { $style7 = ".site-branding {top: {$site_title_top_distanc}% !important;}";} else {$style7 ="";}
		if($header_title_hide) { $style8 = ".site-branding .site-title a, .site-branding .site-title {display: none !important;}";} else {$style8 ="";}
		if($header_tagline_hide) { $style9 = ".site-branding .site-description {display: none !important;}";} else {$style9 ="";}
		if($baw_top_menu_font_size) { $style10 = ".main-navigation ul li a, .main-navigation ul ul li a {font-size: {$baw_top_menu_font_size}px !important;}";} else {$style10 ="";}
		if($before_background_color) { $style17 = ".before-header {background: {$before_background_color} !important;}";} else {$style17 ="";}
		if($before_border_color) { $style19 = ".before-header {border-bottom: 1px solid {$before_border_color} !important;}";} else {$style19 ="";}

		if((!is_front_page() or !is_home())and $header_image_show == 'home') { $style11 = ".grid-top {position: relative !important;} .all-header{display: none !important;} .site-header {overflow: visible;}";} else {$style11 ="";}
		if((is_front_page() and !is_home()) and $header_image_show == 'home') { $style27 = ".grid-top {position: absolute !important;} body .all-header{display: block !important;} body .site-header {overflow: hidden;}";} else {$style27 ="";}
		if (!has_header_image()) { $style14 = ".site-branding, .all-header {display: none !important;} .grid-top {position: relative;} .site-header{overflow: inherit;}";} else {$style14 ="";}
			
## Sidebar Styles
		if($sidebar_position == 'no') { $style12 = "#content #secondary {display: none !important;}";} else {$style12 ="";}

## Colors Styles
		if($baw_link_color) { $style22 = "a {color: {$baw_link_color};}";} else {$style22 ="";}
		if($baw_link_hover_color) { $style23 = "a:hover {color: {$baw_link_hover_color};}";} else {$style23 ="";}
		if($button_background) { $style24 = ".woocommerce #respond input#submit, button, input[type='button'], input[type='reset'], input[type='submit'],
											.woocommerce a.button,
											.woocommerce button.button,
											.woocommerce input.button,
											.woocommerce #respond input#submit.alt,
											.woocommerce a.button.alt,
											.woocommerce button.button.alt,
											.woocommerce input.button.alt,
											.woocommerce .widget_price_filter .price_slider_amount .button,
											.woocommerce #review_form #respond .form-submit input,
											.woocommerce .cart .button,
											.woocommerce .cart input.button,
											.woocommerce .woocommerce-error .button,
											.woocommerce .woocommerce-info .button,
											.woocommerce .woocommerce-message .button,
											.woocommerce-page .woocommerce-error .button,
											.woocommerce-page .woocommerce-info .button,
											.woocommerce-page .woocommerce-message .button  {background: {$button_background} !important;}";} else {$style24 ="";}
		if($button_hover) { $style25 = ".woocommerce #respond input#submit:hover, button:hover, input[type='button']:hover, input[type='reset']:hover, input[type='submit']:hover,
											.woocommerce a.button:hover,
											.woocommerce button.button:hover,
											.woocommerce input.button:hover,
											.woocommerce #respond input#submit.alt:hover,
											.woocommerce a.button.alt:hover,
											.woocommerce button.button.altv,
											.woocommerce input.button.alt:hover,
											.woocommerce .widget_price_filter .price_slider_amount .button:hover,
											.woocommerce #review_form #respond .form-submit input:hover,
											.woocommerce .cart .button:hover,
											 .woocommerce .cart input.button:hover,
											.woocommerce .woocommerce-error .button:hover,
											.woocommerce .woocommerce-info .button:hover,
											.woocommerce .woocommerce-message .button:hover,
											.woocommerce-page .woocommerce-error .button:hover,
											.woocommerce-page .woocommerce-info .button:hover,
											.woocommerce-page .woocommerce-message .button:hover {background: {$button_hover} !important;}";} else {$style25 ="";}
        wp_add_inline_style( 'black-and-white-style', 
		$style1.$style2.$style3.$style4.$style5.$style6.$style7.$style8.$style9.$style10.$style11.$style12.$style14.$style15.$style16.$style17.$style18.$style19.$style20.$style21.$style22.$style23.$style24.$style25.$style26.$style27.$style28
		);
}
add_action( 'wp_enqueue_scripts', 'baw_customizing_styles' );

/**
 * Customizeing Icons
 */ 
function baw_customize_preview_icons() { ?>
	<style>
		.accordion-section-title:before {
			padding-right: 5px;
			color: #634E27;			
			font-size: 22px;
		    font-family: 'dashicons';
			vertical-align: middle;	
		}
		
		.customize-control-kirki-radio-image label {
				width: 33%;
		}
	</style>
<?php }
add_action( 'customize_controls_print_styles', 'baw_customize_preview_icons' );

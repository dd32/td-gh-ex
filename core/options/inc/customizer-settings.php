<?php
//the id of the options
$igthemes_option='basic-shop';

//start class
class IGthemes_Customizer {

// add some settings
public static function igthemes_customize($wp_customize) {

/** The short name gives a unique element to each options id. */
global $igthemes_option;

// PREMIUM
    $wp_customize->add_section('premium', array(
        'title' => __('UPGRADE TO PREMIUM', 'basic-shop'),
        'priority' => 1,
    ));   
// GENERAL
    $wp_customize->get_section('title_tagline')->title = __('General', 'basic-shop');
    $wp_customize->get_section('title_tagline')->priority = 3;

// LAYOUT
    $wp_customize->add_panel('layout-settings', array(
        'title' => __('Layout', 'basic-shop'),
        'priority' => 4,
    ));
    $wp_customize->add_section('blog-layout', array(
        'title' => __('Main Layout', 'basic-shop'),
        'panel' => 'layout-settings',
    ));
    $wp_customize->add_section('single-layout', array(
        'title' => __('Single Layout', 'basic-shop'),
        'panel' => 'layout-settings',
    ));
    $wp_customize->add_section('shop-layout', array(
        'title' => __('Shop Layout', 'basic-shop'),
        'panel' => 'layout-settings',
    ));

// STYLE
    $wp_customize->add_panel( 'style-settings', array(
        'title' => __('Style', 'basic-shop'),
        'priority' => 5,
    ));    
    $wp_customize->get_section('colors')->priority = 4;
    $wp_customize->get_section('colors')->title =  __('Body', 'basic-shop');
    $wp_customize->get_section('colors')->panel = 'style-settings';
    $wp_customize->get_control('background_image')->section = 'colors';
    $wp_customize->remove_section('background_image');
    
    $wp_customize->add_section('style-header', array(
        'title' => __('Header', 'basic-shop'),
        'panel' => 'style-settings',
        'priority' => 1,
    ));
    $wp_customize->add_section('style-main-menu', array(
        'title' => __('Main Menu', 'basic-shop'),
        'panel' => 'style-settings',
        'priority' => 2,
    ));
    $wp_customize->add_section('style-buttons', array(
        'title' => __('Buttons', 'basic-shop'),
        'panel' => 'style-settings',
    ));
    $wp_customize->add_section('style-footer', array(
        'title' => __('Footer', 'basic-shop'),
        'panel' => 'style-settings',
    ));
    
// FOOTER
    $wp_customize->add_section('footer-settings', array(
        'title' => __('Footer', 'basic-shop'),
        'priority' => 6,
    ));

// SOCIAL
    $wp_customize->add_section('social-settings', array(
        'title' => __('Social', 'basic-shop'),
        'priority' => 7,
    ));

// ADVANCED
    $wp_customize->add_section('advanced-settings', array(
        'title' => __('Advanced', 'basic-shop'),
        'priority' => 8,
    ));
// END SECTIONS

//ADD CONTROLS
$premium='<a href="http://www.iograficathemes.com/downloads/basic-shop-premium"> - only premium</a>';
/*****************************************************************
* PREMIUM
******************************************************************/
    $wp_customize->add_setting(
        $igthemes_option . '[premium]',
        array(
            'sanitize_callback' => 'igthemes_sanitize_html',
     ));
    $wp_customize->add_control( 
			// $id
			'premium',
			// $args
			array(
                'label'			=> __( 'UPGRADE TO PREMIUM', 'basic-shop' ),
	           'description' => '<p class="premium">' . esc_html__('If you like this theme, considering supporting development by purchasing the premium version.', 'basic-shop'). '</p>'
                . '<ul class="premium""> '. '<li><strong>'. esc_html__('Main premium features:', 'basic-shop'). '</strong></li>'
                . '<li>' . esc_html__('- All options enabled', 'basic-shop') . '</li>'
                . '<li>' . esc_html__('- Priority support', 'basic-shop'). '</li>'
                . '<li>' .  esc_html__('- Money back guarantee', 'basic-shop') . '</li>'
                . '<li>' . '<a class="upgrade-button" href="http://www.iograficathemes.com/downloads/basic-shop-premium/">' . esc_html__('upgrade to premium', 'basic-shop') . '</a></li>'
                . '</ul>',
                'type'          => 'text',
                    'input_attrs' => array(
                    'readonly'   => 'readonly',
                    'class' => 'readonly',
                ),
				'section'		=> 'premium',
                'settings'      => $igthemes_option . '[premium]',
    ));
/*****************************************************************
* GENERAL SETTINGS
******************************************************************/
//breadcrumb
    $wp_customize->add_setting(
        $igthemes_option . '[breadcrumb]', 
        array(
            'type' => 'option',
            'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control(
        'breadcrumb', 
        array(
            'label' => esc_html__('Display breadcrumb', 'basic-shop'),
            'description' => __( 'Yoast Breadcrumb supported<br>NavXT Breadcrumb supported', 'basic-shop'),
            'type' => 'checkbox',
            'section' => 'title_tagline',
            'settings' => $igthemes_option . '[breadcrumb]',
            'priority' => 90,
    ));
//numeric_pagination
    $wp_customize->add_setting(
        $igthemes_option . '[numeric_pagination]', 
        array(
            'type' => 'option',
            'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control(
        'numeric_pagination', 
        array(
            'label' => esc_html__('Use numeric pagination', 'basic-shop'),
            'description' => __( 'WP-PageNavi supported', 'basic-shop'),
            'type' => 'checkbox',
            'section' => 'title_tagline',
            'settings' => $igthemes_option . '[numeric_pagination]',
            'priority' => 91,
    ));
//lightbox
    $wp_customize->add_setting(
        $igthemes_option . '[lightbox]', 
        array(
            'type' => 'option',
            'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control(
        'lightbox', 
        array(
            'label' => esc_html__('Use lightbox', 'basic-shop'),
            'description' => __( 'Enable image lightbox', 'basic-shop'),
            'type' => 'checkbox',
            'section' => 'title_tagline',
            'settings' => $igthemes_option . '[lightbox]',
            'priority' => 92,
    ));
//credits
    $wp_customize->add_setting(
        $igthemes_option . '[site_credits]', 
        array(
            'type' => 'option',
            'sanitize_callback' => 'igthemes_sanitize_html',
    ));
    $wp_customize->add_control( 
			// $id
			'site_credits',
			// $args
			array(
                'label'			=> __( 'Footer Credits', 'basic-shop' ),
				'description'	=> __( 'Replace default theme credits with custom text', 'basic-shop' ).$premium,
                'type'          => 'text',
                    'input_attrs' => array(
                    'readonly'   => 'readonly',
                    'class' => 'readonly',
                ),
				'section'		=> 'title_tagline',
                'settings'      => $igthemes_option . '[site_credits]',
                'priority' => 93
    ));
/*****************************************************************
* LAYOUT SETTINGS
******************************************************************/
//main layout
    $wp_customize->add_setting(
        $igthemes_option . '[blog_sidebar]', 
        array(
            'type' => 'option',
            'sanitize_callback' => 'igthemes_sanitize_html',
    ));
    $wp_customize->add_control( 
			// $id
			'blog_layout',
			// $args
			array(
                'label'			=> __( 'Blog Layout', 'basic-shop' ),
				'description'	=> __( 'Select the layout for the blog', 'basic-shop' ).$premium,
                'type'          => 'text',
                    'input_attrs' => array(
                    'readonly'   => 'readonly',
                    'class' => 'readonly',
                ),
				'section'		=> 'blog-layout',
                'settings'      => $igthemes_option . '[blog_sidebar]',
    ));
//grid style
    $wp_customize->add_setting(
        $igthemes_option . '[grid_style]', 
        array(
            'type' => 'option',
            'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control(
        'grid_style', 
        array(
            'label' => esc_html__('Posts grid', 'basic-shop'),
            'description' => __( 'Show posts in columns', 'basic-shop'),
            'type' => 'checkbox',
            'section' => 'blog-layout',
            'settings' => $igthemes_option . '[grid_style]',
    ));
//featured image
    $wp_customize->add_setting(
        $igthemes_option . '[featured_image]', 
        array(
            'type' => 'option',
            'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control(
        'featured_image', 
        array(
            'label' => esc_html__('Hide featured images', 'basic-shop'),
            'description' => __( 'Hide posts featured images', 'basic-shop'),
            'type' => 'checkbox',
            'section' => 'blog-layout',
            'settings' => $igthemes_option . '[featured_image]',
    ));
//show excerpt
    $wp_customize->add_setting(
        $igthemes_option . '[show_excerpt]', 
        array(
            'type' => 'option',
            'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control(
        'show_excerpt', 
        array(
            'label' => esc_html__('Display post excerpt', 'basic-shop'),
            'description' => __( 'Show post content as excerpt', 'basic-shop'),
            'type' => 'checkbox',
            'section' => 'blog-layout',
            'settings' => $igthemes_option . '[show_excerpt]',
    ));
//single layout
    $wp_customize->add_setting(
        $igthemes_option . '[single_sidebar]', 
        array(
            'type' => 'option',
            'sanitize_callback' => 'igthemes_sanitize_html',
    ));
    $wp_customize->add_control(
			// $id
			'single_sidebar',
			// $args
			array(
                'label'			=> __( 'Post Layout', 'basic-shop' ),
				'description'	=> __( 'Select the layout for the post', 'basic-shop' ).$premium,
                'type'          => 'text',
                    'input_attrs' => array(
                    'readonly'   => 'readonly',
                    'class' => 'readonly',
                ),
				'section'		=> 'single-layout',
                'settings'      => $igthemes_option . '[single_sidebar]',
    ));
//shop cart menu
    $wp_customize->add_setting(
        $igthemes_option . '[menu_cart]', 
        array(
            'type' => 'option',
            'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control(
        'menu_cart', 
        array(
            'label' => esc_html__('Menu cart link', 'basic-shop'),
            'description' => __( 'Show menu cart in the menu', 'basic-shop'),
            'type' => 'checkbox',
            'section' => 'shop-layout',
            'settings' => $igthemes_option . '[menu_cart]',
    ));
//shop layout
    $wp_customize->add_setting(
        $igthemes_option . '[shop_sidebar]', 
        array(
            'type' => 'option',
            'sanitize_callback' => 'igthemes_sanitize_html',
    ));
    $wp_customize->add_control(
			// $id
			'shop_sidebar',
			// $args
			array(
                'label'			=> __( 'Shop Layout', 'basic-shop' ),
				'description'	=> __( 'Select the layout for the shop', 'basic-shop' ).$premium,
                'type'          => 'text',
                    'input_attrs' => array(
                    'readonly'   => 'readonly',
                    'class' => 'readonly',
                ),
				'section'		=> 'shop-layout',
                'settings'      => $igthemes_option . '[shop_sidebar]',
    ));
//shop layout
    $wp_customize->add_setting(
        $igthemes_option . '[product_sidebar]',
        array(
            'type' => 'option',
            'sanitize_callback' => 'igthemes_sanitize_html',
    ));
    $wp_customize->add_control(
			// $id
			'product_sidebar',
			// $args
			array(
                'label'			=> __( 'Product Layout', 'basic-shop' ),
				'description'	=> __( 'Select the layout for the single product', 'basic-shop' ).$premium,
                'type'          => 'text',
                    'input_attrs' => array(
                    'readonly'   => 'readonly',
                    'class' => 'readonly',
                ),
				'section'		=> 'shop-layout',
                'settings'      => $igthemes_option . '[product_sidebar]',
    ));
/*****************************************************************
* STYLE SETTINGS
******************************************************************/
//header color
    $wp_customize->add_setting(
        $igthemes_option . '[header_bg_color]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_html',
    ));
    $wp_customize->add_control(
        'header_bg_color',
        array(
            'label' => __('', 'basic-shop'),
            'description'	=>__('Background Color', 'basic-shop').$premium,
            'type'  => 'text',
            'input_attrs' => array(
                'readonly' => 'readonly',
                'class' => 'readonly',
            ),
        'section' => 'style-header',
        'settings' => $igthemes_option . '[header_bg_color]'
    ));
//header text color
    $wp_customize->add_setting(
        $igthemes_option . '[tagline_color]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#e1f4de',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'tagline_color', 
            array(
                'label' => __('Tagline Color', 'basic-shop'),
                'type' => 'color',
                'section' => 'style-header',
                'settings' => $igthemes_option . '[tagline_color]',
            )
    ));
//header link normal
    $wp_customize->add_setting(
        $igthemes_option . '[header_link_normal]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_html',
    ));
    $wp_customize->add_control(
        'header_link_normal', 
        array(
            'label' => __('', 'basic-shop'),
            'description'	=>__('Link Normal', 'basic-shop').$premium,
            'type'  => 'text',
            'input_attrs' => array(
                'readonly' => 'readonly',
                'class' => 'readonly',
            ),
            'section' => 'style-header',
            'settings' => $igthemes_option . '[header_link_normal]'
        ));
//header link hover
    $wp_customize->add_setting(
        $igthemes_option . '[header_link_hover]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_html',
    ));
    $wp_customize->add_control(
        'header_link_hover', 
            array(
                'label' => __('', 'basic-shop'),
                'description'	=>__('Link Hover', 'basic-shop').$premium,
                'type'  => 'text',
                'input_attrs' => array(
                    'readonly' => 'readonly',
                    'class' => 'readonly',
                ),
                'section' => 'style-header',
                'settings' => $igthemes_option . '[header_link_hover]',
    ));
//main menu site title color
    $wp_customize->add_setting(
        $igthemes_option . '[site_title_color]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#313131',
        'transport' => 'postMessage'

    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'site_title_color', 
            array(
                'label' => __('Site Title Color', 'basic-shop'),
                'type' => 'color',
                'section' => 'style-main-menu',
                'settings' => $igthemes_option . '[site_title_color]',
            )
    ));
//main menu background color
    $wp_customize->add_setting(
        $igthemes_option . '[main_menu_bg_color]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_html',
    ));
    $wp_customize->add_control(
        'main_menu_bg_color', 
            array(
                'label' => __('', 'basic-shop'),
                'description'	=>__('Background Color', 'basic-shop').$premium,
                'type'  => 'text',
                'input_attrs' => array(
                    'readonly' => 'readonly',
                    'class' => 'readonly',
                ),
                'section' => 'style-main-menu',
                'settings' => $igthemes_option . '[main_menu_bg_color]',
    ));
//main menu link normal
    $wp_customize->add_setting(
        $igthemes_option . '[main_menu_link_normal]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_html',
    ));
    $wp_customize->add_control(
        'main_menu_link_normal', 
            array(
                'label' => __('', 'basic-shop'),
                'description'	=>__('Link Normal', 'basic-shop').$premium,
                'type'  => 'text',
                'input_attrs' => array(
                    'readonly' => 'readonly',
                    'class' => 'readonly',
                ),
                'section' => 'style-main-menu',
                'settings' => $igthemes_option . '[main_menu_link_normal]',
    ));
//main menu link hover
    $wp_customize->add_setting(
        $igthemes_option . '[main_menu_link_hover]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_html',
    ));
    $wp_customize->add_control(
        'main_menu_link_hover', 
            array(
                'label' => __('', 'basic-shop'),
                'description'	=>__('Link Hover', 'basic-shop').$premium,
                'type'  => 'text',
                'input_attrs' => array(
                    'readonly' => 'readonly',
                    'class' => 'readonly',
                ),
                'section' => 'style-main-menu',
                'settings' => $igthemes_option . '[main_menu_link_hover]',
    ));
//body text color
    $wp_customize->add_setting(
        $igthemes_option . '[body_text_color]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_html',
    ));
    $wp_customize->add_control(
        'body_text_color', 
            array(
                'label' => __('', 'basic-shop'),
                'description'	=>__('Text Color', 'basic-shop').$premium,
                'type'  => 'text',
                'input_attrs' => array(
                    'readonly' => 'readonly',
                    'class' => 'readonly',
                ),
                'section' => 'colors',
                'settings' => $igthemes_option . '[body_text_color]',
    ));
//body headings color
    $wp_customize->add_setting(
        $igthemes_option . '[body_headings_color]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_html',
    ));
    $wp_customize->add_control(
       'body_headings_color', 
            array(
                'label' => __('', 'basic-shop'),
                'description'	=>__('Headings Color', 'basic-shop').$premium,
                'type'  => 'text',
                'input_attrs' => array(
                    'readonly' => 'readonly',
                    'class' => 'readonly',
                ),
                'section' => 'colors',
                'settings' => $igthemes_option . '[body_headings_color]',
    ));
//body link normal
    $wp_customize->add_setting(
        $igthemes_option . '[body_link_normal]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_html',
    ));
    $wp_customize->add_control(
        'body_link_normal', 
            array(
                'label' => __('', 'basic-shop'),
                'description'	=>__('Link Normal', 'basic-shop').$premium,
                'type'  => 'text',
                'input_attrs' => array(
                    'readonly' => 'readonly',
                    'class' => 'readonly',
                ),
                'section' => 'colors',
                'settings' => $igthemes_option . '[body_link_normal]',
    ));
//body link hover
    $wp_customize->add_setting(
        $igthemes_option . '[body_link_hover]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_html',
    ));
    $wp_customize->add_control(
        'body_link_hover', 
            array(
                'label' => __('', 'basic-shop'),
                'description'	=>__('Link Hover', 'basic-shop').$premium,
                'type'  => 'text',
                'input_attrs' => array(
                    'readonly' => 'readonly',
                    'class' => 'readonly',
                ),
                'section' => 'colors',
                'settings' => $igthemes_option . '[body_link_hover]',
    ));
//footer background color
    $wp_customize->add_setting(
        $igthemes_option . '[footer_bg_color]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_html',
    ));
    $wp_customize->add_control(
       'footer_bg_color', 
            array(
                'label' => __('', 'basic-shop'),
                'description'	=>__('Background Color', 'basic-shop').$premium,
                'type'  => 'text',
                'input_attrs' => array(
                    'readonly' => 'readonly',
                    'class' => 'readonly',
                ),
                'section' => 'style-footer',
                'settings' => $igthemes_option . '[footer_bg_color]',
    ));
//footer text color
    $wp_customize->add_setting(
        $igthemes_option . '[footer_text_color]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_html',
    ));
    $wp_customize->add_control(
        'footer_text_color', 
            array(
                'label' => __('', 'basic-shop'),
                'description' =>__('Text Color', 'basic-shop').$premium,
                'type'  => 'text',
                'input_attrs' => array(
                    'readonly' => 'readonly',
                    'class' => 'readonly',
                ),
                'section' => 'style-footer',
                'settings' => $igthemes_option . '[footer_text_color]',
    ));
//footer link normal
    $wp_customize->add_setting(
        $igthemes_option . '[footer_link_normal]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_html',
    ));
    $wp_customize->add_control(
        'footer_link_normal', 
            array(
                'label' => __('', 'basic-shop'),
                'description'	=>__('Link Normal', 'basic-shop').$premium,
                'type'  => 'text',
                'input_attrs' => array(
                    'readonly' => 'readonly',
                    'class' => 'readonly',
                ),
                'section' => 'style-footer',
                'settings' => $igthemes_option . '[footer_link_normal]',
    ));
//footer link hover
    $wp_customize->add_setting(
        $igthemes_option . '[footer_link_hover]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_html',
    ));
    $wp_customize->add_control(
       'footer_link_hover', 
            array(
                'label' => __('', 'basic-shop'),
                'description'	=>__('Link Hover', 'basic-shop').$premium,
                'type'  => 'text',
                'input_attrs' => array(
                    'readonly' => 'readonly',
                    'class' => 'readonly',
                ),
                'section' => 'style-footer',
                'settings' => $igthemes_option . '[footer_link_hover]',
    ));
//button background color
    $wp_customize->add_setting(
        $igthemes_option . '[button_bg_normal]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_html',
    ));
    $wp_customize->add_control(
        'button_bg_normal', 
            array(
                'label' => __('', 'basic-shop'),
                'description'	=>__('Background Normal', 'basic-shop').$premium,
                'type'  => 'text',
                'input_attrs' => array(
                    'readonly' => 'readonly',
                    'class' => 'readonly',
                ),
                'section' => 'style-buttons',
                'settings' => $igthemes_option . '[button_bg_normal]',
    ));
//button background hover
    $wp_customize->add_setting(
        $igthemes_option . '[button_bg_hover]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_html',
    ));
    $wp_customize->add_control(
        'button_bg_hover', 
            array(
                'label' => __('', 'basic-shop'),
                'description'	=>__('Background Hover', 'basic-shop').$premium,
                'type'  => 'text',
                'input_attrs' => array(
                    'readonly' => 'readonly',
                    'class' => 'readonly',
                ),
                'section' => 'style-buttons',
                'settings' => $igthemes_option . '[button_bg_hover]',
    ));
//button text color
    $wp_customize->add_setting(
        $igthemes_option . '[button_text_normal]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_html',
    ));
    $wp_customize->add_control(
       'button_text_normal', 
            array(
                'label' => __('', 'basic-shop'),
                'description'	=>__('Text Normal', 'basic-shop').$premium,
                'type'  => 'text',
                'input_attrs' => array(
                    'readonly' => 'readonly',
                    'class' => 'readonly',
                ),
                'section' => 'style-buttons',
                'settings' => $igthemes_option . '[button_text_normal]',
    ));
//button text hover
    $wp_customize->add_setting(
        $igthemes_option . '[button_text_hover]',
        array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_html',

    ));
    $wp_customize->add_control(
        'button_text_hover', 
            array(
                'label' => __('', 'basic-shop'),
                'description'	=>__('Text Hover', 'basic-shop').$premium,
                'type'  => 'text',
                'input_attrs' => array(
                    'readonly' => 'readonly',
                    'class' => 'readonly',
                ),
                'section' => 'style-buttons',
                'settings' => $igthemes_option . '[button_text_hover]',
    ));
/*****************************************************************
* SOCIAL SETTINGS
******************************************************************/
//facebook
    $wp_customize->add_setting($igthemes_option . '[facebook_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
        'default' => 'https://www.facebook.com/iograficathemes'

    ));
    $wp_customize->add_control('facebook_url', array(
        'label' => esc_html__('Facebook url', 'basic-shop'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[facebook_url]',
    ));
//twitter
    $wp_customize->add_setting($igthemes_option . '[twitter_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
        'default' => 'https://twitter.com/iograficathemes'
    ));
    $wp_customize->add_control('twitter_url', array(
        'label' => esc_html__('Twitter url', 'basic-shop'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[twitter_url]',
    ));
//google
    $wp_customize->add_setting($igthemes_option . '[google_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
        'default' => 'https://plus.google.com/+Iograficathemes'
    ));
    $wp_customize->add_control('google_url', array(
        'label' => esc_html__('Google plus url', 'basic-shop'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[google_url]',
    ));
//pinterest
    $wp_customize->add_setting($igthemes_option . '[pinterest_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('pinterest_url', array(
        'label' => esc_html__('Pinterest url', 'basic-shop'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[pinterest_url]',
    ));
//tumblr
    $wp_customize->add_setting($igthemes_option . '[tumblr_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('tumblr_url', array(
        'label' => esc_html__('Tumblr url', 'basic-shop'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[tumblr_url]',
    ));
//instagram
    $wp_customize->add_setting($igthemes_option . '[instagram_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('instagram_url', array(
        'label' => esc_html__('Instagram url', 'basic-shop'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[instagram_url]',
    ));
//linkedin
    $wp_customize->add_setting($igthemes_option . '[linkedin_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('linkedin_url', array(
        'label' => esc_html__('Linkedin url', 'basic-shop'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[linkedin_url]',
    ));
//dribbble
    $wp_customize->add_setting($igthemes_option . '[dribbble_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('dribbble_url', array(
        'label' => esc_html__('Dribble url', 'basic-shop'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[dribbble_url]',
    ));
//vimeo
    $wp_customize->add_setting($igthemes_option . '[vimeo_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('vimeo_url', array(
        'label' => esc_html__('Vimeo url', 'basic-shop'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[vimeo_url]',
    ));
//youtube
    $wp_customize->add_setting($igthemes_option . '[youtube_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('youtube_url', array(
        'label' => esc_html__('Youtube url', 'basic-shop'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[youtube_url]',
    ));
//rss
    $wp_customize->add_setting($igthemes_option . '[rss_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('rss_url', array(
        'label' => esc_html__('RSS url', 'basic-shop'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[rss_url]',
    ));

/*****************************************************************
* ADVANCED SETTINGS
******************************************************************/
//custom css
    $wp_customize->add_setting($igthemes_option . '[custom_css]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_html',
    ));
    $wp_customize->add_control('custom_css', array(
        'label' => esc_html__('Custom CSS', 'basic-shop'),
        'description'	=>__('Add your custom css code', 'basic-shop').$premium,
        'type'  => 'text',
        'input_attrs' => array(
            'readonly' => 'readonly',
            'class' => 'readonly',
        ),
        'section' => 'advanced-settings',
        'settings' => $igthemes_option . '[custom_css]',
    ) );
    //END
    }
}
// Setup the Theme Customizer settings and controls...
add_action('customize_register' , array('IGthemes_Customizer' , 'igthemes_customize') );
//END OF CLASS
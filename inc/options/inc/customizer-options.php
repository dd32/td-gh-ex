<?php
//start class
class IGthemes_Customizer {
// add some settings
public static function igthemes_customize($wp_customize) {

$wp_customize->add_panel( 'igtheme_options', array(
  'title' => __( 'Theme Settings', 'base-wp'),
  'description' => '', 
  'priority' => 10, 
) );
// LAYOUT
$wp_customize->add_section('layout-settings', array(
    'title' => __('Layout', 'base-wp'),
    'panel' => 'igtheme_options',
    'priority' => 10, 
 ));
// Header
$wp_customize->add_section( 'header-settings' , array(
  'title' => __( 'Header', 'base-wp'),
  'panel' => 'igtheme_options',
  'priority' => 20, 
) );
// TYPOGRAPHY
$wp_customize->add_section('typography-settings', array(
    'title' => __('Typography', 'base-wp'),
    'panel' => 'igtheme_options',
    'priority' => 30, 
));
// BUTTONS
$wp_customize->add_section('buttons-settings', array(
    'title' => __('Buttons', 'base-wp'),
    'panel' => 'igtheme_options',
    'priority' => 40, 
 ));
// FOOTER
$wp_customize->add_section('footer-settings', array(
    'title' => __('Footer', 'base-wp'),
    'panel' => 'igtheme_options',
    'priority' => 50, 
));
// SOCIAL
$wp_customize->add_section('social-settings', array(
    'title' => __('Social', 'base-wp'),
    'panel' => 'igtheme_options',
    'priority' => 60, 
));
// END SECTIONS

//ADD CONTROLS
/*****************************************************************
* PREMIUM
******************************************************************/
    if ( apply_filters( 'igthemes_customizer_more', true ) ) {
        
        $wp_customize->add_section( 'upgrade_premium' , array(
            'title'      		=> __( 'More Options', 'base-wp' ),
            'panel'             => 'igtheme_options',
            'priority'   		=> 1,
        ) );

        $wp_customize->add_setting( 'upgrade_premium', array(
            'default'    		=> null,
            'sanitize_callback' => 'igthemes_sanitize_text',
        ) );

        $wp_customize->add_control( new IGthemes_More_Control( $wp_customize, 'upgrade_premium', array(
            'label'    			=> __( 'Looking for more options?', 'base-wp' ),
            'section'  			=> 'upgrade_premium',
            'settings' 			=> 'upgrade_premium',
            'priority' 			=> 1,
        ) ) );
        // SECTIONS
    $wp_customize->add_section('advanced-settings', array(
        'title' => esc_html__('Advanced', 'base-wp'),
        'panel' => 'igtheme_options',
        'priority' => 80,
    ));
    // Shop
    $wp_customize->add_section('shop-settings', array(
        'title' => __('Shop', 'base-wp'),
        'panel' => 'igtheme_options',
        'priority' => 70, 
    ));
    //lightbox
    $wp_customize->add_setting('lightbox', array(
        'default'    		=> null,
        'sanitize_callback' => 'igthemes_sanitize_text',
    ));
    $wp_customize->add_control( new IGthemes_Only_Premium( $wp_customize, 'lightbox', array(
        'label' => esc_html__('', 'base-wp'),
        'description' => esc_html__('Use the lightbox effect for images and galleries', 'base-wp'),
        'section' => 'layout-settings',
        'settings' => 'lightbox',
        'priority'   => 5
    ) ) );
    //main post content
    $wp_customize->add_setting('main_post_content', array(
        'default'    		=> null,
        'sanitize_callback' => 'igthemes_sanitize_text',
    ));
    $wp_customize->add_control( new IGthemes_Only_Premium( $wp_customize, 'main_post_content', array(
        'label' => esc_html__('', 'base-wp'),
        'description' => esc_html__('Display posts content as excerpt', 'base-wp'),
        'section' => 'layout-settings',
        'settings' => 'main_post_content',
        'priority'   => 6
    ) ) );
    //main featured images
    $wp_customize->add_setting('main_featured_images', array(
        'default'    		=> null,
        'sanitize_callback' => 'igthemes_sanitize_text',
    ));
    $wp_customize->add_control( new IGthemes_Only_Premium( $wp_customize, 'main_featured_images', array(
        'label' => esc_html__('', 'base-wp'),
        'description' => esc_html__('Display featured images on archive', 'base-wp'),
        'section' => 'layout-settings',
        'settings' => 'main_featured_images',
        'priority'   => 7
    ) ) );
    //shop_menu_link
    $wp_customize->add_setting('shop_menu_link', array(
        'default'    		=> null,
        'sanitize_callback' => 'igthemes_sanitize_text',
    ));
    $wp_customize->add_control( new IGthemes_Only_Premium( $wp_customize, 'shop_menu_link', array(
        'label' => esc_html__('Display shopping cart link?', 'base-wp'),
        'description' => esc_html__('Add shopping cart link in the header menu', 'base-wp'),
        'section' => 'shop-settings',
        'settings' => 'shop_menu_link',
    ) ) );
    //shop_sidebar
    $wp_customize->add_setting('shop_sidebar', array(
        'default'    		=> null,
        'sanitize_callback' => 'igthemes_sanitize_text',
    ));
    $wp_customize->add_control( new IGthemes_Only_Premium( $wp_customize, 'shop_sidebar', array(
        'label' => esc_html__('Shop Layout', 'base-wp'),
        'description' => esc_html__('Select the shop layout', 'base-wp'),
        'section' => 'shop-settings',
        'settings' => 'shop_sidebar',
    ) ) );
    //shop_products_number
    $wp_customize->add_setting('shop_products_number', array(
        'default'    		=> null,
        'sanitize_callback' => 'igthemes_sanitize_text',
    ));
    $wp_customize->add_control( new IGthemes_Only_Premium( $wp_customize, 'shop_products_number', array(
        'label' => esc_html__('', 'base-wp'),
        'description' => esc_html__('How many product display per page?', 'base-wp'),
        'section' => 'shop-settings',
        'settings' => 'shop_products_number',
    ) ) );
    //shop_button_colors
    $wp_customize->add_setting('shop_button_colors', array(
        'default'    		=> null,
        'sanitize_callback' => 'igthemes_sanitize_text',
    ));
    $wp_customize->add_control( new IGthemes_Only_Premium( $wp_customize, 'shop_button_colors', array(
        'label' => esc_html__('Shop Buttons', 'base-wp'),
        'description' => esc_html__('Change shop buttons colors', 'base-wp'),
        'section' => 'shop-settings',
        'settings' => 'shop_button_colors',
    ) ) );
    //header_layout
    $wp_customize->add_setting('header_layout', array(
        'default'    		=> null,
        'sanitize_callback' => 'igthemes_sanitize_text',
    ));
    $wp_customize->add_control( new IGthemes_Only_Premium( $wp_customize, 'header_layout', array(
        'label' => esc_html__('Header Layout', 'base-wp'),
        'description' => esc_html__('Inline or expanded layout', 'base-wp'),
        'section' => 'header-settings',
        'settings' => 'header_layout',
    ) ) );
    //header_nav_sticky
    $wp_customize->add_setting('header_nav_sticky', array(
        'default'    		=> null,
        'sanitize_callback' => 'igthemes_sanitize_text',
    ));
    $wp_customize->add_control( new IGthemes_Only_Premium( $wp_customize, 'header_nav_sticky', array(
        'label' => esc_html__('Sticky Menu', 'base-wp'),
        'description' => esc_html__('Lock the main menu on top of the page when a user scrolls', 'base-wp'),
        'section' => 'header-settings',
        'settings' => 'header_nav_sticky',
    ) ) );
    //font_google
    $wp_customize->add_setting('font_google', array(
        'default'    		=> null,
        'sanitize_callback' => 'igthemes_sanitize_text',
    ));
    $wp_customize->add_control( new IGthemes_Only_Premium( $wp_customize, 'font_google', array(
        'label' => esc_html__('Google Font', 'base-wp'),
        'description' => esc_html__('Add your preferred Google Font', 'base-wp'),
        'section' => 'typography-settings',
        'settings' => 'font_google',
    ) ) );
    //font_family_headings
    $wp_customize->add_setting('font_family_headings', array(
        'default'    		=> null,
        'sanitize_callback' => 'igthemes_sanitize_text',
    ));
    $wp_customize->add_control( new IGthemes_Only_Premium( $wp_customize, 'font_family_headings', array(
        'label' => esc_html__('', 'base-wp'),
        'description' => esc_html__('Headings font family', 'base-wp'),
        'section' => 'typography-settings',
        'settings' => 'font_family_headings',
    ) ) );
    //font_family_body
    $wp_customize->add_setting('font_family_body', array(
        'default'    		=> null,
        'sanitize_callback' => 'igthemes_sanitize_text',
    ));
    $wp_customize->add_control( new IGthemes_Only_Premium( $wp_customize, 'font_family_body', array(
        'label' => esc_html__('', 'base-wp'),
        'description' => esc_html__('Body font family', 'base-wp'),
        'section' => 'typography-settings',
        'settings' => 'font_family_body',
    ) ) );
    //font_size
    $wp_customize->add_setting('font_size', array(
        'default'    		=> null,
        'sanitize_callback' => 'igthemes_sanitize_text',
    ));
    $wp_customize->add_control( new IGthemes_Only_Premium( $wp_customize, 'font_size', array(
        'label' => esc_html__('Font Size', 'base-wp'),
        'description' => esc_html__('Change body and headings font size', 'base-wp'),
        'section' => 'typography-settings',
        'settings' => 'font_size',
    ) ) );
    //custom_css
    $wp_customize->add_setting('custom_css', array(
        'default'    		=> null,
        'sanitize_callback' => 'igthemes_sanitize_text',
    ));
    $wp_customize->add_control( new IGthemes_Only_Premium( $wp_customize, 'custom_css', array(
        'label' => esc_html__('Custom CSS', 'base-wp'),
        'description' => esc_html__('Add your custom css code', 'base-wp'),
        'section' => 'advanced-settings',
        'settings' => 'custom_css',
    ) ) );
    //custom_js
    $wp_customize->add_setting('custom_js', array(
        'default'    		=> null,
        'sanitize_callback' => 'igthemes_sanitize_text',
    ));
    $wp_customize->add_control( new IGthemes_Only_Premium( $wp_customize, 'custom_js', array(
        'label' => esc_html__('Custom JS', 'base-wp'),
        'description' => esc_html__('Add your custom js code', 'base-wp'),
        'section' => 'advanced-settings',
        'settings' => 'custom_js',
    ) ) );
    //end
  }
/*****************************************************************
* LAYOUT SETTINGS
******************************************************************/
//main layout
    $wp_customize->add_setting(
        'main_sidebar',
        array(
            'sanitize_callback' => 'igthemes_sanitize_choices',
            'default' => 'right',
    ));
    $wp_customize->add_control(
            new IGthemes_Radio_Image_Control(
            // $wp_customize object
            $wp_customize,
            // $id
            'main_sidebar',
            // $args
            array(
                'label'			=> __( 'General Layout', 'base-wp' ),
                'description'	=> __( 'Select the theme layout', 'base-wp' ),
                'priority' =>   1, 
                'type'          => 'radio-image',
                'section'		=> 'layout-settings',
                'settings'      => 'main_sidebar',
                'choices'		=> array(
                    'left' 	    => get_template_directory_uri() . '/inc/options/images/left.png',
                    'right' 	=> get_template_directory_uri() . '/inc/options/images/right.png'
                )
            )
    ));
//breadcrumb
    $wp_customize->add_setting(
        'breadcrumb',
        array(
            'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control(
        'breadcrumb',
        array(
            'label'         => esc_html__('Display breadcrumb', 'base-wp'),
            'description'   => __( 'Yoast Breadcrumb supported<br>NavXT Breadcrumb supported', 'base-wp'),
            'priority'      =>  2, 
            'type'          => 'checkbox',
            'section'       => 'layout-settings',
            'settings'      => 'breadcrumb',
    ));
//numeric_pagination
    $wp_customize->add_setting(
        'numeric_pagination',
        array(
            'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control(
        'numeric_pagination',
        array(
            'label' =>esc_html__('Use numeric pagination', 'base-wp'),
            'description' =>   __( 'WP-PageNavi supported', 'base-wp'),
            'priority' =>       3,
            'type' =>           'checkbox',
            'section' =>        'layout-settings',
            'settings' => 'numeric_pagination',
    ));
/*****************************************************************
* HEADER SETTINGS
******************************************************************/
//header color
    $wp_customize->add_setting(
        'header_background_color',
        array(
        
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#ffffff',
        'transport' => 'postMessage'

    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'header_background_color',
            array(
                'label' => __('Colors', 'base-wp'),
                'description' => __('Background color', 'base-wp'),
                'type' => 'color',
                'section' => 'header-settings',
                'settings' => 'header_background_color',
            )
    ));
//header text color
    $wp_customize->add_setting(
        'header_text_color',
        array(
        
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#666666',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'header_text_color',
            array(
                'label' => __('', 'base-wp'),
                'description' => __('Text color', 'base-wp'),
                'type' => 'color',
                'section' => 'header-settings',
                'settings' => 'header_text_color',
            )
    ));
//header link normal
    $wp_customize->add_setting(
        'header_link_normal',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#444444',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'header_link_normal',
            array(
                'label' => __('', 'base-wp'),
                'description' => __('Link color', 'base-wp'),
                'type' => 'color',
                'section' => 'header-settings',
                'settings' => 'header_link_normal',
            )
    ));
//header link hover
    $wp_customize->add_setting(
        'header_link_hover',
        array(
        
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#ff9900',
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'header_link_hover',
            array(
                'label' => __('', 'base-wp'),
                'description' => __('Link hover color', 'base-wp'),
                'type' => 'color',
                'section' => 'header-settings',
                'settings' => 'header_link_hover',
            )
    ));
/*****************************************************************
* TYPOGRAPHY SETTINGS
******************************************************************/
    //body text color
    $wp_customize->add_setting(
        'body_text_color',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#666666',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'body_text_color',
            array(
                'label' => __('Font Style', 'base-wp'),
                'description' => __('Body text color', 'base-wp'),
                'priority' => 1,
                'type' => 'color',
                'section' => 'typography-settings',
                'settings' => 'body_text_color',
            )
    ));
    //body headings color
    $wp_customize->add_setting(
        'body_headings_color',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#444444',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'body_headings_color',
            array(
                'label' => __('', 'base-wp'),
                'description' => __('Headings color', 'base-wp'),
                'priority' => 2,
                'type' => 'color',
                'section' => 'typography-settings',
                'settings' => 'body_headings_color',
            )
    ));
    //body link normal
    $wp_customize->add_setting(
        'body_link_normal',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#444444',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'body_link_normal',
            array(
                'label' => __('', 'base-wp'),
                'description' => __('Link color', 'base-wp'),
                'priority' => 3,
                'type' => 'color',
                'section' => 'typography-settings',
                'settings' => 'body_link_normal',
            )
    ));
    //body link hover
    $wp_customize->add_setting(
        'body_link_hover',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#ff9900'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'body_link_hover',
            array(
                'label' => __('', 'base-wp'),
                'description' => __('Link hover color', 'base-wp'),
                'priority' => 4,
                'type' => 'color',
                'section' => 'typography-settings',
                'settings' => 'body_link_hover',
            )
    ));
/*****************************************************************
* BUTTONS SETTINGS
******************************************************************/
    //button background color
    $wp_customize->add_setting(
        'button_background_normal',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#444444',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'button_background_normal',
            array(
                'label' => __('Main Buttons', 'base-wp'),
                'description' => __('Background color', 'base-wp'),
                'priority' => 1,
                'type' => 'color',
                'section' => 'buttons-settings',
                'settings' => 'button_background_normal',
            )
    ));
    //button background hover
    $wp_customize->add_setting(
        'button_background_hover',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#ff9900'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'button_background_hover',
            array(
                'label' => __('', 'base-wp'),
                'description' => __('Background hover', 'base-wp'),
                'priority' => 2,
                'type' => 'color',
                'section' => 'buttons-settings',
                'settings' => 'button_background_hover',
            )
    ));
    //button text color
    $wp_customize->add_setting(
        'button_text_normal',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#ffffff',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'button_text_normal',
            array(
                'label' => __('', 'base-wp'),
                'description' => __('Text normal', 'base-wp'),
                'priority' => 3,
                'type' => 'color',
                'section' => 'buttons-settings',
                'settings' => 'button_text_normal',
            )
    ));
    //button text hover
    $wp_customize->add_setting(
        'button_text_hover',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#ffffff'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'button_text_hover',
            array(
                'label' => __('', 'base-wp'),
                'description' => __('Text hover', 'base-wp'),
                'priority' => 4,
                'type' => 'color',
                'section' => 'buttons-settings',
                'settings' => 'button_text_hover',
            )
    ));
/*****************************************************************
* FOOTER SETTINGS
******************************************************************/
    //footer background color
    $wp_customize->add_setting(
        'footer_background_color',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#ffffff',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'footer_background_color',
            array(
                'label' => __('Colors', 'base-wp'),
                'description' => __('Background color', 'base-wp'),
                'priority' => 1,
                'type' => 'color',
                'section' => 'footer-settings',
                'settings' => 'footer_background_color',
            )
    ));
    //footer text color
    $wp_customize->add_setting(
        'footer_text_color',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#666666',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'footer_text_color',
            array(
                'label' => __('', 'base-wp'),
                'description' => __('Text color', 'base-wp'),
                'priority' => 2,
                'type' => 'color',
                'section' => 'footer-settings',
                'settings' => 'footer_text_color',
            )
    ));
    //footer headings color
    $wp_customize->add_setting(
        'footer_headings_color',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#444444',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'footer_headings_color',
            array(
                'label' => __('', 'base-wp'),
                'description' => __('Hedings color', 'base-wp'),
                'priority' => 3,
                'type' => 'color',
                'section' => 'footer-settings',
                'settings' => 'footer_headings_color',
            )
    ));
    //footer link normal
    $wp_customize->add_setting(
        'footer_link_normal',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#444444',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'footer_link_normal',
            array(
                'label' => __('', 'base-wp'),
                'description' => __('Link color', 'base-wp'),
                'priority' => 4,
                'type' => 'color',
                'section' => 'footer-settings',
                'settings' => 'footer_link_normal',
            )
    ));
    //footer link hover
    $wp_customize->add_setting(
        'footer_link_hover',
        array(
        'sanitize_callback' => 'igthemes_sanitize_hex_color',
        'default'  => '#ff9900'
    ));
    $wp_customize->add_control(
        new WP_Customize_color_Control(
        $wp_customize, 'footer_link_hover',
            array(
                'label' => __('', 'base-wp'),
                'description' => __('Link hover color', 'base-wp'),
                'priority' => 5,
                'type' => 'color',
                'section' => 'footer-settings',
                'settings' => 'footer_link_hover',
            )
    ));
/*****************************************************************
* SOCIAL SETTINGS
******************************************************************/
//facebook
    $wp_customize->add_setting('facebook_url', array(
        'sanitize_callback' => 'igthemes_sanitize_url',
        'default' => 'https://www.facebook.com/iograficathemes'
    ));
    $wp_customize->add_control('facebook_url', array(
        'label' => esc_html__('Facebook url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => 'facebook_url',
    ));
//twitter
    $wp_customize->add_setting('twitter_url', array(
        
        'sanitize_callback' => 'igthemes_sanitize_url',
        'default' => 'https://twitter.com/iograficathemes'
    ));
    $wp_customize->add_control('twitter_url', array(
        'label' => esc_html__('Twitter url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => 'twitter_url',
    ));
//google
    $wp_customize->add_setting('google_url', array(
        
        'sanitize_callback' => 'igthemes_sanitize_url',
        'default' => 'https://plus.google.com/+Iograficathemes'
    ));
    $wp_customize->add_control('google_url', array(
        'label' => esc_html__('Google plus url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => 'google_url',
    ));
//pinterest
    $wp_customize->add_setting('pinterest_url', array(
        
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('pinterest_url', array(
        'label' => esc_html__('Pinterest url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => 'pinterest_url',
    ));
//tumblr
    $wp_customize->add_setting('tumblr_url', array(
        
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('tumblr_url', array(
        'label' => esc_html__('Tumblr url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => 'tumblr_url',
    ));
//instagram
    $wp_customize->add_setting('instagram_url', array(
        
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('instagram_url', array(
        'label' => esc_html__('Instagram url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => 'instagram_url',
    ));
//linkedin
    $wp_customize->add_setting('linkedin_url', array(
        
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('linkedin_url', array(
        'label' => esc_html__('Linkedin url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => 'linkedin_url',
    ));
//dribbble
    $wp_customize->add_setting('dribbble_url', array(
        
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('dribbble_url', array(
        'label' => esc_html__('Dribble url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => 'dribbble_url',
    ));
//youtube
    $wp_customize->add_setting('youtube_url', array(
        
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('youtube_url', array(
        'label' => esc_html__('Youtube url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => 'youtube_url',
    ));
//END
    }
}
// Setup the Theme Customizer settings and controls...
add_action('customize_register' , array('IGthemes_Customizer' , 'igthemes_customize') );
//END OF CLASS

<?php
/**
 * Home Page Options
 *
 * @package bakery_shop
 */
 
function bakery_shop_customize_register_home( $wp_customize ) {
    
    global $bakery_shop_options_pages;
    global $bakery_shop_options_posts;
    global $bakery_shop_option_categories;
    global $bakery_shop_default_post;
    global $bakery_shop_default_page;

    /** Home Page Settings */
    $wp_customize->add_panel( 
        'bakery_shop_home_page_settings',
         array(
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'title' => __( 'Home Page Settings', 'bakery-shop' ),
            'description' => __( 'Customize Home Page Settings', 'bakery-shop' ),
        ) 
    );
    
     /** Slider Settings */
    $wp_customize->add_section(
        'bakery_shop_slider_section_settings',
        array(
            'title'     => __( 'Slider Settings', 'bakery-shop' ),
            'priority'  => 10,
            'capability' => 'edit_theme_options',
            'panel' => 'bakery_shop_home_page_settings'
        )
    );
   
    /** Enable/Disable Slider */
    $wp_customize->add_setting(
        'bakery_shop_ed_slider',
        array(
            'default' => '1',
            'sanitize_callback' => 'bakery_shop_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'bakery_shop_ed_slider',
        array(
            'label' => __( 'Enable Home Page Slider', 'bakery-shop' ),
            'section' => 'bakery_shop_slider_section_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Auto Transition */
    $wp_customize->add_setting(
        'bakery_shop_slider_auto',
        array(
            'default' => '1',
            'sanitize_callback' => 'bakery_shop_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'bakery_shop_slider_auto',
        array(
            'label' => __( 'Enable Slider Auto Transition', 'bakery-shop' ),
            'section' => 'bakery_shop_slider_section_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Loop */
    $wp_customize->add_setting(
        'bakery_shop_slider_loop',
        array(
            'default' => '1',
            'sanitize_callback' => 'bakery_shop_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'bakery_shop_slider_loop',
        array(
            'label' => __( 'Enable Slider Loop', 'bakery-shop' ),
            'section' => 'bakery_shop_slider_section_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Pager */
    $wp_customize->add_setting(
        'bakery_shop_slider_pager',
        array(
            'default' => '1',
            'sanitize_callback' => 'bakery_shop_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'bakery_shop_slider_pager',
        array(
            'label' => __( 'Enable Slider Pager', 'bakery-shop' ),
            'section' => 'bakery_shop_slider_section_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Caption */
    $wp_customize->add_setting(
        'bakery_shop_slider_caption',
        array(
            'default' => '1',
            'sanitize_callback' => 'bakery_shop_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'bakery_shop_slider_caption',
        array(
            'label' => __( 'Enable Slider Caption', 'bakery-shop' ),
            'section' => 'bakery_shop_slider_section_settings',
            'type' => 'checkbox',
        )
    );
        
    /** Slider Animation */
    $wp_customize->add_setting(
        'bakery_shop_slider_animation',
        array(
            'default' => 'slide',
            'sanitize_callback' => 'bakery_shop_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'bakery_shop_slider_animation',
        array(
            'label' => __( 'Select Slider Animation', 'bakery-shop' ),
            'section' => 'bakery_shop_slider_section_settings',
            'type' => 'select',
            'choices' => array(
                'fade' => __( 'Fade', 'bakery-shop' ),
                'slide' => __( 'Slide', 'bakery-shop' ),
            )
        )
    );
    
    /** Slider Speed */
    $wp_customize->add_setting(
        'bakery_shop_slider_speeds',
        array(
            'default' => 400,
            'sanitize_callback' => 'bakery_shop_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
        'bakery_shop_slider_speeds',
        array(
            'label' => __( 'Slider Speed', 'bakery-shop' ),
            'section' => 'bakery_shop_slider_section_settings',
            'type' => 'text',
        )
    );
    
    /** Slider Pause */
    $wp_customize->add_setting(
        'bakery_shop_slider_pause',
        array(
            'default' => 6000,
            'sanitize_callback' => 'bakery_shop_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
        'bakery_shop_slider_pause',
        array(
            'label' => __( 'Slider Pause', 'bakery-shop' ),
            'section' => 'bakery_shop_slider_section_settings',
            'type' => 'text',
        )
    );
    
    for( $i=1; $i<=3; $i++){  
        /** Select Slider Post */
        $wp_customize->add_setting(
            'bakery_shop_slider_post_'.$i,
            array(
                'default' => $bakery_shop_default_post,
                'sanitize_callback' => 'bakery_shop_sanitize_select',
            )
        );
        
        $wp_customize->add_control(
            'bakery_shop_slider_post_'.$i,
            array(
                'label' => __( 'Select Post ', 'bakery-shop' ).$i,
                'section' => 'bakery_shop_slider_section_settings',
                'type' => 'select',
                'choices' => $bakery_shop_options_posts,
            )
        );
    }

     /** Slider Readmore */
    $wp_customize->add_setting(
        'bakery_shop_slider_readmore',
        array(
            'default' => __( 'Learn More', 'bakery-shop' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'bakery_shop_slider_readmore',
        array(
            'label' => __( 'Readmore Text', 'bakery-shop' ),
            'section' => 'bakery_shop_slider_section_settings',
            'type' => 'text',
        )
    );
    
    /** Slider Settings Ends */
    
}
add_action( 'customize_register', 'bakery_shop_customize_register_home' );

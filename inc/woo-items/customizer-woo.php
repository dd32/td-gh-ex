<?php
/**
 * BeShop Theme Customizer
 *
 * @package BeShop
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function beshopwoo_customize_register( $wp_customize ) {

	//select sanitization function
        function beshopwoo_sanitize_select( $input, $setting ){
            $input = sanitize_key($input);
            $choices = $setting->manager->get_control( $setting->id )->choices;
            return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
              
        }

    $wp_customize->add_section(
            'beshop_shop',
            array(
                'title'    => __( 'BeShop Settings', 'beshop' ),
                'priority' => 5,
                'panel'    => 'woocommerce',
            )
    );


     $wp_customize->add_setting('beshop_shop_container', array(
        'default'        => 'container',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'beshopwoo_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('beshop_shop_container', array(
        'label'      => __('Shop Container type', 'beshop'),
        'description'=> __('You can set standard container or full width container for shop. ', 'beshop'),
        'section'    => 'beshop_shop',
        'settings'   => 'beshop_shop_container',
        'type'       => 'select',
        'choices'    => array(
            'container' => __('Standard Container', 'beshop'),
            'container-fluid' => __('Full width Container', 'beshop'),
        ),
    ));
    $wp_customize->add_setting('beshop_shop_layout', array(
        'default'        => 'rightside',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'beshopwoo_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('beshop_shop_layout', array(
        'label'      => __('Select Shop Layout', 'beshop'),
        'description'=> __('Right and Left sidebar only show when shop sidebar widget is available. ', 'beshop'),
        'section'    => 'beshop_shop',
        'settings'   => 'beshop_shop_layout',
        'type'       => 'select',
        'choices'    => array(
            'rightside' => __('Right Sidebar', 'beshop'),
            'leftside' => __('Left Sidebar', 'beshop'),
            'fullwidth' => __('Full Width', 'beshop'),
        ),
    ));
        
    
   $wp_customize->add_setting('beshop_shop_title', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'default'       =>  esc_html__('Shop','beshop'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('beshop_shop_title', array(
        'label'      => __('Shop Page Title', 'beshop'),
        'description'     => esc_html__('Enter your shop page title. Leave empty if you don\'t want the title.','beshop'),
        'section'    => 'beshop_shop',
        'settings'   => 'beshop_shop_title',
        'type'       => 'text',
    ));
    $wp_customize->add_setting('beshop_title_position', array(
        'default'        => 'left',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'beshopwoo_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('beshop_title_position', array(
        'label'      => __('Title Position', 'beshop'),
        'section'    => 'beshop_shop',
        'settings'   => 'beshop_title_position',
        'type'       => 'select',
        'choices'    => array(
            'left' => __('Left', 'beshop'),
            'center' => __('Center', 'beshop'),
            'right' => __('Right', 'beshop'),
        ),
    ));
    $wp_customize->add_setting('beshop_titlecolor', array(
        'default' => '',
        'type' =>'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));
    // Add color control 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, 'beshop_titlecolor', array(
                'label' => __('Shop Title Color','beshop'),
                'section' => 'beshop_shop'
            )
        )
    );
    $wp_customize->add_setting( 'beshop_resultcount' , array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'       =>  '1',
    'sanitize_callback' => 'absint',
    'transport'     => 'refresh',
    ) );
    $wp_customize->add_control( 'beshop_resultcount', array(
        'label'      => __('Show Result Count? ', 'beshop'),
        'section'    => 'beshop_shop',
        'settings'   => 'beshop_resultcount',
        'type'       => 'checkbox',
    ) );
    $wp_customize->add_setting( 'beshop_porder' , array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'       =>  '1',
    'sanitize_callback' => 'absint',
    'transport'     => 'refresh',
    ) );
    $wp_customize->add_control( 'beshop_porder', array(
        'label'      => __('Show Products Order? ', 'beshop'),
        'section'    => 'beshop_shop',
        'settings'   => 'beshop_porder',
        'type'       => 'checkbox',
    ) );
    $wp_customize->add_setting('beshop_shop_column', array(
        'default'        => '4',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'beshopwoo_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('beshop_shop_column', array(
        'label'      => __('Set Product Per row', 'beshop'),
        'section'    => 'beshop_shop',
        'settings'   => 'beshop_shop_column',
        'type'       => 'select',
        'choices'    => array(
            '5' => __('Five Products', 'beshop'),
            '4' => __('Four Products', 'beshop'),
            '3' => __('Three Products', 'beshop'),
            '2' => __('Two Products', 'beshop'),
        ),
    ));
    $wp_customize->add_setting('beshop_shop_style', array(
        'default'        => '1',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'beshopwoo_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('beshop_shop_style', array(
        'label'      => __('Select Products Style', 'beshop'),
        'section'    => 'beshop_shop',
        'settings'   => 'beshop_shop_style',
        'type'       => 'select',
        'choices'    => array(
            '1' => __('Style One', 'beshop'),
            '2' => __('Style Two', 'beshop'),
        ),
    ));
    $wp_customize->add_setting('beshop_product_bgcolor', array(
        'default' => '',
        'type' =>'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));
    // Add color control 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, 'beshop_product_bgcolor', array(
                'label' => __('Products Background Color','beshop'),
                'section' => 'beshop_shop'
            )
        )
    );
    $wp_customize->add_setting('beshop_ptitle_color', array(
        'default' => '',
        'type' =>'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));
    // Add color control 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, 'beshop_ptitle_color', array(
                'label' => __('Products Title Color','beshop'),
                'section' => 'beshop_shop'
            )
        )
    );
    $wp_customize->add_setting('beshop_pprice_color', array(
        'default' => '',
        'type' =>'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));
    // Add color control 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, 'beshop_pprice_color', array(
                'label' => __('Products Price Color','beshop'),
                'section' => 'beshop_shop'
            )
        )
    );
    $wp_customize->add_setting('beshop_pbtn_bgcolor', array(
        'default' => '',
        'type' =>'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));
    // Add color control 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, 'beshop_pbtn_bgcolor', array(
                'label' => __('Products button background color','beshop'),
                'section' => 'beshop_shop'
            )
        )
    );
    $wp_customize->add_setting('beshop_pbtn_hvbgcolor', array(
        'default' => '',
        'type' =>'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));
    // Add color control 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, 'beshop_pbtn_hvbgcolor', array(
                'label' => __('Products button hover background color','beshop'),
                'section' => 'beshop_shop'
            )
        )
    );
    $wp_customize->add_setting('beshop_pbtn_color', array(
        'default' => '',
        'type' =>'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));
    // Add color control 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, 'beshop_pbtn_color', array(
                'label' => __('Products button color','beshop'),
                'section' => 'beshop_shop'
            )
        )
    );
    $wp_customize->add_setting('beshop_pbtn_hvcolor', array(
        'default' => '',
        'type' =>'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
    ));
    // Add color control 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, 'beshop_pbtn_hvcolor', array(
                'label' => __('Products button hover color','beshop'),
                'section' => 'beshop_shop'
            )
        )
    );

       


}
add_action( 'customize_register', 'beshopwoo_customize_register' );


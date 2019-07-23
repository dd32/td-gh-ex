<?php
/**
 * Best_Charity Header Settings panel at Theme Customizer
 *
 * @package Best_Charity
 * @since 1.0.0
 */

add_action( 'customize_register', 'best_charity_header_settings_register' );

function best_charity_header_settings_register( $wp_customize ) {
  require get_template_directory() .'/inc/repeater/class-repeater-settings.php';
  require get_template_directory() .'/inc/repeater/class-control-repeater.php';
  $wp_customize->get_section( 'header_image' )->priority = '20';
  $wp_customize->get_section( 'header_image' )->title    = __( 'Header Image', 'best-charity' );
  $wp_customize->get_section( 'header_image' )->panel    = 'best_charity_header_settings_panel';

    $wp_customize->add_panel(
     'best_charity_header_settings_panel',
     array(
         'priority'       => 10,
         'capability'     => 'edit_theme_options',
         'theme_supports' => '',
         'title'          => __( 'Header Settings', 'best-charity' ),
     )
 );


    $wp_customize->add_section(
        'best_charity_top_header_section',
        array(
        	'priority'       => 5,
        	'panel'          => 'best_charity_header_settings_panel',
        	'capability'     => 'edit_theme_options',
        	'theme_supports' => '',
            'title'          => __( 'Top Header Section', 'best-charity' ),
            'description'    => __( 'Managed the content display at top header section.', 'best-charity' ),
        )
    );

    $wp_customize->add_setting(
        'best_charity_top_header_enable',
        array(
            'default'           => 1,
            'sanitize_callback' => 'best_charity_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'best_charity_top_header_enable',
        array(
            'section'     => 'best_charity_top_header_section',
            'label'       => __( 'Enable/Disable top header', 'best-charity' ),
            'type'        => 'checkbox'
        )       
    );

  
    $wp_customize->add_setting(
        'best_charity_top_header_search_form_enable',
        array(
            'default'           => 1,
            'sanitize_callback' => 'best_charity_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'best_charity_top_header_search_form_enable',
        array(
            'section'     => 'best_charity_top_header_section',
            'label'       => __( 'Enable/Disable Search Form', 'best-charity' ),
            'type'        => 'checkbox'
        )       
    );

    $wp_customize->add_setting( 
        new Best_Charity_Repeater_Setting( 
            $wp_customize, 
            'top_header_contact_info_items', 
            array(
                'default' => array(
                    array(
                        'icon' => 'fa fa-phone',
                        'title' => esc_html__('+ (123) 456 7890', 'best-charity'),
                    ),
                    array(
                        'icon' => 'fa fa-envelope',
                        'title' => 'info.demo@email.com',
                    )
                ),
                'sanitize_callback' => array( 'Best_Charity_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );

    $wp_customize->add_control(
        new Best_Charity_Control_Repeater(
            $wp_customize,
            'top_header_contact_info_items',
            array(
                'section' => 'best_charity_top_header_section',              
                'label'   => __( 'Top Header Contact items', 'best-charity' ),
                'fields'  => array(
                    'icon' => array(
                        'type'        => 'font',
                        'label'       => __( 'Font Awesome Icon', 'best-charity' ),
                    ),
                    'title' => array(
                        'type'        => 'text',
                        'label'       => __( 'Location Title', 'best-charity' ),
                    )
                ),
                'row_label' => array(
                    'type' => 'field',
                    'value' => __( 'contact', 'best-charity' ),
                    'field' => 'title'
                )                        
            )
        )
    );

}
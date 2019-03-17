<?php
/**
 * Tabs test file
 *
 * @package Arrival
 * @since 1.0.1
 */


function arrival_tabs_customize_register( $wp_customize ) {

if ( class_exists( 'Arrival_Customize_Control_Tabs' ) ) {

$prefix = 'arrival';
		
/**
* Top header tabs
*
*/
$wp_customize->add_setting( $prefix.'_top_header_tabs', array(
                'sanitize_callback' => 'sanitize_text_field',
            ));

$wp_customize->add_control( new Arrival_Customize_Control_Tabs( $wp_customize, $prefix.'_top_header_tabs', array(
                    'section' => $prefix.'_top_header_options',
                    'tabs'    => array(

                        'general' => array(
                            'nicename' => esc_html__( 'General', 'arrival' ),
                            'icon'     => 'cogs',
                            'controls' => array(
                                
                                $prefix.'_top_header_enable',
                                $prefix.'_top_left_options',
                                $prefix.'_top_header_email',
                                $prefix.'_top_header_phone',
                                $prefix.'_top_right_options',
                                $prefix.'_top_right_header_content',
                                $prefix.'_top_social_redirect_btn',
                                $prefix.'_top_right_header_menus'
                            ),
                        ),

                        'styles' => array(
                            'nicename' => esc_html__( 'Styles', 'arrival' ),
                            'icon'     => 'desktop',
                            'controls' => array(
                                $prefix.'_top_header_bg_color',
                                $prefix.'_top_header_txt_color',
                                $prefix.'_top_header_colors_info'
                                
                            ),
                        ),
                       
                    ),
                )
            )
        );


/**
* main navigation header tabs
*
*/
$wp_customize->add_setting( $prefix.'_main_nav_header_tabs', array(
                'sanitize_callback' => 'sanitize_text_field',
            ));

$wp_customize->add_control( new Arrival_Customize_Control_Tabs( $wp_customize, $prefix.'_main_nav_header_tabs', array(
                    'section' => $prefix.'_main_header_options_panel',
                    'tabs'    => array(

                        'general' => array(
                            'nicename' => esc_html__( 'General', 'arrival' ),
                            'icon'     => 'cogs',
                            'controls' => array(
                                
                                $prefix.'_main_nav_layout',
                                $prefix.'_nav_last_item_sep',
                                $prefix.'_main_nav_right_content',
                                $prefix.'_main_nav_right_btn',
                                $prefix.'_single_nav_enable_sep',
                                $prefix.'_one_page_menus'
                            ),
                        ),

                        'styles' => array(
                            'nicename' => esc_html__( 'Styles', 'arrival' ),
                            'icon'     => 'desktop',
                            'controls' => array(
                                $prefix.'_main_nav_bg_color',
                                $prefix.'_main_nav_menu_color',
                                $prefix.'_main_nav_menu_color_hover',
                                $prefix.'_nav_header_padding',
                                $prefix.'_main_header_colors_info',
                                $prefix.'_nav_font_weight'
                                
                            ),
                        ),
                       
                    ),
                )
            )
        );



/**
* Footer section tabs
*
*/
$wp_customize->add_setting( $prefix.'_footer_control_tabs', array(
                'sanitize_callback' => 'sanitize_text_field',
            ));

$wp_customize->add_control( new Arrival_Customize_Control_Tabs( $wp_customize, $prefix.'_footer_control_tabs', array(
                    'section' => $prefix.'_footer_settings',
                    'tabs'    => array(

                        'general' => array(
                            'nicename' => esc_html__( 'General', 'arrival' ),
                            'icon'     => 'cogs',
                            'controls' => array(
                                
                                $prefix.'_footer_widget_enable',
                                $prefix.'_footer_copyright_text',
                                $prefix.'_footer_icons_enable',
                                $prefix.'_footer_social_redirect_btn'
                            ),
                        ),

                        'styles' => array(
                            'nicename' => esc_html__( 'Styles', 'arrival' ),
                            'icon'     => 'desktop',
                            'controls' => array(
                                $prefix.'_footer_bg_color',
                                $prefix.'_footer_copyright_border_top',
                                $prefix.'_footer_settings_info'
                                
                            ),
                        ),
                       
                    ),
                )
            )
        );


		
	}

}
add_action( 'customize_register', 'arrival_tabs_customize_register' );

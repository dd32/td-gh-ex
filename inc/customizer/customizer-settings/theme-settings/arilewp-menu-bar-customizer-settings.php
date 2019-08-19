<?php
/**
 * MenuBar.
 *
 * @package arilewp
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'ArileWP_Customize_Menu_Bar_Option' ) ) :

	/**
	 * Menu option.
	 */
	class ArileWP_Customize_Menu_Bar_Option extends ArileWP_Customize_Base_Option {

		public function elements() {

			return array(
			
			    'arilewp_main_menu_heading' => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
				   		'priority'        => 1,
						'label'   => esc_html__( 'Menu Settings', 'arilewp' ),
						'section' => 'arilewp_theme_menu_bar',
					),
				),


					'arilewp_menu_style' => array(
						'setting' => array(
							'default'           => 'sticky',
							'sanitize_callback' => array( 'ArileWP_Customizer_Sanitize', 'sanitize_radio' ),
						),
						'control' => array(
							'type'            => 'radio',
							'priority'        => 5,
							'is_default_type' => true,
							'label'           => esc_html__( 'Menu Style', 'arilewp' ),
							'section'         => 'arilewp_theme_menu_bar',
							'choices'         => array(
								'sticky'  => esc_html__( 'Sticky', 'arilewp' ),
								'static' => esc_html__( 'Static', 'arilewp' ),
							),
						),
					),	
					
					
					'arilewp_menu_container_size' => array(
						'setting' => array(
							'default'           => 'container-full',
							'sanitize_callback' => array( 'ArileWP_Customizer_Sanitize', 'sanitize_radio' ),
						),
						'control' => array(
							'type'            => 'radio',
							'priority'        => 7,
							'is_default_type' => true,
							'label'           => esc_html__( 'Container Width', 'arilewp' ),
							'section'         => 'arilewp_theme_menu_bar',
							'choices'         => array(
								'container'  => esc_html__( 'Container', 'arilewp' ),
								'container-full' => esc_html__( 'Container Full', 'arilewp' ),
							),
						),
			     	),
					
				  
			    'arilewp_main_menu_item_heading' => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
				   		'priority'        => 20,
						'label'   => esc_html__( 'Menu Items', 'arilewp' ),
						'section' => 'arilewp_theme_menu_bar',
					),
				),
					
					'arilewp_cart_icon_disabled' => array(
						'setting' => array(
							'default'           => false,
							'sanitize_callback' => array( 'ArileWP_Customizer_Sanitize', 'sanitize_checkbox' ),
						),
						'control' => array(
							'type'     => 'toggle',
							'priority' => 30,
							'label'    => esc_html__( 'Cart Icon Enable/Disable', 'arilewp' ),
							'section'  => 'arilewp_theme_menu_bar',
						),
					),

			);

		}

	}

	new ArileWP_Customize_Menu_Bar_Option();

endif;
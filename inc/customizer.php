<?php
/**
 * Builds our Customizer controls.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'customize_register', 'asagi_set_customizer_helpers', 1 );
/**
 * Set up helpers early so they're always available.
 * Other modules might need access to them at some point.
 *
 */
function asagi_set_customizer_helpers( $wp_customize ) {
	// Load helpers
	require_once trailingslashit( get_template_directory() ) . 'inc/customizer/customizer-helpers.php';
}

if ( ! function_exists( 'asagi_customize_register' ) ) {
	add_action( 'customize_register', 'asagi_customize_register' );
	/**
	 * Add our base options to the Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	function asagi_customize_register( $wp_customize ) {
		// Get our default values
		$defaults = asagi_get_defaults();

		// Load helpers
		require_once trailingslashit( get_template_directory() ) . 'inc/customizer/customizer-helpers.php';

		if ( $wp_customize->get_control( 'blogdescription' ) ) {
			$wp_customize->get_control('blogdescription')->priority = 3;
			$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
		}

		if ( $wp_customize->get_control( 'blogname' ) ) {
			$wp_customize->get_control('blogname')->priority = 1;
			$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		}

		if ( $wp_customize->get_control( 'custom_logo' ) ) {
			$wp_customize->get_setting( 'custom_logo' )->transport = 'refresh';
		}

		// Add control types so controls can be built using JS
		if ( method_exists( $wp_customize, 'register_control_type' ) ) {
			$wp_customize->register_control_type( 'Asagi_Customize_Misc_Control' );
			$wp_customize->register_control_type( 'Asagi_Range_Slider_Control' );
		}

		// Add upsell section type
		if ( method_exists( $wp_customize, 'register_section_type' ) ) {
			$wp_customize->register_section_type( 'Asagi_Upsell_Section' );
		}

		// Add selective refresh to site title and description
		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'blogname', array(
				'selector' => '.main-title a',
				'render_callback' => 'asagi_customize_partial_blogname',
			) );

			$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
				'selector' => '.site-description',
				'render_callback' => 'asagi_customize_partial_blogdescription',
			) );
		}

		// Remove title
		$wp_customize->add_setting(
			'asagi_settings[hide_title]',
			array(
				'default' => $defaults['hide_title'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_checkbox'
			)
		);

		$wp_customize->add_control(
			'asagi_settings[hide_title]',
			array(
				'type' => 'checkbox',
				'label' => __( 'Hide site title', 'asagi' ),
				'section' => 'title_tagline',
				'priority' => 2
			)
		);

		// Remove tagline
		$wp_customize->add_setting(
			'asagi_settings[hide_tagline]',
			array(
				'default' => $defaults['hide_tagline'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_checkbox'
			)
		);

		$wp_customize->add_control(
			'asagi_settings[hide_tagline]',
			array(
				'type' => 'checkbox',
				'label' => __( 'Hide site tagline', 'asagi' ),
				'section' => 'title_tagline',
				'priority' => 4
			)
		);

		// Only show this option if we're not using WordPress 4.5
		if ( ! function_exists( 'the_custom_logo' ) ) {
			$wp_customize->add_setting(
				'asagi_settings[logo]',
				array(
					'type' => 'option',
					'sanitize_callback' => 'esc_url_raw'
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'asagi_settings[logo]',
					array(
						'label' => __( 'Logo', 'asagi' ),
						'section' => 'title_tagline',
						'settings' => 'asagi_settings[logo]'
					)
				)
			);
		}

		$wp_customize->add_setting(
			'asagi_settings[retina_logo]',
			array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'asagi_settings[retina_logo]',
				array(
					'label' => __( 'Retina Logo', 'asagi' ),
					'section' => 'title_tagline',
					'settings' => 'asagi_settings[retina_logo]',
					'active_callback' => 'asagi_has_custom_logo_callback'
				)
			)
		);

		$wp_customize->add_setting(
			'asagi_settings[text_color]', array(
				'default' => $defaults['text_color'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_hex_color',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'asagi_settings[text_color]',
				array(
					'label' => __( 'Text Color', 'asagi' ),
					'section' => 'colors',
					'settings' => 'asagi_settings[text_color]'
				)
			)
		);

		$wp_customize->add_setting(
			'asagi_settings[link_color]', array(
				'default' => $defaults['link_color'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_hex_color',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'asagi_settings[link_color]',
				array(
					'label' => __( 'Link Color', 'asagi' ),
					'section' => 'colors',
					'settings' => 'asagi_settings[link_color]'
				)
			)
		);

		$wp_customize->add_setting(
			'asagi_settings[link_color_hover]', array(
				'default' => $defaults['link_color_hover'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_hex_color',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'asagi_settings[link_color_hover]',
				array(
					'label' => __( 'Link Color Hover', 'asagi' ),
					'section' => 'colors',
					'settings' => 'asagi_settings[link_color_hover]'
				)
			)
		);

		$wp_customize->add_setting(
			'asagi_settings[link_color_visited]', array(
				'default' => $defaults['link_color_visited'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_hex_color',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'asagi_settings[link_color_visited]',
				array(
					'label' => __( 'Link Color Visited', 'asagi' ),
					'section' => 'colors',
					'settings' => 'asagi_settings[link_color_visited]'
				)
			)
		);

		if ( ! function_exists( 'asagi_colors_customize_register' ) && ! defined( 'ASAGI_PREMIUM_VERSION' ) ) {
			$wp_customize->add_control(
				new Asagi_Customize_Misc_Control(
					$wp_customize,
					'colors_get_addon_desc',
					array(
						'section' => 'colors',
						'type' => 'addon',
						'label' => __( 'More info', 'asagi' ),
						'description' => __( 'More colors are available in Asagi premium version. Visit WPKoi for more info.', 'asagi' ),
						'url' => ASAGI_THEME_URL,
						'priority' => 30,
						'settings' => ( isset( $wp_customize->selective_refresh ) ) ? array() : 'blogname'
					)
				)
			);
		}

		if ( class_exists( 'WP_Customize_Panel' ) ) {
			if ( ! $wp_customize->get_panel( 'asagi_layout_panel' ) ) {
				$wp_customize->add_panel( 'asagi_layout_panel', array(
					'priority' => 25,
					'title' => __( 'Layout', 'asagi' ),
				) );
			}
		}

		// Add Layout section
		$wp_customize->add_section(
			'asagi_layout_container',
			array(
				'title' => __( 'Container', 'asagi' ),
				'priority' => 10,
				'panel' => 'asagi_layout_panel'
			)
		);

		// Container width
		$wp_customize->add_setting(
			'asagi_settings[container_width]',
			array(
				'default' => $defaults['container_width'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_integer',
				'transport' => 'postMessage'
			)
		);

		$wp_customize->add_control(
			new Asagi_Range_Slider_Control(
				$wp_customize,
				'asagi_settings[container_width]',
				array(
					'type' => 'asagi-range-slider',
					'label' => __( 'Container Width', 'asagi' ),
					'section' => 'asagi_layout_container',
					'settings' => array(
						'desktop' => 'asagi_settings[container_width]',
					),
					'choices' => array(
						'desktop' => array(
							'min' => 700,
							'max' => 2000,
							'step' => 5,
							'edit' => true,
							'unit' => 'px',
						),
					),
					'priority' => 0,
				)
			)
		);

		// Add Top Bar section
		$wp_customize->add_section(
			'asagi_top_bar',
			array(
				'title' => __( 'Top Bar', 'asagi' ),
				'priority' => 15,
				'panel' => 'asagi_layout_panel',
			)
		);

		// Add Top Bar width
		$wp_customize->add_setting(
			'asagi_settings[top_bar_width]',
			array(
				'default' => $defaults['top_bar_width'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add Top Bar width control
		$wp_customize->add_control(
			'asagi_settings[top_bar_width]',
			array(
				'type' => 'select',
				'label' => __( 'Top Bar Width', 'asagi' ),
				'section' => 'asagi_top_bar',
				'choices' => array(
					'full' => __( 'Full', 'asagi' ),
					'contained' => __( 'Contained', 'asagi' )
				),
				'settings' => 'asagi_settings[top_bar_width]',
				'priority' => 5,
				'active_callback' => 'asagi_is_top_bar_active',
			)
		);

		// Add Top Bar inner width
		$wp_customize->add_setting(
			'asagi_settings[top_bar_inner_width]',
			array(
				'default' => $defaults['top_bar_inner_width'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add Top Bar width control
		$wp_customize->add_control(
			'asagi_settings[top_bar_inner_width]',
			array(
				'type' => 'select',
				'label' => __( 'Top Bar Inner Width', 'asagi' ),
				'section' => 'asagi_top_bar',
				'choices' => array(
					'full' => __( 'Full', 'asagi' ),
					'contained' => __( 'Contained', 'asagi' )
				),
				'settings' => 'asagi_settings[top_bar_inner_width]',
				'priority' => 10,
				'active_callback' => 'asagi_is_top_bar_active',
			)
		);

		// Add top bar alignment
		$wp_customize->add_setting(
			'asagi_settings[top_bar_alignment]',
			array(
				'default' => $defaults['top_bar_alignment'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add navigation control
		$wp_customize->add_control(
			'asagi_settings[top_bar_alignment]',
			array(
				'type' => 'select',
				'label' => __( 'Top Bar Alignment', 'asagi' ),
				'section' => 'asagi_top_bar',
				'choices' => array(
					'left' => __( 'Left', 'asagi' ),
					'center' => __( 'Center', 'asagi' ),
					'right' => __( 'Right', 'asagi' )
				),
				'settings' => 'asagi_settings[top_bar_alignment]',
				'priority' => 15,
				'active_callback' => 'asagi_is_top_bar_active',
			)
		);

		// Add Header section
		$wp_customize->add_section(
			'asagi_layout_header',
			array(
				'title' => __( 'Header', 'asagi' ),
				'priority' => 20,
				'panel' => 'asagi_layout_panel'
			)
		);

		// Add Header Layout setting
		$wp_customize->add_setting(
			'asagi_settings[header_layout_setting]',
			array(
				'default' => $defaults['header_layout_setting'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add Header Layout control
		$wp_customize->add_control(
			'asagi_settings[header_layout_setting]',
			array(
				'type' => 'select',
				'label' => __( 'Header Width', 'asagi' ),
				'section' => 'asagi_layout_header',
				'choices' => array(
					'fluid-header' => __( 'Full', 'asagi' ),
					'contained-header' => __( 'Contained', 'asagi' )
				),
				'settings' => 'asagi_settings[header_layout_setting]',
				'priority' => 5
			)
		);

		// Add Inside Header Layout setting
		$wp_customize->add_setting(
			'asagi_settings[header_inner_width]',
			array(
				'default' => $defaults['header_inner_width'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add Header Layout control
		$wp_customize->add_control(
			'asagi_settings[header_inner_width]',
			array(
				'type' => 'select',
				'label' => __( 'Inner Header Width', 'asagi' ),
				'section' => 'asagi_layout_header',
				'choices' => array(
					'contained' => __( 'Contained', 'asagi' ),
					'full-width' => __( 'Full', 'asagi' )
				),
				'settings' => 'asagi_settings[header_inner_width]',
				'priority' => 6
			)
		);

		// Add navigation setting
		$wp_customize->add_setting(
			'asagi_settings[header_alignment_setting]',
			array(
				'default' => $defaults['header_alignment_setting'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add navigation control
		$wp_customize->add_control(
			'asagi_settings[header_alignment_setting]',
			array(
				'type' => 'select',
				'label' => __( 'Header Alignment', 'asagi' ),
				'section' => 'asagi_layout_header',
				'choices' => array(
					'left' => __( 'Left', 'asagi' ),
					'center' => __( 'Center', 'asagi' ),
					'right' => __( 'Right', 'asagi' )
				),
				'settings' => 'asagi_settings[header_alignment_setting]',
				'priority' => 10
			)
		);

		$wp_customize->add_section(
			'asagi_layout_navigation',
			array(
				'title' => __( 'Primary Navigation', 'asagi' ),
				'priority' => 30,
				'panel' => 'asagi_layout_panel'
			)
		);

		// Add navigation setting
		$wp_customize->add_setting(
			'asagi_settings[nav_layout_setting]',
			array(
				'default' => $defaults['nav_layout_setting'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add navigation control
		$wp_customize->add_control(
			'asagi_settings[nav_layout_setting]',
			array(
				'type' => 'select',
				'label' => __( 'Navigation Width', 'asagi' ),
				'section' => 'asagi_layout_navigation',
				'choices' => array(
					'fluid-nav' => __( 'Full', 'asagi' ),
					'contained-nav' => __( 'Contained', 'asagi' )
				),
				'settings' => 'asagi_settings[nav_layout_setting]',
				'priority' => 15
			)
		);

		// Add navigation setting
		$wp_customize->add_setting(
			'asagi_settings[nav_inner_width]',
			array(
				'default' => $defaults['nav_inner_width'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add navigation control
		$wp_customize->add_control(
			'asagi_settings[nav_inner_width]',
			array(
				'type' => 'select',
				'label' => __( 'Inner Navigation Width', 'asagi' ),
				'section' => 'asagi_layout_navigation',
				'choices' => array(
					'contained' => __( 'Contained', 'asagi' ),
					'full-width' => __( 'Full', 'asagi' )
				),
				'settings' => 'asagi_settings[nav_inner_width]',
				'priority' => 16
			)
		);

		// Add navigation setting
		$wp_customize->add_setting(
			'asagi_settings[nav_alignment_setting]',
			array(
				'default' => $defaults['nav_alignment_setting'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add navigation control
		$wp_customize->add_control(
			'asagi_settings[nav_alignment_setting]',
			array(
				'type' => 'select',
				'label' => __( 'Navigation Alignment', 'asagi' ),
				'section' => 'asagi_layout_navigation',
				'choices' => array(
					'left' => __( 'Left', 'asagi' ),
					'center' => __( 'Center', 'asagi' ),
					'right' => __( 'Right', 'asagi' )
				),
				'settings' => 'asagi_settings[nav_alignment_setting]',
				'priority' => 20
			)
		);

		// Add navigation setting
		$wp_customize->add_setting(
			'asagi_settings[nav_position_setting]',
			array(
				'default' => $defaults['nav_position_setting'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_choices',
				'transport' => ( '' !== asagi_get_setting( 'nav_position_setting' ) ) ? 'postMessage' : 'refresh'
			)
		);

		// Add navigation control
		$wp_customize->add_control(
			'asagi_settings[nav_position_setting]',
			array(
				'type' => 'select',
				'label' => __( 'Navigation Location', 'asagi' ),
				'section' => 'asagi_layout_navigation',
				'choices' => array(
					'nav-below-header' => __( 'Below Header', 'asagi' ),
					'nav-above-header' => __( 'Above Header', 'asagi' ),
					'nav-float-right' => __( 'Float Right', 'asagi' ),
					'nav-float-left' => __( 'Float Left', 'asagi' ),
					'nav-left-sidebar' => __( 'Left Sidebar', 'asagi' ),
					'nav-right-sidebar' => __( 'Right Sidebar', 'asagi' ),
					'' => __( 'No Navigation', 'asagi' )
				),
				'settings' => 'asagi_settings[nav_position_setting]',
				'priority' => 22
			)
		);

		// Add navigation setting
		$wp_customize->add_setting(
			'asagi_settings[nav_dropdown_type]',
			array(
				'default' => $defaults['nav_dropdown_type'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_choices'
			)
		);

		// Add navigation control
		$wp_customize->add_control(
			'asagi_settings[nav_dropdown_type]',
			array(
				'type' => 'select',
				'label' => __( 'Navigation Dropdown', 'asagi' ),
				'section' => 'asagi_layout_navigation',
				'choices' => array(
					'hover' => __( 'Hover', 'asagi' ),
					'click' => __( 'Click - Menu Item', 'asagi' ),
					'click-arrow' => __( 'Click - Arrow', 'asagi' )
				),
				'settings' => 'asagi_settings[nav_dropdown_type]',
				'priority' => 22
			)
		);

		// Add navigation setting
		$wp_customize->add_setting(
			'asagi_settings[nav_search]',
			array(
				'default' => $defaults['nav_search'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_choices'
			)
		);

		// Add navigation control
		$wp_customize->add_control(
			'asagi_settings[nav_search]',
			array(
				'type' => 'select',
				'label' => __( 'Navigation Search', 'asagi' ),
				'section' => 'asagi_layout_navigation',
				'choices' => array(
					'enable' => __( 'Enable', 'asagi' ),
					'disable' => __( 'Disable', 'asagi' )
				),
				'settings' => 'asagi_settings[nav_search]',
				'priority' => 23
			)
		);

		// Add content setting
		$wp_customize->add_setting(
			'asagi_settings[content_layout_setting]',
			array(
				'default' => $defaults['content_layout_setting'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add content control
		$wp_customize->add_control(
			'asagi_settings[content_layout_setting]',
			array(
				'type' => 'select',
				'label' => __( 'Content Layout', 'asagi' ),
				'section' => 'asagi_layout_container',
				'choices' => array(
					'separate-containers' => __( 'Separate Containers', 'asagi' ),
					'one-container' => __( 'One Container', 'asagi' )
				),
				'settings' => 'asagi_settings[content_layout_setting]',
				'priority' => 25
			)
		);

		$wp_customize->add_section(
			'asagi_layout_sidebars',
			array(
				'title' => __( 'Sidebars', 'asagi' ),
				'priority' => 40,
				'panel' => 'asagi_layout_panel'
			)
		);

		// Add Layout setting
		$wp_customize->add_setting(
			'asagi_settings[layout_setting]',
			array(
				'default' => $defaults['layout_setting'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_choices'
			)
		);

		// Add Layout control
		$wp_customize->add_control(
			'asagi_settings[layout_setting]',
			array(
				'type' => 'select',
				'label' => __( 'Sidebar Layout', 'asagi' ),
				'section' => 'asagi_layout_sidebars',
				'choices' => array(
					'left-sidebar' => __( 'Sidebar / Content', 'asagi' ),
					'right-sidebar' => __( 'Content / Sidebar', 'asagi' ),
					'no-sidebar' => __( 'Content (no sidebars)', 'asagi' ),
					'both-sidebars' => __( 'Sidebar / Content / Sidebar', 'asagi' ),
					'both-left' => __( 'Sidebar / Sidebar / Content', 'asagi' ),
					'both-right' => __( 'Content / Sidebar / Sidebar', 'asagi' )
				),
				'settings' => 'asagi_settings[layout_setting]',
				'priority' => 30
			)
		);

		// Add Layout setting
		$wp_customize->add_setting(
			'asagi_settings[blog_layout_setting]',
			array(
				'default' => $defaults['blog_layout_setting'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_choices'
			)
		);

		// Add Layout control
		$wp_customize->add_control(
			'asagi_settings[blog_layout_setting]',
			array(
				'type' => 'select',
				'label' => __( 'Blog Sidebar Layout', 'asagi' ),
				'section' => 'asagi_layout_sidebars',
				'choices' => array(
					'left-sidebar' => __( 'Sidebar / Content', 'asagi' ),
					'right-sidebar' => __( 'Content / Sidebar', 'asagi' ),
					'no-sidebar' => __( 'Content (no sidebars)', 'asagi' ),
					'both-sidebars' => __( 'Sidebar / Content / Sidebar', 'asagi' ),
					'both-left' => __( 'Sidebar / Sidebar / Content', 'asagi' ),
					'both-right' => __( 'Content / Sidebar / Sidebar', 'asagi' )
				),
				'settings' => 'asagi_settings[blog_layout_setting]',
				'priority' => 35
			)
		);

		// Add Layout setting
		$wp_customize->add_setting(
			'asagi_settings[single_layout_setting]',
			array(
				'default' => $defaults['single_layout_setting'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_choices'
			)
		);

		// Add Layout control
		$wp_customize->add_control(
			'asagi_settings[single_layout_setting]',
			array(
				'type' => 'select',
				'label' => __( 'Single Post Sidebar Layout', 'asagi' ),
				'section' => 'asagi_layout_sidebars',
				'choices' => array(
					'left-sidebar' => __( 'Sidebar / Content', 'asagi' ),
					'right-sidebar' => __( 'Content / Sidebar', 'asagi' ),
					'no-sidebar' => __( 'Content (no sidebars)', 'asagi' ),
					'both-sidebars' => __( 'Sidebar / Content / Sidebar', 'asagi' ),
					'both-left' => __( 'Sidebar / Sidebar / Content', 'asagi' ),
					'both-right' => __( 'Content / Sidebar / Sidebar', 'asagi' )
				),
				'settings' => 'asagi_settings[single_layout_setting]',
				'priority' => 36
			)
		);

		$wp_customize->add_section(
			'asagi_layout_footer',
			array(
				'title' => __( 'Footer', 'asagi' ),
				'priority' => 50,
				'panel' => 'asagi_layout_panel'
			)
		);

		// Add footer setting
		$wp_customize->add_setting(
			'asagi_settings[footer_layout_setting]',
			array(
				'default' => $defaults['footer_layout_setting'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add content control
		$wp_customize->add_control(
			'asagi_settings[footer_layout_setting]',
			array(
				'type' => 'select',
				'label' => __( 'Footer Width', 'asagi' ),
				'section' => 'asagi_layout_footer',
				'choices' => array(
					'fluid-footer' => __( 'Full', 'asagi' ),
					'contained-footer' => __( 'Contained', 'asagi' )
				),
				'settings' => 'asagi_settings[footer_layout_setting]',
				'priority' => 40
			)
		);

		// Add footer setting
		$wp_customize->add_setting(
			'asagi_settings[footer_inner_width]',
			array(
				'default' => $defaults['footer_inner_width'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add content control
		$wp_customize->add_control(
			'asagi_settings[footer_inner_width]',
			array(
				'type' => 'select',
				'label' => __( 'Inner Footer Width', 'asagi' ),
				'section' => 'asagi_layout_footer',
				'choices' => array(
					'contained' => __( 'Contained', 'asagi' ),
					'full-width' => __( 'Full', 'asagi' )
				),
				'settings' => 'asagi_settings[footer_inner_width]',
				'priority' => 41
			)
		);

		// Add footer widget setting
		$wp_customize->add_setting(
			'asagi_settings[footer_widget_setting]',
			array(
				'default' => $defaults['footer_widget_setting'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add footer widget control
		$wp_customize->add_control(
			'asagi_settings[footer_widget_setting]',
			array(
				'type' => 'select',
				'label' => __( 'Footer Widgets', 'asagi' ),
				'section' => 'asagi_layout_footer',
				'choices' => array(
					'0' => '0',
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5'
				),
				'settings' => 'asagi_settings[footer_widget_setting]',
				'priority' => 45
			)
		);

		// Copyright
		$wp_customize->add_setting(
			'asagi_settings[footer_copyright]',
			array(
				'default' => $defaults['footer_copyright'],
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'asagi_settings[footer_copyright]',
			array(
				'type' 		 => 'textarea',
				'label'      => __( 'Copyright', 'asagi' ),
				'section'    => 'asagi_layout_footer',
				'settings'   => 'asagi_settings[footer_copyright]',
				'priority' => 50,
			)
		);

		// Add footer widget setting
		$wp_customize->add_setting(
			'asagi_settings[footer_bar_alignment]',
			array(
				'default' => $defaults['footer_bar_alignment'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_choices',
				'transport' => 'postMessage'
			)
		);

		// Add footer widget control
		$wp_customize->add_control(
			'asagi_settings[footer_bar_alignment]',
			array(
				'type' => 'select',
				'label' => __( 'Footer Bar Alignment', 'asagi' ),
				'section' => 'asagi_layout_footer',
				'choices' => array(
					'left' => __( 'Left','asagi' ),
					'center' => __( 'Center','asagi' ),
					'right' => __( 'Right','asagi' )
				),
				'settings' => 'asagi_settings[footer_bar_alignment]',
				'priority' => 47,
				'active_callback' => 'asagi_is_footer_bar_active'
			)
		);

		// Add back to top setting
		$wp_customize->add_setting(
			'asagi_settings[back_to_top]',
			array(
				'default' => $defaults['back_to_top'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_choices'
			)
		);

		// Add content control
		$wp_customize->add_control(
			'asagi_settings[back_to_top]',
			array(
				'type' => 'select',
				'label' => __( 'Back to Top Button', 'asagi' ),
				'section' => 'asagi_layout_footer',
				'choices' => array(
					'enable' => __( 'Enable', 'asagi' ),
					'' => __( 'Disable', 'asagi' )
				),
				'settings' => 'asagi_settings[back_to_top]',
				'priority' => 50
			)
		);

		// Add Layout section
		$wp_customize->add_section(
			'asagi_blog_section',
			array(
				'title' => __( 'Blog', 'asagi' ),
				'priority' => 55,
				'panel' => 'asagi_layout_panel'
			)
		);

		$wp_customize->add_setting(
			'asagi_settings[blog_header_image]',
			array(
				'default' => $defaults['blog_header_image'],
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'asagi_settings[blog_header_image]',
				array(
					'label' => __( 'Blog Header Image', 'asagi' ),
					'section' => 'asagi_blog_section',
					'settings' => 'asagi_settings[blog_header_image]',
				)
			)
		);

		// Add Layout setting
		$wp_customize->add_setting(
			'asagi_settings[post_content]',
			array(
				'default' => $defaults['post_content'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_blog_excerpt'
			)
		);

		// Add Layout control
		$wp_customize->add_control(
			'blog_content_control',
			array(
				'type' => 'select',
				'label' => __( 'Content Type', 'asagi' ),
				'section' => 'asagi_blog_section',
				'choices' => array(
					'full' => __( 'Full', 'asagi' ),
					'excerpt' => __( 'Excerpt', 'asagi' )
				),
				'settings' => 'asagi_settings[post_content]',
				'priority' => 10
			)
		);

		if ( ! function_exists( 'asagi_blog_customize_register' ) && ! defined( 'ASAGI_PREMIUM_VERSION' ) ) {
			$wp_customize->add_control(
				new Asagi_Customize_Misc_Control(
					$wp_customize,
					'blog_get_addon_desc',
					array(
						'section' => 'asagi_blog_section',
						'type' => 'addon',
						'label' => __( 'Learn more', 'asagi' ),
						'description' => __( 'More options are available for this section in our premium version.', 'asagi' ),
						'url' => ASAGI_THEME_URL,
						'priority' => 30,
						'settings' => ( isset( $wp_customize->selective_refresh ) ) ? array() : 'blogname'
					)
				)
			);
		}

		// Add Performance section
		$wp_customize->add_section(
			'asagi_general_section',
			array(
				'title' => __( 'General', 'asagi' ),
				'priority' => 99
			)
		);

		if ( ! apply_filters( 'asagi_fontawesome_essentials', false ) ) {
			$wp_customize->add_setting(
				'asagi_settings[font_awesome_essentials]',
				array(
					'default' => $defaults['font_awesome_essentials'],
					'type' => 'option',
					'sanitize_callback' => 'asagi_sanitize_checkbox'
				)
			);

			$wp_customize->add_control(
				'asagi_settings[font_awesome_essentials]',
				array(
					'type' => 'checkbox',
					'label' => __( 'Load essential icons only', 'asagi' ),
					'description' => __( 'Load essential Font Awesome icons instead of the full library.', 'asagi' ),
					'section' => 'asagi_general_section',
					'settings' => 'asagi_settings[font_awesome_essentials]',
				)
			);
		}

		// Add heder section
		$wp_customize->add_section(
			'asagi_header_section',
			array(
				'title' => __( 'Header', 'asagi' ),
				'priority' => 100
			)
		);

		$wp_customize->add_setting(
			'asagi_settings[header_date]',
			array(
				'default' => $defaults['header_date'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_checkbox'
			)
		);

		$wp_customize->add_control(
			'asagi_settings[header_date]',
			array(
				'type' => 'checkbox',
				'label' => __( 'Display date', 'asagi' ),
				'description' => __( 'Check if You want to display the time in the header.', 'asagi' ),
				'section' => 'asagi_header_section',
			)
		);
		$wp_customize->add_setting(
			'asagi_settings[header_date_format]',
			array(
				'default' => $defaults['header_date_format'],
				'type' => 'option',
				'sanitize_callback' => 'asagi_sanitize_date_format'
			)
		);

		$wp_customize->add_control(
			'asagi_settings[header_date_format]',
			array(
				'type' => 'select',
				'label' => __( 'Date Format', 'asagi' ),
				'section' => 'asagi_header_section',
				'choices' => array(
					'M d, Y' => __( 'Dec 31, 1999', 'asagi' ),
					'Y M d' => __( '1999 Dec 31', 'asagi' ),
					'Y.m.d.' => __( '1999.12.31.', 'asagi' ),
					'd F Y' => __( '12 December 1999', 'asagi' ),
					'd/m/Y' => __( '31/12/1999', 'asagi' )
				),
			)
		);
	}
}

if ( ! function_exists( 'asagi_customizer_live_preview' ) ) {
	add_action( 'customize_preview_init', 'asagi_customizer_live_preview', 100 );
	/**
	 * Add our live preview scripts
	 *
	 */
	function asagi_customizer_live_preview() {
		wp_enqueue_script( 'asagi-themecustomizer', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/controls/js/customizer-live-preview.js', array( 'customize-preview' ), ASAGI_VERSION, true );
	}
}

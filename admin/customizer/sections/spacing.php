<?php

if ( ! function_exists( 'weaverx_customizer_define_spacing_sections' ) ) :
	/**
	 * Define the sections and settings for the spacing panel
	 */

	function weaverx_customizer_define_spacing_sections() {
		$panel            = 'weaverx_spacing';
		$spacing_sections = array();

		// global settings

		if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard

			$spacing_sections['spacing-global'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Global Spacing Options', 'weaver-xtreme' ),
				'description' => esc_html__( 'Set global settings that affect spacing, width, and alignment.', 'weaver-xtreme' ),
				'options'     => array(

					'space-site-width' => weaverx_cz_group_title( esc_html__( 'Site Width and Full Width Options', 'weaver-xtreme' ),
						weaverx_filter_text( __( 'Set the global <strong>Site Width</strong> and <strong>Full Width</strong> options from the <em>Layout -> Site Width</em> menu.', 'weaver-xtreme' ) ) ),

					'smart_margin_int' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_float',
							'transport'         => 'refresh',
							'default'           => 1.0,
						),
						'control' => array(
							'control_type' => WEAVERX_PLUS_RANGE_CONTROL,
							'label'        => esc_html__( 'Smart Margin Width (%)', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
							'description'  => esc_html__( 'Width used for smart column margins for Sidebars and Content Area. (Default: 1%)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0.25,
								'max'  => 10.0,
								'step' => 0.25,
							),
						),
					),
				),
			);
		}

		/**
		 * General
		 */


		$container_width_transport = 'refresh';    // weaverx_getopt_checked( 'container_extend_width' ) ? 'refresh' : 'postMessage';
		$container_refresh         = WEAVERX_REFRESH_ICON;    //weaverx_getopt_checked( 'container_extend_width' ) ? WEAVERX_REFRESH_ICON : '';

		if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard
			$spacing_sections['spacing-wrapping'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Wrapping Areas', 'weaver-xtreme' ),
				'description' => esc_html__( 'Set margins, padding, spacing, heights, positioning, and widths for site wrapper and container.', 'weaver-xtreme' ),
				'options'     => array(


					'full_browser_height' => array(
						'setting' => array(),
						'control' => array(
							'label'       => __( 'Full Browser Height', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
							'description' => __( 'For short pages, add extra padding to  of content to force full browser height.', 'weaver-xtreme' ),
							'type'        => 'checkbox',
						),
					),

					// ------- WRAPPER

					'wrapper-space-heading' => weaverx_cz_group_title( weaverx_filter_text( __( 'Global Wrapper Area', 'weaver-xtreme' ) ),
						weaverx_filter_text( __( 'The Wrapper is the <div> that wraps entire site.', 'weaver-xtreme' ) ) ),

					'wrapper_padding_T' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Top Padding (px)', 'weaver-xtreme' ),
							'description'  => __( 'These options control the padding (inner space) around the area.', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'wrapper_padding_B' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Bottom Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'wrapper_padding_L' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Left Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'wrapper_padding_R' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Right Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),

					'wrapper_margin_T' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Top Margin (px) ) ', 'weaver-xtreme' ),
							'description'  => __( 'Set Top and Bottom Margins. <em>Side margins are auto-generated.</em>', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'wrapper_margin_B' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Bottom Margin (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),

					// ------- CONTAINER

					'container-space-heading' => weaverx_cz_group_title( esc_html__( 'Container Area', 'weaver-xtreme' ),
						esc_html__( 'The Container is the <div> that wraps the content. Does not include Header and Footer.', 'weaver-xtreme' ) ),

					'container_width_int'     => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_float', 'transport' => $container_width_transport, 'default' => 100 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Container Width (%)', 'weaver-xtreme' ) . $container_refresh,
							'description'  => __( 'Width of Area in % of enclosing area on desktop and small tablet. Hint: use with Container "Center align" setting. (Default: 100%, use 0 for auto)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 100,
								'step' => 0.5,
							),
						),
					),
					'container_max_width_int' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
						'control' => array(
							'control_type' => WEAVERX_PLUS_RANGE_CONTROL,
							'label'        => esc_html__( 'Container Area Max Width (px)', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
							'description'  => esc_html__( 'This advanced option allows you to set a maximum width for this area. This is not commonly used, but can make interesting designs, especially if you center align the area. Use 0 for no Max Width.', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 4000,
								'step' => 5,
							),
						),
					),

					'container_align' => weaverx_cz_select(
						__( 'Align Container Area', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_align', 'float-left', $container_width_transport
					),


					'container_padding_T' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Top Padding (px)', 'weaver-xtreme' ),
							'description'  => __( 'These options control the padding (inner space) around the area.', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'container_padding_B' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Bottom Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'container_padding_L' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => $container_width_transport,
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Left Padding (px)', 'weaver-xtreme' ) . $container_refresh,
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'container_padding_R' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => $container_width_transport,
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Right Padding (px)', 'weaver-xtreme' ) . $container_refresh,
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),

					'container_margin_T' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Top Margin (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'container_margin_B' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Bottom Margin (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),


				),
			);
		}


		/**
		 * Site Header
		 *
		 */

		$hdr_width_transport = weaverx_getopt_checked( 'header_extend_width' ) ? 'refresh' : 'postMessage';
		$hdr_refresh         = weaverx_getopt_checked( 'header_extend_width' ) ? WEAVERX_REFRESH_ICON : '';

		if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard
			$spacing_sections['spacing-header'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Header Area', 'weaver-xtreme' ),
				'description' => weaverx_filter_text( __( 'Set spacing for Header Area. Option groups include <span style="color:blue;">Site Header Area, Site Title and Tagline, Header Widget Area</span>, and <span style="color:blue;">Header HTML Area</span>.', 'weaver-xtreme' ) ),
				'options'     => array(
					'spacing-heading-header' => weaverx_cz_group_title( esc_html__( 'Site Header Area', 'weaver-xtreme' ),
						esc_html__( 'Spacing of the whole Header Area', 'weaver-xtreme' ) ),

					'header_width_int'     => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_float',
							'transport'         => $hdr_width_transport,
							'default'           => 100,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Header Area Width (%)', 'weaver-xtreme' ) . $hdr_refresh,
							'description'  => __( 'Width of Area in % of enclosing area on desktop and small tablet. Hint: use with Header "Center align" setting. (Default: 100%, use 0 for auto)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 100,
								'step' => 0.5,
							),
						),
					),
					'header_max_width_int' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
						'control' => array(
							'control_type' => WEAVERX_PLUS_RANGE_CONTROL,
							'label'        => esc_html__( 'Header Area Max Width (px)', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
							'description'  => esc_html__( 'This advanced option allows you to set a maximum width for this area. This is not commonly used, but can make interesting designs, especially if you center align the area.  Use 0 for no Max Width.', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 4000,
								'step' => 5,
							),
						),
					),

					'header_align' => weaverx_cz_select(
						__( 'Align Header Area', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_align', 'float-left', 'refresh'
					),

					'header_padding_T' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Top Padding (px)', 'weaver-xtreme' ),
							'description'  => __( 'These options control the padding (inner space) around the area.', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'header_padding_B' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Bottom Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'header_padding_L' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => $hdr_width_transport,
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Left Padding (px)', 'weaver-xtreme' ) . $hdr_refresh,
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'header_padding_R' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => $hdr_width_transport,
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Right Padding (px)', 'weaver-xtreme' ) . $hdr_refresh,
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),

					'header_margin_T' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Top Margin (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'header_margin_B' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Bottom Margin (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),

					// Title/tagline

					'spacing-title-header' => weaverx_cz_group_title( esc_html__( 'Site Title and Tagline', 'weaver-xtreme' ),
						esc_html__( 'Spacing for the Site Title and Tagline', 'weaver-xtreme' ) ),

					'title_over_image' => array(
						'setting' => array(),
						'control' => array(
							'label'       => __( 'Move Title/Tagline over Image', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
							'description' => __( 'Move the Title, Tagline, Search, Logo/HTML and Mini Menu over the Header Image. NOTE: Best to not use with Header Image as BG Image.',
								'weaver-xtreme' ),
							'type'        => 'checkbox',
						),
					),

					'spacing-titleposition' => weaverx_cz_heading( esc_html__( 'Title Position', 'weaver-xtreme' ),
						esc_html__( 'Adjust left and top margins for Title. Decimal and negative values allowed.', 'weaver-xtreme' ) ),

					'site_title_position_xy_X' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_float',
							'transport'         => 'postMessage',
							'default'           => 7,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Site Title Left Margin (%)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => - 20,
								'max'  => 50,
								'step' => 0.25,
							),
						),
					),
					'site_title_position_xy_Y' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_float',
							'transport'         => 'postMessage',
							'default'           => 0    // changed to 0 4.0
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Site Title Top Margin (%)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => - 50,
								'max'  => 50,
								'step' => .25,
							),
						),
					),
					'site_title_max_w'         => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_float', 'transport' => 'postMessage', 'default' => 90 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Site Title Maximum Width (%)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 10,
								'max'  => 100,
								'step' => 1,
							),
						),
					),

					'spacing-tagposition' => weaverx_cz_heading(
						esc_html__( 'Tagline Position', 'weaver-xtreme' ),
						esc_html__( 'Adjust left and top margins for Tagline. Decimal and negative values allowed.', 'weaver-xtreme' )
					),


					'tagline_xy_X'  => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_float',
							'transport'         => 'postMessage',
							'default'           => 10,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Site Tagline Left Margin (%)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => - 20,
								'max'  => 50,
								'step' => 0.25,
							),
						),
					),
					'tagline_xy_Y'  => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_float',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Site Tagline Top Margin (%)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => - 50,
								'max'  => 50,
								'step' => .25,
							),
						),
					),
					'tagline_max_w' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_float', 'transport' => 'postMessage', 'default' => 90 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Site Tagline Maximum Width (%)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 10,
								'max'  => 100,
								'step' => 1,
							),
						),
					),


					'title_tagline_xy_T' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Title/Tagline Top Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 250,
								'step' => 1,
							),
						),
					),
					'title_tagline_xy_B' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Title/Tagline Bottom Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 250,
								'step' => 1,
							),
						),
					),

					'spacing-mm-note' => weaverx_cz_heading(
						esc_html__( 'Header Mini Menu Top Margin', 'weaver-xtreme' ),
						weaverx_filter_text( __( 'This setting is found on the <em>Spacing &rarr; Menus</em>.', 'weaver-xtreme' ) )
					),


					// ------- Header Widget Area

					'spacing-widgetarea-header' => weaverx_cz_group_title( esc_html__( 'Header Widget Area', 'weaver-xtreme' ),
						esc_html__( 'Spacing for the Header Widget Area', 'weaver-xtreme' ) ),

					'header_sb_width_int' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_float', 'transport' => 'postMessage', 'default' => 0 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Header Widget Area Width (%)', 'weaver-xtreme' ),
							'description'  =>     __( 'Width of Area in % of enclosing area on desktop and small tablet. Hint: use with Align Header Widget Area "Center align" setting. (Default: 0, means auto)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 100,
								'step' => 0.5,
							),
						),
					),

					'header_sb_align' => weaverx_cz_select(
						__( 'Align Header Widget Area Area', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_align', 'header_sb_align', 'refresh'
					),


					'header_sb_padding_T' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        =>  __( 'Top Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'header_sb_padding_B' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Bottom Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'header_sb_padding_L' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Left Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'header_sb_padding_R' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Right Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),

					'header_sb_margin_T' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Top Margin (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'header_sb_margin_B' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Bottom Margin (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),

					'spacing-heading-widgets' => weaverx_cz_heading( esc_html__( 'Widget Area Columns', 'weaver-xtreme' ),
						weaverx_filter_text( __( '<strong>NOTE:</strong> You can set number of columns per widget area on the <em>Layout</em> panel.', 'weaver-xtreme' ) ) ),


					// ------- Header HTML Area

					'spacing-htmltarea-header' => weaverx_cz_group_title( esc_html__( 'Header HTML Area', 'weaver-xtreme' ),
						esc_html__( 'Spacing for the Header HTML Area', 'weaver-xtreme' ) ),

					'header_html_width_int' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_float', 'transport' => 'postMessage', 'default' => 100 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Header HTML Area Width (%)', 'weaver-xtreme' ),
							'description'  => __( 'Width of Area in % of enclosing area on desktop and small tablet. Hint: use with Align HTML Area "Center align" setting. You will have to "Save & Publish" and refresh this page if you are using Center Area align. (Default: 100%, use 0 for auto)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 100,
								'step' => 0.5,
							),
						),
					),

					'header_html_align' => weaverx_cz_select(
						__( 'Align Header HTML Area', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_align', 'float-left', 'refresh'
					),


					'header_html_center_content' => array(
						'setting' => array(
							'transport' => 'postMessage',
						),
						'control' => array(
							'label' => __( 'Center Content within HTML Area', 'weaver-xtreme' ),
							'type'  => 'checkbox',
						),
					),

					'header_html_padding_T' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Top Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'header_html_padding_B' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Bottom Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'header_html_padding_L' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Left Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'header_html_padding_R' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Right Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),

					'header_html_margin_T' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Top Margin (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'header_html_margin_B' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Bottom Margin (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),

				),
			);
		} else {
			// Title/tagline
			$spacing_sections['spacing-header'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Header Area', 'weaver-xtreme' ),
				'description' => esc_html__( 'Set spacing for Header Area. Full and Standard have many more options for padding, margins, etc.', 'weaver-xtreme' ),
				'options'     => array(

					'spacing-heading-header' => weaverx_cz_group_title( esc_html__( 'Site Header Area', 'weaver-xtreme' ),
						esc_html__( 'Spacing of the whole Header Area', 'weaver-xtreme' ) ),

					'header_align' => weaverx_cz_select(
						__( 'Align Header Area', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_align', 'float-left', 'refresh'
					),

					'spacing-title-header' => weaverx_cz_group_title( esc_html__( 'Site Title and Tagline', 'weaver-xtreme' ),
						esc_html__( 'Spacing for the Site Title and Tagline', 'weaver-xtreme' ) ),

					'title_over_image' => array(
						'setting' => array(),
						'control' => array(
							'label'       => __( 'Move Title/Tagline over Image', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,__( 'Move the Title, Tagline, Search, Logo/HTML and Mini Menu over the Header Image. NOTE: Best to not use with Header Image as BG Image.',
								'weaver-xtreme' ),
							'type'        => 'checkbox',
						),
					),
				),
			);
		}


		/**
		 * Main Menu
		 */

		if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard
			$spacing_sections['spacing-menus'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Menus', 'weaver-xtreme' ),
				'description' => esc_html__( 'Set spacing for Primary, Secondary, and Extra Menus.', 'weaver-xtreme' ),
				'options'     => array(
					'primary-mm-title' => weaverx_cz_group_title(
						esc_html__( 'Primary Menu', 'weaver-xtreme' )
					),

					'm_primary_align' => weaverx_cz_select(
						__( 'Align Primary Menu Bar', 'weaver-xtreme' ),
						__( 'Align this menu on desktop view. Mobile, accordion, and vertical menus always left aligned.', 'weaver-xtreme' ),
						'weaverx_cz_choices_align_menu', 'left'
					),

					'm_primary_menu_bar_pad_dec' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_float',
							'transport'         => 'refresh',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Desktop Menu Bar Padding', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
							'description'  => __( 'Add padding to menu bar top and bottom for Desktop devices.', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 10,
								'step' => .1,
							),
						),
					),

					'm_primary_top_margin_dec'    => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Menu Top Margin (px)', 'weaver-xtreme' ),
							'description'  => '',
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 30,
								'step' => 1,
							),
						),
					),
					'm_primary_bottom_margin_dec' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Menu Bottom Margin (px)', 'weaver-xtreme' ),
							'description'  => '',
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 30,
								'step' => 1,
							),
						),
					),

					'm_primary_right_padding_dec' => array( // refresh because of dynamic menu padding spacing for font sizes
					                                        'setting' => array(
						                                        'sanitize_callback' => 'weaverx_cz_sanitize_float',
						                                        'transport'         => 'refresh',
						                                        'default'           => 0.0,
					                                        ),
					                                        'control' => array(
						                                        'control_type' => 'WeaverX_Range_Control',
						                                        'label'        => __( 'Desktop Menu Spacing (em)', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
						                                        'description'  => __( 'Add space between desktop menu bar items. (not on Smart Menus)', 'weaver-xtreme' ),
						                                        'type'         => 'range',
						                                        'input_attrs'  => array(
							                                        'min'  => 0.0,
							                                        'max'  => 6,
							                                        'step' => .2,
						                                        ),
					                                        ),
					),
					'm_primary_html_margin_dec'   => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_float',
							'transport'         => 'refresh',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => WEAVERX_PLUS_RANGE_CONTROL,
							'label'        => esc_html__( 'Menu HTML: Top Margin (em)', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
							'description'  => esc_html__( 'Margin above Added Menu HTML (Used to adjust for Desktop menu. Negative values can help.)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => - 5.0,
								'max'  => 5.0,
								'step' => .1,
							),
						),
					),


					'm_p_deprecated' => weaverx_cz_heading(
						esc_html__( 'Desktop Menu Item Vertical Padding ', 'weaver-xtreme' ),
						esc_html__( 'Option deprecated. Use previous option instead. It is still available in the Legacy Option interface.', 'weaver-xtreme' )
					),

					'spacing-pm-line1' => weaverx_cz_line(),


					'spacing-sm-heading' => weaverx_cz_group_title(
						esc_html__( 'Secondary Menu', 'weaver-xtreme' ),
						esc_html__( 'You must define a Secondary Menu from the Custom Menus Content menu.', 'weaver-xtreme' ) ),

					'm_secondary_align' => weaverx_cz_select(
						__( 'Align Secondary Menu Bar', 'weaver-xtreme' ),
						__( 'Align this menu on desktop view. Mobile, accordion, and vertical menus always left aligned.', 'weaver-xtreme' ),
						'weaverx_cz_choices_align_menu', 'left'
					),

					'm_secondary_menu_bar_pad_dec' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_float',
							'transport'         => 'refresh',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Desktop Menu Bar Padding', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
							'description'  => __( 'Add padding to menu bar top and bottom for Desktop devices.', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 10,
								'step' => .1,
							),
						),
					),

					'm_secondary_top_margin_dec'    => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Menu Top Margin (px)', 'weaver-xtreme' ),
							'description'  => '',
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 30,
								'step' => 1,
							),
						),
					),
					'm_secondary_bottom_margin_dec' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Menu Bottom Margin (px)', 'weaver-xtreme' ),
							'description'  => '',
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 30,
								'step' => 1,
							),
						),
					),
					'm_secondary_right_padding_dec' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_float',
							'transport'         => 'refresh',
							'default'           => 0.0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Desktop Menu Spacing (em)', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
							'description'  => __( 'Add space between desktop menu bar items. (not on Smart Menus)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0.0,
								'max'  => 6,
								'step' => .2,
							),
						),
					),
					'm_secondary_html_margin_dec'   => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_float',
							'transport'         => 'refresh',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => WEAVERX_PLUS_RANGE_CONTROL,
							'label'        => esc_html__( 'Menu HTML: Top Margin (em)', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
							'description'  => esc_html__( 'Margin above Added Menu HTML (Used to adjust for Desktop menu. Negative values can help.)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => - 5.0,
								'max'  => 5.0,
								'step' => .1,
							),
						),
					),

					'm_sec_deprecated' => weaverx_cz_heading(
						esc_html__( 'Desktop Menu Item Vertical Padding ', 'weaver-xtreme' ),
						esc_html__( 'Option deprecated. Use previous option instead. It is still available in the Legacy Option interface.', 'weaver-xtreme' )
					),


					'spacing-mm-heading' => weaverx_cz_group_title(
						esc_html__( 'Header Mini Menu', 'weaver-xtreme' ), '' ),

					'm_header_mini_top_margin_dec' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_float', 'transport' => 'postMessage', 'default' => 0.0 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Mini Menu Top Margin (em)', 'weaver-xtreme' ),
							'description'  => __( 'Top margin for Header Mini Menu. Negative value moves it up. (Default: -1.0em)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => - 10.0,
								'max'  => 10.0,
								'step' => 0.25,
							),
						),
					),


				),
			);

			if ( weaverx_cz_is_plus() ) {
				$new_opts = array(

					'spacing-xm-line1' => weaverx_cz_line(),

					'extra-mm-title' => weaverx_cz_group_title(
						esc_html__( 'Extra Menu', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON
					),

					'm_extra_align' => weaverx_cz_select(
						__( 'Align Extra Menu Bar', 'weaver-xtreme' ),
						__( 'Align this menu on desktop view. Mobile, accordion, and vertical menus always left aligned.', 'weaver-xtreme' ),
						'weaverx_cz_choices_align_menu', 'float-left'
					),


					'm_extra_top_margin_dec'    => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Menu Top Margin (px)', 'weaver-xtreme' ),
							'description'  => '',
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 30,
								'step' => 1,
							),
						),
					),
					'm_extra_bottom_margin_dec' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Menu Bottom Margin (px)', 'weaver-xtreme' ),
							'description'  => '',
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 30,
								'step' => 1,
							),
						),
					),
					'm_extra_right_padding_dec' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_float',
							'transport'         => 'refresh',
							'default'           => 0.0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Desktop Menu Spacing (em)', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
							'description'  => __( 'Add space between desktop menu bar items. (not on Smart Menus)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0.0,
								'max'  => 6,
								'step' => .2,
							),
						),
					),
					'm_extra_html_margin_dec'   => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_float',
							'transport'         => 'refresh',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => WEAVERX_PLUS_RANGE_CONTROL,
							'label'        => esc_html__( 'Menu HTML: Top Margin (em)', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
							'description'  => esc_html__( 'Margin above Added Menu HTML (Used to adjust for Desktop menu. Negative values can help.)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => - 5.0,
								'max'  => 5.0,
								'step' => .1,
							),
						),
					),
				);

			} else {
				$new_opts = weaverx_cz_add_plus_message( 'spacing_menus', esc_html__( 'Extra Menu', 'weaver-xtreme' ),
					esc_html__( 'Add extra menus with <strong>Weaver Xtreme Plus</strong>.', 'weaver-xtreme' ) );
			}
			// add stub or extra menu options
			$spacing_sections['spacing-menus']['options'] = array_merge( $spacing_sections['spacing-menus']['options'], $new_opts );


		} else {
			$spacing_sections['spacing-menus'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Menus', 'weaver-xtreme' ),
				'description' => esc_html__( 'Set spacing for Primary, Secondary, and Extra Menus.', 'weaver-xtreme' ),
				'options'     => array(
					'primary-mm-title' => weaverx_cz_group_title(
						esc_html__( 'Primary Menu', 'weaver-xtreme' )
					),

					'm_primary_align' => weaverx_cz_select(
						__( 'Align Primary Menu Bar', 'weaver-xtreme' ),
						__( 'Align this menu on desktop view. Mobile, accordion, and vertical menus always left aligned.', 'weaver-xtreme' ),
						'weaverx_cz_choices_align_menu', 'float-left'
					),

					'm_primary_menu_bar_pad_dec' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_float',
							'transport'         => 'refresh',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Desktop Menu Bar Padding', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
							'description'  => __( 'Add padding to menu bar top and bottom for Desktop devices.', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 10,
								'step' => .1,
							),
						),
					),
				),
			);
		}


		/**
		 * Info Bar
		 */
		if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard
			$spacing_sections['spacing-info-bar'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Info Bar', 'weaver-xtreme' ),
				'description' => esc_html__( 'Info Bar with breadcrumbs and paged navigation displayed under Primary Menu.', 'weaver-xtreme' ),
				'options'     => array(
					'spacing-info-bar-heading' => weaverx_cz_heading( esc_html__( 'Info Bar', 'weaver-xtreme' ) ),

					'infobar_width_int' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_float', 'transport' => 'postMessage', 'default' => 100 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Info Bar Width (%)', 'weaver-xtreme' ),
							'description'  => __( 'Width of Area in % of enclosing area on desktop and small tablet. Hint: use with Info Bar "Center align" setting. (Default: 100%, use 0 for auto)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 100,
								'step' => 0.5,
							),
						),
					),

					'infobar_align' => weaverx_cz_select(
						__( 'Align Info Bar Area', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_align', 'float-left', 'refresh'
					),


					'infobar_padding_T' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 5 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Top Padding (px)', 'weaver-xtreme' ),
							'description'  => __( 'These options control the padding (inner space) around the area.', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'infobar_padding_B' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 5,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Bottom Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'infobar_padding_L' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 5,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Left Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'infobar_padding_R' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 5,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Right Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),

					'infobar_margin_T' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Top Margin (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'infobar_margin_B' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Bottom Margin (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),

				),
			);

			/**
			 * Content
			 */
			$spacing_sections['spacing-content'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Content', 'weaver-xtreme' ),
				'description' => esc_html__( 'Spacing for general page and post content.', 'weaver-xtreme' ),
				'options'     => array(

					'content-spacing-t' => weaverx_cz_group_title(
						esc_html__( 'Content Area Padding & Margins', 'weaver-xtreme' )
					),

					'content_padding_T' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 4 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Top Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'content_padding_B' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 8,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Bottom Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'content_padding_L' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 2,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Left Padding (%)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 30,
								'step' => .25,
							),
						),
					),
					'content_padding_R' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 2,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Right Padding (%)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 30,
								'step' => .25,
							),
						),
					),

					'content_margin_T'          => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Top Margin (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'content_margin_B'          => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Bottom Margin (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'spacing-content-widthinfo' => weaverx_cz_heading( esc_html__( 'Width', 'weaver-xtreme' ),
						esc_html__( 'The width of this area is automatically determined by the enclosing area.', 'weaver-xtreme' ) ),

					'content-other-spacing' => weaverx_cz_group_title( esc_html__( 'Other Spacing', 'weaver-xtreme' ) ),

					'content_smartmargin' => array(
						'setting' => array(),
						'control' => array(
							'label'       => __( 'Add Side Margin(s)', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
							'description' => __( 'Automatically add left/right "smart" margins for separation of areas (sidebar/content0. This is normally used only if you have borders or BG colors for your sidebars.',
								'weaver-xtreme' ),
							'type'        => 'checkbox',
						),
					),

					'space_after_title_dec' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_float',
							'transport'         => 'postMessage',
							'default'           => 1.0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Space Between Title and Content (em)', 'weaver-xtreme' ),
							'description'  => __( 'Space between Page or Post title and beginning of content.', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 20.0,
								'step' => 0.1,
							),
						),
					),


					'content_p_list_dec' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_float',
							'transport'         => 'postMessage',
							'default'           => 1.5,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Space after paragraphs and lists (em)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 20.0,
								'step' => 0.1,
							),
						),
					),

					'content-block-spacing' => weaverx_cz_group_title( esc_html__( 'Block Element Margins', 'weaver-xtreme' ) ),

					'content_block_margin_T' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_float',
							'transport'         => 'refresh',
							'default'           => 1.2,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Margin Before Blocks (em)', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
							'description'  => __( 'Add margins to non-paragraph Blocks created with Block Editor.', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 20.0,
								'step' => 0.1,
							),
						),
					),

					'content_block_margin_B' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_float',
							'transport'         => 'refresh',
							'default'           => 1.5,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Margin After Blocks (em)', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
							'description'  => __( 'Add margins to non-paragraph Blocks created with Block Editor.', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 20.0,
								'step' => 0.1,
							),
						),
					),


				),
			);
		}

		/**
		 * Post Specific
		 */
		if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard
			$spacing_sections['spacing-post-specific'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Post Specific', 'weaver-xtreme' ),
				'description' => esc_html__( 'Post Specific spacing - override Content spacing.', 'weaver-xtreme' ),
				'options'     => array(

					'post_padding_T' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Top Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'post_padding_B' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Bottom Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'post_padding_L' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Left Padding (%)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 30,
								'step' => .25,
							),
						),
					),
					'post_padding_R' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Right Padding (%)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 30,
								'step' => .25,
							),
						),
					),

					'post_margin_T' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Top Margin (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'post_margin_B' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 15,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Bottom Margin (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),

					'spacing-post-widthinfo' => weaverx_cz_heading( esc_html__( 'Width', 'weaver-xtreme' ),
						esc_html__( 'The width of this area is automatically determined by the enclosing area.', 'weaver-xtreme' ) ),

					'post_smartmargin' => array(
						'setting' => array(),
						'control' => array(
							'label'       => __( 'Add Side Margin(s)', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
							'description' => __( 'Automatically add left/right "smart" margins for separation of areas (sidebar/content). This is normally used only if you have borders or BG colors for your sidebars.',
								'weaver-xtreme' ),
							'type'        => 'checkbox',
						),
					),

					'post_title_bottom_margin_dec' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_float',
							'transport'         => 'postMessage',
							'default'           => 0.2,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Space Between Post Title and Content (em)', 'weaver-xtreme' ),
							'description'  => __( 'Space between Post title and beginning of content. This will adjust/override the equivalent Content setting.', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => - 5.0,
								'max'  => 20.0,
								'step' => 0.1,
							),
						),
					),
				),
			);
		}


		/**
		 * Sidebars
		 */

		$spacing_sections['spacing-sidebars'] = array(
			'panel'       => $panel,
			'title'       => esc_html__( 'Sidebars / Widget Areas', 'weaver-xtreme' ),
			'description' => esc_html__( 'Main Sidebars and Widget areas.', 'weaver-xtreme' ),
			'options'     => array(
				'spacing-sidbars-heading' => weaverx_cz_group_title( esc_html__( 'Sidebar Widths', 'weaver-xtreme' ),
					esc_html__( 'Width of the left and right vertical sidebars in the Container Area. Note that the width of the adjoining Content area is automatically determined by the sidebar layouts and widths.', 'weaver-xtreme' ) ),

				'left_sb_width_int'  => array(
					'setting' => array(
						'sanitize_callback' => 'weaverx_cz_sanitize_float',
						'transport'         => 'refresh',
						'default'           => 25,
					),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => __( 'Left Sidebar Width (%)', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 90,
							'step' => .5,
						),
					),
				),
				'right_sb_width_int' => array(
					'setting' => array(
						'sanitize_callback' => 'weaverx_cz_sanitize_float',
						'transport'         => 'refresh',
						'default'           => 25,
					),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => __( 'Right Sidebar Width (%)', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 90,
							'step' => .5,
						),
					),
				),

				'left_split_sb_width_int'  => array(
					'setting' => array(
						'sanitize_callback' => 'weaverx_cz_sanitize_float',
						'transport'         => 'refresh',
						'default'           => 25,
					),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => __( 'Width for Split Sidebar, Left Side', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 10,
							'max'  => 100,
							'step' => .5,
						),
					),
				),
				'right_split_sb_width_int' => array(
					'setting' => array(
						'sanitize_callback' => 'weaverx_cz_sanitize_float',
						'transport'         => 'refresh',
						'default'           => 25,
					),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => __( 'Width for Split Sidebar, Right Side', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 10,
							'max'  => 100,
							'step' => .5,
						),
					),
				),
			),
		);

		if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard
			$level                                           = array(
				'spacing-primary-widget-heading' => weaverx_cz_group_title( esc_html__( 'Primary Widget Area', 'weaver-xtreme' ) ),

				'primary_padding_T' => array(
					'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => __( 'Top Padding (px)', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
				),
				'primary_padding_B' => array(
					'setting' => array(
						'sanitize_callback' => 'weaverx_cz_sanitize_int',
						'transport'         => 'postMessage',
						'default'           => 0,
					),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => esc_html__( 'Bottom Padding (px)', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
				),
				'primary_padding_L' => array(
					'setting' => array(
						'sanitize_callback' => 'weaverx_cz_sanitize_int',
						'transport'         => 'postMessage',
						'default'           => 0,
					),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => esc_html__( 'Left Padding (px)', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
				),
				'primary_padding_R' => array(
					'setting' => array(
						'sanitize_callback' => 'weaverx_cz_sanitize_int',
						'transport'         => 'postMessage',
						'default'           => 0,
					),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => esc_html__( 'Right Padding (px)', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
				),

				'primary_margin_T'          => array(
					'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => esc_html__( 'Top Margin (px)', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
				),
				'primary_margin_B'          => array(
					'setting' => array(
						'sanitize_callback' => 'weaverx_cz_sanitize_int',
						'transport'         => 'postMessage',
						'default'           => 10,
					),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => esc_html__( 'Bottom Margin (px)', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
				),
				'spacing-primary-widthinfo' => weaverx_cz_heading( esc_html__( 'Width', 'weaver-xtreme' ),
					esc_html__( 'The width of this area is automatically determined by the enclosing area.', 'weaver-xtreme' ) ),

				'primary_smartmargin' => array(
					'setting' => array(),
					'control' => array(
						'label'       => __( 'Add Side Margin(s)', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
						'description' => __( 'Automatically add left/right "smart" margins for separation of areas (sidebar/content). This is normally used only if you have borders or BG colors for your sidebars.',
							'weaver-xtreme' ),
						'type'        => 'checkbox',
					),
				),

				'spacing-primary-widgets' => weaverx_cz_heading( esc_html__( 'Widget Area Columns', 'weaver-xtreme' ),
					esc_html__( '<strong>NOTE:</strong> You can set number of columns per widget area on the <em>Layout</em> panel.', 'weaver-xtreme' ) ),


				'spacing-secondary-widget-heading' => weaverx_cz_group_title( esc_html__( 'Secondary Widget Area', 'weaver-xtreme' ) ),

				'secondary_padding_T' => array(
					'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => esc_html__( 'Top Padding (px)', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
				),
				'secondary_padding_B' => array(
					'setting' => array(
						'sanitize_callback' => 'weaverx_cz_sanitize_int',
						'transport'         => 'postMessage',
						'default'           => 0,
					),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => esc_html__( 'Bottom Padding (px)', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
				),
				'secondary_padding_L' => array(
					'setting' => array(
						'sanitize_callback' => 'weaverx_cz_sanitize_int',
						'transport'         => 'postMessage',
						'default'           => 0,
					),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => esc_html__( 'Left Padding (px)', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
				),
				'secondary_padding_R' => array(
					'setting' => array(
						'sanitize_callback' => 'weaverx_cz_sanitize_int',
						'transport'         => 'postMessage',
						'default'           => 0,
					),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => esc_html__( 'Right Padding (px)', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
				),

				'secondary_margin_T'          => array(
					'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => esc_html__( 'Top Margin (px)', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
				),
				'secondary_margin_B'          => array(
					'setting' => array(
						'sanitize_callback' => 'weaverx_cz_sanitize_int',
						'transport'         => 'postMessage',
						'default'           => 10,
					),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => esc_html__( 'Bottom Margin (px)', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
				),
				'spacing-secondary-widthinfo' => weaverx_cz_heading( esc_html__( 'Width', 'weaver-xtreme' ),
					esc_html__( 'The width of this area is automatically determined by the enclosing area.', 'weaver-xtreme' ) ),

				'secondary_smartmargin' => array(
					'setting' => array(),
					'control' => array(
						'label'       => __( 'Add Side Margin(s)', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
						'description' => __( 'Automatically add left/right "smart" margins for separation of areas (sidebar/content0. This is normally used only if you have borders or BG colors for your sidebars.',
							'weaver-xtreme' ),
						'type'        => 'checkbox',
					),
				),

				'spacing-secondary-widgets' => weaverx_cz_heading( esc_html__( 'Widget Area Columns', 'weaver-xtreme' ),
					weaverx_filter_text( __( '<strong>NOTE:</strong> You can set number of columns per widget area on the <em>Layout</em> panel.', 'weaver-xtreme' ) ) ),


				'spacing-top-widget-heading' => weaverx_cz_group_title( esc_html__( 'Top Widget Areas', 'weaver-xtreme' ),
					esc_html__( 'Properties for all Top Widget areas (Sitewide, Pages, Blog, Archive).', 'weaver-xtreme' ) ),

				'top_width_int' => array(
					'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_float', 'transport' => 'postMessage', 'default' => 0 ),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => esc_html__( 'Top Widget Areas Width (%)', 'weaver-xtreme' ),
						'description'  => esc_html__( 'Width of Area in % of enclosing area on desktop and small tablet. Hint: use with Container "Center align" setting. (Default: 0, means auto)', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 100,
							'step' => 0.5,
						),
					),
				),

				'top_align' => weaverx_cz_select(
					__( 'Align Widget Area', 'weaver-xtreme' ),
					'',
					'weaverx_cz_choices_align', 'float-left', 'postMessage'
				),

				'top_padding_T' => array(
					'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 8 ),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => esc_html__( 'Top Padding (px)', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
				),
				'top_padding_B' => array(
					'setting' => array(
						'sanitize_callback' => 'weaverx_cz_sanitize_int',
						'transport'         => 'postMessage',
						'default'           => 8,
					),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => esc_html__( 'Bottom Padding (px)', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
				),
				'top_padding_L' => array(
					'setting' => array(
						'sanitize_callback' => 'weaverx_cz_sanitize_int',
						'transport'         => 'postMessage',
						'default'           => 8,
					),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => esc_html__( 'Left Padding (px)', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
				),
				'top_padding_R' => array(
					'setting' => array(
						'sanitize_callback' => 'weaverx_cz_sanitize_int',
						'transport'         => 'postMessage',
						'default'           => 8,
					),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => esc_html__( 'Right Padding (px)', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
				),

				'top_margin_T' => array(
					'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 10 ),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => esc_html__( 'Top Margin (px)', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
				),
				'top_margin_B' => array(
					'setting' => array(
						'sanitize_callback' => 'weaverx_cz_sanitize_int',
						'transport'         => 'postMessage',
						'default'           => 10,
					),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => esc_html__( 'Bottom Margin (px)', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
				),


				'spacing-top-widgets' => weaverx_cz_heading( esc_html__( 'Widget Area Columns', 'weaver-xtreme' ),
					weaverx_filter_text( __( '<strong>NOTE:</strong> You can set number of columns per widget area on the <em>Layout</em> panel.', 'weaver-xtreme' ) ) ),


				'spacing-bottom-widget-heading' => weaverx_cz_group_title( esc_html__( 'Bottom Widget Areas', 'weaver-xtreme' ),
					esc_html__( 'Properties for all Bottom Widget areas (Sitewide, Pages, Blog, Archive).', 'weaver-xtreme' ) ),

				'bottom_width_int' => array(
					'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_float', 'transport' => 'postMessage', 'default' => 0 ),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => esc_html__( 'Bottom Widget Areas Width (%)', 'weaver-xtreme' ),
						'description'  => esc_html__( 'Width of Area in % of enclosing area on desktop and small tablet. Hint: use with Container "Center align" setting. (Default: 0, means auto)', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 100,
							'step' => 0.5,
						),
					),
				),

				'bottom_align' => weaverx_cz_select(
					__( 'Align Bottom Widget Area', 'weaver-xtreme' ),
					'',
					'weaverx_cz_choices_align', 'float-left', 'postMessage'
				),


				'bottom_padding_T' => array(
					'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 8 ),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => esc_html__( 'Top Padding (px)', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
				),
				'bottom_padding_B' => array(
					'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 8 ),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => esc_html__( 'Bottom Padding (px)', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
				),
				'bottom_padding_L' => array(
					'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 8 ),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => esc_html__( 'Left Padding (px)', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
				),
				'bottom_padding_R' => array(
					'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 8 ),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => esc_html__( 'Right Padding (px)', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
				),

				'bottom_margin_T' => array(
					'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 10 ),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => esc_html__( 'Top Margin (px)', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
				),
				'bottom_margin_B' => array(
					'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 10 ),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => esc_html__( 'Bottom Margin (px)', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
				),

				'spacing-bottom-widgets' => weaverx_cz_heading( esc_html__( 'Widget Area Columns', 'weaver-xtreme' ),
					weaverx_filter_text( __( '<strong>NOTE:</strong> You can set number of columns per widget area on the <em>Layout</em> panel.', 'weaver-xtreme' ) ) ),
			);
			$spacing_sections['spacing-sidebars']['options'] = array_merge( $spacing_sections['spacing-sidebars']['options'], $level );
		}

		/**
		 * Widgets
		 */
		if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard
			$spacing_sections['spacing-widgets'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Individual Widgets', 'weaver-xtreme' ),
				'description' => esc_html__( 'Padding and Margins for Individual Widgets. Widget width responsively determined by enclosing area.', 'weaver-xtreme' ),
				'options'     => array(


					// ------- Widgets

					'widget_padding_T' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Top Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'widget_padding_B' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Bottom Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'widget_padding_L' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Left Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'widget_padding_R' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Right Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),

					'widget_margin_T' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Top Margin (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'widget_margin_B' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Bottom Margin (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),

				),
			);
		}


		/**
		 * Footer
		 */
		if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard
			$foot_width_transport               = weaverx_getopt_checked( 'footer_extend_width' ) ? 'refresh' : 'postMessage';
			$foot_refresh                       = weaverx_getopt_checked( 'footer_extend_width' ) ? WEAVERX_REFRESH_ICON : '';
			$spacing_sections['spacing-footer'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Footer Area', 'weaver-xtreme' ),
				'description' => weaverx_filter_text( __( 'Set spacing for Footer Area. Option groups include <span style="color:blue;">Site Footer Area, Site Title and Tagline, Footer Widget Area</span>, and <span style="color:blue;">Footer HTML Area</span>.', 'weaver-xtreme' ) ),
				'options'     => array(
					'spacing-heading-footer' => weaverx_cz_group_title( esc_html__( 'Site Footer Area', 'weaver-xtreme' ),
						esc_html__( 'Spacing of the whole Footer Area', 'weaver-xtreme' ) ),

					'footer_width_int'     => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_float', 'transport' => $foot_width_transport, 'default' => 100 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Footer Area Width (%)', 'weaver-xtreme' ) . $foot_refresh,
							'description'  => esc_html__( 'Width of Area in % of enclosing area on desktop and small tablet. Hint: use with Footer "Center align" setting. (Default: 100%, 0 means auto)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 100,
								'step' => 0.5,
							),
						),
					),
					'footer_max_width_int' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
						'control' => array(
							'control_type' => WEAVERX_PLUS_RANGE_CONTROL,
							'label'        => esc_html__( 'Footer Area Max Width (px)', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
							'description'  => esc_html__( 'This advanced option allows you to set a maximum width for this area. This is not commonly used, but can make interesting designs, especially if you center align the area.  Use 0 for no Max Width.', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 4000,
								'step' => 5,
							),
						),
					),

					'footer_align' => weaverx_cz_select(
						__( 'Align Footer Area', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_align', 'float-left', $foot_width_transport
					),

					'footer_padding_T' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 8 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Top Padding (px)', 'weaver-xtreme' ),
							'description'  => esc_html__( 'These options control the padding (inner space) around the area.', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'footer_padding_B' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 8,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Bottom Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'footer_padding_L' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => $foot_refresh,
							'default'           => 8,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Left Padding (px)', 'weaver-xtreme' ) . $foot_refresh,
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'footer_padding_R' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => $foot_width_transport,
							'default'           => 8,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Right Padding (px)', 'weaver-xtreme' ) . $foot_refresh,
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),

					'footer_margin_T' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Top Margin (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'footer_margin_B' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Bottom Margin (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),


					// ------- Footer Widget Area

					'spacing-widgetarea-footer' => weaverx_cz_group_title( esc_html__( 'Footer Widget Area', 'weaver-xtreme' ),
						esc_html__( 'Spacing for the Footer Widget Area', 'weaver-xtreme' ) ),

					'footer_sb_width_int' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_float', 'transport' => 'postMessage', 'default' => 0 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Footer Widget Area Width (%)', 'weaver-xtreme' ),
							'description'  => esc_html__( 'Width of Area in % of enclosing area on desktop and small tablet. Hint: use with Align Footer Widget Area "Center align" setting. (Default: 0, means auto)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 100,
								'step' => 0.5,
							),
						),
					),

					'footer_sb_align' => weaverx_cz_select(
						__( 'Align Footer Widget Area Area', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_align', 'postMessage', 'postMessage'
					),


					'footer_sb_padding_T' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 8 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Top Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'footer_sb_padding_B' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 8,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Bottom Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'footer_sb_padding_L' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 8,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Left Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'footer_sb_padding_R' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 8,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Right Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),

					'footer_sb_margin_T' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Top Margin (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'footer_sb_margin_B' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Bottom Margin (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),


					'spacing-footer-widgets' => weaverx_cz_heading( esc_html__( 'Widget Area Columns', 'weaver-xtreme' ),
						weaverx_filter_text( __( '<strong>NOTE:</strong> You can set number of columns per widget area on the <em>Layout</em> panel.', 'weaver-xtreme' ) ) ),


					// ------- Footer HTML Area

					'spacing-htmltarea-footer' => weaverx_cz_group_title( esc_html__( 'Footer HTML Area', 'weaver-xtreme' ),
						esc_html__( 'Spacing for the Footer HTML Area', 'weaver-xtreme' ) ),

					'footer_html_width_int' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_float', 'transport' => 'postMessage', 'default' => 100 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Footer HTML Area Width (%)', 'weaver-xtreme' ),
							'description'  => esc_html__( 'Width of Area in % of enclosing area on desktop and small tablet. Hint: use with Align HTML Area "Center align" setting. You will have to "Save & Publish" and refresh this page if you are using Center Area align. (Default: 100%, use 0 for auto)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 100,
								'step' => 0.5,
							),
						),
					),

					'footer_html_align' => weaverx_cz_select(
						__( 'Align Footer HTML Area', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_align', 'float-left', 'refresh'
					),


					'footer_html_center_content' => array(
						'setting' => array(
							'transport' => 'postMessage',
						),
						'control' => array(
							'label' => __( 'Center Content within HTML Area', 'weaver-xtreme' ),
							'type'  => 'checkbox',
						),
					),

					'footer_html_padding_T' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Top Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'footer_html_padding_B' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Bottom Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'footer_html_padding_L' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Left Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'footer_html_padding_R' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Right Padding (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),

					'footer_html_margin_T' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Top Margin (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
					'footer_html_margin_B' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Bottom Margin (px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 150,
								'step' => 1,
							),
						),
					),
				),
			);
		} else {                // Basic
			$foot_width_transport               = weaverx_getopt_checked( 'footer_extend_width' ) ? 'refresh' : 'postMessage';
			$spacing_sections['spacing-footer'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Footer Area', 'weaver-xtreme' ),
				'description' => weaverx_filter_text( __( 'Set spacing for Footer Area. Option groups include <span style="color:blue;">Site Footer Area, Site Title and Tagline, Footer Widget Area</span>, and <span style="color:blue;">Footer HTML Area</span>.', 'weaver-xtreme' ) ),
				'options'     => array(
					'spacing-heading-footer' => weaverx_cz_group_title( esc_html__( 'Site Footer Area', 'weaver-xtreme' ),
						esc_html__( 'Spacing of the whole Footer Area', 'weaver-xtreme' ) ),

					'footer_align' => weaverx_cz_select(
						__( 'Align Footer Area', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_align', 'float-left', $foot_width_transport
					),
				),
			);
		}

		return $spacing_sections;
	}
endif;


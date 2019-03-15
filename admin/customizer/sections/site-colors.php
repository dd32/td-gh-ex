<?php

if ( ! function_exists( 'weaverx_customizer_define_colorscheme_sections' ) ) :
	/**
	 * Define the sections and settings for the Site Colors panel
	 * Customize_Alpha_Color_Control
	 * WP_Customize_Color_Control
	 */


	function weaverx_customizer_define_colorscheme_sections() {
		$panel                = 'weaverx_site-colors';
		$colorscheme_sections = array();

		/**
		 * General
		 */
		$colorscheme_sections['color-wrapping'] =
			array(    // NOTE: this name needed to move WP Site Background color to here in load-customizer.php
			          'panel'       => $panel,
			          'title'       => esc_html__( 'Wrapping Areas', 'weaver-xtreme' ),
			          'description' => esc_html__( 'Set colors. Use Typography to set fonts.', 'weaver-xtreme' ),
			          'options'     => array(

				          'body_bgcolor_moved' => weaverx_cz_text( weaverx_filter_text( __( '<strong>Site Background Color - Theme Value</strong>. This option is now found on the "Layout &rarr; Core Site Layout and Styling" menu.', 'weaver-xtreme' ) ) ),

				          'fadebody_bg' => array(
					          'setting' => array(),
					          'control' => array(
						          'label'       => esc_html__( 'Fade Outside BG', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
						          'description' => esc_html__( 'Will fade the Outside BG color, darker at top to lighter at bottom.', 'weaver-xtreme' ),
						          'type'        => 'checkbox',
					          ),
				          ),

				          'body_bgcolor_moved1' => weaverx_cz_text( weaverx_filter_text( __( '<strong>Wrapper Text Color</strong>. This option is now found on the "Layout &rarr; Core Site Layout and Styling" menu.', 'weaver-xtreme' ) ) ),


				          'wrapper_bgcolor' => weaverx_cz_coloropt( 'wrapper_bgcolor',
					          esc_html__( 'Wrapper BG Color', 'weaver-xtreme' ),
					          weaverx_filter_text( __( '<strong>Background Color</strong> - wraps entire content area. To override, set BG colors for individual areas.', 'weaver-xtreme' ) ) ),

				          'container_color' => weaverx_cz_coloropt( 'container_color',
					          esc_html__( 'Container Text Color', 'weaver-xtreme' ),
					          esc_html__( 'Container ( #container div ) wraps content and sidebars.', 'weaver-xtreme' ) ),

				          'container_bgcolor' => weaverx_cz_coloropt( 'container_bgcolor',
					          esc_html__( 'Container BG Color', 'weaver-xtreme' ) ),


				          'color-border-heading' => array(
					          'control' => array(
						          'control_type' => 'WeaverX_Misc_Control',
						          'type'         => 'line',
					          ),
				          ),


				          'color-border-heading' => weaverx_cz_heading( esc_html__( 'Border Color', 'weaver-xtreme' ),
					          weaverx_filter_text( __( 'Border Color option found on <em>Style &rarr; Wrapping Areas</em> panel.', 'weaver-xtreme' ) ) ),
			          ),
			);


		/**
		 * Links
		 */
		$colorscheme_sections['color-links'] = array(
			'panel'       => $panel,
			'title'       => esc_html__( 'Links', 'weaver-xtreme' ),
			'description' => 'Set colors for links. Use Typography to set fonts.',
			'options'     => array(

				'link_color' => weaverx_cz_coloropt( 'link_color',
					esc_html__( 'Standard Links', 'weaver-xtreme' ),
					esc_html__( 'Sitewide default color for links. To override for links in specific areas, set colors for individual links below.', 'weaver-xtreme' ), 'refresh' ),


				'link_hover_color'    => weaverx_cz_coloropt( 'link_hover_color',
					esc_html__( 'Standard Link Hover Color', 'weaver-xtreme' ),
					'', 'refresh' ),
				'link-color-full-msg' => weaverx_cz_html( '',
					esc_html__( 'Full interface level supports setting link colors for different areas and items.', 'weaver-xtreme' ) ),
			),
		);

		if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard

			$level                                          = array(
				// info bar
				'color-info-line-1' => array(
					'control' => array(
						'control_type' => 'WeaverX_Misc_Control',
						'type'         => 'line',
					),
				),

				'ibarlink_color' => weaverx_cz_coloropt( 'ibarlink_color',
					esc_html__( 'Info Bar Link Color', 'weaver-xtreme' ),
					'', 'refresh' ),

				'ibarlink_hover_color' => weaverx_cz_coloropt( 'ibarlink_hover_color',
					esc_html__( 'Info Bar Link Hover Color', 'weaver-xtreme' ),
					'', 'refresh' ),


				'color-info-line-2' => array(
					'control' => array(
						'control_type' => 'WeaverX_Misc_Control',
						'type'         => 'line',
					),
				),

				// content

				'contentlink_color'       => weaverx_cz_coloropt( 'contentlink_color',
					esc_html__( 'Content Links Color', 'weaver-xtreme' ),
					'', 'refresh' ),
				'contentlink_hover_color' => weaverx_cz_coloropt( 'contentlink_hover_color',
					esc_html__( 'Content Links Hover Color', 'weaver-xtreme' ),
					'', 'refresh' ),

				'color-info-line-3' => array(
					'control' => array(
						'control_type' => 'WeaverX_Misc_Control',
						'type'         => 'line',
					),
				),

				// post meta info bar
				'ilink_color'       => weaverx_cz_coloropt( 'ilink_color',
					esc_html__( 'Post Meta Info Link Color', 'weaver-xtreme' ),
					'', 'refresh' ),

				'ilink_hover_color' => weaverx_cz_coloropt( 'ilink_hover_color',
					esc_html__( 'Post Meta Info Link Hover Color', 'weaver-xtreme' ),
					'', 'refresh' ),

				'color-info-line-4' => array(
					'control' => array(
						'control_type' => 'WeaverX_Misc_Control',
						'type'         => 'line',
					),
				),

				// individual widgets

				'wlink_color' => weaverx_cz_coloropt( 'wlink_color',
					esc_html__( 'Individual Widgets Link Color', 'weaver-xtreme' ),
					'', 'refresh' ),

				'wlink_hover_color' => weaverx_cz_coloropt( 'wlink_hover_color',
					esc_html__( 'Individual Widgets Link Hover Color', 'weaver-xtreme' ),
					'', 'refresh' ),


				'color-info-line-5' => array(
					'control' => array(
						'control_type' => 'WeaverX_Misc_Control',
						'type'         => 'line',
					),
				),

				'footerlink_color' => weaverx_cz_coloropt( 'footerlink_color',
					esc_html__( 'Footer Links Color', 'weaver-xtreme' ),
					'', 'refresh' ),

				'footerlink_hover_color' => weaverx_cz_coloropt( 'footerlink_hover_color',
					esc_html__( 'Footer Links Hover Color', 'weaver-xtreme' ),
					'', 'refresh' ),
			);
			$colorscheme_sections['color-links']['options'] = array_merge( $colorscheme_sections['color-links']['options'], $level );
		}


		/**
		 * Site Header
		 */
		$colorscheme_sections['color-header'] = array(
			'panel'   => $panel,
			'title'   => esc_html__( 'Header Area', 'weaver-xtreme' ),
			'options' => array(


				'header_color' => weaverx_cz_coloropt( 'header_color',
					esc_html__( 'Header Text Color', 'weaver-xtreme' ),
					'' ),

				'header_bgcolor_moved' => weaverx_cz_text( weaverx_filter_text( __( '<strong>Header BG Color</strong>. This option is now found on the "Layout &rarr; Core Site Layout and Styling" menu.', 'weaver-xtreme' ) ) ),


				'site_title_color' => weaverx_cz_coloropt( 'site_title_color',
					esc_html__( 'Site Title Text Color', 'weaver-xtreme' ),
					'' ),

				'site_title_bgcolor' => weaverx_cz_coloropt( 'site_title_bgcolor',
					esc_html__( 'Site Title BG Color', 'weaver-xtreme' ),
					esc_html__( 'Site Title BG Color', 'weaver-xtreme' ) ),

				'tagline_color' => weaverx_cz_coloropt( 'tagline_color',
					esc_html__( 'Site Tagline Text Color', 'weaver-xtreme' ),
					'' ),

				'tagline_bgcolor' => weaverx_cz_coloropt( 'tagline_bgcolor',
					esc_html__( 'Site Tagline BG Color', 'weaver-xtreme' ),
					'' ),

			),
		);

		if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard
			$level                                           = array(
				'title_tagline_bgcolor' => weaverx_cz_coloropt( 'title_tagline_bgcolor',
					esc_html__( 'Title/Tagline Area BG', 'weaver-xtreme' ),
					esc_html__( 'BG Color for the Title, Tagline, Search, and Mini Menu area.', 'weaver-xtreme' ) ),

				'hdrarea-cline2' => weaverx_cz_line(),

				'header_sb_color' => weaverx_cz_coloropt( 'header_sb_color',
					esc_html__( 'Header Widget Area Text Color', 'weaver-xtreme' ),
					'' ),

				'header_sb_bgcolor' => weaverx_cz_coloropt( 'header_sb_bgcolor',
					esc_html__( 'Header Widget Area BG Color', 'weaver-xtreme' ),
					'' ),

				'hdrarea-cline3' => weaverx_cz_line(),

				'header_html_color' => weaverx_cz_coloropt( 'header_html_color',
					esc_html__( 'Header HTML Area Text Color', 'weaver-xtreme' ) ),

				'header_html_bgcolor' => weaverx_cz_coloropt( 'header_html_bgcolor',
					esc_html__( 'Header HTML Area BG Color', 'weaver-xtreme' ) ),

			);
			$colorscheme_sections['color-header']['options'] = array_merge( $colorscheme_sections['color-header']['options'], $level );
		}


		/**
		 * Main Menu
		 */

		define( 'WEAVERX_MENU_UPDATE', 'refresh' );

		$colorscheme_sections['color-menus'] = array(
			'panel'       => $panel,
			'title'       => esc_html__( 'Menus', 'weaver-xtreme' ),
			'description' => esc_html__( 'Set text, background, and hover colors for menus.', 'weaver-xtreme' ),
			'options'     => array(
				'color-mm-heading' => weaverx_cz_group_title( esc_html__( 'Primary Menu Colors', 'weaver-xtreme' ) ),

				'm_primary_color' => weaverx_cz_coloropt( 'm_primary_color',
					esc_html__( 'Primary Menu Bar Text Color', 'weaver-xtreme' ),
					esc_html__( 'Text Color for Entire menu bar.', 'weaver-xtreme' ), WEAVERX_MENU_UPDATE ),

				'm_primary_bgcolor' => weaverx_cz_coloropt( 'm_primary_bgcolor',
					esc_html__( 'Primary Menu Bar BG Color', 'weaver-xtreme' ),
					esc_html__( 'Background Color for Entire menu bar.', 'weaver-xtreme' ), WEAVERX_MENU_UPDATE ),

				'm_primary_link_bgcolor' => weaverx_cz_coloropt( 'm_primary_link_bgcolor',
					esc_html__( 'Item BG Color', 'weaver-xtreme' ),
					esc_html__( 'Background Color for menu bar items.', 'weaver-xtreme' ), WEAVERX_MENU_UPDATE ),


				'm_primary_hover_color' => weaverx_cz_coloropt( 'm_primary_hover_color',
					esc_html__( 'Primary Menu Bar Hover Text Color', 'weaver-xtreme' ),
					'', 'refresh' ),

				'm_primary_hover_bgcolor' => weaverx_cz_coloropt( 'm_primary_hover_bgcolor',
					esc_html__( 'Primary Menu Bar Hover BG Color', 'weaver-xtreme' ),
					'', 'refresh' ),

				'm_primary_html_color' => weaverx_cz_coloropt(
					'm_primary_html_color',
					esc_html__( 'HTML: Text Color', 'weaver-xtreme' ),
					esc_html__( 'Text Color for Left/Right Menu Bar HTML.', 'weaver-xtreme' ), WEAVERX_MENU_UPDATE
				),

				'm_primary_sub_color' => weaverx_cz_coloropt( 'm_primary_sub_color',
					esc_html__( 'Primary Sub-Menu Text Color', 'weaver-xtreme' ),
					'', WEAVERX_MENU_UPDATE ),

				'm_primary_sub_bgcolor' => weaverx_cz_coloropt( 'm_primary_sub_bgcolor',
					esc_html__( 'Primary Sub-Menu BG Color', 'weaver-xtreme' ),
					'', WEAVERX_MENU_UPDATE ),

				'm_primary_sub_hover_color' => weaverx_cz_coloropt( 'm_primary_sub_hover_color',
					esc_html__( 'Primary Sub-Menu Hover Text Color', 'weaver-xtreme' ),
					'', 'refresh' ),

				'm_primary_sub_hover_bgcolor' => weaverx_cz_coloropt( 'm_primary_sub_hover_bgcolor',
					esc_html__( 'Primary Sub-Menu Hover BG Color', 'weaver-xtreme' ),
					'', 'refresh' ),


			),
		);

		if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard

			$level                                          = array(
				'm_primary_clickable_bgcolor' => weaverx_cz_coloropt( 'm_primary_clickable_bgcolor',
					esc_html__( 'Open Submenu Arrow BG', 'weaver-xtreme' ),
					weaverx_filter_text( __( 'Clickable mobile open submenu arrow BG. Contrasting BG color required for proper user interface. <em>Not used by SmartMenus</em>. (Default: rgba(255,255,255,0.2)', 'weaver-xtreme' ) ), 'refresh' ),


				'm_primary_dividers_color' => weaverx_cz_coloropt_plus(
					'm_primary_dividers_color',
					esc_html__( 'Dividers between menu items', 'weaver-xtreme' ),
					esc_html__( 'Add colored dividers between menu items. Leave blank for none.', 'weaver-xtreme' ),
					'refresh'
				),


				'color-sm-heading' => weaverx_cz_group_title( esc_html__( 'Secondary Menu Colors', 'weaver-xtreme' ),
					esc_html__( 'You must define a Secondary Menu from the Custom Menus Content menu.', 'weaver-xtreme' ) ),

				'm_secondary_color' => weaverx_cz_coloropt( 'm_secondary_color',
					esc_html__( 'Secondary Menu Bar Text Color', 'weaver-xtreme' ),
					esc_html__( 'Text Color for Entire menu bar.', 'weaver-xtreme' ), WEAVERX_MENU_UPDATE ),

				'm_secondary_bgcolor' => weaverx_cz_coloropt( 'm_secondary_bgcolor',
					esc_html__( 'Secondary Menu Bar BG Color', 'weaver-xtreme' ),
					esc_html__( 'Background Color for Entire menu bar.', 'weaver-xtreme' ), WEAVERX_MENU_UPDATE ),

				'm_secondary_link_bgcolor' => weaverx_cz_coloropt( 'm_secondary_link_bgcolor',
					esc_html__( 'Item BG Color', 'weaver-xtreme' ),
					esc_html__( 'Background Color for menu bar items.', 'weaver-xtreme' ), WEAVERX_MENU_UPDATE ),

				'm_secondary_dividers_color' => weaverx_cz_coloropt_plus(
					'm_secondary_dividers_color',
					esc_html__( 'Dividers between menu items', 'weaver-xtreme' ),
					esc_html__( 'Add colored dividers between menu items. Leave blank for none.', 'weaver-xtreme' ),
					'refresh'
				),

				'm_secondary_hover_color' => weaverx_cz_coloropt( 'm_secondary_hover_color',
					esc_html__( 'Secondary Menu Bar Hover Text Color', 'weaver-xtreme' ),
					'', 'refresh' ),

				'm_secondary_hover_bgcolor' => weaverx_cz_coloropt( 'm_secondary_hover_bgcolor',
					esc_html__( 'Secondary Menu Bar Hover BG Color', 'weaver-xtreme' ),
					'', 'refresh' ),

				'm_secondary_clickable_bgcolor' => weaverx_cz_coloropt( 'm_secondary_clickable_bgcolor',
					esc_html__( 'Open Submenu Arrow BG', 'weaver-xtreme' ),
					esc_html__( 'Clickable mobile open submenu arrow BG. Contrasting BG color required for proper user interface. <em>Not used by SmartMenus</em>. (Default: rgba( 255,255,255,0.2)', 'weaver-xtreme' ), 'refresh' ),


				'm_secondary_html_color' => weaverx_cz_coloropt_plus(
					'm_secondary_html_color',
					esc_html__( 'HTML: Text Color', 'weaver-xtreme' ),
					esc_html__( 'Text Color for Left/Right Menu Bar HTML.', 'weaver-xtreme' ), WEAVERX_MENU_UPDATE
				),

				'm_secondary_sub_color' => weaverx_cz_coloropt( 'm_secondary_sub_color',
					esc_html__( 'Secondary Sub-Menu Text Color', 'weaver-xtreme' ),
					'', WEAVERX_MENU_UPDATE ),

				'm_secondary_sub_bgcolor' => weaverx_cz_coloropt( 'm_secondary_sub_bgcolor',
					esc_html__( 'Secondary Sub-Menu BG Color', 'weaver-xtreme' ),
					'', WEAVERX_MENU_UPDATE ),

				'm_secondary_sub_hover_color' => weaverx_cz_coloropt( 'm_secondary_sub_hover_color',
					esc_html__( 'Secondary Sub-Menu Hover Text Color', 'weaver-xtreme' ),
					'', 'refresh' ),

				'm_secondary_sub_hover_bgcolor' => weaverx_cz_coloropt( 'm_secondary_sub_hover_bgcolor',
					esc_html__( 'Secondary Sub-Menu Hover BG Color', 'weaver-xtreme' ),
					'', 'refresh' ),
			);
			$colorscheme_sections['color-menus']['options'] = array_merge( $colorscheme_sections['color-menus']['options'], $level );
		}


		$levelmini = array(
			'color-minim-heading' => weaverx_cz_group_title( esc_html__( 'Header Mini Menu Colors', 'weaver-xtreme' ),
				esc_html__( 'You must define a Header Menu from the Custom Menus Content menu.', 'weaver-xtreme' ) ),

			'm_header_mini_color' => weaverx_cz_coloropt( 'm_header_mini_color',
				esc_html__( 'Header Mini Menu Text Color', 'weaver-xtreme' ), '', WEAVERX_MENU_UPDATE ),

			'm_header_mini_bgcolor' => weaverx_cz_coloropt( 'm_header_mini_bgcolor',
				esc_html__( 'Header Mini Menu BG Color', 'weaver-xtreme' ), '', WEAVERX_MENU_UPDATE ),

			'm_header_mini_hover_color' => weaverx_cz_coloropt( 'm_header_mini_hover_color',
				esc_html__( 'Header Mini Menu Hover Text Color', 'weaver-xtreme' ),
				'', 'refresh' ),


			'color-allmenus-heading' => weaverx_cz_group_title( esc_html__( 'Colors For All Menus', 'weaver-xtreme' ),
				esc_html__( 'These options specify current page attributes for all menus.', 'weaver-xtreme' ) ),

			'menubar_curpage_color' => weaverx_cz_coloropt( 'menubar_curpage_color',
				esc_html__( 'Menus Current Page Text Color', 'weaver-xtreme' ), '', WEAVERX_MENU_UPDATE ),

			'menubar_curpage_bgcolor' => weaverx_cz_coloropt( 'menubar_curpage_bgcolor',
				esc_html__( 'Menus Current Page BG Color', 'weaver-xtreme' ), '', WEAVERX_MENU_UPDATE ),


			'm_retain_hover' => array(
				'setting' => array(),
				'control' => array(
					'label'       => esc_html__( 'Retain Menu Bar Hover BG Color', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					'description' => esc_html__( 'Retain the menu bar item hover BG color when sub-menus are opened.', 'weaver-xtreme' ),
					'type'        => 'checkbox',
				),
			),
		);

		$colorscheme_sections['color-menus']['options'] = array_merge( $colorscheme_sections['color-menus']['options'], $levelmini );


		if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {
			if ( weaverx_cz_is_plus() ) {
				$new_opts = array(
					'color-xm-heading' => weaverx_cz_group_title( esc_html__( 'Extra Menu Colors', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON ),

					'm_extra_color' => weaverx_cz_coloropt( 'm_extra_color',
						esc_html__( 'Extra Menu Bar Text Color', 'weaver-xtreme' ),
						esc_html__( 'Text Color for Entire menu bar.', 'weaver-xtreme' ), WEAVERX_MENU_UPDATE ),

					'm_extra_bgcolor' => weaverx_cz_coloropt( 'm_extra_bgcolor',
						esc_html__( 'Extra Menu Bar BG Color', 'weaver-xtreme' ),
						esc_html__( 'Background Color for Entire menu bar.', 'weaver-xtreme' ), WEAVERX_MENU_UPDATE ),

					'm_extra_link_bgcolor' => weaverx_cz_coloropt( 'm_extra_link_bgcolor',
						esc_html__( 'Item BG Color', 'weaver-xtreme' ),
						esc_html__( 'Background Color for menu bar items.', 'weaver-xtreme' ), WEAVERX_MENU_UPDATE ),


					'm_extra_dividers_color' => weaverx_cz_coloropt_plus(
						'm_extra_dividers_color',
						esc_html__( 'Dividers between menu items', 'weaver-xtreme' ),
						esc_html__( 'Add colored dividers between menu items. Leave blank for none.', 'weaver-xtreme' ),
						'refresh'
					),

					'm_extra_hover_color' => weaverx_cz_coloropt( 'm_extra_hover_color',
						esc_html__( 'Extra Menu Bar Hover Text Color', 'weaver-xtreme' ),
						'', 'refresh' ),

					'm_extra_hover_bgcolor' => weaverx_cz_coloropt( 'm_extra_hover_bgcolor',
						esc_html__( 'Extra Menu Bar Hover BG Color', 'weaver-xtreme' ),
						'', 'refresh' ),

					'm_extra_clickable_bgcolor' => weaverx_cz_coloropt( 'm_extra_clickable_bgcolor',
						esc_html__( 'Open Submenu Arrow BG', 'weaver-xtreme' ),
						weaverx_filter_text( __( 'Clickable mobile open submenu arrow BG. Contrasting BG color required for proper user interface. <em>Not used by SmartMenus</em>. (Default: rgba( 255,255,255,0.2)', 'weaver-xtreme' ) ),
						'refresh' ),


					'm_extra_html_color' => weaverx_cz_coloropt_plus(
						'm_extra_html_color',
						esc_html__( 'HTML: Text Color', 'weaver-xtreme' ),
						esc_html__( 'Text Color for Left/Right Menu Bar HTML.', 'weaver-xtreme' ), WEAVERX_MENU_UPDATE
					),

					'm_extra_sub_color' => weaverx_cz_coloropt( 'm_extra_sub_color',
						esc_html__( 'Extra Sub-Menu Text Color', 'weaver-xtreme' ),
						'', WEAVERX_MENU_UPDATE ),

					'm_extra_sub_bgcolor' => weaverx_cz_coloropt( 'm_extra_sub_bgcolor',
						esc_html__( 'Extra Sub-Menu BG Color', 'weaver-xtreme' ),
						'', WEAVERX_MENU_UPDATE ),

					'm_extra_sub_hover_color' => weaverx_cz_coloropt( 'm_extra_sub_hover_color',
						esc_html__( 'Extra Sub-Menu Hover Text Color', 'weaver-xtreme' ),
						'', 'refresh' ),

					'm_extra_sub_hover_bgcolor' => weaverx_cz_coloropt( 'm_extra_sub_hover_bgcolor',
						esc_html__( 'Extra Sub-Menu Hover BG Color', 'weaver-xtreme' ),
						'', 'refresh' ),
				);
			} else {
				$new_opts = weaverx_cz_add_plus_message( 'color_menus', esc_html__( 'Extra Menu', 'weaver-xtreme' ),
					weaverx_filter_text( __( 'Add extra menus with <strong>Weaver Xtreme Plus</strong>.', 'weaver-xtreme' ) ) );
			}
			// add stub or extra menu options
			$colorscheme_sections['color-menus']['options'] = array_merge( $colorscheme_sections['color-menus']['options'], $new_opts );
		}

		/**
		 * Info Bar
		 */
		if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {
			$colorscheme_sections['color-info-bar'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Info Bar', 'weaver-xtreme' ),
				'description' => esc_html__( 'Info Bar has breadcrumbs and paged navigation displayed under Primary Menu.', 'weaver-xtreme' ),
				'options'     => array(

					'infobar_color' => weaverx_cz_coloropt(
						'infobar_color',
						esc_html__( 'Info Bar Text Color', 'weaver-xtreme' )
					),

					'infobar_bgcolor' => weaverx_cz_coloropt(
						'infobar_bgcolor',
						esc_html__( 'Info Bar BG Color', 'weaver-xtreme' )
					),


				),
			);
		}

		/**
		 * Content
		 */
		$colorscheme_sections['color-content'] = array(
			'panel'       => $panel,
			'title'       => esc_html__( 'Content', 'weaver-xtreme' ),
			'description' => weaverx_filter_text( __( 'Colors for general page and post content. You can override post specific colors on the <em>Post Specific Colors</em> panel.', 'weaver-xtreme' ) ),
			'options'     => array(

				'content_color' => weaverx_cz_coloropt(
					'content_color',
					esc_html__( 'Content Area Text Color', 'weaver-xtreme' )
				),

				'content_bgcolor' => weaverx_cz_coloropt(
					'content_bgcolor',
					esc_html__( 'Content Area BG Color', 'weaver-xtreme' )
				),

				'page_title_color' => weaverx_cz_coloropt(
					'page_title_color',
					esc_html__( 'Page Title Text Color', 'weaver-xtreme' ),
					esc_html__( 'Page titles, including pages, post single pages, and archive-like pages.', 'weaver-xtreme' )
				),

				'page_title_bgcolor' => weaverx_cz_coloropt(
					'page_title_bgcolor',
					esc_html__( 'Page Title BG Color', 'weaver-xtreme' )
				),
			),
		);

		if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {

			$level                                            = array(
				'archive_title_color' => weaverx_cz_coloropt(
					'archive_title_color',
					esc_html__( 'Archive Pages Title Text Color', 'weaver-xtreme' ),
					esc_html__( 'Archive-like page titles: archives, categories, tags, searches.', 'weaver-xtreme' )
				),

				'archive_title_bgcolor' => weaverx_cz_coloropt(
					'archive_title_bgcolor',
					esc_html__( 'Archive Pages Title BG Color', 'weaver-xtreme' )
				),

				'content_h_color' => weaverx_cz_coloropt(
					'content_h_color',
					esc_html__( 'Content Headings Text Color', 'weaver-xtreme' ),
					esc_html__( 'Headings ( &lt;h1&gt;-&lt;h6&gt; ) in page and post content.', 'weaver-xtreme' )
				),

				'content_h_bgcolor' => weaverx_cz_coloropt(
					'content_h_bgcolor',
					esc_html__( 'Content Headings BG', 'weaver-xtreme' ),
					esc_html__( 'Headings ( &lt;h1&gt;-&lt;h6&gt; ) in page and post content.', 'weaver-xtreme' )
				),


				'content-line1' => weaverx_cz_line(),

				'input_color' => weaverx_cz_coloropt(
					'input_color',
					esc_html__( 'Text Input Areas Color', 'weaver-xtreme' )
				),

				'input_bgcolor' => weaverx_cz_coloropt(
					'input_bgcolor',
					esc_html__( 'Text Input Areas BG Color', 'weaver-xtreme' )
				),

				'search_color' => weaverx_cz_coloropt(
					'search_color',
					esc_html__( 'Search Input Text Color', 'weaver-xtreme' )
				),

				'search_bgcolor' => weaverx_cz_coloropt(
					'search_bgcolor',
					esc_html__( 'Search Input BG Color', 'weaver-xtreme' )
				),


				'search_icon_msg' => weaverx_cz_heading( esc_html__( 'Search Icon Color', 'weaver-xtreme' ),
					esc_html__( 'The Search Icon colored graphics used by previous versions of Weaver Xtreme have been discontinued. A text icon is now used. The color of the search icon is inherited from wrapping areas text color, including the header area and menu bar.', 'weaver-xtreme' ) ),


				'content-line1a' => array(
					'control' => array(
						'control_type' => 'WeaverX_Misc_Control',
						'type'         => 'line',
					),
				),

				'hr_color' => weaverx_cz_coloropt(
					'hr_color',
					esc_html__( '&lt;HR&gt; color', 'weaver-xtreme' ),
					weaverx_filter_text( __( 'Color of horizontal ( &lt;hr&gt; ) lines in posts and pages. Use the <em>Custom CSS &rarr; Content</em> panel to customize the style of the &lt;hr&gt;.', 'weaver-xtreme' ) )
				),

				'content-line1b' => array(
					'control' => array(
						'control_type' => 'WeaverX_Misc_Control',
						'type'         => 'line',
					),
				),

				'comment_headings_color' => weaverx_cz_coloropt(
					'comment_headings_color',
					esc_html__( 'Color for headings in comment form', 'weaver-xtreme' )
				),


				'comment_content_bgcolor' => weaverx_cz_coloropt(
					'comment_content_bgcolor',
					esc_html__( 'Comment content area BG Color', 'weaver-xtreme' )
				),

				'comment_submit_bgcolor' => weaverx_cz_coloropt(
					'comment_submit_bgcolor',
					esc_html__( '"Post Comment" submit button BG Color', 'weaver-xtreme' )
				),

				'content-line2' => array(
					'control' => array(
						'control_type' => 'WeaverX_Misc_Control',
						'type'         => 'line',
					),
				),

				'editor_bgcolor' => weaverx_cz_coloropt(
					'editor_bgcolor',
					esc_html__( 'Page/Post Editor BG', 'weaver-xtreme' ),
					esc_html__( "Alternative Background Color to use for Page/Post editor if you're using transparent or image backgrounds.", 'weaver-xtreme' ),
					'refresh'
				),
			);
			$colorscheme_sections['color-content']['options'] = array_merge( $colorscheme_sections['color-content']['options'], $level );
		}

		/**
		 * Post Specific
		 */
		$colorscheme_sections['color-post-specific'] = array(
			'panel'       => $panel,
			'title'       => esc_html__( 'Post Specific', 'weaver-xtreme' ),
			'description' => esc_html__( 'Post Specific Colors - override Content colors.', 'weaver-xtreme' ),
			'options'     => array(
				'color-post-heading' => weaverx_cz_heading( esc_html__( 'Post Specific', 'weaver-xtreme' ) ),

				'post_color' => weaverx_cz_coloropt(
					'post_color',
					esc_html__( 'Post Area Text Color', 'weaver-xtreme' )
				),

				'post_bgcolor' => weaverx_cz_coloropt(
					'post_bgcolor',
					esc_html__( 'Post Area BG Color', 'weaver-xtreme' )
				),

				'stickypost_bgcolor' => weaverx_cz_coloropt(
					'stickypost_bgcolor',
					esc_html__( 'Sticky Post Area BG Color', 'weaver-xtreme' )
				),

				'post_title_color' => weaverx_cz_coloropt(
					'post_title_color',
					esc_html__( 'Post Title Text Color', 'weaver-xtreme' )
				),

				'post_title_bgcolor' => weaverx_cz_coloropt(
					'post_title_bgcolor',
					esc_html__( 'Post Title BG Color', 'weaver-xtreme' )
				),

				'post_title_hover_color' => weaverx_cz_coloropt(
					'post_title_hover_color',
					esc_html__( 'Post Title Hover Color', 'weaver-xtreme' ),
					esc_html__( 'Color if you want the Post Title to show alternate color for hover.', 'weaver-xtreme' ),
					'refresh'
				),
			),
		);


		if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {
			$level                                                  = array(
				'post_info_top_color' => weaverx_cz_coloropt(
					'post_info_top_color',
					esc_html__( 'Top Post Meta Info Text Color', 'weaver-xtreme' )
				),

				'post_info_top_bgcolor' => weaverx_cz_coloropt(
					'post_info_top_bgcolor',
					esc_html__( 'Top Post Meta Info BG Color', 'weaver-xtreme' )
				),

				'post_info_bottom_color' => weaverx_cz_coloropt(
					'post_info_bottom_color',
					esc_html__( 'Bottom Post Meta Info Text Color', 'weaver-xtreme' )
				),


				'post_info_bottom_bgcolor' => weaverx_cz_coloropt(
					'post_info_bottom_bgcolor',
					esc_html__( 'Bottom Post Meta Info BG Color', 'weaver-xtreme' )
				),

				'post_icons_color' => weaverx_cz_coloropt(
					'post_icons_color',
					esc_html__( 'Post Font Icons Color', 'weaver-xtreme' ),
					weaverx_filter_text( __( 'Set Font Icon color if Font Icons on Info Lines specified on the <em>Style &rarr; Post Specific</em> panel.', 'weaver-xtreme' ) )
				),

				'post_author_bgcolor' => weaverx_cz_coloropt(
					'post_author_bgcolor',
					esc_html__( 'Author Info BG Color', 'weaver-xtreme' ),
					esc_html__( 'Background color used for Author Bio.', 'weaver-xtreme' )
				),
			);
			$colorscheme_sections['color-post-specific']['options'] = array_merge( $colorscheme_sections['color-post-specific']['options'], $level );
		}


		/**
		 * Sidebars
		 */
		$colorscheme_sections['color-sidebars'] = array(
			'panel'       => $panel,
			'title'       => esc_html__( 'Sidebars &amp; Widget Area', 'weaver-xtreme' ),
			'description' => esc_html__( 'Main Sidebars and Widget areas. Header and Footer areas options under Header and Footer panels.', 'weaver-xtreme' ),
			'options'     => array(

				'color-primary-widget-heading' => weaverx_cz_group_title( esc_html__( 'Primary Widget Area', 'weaver-xtreme' ) ),

				'primary_color'   => array(
					'setting' => array(
						'sanitize_callback' => WEAVERX_CZ_SANITIZE_COLOR,
						'transport'         => WEAVERX_COLOR_TRANSPORT,
						'default'           => weaverx_cz_getopt( 'primary_color' ),
					),
					'control' => array(
						'control_type' => WEAVERX_COLOR_CONTROL,
						'label'        => esc_html__( 'Primary Widget Area Text Color', 'weaver-xtreme' ),
						'description'  => '',
					),
				),
				'primary_bgcolor' => array(
					'setting' => array(
						'sanitize_callback' => WEAVERX_CZ_SANITIZE_COLOR,
						'transport'         => WEAVERX_COLOR_TRANSPORT,
						'default'           => weaverx_cz_getopt( 'primary_bgcolor' ),
					),
					'control' => array(
						'control_type' => WEAVERX_COLOR_CONTROL,
						'label'        => esc_html__( 'Primary Widget Area BG Color', 'weaver-xtreme' ),
						'description'  => '',
					),
				),


				'color-secondary-widget-heading' => weaverx_cz_group_title( esc_html__( 'Secondary Widget Area', 'weaver-xtreme' ) ),

				'secondary_color'   => array(
					'setting' => array(
						'sanitize_callback' => WEAVERX_CZ_SANITIZE_COLOR,
						'transport'         => WEAVERX_COLOR_TRANSPORT,
						'default'           => weaverx_cz_getopt( 'secondary_color' ),
					),
					'control' => array(
						'control_type' => WEAVERX_COLOR_CONTROL,
						'label'        => esc_html__( 'Secondary Widget Area Text Color', 'weaver-xtreme' ),
						'description'  => '',
					),
				),
				'secondary_bgcolor' => array(
					'setting' => array(
						'sanitize_callback' => WEAVERX_CZ_SANITIZE_COLOR,
						'transport'         => WEAVERX_COLOR_TRANSPORT,
						'default'           => weaverx_cz_getopt( 'secondary_bgcolor' ),
					),
					'control' => array(
						'control_type' => WEAVERX_COLOR_CONTROL,
						'label'        => esc_html__( 'Secondary Widget Area BG Color', 'weaver-xtreme' ),
						'description'  => '',
					),
				),

				'flow_color' => array(
					'setting' => array(
						'transport' => 'refresh',
					),
					'control' => array(
						'control_type' => WEAVERX_PLUS_CHECKBOX_CONTROL,
						'label'        => esc_html__( 'Flow Color to Bottom', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
						'description'  => esc_html__( 'If checked, Content and Sidebar bg colors will flow to bottom of the Container ( that is, equal heights ). You must provide background colors for the Content and Sidebars or the default bg color will be used.', 'weaver-xtreme' ),
						'type'         => 'checkbox',
					),
				),


				'color-top-widget-heading' => weaverx_cz_group_title( esc_html__( 'Top Widget Areas', 'weaver-xtreme' ),
					esc_html__( 'Properties for all Top Widget areas (Sitewide, Pages, Blog, Archive).', 'weaver-xtreme' ) ),

				'top_color'   => array(
					'setting' => array(
						'sanitize_callback' => WEAVERX_CZ_SANITIZE_COLOR,
						'transport'         => WEAVERX_COLOR_TRANSPORT,
						'default'           => weaverx_cz_getopt( 'top_color' ),
					),
					'control' => array(
						'control_type' => WEAVERX_COLOR_CONTROL,
						'label'        => esc_html__( 'Top Widget Areas Text Color', 'weaver-xtreme' ),
						'description'  => '',
					),
				),
				'top_bgcolor' => array(
					'setting' => array(
						'sanitize_callback' => WEAVERX_CZ_SANITIZE_COLOR,
						'transport'         => WEAVERX_COLOR_TRANSPORT,
						'default'           => weaverx_cz_getopt( 'top_bgcolor' ),
					),
					'control' => array(
						'control_type' => WEAVERX_COLOR_CONTROL,
						'label'        => esc_html__( 'Top Widget Areas BG Color', 'weaver-xtreme' ),
						'description'  => '',
					),
				),


				'color-bottom-widget-heading' => weaverx_cz_group_title( esc_html__( 'Bottom Widget Areas', 'weaver-xtreme' ),
					esc_html__( 'Properties for all Bottom Widget areas (Sitewide, Pages, Blog, Archive).', 'weaver-xtreme' ) ),

				'bottom_color'   => array(
					'setting' => array(
						'sanitize_callback' => WEAVERX_CZ_SANITIZE_COLOR,
						'transport'         => WEAVERX_COLOR_TRANSPORT,
						'default'           => weaverx_cz_getopt( 'bottom_color' ),
					),
					'control' => array(
						'control_type' => WEAVERX_COLOR_CONTROL,
						'label'        => esc_html__( 'Bottom Widget Areas Text Color', 'weaver-xtreme' ),
						'description'  => '',
					),
				),
				'bottom_bgcolor' => array(
					'setting' => array(
						'sanitize_callback' => WEAVERX_CZ_SANITIZE_COLOR,
						'transport'         => WEAVERX_COLOR_TRANSPORT,
						'default'           => weaverx_cz_getopt( 'bottom_bgcolor' ),
					),
					'control' => array(
						'control_type' => WEAVERX_COLOR_CONTROL,
						'label'        => esc_html__( 'Bottom Widget Areas BG Color', 'weaver-xtreme' ),
						'description'  => '',
					),
				),
			),
		);

		/**
		 * Widgets
		 */
		$colorscheme_sections['color-widgets'] = array(
			'panel'       => $panel,
			'title'       => esc_html__( 'Individual Widgets', 'weaver-xtreme' ),
			'description' => 'Properties for individual widgets (e.g., Text, Recent Posts, etc.)',
			'options'     => array(

				'widget_color'   => array(
					'setting' => array(
						'sanitize_callback' => WEAVERX_CZ_SANITIZE_COLOR,
						'transport'         => WEAVERX_COLOR_TRANSPORT,
						'default'           => weaverx_cz_getopt( 'widget_color' ),
					),
					'control' => array(
						'control_type' => WEAVERX_COLOR_CONTROL,
						'label'        => esc_html__( 'Individual Widgets Text Color', 'weaver-xtreme' ),
						'description'  => '',
					),
				),
				'widget_bgcolor' => array(
					'setting' => array(
						'sanitize_callback' => WEAVERX_CZ_SANITIZE_COLOR,
						'transport'         => WEAVERX_COLOR_TRANSPORT,
						'default'           => weaverx_cz_getopt( 'widget_bgcolor' ),
					),
					'control' => array(
						'control_type' => WEAVERX_COLOR_CONTROL,
						'label'        => esc_html__( 'Individual Widgets BG Color', 'weaver-xtreme' ),
						'description'  => '',
					),
				),

				'widget_title_color'   => array(
					'setting' => array(
						'sanitize_callback' => WEAVERX_CZ_SANITIZE_COLOR,
						'transport'         => WEAVERX_COLOR_TRANSPORT,
						'default'           => weaverx_cz_getopt( 'widget_title_color' ),
					),
					'control' => array(
						'control_type' => WEAVERX_COLOR_CONTROL,
						'label'        => esc_html__( 'Individual Widgets Title Text Color', 'weaver-xtreme' ),
						'description'  => '',
					),
				),
				'widget_title_bgcolor' => array(
					'setting' => array(
						'sanitize_callback' => WEAVERX_CZ_SANITIZE_COLOR,
						'transport'         => WEAVERX_COLOR_TRANSPORT,
						'default'           => weaverx_cz_getopt( 'widget_title_bgcolor' ),
					),
					'control' => array(
						'control_type' => WEAVERX_COLOR_CONTROL,
						'label'        => esc_html__( 'Individual Widgets Title BG Color', 'weaver-xtreme' ),
						'description'  => '',
					),
				),


			),
		);


		/**
		 * Footer
		 */
		$colorscheme_sections['color-footer'] = array(
			'panel'   => $panel,
			'title'   => esc_html__( 'Footer Area', 'weaver-xtreme' ),
			'options' => array(
				'footer_color' => array(
					'setting' => array(
						'sanitize_callback' => WEAVERX_CZ_SANITIZE_COLOR,
						'transport'         => WEAVERX_COLOR_TRANSPORT,
						'default'           => weaverx_cz_getopt( 'footer_color' ),
					),
					'control' => array(
						'control_type' => WEAVERX_COLOR_CONTROL,
						'label'        => esc_html__( 'Footer Area Text Color', 'weaver-xtreme' ),
						'description'  => '',
					),
				),

				'footer_bgcolor_moved' => weaverx_cz_text( weaverx_filter_text( __( '<strong>Footer Area BG Color</strong>. This option is now found on the "Layout &rarr; Core Site Layout and Styling" menu.', 'weaver-xtreme' ) ) ),

			),
		);

		if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {

			$level                                           = array(
				'footer_sb_color'   => array(
					'setting' => array(
						'sanitize_callback' => WEAVERX_CZ_SANITIZE_COLOR,
						'transport'         => WEAVERX_COLOR_TRANSPORT,
						'default'           => weaverx_cz_getopt( 'footer_sb_color' ),
					),
					'control' => array(
						'control_type' => WEAVERX_COLOR_CONTROL,
						'label'        => weaverx_filter_text( __( 'Footer Widget Area Text Color', 'weaver-xtreme' ) ),
						'description'  => '',
					),
				),
				'footer_sb_bgcolor' => array(
					'setting' => array(
						'sanitize_callback' => WEAVERX_CZ_SANITIZE_COLOR,
						'transport'         => WEAVERX_COLOR_TRANSPORT,
						'default'           => weaverx_cz_getopt( 'footer_sb_bgcolor' ),
					),
					'control' => array(
						'control_type' => WEAVERX_COLOR_CONTROL,
						'label'        => weaverx_filter_text( __( 'Footer Widget Area BG Color', 'weaver-xtreme' ) ),
						'description'  => '',
					),
				),

				'footer_html_color'   => array(
					'setting' => array(
						'sanitize_callback' => WEAVERX_CZ_SANITIZE_COLOR,
						'transport'         => WEAVERX_COLOR_TRANSPORT,
						'default'           => weaverx_cz_getopt( 'footer_html_color' ),
					),
					'control' => array(
						'control_type' => WEAVERX_COLOR_CONTROL,
						'label'        => weaverx_filter_text( __( 'Footer HTML Area Text Color', 'weaver-xtreme' ) ),
						'description'  => '',
					),
				),
				'footer_html_bgcolor' => array(
					'setting' => array(
						'sanitize_callback' => WEAVERX_CZ_SANITIZE_COLOR,
						'transport'         => WEAVERX_COLOR_TRANSPORT,
						'default'           => weaverx_cz_getopt( 'footer_html_bgcolor' ),
					),
					'control' => array(
						'control_type' => WEAVERX_COLOR_CONTROL,
						'label'        => weaverx_filter_text( __( 'Footer HTML Area BG Color', 'weaver-xtreme' ) ),
						'description'  => '',
					),
				),
			);
			$colorscheme_sections['color-footer']['options'] = array_merge( $colorscheme_sections['color-footer']['options'], $level );
		}


		return $colorscheme_sections;
	}
endif;

?>

<?php

if ( ! function_exists( 'weaverx_customizer_define_general_sections' ) ) :
	/**
	 * Define the sections and settings for the General panel
	 */
	function weaverx_customizer_define_general_sections() {
		$panel = 'weaverx_general';
		$general_sections = array();
		global $wp_customize;


		/**
		 * Site Title & Tagline ( Site Identity now )
		 *
		 * This is a built-in section.
		 */

		$section_id = 'title_tagline';
		$section = $wp_customize->get_section( $section_id );

		// Move Site Title & Tagline section to General panel
		$section->panel = $panel;

		// Set Site Title & Tagline section priority
		$section->priority = 10;

		// Reset priorities on Site Title control
		//$wp_customize->get_control( 'blogname' )->priority = 12;

		// Reset priorities on Tagline control
		//$wp_customize->get_control( 'blogdescription' )->priority = 14;


		/**
		 * Static Front Page
		 */

		$section_id = 'static_front_page';
		$section = $wp_customize->get_section( $section_id );

		// Bail if the section isn't registered
		if ( is_object( $section ) && 'WP_Customize_Section' === get_class( $section ) ) {

			$section->panel = $panel;    // Move Static Front Page section to General panel

			$section->priority = 16;    // Set Static Front Page section priority
		}


		// add our own stuff....

		$general_sections['general_options_level'] = array(
			'panel'   => $panel,
			'title'   => esc_html__( 'Set Options Level', 'weaver-xtreme' ),
			'options' => array(

				'set_option_level' => array(
					'setting' => array(
						'transport' => 'postMessage',
					),
					'control' => array(
						'control_type' => 'WeaverX_Set_Customizer_Level',
						'label'        => esc_html__( 'Set Customizer Options Level', 'weaver-xtreme' ),
						'description'  => esc_html__( 'You can change the expertise level of the Customizer Interface. This can simplify and speed up the interface depending on your level of experience with Weaver Xtreme.', 'weaver-xtreme' ),
					),
				),
			),

		);

		if ( weaverx_cz_is_plus('3.1') ) {
			$general_sections['general_options_xplus'] = array(
				'panel'   => $panel,
				'title'   => esc_html__( 'Weaver Xtreme Plus', 'weaver-xtreme' ),
				'options' => array(

					'oxp-hdr1' => weaverx_cz_group_title( __( 'Weaver Xtreme Plus Status Information' , 'weaver-xtreme') ),

					'oxp-vers' => weaverx_cz_heading( __( 'Weaver Xtreme Version Installed', 'weaver-xtreme' ),
						__('Version:', 'weaver-xtreme') . ' ' . WEAVER_XPLUS_VERSION),
				),

			);
		}

		if ( weaverx_options_level() >= WEAVERX_LEVEL_ADVANCED ) {        // show if advanced


			$general_sections['general_admin'] = array(
				'panel'   => $panel,
				'title'   => esc_html__( 'Admin', 'weaver-xtreme' ),
				'options' => array(


					'_inline_style' => array(
						'setting' => array(
							'transport' => 'postMessage'    // no visual effect, so don't refresh
						),
						'control' => array(
							'control_type' => WEAVERX_PLUS_TEXT_CONTROL,
							'label'        => __( 'Inline CSS', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
							'description'  => __( 'Generate inline CSS code rather than using style-weaverxt.css file.
By default, Weaver Xtreme Plus will create and use the style-weaverxt.css file. &diams;', 'weaver-xtreme' ),
							'type'         => 'checkbox',
						),
					),

					'_no_schemea' => array(
						'setting' => array(
							'transport' => 'postMessage'    // no visual effect, so don't refresh
						),
						'control' => array(
							'label'       => __( 'Disable Schema.org Structured Data', 'weaver-xtreme' ),
							'description' => __( 'Disable adding Schema.org structured data. ( We do not recommend removing this SEO feature. ) &diams;', 'weaver-xtreme' ),
							'type'        => 'checkbox',
						),
					),

					'_print_show_widgets' => array(
						'setting' => array(
							'transport' => 'postMessage'    // no visual effect, so don't refresh
						),
						'control' => array(
							'label'       => __( 'Include Widget Areas in Print', 'weaver-xtreme' ),
							'description' => __( 'Include all widget areas and full Footer content on browser Print page operation. &diams;', 'weaver-xtreme' ),
							'type'        => 'checkbox',
						),
					),

					'_sitemap_exclude_pages' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_head_code',
							'transport'         => 'refresh',
							'default'           => '',
						),
						'control' => array(
							'control_type' => 'WeaverX_Textarea_Control',
							'label'        => esc_html__( 'Exclude Pages from SiteMap', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
							'description'  => weaverx_filter_text( __(
								'You can specify a comma separated list of Page IDs to be excluded from the SiteMap Page list.
To exclude pages from Search results, use a plugin such as "Search Exclude".
You can hide different sections of the SiteMap by adding rules to the "Custom CSS Rules" box.
To hide authors, for example, add the rule <code>#sitemap-authors{display:none;}</code>.
The IDs for the SiteMap sections are: <code>#sitemap-pages, #sitemap-posts, #sitemap-categories, #sitemap-tags, #sitemap-authors</code>. &diams;', 'weaver-xtreme' ) ),
							'type'         => 'textarea',
							'input_attrs'  => array(
								'rows'        => '1',
								'placeholder' => esc_html__( 'Comma separated list of Page IDs', 'weaver-xtreme' ),
							),
						),
					),

					'_hide_donate' => array(
						'setting' => array(
							'transport' => 'postMessage'    // no visual effect, so don't refresh
						),
						'control' => array(
							'label'       => __( 'I\'ve Donated', 'weaver-xtreme' ),
							'description' => __( 'Thank you for donating to the Weaver Xtreme theme.
This will hide the Donate button. Purchasing Weaver Xtreme Plus also hides the Donate button. &diams;', 'weaver-xtreme' ),
							'type'        => 'checkbox',
						),
					),

					'_hide_editor_style' => array(
						'setting' => array(
							'transport' => 'postMessage'    // no visual effect, so don't refresh
						),
						'control' => array(
							'label'       => __( 'Disable Page/Post Editor Styling', 'weaver-xtreme' ),
							'description' => __( 'Disable the Weaver Xtreme theme based styling in the Page/Post editor.
If you have a theme using transparent backgrounds, this option will likely improve the Post/Page editor visibility. &diams;', 'weaver-xtreme' ),
							'type'        => 'checkbox',
						),
					),

					'general_admin-roles' => weaverx_cz_group_title( esc_html__( 'Per Page and Per Post Option Panels', 'weaver-xtreme' ),
						esc_html__( 'Control when Per Page and Per Post options are displayed. Single site Administrator and Multi-Site Super Administrator will always have the Per Page and Per Post options panel displayed.
You may selectively disable these options for other User Roles using the check boxes below.', 'weaver-xtreme' ) ),

					'_hide_mu_admin_per' => weaverx_cz_checkbox_post(
						esc_html__( 'Hide Per Page/Post Options for MultiSite Admins &diams;', 'weaver-xtreme' )
					),


					'_hide_editor_per' => weaverx_cz_checkbox_post(
						esc_html__( 'Hide Per Page/Post Options for Editors &diams;', 'weaver-xtreme' )
					),

					'_hide_author_per' => weaverx_cz_checkbox_post(
						esc_html__( 'Hide Per Page/Post Options for Authors and Contributors &diams;', 'weaver-xtreme' )
					),

					'_show_per_post_all' => weaverx_cz_checkbox_post(
						esc_html__( 'Show Per Post Options for Custom Post Types &diams', 'weaver-xtreme' )
					),

					'general_admin-names' => weaverx_cz_group_title( esc_html__( 'Theme Name and Description', 'weaver-xtreme' ),
						esc_html__( 'You can change the name and description of your current settings if you would like to create a new theme
theme file for sharing with others, or for you own identification.', 'weaver-xtreme' ) ),

					'themename' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_head_code',
							'transport'         => 'refresh',
							'default'           => '',
						),
						'control' => array(
							'control_type' => 'WeaverX_Textarea_Control',
							'label'        => esc_html__( 'Theme Name', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
							'type'         => 'textarea',
							'input_attrs'  => array(
								'rows'        => '1',
								'placeholder' => esc_html__( 'Theme Name', 'weaver-xtreme' ),
							),
						),
					),

					'theme_description' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_head_code',
							'transport'         => 'refresh',
							'default'           => '',
						),
						'control' => array(
							'control_type' => 'WeaverX_Textarea_Control',
							'label'        => esc_html__( 'Theme Description', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
							'type'         => 'textarea',
							'input_attrs'  => array(
								'rows'        => '1',
								'placeholder' => esc_html__( 'Theme Description', 'weaver-xtreme' ),
							),
						),
					),

					'subtheme_notes' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_head_code',
							'transport'         => 'refresh',
							'default'           => '',
						),
						'control' => array(
							'control_type' => 'WeaverX_Textarea_Control',
							'label'        => esc_html__( 'Subtheme Notes', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
							'type'         => 'textarea',
							'input_attrs'  => array(
								'rows'        => '1',
								'placeholder' => esc_html__( 'Theme Notes', 'weaver-xtreme' ),
							),
						),
					),


				),
			);
		} else {        // int/beg levels

			$general_sections['general_admin'] = array(
				'panel'   => $panel,
				'title'   => esc_html__( 'Admin', 'weaver-xtreme' ),
				'options' => array(
					'general_admin-names2' => weaverx_cz_group_title( esc_html__( 'Admin Options (Full Level)', 'weaver-xtreme' ),
						esc_html__( 'The Full Level Admin options include options for: Inline CSS, Print Page, SiteMap, Donations, Editor styling, Multisite, and Theme Name.', 'weaver-xtreme' ) ),
				),
			);
		}


		if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard
			$general_sections['general_save_settings'] = array(
				'panel'   => $panel,
				'title'   => esc_html__( 'Save Settings', 'weaver-xtreme' ),
				'options' => array(

					'save_settings' => array(
						'setting' => array(
							'transport' => 'postMessage',
						),
						'control' => array(
							'control_type' => 'WeaverX_Save_WX_Settings',
							'label'        => esc_html__( 'Save Current Theme Settings to your Computer', 'weaver-xtreme' ),
							'description'  => weaverx_filter_text( __( 'You can download the current theme settings to a file on your computer.
<strong style="color-red">IMPORTANT NOTE:</strong> If you have not "Saved" your options yet, you will get a notice
asking if you want to leave this page or stay. If you leave, you will not save the most recent changes.', 'weaver-xtreme' ) ),
						),
					),


				),
			);
		} else {    // beg level
			$general_sections['general_save_settings'] = array(
				'panel'   => $panel,
				'title'   => esc_html__( 'Save Settings', 'weaver-xtreme' ),
				'options' => array(
					'general_admin-names3' => weaverx_cz_group_title( esc_html__( 'Save Settings (Full, Standard Levels)', 'weaver-xtreme' ),
						esc_html__( 'The Full and Standard Level Save Settings options allow you to save your settings to your computer.', 'weaver-xtreme' ) ),
				),
			);
		}

		if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard
			$general_sections['general_restore_settings'] = array(
				'panel'   => $panel,
				'title'   => esc_html__( 'Restore Settings', 'weaver-xtreme' ),
				'options' => array(

					'restore_settings' => array(
						'setting' => array(
							'transport' => 'postMessage',
						),
						'control' => array(
							'control_type' => 'WeaverX_Restore_WX_Settings',
							'label'        => esc_html__( 'Restore Settings', 'weaver-xtreme' ),
							'description'  => esc_html__( 'Restore settings you have saved to a file or the WordPress Database.', 'weaver-xtreme'),
						),
					),


				),
			);
		} else {    // beg level
			$general_sections['general_restore_settings'] = array(
				'panel'   => $panel,
				'title'   => esc_html__( 'Restore Settings', 'weaver-xtreme' ),
				'options' => array(
					'general_admin-names4' => weaverx_cz_group_title( esc_html__( 'Restore Settings (Full, Standard Levels)', 'weaver-xtreme' ),
						esc_html__( 'The Full and Standard Level Save Settings options allow you to restore your settings from your computer.', 'weaver-xtreme' ) ),
				),
			);
		}


		$general_sections['general_saverestore'] = array(
			'panel'   => $panel,
			'title'   => esc_html__( 'Legacy Weaver Xtreme Admin', 'weaver-xtreme' ),
			'options' => array(
				'legacy-save-restore' => weaverx_cz_html( esc_html__( 'Legacy Theme Options Interface', 'weaver-xtreme' ),
					sprintf( weaverx_filter_text( __( '<p>The <em>Appearance &rarr; Weaver Xtreme Admin</em> panel provides access to the complete
legacy Weaver Xtreme theme options interface. This interface supplies the traditional check-box interface.
It may be preferable for long-time Weaver Xtreme users, or for use on slow computers or slow connections.
</p><p>
You can access the legacy interface by clicking %s, and then on one of the following tabs.
<strong style="color:red;">WARNING!</strong> <em>Do not set options in both the Customizer and the legacy
Weaver Xtreme Admin interface at the same time - the two interfaces do not automatically share changes to settings.</em>
</p>
<h3>Theme Help</h3>
<p>Access to Help resources.</p>
<h3>Save/Restore</h3>
<p>Supports several ways to Save and Restore your existing settings, including directly to the WordPress database.</p>
<h3>Weaver Xtreme Subthemes</h3>
<p>This option includes the subthemes included in the optimizer, as well as many more.</p>
<h3>Main Options</h3>
<p>The main legacy options interface.</p>
<h3>Advanced Options</h3>
<p>Advanced options, including site specific options and some admin options.</p>
<h3>Add-ons</h3>
<p>Summary and help info for Weaver Xtreme Theme Support and Weaver Xtreme Plus.</p>',
						'weaver-xtreme' ) ),
						weaverx_cz_get_admin_page( esc_html__( 'Weaver Xtreme Admin Panel', 'weaver-xtreme' ) ) ) ),
			),
		);

		// Merge with master array
		return $general_sections;
	}
endif;


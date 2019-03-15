<?php
/**
 * Define topography settings - Weaver Xtreme Customizer
 */

define( 'TYPOGRAPHY_UPDATE', 'refresh' );

if ( ! function_exists( 'weaverx_customizer_define_typography_sections' ) ) :
	/**
	 * Define the sections and settings for the General panel
	 */
	function weaverx_customizer_define_typography_sections() {
		$panel               = 'weaverx_typography';
		$typography_sections = array();

		/**
		 * Global
		 */
		if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {     // show if full, standard
			$typography_sections['typo-global'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Global Typography Options', 'weaver-xtreme' ),
				'description' => weaverx_filter_text( __( 'This section covers global typography attributes, including available font families and base font size and spacing. <strong>Default Site Font options:</strong> See the <em>Typography &rarr; Wrapping Areas</em> menu.', 'weaver-xtreme' ) ),
				'options'     => array(

					'typo-intro' => weaverx_cz_group_title( esc_html__( 'Using Font Families', 'weaver-xtreme' ),
						weaverx_filter_text( __( '<em>Weaver Xtreme</em> includes support for over 30 font family choices: 16 <strong>Web Safe</strong> fonts, and the remaining from a carefully selected set of <strong>Google Fonts</strong>.
The <strong>Google Fonts</strong> will be displayed the same on every browser, <em>including</em> Android and iOS devices.
The <strong>Web Safe</strong> will be displayed as specified for most modern browsers, but will likely revert to
one of the three basic fonts supported by Android devices, or a limited set for iOS devices. <em>We highly recommend selecting <strong>Google Fonts</strong> for your site.</em><br/>
You can also add more Google Fonts, other free fonts, and even premium fonts using <em>Weaver Xtreme Plus</em>.<br />
You can see a demonstration of <em>Weaver Xtreme\'s</em> fonts here: ', 'weaver-xtreme' ) ) .
						weaverx_help_link( 'font-demo.html', esc_html__( 'Examples of supported fonts', 'weaver-xtreme' ), esc_html__( 'Font Examples', 'weaver-xtreme' ), false )
					),

					'sizing-intro' => weaverx_cz_group_title( esc_html__( 'Base Font Size and Spacing', 'weaver-xtreme' ),
						''
					),

					'site_fontsize_int' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
							'default'           => 16,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Site Base Font Size (px)', 'weaver-xtreme' ),
							'description'  => esc_html__( "Base font size of standard text. This value determines the default medium font size. Note that visitors can change their browser's font size, so final font size can vary, as expected. Default is 16px.", 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 2,
								'max'  => 50,
								'step' => 1,
							),
						),
					),

					'moreinfo1' => weaverx_cz_html( '',
						'<small>' . esc_html__( 'The Full level includes additional font spacing options, and Google Font options. (needs Xtreme Plus)', 'weaver-xtreme' ) . '</small>' ),

				),
			);


			if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {      // show if full
				$level                                         = array(
					'site_line_height_dec' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_float',
							'transport'         => 'postMessage',
							'default'           => 1.5,
						),
						'control' => array(
							'control_type' => WEAVERX_PLUS_RANGE_CONTROL,
							'label'        => esc_html__( 'Site Base Line Height', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
							'description'  => esc_html__( 'Set the Base line-height. Line heights for various font sizes based on this multiplier. (Default: 1.5 - no units)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => .1,
								'max'  => 10.,
								'step' => .1,
							),
						),
					),

					'site_fontsize_tablet_int' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'refresh',
							'default'           => 16,
						),
						'control' => array(
							'control_type' => WEAVERX_PLUS_RANGE_CONTROL,
							'label'        => esc_html__( 'Site Base Font Size - Small Tablets (px)', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
							'description'  => esc_html__( 'Small Tablet base font size of standard text. (Default medium font size: 16px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 2,
								'max'  => 50,
								'step' => 1,
							),
						),
					),
					'site_fontsize_phone_int'  => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'refresh',
							'default'           => 16,
						),
						'control' => array(
							'control_type' => WEAVERX_PLUS_RANGE_CONTROL,
							'label'        => esc_html__( 'Site Base Font Size - Phones (px)', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
							'description'  => esc_html__( 'Phone base font size of standard text. (Default medium font size: 16px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 2,
								'max'  => 50,
								'step' => 1,
							),
						),
					),

					'custom_fontsize_a' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_float',
							'transport'         => 'refresh',
							'default'           => 1.0,
						),
						'control' => array(
							'control_type' => WEAVERX_PLUS_RANGE_CONTROL,
							'label'        => esc_html__( 'Custom Font Size A (em)', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
							'description'  => esc_html__( 'Font Size for Custom Font Size A on the Font Size selection options.', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 20,
								'step' => .1,
							),
						),
					),

					'custom_fontsize_b' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_float',
							'transport'         => 'refresh',
							'default'           => 1.0,
						),
						'control' => array(
							'control_type' => WEAVERX_PLUS_RANGE_CONTROL,
							'label'        => esc_html__( 'Custom Font Size B (em)', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
							'description'  => esc_html__( 'Font Size for Custom Font Size B on the Font Size selection options.', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 20,
								'step' => .1,
							),
						),
					),

					'font_letter_spacing_global_dec' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_float',
							'transport'         => 'postMessage',
							'default'           => 0.0,
						),
						'control' => array(
							'control_type' => WEAVERX_PLUS_RANGE_CONTROL,
							'label'        => esc_html__( 'Character Spacing (em)', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
							'description'  => esc_html__( 'Add extra spacing between characters. (Default: 0)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => - .1,
								'max'  => .25,
								'step' => .0025,
							),
						),
					),

					'font_word_spacing_global_dec' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_float',
							'transport'         => 'postMessage',
							'default'           => 0.0,
						),
						'control' => array(
							'control_type' => WEAVERX_PLUS_RANGE_CONTROL,
							'label'        => esc_html__( 'Word Spacing (em)', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
							'description'  => esc_html__( 'Add extra spacing between words. (Default: 0)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => - .5,
								'max'  => 1.0,
								'step' => .05,
							),
						),
					),

					'typo-google-font-opts' => weaverx_cz_group_title( esc_html__( 'Integrated Google Fonts', 'weaver-xtreme' ),
						esc_html__( 'Weaver Xtreme integrates a selected set of Google Font families. You can disable them, or add different language support in this section.', 'weaver-xtreme' ) ),

					'disable_google_fonts' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Disable Google Font Integration', 'weaver-xtreme' ),
						weaverx_filter_text( __( '<strong>ADVANCED OPTION!</strong> <em>Be sure you understand the consequences of this option.</em> By disabling Google Font Integration, the Google Fonts definitions will <strong>not</strong> be loaded for your site, and the options will not be displayed on Font Family options subsequently. <strong style="color:red;font-weight:bold;">Please note:</strong> Any previously selected Google Font Families will revert to generic serif, sans, mono, and script fonts. Google Font Families WILL be displayed in the Customizer options until you manually refresh the Customizer page.', 'weaver-xtreme' ) )
					),

					'typo-lang-intro' => weaverx_cz_heading( esc_html__( 'Google Font Language Character Sets', 'weaver-xtreme' ),
						weaverx_filter_text( __( 'By default, integrated Google Fonts will include the <em>Latin Extended</em> character set. If you need a Crylic, Greek, Hebrew, or Vietnamese character set, these are currently supported by Google Fonts for <em>some</em> font families.
Google Fonts not supported for these character sets, and character sets for most other world languages will be displayed
using the default browser serif and sans fonts.', 'weaver-xtreme' ) ) ),

					'font_set_cryllic' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Cryllic', 'weaver-xtreme' ),
						esc_html__( 'Add Cryllic character set to Open Sans, Open Sans Condensed, Roboto (all), Arimo, and Tinos font families.', 'weaver-xtreme' )
					),

					'font_set_greek' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Greek', 'weaver-xtreme' ),
						esc_html__( 'Add Greek character set to Open Sans, Open Sans Condensed, Roboto (all), Arimo, and Tinos font families.', 'weaver-xtreme' )
					),

					'font_set_hebrew' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Hebrew', 'weaver-xtreme' ),
						esc_html__( 'Add Hebrew character set to Arimo and Tinos font families.', 'weaver-xtreme' )
					),

					'font_set_vietnamese' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Greek', 'weaver-xtreme' ),
						esc_html__( 'Add Greek character set to Open Sans, Open Sans Condensed, Roboto (all), Source Sans Pro, Alegreya Sans, Arimo, and Tinos font families.', 'weaver-xtreme' )
					),

					'typo-font-family-note' => array(
						'control' => array(
							'control_type' => 'WeaverX_Misc_Control',
							'label'        => esc_html__( 'Add Font Families', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
							'description'  => sprintf( weaverx_filter_text( __( '<p>The <strong>%1$s</strong> allows you add additional free fonts from
<a href="//www.google.com/webfonts" target="_blank" title="Google Web Fonts"><strong>Google Web Fonts</strong></a>,
<a href="//www.fontsquirrel.com" target="_blank" title="Font Squirrel"><strong>Font Squirrel</strong></a>,
or virtually any other free or commercial font source directly to all the
<em>Font Family</em> selectors found in various text options.</p>
<p>To define Font Families, please "Save &amp; Publish" options you may have set on this Optimizer, then click to open the
<strong>%2$s</strong>, and open the <em>Fonts &amp; Custom</em> tab.
Be sure to <em>Save Settings</em> before leaving the Legacy Weaver Xtreme Admin panel.</p>',
								'weaver-xtreme' ) ),
								weaverx_cz_get_admin_page( esc_html__( 'Weaver Xtreme Plus Font Control Panel', 'weaver-xtreme' ) ),
								weaverx_cz_get_admin_page( esc_html__( 'Weaver Xtreme Plus Font Control Panel', 'weaver-xtreme' ) ) ),
							'type'         => 'HTML',
						),
					),

				);
				$typography_sections['typo-global']['options'] = array_merge( $typography_sections['typo-global']['options'], $level );
			}

			/**
			 * General
			 */
			$typography_sections['typo-wrapping'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Wrapping Areas', 'weaver-xtreme' ),
				'description' => esc_html__( 'Set font and other typography attributes. Add new fonts from the <em>Appearance &rarr; Weaver Xtreme Admin &rarr; Main Options &rarr; Fonts &amp; Custom</em> panel. Use Site Colors to set colors.', 'weaver-xtreme' ),
				'options'     => array(

					'wrapper_fonts_moved' => weaverx_cz_group_title( esc_html__( 'Site Wrapper Fonts', 'weaver-xtreme' ),
						weaverx_filter_text( __( '<strong>Site Wrapper Font Selection</strong>. This option is found on the "Layout &rarr; Core Site Layout and Styling" menu.', 'weaver-xtreme' ) ) ),
				),

			);


			$new_opts                                        = weaverx_cz_add_fonts( 'container', esc_html__( 'Container Fonts', 'weaver-xtreme' ),
				esc_html__( 'Container typography for site. Wraps content and sidebars.', 'weaver-xtreme' ), 'postMessage' );
			$typography_sections['typo-wrapping']['options'] = array_merge( $typography_sections['typo-wrapping']['options'], $new_opts );

			/**
			 * Links
			 */
			$typography_sections['typo-links'] = array(
				'panel'   => $panel,
				'title'   => esc_html__( 'Links', 'weaver-xtreme' ),
				'options' => array(),
			);

			$new_opts                                     = weaverx_cz_add_link_fonts( 'link', esc_html__( 'Global Links', 'weaver-xtreme' ),
				esc_html__( 'Global default for link typography ( not including menus and titles ). Set Bold, Italic, and Underline by setting those options for specific areas rather than globally to have more control.', 'weaver-xtreme' ), 'refresh' );
			$typography_sections['typo-links']['options'] = array_merge( $typography_sections['typo-links']['options'], $new_opts );

			$new_opts                                     = weaverx_cz_add_link_fonts( 'ibarlink', esc_html__( 'Info Bar Links', 'weaver-xtreme' ),
				weaverx_filter_text( __( '<small>Typography for links in Info Bar ( uses Standard Link colors if left inherit ).', 'weaver-xtreme' ) ) );
			$typography_sections['typo-links']['options'] = array_merge( $typography_sections['typo-links']['options'], $new_opts );

			$new_opts                                     = weaverx_cz_add_link_fonts( 'contentlink', esc_html__( 'Content Links', 'weaver-xtreme' ),
				weaverx_filter_text( __( '<small>Typography for links in Content ( uses Standard Link colors if left inherit ).', 'weaver-xtreme' ) ) );
			$typography_sections['typo-links']['options'] = array_merge( $typography_sections['typo-links']['options'], $new_opts );

			$new_opts                                     = weaverx_cz_add_link_fonts( 'ilink', esc_html__( 'Post Meta Info Links', 'weaver-xtreme' ),
				weaverx_filter_text( __( '<small>Typography for links in post meta information top and bottom lines. (uses Standard Link colors if left inherit)', 'weaver-xtreme' ) ) );
			$typography_sections['typo-links']['options'] = array_merge( $typography_sections['typo-links']['options'], $new_opts );

			$new_opts                                     = weaverx_cz_add_link_fonts( 'wlink', esc_html__( 'Individual Widget Links', 'weaver-xtreme' ),
				esc_html__( 'Typography for links in widgets ( uses Standard Link colors if inherit ).', 'weaver-xtreme' ) );
			$typography_sections['typo-links']['options'] = array_merge( $typography_sections['typo-links']['options'], $new_opts );

			$new_opts                                     = weaverx_cz_add_link_fonts( 'footerlink', esc_html__( 'Footer Area Links', 'weaver-xtreme' ),
				esc_html__( 'Typography for links in Footer ( Uses Standard Link colors if left inherit ).', 'weaver-xtreme' ) );
			$typography_sections['typo-links']['options'] = array_merge( $typography_sections['typo-links']['options'], $new_opts );

			/**
			 * Site Header
			 */
			$typography_sections['typo-header']            = array(
				'panel'   => $panel,
				'title'   => esc_html__( 'Header Area', 'weaver-xtreme' ),
				'options' => array(),
			);
			$new_opts                                      = weaverx_cz_add_fonts( 'header', esc_html__( 'Header Area', 'weaver-xtreme' ), '', 'postMessage' );
			$typography_sections['typo-header']['options'] = array_merge( $typography_sections['typo-header']['options'], $new_opts );

			$new_opts                                      = weaverx_cz_add_fonts( 'site_title', esc_html__( 'Site Title', 'weaver-xtreme' ), '', 'postMessage' );
			$typography_sections['typo-header']['options'] = array_merge( $typography_sections['typo-header']['options'], $new_opts );

			$new_opts                                      = weaverx_cz_add_fonts( 'tagline', esc_html__( 'Site Tagline', 'weaver-xtreme' ), '', 'postMessage' );
			$typography_sections['typo-header']['options'] = array_merge( $typography_sections['typo-header']['options'], $new_opts );

			$new_opts                                      = weaverx_cz_add_fonts( 'header_sb', esc_html__( 'Header Widget Area', 'weaver-xtreme' ), '', 'postMessage' );
			$typography_sections['typo-header']['options'] = array_merge( $typography_sections['typo-header']['options'], $new_opts );

			$new_opts                                      = weaverx_cz_add_fonts( 'header_html', esc_html__( 'Header HTML', 'weaver-xtreme' ), '', 'postMessage' );
			$typography_sections['typo-header']['options'] = array_merge( $typography_sections['typo-header']['options'], $new_opts );


			/**
			 * Main Menu
			 */
			$typography_sections['typo-menus'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Menus', 'weaver-xtreme' ),
				'description' => esc_html__( 'Set typography for Menus.', 'weaver-xtreme' ),
				'options'     => array(),
			);

			$new_opts                                     = weaverx_cz_add_fonts( 'm_primary', esc_html__( 'Primary Menu', 'weaver-xtreme' ), '', 'postMessage' );
			$typography_sections['typo-menus']['options'] = array_merge( $typography_sections['typo-menus']['options'], $new_opts );

			$new_opts                                     = weaverx_cz_add_fonts( 'm_secondary', esc_html__( 'Secondary Menu', 'weaver-xtreme' ), '', 'postMessage' );
			$typography_sections['typo-menus']['options'] = array_merge( $typography_sections['typo-menus']['options'], $new_opts );

			$new_opts                                     = weaverx_cz_add_fonts( 'm_header_mini', esc_html__( 'Header Mini Menu', 'weaver-xtreme' ), '', 'postMessage' );
			$typography_sections['typo-menus']['options'] = array_merge( $typography_sections['typo-menus']['options'], $new_opts );

			// current page

			$cur_page                                     = array(
				'typo-am-line1' => weaverx_cz_line(),

				'typo-allmenus-heading' => weaverx_cz_group_title( esc_html__( 'Typography For All Menus', 'weaver-xtreme' ),
					esc_html__( 'These options specify current page attributes for all menus.', 'weaver-xtreme' ) ),

				'menubar_curpage_bold'        => array(
					'setting' => array(),
					'control' => array(
						'label'       => esc_html__( 'Bold Current Page', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
						'description' => esc_html__( 'Bold Face Current Page and ancestors.', 'weaver-xtreme' ),
						'type'        => 'checkbox',
					),
				),
				'menubar_curpage_em'          => array(
					'setting' => array(),
					'control' => array(
						'label'       => esc_html__( 'Italic Current Page', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
						'description' => esc_html__( 'Italic Current Page and ancestors.', 'weaver-xtreme' ),
						'type'        => 'checkbox',
					),
				),
				'menubar_curpage_noancestors' => array(
					'setting' => array(),
					'control' => array(
						'label'       => esc_html__( 'Do Not Highlight Ancestors', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
						'description' => esc_html__( 'Highlight Current Page only - do not also highlight ancestor items.', 'weaver-xtreme' ),
						'type'        => 'checkbox',
					),
				),


			);
			$typography_sections['typo-menus']['options'] = array_merge( $typography_sections['typo-menus']['options'], $cur_page );


			if ( weaverx_cz_is_plus() ) {
				$new_opts = weaverx_cz_add_fonts( 'm_extra', esc_html__( 'Extra Menu', 'weaver-xtreme' ), '', 'postMessage' );
			} else {
				$new_opts = weaverx_cz_add_plus_message( 'typo_menus', esc_html__( 'Extra Menu', 'weaver-xtreme' ),
					weaverx_filter_text( __( 'Add extra menus with <strong>Weaver Xtreme Plus</strong>.', 'weaver-xtreme' ) ) );
			}
			$typography_sections['typo-menus']['options'] = array_merge( $typography_sections['typo-menus']['options'], $new_opts );


			/**
			 * Info Bar
			 */
			$typography_sections['typo-info-bar'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Info Bar', 'weaver-xtreme' ),
				'description' => esc_html__( 'Info Bar with breadcrumbs and paged navigation displayed under Primary Menu.', 'weaver-xtreme' ),
				'options'     => array(// options added below
				),
			);

			$new_opts                                        = weaverx_cz_add_fonts( 'info_bar', esc_html__( 'Info Bar', 'weaver-xtreme' ), '', 'postMessage' );
			$typography_sections['typo-info-bar']['options'] = array_merge( $typography_sections['typo-info-bar']['options'], $new_opts );

			/**
			 * Content
			 */
			$typography_sections['typo-content'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Content', 'weaver-xtreme' ),
				'description' => esc_html__( 'Typography for general page and post content.', 'weaver-xtreme' ),
				'options'     => array(// options added below
				),
			);

			$new_opts                                       = weaverx_cz_add_fonts( 'content', esc_html__( 'Content Area', 'weaver-xtreme' ), '', 'postMessage' );
			$typography_sections['typo-content']['options'] = array_merge( $typography_sections['typo-content']['options'], $new_opts );

			$new_opts                                       = weaverx_cz_add_fonts( 'page_title', esc_html__( 'Page Title', 'weaver-xtreme' ), '', 'postMessage' );
			$typography_sections['typo-content']['options'] = array_merge( $typography_sections['typo-content']['options'], $new_opts );

			// archive pages title needs refresh due to interaction with page title attributes ( fixed: V 2.0.10 )
			$new_opts                                       = weaverx_cz_add_fonts( 'archive_title', esc_html__( 'Archive Pages Title', 'weaver-xtreme' ), '', 'refresh' );
			$typography_sections['typo-content']['options'] = array_merge( $typography_sections['typo-content']['options'], $new_opts );

			$new_opts                                       = weaverx_cz_add_fonts( 'content_h', esc_html__( 'Content Headings', 'weaver-xtreme' ),
				esc_html__( 'Headings ( &lt;h1&gt;-&lt;h6&gt; ) in page and post content.', 'weaver-xtreme' ), 'refresh', 'normal' );
			$typography_sections['typo-content']['options'] = array_merge( $typography_sections['typo-content']['options'], $new_opts );


			/**
			 * Post Specific
			 */
			$typography_sections['typo-post-specific'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Post Specific', 'weaver-xtreme' ),
				'description' => esc_html__( 'Post Specific Typography - override Content Typography.', 'weaver-xtreme' ),
				'options'     => array(),
			);

			$new_opts                                             = weaverx_cz_add_fonts( 'post', esc_html__( 'Post Area', 'weaver-xtreme' ), '', 'postMessage' );
			$typography_sections['typo-post-specific']['options'] = array_merge( $typography_sections['typo-post-specific']['options'], $new_opts );

			$new_opts                                             = weaverx_cz_add_fonts( 'post_title', esc_html__( 'Post Title', 'weaver-xtreme' ), '', 'postMessage' );
			$typography_sections['typo-post-specific']['options'] = array_merge( $typography_sections['typo-post-specific']['options'], $new_opts );

			$new_opts                                             = weaverx_cz_add_fonts( 'post_info_top', esc_html__( 'Top Post Info Line', 'weaver-xtreme' ), '', 'postMessage' );
			$typography_sections['typo-post-specific']['options'] = array_merge( $typography_sections['typo-post-specific']['options'], $new_opts );

			$new_opts                                             = weaverx_cz_add_fonts( 'post_info_bottom', esc_html__( 'Bottom Post Info Line', 'weaver-xtreme' ), '', 'postMessage' );
			$typography_sections['typo-post-specific']['options'] = array_merge( $typography_sections['typo-post-specific']['options'], $new_opts );


			/**
			 * Sidebars
			 */
			$typography_sections['typo-sidebars'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Sidebars &amp; Widget Areas', 'weaver-xtreme' ),
				'description' => esc_html__( 'Main Sidebars and Widget areas. Header and Footer areas options under Header and Footer panels.', 'weaver-xtreme' ),
				'options'     => array(),
			);

			$new_opts                                        = weaverx_cz_add_fonts( 'primary', esc_html__( 'Primary Area', 'weaver-xtreme' ), '', 'postMessage' );
			$typography_sections['typo-sidebars']['options'] = array_merge( $typography_sections['typo-sidebars']['options'], $new_opts );

			$new_opts                                        = weaverx_cz_add_fonts( 'secondary', esc_html__( 'Secondary Area', 'weaver-xtreme' ), '', 'postMessage' );
			$typography_sections['typo-sidebars']['options'] = array_merge( $typography_sections['typo-sidebars']['options'], $new_opts );

			$new_opts                                        = weaverx_cz_add_fonts( 'top', esc_html__( 'Top Widget Areas', 'weaver-xtreme' ),
				esc_html__( 'Properties for all Top Widget areas (Sitewide, Pages, Blog, Archive).', 'weaver-xtreme' ), 'postMessage' );
			$typography_sections['typo-sidebars']['options'] = array_merge( $typography_sections['typo-sidebars']['options'], $new_opts );

			$new_opts                                        = weaverx_cz_add_fonts( 'bottom', esc_html__( 'Bottom Widget Areas', 'weaver-xtreme' ),
				esc_html__( 'Typography for all Bottom Widget areas (Sitewide, Pages, Blog, Archive).', 'weaver-xtreme' ), 'postMessage' );
			$typography_sections['typo-sidebars']['options'] = array_merge( $typography_sections['typo-sidebars']['options'], $new_opts );

			/**
			 * Widgets
			 */
			$typography_sections['typo-widgets'] = array(
				'panel'   => $panel,
				'title'   => esc_html__( 'Individual Widgets', 'weaver-xtreme' ),
				'options' => array(),
			);

			$new_opts                                       = weaverx_cz_add_fonts( 'widget', esc_html__( 'Individual Widgets', 'weaver-xtreme' ), '', 'postMessage' );
			$typography_sections['typo-widgets']['options'] = array_merge( $typography_sections['typo-widgets']['options'], $new_opts );

			$new_opts                                       = weaverx_cz_add_fonts( 'widget_title', esc_html__( 'Individual Widgets Title', 'weaver-xtreme' ), '', 'postMessage' );
			$typography_sections['typo-widgets']['options'] = array_merge( $typography_sections['typo-widgets']['options'], $new_opts );

			/**
			 * Footer
			 */
			$typography_sections['typo-footer'] = array(
				'panel'   => $panel,
				'title'   => esc_html__( 'Footer Area', 'weaver-xtreme' ),
				'options' => array(),
			);

			$new_opts                                      = weaverx_cz_add_fonts( 'footer', esc_html__( 'Footer Area', 'weaver-xtreme' ), '', 'postMessage' );
			$typography_sections['typo-footer']['options'] = array_merge( $typography_sections['typo-footer']['options'], $new_opts );

			$new_opts                                      = weaverx_cz_add_fonts( 'footer_sb', esc_html__( 'Footer Widget Area', 'weaver-xtreme' ), '', 'postMessage' );
			$typography_sections['typo-footer']['options'] = array_merge( $typography_sections['typo-footer']['options'], $new_opts );

			$new_opts                                      = weaverx_cz_add_fonts( 'footer_html', esc_html__( 'Footer HTML', 'weaver-xtreme' ), '', 'postMessage' );
			$typography_sections['typo-footer']['options'] = array_merge( $typography_sections['typo-footer']['options'], $new_opts );

		} else {
			$typography_sections['typo-global'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Global Typography Options', 'weaver-xtreme' ),
				'description' => esc_html__( 'Standard and Full Interface Options: Set base font values: Base font size, base line height, and more. The Font Size options for other areas are all derived from these base sizes.', 'weaver-xtreme' ),
				'options'     => array(
					'typo-int-title' => weaverx_cz_group_title( esc_html__( 'Basic Fonts', 'weaver-xtreme' ),
						weaverx_filter_text( __( 'Weaver Xtreme integrates a selected set of Google Font families. <p>For the Basic interface levels, you can use the <strong>Layout &rarr; Core Site Layout and Styling</strong> menu to set the global main font used for your site. The Advanced and Standard Levels allow you to set fonts for many individual elements. ', 'weaver-xtreme' ) ) ),
				),
			);

			$typography_sections['typo-wrapping'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Wrapping Areas', 'weaver-xtreme' ),
				'description' => weaverx_filter_text( __( 'Set font and other typography attributes. Add new fonts from the legacy <em>Appearance &rarr; Weaver Xtreme Admin &rarr; Main Options &rarr; Fonts &amp; Custom</em> panel. Use Site Colors to set colors.', 'weaver-xtreme' ) ),
				'options'     => array(
					'typo-heading-global' => array(),
				),
			);

			$new_opts                                        = weaverx_cz_text(
				weaverx_filter_text( __( 'To set the default typography for the entire site, use the <strong>Layout &rarr; Core Site Layout and Styling</strong> menu.', 'weaver-xtreme' ) ), 'postMessage' );
			$typography_sections['typo-wrapping']['options'] = array_merge( $typography_sections['typo-wrapping']['options'], $new_opts );

		}

		return $typography_sections;
	}
endif;


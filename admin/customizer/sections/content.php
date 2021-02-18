<?php

if ( ! function_exists( 'weaverx_customizer_define_content_sections' ) ) :
	/**
	 * Define the sections and settings for the Content panel
	 */
	function weaverx_customizer_define_content_sections() {
		$panel            = 'weaverx_content';
		$content_sections = array();

		// <head> section
		if ( weaverx_options_level() == WEAVERX_LEVEL_ADVANCED ) {        // show if advanced

			$content_sections['content-head'] = array(
				'panel' => $panel,
				'title' => esc_html__( 'Site &lt;HEAD&gt; Section', 'weaver-xtreme' ),

				'options' => array(

					'content-headsec-heading' => weaverx_cz_heading( esc_html__( 'Introductory Help for &lt;HEAD&gt; Section', 'weaver-xtreme' ),
						weaverx_filter_text( __( 'This panel allows you to add HTML to the &lt;HEAD&gt; Section of every page on your site.<br /><br />
PLEASE NOTE: Only minimal validation is made on the field values, so be careful not to use invalid code. Invalid code is usually harmless, but it can make your site display incorrectly. If your site looks broken after make changes here, please double check that what you entered uses valid HTML or CSS rules.', 'weaver-xtreme' ) ) ),

					'head_opts' => weaverx_cz_textarea( esc_html__( '&lt;HEAD&gt; Section Content', 'weaver-xtreme' ),
						/* $description = */
						weaverx_filter_text(
							__( 'This input area allows you to enter allowed HTML head elements to the &lt;head&gt; section, including &lt;title&gt;, &lt;base&gt;, &lt;link&gt;, &lt;meta&gt;, &lt;script&gt;, and &lt;style&gt;. Code entered into this box is included right before the &lt;/head&gt; HTML tag on each page of your site.
We recommend using dedicated WordPress plugins to add things like ad tracking, SEO tags, Facebook code, and so on.
<small>Note: You can add CSS Rules using the "Custom CSS Rules" option on the Main Options tab.', 'weaver-xtreme' ) ),
						/* $rows = */
						'4', /* $placeholder = */
						esc_html__( 'Any HTML allowed in <head>.', 'weaver-xtreme' ),
						/*$refresh = */
						'refresh', /*$plus = */
						false ),


					'_althead_opts' => weaverx_cz_textarea( esc_html__( '&lt;HEAD&gt; Section (Advanced Alternative - &diams;)', 'weaver-xtreme' ),
						esc_html__(
							'Same as normal &lt;HEAD&gt; box above, but works like other &diams; options - it survives changing
the subtheme from the Weaver Xtreme Subthemes tab, and is saved only on a full backup Save.
This option is not commonly used, and is intended for more advanced Weaver Xtreme users.', 'weaver-xtreme' ),
						'4', esc_html__( 'Any HTML allowed in <head>.', 'weaver-xtreme' ),
						'refresh', false ),


					'content-headsec-line1' => array(
						'control' => array(
							'control_type' => 'WeaverX_Misc_Control',
							'type'         => 'line',
						),
					),

					'_phpactions' => weaverx_cz_textarea(
						esc_html__( 'Actions and Filters (&diams;)', 'weaver-xtreme' ),
						weaverx_filter_text( __(
							'<strong>This Option for Advanced Users!</strong> You can add arbitrary PHP code here. This option is intended to allow
you to add WordPress Actions and Filters that can affect the Visitor View of your site. This PHP code is executed at the very
beginning of the theme\'s header.php template file before any HTML is emitted, but after much of WordPress is loaded, so you
can\'t create filters or actions for all WordPress functions.
Do NOT bracket the code with &lt;?php and ?&gt; at the beginning and end.
If your code doesn\'t seem to do anything, you probably have a PHP error. See the Help file for more technical details.', 'weaver-xtreme' ) ),
						'4', esc_html__( '/* PHP code - typically to define WP actions or filters */', 'weaver-xtreme' ),
						'refresh', true, 'weaverx_cz_sanitize_code' ),

				),
			);


			/**
			 * Site Header
			 */
			$content_sections['content-header'] = array(
				'panel'   => $panel,
				'title'   => esc_html__( 'Site Header Area', 'weaver-xtreme' ),
				'options' => array(

					'header_html_text' => weaverx_cz_html_textarea( esc_html__( 'Header HTML Content', 'weaver-xtreme' ),
						esc_html__( 'Add arbitrary HTML to Header Area (in &lt;div id="header-html"&gt;)', 'weaver-xtreme' ),
						'4' ),

				),
			);


			/**
			 * Main Menu
			 */
			$logo_html                         = weaverx_get_logo_html();
			$content_sections['content-menus'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Menus', 'weaver-xtreme' ),
				'description' => esc_html__( 'Set added content for Menus.', 'weaver-xtreme' ),
				'options'     => array(
					'content-mm-heading' => weaverx_cz_group_title( esc_html__( 'Primary Menu', 'weaver-xtreme' ) ),

					'm_primary_html_left' => weaverx_cz_textarea( esc_html__( 'Left HTML', 'weaver-xtreme' ),
						esc_html__( 'Add HTML to menu bar. Works best with Centered Menu. You can adjust color and top/bottom spacing on the respective panels.', 'weaver-xtreme' ),
						'1', esc_html__( 'Any HTML, including shortcodes.', 'weaver-xtreme' ),
						'postMessage', true ),


					'm_primary_html_right' => weaverx_cz_textarea( esc_html__( 'Right HTML', 'weaver-xtreme' ),
						'',
						'1', esc_html__( 'Any HTML, including shortcodes.', 'weaver-xtreme' ),
						'postMessage', false ),    // only primary right is in free version

					'm_primary_logo_left' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Add Site Logo to Left', 'weaver-xtreme' ),
						weaverx_filter_text( __( 'Add the Site Logo to the primary menu. Add custom CSS for <em>.custom-logo-on-menu</em> to style. (Use Customize : Site Identity to set Site Logo.)', 'weaver-xtreme' ) ) . $logo_html
					),

					'm_primary_logo_height_dec' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_float',
							'transport'         => 'refresh',
							'default'           => 0,
						),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => esc_html__( 'Logo on Menu Bar Height (em)', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
							'description'  => esc_html__( 'Set height of Logo on Menu. Will interact with padding. Default 0 uses current line height.', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 10,
								'step' => .1,
							),
						),
					),

					'm_primary_logo_home_link' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Logo Links to Home', 'weaver-xtreme' ),
						esc_html__( 'Add a link to home page to logo on menu bar ( must use with defined custom menu ).', 'weaver-xtreme' )
					),

					'content-sm-heading' => weaverx_cz_group_title( esc_html__( 'Secondary Menu', 'weaver-xtreme' ),
						esc_html__( 'You must define a Secondary Menu from the Custom Menus Content menu.', 'weaver-xtreme' ) ),

					'm_secondary_html_left' => weaverx_cz_textarea( esc_html__( 'Left HTML', 'weaver-xtreme' ),
						esc_html__( 'Add HTML to menu bar. Works best with Centered Menu. You can adjust color and top/bottom spacing on the respective panels.', 'weaver-xtreme' ),
						'1', esc_html__( 'Any HTML, including shortcodes.', 'weaver-xtreme' ),
						'postMessage', true ),


					'm_secondary_html_right' => weaverx_cz_textarea( esc_html__( 'Right HTML', 'weaver-xtreme' ),
						'',
						'1', esc_html__( 'Any HTML, including shortcodes.', 'weaver-xtreme' ),
						'postMessage', true ),


					'content-xm-heading' => weaverx_cz_group_title( esc_html__( 'Extra Menu', 'weaver-xtreme' ) ),

					'm_extra_html_left' => weaverx_cz_textarea( esc_html__( 'Left HTML', 'weaver-xtreme' ),
						esc_html__( 'Add HTML to menu bar. Works best with Centered Menu. You can adjust color and top/bottom spacing on the respective panels.', 'weaver-xtreme' ),
						'1', esc_html__( 'Any HTML, including shortcodes.', 'weaver-xtreme' ),
						'postMessage', true ),


					'm_extra_html_right' => weaverx_cz_textarea( esc_html__( 'Right HTML', 'weaver-xtreme' ),
						'',
						'1', esc_html__( 'Any HTML, including shortcodes.', 'weaver-xtreme' ),
						'postMessage', true ),


				),
			);


			/**
			 * Post Specific
			 */
			$content_sections['content-post-specific'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Post Specific', 'weaver-xtreme' ),
				'description' => esc_html__( 'Post Specific Content - override Content Content.', 'weaver-xtreme' ),
				'options'     => array(

					'excerpt_more_msg' => weaverx_cz_html_textarea( esc_html__( '"Continue reading" Message', 'weaver-xtreme' ),
						weaverx_filter_text( __( 'Change default <em>Continue reading &rarr;</em> message for excerpts. You can include HTML ( e.g., &lt;img> ).', 'weaver-xtreme' ) ),
						'1' ),

					'content-post-meta' => weaverx_cz_group_title( esc_html__( 'Custom Post Info Lines', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
						esc_html__( 'Replace Info Lines with custom info line templates. Advanced options: see help file.', 'weaver-xtreme' ) ),

					'custom_posted_on' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_html',
							'transport'         => 'refresh',
							'default'           => '',
						),
						'control' => array(
							'control_type' => WEAVERX_PLUS_TEXTAREA_CONTROL,
							'label'        => esc_html__( 'Top Post Info Line', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
							'description'  => esc_html__( 'Custom template for top post info line. (&#9734;Plus)', 'weaver-xtreme' ),
							'type'         => 'textarea',
							'input_attrs'  => array(
								'rows'        => '1',
								'placeholder' => esc_html__( 'Please see help file for info line template info.', 'weaver-xtreme' ),
							),
						),
					),

					'custom_posted_in' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_html',
							'transport'         => 'refresh',
							'default'           => '',
						),
						'control' => array(
							'control_type' => WEAVERX_PLUS_TEXTAREA_CONTROL,
							'label'        => esc_html__( 'Bottom Post Info Line', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
							'description'  => esc_html__( 'Custom template for bottom post info line. (&#9734;Plus)', 'weaver-xtreme' ),
							'type'         => 'textarea',
							'input_attrs'  => array(
								'rows'        => '1',
								'placeholder' => esc_html__( 'Please see help file for info line template info.', 'weaver-xtreme' ),
							),
						),
					),

					'custom_posted_on_single' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_html',
							'transport'         => 'refresh',
							'default'           => '',
						),
						'control' => array(
							'control_type' => WEAVERX_PLUS_TEXTAREA_CONTROL,
							'label'        => esc_html__( 'Top Post Info Line (Single)', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
							'description'  => esc_html__( 'Custom template for top post info line on single pages.(&#9734;Plus)', 'weaver-xtreme' ),
							'type'         => 'textarea',
							'input_attrs'  => array(
								'rows'        => '1',
								'placeholder' => esc_html__( 'Please see help file for info line template info.', 'weaver-xtreme' ),
							),
						),
					),

					'custom_posted_in_single' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_html',
							'transport'         => 'refresh',
							'default'           => '',
						),
						'control' => array(
							'control_type' => WEAVERX_PLUS_TEXTAREA_CONTROL,
							'label'        => esc_html__( 'Bottom Post Info Line (Single)', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
							'description'  => esc_html__( 'Custom template for bottom post info line on single pages. (&#9734;Plus)', 'weaver-xtreme' ),
							'type'         => 'textarea',
							'input_attrs'  => array(
								'rows'        => '1',
								'placeholder' => esc_html__( 'Please see help file for info line template info.', 'weaver-xtreme' ),
							),
						),
					),


				),
			);


			/**
			 * Sidebars
			 */
			$content_sections['content-sidebars'] = array(
				'panel'   => $panel,
				'title'   => esc_html__( 'Sidebars & Widget Areas', 'weaver-xtreme' ),
				'options' => array(
					'content-widgetarea-heading' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_html',
							'transport'         => 'refresh',
							'default'           => '',
						),
						'control' => array(
							//'control_type' => 'WeaverX_Misc_Control',
							'label'       => esc_html__( 'Define Per Page Extra Widget Areas', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
							'description' => weaverx_filter_text( __( 'You may define extra widget areas that can then be used in the <em>Per Page</em> settings, or in the <em>Weaver Xtreme Plus</em> [widget_area] shortcode.
Enter a list of one or more widget area names separated by commas.
Your names should include only letters, numbers, or underscores - no spaces or other special characters.
The widgets areas will then appear on the Appearance->Widgets menus.
They can be included on individual pages by adding the name you define here to the "Weaver Xtreme Options For This Page" box on the Edit Page screen. (&diams;)', 'weaver-xtreme' ) ),
							'type'        => 'text',
						),
					),


				),
			);


			/**
			 * Footer
			 */
			$content_sections['content-footer'] = array(
				'panel'   => $panel,
				'title'   => esc_html__( 'Footer Area', 'weaver-xtreme' ),
				'options' => array(

					'footer_html_text' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_filter_code',
							'transport'         => 'postMessage',
							'default'           => '',
						),
						'control' => array(
							'control_type' => 'WeaverX_Textarea_Control',
							'label'        => esc_html__( 'Footer HTML Content', 'weaver-xtreme' ),
							'description'  => esc_html__( 'Add arbitrary HTML to Footer Area (in &lt;div id="footer-html"&gt;)', 'weaver-xtreme' ),
							'type'         => 'textarea',
							'input_attrs'  => array(
								'rows'        => '3',
								'placeholder' => esc_html__( '<!-- Add HTML Here -->', 'weaver-xtreme' ),
							),
						),
					),

					'copyright' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_filter_code',
							'transport'         => 'postMessage',
							'default'           => '',
						),
						'control' => array(
							'control_type' => 'WeaverX_Textarea_Control',
							'label'        => esc_html__( '&copy; Site Copyright', 'weaver-xtreme' ),
							'description'  => weaverx_filter_text( __( 'If you fill this in, the default copyright notice in the footer will be replaced with the text here. It will not automatically update from year to year. Use &amp;copy; to display &copy;. You can use other HTML and shortcodes as well.
Use <em>&amp;nbsp;</em> to hide the copyright notice. &diams;', 'weaver-xtreme' ) ),
							'type'         => 'textarea',
							'input_attrs'  => array(
								'rows'        => '2',
								'placeholder' => esc_html__( '<!-- Add HTML Here -->', 'weaver-xtreme' ),
							),
						),
					),

				),
			);

			/**
			 * Injection areas
			 */
			$content_sections['content-injection'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'HTML Injection Areas', 'weaver-xtreme' ),
				'description' => esc_html__( 'HTML Injection Areas. The injection areas include Prewrapper and Postfooter for all versions of the theme. Weaver Xtreme Plus also includes Preheader, Header Top, Container Top, Content Top, Page Content Bottom, Post-Post Content, Pre-Comments, Post-Comments, Pre-Footer, Primary Sidebar Top, Fixed Browser Top, and Fixed Browser Bottom. <em>Note:</em> unlike most other options, the HTML Injections area options provide all relevant associated options: content, color, custom CSS, and visibility.', 'weaver-xtreme' ),
				'options'     => array(),
			);

			$new_opts                                         = weaverx_cz_add_injection( 'prewrapper', esc_html__( 'Prewrapper Injection Area', 'weaver-xtreme' ),
				esc_html__( 'This code will be inserted just before the #wrapper and #branding &lt;div&gt;s, before any other site content.( Area ID: #inject_prewrapper )	', 'weaver-xtreme' ), 'standard' );
			$content_sections['content-injection']['options'] = array_merge( $content_sections['content-injection']['options'], $new_opts );

			$new_opts                                         = weaverx_cz_add_injection( 'postfooter', esc_html__( 'Post Footer Injection Area', 'weaver-xtreme' ),
				esc_html__( 'This code will be inserted just after the footer #colophon &lt;div&gt;, outside the #wrapper div.(Area ID: #inject_postfooter)', 'weaver-xtreme' ), 'standard' );
			$content_sections['content-injection']['options'] = array_merge( $content_sections['content-injection']['options'], $new_opts );

			// X Plus Injection

			$new_opts                                         = weaverx_cz_add_injection( 'preheader', esc_html__( 'Preheader Injection Area', 'weaver-xtreme' ),
				esc_html__( 'This code will be inserted just before the #header &lt;div&gt;. It will have the same width as the #wrapper area. This area may require extra styling to eliminate unwanted margins. ( Area ID: #inject_preheader ) (&#9734;Plus)', 'weaver-xtreme' ) );
			$content_sections['content-injection']['options'] = array_merge( $content_sections['content-injection']['options'], $new_opts );

			$new_opts                                         = weaverx_cz_add_injection( 'header', esc_html__( 'Header Top Injection Area', 'weaver-xtreme' ),
				esc_html__( 'This code will be inserted at the top of the #header &lt;div&gt;, before the top menu. It will have the same width as the header area. ( Area ID: #inject_header ) (&#9734;Plus)', 'weaver-xtreme' ) );
			$content_sections['content-injection']['options'] = array_merge( $content_sections['content-injection']['options'], $new_opts );

			$new_opts                                         = weaverx_cz_add_injection( 'postheader', esc_html__( 'Post Header', 'weaver-xtreme' ),
				esc_html__( 'This code will be inserted between the #header &lt;div&gt; and the #container &lt;div&gt;. It will have the same width as the #wrapper area. ( Area ID: #inject_postheader ) (&#9734;Plus)', 'weaver-xtreme' ) );
			$content_sections['content-injection']['options'] = array_merge( $content_sections['content-injection']['options'], $new_opts );

			$new_opts                                         = weaverx_cz_add_injection( 'container_top', esc_html__( 'Container Top', 'weaver-xtreme' ),
				esc_html__( 'This code will be inserted inside the #container &lt;div&gt; that wraps content, including before the top widget areas. It will have the same width as the container area. ( Area ID: #inject_container_top ) (&#9734;Plus)', 'weaver-xtreme' ) );
			$content_sections['content-injection']['options'] = array_merge( $content_sections['content-injection']['options'], $new_opts );

			$new_opts                                         = weaverx_cz_add_injection( 'postinfobar', esc_html__( 'Pre Content', 'weaver-xtreme' ),
				esc_html__( 'This code will be inserted inside the #content div that wraps content. It will have the same width as the container area. ( Area ID: #inject_postinfobar ) (&#9734;Plus)', 'weaver-xtreme' ) );
			$content_sections['content-injection']['options'] = array_merge( $content_sections['content-injection']['options'], $new_opts );

			$new_opts                                         = weaverx_cz_add_injection( 'precontent', esc_html__( 'Content Top', 'weaver-xtreme' ),
				esc_html__( 'This code will be inserted inside the #content div that wraps content. It will have the same width as the container area. ( Area ID: #inject_precontent ) (&#9734;Plus)', 'weaver-xtreme' ) );
			$content_sections['content-injection']['options'] = array_merge( $content_sections['content-injection']['options'], $new_opts );

			$new_opts                                         = weaverx_cz_add_injection( 'pagecontentbottom', esc_html__( 'Page Content Bottom', 'weaver-xtreme' ),
				esc_html__( 'This code will be at the bottom of page ( including post single page view and page with posts ) content. It will have the same width as the content area. ( Area ID: #inject_pagecontentbottom ) (&#9734;Plus)', 'weaver-xtreme' ) );
			$content_sections['content-injection']['options'] = array_merge( $content_sections['content-injection']['options'], $new_opts );
			$new_opts                                         = weaverx_cz_add_injection( 'postpostcontent', esc_html__( 'Post-Post Content', 'weaver-xtreme' ),
				esc_html__( 'This code will be inserted after the content area of each post ( not page ). ( Area class: .inject_postpostcontent ) (&#9734;Plus)', 'weaver-xtreme' ) );
			$content_sections['content-injection']['options'] = array_merge( $content_sections['content-injection']['options'], $new_opts );

			$new_opts                                         = weaverx_cz_add_injection( 'precomments', esc_html__( 'Pre-Comments', 'weaver-xtreme' ),
				esc_html__( 'This code will be inserted just before the #comments div where comments are displayed. If comments
are open for the page, this area will include the class <em>.precomments-comments</em>, if closed <em>.precomments-nocomments</em>. ( Area ID: #inject_precomments ) (&#9734;Plus)', 'weaver-xtreme' ) );
			$content_sections['content-injection']['options'] = array_merge( $content_sections['content-injection']['options'], $new_opts );

			$new_opts                                         = weaverx_cz_add_injection( 'postcomments', esc_html__( 'Post-Comments', 'weaver-xtreme' ),
				esc_html__( 'This code will be inserted right after the #comments div where comments are displayed. If comments
are open for the page, this area will include the class <em>.postcomments-comments</em>, if closed <em>.postcomments-nocomments</em>. ( Area ID: #inject_postcomments ) (&#9734;Plus)', 'weaver-xtreme' ) );
			$content_sections['content-injection']['options'] = array_merge( $content_sections['content-injection']['options'], $new_opts );

			$new_opts                                         = weaverx_cz_add_injection( 'prefooter', esc_html__( 'Pre-Footer', 'weaver-xtreme' ),
				esc_html__( 'This code will be inserted just before the footer #colophon div. ( Area ID: #inject_prefooter ) (&#9734;Plus)', 'weaver-xtreme' ) );
			$content_sections['content-injection']['options'] = array_merge( $content_sections['content-injection']['options'], $new_opts );

			$new_opts                                         = weaverx_cz_add_injection( 'presidebar', esc_html__( 'Primary Sidebar Top', 'weaver-xtreme' ),
				esc_html__( 'This code will be inserted inside the primary sidebar area at the top. Not shown if no primary sidebar defined. ( Area ID: #inject_presidebar ) (&#9734;Plus)', 'weaver-xtreme' ) );
			$content_sections['content-injection']['options'] = array_merge( $content_sections['content-injection']['options'], $new_opts );

			$new_opts                                         = weaverx_cz_add_injection( 'fixedtop', esc_html__( 'Fixed Browser Top', 'weaver-xtreme' ),
				esc_html__( 'This code will be inserted in a fixed location at the top of the ( non-IE8 ) desktop browser window. It will have the same width as the Wrapper Area. <em>You will need to add a Top Margin to the Wrapper Area.</em> Do not make this area too tall! ( Area ID: #inject_fixedtop ) (&#9734;Plus)', 'weaver-xtreme' ) );
			$content_sections['content-injection']['options'] = array_merge( $content_sections['content-injection']['options'], $new_opts );

			$new_opts                                         = weaverx_cz_add_injection( 'fixedbottom', esc_html__( 'Fixed Browser Bottom', 'weaver-xtreme' ),
				esc_html__( 'This code will be inserted in a fixed location at the bottom of the ( non-IE8 ) desktop browser window. It will have the same width as the Wrapper Area. <em>You will need to add a Bottom Margin to the Wrapper Area.</em> Do not make this area too tall! ( Area ID: #inject_fixedbottom ) (&#9734;Plus)', 'weaver-xtreme' ) );
			$content_sections['content-injection']['options'] = array_merge( $content_sections['content-injection']['options'], $new_opts );


		} else {
			$content_sections['content-head'] = array(
				'panel' => $panel,
				'title' => esc_html__( 'Add Content', 'weaver-xtreme' ),

				'options' => array(

					'content-headsec-heading' => weaverx_cz_heading( esc_html__( 'Full Level Add Content', 'weaver-xtreme' ),
						esc_html__( 'With the Full Level Interface, you can define HTML content for various areas, including the &lt;HEAD&gt;, Header, Menus, Posts, Sidebars, Footer, and other general HTML areas.', 'weaver-xtreme' ) ),
				),
			);

		}

		return $content_sections;
	}
endif;

function weaverx_cz_add_injection( $root, $label = '', $description = '', $version = 'XPlus' ) {
	$opt = array();

	if ( $version == 'XPlus' ) {
		$label .= WEAVERX_PLUS_ICON;
	}
	$opt[ $root . '-heading' ] = weaverx_cz_group_title( $label );

	if ( $description ) {
		$opt[ $root . '-desc' ] = array(
			'control' => array(
				'control_type' => 'WeaverX_Misc_Control',
				'description'  => $description,
				'type'         => 'text',
			),
		);
	}

	if ( $version != 'XPlus' || weaverx_cz_is_plus() ) {

		$opt["{$root}_insert"] = array(
			'setting' => array(
				'sanitize_callback' => 'weaverx_cz_sanitize_html',
				'transport'         => 'postMessage',
				'default'           => '',
			),
			'control' => array(
				'control_type' => 'WeaverX_Textarea_Control',
				'label'        => esc_html__( 'HTML', 'weaver-xtreme' ),        // . WEAVERX_REFRESH_ICON,
				'type'         => 'textarea',
				'input_attrs'  => array(
					'rows'        => '3',
					'placeholder' => esc_html__( 'Any HTML, including shortcodes.', 'weaver-xtreme' ),
				),
			),
		);

		$opt["inject_{$root}_bgcolor"] = array(
			'setting' => array(
				'sanitize_callback' => WEAVERX_CZ_SANITIZE_COLOR,
				'transport'         => 'postMessage',
				'default'           => weaverx_cz_getopt( "inject_{$root}_bgcolor" ),
			),
			'control' => array(
				'control_type' => WEAVERX_COLOR_CONTROL,
				'label'        => esc_html__( 'BG Color', 'weaver-xtreme' ),
				'description'  => '',
			),
		);


		$opt["inject_{$root}_bgcolor_css"] = weaverx_cz_css( esc_html__( 'Custom CSS', 'weaver-xtreme' ) );


		$opt["inject_add_class_{$root}"] = array(
			'setting' => array(
				'sanitize_callback' => 'weaverx_cz_sanitize_html',
				'transport'         => 'refresh',
				'default'           => '',
			),
			'control' => array(
				'control_type' => WEAVERX_PLUS_TEXT_CONTROL,
				'label'        => esc_html__( 'Add Classes', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
				'description'  => weaverx_filter_text( __( 'Space separated class names to add to this area (<em>Advanced option</em>) (&#9733;Plus)', 'weaver-xtreme' ) ),
				'type'         => 'text',
				'input_attrs'  => array(),
			),
		);
		$opt["hide_front_{$root}"]       = weaverx_cz_checkbox_refresh(
			esc_html__( 'Hide on front page', 'weaver-xtreme' ),
			esc_html__( 'If you check this box, then the code from this area will not be displayed on the front ( home ) page.', 'weaver-xtreme' )
		);

		$opt["hide_rest_{$root}"] = weaverx_cz_checkbox_refresh(
			esc_html__( 'Hide on non-front pages', 'weaver-xtreme' ),
			esc_html__( 'If you check this box, then the code from this area will not be displayed on non-front pages.', 'weaver-xtreme' )
		);


	} // is plus
	$opt[ $root . '-line-break' ] = array(
		'control' => array(
			'control_type' => 'WeaverX_Misc_Control',
			'label'        => '',
			'type'         => 'line',
		),
	);


	return $opt;

}

?>

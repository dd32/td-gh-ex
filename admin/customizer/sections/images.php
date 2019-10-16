<?php

if ( ! function_exists( 'weaverx_customizer_define_image_sections' ) ) :
	/**
	 * Define the sections and settings for the Images panel
	 */
	function weaverx_customizer_define_image_sections() {
		global $wp_customize;

		$panel          = 'weaverx_images';
		$image_sections = array();


		$wp_customize->get_section( 'header_image' )->priority = 10515;
		$wp_customize->get_section( 'header_image' )->title    = esc_html__( 'Header Media (image, video)', 'weaver-xtreme' );
		$wp_customize->get_section( 'header_image' )->panel    = $panel;

		$wp_customize->get_section( 'background_image' )->priority = 10590;
		$wp_customize->get_section( 'background_image' )->title    = esc_html__( 'Site BG Image (WP Settings)', 'weaver-xtreme' );
		$wp_customize->get_section( 'background_image' )->panel    = $panel;


		//$wp_customize->get_setting( 'header_image' )->transport = 'refresh';
		//$wp_customize->get_setting( 'header_image_data' )->transport = 'refresh';
		/**
		 * General
		 */

		if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full
			$image_sections['images-global'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Global Image Settings', 'weaver-xtreme' ),
				'description' => esc_html__( 'Set Image options for Site Wrapper &amp; Container. Use Colors to set colors.', 'weaver-xtreme' ),
				'options'     => array(
					'images-heading-global' => weaverx_cz_group_title( esc_html__( 'Global Image Settings', 'weaver-xtreme' ),
						esc_html__( 'These settings control images in both the Container ( including content and sidebars ) and Footer Areas. They do not include the Header Area.', 'weaver-xtreme' ) ),

					'media_lib_border_color' => weaverx_cz_coloropt(
						'media_lib_border_color',
						esc_html__( 'Image Border Color', 'weaver-xtreme' ),
						esc_html__( 'Border color for images in Container and Footer.', 'weaver-xtreme' )
					),


					'media_lib_border_int' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 0 ),
						'control' => array(
							'control_type' => 'WeaverX_Range_Control',
							'label'        => __( 'Image Border Width (px)', 'weaver-xtreme' ),
							'description'  => __( 'Border width for images in Container and Footer. There will be <strong>no</strong> borders unless you set this value above 0px.', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 50,
								'step' => 1,
							),
						),
					),

					'show_img_shadows' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'postMessage',
						),
						'control' => array(
							'label'       => __( 'Add Image Shadow', 'weaver-xtreme' ),
							'description' => __( 'Add a shadow to images in Container and Footer. Add custom CSS for custom shadow.', 'weaver-xtreme' ),
							'type'        => 'checkbox',
						),
					),

					'restrict_img_border' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'refresh',
						),
						'control' => array(
							'label'       => __( 'Restrict Borders to Media Library', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
							'description' => __( 'For Container and Footer, restrict border and shadows to images from Media Library. Manually entered &lt;img&gt; HTML without Media Library classes will not have borders.', 'weaver-xtreme' ),
							'type'        => 'checkbox',
						),
					),

					'media_lib_border_color_css' => weaverx_cz_css( esc_html__( 'Custom CSS for Images.', 'weaver-xtreme' ),
						esc_html__( 'Note: this custom CSS will live-update for ALL images, even if the above Restrict Borders is checked.
The normal site view will respect the Restrict Borders setting.', 'weaver-xtreme' ) ),


					'caption_color' => weaverx_cz_coloropt(
						'caption_color',
						esc_html__( 'Caption Text Color', 'weaver-xtreme' ),
						esc_html__( 'Color of captions - e.g., below media images.', 'weaver-xtreme' )
					),


					'caption_color_css' => weaverx_cz_css( esc_html__( 'Custom CSS for Captions.', 'weaver-xtreme' ) ),
				),
			);
		} else {        // basic
			$image_sections['images-global'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Global Image Settings', 'weaver-xtreme' ),
				'description' => 'Set Image options for Site Wrapper &amp; Container. Use Colors to set colors.',
				'options'     => array(
					'images-heading-global' => weaverx_cz_group_title( esc_html__( 'Global Image Settings', 'weaver-xtreme' ),
						esc_html__( 'Standard and Full interface levels provide options for image borders.', 'weaver-xtreme' ) ),
				),
			);
		}


		/**
		 * Site Header
		 */

		$logo_html = weaverx_get_logo_html();

		$image_sections['images-header'] = array(
			'panel'   => $panel,
			'title'   => esc_html__( 'Header Media (Layout)', 'weaver-xtreme' ),
			'options' => array(
				'images-heading-header' => weaverx_cz_group_title( esc_html__( 'Site Header Media', 'weaver-xtreme' ),
					weaverx_filter_text( __( 'You can set the header image or video on the <em>Images : Header Media ( image, video )</em> menu, one level up from here. The Site Logo is set on the <em>General Options & Admin : Site Identity</em> menu.', 'weaver-xtreme' ) ) ),

				'images-heading-altimg' => weaverx_cz_heading(
					esc_html__( 'Alternate Header Images', 'weaver-xtreme' ),
					esc_html__( 'You can specify alternate header images using the Content and Post Specific <em>Featured Image Location</em> option on the <em>Images</em> panel, as well as Per Page and Per Post options.', 'weaver-xtreme' )
				),

				'images-header-image-title' => weaverx_cz_group_title( esc_html__( 'Header Image', 'weaver-xtreme' ),
					weaverx_filter_text( __( 'Settings for Site Header Image. <em style="color:red;">These Image settings DO NOT apply to the Header Video.</em>', 'weaver-xtreme' ) ) ),

				'link_site_image' => weaverx_cz_checkbox_refresh( esc_html__( 'Header Image Links to Site', 'weaver-xtreme' ),
					weaverx_filter_text( __( 'Check to add a link to site home page for Header Image. Note: If used with <em>Move Title/Tagline over Image</em>, parts of the header image will not be clickable.', 'weaver-xtreme' ) ) ),

				'header_image_align' => weaverx_cz_select(
					__( 'Align Header Image', 'weaver-xtreme' ),
					__( 'How to align header image. Wide and Full do not apply to BG header image.', 'weaver-xtreme' ),
					'weaverx_cz_choices_align', 'float-left', 'refresh'
				),

				'header_image_render' => weaverx_cz_is_old_plus()
					? weaverx_cz_heading( esc_html__( 'Header Image Rendering', 'weaver-xtreme' ) . ' (WX+ V3)',
						esc_html__( '"Render Header Image as BG Image" requires Weaver Xtreme Plus V2.90 or later.', 'weaver-xtreme' ) )
					: weaverx_cz_select_plus(
						__( 'Header Image Rendering', 'weaver-xtreme' ),
						__( 'How to render header image: as img in header or as header area bg image. When rendered as a BG image, other options such as moving Title/Tagline or having image link to home page are not meaningful. Optionally, use <em>Suggested Header Image Height</em> above to control BG image height.', 'weaver-xtreme' ),
						'weaverx_cz_choices_render_header', 'header-as-img', 'refresh'
					),

				'header_min_height' => array(
					'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'refresh', 'default' => 0 ),
					'control' => array(
						'control_type' => WEAVERX_PLUS_RANGE_CONTROL,
						'label'        => esc_html__( 'Minimum Header Height (px)', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
						'description'  => esc_html__( 'Set Minimum Height for Header Area. Most useful used with Parallax Header BG Image. Adding Top Margin to Primary Menu bar can also add height.', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 0,
							'max'  => 1000,
							'step' => 10,
						),
					),
				),

			),

		);


		if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard
			$level                                      = array(    // for standard + full level

			                                                        'header_image_max_width_dec' => array(
				                                                        'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 100.0 ),
				                                                        'control' => array(
					                                                        'control_type' => WEAVERX_PLUS_RANGE_CONTROL,
					                                                        'label'        => esc_html__( 'Maximum Image Width (%)', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
					                                                        'description'  => esc_html__( 'Maximum width of Header Image. Can be useful to change Header Image alignment.', 'weaver-xtreme' ),
					                                                        'type'         => 'range',
					                                                        'input_attrs'  => array(
						                                                        'min'  => 10,
						                                                        'max'  => 100,
						                                                        'step' => .5,
					                                                        ),
				                                                        ),
			                                                        ),

			                                                        'header_actual_size' => weaverx_cz_checkbox( esc_html__( 'Use Actual Image Size', 'weaver-xtreme' ),
				                                                        esc_html__( 'Check to use actual header image size. (Default: theme width)', 'weaver-xtreme' ), 'plus' ),


			                                                        'header-image-html-rep-head' => weaverx_cz_group_title( esc_html__( 'Replace Header Image with HTML', 'weaver-xtreme' ), '' ),

			                                                        'header_image_html_text' => weaverx_cz_html_textarea( esc_html__( 'Image HTML Replacement', 'weaver-xtreme' ),
				                                                        esc_html__( 'Replace Header image with arbitrary HTML. Useful for slider shortcodes in place of image. FI as Header Image has priority over HTML replacement. Extreme Plus also supports this option on a Per Page/Post basis.', 'weaver-xtreme' ),
				                                                        '1', 'refresh' ),

			                                                        'header_image_html_home_only' => weaverx_cz_checkbox_refresh( esc_html__( 'Show Replacement only on Front Page', 'weaver-xtreme' ),
				                                                        esc_html__( 'Check to use the Image HTML Replacement only on your Front/Home page. Extreme Plus support Per Page/Post control.', 'weaver-xtreme' ) ),
			);
			$image_sections['images-header']['options'] = array_merge( $image_sections['images-header']['options'], $level );
		}

		if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard

			$level                                      = array(    // for standard + full level
			                                                        'header_image_html_plus_bg' => weaverx_cz_is_old_plus()
				                                                        ? weaverx_cz_heading( esc_html__( 'Also show BG Header Image', 'weaver-xtreme' ) . ' (WX+ V3)',
					                                                        esc_html__( '"Also show BG Header Image" requires Weaver Xtreme Plus V2.90 or later.', 'weaver-xtreme' ) )
				                                                        : weaverx_cz_checkbox( esc_html__( 'Also show BG Header Image', 'weaver-xtreme' ),
					                                                        esc_html__( 'If you have Image HTML Replacement defined - including Per Page/Post - and also have have set the standard Header Image to display as a BG image, then show both the BG image and the replacement HTML.', 'weaver-xtreme' ), 'plus', 'refresh' ),

			                                                        'header_image_height_int' => array(
				                                                        'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'refresh', 'default' => 188 ),
				                                                        'control' => array(
					                                                        'control_type' => 'WeaverX_Range_Control',
					                                                        'label'        => __( 'Suggested Header Image Height (px)', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
					                                                        'description'  => __( 'Change the suggested height of the Header Image. Standard size is 188. This height is only a suggestion, and only affects the clipping window on the Customizer <em>Images &rarr; Header Banner Images<em> panel after you refresh the whole Customize interface. Header images will always be responsively sized. (Default header image width: theme width)', 'weaver-xtreme' ),
					                                                        'type'         => 'range',
					                                                        'input_attrs'  => array(
						                                                        'min'  => 10,
						                                                        'max'  => 2400,
						                                                        'step' => 5,
					                                                        ),
				                                                        ),
			                                                        ),
			);
			$image_sections['images-header']['options'] = array_merge( $image_sections['images-header']['options'], $level );


			$level                                      = array(

				'images-heading-header-video' => weaverx_cz_group_title( esc_html__( 'Header Video', 'weaver-xtreme' ),
					weaverx_filter_text( __( 'You can set the Header Video on the <em>Customize : Images : Header Media</em> menu.', 'weaver-xtreme' ) ) ),

				'header_video_render' => weaverx_cz_select(
					esc_html__( 'Header Video Rendering', 'weaver-xtreme' ),
					weaverx_filter_text( __( 'How to render Header Video: as image substitute in header or as full browser background cover image will parallax effect. <em style="color:red;">Note that the Header Image options above do not apply to the Header Video media.</em>', 'weaver-xtreme' )),
					'weaverx_cz_choices_render_header_video', 'has-header-video', 'refresh'
				),

				'header_video_aspect' => weaverx_cz_select(
					esc_html__( 'Header Video Aspect Ratio', 'weaver-xtreme' ),
					weaverx_filter_text( __( '<strong style="color:red;">CRITICAL SETTING!</strong> It is critical to select aspect ratio of your video. HD 16:9 is the default. This setting should correspond to the native aspect ratio of your video. YouTube allows you to upload any aspect ratio. Most aspect ratios work will for the full cover BG display, or a Banner ratio may work better for the header only view. Ideally, the matching header image will have the same aspect ratio, but it is not critical. If you see letterboxing black bars, you have the wrong aspect ratio selected.', 'weaver-xtreme' )),
					'weaverx_cz_choices_header_video_aspect', '16:9', 'refresh'
				),

				'images-heading-header-logo' => weaverx_cz_group_title( esc_html__( 'Site Logo', 'weaver-xtreme' ),
					weaverx_filter_text( __( 'You can set the Site Logo on the <em>Customize : General Options : Site Identity</em> menu.', 'weaver-xtreme' ) )
					. $logo_html ),

				'hide_wp_site_logo' => weaverx_cz_select(
					esc_html__( 'Hide Site Logo', 'weaver-xtreme' ),
					esc_html__( 'IMPORTANT! This option only applies to the Site Logo when used in the Header. It does NOT apply to the Site Logo on the Menu, nor as the replacement for the Site Title.', 'weaver-xtreme' ),
					'weaverx_cz_choices_hide', 'hide-none', 'refresh'
				),

				'wplogo_for_title' => weaverx_cz_checkbox_refresh( esc_html__( 'Replace Title with Site Logo', 'weaver-xtreme' ),
					esc_html__( 'Replace the Site Title text with the WP Custom Logo Image', 'weaver-xtreme' ) ),

				'header_logo_height_dec' => array(
					'setting' => array(
						'sanitize_callback' => 'weaverx_cz_sanitize_int',
						'transport'         => 'refresh',
						'default'           => 32,
					),
					'control' => array(
						'control_type' => 'WeaverX_Range_Control',
						'label'        => __( 'Logo as Title Replacement Height (px)', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
						'description'  => __( 'Set height of Logo on Menu. Will interact with padding. (Default: 32px)', 'weaver-xtreme' ),
						'type'         => 'range',
						'input_attrs'  => array(
							'min'  => 10,
							'max'  => 200,
							'step' => 1,
						),
					),
				),


				'images-heading-other' => weaverx_cz_group_title( esc_html__( 'Related Settings', 'weaver-xtreme' ) ),

				'images-heading-srch' => weaverx_cz_heading(
					esc_html__( 'Search Box Icon', 'weaver-xtreme' ),
					weaverx_filter_text( __( 'The icon used in search boxes can be changed in the <em>Colors &rarr; Content</em> section.', 'weaver-xtreme' ) )
				),
			);
			$image_sections['images-header']['options'] = array_merge( $image_sections['images-header']['options'], $level );
		}


		/**
		 * Content
		 */

		if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard
			$image_sections['images-content'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Content', 'weaver-xtreme' ),
				'description' => esc_html__( 'Featured Image display on page content.', 'weaver-xtreme' ),
				'options'     => array(

					'images-content-heading' => weaverx_cz_heading( esc_html__( 'General Image Settings', 'weaver-xtreme' ),
						weaverx_filter_text( __( 'General image settings found on the <em>Global Image Settings</em> panel.', 'weaver-xtreme' ) ) ),

					'images-pgextendbg-heading' => weaverx_cz_heading( esc_html__( 'Full Width Featured Image BG', 'weaver-xtreme' ),
						weaverx_filter_text( __( 'Check the <em>Content Full Width BG Attributes</em> option on the <em>Spacing, Width, Alignment : Full Width Site</em> menu to get full width Featured Image BG.', 'weaver-xtreme' ) ) ),

					'images-content-FI' => weaverx_cz_group_title( esc_html__( 'Featured Image - Pages', 'weaver-xtreme' ),
						esc_html__( 'Display of Page Featured Images', 'weaver-xtreme' ) ),

					'page_fi_location' => weaverx_cz_select(
						esc_html__( 'Featured Image Location', 'weaver-xtreme' ),
						esc_html__( 'Where to display Featured Image for Pages', 'weaver-xtreme' ),
						'weaverx_cz_choices_fi_location', 'content-top', 'refresh'
					),

					'page_min_height' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'refresh', 'default' => 100 ),
						'control' => array(
							'control_type' => WEAVERX_PLUS_RANGE_CONTROL,
							'label'        => esc_html__( 'Page Content Height (px)', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
							'description'  => esc_html__( 'Minimum Height Page Content with Parallax BG.', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 10,
								'max'  => 2000,
								'step' => 10,
							),
						),
					),

					'page_fi_align' => weaverx_cz_select(
						esc_html__( 'Align Featured Image', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_fi_align', 'fi-alignleft', 'refresh'
					),

					'page_fi_hide' => weaverx_cz_select(
						esc_html__( 'Hide Featured Image', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),


					'page_fi_size' => weaverx_cz_select(
						esc_html__( 'Page Featured Image Size', 'weaver-xtreme' ),
						esc_html__( 'Media Library Image Size for Featured Image on pages. ( Header uses full size ).', 'weaver-xtreme' ),
						'weaverx_cz_choices_fi_size', 'thumbnail', 'refresh'
					),

					'page_fi_width' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'refresh', 'default' => 0 ),
						'control' => array(
							'control_type' => WEAVERX_PLUS_RANGE_CONTROL,
							'label'        => esc_html__( 'Featured Image Width (%)', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
							'description'  => esc_html__( 'Width of Featured Image on Pages. Max Width in %, overrides FI Size selection. Set to 0 to avoid overriding above Featured Image Size setting.', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 100,
								'step' => 0.5,
							),
						),
					),

					'page_fi_nolink' => weaverx_cz_checkbox_refresh( esc_html__( "Don't add link to FI", 'weaver-xtreme' ),
						esc_html__( 'Do not add link to Featured Image.', 'weaver-xtreme' ), 'plus' ),


				),
			);
		} else {    // basic

			$image_sections['images-content'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Content', 'weaver-xtreme' ),
				'description' => esc_html__( 'Featured Image display on page content.', 'weaver-xtreme' ),
				'options'     => array(

					'images-pgspecific-heading' => weaverx_cz_group_title( esc_html__( 'General Image Settings', 'weaver-xtreme' ),
						weaverx_filter_text( __( 'General image settings found on the <em>Site Wrapper &amp; Container</em> panel.', 'weaver-xtreme' ) ) ),
					'images-content-FI-notes'   => weaverx_cz_group_title( esc_html__( 'Featured Image - Pages', 'weaver-xtreme' ),
						esc_html__( 'Display of Page Featured Images. Full and Standard interface level have options to set Featured Image location, alignment, and size. Default is top of content, left aligned.', 'weaver-xtreme' ) ),
				),
			);
		}


		/**
		 * Post Specific
		 */
		if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard
			$image_sections['images-post-specific'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Post Specific', 'weaver-xtreme' ),
				'description' => esc_html__( 'Featured Image display with posts.', 'weaver-xtreme' ),
				'options'     => array(
					'images-postspecific-heading' => weaverx_cz_group_title( esc_html__( 'General Image Settings', 'weaver-xtreme' ),
						weaverx_filter_text( __( 'General image settings found on the <em>Global Image Settings</em> panel.', 'weaver-xtreme' ) ) ),


					'post_avatar_int'  => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'postMessage', 'default' => 28 ),
						'control' => array(
							'control_type' => WEAVERX_PLUS_RANGE_CONTROL,
							'label'        => esc_html__( 'Author Avatar Size (px)', 'weaver-xtreme' ),
							'description'  => esc_html__( 'Size of Author Avatar in px - only for Post Info line. (Default: 28px)', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 10,
								'max'  => 60,
								'step' => 1,
							),
						),
					),
					'images-fi-post-h' => weaverx_cz_group_title( esc_html__( 'Post Featured Image Options', 'weaver-xtreme' ),
						esc_html__( 'Options for Post Featured Images.', 'weaver-xtreme' ) ),

					'post_fi_nolink' => weaverx_cz_checkbox_refresh( esc_html__( "Don't add link to FI", 'weaver-xtreme' ),
						esc_html__( 'Do not add link to Featured Image for any post layout.', 'weaver-xtreme' ), 'plus' ),


					'images-extendbg-heading' => weaverx_cz_heading( esc_html__( 'Full Width Featured Image BG', 'weaver-xtreme' ),
						weaverx_filter_text( __( 'Check the <em>Extend Width BG Attributes for all Posts</em> option on the <em>Spacing, Width, Alignment : Full Width Site</em> menu to get full width Featured Image BG.', 'weaver-xtreme' ) ) ),

					'images-content-FI-full' => weaverx_cz_group_title( esc_html__( 'Featured Image - Full Blog Posts', 'weaver-xtreme' ),
						esc_html__( 'Display of Post Featured Images when Post is displayed as a Full Post.', 'weaver-xtreme' ) ),

					'post_full_fi_location' => weaverx_cz_select(
						esc_html__( 'Featured Image Location - Full Post', 'weaver-xtreme' ),
						esc_html__( 'Where to display Featured Image.', 'weaver-xtreme' ),
						'weaverx_cz_choices_fi_location', 'content-top', 'refresh'

					),

					'post_blog_min_height' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'refresh', 'default' => 0 ),
						'control' => array(
							'control_type' => WEAVERX_PLUS_RANGE_CONTROL,
							'label'        => esc_html__( 'Post Height - Blog View (px)', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
							'description'  => esc_html__( 'Minimum Height of Post, full or excerpt, with Parallax BG in blog views.', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 10,
								'max'  => 2000,
								'step' => 10,
							),
						),
					),

					'post_full_fi_align' => weaverx_cz_select(
						esc_html__( 'Align Featured Image - Full Post', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_fi_align', 'fi-alignleft', 'refresh'
					),

					'post_full_fi_hide' => weaverx_cz_select(
						esc_html__( 'Hide Featured Image - Full Post', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),

					'post_full_fi_size' => weaverx_cz_select(
						esc_html__( 'Page Featured Image Size - Full Post', 'weaver-xtreme' ),
						esc_html__( 'Media Library Image Size for Featured Image. ( Header uses full size ).', 'weaver-xtreme' ),
						'weaverx_cz_choices_fi_size', 'thumbnail', 'refresh'
					),


					'post_full_fi_width' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'refresh', 'default' => 0 ),
						'control' => array(
							'control_type' => WEAVERX_PLUS_RANGE_CONTROL,
							'label'        => esc_html__( 'Featured Image Width (%) - Full Post', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
							'description'  => esc_html__( 'Width of Featured Image. Max Width in %, overrides FI Size selection. Set to 0 to avoid overriding above Featured Image Size setting.', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 100,
								'step' => 0.5,
							),
						),
					),


					'images-content-FI-excerpt' => weaverx_cz_group_title( esc_html__( 'Featured Image - Excerpt Posts', 'weaver-xtreme' ),
						esc_html__( 'Display of Post Featured Images when Post is displayed as an Excerpt.', 'weaver-xtreme' ) ),

					'post_excerpt_fi_location' => weaverx_cz_select(
						esc_html__( 'Featured Image Location - Excerpt', 'weaver-xtreme' ),
						esc_html__( 'Where to display Featured Image.', 'weaver-xtreme' ),
						'weaverx_cz_choices_fi_location', 'content-top', 'refresh'
					),

					'post_excerpt_fi_align' => weaverx_cz_select(
						esc_html__( 'Align Featured Image - Excerpt', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_fi_align', 'fi-alignleft', 'refresh'
					),

					'post_excerpt_fi_hide' => weaverx_cz_select(
						esc_html__( 'Hide Featured Image - Excerpt', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),

					'post_excerpt_fi_size' => weaverx_cz_select(
						esc_html__( 'Page Featured Image Size - Excerpt', 'weaver-xtreme' ),
						esc_html__( 'Media Library Image Size for Featured Image. ( Header uses full size ).', 'weaver-xtreme' ),
						'weaverx_cz_choices_fi_size', 'thumbnail', 'refresh'
					),


					'post_excerpt_fi_width' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'refresh', 'default' => 0 ),
						'control' => array(
							'control_type' => WEAVERX_PLUS_RANGE_CONTROL,
							'label'        => esc_html__( 'Featured Image Width (%) - Excerpt', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
							'description'  => esc_html__( 'Width of Featured Image. Max Width in %, overrides FI Size selection. Set to 0 to avoid overriding above Featured Image Size setting.', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 100,
								'step' => 0.5,
							),
						),
					),


					'images-content-FI-single' => weaverx_cz_group_title( esc_html__( 'Featured Image - Single Page', 'weaver-xtreme' ),
						esc_html__( 'Display of Post Featured Images when Post is displayed on the Single Page.', 'weaver-xtreme' ) ),

					'post_fi_location' => weaverx_cz_select(
						esc_html__( 'Featured Image Location - Single Page', 'weaver-xtreme' ),
						esc_html__( 'Where to display Featured Image.', 'weaver-xtreme' ),
						'weaverx_cz_choices_fi_location', 'content-top', 'refresh'
					),

					'post_min_height' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'refresh', 'default' => 0 ),
						'control' => array(
							'control_type' => WEAVERX_PLUS_RANGE_CONTROL,
							'label'        => esc_html__( 'Post Height - Single Page (px)', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
							'description'  => esc_html__( 'Minimum Height of Post with Parallax BG in Single Page view.', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 10,
								'max'  => 2000,
								'step' => 10,
							),
						),
					),

					'post_fi_align' => weaverx_cz_select(
						esc_html__( 'Align Featured Image - Single Page', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_fi_align', 'fi-alignleft', 'refresh'
					),

					'post_fi_hide' => weaverx_cz_select(
						esc_html__( 'Hide Featured Image - Single Page', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),

					'post_fi_size' => weaverx_cz_select(
						esc_html__( 'Page Featured Image Size - Single Page', 'weaver-xtreme' ),
						esc_html__( 'Media Library Image Size for Featured Image. ( Header uses full size ).', 'weaver-xtreme' ),
						'weaverx_cz_choices_fi_size', 'thumbnail', 'refresh'
					),

					'post_fi_width' => array(
						'setting' => array( 'sanitize_callback' => 'weaverx_cz_sanitize_int', 'transport' => 'refresh', 'default' => 0 ),
						'control' => array(
							'control_type' => WEAVERX_PLUS_RANGE_CONTROL,
							'label'        => esc_html__( 'Featured Image Width (%) - Single Page', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
							'description'  => esc_html__( 'Width of Featured Image. Max Width in %, overrides FI Size selection. Set to 0 to avoid overriding above Featured Image Size setting.', 'weaver-xtreme' ),
							'type'         => 'range',
							'input_attrs'  => array(
								'min'  => 0,
								'max'  => 100,
								'step' => 0.5,
							),
						),
					),

				),
			);
		} else {    // basic

			$image_sections['images-post-specific'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Post Specific', 'weaver-xtreme' ),
				'description' => esc_html__( 'Featured Image display with posts.', 'weaver-xtreme' ),
				'options'     => array(
					'images-postspecific-heading' => weaverx_cz_group_title( esc_html__( 'General Image Settings', 'weaver-xtreme' ),
						weaverx_filter_text( __( 'General image settings found on the <em>Global Image Settings</em> panel.', 'weaver-xtreme' ) ) ),

					'images-post-FI-note1' => weaverx_cz_group_title( esc_html__( 'Featured Image - Posts', 'weaver-xtreme' ),
						esc_html__( 'Display of Post Featured Images on blogs, archives, excerpted, and full content. Full and Standard interface level have options to set Featured Image location, alignment, and size. Default is top of content, left aligned.', 'weaver-xtreme' ) ),
				),
			);
		}

		/**
		 * Background Images
		 */

		if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard
			$image_sections['images-background'] = array(
				'panel'   => $panel,
				'title'   => esc_html__( 'Background', 'weaver-xtreme' ),
				'options' => array(
					'_bg_fullsite_url' => array(
						'setting' => array(
							'transport'         => 'postMessage',
							'sanitize_callback' => 'esc_url_raw',
						),
						'control' => array(
							'control_type' => WEAVERX_PLUS_IMAGE_CONTROL,
							'label'        => __( 'Full Screen Site BG Image', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
							'description'  => __( 'Full screen centered auto-sized BG image. &diams;', 'weaver-xtreme' ),
							//'type'  => 'checkbox',
						),
					),

					'images-background-css-help' => array(
						'setting' => array(),
						'control' => array(
							'control_type' => WEAVERX_PLUS_MISC_CONTROL,
							'label'        => esc_html__( 'Additional CSS for BG Images', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
							'type'         => 'HTML',
							'description'  => '<small>' .
							                  weaverx_filter_text( __( 'Use the <em>Additional CSS</em> option to specify additional background CSS options, each ending with a semi-colon ( ; ).
Valid options include: background-position, background-size, background-origin, background-clip, and background-attachment. Useful example: <code>background-size: 100% auto;</code> - makes bg image full width of container, height depends on container. See this <a href="//www.w3schools.com/cssref/css3_pr_background.asp" title="background CSS" target="_blank">W3 Schools page</a> for more information about background styling.',
								                  'weaver-xtreme' ) ) . '</small>',
						),
					),

				),
			);


			$new_opts                                       = weaverx_cz_add_image( 'body', esc_html__( 'Site BG Image', 'weaver-xtreme' ),
				esc_html__( 'Background image for entire site (body)', 'weaver-xtreme' ) );
			$image_sections['images-background']['options'] = array_merge( $image_sections['images-background']['options'], $new_opts );

			$new_opts                                       = weaverx_cz_add_image( 'wrapper', esc_html__( 'Wrapper BG Image', 'weaver-xtreme' ),
				esc_html__( 'Background image for outer wrapper (#wrapper)', 'weaver-xtreme' ) );
			$image_sections['images-background']['options'] = array_merge( $image_sections['images-background']['options'], $new_opts );

			$new_opts                                       = weaverx_cz_add_image( 'header', esc_html__( 'Header BG Image', 'weaver-xtreme' ),
				esc_html__( 'Background image for header (#header)', 'weaver-xtreme' ) );
			$image_sections['images-background']['options'] = array_merge( $image_sections['images-background']['options'], $new_opts );


			$new_opts                                       = weaverx_cz_add_image( 'container', esc_html__( 'Container BG Image', 'weaver-xtreme' ),
				esc_html__( 'Background image for Container - (#container)', 'weaver-xtreme' ) );
			$image_sections['images-background']['options'] = array_merge( $image_sections['images-background']['options'], $new_opts );


			$new_opts                                       = weaverx_cz_add_image( 'content', esc_html__( 'Content BG Image', 'weaver-xtreme' ),
				esc_html__( 'Background image for Content - wraps page/post area (#content)', 'weaver-xtreme' ) );
			$image_sections['images-background']['options'] = array_merge( $image_sections['images-background']['options'], $new_opts );


			$new_opts                                       = weaverx_cz_add_image( 'page', esc_html__( 'Page content BG Image', 'weaver-xtreme' ),
				esc_html__( 'Background image for Page content area (#content .page)', 'weaver-xtreme' ) );
			$image_sections['images-background']['options'] = array_merge( $image_sections['images-background']['options'], $new_opts );


			$new_opts                                       = weaverx_cz_add_image( 'post', esc_html__( 'Post BG Image', 'weaver-xtreme' ),
				esc_html__( 'Background image for Post content area (#content .post)', 'weaver-xtreme' ) );
			$image_sections['images-background']['options'] = array_merge( $image_sections['images-background']['options'], $new_opts );


			$new_opts                                       = weaverx_cz_add_image( 'widgets_primary', esc_html__( 'Primary Sidebar Area BG Image', 'weaver-xtreme' ),
				esc_html__( 'Background image for primary widget area (#primary-widget-area)', 'weaver-xtreme' ) );
			$image_sections['images-background']['options'] = array_merge( $image_sections['images-background']['options'], $new_opts );


			$new_opts                                       = weaverx_cz_add_image( 'widgets_secondary', esc_html__( 'Secondary Sidebar Areas BG Image', 'weaver-xtreme' ),
				esc_html__( 'Background image for secondary widget areas (#secondary-widget-area)', 'weaver-xtreme' ) );
			$image_sections['images-background']['options'] = array_merge( $image_sections['images-background']['options'], $new_opts );

			$new_opts                                       = weaverx_cz_add_image( 'footer', esc_html__( 'Footer BG Image', 'weaver-xtreme' ),
				esc_html__( 'Background image for Footer area (#colophon)', 'weaver-xtreme' ) );
			$image_sections['images-background']['options'] = array_merge( $image_sections['images-background']['options'], $new_opts );

		} else {            // basic and standard

			$image_sections['images-background'] = array(
				'panel'   => $panel,
				'title'   => esc_html__( 'Background', 'weaver-xtreme' ),
				'options' => array(

					'images-bg-use-full' => weaverx_cz_group_title( esc_html__( 'Background Images for various areas', 'weaver-xtreme' ),
						esc_html__( 'The Full interface level, when used with Weaver Xtreme Plus, provides the ability to add background images to various areas: Full Screen, body, wrapper, header, container, content, page content, post content, sidebars, and the footer.', 'weaver-xtreme' ) ),

				),
			);

		}


		return $image_sections;
	}
endif;


<?php

if ( ! function_exists( 'weaverx_customizer_define_visibility_sections' ) ) :
	/**
	 * Define the sections and settings for the Visibility panel
	 */

	function weaverx_customizer_define_visibility_sections() {
		$panel               = 'weaverx_visibility';
		$visibility_sections = array();

		/**
		 * General
		 */
		if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard
			$visibility_sections['visibility-global-vis'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Global Visibility', 'weaver-xtreme' ),
				'description' => esc_html__( 'Set global visibility attributes.', 'weaver-xtreme' ),
				'options'     => array(

					'hide_tooltip' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'refresh',
						),
						'control' => array(
							'control_type' => WEAVERX_PLUS_CHECKBOX_CONTROL,
							'label'        => esc_html__( 'Hide Menu/Link Tool Tips', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
							'description'  => esc_html__( 'Hide the tool tip pop up over all menus and links.', 'weaver-xtreme' ),
							'type'         => 'checkbox',
						),
					),

				),
			);


			/**
			 * Site Header
			 */

			$visibility_sections['visibility-header'] = array(
				'panel'   => $panel,
				'title'   => esc_html__( 'Header Area', 'weaver-xtreme' ),
				'options' => array(
					// Hide Site Title option

					'header_hide' => weaverx_cz_select(
						esc_html__( 'Hide Header Area', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),

					'hide_site_title' => weaverx_cz_select(
						esc_html__( 'Hide Site Title', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),

					'hide_site_tagline' => weaverx_cz_select(
						esc_html__( 'Hide Tagline', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),

					'hide_header_image' => weaverx_cz_select(
						esc_html__( 'Hide Header Image', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),

					'hide_header_image_front' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Hide Header Image on Front Page', 'weaver-xtreme' )
					),

					'header_sb_hide'     => weaverx_cz_select(
						esc_html__( 'Hide Header Widget Area', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),
					'header_html_hide'   => weaverx_cz_select(
						esc_html__( 'Hide Header HTML Area', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),
					'header_search_hide' => weaverx_cz_select(
						esc_html__( 'Hide Search box on Header', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),


				),
			);

			/**
			 * Main Menu
			 */
			$visibility_sections['visibility-menus'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Menus', 'weaver-xtreme' ),
				'description' => esc_html__( 'Set visibility for Menus.', 'weaver-xtreme' ),
				'options'     => array(

					'visibility-mm-heading' => weaverx_cz_group_title(
						esc_html__( 'Primary Menu', 'weaver-xtreme' )
					),

					'm_primary_hide' => weaverx_cz_select(
						esc_html__( 'Hide Primary Menu', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),


					'm_primary_hide_arrows' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Hide Primary Menu Arrows', 'weaver-xtreme' ),
						''
					),

					'm_primary_hide_left' => weaverx_cz_select_plus(
						esc_html__( 'Hide Primary Menu Left HTML', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),

					'm_primary_hide_right' => weaverx_cz_select(
						esc_html__( 'Hide Primary Menu Right HTML', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),

					'm_primary_search' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Add Search to Right', 'weaver-xtreme' ),
						esc_html__( 'Add slide open search icon to right end of primary menu.', 'weaver-xtreme' ),
						'plus' ),


					'menu_nohome' => weaverx_cz_checkbox_refresh(
						esc_html__( 'No Home Menu Item', 'weaver-xtreme' ),
						esc_html__( "Don't automatically add Home menu item for home page ( as defined in Settings->Reading )", 'weaver-xtreme' )
					),

					'visibility-pm-line1' => weaverx_cz_line(),


					'visibility-sm-heading' => weaverx_cz_group_title(
						esc_html__( 'Secondary Menu', 'weaver-xtreme' )
					),

					'm_secondary_hide' => weaverx_cz_select(
						esc_html__( 'Hide Secondary Menu', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),


					'm_secondary_hide_arrows' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Hide Secondary Menu Arrows', 'weaver-xtreme' )
					),

					'm_secondary_hide_left' => weaverx_cz_select_plus(
						esc_html__( 'Hide Secondary Menu Left HTML', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),

					'm_secondary_hide_right' => weaverx_cz_select_plus(
						esc_html__( 'Hide Secondary Menu Right HTML', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),

					'viz-pm-line2' => weaverx_cz_line(),

					'visibility-minim-heading' => weaverx_cz_group_title( esc_html__( 'Header Mini Menu', 'weaver-xtreme' ),
						esc_html__( 'You must define a Header Menu from the Custom Menus Content menu.', 'weaver-xtreme' ) ),

					'm_header_mini_hide' => weaverx_cz_select(
						esc_html__( 'Hide Header Mini Menu', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),


				),
			);

			if ( weaverx_cz_is_plus() ) {
				$new_opts = array(

					'spacing-xm-line1' => weaverx_cz_line(),

					'visibility-xm-heading' => weaverx_cz_group_title(
						esc_html__( 'Extra Menu', 'weaver-xtreme' )
					),

					'm_extra_hide' => weaverx_cz_select(
						esc_html__( 'Hide Extra Menu', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),


					'm_extra_hide_arrows' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Hide Extra Menu Arrows', 'weaver-xtreme' )
					),

					'm_extra_hide_left' => weaverx_cz_select_plus(
						esc_html__( 'Hide Extra Menu Left HTML', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),

					'm_extra_hide_right' => weaverx_cz_select_plus(
						esc_html__( 'Hide Extra Menu Right HTML', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),
				);

			} else {
				$new_opts = weaverx_cz_add_plus_message( 'spacing_menus', esc_html__( 'Extra Menu', 'weaver-xtreme' ),
					esc_html__( 'Add extra menus with <strong>Weaver Xtreme Plus</strong>.', 'weaver-xtreme' ) );
			}
			// add stub or extra menu options
			$visibility_sections['visibility-menus']['options'] = array_merge( $visibility_sections['visibility-menus']['options'], $new_opts );


			/**
			 * Info Bar
			 */
			$visibility_sections['visibility-info-bar'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Info Bar', 'weaver-xtreme' ),
				'description' => esc_html__( 'Info Bar with breadcrumbs and paged navigation displayed under Primary Menu.', 'weaver-xtreme' ),
				'options'     => array(

					'infobar_hide' => weaverx_cz_select(
						esc_html__( 'Hide Info Bar', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),

					'info_hide_breadcrumbs' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Hide Breadcrumbs', 'weaver-xtreme' ),
						esc_html__( 'Do not display the Breadcrumbs on the Infobar', 'weaver-xtreme' )
					),


					'info_hide_pagenav' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Hide Page Navigation', 'weaver-xtreme' ),
						esc_html__( 'Do not display the numbered Page navigation on the Infobar', 'weaver-xtreme' )
					),


					'info_search' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
						),
						'control' => array(
							'label'       => esc_html__( 'Show Search Icon', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
							'description' => esc_html__( 'Include slide open Search icon on the right.', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
							'type'        => 'checkbox',
						),
					),

					'info_addlogin' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
						),
						'control' => array(
							'label'       => esc_html__( 'Show Log In', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
							'description' => esc_html__( 'Include a simple Log In link on the right.', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
							'type'        => 'checkbox',
						),
					),

					'info_home_label' => weaverx_cz_textarea( esc_html__( 'Breadcrumb for Home', 'weaver-xtreme' ),
						esc_html__( 'This lets you change the breadcrumb label for your home page. (Default: Home)', 'weaver-xtreme' ),
						'1', '',
						'refresh', false ),


				),
			);

			/**
			 * Content
			 */
			$visibility_sections['visibility-content'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Content', 'weaver-xtreme' ),
				'description' => esc_html__( 'visibility for general page and post content.', 'weaver-xtreme' ),
				'options'     => array(
					'visibility-content-comments-heading' => weaverx_cz_group_title( esc_html__( 'Comments', 'weaver-xtreme' ),
						esc_html__( 'Visibility settings for Comments area.', 'weaver-xtreme' ) ),


					'hide_old_comments'   => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'refresh',
						),
						'control' => array(
							'control_type' => WEAVERX_PLUS_CHECKBOX_CONTROL,
							'label'        => esc_html__( 'Hide Old Comments When Closed', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
							'description'  => esc_html__( 'Hide previous comments after closing comments for page or post. (Default: show old comments after closing.)', 'weaver-xtreme' ),
							'type'         => 'checkbox',
						),
					),
					'form_allowed_tags'   => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'refresh',
						),
						'control' => array(
							'control_type' => WEAVERX_PLUS_CHECKBOX_CONTROL,
							'label'        => esc_html__( 'Show Allowed HTML', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
							'description'  => esc_html__( 'Show the allowed HTML tags below comment input box.', 'weaver-xtreme' ),
							'type'         => 'checkbox',
						),
					),
					'hide_comment_bubble' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'refresh',
						),
						'control' => array(
							'control_type' => WEAVERX_PLUS_CHECKBOX_CONTROL,
							'label'        => esc_html__( 'Hide Comment Title Icon', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
							'description'  => esc_html__( 'Hide the comment icon (bubble) before the Comments title.', 'weaver-xtreme' ),
							'type'         => 'checkbox',
						),
					),

					'hide_comment_hr' => array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
							'transport'         => 'refresh',
						),
						'control' => array(
							'control_type' => WEAVERX_PLUS_CHECKBOX_CONTROL,
							'label'        => esc_html__( 'Hide Separator Above Comments', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON,
							'description'  => esc_html__( 'Hide the <hr> separator line above the Comments area.', 'weaver-xtreme' ),
							'type'         => 'checkbox',
						),
					),

					'visibility-content-comments-note' => weaverx_cz_heading( esc_html__( 'Hiding/Enabling Page and Post Comments', 'weaver-xtreme' ),
						weaverx_filter_text( __( 'Controlling "Reply/Leave a Comment" visibility for pages and posts is <strong>not</strong> a theme function. It is controlled by WordPress on the <em>Settings &rarr; Discussion</em> menu.', 'weaver-xtreme' ) ) ),

				),
			);

			/**
			 * Post Specific
			 */
			$visibility_sections['visibility-post-specific'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Post Specific', 'weaver-xtreme' ),
				'description' => esc_html__( 'Post Specific visibility - override Content visibility.', 'weaver-xtreme' ),
				'options'     => array(


					'visibility-posts-metax-heading' => weaverx_cz_group_title( esc_html__( 'Post Meta Info Lines', 'weaver-xtreme' ) ),

					'post_info_hide_top' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Hide top post meta info line', 'weaver-xtreme' ),
						esc_html__( 'Hide entire top info line ( posted on, by ) of post.', 'weaver-xtreme' )
					),


					'post_info_hide_bottom' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Hide bottom post meta info line', 'weaver-xtreme' ),
						esc_html__( 'Hide entire bottom info line (posted in, comments) of post.', 'weaver-xtreme' )
					),


					'show_post_bubble' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Show Comment Bubble', 'weaver-xtreme' ),
						esc_html__( 'Show comment bubble with link to comments on the post info line.', 'weaver-xtreme' )
					),


					'show_post_avatar' => weaverx_cz_select(
						esc_html__( 'Show Author Avatar', 'weaver-xtreme' ),
						esc_html__( 'Show author avatar on the post info line (also can be set per post with post editor).', 'weaver-xtreme' ),
						'weaverx_cz_choices_hide', 'hide', 'refresh'
					),


					'visibility-posts-note-meta-heading' => weaverx_cz_heading( esc_html__( 'NOTE:', 'weaver-xtreme' ),
						esc_html__( 'Hiding any meta info item will force using Icons instead of text descriptions.', 'weaver-xtreme' ) ),

					'post_hide_date' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Hide Post Date', 'weaver-xtreme' )
					),


					'post_hide_author' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Hide Post Author', 'weaver-xtreme' )
					),


					'post_hide_categories' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Hide Post Categories', 'weaver-xtreme' )
					),


					'post_hide_tags' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Hide Post Tags', 'weaver-xtreme' )
					),


					'hide_permalink' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Hide Permalink', 'weaver-xtreme' )
					),

					'hide_singleton_category' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Hide Category if Only One', 'weaver-xtreme' ),
						esc_html__( "If there is only one overall category defined (Uncategorized), don't show Category of post.", 'weaver-xtreme' )
					),


					'post_hide_single_author' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Hide Author for Single Author Site', 'weaver-xtreme' ),
						esc_html__( "Hide author information if site has only a single author.", 'weaver-xtreme' )
					),


					'visibility-posts-nav-heading' => weaverx_cz_group_title( esc_html__( 'Post Navigation', 'weaver-xtreme' ) ),

					'visibility-posts-misc-heading' => weaverx_cz_group_title( esc_html__( 'Other Post Visibility Options', 'weaver-xtreme' ) ),

					'hide_post_format_icon' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Hide Post Format Icons', 'weaver-xtreme' ),
						esc_html__( 'Hide the icons for posts with Post Format specified.', 'weaver-xtreme' ),
						'plus' ),


					/*array(
						'setting' => array(
							'sanitize_callback' => 'weaverx_cz_sanitize_int',
						),
						'control' => array(
							'control_type' => WEAVERX_PLUS_CHECKBOX_CONTROL,
							'label' => esc_html__( 'Hide Post Format Icons', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
							'description' => esc_html__( 'Hide the icons for posts with Post Format specified.', 'weaver-xtreme' ),
							'type'  => 'checkbox',
						),
					), */

					'show_comments_closed' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Show "Comments are closed"', 'weaver-xtreme' ),
						weaverx_filter_text( __( 'If comments are off, and no comments have been made, show the <em>Comments are closed.</em> message.', 'weaver-xtreme' ) )
					),


					'hide_author_bio' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Hide Author Bio', 'weaver-xtreme' ),
						esc_html__( 'Hide display of author bio box on Author Archive and Single Post page views.', 'weaver-xtreme' )
					),


				),
			);


			/**
			 * Sidebars
			 */
			$visibility_sections['visibility-sidebars'] = array(
				'panel'       => $panel,
				'title'       => esc_html__( 'Sidebars &amp; Widget Areas', 'weaver-xtreme' ),
				'description' => esc_html__( 'Main Sidebars and Widget areas. Header and Footer areas options under Header and Footer panels.', 'weaver-xtreme' ),
				'options'     => array(
					'visibility-primary-widget-heading' => weaverx_cz_group_title( esc_html__( 'Primary Widget Area', 'weaver-xtreme' ) ),

					'primary_hide' => weaverx_cz_select(
						esc_html__( 'Hide Primary Widget Area', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),


					'visibility-secondary-widget-heading' => weaverx_cz_group_title( esc_html__( 'Secondary Widget Area', 'weaver-xtreme' ) ),

					'secondary_hide' => weaverx_cz_select(
						esc_html__( 'Hide Secondary Widget Area', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),


					'visibility-top-widget-heading' => weaverx_cz_group_title( esc_html__( 'Top Widget Areas', 'weaver-xtreme' ),
						esc_html__( 'Properties for all Top Widget areas (Sitewide, Pages, Blog, Archive).', 'weaver-xtreme' ) ),

					'top_hide' => weaverx_cz_select(
						esc_html__( 'Hide Top Widget Areas', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),


					'visibility-bottom-widget-heading' => weaverx_cz_group_title( esc_html__( 'Bottom Widget Areas', 'weaver-xtreme' ),
						esc_html__( 'Properties for all Bottom Widget areas (Sitewide, Pages, Blog, Archive).', 'weaver-xtreme' ) ),

					'bottom_hide' => weaverx_cz_select(
						esc_html__( 'Hide Bottom Widget Areas', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),

				),

			);


			/**
			 * Widgets
			 */
			$visibility_sections['visibility-widgets'] = array(
				'panel'   => $panel,
				'title'   => esc_html__( 'Individual Widgets', 'weaver-xtreme' ),
				'options' => array(),
			);


			/**
			 * Footer
			 */
			$visibility_sections['visibility-footer'] = array(
				'panel'   => $panel,
				'title'   => esc_html__( 'Footer Area', 'weaver-xtreme' ),
				'options' => array(

					'footer_hide'      => weaverx_cz_select(
						esc_html__( 'Hide Footer Area', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),
					'footer_sb_hide'   => weaverx_cz_select(
						esc_html__( 'Hide Footer Widget Area', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),
					'footer_html_hide' => weaverx_cz_select(
						esc_html__( 'Hide Footer HTML Area', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),


					'_hide_poweredby' => weaverx_cz_checkbox_refresh(
						esc_html__( 'Hide Powered By tag', 'weaver-xtreme' ),
						esc_html__( 'Hide the WordPress Logo link/notice in the footer. &diams;', 'weaver-xtreme' )
					),


				),
			);
		} else {
			$visibility_sections['vis-panel'] = array(
				'panel'   => $panel,
				'title'   => esc_html__( 'Visibility Options', 'weaver-xtreme' ),
				'options' => array(

					'vis-beginner-heading' => weaverx_cz_heading( esc_html__( 'Full and Standard Visibility', 'weaver-xtreme' ),
						esc_html__( 'With the Full and Standard Level Interface Levels, you can define control visibility for many other items.', 'weaver-xtreme' ) ),

					'm_primary_hide'     => weaverx_cz_select(
						esc_html__( 'Hide Primary Menu', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),
					'm_header_mini_hide' => weaverx_cz_select(
						esc_html__( 'Hide Header Mini Menu', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),
					'infobar_hide'       => weaverx_cz_select(
						esc_html__( 'Hide Info Bar', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),
					'primary_hide'       => weaverx_cz_select(
						esc_html__( 'Hide Primary Widget Area', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),
					'secondary_hide'     => weaverx_cz_select(
						esc_html__( 'Hide Secondary Widget Area', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),
					'top_hide'           => weaverx_cz_select(
						esc_html__( 'Hide Top Widget Areas', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),
					'bottom_hide'        => weaverx_cz_select(
						esc_html__( 'Hide Bottom Widget Areas', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),
					'header_hide'        => weaverx_cz_select(
						esc_html__( 'Hide Header Area', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),
					'footer_hide'        => weaverx_cz_select(
						esc_html__( 'Hide Footer Area', 'weaver-xtreme' ),
						'',
						'weaverx_cz_choices_hide', 'hide-none', 'refresh'
					),
				),
			);

		}

		return $visibility_sections;
	}
endif;


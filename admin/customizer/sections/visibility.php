<?php

/**
 * Define the sections and settings for the Visibility panel
 */

function weaverx_customizer_define_visibility_sections() {
	$panel = 'weaverx_visibility';
	$visibility_sections = array();

	/**
	 * Visibility : Global
	 */

	if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard
		$visibility_sections['visibility-global-vis'] = array(
			'panel'       => $panel,
			'title'       => esc_html__( 'Global Visibility', 'weaver-xtreme' ),
			'description' => esc_html__( 'Set global visibility attributes.', 'weaver-xtreme' ),
			'options'     => weaverx_controls_visibility_global(),
		);

		/**
		 * Visibility : Site Header
		 */

		$visibility_sections['visibility-header'] = array(
			'panel'   => $panel,
			'title'   => esc_html__( 'Header Area', 'weaver-xtreme' ),
			'options' => weaverx_controls_visibility_header(),
		);

		/**
		 * Visibility : Menus
		 */
		$visibility_sections['visibility-menus'] = array(
			'panel'       => $panel,
			'title'       => esc_html__( 'Menus', 'weaver-xtreme' ),
			'description' => esc_html__( 'Set visibility for Menus.', 'weaver-xtreme' ),
			'options'     => weaverx_controls_visibility_menus(),
		);

		/**
		 * Visibility : Info Bar
		 */
		$visibility_sections['visibility-info-bar'] = array(
			'panel'       => $panel,
			'title'       => esc_html__( 'Info Bar', 'weaver-xtreme' ),
			'description' => esc_html__( 'Info Bar with breadcrumbs and paged navigation displayed under Primary Menu.', 'weaver-xtreme' ),
			'options'     => weaverx_controls_visibility_infobar(),
		);


		/**
		 * Visibility : Content
		 */
		$visibility_sections['visibility-content'] = array(
			'panel'       => $panel,
			'title'       => esc_html__( 'Content', 'weaver-xtreme' ),
			'description' => esc_html__( 'Visibility for general page and post content.', 'weaver-xtreme' ),
			'options'     => weaverx_controls_visibility_content(),
		);

		/**
		 * Visibility : Post Specific
		 */
		$visibility_sections['visibility-post-specific'] = array(
			'panel'       => $panel,
			'title'       => esc_html__( 'Post Specific', 'weaver-xtreme' ),
			'description' => esc_html__( 'Post Specific visibility - override Content visibility.', 'weaver-xtreme' ),
			'options'     => weaverx_controls_visibility_postspecific(),
		);

		/**
		 * Visibility : Sidebars
		 */
		$visibility_sections['visibility-sidebars'] = array(
			'panel'       => $panel,
			'title'       => esc_html__( 'Sidebars &amp; Widget Areas', 'weaver-xtreme' ),
			'description' => esc_html__( 'Main Sidebars and Widget areas. Header and Footer areas options under Header and Footer panels.', 'weaver-xtreme' ),
			'options'     => weaverx_controls_visibility_sidebars(),
		);


		/**
		 * Visibility : Footer
		 */
		$visibility_sections['visibility-footer'] = array(
			'panel'   => $panel,
			'title'   => esc_html__( 'Footer Area', 'weaver-xtreme' ),
			'options' => weaverx_controls_visibility_footer(),
		);
	} else {    // Basic only
		$visibility_sections ['vis-panel'] = array(
			'panel'   => $panel,
			'title'   => esc_html__( 'Visibility Options', 'weaver-xtreme' ),
			'options' => weaverx_controls_visibility_basic(),
		);
	}

	return $visibility_sections;
}

function weaverx_controls_visibility_global() {
	return array(
		'hide_tooltip' => weaverx_cz_checkbox( __( 'Hide Menu/Link Tool Tips', 'weaver-xtreme' ),
			__( 'Hide the tool tip pop up over all menus and links.', 'weaver-xtreme' )

		) );
}

function weaverx_controls_visibility_header() {
	$opts = array();

	// Hide Site Title option

	$opts['header_hide'] = weaverx_cz_select(
		__( 'Hide Header Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['hide_site_title'] = weaverx_cz_select(
		__( 'Hide Site Title', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['hide_site_tagline'] = weaverx_cz_select(
		__( 'Hide Tagline', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['hide_header_image'] = weaverx_cz_select(
		__( 'Hide Header Image', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['hide_wp_site_logo'] = weaverx_cz_select(     // V4.4: MOVED from Images:Header
		__( 'Hide Site Logo', 'weaver-xtreme' ),
		__( 'IMPORTANT! This option only applies to the Site Logo when used in the Header. It does NOT apply to the Site Logo on the Menu, nor as the replacement for the Site Title.', 'weaver-xtreme' ),
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['hide_header_image_front'] = weaverx_cz_checkbox(
		__( 'Hide Header Image on Front Page', 'weaver-xtreme' )
	);

	$opts['header_sb_hide'] = weaverx_cz_select(
		__( 'Hide Header Widget Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['header_html_hide'] = weaverx_cz_select(
		__( 'Hide Header HTML Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);


	$opts['header_search_hide'] = weaverx_cz_select(
		__( 'Hide Search box on Header', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	return $opts;
}

function weaverx_controls_visibility_menus() {
	$opts = array();

	$opts['visibility-mm-heading'] = weaverx_cz_group_title(
		__( 'Primary Menu', 'weaver-xtreme' )
	);

	$opts['m_primary_hide'] = weaverx_cz_select(
		__( 'Hide Primary Menu', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['m_primary_hide_arrows'] = weaverx_cz_checkbox(
		__( 'Hide Primary Menu Arrows', 'weaver-xtreme' ),
		''
	);

	$opts['m_primary_hide_left'] = weaverx_cz_select_plus(
		__( 'Hide Primary Menu Left HTML', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);


	$opts['m_primary_hide_right'] = weaverx_cz_select(
		__( 'Hide Primary Menu Right HTML', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['m_primary_search'] = weaverx_cz_checkbox(
		__( 'Add Search to Right', 'weaver-xtreme' ),
		__( 'Add slide open search icon to right end of primary menu.', 'weaver-xtreme' ),
		'plus' );


	$opts['menu_nohome'] = weaverx_cz_checkbox(
		__( 'No Home Menu Item', 'weaver-xtreme' ),
		__( "Don't automatically add Home menu item for home page ( as defined in Settings->Reading )", 'weaver-xtreme' )
	);

	$opts['visibility-pm-line1'] = weaverx_cz_line();

	$opts['visibility-sm-heading'] = weaverx_cz_group_title(
		__( 'Secondary Menu', 'weaver-xtreme' )
	);

	$opts['m_secondary_hide'] = weaverx_cz_select(
		__( 'Hide Secondary Menu', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['m_secondary_hide_arrows'] = weaverx_cz_checkbox(
		esc_html__( 'Hide Secondary Menu Arrows', 'weaver-xtreme' )
	);

	$opts['m_secondary_hide_left'] = weaverx_cz_select_plus(
		__( 'Hide Secondary Menu Left HTML', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['m_secondary_hide_right'] = weaverx_cz_select_plus(
		__( 'Hide Secondary Menu Right HTML', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['viz-pm-line2'] = weaverx_cz_line();

	$opts['visibility-mini-heading'] = weaverx_cz_group_title(
		__( 'Header Mini Menu', 'weaver-xtreme' )
	);


	$opts['m_header_mini_hide'] = weaverx_cz_select(
		__( 'Hide Header Mini Menu', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['spacing-xm-line1'] = weaverx_cz_line();

	if ( weaverx_cz_is_plus() ) {


		$opts['visibility-xm-heading'] = weaverx_cz_group_title(
			__( 'Extra Menu', 'weaver-xtreme' )
		);

		$opts['m_extra_hide'] = weaverx_cz_select(
			__( 'Hide Extra Menu', 'weaver-xtreme' ),
			'',
			'weaverx_cz_choices_hide', 'hide-none', 'refresh'
		);


		$opts['m_extra_hide_arrows'] = weaverx_cz_checkbox(
			__( 'Hide Extra Menu Arrows', 'weaver-xtreme' )
		);

		$opts['m_extra_hide_left'] = weaverx_cz_select_plus(
			__( 'Hide Extra Menu Left HTML', 'weaver-xtreme' ),
			'',
			'weaverx_cz_choices_hide', 'hide-none', 'refresh'
		);

		$opts['m_extra_hide_right'] = weaverx_cz_select_plus(
			__( 'Hide Extra Menu Right HTML', 'weaver-xtreme' ),
			'',
			'weaverx_cz_choices_hide', 'hide-none', 'refresh'
		);

	} else {    // not Plus

		$opts['m_extra_needs_plus'] = weaverx_cz_heading( __( 'Extra Menu', 'weaver-xtreme' ),
			__( 'Add extra menus with <strong>Weaver Xtreme Plus</strong>.', 'weaver-xtreme' ) );
	}

	return $opts;
}

function weaverx_controls_visibility_infobar() {
	$opts = array();

	$opts['infobar_hide'] = weaverx_cz_select(
		__( 'Hide Info Bar', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['info_hide_breadcrumbs'] = weaverx_cz_checkbox(
		__( 'Hide Breadcrumbs', 'weaver-xtreme' ),
		__( 'Do not display the Breadcrumbs on the Infobar', 'weaver-xtreme' )
	);

	$opts['info_hide_pagenav'] = weaverx_cz_checkbox(
		__( 'Hide Page Navigation', 'weaver-xtreme' ),
		__( 'Do not display the numbered Page navigation on the Infobar', 'weaver-xtreme' )
	);

	$opts['info_search'] = weaverx_cz_checkbox(
		__( 'Show Search Icon', 'weaver-xtreme' ),
		__( 'Include slide open Search icon on the right.', 'weaver-xtreme' )
	);

	$opts['info_addlogin'] = weaverx_cz_checkbox(
		__( 'Show Log In', 'weaver-xtreme' ),
		__( 'Include a simple Log In link on the right.', 'weaver-xtreme' )
	);

	$opts['info_home_label'] = weaverx_cz_textarea( __( 'Breadcrumb for Home', 'weaver-xtreme' ),
		__( 'This lets you change the breadcrumb label for your home page. (Default: Home)', 'weaver-xtreme' ),
		'1', '',
		'refresh' );

	return $opts;
}

function weaverx_controls_visibility_content() {
	$opts = array();

	$opts['visibility-content-comments-heading'] = weaverx_cz_group_title( __( 'Comments', 'weaver-xtreme' ),
		__( 'Visibility settings for Comments area.', 'weaver-xtreme' ) );

	$opts['hide_old_comments'] = weaverx_cz_checkbox(
		__( 'Hide Old Comments When Closed', 'weaver-xtreme' ),
		__( 'Hide previous comments after closing comments for page or post. (Default: show old comments after closing.)', 'weaver-xtreme' )
	);


	$opts['form_allowed_tags'] = weaverx_cz_checkbox(
		__( 'Show Allowed HTML', 'weaver-xtreme' ),
		__( 'Show the allowed HTML tags below comment input box.', 'weaver-xtreme' )
	);

	$opts['hide_comment_bubble'] = weaverx_cz_checkbox(
		__( 'Hide Comment Title Icon', 'weaver-xtreme' ),
		__( 'Hide the comment icon ( bubble ) before the Comments title.', 'weaver-xtreme' )
	);

	$opts['hide_comment_hr'] = weaverx_cz_checkbox(
		__( 'Hide Separator Above Comments', 'weaver-xtreme' ),
		__( 'Hide the &lt;hr> separator line above the Comments area.', 'weaver-xtreme' )
	);

	$opts['visibility-content-comments-note'] = weaverx_cz_heading( __( 'Hiding/Enabling Page and Post Comments', 'weaver-xtreme' ),
		__( 'Controlling "Reply/Leave a Comment" visibility for pages and posts is <strong>not</strong> a theme function. It is controlled by WordPress on the <em>Settings &rarr; Discussion</em> menu.', 'weaver-xtreme' ) );

	return $opts;
}

function weaverx_controls_visibility_postspecific() {
	$opts = array();


	$opts['visibility-posts-metax-heading'] = weaverx_cz_group_title( __( 'Post Meta Info Lines', 'weaver-xtreme' ) );

	$opts['post_info_hide_top'] = weaverx_cz_checkbox(
		__( 'Hide top post meta info line', 'weaver-xtreme' ),
		__( 'Hide entire top info line ( posted on, by ) of post.', 'weaver-xtreme' )
	);

	$opts['post_info_hide_bottom'] = weaverx_cz_checkbox(
		__( 'Hide bottom post meta info line', 'weaver-xtreme' ),
		__( 'Hide entire bottom info line ( posted in, comments ) of post.', 'weaver-xtreme' )
	);

	$opts['show_post_bubble'] = weaverx_cz_checkbox(
		__( 'Show Comment Bubble', 'weaver-xtreme' ),
		__( 'Show comment bubble with link to comments on the post info line.', 'weaver-xtreme' )
	);

	$opts['show_post_avatar'] = weaverx_cz_select(
		__( 'Show Author Avatar', 'weaver-xtreme' ),
		__( 'Show author avatar on the post info line ( also can be set per post with post editor ).', 'weaver-xtreme' ),
		'weaverx_cz_choices_hide', 'hide', 'refresh'
	);

	$opts['visibility-posts-note-meta-heading'] = weaverx_cz_heading( __( 'NOTE:', 'weaver-xtreme' ),
		__( 'Hiding any meta info item will force using Icons instead of text descriptions.', 'weaver-xtreme' ) );

	$opts['post_hide_date'] = weaverx_cz_checkbox(
		__( 'Hide Post Date', 'weaver-xtreme' )
	);

	$opts['post_hide_author'] = weaverx_cz_checkbox(
		__( 'Hide Post Author', 'weaver-xtreme' )
	);

	$opts['post_hide_categories'] = weaverx_cz_checkbox(
		__( 'Hide Post Categories', 'weaver-xtreme' )
	);

	$opts['post_hide_tags'] = weaverx_cz_checkbox(
		__( 'Hide Post Tags', 'weaver-xtreme' )
	);

	$opts['hide_permalink'] = weaverx_cz_checkbox(
		__( 'Hide Permalink', 'weaver-xtreme' )
	);

	$opts['hide_singleton_category'] = weaverx_cz_checkbox(
		__( 'Hide Category if Only One', 'weaver-xtreme' ),
		__( "If there is only one overall category defined ( Uncategorized ), don't show Category of post.", 'weaver-xtreme' )
	);

	$opts['post_hide_single_author'] = weaverx_cz_checkbox(
		__( 'Hide Author for Single Author Site', 'weaver-xtreme' ),
		__( "Hide author information if site has only a single author.", 'weaver-xtreme' )
	);

	$opts['visibility-posts-nav-heading'] = weaverx_cz_group_title( __( 'Post Navigation', 'weaver-xtreme' ) );

	$opts['visibility-posts-misc-heading'] = weaverx_cz_group_title( __( 'Other Post Visibility Options', 'weaver-xtreme' ) );

	$opts['hide_post_format_icon'] = weaverx_cz_checkbox(
		__( 'Hide Post Format Icons', 'weaver-xtreme' ),
		__( 'Hide the icons for posts with Post Format specified.', 'weaver-xtreme' ),
		'plus' );

	$opts['show_comments_closed'] = weaverx_cz_checkbox(
		__( 'Show "Comments are closed"', 'weaver-xtreme' ),
		__( 'If comments are off, and no comments have been made, show the <em>Comments are closed.</em> message.', 'weaver-xtreme' )
	);

	$opts['hide_author_bio'] = weaverx_cz_checkbox(
		__( 'Hide Author Bio', 'weaver-xtreme' ),
		__( 'Hide display of author bio box on Author Archive and Single Post page views.', 'weaver-xtreme' )
	);

	return $opts;
}

function weaverx_controls_visibility_sidebars() {
	$opts = array();

	$opts['visibility-primary-widget-heading'] = weaverx_cz_group_title( __( 'Primary Sidebar', 'weaver-xtreme' ) );

	$opts['primary_hide'] = weaverx_cz_select(
		__( 'Hide Primary Sidebar', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['visibility-secondary-widget-heading'] = weaverx_cz_group_title( __( 'Secondary Sidebar', 'weaver-xtreme' ) );

	$opts['secondary_hide'] = weaverx_cz_select(
		__( 'Hide Secondary Sidebar', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['visibility-top-widget-heading'] = weaverx_cz_group_title( esc_html__( 'Top Widget Areas', 'weaver-xtreme' ),
		esc_html__( 'Properties for all Top Widget areas (Sitewide, Pages, Blog, Archive).', 'weaver-xtreme' ) );

	$opts['top_hide'] = weaverx_cz_select(
		__( 'Hide Top Widget Areas', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);


	$opts['visibility-bottom-widget-heading'] = weaverx_cz_group_title( esc_html__( 'Bottom Widget Areas', 'weaver-xtreme' ),
		esc_html__( 'Properties for all Bottom Widget areas (Sitewide, Pages, Blog, Archive).', 'weaver-xtreme' ) );

	$opts['bottom_hide'] = weaverx_cz_select(
		__( 'Hide Bottom Widget Areas', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	return $opts;
}

function weaverx_controls_visibility_footer() {
	$opts = array();

	$opts['footer_hide'] = weaverx_cz_select(
		__( 'Hide Footer Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['footer_sb_hide'] = weaverx_cz_select(
		__( 'Hide Footer Widget Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['footer_html_hide'] = weaverx_cz_select(
		__( 'Hide Footer HTML Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['_hide_poweredby'] = weaverx_cz_checkbox(
		__( 'Hide Powered By tag', 'weaver-xtreme' ),
		__( 'Hide the WordPress Logo link/notice in the footer. &diams;', 'weaver-xtreme' )
	);

	return $opts;
}

function weaverx_controls_visibility_basic() {

	// needs refactoring to new control coding style

	return array(

		'vis-beginner-heading' => weaverx_cz_heading( esc_html__( 'Full and Standard Visibility', 'weaver-xtreme' ),
			esc_html__( 'With the Full and Standard Level Interface Levels, you can define control visibility for many other items.', 'weaver-xtreme' ) ),

		'm_primary_hide'     => weaverx_cz_select(
			__( 'Hide Primary Menu', 'weaver-xtreme' ),
			'',
			'weaverx_cz_choices_hide', 'hide-none', 'refresh'
		),
		'm_header_mini_hide' => weaverx_cz_select(
			__( 'Hide Header Mini Menu', 'weaver-xtreme' ),
			'',
			'weaverx_cz_choices_hide', 'hide-none', 'refresh'
		),
		'infobar_hide'       => weaverx_cz_select(
			__( 'Hide Info Bar', 'weaver-xtreme' ),
			'',
			'weaverx_cz_choices_hide', 'hide-none', 'refresh'
		),
		'primary_hide'       => weaverx_cz_select(
			__( 'Hide Primary Widget Area', 'weaver-xtreme' ),
			'',
			'weaverx_cz_choices_hide', 'hide-none', 'refresh'
		),
		'secondary_hide'     => weaverx_cz_select(
			__( 'Hide Secondary Widget Area', 'weaver-xtreme' ),
			'',
			'weaverx_cz_choices_hide', 'hide-none', 'refresh'
		),
		'top_hide'           => weaverx_cz_select(
			__( 'Hide Top Widget Areas', 'weaver-xtreme' ),
			'',
			'weaverx_cz_choices_hide', 'hide-none', 'refresh'
		),
		'bottom_hide'        => weaverx_cz_select(
			__( 'Hide Bottom Widget Areas', 'weaver-xtreme' ),
			'',
			'weaverx_cz_choices_hide', 'hide-none', 'refresh'
		),
		'header_hide'        => weaverx_cz_select(
			__( 'Hide Header Area', 'weaver-xtreme' ),
			'',
			'weaverx_cz_choices_hide', 'hide-none', 'refresh'
		),
		'footer_hide'        => weaverx_cz_select(
			__( 'Hide Footer Area', 'weaver-xtreme' ),
			'',
			'weaverx_cz_choices_hide', 'hide-none', 'refresh'
		),
	);
}

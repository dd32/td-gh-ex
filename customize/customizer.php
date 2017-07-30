<?php
/**
 * Customizer functionality
 *
 * @package ariel
 */

/**
 * Register customizer
 *
 * This function is attached to 'customize_register' action hook.
 *
 * @param WP_Customize_Manager $wp_customize The Customizer object.
 */
function ariel_customizer_panels_sections( $wp_customize ) {
	/**
	 * Failsafe is safe
	 */
	if ( ! isset( $wp_customize ) ) {
		return;
	}
	// Remove and modify core controls and sections
	$wp_customize->remove_control( 'header_textcolor' );
	$wp_customize->get_section( 'colors' )->priority = 75;

	// ariel_section_general_settings
	$wp_customize->add_section( 'ariel_section_theme_info', array(
		'title'       => esc_html__( 'Ariel Pro - Info', 'ariel' ),
		'priority'    => 0
	) );

	// ariel_section_general_settings
	$wp_customize->add_section( 'ariel_section_general_settings', array(
		'title'       => esc_html__( 'General Settings', 'ariel' ),
		'priority'    => 10
	) );

	// ariel_panel_frontpage
	$wp_customize->add_panel( 'ariel_panel_frontpage', array(
		'priority'    => 61,
		'title'       => esc_html__( 'Front Page', 'ariel' ),
	) );
	$wp_customize->add_section( 'ariel_section_frontpage_banner', array(
		'title'       => esc_html__( 'Banner / Slider', 'ariel' ),
		'priority'    => 61,
		'panel'       => 'ariel_panel_frontpage',
	) );
	$wp_customize->add_section( 'ariel_section_frontpage_featured_posts', array(
		'title'       => esc_html__( 'Featured Posts', 'ariel' ),
		'priority'    => 62,
		'panel'       => 'ariel_panel_frontpage',
	) );

	// ariel_section_blog_feed
	$wp_customize->add_section( 'ariel_section_blog_feed', array(
		'title'       => esc_html__( 'Blog Feed', 'ariel' ),
		'priority'    => 70
	) );

	// ariel_section_posts
	$wp_customize->add_section( 'ariel_section_posts', array(
		'title'       => esc_html__( 'Posts', 'ariel' ),
		'priority'    => 71,
	) );

	// ariel_section_pages
	$wp_customize->add_section( 'ariel_section_pages', array(
		'title'       => esc_html__( 'Pages', 'ariel' ),
		'priority'    => 72,
	) );

	/**
	 * Selective refresh for customizer preview
	 */
	if ( isset( $wp_customize->selective_refresh ) ) {
		/**
		 * Make sure we see the change between image and text in customizer preview
		 * on selective refresh
		 */
		$wp_customize->selective_refresh->add_partial( 'custom_logo', array(
			'selector'            => '.header-logo-title',
			'container_inclusive' => false,
			'render_callback'     => 'ariel_selective_refresh_custom_logo_title',
		) );
	}
}
add_action( 'customize_register', 'ariel_customizer_panels_sections', 11 );
/**
 * Enqueue custom styles for Kirki customizer
 * This function is attached to 'customize_controls_enqueue_scripts' action hook
 */
function ariel_custom_customize_enqueue() {
	wp_enqueue_style( 'ariel-customizer', get_template_directory_uri() . '/customize/style.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'ariel_custom_customize_enqueue' );

/**
 * Extend Kirki fields
 *
 * This function is attached to 'kirki/fields' filter hook.
 *
 * @param WP_Customize_Manager $fields The Customizer object.
 */
function ariel_customizer_fields( $fields ) {

	global $ariel_defaults;

	#ariel_section_theme_info
	#-----------------------------------------

	$fields[] = array(
		'type'        => 'custom',
		'settings'    => 'ariel_theme_info',
		'label'       => esc_html__( 'Ariel Pro', 'ariel' ),
		'description' => __( '
        <h3>Demo Site</h3>
        <p>Head on over to the <a href="http://www.lyrathemes.com/preview/?theme=ariel-pro" target="_blank">Ariel Pro demo</a> to see what you can accomplish with this theme!</p>
        <h3>Documentation</h3>
        <p>Detailed information on theme setup and customization.</p>
        <p><a class="button" href="https://www.lyrathemes.com/documentation/ariel-pro.pdf" target="_blank">Ariel Pro Documentation</a></p>
        <h3>One Click Demo Import</h3>
        <p>You can import the demo data by installing the <a href="https://wordpress.org/plugins/one-click-demo-import/" target="_blank">One Click Demo Data</a> plugin, and then going to Appearance > Import Demo Data.</p>
        <h3>Sample Data</h3>
        <p>Alternatively, you can manually install the content and settings shown on our demo site by importing this sample data.</p>
        <p><a class="button" href="https://www.lyrathemes.com/sample-data/ariel-pro-sample-data.zip" target="_blank">Ariel Pro Sample Data</a></p>
        <h3>Feedback and Support</h3>
        <p>For feedback and support, please contact us and we would be happy to assist!</p>
        <p><a class="button" href="https://www.lyrathemes.com/support" target="_blank">Ariel Pro Support</a></p>
        ', 'ariel' ),
        'section'     => 'ariel_section_theme_info',
        'priority'    => 1,
    );

	#ariel_section_general_settings
	#-----------------------------------------

	$fields[] = array(
		'type'        => 'textarea',
		'settings'    => 'ariel_footer_copyright',
		'label'       => esc_html__( 'Copyright Text', 'ariel' ),
		'description' => esc_html__( 'Accepts HTML.', 'ariel' ),
		'section'     => 'ariel_section_general_settings',
		'priority'    => 1,
		'default'     => $ariel_defaults['ariel_footer_copyright'],
		'sanitize_callback' => 'force_balance_tags',
	);

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'ariel_example_content',
		'label'       => esc_html__( 'Show Example Content?', 'ariel' ),
		'description' => esc_html__( 'Turning this off will disable all default/sample images for posts. It will also hide all default widgets in the Default Sidebar.', 'ariel' ),
		'section'     => 'ariel_section_general_settings',
		'priority'    => 2,
		'default'     => $ariel_defaults['ariel_example_content']
	);

	$fields[] = array(
		'type'        => 'custom',
		'settings'    => 'ariel_section_general_sep1',
		'label'       => '<hr />',
		'section'     => 'ariel_section_general_settings',
		'priority'    => 4
	);

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'ariel_author_box_show',
		'label'       => esc_html__( 'Show Author Box?', 'ariel' ),
		'description' => esc_html__( 'The author info box is shown on sticky posts, the first large post in the Full blog feed format, and the post pages.', 'ariel' ),
		'section'     => 'ariel_section_general_settings',
		'priority'    => 5,
		'default'     => $ariel_defaults['ariel_author_box_show']
	);

	$fields[] = array(
		'type'        => 'repeater',
		'settings'    => 'ariel_author_social_links',
		'label'       => esc_html__( 'Author\'s Social Media', 'ariel' ),
		'description' => esc_html__( 'Add links to your social media profiles.', 'ariel' ),
		'section'     => 'ariel_section_general_settings',
		'priority'    => 6,
		'row_label' => array(
			'type' => 'field',
			'value' => esc_attr__( 'Profile', 'ariel' ),
			'field' => 'social_network'
		),
		'fields' => array(
			'social_network' => array(
				'type'        => 'select',
				'label'       => esc_attr__( 'Network name', 'ariel' ),
				'default'     => $ariel_defaults['ariel_author_social_links']['social_network'],
				'choices'     => array(
					'facebook'   => esc_html__( 'Facebook', 'ariel' ),
					'twitter'    => esc_html__( 'Twitter', 'ariel' ),
					'instagram'  => esc_html__( 'Instagram', 'ariel' ),
					'pinterest'  => esc_html__( 'Pinterest', 'ariel' ),
					'youtube'    => esc_html__( 'YouTube', 'ariel' ),
					'google-plus'=> esc_html__( 'Google +', 'ariel' ),
					'linkedin'   => esc_html__( 'LinkedIn', 'ariel' ),
					'snapchat'   => esc_html__( 'Snapchat', 'ariel' ),
					'vimeo'      => esc_html__( 'Vimeo', 'ariel' ),
					'whatsapp'   => esc_html__( 'Whatsapp', 'ariel' ),
					'envelope'   => esc_html__( 'Email', 'ariel' )
				)
			),
			'social_url' => array(
				'type'        => 'text',
				'label'       => esc_attr__( 'Profile URL', 'ariel' ),
				'default'     => $ariel_defaults['ariel_author_social_links']['social_url']
			),
		),
		'active_callback'  => array(
			array(
				'setting'  => 'ariel_author_box_show',
				'operator' => '==',
				'value'    => '1',
			),
		),
	);

	#title_tagline
	#-----------------------------------------

	$fields[] = array(
		'type'        => 'switch',
		'settings'    => 'ariel_image_logo_show',
		'label'       => esc_html__( 'Show Image Logo?', 'ariel' ),
		'description' => esc_html__( 'Choose whether to display the image logo.', 'ariel' ),
		'section'     => 'title_tagline',
		'priority'    => 1,
		'default'     => $ariel_defaults['ariel_image_logo_show'],
		'choices'     => array( 'on'  => esc_attr__( 'SHOW', 'ariel' ), 'off' => esc_attr__( 'HIDE', 'ariel' ) ),
	);
	$fields[] = array(
		'type'        => 'text',
		'settings'    => 'ariel_text_logo',
		'label'       => esc_html__( 'Text Logo', 'ariel' ),
		'description' => esc_html__( 'Displayed when `Show Image Logo?` is set to `Show` or if there is no logo image uploaded.', 'ariel' ),
		'section'     => 'title_tagline',
		'priority'    => 2,
		'default'     => $ariel_defaults['ariel_text_logo'],
		// 'active_callback'  => array( array( 'setting'  => 'ariel_image_logo_show', 'operator' => '==', 'value'    => '0' ) ),
		'sanitize_callback'=> 'sanitize_text_field'
	);

	$fields[] = array(
		'type'        => 'custom',
		'settings'    => 'ariel_text_logo_sep1',
		'label'       => '<hr />',
		'section'     => 'title_tagline',
		'priority'    => 3
	);

	#header_image
	#-----------------------------------------

	$fields[] = array(
		'type'        => 'text',
		'settings'    => 'ariel_banner_heading',
		'label'       => esc_html__( 'Caption Heading', 'ariel' ),
		'section'     => 'header_image',
		'priority'    => 10,
		'default'     => $ariel_defaults['ariel_banner_heading'],
		'sanitize_callback' => 'sanitize_text_field',
	);
	$fields[] = array(
		'type'        => 'textarea',
		'settings'    => 'ariel_banner_description',
		'label'       => esc_html__( 'Caption Description', 'ariel' ),
		'section'     => 'header_image',
		'priority'    => 11,
		'default'     => $ariel_defaults['ariel_banner_description'],
		'sanitize_callback' => 'force_balance_tags'
	);
	$fields[] = array(
		'type'        => 'text',
		'settings'    => 'ariel_banner_url',
		'label'       => esc_html__( 'Caption URL', 'ariel' ),
		'section'     => 'header_image',
		'priority'    => 12,
		'default'     => $ariel_defaults['ariel_banner_url'],
		'sanitize_callback' => 'sanitize_text_field',
	);

	#ariel_section_frontpage_banner
	#-----------------------------------------

	$fields[] = array(
		'type'        => 'radio',
		'settings'    => 'ariel_frontpage_banner',
		'label'       => esc_html__( 'Frontpage Banner / Slider', 'ariel' ),
		'section'     => 'ariel_section_frontpage_banner',
		'priority'    => 1,
		'default'     => $ariel_defaults['ariel_frontpage_banner'],
		'choices'     => array(
			'Banner'   => array(
				esc_attr__( 'Banner', 'ariel' ),
				esc_attr__( 'Shows a banner with an optional caption. Set up the banner and the caption under `Header Image`.', 'ariel' ),
			),
			'Posts' => array(
				esc_attr__( 'Posts Slider', 'ariel' ),
				esc_attr__( 'Select a category to show posts from in the slider. When you select this a new section will appear here with more options.', 'ariel' ),
			),
		),
	);

	$fields[] = array(
		'type'        => 'custom',
		'settings'    => 'ariel_frontpage_posts_slider_type_sep',
		'label'       => '<hr />',
		'section'     => 'ariel_section_frontpage_banner',
		'priority'    => 2,
		'active_callback'  => array(
			array(
				'setting'  => 'ariel_frontpage_banner',
				'operator' => 'contains',
				'value'    => 'Posts',
			),
		),
	);

	$fields[] = array(
		'type'        => 'radio',
		'settings'    => 'ariel_frontpage_slider_type',
		'label'       => esc_html__( 'Frontpage Slider Type', 'ariel' ),
		'section'     => 'ariel_section_frontpage_banner',
		'priority'    => 3,
		'default'     => $ariel_defaults['ariel_frontpage_slider_type'],
		'choices'     => array(
			'Default'   => array(
				esc_attr__( 'Default', 'ariel' ),
			),
			'Thumbnails' => array(
				esc_attr__( 'With Thumbnails', 'ariel' ),
			),
		),
		'active_callback'  => array(
			array(
				'setting'  => 'ariel_frontpage_banner',
				'operator' => 'contains',
				'value'    => 'Posts',
			),
		),
	);

	$fields[] = array(
		'type'        => 'custom',
		'settings'    => 'ariel_frontpage_posts_slider_desc',
		'label'       => wp_kses_post(__( '<hr />Posts Slider', 'ariel' )),
		'description' => esc_html__( 'Select a category to show posts from in the slider. Also enter the number of posts to show from that category.', 'ariel' ),
		'section'     => 'ariel_section_frontpage_banner',
		'priority'    => 4,
		'active_callback'  => array(
			array(
				'setting'  => 'ariel_frontpage_banner',
				'operator' => 'contains',
				'value'    => 'Posts'
			)
		)
	);

	$fields[] = array(
		'type'        => 'select',
		'settings'    => 'ariel_frontpage_posts_slider_category',
		'label'       => esc_html__( 'Posts Slider - Category', 'ariel' ),
		'section'     => 'ariel_section_frontpage_banner',
		'priority'    => 5,
		'default'     => $ariel_defaults['ariel_frontpage_posts_slider_category'],
		'choices'     => Kirki_Helper::get_terms( 'category' ),
		'active_callback'  => array(
			array(
				'setting'  => 'ariel_frontpage_banner',
				'operator' => 'contains',
				'value'    => 'Posts',
			)
		)
	);

	$fields[] = array(
		'type'        => 'select',
		'settings'    => 'ariel_frontpage_posts_slider_number',
		'label'       => esc_html__( 'Posts Slider - Number of Slides/Posts', 'ariel' ),
		'description' => esc_html__( 'There should be at least three posts in the chosen category for the slider to show up.', 'ariel' ),
		'section'     => 'ariel_section_frontpage_banner',
		'priority'    => 6,
		'default'     => $ariel_defaults['ariel_frontpage_posts_slider_number'],
		'choices'     => array('1'=>'1', '2'=>'2', '3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10'),
		'active_callback'  => array(
			array(
				'setting'  => 'ariel_frontpage_banner',
				'operator' => 'contains',
				'value'    => 'Posts'
			)
		)
	);

	$fields[] = array(
		'type'        => 'custom',
		'settings'    => 'ariel_frontpage_custom_slider_sep',
		'label'       => '<hr />',
		'section'     => 'ariel_section_frontpage_banner',
		'priority'    => 7,
		'active_callback'  => array(
			array(
				'setting'  => 'ariel_frontpage_banner',
				'operator' => 'contains',
				'value'    => 'Posts',
			),
		),
	);

	#ariel_section_frontpage_featured_posts
	#-----------------------------------------

	$fields[] = array(
		'type'        => 'switch',
		'settings'    => 'ariel_frontpage_featured_posts_show',
		'label'       => esc_html__( 'Show Featured Posts?', 'ariel' ),
		'description' => esc_html__( 'Choose whether to display the featured posts under the banner/slider.', 'ariel' ),
		'section'     => 'ariel_section_frontpage_featured_posts',
		'priority'    => 1,
		'default'     => $ariel_defaults['ariel_frontpage_featured_posts_show'],
		'choices'     => array( 'on'  => esc_attr__( 'SHOW', 'ariel' ), 'off' => esc_attr__( 'HIDE', 'ariel' ), )
	);
	$fields[] = array(
		'type'        => 'custom',
		'settings'    => 'ariel_frontpage_featured_posts_sep1',
		'label'       => '<hr />',
		'section'     => 'ariel_section_frontpage_featured_posts',
		'priority'    => 2,
		'active_callback'  => array(
			array(
				'setting'  => 'ariel_frontpage_featured_posts_show',
				'operator' => '==',
				'value'    => '1',
			),
		)
	);
	$fields[] = array(
		'type'        => 'text',
		'settings'    => 'ariel_frontpage_featured_posts_heading',
		'label'       => esc_html__( 'Heading', 'ariel' ),
		'section'     => 'ariel_section_frontpage_featured_posts',
		'priority'    => 3,
		'default'     => $ariel_defaults['ariel_frontpage_featured_posts_heading'],
		'active_callback'  => array(
			array(
				'setting'  => 'ariel_frontpage_featured_posts_show',
				'operator' => '==',
				'value'    => '1',
			),
		)
	);
	
	$priority = 4;
	/**
	 * There are 4 selects for posts
	 */
	for ( $i = 1; $i < 5; $i++ ) {

		$fields[] = array(
			'type'        => 'select',
			'settings'    => 'ariel_frontpage_featured_posts_post_' . $i,
			'label'       => sprintf( esc_html__( 'Post %s', 'ariel' ), $i ),
			'section'     => 'ariel_section_frontpage_featured_posts',
			'priority'    => $priority++,
			'default'     => $ariel_defaults['ariel_frontpage_featured_posts_post_' . $i],
			'choices'     => Kirki_Helper::get_posts( array( 'numberposts' => -1 ) ),
			'active_callback'  => array(
				array(
					'setting'  => 'ariel_frontpage_featured_posts_show',
					'operator' => '==',
					'value'    => '1',
				),
			)
		);
	}
	
	/* ariel_section_blog_feed */
	#-----------------------------------------

	$fields[] = array(
		'type'        => 'switch',
		'settings'    => 'ariel_blog_feed_meta_show',
		'label'       => esc_html__( 'Show Meta?', 'ariel' ),
		'description' => esc_html__( 'Choose whether to display date, category, author, tags for posts in the blog feed. This applies to all blog feeds on all pages, including the front page.', 'ariel' ),
		'section'     => 'ariel_section_blog_feed',
		'priority'    => 1,
		'default'     => $ariel_defaults['ariel_blog_feed_meta_show'],
		'choices' => array( 'on'  => esc_attr__( 'SHOW', 'ariel' ), 'off' => esc_attr__( 'HIDE', 'ariel' ), )
	);
	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'ariel_blog_feed_date_show',
		'label'       => esc_html__( 'Show Date?', 'ariel' ),
		'section'     => 'ariel_section_blog_feed',
		'priority'    => 2,
		'default'     => $ariel_defaults['ariel_blog_feed_date_show'],
		'active_callback'  => array(
			array(
				'setting'  => 'ariel_blog_feed_meta_show',
				'operator' => '==',
				'value'    => '1',
			),
		)
	);
	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'ariel_blog_feed_category_show',
		'label'       => esc_html__( 'Show Category?', 'ariel' ),
		'section'     => 'ariel_section_blog_feed',
		'priority'    => 3,
		'default'     => $ariel_defaults['ariel_blog_feed_category_show'],
		'active_callback'  => array(
			array(
				'setting'  => 'ariel_blog_feed_meta_show',
				'operator' => '==',
				'value'    => '1',
			),
		)
	);
	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'ariel_blog_feed_author_show',
		'label'       => esc_html__( 'Show Author?', 'ariel' ),
		'section'     => 'ariel_section_blog_feed',
		'priority'    => 4,
		'default'     => $ariel_defaults['ariel_blog_feed_author_show'],
		'active_callback'  => array(
			array(
				'setting'  => 'ariel_blog_feed_meta_show',
				'operator' => '==',
				'value'    => '1',
			),
		)
	);
	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'ariel_blog_feed_comments_show',
		'label'       => esc_html__( 'Show Comments?', 'ariel' ),
		'section'     => 'ariel_section_blog_feed',
		'priority'    => 5,
		'default'     => $ariel_defaults['ariel_blog_feed_comments_show'],
		'active_callback'  => array(
			array(
				'setting'  => 'ariel_blog_feed_meta_show',
				'operator' => '==',
				'value'    => '1',
			),
		)
	);
	/* $fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'ariel_blog_feed_tag_show',
		'label'       => esc_html__( 'Show Tags?', 'ariel' ),
		'section'     => 'ariel_section_blog_feed',
		'priority'    => 6,
		'default'     => $ariel_defaults['ariel_blog_feed_tag_show'],
		'active_callback'  => array(
			array(
				'setting'  => 'ariel_blog_feed_meta_show',
				'operator' => '==',
				'value'    => '1',
			),
		)
	);*/
	$fields[] = array(
		'type'        => 'custom',
		'settings'    => 'ariel_blog_feed_sep1',
		'label'       => '<hr />',
		'section'     => 'ariel_section_blog_feed',
		'priority'    => 7
	);

	$fields[] = array(
		'type'        => 'text',
		'settings'     => 'ariel_blog_feed_label',
		'label'       => __( 'Heading for Blog Feed on Home Page', 'ariel' ),
		'description' => __( 'The `Recent Posts` label on the home page.', 'ariel' ),
		'section'     => 'ariel_section_blog_feed',
		'priority'    => 8,
		'default'     => $ariel_defaults['ariel_blog_feed_label'],
		'sanitize_callback'=> 'sanitize_text_field'
	);
	
	$fields[] = array(
		'type'        => 'radio',
		'settings'    => 'ariel_blog_feed_post_format',
		'label'       => esc_html__( 'Blog Feed Format', 'ariel' ),
		'section'     => 'ariel_section_blog_feed',
		'priority'    => 10,
		'default'     => $ariel_defaults['ariel_blog_feed_post_format'],
		'choices'     => array(
			'Grid'  => array(
				esc_attr__( 'Grid (Default, 2 Posts in a Row)', 'ariel' ),
			),
			'List' => array(
				esc_attr__( 'List (Image on the Left, Excerpt on the Right)', 'ariel' ),
			),
		),
	);

	/* ariel_section_posts */
	#-----------------------------------------

	$fields[] = array(
		'type'        => 'switch',
		'settings'    => 'ariel_posts_meta_show',
		'label'       => esc_html__( 'Show Meta?', 'ariel' ),
		'description' => esc_html__( 'Choose whether to display date, category, author, tags for posts on the post page.', 'ariel' ),
		'section'     => 'ariel_section_posts',
		'priority'    => 1,
		'default'     => $ariel_defaults['ariel_posts_meta_show'],
		'choices' => array( 'on'  => esc_attr__( 'SHOW', 'ariel' ), 'off' => esc_attr__( 'HIDE', 'ariel' ), )
	);
	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'ariel_posts_date_show',
		'label'       => esc_html__( 'Show Date?', 'ariel' ),
		'section'     => 'ariel_section_posts',
		'priority'    => 2,
		'default'     => $ariel_defaults['ariel_posts_date_show'],
		'active_callback'  => array(
			array(
				'setting'  => 'ariel_posts_meta_show',
				'operator' => '==',
				'value'    => '1',
			),
		)
	);
	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'ariel_posts_category_show',
		'label'       => esc_html__( 'Show Category?', 'ariel' ),
		'section'     => 'ariel_section_posts',
		'priority'    => 3,
		'default'     => $ariel_defaults['ariel_posts_category_show'],
		'active_callback'  => array(
			array(
				'setting'  => 'ariel_posts_meta_show',
				'operator' => '==',
				'value'    => '1',
			),
		)
	);
	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'ariel_posts_author_show',
		'label'       => esc_html__( 'Show Author?', 'ariel' ),
		'section'     => 'ariel_section_posts',
		'priority'    => 4,
		'default'     => $ariel_defaults['ariel_posts_author_show'],
		'active_callback'  => array(
			array(
				'setting'  => 'ariel_posts_meta_show',
				'operator' => '==',
				'value'    => '1',
			),
		)
	);
	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'ariel_posts_comments_show',
		'label'       => esc_html__( 'Show Comments?', 'ariel' ),
		'section'     => 'ariel_section_posts',
		'priority'    => 5,
		'default'     => $ariel_defaults['ariel_posts_comments_show'],
		'active_callback'  => array(
			array(
				'setting'  => 'ariel_posts_meta_show',
				'operator' => '==',
				'value'    => '1',
			),
		)
	);

	$fields[] = array(
		'type'        => 'custom',
		'settings'    => 'ariel_posts_sep1',
		'label'       => '<hr />',
		'section'     => 'ariel_section_posts',
		'priority'    => 7
	);
	$fields[] = array(
		'type'        => 'radio-image',
		'settings'    => 'ariel_posts_sidebar',
		'label'       => esc_html__( 'Layout', 'ariel' ),
		'description' => esc_html__( 'Choose whether to display the sidebar.', 'ariel' ),
		'section'     => 'ariel_section_posts',
		'default'     => $ariel_defaults['ariel_posts_sidebar'],
		'priority'    => 8,
		'choices'     => array( '0' => trailingslashit( get_template_directory_uri() ) . 'customize/images/full.png',
								'1' => trailingslashit( get_template_directory_uri() ) . 'customize/images/sidebar.png', ),
	);
	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'ariel_posts_featured_image_show',
		'label'       => esc_html__( 'Show Featured Image?', 'ariel' ),
		'description' => esc_html__( 'Whether to show featured image at the beginning of the post.', 'ariel' ),
		'section'     => 'ariel_section_posts',
		'priority'    => 9,
		'default'     => $ariel_defaults['ariel_posts_featured_image_show']
	);

	/* ariel_section_pages */
	#-----------------------------------------

	$fields[] = array(
		'type'        => 'radio-image',
		'settings'    => 'ariel_pages_sidebar',
		'label'       => esc_html__( 'Layout', 'ariel' ),
		'description' => esc_html__( 'Choose whether to display the sidebar.', 'ariel' ),
		'section'     => 'ariel_section_pages',
		'default'     => $ariel_defaults['ariel_pages_sidebar'],
		'priority'    => 1,
		'choices'     => array( '0' => trailingslashit( get_template_directory_uri() ) . 'customize/images/full.png',
								'1' => trailingslashit( get_template_directory_uri() ) . 'customize/images/sidebar.png', ),
	);
	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'ariel_pages_featured_image_show',
		'label'       => esc_html__( 'Show Featured Image?', 'ariel' ),
		'description' => esc_html__( 'Whether to show featured image at the beginning of the page.', 'ariel' ),
		'section'     => 'ariel_section_pages',
		'priority'    => 2,
		'default'     => $ariel_defaults['ariel_pages_featured_image_show']
	);

	return $fields;
}

add_filter( 'kirki/fields', 'ariel_customizer_fields' );

/**
 * Selective refresh for custom image/text logo
 *
 * If we have custom logo selected display the image
 * otherwise display custom text logo.
 *
 * @see ariel_customizer_panels_sections()
 *
 * @return string Returns image or heading markup
 */
function ariel_selective_refresh_custom_logo_title() {
	if ( ariel_get_option( 'ariel_image_logo_show' ) ) :
		if ( has_custom_logo() ) :
			the_custom_logo();
		else :
			ariel_site_identity_text();
		endif;
	else :
		ariel_site_identity_text();
	endif;
}
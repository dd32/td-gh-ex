
<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
global $wp_customize;

/**
 * Enable search
 */
$wp_customize->add_control(
	new Epsilon_Control_Toggle(
		$wp_customize,
		'bee_news_enable_menu_search',
		array(
			'type'        => 'epsilon-toggle',
			'label'       => esc_html__( 'Search icon in the menu', 'bee-news' ),
			'description' => esc_html__( 'Toggle the display of the search icon and functionality in the main navigation menu.', 'bee-news' ),
			'section'     => 'bee_news_general_section',
		)
	)
);

/**
 * Enable / Disable sticky menu
 */
$wp_customize->add_control(
	new Epsilon_Control_Toggle(
		$wp_customize,
		'bee_news_enable_sticky_menu',
		array(
			'type'        => 'epsilon-toggle',
			'label'       => esc_html__( 'Sticky Menu', 'bee-news' ),
			'description' => esc_html__( 'Toggling this to on will make the navigation menu stick to the top of header when scrolling.', 'bee-news' ),
			'section'     => 'bee_news_general_section',
		)
	)
);
/**
 * Enable / Disable lazy load
 */

$wp_customize->add_control(
	new Epsilon_Control_Toggle(
		$wp_customize,
		'bee_news_enable_blazy',
		array(
			'label'       => esc_html__( 'Lazyload images', 'bee-news' ),
			'description' => esc_html__( 'Toggle the lazyloading feature on or off.', 'bee-news' ),
			'section'     => 'bee_news_general_section',
		)
	)
);

/**
 * Enable / Disable Go top
 */
$wp_customize->add_control(
	new Epsilon_Control_Toggle(
		$wp_customize,
		'bee_news_enable_go_top',
		array(
			'type'        => 'epsilon-toggle',
			'label'       => esc_html__( 'Go to top button', 'bee-news' ),
			'description' => esc_html__( 'Toggle the display of the go to top button.', 'bee-news' ),
			'section'     => 'bee_news_general_section',
		)
	)
);

/**
 * Footer Column Count
 */
$wp_customize->add_control(
	'bee_news_footer_columns',
	array(
		'type'        => 'radio',
		'choices'     => array(
			1 => esc_html__( 'One Column', 'bee-news' ),
			2 => esc_html__( 'Two Columns', 'bee-news' ),
			3 => esc_html__( 'Three Columns', 'bee-news' ),
			4 => esc_html__( 'Four Columns', 'bee-news' ),
		),
		'label'       => esc_html__( 'Footer Columns', 'bee-news' ),
		'description' => esc_html__( 'Select the number of sidebars you would like to use in the footer. The higher the number, the more widgets you will be able to place here.', 'bee-news' ),
		'section'     => 'bee_news_footer_section',
	)
);

$wp_customize->add_control(
	new Epsilon_Control_Toggle(
		$wp_customize,
		'bee_news_after_footer_enable',
		array(
			'type'    => 'epsilon-toggle',
			'label'   => esc_html__( 'Enable After Footer Section', 'bee-news' ),
			'section' => 'bee_news_footer_section',
		)
	)
);

/**
 * Enable / Disable preloader effect
 */

$wp_customize->add_control(
	new Epsilon_Control_Toggle(
		$wp_customize,
		'bee_news_preloader_effect',
		array(
			'label'       => esc_html__( 'Enable preloader', 'bee-news' ),
			'description' => esc_html__( 'Toggle the preloader functionality.', 'bee-news' ),
			'section'     => 'bee_news_preloader_section',
		)
	)
);

$wp_customize->add_control(
	'bee_news_preloader_effect_text',
	array(
		'label'           => esc_html__( 'Preloader Text', 'bee-news' ),
		'section'         => 'bee_news_preloader_section',
		'active_callback' => 'bee_news_preloader_enabled_callback',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'bee_news_preloader_color',
		array(
			'label'           => esc_html__( 'Preloader accent color', 'bee-news' ),
			'section'         => 'bee_news_preloader_section',
			'settings'        => 'bee_news_preloader_color',
			'active_callback' => 'bee_news_preloader_enabled_callback',
		)
	)
);

$wp_customize->add_control(
	'bee_news_preloader_effect_type',
	array(
		'type'            => 'select',
		'label'           => esc_html__( 'Preloader effect type', 'bee-news' ),
		'section'         => 'bee_news_preloader_section',
		'choices'         => array(
			'fade'  => esc_html__( 'Fade', 'bee-news' ),
			'slide' => esc_html__( 'Slide', 'bee-news' ),
		),
		'active_callback' => 'bee_news_preloader_enabled_callback',
	)
);

/**
 * Copyright enable/disable
 */
$wp_customize->add_control(
	new Epsilon_Control_Toggle(
		$wp_customize,
		'bee_news_enable_copyright',
		array(
			'type'        => 'epsilon-toggle',
			'label'       => esc_html__( 'Copyright Area', 'bee-news' ),
			'description' => esc_html__( 'Toggle the copyright area on or off. By setting it on the off position, you will not be able to display a copyright message in the footer', 'bee-news' ),
			'section'     => 'bee_news_footer_section',
		)
	)
);

/**
 * Copyright content
 */
$wp_customize->add_control(
	'bee_news_copyright_contents',
	array(
		'label'           => esc_html__( 'Copyright Text', 'bee-news' ),
		'section'         => 'bee_news_footer_section',
		'active_callback' => 'bee_news_copyright_enabled_callback',
	)
);

$wp_customize->add_control(
	new Epsilon_Control_Toggle(
		$wp_customize,
		'bee_news_featured_image_in_content',
		array(
			'type'        => 'epsilon-toggle',
			'label'       => esc_html__( 'Thumbnail in content', 'bee-news' ),
			'description' => esc_html__( 'Set this to ON to display the image in the blog post content. Else it will be shown in the header', 'bee-news' ),
			'section'     => 'bee_news_blog_section',
		)
	)
);

$wp_customize->add_control(
	new Epsilon_Control_Toggle(
		$wp_customize,
		'bee_news_enable_author_box',
		array(
			'type'        => 'epsilon-toggle',
			'label'       => esc_html__( 'Posta meta: Author', 'bee-news' ),
			'description' => esc_html__( 'Toggle the display of the author box, at the left side of the post. Will only display if the author has a description defined.', 'bee-news' ),
			'section'     => 'bee_news_blog_section',
		)
	)
);


$wp_customize->add_control(
	new Epsilon_Control_Toggle(
		$wp_customize,
		'bee_news_show_single_post_tags',
		array(
			'type'        => 'epsilon-toggle',
			'label'       => esc_html__( 'Post Meta: Tags', 'bee-news' ),
			'description' => esc_html__( 'This will disable the tags zone at the end of the post.', 'bee-news' ),
			'section'     => 'bee_news_blog_section',
		)
	)
);

$wp_customize->add_control(
	new Epsilon_Control_Slider(
		$wp_customize,
		'bee_news_excerpt_length',
		array(
			'label'       => esc_html__( 'Post excerpt length', 'bee-news' ),
			'description' => esc_html__( 'Minimum is 10, Maximum is 55, Incremented by 5', 'bee-news' ),
			'choices'     => array(
				'min'  => 10,
				'max'  => 55,
				'step' => 5,
			),
			'section'     => 'bee_news_blog_section',
		)
	)
);

/**
 * Enable breadcrumbs on single posts
 */
$wp_customize->add_control(
	new Epsilon_Control_Toggle(
		$wp_customize,
		'bee_news_enable_post_breadcrumbs',
		array(
			'type'        => 'epsilon-toggle',
			'label'       => esc_html__( 'Breadcrumbs', 'bee-news' ),
			'description' => esc_html__( 'Toggle the display of the breadcrumbs. Affects the whole blog - single posts as well as the blog archive.', 'bee-news' ),
			'section'     => 'bee_news_blog_section',
		)
	)
);

$wp_customize->add_control(
	new Epsilon_Control_Typography(
		$wp_customize,
		'bee_news_headings_typography',
		array(
			'label'       => esc_html__( 'Headings', 'bee-news' ),
			'section'     => 'bee_news_typography_headings',
			'description' => esc_html__( 'Note: Current typography controls will only be affecting the blog.', 'bee-news' ),
			'choices'     => array(
				'font-family',
				'font-weight',
				'font-style',
				'letter-spacing',
			),
			'selectors'   => array(
				'.entry-content h1',
				'.entry-content h2',
				'.entry-content h3',
				'.entry-content h4',
				'.entry-content h5',
				'.entry-content h6',
				'.beenews-blog-post-layout .beenews-title h3',
				'.beenews-blog-post-layout .beenews-title h3 a',
			),
			'font_defaults' => array(
				'letter-spacing' => '0',
			),
		)
	)
);

$wp_customize->add_control(
	new Epsilon_Control_Typography(
		$wp_customize,
		'bee_news_paragraphs_typography',
		array(
			'type'        => 'epsilon-typography',
			'label'       => esc_html__( 'Paragraphs', 'bee-news' ),
			'section'     => 'bee_news_typography_paragraph',
			'description' => esc_html__( 'Note: Current typography controls will only be affecting the blog.', 'bee-news' ),
			'choices'     => array(
				'font-family',
				'font-weight',
				'font-style',
				'font-size',
				'line-height',
			),
			'selectors'   => array( '.entry-content p' ),
			'font_defaults' => array(
				'font-size'      => '15',
				'line-height'    => '22',
				'letter-spacing' => '0',
			),
		)
	)
);



/**
 * Active Callback for breadcrumb
 */
function bee_news_breadcrumbs_enabled_callback( $control ) {
	if ( $control->manager->get_setting( 'bee_news_enable_post_breadcrumbs' )->value() == true ) {
		return true;
	}

	return false;
}

/**
 * Active Callback for copyright
 */
function bee_news_copyright_enabled_callback( $control ) {
	if ( $control->manager->get_setting( 'bee_news_enable_copyright' )->value() == true ) {
		return true;
	}

	return false;
}

function bee_news_preloader_enabled_callback( $control ) {
	if ( $control->manager->get_setting( 'bee_news_preloader_effect' )->value() == true ) {
		return true;
	}

	return false;
}

/**
 * Active Callback for copyright
 */
function bee_news_related_posts_enabled_callback( $control ) {
	if ( $control->manager->get_setting( 'bee_news_related_posts_enabled' )->value() == true ) {
		return true;
	}

	return false;
}
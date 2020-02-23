<?php
/**
 * Aileron Theme Customizer
 *
 * @package Aileron
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aileron_customize_register ( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/**
	 * Theme Options Panel
	 */
	$wp_customize->add_panel( 'aileron_theme_options', array(
	    'title'     => esc_html__( 'Theme Options', 'aileron' ),
	    'priority'  => 1,
	) );

	/**
	 * General Options Section
	 */
	$wp_customize->add_section( 'aileron_general_options', array (
		'title'     => esc_html__( 'General Options', 'aileron' ),
		'panel'     => 'aileron_theme_options',
		'priority'  => 10,
		'description' => esc_html__( 'Personalize the settings of your theme.', 'aileron' ),
	) );

	// Read More Label
	$wp_customize->add_setting ( 'aileron_read_more_label', array(
		'default'           => aileron_default( 'aileron_read_more_label' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control ( 'aileron_read_more_label', array(
		'label'    => esc_html__( 'Read More Label', 'aileron' ),
		'section'  => 'aileron_general_options',
		'priority' => 1,
		'type'     => 'text',
	) );

	// Excerpt Length
	$wp_customize->add_setting ( 'aileron_excerpt_length', array(
		'default'           => aileron_default( 'aileron_excerpt_length' ),
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control ( 'aileron_excerpt_length', array(
		'label'    => esc_html__( 'Excerpt Length', 'aileron' ),
		'description' => esc_html__( 'Zero (0) length will not show the excerpt.', 'aileron' ),
		'section'  => 'aileron_general_options',
		'priority' => 2,
		'type'     => 'number',
	) );

	/**
	 * Layout Options Section
	 */
	$wp_customize->add_section( 'aileron_layout_options', array (
		'title'     => esc_html__( 'Layout Options', 'aileron' ),
		'panel'     => 'aileron_theme_options',
		'priority'  => 20,
		'description' => esc_html__( 'Personalize the layout settings of your theme.', 'aileron' ),
	) );

	// Theme Layout
	$wp_customize->add_setting ( 'aileron_theme_layout', array(
		'default'           => aileron_default( 'aileron_theme_layout' ),
		'sanitize_callback' => 'aileron_sanitize_select',
	) );

	$wp_customize->add_control ( 'aileron_theme_layout', array(
		'label'    => esc_html__( 'Theme Layout', 'aileron' ),
		'description' => esc_html__( 'Box layout will be visible at minimum 1200px display', 'aileron' ),
		'section'  => 'aileron_layout_options',
		'priority' => 1,
		'type'     => 'select',
		'choices'  => array(
			'wide' => esc_html__( 'Wide', 'aileron' ),
			'box'  => esc_html__( 'Box',  'aileron' ),
		),
	) );

	// Main Sidebar Position
	$wp_customize->add_setting ( 'aileron_sidebar_position', array (
		'default'           => aileron_default( 'aileron_sidebar_position' ),
		'sanitize_callback' => 'aileron_sanitize_select',
	) );

	$wp_customize->add_control ( 'aileron_sidebar_position', array (
		'label'    => esc_html__( 'Main Sidebar Position', 'aileron' ),
		'section'  => 'aileron_layout_options',
		'priority' => 2,
		'type'     => 'select',
		'choices'  => array(
			'right' => esc_html__( 'Right', 'aileron'),
			'left'  => esc_html__( 'Left',  'aileron'),
		),
	) );

	/**
	 * Archive Content Options Section
	 */
	$wp_customize->add_section( 'aileron_archive_content_options', array (
		'title'     => esc_html__( 'Archive Content Options', 'aileron' ),
		'panel'     => 'aileron_theme_options',
		'priority'  => 30,
		'description' => esc_html__( 'Content settings of blog, archives and search.', 'aileron' ),
	) );

	// Post Details Title
	$wp_customize->add_setting ( 'aileron_archive_co_post_details_title' );

	$wp_customize->add_control(
		new Aileron_Heading_Control(
			$wp_customize,
			'aileron_archive_co_post_details_title',
			array(
				'label'           => esc_html__( 'Post Details', 'aileron' ),
				'section'         => 'aileron_archive_content_options',
				'priority'        => 1,
				'type'            => 'aileron-heading',
			)
		)
	);

	// Post Date Control
	$wp_customize->add_setting ( 'aileron_archive_co_post_date', array (
		'default'           => aileron_default( 'aileron_archive_co_post_date' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'aileron_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'aileron_archive_co_post_date', array (
		'label'           => esc_html__( 'Display Date', 'aileron' ),
		'section'         => 'aileron_archive_content_options',
		'priority'        => 2,
		'type'            => 'checkbox',
	) );

	// Post Categories Control
	$wp_customize->add_setting ( 'aileron_archive_co_post_categories', array (
		'default'           => aileron_default( 'aileron_archive_co_post_categories' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'aileron_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'aileron_archive_co_post_categories', array (
		'label'           => esc_html__( 'Display Categories', 'aileron' ),
		'section'         => 'aileron_archive_content_options',
		'priority'        => 3,
		'type'            => 'checkbox',
	) );

	// Post Author Control
	$wp_customize->add_setting ( 'aileron_archive_co_post_author', array (
		'default'           => aileron_default( 'aileron_archive_co_post_author' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'aileron_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'aileron_archive_co_post_author', array (
		'label'           => esc_html__( 'Display Author', 'aileron' ),
		'section'         => 'aileron_archive_content_options',
		'priority'        => 4,
		'type'            => 'checkbox',
	) );

	// Post Comments Control
	$wp_customize->add_setting ( 'aileron_archive_co_post_comments', array (
		'default'           => aileron_default( 'aileron_archive_co_post_comments' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'aileron_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'aileron_archive_co_post_comments', array (
		'label'           => esc_html__( 'Display Comments', 'aileron' ),
		'section'         => 'aileron_archive_content_options',
		'priority'        => 5,
		'type'            => 'checkbox',
	) );

	// Featured Images Title
	$wp_customize->add_setting ( 'aileron_archive_co_featured_image_title' );

	$wp_customize->add_control(
		new Aileron_Heading_Control(
			$wp_customize,
			'aileron_archive_co_featured_image_title',
			array(
				'label'           => esc_html__( 'Featured Images', 'aileron' ),
				'section'         => 'aileron_archive_content_options',
				'priority'        => 6,
				'type'            => 'aileron-heading',
			)
		)
	);

	// Featured Image Archive Control
	$wp_customize->add_setting ( 'aileron_archive_co_featured_image', array (
		'default'           => aileron_default( 'aileron_archive_co_featured_image' ),
		'sanitize_callback' => 'aileron_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'aileron_archive_co_featured_image', array (
		'label'           => esc_html__( 'Display Featured Image', 'aileron' ),
		'section'         => 'aileron_archive_content_options',
		'priority'        => 7,
		'type'            => 'checkbox',
	) );

	// Archive Details Title
	$wp_customize->add_setting ( 'aileron_archive_co_details_title' );

	$wp_customize->add_control(
		new Aileron_Heading_Control(
			$wp_customize,
			'aileron_archive_co_details_title',
			array(
				'label'           => esc_html__( 'Archive Details', 'aileron' ),
				'section'         => 'aileron_archive_content_options',
				'priority'        => 8,
				'type'            => 'aileron-heading',
			)
		)
	);

	// Archive Title Label Control
	$wp_customize->add_setting ( 'aileron_archive_co_title_label', array (
		'default'           => aileron_default( 'aileron_archive_co_title_label' ),
		'sanitize_callback' => 'aileron_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'aileron_archive_co_title_label', array (
		'label'           => esc_html__( 'Display Archive Title Label (Example: Category, Tag, Author etc)', 'aileron' ),
		'section'         => 'aileron_archive_content_options',
		'priority'        => 9,
		'type'            => 'checkbox',
	) );

	// Post First Category Control
	$wp_customize->add_setting ( 'aileron_archive_co_post_first_category', array (
		'default'           => aileron_default( 'aileron_archive_co_post_first_category' ),
		'sanitize_callback' => 'aileron_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'aileron_archive_co_post_first_category', array (
		'label'           => esc_html__( 'Display Post First Category', 'aileron' ),
		'section'         => 'aileron_archive_content_options',
		'priority'        => 10,
		'type'            => 'checkbox',
	) );

	/**
	 * Single Content Options Section
	 */
	$wp_customize->add_section( 'aileron_single_content_options', array (
		'title'     => esc_html__( 'Single Content Options', 'aileron' ),
		'panel'     => 'aileron_theme_options',
		'priority'  => 40,
		'description' => esc_html__( 'Content settings of single posts or pages.', 'aileron' ),
	) );

	// Post Details Title
	$wp_customize->add_setting ( 'aileron_single_co_post_details_title' );

	$wp_customize->add_control(
		new Aileron_Heading_Control(
			$wp_customize,
			'aileron_single_co_post_details_title',
			array(
				'label'           => esc_html__( 'Post Details', 'aileron' ),
				'section'         => 'aileron_single_content_options',
				'priority'        => 1,
				'type'            => 'aileron-heading',
			)
		)
	);

	// Post Date Control
	$wp_customize->add_setting ( 'aileron_single_co_post_date', array (
		'default'           => aileron_default( 'aileron_single_co_post_date' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'aileron_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'aileron_single_co_post_date', array (
		'label'           => esc_html__( 'Display Date', 'aileron' ),
		'section'         => 'aileron_single_content_options',
		'priority'        => 2,
		'type'            => 'checkbox',
	) );

	// Post Categories Control
	$wp_customize->add_setting ( 'aileron_single_co_post_categories', array (
		'default'           => aileron_default( 'aileron_single_co_post_categories' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'aileron_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'aileron_single_co_post_categories', array (
		'label'           => esc_html__( 'Display Categories', 'aileron' ),
		'section'         => 'aileron_single_content_options',
		'priority'        => 3,
		'type'            => 'checkbox',
	) );

	// Post Tags Control
	$wp_customize->add_setting ( 'aileron_single_co_post_tags', array (
		'default'           => aileron_default( 'aileron_single_co_post_tags' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'aileron_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'aileron_single_co_post_tags', array (
		'label'           => esc_html__( 'Display Tags', 'aileron' ),
		'section'         => 'aileron_single_content_options',
		'priority'        => 4,
		'type'            => 'checkbox',
	) );

	// Post Author Control
	$wp_customize->add_setting ( 'aileron_single_co_post_author', array (
		'default'           => aileron_default( 'aileron_single_co_post_author' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'aileron_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'aileron_single_co_post_author', array (
		'label'           => esc_html__( 'Display Author', 'aileron' ),
		'section'         => 'aileron_single_content_options',
		'priority'        => 5,
		'type'            => 'checkbox',
	) );

	// Featured Images Title
	$wp_customize->add_setting ( 'aileron_single_co_featured_images_title' );

	$wp_customize->add_control(
		new Aileron_Heading_Control(
			$wp_customize,
			'aileron_single_co_featured_images_title',
			array(
				'label'           => esc_html__( 'Featured Images', 'aileron' ),
				'section'         => 'aileron_single_content_options',
				'priority'        => 6,
				'type'            => 'aileron-heading',
			)
		)
	);

	// Featured Image Post Control
	$wp_customize->add_setting ( 'aileron_single_co_featured_image_post', array (
		'default'           => aileron_default( 'aileron_single_co_featured_image_post' ),
		'sanitize_callback' => 'aileron_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'aileron_single_co_featured_image_post', array (
		'label'           => esc_html__( 'Display on Posts', 'aileron' ),
		'section'         => 'aileron_single_content_options',
		'priority'        => 7,
		'type'            => 'checkbox',
	) );

	// Featured Image Page Control
	$wp_customize->add_setting ( 'aileron_single_co_featured_image_page', array (
		'default'           => aileron_default( 'aileron_single_co_featured_image_page' ),
		'sanitize_callback' => 'aileron_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'aileron_single_co_featured_image_page', array (
		'label'           => esc_html__( 'Display on Pages', 'aileron' ),
		'section'         => 'aileron_single_content_options',
		'priority'        => 8,
		'type'            => 'checkbox',
	) );

	// Author Bio Title
	$wp_customize->add_setting ( 'aileron_single_co_author_bio_title' );

	$wp_customize->add_control(
		new Aileron_Heading_Control(
			$wp_customize,
			'aileron_single_co_author_bio_title',
			array(
				'label'           => esc_html__( 'Author Bio', 'aileron' ),
				'section'         => 'aileron_single_content_options',
				'priority'        => 9,
				'type'            => 'aileron-heading',
			)
		)
	);

	// Author Bio Control
	$wp_customize->add_setting ( 'aileron_single_co_author_bio', array (
		'default'           => aileron_default( 'aileron_single_co_author_bio' ),
		'sanitize_callback' => 'aileron_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'aileron_single_co_author_bio', array (
		'label'           => esc_html__( 'Display on posts', 'aileron' ),
		'section'         => 'aileron_single_content_options',
		'priority'        => 10,
		'type'            => 'checkbox',
	) );

	/**
	 * Footer Section
	 */
	$wp_customize->add_section( 'aileron_footer_options', array (
		'title'       => esc_html__( 'Footer Options', 'aileron' ),
		'panel'       => 'aileron_theme_options',
		'priority'    => 50,
		'description' => esc_html__( 'Personalize the footer settings of your theme.', 'aileron' ),
	) );

	// Copyright Control
	$wp_customize->add_setting ( 'aileron_copyright', array (
		'default'           => aileron_default( 'aileron_copyright' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control ( 'aileron_copyright', array (
		'label'    => esc_html__( 'Copyright', 'aileron' ),
		'section'  => 'aileron_footer_options',
		'priority' => 1,
		'type'     => 'textarea',
	) );

	// Credit Control
	$wp_customize->add_setting ( 'aileron_credit', array (
		'default'           => aileron_default( 'aileron_credit' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'aileron_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'aileron_credit', array (
		'label'    => esc_html__( 'Display Designer Credit', 'aileron' ),
		'section'  => 'aileron_footer_options',
		'priority' => 2,
		'type'     => 'checkbox',
	) );

	/**
	 * Theme Support Section
	 */
	$wp_customize->add_section( 'aileron_support_options', array(
		'title'       => esc_html__( 'Support Options', 'aileron' ),
		'description' => esc_html__( 'Thanks for your interest in Aileron.', 'aileron' ),
		'panel'       => 'aileron_theme_options',
		'priority'    => 60,
	) );

	// Theme Documentation
	$wp_customize->add_setting ( 'aileron_theme_documentation', array(
		'default' => '',
	) );

	$wp_customize->add_control(
		new Aileron_Button_Control(
			$wp_customize,
			'aileron_theme_documentation',
			array(
				'label'         => esc_html__( 'Aileron Documentation', 'aileron' ),
				'section'       => 'aileron_support_options',
				'priority'      => 1,
				'type'          => 'aileron-button',
				'button_tag'    => 'a',
				'button_class'  => 'button button-primary',
				'button_href'   => 'https://themecot.com/aileron-theme-documentation/',
				'button_target' => '_blank',
			)
		)
	);

	// Theme Support
	$wp_customize->add_setting ( 'aileron_theme_support', array(
		'default' => '',
	) );

	$wp_customize->add_control(
		new Aileron_Button_Control(
			$wp_customize,
			'aileron_theme_support',
			array(
				'label'         => esc_html__( 'Aileron Support', 'aileron' ),
				'section'       => 'aileron_support_options',
				'priority'      => 2,
				'type'          => 'aileron-button',
				'button_tag'    => 'a',
				'button_class'  => 'button button-primary',
				'button_href'   => 'https://themecot.com/contact/',
				'button_target' => '_blank',
			)
		)
	);

	/**
	 * Theme Review Section
	 */
	$wp_customize->add_section( 'aileron_review_options', array(
		'title'       => esc_html__( 'Enjoying the theme?', 'aileron' ),
		'description' => esc_html__( 'Why not leave us a review on WordPress.org? We\'d really appreciate it!', 'aileron' ),
		'panel'       => 'aileron_theme_options',
		'priority'    => 70,
	) );

	// Theme Review
	$wp_customize->add_setting ( 'aileron_theme_review', array(
		'default' => '',
	) );

	$wp_customize->add_control(
		new Aileron_Button_Control(
			$wp_customize,
			'aileron_theme_review',
			array(
				'label'         => esc_html__( 'Review on WordPress.org', 'aileron' ),
				'section'       => 'aileron_review_options',
				'type'          => 'aileron-button',
				'button_tag'    => 'a',
				'button_class'  => 'button button-primary',
				'button_href'   => 'https://wordpress.org/support/theme/aileron/reviews',
				'button_target' => '_blank',
			)
		)
	);
}
add_action( 'customize_register', 'aileron_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function aileron_customize_preview_js() {
	wp_enqueue_script( 'aileron_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20140120', true );
}
add_action( 'customize_preview_init', 'aileron_customize_preview_js' );

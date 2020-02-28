<?php
/**
 * Keratin Theme Customizer
 *
 * @package Keratin
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function keratin_customize_register ( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/**
	 * Theme Options Panel
	 */
	$wp_customize->add_panel( 'keratin_theme_options', array(
	    'title'     => esc_html__( 'Theme Options', 'keratin' ),
	    'priority'  => 1,
	) );

	/**
	 * General Options Section
	 */
	$wp_customize->add_section( 'keratin_general_options', array (
		'title'     => esc_html__( 'General Options', 'keratin' ),
		'panel'     => 'keratin_theme_options',
		'priority'  => 10,
		'description' => esc_html__( 'Personalize the settings of your theme.', 'keratin' ),
	) );

	// Read More Label
	$wp_customize->add_setting ( 'keratin_read_more_label', array(
		'default'           => keratin_default( 'keratin_read_more_label' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control ( 'keratin_read_more_label', array(
		'label'    => esc_html__( 'Read More Label', 'keratin' ),
		'section'  => 'keratin_general_options',
		'priority' => 1,
		'type'     => 'text',
	) );

	// Excerpt Length
	$wp_customize->add_setting ( 'keratin_excerpt_length', array(
		'default'           => keratin_default( 'keratin_excerpt_length' ),
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control ( 'keratin_excerpt_length', array(
		'label'    => esc_html__( 'Excerpt Length', 'keratin' ),
		'description' => esc_html__( 'Zero (0) length will not show the excerpt.', 'keratin' ),
		'section'  => 'keratin_general_options',
		'priority' => 2,
		'type'     => 'number',
	) );

	/**
	 * Layout Options Section
	 */
	$wp_customize->add_section( 'keratin_layout_options', array (
		'title'     => esc_html__( 'Layout Options', 'keratin' ),
		'panel'     => 'keratin_theme_options',
		'priority'  => 20,
		'description' => esc_html__( 'Personalize the layout settings of your theme.', 'keratin' ),
	) );

	// Theme Layout
	$wp_customize->add_setting ( 'keratin_theme_layout', array(
		'default'           => keratin_default( 'keratin_theme_layout' ),
		'sanitize_callback' => 'keratin_sanitize_select',
	) );

	$wp_customize->add_control ( 'keratin_theme_layout', array(
		'label'    => esc_html__( 'Theme Layout', 'keratin' ),
		'description' => esc_html__( 'Box layout will be visible at minimum 1200px display', 'keratin' ),
		'section'  => 'keratin_layout_options',
		'priority' => 1,
		'type'     => 'select',
		'choices'  => array(
			'wide' => esc_html__( 'Wide', 'keratin' ),
			'box'  => esc_html__( 'Box',  'keratin' ),
		),
	) );

	// Main Sidebar Position
	$wp_customize->add_setting ( 'keratin_sidebar_position', array (
		'default'           => keratin_default( 'keratin_sidebar_position' ),
		'sanitize_callback' => 'keratin_sanitize_select',
	) );

	$wp_customize->add_control ( 'keratin_sidebar_position', array (
		'label'    => esc_html__( 'Main Sidebar Position', 'keratin' ),
		'section'  => 'keratin_layout_options',
		'priority' => 2,
		'type'     => 'select',
		'choices'  => array(
			'right' => esc_html__( 'Right', 'keratin'),
			'left'  => esc_html__( 'Left',  'keratin'),
		),
	) );

	/**
	 * Archive Content Options Section
	 */
	$wp_customize->add_section( 'keratin_archive_content_options', array (
		'title'     => esc_html__( 'Archive Content Options', 'keratin' ),
		'panel'     => 'keratin_theme_options',
		'priority'  => 30,
		'description' => esc_html__( 'Content settings of blog, archives and search.', 'keratin' ),
	) );

	// Post Details Title
	$wp_customize->add_setting ( 'keratin_archive_co_post_details_title' );

	$wp_customize->add_control(
		new Keratin_Heading_Control(
			$wp_customize,
			'keratin_archive_co_post_details_title',
			array(
				'label'           => esc_html__( 'Post Details', 'keratin' ),
				'section'         => 'keratin_archive_content_options',
				'priority'        => 1,
				'type'            => 'keratin-heading',
			)
		)
	);

	// Post Date Control
	$wp_customize->add_setting ( 'keratin_archive_co_post_date', array (
		'default'           => keratin_default( 'keratin_archive_co_post_date' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'keratin_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'keratin_archive_co_post_date', array (
		'label'           => esc_html__( 'Display Date', 'keratin' ),
		'section'         => 'keratin_archive_content_options',
		'priority'        => 2,
		'type'            => 'checkbox',
	) );

	// Post Categories Control
	$wp_customize->add_setting ( 'keratin_archive_co_post_categories', array (
		'default'           => keratin_default( 'keratin_archive_co_post_categories' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'keratin_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'keratin_archive_co_post_categories', array (
		'label'           => esc_html__( 'Display Categories', 'keratin' ),
		'section'         => 'keratin_archive_content_options',
		'priority'        => 3,
		'type'            => 'checkbox',
	) );

	// Post Author Control
	$wp_customize->add_setting ( 'keratin_archive_co_post_author', array (
		'default'           => keratin_default( 'keratin_archive_co_post_author' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'keratin_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'keratin_archive_co_post_author', array (
		'label'           => esc_html__( 'Display Author', 'keratin' ),
		'section'         => 'keratin_archive_content_options',
		'priority'        => 4,
		'type'            => 'checkbox',
	) );

	// Post Comments Control
	$wp_customize->add_setting ( 'keratin_archive_co_post_comments', array (
		'default'           => keratin_default( 'keratin_archive_co_post_comments' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'keratin_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'keratin_archive_co_post_comments', array (
		'label'           => esc_html__( 'Display Comments', 'keratin' ),
		'section'         => 'keratin_archive_content_options',
		'priority'        => 5,
		'type'            => 'checkbox',
	) );

	// Featured Images Title
	$wp_customize->add_setting ( 'keratin_archive_co_featured_image_title' );

	$wp_customize->add_control(
		new Keratin_Heading_Control(
			$wp_customize,
			'keratin_archive_co_featured_image_title',
			array(
				'label'           => esc_html__( 'Featured Images', 'keratin' ),
				'section'         => 'keratin_archive_content_options',
				'priority'        => 6,
				'type'            => 'keratin-heading',
			)
		)
	);

	// Featured Image Archive Control
	$wp_customize->add_setting ( 'keratin_archive_co_featured_image', array (
		'default'           => keratin_default( 'keratin_archive_co_featured_image' ),
		'sanitize_callback' => 'keratin_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'keratin_archive_co_featured_image', array (
		'label'           => esc_html__( 'Display Featured Image', 'keratin' ),
		'section'         => 'keratin_archive_content_options',
		'priority'        => 7,
		'type'            => 'checkbox',
	) );

	// Archive Details Title
	$wp_customize->add_setting ( 'keratin_archive_co_details_title' );

	$wp_customize->add_control(
		new Keratin_Heading_Control(
			$wp_customize,
			'keratin_archive_co_details_title',
			array(
				'label'           => esc_html__( 'Archive Details', 'keratin' ),
				'section'         => 'keratin_archive_content_options',
				'priority'        => 8,
				'type'            => 'keratin-heading',
			)
		)
	);

	// Archive Title Label Control
	$wp_customize->add_setting ( 'keratin_archive_co_title_label', array (
		'default'           => keratin_default( 'keratin_archive_co_title_label' ),
		'sanitize_callback' => 'keratin_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'keratin_archive_co_title_label', array (
		'label'           => esc_html__( 'Display Archive Title Label (Example: Category, Tag, Author etc)', 'keratin' ),
		'section'         => 'keratin_archive_content_options',
		'priority'        => 9,
		'type'            => 'checkbox',
	) );

	// Post First Category Control
	$wp_customize->add_setting ( 'keratin_archive_co_post_first_category', array (
		'default'           => keratin_default( 'keratin_archive_co_post_first_category' ),
		'sanitize_callback' => 'keratin_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'keratin_archive_co_post_first_category', array (
		'label'           => esc_html__( 'Display Post First Category', 'keratin' ),
		'section'         => 'keratin_archive_content_options',
		'priority'        => 10,
		'type'            => 'checkbox',
	) );

	/**
	 * Single Content Options Section
	 */
	$wp_customize->add_section( 'keratin_single_content_options', array (
		'title'     => esc_html__( 'Single Content Options', 'keratin' ),
		'panel'     => 'keratin_theme_options',
		'priority'  => 40,
		'description' => esc_html__( 'Content settings of single posts or pages.', 'keratin' ),
	) );

	// Post Details Title
	$wp_customize->add_setting ( 'keratin_single_co_post_details_title' );

	$wp_customize->add_control(
		new Keratin_Heading_Control(
			$wp_customize,
			'keratin_single_co_post_details_title',
			array(
				'label'           => esc_html__( 'Post Details', 'keratin' ),
				'section'         => 'keratin_single_content_options',
				'priority'        => 1,
				'type'            => 'keratin-heading',
			)
		)
	);

	// Post Date Control
	$wp_customize->add_setting ( 'keratin_single_co_post_date', array (
		'default'           => keratin_default( 'keratin_single_co_post_date' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'keratin_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'keratin_single_co_post_date', array (
		'label'           => esc_html__( 'Display Date', 'keratin' ),
		'section'         => 'keratin_single_content_options',
		'priority'        => 2,
		'type'            => 'checkbox',
	) );

	// Post Categories Control
	$wp_customize->add_setting ( 'keratin_single_co_post_categories', array (
		'default'           => keratin_default( 'keratin_single_co_post_categories' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'keratin_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'keratin_single_co_post_categories', array (
		'label'           => esc_html__( 'Display Categories', 'keratin' ),
		'section'         => 'keratin_single_content_options',
		'priority'        => 3,
		'type'            => 'checkbox',
	) );

	// Post Tags Control
	$wp_customize->add_setting ( 'keratin_single_co_post_tags', array (
		'default'           => keratin_default( 'keratin_single_co_post_tags' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'keratin_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'keratin_single_co_post_tags', array (
		'label'           => esc_html__( 'Display Tags', 'keratin' ),
		'section'         => 'keratin_single_content_options',
		'priority'        => 4,
		'type'            => 'checkbox',
	) );

	// Post Author Control
	$wp_customize->add_setting ( 'keratin_single_co_post_author', array (
		'default'           => keratin_default( 'keratin_single_co_post_author' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'keratin_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'keratin_single_co_post_author', array (
		'label'           => esc_html__( 'Display Author', 'keratin' ),
		'section'         => 'keratin_single_content_options',
		'priority'        => 5,
		'type'            => 'checkbox',
	) );

	// Featured Images Title
	$wp_customize->add_setting ( 'keratin_single_co_featured_images_title' );

	$wp_customize->add_control(
		new Keratin_Heading_Control(
			$wp_customize,
			'keratin_single_co_featured_images_title',
			array(
				'label'           => esc_html__( 'Featured Images', 'keratin' ),
				'section'         => 'keratin_single_content_options',
				'priority'        => 6,
				'type'            => 'keratin-heading',
			)
		)
	);

	// Featured Image Post Control
	$wp_customize->add_setting ( 'keratin_single_co_featured_image_post', array (
		'default'           => keratin_default( 'keratin_single_co_featured_image_post' ),
		'sanitize_callback' => 'keratin_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'keratin_single_co_featured_image_post', array (
		'label'           => esc_html__( 'Display on Posts', 'keratin' ),
		'section'         => 'keratin_single_content_options',
		'priority'        => 7,
		'type'            => 'checkbox',
	) );

	// Featured Image Page Control
	$wp_customize->add_setting ( 'keratin_single_co_featured_image_page', array (
		'default'           => keratin_default( 'keratin_single_co_featured_image_page' ),
		'sanitize_callback' => 'keratin_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'keratin_single_co_featured_image_page', array (
		'label'           => esc_html__( 'Display on Pages', 'keratin' ),
		'section'         => 'keratin_single_content_options',
		'priority'        => 8,
		'type'            => 'checkbox',
	) );

	// Author Bio Title
	$wp_customize->add_setting ( 'keratin_single_co_author_bio_title' );

	$wp_customize->add_control(
		new Keratin_Heading_Control(
			$wp_customize,
			'keratin_single_co_author_bio_title',
			array(
				'label'           => esc_html__( 'Author Bio', 'keratin' ),
				'section'         => 'keratin_single_content_options',
				'priority'        => 9,
				'type'            => 'keratin-heading',
			)
		)
	);

	// Author Bio Control
	$wp_customize->add_setting ( 'keratin_single_co_author_bio', array (
		'default'           => keratin_default( 'keratin_single_co_author_bio' ),
		'sanitize_callback' => 'keratin_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'keratin_single_co_author_bio', array (
		'label'           => esc_html__( 'Display on posts', 'keratin' ),
		'section'         => 'keratin_single_content_options',
		'priority'        => 10,
		'type'            => 'checkbox',
	) );

	/**
	 * Footer Section
	 */
	$wp_customize->add_section( 'keratin_footer_options', array (
		'title'       => esc_html__( 'Footer Options', 'keratin' ),
		'panel'       => 'keratin_theme_options',
		'priority'    => 50,
		'description' => esc_html__( 'Personalize the footer settings of your theme.', 'keratin' ),
	) );

	// Copyright Control
	$wp_customize->add_setting ( 'keratin_copyright', array (
		'default'           => keratin_default( 'keratin_copyright' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control ( 'keratin_copyright', array (
		'label'    => esc_html__( 'Copyright', 'keratin' ),
		'section'  => 'keratin_footer_options',
		'priority' => 1,
		'type'     => 'textarea',
	) );

	// Credit Control
	$wp_customize->add_setting ( 'keratin_credit', array (
		'default'           => keratin_default( 'keratin_credit' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'keratin_sanitize_checkbox',
	) );

	$wp_customize->add_control ( 'keratin_credit', array (
		'label'    => esc_html__( 'Display Designer Credit', 'keratin' ),
		'section'  => 'keratin_footer_options',
		'priority' => 2,
		'type'     => 'checkbox',
	) );

	/**
	 * Theme Support Section
	 */
	$wp_customize->add_section( 'keratin_support_options', array(
		'title'       => esc_html__( 'Support Options', 'keratin' ),
		'description' => esc_html__( 'Thanks for your interest in Keratin.', 'keratin' ),
		'panel'       => 'keratin_theme_options',
		'priority'    => 60,
	) );

	// Theme Documentation
	$wp_customize->add_setting ( 'keratin_theme_documentation', array(
		'default' => '',
	) );

	$wp_customize->add_control(
		new Keratin_Button_Control(
			$wp_customize,
			'keratin_theme_documentation',
			array(
				'label'         => esc_html__( 'Keratin Documentation', 'keratin' ),
				'section'       => 'keratin_support_options',
				'priority'      => 1,
				'type'          => 'keratin-button',
				'button_tag'    => 'a',
				'button_class'  => 'button button-primary',
				'button_href'   => 'https://themecot.com/keratin-theme-documentation/',
				'button_target' => '_blank',
			)
		)
	);

	// Theme Support
	$wp_customize->add_setting ( 'keratin_theme_support', array(
		'default' => '',
	) );

	$wp_customize->add_control(
		new Keratin_Button_Control(
			$wp_customize,
			'keratin_theme_support',
			array(
				'label'         => esc_html__( 'Keratin Support', 'keratin' ),
				'section'       => 'keratin_support_options',
				'priority'      => 2,
				'type'          => 'keratin-button',
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
	$wp_customize->add_section( 'keratin_review_options', array(
		'title'       => esc_html__( 'Enjoying the theme?', 'keratin' ),
		'description' => esc_html__( 'Why not leave us a review on WordPress.org? We\'d really appreciate it!', 'keratin' ),
		'panel'       => 'keratin_theme_options',
		'priority'    => 70,
	) );

	// Theme Review
	$wp_customize->add_setting ( 'keratin_theme_review', array(
		'default' => '',
	) );

	$wp_customize->add_control(
		new Keratin_Button_Control(
			$wp_customize,
			'keratin_theme_review',
			array(
				'label'         => esc_html__( 'Review on WordPress.org', 'keratin' ),
				'section'       => 'keratin_review_options',
				'type'          => 'keratin-button',
				'button_tag'    => 'a',
				'button_class'  => 'button button-primary',
				'button_href'   => 'https://wordpress.org/support/theme/keratin/reviews',
				'button_target' => '_blank',
			)
		)
	);
}
add_action( 'customize_register', 'keratin_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function keratin_customize_preview_js() {
	wp_enqueue_script( 'keratin_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20140120', true );
}
add_action( 'customize_preview_init', 'keratin_customize_preview_js' );

<?php
/**
 * File aeonblog.
 *
 * @package   AeonBlog
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2019, AeonWP
 * @link      https://aeonwp.com/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! function_exists( 'aeonblog_default_theme_options' ) ) :
	/**
	 * AeonBlog Theme Customizer
	 */
	function aeonblog_default_theme_options() {
		$default_theme_options = array(
			'aeonblog-primary-color'     => '#4ea371',
			'aeonblog-light-accent-color' => '#e5f2ee',
			'aeonblog-dark-accent-color' => '#021634',
			'aeonblog-sidebar-options'   => 'right-sidebar',
			'aeonblog-sticky-sidebar'    => 1,
			'aeonblog-read-more-text'    => esc_html__( 'Continue Reading', 'aeonblog' ),
			'aeonblog-blog-meta'         => 1,
			'aeonblog-blog-image'        => 1,
			'aeonblog-blog-full-image'   => 0,
			'aeonblog-blog-excerpt'      => 20,
			'aeonblog-font-url'          => esc_url( '//fonts.googleapis.com/css?family=Open+Sans:300', 'aeonblog' ),
			'aeonblog-font-family'       => esc_html__( 'Open Sans, serif', 'aeonblog' ),
			'aeonblog-font-size'         => 16,
			'aeonblog-font-line-height'  => 2,
			'aeonblog-letter-spacing'    => 0,
			'aeonblog-copyright-text'    => esc_html__( 'All Right Reserved 2019', 'aeonblog' ),
			'aeonblog-go-to-top'         => 1,
			'aeonblog-breadcrumb-option' => 1,
			'aeonblog-pagination-type'   => 'numeric',
			'aeonblog-related-post'      => 1,
            'aeonblog-enable-about'      => 0,
			'aeonblog-about-gravatar'    => 'circle',
		);
		return apply_filters( 'aeonblog_default_theme_options', $default_theme_options );
	}
endif;


if ( ! function_exists( 'aeonblog_get_theme_options' ) ) {
	/**
	 * Get theme options
	 *
	 * @since AeonBlog 1.0.0
	 *
	 * @param null
	 * @return array aeonblog_get_theme_options
	 */
	function aeonblog_get_theme_options() {
		$aeonblog_default_theme_options = aeonblog_default_theme_options();
		$aeonblog_get_theme_options     = get_theme_mod( 'aeonblog_theme_options' );
		if ( is_array( $aeonblog_get_theme_options ) ) {
			return array_merge( $aeonblog_default_theme_options, $aeonblog_get_theme_options );
		} else {
			return $aeonblog_default_theme_options;
		}
	}
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aeonblog_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'aeonblog_customize_partial_blogname',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'aeonblog_customize_partial_blogdescription',
			)
		);
	}

	$default = aeonblog_default_theme_options();
	$wp_customize->add_panel(
		'aeonblog_panel',
		array(
			'priority'   => 10,
			'capability' => 'edit_theme_options',
			'title'      => __( 'AeonBlog Theme Options', 'aeonblog' ),
		)
	);

	/* Primary Color Section Inside Core Color Option */
	$wp_customize->add_setting(
		'aeonblog_theme_options[aeonblog-primary-color]',
		array(
			'default'           => $default['aeonblog-primary-color'],
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'aeonblog_theme_options[aeonblog-primary-color]',
			array(
				'label'       => esc_html__( 'Primary Color', 'aeonblog' ),
				'description' => esc_html__( 'Applied to main color of site.', 'aeonblog' ),
				'section'     => 'colors',
			)
		)
	);

	$wp_customize->add_setting(
		'aeonblog_theme_options[aeonblog-light-accent-color]',
		array(
			'default'           => $default['aeonblog-light-accent-color'],
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'aeonblog_theme_options[aeonblog-light-accent-color]',
			array(
				'label'       => esc_html__( 'Light Accent Color', 'aeonblog' ),
				'description' => esc_html__( 'Applied to navigation.', 'aeonblog' ),
				'section'     => 'colors',
			)
		)
	);

	$wp_customize->add_setting(
		'aeonblog_theme_options[aeonblog-dark-accent-color]',
		array(
			'default'           => $default['aeonblog-dark-accent-color'],
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'aeonblog_theme_options[aeonblog-dark-accent-color]',
			array(
				'label'       => esc_html__( 'Dark Accent Color', 'aeonblog' ),
				'description' => esc_html__( 'Applied to footer and buttons.', 'aeonblog' ),
				'section'     => 'colors',
			)
		)
	);

	/*Blog Page Options*/
	$wp_customize->add_section(
		'aeonblog_blog_section',
		array(
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __( 'Blog Section Options', 'aeonblog' ),
			'panel'          => 'aeonblog_panel',
		)
	);

	/*Sidebar Options*/
	$wp_customize->add_setting(
		'aeonblog_theme_options[aeonblog-sidebar-options]',
		array(
			'capability'        => 'edit_theme_options',
			'default'           => $default['aeonblog-sidebar-options'],
			'sanitize_callback' => 'aeonblog_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'aeonblog_theme_options[aeonblog-sidebar-options]',
		array(
			'choices' => array(
				'right-sidebar'  => __( 'Right Sidebar', 'aeonblog' ),
				'left-sidebar'   => __( 'Left Sidebar', 'aeonblog' ),
				'no-sidebar'     => __( 'No Sidebar', 'aeonblog' ),
				'middle-column'  => __( 'Middle Column', 'aeonblog' ),
			),
			'label'         => __( 'Sidebar Option', 'aeonblog' ),
			'description'   => __( 'You can manage the individual sidebar for single post from Post Template.', 'aeonblog' ),
			'section'       => 'aeonblog_blog_section',
			'settings'      => 'aeonblog_theme_options[aeonblog-sidebar-options]',
			'type'          => 'select',
		)
	);

	/*Read More Text*/
	$wp_customize->add_setting(
		'aeonblog_theme_options[aeonblog-read-more-text]',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => $default['aeonblog-read-more-text'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'aeonblog_theme_options[aeonblog-read-more-text]',
		array(
			'label'       => __( 'Continue Reading Text', 'aeonblog' ),
			'description' => __( 'Enter Your Custom Continue Reading Text. The title will be included after this text.', 'aeonblog' ),
			'section'     => 'aeonblog_blog_section',
			'settings'    => 'aeonblog_theme_options[aeonblog-read-more-text]',
			'type'        => 'text',
		)
	);

	/*Meta Fields*/
	$wp_customize->add_setting(
		'aeonblog_theme_options[aeonblog-blog-meta]',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => $default['aeonblog-blog-meta'],
			'sanitize_callback' => 'aeonblog_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'aeonblog_theme_options[aeonblog-blog-meta]',
		array(
			'label'       => __( 'Meta Options', 'aeonblog' ),
			'description' => __( 'Check to show the date, category, tags etc on blog page.', 'aeonblog' ),
			'section'     => 'aeonblog_blog_section',
			'settings'    => 'aeonblog_theme_options[aeonblog-blog-meta]',
			'type'        => 'checkbox',
		)
	);

	/*Featured Image*/
	$wp_customize->add_setting(
		'aeonblog_theme_options[aeonblog-blog-image]',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => $default['aeonblog-blog-image'],
			'sanitize_callback' => 'aeonblog_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'aeonblog_theme_options[aeonblog-blog-image]',
		array(
			'label'       => __( 'Featured Image', 'aeonblog' ),
			'description' => __( 'Check to show the featured Image.', 'aeonblog' ),
			'section'     => 'aeonblog_blog_section',
			'settings'    => 'aeonblog_theme_options[aeonblog-blog-image]',
			'type'        => 'checkbox',
		)
	);

	/*Full Image*/
	$wp_customize->add_setting(
		'aeonblog_theme_options[aeonblog-blog-full-image]',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => $default['aeonblog-blog-full-image'],
			'sanitize_callback' => 'aeonblog_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'aeonblog_theme_options[aeonblog-blog-full-image]',
		array(
			'label'       => __( 'Large Image', 'aeonblog' ),
			'description' => __( 'Check to make the featured image larger.', 'aeonblog' ),
			'section'     => 'aeonblog_blog_section',
			'settings'    => 'aeonblog_theme_options[aeonblog-blog-full-image]',
			'type'        => 'checkbox',
		)
	);

	/*Excerpt Length*/
	$wp_customize->add_setting(
		'aeonblog_theme_options[aeonblog-blog-excerpt]',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => $default['aeonblog-blog-excerpt'],
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'aeonblog_theme_options[aeonblog-blog-excerpt]',
		array(
			'label'       => __( 'Enter excerpt length', 'aeonblog' ),
			'description' => __( 'Enter the lenght of excerpt.', 'aeonblog' ),
			'section'     => 'aeonblog_blog_section',
			'settings'    => 'aeonblog_theme_options[aeonblog-blog-excerpt]',
			'type'        => 'number',
			'input_attrs' => array(
				'min'     => -1,
				'max'     => 50,
				'step'    => 1,
			),
		)
	);

	/*Enable Sticky Sidebar*/
	$wp_customize->add_setting(
		'aeonblog_theme_options[aeonblog-sticky-sidebar]',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => $default['aeonblog-sticky-sidebar'],
			'sanitize_callback' => 'aeonblog_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'aeonblog_theme_options[aeonblog-sticky-sidebar]',
		array(
			'label'       => __( 'Sticky Sidebar', 'aeonblog' ),
			'description' => __( 'Enable Sidebar Sticky', 'aeonblog' ),
			'section'     => 'aeonblog_blog_section',
			'settings'    => 'aeonblog_theme_options[aeonblog-sticky-sidebar]',
			'type'        => 'checkbox',
		)
	);

	/*Typography Options */
	$wp_customize->add_section(
		'aeonblog_typography_section',
		array(
			'title'    => __( 'Typography Options', 'aeonblog' ),
			'panel'    => 'aeonblog_panel',
		)
	);

	/*Font URL */
	$wp_customize->add_setting(
		'aeonblog_theme_options[aeonblog-font-url]',
		array(
			'default'           => $default['aeonblog-font-url'],
			'transport'         => 'refresh',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'aeonblog_theme_options[aeonblog-font-url]',
		array(
			'label'   => __( 'Google Font URL', 'aeonblog' ),
			'section' => 'aeonblog_typography_section',
			'type'    => 'url',
			'description' => sprintf(
				'%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
				__( 'Insert', 'aeonblog' ),
				esc_url( 'https://www.google.com/fonts' ),
				__( 'Google Font URL', 'aeonblog' ),
				__( 'to add Google Font.', 'aeonblog' )
			),
		)
	);

	/*Font Name */
	$wp_customize->add_setting(
		'aeonblog_theme_options[aeonblog-font-family]',
		array(
			'default'           => $default['aeonblog-font-family'],
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
			'settings'          => 'aeonblog_theme_options[aeonblog-font-url]',
		)
	);

	$wp_customize->add_control(
		'aeonblog_theme_options[aeonblog-font-family]',
		array(
			'label'       => __( 'Font Family', 'aeonblog' ),
			'section'     => 'aeonblog_typography_section',
			'type'        => 'text',
			'description' => __( 'Insert Google Font Family Name.', 'aeonblog' ),
		)
	);

	/*Font Size*/
	$wp_customize->add_setting(
		'aeonblog_theme_options[aeonblog-font-size]',
		array(
			'default'           => $default['aeonblog-font-size'],
			'transport'         => 'refresh',
			'sanitize_callback' => 'aeonblog_sanitize_number',
			'settings'          => 'aeonblog_theme_options[aeonblog-font-size]',
		)
	);

	$wp_customize->add_control(
		'aeonblog_theme_options[aeonblog-font-size]',
		array(
			'label'   => __( 'Font Size', 'aeonblog' ),
			'section' => 'aeonblog_typography_section',
			'type'    => 'number',
			'description' => __( 'Increase/Decrease Font Size.', 'aeonblog' ),
			'input_attrs' => array(
				'min'  => 10,
				'max'  => 30,
				'step' => 1,
			),
		)
	);

	/*Line Height */
	$wp_customize->add_setting(
		'aeonblog_theme_options[aeonblog-font-line-height]',
		array(
			'default'           => $default['aeonblog-font-line-height'],
			'transport'         => 'refresh',
			'sanitize_callback' => 'aeonblog_sanitize_number',
			'settings'          => 'aeonblog_theme_options[aeonblog-font-line-height]',
		)
	);

	$wp_customize->add_control(
		'aeonblog_theme_options[aeonblog-font-line-height]',
		array(
			'label'       => __( 'Line Height', 'aeonblog' ),
			'section'     => 'aeonblog_typography_section',
			'type'        => 'number',
			'description' => __( 'Increase/Decrease Line Height.', 'aeonblog' ),
			'input_attrs' => array(
				'min'     => '0',
				'max'     => '4',
				'step'    => '0.1',
			),
		)
	);

	/*Letter Spacing */
	$wp_customize->add_setting(
		'aeonblog_theme_options[aeonblog-letter-spacing]',
		array(
			'default'           => $default['aeonblog-letter-spacing'],
			'transport'         => 'refresh',
			'sanitize_callback' => 'aeonblog_sanitize_number',
			'settings'          => 'aeonblog_theme_options[aeonblog-font-line-height]',
		)
	);

	$wp_customize->add_control(
		'aeonblog_theme_options[aeonblog-letter-spacing]',
		array(
			'label'       => __( 'Letter Space', 'aeonblog' ),
			'section'     => 'aeonblog_typography_section',
			'type'        => 'number',
			'description' => __( 'Increase/Decrease Letter Space.', 'aeonblog' ),
			'input_attrs' => array(
				'min'     => '-20',
				'max'     => '4',
				'step'    => '1',
			),
		)
	);

	/*Footer*/
	$wp_customize->add_section(
		'aeonblog_footer_section',
		array(
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __( 'Footer Options', 'aeonblog' ),
			'panel'          => 'aeonblog_panel',
		)
	);

	/*Copyright Text*/
	$wp_customize->add_setting(
		'aeonblog_theme_options[aeonblog-copyright-text]',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => $default['aeonblog-copyright-text'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'aeonblog_theme_options[aeonblog-copyright-text]',
		array(
			'label'       => __( 'Copyright Text', 'aeonblog' ),
			'description' => __( 'Enter your own copyright Text.', 'aeonblog' ),
			'section'     => 'aeonblog_footer_section',
			'settings'  => 'aeonblog_theme_options[aeonblog-copyright-text]',
			'type'      => 'text',
		)
	);

	/*Go to Top*/
	$wp_customize->add_setting(
		'aeonblog_theme_options[aeonblog-go-to-top]',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => $default['aeonblog-go-to-top'],
			'sanitize_callback' => 'aeonblog_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'aeonblog_theme_options[aeonblog-go-to-top]',
		array(
			'label'       => __( 'Go To Top', 'aeonblog' ),
			'description' => __( 'Enable/Disable go to top on footer.', 'aeonblog' ),
			'section'     => 'aeonblog_footer_section',
			'settings'    => 'aeonblog_theme_options[aeonblog-go-to-top]',
			'type'        => 'checkbox',
		)
	);

	/*Extras*/
	$wp_customize->add_section(
		'aeonblog_extra_section',
		array(
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __( 'Extra Options', 'aeonblog' ),
			'panel'          => 'aeonblog_panel',
		)
	);

	/*Breadcrumb Options*/
	$wp_customize->add_setting(
		'aeonblog_theme_options[aeonblog-breadcrumb-option]',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => $default['aeonblog-breadcrumb-option'],
			'sanitize_callback' => 'aeonblog_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'aeonblog_theme_options[aeonblog-breadcrumb-option]',
		array(
			'label'     => __( 'Breadcrumb Option', 'aeonblog' ),
			'description' => __( 'Show hide breadcrumb.', 'aeonblog' ),
			'section'   => 'aeonblog_extra_section',
			'settings'  => 'aeonblog_theme_options[aeonblog-breadcrumb-option]',
			'type'      => 'checkbox',
		)
	);

	/*Pagination Options*/
	$wp_customize->add_setting(
		'aeonblog_theme_options[aeonblog-pagination-type]',
		array(
			'capability'        => 'edit_theme_options',
			'default'           => $default['aeonblog-pagination-type'],
			'sanitize_callback' => 'aeonblog_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'aeonblog_theme_options[aeonblog-pagination-type]',
		array(
			'choices' => array(
				'default' => __( 'Default Pagination', 'aeonblog' ),
				'numeric' => __( 'Numeric', 'aeonblog' ),
			),
			'label'       => __( 'Pagination Option', 'aeonblog' ),
			'description' => __( 'Select the Required Pagination Type.', 'aeonblog' ),
			'section'     => 'aeonblog_extra_section',
			'settings'    => 'aeonblog_theme_options[aeonblog-pagination-type]',
			'type'        => 'select',
		)
	);

	/*Related Post Options*/
	$wp_customize->add_setting(
		'aeonblog_theme_options[aeonblog-related-post]',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => $default['aeonblog-related-post'],
			'sanitize_callback' => 'aeonblog_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'aeonblog_theme_options[aeonblog-related-post]',
		array(
			'label'       => __( 'Related Posts', 'aeonblog' ),
			'description' => __( 'Enable Related Posts below the post content.', 'aeonblog' ),
			'section'     => 'aeonblog_extra_section',
			'settings'    => 'aeonblog_theme_options[aeonblog-related-post]',
			'type'        => 'checkbox',
		)
	);

	require get_template_directory() . '/inc/customizer-about.php';
}
add_action( 'customize_register', 'aeonblog_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function aeonblog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function aeonblog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function aeonblog_customize_preview_js() {
	wp_enqueue_script( 'aeonblog-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'aeonblog_customize_preview_js' );

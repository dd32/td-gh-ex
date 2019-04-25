<?php
/**
 * Acuarela customization
 *
 * @package Acuarela
 * @since Acuarela 1.0
 */

/**
 * Implement Customizer additions and adjustments.
 *
 * @since Acuarela 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function acuarela_customize_register( $wp_customize ) {

	$blog_navigation_array = array(
		'navigation' => __( 'Navigation', 'acuarela' ),
		'pagination' => __( 'Pagination', 'acuarela' ),
	);

	$google_fonts_headings = array(
		'Arima Madurai' => __( 'Arima Madurai', 'acuarela' ),
		'Cinzel Decorative' => __( 'Cinzel Decorative', 'acuarela' ),
	);

	$google_fonts_text = array(
		'Lato' => __( 'Lato', 'acuarela' ),
		'Open Sans' => __( 'Open Sans', 'acuarela' ),
		'Source Sans Pro' => __( 'Source Sans Pro', 'acuarela' ),
	);

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title',
		'render_callback' => 'acuarela_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'acuarela_customize_partial_blogdescription',
	) );

	// =============================
	// ==     Header Settings     ==
	// =============================
	// Remove the control for displaying or not the header text.
	// Adds the posibility of displaying the site title and tagline separately.
	$wp_customize->remove_control( 'display_header_text' );

	// ===============================
	$wp_customize->add_setting( 'acuarela_theme_options[show_site_title]', array(
		'default'           => 1,
		'sanitize_callback' => 'absint',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));

	$wp_customize->add_control( 'show_site_title', array(
		'label'    => __( 'Display Site Title', 'acuarela' ),
		'section'  => 'title_tagline',
		'settings' => 'acuarela_theme_options[show_site_title]',
		'type' => 'checkbox',
	));
	// ===============================
	$wp_customize->add_setting( 'acuarela_theme_options[show_site_description]', array(
		'default'        => 1,
		'sanitize_callback' => 'absint',
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
	));

	$wp_customize->add_control( 'show_site_description', array(
		'label'      => __( 'Display Tagline', 'acuarela' ),
		'section'    => 'title_tagline',
		'settings'   => 'acuarela_theme_options[show_site_description]',
		'type' => 'checkbox',
	));

	// ==============================
	// ==   Acuarela Custom Settings    ==
	// ==============================
	$wp_customize->add_section( 'theme_settings', array(
		'title'			=> __( 'Theme Settings', 'acuarela' ),
		'description'	=> __( 'In this section you can choose the options to customize your site.', 'acuarela' ),
		'priority'		=> 115,
	) );

	// ===============================
	$wp_customize->add_setting( 'acuarela_theme_options[blog_navigation]', array(
		'sanitize_callback' => 'acuarela_sanitize_blog_nav',
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
		'default'        => 'navigation',
	));

	$wp_customize->add_control( 'blog_navigation', array(
		'settings'	=> 'acuarela_theme_options[blog_navigation]',
		'label'		=> __( 'Choose your preferred mode of navigating between old and new articles in multiple view pages','acuarela' ),
		'section'	=> 'theme_settings',
		'type'		=> 'radio',
		'choices'	=> $blog_navigation_array,
	));

	// ===============================
	$wp_customize->add_setting( 'acuarela_theme_options[headings_font]', array(
		'sanitize_callback' => 'acuarela_sanitize_font_style',
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
		'default'        => 'Arima Madurai',
	));

	$wp_customize->add_control( 'headings_font', array(
		'settings'	=> 'acuarela_theme_options[headings_font]',
		'label'		=> __( 'Choose the headings font','acuarela' ),
		'section'	=> 'theme_settings',
		'type'		=> 'select',
		'choices'	=> $google_fonts_headings,
	));

	// ===============================
	$wp_customize->add_setting( 'acuarela_theme_options[text_font]', array(
		'sanitize_callback' => 'acuarela_sanitize_font_style',
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
		'default'        => 'Lato',
	));

	$wp_customize->add_control( 'text_font', array(
		'settings'	=> 'acuarela_theme_options[text_font]',
		'label'		=> __( 'Choose the text font','acuarela' ),
		'section'	=> 'theme_settings',
		'type'		=> 'select',
		'choices'	=> $google_fonts_text,
	));

}
add_action( 'customize_register', 'acuarela_customize_register' );

/**
* Theme's Custom Styling
*/

function acuarela_theme_custom_styling() {
	$acuarela_theme_options = acuarela_get_options( 'acuarela_theme_options' );

	$headings_font = $acuarela_theme_options['headings_font'];
	$text_font = $acuarela_theme_options['text_font'];

	$css = '';

	if ( $headings_font ) :
		$css .= '.site-title, .entry-title, .post-title, .widget-title, .posts-navigation .nav-links { font-family: ' . $headings_font . '}' . "\n";
	endif;

	if ( $text_font ) :
		$css .= ' body { font-family: ' . $text_font . '}' . "\n";
	endif;

	// CSS styles
	if ( isset( $css ) && $css !== '' ) :
		$css = strip_tags( $css );
		$css = "<!--Custom Styling-->\n<style media=\"screen\" type=\"text/css\">\n" . esc_html($css) . "</style>\n";
		echo $css;
	endif;

}
add_action( 'wp_head','acuarela_theme_custom_styling' );

/**
 * Sanitisation of the navigation choice.
 *
 * @since Acuarela 1.0
 *
 * @param string $value Value of the navigation choice.
 * @return string Sanitised value of the navigation choice.
 */
function acuarela_sanitize_blog_nav( $value ) {
	$recognized = acuarela_blog_nav();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'acuarela_blog_nav', current( $recognized ) );
}

/**
 * Array of options of the navigation choice.
 *
 * @since Acuarela 1.0
 */
function acuarela_blog_nav() {
	$default = array(
		'navigation' => 'navigation',
		'pagination' => 'pagination',
	);
	return apply_filters( 'acuarela_blog_nav', $default );
}

/**
 * Sanitization of the font style choices.
 *
 * @since Acuarela 1.0
 *
 * @param string $value Value of the font style.
 * @return string Sanitised value of the font style choice.
 */
function acuarela_sanitize_font_style( $value ) {
	$recognized = acuarela_font_styles();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'acuarela_font_style', current( $recognized ) );
}

/**
 * Array of font family options.
 *
 * @since Acuarela 1.0
 */
function acuarela_font_styles() {
	$default = array(
		'Arima Madurai' => __( 'Arima Madurai', 'acuarela' ),
		'Cinzel Decorative' => __( 'Cinzel Decorative', 'acuarela' ),
		'Lato' => __( 'Lato', 'acuarela' ),
		'Open Sans' => __( 'Open Sans', 'acuarela' ),
		'Source Sans Pro' => __( 'Source Sans Pro', 'acuarela' ),
		);
	return apply_filters( 'acuarela_font_styles', $default );
}

/**
 * Theme defaults
 */
function acuarela_get_option_defaults() {
	$defaults = array(
		'show_site_title' => 1,
		'show_site_description' => 1,
		'headings_font' => 'Arima Madurai',
		'text_font' => 'Lato',
		'blog_navigation' => 'navigation',
	);
	return apply_filters( 'acuarela_get_option_defaults', $defaults );
}

/**
 * Parse all the theme options in a single array.
 *
 * @since Acuarela 1.0
 */
function acuarela_get_options() {
	// Options API.
	return wp_parse_args(
		get_option( 'acuarela_theme_options', array() ),
		acuarela_get_option_defaults()
	);
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Acuarela 1.0
 * @see acuarela_customize_register()
 *
 * @return void
 */
function acuarela_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Acuarela 1.0
 * @see acuarela_customize_register()
 *
 * @return void
 */
function acuarela_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function acuarela_customize_preview_js() {
	wp_enqueue_script( 'acuarela-customize-preview', get_template_directory_uri( '/js/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'acuarela_customize_preview_js' );





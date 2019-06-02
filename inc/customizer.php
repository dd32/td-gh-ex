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
		'Arima Madurai' => 'Arima Madurai',
		'Cinzel Decorative' => 'Cinzel Decorative',
		'Open Sans' => 'Open Sans',
	);

	$google_fonts_text = array(
		'Lato' => 'Lato',
		'Open Sans' => 'Open Sans',
		'Source Sans Pro' => 'Source Sans Pro',
		'Source Serif Pro' => 'Source Serif Pro',
	);

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->get_control( 'header_textcolor' )->priority   = 5;

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
	// Adds the posibility of hiding the site title and tagline separately.
	// ===============================
	$wp_customize->add_setting( 'acuarela_theme_options[hide_site_title]', array(
		'default'			=> 0,
		'sanitize_callback'	=> 'absint',
		'capability'		=> 'edit_theme_options',
		'type'				=> 'option',
	));

	$wp_customize->add_control( 'hide_site_title', array(
		'label'    => __( 'Hide Site Title', 'acuarela' ),
		'settings' => 'acuarela_theme_options[hide_site_title]',
		'section'  => 'title_tagline',
		'priority' => 41,
		'type' => 'checkbox',
	));
	// ===============================
	$wp_customize->add_setting( 'acuarela_theme_options[hide_site_description]', array(
		'default'        => 0,
		'sanitize_callback' => 'absint',
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
	));

	$wp_customize->add_control( 'hide_site_description', array(
		'label'      => __( 'Hide Tagline', 'acuarela' ),
		'section'    => 'title_tagline',
		'settings'   => 'acuarela_theme_options[hide_site_description]',
		'priority' => 42,
		'type' => 'checkbox',
	));

	//===============================
	$wp_customize->add_setting( 'acuarela_theme_options[site_description_color]', array(
		'default'			=> '#222222',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'capability'		=> 'edit_theme_options',
		'transport' => 'postMessage',
		'type'				=> 'option',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_description_color', array(
		'label'		=> __('Tagline Text Color', 'acuarela'),
		'section'	=> 'colors',
		'settings'	=> 'acuarela_theme_options[site_description_color]',
		'priority' => 9,
	)));

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

	$site_description_color = $acuarela_theme_options['site_description_color'];
	$headings_font = $acuarela_theme_options['headings_font'];
	$text_font = $acuarela_theme_options['text_font'];

	$css = '';

	if ( $site_description_color ) :
		$css .= ' .site-description { color: ' . $site_description_color . '}' . "\n";
	endif;

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
		'Arima Madurai' => 'Arima Madurai',
		'Cinzel Decorative' => 'Cinzel Decorative',
		'Lato' => 'Lato',
		'Open Sans' => 'Open Sans',
		'Source Sans Pro' => 'Source Sans Pro',
		'Source Serif Pro' => 'Source Serif Pro',
		);
	return apply_filters( 'acuarela_font_styles', $default );
}

/**
 * Theme defaults
 */
function acuarela_get_option_defaults() {
	$defaults = array(
		'site_description_color' => '#222222',
		'hide_site_title' => 0,
		'hide_site_description' => 0,
		'blog_navigation' => 'navigation',
		'headings_font' => 'Arima Madurai',
		'text_font' => 'Lato',
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
	return wp_parse_args( get_option( 'acuarela_theme_options', array() ), acuarela_get_option_defaults() );
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
	wp_enqueue_script( 'acuarela-customize-preview', get_theme_file_uri( '/js/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'acuarela_customize_preview_js' );






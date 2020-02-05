<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Avant
 *
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function avant_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'avant_body_classes' );

/**
 * Add postMessage support for site title and description & theme text for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function avant_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'avant_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'avant_customize_partial_blogdescription',
		) );
		// Header Partials
		$wp_customize->selective_refresh->add_partial( 'avant-website-head-no', array(
			'selector'        => '.header-phone',
			'render_callback' => 'avant_customize_partial_header_phone',
		) );
		$wp_customize->selective_refresh->add_partial( 'avant-website-site-add', array(
			'selector'        => '.header-address',
			'render_callback' => 'avant_customize_partial_header_address',
		) );
	}
}
add_action( 'customize_register', 'avant_customize_register' );

/**
 * Render Header partials.
 */
function avant_customize_partial_blogname() {
	bloginfo( 'name' );
}
function avant_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function avant_customize_partial_header_phone() {
	bloginfo( 'avant-website-head-no' );
}
function avant_customize_partial_header_address() {
	bloginfo( 'avant-website-site-add' );
}

/**
 * Enqueue Google Fonts for Blocks Editor
 */
function customizer_avant_editor_fonts() {

	// Font options
	$fonts = array(
		get_theme_mod( 'avant-body-font', customizer_library_get_default( 'avant-body-font' ) ),
		get_theme_mod( 'avant-heading-font', customizer_library_get_default( 'avant-heading-font' ) )
	);

	$font_uri = customizer_library_get_google_font_uri( $fonts );
	
	// Load Google Fonts
	if ( !get_theme_mod( 'avant-disable-google-fonts', customizer_library_get_default( 'avant-disable-google-fonts' ) ) ) {
		wp_enqueue_style( 'customizer_avant_editor_fonts', $font_uri, array(), null, 'screen' );
	}

}
add_action( 'enqueue_block_editor_assets', 'customizer_avant_editor_fonts' );

if ( ! function_exists( 'customizer_library_avant_editor_styles' ) ) :
/**
 * Generates the fonts selected in the Customizer and enqueues it to the Blocks Editor
 */
function customizer_library_avant_editor_styles() {
	$bodyfontfam = get_theme_mod( 'avant-body-font', customizer_library_get_default( 'avant-body-font' ) );
	$headingfontfam = get_theme_mod( 'avant-heading-font', customizer_library_get_default( 'avant-heading-font' ) );
	if ( get_theme_mod( 'avant-disable-google-fonts' ) == 1 ) {
		$bodyfontfam = get_theme_mod( 'avant-body-font-websafe', customizer_library_get_default( 'avant-body-font-websafe' ) );
		$headingfontfam = get_theme_mod( 'avant-heading-font-websafe', customizer_library_get_default( 'avant-heading-font-websafe' ) );
	}

	$editor_css = '.editor-styles-wrapper div.wp-block,
				.editor-styles-wrapper div.wp-block p {
					font-family: "' . esc_attr( $bodyfontfam ) . '", sans-serif;
					font-size: 14px;
					color: ' . sanitize_hex_color( get_theme_mod( 'avant-body-font-color', customizer_library_get_default( 'avant-body-font-color' ) ) ) . ';
				}
				.editor-post-title .editor-post-title__block .editor-post-title__input,
				.editor-styles-wrapper .wp-block h1,
				.editor-styles-wrapper .wp-block h2,
				.editor-styles-wrapper .wp-block h3,
				.editor-styles-wrapper .wp-block h4,
				.editor-styles-wrapper .wp-block h5,
				.editor-styles-wrapper .wp-block h6 {
					font-family: "' . esc_attr( $headingfontfam ) . '", sans-serif;
					color: ' . sanitize_hex_color( get_theme_mod( 'avant-heading-font-color', customizer_library_get_default( 'avant-heading-font-color' ) ) ) . ';
				}
				.wp-block-quote:not(.is-large),
				.wp-block-quote:not(.is-style-large) {
					border-left-color: ' . sanitize_hex_color( get_theme_mod( 'avant-primary-color', customizer_library_get_default( 'avant-primary-color' ) ) ) . ' !important;
				}
				.editor-styles-wrapper .wp-block h1 {
					font-size: 32px;
					margin-bottom: .55em;
					font-weight: 500;
				}
				
				.editor-styles-wrapper .wp-block h2 {
					font-size: 28px;
					margin-bottom: .65em;
					font-weight: 500;
				}
				
				.editor-styles-wrapper .wp-block h3 {
					font-size: 22px;
					margin-bottom: .8em;
					font-weight: 500;
				}
				
				.editor-styles-wrapper .wp-block h4 {
					font-size: 20px;
					margin-bottom: 1.1em;
					font-weight: 500;
				}
				
				.editor-styles-wrapper .wp-block h5 {
					font-size: 16px;
					margin-bottom: 1.3em;
					font-weight: 500;
				}
				
				.editor-styles-wrapper .wp-block h6 {
					font-size: 14px;
					margin-bottom: 1.4em;
					font-weight: 500;
				}';

	if ( ! empty( $editor_css ) ) {
		echo "\n<!-- Begin Custom CSS -->\n<style type=\"text/css\" id=\"avant-custom-editor-css\">\n";
		echo $editor_css;
		echo "\n</style>\n<!-- End Custom CSS -->\n";
	}
}
endif;
add_action( 'enqueue_block_editor_assets', 'customizer_library_avant_editor_styles', 11 );

<?php
/**
 * File aeonblog.
 *
 * @package   AeonBlog
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2019, AeonWP
 * @link      https://aeonwp.com/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 * Dynamic css
 *
 * @since AeonBlog 1.0.0
 */

if ( ! function_exists( 'aeonblog_dynamic_css' ) ) {
	/**
	 * Dynamic CSS
	 *
	 *  @since AeonBlog 1.0.0
	 */
	function aeonblog_dynamic_css() {
		global $aeonblog_theme_options;
		$aeonblog_font_family         = wp_kses_post( $aeonblog_theme_options['aeonblog-font-family'] );
		$aeonblog_font_size           = absint( $aeonblog_theme_options['aeonblog-font-size'] );
		$aeonblog_font_line_height    = esc_attr( $aeonblog_theme_options['aeonblog-font-line-height'] );
		$aeonblog_font_letter_spacing = absint( $aeonblog_theme_options['aeonblog-letter-spacing'] );
		$aeonblog_primary_color       = esc_attr( $aeonblog_theme_options['aeonblog-primary-color'] );
		$aeonblog_dark_accent_color   = esc_attr( $aeonblog_theme_options['aeonblog-dark-accent-color'] );
		$aeonblog_light_accent_color  = esc_attr( $aeonblog_theme_options['aeonblog-light-accent-color'] );
		$aeonblog_about_gravatar      = esc_attr( $aeonblog_theme_options['aeonblog-about-gravatar'] );
		$custom_css                   = '';

		/* Typography Section */
		if ( ! empty( $aeonblog_font_family ) ) {
			$custom_css .= "body { font-family: {$aeonblog_font_family}; }";
		}

		if ( ! empty( $aeonblog_font_size ) ) {
			$custom_css .= "body { font-size: {$aeonblog_font_size}px; }";
		}

		if ( ! empty( $aeonblog_font_line_height ) ) {
			$custom_css .= "body { line-height : {$aeonblog_font_line_height}; }";
		}

		if ( ! empty( $aeonblog_font_letter_spacing ) ) {
			$custom_css .= "body { letter-spacing : {$aeonblog_font_letter_spacing}px; }";
		}

		/* Primary Color Section */
		if ( ! empty( $aeonblog_primary_color ) ) {
			$custom_css .= ".breadcrumbs span.breadcrumb, .search-form input[type=submit], #toTop, .comments-wrapper .form-submit input, .post-password-form input[type=submit]{ background : {$aeonblog_primary_color}; }";
			$custom_css .= ".search-form input.search-field, .sticky .p-15, .entry-footer .more-link { border-color : {$aeonblog_primary_color}; }";
			$custom_css .= ".error-404 h1, .no-results h1, .related-post-entries .title:hover, .entry-title a:hover, .featured-post-title a:hover, .entry-meta.entry-category a,.widget li a:hover, .widget h1 a:hover, .widget h2 a:hover, .widget h3 a:hover, .main-navigation ul li a:hover, .single .nav-links .nav-next:after, .single .nav-links .nav-previous:after { color : {$aeonblog_primary_color}; }";
			$custom_css .= ".btn-primary { border: 2px solid {$aeonblog_primary_color};}";
		}

		/* Dark Accent Color Section */
		if ( ! empty( $aeonblog_dark_accent_color ) ) {
			$custom_css .= ".site-footer, .entry-footer .more-link:hover, .entry-footer .more-link:focus,
			.widget_search form input[type='submit']:focus, .widget_search form input[type='submit']:hover,
			.entry-header .entry-meta li .posted-in a:focus, .entry-header .entry-meta li .posted-in a:hover,
			.comments-wrapper .form-submit input:focus, .post-password-form input[type=submit]:focus, 
			.comments-wrapper .form-submit input:hover, .post-password-form input[type=submit]:hover
			{background-color: {$aeonblog_dark_accent_color}; }";
			$custom_css .= ".search-form input.search-field:focus, .search-form input.search-field:hover { border-color: {$aeonblog_dark_accent_color}; }";
		}

		/* Light Accent Color Section */
		if ( ! empty( $aeonblog_light_accent_color ) ) {
			$custom_css .= ".breadcrumb, .single .navigation.post-navigation { background: {$aeonblog_light_accent_color}; }";
		}

		/* About section */
		// testing, remove this line echo $aeonblog_about_gravatar;
		if ( $aeonblog_about_gravatar == 'square' ) {
			$custom_css .= ".about-me-description a img { border-radius:2px;}";
		} elseif ( $aeonblog_about_gravatar == 'hide' ) {
			$custom_css .= ".about-me-description a { display:none;}";
		}

		wp_add_inline_style( 'aeonblog-style', $custom_css );
	}
}
add_action( 'wp_enqueue_scripts', 'aeonblog_dynamic_css', 99 );

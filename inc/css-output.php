<?php
/**
 * Output all of our dynamic CSS.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'asagi_base_css' ) ) {
	/**
	 * Generate the CSS in the <head> section using the Theme Customizer.
	 *
	 */
	function asagi_base_css() {
		// Get our settings
		$asagi_settings = wp_parse_args(
			get_option( 'asagi_settings', array() ),
			asagi_get_defaults()
		);

		// Initiate our class
		$css = new asagi_css;
		
		// Body
		$css->set_selector( 'body' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'text_color' ] ) );

		// Links
		$css->set_selector( 'a, a:visited' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'link_color' ] ) );
		$css->add_property( 'text-decoration', 'none' ); // Temporary until people can get their browser caches cleared

		// Visited links
		$css->set_selector( 'a:visited' )->add_property( 'color', esc_attr( $asagi_settings[ 'link_color_visited' ] ) );

		// Hover/focused links
		$css->set_selector( 'a:hover, a:focus, a:active' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'link_color_hover' ] ) );
		$css->add_property( 'text-decoration', 'none' ); // Temporary until people can get their browser caches cleared

		// Container width
		$css->set_selector( 'body .grid-container' )->add_property( 'max-width', absint( $asagi_settings['container_width'] ), false, 'px' );

		// Allow us to hook CSS into our output
		do_action( 'asagi_base_css', $css );

		return apply_filters( 'asagi_base_css_output', $css->css_output() );
	}
}

if ( ! function_exists( 'asagi_advanced_css' ) ) {
	/**
	 * Generate the CSS in the <head> section using the Theme Customizer.
	 *
	 */
	function asagi_advanced_css() {
		// Get our settings
		$asagi_settings = wp_parse_args(
			get_option( 'asagi_settings', array() ),
			asagi_get_color_defaults()
		);

		// Initiate our CSS class
		$css = new asagi_css;

		// Top bar
		$css->set_selector( '.top-bar' );
		$css->add_property( 'background-color', esc_attr( $asagi_settings[ 'top_bar_background_color' ] ) );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'top_bar_text_color' ] ) );

		// Top bar link
		$css->set_selector( '.top-bar a,.top-bar a:visited' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'top_bar_link_color' ] ) );

		// Top bar link hover
		$css->set_selector( '.top-bar a:hover' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'top_bar_link_color_hover' ] ) );

		// Header
		$css->set_selector( '.site-header' );
		$css->add_property( 'background-color', esc_attr( $asagi_settings[ 'header_background_color' ] ) );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'header_text_color' ] ) );

		// Header link
		$css->set_selector( '.site-header a,.site-header a:visited' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'header_link_color' ] ) );

		// Header link hover
		$css->set_selector( '.site-header a:hover' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'header_link_hover_color' ] ) );

		// Site title
		$css->set_selector( '.main-title a,.main-title a:hover,.main-title a:visited' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'site_title_color' ] ) );

		// Site description
		$css->set_selector( '.site-description' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'site_tagline_color' ] ) );

		// Navigation background
		$css->set_selector( '.main-navigation,.main-navigation ul ul' );
		$css->add_property( 'background-color', esc_attr( $asagi_settings[ 'navigation_background_color' ] ) );
		// Navigation text
		$css->set_selector( '.main-navigation .main-nav ul li a,.menu-toggle' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'navigation_text_color' ] ) );

		// Navigation background/text on hover
		$css->set_selector( '.main-navigation .main-nav ul li:hover > a,.main-navigation .main-nav ul li:focus > a, .main-navigation .main-nav ul li.sfHover > a' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'navigation_text_hover_color' ] ) );
		$css->add_property( 'background-color', esc_attr( $asagi_settings[ 'navigation_background_hover_color' ] ) );

		// Mobile button text
		$css->set_selector( 'button.menu-toggle:hover,button.menu-toggle:focus,.main-navigation .mobile-bar-items a,.main-navigation .mobile-bar-items a:hover,.main-navigation .mobile-bar-items a:focus' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'navigation_text_color' ] ) );

		// Navigation background/text current
		$css->set_selector( '.main-navigation .main-nav ul li[class*="current-menu-"] > a' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'navigation_text_current_color' ] ) );
		$css->add_property( 'background-color', esc_attr( $asagi_settings[ 'navigation_background_current_color' ] ) );

		// Navigation background text current text hover
		$css->set_selector( '.main-navigation .main-nav ul li[class*="current-menu-"] > a:hover,.main-navigation .main-nav ul li[class*="current-menu-"].sfHover > a' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'navigation_text_current_color' ] ) );
		$css->add_property( 'background-color', esc_attr( $asagi_settings[ 'navigation_background_current_color' ] ) );

		// Navigation search input
		$css->set_selector( '.navigation-search input[type="search"],.navigation-search input[type="search"]:active' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'navigation_background_hover_color' ] ) );
		$css->add_property( 'background-color', esc_attr( $asagi_settings[ 'navigation_background_hover_color' ] ) );

		// Navigation search input on focus
		$css->set_selector( '.navigation-search input[type="search"]:focus' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'navigation_text_hover_color' ] ) );
		$css->add_property( 'background-color', esc_attr( $asagi_settings[ 'navigation_background_hover_color' ] ) );

		// Sub-navigation background
		$css->set_selector( '.main-navigation ul ul' );
		$css->add_property( 'background-color', esc_attr( $asagi_settings[ 'subnavigation_background_color' ] ) );

		// Sub-navigation text
		$css->set_selector( '.main-navigation .main-nav ul ul li a' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'subnavigation_text_color' ] ) );

		// Sub-Navigation background/text on hover
		$css->set_selector( '.main-navigation .main-nav ul ul li:hover > a,.main-navigation .main-nav ul ul li:focus > a,.main-navigation .main-nav ul ul li.sfHover > a' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'subnavigation_text_hover_color' ] ) );
		$css->add_property( 'background-color', esc_attr( $asagi_settings[ 'subnavigation_background_hover_color' ] ) );

		// Sub-Navigation background / text current
		$css->set_selector( '.main-navigation .main-nav ul ul li[class*="current-menu-"] > a' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'subnavigation_text_current_color' ] ) );
		$css->add_property( 'background-color', esc_attr( $asagi_settings[ 'subnavigation_background_current_color' ] ) );

		// Sub-Navigation current background / text current
		$css->set_selector( '.main-navigation .main-nav ul ul li[class*="current-menu-"] > a:hover,.main-navigation .main-nav ul ul li[class*="current-menu-"].sfHover > a' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'subnavigation_text_current_color' ] ) );
		$css->add_property( 'background-color', esc_attr( $asagi_settings[ 'subnavigation_background_current_color' ] ) );

		// Content
		$css->set_selector( '.separate-containers .inside-article, .separate-containers .comments-area, .separate-containers .page-header, .one-container .container, .separate-containers .paging-navigation, .inside-page-header' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'content_text_color' ] ) );
		$css->add_property( 'background-color', esc_attr( $asagi_settings[ 'content_background_color' ] ) );

		// Content links
		$css->set_selector( '.inside-article a,.inside-article a:visited,.paging-navigation a,.paging-navigation a:visited,.comments-area a,.comments-area a:visited,.page-header a,.page-header a:visited' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'content_link_color' ] ) );

		// Content links on hover
		$css->set_selector( '.inside-article a:hover,.paging-navigation a:hover,.comments-area a:hover,.page-header a:hover' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'content_link_hover_color' ] ) );

		// Entry header
		$css->set_selector( '.entry-header h1,.page-header h1' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'content_title_color' ] ) );

		// Blog post title
		$css->set_selector( '.entry-title a,.entry-title a:visited' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'blog_post_title_color' ] ) );

		// Blog post title on hover
		$css->set_selector( '.entry-title a:hover' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'blog_post_title_hover_color' ] ) );

		// Entry meta text
		$css->set_selector( '.entry-meta' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'entry_meta_text_color' ] ) );

		// Entry meta links
		$css->set_selector( '.entry-meta a,.entry-meta a:visited' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'entry_meta_link_color' ] ) );

		// Entry meta links on hover
		$css->set_selector( '.entry-meta a:hover' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'entry_meta_link_color_hover' ] ) );

		// H1 color
		$css->set_selector( 'h1' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'h1_color' ] ) );

		// H2 color
		$css->set_selector( 'h2' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'h2_color' ] ) );

		// H3 color
		$css->set_selector( 'h3' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'h3_color' ] ) );

		// H4 color
		$css->set_selector( 'h4' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'h4_color' ] ) );

		// H5 color
		$css->set_selector( 'h5' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'h5_color' ] ) );

		// H6 color
		$css->set_selector( 'h6' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'h6_color' ] ) );

		// Sidebar widget
		$css->set_selector( '.sidebar .widget' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'sidebar_widget_text_color' ] ) );
		$css->add_property( 'background-color', esc_attr( $asagi_settings[ 'sidebar_widget_background_color' ] ) );

		// Sidebar widget links
		$css->set_selector( '.sidebar .widget a,.sidebar .widget a:visited' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'sidebar_widget_link_color' ] ) );

		// Sidebar widget links on hover
		$css->set_selector( '.sidebar .widget a:hover' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'sidebar_widget_link_hover_color' ] ) );

		// Sidebar widget title
		$css->set_selector( '.sidebar .widget .widget-title' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'sidebar_widget_title_color' ] ) );

		// Footer widget
		$css->set_selector( '.footer-widgets' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'footer_widget_text_color' ] ) );
		$css->add_property( 'background-color', esc_attr( $asagi_settings[ 'footer_widget_background_color' ] ) );

		// Footer widget links
		$css->set_selector( '.footer-widgets a,.footer-widgets a:visited' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'footer_widget_link_color' ] ) );

		// Footer widget links on hover
		$css->set_selector( '.footer-widgets a:hover' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'footer_widget_link_hover_color' ] ) );

		// Footer widget title
		$css->set_selector( '.footer-widgets .widget-title' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'footer_widget_title_color' ] ) );

		// Footer
		$css->set_selector( '.site-info' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'footer_text_color' ] ) );
		$css->add_property( 'background-color', esc_attr( $asagi_settings[ 'footer_background_color' ] ) );

		// Footer links
		$css->set_selector( '.site-info a,.site-info a:visited' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'footer_link_color' ] ) );

		// Footer links on hover
		$css->set_selector( '.site-info a:hover' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'footer_link_hover_color' ] ) );

		// Footer bar widget menu
		$css->set_selector( '.footer-bar .widget_nav_menu .current-menu-item a' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'footer_link_hover_color' ] ) );

		// Form input
		$css->set_selector( 'input[type="text"],input[type="email"],input[type="url"],input[type="password"],input[type="search"],input[type="tel"],input[type="number"],textarea,select' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'form_text_color' ] ) );
		$css->add_property( 'background-color', esc_attr( $asagi_settings[ 'form_background_color' ] ) );
		$css->add_property( 'border-color', esc_attr( $asagi_settings[ 'form_border_color' ] ) );

		// Form input on focus
		$css->set_selector( 'input[type="text"]:focus,input[type="email"]:focus,input[type="url"]:focus,input[type="password"]:focus,input[type="search"]:focus,input[type="tel"]:focus,input[type="number"]:focus,textarea:focus,select:focus' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'form_text_color_focus' ] ) );
		$css->add_property( 'background-color', esc_attr( $asagi_settings[ 'form_background_color_focus' ] ) );
		$css->add_property( 'border-color', esc_attr( $asagi_settings[ 'form_border_color_focus' ] ) );

		// Form button
		$css->set_selector( 'button,html input[type="button"],input[type="reset"],input[type="submit"],a.button,a.button:visited' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'form_button_text_color' ] ) );
		$css->add_property( 'background-color', esc_attr( $asagi_settings[ 'form_button_background_color' ] ) );

		// Form button on hover
		$css->set_selector( 'button:hover,html input[type="button"]:hover,input[type="reset"]:hover,input[type="submit"]:hover,a.button:hover,button:focus,html input[type="button"]:focus,input[type="reset"]:focus,input[type="submit"]:focus,a.button:focus' );
		$css->add_property( 'color', esc_attr( $asagi_settings[ 'form_button_text_color_hover' ] ) );
		$css->add_property( 'background-color', esc_attr( $asagi_settings[ 'form_button_background_color_hover' ] ) );

		// Back to top button
		$css->set_selector( '.asagi-back-to-top,.asagi-back-to-top:visited' );
		$css->add_property( 'background-color', esc_attr( $asagi_settings['back_to_top_background_color'] ) );
		$css->add_property( 'color', esc_attr( $asagi_settings['back_to_top_text_color'] ) );

		$css->set_selector( '.asagi-back-to-top:hover,.asagi-back-to-top:focus' );
		$css->add_property( 'background-color', esc_attr( $asagi_settings['back_to_top_background_color_hover'] ) );
		$css->add_property( 'color', esc_attr( $asagi_settings['back_to_top_text_color_hover'] ) );

		// Allow us to hook CSS into our output
		do_action( 'asagi_colors_css', $css );

		// Return our dynamic CSS
		return apply_filters( 'asagi_colors_css_output', $css->css_output() );
	}
}

if ( ! function_exists( 'asagi_font_css' ) ) {
	/**
	 * Generate the CSS in the <head> section using the Theme Customizer.
	 *
	 */
	function asagi_font_css() {

		$asagi_settings = wp_parse_args(
			get_option( 'asagi_settings', array() ),
			asagi_get_default_fonts()
		);

		$og_defaults = asagi_get_default_fonts( false );

		$css = new asagi_css;

		// Get our sub-navigation font size
		$subnav_font_size = $asagi_settings['navigation_font_size'] >= 17 ? $asagi_settings['navigation_font_size'] - 3 : $asagi_settings['navigation_font_size'] - 1;

		// Create all of our font family entries
		$body_family = asagi_get_font_family_css( 'font_body', 'asagi_settings', asagi_get_default_fonts() );
		$top_bar_family = asagi_get_font_family_css( 'font_top_bar', 'asagi_settings', asagi_get_default_fonts() );
		$site_title_family = asagi_get_font_family_css( 'font_site_title', 'asagi_settings', asagi_get_default_fonts() );
		$site_tagline_family = asagi_get_font_family_css( 'font_site_tagline', 'asagi_settings', asagi_get_default_fonts() );
		$navigation_family = asagi_get_font_family_css( 'font_navigation', 'asagi_settings', asagi_get_default_fonts() );
		$widget_family = asagi_get_font_family_css( 'font_widget_title', 'asagi_settings', asagi_get_default_fonts() );
		$h1_family = asagi_get_font_family_css( 'font_heading_1', 'asagi_settings', asagi_get_default_fonts() );
		$h2_family = asagi_get_font_family_css( 'font_heading_2', 'asagi_settings', asagi_get_default_fonts() );
		$h3_family = asagi_get_font_family_css( 'font_heading_3', 'asagi_settings', asagi_get_default_fonts() );
		$h4_family = asagi_get_font_family_css( 'font_heading_4', 'asagi_settings', asagi_get_default_fonts() );
		$h5_family = asagi_get_font_family_css( 'font_heading_5', 'asagi_settings', asagi_get_default_fonts() );
		$h6_family = asagi_get_font_family_css( 'font_heading_6', 'asagi_settings', asagi_get_default_fonts() );
		$footer_family = asagi_get_font_family_css( 'font_footer', 'asagi_settings', asagi_get_default_fonts() );
		$buttons_family = asagi_get_font_family_css( 'font_buttons', 'asagi_settings', asagi_get_default_fonts() );

		// Body
		$css->set_selector( 'body, button, input, select, textarea' );
		$css->add_property( 'font-family', $body_family );
		$css->add_property( 'font-weight', esc_attr( $asagi_settings[ 'body_font_weight' ] ), $og_defaults[ 'body_font_weight' ] );
		$css->add_property( 'text-transform', esc_attr( $asagi_settings[ 'body_font_transform' ] ), $og_defaults[ 'body_font_transform' ] );
		$css->add_property( 'font-size', absint( $asagi_settings[ 'body_font_size' ] ), $og_defaults[ 'body_font_size' ], 'px' );

		// Line hieght
		$css->set_selector( 'body' );
		$css->add_property( 'line-height', floatval( $asagi_settings['body_line_height'] ), $og_defaults['body_line_height'] );

		// Paragraph margin
		$css->set_selector( 'p' );
		$css->add_property( 'margin-bottom', floatval( $asagi_settings['paragraph_margin'] ), $og_defaults['paragraph_margin'], 'em' );

		// Top bar
		$css->set_selector( '.top-bar' );
		$css->add_property( 'font-family', $top_bar_family );
		$css->add_property( 'font-weight', esc_attr( $asagi_settings[ 'top_bar_font_weight' ] ), $og_defaults[ 'top_bar_font_weight' ] );
		$css->add_property( 'text-transform', esc_attr( $asagi_settings[ 'top_bar_font_transform' ] ), $og_defaults[ 'top_bar_font_transform' ] );
		$css->add_property( 'font-size', absint( $asagi_settings[ 'top_bar_font_size' ] ), absint( $og_defaults[ 'top_bar_font_size' ] ), 'px' );

		// Site title
		$css->set_selector( '.main-title' );
		$css->add_property( 'font-family', $site_title_family );
		$css->add_property( 'font-weight', esc_attr( $asagi_settings[ 'site_title_font_weight' ] ), $og_defaults[ 'site_title_font_weight' ] );
		$css->add_property( 'text-transform', esc_attr( $asagi_settings[ 'site_title_font_transform' ] ), $og_defaults[ 'site_title_font_transform' ] );
		$css->add_property( 'font-size', absint( $asagi_settings[ 'site_title_font_size' ] ), $og_defaults[ 'site_title_font_size' ], 'px' );

		// Site description
		$css->set_selector( '.site-description' );
		$css->add_property( 'font-family', $site_tagline_family );
		$css->add_property( 'font-weight', esc_attr( $asagi_settings[ 'site_tagline_font_weight' ] ), $og_defaults[ 'site_tagline_font_weight' ] );
		$css->add_property( 'text-transform', esc_attr( $asagi_settings[ 'site_tagline_font_transform' ] ), $og_defaults[ 'site_tagline_font_transform' ] );
		$css->add_property( 'font-size', absint( $asagi_settings[ 'site_tagline_font_size' ] ), $og_defaults[ 'site_tagline_font_size' ], 'px' );

		// Navigation
		$css->set_selector( '.main-navigation a, .menu-toggle' );
		$css->add_property( 'font-family', $navigation_family );
		$css->add_property( 'font-weight', esc_attr( $asagi_settings[ 'navigation_font_weight' ] ), $og_defaults[ 'navigation_font_weight' ] );
		$css->add_property( 'text-transform', esc_attr( $asagi_settings[ 'navigation_font_transform' ] ), $og_defaults[ 'navigation_font_transform' ] );
		$css->add_property( 'font-size', absint( $asagi_settings[ 'navigation_font_size' ] ), $og_defaults[ 'navigation_font_size' ], 'px' );

		// Sub-navigation font size
		$css->set_selector( '.main-navigation .main-nav ul ul li a' );
		$css->add_property( 'font-size', absint( $subnav_font_size ), false, 'px' );

		// Widget title
		$css->set_selector( '.widget-title' );
		$css->add_property( 'font-family', $widget_family );
		$css->add_property( 'font-weight', esc_attr( $asagi_settings[ 'widget_title_font_weight' ] ), $og_defaults[ 'widget_title_font_weight' ] );
		$css->add_property( 'text-transform', esc_attr( $asagi_settings[ 'widget_title_font_transform' ] ), $og_defaults[ 'widget_title_font_transform' ] );
		$css->add_property( 'font-size', absint( $asagi_settings[ 'widget_title_font_size' ] ), $og_defaults[ 'widget_title_font_size' ], 'px' );
		$css->add_property( 'margin-bottom', absint( $asagi_settings['widget_title_separator'] ), absint( $og_defaults['widget_title_separator'] ), 'px' );

		// Widget font size
		$css->set_selector( '.sidebar .widget, .footer-widgets .widget' );
		$css->add_property( 'font-size', absint( $asagi_settings['widget_content_font_size'] ), $og_defaults['widget_content_font_size'], 'px' );

		// Form button
		$css->set_selector( 'button:not(.menu-toggle),html input[type="button"],input[type="reset"],input[type="submit"],.button,.button:visited' );
		$css->add_property( 'font-family', $buttons_family );
		$css->add_property( 'font-weight', esc_attr( $asagi_settings[ 'buttons_font_weight' ] ), $og_defaults[ 'buttons_font_weight' ] );
		$css->add_property( 'text-transform', esc_attr( $asagi_settings[ 'buttons_font_transform' ] ), $og_defaults[ 'buttons_font_transform' ] );

		if ( '' !== $asagi_settings[ 'buttons_font_size' ] ) {
			$css->add_property( 'font-size', absint( $asagi_settings[ 'buttons_font_size' ] ), $og_defaults[ 'buttons_font_size' ], 'px' );
		}

		// H1
		$css->set_selector( 'h1' );
		$css->add_property( 'font-family', $h1_family );
		$css->add_property( 'font-weight', esc_attr( $asagi_settings[ 'heading_1_weight' ] ), $og_defaults[ 'heading_1_weight' ] );
		$css->add_property( 'text-transform', esc_attr( $asagi_settings[ 'heading_1_transform' ] ), $og_defaults[ 'heading_1_transform' ] );
		$css->add_property( 'font-size', absint( $asagi_settings[ 'heading_1_font_size' ] ), $og_defaults[ 'heading_1_font_size' ], 'px' );
		$css->add_property( 'line-height', floatval( $asagi_settings['heading_1_line_height'] ), $og_defaults['heading_1_line_height'], 'em' );

		// H2
		$css->set_selector( 'h2' );
		$css->add_property( 'font-family', $h2_family );
		$css->add_property( 'font-weight', esc_attr( $asagi_settings[ 'heading_2_weight' ] ), $og_defaults[ 'heading_2_weight' ] );
		$css->add_property( 'text-transform', esc_attr( $asagi_settings[ 'heading_2_transform' ] ), $og_defaults[ 'heading_2_transform' ] );
		$css->add_property( 'font-size', absint( $asagi_settings[ 'heading_2_font_size' ] ), $og_defaults[ 'heading_2_font_size' ], 'px' );
		$css->add_property( 'line-height', floatval( $asagi_settings['heading_2_line_height'] ), $og_defaults['heading_2_line_height'], 'em' );

		// H3
		$css->set_selector( 'h3' );
		$css->add_property( 'font-family', $h3_family );
		$css->add_property( 'font-weight', esc_attr( $asagi_settings[ 'heading_3_weight' ] ), $og_defaults[ 'heading_3_weight' ] );
		$css->add_property( 'text-transform', esc_attr( $asagi_settings[ 'heading_3_transform' ] ), $og_defaults[ 'heading_3_transform' ] );
		$css->add_property( 'font-size', absint( $asagi_settings[ 'heading_3_font_size' ] ), $og_defaults[ 'heading_3_font_size' ], 'px' );
		$css->add_property( 'line-height', floatval( $asagi_settings['heading_3_line_height'] ), $og_defaults['heading_3_line_height'], 'em' );

		// H4
		$css->set_selector( 'h4' );
		$css->add_property( 'font-family', $h4_family );
		$css->add_property( 'font-weight', esc_attr( $asagi_settings[ 'heading_4_weight' ] ), $og_defaults[ 'heading_4_weight' ] );
		$css->add_property( 'text-transform', esc_attr( $asagi_settings[ 'heading_4_transform' ] ), $og_defaults[ 'heading_4_transform' ] );

		if ( '' !== $asagi_settings[ 'heading_4_font_size' ] ) {
			$css->add_property( 'font-size', absint( $asagi_settings[ 'heading_4_font_size' ] ), $og_defaults[ 'heading_4_font_size' ], 'px' );
		}

		if ( '' !== $asagi_settings[ 'heading_4_line_height' ] ) {
			$css->add_property( 'line-height', floatval( $asagi_settings['heading_4_line_height'] ), $og_defaults['heading_4_line_height'], 'em' );
		}

		// H5
		$css->set_selector( 'h5' );
		$css->add_property( 'font-family', $h5_family );
		$css->add_property( 'font-weight', esc_attr( $asagi_settings[ 'heading_5_weight' ] ), $og_defaults[ 'heading_5_weight' ] );
		$css->add_property( 'text-transform', esc_attr( $asagi_settings[ 'heading_5_transform' ] ), $og_defaults[ 'heading_5_transform' ] );

		if ( '' !== $asagi_settings[ 'heading_5_font_size' ] ) {
			$css->add_property( 'font-size', absint( $asagi_settings[ 'heading_5_font_size' ] ), $og_defaults[ 'heading_5_font_size' ], 'px' );
		}

		if ( '' !== $asagi_settings['heading_5_line_height'] ) {
			$css->add_property( 'line-height', floatval( $asagi_settings['heading_5_line_height'] ), $og_defaults['heading_5_line_height'], 'em' );
		}

		// H6
		$css->set_selector( 'h6' );
		$css->add_property( 'font-family', $h6_family );
		$css->add_property( 'font-weight', esc_attr( $asagi_settings[ 'heading_6_weight' ] ), $og_defaults[ 'heading_6_weight' ] );
		$css->add_property( 'text-transform', esc_attr( $asagi_settings[ 'heading_6_transform' ] ), $og_defaults[ 'heading_6_transform' ] );

		if ( '' !== $asagi_settings[ 'heading_6_font_size' ] ) {
			$css->add_property( 'font-size', absint( $asagi_settings[ 'heading_6_font_size' ] ), $og_defaults[ 'heading_6_font_size' ], 'px' );
		}

		if ( '' !== $asagi_settings['heading_6_line_height'] ) {
			$css->add_property( 'line-height', floatval( $asagi_settings['heading_6_line_height'] ), $og_defaults['heading_6_line_height'], 'em' );
		}

		// Footer
		$css->set_selector( '.site-info' );
		$css->add_property( 'font-family', $footer_family );
		$css->add_property( 'font-weight', esc_attr( $asagi_settings[ 'footer_weight' ] ), $og_defaults[ 'footer_weight' ] );
		$css->add_property( 'text-transform', esc_attr( $asagi_settings[ 'footer_transform' ] ), $og_defaults[ 'footer_transform' ] );
		$css->add_property( 'font-size', absint( $asagi_settings['footer_font_size'] ), $og_defaults['footer_font_size'], 'px' );

		// Mobile
		$css->start_media_query( apply_filters( 'asagi_mobile_media_query', '(max-width:768px)' ) );
			// Site title
			$mobile_site_title = ( isset( $asagi_settings[ 'mobile_site_title_font_size' ] ) ) ? $asagi_settings[ 'mobile_site_title_font_size' ] : '30';
			$css->set_selector( '.main-title' );
			$css->add_property( 'font-size', absint( $mobile_site_title ), false, 'px' );

			// H1
			$mobile_h1 = ( isset( $asagi_settings[ 'mobile_heading_1_font_size' ] ) ) ? $asagi_settings[ 'mobile_heading_1_font_size' ] : '30';
			$css->set_selector( 'h1' );
			$css->add_property( 'font-size', absint( $mobile_h1 ), false, 'px' );

			// H2
			$mobile_h2 = ( isset( $asagi_settings[ 'mobile_heading_2_font_size' ] ) ) ? $asagi_settings[ 'mobile_heading_2_font_size' ] : '25';
			$css->set_selector( 'h2' );
			$css->add_property( 'font-size', absint( $mobile_h2 ), false, 'px' );
		$css->stop_media_query();

		// Allow us to hook CSS into our output
		do_action( 'asagi_typography_css', $css );

		return apply_filters( 'asagi_typography_css_output', $css->css_output() );
	}
}

if ( ! function_exists( 'asagi_spacing_css' ) ) {
	/**
	 * Write our dynamic CSS.
	 *
	 */
	function asagi_spacing_css() {
		$spacing_settings = wp_parse_args(
			get_option( 'asagi_spacing_settings', array() ),
			asagi_spacing_get_defaults()
		);

		$og_defaults = asagi_spacing_get_defaults( false );
		$sidebar_layout = asagi_get_layout();

		$css = new asagi_css;

		// Top bar padding
		$css->set_selector( '.inside-top-bar' );
		$css->add_property( 'padding', asagi_padding_css( $spacing_settings[ 'top_bar_top' ], $spacing_settings[ 'top_bar_right' ], $spacing_settings[ 'top_bar_bottom' ], $spacing_settings[ 'top_bar_left' ] ), asagi_padding_css( $og_defaults[ 'top_bar_top' ], $og_defaults[ 'top_bar_right' ], $og_defaults[ 'top_bar_bottom' ], $og_defaults[ 'top_bar_left' ] ) );

		// Header padding
		$css->set_selector( '.inside-header' );
		$css->add_property( 'padding', asagi_padding_css( $spacing_settings[ 'header_top' ], $spacing_settings[ 'header_right' ], $spacing_settings[ 'header_bottom' ], $spacing_settings[ 'header_left' ] ), asagi_padding_css( $og_defaults[ 'header_top' ], $og_defaults[ 'header_right' ], $og_defaults[ 'header_bottom' ], $og_defaults[ 'header_left' ] ) );

		// Content padding
		$css->set_selector( '.separate-containers .inside-article, .separate-containers .comments-area, .separate-containers .page-header, .separate-containers .paging-navigation, .one-container .site-content, .inside-page-header' );
		$css->add_property( 'padding', asagi_padding_css( $spacing_settings[ 'content_top' ], $spacing_settings[ 'content_right' ], $spacing_settings[ 'content_bottom' ], $spacing_settings[ 'content_left' ] ), asagi_padding_css( $og_defaults[ 'content_top' ], $og_defaults[ 'content_right' ], $og_defaults[ 'content_bottom' ], $og_defaults[ 'content_left' ] ) );

		// Mobile Content padding
		$css->start_media_query( apply_filters( 'asagi_mobile_media_query', '(max-width:768px)' ) );
			$css->set_selector( '.separate-containers .inside-article, .separate-containers .comments-area, .separate-containers .page-header, .separate-containers .paging-navigation, .one-container .site-content, .inside-page-header' );
			$css->add_property( 'padding', asagi_padding_css( $spacing_settings[ 'mobile_content_top' ], $spacing_settings[ 'mobile_content_right' ], $spacing_settings[ 'mobile_content_bottom' ], $spacing_settings[ 'mobile_content_left' ] ) );
		$css->stop_media_query();

		// One container
		$css->set_selector( '.one-container.right-sidebar .site-main,.one-container.both-right .site-main' );
		$css->add_property( 'margin-right', absint( $spacing_settings['content_right'] ), absint( $og_defaults['content_right'] ), 'px' );

		$css->set_selector( '.one-container.left-sidebar .site-main,.one-container.both-left .site-main' );
		$css->add_property( 'margin-left', absint( $spacing_settings['content_left'] ), absint( $og_defaults['content_left'] ), 'px' );

		$css->set_selector( '.one-container.both-sidebars .site-main' );
		$css->add_property( 'margin', asagi_padding_css( '0', $spacing_settings[ 'content_right' ], '0', $spacing_settings[ 'content_left' ] ), asagi_padding_css( '0', $og_defaults[ 'content_right' ], '0', $og_defaults[ 'content_left' ] ) );

		// Separate containers
		// Container bottom margins
		$css->set_selector( '.separate-containers .widget, .separate-containers .site-main > *, .separate-containers .page-header, .widget-area .main-navigation' );
		$css->add_property( 'margin-bottom', absint( $spacing_settings[ 'separator' ] ), absint( $og_defaults[ 'separator' ] ), 'px' );

		// Right sidebar
		$css->set_selector( '.right-sidebar.separate-containers .site-main' );
		$css->add_property( 'margin', asagi_padding_css( $spacing_settings[ 'separator' ], $spacing_settings[ 'separator' ], $spacing_settings[ 'separator' ], '0' ), asagi_padding_css( $og_defaults[ 'separator' ], $og_defaults[ 'separator' ], $og_defaults[ 'separator' ], '0' ) );

		// Left sidebar
		$css->set_selector( '.left-sidebar.separate-containers .site-main' );
		$css->add_property( 'margin', asagi_padding_css( $spacing_settings[ 'separator' ], '0', $spacing_settings[ 'separator' ], $spacing_settings[ 'separator' ] ), asagi_padding_css( $og_defaults[ 'separator' ], '0', $og_defaults[ 'separator' ], $og_defaults[ 'separator' ] ) );

		// Both sidebars
		$css->set_selector( '.both-sidebars.separate-containers .site-main' );
		$css->add_property( 'margin', absint( $spacing_settings['separator'] ), absint( $og_defaults['separator'] ), 'px' );

		// Both right sidebar content separating space
		$css->set_selector( '.both-right.separate-containers .site-main' );
		$css->add_property( 'margin', asagi_padding_css( $spacing_settings[ 'separator' ], $spacing_settings[ 'separator' ], $spacing_settings[ 'separator' ], '0' ), asagi_padding_css( $og_defaults[ 'separator' ], $og_defaults[ 'separator' ], $og_defaults[ 'separator' ], '0' ) );

		// Both right sidebar - left sidebar separating space
		$css->set_selector( '.both-right.separate-containers .inside-left-sidebar' );
		$css->add_property( 'margin-right', absint( $spacing_settings[ 'separator' ] / 2 ), absint( $og_defaults[ 'separator' ] / 2 ), 'px' );

		// Both right sidebar - right sidebar separating space
		$css->set_selector( '.both-right.separate-containers .inside-right-sidebar' );
		$css->add_property( 'margin-left', absint( $spacing_settings[ 'separator' ] / 2 ), absint( $og_defaults[ 'separator' ] / 2 ), 'px' );

		// Both left sidebar content separating space
		$css->set_selector( '.both-left.separate-containers .site-main' );
		$css->add_property( 'margin', asagi_padding_css( $spacing_settings[ 'separator' ], '0', $spacing_settings[ 'separator' ], $spacing_settings[ 'separator' ] ), asagi_padding_css( $og_defaults[ 'separator' ], '0', $og_defaults[ 'separator' ], $og_defaults[ 'separator' ] ) );

		// Both left sidebar - left sidebar separating space
		$css->set_selector( '.both-left.separate-containers .inside-left-sidebar' );
		$css->add_property( 'margin-right', absint( $spacing_settings[ 'separator' ] / 2 ), absint( $og_defaults[ 'separator' ] / 2 ), 'px' );

		// Both left sidebar - right sidebar separating space
		$css->set_selector( '.both-left.separate-containers .inside-right-sidebar' );
		$css->add_property( 'margin-left', absint( $spacing_settings[ 'separator' ] / 2 ), absint( $og_defaults[ 'separator' ] / 2 ), 'px' );

		// Site main separators
		$css->set_selector( '.separate-containers .site-main' );
		$css->add_property( 'margin-top', absint( $spacing_settings[ 'separator' ] ), absint( $og_defaults[ 'separator' ] ), 'px' );
		$css->add_property( 'margin-bottom', absint( $spacing_settings[ 'separator' ] ), absint( $og_defaults[ 'separator' ] ), 'px' );

		// Page header top margin
		$css->set_selector( '.separate-containers .page-header-image, .separate-containers .page-header-contained, .separate-containers .page-header-image-single, .separate-containers .page-header-content-single' );
		$css->add_property( 'margin-top', absint( $spacing_settings[ 'separator' ] ), absint( $og_defaults[ 'separator' ] ), 'px' );

		// Sidebar separator
		$css->set_selector( '.separate-containers .inside-right-sidebar, .separate-containers .inside-left-sidebar' );
		$css->add_property( 'margin-top', absint( $spacing_settings[ 'separator' ] ), absint( $og_defaults[ 'separator' ] ), 'px' );
		$css->add_property( 'margin-bottom', absint( $spacing_settings[ 'separator' ] ), absint( $og_defaults[ 'separator' ] ), 'px' );

		// Navigation spacing
		// Menu item size
		$css->set_selector( '.main-navigation .main-nav ul li a,.menu-toggle,.main-navigation .mobile-bar-items a' );
		$css->add_property( 'padding-left', absint( $spacing_settings['menu_item'] ), absint( $og_defaults['menu_item'] ), 'px' );
		$css->add_property( 'padding-right', absint( $spacing_settings['menu_item'] ), absint( $og_defaults['menu_item'] ), 'px' );
		$css->add_property( 'line-height', absint( $spacing_settings['menu_item_height'] ), absint( $og_defaults['menu_item_height'] ), 'px' );

		// Sub-menu item size
		$css->set_selector( '.main-navigation .main-nav ul ul li a' );
		$css->add_property( 'padding', asagi_padding_css( $spacing_settings[ 'sub_menu_item_height' ], $spacing_settings[ 'menu_item' ], $spacing_settings[ 'sub_menu_item_height' ], $spacing_settings[ 'menu_item' ] ), asagi_padding_css( $og_defaults[ 'sub_menu_item_height' ], $og_defaults[ 'menu_item' ], $og_defaults[ 'sub_menu_item_height' ], $og_defaults[ 'menu_item' ] ) );

		// Sub-menu positioning
		$css->set_selector( '.main-navigation ul ul' );
		$css->add_property( 'top', 'auto' ); // Added for compatibility purposes on 22/12/2016

		// Navigation search
		$css->set_selector( '.navigation-search, .navigation-search input' );
		$css->add_property( 'height', '100%' ); // Added to give browser caches a chance to clear

		// Dropdown arrow spacing
		$css->set_selector( '.rtl .menu-item-has-children .dropdown-menu-toggle' );
		$css->add_property( 'padding-left', absint( $spacing_settings[ 'menu_item' ] ), false, 'px' );

		$css->set_selector( '.menu-item-has-children .dropdown-menu-toggle' );
		$css->add_property( 'padding-right', absint( $spacing_settings[ 'menu_item' ] ), absint( $og_defaults[ 'menu_item' ] ), 'px' );

		// Sub-menu dropdown arrow spacing
		$css->set_selector( '.menu-item-has-children ul .dropdown-menu-toggle' );
		$css->add_property( 'padding-top', absint( $spacing_settings[ 'sub_menu_item_height' ] ), absint( $og_defaults[ 'sub_menu_item_height' ] ), 'px' );
		$css->add_property( 'padding-bottom', absint( $spacing_settings[ 'sub_menu_item_height' ] ), absint( $og_defaults[ 'sub_menu_item_height' ] ), 'px' );
		$css->add_property( 'margin-top', '-' . absint( $spacing_settings[ 'sub_menu_item_height' ] ), '-' . absint( $og_defaults[ 'sub_menu_item_height' ] ), 'px' );

		// RTL menu item padding
		$css->set_selector( '.rtl .main-navigation .main-nav ul li.menu-item-has-children > a' );
		$css->add_property( 'padding-right', absint( $spacing_settings[ 'menu_item' ] ), false, 'px' );

		// Sidebar widget padding
		$css->set_selector( '.widget-area .widget' );
		$css->add_property( 'padding', asagi_padding_css( $spacing_settings[ 'widget_top' ], $spacing_settings[ 'widget_right' ], $spacing_settings[ 'widget_bottom' ], $spacing_settings[ 'widget_left' ] ), asagi_padding_css( $og_defaults[ 'widget_top' ], $og_defaults[ 'widget_right' ], $og_defaults[ 'widget_bottom' ], $og_defaults[ 'widget_left' ] ) );

		// Footer widget padding
		$css->set_selector( '.footer-widgets' );
		$css->add_property( 'padding', asagi_padding_css( $spacing_settings[ 'footer_widget_container_top' ], $spacing_settings[ 'footer_widget_container_right' ], $spacing_settings[ 'footer_widget_container_bottom' ], $spacing_settings[ 'footer_widget_container_left' ] ), asagi_padding_css( $og_defaults[ 'footer_widget_container_top' ], $og_defaults[ 'footer_widget_container_right' ], $og_defaults[ 'footer_widget_container_bottom' ], $og_defaults[ 'footer_widget_container_left' ] ) );

		// Footer widget separator
		$css->set_selector( '.site-footer .footer-widgets-container .inner-padding' );
		$css->add_property( 'padding', asagi_padding_css( '0', '0', '0', $spacing_settings[ 'footer_widget_separator' ] ), asagi_padding_css( '0', '0', '0', $og_defaults[ 'footer_widget_separator' ] ) );

		$css->set_selector( '.site-footer .footer-widgets-container .inside-footer-widgets' );
		$css->add_property( 'margin-left', '-' . absint( $spacing_settings[ 'footer_widget_separator' ] ), '-' . absint( $og_defaults[ 'footer_widget_separator' ] ), 'px' );

		// Footer padding
		$css->set_selector( '.site-info' );
		$css->add_property( 'padding', asagi_padding_css( $spacing_settings[ 'footer_top' ], $spacing_settings[ 'footer_right' ], $spacing_settings[ 'footer_bottom' ], $spacing_settings[ 'footer_left' ] ), asagi_padding_css( $og_defaults[ 'footer_top' ], $og_defaults[ 'footer_right' ], $og_defaults[ 'footer_bottom' ], $og_defaults[ 'footer_left' ] ) );

		// Add spacing back where dropdown arrow should be
		// Old versions of WP don't get nice things
		if ( version_compare( $GLOBALS['wp_version'], '4.4', '<' ) ) {
			$css->set_selector( '.main-navigation .main-nav ul li.menu-item-has-children>a, .secondary-navigation .main-nav ul li.menu-item-has-children>a' );
			$css->add_property( 'padding-right', absint( $spacing_settings[ 'menu_item' ] ), absint( $og_defaults[ 'menu_item' ] ), 'px' );
		}

		$output = '';
		// Get color settings
		$asagi_settings = wp_parse_args(
			get_option( 'asagi_settings', array() ),
			asagi_get_color_defaults()
		);

		// Find out if the content background color and sidebar widget background color is the same
		$sidebar = strtoupper( $asagi_settings['sidebar_widget_background_color'] );
		$content = strtoupper( $asagi_settings['content_background_color'] );
		$colors_match = ( ( $sidebar == $content ) || '' == $sidebar ) ? true : false;

		// If they're all 40 (default), remove the padding when one container is set
		// This way, the user can still adjust the padding and it will work (unless they want 40px padding)
		// We'll also remove the padding if there's no color difference between the widgets and content background color
		if ( ( '40' == $spacing_settings[ 'widget_top' ] && '40' == $spacing_settings[ 'widget_right' ] && '40' == $spacing_settings[ 'widget_bottom' ] && '40' == $spacing_settings[ 'widget_left' ] ) && $colors_match ) {
			$output .= '.one-container .sidebar .widget{padding:0px;}';
		}

		// Allow us to hook CSS into our output
		do_action( 'asagi_spacing_css', $css );

		return apply_filters( 'asagi_spacing_css_output', $css->css_output() . $output );
	}
}

/**
 * Generates any CSS that can't be cached (can change from page to page).
 *
 */
function asagi_no_cache_dynamic_css() {
	// Initiate our class.
	$css = new asagi_css;

	// Content margin if there's no title.
	if ( ! asagi_show_title() ) {
		$css->set_selector( '.page .entry-content' )->add_property( 'margin-top', '0px' );

		if ( is_single() ) {
			if ( ! apply_filters( 'asagi_post_author', true ) && ! apply_filters( 'asagi_post_date', true ) ) {
				$css->set_selector( '.single .entry-content' )->add_property( 'margin-top', '0px' );
			}
		}
	}

	return $css->css_output();
}

add_action( 'wp_enqueue_scripts', 'asagi_enqueue_dynamic_css', 50 );
/**
 * Enqueue our dynamic CSS.
 *
 */
function asagi_enqueue_dynamic_css() {
	if ( ! get_option( 'asagi_dynamic_css_output', false ) || is_customize_preview() || apply_filters( 'asagi_dynamic_css_skip_cache', false ) ) {
		$css = asagi_base_css() . asagi_font_css() . asagi_advanced_css() . asagi_spacing_css();
	} else {
		$css = get_option( 'asagi_dynamic_css_output' ) . '/* End cached CSS */';
	}

	$css = $css . asagi_no_cache_dynamic_css();

	wp_add_inline_style( 'asagi-style', $css );
}

add_action( 'init', 'asagi_set_dynamic_css_cache' );
/**
 * Sets our dynamic CSS cache if it doesn't exist.
 *
 * If the theme version changed, bust the cache.
 *
 */
function asagi_set_dynamic_css_cache() {
	if ( apply_filters( 'asagi_dynamic_css_skip_cache', false ) ) {
		return;
	}

	$cached_css = get_option( 'asagi_dynamic_css_output', false );
	$cached_version = get_option( 'asagi_dynamic_css_cached_version', '' );

	if ( ! $cached_css || $cached_version !== ASAGI_VERSION ) {
		$css = asagi_base_css() . asagi_font_css() . asagi_advanced_css() . asagi_spacing_css();

		update_option( 'asagi_dynamic_css_output', $css );
		update_option( 'asagi_dynamic_css_cached_version', ASAGI_VERSION );
	}
}

add_action( 'customize_save_after', 'asagi_update_dynamic_css_cache' );
/**
 * Update our CSS cache when done saving Customizer options.
 *
 */
function asagi_update_dynamic_css_cache() {
	if ( apply_filters( 'asagi_dynamic_css_skip_cache', false ) ) {
		return;
	}

	$css = asagi_base_css() . asagi_font_css() . asagi_advanced_css() . asagi_spacing_css();
	update_option( 'asagi_dynamic_css_output', $css );
}

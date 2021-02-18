<?php
/**
 * Outputs the customizer styles.
 *
 * @package Responsive
 * @since 0.2
 */

/**
 * Outputs the custom styles for the theme.
 *
 * @return void
 */
function responsive_customizer_styles() {

	$custom_css = '';

	// Box Padding.
	$box_padding_right  = esc_html( get_theme_mod( 'responsive_box_right_padding', 30 ) );
	$box_padding_left   = esc_html( get_theme_mod( 'responsive_box_left_padding', 30 ) );
	$box_padding_top    = esc_html( get_theme_mod( 'responsive_box_top_padding', 30 ) );
	$box_padding_bottom = esc_html( get_theme_mod( 'responsive_box_bottom_padding', 30 ) );

	$box_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_box_tablet_right_padding', 30 ) );
	$box_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_box_tablet_left_padding', 30 ) );
	$box_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_box_tablet_top_padding', 30 ) );
	$box_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_box_tablet_bottom_padding', 30 ) );

	$box_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_box_mobile_right_padding', 30 ) );
	$box_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_box_mobile_left_padding', 30 ) );
	$box_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_box_mobile_top_padding', 30 ) );
	$box_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_box_mobile_bottom_padding', 30 ) );

	// Box Radius.
	$box_radius = esc_html( get_theme_mod( 'responsive_box_radius', 0 ) );

	// Site custom styles.

	$container_max_width  = esc_html( get_theme_mod( 'responsive_container_width', 1140 ) );
	$box_background_color = esc_html( get_theme_mod( 'responsive_box_background_color', '#ffffff' ) );
	$alt_background_color = esc_html( get_theme_mod( 'responsive_alt_background_color', '#eaeaea' ) );

	$custom_css .= "
	.container,
	[class*='__inner-container'],
	.site-header-full-width-main-navigation:not(.responsive-site-full-width) .main-navigation-wrapper {
		max-width: {$container_max_width}px;
	}
	.page.front-page.responsive-site-style-content-boxed .custom-home-widget-section.home-widgets,
	.blog.front-page.responsive-site-style-content-boxed .custom-home-widget-section.home-widgets,
	.responsive-site-style-content-boxed .custom-home-about-section,
	.responsive-site-style-content-boxed .custom-home-feature-section,
	.responsive-site-style-content-boxed .custom-home-team-section,
	.responsive-site-style-content-boxed .custom-home-testimonial-section,
	.responsive-site-style-content-boxed .custom-home-contact-section,
	.responsive-site-style-content-boxed .custom-home-widget-section,
	.responsive-site-style-content-boxed .custom-home-featured-area,
	.responsive-site-style-content-boxed .site-content-header,
	.responsive-site-style-content-boxed .content-area-wrapper,
	.responsive-site-style-content-boxed .site-content .hentry,
	.responsive-site-style-content-boxed .navigation,
	.responsive-site-style-content-boxed .comments-area,
	.responsive-site-style-content-boxed .comment-respond,
	.responsive-site-style-boxed .custom-home-about-section,
	.responsive-site-style-boxed .custom-home-feature-section,
	.responsive-site-style-boxed .custom-home-team-section,
	.responsive-site-style-boxed .custom-home-testimonial-section,
	.responsive-site-style-boxed .custom-home-contact-section,
	.responsive-site-style-boxed .custom-home-widget-section,
	.responsive-site-style-boxed .custom-home-featured-area,
	.responsive-site-style-boxed .site-content-header,
	.responsive-site-style-boxed .site-content .hentry,
	.responsive-site-style-boxed .navigation,
	.responsive-site-style-boxed .comments-area,
	.responsive-site-style-boxed .comment-respond,
	.responsive-site-style-boxed .comment-respond,
	.responsive-site-style-boxed aside#secondary .widget-wrapper,
	.responsive-site-style-boxed .site-content article.product {
		background-color:{$box_background_color};
		border-radius:{$box_radius}px;
	}
	address, blockquote, pre, code, kbd, tt, var {
		background-color:{$alt_background_color};
	}
	";

	$custom_css .= '.responsive-site-style-content-boxed .hentry,
	.responsive-site-style-content-boxed .navigation,
	.responsive-site-style-content-boxed .site-content-header,
	.responsive-site-style-content-boxed .comments-area,
	.responsive-site-style-content-boxed .comment-respond,
	.responsive-site-style-boxed .hentry,
	.responsive-site-style-boxed .site-content-header,
	.responsive-site-style-boxed .navigation,
	.responsive-site-style-boxed .comments-area,
	.responsive-site-style-boxed .comment-respond,
	.page.front-page.responsive-site-style-flat .widget-wrapper,
	.blog.front-page.responsive-site-style-flat .widget-wrapper,
	.responsive-site-style-boxed .widget-wrapper,
	.responsive-site-style-boxed .site-content article.product {
	    padding: ' . responsive_spacing_css( $box_padding_top, $box_padding_right, $box_padding_bottom, $box_padding_left ) . ';
	}

	@media screen and ( max-width: 992px ) {
		.responsive-site-style-content-boxed .hentry,
		.responsive-site-style-content-boxed .site-content-header,
		.responsive-site-style-content-boxed .navigation,
		.responsive-site-style-content-boxed .comments-area,
		.responsive-site-style-content-boxed .comment-respond,
		.responsive-site-style-boxed .site-content-header,
		.responsive-site-style-boxed .hentry,
		.responsive-site-style-boxed .navigation,
		.responsive-site-style-boxed .comments-area,
		.responsive-site-style-boxed .comment-respond,
		.page.front-page.responsive-site-style-flat .widget-wrapper,
		.blog.front-page.responsive-site-style-flat .widget-wrapper,
		.responsive-site-style-boxed .widget-wrapper,
		.responsive-site-style-boxed .site-content article.product,
		.page-template-gutenberg-fullwidth.responsive-site-style-content-boxed .hentry .post-entry > div:not(.wp-block-cover):not(.wp-block-coblocks-map),
		.page-template-gutenberg-fullwidth.responsive-site-style-boxed .hentry .post-entry > div:not(.wp-block-cover):not(.wp-block-coblocks-map) {
		    padding: ' . responsive_spacing_css( $box_tablet_padding_top, $box_tablet_padding_right, $box_tablet_padding_bottom, $box_tablet_padding_left ) . ';
		}
	}

	@media screen and ( max-width: 576px ) {
		.responsive-site-style-content-boxed .site-content-header,
		.responsive-site-style-content-boxed .hentry,
		.responsive-site-style-content-boxed .navigation,
		.responsive-site-style-content-boxed .comments-area,
		.responsive-site-style-content-boxed .comment-respond,
		.responsive-site-style-boxed .site-content-header,
		.responsive-site-style-boxed .hentry,
		.responsive-site-style-boxed .navigation,
		.responsive-site-style-boxed .comments-area,
		.responsive-site-style-boxed .comment-respond,
		.page.front-page.responsive-site-style-flat .widget-wrapper,
		.blog.front-page.responsive-site-style-flat .widget-wrapper,
		.responsive-site-style-boxed .widget-wrapper,
		.responsive-site-style-boxed .site-content article.product,
		.page-template-gutenberg-fullwidth.responsive-site-style-content-boxed .hentry .post-entry > div:not(.wp-block-cover):not(.wp-block-coblocks-map),
		.page-template-gutenberg-fullwidth.responsive-site-style-boxed .hentry .post-entry > div:not(.wp-block-cover):not(.wp-block-coblocks-map) {
			padding: ' . responsive_spacing_css( $box_mobile_padding_top, $box_mobile_padding_right, $box_mobile_padding_bottom, $box_mobile_padding_left ) . ';
		}
	}';

	$body_text_color      = esc_html( get_theme_mod( 'responsive_body_text_color', '#333333' ) );
	$meta_text_color      = esc_html( get_theme_mod( 'responsive_meta_text_color', '#999999' ) );
	$box_background_color = esc_html( get_theme_mod( 'responsive_box_background_color', '#ffffff' ) );

	$link_color       = esc_html( get_theme_mod( 'responsive_link_color', '#0066CC' ) );
	$link_hover_color = esc_html( get_theme_mod( 'responsive_link_hover_color', '#10659C' ) );

	$button_color              = esc_html( get_theme_mod( 'responsive_button_color', '#0066CC' ) );
	$button_hover_color        = esc_html( get_theme_mod( 'responsive_button_hover_color', '#10659C' ) );
	$button_text_color         = esc_html( get_theme_mod( 'responsive_button_text_color', '#FFFFFF' ) );
	$button_hover_text_color   = esc_html( get_theme_mod( 'responsive_button_hover_text_color', '#FFFFFF' ) );
	$button_border_color       = esc_html( get_theme_mod( 'responsive_button_border_color', '#10659C' ) );
	$button_hover_border_color = esc_html( get_theme_mod( 'responsive_button_hover_border_color', '#0066CC' ) );

	// Buttons Padding.
	$buttons_padding_right  = esc_html( get_theme_mod( 'responsive_buttons_right_padding', 10 ) );
	$buttons_padding_left   = esc_html( get_theme_mod( 'responsive_buttons_left_padding', 10 ) );
	$buttons_padding_top    = esc_html( get_theme_mod( 'responsive_buttons_top_padding', 10 ) );
	$buttons_padding_bottom = esc_html( get_theme_mod( 'responsive_buttons_bottom_padding', 10 ) );

	$buttons_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_buttons_tablet_right_padding', 10 ) );
	$buttons_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_buttons_tablet_left_padding', 10 ) );
	$buttons_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_buttons_tablet_top_padding', 10 ) );
	$buttons_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_buttons_tablet_bottom_padding', 10 ) );

	$buttons_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_buttons_mobile_right_padding', 10 ) );
	$buttons_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_buttons_mobile_left_padding', 10 ) );
	$buttons_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_buttons_mobile_top_padding', 10 ) );
	$buttons_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_buttons_mobile_bottom_padding', 10 ) );

	$buttons_radius       = esc_html( get_theme_mod( 'responsive_buttons_radius', 0 ) );
	$buttons_border_width = esc_html( get_theme_mod( 'responsive_buttons_border_width', 0 ) );

	// Inputs Padding.
	$inputs_padding_right  = esc_html( get_theme_mod( 'responsive_inputs_right_padding', 3 ) );
	$inputs_padding_left   = esc_html( get_theme_mod( 'responsive_inputs_left_padding', 3 ) );
	$inputs_padding_top    = esc_html( get_theme_mod( 'responsive_inputs_top_padding', 3 ) );
	$inputs_padding_bottom = esc_html( get_theme_mod( 'responsive_inputs_bottom_padding', 3 ) );

	$inputs_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_inputs_tablet_right_padding', 3 ) );
	$inputs_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_inputs_tablet_left_padding', 3 ) );
	$inputs_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_inputs_tablet_top_padding', 3 ) );
	$inputs_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_inputs_tablet_bottom_padding', 3 ) );

	$inputs_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_inputs_mobile_right_padding', 3 ) );
	$inputs_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_inputs_mobile_left_padding', 3 ) );
	$inputs_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_inputs_mobile_top_padding', 3 ) );
	$inputs_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_inputs_mobile_bottom_padding', 3 ) );

	$inputs_radius           = esc_html( get_theme_mod( 'responsive_inputs_radius', 0 ) );
	$inputs_border_width     = esc_html( get_theme_mod( 'responsive_inputs_border_width', 1 ) );
	$inputs_border_color     = esc_html( get_theme_mod( 'responsive_inputs_border_color', '#cccccc' ) );
	$inputs_text_color       = esc_html( get_theme_mod( 'responsive_inputs_text_color', '#333333' ) );
	$inputs_background_color = esc_html( get_theme_mod( 'responsive_inputs_background_color', '#FFFFFF' ) );

	$label_color = esc_html( get_theme_mod( 'responsive_label_color', '#333333' ) );

	$body_typography = get_theme_mod( 'body_typography' );

	if ( $body_typography ) {
		foreach ( $body_typography as $key => $value ) {
			if ( 'font-family' === $key ) {
				$custom_css .= '.has-body-font-family{' . $key . ':' . $value . '; }';
			}
		}
	}
	for ( $i = 1; $i < 7; $i++ ) {
		if ( get_theme_mod( 'heading_h' . $i . '_typography' ) ) {
			foreach ( get_theme_mod( 'heading_h' . $i . '_typography' ) as $key => $value ) {
				if ( 'font-family' === $key ) {
					$custom_css .= '.has-h' . $i . '-font-family{' . $key . ':' . $value . '; }';
				}
			}
		}
	}

	$custom_css .= "
	body {
		color:{$body_text_color};
	}
	.post-meta *, .hentry .post-meta a {
	    color:{$meta_text_color};
	}
	a {
		color:{$link_color};
	}
	a:hover {
		color:{$link_hover_color};
	}
	label {
		color:{$label_color};
	}
	";

	$custom_css .= '
	.page.front-page .button,
	.blog.front-page .button,
	.read-more-button .hentry .read-more .more-link,
	input[type=button],
	input[type=submit],
	button,
	.button,
	.wp-block-button__link,
	div.wpforms-container-full .wpforms-form input[type=submit],
	body div.wpforms-container-full .wpforms-form button[type=submit],
	div.wpforms-container-full .wpforms-form .wpforms-page-button {
		background-color:' . $button_color . ';
		border: ' . $buttons_border_width . 'px solid ' . $button_border_color . ';
		border-radius:' . $buttons_radius . 'px;
	    color: ' . $button_text_color . ';
		padding: ' . responsive_spacing_css( $buttons_padding_top, $buttons_padding_right, $buttons_padding_bottom, $buttons_padding_left ) . ';
	}
	@media screen and ( max-width: 992px ) {
		.page.front-page .button,
		.blog.front-page .button,
		.read-more-button .hentry .read-more .more-link,
		input[type=button],
		.wp-block-button__link,
		input[type=submit],
		button,
		.button,
		div.wpforms-container-full .wpforms-form input[type=submit],
		div.wpforms-container-full .wpforms-form button[type=submit],
		div.wpforms-container-full .wpforms-form .wpforms-page-button {
			padding: ' . responsive_spacing_css( $buttons_tablet_padding_top, $buttons_tablet_padding_right, $buttons_tablet_padding_bottom, $buttons_tablet_padding_left ) . ';
		}
	}

	@media screen and ( max-width: 576px ) {
		.page.front-page .button,
		.blog.front-page .button,
		.read-more-button .hentry .read-more .more-link,
		input[type=button],
		.wp-block-button__link,
		input[type=submit],
		button,
		.button,
		div.wpforms-container-full .wpforms-form input[type=submit],
		div.wpforms-container-full .wpforms-form button[type=submit],
		div.wpforms-container-full .wpforms-form .wpforms-page-button {
			padding: ' . responsive_spacing_css( $buttons_mobile_padding_top, $buttons_mobile_padding_right, $buttons_mobile_padding_bottom, $buttons_mobile_padding_left ) . ';
		}
	}

	.page.front-page .button:focus,
	.blog.front-page .button:focus,
	.page.front-page .button:hover,
	.blog.front-page .button:hover,
	.wp-block-button__link.has-text-color.has-background:focus,
	.wp-block-button__link.has-text-color.has-background:hover,
	.wp-block-button__link.has-text-color:focus,
	.wp-block-button__link.has-text-color:hover,
	.wp-block-button__link.has-background:hover,
	.wp-block-button__link.has-background:focus {
		color:' . $button_hover_text_color . ' !important;
		background-color:' . $button_hover_color . ' !important;
	}

	.wp-block-button__link:focus,
	.wp-block-button__link:hover,
	.read-more-button .hentry .read-more .more-link:hover,
	.read-more-button .hentry .read-more .more-link:focus,
	input[type=button]:hover,
	input[type=submit]:hover,
	input[type=button]:focus,
	input[type=submit]:focus,
	button:hover,
	button:focus,
	.button:hover,
	.button:focus,
	div.wpforms-container-full .wpforms-form input[type=submit]:hover,
	div.wpforms-container-full .wpforms-form input[type=submit]:focus,
	div.wpforms-container-full .wpforms-form input[type=submit]:active,
	div.wpforms-container-full .wpforms-form button[type=submit]:hover,
	div.wpforms-container-full .wpforms-form button[type=submit]:focus,
	div.wpforms-container-full .wpforms-form button[type=submit]:active,
	div.wpforms-container-full .wpforms-form .wpforms-page-button:hover,
	div.wpforms-container-full .wpforms-form .wpforms-page-button:active,
	div.wpforms-container-full .wpforms-form .wpforms-page-button:focus {
	    color:' . $button_hover_text_color . ';
		border: ' . $buttons_border_width . 'px solid ' . $button_hover_border_color . ';
		background-color:' . $button_hover_color . ';
	}

	select,
	textarea,
	input[type=tel],
	input[type=email],
	input[type=number],
	input[type=search],
	input[type=text],
	input[type=date],
	input[type=datetime],
	input[type=datetime-local],
	input[type=month],
	input[type=password],
	input[type=range],
	input[type=time],
	input[type=url],
	input[type=week],
	div.wpforms-container-full .wpforms-form input[type=date],
	div.wpforms-container-full .wpforms-form input[type=datetime],
	div.wpforms-container-full .wpforms-form input[type=datetime-local],
	body div.wpforms-container-full .wpforms-form input[type=email],
	div.wpforms-container-full .wpforms-form input[type=month],
	div.wpforms-container-full .wpforms-form input[type=number],
	div.wpforms-container-full .wpforms-form input[type=password],
	div.wpforms-container-full .wpforms-form input[type=range],
	div.wpforms-container-full .wpforms-form input[type=search],
	div.wpforms-container-full .wpforms-form input[type=tel],
	div.wpforms-container-full .wpforms-form input[type=text],
	div.wpforms-container-full .wpforms-form input[type=time],
	div.wpforms-container-full .wpforms-form input[type=url],
	div.wpforms-container-full .wpforms-form input[type=week],
	div.wpforms-container-full .wpforms-form select,
	div.wpforms-container-full .wpforms-form textarea {
		color: ' . $inputs_text_color . ';
		background-color: ' . $inputs_background_color . ';
		border: ' . $inputs_border_width . 'px solid ' . $inputs_border_color . ';
		border-radius: ' . $inputs_radius . 'px;
		line-height: 1.75;
		padding: ' . responsive_spacing_css( $inputs_padding_top, $inputs_padding_right, $inputs_padding_bottom, $inputs_padding_left ) . ';
		height: auto;
	}
	div.wpforms-container-full .wpforms-form select,
	select {
		background-image:
			linear-gradient(45deg, transparent 50%, ' . $inputs_text_color . ' 50%),
			linear-gradient(135deg, ' . $inputs_text_color . ' 50%, transparent 50%);
	}
	div.wpforms-container-full .wpforms-form .wpforms-field input.wpforms-error,
	div.wpforms-container-full .wpforms-form .wpforms-field input.user-invalid,
	div.wpforms-container-full .wpforms-form .wpforms-field textarea.wpforms-error,
	div.wpforms-container-full .wpforms-form .wpforms-field textarea.user-invalid,
	div.wpforms-container-full .wpforms-form .wpforms-field select.wpforms-error,
	div.wpforms-container-full .wpforms-form .wpforms-field select.user-invalid {
		border-width: ' . $inputs_border_width . 'px;
	}
	@media screen and ( max-width: 992px ) {
		select,
		textarea,
		input[type=tel],
		input[type=email],
		input[type=number],
		input[type=search],
		input[type=text],
		input[type=date],
		input[type=datetime],
		input[type=datetime-local],
		input[type=month],
		input[type=password],
		input[type=range],
		input[type=time],
		input[type=url],
		input[type=week],
		div.wpforms-container-full .wpforms-form input[type=date],
		div.wpforms-container-full .wpforms-form input[type=datetime],
		div.wpforms-container-full .wpforms-form input[type=datetime-local],
		div.wpforms-container-full .wpforms-form input[type=email],
		div.wpforms-container-full .wpforms-form input[type=month],
		div.wpforms-container-full .wpforms-form input[type=number],
		div.wpforms-container-full .wpforms-form input[type=password],
		div.wpforms-container-full .wpforms-form input[type=range],
		div.wpforms-container-full .wpforms-form input[type=search],
		div.wpforms-container-full .wpforms-form input[type=tel],
		div.wpforms-container-full .wpforms-form input[type=text],
		div.wpforms-container-full .wpforms-form input[type=time],
		div.wpforms-container-full .wpforms-form input[type=url],
		div.wpforms-container-full .wpforms-form input[type=week],
		div.wpforms-container-full .wpforms-form select,
		div.wpforms-container-full .wpforms-form textarea {
			padding: ' . responsive_spacing_css( $inputs_tablet_padding_top, $inputs_tablet_padding_right, $inputs_tablet_padding_bottom, $inputs_tablet_padding_left ) . ';
		}
	}
	@media screen and ( max-width: 576px ) {
		select,
		textarea,
		input[type=tel],
		input[type=email],
		input[type=number],
		input[type=search],
		input[type=text],
		input[type=date],
		input[type=datetime],
		input[type=datetime-local],
		input[type=month],
		input[type=password],
		input[type=range],
		input[type=time],
		input[type=url],
		input[type=week],
		div.wpforms-container-full .wpforms-form input[type=date],
		div.wpforms-container-full .wpforms-form input[type=datetime],
		div.wpforms-container-full .wpforms-form input[type=datetime-local],
		div.wpforms-container-full .wpforms-form input[type=email],
		div.wpforms-container-full .wpforms-form input[type=month],
		div.wpforms-container-full .wpforms-form input[type=number],
		div.wpforms-container-full .wpforms-form input[type=password],
		div.wpforms-container-full .wpforms-form input[type=range],
		div.wpforms-container-full .wpforms-form input[type=search],
		div.wpforms-container-full .wpforms-form input[type=tel],
		div.wpforms-container-full .wpforms-form input[type=text],
		div.wpforms-container-full .wpforms-form input[type=time],
		div.wpforms-container-full .wpforms-form input[type=url],
		div.wpforms-container-full .wpforms-form input[type=week],
		div.wpforms-container-full .wpforms-form select,
		div.wpforms-container-full .wpforms-form textarea {
			padding: ' . responsive_spacing_css( $inputs_mobile_padding_top, $inputs_mobile_padding_right, $inputs_mobile_padding_bottom, $inputs_mobile_padding_left ) . ';
		}
	}
	';

	for ( $i = 1; $i < 7; $i++ ) {
		$custom_css .= 'h' . $i . ' {
		    color: ' . esc_html( get_theme_mod( "responsive_h{$i}_text_color", '#333333' ) ) . ';
		}';
	}

	// Site Content Padding.
	$site_content_padding_right  = esc_html( get_theme_mod( 'responsive_site_content_right_padding' ) );
	$site_content_padding_left   = esc_html( get_theme_mod( 'responsive_site_content_left_padding' ) );
	$site_content_padding_top    = esc_html( get_theme_mod( 'responsive_site_content_top_padding', 28 ) );
	$site_content_padding_bottom = esc_html( get_theme_mod( 'responsive_site_content_bottom_padding', 28 ) );

	$site_content_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_site_content_tablet_right_padding' ) );
	$site_content_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_site_content_tablet_left_padding' ) );
	$site_content_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_site_content_tablet_top_padding', 28 ) );
	$site_content_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_site_content_tablet_bottom_padding', 28 ) );

	$site_content_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_site_content_mobile_right_padding' ) );
	$site_content_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_site_content_mobile_left_padding' ) );
	$site_content_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_site_content_mobile_top_padding', 28 ) );
	$site_content_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_site_content_mobile_bottom_padding', 28 ) );

	// Header Padding.
	$header_padding_right  = esc_html( get_theme_mod( 'responsive_header_right_padding' ) );
	$header_padding_left   = esc_html( get_theme_mod( 'responsive_header_left_padding' ) );
	$header_padding_top    = esc_html( get_theme_mod( 'responsive_header_top_padding', 28 ) );
	$header_padding_bottom = esc_html( get_theme_mod( 'responsive_header_bottom_padding', 28 ) );

	$header_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_header_tablet_right_padding' ) );
	$header_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_header_tablet_left_padding' ) );
	$header_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_header_tablet_top_padding', 28 ) );
	$header_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_header_tablet_bottom_padding', 28 ) );

	$header_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_header_mobile_right_padding' ) );
	$header_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_header_mobile_left_padding' ) );
	$header_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_header_mobile_top_padding', 28 ) );
	$header_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_header_mobile_bottom_padding', 28 ) );

	// Header colors.
	$header_background_color       = esc_html( get_theme_mod( 'responsive_header_background_color', '#ffffff' ) );
	$header_border_color           = esc_html( get_theme_mod( 'responsive_header_border_color', '#eaeaea' ) );
	$header_site_title_color       = esc_html( get_theme_mod( 'responsive_header_site_title_color', '#333333' ) );
	$header_site_title_hover_color = esc_html( get_theme_mod( 'responsive_header_site_title_hover_color', '#10659C' ) );
	$header_text_color             = esc_html( get_theme_mod( 'responsive_header_text_color', '#999999' ) );

	// Menu Color.
	$header_menu_background_color = esc_html( get_theme_mod( 'responsive_header_menu_background_color', '#FFFFFF' ) );
	$header_menu_border_color     = esc_html( get_theme_mod( 'responsive_header_menu_border_color', '#eaeaea' ) );
	$header_menu_link_color       = esc_html( get_theme_mod( 'responsive_header_menu_link_color', '#333333' ) );
	$header_menu_link_hover_color = esc_html( get_theme_mod( 'responsive_header_menu_link_hover_color', '#10659C' ) );

	$header_active_menu_background_color = esc_html( get_theme_mod( 'responsive_header_active_menu_background_color', '#ffffff' ) );

	// Sub Menu Color.
	$header_sub_menu_background_color = esc_html( get_theme_mod( 'responsive_header_sub_menu_background_color', '#FFFFFF' ) );
	$header_sub_menu_link_color       = esc_html( get_theme_mod( 'responsive_header_sub_menu_link_color', '#333333' ) );
	$header_sub_menu_link_hover_color = esc_html( get_theme_mod( 'responsive_header_sub_menu_link_hover_color', '#10659C' ) );

	// Toggle Button Color.
	$header_menu_toggle_background_color = esc_html( get_theme_mod( 'responsive_header_menu_toggle_background_color', 'transparent' ) );
	$header_menu_toggle_color            = esc_html( get_theme_mod( 'responsive_header_menu_toggle_color', '#333333' ) );

	// Mobile Menu.
	$mobile_menu_style = get_theme_mod( 'responsive_mobile_menu_style', 'dropdown' );
	// Mobile Menu Breakpoint.
	$disable_mobile_menu    = get_theme_mod( 'responsive_disable_mobile_menu', 1 );
	$mobile_menu_breakpoint = esc_html( get_theme_mod( 'responsive_mobile_menu_breakpoint', 992 ) );

	if ( 0 === $disable_mobile_menu ) {
		$mobile_menu_breakpoint = 0;
	}

	$trans_header_menu_background_color = $header_menu_background_color;
	$trans_header_menu_border_color     = $header_menu_border_color;
	if ( get_theme_mod( 'responsive_transparent_header', 0 ) ) {
		$trans_header_menu_background_color = 'none';
		$trans_header_menu_border_color     = 'none';

		$custom_css .= "
        .res-transparent-header .site-header .main-navigation.toggled{
            border-bottom-color: 'none';
            background-color: {$header_background_color};
        }
		";
	}
	$custom_css .= "@media (min-width:{$mobile_menu_breakpoint}px) {
		.main-navigation .menu-toggle {
			display: none;
		}
		.site-branding {
			width: auto;
		}
		.main-navigation .menu {
			display: block;
		}
		.main-navigation .menu > li {
		    border-bottom: none;
		    float: left;
			margin-left: 2px;
		}
		.main-navigation .menu > li.menu-item-has-children > a:after, .main-navigation .menu > li.page_item_has_children > a:after {
			content: '\\f0d7';
			font-family: icomoon;
			margin-left: 5px;
			font-size: 0.96em;
		}
		.main-navigation .children,
		.main-navigation .sub-menu {
		    background-color: #ffffff;
		    box-shadow: 0 5px 10px #eaeaea;
		    left: -9999em;
		    margin-left: 0;
		    top: 100%;
		    position: absolute;
		    width: 240px;
		    z-index: 9999;
		}
		.main-navigation .children > li.focus > .children, .main-navigation .children > li.focus > .sub-menu, .main-navigation .children > li:hover > .children, .main-navigation .children > li:hover > .sub-menu,
		.main-navigation .sub-menu > li.focus > .children,
		.main-navigation .sub-menu > li.focus > .sub-menu,
		.main-navigation .sub-menu > li:hover > .children,
		.main-navigation .sub-menu > li:hover > .sub-menu {
		    left: 100%;
		    top: 0;
		}
		.main-navigation .children > li:first-child,
		.main-navigation .sub-menu > li:first-child {
	    	border-top: none;
	  	}
	  	.main-navigation .children > li.menu-item-has-children > a:after, .main-navigation .children > li.page_item_has_children > a:after,
		.main-navigation .sub-menu > li.menu-item-has-children > a:after,
		.main-navigation .sub-menu > li.page_item_has_children > a:after {
		    content: '\\f0da';
		    float: right;
		    font-family: icomoon;
		    margin-left: 5px;
			font-size: 0.96em;
	  	}
	  	.main-navigation .children a,
		.main-navigation .sub-menu a {
	    	padding: 5px 15px;
	  	}
	  	.site-header-layout-horizontal.site-header-main-navigation-site-branding .main-navigation .menu > li {
		    margin-left: 0;
			margin-right: 2px;
		}
	  	.site-header-layout-vertical .site-header .row {
	    	flex-direction: column;
	  	}
	  	.site-header-layout-vertical .main-navigation .menu > li {
		    margin-left: 0;
			margin-right: 2px;
	  	}
	  	.site-header-layout-vertical.site-header-alignment-center .main-navigation .menu {
		    display: table;
		    margin-left: auto;
		    margin-right: auto;
		    width: auto;
	  	}
	  	.site-header-layout-vertical.site-header-alignment-center .main-navigation .menu > li {
		    margin-left: 1px;
		    margin-right: 1px;
		}
	  	.site-header-layout-vertical.site-header-alignment-right .main-navigation .menu {
		    display: table;
		    margin-right: 0;
		    margin-left: auto;
	  	}
	  	.site-header-layout-vertical.site-header-alignment-right .main-navigation .menu > li {
		    margin-left: 1px;
		    margin-right: 0;
	  	}
	  	.site-header-layout-vertical.site-header-full-width-main-navigation .main-navigation {
		    margin-left: calc( 50% - 50vw );
		    margin-right: calc( 50% - 50vw );
		    max-width: 100vw;
		    width: 100vw;
	  	}
		.site-header-layout-horizontal .site-header .row {
	    	flex-wrap: nowrap;
	    }
	}
  	@media screen and ( max-width: {$mobile_menu_breakpoint}px ) {
		.site-header-layout-horizontal.site-header-main-navigation-site-branding .main-navigation .menu-toggle {
			bottom:{$header_tablet_padding_bottom}px;
		}
		.site-header-layout-horizontal.site-header-site-branding-main-navigation .main-navigation .menu-toggle {
			top:{$header_tablet_padding_top}px;
		}
	}
	@media screen and ( max-width: 576px ) {
		.site-header-layout-horizontal.site-header-main-navigation-site-branding .main-navigation .menu-toggle {
			bottom:{$header_mobile_padding_bottom}px;
		}
		.site-header-layout-horizontal.site-header-site-branding-main-navigation .main-navigation .menu-toggle {
			top:{$header_mobile_padding_top}px;
		}
	}
	.site-title a {
		color: {$header_site_title_color};
	}
	.site-title a:hover {
		color: {$header_site_title_hover_color};
	}
	.site-description {
		color: {$header_text_color};
	}
	.site-header {
		border-bottom-color: {$header_border_color};
		background-color: {$header_background_color};
	}
	.res-transparent-header .main-navigation.toggled {
		background-color: {$header_menu_background_color};
	}
	.header-full-width.site-header-layout-vertical .main-navigation,
	.site-header-layout-vertical.site-header-full-width-main-navigation .main-navigation,
	.responsive-site-full-width.site-header-layout-vertical .main-navigation,
	.site-header-layout-vertical .main-navigation div {
		background-color: {$trans_header_menu_background_color};
	}
	@media ( max-width: {$mobile_menu_breakpoint}px ) {
		.site-header-layout-vertical .main-navigation {
			background-color: {$trans_header_menu_background_color};
		}
		.site-header-layout-vertical.site-header-site-branding-main-navigation:not(.site-header-full-width-main-navigation) .main-navigation {
			border-top: 1px solid {$trans_header_menu_border_color};
		}
		.site-header-layout-vertical.site-header-main-navigation-site-branding:not(.site-header-full-width-main-navigation) .main-navigation {
			border-bottom: 1px solid {$trans_header_menu_border_color};
		}

	}
	@media ( min-width: {$mobile_menu_breakpoint}px ) {
		.header-full-width.site-header-layout-vertical.site-header-site-branding-main-navigation .main-navigation,
		.responsive-site-full-width.site-header-layout-vertical.site-header-site-branding-main-navigation .main-navigation,
		.site-header-layout-vertical.site-header-site-branding-main-navigation:not(.site-header-full-width-main-navigation):not(.responsive-site-full-width):not(.header-full-width) .main-navigation div {
			border-top: 1px solid {$trans_header_menu_border_color};
		}

		.header-full-width.site-header-layout-vertical.site-header-main-navigation-site-branding .main-navigation,
		.responsive-site-full-width.site-header-layout-vertical.site-header-main-navigation-site-branding .main-navigation,
		.site-header-layout-vertical.site-header-main-navigation-site-branding:not(.site-header-full-width-main-navigation):not(.responsive-site-full-width):not(.header-full-width) .main-navigation div {
			border-bottom: 1px solid {$trans_header_menu_border_color};
		}
	}
	.site-header-layout-vertical.site-header-full-width-main-navigation.site-header-site-branding-main-navigation .main-navigation {
		border-top: 1px solid {$trans_header_menu_border_color};
	}
	.site-header-layout-vertical.site-header-full-width-main-navigation.site-header-main-navigation-site-branding .main-navigation {
		border-bottom: 1px solid {$trans_header_menu_border_color};
	}
	.main-navigation .menu > li > a {
		color: {$header_menu_link_color};
	}

	.main-navigation .menu  .current_page_item > a,
	.main-navigation .menu  .current-menu-item > a,
	.main-navigation .menu  li > a:hover {
		color: {$header_menu_link_hover_color};
		background-color: {$header_active_menu_background_color};
	}
	.main-navigation .children,
	.main-navigation .sub-menu {
		background-color: {$header_sub_menu_background_color};
	}
	.main-navigation .children li a,
	.main-navigation .sub-menu li a {
		color: {$header_sub_menu_link_color};
	}
	.main-navigation .children li a:hover,
	.main-navigation .sub-menu li a:hover {
		color: {$header_sub_menu_link_hover_color};
	}
	.main-navigation .menu-toggle {
		background-color: {$header_menu_toggle_background_color};
		color: {$header_menu_toggle_color};
	}";

	$custom_css .= '.site-branding-wrapper {
		padding: ' . responsive_spacing_css( $header_padding_top, $header_padding_right, $header_padding_bottom, $header_padding_left ) . ';

	}
	@media screen and ( max-width: 992px ) {
		.site-branding-wrapper {
			padding: ' . responsive_spacing_css( $header_tablet_padding_top, $header_tablet_padding_right, $header_tablet_padding_bottom, $header_tablet_padding_left ) . ';
		}
	}
	@media screen and ( max-width: 576px ) {
		.site-branding-wrapper {
			padding: ' . responsive_spacing_css( $header_mobile_padding_top, $header_mobile_padding_right, $header_mobile_padding_bottom, $header_mobile_padding_left ) . ';
		}
	}';
	$custom_css .= '.res-transparent-header .site-content {
		padding: ' . responsive_spacing_css( $site_content_padding_top, $site_content_padding_right, $site_content_padding_bottom, $site_content_padding_left ) . ';

	}
	@media screen and ( max-width: 992px ) {
		.res-transparent-header .site-content {
			padding: ' . responsive_spacing_css( $site_content_tablet_padding_top, $site_content_tablet_padding_right, $site_content_tablet_padding_bottom, $site_content_tablet_padding_left ) . ';
		}
	}
	@media screen and ( max-width: 576px ) {
		.res-transparent-header .site-content {
			padding: ' . responsive_spacing_css( $site_content_mobile_padding_top, $site_content_mobile_padding_right, $site_content_mobile_padding_bottom, $site_content_mobile_padding_left ) . ';
		}
	}';

	if ( 'fullscreen' === $mobile_menu_style ) {
		$custom_css .= "@media (max-width:{$mobile_menu_breakpoint}px) {
			.main-navigation.toggled {
				background-color: {$header_menu_background_color};
				height: 100%;
				left: 0;
			    overflow-y: scroll;
				padding: 50px;
				position: fixed;
				top: 0;
				width: 100%;
			    z-index: 100000;
			}
			.main-navigation.toggled .menu {
				margin-top: 70px;
			    margin: 0 auto;
			}
			.site-header-layout-vertical .main-navigation.toggled .menu {
				margin-top: 0px;
			}
		}";

	} elseif ( 'sidebar' === $mobile_menu_style ) {
		$custom_css .= "@media (max-width:{$mobile_menu_breakpoint}px) {
			.mobile-menu-style-sidebar .main-navigation {
				-webkit-transition-property: width, display; /* Safari */
				-webkit-transition-duration: 0.6s; /* Safari */
				-webkit-transition-delay: 0s; /* Safari */
				transition-property: width, display;
				transition-duration: 0.6s;
				transition-delay: 0s;
			}
			.mobile-menu-style-sidebar .main-navigation.toggled {
			    background-color: {$header_menu_background_color};
				height: 100%;
				left: 0;
			    overflow-y: scroll;
				padding: 15px;
				position: fixed;
				top: 0;
				width: 300px;
			    z-index: 100000;
			}
			.mobile-menu-style-sidebar .main-navigation.toggled .menu-toggle {
				position: absolute;
				top: 28px;
				right: 15px;
			}
			.site-header-layout-vertical .main-navigation.toggled .menu,
			.main-navigation.toggled .menu {
				margin-top: 70px;
			}
			.site-header-layout-vertical.site-header-alignment-left .main-navigation.toggled .menu-toggle {
				text-align: right;
			}
			.site-header-layout-vertical.site-header-alignment-right .main-navigation.toggled .menu-toggle {
				text-align: left;
			}
		}";

		if ( 'right' === get_theme_mod( 'responsive_sidebar_menu_alignment', 'left' ) ) {
			$custom_css .= "@media (max-width:{$mobile_menu_breakpoint}px) {
				.mobile-menu-style-sidebar .main-navigation.toggled {
					left: auto;
					right: 0;
				}
				.mobile-menu-style-sidebar .main-navigation.toggled .menu-toggle {
					left: 15px;
					right: auto;
				}
			}";
		}
	}

	// Content_Header colors.
	$content_header_heading_color     = esc_html( get_theme_mod( 'responsive_content_header_heading_color', '#333333' ) );
	$content_header_description_color = esc_html( get_theme_mod( 'responsive_content_header_description_color', '#333333' ) );
	$breadcrumb_color                 = esc_html( get_theme_mod( 'responsive_breadcrumb_color', '#1e73be' ) );

	$custom_css .= "
	.site-content-header .page-header .page-title,
	.site-content-header .page-title {
		color: {$content_header_heading_color};
	}
	.site-content-header .page-header .page-description,
	.site-content-header .page-description {
		color: {$content_header_description_color};
	}
	.site-content-header .breadcrumb-list,
	.site-content-header .breadcrumb-list a {
		color: {$breadcrumb_color};
	}";

	// Entry Blog Styles.
	$blog_content_width = esc_html( get_theme_mod( 'responsive_blog_content_width', 66 ) );

	$custom_css .= "
	@media (min-width:992px) {
		.search:not(.woocommerce) .content-area,
		.archive:not(.woocommerce) .content-area,
		.blog:not(.woocommerce):not(.custom-home-page-active) .content-area {
			width:{$blog_content_width}%;
		}
		.search:not(.woocommerce) aside.widget-area,
		.archive:not(.woocommerce) aside.widget-area,
		.blog:not(.woocommerce):not(.custom-home-page-active) aside.widget-area {
			width: calc(100% - {$blog_content_width}%);
		}
	}";

	// Entry Blog featured image.
	$blog_entry_featured_image_style = get_theme_mod( 'responsive_blog_entry_featured_image_style', 'default' );

	if ( 'stretched' === $blog_entry_featured_image_style ) {
		$custom_css .= "
		.search .thumbnail-caption,
		.archive .thumbnail-caption,
		.blog .thumbnail-caption {
			text-align: center;
		}
		.search.responsive-site-style-boxed .site-content article.product .post-entry .thumbnail,
		.search.responsive-site-style-content-boxed .hentry .thumbnail,
		.search.responsive-site-style-boxed .hentry .thumbnail,
		.archive.responsive-site-style-content-boxed .hentry .thumbnail,
		.archive.responsive-site-style-boxed .hentry .thumbnail,
		.blog.responsive-site-style-content-boxed .hentry .thumbnail,
		.blog.responsive-site-style-boxed .hentry .thumbnail {
			margin-left: -{$box_padding_left}px;
			margin-right: -{$box_padding_right}px;
		}
		.search.responsive-site-style-boxed article.product .post-entry > .thumbnail:first-child,
		.search.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
		.search.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child,
		.archive.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
		.archive.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child,
		.blog.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
		.blog.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child {
			margin-top: -{$box_padding_top}px;
		}
		@media (max-width:992px) {
			.search.responsive-site-style-boxed .site-content article.product .post-entry .thumbnail,
			.search.responsive-site-style-content-boxed .hentry .thumbnail,
			.search.responsive-site-style-boxed .hentry .thumbnail,
			.archive.responsive-site-style-content-boxed .hentry .thumbnail,
			.archive.responsive-site-style-boxed .hentry .thumbnail,
			.blog.responsive-site-style-content-boxed .hentry .thumbnail,
			.blog.responsive-site-style-boxed .hentry .thumbnail {
				margin-left: -{$box_tablet_padding_left}px;
				margin-right: -{$box_tablet_padding_right}px;
			}
			.search.responsive-site-style-boxed article.product .post-entry > .thumbnail:first-child,
			.search.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
			.search.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child,
			.archive.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
			.archive.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child,
			.blog.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
			.blog.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child {
				margin-top: -{$box_tablet_padding_top}px;
			}
		}
		@media (max-width:576px) {
			.search.responsive-site-style-boxed .site-content article.product .post-entry .thumbnail,
			.search.responsive-site-style-content-boxed .hentry .thumbnail,
			.search.responsive-site-style-boxed .hentry .thumbnail,
			.archive.responsive-site-style-content-boxed .hentry .thumbnail,
			.archive.responsive-site-style-boxed .hentry .thumbnail,
			.blog.responsive-site-style-content-boxed .hentry .thumbnail,
			.blog.responsive-site-style-boxed .hentry .thumbnail {
				margin-left: -{$box_mobile_padding_left}px;
				margin-right: -{$box_mobile_padding_right}px;
			}
			.search.responsive-site-style-boxed article.product .post-entry > .thumbnail:first-child,
			.search.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
			.search.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child,
			.archive.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
			.archive.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child,
			.blog.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
			.blog.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child {
				margin-top: -{$box_mobile_padding_top}px;
			}
		}";
	}

	// Entry Blog Meta Separator.
	$blog_entry_meta_separator = esc_html( get_theme_mod( 'responsive_blog_entry_meta_separator_text', '-' ) );

	$custom_css .= "
	.search .hentry .post-meta > span::after,
	.archive .hentry .post-meta > span::after,
	.blog .hentry .post-meta > span::after {
	    content: '{$blog_entry_meta_separator}';
	}";

	// Single Blog Styles.
	$single_blog_content_width = esc_html( get_theme_mod( 'responsive_single_blog_content_width', 66 ) );

	$custom_css .= "
	@media (min-width:992px) {
		.single:not(.woocommerce) .content-area {
			width:{$single_blog_content_width}%;
		}
		.single:not(.woocommerce) aside.widget-area {
			width: calc(100% - {$single_blog_content_width}%);
		}
	}";

	// Single Blog featured image.
	$single_blog_entry_featured_image_style = esc_html( get_theme_mod( 'responsive_single_blog_featured_image_style', 'default' ) );

	if ( 'stretched' === $single_blog_entry_featured_image_style ) {
		$custom_css .= "
		.single .thumbnail-caption {
			text-align: center;
		}
		.single.responsive-site-style-content-boxed .hentry .thumbnail,
		.single.responsive-site-style-boxed .hentry .thumbnail {
			margin-left: -{$box_padding_left}px;
			margin-right: -{$box_padding_right}px;
		}
		.single.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
		.single.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child {
			margin-top: -{$box_padding_top}px;
		}
		@media (max-width:992px) {
			.single.responsive-site-style-content-boxed .hentry .thumbnail,
			.single.responsive-site-style-boxed .hentry .thumbnail {
				margin-left: -{$box_tablet_padding_left}px;
				margin-right: -{$box_tablet_padding_right}px;
			}
			.single.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
			.single.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child {
				margin-top: -{$box_tablet_padding_top}px;
			}
		}
		@media (max-width:576px) {
			.single.responsive-site-style-content-boxed .hentry .thumbnail,
			.single.responsive-site-style-boxed .hentry .thumbnail {
				margin-left: -{$box_mobile_padding_left}px;
				margin-right: -{$box_mobile_padding_right}px;
			}
			.single.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
			.single.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child {
				margin-top: -{$box_mobile_padding_top}px;
			}
		}";
	}

	// Entry Blog Meta Separator.
	$single_blog_entry_meta_separator = esc_html( get_theme_mod( 'responsive_single_blog_meta_separator_text', '-' ) );

	$custom_css .= "
	.single .hentry .post-meta > span::after {
	    content: '{$single_blog_entry_meta_separator}';
	}";

	// Page Styles.
	$page_content_width = esc_html( get_theme_mod( 'responsive_page_content_width', 66 ) );

	$custom_css .= "
	@media (min-width:992px) {
		.page:not(.page-template-gutenberg-fullwidth):not(.page-template-full-width-page):not(.woocommerce):not(.woocommerce-cart):not(.woocommerce-checkout):not(.front-page) .content-area {
			width:{$page_content_width}%;
		}
		.page:not(.woocommerce) aside.widget-area:not(.home-widgets) {
			width: calc(100% - {$page_content_width}%);
		}
	}";

	// Page featured image.
	$page_entry_featured_image_style = get_theme_mod( 'responsive_page_featured_image_style', 'default' );

	if ( 'stretched' === $page_entry_featured_image_style ) {
		$custom_css .= "
		.page .thumbnail-caption {
			text-align: center;
		}
		.page.responsive-site-style-content-boxed .hentry .thumbnail,
		.page.responsive-site-style-boxed .hentry .thumbnail {
			margin-left: -{$box_padding_left}px;
			margin-right: -{$box_padding_right}px;
		}
		.page.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
		.page.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child {
			margin-top: -{$box_padding_top}px;
		}
		@media (max-width:992px) {
			.page.responsive-site-style-content-boxed .hentry .thumbnail,
			.page.responsive-site-style-boxed .hentry .thumbnail {
				margin-left: -{$box_tablet_padding_left}px;
				margin-right: -{$box_tablet_padding_right}px;
			}
			.page.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
			.page.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child {
				margin-top: -{$box_tablet_padding_top}px;
			}
		}
		@media (max-width:576px) {
			.page.responsive-site-style-content-boxed .hentry .thumbnail,
			.page.responsive-site-style-boxed .hentry .thumbnail {
				margin-left: -{$box_mobile_padding_left}px;
				margin-right: -{$box_mobile_padding_right}px;
			}
			.page.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
			.page.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child {
				margin-top: -{$box_mobile_padding_top}px;
			}
		}";
	}

	// Header Widgets Color.
	$header_widget_text_color       = esc_html( get_theme_mod( 'responsive_header_widget_text_color', '#333333' ) );
	$header_widget_background_color = esc_html( get_theme_mod( 'responsive_header_widget_background_color', '#FFFFFF' ) );
	$header_widget_border_color     = esc_html( get_theme_mod( 'responsive_header_widget_border_color', '#eaeaea' ) );
	$header_widget_link_color       = esc_html( get_theme_mod( 'responsive_header_widget_link_color', '#0066CC' ) );
	$header_widget_link_hover_color = esc_html( get_theme_mod( 'responsive_header_widget_link_hover_color', '#eaeaea' ) );

	$custom_css .= "
		.header-widgets {
			background-color: {$header_widget_background_color};
			color: {$header_widget_text_color};
			border-color: {$header_widget_border_color};
		}
		.header-widgets h1,
		.header-widgets h2,
		.header-widgets h3,
		.header-widgets h4,
		.header-widgets h5,
		.header-widgets h6 {
			color:{$header_widget_text_color};
		}
		.header-widgets .widget-title h4 {
			color: {$header_widget_text_color};
		}
		.header-widgets a {
			color: {$header_widget_link_color};
		}
		.header-widgets a:focus,
		.header-widgets a:hover {
			color: {$header_widget_link_hover_color};
		}
	";

	// footer_widgets Padding.
	$footer_widgets_padding_right  = esc_html( get_theme_mod( 'responsive_footer_widgets_right_padding', 0 ) );
	$footer_widgets_padding_left   = esc_html( get_theme_mod( 'responsive_footer_widgets_left_padding', 0 ) );
	$footer_widgets_padding_top    = esc_html( get_theme_mod( 'responsive_footer_widgets_top_padding', 20 ) );
	$footer_widgets_padding_bottom = esc_html( get_theme_mod( 'responsive_footer_widgets_bottom_padding', 20 ) );

	$footer_widgets_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_footer_widgets_tablet_right_padding', 0 ) );
	$footer_widgets_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_footer_widgets_tablet_left_padding', 0 ) );
	$footer_widgets_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_footer_widgets_tablet_top_padding', 20 ) );
	$footer_widgets_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_footer_widgets_tablet_bottom_padding', 20 ) );

	$footer_widgets_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_footer_widgets_mobile_right_padding', 0 ) );
	$footer_widgets_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_footer_widgets_mobile_left_padding', 0 ) );
	$footer_widgets_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_footer_widgets_mobile_top_padding', 20 ) );
	$footer_widgets_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_footer_widgets_mobile_bottom_padding', 20 ) );

	$custom_css .= '.footer-widgets {
	    padding: ' . responsive_spacing_css( $footer_widgets_padding_top, $footer_widgets_padding_right, $footer_widgets_padding_bottom, $footer_widgets_padding_left ) . ';

	}
	@media screen and ( max-width: 992px ) {
	    .footer-widgets {
	        padding: ' . responsive_spacing_css( $footer_widgets_tablet_padding_top, $footer_widgets_tablet_padding_right, $footer_widgets_tablet_padding_bottom, $footer_widgets_tablet_padding_left ) . ';
	    }
	}
	@media screen and ( max-width: 576px ) {
	    .footer-widgets {
	        padding: ' . responsive_spacing_css( $footer_widgets_mobile_padding_top, $footer_widgets_mobile_padding_right, $footer_widgets_mobile_padding_bottom, $footer_widgets_mobile_padding_left ) . ';
	    }
	}';

	// footer_bar Padding.
	$footer_bar_padding_right  = esc_html( get_theme_mod( 'responsive_footer_bar_right_padding', 0 ) );
	$footer_bar_padding_left   = esc_html( get_theme_mod( 'responsive_footer_bar_left_padding', 0 ) );
	$footer_bar_padding_top    = esc_html( get_theme_mod( 'responsive_footer_bar_top_padding', 20 ) );
	$footer_bar_padding_bottom = esc_html( get_theme_mod( 'responsive_footer_bar_bottom_padding', 20 ) );

	$footer_bar_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_footer_bar_tablet_right_padding', 0 ) );
	$footer_bar_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_footer_bar_tablet_left_padding', 0 ) );
	$footer_bar_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_footer_bar_tablet_top_padding', 20 ) );
	$footer_bar_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_footer_bar_tablet_bottom_padding', 20 ) );

	$footer_bar_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_footer_bar_mobile_right_padding', 0 ) );
	$footer_bar_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_footer_bar_mobile_left_padding', 0 ) );
	$footer_bar_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_footer_bar_mobile_top_padding', 20 ) );
	$footer_bar_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_footer_bar_mobile_bottom_padding', 20 ) );

	$custom_css .= '.footer-bar {
	    padding: ' . responsive_spacing_css( $footer_bar_padding_top, $footer_bar_padding_right, $footer_bar_padding_bottom, $footer_bar_padding_left ) . ';

	}
	@media screen and ( max-width: 992px ) {
	    .footer-bar {
	        padding: ' . responsive_spacing_css( $footer_bar_tablet_padding_top, $footer_bar_tablet_padding_right, $footer_bar_tablet_padding_bottom, $footer_bar_tablet_padding_left ) . ';
	    }
	}
	@media screen and ( max-width: 576px ) {
	    .footer-bar {
	        padding: ' . responsive_spacing_css( $footer_bar_mobile_padding_top, $footer_bar_mobile_padding_right, $footer_bar_mobile_padding_bottom, $footer_bar_mobile_padding_left ) . ';
	    }
	}';

	// Footer Colors.
	$footer_text_color       = esc_html( get_theme_mod( 'responsive_footer_text_color', '#ffffff' ) );
	$footer_background_color = esc_html( get_theme_mod( 'responsive_footer_background_color', '#333333' ) );
	$footer_link_color       = esc_html( get_theme_mod( 'responsive_footer_links_color', '#eaeaea' ) );
	$footer_link_hover_color = esc_html( get_theme_mod( 'responsive_footer_links_hover_color', '#ffffff' ) );

	$custom_css .= "
	.site-footer {
		color:{$footer_text_color};
		background-color:{$footer_background_color};
	}
	.site-footer h1,
	.site-footer h2,
	.site-footer h3,
	.site-footer h4,
	.site-footer h5,
	.site-footer h6 {
		color:{$footer_text_color};
	}
	.site-footer a {
		color:{$footer_link_color};
	}
	.site-footer a:focus,
	.site-footer a:hover {
		color:{$footer_link_hover_color};
	}
	";

	wp_add_inline_style( 'responsive-style', apply_filters( 'responsive_head_css', responsive_minimize_css( $custom_css ) ) );

	if ( class_exists( 'WooCommerce' ) ) {
		// WooCommerce.
		$woocommerce_custom_css = '';

		$woocommerce_custom_css .= "
		.wc-block-grid__product-title {
			color:{$body_text_color};
		}
		.woocommerce .woocommerce-breadcrumb,
		.woocommerce .woocommerce-breadcrumb a {
			color: {$breadcrumb_color};
		}";

		$woocommerce_custom_css .= '
		.woocommerce.responsive-site-style-content-boxed .related-product-wrapper,
		.woocommerce-page.responsive-site-style-content-boxed .related-product-wrapper,
		.woocommerce-page.responsive-site-style-content-boxed .products-wrapper,
		.woocommerce.responsive-site-style-content-boxed .products-wrapper,
		.woocommerce-page:not(.responsive-site-style-flat) .woocommerce-pagination,
		.woocommerce-page.responsive-site-style-boxed ul.products li.product,
		.woocommerce.responsive-site-style-boxed ul.products li.product,
		.woocommerce-page.single-product:not(.responsive-site-style-flat) div.product,
		.woocommerce.single-product:not(.responsive-site-style-flat) div.product {
			background-color: ' . $box_background_color . ';
			border-radius: ' . $box_radius . 'px;
			padding: ' . responsive_spacing_css( $box_padding_top, $box_padding_right, $box_padding_bottom, $box_padding_left ) . ';
		}
		@media screen and ( max-width: 992px ) {
			.woocommerce.responsive-site-style-content-boxed .related-product-wrapper,
			.woocommerce-page.responsive-site-style-content-boxed .related-product-wrapper,
			.woocommerce-page.responsive-site-style-content-boxed .products-wrapper,
			.woocommerce.responsive-site-style-content-boxed .products-wrapper,
			.woocommerce-page:not(.responsive-site-style-flat) .woocommerce-pagination,
			.woocommerce-page.responsive-site-style-boxed ul.products li.product,
			.woocommerce.responsive-site-style-boxed ul.products li.product,
			.woocommerce-page.single-product:not(.responsive-site-style-flat) div.product,
			.woocommerce.single-product:not(.responsive-site-style-flat) div.product {
				padding: ' . responsive_spacing_css( $box_tablet_padding_top, $box_tablet_padding_right, $box_tablet_padding_bottom, $box_tablet_padding_left ) . ';
			}
		}
		@media screen and ( max-width: 576px ) {
			.woocommerce.responsive-site-style-content-boxed .related-product-wrapper,
			.woocommerce-page.responsive-site-style-content-boxed .related-product-wrapper,
			.woocommerce-page.responsive-site-style-content-boxed .products-wrapper,
			.woocommerce.responsive-site-style-content-boxed .products-wrapper,
			.woocommerce-page:not(.responsive-site-style-flat) .woocommerce-pagination,
			.woocommerce-page.responsive-site-style-boxed ul.products li.product,
			.woocommerce.responsive-site-style-boxed ul.products li.product,
			.woocommerce-page.single-product:not(.responsive-site-style-flat) div.product,
			.woocommerce.single-product:not(.responsive-site-style-flat) div.product {
				padding: ' . responsive_spacing_css( $box_mobile_padding_top, $box_mobile_padding_right, $box_mobile_padding_bottom, $box_mobile_padding_left ) . ';
			}
			.woocommerce ul.products[class*=columns-] li.product, .woocommerce-page ul.products[class*=columns-] li.product{
		        width:100%;
		    }
		}';

		// Shop Styles.
		$shop_content_width                  = esc_html( get_theme_mod( 'responsive_shop_content_width', 100 ) );
		$shop_product_rating_color           = esc_html( get_theme_mod( 'responsive_shop_product_rating_color', '#0066CC' ) );
		$shop_product_price_color            = esc_html( get_theme_mod( 'responsive_shop_product_price_color', '#333333' ) );
		$add_to_cart_button_color            = esc_html( get_theme_mod( 'responsive_add_to_cart_button_color', '#0066CC' ) );
		$add_to_cart_button_text_color       = esc_html( get_theme_mod( 'responsive_add_to_cart_button_text_color', '#ffffff' ) );
		$add_to_cart_button_hover_color      = esc_html( get_theme_mod( 'responsive_add_to_cart_button_hover_color', '#10659C' ) );
		$add_to_cart_button_hover_text_color = esc_html( get_theme_mod( 'responsive_add_to_cart_button_hover_text_color', '#ffffff' ) );

		$woocommerce_custom_css .= "
		@media (min-width:992px) {
			.search.woocommerce .content-area,
			.archive.woocommerce .content-area {
				width: {$shop_content_width}%;
			}
			.search.woocommerce aside.widget-area,
			.archive.woocommerce aside.widget-area {
				width: calc(100% - {$shop_content_width}%);
			}
		}

		.woocommerce span.onsale,
		.wc-block-grid__product-onsale {
			color: {$add_to_cart_button_text_color};
		}

		.product-sale-style-square-outline .wc-block-grid__product-onsale,
		.product-sale-style-circle-outline .wc-block-grid__product-onsale,
		.woocommerce span.onsale.square-outline,
		.woocommerce span.onsale.circle-outline {
			border-color: {$link_color};
			color: {$link_color};
		}
		.wc-block-grid__product-price,
		.woocommerce ul.products li.product .price {
			color: {$shop_product_price_color};
		}
		.woocommerce .star-rating span{
			color: {$shop_product_rating_color};
		}

		.woocommerce #respond input#submit,
		.wp-block-button__link.add_to_cart_button,
		.woocommerce div.product .woocommerce-tabs ul.tabs li a,
		.woocommerce div.product .woocommerce-tabs ul.tabs li,
		.woocommerce button.button.alt,
		.woocommerce button.button,
		.woocommerce a.button {
			background-color: {$add_to_cart_button_color};
			color: {$add_to_cart_button_text_color};
		}

		.woocommerce #respond input#submit:hover,
		.wp-block-button__link.add_to_cart_button:hover,
		.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
		.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
		.woocommerce button.button:focus,
		.woocommerce button.button.alt:focus,
		.woocommerce button.button:hover,
		.woocommerce button.button.alt:hover,
		.woocommerce button.button:hover,
		.woocommerce button.button:focus,
		.woocommerce a.button:focus,
		.woocommerce a.button:hover {
			background-color: {$add_to_cart_button_hover_color};
			color: {$add_to_cart_button_hover_text_color};
		}

		.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover {
			color: {$add_to_cart_button_hover_text_color};
		}

		.woocommerce div.product .woocommerce-tabs ul.tabs li.active {
			border-bottom-color: {$add_to_cart_button_hover_color};
		}
		.woocommerce div.product .woocommerce-tabs ul.tabs li.active::before {
			box-shadow: 2px 2px 0 {$add_to_cart_button_hover_color};
		}
		.woocommerce div.product .woocommerce-tabs ul.tabs li.active::after {
			box-shadow: -2px 2px 0 {$add_to_cart_button_hover_color};
		}
		.woocommerce div.product .woocommerce-tabs ul.tabs::before,
		.woocommerce div.product .woocommerce-tabs ul.tabs li {
			border-color: {$add_to_cart_button_color};
		}
		.woocommerce div.product .woocommerce-tabs ul.tabs li::after,
		.woocommerce div.product .woocommerce-tabs ul.tabs li::before {
			border-color: {$add_to_cart_button_hover_color};
		}
		.woocommerce div.product .woocommerce-tabs ul.tabs li::after {
			box-shadow: -2px 2px 0 {$add_to_cart_button_color};
		}
		.woocommerce div.product .woocommerce-tabs ul.tabs li::before {
			box-shadow: 2px 2px 0 {$add_to_cart_button_color};
		}

		.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
		.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
		.wc-block-grid__product-onsale,
		.woocommerce span.onsale {
			background-color: {$add_to_cart_button_color};
		}
		.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content {
			background-color: {$add_to_cart_button_hover_color};
		}
		";

		// Single Product Styles.
		$single_product_content_width = esc_html( get_theme_mod( 'responsive_single_product_content_width', 100 ) );

		$woocommerce_custom_css .= "
		@media (min-width:992px) {
			.single-product.woocommerce .content-area,
			.single-product.woocommerce .content-area {
				width:{$single_product_content_width}%;
			}
			.single-product.woocommerce aside.widget-area,
			.single-product.woocommerce aside.widget-area {
				width: calc(100% - {$single_product_content_width}%);
			}
		}";

		// cart Styles.
		$cart_content_width            = esc_html( get_theme_mod( 'responsive_cart_content_width', 70 ) );
		$cart_buttons_color            = esc_html( get_theme_mod( 'responsive_cart_buttons_color', '#10659C' ) );
		$cart_buttons_text_color       = esc_html( get_theme_mod( 'responsive_cart_buttons_text_color', '#ffffff' ) );
		$cart_buttons_hover_color      = esc_html( get_theme_mod( 'responsive_cart_buttons_hover_color', '#0066CC' ) );
		$cart_buttons_hover_text_color = esc_html( get_theme_mod( 'responsive_cart_buttons_hover_text_color', '#ffffff' ) );

		$cart_checkout_button_color            = esc_html( get_theme_mod( 'responsive_cart_checkout_button_color', '#0066CC' ) );
		$cart_checkout_button_text_color       = esc_html( get_theme_mod( 'responsive_cart_checkout_button_text_color', '#ffffff' ) );
		$cart_checkout_button_hover_color      = esc_html( get_theme_mod( 'responsive_cart_checkout_button_hover_color', '#10659C' ) );
		$cart_checkout_button_hover_text_color = esc_html( get_theme_mod( 'responsive_cart_checkout_button_hover_text_color', '#ffffff' ) );

		$woocommerce_custom_css .= "
		@media (min-width:992px) {
			.page.woocommerce-cart .content-area {
				width:{$cart_content_width}%;
			}
		}
		.page.woocommerce-cart .woocommerce button.button:disabled,
		.page.woocommerce-cart .woocommerce button.button:disabled[disabled],
		.page.woocommerce-cart .woocommerce button.button {
			background-color: {$cart_buttons_color};
			color: {$cart_buttons_text_color};
		}

		.page.woocommerce-cart .woocommerce button.button:disabled:hover,
		.page.woocommerce-cart .woocommerce button.button:disabled[disabled]:hover,
		.page.woocommerce-cart .woocommerce button.button:hover {
			background-color: {$cart_buttons_hover_color};
			color: {$cart_buttons_hover_text_color};
		}
		.page.woocommerce-cart .woocommerce a.button.alt,
		.page.woocommerce-cart .woocommerce a.button {
			background-color: {$cart_checkout_button_color};
			color: {$cart_checkout_button_text_color};
		}
		.page.woocommerce-cart .woocommerce a.button.alt:hover,
		.page.woocommerce-cart .woocommerce a.button:hover {
			background-color: {$cart_checkout_button_hover_color};
			color: {$cart_checkout_button_hover_text_color};
		}
		";

		// checkout Styles.
		$checkout_content_width = esc_html( get_theme_mod( 'responsive_checkout_content_width', 70 ) );

		$woocommerce_custom_css .= "
		@media (min-width:992px) {
			.page.woocommerce-checkout .content-area {
				width:{$checkout_content_width}%;
			}
		}
		.page.woocommerce-checkout .woocommerce button.button.alt,
		.page.woocommerce-checkout .woocommerce button.button {
			background-color: {$cart_checkout_button_color};
			color: {$cart_checkout_button_text_color};
		}
		.page.woocommerce-checkout .woocommerce button.button.alt:hover,
		.page.woocommerce-checkout .woocommerce button.button:hover {
			background-color: {$cart_checkout_button_hover_color};
			color: {$cart_checkout_button_hover_text_color};
		}";

		$woocommerce_custom_css .= '#add_payment_method table.cart td.actions .coupon .input-text,
		.woocommerce-cart table.cart td.actions .coupon .input-text,
		.woocommerce-checkout table.cart td.actions .coupon .input-text,
		.woocommerce form .form-row input.input-text,
		.woocommerce form .form-row textarea {
			color: ' . $inputs_text_color . ';
			background-color: ' . $inputs_background_color . ';
			border: ' . $inputs_border_width . 'px solid ' . $inputs_border_color . ';
			border-radius: ' . $inputs_radius . 'px;
			line-height: 1.75;
			padding: ' . responsive_spacing_css( $inputs_padding_top, $inputs_padding_right, $inputs_padding_bottom, $inputs_padding_left ) . ';
		}

		@media screen and ( max-width: 992px ) {
			#add_payment_method table.cart td.actions .coupon .input-text,
			.woocommerce-cart table.cart td.actions .coupon .input-text,
			.woocommerce-checkout table.cart td.actions .coupon .input-text {
				padding: ' . responsive_spacing_css( $inputs_tablet_padding_top, $inputs_tablet_padding_right, $inputs_tablet_padding_bottom, $inputs_tablet_padding_left ) . ';

			}
		}
		@media screen and ( max-width: 576px ) {
			#add_payment_method table.cart td.actions .coupon .input-text,
			.woocommerce-cart table.cart td.actions .coupon .input-text,
			.woocommerce-checkout table.cart td.actions .coupon .input-text {
				padding: ' . responsive_spacing_css( $inputs_mobile_padding_top, $inputs_mobile_padding_right, $inputs_mobile_padding_bottom, $inputs_mobile_padding_left ) . ';
			}
		}
		.woocommerce #respond input#submit.alt,
		.woocommerce a.button.alt,
		.woocommerce button.button.alt,
		.woocommerce input.button.alt,
		.woocommerce #respond input#submit,
		.woocommerce a.button,
		.woocommerce button.button,
		.woocommerce input.button {
			line-height: 1;
			border: ' . $buttons_border_width . 'px solid ' . $cart_buttons_color . ';
			border-radius:' . $buttons_radius . 'px;
			padding: ' . responsive_spacing_css( $buttons_padding_top, $buttons_padding_right, $buttons_padding_bottom, $buttons_padding_left ) . ';
		}
		@media screen and ( max-width: 992px ) {
			.woocommerce #respond input#submit.alt,
			.woocommerce a.button.alt,
			.woocommerce button.button.alt,
			.woocommerce input.button.alt,
			.woocommerce #respond input#submit,
			.woocommerce a.button,
			.woocommerce button.button,
			.woocommerce input.button {
				padding: ' . responsive_spacing_css( $buttons_tablet_padding_top, $buttons_tablet_padding_right, $buttons_tablet_padding_bottom, $buttons_tablet_padding_left ) . ';
			}
		}
		@media screen and ( max-width: 576px ) {
			.woocommerce #respond input#submit.alt,
			.woocommerce a.button.alt,
			.woocommerce button.button.alt,
			.woocommerce input.button.alt,
			.woocommerce #respond input#submit,
			.woocommerce a.button,
			.woocommerce button.button,
			.woocommerce input.button {
				padding: ' . responsive_spacing_css( $buttons_mobile_padding_top, $buttons_mobile_padding_right, $buttons_mobile_padding_bottom, $buttons_mobile_padding_left ) . ';
			}
		}';

		for ( $i = 1; $i < 11; $i++ ) {
			$woocommerce_custom_css .= "
			@media screen and ( min-width: 992px ) {
				.woocommerce-page ul.products.columns-$i li.product,
				.woocommerce ul.products.columns-$i li.product {
					width: calc( ( 100% / $i )  - (19px + {$i}px));
				}
			}";
		}
		wp_add_inline_style( 'responsive-woocommerce-style', apply_filters( 'responsive_head_css', responsive_minimize_css( $woocommerce_custom_css ) ) );
	}

}
add_action( 'wp_enqueue_scripts', 'responsive_customizer_styles', 99 );

/**
 * [responsive_minimize_css description].
 *
 * @param  string $css [description].
 * @return string      [description]
 */
function responsive_minimize_css( $css ) {
	$css = preg_replace( '/\/\*((?!\*\/).)*\*\//', '', $css ); // negative look ahead.
	$css = preg_replace( '/\s{2,}/', ' ', $css );
	$css = preg_replace( '/\s*([:;{}])\s*/', '$1', $css );
	$css = preg_replace( '/;}/', '}', $css );
	return $css;
}

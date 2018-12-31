<?php
/**
 * Title: wp-head hooks
 *
 * Description: Defines actions/hooks to be called in wp-head action.
 *
 * @package altitude-lite
 */

if ( ! function_exists( 'altitude_css_styles' ) ) {
	/**
	 * Function to apply css styles.
	 */
	function altitude_css_styles() {
		$link_styles = altitude_link_styles();

		?>
	<style type="text/css" media="all">
		<?php if ( ! empty( $link_styles ) ) : ?>
			<?php foreach ( $link_styles as $key2 => $link_style ) : ?>
				<?php echo esc_html( $key2 ); ?>
		{
			color:
				<?php echo esc_html( $link_style ); ?>
		;
			border-bottom-color:
				<?php echo esc_html( $link_style ); ?>
		;
		}
		.btn, #secondary section.widget_tag_cloud a.tag-cloud-link, .comments-area ol.comment-list li .comment-content .altitude-lite-cmt-reply, .hentry .entry-content .excerpt-more, .footer-widget .widget.widget_tag_cloud a.tag-cloud-link,
button,.header-menu,.main-navigation .sub-menu a,
input[type=button],
input[type=submit] {
		background-color:
				<?php echo esc_html( $link_style ); ?>
		;
		}
		.site-branding a:hover {
		color:
				<?php echo esc_html( $link_style ); ?>
		;
		}
		nav.navigation.pagination span.page-numbers.current{
		background:
				<?php echo esc_html( $link_style ); ?>
		;
		border-color:
				<?php echo esc_html( $link_style ); ?>
		}
		.team-section, .page .elementor-button, .page .has-background-accent > div, section.has-background-accent, .has-background-accent, .elementor-page .team .elementor-social-icons-wrapper .elementor-icon, section.home-page1-services {
			background-color:
					<?php echo esc_html( $link_style ); ?> !important
			;
		}
		/* .page .elementor-button, section.has-background-accent, .has-background-accent */
		<?php endforeach; ?>

	<?php endif; ?>

		<?php
		// Text color.
		if ( get_theme_mod( 'text_color' ) ) {
			$text_color = get_theme_mod( 'text_color' );
			?>
		abbr[title],
		acronym[title], ins,u {
		border-bottom-color:
			<?php echo esc_html( $text_color ); ?>;
		}
		.site-branding a,
		body,
		button,input,select,textarea {
		color:
				<?php echo esc_html( $text_color ); ?>;
		}

			<?php
		}

		// Highlight colo.
		if ( get_theme_mod( 'highlight_color' ) ) {
			$highlight_color = get_theme_mod( 'highlight_color' );
			?>
		blockquote:before {
		border-left-color:
			<?php echo esc_html( $highlight_color ); ?>;
		}
		hr, .footer-widget .widget.widget_recent_entries ul li, .footer-widget .widget.widget_recent_comments ul li, .footer-widget .widget.widget_archive ul li, .footer-widget .widget.widget_categories ul li, #secondary section.widget_recent_entries ul li, #secondary section.widget_recent_comments ul li, #secondary section.widget_archive ul li, #secondary section.widget_categories ul li {
		border-bottom-color:
			<?php echo esc_html( $highlight_color ); ?>;
		}
		pre,code,kbd,tt,var {
		background-color:
			<?php echo esc_html( $highlight_color ); ?>;
		}
		table,table td,table th, nav.navigation.pagination a.page-numbers {
		border-color:
			<?php echo esc_html( $highlight_color ); ?>;
		}
		.site-footer, .comments-area ol.comment-list li  {
		border-top-color:
			<?php echo esc_html( $highlight_color ); ?>;
		}
		nav.navigation.pagination a.prev.page-numbers, nav.navigation.pagination a.next.page-numbers {
		border-color:
			<?php echo esc_html( $highlight_color ); ?>;
		background:
			<?php echo esc_html( $highlight_color ); ?>;
		}

			<?php
		}
		?>
	</style>
		<?php
	}
}
add_action( 'wp_head', 'altitude_css_styles' );

/**
 * Function to return link color.
 */
function altitude_link_styles() {
	$link_styles = array();
	if ( get_theme_mod( 'accent_color' ) ) {
		$link_styles['a'] = get_theme_mod( 'accent_color' );
	}
	return $link_styles;
}

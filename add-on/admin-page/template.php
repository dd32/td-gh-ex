<?php
/**
 * Admin message template.
 *
 * @package Bayleaf
 * @since 1.0.0
 */

?>

<div class="updated notice is-dismissible theme-welcome-notice">
	<h2><?php printf( esc_html__( 'Bayleaf-%s (This message will be displayed only once)', 'bayleaf' ), BAYLEAF_THEME_VERSION ); ?></h2>
	<p><?php esc_html_e( 'Bayleaf theme quick information.', 'bayleaf' ); ?></p>
	<h3><?php esc_html_e( 'Important changes made in the latest version', 'bayleaf' ); ?></h3>
	<ol>
		<li><?php esc_html_e( 'Add: Content/Sidebar, Sidebar/Content and full content layout options for single pages and posts.', 'bayleaf' ); ?></li>
		<li><?php esc_html_e( 'Add: Search Button in Site header areas.', 'bayleaf' ); ?></li>
		<li><?php esc_html_e( 'Add: Image crop positioning options in display posts widget.', 'bayleaf' ); ?></li>
		<li><?php esc_html_e( 'Add: Support for Simplified Fonts Manager plugin.', 'bayleaf' ); ?></li>
		<li><?php esc_html_e( 'Modify: Rename \'Sidebar Widgets\' to \'Header Toggle Widgets\' to avoid confusion.', 'bayleaf' ); ?></li>
		<li><?php esc_html_e( 'Modify: A new Sidebar widget area has been added.', 'bayleaf' ); ?></li>
		<li><?php esc_html_e( 'Modify: Hide \'Header toggle widgets\' hamburger menu, if no widgets are assigned to it.', 'bayleaf' ); ?></li>
		<li><?php esc_html_e( 'Modify: Drop down menu styling improvements.', 'bayleaf' ); ?></li>
	</ol>
	<h3><?php esc_html_e( 'Getting Started', 'bayleaf' ); ?></h3>
	<ol>
		<li><?php esc_html_e( 'Use "Display Posts" widget from Appearance > Widgets to create various posts layout.', 'bayleaf' ); ?></li>
		<li><?php esc_html_e( 'Use "Blank Widget" widget from Appearance > Widgets to create vertical gaps between widgets.', 'bayleaf' ); ?></li>
		<li><?php printf( esc_html__( 'Visit %s to get Started', 'bayleaf' ), sprintf( '<a href="%s" target="_blank">%s</a>', 'https://vedathemes.com/documentation/bayleaf/', esc_html__( 'quick setup guide', 'bayleaf' ) ) ); ?></li>
		<li><?php printf( esc_html__( 'Get Support at %s', 'bayleaf' ), sprintf( '<a href="%s" target="_blank">%s</a>', 'https://wordpress.org/support/theme/bayleaf/', esc_html__( 'Support Forum', 'bayleaf' ) ) ); ?></li>
		<li><?php printf( esc_html__( 'If you are happy with Bayleaf, %s', 'bayleaf' ), sprintf( '<a href="%s" target="_blank">%s</a>', 'https://wordpress.org/support/theme/bayleaf/reviews/?filter=5', esc_html__( 'Kindly give 5 star rating.', 'bayleaf' ) ) ); ?></li>
	</ol>
	<p><?php esc_html_e( 'Thanks for trying Bayleaf', 'bayleaf' ); ?>
</div>

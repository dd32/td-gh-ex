<?php
/**
 * Admin message template.
 *
 * @package Bayleaf
 * @since 1.0.0
 */

?>

<div class="updated notice is-dismissible theme-welcome-notice">
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

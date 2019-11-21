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
	<p><?php printf( esc_html__( 'Thanks for trying Bayleaf theme. Kindly get started with %1$s OR get support at %2$s.', 'bayleaf' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://vedathemes.com/documentation/bayleaf/', esc_html__( 'Bayleaf documentation', 'bayleaf' ) ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://wordpress.org/support/theme/bayleaf/', esc_html__( 'Bayleaf support forum', 'bayleaf' ) ) ); ?></p>
	<span style="display: block; width: 100%; background-color: #e6e6e6; height: 1px; margin: 20px 0 10px;"></span>
	<p style="font-size: 15px;"><?php printf( esc_html__( 'Want more amazing features? %s', 'bayleaf' ), sprintf( '<a href="%s" target="_blank">%s</a>', 'https://vedathemes.com/blog/vedaitems/bayleaf-premium/', esc_html__( 'Try Bayleaf Premium.', 'bayleaf' ) ) ); ?></p>
</div>

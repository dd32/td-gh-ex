<?php
/**
 * Customizer sanitization.
 */

if ( ! function_exists( 'araiz_sanitize_text' ) ) :
/**
 * Sanitize type: text
 *
 * @since 1.0.0
 * @return string $input
 */
function araiz_sanitize_text( $input ) {
  return wp_kses_post( force_balance_tags( $input ) );
}
endif;
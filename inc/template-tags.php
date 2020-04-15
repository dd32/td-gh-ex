<?php
/**
 * Template Tags
 *
 * @package Fmi
 */

// Post Pagination
if ( ! function_exists( 'vs_page_pagination' ) ) {
  function vs_page_pagination() {
    if ( ! is_singular() ) {
      return;
    }
    wp_link_pages(
      array(
        'before' => '<div class="navigation page-links">' . esc_html__( 'Pages:', 'fmi' ),
        'after'  => '</div>',
      )
    );
  }
}

<?php
/**
 * All core theme actions.
 *
 * @package Fmi
 */

/**
 * Site
 */
add_action( 'vs_site_before', 'vs_offcanvas', 10 );

/**
 * Footer
 */
add_action( 'wp_footer', 'vs_scroll_to_top', 10 );

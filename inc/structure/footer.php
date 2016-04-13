<?php

/**
 * Template functions used for the site footer.
 *
 * @package actions
 */

if ( ! function_exists( 'actions_footer_credit' ) ) {
	/**
	 * Display the theme credit
	 * @since  1.0.0
	 * @return void
	 */
	function actions_footer_credit() {
		$actions_theme = wp_get_theme();
        $name = $actions_theme->get( 'Name' );
		$url = $actions_theme->get( 'ThemeURI' );
		$author = $actions_theme->get( 'Author' );
		$copyright = __('Copyright &copy; ', 'actions') . get_bloginfo( 'name' ) . ' ' . date( 'Y' );
		
		do_action( 'actions_footer_open' );
		do_action( 'actions_before_footer' );
		    echo esc_html( apply_filters( 'actions_copyright_text', $copyright ) );
		    if ( apply_filters( 'actions_credit_link', true ) ) {
		        printf( __( ' / Theme: %1$s, designed by %2$s.', 'actions' ), $name, '<a href="'.$url.'" alt="'.$name.'" title="'.$name.'" rel="designer nofollow">' .$author. '</a>' );
		    }
        do_action( 'actions_after_footer' );
		do_action( 'actions_footer_close' );
	} 
}
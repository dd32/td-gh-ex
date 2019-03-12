<?php
/**
 * Extra functions for this theme.
 *
 * @package Adagio Lite
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function adagio_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'adagio_page_menu_args' );

/**
* Defines new blog excerpt length and link text.
*/
if (!is_admin()) {
function adagio_new_excerpt_length($length) {
	return 80;
}
add_filter('excerpt_length', 'adagio_new_excerpt_length');

function adagio_new_excerpt_more($more) {
	global $post;
	return '<a class="more-link" href="'.esc_url(get_permalink($post->ID)) . '"><span data-hover="'. esc_html__('Read More', 'adagio-lite') .'">'. esc_html__('Read More', 'adagio-lite') .'</span></a>';
}
add_filter('excerpt_more', 'adagio_new_excerpt_more');
}

/**
* Adds excerpt support for pages.
*/
add_post_type_support( 'page', 'excerpt');

/**
* Manages display of archive titles.
*/
function adagio_get_the_archive_title( $title ) {
   if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_year() ) {
        $title = get_the_date( _x( 'Y', 'yearly archives date format','adagio-lite' ) );
    } elseif ( is_month() ) {
        $title = get_the_date( _x( 'F Y', 'monthly archives date format','adagio-lite' ) );
    } elseif ( is_day() ) {
        $title = get_the_date( _x( 'F j, Y', 'daily archives date format','adagio-lite' ) );
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    } else {
        $title = esc_html__( 'Archives', 'adagio-lite' );
    }
    return $title;
};
add_filter( 'get_the_archive_title', 'adagio_get_the_archive_title', 10, 1 );

// display custom admin notice
function adagio_admin_notice__success() {
    ?>
    <div class="notice notice-success is-dismissible">
        <p><?php esc_html_e( 'Thanks for installing adagio Lite! Want more features?','adagio-lite'); ?> <a href="https://www.vivathemes.com/wordpress-theme/adagio/" target="blank"><?php esc_html_e( 'Check out the Pro Version  &#8594;','adagio-lite'); ?></a></p>
    </div>
    <?php
}
add_action( 'admin_notices', 'adagio_admin_notice__success' );

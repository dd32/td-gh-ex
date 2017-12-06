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
function adagio_new_excerpt_length($length) {
	return 80;
}
add_filter('excerpt_length', 'adagio_new_excerpt_length');

function adagio_new_excerpt_more($more) {
	global $post;
	return '<a class="more-link" href="'.esc_url(get_permalink($post->ID)) . '"><span data-hover="'. __('Read More', 'adagio-lite') .'">'. __('Read More', 'adagio-lite') .'</span></a>';
}
add_filter('excerpt_more', 'adagio_new_excerpt_more');


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

function adagio_lite_notice() {
	global $current_user;
	$user_id = $current_user->ID;
	if (!get_user_meta($user_id, 'adagio_notice_ignore')) {
		echo '<div class="updated notice"><p>'. esc_html__('Thanks for installing Adagio Lite! Want more features?', 'adagio-lite') .' <a href="https://www.vivathemes.com/wordpress-theme/adagio/" target="blank">'. esc_html__('Check Out the Pro Version  &#8594;', 'adagio-lite') .'</a><a class="notice-dismiss" href="?adagio-ignore-notice"><span class="screen-reader-text">Dismiss Notice</span></a></p></div>';
	}
}
add_action('admin_notices', 'adagio_lite_notice');

function adagio_notice_ignore() {
	global $current_user;
	$user_id = $current_user->ID;
	if (isset($_GET['adagio-ignore-notice'])) {
		add_user_meta($user_id, 'adagio_notice_ignore', 'true', true);
	}
}
add_action('admin_init', 'adagio_notice_ignore');

add_action('admin_head', 'adagio_admin_style');
function adagio_admin_style() {
  echo '<style>
   .notice {position: relative;}
   a.notice-dismiss {text-decoration:none;}
  </style>';
}
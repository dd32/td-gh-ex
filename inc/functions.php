<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package adbooster
 */

function adbooster_get_option( $setting, $default = '' ) {

	$options = get_option( Ad_Booster::get_theme_slug() . '_basic_opts_name', array() );

	$value = $default;

    if ( isset( $options[ $setting ] ) ) {
        $value = $options[ $setting ];
    }
    return $value;
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function adbooster_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'adbooster_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function adbooster_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'adbooster_pingback_header' );

/**
 * Retrieve list of category array.
 *
 * @since 1.2.0
 * @return array
 */
function adbooster_category_list( $args = array(), $is_all = true ) {

	$categories = get_categories( $args );
	$output_categories = array();

	if ( $is_all ) {
		$output_categories[0] = __('All Categories', 'adbooster');
	}

	foreach($categories as $category) { 

	 	$output_categories[$category->cat_ID] = $category->cat_name;
	}
 	
 	return $output_categories;
}

function adbooster_credit_link() {

	$attrs = array( "href" => "https://boosterwp.com", "title" => "BoosterWP Theme - The Best Free Amazon Affiliate WordPress Themes", "rel" => "author", 'label' => "BoosterWP" );
	
	$link = 'a';

	foreach ( $attrs as $key => $val ) {

		if ( $key != 'label' ) {

			$link .= sprintf(' %s="%s" ', $key, $val );
		}
	}

	return sprintf('<%s>%s</%s>', $link, $attrs['label'], 'a' );
}
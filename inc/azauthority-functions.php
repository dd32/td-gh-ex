<?php
/**
 * Az_Authority  functions.
 *
 * @package Az_Authority
 */


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 *
 * @since 1.2.0
 */
function azauthority_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'azauthority_pingback_header' );
/**
 * Apply inline style to the Az_Authority header.
 *
 * @uses  get_header_image()
 * @since  1.0.0
 */
function azauthority_header_styles() {
	$is_header_image = get_header_image();
	$header_bg_image = '';

	if ( $is_header_image ) {
		$header_bg_image = 'url(' . esc_url( $is_header_image ) . ')';
	}

	$styles = array();

	if ( '' !== $header_bg_image ) {
		$styles['background-image'] = $header_bg_image;
	}

	$styles = apply_filters( 'azauthority_header_styles', $styles );

	foreach ( $styles as $style => $value ) {
		echo esc_attr( $style . ': ' . $value . '; ' );
	}
}


function azauthority_the_post_thumbnail( $size, $attr = '', $echo = true ) {

	if ( has_post_thumbnail() ) {

		$img = get_the_post_thumbnail( null, $size, $attr );

	} else {

		$img = sprintf('<img class="wp-post-image" src="%s/assets/images/default-%s.jpg" alt="%s" />',  get_template_directory_uri(), esc_attr( $size ), esc_attr( get_the_title()) );

	}

	if ( $echo ) {

		echo $img;

	} else {

		return $img;

	}
}

function azauthority_enable_single_header_bg() {

	return apply_filters('azauthority_enable_single_header_bg', true );
}

if ( ! function_exists('azauthority_get_theme_option') ) :

	/**
	 * Get Theme Options
	 * 
	 * @param  mix $setting
	 * @param  mix $default
	 * @return mix
	 */
	function azauthority_get_theme_option( $setting, $default = '' ) {

	    $options = get_option( 'azauthority_options', array() );

	    $value = $default;

	    if ( isset( $options[ $setting ] ) ) {

	        $value = $options[ $setting ];

	    }

	    return $value;
	}

endif;


if ( ! function_exists('set_custom_thumbnail') ) :

	/**
	 * Crop Thumbnail Sizes
	 * 
	 * 
	 */
	function set_custom_thumbnail() {

	    // Default Thumbnail Sizes
		set_post_thumbnail_size( 300, 250 );

		add_image_size( 'azauthority-large-thumbnail', 570, 380, true );
		add_image_size( 'azauthority-small-thumbnail', 374, 250, true );
		add_image_size( 'azauthority-feature-thumbnail', 600, 400, true );

	}

endif;
add_action( 'after_setup_theme', 'set_custom_thumbnail' );

/**
*------------------------------------------------------------------------------
* Callback Functions
*------------------------------------------------------------------------------
*/

function azauthority_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function azauthority_sanitize_textarea( $input ) {
	return esc_textarea($input);
}



function azauthority_get_category_list() {
	
	$categories = get_categories();
	$cats[0] = __('All Categories', 'azauthority');
	
	foreach ($categories as $cat) {
		$cats[$cat->cat_ID] = $cat->name;
	}

	return $cats;
}

function azauthority_get_social_list() {	
	// Check to enable social buttons
	$social_items = azauthority_get_social_items();
	$choices = array();

	foreach( $social_items as $key => $val ) {
		$choices[$key] = $val;
	}

	return $choices;
}

function azauthority_get_social_items() {

	$items = apply_filters('azauthority_pro_social_items', array(
		'facebook'		=> __( 'Facebook', 'azauthority' ),
		'twitter'		=> __( 'Twitter', 'azauthority' ),
		'googleplus'	=> __( 'GooglePlus', 'azauthority' ),
		'email'			=> __( 'Email', 'azauthority' ),
		'linkedin'		=> __( 'Linkedin', 'azauthority' ),
		'pinterest'		=> __( 'Pinterest', 'azauthority' ),
		'stumbleupon'	=> __( 'StumbleUpon', 'azauthority' ),
		'pocket'		=> __( 'Pocket', 'azauthority' ),
		'whatsapp'		=> __( 'WhatsApp', 'azauthority' ),
		'messenger'		=> __( 'Messenger', 'azauthority' ),
		'vkontakte'		=> __( 'Vkontakte', 'azauthority' ),
		'telegram'		=> __( 'Telegram', 'azauthority' ),
		'line'			=> __( 'LINE', 'azauthority' ),
		'rss'			=> __( 'RSS', 'azauthority' )

	));

	return $items;
}

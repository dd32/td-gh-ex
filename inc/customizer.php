<?php
/**
 * Aguafuerte customization 
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.2
 */

/**
 * Implement Customizer additions and adjustments.
 *
 * @since Aguafuerte 1.0.2
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */

function aguafuerte_customize_register ($wp_customize) {

	$blog_navigation_array = array(
		'navigation' => __('Navigation', 'aguafuerte'),
		'pagination' => __('Pagination', 'aguafuerte'),
	);

/**
* Removes the control for displaying or not the header text and adds the posibility of displaying the site title and tagline separately. 
**/

// ===============================
$wp_customize->remove_control('display_header_text');

//===============================
$wp_customize->add_setting('aguafuerte_theme_options[show_site_title]', array(
	'default'           => 1,
	'sanitize_callback' => 'absint',
	'capability'        => 'edit_theme_options',
	'type'           => 'option',
));

$wp_customize->add_control( 'show_site_title', array(
	'label'    => __('Display Site Title', 'aguafuerte'),
	'section'  => 'title_tagline',
	'settings' => 'aguafuerte_theme_options[show_site_title]',
	'type' => 'checkbox',
));
//===============================
$wp_customize->add_setting( 'aguafuerte_theme_options[show_site_description]', array(
	'default'        => 1,
	'sanitize_callback' => 'absint',
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
));

$wp_customize->add_control('show_site_description', array(
	'label'      => __('Display Tagline', 'aguafuerte'),
	'section'    => 'title_tagline',
	'settings'   => 'aguafuerte_theme_options[show_site_description]',
	'type' => 'checkbox',
));

//  =============================
//  == Special Pages Section   ==
//  =============================
$wp_customize->add_section( 'Special Pages Settings', array(
	'title'          => __( 'Special Pages', 'aguafuerte' ),
	'description' => __( 'This section saves the slug (i.e. its URL valid name) of the pages made with the special page templates, so they can be used across the theme. Put the pages slug here.', 'aguafuerte'),
) );
//===============================
$wp_customize->add_setting( 'aguafuerte_theme_options[contributors_slug]', array(
	'default'        => 'contributors',
	'sanitize_callback' => 'sanitize_text_field',
	'type'           => 'option',
	'capability'     => 'edit_theme_options',
) );

$wp_customize->add_control( 'contributors_slug', array(
	'label'    => __('Slug of your Contributors Page', 'aguafuerte'),
	'section'  => 'Special Pages Settings',
	'settings' => 'aguafuerte_theme_options[contributors_slug]',
));

//===============================
$wp_customize->add_setting( 'aguafuerte_theme_options[featured_articles_slug]', array(
	'default'        => 'featured',
	'sanitize_callback' => 'sanitize_text_field',
	'type'           => 'option',
	'capability'     => 'edit_theme_options',
) );

$wp_customize->add_control( 'featured_articles_slug', array(
	'label'    => __('Slug of your Featured Articles Page', 'aguafuerte'),
	'section'  => 'Special Pages Settings',
	'settings' => 'aguafuerte_theme_options[featured_articles_slug]',
));

//  =============================
//  ==   Navigation Section    ==
//  ============================= 
$wp_customize->add_section( 'Blog Navigation', array(
	'title'          => __( 'Navigation Settings', 'aguafuerte' ),
	'description' => __( 'This section adds the possibility of choosing between navigation or pagination in multiple view pages.', 'aguafuerte'),

) );
//===============================
 $wp_customize->add_setting('aguafuerte_theme_options[blog_navigation]', array(
	'sanitize_callback' => 'aguafuerte_sanitize_blog_nav',
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default'        => 'navigation', 
));

$wp_customize->add_control( 'blog_navigation', array(
	'settings' => 'aguafuerte_theme_options[blog_navigation]',
	'label'   => __('Choose your preferred mode of navigating between old and new articles','aguafuerte'),
	'section' => 'Blog Navigation',
	'type'    => 'radio',
	'choices'    => $blog_navigation_array,
));

}

add_action( 'customize_register', 'aguafuerte_customize_register' );


/**
 * Sanitization for navigation choice
 */
function aguafuerte_sanitize_blog_nav( $value ) {
	$recognized = aguafuerte_blog_nav();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'aguafuerte_blog_nav', current( $recognized ) );
}

function aguafuerte_blog_nav() {
	$default = array(
		'navigation' => 'navigation',
		'pagination' => 'pagination',
	);
	return apply_filters( 'aguafuerte_blog_nav', $default );
}

function aguafuerte_get_option_defaults() {
	$defaults = array(
		'show_site_title' => 1,
		'show_site_description' => 1,
		'contributors_slug' => 'contributors',
		'featured_articles_slug' => 'featured',
		'blog_navigation' => 'navigation',		
	);
	return apply_filters( 'aguafuerte_get_option_defaults', $defaults );
}

function aguafuerte_get_options() {
	// Options API
	return wp_parse_args( 
		get_option( 'aguafuerte_theme_options', array() ), 
		aguafuerte_get_option_defaults() 
	);
}



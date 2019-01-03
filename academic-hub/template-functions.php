<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Academic_Hub
 */

/**
 * Adds elements after header
 * @since 1.0.0
 */
function academic_hub_add_after_header() {
	// Show sticky header if enabled.
	if ( true === get_theme_mod( 'academic_hub_breadcrumb', true ) ) :
		get_template_part( 'template-parts/breadcrumb/breadcrumb', 'section' );
	endif;
}
add_action( 'academic_hub_after_header', 'academic_hub_add_after_header' );



/**
 * Adds elements after header
 * @since 1.0.0
 */
function academic_hub_related_post($post_id) {
	// Show sticky header if enabled.
	if ( true === get_theme_mod( 'academic_hub_related_post', true ) ) :
		get_template_part( 'template-parts/related/related', 'single' );
	endif;
}
add_action( 'academic_hub_related', 'academic_hub_related_post',10,1 );


/**
 * Add the Pagination
 * @since 1.0.0
 */
function academic_hub_pagination_section($post_id) {
	// Show pagination on page
	get_template_part( 'template-parts/pagination/pagination' );
}
add_action( 'academic_hub_pagination', 'academic_hub_pagination_section',10,1 );




/**
 * Add the Pagination
 * @since 1.0.0
 */
function academic_hub_top_header($post_id) {
	// Show pagination on page
	get_template_part( 'template-parts/header/top-header' );
}
add_action( 'academic_hub_top_header', 'academic_hub_top_header');



/**
 * Footer Widgets Section
 * @since 1.0.0
 */
function academic_hub_footer_widget() {
	// Show Breadcrumb Section
	get_template_part( 'template-parts/footer/footer-widget', 'section' );
}
add_action( 'academic_hub_footer', 'academic_hub_footer_widget',10 );


/**
 * Footer Copyright Text
 * @since 1.0.0
 */
function academic_hub_footer_copyright_text() {
	// Show Copyright Text Section
	get_template_part( 'template-parts/footer/footer', 'copyright' );
}
add_action( 'academic_hub_footer', 'academic_hub_footer_copyright_text',20 );


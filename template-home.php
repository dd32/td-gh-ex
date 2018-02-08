<?php
/**
 * Template Name: Front Page 
 * The template used for displaying front page contents
 *
 * @package agency-x
 */
get_header();

$sections = array( 'banner-slider', 'counter', 'welcome', 'services', 'team', 'works', 'testimonial', 'plan', 'skills', 'latest-posts', 'contact', 'clients' );

if ( ! empty( $sections ) && is_array( $sections ) ) :
	foreach ( $sections as $section ) {
		get_template_part( 'template-parts/home-sections/' . $section, $section );
	}
endif;


?>
<?php get_footer();
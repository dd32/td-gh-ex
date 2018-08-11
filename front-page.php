<?php
/**
 * The front page template file.
 *
 * If the user has selected a static page for their homepage, this is what will appear.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package FPT University
 */

// If users select to display blog posts on the front page, load the index file.
if ( 'posts' === get_option( 'show_on_front' ) ) {
	get_template_part( 'index' );

	return;
}

// Custom front page template.
get_header(); ?>

<?php get_template_part( 'template-parts/home/intro' ); ?>
<?php get_template_part( 'template-parts/home/services' ); ?>
<?php get_template_part( 'template-parts/home/recent-posts' ); ?>
<?php get_template_part( 'template-parts/home/cta' ); ?>
<?php get_template_part( 'template-parts/home/contact' ); ?>

<?php get_footer();

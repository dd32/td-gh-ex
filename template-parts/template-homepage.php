<?php
/**
 *
 * Template name: Homepage
 *
 * @package bellini
 */
get_header();
?>
<main role="main">
<?php do_action( 'homepage' );?>
<?php
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', 'page' );
	}
?>
</main>
<?php get_footer();?>
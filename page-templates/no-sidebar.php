<?php
/**
 * Template Name: No Sidebar
 *
 * Description: A page template without sidebar. It has full width if there is not a sidebar, but only a third of the width if there are sidebars.
 *
 * @package Bassist
 * @since Bassist 1.0.0
 */

get_header(); ?>

<div id="main-content">
<?php
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/content', 'page' );
	endwhile; // end of the loop.
?>
</div><!--/main-content-->

<?php get_footer(); ?>
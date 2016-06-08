<?php
/**
* The template for displaying all pages.
*
* This is the template that displays all pages by default.
*
* @package beam
*/

get_header(); ?>
<div id="content" class="site-content">
	<div class="site-content-inner">

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content', 'page' ); ?>

		<?php
		// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || '0' != get_comments_number() )
		comments_template();
		?>
		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
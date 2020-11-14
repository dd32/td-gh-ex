<?php
/*template name: Page Builders*/
/**
 *
 *
 */

get_header(); ?>

	<!-- == CONTENT AREA == -->
	<?php while ( have_posts() ) : the_post(); ?>
	<div id="primary" class="content-area-page-builder">
		<?php the_content(); ?>
	</div>
	<?php endwhile; // End of the loop. ?>
	<!-- == /CONTENT AREA == -->

<?php get_footer(); ?>
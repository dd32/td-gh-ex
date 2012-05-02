<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @D5 Creation
 * @Modified on Twenty_Eleven
 
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
            <div style="width:728px; height:90px; display: block; background: #545151;"><?php include("pagetopad.php") ?></div>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
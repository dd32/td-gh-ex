<?php
/**
 * Template Name: One Column Disabled Sidebar
 *
 * @package Blue Sky
 */

get_header(); ?>
<div id="tertiary" class="col-md-2">&nbsp;</div>
	<div id="primary" class="content-area col-md-8 col-sm-12 col-xs-12 pull-left">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<div id="tertiary1" class="col-md-2">&nbsp;</div>
<?php get_footer(); ?>

<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bellini
 */

get_header();?>
<div class="content-wrapper">
<div class="row">
<?php get_sidebar('left');?>
	<div id="primary" class="content-area single-post__content <?php bellini_sidebar_content_class(); ?>">
		<main id="main" class="site-main row" role="main" itemscope itemprop="mainEntityOfPage">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

			<?php // the_post_navigation(); ?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- row -->
</div>
<?php get_footer(); ?>

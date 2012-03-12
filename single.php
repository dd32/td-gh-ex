<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Skylark
 * @since Skylark 1.0
 */

get_header(); ?>

<?php if (is_singular('post')) : ?>
<header class="site-title">
	<h1><?php the_title(); ?></h1> 
	<div class="searchform"><?php get_search_form(); ?></div>
</header>

		<div id="primary" class="site-content">
			<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php skylark_content_nav( 'nav-above' ); ?>

				<?php get_template_part( 'content', 'single' ); ?>

				<?php skylark_content_nav( 'nav-below' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>

			<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary .site-content -->

<?php get_sidebar(); ?>

<?php else : ?>
<!-- This section is for the portfolio. Don't edit. -->
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div class="port-content">

<div class="port-entry">
<h1 class="entry-title"><?php the_title(); ?></h1>
<?php the_content(); ?>
</div>

<div class="featured-image">
<?php the_post_thumbnail('portfolio'); ?>
</div>


</div><!-- end port-content -->


<?php endwhile; // end of the loop for portfolio. ?>
<?php endif; // end portfolio section ?>

<?php get_footer(); ?>